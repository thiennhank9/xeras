# import api 
from site2.apis import apis as api

phone_source_api = {
    'hoi_nhap_tu_quoc_gia': api.get_from_country_by_phone_name,
    'hoi_co_phai_hang_quoc_te': api.get_phone_version,
    'hoi_ma_hang': api.get_phone_code,
    'hoi_loai_hang': api.get_from_type,
    'hoi_hang_moi_hay_like_new': api.is_like_new
}