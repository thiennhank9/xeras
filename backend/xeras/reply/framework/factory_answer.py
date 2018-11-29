from random import *
from xeras.reply.framework.factory_api_by_site import concat_api_from_site

def get_answer_from_site(is_positive_answer, combine_api, *arguments, **keywords):
    detail_question_type = keywords['detail_question_type']
    answer_key = combine_api[detail_question_type]['answer_key']
    
    if type(keywords[answer_key]) is list:
        keywords[answer_key] = ', '.join(keywords[answer_key])

    if is_positive_answer:
        number_answer = len(combine_api[detail_question_type]['positive_answer'])
        random_answer_index = randint(0, number_answer - 1)
        return combine_api[detail_question_type]['positive_answer'][random_answer_index].format(**keywords)
    else:
        number_answer = len(combine_api[detail_question_type]['negative_answer'])
        random_answer_index = randint(0, number_answer - 1)
        return combine_api[detail_question_type]['negative_answer'][random_answer_index].format(**keywords)