from site2.database.models import City
from site2.database.models import District
from site2.database.models import Province
from site2.database.models import Store
from site2.database.models import Producer
from site2.database.models import Installment
from site2.database.models import OsType
from site2.database.models import Warranty
from site2.database.models import Phone
from site2.database.models import AmountPhoneByStore
from site2.database.models import SaleOff
from site2.database.models import ReceivedTime
from site2.database.models import Resell
from django.db.models import Q

import datetime
import re

# high function


def get_first_item_of_list(query_list):
    if query_list.exists():
        return query_list[0]
    else:
        return None


def get_list_phone_info_by_name(phone_name):
    return Phone.objects.filter(Q(phoneName__icontains=phone_name) | Q(phoneOtherNames__icontains=phone_name))


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
    return SaleOff.objects.filter(Q(saleOffPhoneId__phoneName__icontains=phone_name) | Q(saleOffPhoneId__phoneOtherNames__icontains=phone_name)).\
        filter(saleOffDateStart__lte=datetime.date.today()).filter(saleOffDateEnd__gte=datetime.date.today())


def is_phone_sale_off(phone_name):
    list_sale_off = get_sale_off_by_phone_name(phone_name)
    if list_sale_off.exists():
        return True
    else:
        return False


def get_phone_from_country(phone_name, country):
    list_phone_info_by_country = get_list_phone_info_by_name(phone_name).filter(fromCountry__icontains=country)
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
    return AmountPhoneByStore.objects.filter(Q(phoneId__phoneName__icontains=phone_name) | Q(phoneId__phoneOtherNames__icontains=phone_name))


def get_store_inverter(phone_name):
    if get_list_store_inverter_by_phone_name(phone_name).exists():
        return get_list_store_inverter_by_phone_name(phone_name)[0]
    else:
        return None


def get_list_received_day(phone_name):
    return ReceivedTime.objects.filter(Q(phoneId__phoneName__icontains=phone_name) | Q(phoneId__phoneOtherNames__icontains=phone_name)).\
    filter(receivedTime__gte=datetime.date.today())


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

def get_store_by_location(where, *option, **options):
    store_manage = Store.objects
    
    # default
    list_store = store_manage.filter(province=where)

    if store_manage.filter(storeProvinceId__provinceName__icontains=where).exists():
        list_store = store_manage.filter(storeProvinceId__provinceName__icontains=where)
    elif store_manage.filter(storeCityId__cityName__icontains=where).exists():
        list_store = store_manage.filter(storeCityId__cityName__icontains=where)
    elif store_manage.filter(storeDistrictId__districtName__icontains=where).exists():
        list_store = store_manage.filter(storeDistrictId__districtName__icontains=where)
    elif store_manage.filter(storeAddress__icontains=where).exists():
        list_store = store_manage.filter(storeAddress__icontains=where)

    if list_store.exists():
        return [store.storeAddress for store in list_store]
    else:
        return None


def get_info_installment_by_phone_name(phone_name):
    list_phone = Phone.objects.filter(Q(phoneName__icontains=phone_name) | Q(phoneOtherNames__icontains=phone_name))
    list_installment = [phone.phoneInstallmentId for phone in list_phone]
    if len(list_installment) != 0:
        return list_installment[0]
    else:
        return None


def get_info_installment_by_field_name(phone_name, field):
    installment_info = get_info_installment_by_phone_name(phone_name)
    if installment_info is not None:
        return installment_info.__dict__[field]
    else:
        return None


def get_warranty_info_by_field_name(phone_name, field):
    list_phone = Phone.objects.filter(Q(phoneName__icontains=phone_name) | Q(phoneOtherNames__icontains=phone_name))
    list_warranty = [phone.phoneWarrantyId for phone in list_phone]
    if len(list_warranty) != 0:
        return list_warranty[0].__dict__[field]
    else:
        return None

# Price


def get_price_by_phone_name(phone_name, *option, **options):
    list_phone_info = get_list_phone_info_by_name(phone_name)
    phone_info = {}

    if 'ROM' in options and 'color' in options:
        phone_info = list_phone_info.filter(phoneMemory=options['ROM']).filter(phoneColor__icontains=options['color'])
    elif 'ROM' in options:
        phone_info = list_phone_info.filter(phoneMemory=options['ROM'])
    elif 'color' in options:
        phone_info = list_phone_info.filter(Q(phoneColor__icontains=options['color']))
    else:
        phone_info = list_phone_info
    
    if phone_info.exists():
        phone_info = phone_info[0]
    else:
        return None

    return phone_info.phonePrice


def get_price_by_sale_off(phone_name, **option):
    list_sale_off = SaleOff.objects.filter(Q(saleOffPhoneId__phoneName__icontains=phone_name) | Q(saleOffPhoneId__phoneOtherNames__icontains=phone_name)).\
        filter(saleOffDateStart__lte=datetime.date.today()).filter(saleOffDateEnd__gte=datetime.date.today())
    sale_off = get_first_item_of_list(list_sale_off)
    if sale_off is not None:
        phone_info = get_list_phone_info_by_name(sale_off.saleOffPhoneId.phoneName)[0]
        return round(phone_info.phonePrice - sale_off.saleOffPriceReduce, 2)
    else:
        return None


# TODO
def get_price_for_old(phone_name, *option):
    pass


def get_price_by_store(phone_name,  *option, **options):
    list_store_inventory = AmountPhoneByStore.objects.filter(Q(storeId__storeCityId__cityName__icontains=options['where']) | Q(storeId__storeProvinceId__provinceName__icontains=options['where']) | Q(storeId__storeDistrictId__districtName__icontains=options['where']) | Q(storeId__storeAddress__icontains=options['where'])).\
        filter(Q(phoneId__phoneName__icontains=phone_name) | Q(phoneId__phoneOtherNames__icontains=phone_name))
    store_inventory = get_first_item_of_list(list_store_inventory)
    if store_inventory is not None:
        phone_info = get_list_phone_info_by_name(store_inventory.phoneId.phoneName)[0]
        return phone_info.phonePrice
    else:
        return None


def get_price_from_country(phone_name, *option, **options):
    phone_info = get_phone_from_country(phone_name, options['where'])
    if phone_info is not None:
        return phone_info.phonePrice
    else:
        return None


def get_compare_price(phone_name, *option, **options):
    phone_1 = get_first_item_of_list(get_list_phone_info_by_name(phone_name).filter(phoneMemory=options["firstPhone"]["ROM"]))
    phone_2 = get_first_item_of_list(get_list_phone_info_by_name(phone_name).filter(phoneMemory=options["secondPhone"]["ROM"]))
    if phone_1 is not None and phone_2 is not None:
        if phone_1.phonePrice > phone_2.phonePrice:
            return round(phone_1.phonePrice - phone_2.phonePrice, 2)
        else:
            return round(phone_2.phonePrice - phone_1.phonePrice, 2)
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
        return ','.join([sale_off.saleOffNote for sale_off in list_phone_sale_off])
    else:
        return None


def is_sale_off_now(**options):
    if is_phone_sale_off(phone_name=options['phone_name']):
        return True
    else:
        return False


# TODO
def is_sale_off_with_installment(phone_name):
    pass


def get_when_end_sale_off(**options):
    list_phone_sale_off = get_sale_off_by_phone_name(phone_name=options['phone_name'])
    if is_phone_sale_off(phone_name=options['phone_name']):
        return list_phone_sale_off[0].saleOffDateEnd
    else:
        return None


# Hardware


def get_phone_charger_type_info(phone_name, *option, **options):
    return get_field_phone_info(phone_name, 'phoneChargerType')


def get_phone_charge_time(phone_name, **options):
    charge_time = get_field_phone_info(phone_name, 'phoneChargerTime')
    if charge_time == int(charge_time):
        return int(charge_time)
    return charge_time


def get_phone_battery_time_use(phone_name, **options):
    return get_field_phone_info(phone_name, 'phoneTimeUsing')


def get_phone_chip_info(phone_name, **options):
    return get_field_phone_info(phone_name, 'phoneChip')


def get_phone_front_camera_info(phone_name, **options):
    front_camera = get_field_phone_info(phone_name, 'phoneFrontCamera')
    if front_camera == int(front_camera):
        return int(front_camera)
    return front_camera


def get_phone_back_camera_info(phone_name, **options):
    return get_field_phone_info(phone_name, 'phoneBackCamera')


def get_phone_case_info(phone_name, **options):
    return get_field_phone_info(phone_name, 'phoneNote')


def get_phone_ram_info(phone_name, **options):
    return get_field_phone_info(phone_name, 'phoneRAM')


def get_phone_rom_info(phone_name, **options):
    return get_field_phone_info(phone_name, 'phoneMemory')


def get_phone_screen_inch(phone_name, **options):
    screen_inch = get_field_phone_info(phone_name, 'phoneInch')
    if screen_inch == int(screen_inch):
        return int(screen_inch)
    return screen_inch


def get_phone_screen_type(phone_name, **options):
    return get_field_phone_info(phone_name, 'phoneScreenType')


def is_phone_has_4G(phone_name, **options):
    return get_field_phone_info(phone_name, 'phone4G')


def is_phone_has_3G(phone_name, **options):
    return get_field_phone_info(phone_name, 'phone3G')


def get_phone_sim_number(phone_name, **options):
    return get_field_phone_info(phone_name, 'simNumber')


def get_phone_sim_type(phone_name, **options):
    return get_field_phone_info(phone_name, 'phoneNumberOfSim')


def is_phone_has_water_protected(phone_name, **options):
    return get_field_phone_info(phone_name, 'phoneNote')


# Software

def get_phone_os_info(phone_name, *option, **options):
    phone_info = get_phone_info(phone_name)
    if phone_info is not None:
        return phone_info.phoneOsIypeId.osTypeName
    else:
        return None


# TODO
def is_phone_can_update_os(phone_name, *option):
    pass


def is_phone_support_in_language(phone_name, *option, **options):
    list_phone_info = get_list_phone_info_by_name(phone_name)
    if 'language_name' in options:
        language_name = options['language_name']
    else:
        language_name = 'Tiếng Việt'

    language_support = list_phone_info.filter(phoneLanguage__icontains=language_name)

    if language_support.exists():
        return language_name
    else:
        return False


# from country, phone version


def get_from_country_by_phone_name(phone_name, *option, **options):
    return get_field_phone_info(phone_name, 'fromCountry')


def get_phone_version(phone_name, **options):
    return get_field_phone_info(phone_name, 'phoneEdition')


def get_phone_code(phone_name, **options):
    phone_info = get_phone_info(phone_name)
    if phone_info is not None:
        return phone_info.phoneCode
    else:
        return None


def get_from_type(phone_name, **options):
    return get_field_phone_info(phone_name, 'phoneEdition')


def is_like_new(phone_name, **options):
    phone_info = get_phone_info(phone_name)
    print(f'{phone_info.phoneName} - {phone_info.ROM} GB - {phone_info.color}')
    if phone_info is not None:
        if 'like new' in phone_info.status:
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
            if re.search(options['game'], game_name, re.IGNORECASE):
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
            if 'feature' in options:
                if re.search(options['feature'], feature_name, re.IGNORECASE):
                    return feature_time_using[1].strip()
            else:
                if re.search('game', feature_name, re.IGNORECASE):
                    return feature_time_using[1].strip()
        return None
    else:
        return None


# stocking


def is_stocking_phone_by_name(phone_name, *option, **options):
    if get_store_inverter(phone_name) is not None:
        return get_store_inverter(phone_name).amount > 0
    else:
        return None


def is_stocking_phone_by_color(phone_name, *option, **options):
    list_store_inverter = get_list_store_inverter_by_phone_name(phone_name).\
        filter(phoneId__in=Phone.objects.filter((Q(phoneName__icontains=phone_name) | Q(phoneOtherNames__icontains=phone_name))).filter(phoneColor__icontains=options['color']))
    if list_store_inverter.exists():
        return list_store_inverter[0].amount > 0
    else:
        return None


def get_phone_color(phone_name, **options):
    list_phone_info = get_list_phone_info_by_name(phone_name)
    color = []
    for phone in list_phone_info:
        color.append(phone.phoneColor.lower())
    return list(set(color))


def is_stocking_phone_by_store(phone_name, *option, **options):
    list_store_inverter = get_list_store_inverter_by_phone_name(phone_name).\
        filter(Q(storeId__storeCityId__cityName__icontains=options['where']) | Q(storeId__storeProvinceId__provinceName__icontains=options['where']) | Q(storeId__storeDistrictId__districtName__icontains=options['where']) | Q(storeId__storeAddress__icontains=options['where']))
    if list_store_inverter.exists():
        return list_store_inverter[0].amount > 0
    else:
        return None


def is_stocking_phone_by_code(phone_name, *option, **options):
    list_store_inverter = get_list_store_inverter_by_phone_name(phone_name). \
        filter(phoneId__in=Phone.objects.filter(Q(phoneName__icontains=phone_name) | Q(phoneOtherNames__icontains=phone_name)).filter(phoneCode__icontains=options['code']))
    if list_store_inverter.exists():
        return list_store_inverter[0].amount > 0
    else:
        return None


def is_stocking_phone_by_RAM(phone_name, *option, **options):
    list_store_inverter = get_list_store_inverter_by_phone_name(phone_name). \
        filter(phoneId__in=Phone.objects.filter(Q(phoneName__icontains=phone_name) | Q(phoneOtherNames__icontains=phone_name)).filter(phoneRAM=options['RAM']))
    if list_store_inverter.exists():
        return list_store_inverter[0].amount > 0
    else:
        return None


def is_stocking_phone_by_ROM(phone_name,  *option, **options):
    list_store_inverter = get_list_store_inverter_by_phone_name(phone_name). \
        filter(phoneId__in=Phone.objects.filter(Q(phoneName__icontains=phone_name) | Q(phoneOtherNames__icontains=phone_name)).filter(phoneMemory=options['ROM']))
    if list_store_inverter.exists():
        return list_store_inverter[0].amount > 0
    else:
        return None


# Address


def get_list_store_have_phone(phone_name, *option, **options):
    list_store_inverter_in_location = get_store_by_location(where=options['where'])
    if list_store_inverter_in_location is not None:
        list_store_inverter = AmountPhoneByStore.objects.filter(Q(storeId__storeAddress__in=list_store_inverter_in_location), Q(phoneId__phoneName__icontains=phone_name) | Q(phoneId__phoneOtherNames__icontains=phone_name), Q(amount__gt=0))
        if list_store_inverter.exists():
            return [store_inverter.storeId.storeAddress for store_inverter in list_store_inverter]
        else:
            return None
    else:
        return None


# Installment


def get_require_installment(phone_name, **options):
    return get_info_installment_by_field_name(phone_name, 'get_require_installment')


def get_store_payment(store_name, **options):
    if Store.objects.filter(storeName__icontains=store_name).exists():
        return Store.objects.filter(storeName__icontains=store_name)[0].storePayment
    else:
        return None


def get_installment_payment(phone_name, **options):
    return get_info_installment_by_field_name(phone_name, 'installmentNote')


def get_installment_paper_needed(phone_name, *option, **options):
    return get_info_installment_by_field_name(phone_name, 'installmentNote')


# Guarantee

def get_warranty_duration(phone_name, **options):
    return get_warranty_info_by_field_name(phone_name, 'warrantyDuration')


def get_warranty_note(phone_name, *option, **options):
    return get_warranty_info_by_field_name(phone_name, 'warrantyNote')


# Expected Received Date

def get_received_date_by_color(list_received_date, phone_name, color):
    return list_received_date.filter(phoneId__in=Phone.objects.filter(Q(phoneName__icontains=phone_name) | Q(phoneOtherNames__icontains=phone_name)).filter(phoneColor__icontains=color))


def get_received_date_by_RAM(list_received_date, phone_name, RAM):
    return list_received_date.filter(phoneId__in=Phone.objects.filter(Q(phoneName__icontains=phone_name) | Q(phoneOtherNames__icontains=phone_name)).filter(phoneRAM=RAM))


def get_received_date_by_ROM(list_received_date, phone_name, ROM):
    return list_received_date.filter(phoneId__in=Phone.objects.filter(Q(phoneName__icontains=phone_name) | Q(phoneOtherNames__icontains=phone_name)).filter(phoneMemory=ROM))


def get_received_date_by_store(list_received_date, phone_name, where):
    return list_received_date.filter(Q(storeId__storeCityId__cityName__icontains=where) | Q(storeId__storeProvinceId__provinceName__icontains=where) | Q(storeId__storeDistrictId__districtName__icontains=where))


def get_received_date_by_phone_property(phone_name, **options):
    list_received_date = get_list_received_day(phone_name)

    if 'color' in options:
        list_received_date = get_received_date_by_color(list_received_date, phone_name, options['color'])
    if 'RAM' in options:
        list_received_date = get_received_date_by_RAM(list_received_date, phone_name, options['RAM'])
    if 'ROM' in options:
        list_received_date = get_received_date_by_ROM(list_received_date, phone_name, options['ROM'])
    if 'where' in options:
        list_received_date = get_received_date_by_store(list_received_date, phone_name, options['where'])

    if list_received_date.exists():
        return list_received_date
    else:
        return None


def get_received_date_when_have_week(phone_name, **options):
    list_received_date = get_received_date_by_phone_property(phone_name, **options)

    today = datetime.datetime.today()
    day_number_of_weekday = {'thứ 2': 0, 'thứ 3': 1, 'thứ 4': 2, 'thứ 5': 3, 'thứ 6': 4, 'thứ 7': 5, 'chủ nhật': 6}

    today_number_of_weekday = today.weekday()
    expected_day_number_of_weekday = day_number_of_weekday[options['date']]
    distance_day = 0

    if options['week'] in ['tuần này']:
        distance_day = expected_day_number_of_weekday - today_number_of_weekday

    if options['week'] in ['tuần sau', 'tuần tới']:
        distance_day = expected_day_number_of_weekday - today_number_of_weekday + 7

    expected_day = today + datetime.timedelta(days=distance_day)

    list_received_date = list_received_date.filter(receivedTime__lte=expected_day)

    if list_received_date.exists():
        return list_received_date
    else:
        return None


def get_received_date(phone_name, **options):
    if 'week' in options:
        list_received_date = get_received_date_when_have_week(phone_name, **options)
    else:
        list_received_date = get_received_date_by_phone_property(phone_name, **options)

    if list_received_date is not None:
        return list_received_date[0].receivedTime.strftime('%d-%m-%Y')
    else:
        return None


# buy older and allow change phone

def is_buy_older_allow_change_available(phone_name, **options):
    list_event_available = Resell.objects.filter(Q(phoneId__phoneName__icontains=phone_name) | Q(phoneId__phoneOtherNames__icontains=phone_name)).\
        filter(dateStart__lte=datetime.date.today()).filter(dateEnd__gte=datetime.date.today())

    if list_event_available.exists():
        return True
    else:
        return False
