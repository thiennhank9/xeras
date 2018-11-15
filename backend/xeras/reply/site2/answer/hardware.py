import xeras.site2.api as api
import xeras.reply.site2.answer_list as answer_list


def get_phone_charger_type_info(argument, *arguments, **keywords):
    charger_type = api.get_phone_charger_type_info(*argument, **keywords)
    keywords['charger_type'] = charger_type
    return answer_list.hardware.get_answer(argument, *arguments, **keywords)


switcher_site2 = {
    'hoi_sac_may_chau': get_phone_charger_type_info
}


def get_answer(argument, *arguments, **keywords):
    # Get the function from switcher dictionary

    # get question type from keywords
    question_type = keywords['question_type']

    func = switcher_site2.get(question_type, "nothing")
    # Execute the function
    return func(argument, *arguments, **keywords)
