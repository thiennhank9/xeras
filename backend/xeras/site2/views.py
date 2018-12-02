from django.shortcuts import render
from django.core import serializers
from django.template import RequestContext

# Create your views here.
from django.http import HttpResponse
from django.template import loader

# rest framework

from django.http import HttpResponse, JsonResponse
from django.views.decorators.csrf import csrf_exempt
from rest_framework.renderers import JSONRenderer
from rest_framework.parsers import JSONParser
# 
import xeras.site2.api as api
# 
from .adapter import adapter 


@csrf_exempt
def get_price_by_phone_name(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)

        try:
            result = api.get_price_by_phone_name(**data)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def get_price_by_sale_off(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        phone_name = data['phone_name']

        try:
            result = api.get_price_by_sale_off(phone_name=phone_name)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def get_price_by_store(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        phone_name = data['phone_name']

        if 'where' in data:
            where = data['where']
        else:
            where = None

        try:
            result = api.get_price_by_store(phone_name=phone_name, where=where)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def get_price_from_country(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)

        try:
            result = api.get_price_from_country(**data)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def get_compare_price(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        phone_name = data['phone_name']

        if 'firstPhone' in data:
            firstPhone = data['firstPhone']
        else:
            firstPhone = None

        if 'secondPhone' in data:
            secondPhone = data['secondPhone']
        else:
            secondPhone = None

        try:
            result = api.get_compare_price(**data)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def get_sale_off_giff(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        phone_name = data['phone_name']

        try:
            result = api.get_sale_off_giff(phone_name=phone_name)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def is_sale_off_now(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        phone_name = data['phone_name']

        try:
            result = api.is_sale_off_now(phone_name=phone_name)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def get_when_end_sale_off(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        phone_name = data['phone_name']

        try:
            result = api.get_when_end_sale_off(phone_name=phone_name)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def get_phone_charger_type_info(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        phone_name = data['phone_name']

        try:
            result = api.get_phone_charger_type_info(phone_name=phone_name)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def get_phone_charge_time(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        phone_name = data['phone_name']

        try:
            result = api.get_phone_charge_time(phone_name=phone_name)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def get_phone_battery_time_use(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        phone_name = data['phone_name']

        try:
            result = api.get_phone_battery_time_use(phone_name=phone_name)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def get_phone_chip_info(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)

    try:
        result = api.get_phone_chip_info(**data)
        return JsonResponse({'result': result}, status=201)
    except ValueError:
        return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def get_phone_front_camera_info(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)

    try:
        result = api.get_phone_front_camera_info(**data)
        return JsonResponse({'result': result}, status=201)
    except ValueError:
        return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def is_phone_has_water_protected(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)

    try:
        result = api.is_phone_has_water_protected(**data)
        return JsonResponse({'result': result}, status=201)
    except ValueError:
        return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def is_phone_has_4G(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)

    try:
        result = api.is_phone_has_4G(**data)
        return JsonResponse({'result': result}, status=201)
    except ValueError:
        return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def get_phone_os_info(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        phone_name = data['phone_name']

        try:
            result = api.get_phone_os_info(phone_name=phone_name)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def is_phone_support_in_language(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        
        try:
            result = api.is_phone_support_in_language(**data)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def get_phone_code(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        phone_name = data['phone_name']

        try:
            result = api.get_phone_code(**data)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def get_from_type(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        phone_name = data['phone_name']

        try:
            result = api.get_from_type(phone_name=phone_name)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def is_like_new(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        phone_name = data['phone_name']

        try:
            result = api.is_like_new(phone_name=phone_name)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def get_feature_playing_game(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        phone_name = data['phone_name']

        if 'game' in data:
            game = data['game']
        else:
            game = None

        try:
            result = api.get_feature_playing_game(**data)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def get_time_can_play_feature(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        phone_name = data['phone_name']

        if 'feature' in data:
            feature = data['feature']
        else:
            feature = None

        try:
            result = api.get_time_can_play_feature(phone_name=phone_name,feature=feature)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def is_stocking_phone_by_name(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        phone_name = data['phone_name']

        try:
            result = api.is_stocking_phone_by_name(phone_name=phone_name)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def is_stocking_phone_by_color(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        phone_name = data['phone_name']

        if 'color' in data:
            color = data['color']
        else:
            color = None

        try:
            result = api.is_stocking_phone_by_color(phone_name=phone_name, color=color)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def get_phone_color(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        phone_name = data['phone_name']

        try:
            result = api.get_phone_color(phone_name=phone_name)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def is_stocking_phone_by_store(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        phone_name = data['phone_name']

        if 'where' in data:
            where = data['where']
        else:
            where = None

        try:
            result = api.is_stocking_phone_by_store(phone_name=phone_name, where=where)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def is_stocking_phone_by_code(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        phone_name = data['phone_name']

        if 'code' in data:
            code = data['code']
        else:
            code = None

        try:
            result = api.is_stocking_phone_by_code(phone_name=phone_name, code=code)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def is_stocking_phone_by_ROM(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        phone_name = data['phone_name']

        try:
            result = api.is_stocking_phone_by_ROM(**data)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def is_stocking_phone_by_RAM(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        phone_name = data['phone_name']

        if 'RAM' in data:
            RAM = data['RAM']
        else:
            RAM = None

        try:
            result = api.is_stocking_phone_by_RAM(phone_name=phone_name, RAM=RAM)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def get_store_by_location(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)

        if 'where' in data:
            where = data['where']
        else:
            where = None

        try:
            result = api.get_store_by_location(where=where)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def get_list_store_have_phone(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        phone_name = data['phone_name']

        if 'where' in data:
            where = data['where']
        else:
            where = None

        try:
            result = api.get_list_store_have_phone(phone_name=phone_name, where=where)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def get_require_installment(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        phone_name = data['phone_name']

        try:
            result = api.get_require_installment(phone_name=phone_name)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def get_installment_paper_needed(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        phone_name = data['phone_name']

        try:
            result = api.get_installment_paper_needed(phone_name=phone_name)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def get_store_payment(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        store_name = data['store_name']

        try:
            result = api.get_store_payment(store_name=store_name)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def get_warranty_note(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        phone_name = data['phone_name']

        try:
            result = api.get_warranty_note(phone_name=phone_name)
            return JsonResponse({'result': result}, status=201)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)
