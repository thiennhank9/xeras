def type_question(*arguments, **keywords):
    if 'do_tang_kem' in keywords:
        return 'hoi_do_tang_kem_khuyen_mai'
    if 'is_sale_off_now' in keywords:
        return 'hoi_con_khuyen_mai_khong'
    if 'when_end_sale_off' in keywords:
        return 'hoi_thoi_gian_het_khuyen_mai'
    return 'hoi_do_tang_kem_khuyen_mai'
