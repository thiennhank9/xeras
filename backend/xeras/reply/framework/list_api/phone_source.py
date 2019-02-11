phone_source_api = {
    'hoi_nhap_tu_quoc_gia': {
        'positive_answer': [
            '''sản phẩm nhập từ {from_country} {user_vocative} nhé'''
        ],
        'negative_answer': [
            '''hiện hệ thống chưa có thông tin {user_vocative} yêu cầu, mong {user_vocative} thông cảm,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'from_country'
    },
    'hoi_co_phai_hang_quoc_te': {
        'positive_answer': [
            '''điện thoại bên mình cung cấp là phiên bản quốc tế {user_vocative} nhé'''
        ],
        'negative_answer': [
            '''điện thoại bên mình cung cấp là phiên bản lock {user_vocative} nhé,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'is_global'
    },
    'hoi_ma_hang': {
        'positive_answer': [
            '''điện thoại {phone_name} có mã là {phone_code}'''
        ],
        'negative_answer': [
            '''hiện hệ thống chưa có thông tin {user_vocative} yêu cầu, mong {user_vocative} thông cảm,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'phone_code'
    },
    'hoi_loai_hang': {
        'positive_answer': [
            '''điện thoại là hàng {phone_type} {user_vocative} nhé'''
        ],
        'negative_answer': [
            '''hiện hệ thống chưa có thông tin {user_vocative} yêu cầu, mong {user_vocative} thông cảm,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'phone_type'
    },
    'hoi_hang_moi_hay_like_new': {
        'positive_answer': [
            '''hiện bên mình đang kinh doanh điện thoại {status} {user_vocative} nhé,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'negative_answer': [
            '''hiện bên mình chưa có thông tin {user_vocative} muốn, {user_vocative} vui lòng để lại thông tin để bên mình sẽ báo lại ạ!'''
        ],
        'answer_key': 'status'
    }
}