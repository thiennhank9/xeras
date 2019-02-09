stocking_api = {
    'hoi_con_hang_theo_phien_ban': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_store/',
        'answer_keys': ['isStocking', 'store.storeName'],
        'positive_answer': [
            '''hiện tại điện thoại {phone_name} vẫn còn hàng, bạn ở đâu để shop có thể tư vấn cửa hàng gần nhất ạ?'''
        ],
        'answer_keys_mapping': {
            'is_stocking_phone': 'isStocking'
        },
        'check_answer_key': 'is_stocking_phone'
    },
    'hoi_con_hang_theo_mau_sac': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_store/',
        'answer_keys': ['isStocking'],
        'answer_keys_mapping': {
            'is_stocking_phone': 'isStocking'
        },
        'check_answer_key': 'is_stocking_phone'
    },
    'hoi_con_mau_khac_khong': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_store/',
        'answer_keys': ['allColor'],
        'answer_keys_mapping': {
            'list_phone_color': 'allColor'
        },
        'check_answer_key': 'list_phone_color'
    },
    'hoi_con_hang_theo_dia_diem': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_store/',
        'answer_keys': ['isStocking', 'store.storeName'],
        'positive_answer': [
            '''hiện tại điện thoại {phone_name} vẫn còn hàng, nhanh chân đến {storeName} để mua sản phẩm {user_vocative} nhé'''
        ],
        'answer_keys_mapping': {
            'is_stocking_phone': 'isStocking'
        },
        'check_answer_key': 'is_stocking_phone'
    },
    'hoi_con_hang_theo_ma': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_store/',
        'answer_keys': ['isStocking'],
        'answer_keys_mapping': {
            'is_stocking_phone': 'isStocking'
        },
        'check_answer_key': 'is_stocking_phone'
    },
    'hoi_con_hang_theo_ram': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_store/',
        'answer_keys': ['isStocking'],
        'answer_keys_mapping': {
            'is_stocking_phone': 'isStocking'
        },
        'check_answer_key': 'is_stocking_phone'
    },
    'hoi_con_hang_theo_rom': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_store/',
        'answer_keys': ['isStocking'],
        'answer_keys_mapping': {
            'is_stocking_phone': 'isStocking'
        },
        'check_answer_key': 'is_stocking_phone'
    }
}