from xeras.reply.site2.list_api import *

list_api = {
    **price.price_api,
    **feature.feature_api,
    **hardware.hardware_api,
    **installment.installment_api,
    **phone_source.phone_source_api,
    **sale_off.sale_off_api,
    **address.address_api,
    **software.software_api,
    **stocking.stocking_api,
    **warranty.warranty_api
}