from xeras.reply.framework.factory_api_by_site import concat_api_from_site
from xeras.reply.framework.detect_answer import get_answer

# import for apply post request
import requests 

def get_answer_by_api(api_url, *arguments, **keywords):
    content = {**keywords}
    response = requests.post(url=api_url, json=content)
    response = response.json()
    answer = response['result']
    return answer


def save_response_answer_by_api(combine_api, *arguments, **keywords):
    detail_question_type = keywords['detail_question_type']
    url = combine_api['config']['api_url']
    response_answer = get_answer_by_api(url, *arguments, **keywords)
    answer_key = combine_api[detail_question_type]['answer_key']
    keywords[answer_key] = response_answer
    return keywords