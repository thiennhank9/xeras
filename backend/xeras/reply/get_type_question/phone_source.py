def type_question(*arguments, **keywords):
    if 'where' in keywords:
        return 'hoi_nhap_tu_quoc_gia'
    if 'is_global' in keywords:
        return 'hoi_co_phai_hang_quoc_te'
    if 'what_code' in keywords:
        return 'hoi_ma_hang'
    if 'what_from_type' in keywords:
        return 'hoi_loai_hang'
    if 'is_brand_new_or_like_new' in keywords:
        return 'hoi_hang_moi_hay_like_new'
    return 'hoi_nhap_tu_quoc_gia'