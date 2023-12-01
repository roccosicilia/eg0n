import requests, json, mysql.connector, sys
from datetime import date
from config import *

def getCVE(url):
    try:
        response = requests.get(url)
        if response.status_code == 200:
            data = response.text.replace("'", "`")
            return data
        else:
            print(f"Errore nella richiesta. Status code: {response.status_code}")
            return None
    except Exception as e:
        print(f"Errore durante la richiesta: {e}")
        return None

def dbquery(db_insert):
    myconn = mysql.connector.connect(host=mydb["host"], user=mydb["user"], password=mydb["pass"], database=mydb["name"], auth_plugin='mysql_native_password')
    mycursor = myconn.cursor()
    mycursor.execute(db_insert)
    myconn.commit()

if __name__ == "__main__":

    t = date.today()
    today = t.strftime("%Y-%m-%d")

    if len(sys.argv) < 2:
        last = 20
    else:
        last = sys.argv[1]

    url = 'https://cve.circl.lu/api/last/{}'.format(last)
    list_data = json.loads(getCVE(url))

    for item in list_data:
        item = str(item)
        json_data = item.replace("'", "\"")
        json_data = json_data.replace("None", '""')
        try:
            json_data = json.loads(json_data)

            # CVE data
            cveid = json_data["id"]
            date_published = json_data["Published"]
            date_modified = json_data["Modified"]
            cvss = json_data["cvss"]
            cwe = json_data["cwe"].replace("'", "\\'")
            summary = json_data["summary"].replace("'", "\\'")

            references_list = str(json_data["references"])
            references_list = references_list.replace("'", "\\'")
            cpe = str(json_data["vulnerable_product"])
            cpe = cpe.replace("'", "\\'")
            capec = str(json_data["capec"])
            capec = capec.replace("'", "\\'")

            if today in date_modified or len(sys.argv) >= 2:
                # INSERT data
                query = "INSERT INTO `cve` (cveid, date_published, date_modified, cvss, cwe, references_list, cpe, summary, capec) VALUES ('{}', '{}', '{}', '{}', '{}', '{}', '{}', '{}', '{}')".format(cveid, date_published, date_modified, cvss, cwe, references_list, cpe, summary, capec)
                dbquery(query)
                print("Add CVE {}".format(cveid))
            else:
                print("No CVE.")

        except:
            print("JSON error.")
