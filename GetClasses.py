from time import sleep
import requests
import re

url = 'https://oscar.gatech.edu/pls/bprod/wwtraneq.P_TranEq_Rpt'


file1 = open('schools.csv', 'r')
Lines = file1.readlines()
f = open("classData.csv", "a")

errorfile = open("errors.csv", "a")
for line in Lines:
    x = re.split(",",line)
    sbgi = x[0]
    schoolName = x[1].strip()
    params = {'Letter': str(schoolName[0]), 'sbgi_code': str(sbgi)}
    x = requests.post(url, data = params)
    clean = re.compile('<.*?>')
    text = re.sub(clean, '', x.text)
    text = re.split("\n\n\n\n", text)
    location = re.split("\n",text[8])[-1]
    location = location.replace(",", " ")
    location = location.replace("&nbsp;", " ")
    text = text[9]
    classes = re.split("\n\n\n&nbsp;\n\n\n",text)
    try:
        for eachClass in classes:
            data = re.split("\n", eachClass)
            data = [item.strip() for item in data]
            data = list(filter(None, data))
            transferClassName = data[0]
            GTClassName = data[14]
            GTCreditHours = data[16]
            f.write(sbgi + "," + schoolName + "," + transferClassName + "," + GTClassName + "," + GTCreditHours + "," + location + "\r\n")
    except:
        errorfile.write(sbgi + "," + schoolName + "\r\n")
    print(schoolName + " " + sbgi)