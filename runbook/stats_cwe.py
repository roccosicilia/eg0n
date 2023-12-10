import requests, json, mysql.connector, sys
from datetime import date
from config import *

def cwe_count():
    # db connect
    myconn = mysql.connector.connect(host=mydb["host"], user=mydb["user"], password=mydb["pass"], database=mydb["name"], auth_plugin='mysql_native_password')
    mycursor = myconn.cursor()

    # cwe count from DB
    query = "SELECT cwe, COUNT(*) as count FROM `cve_list` GROUP BY cwe ORDER BY count DESC"
    mycursor.execute(query)
    result = mycursor.fetchall()

    for row in result:
        if (row[1] >= 10):
            query = "SELECT * FROM `cwe_stats` WHERE cwe = '{}'".format(row[0])
            mycursor.execute(query)
            result = mycursor.fetchall()
            if len(result) >= 1:
                # update DB
                query_update = "UPDATE `cwe_stats` SET count = '{}' WHERE cwe = '{}'".format(row[1], row[0])
                mycursor.execute(query_update)
                myconn.commit()
            else:
                # insert new cwe
                query_insert = "INSERT INTO `cwe_stats` (cwe, cwe_count) VALUES ('{}', '{}')".format(row[0], row[1])
                mycursor.execute(query_insert)
                myconn.commit()

if __name__ == "__main__":

    cwe_count()