def type_question(*arguments, **keywords):
    if 'game' in keywords and 'for' in keywords:
        return 'hoi_kha_nang_choi_game'
    if 'howLongPinPlayingGame' in keywords:
        return 'hoi_thoi_gian_choi_game'
    if 'isFineWhilePlaying' in keywords:
        return 'hoi_kha_nang_choi_game'
    return 'hoi_kha_nang_choi_game'