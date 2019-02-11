from site1.database.models import Store
from site1.database.models import Category
from site1.database.models import Manufacturer
from site1.database.models import Post
from site1.database.models import Product
from site1.database.models import Guarantee
from site1.database.models import PhoneInfo
from site1.database.models import Installment
from site1.database.models import SaleOff
from site1.database.models import StoreInventory
from site1.database.models import DayReceivedPhone
from site1.database.models import BuyAndAllowChange
from django.db.models import Q

from django.forms.models import model_to_dict

import datetime
import re

# Custom model to dictionary

def custom_model_to_dict(model):
    return model_to_dict(model, fields=[field.name for field in model._meta.fields if "id" not in field.name if "Id" not in field.name])


def remove_zero_after_dot_float(number):
    if number == int(number):
        return int(number)
    return number

# API 1

def get_list_phone_info_by_name(phone_name):
    return PhoneInfo.objects.filter(Q(phoneProductId__productName__iexact=phone_name) | Q(phoneProductId__productOtherNames__iexact=phone_name))

def get_list_sale_off(phone_name, **option):
    list_sale_off = SaleOff.objects.filter(Q(productId__productName__iexact=phone_name) | Q(productId__productOtherNames__iexact=phone_name)).\
        filter(dateStart__lte=datetime.date.today()).filter(dateEnd__gte=datetime.date.today())

    # convert object to dict
    list_sale_off_dict = [custom_model_to_dict(sale_off) for sale_off in list_sale_off]
    
    return list_sale_off_dict

def get_list_store_have_phone(phone_name, **options):
    list_store_inventory = StoreInventory.objects.filter(Q(storeId__City__icontains=options['store_address']) | Q(storeId__province__icontains=options['store_address']) | Q(storeId__street__icontains=options['store_address']) | Q(storeId__district__icontains=options['store_address'])).\
        filter(Q(productId__productName__iexact=phone_name) | Q(productId__productOtherNames__iexact=phone_name)).filter(Q(amount__gt=0))

    list_store = []
    if list_store_inventory.exists():
        list_store = [custom_model_to_dict(store_inventory.storeId) for store_inventory in list_store_inventory]

    return list_store


def is_phone_support_in_language(phone_name, **options):
    list_phone_info = get_list_phone_info_by_name(phone_name)
    if 'language_name' in options:
        language_name = options['language_name']
    else:
        language_name = 'Tiếng Việt'

    language_support = list_phone_info.filter(phoneLanguage__languageName__icontains=language_name)

    if language_support.exists():
        return True
    else:
        return False

# software 

def get_feature_playing_game(phone_feature, game):
    # phone_feature is dictionary
    # ex: phone_feature = "lien quan, max settings; alpha 8, medium"
    if len(phone_feature) > 0:
        list_game_info = phone_feature['game'].split(';')
        for game_info in list_game_info:
            game_info = game_info.split(",")
            game_name = game_info[0]
            if re.search(game, game_name, re.IGNORECASE):
                return game_info[1]
        return None
    else:
        return None


def get_time_can_play_feature(phone_feature, **options):
    if len(phone_feature) > 0:
        list_feature_time_using = phone_feature['featureTimeUsing'].split(";") # ex: game, 5 tieng; video, 7 tieng"e
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

# Expected Received Date

def get_list_received_day(phone_name):
    return DayReceivedPhone.objects.filter(Q(productId__productName__iexact=phone_name) | Q(productId__productOtherNames__iexact=phone_name)).\
    filter(receivedDate__gte=datetime.date.today())

def get_received_date_by_color(list_received_date, phone_name, color):
    return list_received_date.filter(productId__in=Product.objects.filter(Q(productName__iexact=phone_name) | Q(productOtherNames__iexact=phone_name)).filter(phoneinfo__color__icontains=color))


def get_received_date_by_RAM(list_received_date, phone_name, RAM):
    return list_received_date.filter(productId__in=Product.objects.filter(Q(productName__iexact=phone_name) | Q(productOtherNames__iexact=phone_name)).filter(phoneinfo__RAM=RAM))


def get_received_date_by_ROM(list_received_date, phone_name, ROM):
    return list_received_date.filter(productId__in=Product.objects.filter(Q(productName__iexact=phone_name) | Q(productOtherNames__iexact=phone_name)).filter(phoneinfo__ROM=ROM))


def get_received_date_by_store(list_received_date, phone_name, where):
    return list_received_date.filter(Q(storeId__City__icontains=where) | Q(storeId__district__icontains=where) | Q(storeId__City__icontains=where))


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

    list_received_date = list_received_date.filter(receivedDate__lte=expected_day)

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
        # list_received_date[0].receivedDate = list_received_date[0].receivedDate.strftime('%d-%m-%Y')
        return list_received_date[0]
    else:
        return None


def get_phone_info(phone_name,**options):
    list_phone_info = get_list_phone_info_by_name(phone_name)
    phone_info = {}

    # query with filter

    if 'ROM' in options:
        list_phone_info = list_phone_info.filter(ROM=options['ROM'])
    if 'RAM' in options:
        list_phone_info = list_phone_info.filter(RAM=options['RAM'])
    if 'color' in options:
        list_phone_info = list_phone_info.filter(Q(color__icontains=options['color']))
    if 'from_country' in options:
        list_phone_info = list_phone_info.filter(fromCountry__icontains=options['from_country'])


    # return value

    if list_phone_info.exists():
        phone_info = list_phone_info[0]
    else:
        return {'isNull': True}

    # convert model to object
    phone_info_dict = custom_model_to_dict(phone_info)
    list_sale_off_dict = get_list_sale_off(phone_name, **options)

    # add more field to object (3)

    # (3) - for sale off
    phone_info_dict['sale_off'] = list_sale_off_dict
    if len(list_sale_off_dict) > 0:
        phone_info_dict['saleOffPrice'] = round(phone_info_dict['price1'] - list_sale_off_dict[0]['saleOffPrice'], 2)
    else:
        phone_info_dict['saleOffPrice'] = None

    # (3) - for hardware
    if "chống nước" in phone_info_dict['other'].lower():
        phone_info_dict['isWaterProtected'] = True
    else:
        phone_info_dict['isWaterProtected'] = None

    # (3) - for phonesource
    if 'quốc tế' in phone_info_dict['version'].lower():
        phone_info_dict['isGlobal'] = True
    else:
        phone_info_dict['isGlobal'] = False

    # (3) - get store have phone
    if 'store_address' in options:
        store = get_list_store_have_phone(phone_name, **options)
        if len(store) != 0:
            phone_info_dict['store'] = store
        else:
            return {'isNull': True}
    

    # (3) - for software question
    phone_info_dict['osDetail'] = '%s %s' % (phone_info_dict['osType'], phone_info_dict['osVersion'])

    if 'language_name' in options:
        language_name = options['language_name']
    else:
        language_name = 'Tiếng Việt'

    phone_language_support = list_phone_info.filter(phoneLanguage__languageName__icontains=language_name)

    if phone_language_support.exists():
        phone_info_dict['isSupportLanguage'] = True
    else:
        phone_info_dict['isSupportLanguage'] = False

    phone_info_dict['phoneCode'] = custom_model_to_dict(phone_info.phoneCode)

    if 'like new' in phone_info.status.lower():
        phone_info_dict['isLikeNew'] = True
    else:
        phone_info_dict['isLikeNew'] = False

    # (3) - for feature
    phone_info_dict['phoneFeature'] = custom_model_to_dict(phone_info.phoneFeature)

    phone_feature = phone_info_dict['phoneFeature']

    if 'game' in options:
        phone_info_dict['canPlayGame'] = get_feature_playing_game(phone_feature, options['game'])
        phone_info_dict['timeCanPlay'] = get_time_can_play_feature(phone_feature, **options)
    else:
        phone_info_dict['canPlayGame'] = 'khá'

    if 'feature' in options:
        phone_info_dict['timeCanPlay'] = get_time_can_play_feature(phone_feature, **options)
    else:
        phone_info_dict['timeCanPlay'] = '5 tiếng'

    # (3) - received date
    received_date_object = get_received_date(phone_name, **options)
    if received_date_object is not None:
        received_date_dict = custom_model_to_dict(received_date_object)
        received_date_dict['store'] = custom_model_to_dict(received_date_object.storeId)
        phone_info_dict['receivedDate'] = received_date_dict
        phone_info_dict['receivedDate']['receivedDate'] = received_date_object.receivedDate.strftime('%d-%m-%Y')
    else:
        null_received_date = {"receivedDate": None}
        phone_info_dict['receivedDate'] = null_received_date


    # (3) - round number
    phone_info_dict['chargerTime'] = remove_zero_after_dot_float(phone_info_dict['chargerTime'])
    phone_info_dict['cameraFront'] = remove_zero_after_dot_float(phone_info_dict['cameraFront'])
    phone_info_dict['inch'] = remove_zero_after_dot_float(phone_info_dict['inch'])


    # if not have content 
    phone_info_dict['isNull'] = None

    return phone_info_dict

# API 2

def get_sale_off_by_phone_name(phone_name):
    return SaleOff.objects.filter(Q(productId__productName__iexact=phone_name) | Q(productId__productOtherNames__iexact=phone_name)).\
        filter(dateStart__lte=datetime.date.today()).filter(dateEnd__gte=datetime.date.today())


def get_sale_off_giff(list_sale_off, phone_name):
    if list_sale_off.exists():
        return ','.join([sale_off.other for sale_off in list_sale_off])
    else:
        return None


def is_sale_off_now(list_sale_off):
    if list_sale_off.exists():
        return True
    else:
        return False


# TODO
def is_sale_off_with_installment(phone_name):
    pass


def get_when_end_sale_off(list_sale_off):
    if list_sale_off.exists():
        return list_sale_off[0].dateEnd.strftime('%d-%m-%Y')
    else:
        return None


def get_sale_off(phone_name, **options):
    list_sale_off = get_sale_off_by_phone_name(phone_name)

    #return value

    if list_sale_off.exists():
        sale_off = list_sale_off[0]
    else:
        return {'isNull': True}

    # convert object to dict

    sale_off_dict = custom_model_to_dict(sale_off)

    # add field to dictionary

    sale_off_dict['isSaleOff'] = is_sale_off_now(list_sale_off)
    sale_off_dict['saleOffGiff'] = get_sale_off_giff(list_sale_off, phone_name)
    sale_off_dict['endDate'] = get_when_end_sale_off(list_sale_off)

    # if not have content 
    sale_off_dict['isNull'] = None

    return sale_off_dict


# API 3

def get_list_store_inventory_by_phone_name(phone_name):
    return StoreInventory.objects.filter(Q(productId__productName__iexact=phone_name) | Q(productId__productOtherNames__iexact=phone_name))


def get_phone_color(phone_name):
    list_phone_info = get_list_phone_info_by_name(phone_name)
    list_color = []

    for phone in list_phone_info:
        list_phone_color = phone.color.lower().split(',')
        list_phone_color = [color.strip() for color in list_phone_color]

        for color in list_phone_color:
            list_color.append(color)

    return list(set(list_color))


def get_another_phone_color(phone_name, current_phone_color):
    list_phone_info = get_list_phone_info_by_name(phone_name)

    list_current_color = current_phone_color.lower().split(',')
    list_current_color = [color.strip() for color in list_current_color]

    list_color = []
    for phone in list_phone_info:
        list_phone_color = phone.color.lower().split(',')
        list_phone_color = [color.strip() for color in list_phone_color]

        for color in list_phone_color:
            if color not in list_current_color:
                list_color.append(color)
        
    return list(set(list_color))


def get_phone_store(phone_name, **options):
    list_store_inventory = get_list_store_inventory_by_phone_name(phone_name)

    # print('#1')
    # for inventory in list_store_inventory:
    #     print('inventory:', inventory)

    # filter

    if 'color' in options:
        print('in color')
        list_store_inventory = list_store_inventory.\
            filter(productId__in=Product.objects.filter(Q(productName__iexact=phone_name) | Q(productOtherNames__iexact=phone_name)).filter(phoneinfo__color__icontains=options['color']))
    if 'RAM' in options:
        print('in RAM')
        list_store_inventory = list_store_inventory.\
            filter(productId__in=Product.objects.filter(Q(productName=phone_name) | Q(productOtherNames__iexact=phone_name)).filter(phoneinfo__RAM=options['RAM']))
    if 'ROM' in options:
        print('in ROM')
        list_store_inventory = list_store_inventory.\
            filter(productId__in=Product.objects.filter(Q(productName=phone_name) | Q(productOtherNames__iexact=phone_name)).filter(phoneinfo__ROM=options['ROM']))
    if 'code' in options:
        print('in code')
        list_store_inventory = list_store_inventory.\
            filter(productId__in=Product.objects.filter(Q(productName__iexact=phone_name) | Q(productOtherNames__iexact=phone_name)).filter(phoneinfo__phoneCode__code__icontains=options['code']))
    if 'where' in options:
        list_store_inventory = list_store_inventory.\
            filter(Q(storeId__City__icontains=options['where']) | Q(storeId__district__icontains=options['where']) | Q(storeId__street__icontains=options['where']))

    # print('\n#2')
    # for inventory in list_store_inventory:
    #     print('inventory:', inventory)

    # return value

    if list_store_inventory.exists():
        is_have_store = False

        for inventory in list_store_inventory:
            if inventory.amount > 0:
                store_inventory = inventory
                is_have_store = True
                break
        
        if is_have_store is False:
            store_inventory = list_store_inventory[0]
    else:
        return {'isNull': True}
    
    # convert object to dict
    store_inventory_dict = custom_model_to_dict(store_inventory)

    # add feild

    store_inventory_dict['store'] = custom_model_to_dict(inventory.storeId)
    store_inventory_dict['isStocking'] = store_inventory.amount > 0
    store_inventory_dict['allColor'] = get_phone_color(phone_name)
    
    if 'color' in options:
        store_inventory_dict['anotherColor'] = get_another_phone_color(phone_name, options['color'])

    store_inventory_dict['isNull'] = None

    return store_inventory_dict


# API 4

def get_store_by_location(**options):
    # filter
    if 'where' in options:
        list_store = Store.objects.\
            filter(Q(City__icontains=options['where']) | Q(district__icontains=options['where']) | Q(street__icontains=options['where']))

    # convert object to dict
    # list_store_dict = [custom_model_to_dict(store) for store in list_store]
    store_info = {}

    if list_store.exists():
        store_info['allAddress'] = [store.address1 for store in list_store]
    else:
        store_info['isNull'] = True

    # add field
    if 'phone_name' in options:
        phone_name = options['phone_name']
        store_info['storesHavePhone'] = get_list_store_have_phone(phone_name, store_address=options['where'])

    store_info['isNull'] = None

    return store_info


# API 5

def get_store(store_address):
    list_store = Store.objects.\
            filter(Q(City__icontains=store_address) | Q(district__icontains=store_address) | Q(street__icontains=store_address) | Q(address1__icontains=store_address))

    if list_store.exists():
        return list_store[0]
    else:
        return None


def get_installment(phone_name, **options):
    # filter
    list_installment = Installment.objects.filter(Q(productId__productName__iexact=phone_name) | Q(productId__productOtherNames__iexact=phone_name))

    # return 
    if list_installment.exists():
        installment_object = list_installment[0]
    else:
        return {'isNull': True}

    # convert object to dict
    installment = custom_model_to_dict(installment_object)

    # add field
    installment['store'] = {}

    if 'store_address' in options:
        store = get_store(options['store_address'])
        store_dict = custom_model_to_dict(store)
        installment['store']['storeAdress'] = store_dict['storeName']
        installment['store']['storePayment'] = store_dict['storePayment']
    else:
        installment['store']['storeAdress'] = None
        installment['store']['storePayment'] = None

    installment['isNull'] = None

    return installment

# API 6

def get_warranty(phone_name, **options):
    # filter
    list_warranty = Guarantee.objects.filter(Q(productId__productName__iexact=phone_name) | Q(productId__productOtherNames__iexact=phone_name))

    # return 
    if list_warranty.exists():
        warranty = list_warranty[0]
    else:
        return {'isNull': True}

    # convert object to dict
    warranty_dict = custom_model_to_dict(warranty)
    
    warranty_dict['isNull'] = None

    return warranty_dict

# API 7
# buy older and allow change phone

def get_event_exchange(phone_name, **options):
    # filter
    list_event_available = BuyAndAllowChange.objects.filter(Q(productId__productName__iexact=phone_name) | Q(productId__productOtherNames__iexact=phone_name)).\
        filter(dateStart__lte=datetime.date.today()).filter(dateEnd__gte=datetime.date.today())

    # return
    if list_event_available.exists():
        event_exchange = list_event_available[0]
    else:
        return {'isNull': True}

    # convert object to dict
    event_exchange_dict = custom_model_to_dict(event_exchange)

    # change date format
    event_exchange_dict['dateStart'] = event_exchange.dateStart.strftime('%d-%m-%Y')
    event_exchange_dict['dateEnd'] = event_exchange.dateEnd.strftime('%d-%m-%Y')

    # add field
    event_exchange_dict['available'] = True
    event_exchange_dict['isNull'] = None

    return event_exchange_dict