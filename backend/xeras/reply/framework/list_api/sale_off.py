sale_off_api = {
    'hoi_do_tang_kem_khuyen_mai': {
        'positive_answer': [
            '''Chào bạn, 
            hiện tại bên mình có chương trình khuyến mãi, khi mua {phone_name} sẽ có tặng kèm {','.join(list_giff)}.
            Bạn hãy nhanh chóng tới cửa hàng nhé.
            mong sớm nhận được phản hồi của bạn.'''
        ],
        'negative_answer': [
            '''Chào bạn,
            hiện tại không có chương trình tặng kèm khi mua {phone_name}, mong bạn thông cảm,
            bạn hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé!!!'''
        ],
        'answer_key': 'list_giff'
    },
    'hoi_con_khuyen_mai_khong': {
        'positive_answer': [
            '''Chào bạn, 
            hiện tại bên mình vẫn còn chương trình khuyến mãi bạn nhé. Bạn hãy nhanh chân tới cửa hàng.
            mong sớm nhận được phản hồi của bạn.'''
        ],
        'negative_answer': [
            '''Chào bạn,
            hiện tại không có chương trình khuyến mãi khi mua {phone_name}, mong bạn thông cảm,
            bạn hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé!!!'''
        ],
        'answer_key': 'is_sale_off_now'
    },
    'hoi_thoi_gian_het_khuyen_mai': {
        'positive_answer': [
            '''Chào bạn, 
            chương trình khuyến mãi đến hết ngày {date_end} bạn nhé.
            mong sớm nhận được phản hồi của bạn.'''
        ],
        'negative_answer': [
            '''Chào bạn,
            hiện tại không thông tin về ngày hết khuyến mãi, mong bạn thông cảm,
            bạn hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé!!!'''
        ],
        'answer_key': 'date_end'
    }
}