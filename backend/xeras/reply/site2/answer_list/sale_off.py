import xeras.site2.api as api


def get_answer_sale_off_giff(argument, *arguments, **keywords):
    sale_off_giff = keywords['sale_off_giff']
    return 'bạn tham khảo danh thông tin tặng kèm sau: %s' % sale_off_giff


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
