installment_api = {
    'hoi_tu_van_tra_gop': {
        'positive_answer': [
            '''hiện tại để trả góp bên mình bạn phải đáp ứng các điều kiện sau {installment_note}'''
        ],
        'negative_answer': [
            '''hiện tại cửa hàng chưa có thông tin trả góp,
            bạn hãy để lại thông tin liên hệ để khi nào có hàng tụi mình sẽ thông báo sớm cho bạn nhé'''
        ],
        'answer_key': 'installment_note'
    },
    'hoi_yeu_cau_khi_tra_gop': {
        'positive_answer': [
            '''bạn tham khảo thông tin sau {require_installment}'''
        ],
        'negative_answer': [
            '''hiện tại cửa hàng chưa có thông tin trả góp,
            bạn hãy để lại thông tin liên hệ để khi nào có hàng tụi mình sẽ thông báo sớm cho bạn nhé'''
        ],
        'answer_key': 'require_installment'
    },
    'hoi_ho_tro_thanh_toan_the_dua_tren_cua_hang': {
        'positive_answer': [
            '''hiện tại bên mình có các cửa hàng sau hỗ trợ thanh toán thẻ {list_store_payment}, bạn có thể gọi điện tới tổng đài hỗ trợ để được tư vấn trực tiếp'''
        ],
        'negative_answer': [
            '''hiện tại bên mình chỉ chấp nhận thanh toán bằng tiền mặt, để biết chi tiết hơn bạn có thể liên hệ tổng đài hỗ trợ để được tư vấn trực tiếp
            bạn hãy để lại thông tin liên hệ để khi nào có hàng tụi mình sẽ thông báo sớm cho bạn nhé'''
        ],
        'answer_key': 'list_store_payment'
    },
    'hoi_ho_tro_thanh_toan_the': {
        'positive_answer': [
            '''hiện tại hệ thống chấp nhận thanh toán qua phương thức {store_payment}, bạn có thể liên hệ tổng đài hỗ trợ để được tư vấn trực tiếp'''
        ],
        'negative_answer': [
            '''hiện tại bên mình chỉ chấp nhận thanh toán bằng tiền mặt, để biết chi tiết hơn bạn có thể liên hệ tổng đài hỗ trợ để được tư vấn trực tiếp
            bạn hãy để lại thông tin liên hệ để khi nào có hàng tụi mình sẽ thông báo sớm cho bạn nhé'''
        ],
        'answer_key': 'store_payment'
    }
}