import xeras.site2.api as api

import xeras.reply.get_type_question as get_type_question


def get_answer_store_by_location(argument, *arguments, **keywords):
    where = keywords['where']
    list_store = keywords['list_store']
    if list_store is not None:
        return 'bạn tham khảo danh sách cửa hàng sau: %s' % '\n* '.join(map(str, list_store))
    else:
        return 'hiện tại hệ thống không có cửa hàng tại %s' % where


def get_answer_list_store_have_phone(argument, *arguments, **keywords):
    list_store = keywords['list_store']
    return 'bạn tham khảo danh sách cửa hàng sau: %s' % '\n* '.join(map(str, list_store))
    pass


switcher_site2 = {
    'hoi_dia_chi_danh_sach_cua_hang': get_answer_store_by_location,
    'hoi_dia_chi_cua_hang_con_hang': get_answer_list_store_have_phone
}


def get_answer(argument, *arguments, **keywords):
    # Get the function from switcher dictionary

    # get question type from keywords
    question_type = keywords['question_type']

    func = switcher_site2.get(question_type, "nothing")
    # Execute the function
    return func(argument, *arguments, **keywords)
