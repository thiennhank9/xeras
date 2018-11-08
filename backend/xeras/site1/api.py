from xeras.site1.models import Store
from xeras.site1.models import Category
from xeras.site1.models import Manufacturer
from xeras.site1.models import Post
from xeras.site1.models import Product
from xeras.site1.models import Guarantee
from xeras.site1.models import PhoneInfo
from xeras.site1.models import GuaranteeAndProduct
from xeras.site1.models import Installment
from xeras.site1.models import InstallmentAndProduct
from xeras.site1.models import SaleOff
from xeras.site1.models import StoreInventory

import datetime

# Price


def get_price_by_phone_name(phone_name, *option):
    phone_info = ''
    if option.rom is not None and option.color is not None:
        phone_info = PhoneInfo.objects.filter(phoneProductId__productName=phone_name).\
            filter(rom=option.rom).filter(color=option.color)
    elif option.rom is not None:
        phone_info = PhoneInfo.objects.filter(phoneProductId__productName=phone_name).\
            filter(rom=option.rom)
    elif option.color is not None:
        phone_info = PhoneInfo.objects.filter(phoneProductId__productName=phone_name).\
            filter(rom=option.color)
    else:
        phone_info = PhoneInfo.objects.filter(phoneProductId__productName=phone_name)
    return phone_info.price1


def get_price_by_sale_off(phone_name, *option):
    sale_off = SaleOff.objects.filter(productId__productName=phone_name).\
        filter(dateStart__lte=datetime.date.today()).filter(dateEnd__gte=datetime.date.today())
    if sale_off is not None:
        phone_info = PhoneInfo.objects.get(phoneProductId=sale_off.productId)
        return phone_info.price1 - option.saleOffPrice
    else:
        return "phone in sale off"


# TODO
def get_price_for_old(phone_name, *option):
    pass


def get_price_by_store(phone_name, *option):
    store_inventory = StoreInventory.filter(storeId__address1=option.where).filter(productId__productName=phone_name)
    if store_inventory is not None:
        phone_info = PhoneInfo.objects.filter(phoneProductId=store_inventory.productId)
        return phone_info.price1
    else:
        return "store not have this phone"


def get_price_from_country(phone_name, *option):
    pass


def get_compare_price(phone_name, **option):
    phone_1 = PhoneInfo.objects.filter(phoneProductId__productName=phone_name).filter(ROM=option.firstPhone.rom)
    phone_2 = PhoneInfo.objects.filter(phoneProductId__productName=phone_name).filter(ROM=option.secondPhone.rom)
    if phone_1.price1 > phone_2.price:
        return phone_1.price1 - phone_2.price1
    else:
        return phone_2.price1 - phone_1.price1


def is_price_include_tax(phone_name, *option):
    pass


def get_price_include_tax(phone_name, *option):
    pass
