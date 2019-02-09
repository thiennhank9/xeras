from xeras.reply.framework.factory_api_by_site import concat_api_from_site

# import for apply post request
import requests
# import for copy object
import copy

def get_answer_by_api(api_url, **keywords):
    content = {**keywords}
    response = requests.post(url=api_url, json=content)
    response = response.json()
    answer = response
    return answer


def change_send_name(combine_api, **keywords):
    detail_question_type = keywords['detail_question_type']
    send_keyword = copy.copy(keywords) # shallow copy
    key_name_mapping = combine_api[detail_question_type]['send_keys_mapping']
    for replace_name, current_name in key_name_mapping.items():
        if current_name in send_keyword:
            send_keyword[replace_name] = send_keyword.pop(current_name)
    return send_keyword


def save_response_answer_by_api(combine_api, *arguments, **keywords):
    detail_question_type = keywords['detail_question_type']
    # get url
    url = combine_api[detail_question_type]['api_url']
    # clone keyword and change send name
    send_keyword = change_send_name(combine_api, **keywords)
    # call api
    response_answer = get_answer_by_api(url, **send_keyword)
    answer_keys = combine_api[detail_question_type]['answer_keys']
    is_response_null = response_answer['isNull']
    if is_response_null is None:
        # get answer
        for key_name in answer_keys:
            if "." in key_name:
                list_access_field_name = key_name.split('.')
                r_key_name = list_access_field_name[-1]

                # clone response answer
                answer_value = response_answer

                try:
                    for field in list_access_field_name:
                        # check filed in list
                        list_access_by_index = field.split('[')
                        for index_access_field in list_access_by_index:
                            index_access_field = index_access_field.replace("]", "")
                            if index_access_field.isdigit():
                                index_access_field = int(index_access_field)
                            answer_value = answer_value[index_access_field]
                except Exception as e:
                    print('error:', e)
                    answer_value = []

                print('answer_value:', answer_value)

                                            
                # save to answer key
                keywords[r_key_name] = answer_value
            else:
                # save to answer key
                keywords[key_name] = response_answer[key_name]
    
    # add check null key word
    keywords['isNull'] = is_response_null
    
    return keywords