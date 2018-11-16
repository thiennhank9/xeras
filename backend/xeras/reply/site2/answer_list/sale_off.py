import xeras.site2.api as api


def get_answer_sale_off_giff(argument, *arguments, **keywords):
    sale_off_giff = keywords['sale_off_giff']
    if sale_off_giff is not None:
        return 'bạn tham khảo danh thông tin tặng kèm sau: %s' % ', '.join(sale_off_giff)
    else:
        return 'sản phẩm hiện không có khuyến mãi bạn nhé!'


switcher_site2 = {
    'hoi_do_tang_kem_khuyen_mai': get_answer_sale_off_giff
}


def get_answer(argument, *arguments, **keywords):
    # Get the function from switcher dictionary

    # get question type from keywords
    question_type = keywords['question_type']

    func = switcher_site2.get(question_type, "nothing")
    # Execute the function
    return func(argument, *arguments, **keywords)
