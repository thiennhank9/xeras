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
from xeras.nlp.text_classification.main import TextClassificationPredict
# 
import xeras.site2.api as api
# 
from xeras.nlp.text_classification.main import TextClassificationPredict
from xeras.reply.framework.main import get_answer_by_question_type

@csrf_exempt
def test_api(request):    
    data = {}
    data['phone_name'] = 'iPhone XS Max'
    data['site'] = 'site2'
    data['ROM'] = '64'
    data['color'] = 'Vàng'
    data['game'] = 'Liên quân'
    data['where'] = 'Hồ Chí Minh'

    request_ojbect = JSONParser().parse(request)
    data.update(request_ojbect)
    data['question'] = data['comment']
    result = get_answer_by_question_type(**data)
    
    return JsonResponse({"result_test": result}, status=201)