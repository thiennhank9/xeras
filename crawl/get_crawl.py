from scripts_to_crawl.cellphones_scripts import get_crawl_cellphones
from scripts_to_crawl.thegioididong_scripts import get_crawl_thegioididong

class CrawlAll:
    
    @staticmethod
    def do_get_crawl():
        get_crawl_cellphones()
        get_crawl_thegioididong()