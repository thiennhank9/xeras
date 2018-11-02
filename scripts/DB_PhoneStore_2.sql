use master

if exists(select * from sys.databases where name='DB_PhoneStore_new')
	drop database DB_PhoneStore_new

create database DB_PhoneStore_new;
go
use DB_PhoneStore_new
go

create table Store (
    StoreId nvarchar(10) primary key,
    StoreName nvarchar(200),
    Address1 nvarchar(1000),
    Address2 nvarchar(1000),
    City nvarchar(50),
    District nvarchar(50),
    Street nvarchar(50)
)

create table Category (
    CategoryId nvarchar(10) primary key,
    CategoryName nvarchar(100),
)

create table Manufacturer (
    ManufacturerId nvarchar(10) primary key,
    ManufacturerName nvarchar(200),
    Address1 nvarchar(1000),
    Address2 nvarchar(1000),
    City nvarchar(50),
    District nvarchar(50),
    Street nvarchar(50)
)

create table Post (
    PostId nvarchar(10) primary key,
    PostTitle nvarchar(200),
    PostContent nvarchar(100000),
    PostLink nvarchar(200),
)

create table Product (
    ProductId nvarchar(10) primary key,
    ProductCategoryId nvarchar(10) references Category(CategoryId),
    ProductName nvarchar(200),
    ProductOtherNames nvarchar(1000),
    ProductManufacturerId nvarchar(10) references Manufacturer(ManufacturerId),
    ProductPostId nvarchar(10) references Post(PostId)
)

create table PhoneInfo (
    PhoneInfoId nvarchar(10) primary key,
    PhoneProductId nvarchar(10) references Product(ProductId),
    Phone3G nvarchar(200),
    Phone4G nvarchar(200),
    DateStartSell date,
    Width float,
    Height float,
    Thickness float,
    Inch float,
    Weight float,
    Resolution nvarchar(200), -- độ phân giải 1125 x 2436 pixels
    ScreenType nvarchar(200), -- loại màn hình Super Retina
    SimType nvarchar(50), -- sim nano hay normal
    SimNumber int, -- số thẻ sim
    OsType nvarchar(200), -- hệ điều hành IOS
    OsVersion nvarchar(200), -- IOS 10
    Chipset nvarchar(200),
    GPU nvarchar(200),
    RAM int,
    ROM int,
    MemoryCardSlot nvarchar(200),
    CameraBack float,
    CameraFront float,
    Video nvarchar(1000),
    WLAN nvarchar(1000),
    Bluetooth nvarchar(1000),
    GPS nvarchar(1000),
    NFC nvarchar(1000),
    Pin nvarchar(200),
    Price1 money,
    Price2 money
)

create table Guarantee (
    GuaranteeId nvarchar(10) primary key,
    Note nvarchar(1000),
)

create table GuaranteeAndProduct (
    Id nvarchar(10) primary key,
    GuaranteeId nvarchar(10) references Guarantee(GuaranteeId),
    ProductId nvarchar(10) references Product(ProductId)
)

create table Installment ( -- trả góp
    InstallmentId nvarchar(10) primary key,
    CompanyName nvarchar(200),
    Credit nvarchar(200),
    Note nvarchar(1000),
    RequiredInformation nvarchar(1000)
)

create table InstallmentAndProduct ( -- sản phẩm có áp dụng trả góp
    Id nvarchar(10) primary key,
    InstallmentId nvarchar(10) references Installment(InstallmentId),
    ProductId nvarchar(10) references Product(ProductId)
)

create table SaleOff ( -- khuyến mãi
    SaleOffId nvarchar(10) primary key,
    SaleOffPrice money,
    ProductId nvarchar(10) references Product(ProductId),
    DateStart date,
    DateEnd date,
    Other nvarchar(1000)
)

create table StoreInventory (
    StoreInventoryId nvarchar(10) primary key,
    StoreId nvarchar(10) references Store(StoreId),
    ProductId nvarchar(10) references Product(ProductId),
    Amount int
)

