from xeras.reply.get_type_question import type_question as get_type_question
from xeras.reply.framework.call_api import call_api_and_get_answer
from xeras.nlp.text_classification.main import TextClassificationPredict


global tcp
tcp = TextClassificationPredict()
tcp.setup()


def get_answer_by_question_type(*arguments, **keywords):
    general_question_type = get_cl_of_question(*arguments, **keywords)
    detail_question_type = get_type_question[general_question_type].type_question(*arguments, **keywords)
    keywords['detail_question_type'] = detail_question_type
    return call_api_and_get_answer(*arguments, **keywords)


def get_cl_of_question(*arguments, **keywords):
    # get question category by cl
    question = keywords['question']
    return tcp.get_predict(question)


def get_ner_of_question(*arguments, **keywords):
    pass