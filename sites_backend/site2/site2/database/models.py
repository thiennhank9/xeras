from django.db import models
import random


def random_int():
    return random.randint(1,15)

class City(models.Model):
    cityName = models.TextField()
    cityOtherNames = models.TextField(blank=True)

    def __str__(self):
        return '%s' % self.cityName

    class Meta:
        managed = True
        db_table = 'City'


class District(models.Model):
    districtName = models.TextField()
    districtOthernames = models.TextField(blank=True)

    def __str__(self):
        return '%s' % self.districtName

    class Meta:
        managed = True
        db_table = 'District'


class Province(models.Model):
    provinceName = models.TextField()
    provinceOtherNames = models.TextField(blank=True)

    def __str__(self):
        return '%s' % self.provinceName

    class Meta:
        managed = True
        db_table = 'Province'


class Store(models.Model):
    storeName = models.TextField()
    storeProvinceId = models.ForeignKey(
        'Province', on_delete=models.CASCADE, db_column='storeProvinceId')
    storeCityId = models.ForeignKey(
        'City', on_delete=models.CASCADE, db_column='storeCityId')
    storeDistrictId = models.ForeignKey(
        'District', on_delete=models.CASCADE, db_column='storeDistrictId')
    storePayment = models.TextField(blank=True, default="")
    storeAddress = models.TextField(blank=True)
    storeNote = models.TextField(blank=True)

    def __str__(self):
        return '%s - %s' % (self.storeName, self.storeCityId.cityName)

    class Meta:
        managed = True
        db_table = 'Store'


class Producer(models.Model):
    producerName = models.TextField(blank=True)
    producerOtherNames = models.TextField(blank=True)

    def __str__(self):
        return '%s' % self.producerName

    class Meta:
        managed = True
        db_table = 'Producer'


class Installment(models.Model):
    installmentRate = models.FloatField(blank=True)
    installmentCompanyName = models.TextField(blank=True)
    installmentNote = models.TextField(blank=True)

    def __str__(self):
        return '%s' % self.installmentCompanyName

    class Meta:
        managed = True
        db_table = 'Installment'


class OsType(models.Model):
    osTypeName = models.TextField()
    osTypeOtherNames = models.TextField(blank=True)

    def __str__(self):
        return '%s' % self.osTypeName

    class Meta:
        managed = True
        db_table = 'OsType'


class Warranty(models.Model):
    warrantyType = models.TextField(blank=True)
    warrantyDuration = models.FloatField(blank=True)
    warrantyTerms = models.TextField(blank=True)
    warrantyNote = models.TextField(blank=True)

    def __str__(self):
        return '%s' % self.warrantyType

    class Meta:
        managed = True
        db_table = 'Warranty'


class Phone(models.Model):
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
    status = models.TextField(blank=True, default="")
    phoneCode = models.TextField(blank=True, default="")
    phoneLanguage = models.TextField(blank=True, default="")
    phoneChargerType = models.TextField(blank=True, default="2 chấu")
    phoneChargerTime = models.FloatField(blank=True, default=2.0)
    phoneTimeUsing = models.FloatField(blank=True, default=2.0)
    phoneChip = models.TextField(blank=True, default="")
    fromCountry = models.TextField(blank=True, default="Mỹ")
    phoneScreenWidth = models.FloatField(blank=True)
    phoneScreenHeight = models.FloatField(blank=True)
    phoneInch = models.FloatField(blank=True)
    phoneScreenType = models.TextField(blank=True, default="")
    phonePin = models.IntegerField(blank=True)
    phoneNumberOfSim = models.IntegerField(blank=True)
    phoneSimType = models.TextField(blank=True, default="")
    phoneMemory = models.IntegerField(blank=True)
    phoneRAM = models.IntegerField(blank=True)
    phoneFrontCamera = models.FloatField(blank=True)
    phoneBackCamera = models.FloatField(blank=True)
    phoneCameraNote = models.TextField(blank=True)
    phoneInternetNote = models.TextField(blank=True)
    phone4G = models.TextField(blank=True, default="")
    phone3G = models.TextField(blank=True, default="")
    phoneTypeNote = models.TextField(blank=True)
    phoneDemandNote = models.TextField(blank=True)
    phoneFeatureTimeUsing = models.TextField(blank=True, default="")
    phoneCase = models.TextField(blank=True, default="")
    phoneRating = models.FloatField(blank=True)
    phoneTopSeller = models.FloatField(blank=True)
    phoneTags = models.TextField(blank=True)
    phoneNote = models.TextField(blank=True)

    def __str__(self):
        return '%s - ROM:%s - RAM:%s - %s' % (self.phoneName, self.phoneMemory, self.phoneRAM, self.phoneColor)

    class Meta:
        managed = True
        db_table = 'Phone'


class AmountPhoneByStore(models.Model):
    storeId = models.ForeignKey('Store', on_delete=models.CASCADE, db_column='storeId')
    phoneId = models.ForeignKey('Phone', on_delete=models.CASCADE, db_column='phoneId')
    amount = models.IntegerField(blank=True, default=random_int)

    def __str__(self):
        return '%s - %s - %s - amount: %s' % (self.storeId.storeName, self.phoneId.phoneName, self.phoneId.phoneColor, self.amount)

    class Meta:
        managed = True
        db_table = 'AmountPhoneByStore'
        unique_together = (('storeId', 'phoneId'),)


class SaleOff(models.Model):
    saleOffName = models.TextField(blank=True)
    saleOffPhoneId = models.ForeignKey(
        'Phone', on_delete=models.CASCADE, db_column='saleOffPhoneId')
    saleOffDateStart = models.DateField(blank=True)
    saleOffDateEnd = models.DateField(blank=True)
    saleOffPricePercentage = models.FloatField(blank=True)
    saleOffPriceReduce = models.FloatField(blank=True)
    saleOffNote = models.TextField(blank=True)

    def __str__(self):
        return '%s - %s' % (self.saleOffPhoneId.phoneName, self.saleOffName)

    class Meta:
        managed = True
        db_table = 'SaleOff'


class ReceivedTime(models.Model):
    storeId = models.ForeignKey('Store', on_delete=models.CASCADE, db_column='storeId')
    phoneId = models.ForeignKey('Phone', on_delete=models.CASCADE, db_column='phoneId')
    receivedTime = models.DateField(blank=True, null=True)

    def __str__(self):
        received_time = self.receivedTime.strftime('%d-%m-%Y')
        return '%s - %s - Received time: %s' % (self.phoneId.phoneName, self.storeId.storeName, received_time)

    class Meta:
        managed = True
        db_table = 'ReceivedTime'


class Resell(models.Model):
    resellName = models.TextField(default=None)
    phoneId = models.ForeignKey('Phone', on_delete=models.CASCADE, db_column='phoneId')
    dateStart = models.DateField(blank=True)
    dateEnd = models.DateField(blank=True)
    other = models.TextField() # is this giff or other content

    def __str__(self):
        return '%s - %s - Duration: %s -> %s ' % (self.resellName, self.phoneId.phoneName, 
        self.dateStart.strftime('%d-%m-%Y'), self.dateEnd.strftime('%d-%m-%Y'))

    class Meta:
        managed = True
        db_table = 'Resell'        