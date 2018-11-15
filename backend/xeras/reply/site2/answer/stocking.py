import xeras.site2.api as api
import xeras.reply.site2.answer_list as answer_list


def is_stocking_phone_by_name(argument, *arguments, **keywords):
    is_stocking = api.is_stocking_phone_by_name(*argument, **keywords)
    keywords['is_stocking'] = is_stocking
    return answer_list.stocking.get_answer(argument, *arguments, **keywords)


switcher_site2 = {
    'hoi_con_hang_theo_phien_ban': is_stocking_phone_by_name
}


def get_answer(argument, *arguments, **keywords):
    # Get the function from switcher dictionary

    # get question type from keywords
    question_type = keywords['question_type']

    func = switcher_site2.get(question_type, "nothing")
    # Execute the function
    return func(argument, *arguments, **keywords)
