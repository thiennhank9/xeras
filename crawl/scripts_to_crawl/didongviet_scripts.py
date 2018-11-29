import requests
from bs4 import BeautifulSoup

def get_crawl_didongviet(ddv_urls = []):
    with open('crawl_results/didongviet_comments.csv', 'w', encoding="utf-8-sig") as file:
        print('*** START - Crawling from Di Dong Viet ***')

        for ddv_url in ddv_urls:
            html_text = requests.get(ddv_url).text
            soup = BeautifulSoup(html_text, "html.parser")
            comments_in_tags = soup.find_all("div", {"class": "review-content"})

            for comment in comments_in_tags:
                comment = str(comment)

                # Skip staff's comment
                if ("<br/>") in comment:
                    continue

                comment = comment.replace('<div class="review-content" itemprop="description">', '')
                comment = comment.replace('</div>', '')
                comment = comment.replace('\t', '')
                comment = comment.strip()
                
                file.write(comment)
                file.write("\n")

        print('*** FINISHED - Crawled from Di Dong Viet ***')
