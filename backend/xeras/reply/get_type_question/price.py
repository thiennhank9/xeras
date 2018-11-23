def type_question(*arguments, **keywords):
    if 'rom' in keywords:
        return 'hoi_gia_mau_rom'
    if 'isPriceAfterSaleOffPrice' in keywords:
        return 'hoi_gia_khuyen_mai'
    if 'where' in keywords:
        return 'hoi_gia_theo_dia_diem'
    if 'isCompare' in keywords:
        return 'hoi_gia_so_sanh'
    if 'from' in keywords:
        return 'hoi_gia_theo_nguon_hang'