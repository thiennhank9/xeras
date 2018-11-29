import requests
from bs4 import BeautifulSoup
import csv
import pandas as pd
import urllib3

# To disable warnings about SSL is not safe
urllib3.disable_warnings(urllib3.exceptions.InsecureRequestWarning)

def get_page_urls():
    csv_file_pd = pd.read_csv('fpt_urls_page.csv', sep=';')

    page_urls = []

    for index, row in csv_file_pd.iterrows():
        if row["urls"].startswith('http'):
            page_urls.append((row["urls"], row["product_type"]))

    # To remove duplicate urls
    # page_urls = list(set(page_urls))

    return page_urls

def fpt_to_get_urls():
    root_url = 'https://fptshop.com.vn'

    with open('fpt_urls_product.csv', mode='w', newline='') as fpt_urls_page:
        fpt_urls_page = csv.writer(fpt_urls_page, delimiter=',')
        fpt_urls_page.writerow(['urls'])

        for page_url, product_type in get_page_urls():
            
            fpt_urls_page.writerow(["# " + product_type])

            html_text = requests.get(page_url,verify=False).text
            soup = BeautifulSoup(html_text, "html.parser")
            urls_in_tags = soup.find_all("a", {"class": "fs-lpil-img"})

            for url in urls_in_tags:
                url = str(url['href'])
                true_product_url = root_url + url
                fpt_urls_page.writerow([true_product_url])

if __name__ == '__main__':
    fpt_to_get_urls()