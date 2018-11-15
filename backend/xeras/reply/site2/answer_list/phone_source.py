import xeras.site2.api as api


def get_answer_from_country_by_phone_name(argument, *arguments, **keywords):
    phone_source = keywords['phone_source']
    return 'hàng xuất xứ từ %s bạn nhé' % phone_source


switcher_site2 = {
    'hoi_nhap_tu_quoc_gia': get_answer_from_country_by_phone_name
}


def get_answer(argument, *arguments, **keywords):
    # Get the function from switcher dictionary

    # get question type from keywords
    question_type = keywords['question_type']

    func = switcher_site2.get(question_type, "nothing")
    # Execute the function
    return func(argument, *arguments, **keywords)
