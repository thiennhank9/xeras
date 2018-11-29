import pandas as pd

from scripts_to_crawl.cellphones_scripts import get_crawl_cellphones
from scripts_to_crawl.thegioididong_scripts import get_crawl_thegioididong

# List sites to crawl, if you don't want to crawl, just comment that line
SITES_TO_CRAWL = [
    'tgdd',
    'cellphones'
]

FILES_ROOT_PATH = 'urls_to_crawl/'
FILES_AND_PATHS = [
    ('tgdd', 'thegioididong_urls.csv'),
    ('cellphones', 'cellphones_urls.csv')
]

class CrawlAll:
    tgdd_urls = []
    cellphones_urls = []

    def load_urls_to_crawl(self):
        print("*** START - loading urls from files ***")

        for site, path in FILES_AND_PATHS:
            # Doesn't do crawl job if site is not in Sites to crawl
            if site not in SITES_TO_CRAWL:
                continue
            
            true_path = FILES_ROOT_PATH + path
            csv_file_pd = pd.read_csv(true_path, sep=';')

            site_urls = []
            for index, row in csv_file_pd.iterrows():
                if row["urls"].startswith('http'):
                    site_urls.append(row["urls"])

            # To remove duplicate urls
            site_urls = list(set(site_urls))

            if site == 'tgdd':
                self.tgdd_urls = site_urls
            if site == 'cellphones':
                self.cellphones_urls = site_urls

        print("*** FINISHED - loaded urls from files ***")

    def start_crawl(self):
        # Doesn't do crawl job if site is not in Sites to crawl
        for site in SITES_TO_CRAWL:
            if site == 'tgdd':
                get_crawl_thegioididong(self.tgdd_urls)
            if site == 'cellphones':
                get_crawl_cellphones(self.cellphones_urls)

    def do_job_crawl(self):
        self.load_urls_to_crawl()
        self.start_crawl()
