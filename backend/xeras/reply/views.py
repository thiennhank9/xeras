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
from xeras.reply.framework.main import get_answer_by_question_type

# NLP module
from xeras.nlp.nlp import NLP


@csrf_exempt
def get_reply_comment(request):    
    data = {}

    request_ojbect = JSONParser().parse(request)
    data = request_ojbect
    data['question'] = data['comment']
    result = get_answer_by_question_type(**data)
    
    return JsonResponse({"result_test": result}, status=201)