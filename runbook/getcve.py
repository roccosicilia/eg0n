import requests, json, mysql.connector, sys
from datetime import date
from config import *

def getCVE(url):
    try:
        response = requests.get(url)
        if response.status_code == 200:
            response = requests.get(url)
            json_data = response.json()
            return json_data
        else:
            print(f"Errore nella richiesta. Status code: {response.status_code}")
            return None
    except Exception as e:
        print(f"Errore durante la richiesta: {e}")
        return None

def db_insert(db_insert): ### WRITE
    myconn = mysql.connector.connect(host=mydb["host"], user=mydb["user"], password=mydb["pass"], database=mydb["name"], auth_plugin='mysql_native_password')
    mycursor = myconn.cursor()
    mycursor.execute(db_insert)
    myconn.commit()

def db_select(db_select): ### READ
    myconn = mysql.connector.connect(host=mydb["host"], user=mydb["user"], password=mydb["pass"], database=mydb["name"], auth_plugin='mysql_native_password')
    mycursor = myconn.cursor()
    mycursor.execute(db_select)
    result = mycursor.fetchall()
    return result

if __name__ == "__main__":

    t = date.today()
    today = t.strftime("%Y-%m-%d")

    if len(sys.argv) < 2:
        last = 20
    else:
        last = sys.argv[1]

    url = 'https://cve.circl.lu/api/last/{}'.format(last)
    json_data = getCVE(url)

    for item in json_data:

        cveid = item["id"]
        date_published = item["Published"]
        date_modified = item["Modified"]
        cvss = item["cvss"]
        cwe = item["cwe"]
        summary = item["summary"].replace("'", "\"")
        references_list = str(item["references"]).replace("'", "\"")
        cpe = str(item["vulnerable_product"]).replace("'", "\"")
        try:
            capec = str(item["capec"]).replace("'", "\"")
        except:
            capec = ''

        query = "SELECT * FROM `cve_list` WHERE cveid = '{}' AND date_modified = '{}'".format(cveid, date_modified)
        result = db_select(query)
        number = len(result)
        # print("{} {}".format(number, query)) # debug

        if number == 0:
            try:
                # INSERT data
                query = "INSERT INTO `cve_list` (cveid, date_published, date_modified, cvss, cwe, references_list, cpe, summary, capec) VALUES ('{}', '{}', '{}', '{}', '{}', '{}', '{}', '{}', '{}')".format(cveid, date_published, date_modified, cvss, cwe, references_list, cpe, summary, capec)
                db_insert(query)
                print("Add CVE {}".format(cveid))
            except:
                print("#################")
                print("# DEBUG QUERY ### {}".format(query))
                print("#################")
        else:
            print("Duplicated CVE.")
