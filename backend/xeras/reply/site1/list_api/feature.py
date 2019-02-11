feature_api = {
    'hoi_kha_nang_choi_game': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'answer_keys': ['canPlayGame'],
        'answer_keys_mapping': {
            'game_setting': 'canPlayGame'
        },
        'check_answer_key': 'game_setting'
    },
    'hoi_thoi_gian_choi_game': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'answer_keys': ['timeCanPlay'],
        'answer_keys_mapping': {
            'game_time': 'timeCanPlay'
        }
    },
}