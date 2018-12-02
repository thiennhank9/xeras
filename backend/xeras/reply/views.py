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
from xeras.reply.framework.main import get_answer_by_question_type

# NLP module
from xeras.nlp.nlp import NLP


@csrf_exempt
def test_api(request):    
    data = {}

    request_ojbect = JSONParser().parse(request)
    data = request_ojbect
    data['question'] = data['comment']
    result = get_answer_by_question_type(**data)
    
    return JsonResponse({"result_test": result}, status=201)


@csrf_exempt
def test_ner(request):
    data = {}
    request_ojbect = JSONParser().parse(request)
    data.update(request_ojbect)
    question = data['comment']
    result = tcp.get_predict(question)

    for entity in result['entities']:
        entity[0].lower()
        print(entity[0])
    
    return JsonResponse({"result_test": result}, status=201)