sale_off_api = {
    'hoi_do_tang_kem_khuyen_mai': {
        'positive_answer': [
            '''hiện tại khi mua {phone_name} sẽ được {list_giff}.
            Bạn hãy nhanh chóng tới cửa hàng nhé'''
        ],
        'negative_answer': [
            '''hiện tại không có chương trình tặng kèm khi mua {phone_name}, mong {user_vocative} thông cảm,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'list_giff'
    },
    'hoi_con_khuyen_mai_khong': {
        'positive_answer': [
            '''hiện tại bên mình vẫn còn chương trình khuyến mãi {user_vocative} nhé. Bạn hãy nhanh chân tới cửa hàng'''
        ],
        'negative_answer': [
            '''hiện tại không có chương trình khuyến mãi khi mua {phone_name}, mong {user_vocative} thông cảm,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'is_sale_off_now'
    },
    'hoi_thoi_gian_het_khuyen_mai': {
        'positive_answer': [
            '''chương trình khuyến mãi đến hết ngày {date_end} {user_vocative} nhé'''
        ],
        'negative_answer': [
            '''hiện tại không thông tin về ngày hết khuyến mãi, mong {user_vocative} thông cảm,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'date_end'
    }
}