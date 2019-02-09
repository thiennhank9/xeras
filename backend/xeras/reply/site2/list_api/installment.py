installment_api = {
    'hoi_tu_van_tra_gop': {
        'api_url': 'http://127.0.0.1:7000/apis/installment/',
        'send_keys_mapping': {
            'store_address': 'where'
        },
        'answer_keys': ['installmentNote'],
        'answer_keys_mapping': {
            'installment_note': 'installmentNote'
        }
    },
    'hoi_yeu_cau_khi_tra_gop': {
        'api_url': 'http://127.0.0.1:7000/apis/installment/',
        'send_keys_mapping': {
            'store_address': 'where'
        },
        'answer_keys': ['installmentNote'],
        'answer_keys_mapping': {
            'require_installment': 'installmentNote'
        }
    },
    'hoi_ho_tro_thanh_toan_the_dua_tren_cua_hang': {
        'api_url': 'http://127.0.0.1:7000/apis/installment/',
        'send_keys_mapping': {
            'store_address': 'where'
        },
        'answer_keys': ['store.storeAdress'],
        'answer_keys_mapping': {
            'store_address': 'storeAdress'
        },
        'check_answer_key': 'store_address'
    },
    'hoi_ho_tro_thanh_toan_the': {
        'api_url': 'http://127.0.0.1:7000/apis/installment/',
        'send_keys_mapping': {
            'store_address': 'where'
        },
        'answer_keys': ['store.storePayment'],
        'answer_keys_mapping': {
            'store_payment': 'storePayment'
        },
        'check_answer_key': 'store_payment'
    }
}