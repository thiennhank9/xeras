from xeras.site2 import api

sale_off_api = {
    'hoi_do_tang_kem_khuyen_mai': {
        'api': api.get_sale_off_giff
    },
    'hoi_con_khuyen_mai_khong': {
        'api': api.is_sale_off_now
    },
    'hoi_thoi_gian_het_khuyen_mai': {
        'api': api.get_when_end_sale_off
    }
}