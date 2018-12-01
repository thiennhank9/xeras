stocking_api = {
    'hoi_con_hang_theo_phien_ban': {
        'positive_answer': [
            '''Chào bạn, 
            hiện tại điện thoại {phone_name} vẫn còn hàng, bạn hãy nhanh chân đến cửa hàng gần nhất nhé,
            mong sớm nhận được phản hồi của bạn.'''
        ],
        'negative_answer': [
            '''Chào bạn,
            hiện sản phẩm đã hết hàng,
            bạn hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé!!!'''
        ],
        'answer_key': 'is_stocking_phone'
    },
    'hoi_con_hang_theo_mau_sac': {
        'positive_answer': [
            '''Chào bạn, 
            hiện tại điện thoại {phone_name} {color} vẫn còn hàng, bạn hãy nhanh chân đến cửa hàng gần nhất nhé,
            mong sớm nhận được phản hồi của bạn.'''
        ],
        'negative_answer': [
            '''Chào bạn,
            hiện sản phẩm đã hết hàng,
            bạn hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé!!!'''
        ],
        'answer_key': 'is_stocking_phone'
    },
    'hoi_con_mau_khac_khong': {
        'positive_answer': [
            '''Chào bạn, 
            hiện tại điện thoại {phone_name} có các màu {list_phone_color}, bạn hãy nhanh chân đến cửa hàng gần nhất nhé,
            mong sớm nhận được phản hồi của bạn.'''
        ],
        'negative_answer': [
            '''Chào bạn,
            hiện sản phẩm không còn màu gì khác,
            bạn hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé!!!'''
        ],
        'answer_key': 'list_phone_color'
    },
    'hoi_con_hang_theo_dia_diem': {
        'positive_answer': [
            '''Chào bạn, 
            cửa hàng tại {where} vẫn còn hàng ạ, bạn hãy nhanh chân đến cửa hàng gần nhất nhé,
            mong sớm nhận được phản hồi của bạn.'''
        ],
        'negative_answer': [
            '''Chào bạn,
            hiện sản phẩm đã hết hàng,
            bạn hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé!!!'''
        ],
        'answer_key': 'is_stocking_phone'
    },
    'hoi_con_hang_theo_ma': {
        'positive_answer': [
            '''Chào bạn, 
            điện thoại {phone_name} mã {code} vẫn còn hàng ạ, bạn hãy nhanh chân đến cửa hàng gần nhất nhé,
            mong sớm nhận được phản hồi của bạn.'''
        ],
        'negative_answer': [
            '''Chào bạn,
            hiện sản phẩm đã hết hàng,
            bạn hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé!!!'''
        ],
        'answer_key': 'is_stocking_phone'
    },
    'hoi_con_hang_theo_ram': {
        'positive_answer': [
            '''Chào bạn, 
            điện thoại {phone_name} {RAM}GB vẫn còn hàng ạ, bạn hãy nhanh chân đến cửa hàng gần nhất nhé,
            mong sớm nhận được phản hồi của bạn.'''
        ],
        'negative_answer': [
            '''Chào bạn,
            hiện sản phẩm đã hết hàng,
            bạn hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé!!!'''
        ],
        'answer_key': 'is_stocking_phone'
    },
    'hoi_con_hang_theo_rom': {
        'positive_answer': [
            '''Chào bạn, 
            điện thoại {phone_name} {ROM}GB vẫn còn hàng ạ, bạn hãy nhanh chân đến cửa hàng gần nhất nhé,
            mong sớm nhận được phản hồi của bạn.'''
        ],
        'negative_answer': [
            '''Chào bạn,
            hiện sản phẩm đã hết hàng,
            bạn hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé!!!'''
        ],
        'answer_key': 'is_stocking_phone'
    }
}