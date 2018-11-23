def type_question(*arguments, **keywords):
    if 'do_tang_kem' in keywords:
        return 'hoi_do_tang_kem_khuyen_mai'
    if 'isSaleOffNow' in keywords:
        return 'hoi_con_khuyen_mai_khong'
    if 'whenEndSaleOff' in keywords:
        return 'hoi_thoi_gian_het_khuyen_mai'
    return 'hoi_do_tang_kem_khuyen_mai'
