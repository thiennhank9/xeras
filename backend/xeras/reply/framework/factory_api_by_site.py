from xeras.reply.framework.default_api import default_api
from xeras.reply.site1.apis import list_api as site1_list_api
from xeras.reply.site2.apis import list_api as site2_list_api

def concat_api_from_site(*arguments, **keywords):
    # declear current api and get current site
    current_api = {}
    site = keywords['site']

    if site == 'site1':
        current_api = site1_list_api
    if site == 'site2':
        current_api = site2_list_api

    replace_api_from_site(default_api, current_api)

    for detail_question_type in default_api:
        if detail_question_type == 'config':
            continue
        concat_config_api_from_site(detail_question_type, default_api, current_api)
        concat_answer_from_site(detail_question_type, default_api, current_api)
    return default_api


def concat_config_api_from_site(detail_question_type, default_api, current_api):
    # get value in site config
    site_api_url = (detail_question_type in current_api and 'api_url' in current_api[detail_question_type] and \
        current_api[detail_question_type]['api_url'] or '')
    site_answer_keys = (detail_question_type in current_api and 'answer_keys' in current_api[detail_question_type] and \
        current_api[detail_question_type]['answer_keys'] or [])
    site_answer_keys_mapping = (detail_question_type in current_api and 'answer_keys_mapping' in current_api[detail_question_type] and \
        current_api[detail_question_type]['answer_keys_mapping'] or {})
    site_send_keys_mapping = (detail_question_type in current_api and 'send_keys_mapping' in current_api[detail_question_type] and \
        current_api[detail_question_type]['send_keys_mapping'] or {})
    site_check_answer_key = (detail_question_type in current_api and 'check_answer_key' in current_api[detail_question_type] and \
        current_api[detail_question_type]['check_answer_key'] or '')

    # add config from site1 or site2
    default_api[detail_question_type]['api_url'] = site_api_url
    default_api[detail_question_type]['answer_keys'] = site_answer_keys
    default_api[detail_question_type]['answer_keys_mapping'] = site_answer_keys_mapping
    default_api[detail_question_type]['send_keys_mapping'] = site_send_keys_mapping
    default_api[detail_question_type]['check_answer_key'] = site_check_answer_key


def concat_answer_from_site(detail_question_type, default_api, current_api):
    # get default positive and negative answer
    defaut_positive_answer = (detail_question_type in default_api and default_api[detail_question_type]['positive_answer'] or [])
    defaut_negative_answer = (detail_question_type in default_api and default_api[detail_question_type]['negative_answer'] or [])

    # get positive and negative from site 1 or site 2
    site_positive_answer = (detail_question_type in current_api and 'positive_answer' in current_api[detail_question_type] and \
     current_api[detail_question_type]['positive_answer'] or [])
    site_negative_answer = (detail_question_type in current_api and 'negative_answer' in current_api[detail_question_type] and \
    current_api[detail_question_type]['negative_answer'] or [])

    # add more positive and negative answer from site 1 or site 2
    default_api[detail_question_type]['positive_answer'] = list(set(defaut_positive_answer + site_positive_answer))
    default_api[detail_question_type]['negative_answer'] = list(set(defaut_negative_answer + site_negative_answer))


def replace_api_from_site(default_api, current_api):
    site_api = ('api_url' in current_api['config'] and current_api['config']['api_url'] or None)
    if site_api is not None:
        default_api['config'] = {'api_url': site_api}