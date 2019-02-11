software_api = {
    'hoi_ve_he_dieu_hanh': {
        'positive_answer': [
            '''hiện tại sản phẩm sử dụng hệ điều hành {phone_os} {user_vocative} nhé'''
        ],
        'negative_answer': [
            '''hiện hệ thống chưa có thông tin {user_vocative} yêu cầu, mong {user_vocative} thông cảm,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'phone_os'
    },
    'hoi_co_ho_tro_tieng_da_cho_khong': {
        'positive_answer': [
            '''hiện tại sản phẩm có hỗ trợ tiếng việt {user_vocative} nhé'''
        ],
        'negative_answer': [
            '''hiện hệ thống chưa có thông tin {user_vocative} yêu cầu, mong {user_vocative} thông cảm,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'is_Support_Vietnamese'
    }
}