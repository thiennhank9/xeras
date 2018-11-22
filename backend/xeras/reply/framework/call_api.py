from xeras.reply.framework.factory_api_by_site import concat_api_from_site
from xeras.reply.framework.detect_answer import get_answer

def call_api_and_get_answer(*arguments, **keywords):
    # get api
    best_api = concat_api_from_site(*arguments, **keywords)
    detail_question_type = keywords['detail_question_type']

    # get api of current question type
    api = best_api[detail_question_type]['api']
    answer_key = best_api[detail_question_type]['answer_key']
    keywords[answer_key] = api(*arguments, **keywords)
    return get_answer(*arguments, **keywords)