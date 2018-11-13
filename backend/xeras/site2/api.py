from xeras.site2.models import Store
from xeras.site2.models import Category
from xeras.site2.models import Manufacturer
from xeras.site2.models import Post
from xeras.site2.models import Product
from xeras.site2.models import Guarantee
from xeras.site2.models import PhoneInfo
from xeras.site2.models import Installment
from xeras.site2.models import SaleOff
from xeras.site2.models import StoreInventory

import datetime

from django.db.models import Q

# high function


def get_first_item_of_list(query_list):
    if query_list.exists():
        return query_list[0]
    else:
        return None


def get_list_phone_info_by_name(phone_name):
    return PhoneInfo.objects.filter(phoneProductId__productName=phone_name)


def get_phone_info(phone_name):
    list_phone_info = get_list_phone_info_by_name(phone_name)
    if list_phone_info.exists():
        return list_phone_info[0]
    else:
        return None


def get_field_phone_info(phone_name, field):
    if get_phone_info(phone_name) is not None:
        return get_phone_info(phone_name).__dict__[field]
    else:
        return None


def get_sale_off_by_phone_name(phone_name):
    return SaleOff.objects.filter(productId__productName=phone_name).\
        filter(dateStart__lte=datetime.date.today()).filter(dateEnd__gte=datetime.date.today())


def is_phone_sale_off(phone_name):
    list_sale_off = get_sale_off_by_phone_name(phone_name)
    if list_sale_off.exists():
        return True
    else:
        return False


def get_phone_from_country(phone_name, country):
    list_phone_info_by_country = get_list_phone_info_by_name(phone_name).filter(fromCountry=country)
    if list_phone_info_by_country.exists():
        return list_phone_info_by_country[0]
    else:
        return None


def get_phone_feature(phone_name):
    phone_info = get_phone_info(phone_name)
    if phone_info is not None:
        return phone_info.phoneFeature
    else:
        return None


def get_list_store_inverter_by_phone_name(phone_name):
    return StoreInventory.objects.filter(productId__productName=phone_name)


def get_store_inverter(phone_name):
    if get_list_store_inverter_by_phone_name(phone_name).exists():
        return get_list_store_inverter_by_phone_name(phone_name)[0]
    else:
        return None


# def get_store_by_location(phone_name, *option, **options):
#     list_store = Store.objects
#     if 'province' in options:
#         list_store = list_store.filter(province=options['where'])
#     if 'City' in options:
#         list_store = list_store.filter(City=options['City'])
#     if 'district' in options:
#         list_store = list_store.filter(district=options['district'])
#     if 'street' in options:
#         list_store = list_store.filter(street=options['street'])
#     return [store.address1 for store in list_store]

def get_store_by_location(where):
    print(where)
    list_store = Store.objects
    if list_store.filter(province=where).exists():
        list_store = list_store.filter(province=where)
    elif list_store.filter(City=where).exists():
        list_store = list_store.filter(City=where)
    elif 'district' in list_store.filter(district=where):
        list_store = list_store.filter(district=where)
    elif 'street' in list_store.filter(street=where):
        list_store = list_store.filter(street=where)
    print(list(list_store))
    return [store.address1 for store in list_store]


def get_info_installment_by_phone_name(phone_name):
    return Installment.objects.filter(productId__productName=phone_name)[0]


def get_warranty_info(phone_name):
    return Guarantee.objects.filter(productId__productName=phone_name)[0]

# Price


def get_price_by_phone_name(phone_name, *option, **options):
    print('options:', options)
    list_phone_info = get_list_phone_info_by_name(phone_name)
    phone_info = {}
    if options['ROM'] is not None and options['color'] is not None:
        phone_info = list_phone_info.filter(ROM=options['ROM']).filter(color=options['color'])[0]
    elif options['ROM'] is not None:
        phone_info = list_phone_info.filter(ROM=options['ROM'])[0]
    elif options['color'] is not None:
        phone_info = list_phone_info.filter(color=options['color'])[0]
    else:
        # get the first phone
        phone_info = PhoneInfo.objects.filter(phoneProductId__productName=phone_name)[0]
    return phone_info.price1


def get_price_by_sale_off(phone_name, *option):
    list_sale_off = SaleOff.objects.filter(productId__productName=phone_name).\
        filter(dateStart__lte=datetime.date.today()).filter(dateEnd__gte=datetime.date.today())
    sale_off = get_first_item_of_list(list_sale_off)
    if sale_off is not None:
        phone_info = get_list_phone_info_by_name(sale_off.productId.productName)[0]
        return phone_info.price1 - sale_off.saleOffPrice
    else:
        return None


# TODO
def get_price_for_old(phone_name, *option):
    pass


def get_price_by_store(phone_name,  *option, **options):
    list_store_inventory = StoreInventory.objects.filter(storeId__City=options['where']).\
        filter(productId__productName=phone_name)
    store_inventory = get_first_item_of_list(list_store_inventory)
    if store_inventory is not None:
        phone_info = get_list_phone_info_by_name(store_inventory.productId.productName)[0]
        return phone_info.price1
    else:
        return None


def get_price_from_country(phone_name, *option, **options):
    phone_info = get_phone_from_country(phone_name, options['fromCountry'])
    if phone_info is not None:
        return phone_info.price1
    else:
        return None


def get_compare_price(phone_name, *option, **options):
    phone_1 = get_first_item_of_list(get_list_phone_info_by_name(phone_name).filter(ROM=options["firstPhone"]["ROM"]))
    phone_2 = get_first_item_of_list(get_list_phone_info_by_name(phone_name).filter(ROM=options["secondPhone"]["ROM"]))
    if phone_1 is not None and phone_2 is not None:
        if phone_1.price1 > phone_2.price1:
            return phone_1.price1 - phone_2.price1
        else:
            return phone_2.price1 - phone_1.price1
    else:
        return None


# TODO
def is_price_include_tax(phone_name, *option):
    pass


# TODO
def get_price_include_tax(phone_name, *option):
    pass


# Sale off

def get_sale_off_giff(phone_name, *option, **options):
    list_phone_sale_off = get_sale_off_by_phone_name(phone_name)
    if is_phone_sale_off(phone_name):
        return [sale_off.other for sale_off in list_phone_sale_off]
    else:
        return None


def is_sale_off_now(phone_name):
    if is_phone_sale_off(phone_name):
        return True
    else:
        return False


# TODO
def is_sale_off_with_installment(phone_name):
    pass


def get_when_end_sale_off(phone_name):
    list_phone_sale_off = get_sale_off_by_phone_name(phone_name)
    if is_phone_sale_off(phone_name):
        return list_phone_sale_off[0].dateEnd
    else:
        return None


# Hardware


def get_phone_charger_type_info(phone_name):
    return get_field_phone_info(phone_name, 'chargerType')


def get_phone_charge_time(phone_name):
    return get_field_phone_info(phone_name, 'chargerTime')


def get_phone_battery_time_use(phone_name):
    return get_field_phone_info(phone_name, 'phoneTimeUsing')


def get_phone_chip_info(phone_name):
    return get_field_phone_info(phone_name, 'chipset')


def get_phone_front_camera_info(phone_name):
    return get_field_phone_info(phone_name, 'cameraFront')


def get_phone_back_camera_info(phone_name):
    return get_field_phone_info(phone_name, 'cameraBack')


def get_phone_case_info(phone_name):
    return get_field_phone_info(phone_name, 'phoneCase')


def get_phone_ram_info(phone_name):
    return get_field_phone_info(phone_name, 'RAM')


def get_phone_rom_info(phone_name):
    return get_field_phone_info(phone_name, 'ROM')


def get_phone_screen_inch(phone_name):
    return get_field_phone_info(phone_name, 'inch')


def get_phone_screen_type(phone_name):
    return get_field_phone_info(phone_name, 'screenType')


def is_phone_has_4G(phone_name):
    return get_field_phone_info(phone_name, 'phone4G')


def is_phone_has_3G(phone_name):
    return get_field_phone_info(phone_name, 'phone3G')


def get_phone_sim_number(phone_name):
    return get_field_phone_info(phone_name, 'simNumber')


def get_phone_sim_type(phone_name):
    return get_field_phone_info(phone_name, 'simType')


def is_phone_has_water_protected(phone_name):
    return get_field_phone_info(phone_name, 'other')


# Software

def get_phone_os_info(phone_name):
    phone_info = get_phone_info(phone_name)
    if phone_info is not None:
        return phone_info.osType + " " + phone_info.osVersion
    else:
        return None


# TODO
def is_phone_can_update_os(phone_name, *option):
    pass


def is_phone_support_in_language(phone_name, *option, **options):
    list_phone_info = get_list_phone_info_by_name(phone_name)
    language_support = list_phone_info.filter(phoneLanguage__languageName=options['languageName'])
    if language_support.exists():
        return True
    else:
        return False


# from country, phone version


def get_from_country_by_phone_name(phone_name):
    return get_field_phone_info(phone_name, 'fromCountry')


def get_phone_version(phone_name):
    return get_field_phone_info(phone_name, 'version')


def get_phone_code(phone_name):
    phone_info = get_phone_info(phone_name)
    if phone_info is not None:
        return phone_info.phoneCode.code
    else:
        return None


def get_from_type(phone_name):
    return get_field_phone_info(phone_name, 'fromType')


def is_like_new(phone_name):
    phone_info = get_phone_info(phone_name)
    print(f'{phone_info.phoneProductId.productName} - {phone_info.ROM} GB - {phone_info.color}')
    if phone_info is not None:
        if phone_info.status == 'like new':
            return True
        else:
            return False
    else:
        return False


# feature


def get_feature_playing_game(phone_name, *option, **options):
    phone_feature = get_phone_feature(phone_name) # ex: phone_feature = "lien quan, max settings; alpha 8, medium"
    if phone_feature is not None:
        list_game_info = phone_feature.game.split(';')
        for game_info in list_game_info:
            game_info = game_info.split(",")
            game_name = game_info[0]
            if game_name == options['game']:
                return game_info[1]
        return None
    else:
        return None


def get_time_can_play_feature(phone_name, *option, **options):
    phone_feature = get_phone_feature(phone_name)
    if phone_feature is not None:
        list_feature_time_using = phone_feature.featureTimeUsing.split(";") # ex: game, 5 tieng; video, 7 tieng"e
        for feature_time_using in list_feature_time_using:
            feature_time_using = feature_time_using.split(",")
            feature_name = feature_time_using[0]
            if feature_name == options['feature']:
                return feature_time_using[1]
        return None
    else:
        return None


# stocking


def is_stocking_phone_by_name(phone_name):
    if get_store_inverter(phone_name) is not None:
        return get_store_inverter(phone_name).amount > 0
    else:
        return None


def is_stocking_phone_by_color(phone_name, *option, **options):
    list_store_inverter = get_list_store_inverter_by_phone_name(phone_name).\
        filter(productId__in=Product.objects.filter(productName=phone_name).filter(phoneinfo__color=options['color']))
    if list_store_inverter.exists():
        return list_store_inverter[0].amount > 0
    else:
        return None


def get_phone_color(phone_name):
    list_phone_info = get_list_phone_info_by_name(phone_name)
    color = []
    for phone in list_phone_info:
        color.append(phone.color)
    return list(set(color))


def is_stocking_phone_by_store(phone_name, *option, **options):
    list_store_inverter = get_list_store_inverter_by_phone_name(phone_name).\
        filter(Q(storeId__City=options['where']) | Q(storeId__district=options['where']) | Q(storeId__City=options['where']))
    if list_store_inverter.exists():
        return list_store_inverter[0].amount > 0
    else:
        return None


def is_stocking_phone_by_code(phone_name, *option, **options):
    print("is_stocking_phone_by_code")
    list_store_inverter = get_list_store_inverter_by_phone_name(phone_name). \
        filter(productId__in=Product.objects.filter(productName=phone_name).filter(phoneinfo__phoneCode__code=options['code']))
    if list_store_inverter.exists():
        return list_store_inverter[0].amount > 0
    else:
        return None


def is_stocking_phone_by_RAM(phone_name, *option, **options):
    list_store_inverter = get_list_store_inverter_by_phone_name(phone_name). \
        filter(productId__in=Product.objects.filter(productName=phone_name).filter(phoneinfo__RAM=options['RAM']))
    if list_store_inverter.exists():
        return list_store_inverter[0].amount > 0
    else:
        return None


def is_stocking_phone_by_ROM(phone_name,  *option, **options):
    list_store_inverter = get_list_store_inverter_by_phone_name(phone_name). \
        filter(productId__in=Product.objects.filter(productName=phone_name).filter(phoneinfo__ROM=options['ROM']))
    if list_store_inverter.exists():
        return list_store_inverter[0].amount > 0
    else:
        return None


# Address


def get_list_store_have_phone(phone_name, *option, **options):
    list_store_inverter_in_location = get_store_by_location(where=options['where'])
    list_store_inverter = StoreInventory.objects.filter(Q(storeId__address1__in=list_store_inverter_in_location)
                                                                              | Q(amount__gte=0))
    if list_store_inverter.exists():
        return [store_inverter.storeId.address1 for store_inverter in list_store_inverter]
    else:
        return None


# Installment


def get_require_installment(phone_name):
    return get_info_installment_by_phone_name(phone_name).requiredInformation


def get_store_payment(store_name):
    return Store.objects.filter(storeName=store_name)[0].storePayment


def get_installment_payment(phone_name):
    return get_info_installment_by_phone_name(phone_name).credit


def get_installment_paper_needed(phone_name):
    return get_info_installment_by_phone_name(phone_name).note


# Guarantee

def get_warranty_duration(phone_name):
    return get_warranty_duration(phone_name).duration


def get_warranty_note(phone_name):
    return get_warranty_info(phone_name).note
