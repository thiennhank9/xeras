sale_off_api = {
    'hoi_do_tang_kem_khuyen_mai': {
        'api_url': 'http://127.0.0.1:7001/apis/sale_off/',
        'answer_keys': ['saleOffGiff'],
        'answer_keys_mapping': {
            'list_giff': 'saleOffGiff'
        }
    },
    'hoi_con_khuyen_mai_khong': {
        'api_url': 'http://127.0.0.1:7001/apis/sale_off/',
        'answer_keys': ['isSaleOff'],
        'answer_keys_mapping': {
            'is_sale_off_now': 'isSaleOff'
        },
        'check_answer_key': 'is_sale_off_now'
    },
    'hoi_thoi_gian_het_khuyen_mai': {
        'api_url': 'http://127.0.0.1:7001/apis/sale_off/',
        'answer_keys': ['endDate'],
        'answer_keys_mapping': {
            'date_end': 'endDate'
        }
    }
}