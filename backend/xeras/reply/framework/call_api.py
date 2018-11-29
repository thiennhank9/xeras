from xeras.reply.framework.factory_api_by_site import concat_api_from_site
from xeras.reply.framework.detect_answer import get_answer

def get_answer_by_api(api, *arguments, **keywords):
    return api(*arguments, **keywords)
    # return get_answer(*arguments, **keywords)


def save_response_answer_by_api(combine_api, *arguments, **keywords):
    detail_question_type = keywords['detail_question_type']
    api = combine_api[detail_question_type]['api']
    response_answer = get_answer_by_api(api, *arguments, **keywords)
    answer_key = combine_api[detail_question_type]['answer_key']
    keywords[answer_key] = response_answer
    return keywords