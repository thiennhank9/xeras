from xeras.reply.framework.factory_answer import get_answer_from_site
from xeras.reply.framework.factory_api_by_site import concat_api_from_site

def get_answer(combine_api, *arguments, **keywords):
    isNull = keywords['isNull']
    is_correct = is_correct_with_check_key(combine_api, **keywords)
    if isNull is None and is_correct is True:
        is_positive_answer = True
    else:
        is_positive_answer = False
    return get_answer_from_site(is_positive_answer, combine_api, *arguments, **keywords)


def is_correct_with_check_key(combine_api, **keywords):
    detail_question_type = keywords['detail_question_type']
    check_answer_key = combine_api[detail_question_type]['check_answer_key']
    print('check_answer_key_name:', check_answer_key)
    if check_answer_key is not '':
        if check_answer_key in keywords:
            print('check_answer_key_value:', keywords[check_answer_key])
            if keywords[check_answer_key] in [None, False]:
                print('check: False')
                return False
            else:
                print('check: True')
                return True
        else:
            return False
    else:
        print('return True')
        return True