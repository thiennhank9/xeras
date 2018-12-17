# import api 
from site1.apis import apis as api

price_api = {
    'hoi_gia_mau_rom': api.get_price_by_phone_name,
    'hoi_gia_khuyen_mai': api.get_price_by_sale_off,
    'hoi_gia_theo_dia_diem': api.get_price_by_store,
    'hoi_gia_so_sanh': api.get_compare_price,
    'hoi_gia_theo_nguon_hang': api.get_price_from_country
}