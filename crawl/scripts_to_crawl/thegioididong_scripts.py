import requests
from bs4 import BeautifulSoup

def get_crawl_thegioididong(tgdd_urls = []):
    with open('crawl_results/comments_thegioididong.csv', 'w', encoding="utf-8-sig") as file:
        print('*** START - Crawling from TheGioiDiDong ***')

        for tgdd_url in tgdd_urls:
            html_text = requests.get(tgdd_url).text
            soup = BeautifulSoup(html_text, "html.parser")
            comments_in_tags = soup.find_all("div", {"class": "question"})

            for comment in comments_in_tags:
                comment = str(comment)
                comment = comment.replace('<div class="question">', '')
                comment = comment.replace('</div>', '')

                file.write(comment)
                file.write("\n")

        print('*** FINISHED - Crawled from TheGioiDiDong ***')
