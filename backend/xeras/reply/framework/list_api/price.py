price_api = {
    'hoi_gia_mau_rom': {
        'positive_answer': [
            '''giá của sản phẩm {phone_name} hiện tại là {phone_price}00.000 triệu đồng'''
        ],
        'negative_answer': [
            '''sản phẩm {phone_name} hiện đang hết hàng {user_vocative} nhé, cảm ơn {user_vocative} đã quan tâm, 
            {user_vocative} hãy để lại thông tin liên hệ để khi nào có hàng tụi mình sẽ thông báo sớm cho {user_vocative} nhé'''
        ],
        'answer_key': 'phone_price'
    },
    'hoi_gia_khuyen_mai': {
        'positive_answer': [
            '''giá của sản phẩm {phone_name} sau khuyến mãi là {phone_price}00.000 triệu đồng. Hãy nhanh chân đến cửa hàng {user_vocative} nhé.
            Mong sớm nhận được phản hồi của {user_vocative}'''
        ],
        'negative_answer': [
            '''hiện tại sản phẩm {phone_name} không còn khuyến mãi, {user_vocative} vui lòng để lại thông tin để nhận được khuyến mãi sớm nhất'''
        ],
        'answer_key': 'phone_price'
    },
    'hoi_gia_theo_dia_diem': {
        'positive_answer': [
            '''giá của sản phẩm {phone_name} ở {where} là {phone_price}00.000 triệu đồng. Hãy nhanh chân đến cửa hàng {user_vocative} nhé'''
        ],
        'negative_answer': [
            '''hiện tại cửa hàng {where} không còn sản phẩm {phone_name} tại {where}, {user_vocative} vui lòng để lại thông tin để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'phone_price'
    },
    'hoi_gia_so_sanh': {
        'positive_answer': [
            '''giá của sản phẩm {phone_name} {firstPhone[ROM]} và {phone_name} {secondPhone[ROM]} chênh nhau {phone_price}00.000 triệu đồng. Hãy nhanh chân đến cửa hàng {user_vocative} nhé'''
        ],
        'negative_answer': [
            '''hiện tại bên mình chưa có thông tin về sản phẩm cần so sánh, {user_vocative} vui lòng để lại thông tin để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'phone_price'
    },
    'hoi_gia_theo_nguon_hang': {
        'positive_answer': [
            '''giá của sản phẩm {phone_name} xuất sứ từ {where} là {phone_price}00.000 triệu đồng. Hãy nhanh chân đến cửa hàng {user_vocative} nhé'''
        ],
        'negative_answer': [
            '''hiện tại bên mình chưa có thông tin về sản phẩm {phone_name} từ {where}, {user_vocative} vui lòng để lại thông tin để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'phone_price'
    }
}