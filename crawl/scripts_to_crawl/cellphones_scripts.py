import requests

def get_crawl_cellphones(cellphones_urls = []):
    with open('crawl_results/cellphones_comments.csv', 'w', encoding="utf-8-sig") as file:
        print('*** START - Crawling from CellphoneS ***')
        limit_comments = 50

        for cellphones_url in cellphones_urls:
            cellphones_true_api = "https://cellphones.izicomment.com/api/comments?url=https%3A%2F%2Fcellphones.com.vn%2F" + cellphones_url[26:] + "&sort_col=time_stamp&sort_order=desc&limit=" + str(limit_comments)
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

        print('*** FINISHED - Crawled from CellphoneS ***')
