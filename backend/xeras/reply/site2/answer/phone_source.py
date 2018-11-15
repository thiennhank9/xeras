import xeras.site2.api as api
import xeras.reply.site2.answer_list as answer_list


def get_from_country_by_phone_name(argument, *arguments, **keywords):
    phone_source = api.get_from_country_by_phone_name(*argument, **keywords)
    keywords['phone_source'] = phone_source
    return answer_list.phone_source.get_answer(argument, *arguments, **keywords)


switcher_site2 = {
    'hoi_nhap_tu_quoc_gia': get_from_country_by_phone_name
}


def get_answer(argument, *arguments, **keywords):
    # Get the function from switcher dictionary

    # get question type from keywords
    question_type = keywords['question_type']

    func = switcher_site2.get(question_type, "nothing")
    # Execute the function
    return func(argument, *arguments, **keywords)
