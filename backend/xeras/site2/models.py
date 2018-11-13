from django.db import models


class Store(models.Model):
    storeName = models.TextField()
    address1 = models.TextField()
    address2 = models.TextField()
    City = models.TextField()
    district = models.TextField()
    street = models.TextField()
    province = models.TextField()
    storePayment = models.TextField()

    def __str__(self):
        return '%s' % self.storeName

    class Meta:
        managed = True
        db_table = 'Store_CT'


class Category(models.Model):
    categoryName = models.TextField()

    def __str__(self):
        return '%s' % self.categoryName

    class Meta:
        managed = True
        db_table = 'Category'


class Manufacturer(models.Model):
    manufacturerName = models.TextField()
    address1 = models.TextField()
    address2 = models.TextField()
    City = models.TextField()
    district = models.TextField()
    street = models.TextField()

    def __str__(self):
        return '%s' % self.manufacturerName

    class Meta:
        managed = True
        db_table = 'Manufacturer'


class Post(models.Model):
    postTitle = models.TextField()
    postContent = models.TextField()
    postLink = models.TextField()

    def __str__(self):
        return '%s' % self.postTitle

    class Meta:
        managed = True
        db_table = 'Post'


class Product(models.Model):
    productCategoryId = models.ForeignKey(
        'Category', on_delete=models.CASCADE, db_column='productCategoryId', blank=True)
    productName = models.TextField()
    productOtherNames = models.TextField(blank=True)
    productManufacturerId = models.ForeignKey(
        'Manufacturer', on_delete=models.CASCADE, db_column='productManufacturerId', blank=True)
    productPostId = models.ForeignKey(
        'Post', on_delete=models.CASCADE, db_column='productPostId', blank=True)

    def __str__(self):
        return '%s' % self.productName

    class Meta:
        managed = True
        db_table = 'Product'


class LanguageSupport(models.Model):
    languageName = models.TextField()

    def __str__(self):
        return '%s' % self.languageName

    class Meta:
        managed = True
        db_table = 'LanguageSupport'


class PhoneCode(models.Model):
    code = models.TextField()

    def __str__(self):
        return '%s' % self.code

    class Meta:
        managed = True
        db_table = 'PhoneCode'


class PhoneInfo(models.Model):
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
    version = models.TextField()
    GPU = models.TextField()
    RAM = models.IntegerField(blank=True)
    ROM = models.IntegerField(blank=True)
    phoneLanguage = models.ManyToManyField(LanguageSupport)
    fromCountry = models.TextField() # San xuat tai quoc gia
    phoneFeature = models.ForeignKey(
        'PhoneFeature', on_delete=models.CASCADE, db_column='phoneFeature', blank=True)
    fromType = models.TextField() # Quoc Te, Nhap khau
    status = models.TextField() # brand new hoac like new
    phoneCode = models.ForeignKey(
        'PhoneCode', on_delete=models.CASCADE, db_column='phoneCode', blank=True)
    phoneInfoType = models.TextField()
    memoryCardSlot = models.TextField(default=1)
    chargerType = models.TextField(default="sạc 2 chấu")
    chargerTime = models.FloatField(default=2)
    phoneTimeUsing = models.TextField(default="6-8 tiếng")
    cameraBack = models.FloatField(blank=True)
    cameraFront = models.FloatField(blank=True)
    phoneCase = models.TextField(default='Vỏ nhôm')
    video = models.TextField()
    WLAN = models.TextField()
    bluetooth = models.TextField()
    GPS = models.TextField()
    NFC = models.TextField()
    Pin = models.TextField()
    color = models.TextField()
    price1 = models.FloatField(blank=True)
    price2 = models.FloatField(blank=True)
    other = models.TextField(default="Chống nước")

    def __str__(self):
        product = self.phoneProductId
        product_info = self
        return '%s - %s GB - %s' % (product.productName, product_info.ROM, product_info.color)

    class Meta:
        managed = True
        db_table = 'PhoneInfo'


class PhoneFeature(models.Model):
    game = models.TextField()
    music = models.TextField()
    photo = models.TextField()
    video = models.TextField()
    videoCall = models.TextField()
    featureTimeUsing = models.TextField() # thoi gian su dung tung loai
    phoneInfo = models.OneToOneField(
        PhoneInfo,
        on_delete=models.CASCADE,
        default=5,
    )

    def __str__(self):
        return '%s feature' % self.phoneInfo.phoneProductId.productName

    class Meta:
        managed = True
        db_table = 'PhoneFeature'


class Guarantee(models.Model):
    guaranteeName = models.TextField(default=None)
    duration = models.IntegerField()
    productId = models.ManyToManyField(Product)
    Note = models.TextField()

    def __str__(self):
        return '%s' % self.guaranteeName

    class Meta:
        managed = True
        db_table = 'Guarantee'


class Installment(models.Model):
    companyName = models.TextField()
    credit = models.TextField()
    note = models.TextField()
    requiredInformation = models.TextField()
    productId = models.ManyToManyField(Product)

    def __str__(self):
        return '%s' % self.companyName

    class Meta:
        managed = True
        db_table = 'Installment'


class SaleOff(models.Model):
    saleOffName = models.TextField(default=None)
    saleOffPrice = models.FloatField(blank=True)
    productId = models.ForeignKey('Product', on_delete=models.CASCADE, db_column='productId')
    dateStart = models.DateField(blank=True)
    dateEnd = models.DateField(blank=True)
    other = models.TextField() # is this giff or other content

    def __str__(self):
        return '%s - discount:%s - duration: %s - %s ' % (self.saleOffName, self.saleOffPrice, self.dateStart,
                                                          self.dateEnd)

    class Meta:
        managed = True
        db_table = 'SaleOff'


class StoreInventory(models.Model):
    storeId = models.ForeignKey('Store', on_delete=models.CASCADE, db_column='storeId')
    productId = models.ForeignKey('Product', on_delete=models.CASCADE, db_column='productId')
    amount = models.IntegerField(blank=True)

    def __str__(self):
        return 'StoreInventory: %s - amount: %s' % (self.productId.productName, self.amount)

    class Meta:
        managed = True
        db_table = 'StoreInventory'
