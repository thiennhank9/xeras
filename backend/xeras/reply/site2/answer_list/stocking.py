import xeras.site2.api as api


def get_answer_is_stocking_phone_by_name(argument, *arguments, **keywords):
    is_stocking = keywords['is_stocking']
    if is_stocking:
        answer = 'vẫn còn hàng bạn nhé'
    else:
        answer = 'máy hiện không có hàng'
    return answer


switcher_site2 = {
    'hoi_con_hang_theo_phien_ban': get_answer_is_stocking_phone_by_name
}


def get_answer(argument, *arguments, **keywords):
    # Get the function from switcher dictionary

    # get question type from keywords
    question_type = keywords['question_type']

    func = switcher_site2.get(question_type, "nothing")
    # Execute the function
    return func(argument, *arguments, **keywords)
