import xeras.site2.api as api


def get_answer_feature_playing_game(argument, *arguments, **keywords):
    phone_name = keywords['phone_name']
    game = keywords['game']
    game_ability = keywords['game_ability']
    if game_ability is not None:
        return 'điện thoại %s chơi game %s %s' % (phone_name, game, game_ability)
    else:
        return 'hiện tại cửa hàng vẫn chưa có đánh giá điện thoại %s về khả năng chơi game %s' % (phone_name, game)


def get_answer_time_can_play_feature(argument, *arguments, **keywords):
    pass


switcher_site2 = {
    'hoi_kha_nang_choi_game': get_answer_feature_playing_game,
    'hoi_thoi_gian_su_dung': get_answer_time_can_play_feature,
    'hoi_choi_game_on_khong': get_answer_feature_playing_game
}


def get_answer(argument, *arguments, **keywords):
    # Get the function from switcher dictionary

    # get question type from keywords
    question_type = keywords['question_type']

    func = switcher_site2.get(question_type, "nothing")
    # Execute the function
    return func(argument, *arguments, **keywords)
