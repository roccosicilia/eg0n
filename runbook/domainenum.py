# Descr: get domain name informations
# Usage: dnsenum.py TargetDomain.url

import sys, time, requests, json
import dns.resolver, mysql.connector
from datetime import date
from config import *

##### Base functions ##############################################################################
def dns_query(base_url, type):
    try:
        query = dns.resolver.resolve(base_url, type)
    except:
        print("Query error.")
    return query

def dbinsert(query):
    myconn = mysql.connector.connect(host=mydb["host"], user=mydb["user"], password=mydb["pass"], database=mydb["name"], auth_plugin='mysql_native_password')
    mycursor = myconn.cursor()
    mycursor.execute(query)
    myconn.commit()

def dbselect(query):
    myconn = mysql.connector.connect(host=mydb["host"], user=mydb["user"], password=mydb["pass"], database=mydb["name"], auth_plugin='mysql_native_password')
    mycursor = myconn.cursor()
    mycursor.execute(query)
    result = mycursor.fetchall()
    return result

if __name__ == "__main__":

    ##### Local data ##############################################################################
    discover_timestamp = int(time.time())

    ##### Define TARGET list ######################################################################
    query_targetlist = "SELECT * FROM `target` ORDER BY `id`"
    targetlist = dbselect(query_targetlist)

    ##### Target enumaeration #####################################################################
    for target in targetlist:
        print("### Starting enumeration for {} ...".format(target[1]))

        ##### Define A record
        r = dns_query(target[3], 'A')
        arecord = ''
        for data in r:
            arecord += "{0} ".format(data)
        arecord_list = arecord.split(" ") # --> use this list for IPADDRESS field in domains table


        r = dns_query(target[3], 'NS')
        nsrecord = ''
        for data in r:
            nsrecord += "{0} ".format(data)
        nsrecord_list = nsrecord.split(" ") # --> use this list for NS field in domains table

        try:
            r = dns_query(target[3], 'MX')
            mxrecord = ''
            for data in r:
                mxrecord += "{0} ".format(data)
            mxrecord_list = mxrecord.split(" ") # --> use this list for MX field in domains table
        except:
            mxrecord_list = ''

        try:
            r = dns_query(target[3], 'TXT')
            txtrecord = ''
            for data in r:
                txtrecord += "{0} ".format(data)
            txtrecord_list = txtrecord.split(" ") # --> use this list for TXT field in domains table
        except:
            txtrecord_list = ''

        '''
        query = "INSERT INTO domains (target, base_url, discover_timestamp, ipaddress, ns, mx, txt, spf) VALUES ('{}', '{}', '{}', '{}', '{}', '{}', '{}', '{}')".format(target[1], target[3], discover_timestamp, arecord_list, nsrecord_list, mxrecord_list)
        dbinsert(query)
        '''

        print("#"*100)
        print("# {}\n#{}\n#{}\n#{}\n".format(arecord_list, nsrecord_list, mxrecord_list, txtrecord_list))


'''
    # check A record
    base_url = sys.argv[1]
    r = dns_query(base_url, 'A')

    # IP list for A record
    arecord = ''
    for data in r:
        arecord += "{0} ".format(data)
    arecord_list = arecord.split(" ")

    # report A Record
    dspace = 29 - len(f"{r}.{domain}")
    print("#"*100)
    print("| Record Type\t | Domain Name                    | IP list\t")
    print("| {0}\t\t | {1}\t | {2}".format('A', domain, IPRecordA))

    # brute force DNS name
    bflist = [
        "act", "admin", "app", "art", "baking", "beauty", "blog", "books", "business", "cars", "chat", 
        "code", "cooking", "crafts", "culture", "design", "development", "education", 
        "email", "entertainment", "environment", "events", "exchange", "fashion", "finance", "fitness", "food", 
        "forum", "ftp", "gaming", "garden", "health", "help", "history", "home", "innovation", 
        "investing", "jobs", "law", "literature", "mail", "marketing", "media", "members", 
        "motivation", "music", "nature", "news", "outdoors", "passion", "pets", "philosophy", 
        "photos", "politics", "portfolio", "realty", "recipes", "religion", "science", "shop", 
        "social", "spirituality", "sports", "startup", "store", "style", "success", "support", 
        "tech", "technology", "travel", "tv", "videos", "wellness", "writing", "www"
    ]
'''    
'''    print("#"*100)
    for r in bflist:
        try:
            thirdleveldomain = r+"."+domain
            dspace = 29 - len(thirdleveldomain)
            ip = socket.gethostbyname(f"{thirdleveldomain}")
            print("| {0}\t\t | {1} {2} | {3}".format('-', f"{thirdleveldomain}", ' '*dspace, ip))
        except:
            print("| {0}\t\t | {1} {2} | {3}".format('-', f"{thirdleveldomain}", ' '*dspace, '-'))'''
