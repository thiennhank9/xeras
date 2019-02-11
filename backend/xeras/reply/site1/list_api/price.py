price_api = {
    'hoi_gia_mau_rom': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'positive_answer': [
            'sản phẩm {phone_name} hiện có giá là {phone_price} triệu đồng'
        ],
        'negative_answer': [
            'sản phẩm {phone_name} hiện đang hết hàng, cảm ơn bạn đã quan tâm!!!'
        ],
        'answer_keys': ['price1'],
        'answer_keys_mapping': {
            'phone_price': 'price1'
        }
    },
    'hoi_gia_khuyen_mai': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'answer_keys': ['saleOffPrice'],
        'answer_keys_mapping': {
            'phone_price': 'saleOffPrice'
        },
        'check_answer_key': 'phone_price'
    },
    'hoi_gia_theo_dia_diem': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'send_keys_mapping': {
            'store_address': 'where'
        },
        'answer_keys': ['price1'],
        'answer_keys_mapping': {
            'phone_price': 'price1'
        }
    },
    'hoi_gia_theo_nguon_hang': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'send_keys_mapping': {
            'from_country': 'where'
        },
        'answer_keys': ['price1'],
        'answer_keys_mapping': {
            'phone_price': 'price1'
        }
    }
}