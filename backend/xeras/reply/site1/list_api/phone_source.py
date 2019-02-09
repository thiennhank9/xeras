phone_source_api = {
    'hoi_nhap_tu_quoc_gia': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'answer_keys': ['fromCountry'],
        'answer_keys_mapping': {
            'from_country': 'fromCountry'
        }
    },
    'hoi_co_phai_hang_quoc_te': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'answer_keys': ['isGlobal'],
        'check_answer_key': 'isGlobal'
        
    },
    'hoi_ma_hang': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'answer_keys': ['phoneCode.code'],
        'answer_keys_mapping': {
            'phone_code': 'code'
        }
    },
    'hoi_loai_hang': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'answer_keys': ['fromType'],
        'answer_keys_mapping': {
            'phone_type': 'fromType'
        }
    },
    'hoi_hang_moi_hay_like_new': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'answer_keys': ['status'],
        'check_answer_key': 'status'
    }
}