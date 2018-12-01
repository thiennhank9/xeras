from xeras.reply.get_type_question import type_question as get_type_question
from xeras.reply.framework.call_api import save_response_answer_by_api
from xeras.reply.framework.detect_answer import get_answer
from xeras.reply.framework.factory_api_by_site import concat_api_from_site
from xeras.nlp.nlp import NLP
from xeras.reply.framework.factory_entity_from_ner.price import get_entity_for_compare_price


global tcp
tcp = NLP()
tcp.setup()


# special key from ner to normal key for query database
mapping_key = {
    'PHONE': 'phone_name',
    'LOCATION': 'where',
    'ROM': 'ROM',
    'RAM': 'RAM'
}


def get_answer_by_question_type(*arguments, **keywords):
    # prepare
    nlp_predict_object = get_predict_of_question(*arguments, **keywords)
    entities = get_entities_from_predict_object(**nlp_predict_object)
    general_question_type = get_general_question_type(**nlp_predict_object)
    keywords = {**keywords, **entities}
    detail_question_type = get_type_question[general_question_type].type_question(*arguments, **keywords)

    # combine
    keywords['general_question_type'] = general_question_type
    keywords['detail_question_type'] = detail_question_type
    combine_api = concat_api_from_site(*arguments, **keywords)
    print('nlp_predict_object:', nlp_predict_object)

    # predict answer
    keywords = save_response_answer_by_api(combine_api, *arguments, **keywords)
    answer = get_answer(combine_api, *arguments, **keywords)
    # print('keywords:', keywords)
    return answer
    # return call_api_and_get_answer(*arguments, **keywords)


def get_predict_of_question(*arguments, **keywords):
    # get question category by cl
    question = keywords['question']
    return tcp.get_predict(question)


def get_general_question_type(**predict_object):
    return predict_object['type_ask']


def get_entities_from_predict_object(**predict_object):
    entities = predict_object['entities']
    
    list_key = [entity[0] for entity in entities]
    if 'IS_COMPARE' in list_key:
        return get_entity_for_compare_price(mapping_key, **predict_object)

    object_entities = {}
    for entity in entities:
        entity_key = entity[0]
        entity_value = entity[1]

        # convert special key from ner to normal key for query database
        if entity_key in mapping_key:
            entity_key = mapping_key[entity_key]
        else:
            # convert key to lower case with underscore convention
            entity_key = entity_key.lower()

        object_entities[entity_key] = entity_value

    return object_entities