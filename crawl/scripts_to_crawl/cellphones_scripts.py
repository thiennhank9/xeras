import requests
import json

from urls_to_crawl.cellphones_urls import CELLPHONES_URLS

def get_crawl_cellphones():
    with open('crawl_results/comments_cellphones.csv', 'w', encoding="utf-8-sig") as file:
        print('*** START - Crawling from CellphoneS ***')

        for cellphones_url in CELLPHONES_URLS:
            cellphones_true_api = "https://cellphones.izicomment.com/api/comments?url=https%3A%2F%2Fcellphones.com.vn%2F" + cellphones_url[26:] + "&sort_col=time_stamp&sort_order=desc&limit=100"
            cellphones_comments = requests.get(cellphones_true_api).json()

            for comment_object in cellphones_comments["comments"]:
                comment = comment_object["comment"]
                comment = comment.replace("<div>", "")
                comment = comment.replace("<p>", "")
                comment = comment.replace('</div>', "")
                comment = comment.replace('</p>', "")
                comment = comment.replace('***', '')

                file.write(comment)
                file.write("\n")
        
        print('*** FINISHED - Crawling from CellphoneS ***')