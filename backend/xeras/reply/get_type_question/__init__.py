from . import address as address
from . import feature as feature
from . import hardware as hardware
from . import installment as installment
from . import phone_source as phone_source
from . import price as price
from . import received_day as received_day
from . import resell as resell
from . import sale_off as sale_off
from . import software as software
from . import stocking as stocking
from . import warranty as warranty

type_question = {
    'hoi_gia': price,
    'hoi_khuyen_mai': sale_off,
    'hoi_phan_cung': hardware,
    'hoi_phan_mem': software,
    'hoi_nguon_hang': phone_source,
    'hoi_nhu_cau': feature,
    'hoi_con_hang': stocking,
    'hoi_dia_chi': address,
    'hoi_khi_nao': received_day,
    'hoi_tra_gop': installment,
    'hoi_bao_hanh': warranty,
    'hoi_doi_cu_lay_moi': resell
}