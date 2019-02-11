def type_question(*arguments, **keywords):
    if 'what_else_color' in keywords:
        return 'hoi_con_mau_khac_khong'
    if 'where' in keywords:
        return 'hoi_con_hang_theo_dia_diem'
    if 'color' in keywords:
        return 'hoi_con_hang_theo_mau_sac'
    if 'code' in keywords:
        return 'hoi_con_hang_theo_ma'
    if 'RAM' in keywords:
        return 'hoi_con_hang_theo_ram'
    if 'ROM' in keywords:
        return 'hoi_con_hang_theo_rom'
    return 'hoi_con_hang_theo_phien_ban'