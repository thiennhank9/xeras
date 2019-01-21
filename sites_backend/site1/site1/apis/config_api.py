from .list_api import *

config_api = {
    **price.price_api,
    **feature.feature_api,
    **hardware.hardware_api,
    **installment.installment_api,
    **phone_source.phone_source_api,
    **sale_off.sale_off_api,
    **software.software_api,
    **stocking.stocking_api,
    **address.address_api,
    **warranty.warranty_api,
    **received_day.received_day_api,
    **resell.resell_api
}