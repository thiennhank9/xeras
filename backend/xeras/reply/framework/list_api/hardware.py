hardware_api = {
    'hoi_sac_may_chau': {
        'positive_answer': [
            '''hiện tại sản phẩm sử dụng sạc {phone_charge_type} {user_vocative} nhé'''
        ],
        'negative_answer': [
            '''hiện hệ thống chưa có thông tin {user_vocative} yêu cầu, mong {user_vocative} thông cảm,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'phone_charge_type'
    },
    'hoi_thoi_gian_sac': {
        'positive_answer': [
            '''thời gian sạc khoảng {charge_time} tiếng {user_vocative} nhé'''
        ],
        'negative_answer': [
            '''hiện hệ thống chưa có thông tin {user_vocative} yêu cầu, mong {user_vocative} thông cảm,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'charge_time'
    },
    'hoi_thoi_gian_su_dung': {
        'positive_answer': [
            '''thời gian sử dụng khoảng {time_using} tiếng {user_vocative} nhé'''
        ],
        'negative_answer': [
            '''hiện hệ thống chưa có thông tin {user_vocative} yêu cầu, mong {user_vocative} thông cảm,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'time_using'
    },
    'hoi_ve_chip': {
        'positive_answer': [
            '''sản phẩm sử dụng chip {chip_info} {user_vocative} nhé'''
        ],
        'negative_answer': [
            '''hiện hệ thống chưa có thông tin {user_vocative} yêu cầu, mong {user_vocative} thông cảm,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'chip_info'
    },
    'hoi_ve_camera_truoc': {
        'positive_answer': [
            '''sản phẩm sử dụng camera trước {camera_phone_info} pixel {user_vocative} nhé'''
        ],
        'negative_answer': [
            '''hiện hệ thống chưa có thông tin {user_vocative} yêu cầu, mong {user_vocative} thông cảm,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'camera_phone_info'
    },
    'hoi_ve_vo_dien_thoai': {
        'positive_answer': [
            '''sản phẩm sử dụng vỏ {case_info} {user_vocative} nhé'''
        ],
        'negative_answer': [
            '''hiện hệ thống chưa có thông tin {user_vocative} yêu cầu, mong {user_vocative} thông cảm,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'case_info'
    },
    'hoi_ve_ram': {
        'positive_answer': [
            '''sản phẩm sử dụng ram {ram_info}GB {user_vocative} nhé'''
        ],
        'negative_answer': [
            '''hiện hệ thống chưa có thông tin {user_vocative} yêu cầu, mong {user_vocative} thông cảm,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'ram_info'
    },
    'hoi_ve_rom': {
        'positive_answer': [
            '''sản phẩm sử dụng rom {rom_info}GB {user_vocative} nhé'''
        ],
        'negative_answer': [
            '''hiện hệ thống chưa có thông tin {user_vocative} yêu cầu, mong {user_vocative} thông cảm,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'rom_info'
    },
    'hoi_man_hinh_nhieu_inch': {
        'positive_answer': [
            '''sản phẩm có màn hình {screen_inch} {user_vocative} nhé'''
        ],
        'negative_answer': [
            '''hiện hệ thống chưa có thông tin {user_vocative} yêu cầu, mong {user_vocative} thông cảm,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'screen_inch'
    },
    'hoi_ve_loai_man_hinh': {
        'positive_answer': [
            '''sản phẩm có màn hình {screen_type} {user_vocative} nhé'''
        ],
        'negative_answer': [
            '''hiện hệ thống chưa có thông tin {user_vocative} yêu cầu, mong {user_vocative} thông cảm,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'screen_type'
    },
    'hoi_co_ho_tro_4G': {
        'positive_answer': [
            '''sản phẩm có hỗ trợ {user_vocative} nhé'''
        ],
        'negative_answer': [
            '''sản phẩm không hỗ trợ {user_vocative} nhé,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'is_support_4G'
    },
    'hoi_co_bao_nhieu_sim': {
        'positive_answer': [
            '''sản phẩm hỗ trợ {number_sim_support} sim {user_vocative} nhé'''
        ],
        'negative_answer': [
            '''sản phẩm không hỗ trợ {user_vocative} nhé,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'number_sim_support'
    },
    'hoi_ve_loai_sim': {
        'positive_answer': [
            '''sản phẩm có sử dụng loại sim {sim_type} {user_vocative} nhé'''
        ],
        'negative_answer': [
            '''sản phẩm không hỗ trợ {user_vocative} nhé,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'sim_type'
    },
    'hoi_co_chong_nuoc_khong': {
        'positive_answer': [
            '''sản phẩm có chống nước {user_vocative} nhé'''
        ],
        'negative_answer': [
            '''sản phẩm không chống nước {user_vocative} nhé,
            {user_vocative} hãy để lại thông tin liên hệ để nhận được thông báo sớm nhất nhé'''
        ],
        'answer_key': 'is_water_protected'
    }
}