import requests
from bs4 import BeautifulSoup
import urllib3

# To disable warnings about SSL is not safe
urllib3.disable_warnings(urllib3.exceptions.InsecureRequestWarning)

def get_crawl_fpt(fpt_urls = []):
    with open('crawl_results/fpt_comments.csv', 'w', encoding="utf-8-sig") as file:
        print('*** START - Crawling from FPT ***')

        for url in fpt_urls:
            html_text = requests.get(url, verify=False).text
            soup = BeautifulSoup(html_text, "html.parser")
            comments_in_tags = soup.find_all("div", {"class": "f-cmmain"})

            for comment in comments_in_tags:
                comment = str(comment)

                # Skip staff's comment
                if ("<p>") in comment:
                    continue

                comment = comment.replace('<div class="f-cmmain">', '')
                comment = comment.replace('</div>', '')

                file.write(comment)
                file.write("\n")

        print('*** FINISHED - Crawled from FPT ***')
