from xeras.site2 import api

phone_source_api = {
    'hoi_nhap_tu_quoc_gia': {
        'api': api.get_from_country_by_phone_name
    },
    'hoi_co_phai_hang_quoc_te': {
        'api': api.get_phone_version
    },
    'hoi_ma_hang': {
        'api': api.get_phone_code
    },
    'hoi_loai_hang': {
        'api': api.get_from_type
    },
    'hoi_hang_moi_hay_like_new': {
        'api': api.is_like_new
    }
}