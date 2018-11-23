def type_question(*arguments, **keywords):
    if 'whatCharger' in keywords:
        return 'hoi_sac_may_chau'
    if 'howLongCharger' in keywords:
        return 'hoi_thoi_gian_sac'
    if 'howLongPin' in keywords:
        return 'hoi_thoi_gian_su_dung'
    if 'whatChip' in keywords:
        return 'hoi_ve_chip'
    if 'whatFrontCamera' in keywords:
        return 'hoi_ve_camera_truoc'
    if 'whatPhoneCase' in keywords:
        return 'hoi_ve_vo_dien_thoai'
    if 'whatRAM' in keywords:
        return 'hoi_ve_ram'
    if 'whatROM' in keywords:
        return 'hoi_ve_rom'
    if 'whatInch' in keywords:
        return 'hoi_man_hinh_nhieu_inch'
    if 'isEarRabbit' in keywords:
        return 'hoi_ve_loai_man_hinh'
    if 'isOverflowScreen' in keywords:
        return 'hoi_ve_loai_man_hinh'
    if 'is4G' in keywords:
        return 'hoi_co_ho_tro_4G'
    if 'howNumberSim' in keywords:
        return 'hoi_co_bao_nhieu_sim'
    if 'whatSim' in keywords:
        return 'hoi_ve_loai_sim'
    if 'isWaterProtected' in keywords:
        return 'hoi_co_chong_nuoc_khong'
    return 'hoi_sac_may_chau'