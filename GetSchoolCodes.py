from webbrowser import Chrome
from selenium import webdriver
from selenium.webdriver.common.by import By

# from webdriver_manager.chrome import ChromeDriverManager

url = "https://oscar.gatech.edu/pls/bprod/wwtraneq.P_TranEq_Nme"
# url = "https://google.com"

opts = webdriver.ChromeOptions()
opts.add_experimental_option("detach", True)

driver = webdriver.Chrome(chrome_options=opts,executable_path="/Users/alexfrawley/Documents/HackGT/chromedriver")

#letter 3-28
for letter in range(3,29):
    driver.get(url)

    driver.find_element(By.XPATH,"/html/body/div[3]/form/p[2]/table/tbody/tr[1]/td[2]/select/option["+str(letter)+"]").click()#letter
    driver.find_element(By.XPATH, "/html/body/div[3]/form/p[2]/input").click()
    # now on school list

    #get num schools and loop thru to get 
    schoolOptions = driver.find_element(By.ID, "name_id")
    options = [x for x in schoolOptions.find_elements(By.TAG_NAME, "option")]
    options.pop(0)
    # schoolInfo = {}
    f = open("schools.csv", "a")
    for element in options:
        f.write(element.get_attribute("value") + "," + element.text + "\r\n")
        # print(element.text)
        # schoolInfo[element.get_attribute("value")] = element.text
        # print("School code: " + element.get_attribute("value") + " School Name: " + element.text)

    # print(schoolInfo)

    f.close()