def type_question(*arguments, **keywords):
    if 'how_long_pin_playing_game' in keywords:
        return 'hoi_thoi_gian_choi_game'
    if 'is_fine_while_playing' in keywords:
        return 'hoi_kha_nang_choi_game'
    if 'game' in keywords and 'for' in keywords:
        return 'hoi_kha_nang_choi_game'
    return 'hoi_kha_nang_choi_game'