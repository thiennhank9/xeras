import xeras.site2.api as api

def adapter(questionType, phone_name):
    print('questionType:', questionType)
    print('phone_name:', phone_name)
    if questionType == "hoi_gia":
        phone_price = api.get_price_by_phone_name(phone_name=phone_name, ROM=None, color=None)
        return 'san pham %s hien co gia la %s trieu dong' % (phone_name, phone_price)

