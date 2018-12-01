def type_question(*arguments, **keywords):
    if 'what_charger' in keywords:
        return 'hoi_sac_may_chau'
    if 'how_long_charger' in keywords:
        return 'hoi_thoi_gian_sac'
    if 'how_long_pin' in keywords:
        return 'hoi_thoi_gian_su_dung'
    if 'what_chip' in keywords:
        return 'hoi_ve_chip'
    if 'what_front_camera' in keywords:
        return 'hoi_ve_camera_truoc'
    if 'what_phone_case' in keywords:
        return 'hoi_ve_vo_dien_thoai'
    if 'what_ram' in keywords:
        return 'hoi_ve_ram'
    if 'what_rom' in keywords:
        return 'hoi_ve_rom'
    if 'what_inch' in keywords:
        return 'hoi_man_hinh_nhieu_inch'
    if 'is_ear_rabbit' in keywords:
        return 'hoi_ve_loai_man_hinh'
    if 'is_over_flow_screen' in keywords:
        return 'hoi_ve_loai_man_hinh'
    if 'is_4g' in keywords:
        return 'hoi_co_ho_tro_4G'
    if 'how_number_sim' in keywords:
        return 'hoi_co_bao_nhieu_sim'
    if 'what_sim' in keywords:
        return 'hoi_ve_loai_sim'
    if 'is_water_protected' in keywords:
        return 'hoi_co_chong_nuoc_khong'
    return 'hoi_sac_may_chau'