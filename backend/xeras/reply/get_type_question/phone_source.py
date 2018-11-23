def type_question(*arguments, **keywords):
    if 'where' in keywords:
        return 'hoi_nhap_tu_quoc_gia'
    if 'isGlobal' in keywords:
        return 'hoi_co_phai_hang_quoc_te'
    if 'whatCode' in keywords:
        return 'hoi_ma_hang'
    if 'whatFromType' in keywords:
        return 'hoi_loai_hang'
    if 'IsBrandNewOrLikeNew' in keywords:
        return 'hoi_hang_moi_hay_like_new'
    return 'hoi_nhap_tu_quoc_gia'