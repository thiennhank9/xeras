from xeras.reply.get_type_question import type_question as get_type_question
from xeras.reply.framework.call_api import save_response_answer_by_api
from xeras.reply.framework.detect_answer import get_answer
from xeras.reply.framework.factory_api_by_site import concat_api_from_site
from xeras.nlp.nlp import NLP
from xeras.reply.framework.factory_entity_from_ner.price import get_entity_for_compare_price


global nlp
nlp = NLP()
nlp.set_is_used_model(True)
nlp.setup()


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

    # print question_type and ner
    print("question type: ", detail_question_type)
    print("entites: ", {**entities, 'phone_name': keywords['phone_name']})

    # combine
    keywords['general_question_type'] = general_question_type
    keywords['detail_question_type'] = detail_question_type
    # keywords['detail_question_type'] = 'hoi_mua_cu_doi_moi'
    combine_api = concat_api_from_site(*arguments, **keywords)

    # return {'question type': detail_question_type, 'entities': {**entities, 'phone_name': keywords['phone_name']}}

    keywords = save_response_answer_by_api(combine_api, *arguments, **keywords)
    if keywords['isNull'] is not True:
        keywords = change_name_key_words(combine_api, **keywords)
    # return keywords
    answer = get_answer(combine_api, *arguments, **keywords)

    # predict answer
    # try:
    #     keywords = save_response_answer_by_api(combine_api, *arguments, **keywords)
    #     if keywords['isNull'] is not True:
    #         keywords = change_name_key_words(combine_api, **keywords)
    #     # return keywords
    #     answer = get_answer(combine_api, *arguments, **keywords)
    # except:
    #     answer = "Xin lỗi, hiện tại câu hỏi vẫn chưa hỗ trợ, chúng tôi sẽ cố gắng khắc phục trong thời gian sớm nhất, mong bạn thông cảm!"
    return answer


def get_predict_of_question(*arguments, **keywords):
    # get question category by cl
    question = keywords['question']
    return nlp.get_predict(question)


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

        if entity_key == 'PHONE':
            object_entities['comment_have_phone_name'] = True
            print('comment have phone name')

        # convert special key from ner to normal key for query database
        if entity_key in mapping_key:
            entity_key = mapping_key[entity_key]
        else:
            # convert key to lower case with underscore convention
            entity_key = entity_key.lower()

        object_entities[entity_key] = entity_value

    return object_entities


def change_name_key_words(combine_api, **keywords):
    detail_question_type = keywords['detail_question_type']
    key_name_mapping = combine_api[detail_question_type]['answer_keys_mapping']
    for replace_name, current_name in key_name_mapping.items():
        if current_name in keywords:
            keywords[replace_name] = keywords.pop(current_name)
    return keywords