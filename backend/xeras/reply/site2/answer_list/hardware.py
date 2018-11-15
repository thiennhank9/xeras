import xeras.site2.api as api


def get_answer_phone_charger_type_info(argument, *arguments, **keywords):
    phone_name = keywords['phone_name']
    charger_type = keywords['charger_type']
    return 'điện thoại %s có sạc %s' % (phone_name, charger_type)


switcher_site2 = {
    'hoi_sac_may_chau': get_answer_phone_charger_type_info
}


def get_answer(argument, *arguments, **keywords):
    # Get the function from switcher dictionary

    # get question type from keywords
    question_type = keywords['question_type']

    func = switcher_site2.get(question_type, "nothing")
    # Execute the function
    return func(argument, *arguments, **keywords)
