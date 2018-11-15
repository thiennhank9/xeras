import xeras.site2.api as api
import xeras.reply.site2.answer_list as answer_list


def get_sale_off_giff(argument, *arguments, **keywords):
    sale_off_giff = api.get_sale_off_giff(*argument, **keywords)
    keywords['sale_off_giff'] = sale_off_giff
    return answer_list.sale_off.get_answer(argument, *arguments, **keywords)


switcher_site2 = {
    'hoi_do_tang_kem_khuyen_mai': get_sale_off_giff
}


def get_answer(argument, *arguments, **keywords):
    # Get the function from switcher dictionary

    # get question type from keywords
    question_type = keywords['question_type']

    func = switcher_site2.get(question_type, "nothing")
    # Execute the function
    return func(argument, *arguments, **keywords)
