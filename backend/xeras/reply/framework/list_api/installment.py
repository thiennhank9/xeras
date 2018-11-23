installment_api = {
    'hoi_tu_van_tra_gop': {
        'positive_answer': [
            '''Chào bạn, 
            bạn tham khảo thông tin sau {installment_note},
            mong sớm nhận được phản hồi của bạn.'''
        ],
        'negative_answer': [
            '''Chào bạn,
            hiện tại cửa hàng chưa có thông tin trả góp,
            bạn hãy để lại thông tin liên hệ để khi nào có hàng tụi mình sẽ thông báo sớm cho bạn nhé!!!'''
        ],
        'answer_key': 'installment_note'
    },
    'hoi_yeu_cau_khi_tra_gop': {
        'positive_answer': [
            '''Chào bạn, 
            bạn tham khảo thông tin sau {require_installment},
            mong sớm nhận được phản hồi của bạn.'''
        ],
        'negative_answer': [
            '''Chào bạn,
            hiện tại cửa hàng chưa có thông tin trả góp,
            bạn hãy để lại thông tin liên hệ để khi nào có hàng tụi mình sẽ thông báo sớm cho bạn nhé!!!'''
        ],
        'answer_key': 'require_installment'
    },
    'hoi_ho_tro_thanh_toan_the_dua_tren_cua_hang': {
        'positive_answer': [
            '''Chào bạn, 
            hiện tại có các cửa hàng sau hỗ trợ thanh toán thẻ: {','.join(list_store_support_payment_by_credit)},
            mong sớm nhận được phản hồi của bạn.'''
        ],
        'negative_answer': [
            '''Chào bạn,
            hiện tại không có cửa hàng nào hỗ trợ thanh toán thẻ,
            bạn hãy để lại thông tin liên hệ để khi nào có hàng tụi mình sẽ thông báo sớm cho bạn nhé!!!'''
        ],
        'answer_key': 'list_store_support_payment_by_credit'
    }
}