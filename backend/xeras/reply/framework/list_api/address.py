address_api = {
    'hoi_danh_sach_cua_hang': {
        'positive_answer': [
            '''đây là danh sách địa chỉ cửa hàng tại {where}: {list_store_address}'''
        ],
        'negative_answer': [
            '''hiện tại bên mình không có cửa hàng tại {where}, mong {user_vocative} thông cảm,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'list_store_address'
    },
    'hoi_danh_sach_cua_hang_con_hang': {
        'positive_answer': [
            '''hiện bên mình còn {phone_name} tại {store_address}'''
        ],
        'negative_answer': [
            '''hiện tại bên mình không còn hàng tại {where}, mong {user_vocative} thông cảm,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'store_address'
    },
}