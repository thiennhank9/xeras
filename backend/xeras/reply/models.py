from django.db import models

class City(models.Model):
    cityId = models.TextField(primary_key=True)
    cityName = models.TextField()
    cityOtherNames = models.TextField(blank=True)

    class Meta:
        managed = True
        db_table = 'City'


class District(models.Model):
    districtId = models.TextField(primary_key=True)
    districtName = models.TextField()
    districtOthernames = models.TextField(blank=True)

    class Meta:
        managed = True
        db_table = 'District'


class Province(models.Model):
    provinceId = models.TextField(primary_key=True)
    provinceName = models.TextField()
    provinceOtherNames = models.TextField(blank=True)

    class Meta:
        managed = True
        db_table = 'Province'


class Store(models.Model):
    storeId = models.TextField(primary_key=True)
    storeName = models.TextField()
    storeProvinceId = models.ForeignKey(
        'Province', on_delete=models.CASCADE, db_column='storeProvinceId')
    storeCityId = models.ForeignKey(
        'City', on_delete=models.CASCADE, db_column='storeCityId')
    storeDistrictId = models.ForeignKey(
        'District', on_delete=models.CASCADE, db_column='storeDistrictId')
    storeAddress = models.TextField(blank=True)
    storeNote = models.TextField(blank=True)

    class Meta:
        managed = True
        db_table = 'Store'


class Producer(models.Model):
    producerId = models.TextField(primary_key=True)
    producerName = models.TextField(blank=True)
    producerOtherNames = models.TextField(blank=True)

    class Meta:
        managed = True
        db_table = 'Producer'


class Installment(models.Model):
    installmentId = models.TextField(primary_key=True)
    installmentRate = models.FloatField(blank=True)
    installmentCompanyName = models.TextField(blank=True)
    installmentNote = models.TextField(blank=True)

    class Meta:
        managed = True
        db_table = 'Installment'


class OsType(models.Model):
    osTypeId = models.TextField(primary_key=True)
    osTypeName = models.TextField()
    osTypeOtherNames = models.TextField(blank=True)

    class Meta:
        managed = True
        db_table = 'OsType'


class Warranty(models.Model):
    warrantyId = models.TextField(primary_key=True)
    warrantyType = models.TextField(blank=True)
    warrantyDuration = models.FloatField(blank=True)
    warrantyTerms = models.TextField(blank=True)
    warrantyNote = models.TextField(blank=True)

    class Meta:
        managed = True
        db_table = 'Warranty'


class Phone(models.Model):
    phoneId = models.TextField(primary_key=True)
    phoneName = models.TextField()
    phoneOtherNames = models.TextField(blank=True)
    phonePrice = models.FloatField(blank=True)
    phoneEdition = models.TextField(blank=True)
    phoneColor = models.TextField(blank=True)
    phoneInstallmentId = models.ForeignKey(
        'Installment', on_delete=models.CASCADE, db_column='phoneInstallmentId', blank=True)
    phoneWarrantyId = models.ForeignKey(
        'Warranty', on_delete=models.CASCADE, db_column='phoneWarrantyId', blank=True)
    phoneProducerId = models.ForeignKey(
        'Producer', on_delete=models.CASCADE, db_column='phoneProducerId', blank=True)
    phoneOsIypeId = models.ForeignKey(
        'OsType', on_delete=models.CASCADE, db_column='phoneOsTypeId', blank=True)
    phoneScreenWidth = models.FloatField(blank=True)
    phoneScreenHeight = models.FloatField(blank=True)
    phoneInch = models.FloatField(blank=True)
    phonePin = models.IntegerField(blank=True)
    phoneNumberOfSim = models.IntegerField(blank=True)
    phoneMemory = models.FloatField(blank=True)
    phoneFrontCamera = models.FloatField(blank=True)
    phoneBackCamera = models.FloatField(blank=True)
    phoneCameraNote = models.TextField(blank=True)
    phoneInternetNote = models.TextField(blank=True)
    phoneTypeNote = models.TextField(blank=True)
    phoneDemandNote = models.TextField(blank=True)
    phoneRating = models.FloatField(blank=True)
    phoneTopSeller = models.FloatField(blank=True)
    phoneTags = models.TextField(blank=True)
    phoneNote = models.TextField(blank=True)

    class Meta:
        managed = True
        db_table = 'Phone'


class AmountPhoneByStore(models.Model):
    amountId = models.TextField(primary_key=True)
    storeId = models.ForeignKey('Store', on_delete=models.CASCADE, db_column='storeId')
    phoneId = models.ForeignKey('Phone', on_delete=models.CASCADE, db_column='phoneId')
    amount = models.IntegerField(blank=True)

    class Meta:
        managed = True
        db_table = 'AmountPhoneByStore'
        unique_together = (('storeId', 'phoneId'),)


class SaleOff(models.Model):
    saleOffId = models.TextField(primary_key=True)
    saleOffName = models.TextField(blank=True)
    saleOffPhoneId = models.ForeignKey(
        'Phone', on_delete=models.CASCADE, db_column='saleOffPhoneId')
    saleOffDateStart = models.DateField(blank=True)
    saleOffDateEnd = models.DateField(blank=True)
    saleOffPricePercentage = models.FloatField(blank=True)
    saleOffPriceReduce = models.FloatField(blank=True)
    saleOffNote = models.TextField(blank=True)

    class Meta:
        managed = True
        db_table = 'SaleOff'
