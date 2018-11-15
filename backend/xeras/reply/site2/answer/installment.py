import xeras.site2.api as api
import xeras.reply.site2.answer_list as answer_list


def get_installment_paper_needed(argument, *arguments, **keywords):
    installment_note = api.get_installment_paper_needed(*argument, **keywords)
    keywords['installment_note'] = installment_note
    return answer_list.installment.get_answer(argument, *arguments, **keywords)


switcher_site2 = {
    'tu_van_tra_gop': get_installment_paper_needed
}


def get_answer(argument, *arguments, **keywords):
    # Get the function from switcher dictionary

    # get question type from keywords
    question_type = keywords['question_type']

    func = switcher_site2.get(question_type, "nothing")
    # Execute the function
    return func(argument, *arguments, **keywords)
