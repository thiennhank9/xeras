stocking_api = {
    'hoi_con_hang_theo_phien_ban': {
        'positive_answer': [
            '''hiện tại điện thoại {phone_name} vẫn còn hàng, {user_vocative} hãy nhanh chân đến cửa hàng gần nhất nhé'''
        ],
        'negative_answer': [
            '''hiện sản phẩm đã hết hàng,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'is_stocking_phone'
    },
    'hoi_con_hang_theo_mau_sac': {
        'positive_answer': [
            '''hiện tại điện thoại {phone_name} {color} vẫn còn hàng, {user_vocative} hãy nhanh chân đến cửa hàng gần nhất nhé'''
        ],
        'negative_answer': [
            '''hiện sản phẩm đã hết hàng,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'is_stocking_phone'
    },
    'hoi_con_mau_khac_khong': {
        'positive_answer': [
            '''hiện tại điện thoại {phone_name} còn màu {list_phone_color}, {user_vocative} hãy nhanh chân đến cửa hàng gần nhất nhé'''
        ],
        'negative_answer': [
            '''hiện sản phẩm không còn màu gì khác,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'list_phone_color'
    },
    'hoi_con_hang_theo_dia_diem': {
        'positive_answer': [
            '''cửa hàng tại {where} vẫn còn hàng ạ, {user_vocative} hãy nhanh chân đến cửa hàng gần nhất nhé'''
        ],
        'negative_answer': [
            '''hiện sản phẩm đã hết hàng,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'is_stocking_phone'
    },
    'hoi_con_hang_theo_ma': {
        'positive_answer': [
            '''điện thoại {phone_name} mã {code} vẫn còn hàng ạ, {user_vocative} hãy nhanh chân đến cửa hàng gần nhất nhé'''
        ],
        'negative_answer': [
            '''hiện {phone_name} - {code} đã hết hàng,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'is_stocking_phone'
    },
    'hoi_con_hang_theo_ram': {
        'positive_answer': [
            '''điện thoại {phone_name} ram {RAM}GB vẫn còn hàng ạ, {user_vocative} hãy nhanh chân đến cửa hàng gần nhất nhé'''
        ],
        'negative_answer': [
            '''hiện {phone_name} ram {RAM}GB đã hết hàng,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'is_stocking_phone'
    },
    'hoi_con_hang_theo_rom': {
        'positive_answer': [
            '''điện thoại {phone_name} bộ nhớ {ROM}GB vẫn còn hàng ạ, {user_vocative} hãy nhanh chân đến cửa hàng gần nhất nhé'''
        ],
        'negative_answer': [
            '''hiện {phone_name} bộ nhớ {ROM}GB đã hết hàng,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'is_stocking_phone'
    }
}