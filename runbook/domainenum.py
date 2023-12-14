# Descr: get domain name informations
# Usage: dnsenum.py TargetDomain.url

import sys, time, requests, json, socket
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
        print("#"*100)
        print("# Starting enumeration for {} ...".format(target[1]))

        ##### Define records
        arecord = ''
        r = dns_query(target[3], 'A')
        for data in r:
            arecord += "{0} ".format(data)
        arecord_list = arecord.split(" ") # --> use this list for IPADDRESS field in domains table

        nsrecord = ''
        r = dns_query(target[3], 'NS')
        for data in r:
            nsrecord += "{0} ".format(data)
        nsrecord_list = nsrecord.split(" ") # --> use this list for NS field in domains table

        mxrecord = ''
        try:
            r = dns_query(target[3], 'MX')
            for data in r:
                mxrecord += "{0} ".format(data)
            mxrecord_list = mxrecord.split(" ") # --> use this list for MX field in domains table
        except:
            mxrecord_list = ''

        txtrecord = ''
        try:
            r = dns_query(target[3], 'TXT')
            for data in r:
                txtrecord += "{0} ".format(data)
            txtrecord_list = txtrecord.split(" ") # --> use this list for TXT field in domains table
        except:
            txtrecord_list = ''

        query = "INSERT INTO domains (target, base_url, discover_timestamp, ipaddress, ns, mx, txt) VALUES ('{}', '{}', '{}', '{}', '{}', '{}', '{}')".format(target[1], target[3], discover_timestamp, arecord, nsrecord, mxrecord, txtrecord)
        dbinsert(query)
        '''
        print("#"*100)
        print("# {}\n# {}\n# {}\n# {}\n".format(arecord_list, nsrecord_list, mxrecord_list, txtrecord_list))
        '''
        ##### Subdomain enumaeration ##############################################################

        for A in arecord_list:
            if A != '' and len(A) > 3:
                print("New IP address discovered: {}".format(A))
        
        for NS in nsrecord_list:
            if NS != '' and len(NS) > 3:
                ipaddress = socket.gethostbyname(NS)
                print("New NS record discovered: {}".format(NS))
                query_subdomain = "INSERT INTO subdomain (target, subdomain, type, ipaddress, discover_timestamp) VALUES ('{}', '{}', '{}', '{}', '{}')".format(target[1], NS, 'NS', ipaddress, discover_timestamp)
                dbinsert(query_subdomain)

        for MX in mxrecord_list:
            if MX != '' and len(MX) > 3:
                ipaddress = socket.gethostbyname(MX)
                print("New MX record discovered: {}".format(MX))
                query_subdomain = "INSERT INTO subdomain (target, subdomain, type, ipaddress, discover_timestamp) VALUES ('{}', '{}', '{}', '{}', '{}')".format(target[1], MX, 'MX', ipaddress, discover_timestamp)
                dbinsert(query_subdomain)

        for TXT in txtrecord_list:
            if TXT != '' and len(TXT) > 3:
                if 'include' in TXT:
                    txt_subdomain = TXT.split(':')
                    ipaddress = socket.gethostbyname(txt_subdomain[1])
                    print("New TXT record discovered: {}".format(txt_subdomain[1]))
                    query_subdomain = "INSERT INTO subdomain (target, subdomain, type, ipaddress, discover_timestamp) VALUES ('{}', '{}', '{}', '{}', '{}')".format(target[1], txt_subdomain[1], 'TXT', ipaddress, discover_timestamp)
                    dbinsert(query_subdomain)

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
