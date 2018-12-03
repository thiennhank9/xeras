from random import *
from xeras.reply.framework.factory_api_by_site import concat_api_from_site

sentence_ingredients = {
  'head_text': 'Chào {user_vocative}',
  'end_text': 'mong sớm nhận được phản hồi từ {user_vocative}'
}

def get_answer_from_site(is_positive_answer, combine_api, *arguments, **keywords):
    detail_question_type = keywords['detail_question_type']
    answer_key = combine_api[detail_question_type]['answer_key']
    
    if type(keywords[answer_key]) is list:
        keywords[answer_key] = ', '.join(keywords[answer_key])

    if is_positive_answer:
        number_answer = len(combine_api[detail_question_type]['positive_answer'])
        random_answer_index = randint(0, number_answer - 1)
        answer = concat_head_text_and_end_text(combine_api[detail_question_type]['positive_answer'][random_answer_index], **keywords)
        return answer.format(**keywords)
    else:
        number_answer = len(combine_api[detail_question_type]['negative_answer'])
        random_answer_index = randint(0, number_answer - 1)
        answer = concat_head_text_and_end_text(combine_api[detail_question_type]['negative_answer'][random_answer_index], **keywords)
        return answer.format(**keywords)


def concat_head_text_and_end_text(body_text, **keywork):
    sentence_ingredients['body_text'] = body_text

    if 'gender' in keywork['user']: 
        user_gender = keywork['user']['gender']
        if (user_gender == 'Nam'):
            user_vocative = 'Anh'
        else:
            user_vocative = 'Chị'
    else:
        user_vocative = 'Bạn'

    sentence_ingredients['head_text'] = sentence_ingredients['head_text'].format(user_vocative=user_vocative)
    sentence_ingredients['end_text'] = sentence_ingredients['end_text'].format(user_vocative=user_vocative)

    return '''{head_text}, {body_text}. {end_text}.'''.format(**sentence_ingredients)