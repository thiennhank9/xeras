def type_question(*arguments, **keywords):
    if 'what_os' in keywords:
        return 'hoi_ve_he_dieu_hanh'
    if 'is_vietnamese_installed' in keywords:
        # IS_VIETNAMESE_INSTALLED
        return 'hoi_co_ho_tro_tieng_da_cho_khong'
    return 'hoi_ve_he_dieu_hanh'