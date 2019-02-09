# rest framework
from django.http import JsonResponse
from django.views.decorators.csrf import csrf_exempt
from rest_framework.parsers import JSONParser

# import config api
from site1.apis.config_api import config_api
from site1.apis.new_apis import get_phone_info, get_sale_off, get_phone_store, get_store_by_location, get_installment, get_warranty, get_event_exchange


@csrf_exempt
def comment_answer(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        detail_question_type = data['detail_question_type']
        print('data:', data)

        try:
            result = config_api[detail_question_type](**data)
            # result = get_phone_info(**data)
            # print('result:', result)
            return JsonResponse({'result': result}, status=200)
            # return JsonResponse(result, status=200)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def phone_info(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        print('phone info')
        print('data:', data)

        try:
            result = get_phone_info(**data)
            # print('result:', result)
            return JsonResponse(result, status=200)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def sale_off(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        print('data:', data)

        try:
            result = get_sale_off(**data)
            return JsonResponse(result, status=200)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def phone_store(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        print('data:', data)

        try:
            result = get_phone_store(**data)
            return JsonResponse(result, status=200)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def store(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        print('data:', data)

        try:
            result = get_store_by_location(**data)
            return JsonResponse(result, status=200)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def installment(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        print('data:', data)

        try:
            result = get_installment(**data)
            return JsonResponse(result, status=200)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def warranty(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        print('data:', data)

        try:
            result = get_warranty(**data)
            return JsonResponse(result, status=200)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)


@csrf_exempt
def event_exchange(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        print('data:', data)

        try:
            result = get_event_exchange(**data)
            return JsonResponse(result, status=200)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)