import requests, json, mysql.connector, sys
from datetime import date
from config import *

def cwe_count():
    # db connect
    myconn = mysql.connector.connect(host=mydb["host"], user=mydb["user"], password=mydb["pass"], database=mydb["name"], auth_plugin='mysql_native_password')
    mycursor = myconn.cursor()

    # cwe count from DB
    query = "SELECT cwe, COUNT(*) as count FROM cve_list GROUP BY cwe ORDER BY count DESC"
    mycursor.execute(query)
    result = mycursor.fetchall()

    for row in result:
        print(row)

if __name__ == "__main__":

    cwe_count()