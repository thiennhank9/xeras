def type_question(*arguments, **keywords):
    if 'isNeed' in keywords:
        return 'hoi_tu_van_tra_gop'
    if 'giay_to' in keywords or 'yearOld' in keywords:
        return 'hoi_yeu_cau_khi_tra_gop'
    if 'store_name' in keywords:
        return 'hoi_ho_tro_thanh_toan_the_dua_tren_cua_hang'
    if 'isSupportedInstallmentThroughCredit' in keywords:
        return 'hoi_yeu_cau_khi_tra_gop'
    if 'paper' in keywords:
        return 'hoi_tu_van_tra_gop'
    return 'hoi_tu_van_tra_gop'
    