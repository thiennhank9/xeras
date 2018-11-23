from xeras.site2 import api

hardware_api = {
    'hoi_sac_may_chau': {
        'api': api.get_phone_charger_type_info
    },
    'hoi_thoi_gian_sac': {
        'api': api.get_phone_charge_time
    },
    'hoi_thoi_gian_su_dung': {
        'api': api.get_phone_battery_time_use
    },
    'hoi_ve_chip': {
        'api': api.get_phone_chip_info
    },
    'hoi_ve_camera_truoc': {
        'api': api.get_phone_front_camera_info
    },
    'hoi_ve_vo_dien_thoai': {
        'api': api.get_phone_case_info
    },
    'hoi_ve_ram': {
        'api': api.get_phone_ram_info
    },
    'hoi_ve_rom': {
        'api': api.get_phone_rom_info
    },
    'hoi_man_hinh_nhieu_inch': {
        'api': api.get_phone_screen_inch
    },
    'hoi_ve_loai_man_hinh': {
        'api': api.get_phone_screen_type
    },
    'hoi_co_ho_tro_4G': {
        'api': api.is_phone_has_4G
    },
    'hoi_co_bao_nhieu_sim': {
        'api': api.get_phone_sim_number
    },
    'hoi_ve_loai_sim': {
        'api': api.get_phone_sim_type
    },
    'hoi_co_chong_nuoc_khong': {
        'api': api.is_phone_has_water_protected
    }
}