from xeras.site2 import api

stocking_api = {
    'hoi_con_hang_theo_phien_ban': {
        'api': api.is_stocking_phone_by_name
    },
    'hoi_con_hang_theo_mau_sac': {
        'api': api.is_stocking_phone_by_color
    },
    'hoi_con_mau_khac_khong': {
        'api': api.get_phone_color
    },
    'hoi_con_hang_theo_dia_diem': {
        'api': api.is_stocking_phone_by_store
    },
    'hoi_con_hang_theo_ma': {
        'api': api.is_stocking_phone_by_code
    },
    'hoi_con_hang_theo_ram': {
        'api': api.is_stocking_phone_by_RAM
    },
    'hoi_con_hang_theo_rom': {
        'api': api.is_stocking_phone_by_ROM
    }
}