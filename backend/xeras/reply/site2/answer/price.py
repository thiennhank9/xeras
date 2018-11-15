import xeras.site2.api as api

import xeras.reply.site2.answer_list as answer_list


def get_price_by_phone_name(argument, *arguments, **keywords):
    phone_price = api.get_price_by_phone_name(*argument, **keywords)

    # add phone price to keywords
    keywords['phone_price'] = phone_price
    return answer_list.price.get_answer(argument, *arguments, **keywords)


def get_price_by_sale_off(argument, *arguments, **keywords):
    pass


def get_price_by_store(argument, *arguments, **keywords):
    pass


def get_price_from_country(argument, *arguments, **keywords):
    pass


def get_compare_price(argument, *arguments, **keywords):
    pass


switcher_site2 = {
    'hoi_gia_mau_rom': get_price_by_phone_name,
    'hoi_gia_khuyen_mai': get_price_by_sale_off,
    'hoi_gia_theo_dia_diem': get_price_by_store,
    'hoi_gia_nguon_hang': get_price_from_country,
    'hoi_gia_so_sanh': get_compare_price
}


def get_answer(argument, *arguments, **keywords):
    # Get the function from switcher dictionary

    # get question type from keywords
    question_type = keywords['question_type']

    func = switcher_site2.get(question_type, "nothing")
    # Execute the function
    return func(argument, *arguments, **keywords)
