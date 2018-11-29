import requests
from bs4 import BeautifulSoup
import csv
import pandas as pd
import urllib3

# To disable warnings about SSL is not safe
urllib3.disable_warnings(urllib3.exceptions.InsecureRequestWarning)

def get_page_urls():
    csv_file_pd = pd.read_csv('didongviet_urls_page.csv', sep=';')

    page_urls = []

    for index, row in csv_file_pd.iterrows():
        if row["urls"].startswith('http'):
            page_urls.append((row["urls"], row["product_type"]))

    return page_urls

def didongviet_to_get_urls():
    with open('didongviet_urls_product.csv', mode='w', newline='') as didongviet_urls_page:
        didongviet_urls_page = csv.writer(didongviet_urls_page, delimiter=',')
        didongviet_urls_page.writerow(['urls'])

        for page_url, product_type in get_page_urls():
            didongviet_urls_page.writerow(["# " + product_type])

            html_text = requests.get(page_url, verify=False).text

            soup = BeautifulSoup(html_text, "html.parser")
            urls_in_tags = soup.find_all("a", {"class": "product-item-link"})

            for url in urls_in_tags:
                url = str(url['href'])
                didongviet_urls_page.writerow([url])

if __name__ == '__main__':
    didongviet_to_get_urls()