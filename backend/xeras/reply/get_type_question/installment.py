def type_question(*arguments, **keywords):
    if 'is_need' in keywords:
        return 'hoi_tu_van_tra_gop'
    if 'giay_to' in keywords or 'year_old' in keywords:
        return 'hoi_yeu_cau_khi_tra_gop'
    if 'store_name' in keywords:
        return 'hoi_ho_tro_thanh_toan_the_dua_tren_cua_hang'
    if 'is_supported_buying_through_credit' in keywords:
        return 'hoi_ho_tro_thanh_toan_the'
    if 'is_supported_installment_through_credit' in keywords:
        return 'hoi_ho_tro_thanh_toan_the'
    if 'what_needed_papers' in keywords:
        # WHAT_NEEDED_PAPERS
        return 'hoi_tu_van_tra_gop'
    return 'hoi_tu_van_tra_gop'
    