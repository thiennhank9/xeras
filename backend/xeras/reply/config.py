from django.apps import AppConfig
from xeras.nlp.text_classification.main import TextClassificationPredict


class ReplyConfig(AppConfig):
    name = 'xeras.reply'
    verbose_name = "reply"