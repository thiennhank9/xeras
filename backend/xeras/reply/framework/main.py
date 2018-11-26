from xeras.reply.get_type_question import type_question as get_type_question
from xeras.reply.framework.call_api import call_api_and_get_answer
from xeras.nlp.text_classification.main import TextClassificationPredict
from xeras.nlp.nlp import NLP


# global tcp
# tcp = NLP()
# tcp.setup()

# ------------ previous statble ------------
global tcp
tcp = TextClassificationPredict()
tcp.setup()


def get_answer_by_question_type(*arguments, **keywords):
    # nlp_predict_object = get_predict_of_question(*arguments, **keywords)
    # general_question_type = get_general_question_type(**nlp_predict_object)
    # entities = get_entities_from_predict_object(**nlp_predict_object)

    # keywords['general_question_type'] = general_question_type
    # keywords = {**keywords, **entities}
    # print('nlp_predict_object:', nlp_predict_object)
    # print('entities:', entities)
    # print('keywords:', keywords)

    # return ''
    # ------------ previous statble ------------
    general_question_type = get_cl_of_question(*arguments, **keywords)
    detail_question_type = get_type_question[general_question_type].type_question(*arguments, **keywords)
    keywords['detail_question_type'] = detail_question_type
    return call_api_and_get_answer(*arguments, **keywords)


def get_cl_of_question(*arguments, **keywords):
    # get question category by cl
    question = keywords['question']
    return tcp.get_predict(question)


def get_predict_of_question(*arguments, **keywords):
    # get question category by cl
    question = keywords['question']
    return tcp.get_predict(question)


def get_general_question_type(**predict_object):
    return predict_object['type_ask']


def get_entities_from_predict_object(**predict_object):
    entities = predict_object['entities']
    object_entities = {}
    for entity in entities:
        object_entities[entity[0]] = entity[1]
    return object_entities