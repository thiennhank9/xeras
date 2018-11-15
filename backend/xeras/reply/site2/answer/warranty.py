import xeras.site2.api as api
import xeras.reply.site2.answer_list as answer_list


def get_warranty_note(argument, *arguments, **keywords):
    warrenty_note = api.get_warranty_note(*argument, **keywords)
    keywords['warrenty_note'] = warrenty_note
    return answer_list.warranty.get_answer(argument, *arguments, **keywords)


switcher_site2 = {
    'hoi_thong_tin_bao_hanh': get_warranty_note
}


def get_answer(argument, *arguments, **keywords):
    # Get the function from switcher dictionary

    # get question type from keywords
    question_type = keywords['question_type']

    func = switcher_site2.get(question_type, "nothing")
    # Execute the function
    return func(argument, *arguments, **keywords)
