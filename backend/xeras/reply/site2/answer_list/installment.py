import xeras.site2.api as api


def get_answer_installment_paper_needed(argument, *arguments, **keywords):
    installment_note = keywords['installment_note']
    return 'bạn tham khảo các thông tin sau nhé %s' % installment_note


switcher_site2 = {
    'tu_van_tra_gop': get_answer_installment_paper_needed
}


def get_answer(argument, *arguments, **keywords):
    # Get the function from switcher dictionary

    # get question type from keywords
    question_type = keywords['question_type']

    func = switcher_site2.get(question_type, "nothing")
    # Execute the function
    return func(argument, *arguments, **keywords)
