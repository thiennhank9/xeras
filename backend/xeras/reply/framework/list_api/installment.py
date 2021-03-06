installment_api = {
    'hoi_tu_van_tra_gop': {
        'positive_answer': [
            '''hiện tại để trả góp {user_vocative} tham khảo các thông tin sau {installment_note}'''
        ],
        'negative_answer': [
            '''hiện tại cửa hàng chưa có thông tin trả góp,
            {user_vocative} hãy để lại thông tin liên hệ để khi nào có hàng tụi mình sẽ thông báo sớm cho {user_vocative} nhé'''
        ],
        'answer_key': 'installment_note'
    },
    'hoi_yeu_cau_khi_tra_gop': {
        'positive_answer': [
            '''để có thể tạo thủ tục trả góp cần {require_installment}'''
        ],
        'negative_answer': [
            '''hiện tại cửa hàng chưa có thông tin trả góp,
            {user_vocative} hãy để lại thông tin liên hệ để khi nào có hàng tụi mình sẽ thông báo sớm cho {user_vocative} nhé'''
        ],
        'answer_key': 'require_installment'
    },
    'hoi_ho_tro_thanh_toan_the_dua_tren_cua_hang': {
        'positive_answer': [
            '''{user_vocative} có thể thanh toán tại cửa hàng {store_address}, {user_vocative} có thể gọi điện tới tổng đài hỗ trợ để được tư vấn trực tiếp'''
        ],
        'negative_answer': [
            '''hiện tại bên mình chỉ chấp nhận thanh toán bằng tiền mặt, để biết chi tiết hơn {user_vocative} có thể liên hệ tổng đài hỗ trợ để được tư vấn trực tiếp
            {user_vocative} hãy để lại thông tin liên hệ để khi nào có hàng tụi mình sẽ thông báo sớm cho {user_vocative} nhé'''
        ],
        'answer_key': 'store_address'
    },
    'hoi_ho_tro_thanh_toan_the': {
        'positive_answer': [
            '''hiện tại hệ thống chấp nhận thanh toán qua phương thức {store_payment}, {user_vocative} có thể liên hệ tổng đài hỗ trợ để được tư vấn trực tiếp'''
        ],
        'negative_answer': [
            '''hiện tại bên mình chỉ chấp nhận thanh toán bằng tiền mặt, để biết chi tiết hơn {user_vocative} có thể liên hệ tổng đài hỗ trợ để được tư vấn trực tiếp
            {user_vocative} hãy để lại thông tin liên hệ để khi nào có hàng tụi mình sẽ thông báo sớm cho {user_vocative} nhé'''
        ],
        'answer_key': 'store_payment'
    }
}