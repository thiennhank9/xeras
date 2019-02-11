from random import *
from xeras.reply.framework.factory_api_by_site import concat_api_from_site

sentence_ingredients = {
  'head_text': 'Chào {user_vocative}',
  'end_text': 'mong sớm nhận được phản hồi từ {user_vocative}'
}

list_name_with_list_type = ['list_store_address', 'list_phone_color']

def get_answer_from_site(is_positive_answer, combine_api, *arguments, **keywords):
    detail_question_type = keywords['detail_question_type']
    # answer_key = combine_api[detail_question_type]['answer_key']
    
    # convert list to string
    for name in list_name_with_list_type:
        if name in keywords:
            keywords[name] = ', '.join(keywords[name])

    if is_positive_answer:
        number_answer = len(combine_api[detail_question_type]['positive_answer'])
        random_answer_index = randint(0, number_answer - 1)
        answer = concat_head_text_and_end_text(combine_api[detail_question_type]['positive_answer'][random_answer_index], **keywords)
    else:
        number_answer = len(combine_api[detail_question_type]['negative_answer'])
        random_answer_index = randint(0, number_answer - 1)
        answer = concat_head_text_and_end_text(combine_api[detail_question_type]['negative_answer'][random_answer_index], **keywords)

    # for vocate with user
    keywords['user_vocative'] = get_vocative_with_user(**keywords)
    return answer.format(**keywords)


def get_vocative_with_user(**keywords):
    if 'gender' in keywords['user']: 
        user_gender = keywords['user']['gender']
        if (user_gender == 'Nam'):
            user_vocative = 'anh'
        else:
            user_vocative = 'chị'
    else:
        user_vocative = 'bạn'

    # for this morning
    user_vocative = 'anh'

    return user_vocative


def concat_head_text_and_end_text(body_text, **keywords):
    sentence_ingredients['body_text'] = body_text
    user_vocative = get_vocative_with_user(**keywords)

    sentence_ingredients['head_text'] = sentence_ingredients['head_text'].format(user_vocative=user_vocative)
    sentence_ingredients['end_text'] = sentence_ingredients['end_text'].format(user_vocative=user_vocative)

    return '''{head_text}, {body_text}. {end_text}.'''.format(**sentence_ingredients)