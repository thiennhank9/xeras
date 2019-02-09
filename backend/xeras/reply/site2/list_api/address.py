address_api = {
    'hoi_danh_sach_cua_hang': {
        'api_url': 'http://127.0.0.1:7000/apis/store/',
        'answer_keys': ['allAddress'],
        'answer_keys_mapping': {
            'list_store_address': 'allAddress'
        },
        'check_answer_key': 'list_store_address'
    },
    'hoi_danh_sach_cua_hang_con_hang': {
        'api_url': 'http://127.0.0.1:7000/apis/store/',
        'answer_keys': ['storesHavePhone[0].storeName'],
        'answer_keys_mapping': {
            'store_address': 'storeName'
        },
        'check_answer_key': 'store_address'
    }
}