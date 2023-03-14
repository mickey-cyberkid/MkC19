import sys
import socket
import requests
import mechanize
from bs4 import BeautifulSoup as Craft                                             

url = sys.argv[1]
next_url = " "                                                                     

def scrap(page_content):
    global next_url                                                                    
    Crafted = Craft(page_content, 'html.parser')
    data_set = Crafted.findAll("div", class_="Box-row d-flex flex-items-center")
    with open('dependents.mkc','a') as save:
         for data in data_set:
             user_link = data.find("a", class_="text-bold")                                     
             full_link = "https://github.com"+user_link.get("href")
             save.write(full_link+"\n")
    try:
        url = Crafted.find("a", string="Next")                                                   
        next_url = url.get('href')
    except:
        print("All done")
    
    time.sleep(0.6)
    fetch(next_url)

                                                                                   
def fetch(url):
    page = requests.get(url)
    page_content = page.content
    scrap(page_content)                                                            

fetch(url)
