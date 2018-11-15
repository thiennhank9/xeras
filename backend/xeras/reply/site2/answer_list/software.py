import xeras.site2.api as api


def get_answer_phone_os_info(argument, *arguments, **keywords):
    os_info = keywords['os_info']
    return 'máy hiện chạy trên hệ điều hàng %s' % os_info


switcher_site2 = {
    'hoi_ve_he_dieu_hanh': get_answer_phone_os_info
}


def get_answer(argument, *arguments, **keywords):
    # Get the function from switcher dictionary

    # get question type from keywords
    question_type = keywords['question_type']

    func = switcher_site2.get(question_type, "nothing")
    # Execute the function
    return func(argument, *arguments, **keywords)
