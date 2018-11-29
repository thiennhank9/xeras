import requests
from bs4 import BeautifulSoup
import urllib3

def get_crawl_viettel(viettel_urls = []):
    with open('crawl_results/viettel_comments.csv', 'w', encoding="utf-8-sig") as file:
        print('*** START - Crawling from Viettel ***')

        # html_text = requests.get('https://viettelstore.vn/dien-thoai/iphone-xs-max-pid129935.html', headers={'Content-Type': 'application/json', "Cookie": "D1N=0c482eb7e3f6b08afcb6a623495ea69a; path=/"}, verify=False).text
        # print(html_text)
        # soup = BeautifulSoup(html_text, "html.parser")
        # comments_in_tags = soup.find_all("div", {"class": "c"})

        # for comment in comments_in_tags:
        #     comment = str(comment)
        #     print(comment)

        # s = requests.Session() 
        # re = s.post('https://viettelstore.vn/Site/_Sys/GetUserControl.aspx',
        #     headers={}, 
        #     data={'path': 'Product!cmt_item','Product_ID': 129935,'News_ID': '','PageSize': 10,'cmt_name': '','CurrentPage': 1,'KeyWord': ''}, 
        #     verify=False)
        get_temp = requests.get('https://viettelstore.vn/Site/_Sys/GetUserControl.aspx', verify=False)
        print(get_temp.cookies)
        # print(re.cookies)
        print('*** FINISHED - Crawled from Viettel ***')