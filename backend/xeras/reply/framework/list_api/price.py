price_api = {
    'hoi_gia_mau_rom': {
        'positive_answer': [
            '''Chào bạn, 
            giá của sản phẩm {phone_name} hiện tại là {phone_price}
            mong sớm nhận được phản hồi của bạn.'''
        ],
        'negative_answer': [
            '''Chào bạn,
            sản phẩm {phone_name} hiện đang hết hàng bạn nhé, cảm ơn bạn đã quan tâm,
            bạn hãy để lại thông tin liên hệ để khi nào có hàng tụi mình sẽ thông báo sớm cho bạn nhé!!!'''
        ],
        'answer_key': 'phone_price'
    },
    'hoi_gia_khuyen_mai': {
        'positive_answer': [
            '''Chào bạn,
            giá của sản phẩm {phone_name} sau khuyến mãi là {phone_price}. Hãy nhanh chân đến cửa hàng bạn nhé.
            Mong sớm nhận được phản hồi của bạn.'''
        ],
        'negative_answer': [
            '''Chào bạn,
            hiện tại sản phẩm {phone_name} không còn khuyến mãi, bạn vui lòng để lại thông tin để nhận được khuyến mãi sớm nhất.
            Mong sớm nhận được phản hồi của bạn.'''
        ],
        'answer_key': 'phone_price'
    },
    'hoi_gia_theo_dia_diem': {
        'positive_answer': [
            '''Chào bạn,
            giá của sản phẩm {phone_name} ở {where} là {phone_price}. Hãy nhanh chân đến cửa hàng bạn nhé.
            Mong sớm nhận được phản hồi của bạn.'''
        ],
        'negative_answer': [
            '''Chào bạn,
            hiện tại cửa hàng {where} không còn sản phẩm {phone_name}, bạn vui lòng để lại thông tin để nhận được thông báo sớm nhất nhé.
            Mong sớm nhận được phản hồi của bạn.'''
        ],
        'answer_key': 'phone_price'
    },
    'hoi_gia_so_sanh': {
        'positive_answer': [
            '''Chào bạn,
            giá của sản phẩm {phone_name} {firstPhone['ROM']} và {phone_name} {secondPhone['ROM']} chênh nhau {phone_price}. Hãy nhanh chân đến cửa hàng bạn nhé.
            Mong sớm nhận được phản hồi của bạn.'''
        ],
        'negative_answer': [
            '''Chào bạn,
            hiện tại bên mình chưa có thông tin về sản phẩm cần so sánh, bạn vui lòng để lại thông tin để nhận được thông báo sớm nhất nhé.
            Mong sớm nhận được phản hồi của bạn.'''
        ],
        'answer_key': 'phone_price'
    },
    'hoi_gia_theo_nguon_hang': {
        'positive_answer': [
            '''Chào bạn,
            giá của sản phẩm {phone_name} xuất sứ từ {fromCountry} là {phone_price}. Hãy nhanh chân đến cửa hàng bạn nhé.
            Mong sớm nhận được phản hồi của bạn.'''
        ],
        'negative_answer': [
            '''Chào bạn,
            hiện tại bên mình chưa có thông tin về sản phẩm {phone_name} từ {fromCountry}, bạn vui lòng để lại thông tin để nhận được thông báo sớm nhất nhé.
            Mong sớm nhận được phản hồi của bạn.'''
        ],
        'answer_key': 'phone_price'
    }
}