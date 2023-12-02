import requests, json, mysql.connector, sys, subprocess
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
    
def curlCVE(url, content):
    command = "curl -s -i {} | grep {}".format(url, content)
    res = subprocess.check_output(command, shell = True, executable = "/bin/bash", stderr = subprocess.STDOUT)
    return res


def db_insert(db_insert):
    myconn = mysql.connector.connect(host=mydb["host"], user=mydb["user"], password=mydb["pass"], database=mydb["name"], auth_plugin='mysql_native_password')
    mycursor = myconn.cursor()
    mycursor.execute(db_insert)
    myconn.commit()

def jclean(j):
    j = str(j)
    out = j.split(":")
    out = out[1].replace('"', '')
    out = out.replace(",\\n'", '')
    out = out.replace("[\\n'", '')
    out = out.lstrip()
    return out

if __name__ == "__main__":

    t = date.today()
    today = t.strftime("%Y-%m-%d")

    url = 'https://cve.circl.lu/api/last/1'

    cveid = jclean(curlCVE(url, 'id'))
    date_published = jclean(curlCVE(url, 'Published'))
    date_modified = jclean(curlCVE(url, 'Modified'))
    cvss = jclean(curlCVE(url, 'cvss'))
    cwe = jclean(curlCVE(url, 'cwe'))
    summary = jclean(curlCVE(url, 'summary'))
    references_list = jclean(curlCVE(url, 'references'))
    cpe = jclean(curlCVE(url, 'vulnerable_product'))
    capec = jclean(curlCVE(url, 'capec'))

    # INSERT data
    query = "INSERT INTO `cve` (cveid, date_published, date_modified, cvss, cwe, references_list, cpe, summary, capec) VALUES ('{}', '{}', '{}', '{}', '{}', '{}', '{}', '{}', '{}')".format(cveid, date_published, date_modified, cvss, cwe, references_list, cpe, summary, capec)
    #db_insert(query)
    print(query)
    print("Add CVE {}".format(cveid))