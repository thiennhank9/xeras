import xeras.site2.api as api
import xeras.reply.site2.answer_list as answer_list


def get_store_by_location(argument, *arguments, **keywords):
    list_store = api.get_store_by_location(*argument, **keywords)
    keywords['list_store'] = list_store
    return answer_list.address.get_answer(argument, *arguments, **keywords)


def get_list_store_have_phone(argument, *arguments, **keywords):
    list_store = api.get_list_store_have_phone(*argument, **keywords)
    keywords['list_store'] = list_store
    return answer_list.address.get_answer(argument, *arguments, **keywords)


switcher_site2 = {
    'hoi_dia_chi_danh_sach_cua_hang': get_store_by_location,
    'hoi_dia_chi_cua_hang_con_hang': get_list_store_have_phone
}


def get_answer(argument, *arguments, **keywords):
    # Get the function from switcher dictionary

    # get question type from keywords
    question_type = keywords['question_type']

    func = switcher_site2.get(question_type, "nothing")
    # Execute the function
    return func(argument, *arguments, **keywords)
