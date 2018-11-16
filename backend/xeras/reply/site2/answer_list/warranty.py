import xeras.site2.api as api


def get_answer_warranty_note(argument, *arguments, **keywords):
    warrenty_note = keywords['warrenty_note']
    return 'bạn tham khảo thông tin bảo hàng bên dưới sau nhé: %s' % warrenty_note


switcher_site2 = {
    'hoi_thong_tin_bao_hanh': get_answer_warranty_note
}


def get_answer(argument, *arguments, **keywords):
    # Get the function from switcher dictionary

    # get question type from keywords
    question_type = keywords['question_type']

    func = switcher_site2.get(question_type, "nothing")
    # Execute the function
    return func(argument, *arguments, **keywords)
