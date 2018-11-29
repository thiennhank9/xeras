import requests
from bs4 import BeautifulSoup
import urllib3

# To disable warnings about SSL is not safe
urllib3.disable_warnings(urllib3.exceptions.InsecureRequestWarning)

def get_product_id(url = ''):
    # Remove ".html" at tail
    if url.endswith('.html'):
        url = url[:-5]

    # Get the product id to get comment
    return url.split("-")[-1]

def get_crawl_hoangha(hoangha_urls = []):
    with open('crawl_results/hoangha_comments.csv', 'w', encoding="utf-8-sig") as file:
        print('*** START - Crawling from Hoang Ha ***')
        api_get_comment = 'https://hoanghamobile.com/Ajax/GetComment'

        for url in hoangha_urls:
            # Get the product id to get comment
            product_id = get_product_id(url)
            
            # Each page index got 8 comments, so we got around total 40 comments
            for page_index in range(1, 6):
                html_text = requests.post(api_get_comment, data = {"o": product_id, "p": page_index}, verify=False).text
                soup = BeautifulSoup(html_text, "html.parser")
                comments_in_tags = soup.find_all("div", {"class": "comment-details"})

                for comment in comments_in_tags:
                    comment = str(comment)
                    
                    # Skip staff's comment
                    if ("<br/>") in comment:
                        continue
                    
                    comment = comment.replace('<div class="comment-details">', '')
                    comment = comment.replace('</div>', '')

                    file.write(comment)
                    file.write("\n")

        print('*** FINISHED - Crawled from Hoang Ha ***')
