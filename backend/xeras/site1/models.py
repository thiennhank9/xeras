from django.db import models


class Store(models.Model):
    storeId = models.TextField(primary_key=True)
    storeName = models.TextField()
    address1 = models.TextField()
    address2 = models.TextField()
    City = models.TextField()
    district = models.TextField()
    street = models.TextField()

    class Meta:
        managed = True
        db_table = 'Store'


class Category(models.Model):
    categoryId = models.TextField(primary_key=True)
    categoryName = models.TextField()

    class Meta:
        managed = True
        db_table = 'Category'


class Manufacturer(models.Model):
    manufacturerId = models.TextField(primary_key=True)
    manufacturerName = models.TextField()
    address1 = models.TextField()
    address2 = models.TextField()
    City = models.TextField()
    district = models.TextField()
    street = models.TextField()

    class Meta:
        managed = True
        db_table = 'Manufacturer'


class Post(models.Model):
    postId = models.TextField(primary_key=True)
    postTitle = models.TextField()
    postContent = models.TextField()
    postLink = models.TextField()

    class Meta:
        managed = True
        db_table = 'Post'


class Product(models.Model):
    productId = models.TextField(primary_key=True)
    productCategoryId = models.ForeignKey(
        'Category', on_delete=models.CASCADE, db_column='productCategoryId', blank=True)
    productName = models.TextField()
    productOtherNames = models.TextField(blank=True)
    productManufacturerId = models.ForeignKey(
        'Manufacturer', on_delete=models.CASCADE, db_column='productManufacturerId', blank=True)
    productPostId = models.ForeignKey(
        'Post', on_delete=models.CASCADE, db_column='productPostId', blank=True)

    class Meta:
        managed = True
        db_table = 'Product'


class PhoneInfo(models.Model):
    phoneInfoId = models.TextField(primary_key=True)
    phoneProductId = models.ForeignKey(
        'Product', on_delete=models.CASCADE, db_column='phoneProductId', blank=True)
    phone3G = models.TextField()
    phone4G = models.TextField()
    dateStartSell = models.DateField(blank=True)
    width = models.FloatField(blank=True)
    height = models.FloatField(blank=True)
    thickness = models.FloatField(blank=True)
    inch = models.FloatField(blank=True)
    weight = models.FloatField(blank=True)
    resolution = models.TextField()
    screenType = models.TextField()
    simType = models.TextField()
    simNumber = models.IntegerField(blank=True)
    osType = models.TextField()
    osVersion = models.TextField()
    chipset = models.TextField()
    GPU = models.TextField()
    RAM = models.IntegerField(blank=True)
    ROM = models.IntegerField(blank=True)
    memoryCardSlot = models.TextField()
    cameraBack = models.FloatField(blank=True)
    cameraFront = models.FloatField(blank=True)
    video = models.TextField()
    WLAN = models.TextField()
    bluetooth = models.TextField()
    GPS = models.TextField()
    NFC = models.TextField()
    Pin = models.TextField()
    price1 = models.FloatField(blank=True)
    price2 = models.FloatField(blank=True)

    class Meta:
        managed = True
        db_table = 'PhoneInfo'


class Guarantee(models.Model):
    guaranteeId = models.TextField()
    Note = models.TextField()

    class Meta:
        managed = True
        db_table = 'Guarantee'


class GuaranteeAndProduct(models.Model):
    id = models.TextField(primary_key=True)
    installmentId = models.ForeignKey('Installment', on_delete=models.CASCADE, db_column='installmentId')
    productId = models.ForeignKey('Product', on_delete=models.CASCADE, db_column='productId')

    class Meta:
        managed = True
        db_table = 'GuaranteeAndProduct'


class Installment(models.Model):
    installmentId = models.TextField(primary_key=True)
    companyName = models.TextField()
    credit = models.TextField()
    note = models.TextField()
    requiredInformation = models.TextField()

    class Meta:
        managed = True
        db_table = 'Installment'


class InstallmentAndProduct(models.Model):
    id = models.TextField(primary_key=True)
    installmentId = models.ForeignKey('Installment', on_delete=models.CASCADE, db_column='installmentId')
    productId = models.ForeignKey('Product', on_delete=models.CASCADE, db_column='productId')

    class Meta:
        managed = True
        db_table = 'InstallmentAndProduct'


class SaleOff(models.Model):
    saleOffId = models.TextField(primary_key=True)
    saleOffPrice = models.FloatField(blank=True)
    productId = models.ForeignKey('Product', on_delete=models.CASCADE, db_column='productId')
    dateStart = models.DateField(blank=True)
    dateEnd = models.DateField(blank=True)
    other = models.TextField()

    class Meta:
        managed = True
        db_table = 'SaleOff'


class StoreInventory(models.Model):
    storeInventoryId = models.TextField(primary_key=True)
    storeId = models.ForeignKey('Store', on_delete=models.CASCADE, db_column='storeId')
    productId = models.ForeignKey('Product', on_delete=models.CASCADE, db_column='productId')
    amount = models.IntegerField(blank=True)

    class Meta:
        managed = True
        db_table = 'StoreInventory'


