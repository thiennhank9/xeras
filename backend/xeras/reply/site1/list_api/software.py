software_api = {
    'hoi_ve_he_dieu_hanh': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'answer_keys': ['osDetail'],
        'answer_keys_mapping': {
            'phone_os': 'osDetail'
        },
        'check_answer_key': 'phone_os'
    },
    'hoi_co_ho_tro_tieng_da_cho_khong': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'answer_keys': ['isSupportLanguage'],
        'answer_keys_mapping': {
            'is_Support_Vietnamese': 'isSupportLanguage'
        },
        'check_answer_key': 'is_Support_Vietnamese'
    }
}