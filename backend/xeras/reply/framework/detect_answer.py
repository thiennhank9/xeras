from xeras.reply.framework.factory_answer import get_answer_from_site
from xeras.reply.framework.factory_api_by_site import concat_api_from_site

def get_answer(*arguments, **keywords):
    best_api = concat_api_from_site(*arguments, **keywords)
    detail_question_type = keywords['detail_question_type']
    answer_key = best_api[detail_question_type]['answer_key']
    if keywords[answer_key] is not None:
        is_positive_answer = True
    else:
        is_positive_answer = False
    return get_answer_from_site(is_positive_answer, *arguments, **keywords)