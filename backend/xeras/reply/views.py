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
from xeras.reply.adapter import get_answer

global tcp
tcp = TextClassificationPredict()
tcp.setup()


@csrf_exempt
def test_api(request):
    global tcp
    
    data = JSONParser().parse(request)
    result = get_answer(question=data['comment'], site=data['site'])
    
    return JsonResponse({"result_test": result}, status=201)