# import api 
from site2.apis import apis as api

stocking_api = {
    'hoi_con_hang_theo_phien_ban': api.is_stocking_phone_by_name,
    'hoi_con_hang_theo_mau_sac': api.is_stocking_phone_by_color,
    'hoi_con_mau_khac_khong': api.get_phone_color,
    'hoi_con_hang_theo_dia_diem': api.is_stocking_phone_by_store,
    'hoi_con_hang_theo_ma': api.is_stocking_phone_by_code,
    'hoi_con_hang_theo_ram': api.is_stocking_phone_by_RAM,
    'hoi_con_hang_theo_rom': api.is_stocking_phone_by_ROM
}