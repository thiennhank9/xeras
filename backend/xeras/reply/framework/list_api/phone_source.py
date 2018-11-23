phone_source_api = {
    'hoi_nhap_tu_quoc_gia': {
        'positive_answer': [
            '''Chào bạn, 
            sản phẩm nhập từ quốc gia {from_country} bạn nhé,
            mong sớm nhận được phản hồi của bạn.'''
        ],
        'negative_answer': [
            '''Chào bạn,
            hiện hệ thống chưa có thông tin bạn yêu cầu, mong bạn thông cảm,
            bạn hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé!!!'''
        ],
        'answer_key': 'from_country'
    },
    'hoi_co_phai_hang_quoc_te': {
        'positive_answer': [
            '''Chào bạn, 
            điện thoại bên mình cung cấp là phiên bản quốc tế bạn nhé,
            mong sớm nhận được phản hồi của bạn.'''
        ],
        'negative_answer': [
            '''Chào bạn,
            điện thoại bên mình cung cấp là phiên bản lock bạn nhé,
            bạn hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé!!!'''
        ],
        'answer_key': 'is_global'
    },
    'hoi_ma_hang': {
        'positive_answer': [
            '''Chào bạn, 
            điện thoại {phone_name} có mã là {phone_code},
            mong sớm nhận được phản hồi của bạn.'''
        ],
        'negative_answer': [
            '''Chào bạn,
            hiện hệ thống chưa có thông tin bạn yêu cầu, mong bạn thông cảm,
            bạn hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé!!!'''
        ],
        'answer_key': 'phone_code'
    },
    'hoi_loai_hang': {
        'positive_answer': [
            '''Chào bạn, 
            điện thoại là hàng {phone_type} bạn nhé,
            mong sớm nhận được phản hồi của bạn.'''
        ],
        'negative_answer': [
            '''Chào bạn,
            hiện hệ thống chưa có thông tin bạn yêu cầu, mong bạn thông cảm,
            bạn hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé!!!'''
        ],
        'answer_key': 'phone_type'
    },
    'hoi_hang_moi_hay_like_new': {
        'positive_answer': [
            '''Chào bạn, 
            điện thoại mới 100% bạn nhé,
            mong sớm nhận được phản hồi của bạn.'''
        ],
        'negative_answer': [
            '''Chào bạn,
            hiện bên mình đang kinh doanh điện thoại like new 99% bạn nhé,
            bạn hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé!!!'''
        ],
        'answer_key': 'is_like_new'
    }
}