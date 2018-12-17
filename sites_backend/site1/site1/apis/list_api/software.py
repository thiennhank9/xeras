# import api 
from site1.apis import apis as api

software_api = {
    'hoi_ve_he_dieu_hanh': api.get_phone_os_info,
    'hoi_co_ho_tro_tieng_da_cho_khong': api.is_phone_support_in_language
}