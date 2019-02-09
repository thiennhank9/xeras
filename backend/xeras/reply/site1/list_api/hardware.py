hardware_api = {
    'hoi_sac_may_chau': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'answer_keys': ['chargerType'],
        'answer_keys_mapping': {
            'phone_charge_type': 'chargerType'
        }
    },
    'hoi_thoi_gian_sac': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'answer_keys': ['chargerTime'],
        'answer_keys_mapping': {
            'charge_time': 'chargerTime'
        }
    },
    'hoi_thoi_gian_su_dung': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'answer_keys': ['phoneTimeUsing'],
        'answer_keys_mapping': {
            'time_using': 'phoneTimeUsing'
        }
    },
    'hoi_ve_chip': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'answer_keys': ['chipset'],
        'answer_keys_mapping': {
            'chip_info': 'chipset'
        }
    },
    'hoi_ve_camera_truoc': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'answer_keys': ['cameraFront'],
        'answer_keys_mapping': {
            'camera_phone_info': 'cameraFront'
        }
    },
    'hoi_ve_vo_dien_thoai': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'answer_keys': ['phoneCase'],
        'answer_keys_mapping': {
            'case_info': 'phoneCase'
        }
    },
    'hoi_ve_ram': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'answer_keys': ['RAM'],
        'answer_keys_mapping': {
            'ram_info': 'RAM'
        }
    },
    'hoi_ve_rom': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'answer_keys': ['ROM'],
        'answer_keys_mapping': {
            'rom_info': 'ROM'
        }
    },
    'hoi_man_hinh_nhieu_inch': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'answer_keys': ['inch'],
        'answer_keys_mapping': {
            'screen_inch': 'inch'
        }
    },
    'hoi_ve_loai_man_hinh': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'answer_keys': ['screenType'],
        'answer_keys_mapping': {
            'screen_type': 'screenType'
        }
    },
    'hoi_co_ho_tro_4G': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'answer_keys': ['phone4G'],
        'answer_keys_mapping': {
            'is_support_4G': 'phone4G'
        },
        'check_answer_key': 'is_support_4G'
    },
    'hoi_co_bao_nhieu_sim': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'answer_keys': ['simNumber'],
        'answer_keys_mapping': {
            'number_sim_support': 'simNumber'
        }
    },
    'hoi_ve_loai_sim': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'answer_keys': ['simType'],
        'answer_keys_mapping': {
            'sim_type': 'simType'
        }
    },
    'hoi_co_chong_nuoc_khong': {
        'api_url': 'http://127.0.0.1:7001/apis/phone_info/',
        'answer_keys': ['isWaterProtected'],
        'answer_keys_mapping': {
            'is_water_protected': 'isWaterProtected'
        },
        'check_answer_key': 'is_water_protected'
    }
}