from xeras.site2 import api

installment_api = {
    'hoi_tu_van_tra_gop': {
        'api': api.get_installment_paper_needed
    },
    'hoi_yeu_cau_khi_tra_gop': {
        'api': api.get_require_installment
    },
    'hoi_ho_tro_thanh_toan_the_dua_tren_cua_hang': {
        'api': api.get_store_payment
    },
    'hoi_ho_tro_thanh_toan_the': {
        'api': api.get_installment_payment
    }
}