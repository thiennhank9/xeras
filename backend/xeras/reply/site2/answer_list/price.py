import xeras.site2.api as api

import xeras.reply.get_type_question as get_type_question


def get_answer_price_by_phone_name(argument, *arguments, **keywords):
    phone_name = keywords['phone_name']
    phone_price = keywords['phone_price']
    print('argument:', argument)
    print('arguments:', arguments)
    print('keywords:', keywords)
    return 'điện thoại %s hiện có giá là %s triệu đồng' % (phone_name, phone_price)
    pass


def get_answer_price_by_sale_off(argument, *arguments, **keywords):
    pass


def get_answer_price_by_store(argument, *arguments, **keywords):
    pass


def get_answer_price_from_country(argument, *arguments, **keywords):
    pass


def get_answer_compare_price(argument, *arguments, **keywords):
    pass


switcher_site2 = {
    'hoi_gia_mau_rom': get_answer_price_by_phone_name,
    'hoi_gia_khuyen_mai': get_answer_price_by_sale_off,
    'hoi_gia_theo_dia_diem': get_answer_price_by_store,
    'hoi_gia_nguon_hang': get_answer_price_from_country,
    'hoi_gia_so_sanh': get_answer_compare_price
}


def get_answer(argument, *arguments, **keywords):
    # Get the function from switcher dictionary

    # get question type from keywords
    question_type = keywords['question_type']

    func = switcher_site2.get(question_type, "nothing")
    # Execute the function
    return func(argument, *arguments, **keywords)
