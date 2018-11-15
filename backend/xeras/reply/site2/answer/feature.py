import xeras.site2.api as api
import xeras.reply.site2.answer_list as answer_list


def get_feature_playing_game(argument, *arguments, **keywords):
    game_ability = api.get_feature_playing_game(*argument, **keywords)
    keywords['game_ability'] = game_ability
    return answer_list.feature.get_answer(argument, *arguments, **keywords)


def get_time_can_play_feature(argument, *arguments, **keywords):
    game_time = api.get_time_can_play_feature(*argument, **keywords)
    keywords['game_time'] = game_time
    return answer_list.feature.get_answer(argument, *arguments, **keywords)


switcher_site2 = {
    'hoi_kha_nang_choi_game': get_feature_playing_game,
    'hoi_thoi_gian_su_dung': get_time_can_play_feature,
    'hoi_choi_game_on_khong': get_feature_playing_game
}


def get_answer(argument, *arguments, **keywords):
    # Get the function from switcher dictionary

    # get question type from keywords
    question_type = keywords['question_type']

    func = switcher_site2.get(question_type, "nothing")
    # Execute the function
    return func(argument, *arguments, **keywords)
