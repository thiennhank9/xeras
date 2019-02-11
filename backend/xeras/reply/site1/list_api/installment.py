installment_api = {
    'hoi_tu_van_tra_gop': {
        'api_url': 'http://127.0.0.1:7001/apis/installment/',
        'send_keys_mapping': {
            'store_address': 'where'
        },
        'answer_keys': ['note'],
        'answer_keys_mapping': {
            'installment_note': 'note'
        }
    },
    'hoi_yeu_cau_khi_tra_gop': {
        'api_url': 'http://127.0.0.1:7001/apis/installment/',
        'send_keys_mapping': {
            'store_address': 'where'
        },
        'answer_keys': ['requiredInformation'],
        'answer_keys_mapping': {
            'require_installment': 'requiredInformation'
        }
    },
    'hoi_ho_tro_thanh_toan_the_dua_tren_cua_hang': {
        'api_url': 'http://127.0.0.1:7001/apis/installment/',
        'send_keys_mapping': {
            'store_address': 'where'
        },
        'answer_keys': ['store.storeAdress'],
        'answer_keys_mapping': {
            'store_address': 'storeAdress'
        }
    },
    'hoi_ho_tro_thanh_toan_the': {
        'api_url': 'http://127.0.0.1:7001/apis/installment/',
        'send_keys_mapping': {
            'store_address': 'where'
        },
        'answer_keys': ['store.storePayment'],
        'answer_keys_mapping': {
            'store_payment': 'storePayment'
        }
    }
}