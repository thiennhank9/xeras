# import api 
from site2.apis import apis as api

hardware_api = {
    'hoi_sac_may_chau': api.get_phone_charger_type_info,
    'hoi_thoi_gian_sac': api.get_phone_charge_time,
    'hoi_thoi_gian_su_dung': api.get_phone_battery_time_use,
    'hoi_ve_chip': api.get_phone_chip_info,
    'hoi_ve_camera_truoc': api.get_phone_front_camera_info,
    'hoi_ve_vo_dien_thoai': api.get_phone_case_info,
    'hoi_ve_ram': api.get_phone_ram_info,
    'hoi_ve_rom': api.get_phone_rom_info,
    'hoi_man_hinh_nhieu_inch': api.get_phone_screen_inch,
    'hoi_ve_loai_man_hinh': api.get_phone_screen_type,
    'hoi_co_ho_tro_4G': api.is_phone_has_4G,
    'hoi_co_bao_nhieu_sim': api.get_phone_sim_number,
    'hoi_ve_loai_sim': api.get_phone_sim_type,
    'hoi_co_chong_nuoc_khong': api.is_phone_has_water_protected
}