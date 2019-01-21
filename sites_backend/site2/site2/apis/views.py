# rest framework
from django.http import JsonResponse
from django.views.decorators.csrf import csrf_exempt
from rest_framework.parsers import JSONParser

# import config api
from site2.apis.config_api import config_api

@csrf_exempt
def comment_answer(request):
    if request.method == 'POST':
        data = JSONParser().parse(request)
        detail_question_type = data['detail_question_type']
        print('data:', data)

        try:
            result = config_api[detail_question_type](**data)
            return JsonResponse({'result': result}, status=200)
        except ValueError:
            return JsonResponse({'error': ValueError}, status=400)