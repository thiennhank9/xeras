def type_question(*arguments, **keywords):
    if 'is_price_after_sale_off_price' in keywords:
        return 'hoi_gia_khuyen_mai'
    if 'is_phone_from' in keywords:
        return 'hoi_gia_theo_nguon_hang'
    if 'color' in keywords:
        return 'hoi_gia_mau_rom'
    if 'is_compare' in keywords:
        return 'hoi_gia_so_sanh'
    if 'ROM' in keywords:
        return 'hoi_gia_mau_rom'
    if 'where' in keywords:
        return 'hoi_gia_theo_dia_diem'
    return 'hoi_gia_mau_rom'