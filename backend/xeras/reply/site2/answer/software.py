import xeras.site2.api as api
import xeras.reply.site2.answer_list as answer_list


def get_phone_os_info(argument, *arguments, **keywords):
    os_info = api.get_phone_os_info(*argument, **keywords)
    keywords['os_info'] = os_info
    return answer_list.software.get_answer(argument, *arguments, **keywords)


switcher_site2 = {
    'hoi_ve_he_dieu_hanh': get_phone_os_info
}


def get_answer(argument, *arguments, **keywords):
    # Get the function from switcher dictionary

    # get question type from keywords
    question_type = keywords['question_type']

    func = switcher_site2.get(question_type, "nothing")
    # Execute the function
    return func(argument, *arguments, **keywords)
