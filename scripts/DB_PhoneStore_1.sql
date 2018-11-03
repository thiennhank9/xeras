use master

if exists(select * from sys.databases where name='DB_PhoneStore')
	drop database DB_PhoneStore

create database DB_PhoneStore;
go
use DB_PhoneStore
go

create table Province (
    ProvinceId nvarchar(10) primary key,
    ProvinceName nvarchar(255) not null,
    ProvinceOtherNames nvarchar(1000)
);

create table City (
    CityId nvarchar(10) primary key,
    CityName nvarchar(255) not null,
    CityOtherNames nvarchar(1000)
);

create table District (
    DistrictId nvarchar(10) primary key,
    DistrictName nvarchar(255) not null,
    DistrictOtherNames nvarchar(1000)
);

create table Store (
    StoreId nvarchar(10) primary key,
    StoreName nvarchar(255) not null,
    StoreProvinceId nvarchar(10) not null,
    StoreCityId nvarchar(10) not null,
    StoreDistrictId nvarchar(10) not null,
    StoreAddress nvarchar(1000),
    StoreNote nvarchar(1000)
);

create table Producer (
    ProducerId nvarchar(10) primary key,
    ProducerName nvarchar(255) not null,
    ProducerOtherNames nvarchar(1000)
);

create table OSType (
    OSTypeId nvarchar(10) primary key,
    OSTypeName nvarchar(255) not null,
    OSTypeOtherNames nvarchar(1000)
);

create table Phone (
    PhoneId nvarchar(10) primary key,
    PhoneName nvarchar(255) not null,
    PhoneOtherNames nvarchar(1000),
    PhonePrice money,
    PhoneEdition nvarchar(255),
    PhoneColor nvarchar(255),
    PhoneProducerId nvarchar(10) not null,
    PhoneOSTypeId nvarchar(10) not null,
    PhoneScreenWidth float,
    PhoneScreenHeight float,
    PhoneInch float,
    PhonePin int,
    PhoneNumberOfSim int,
    PhoneMemory float,
    PhoneFrontCamera float,
    PhoneBackCamera float,
    PhoneCameraNote nvarchar(1000),
    PhoneInternetNote nvarchar(1000),
    PhoneTypeNote nvarchar(1000),
    PhoneDemandNote nvarchar(1000),
    PhoneRating float,
    PhoneTopSeller float,
    PhoneTags nvarchar(1000),
    PhoneNote nvarchar(1000)
);

create table AmountPhoneByStore (
    StoreId nvarchar(10) not null,
    PhoneId nvarchar(10) not null,
    Amount int
)

create table SaleOff (
    SaleOffId nvarchar(10) primary key,
    SaleOffName nvarchar(255),
    SaleOffPhoneId nvarchar(10) not null,
    SaleOffDateStart date,
    SaleOffDateEnd date,
    SaleOffPricePercentage float,
    SaleOffPriceReduce money,
    SaleOffNote nvarchar(1000)
)

alter table Store add constraint FK_Store_ProvinceId foreign key (StoreProvinceId) references Province(ProvinceId);
alter table Store add constraint FK_Store_CityId foreign key (StoreCityId) references City(CityId);
alter table Store add constraint FK_Store_DistrictId foreign key (StoreDistrictId) references District(DistrictId);

alter table Phone add constraint FK_Phone_PhoneProducerId foreign key (PhoneProducerId) references Producer(ProducerId);
alter table Phone add constraint FK_Phone_PhoneOSTypeId foreign key (PhoneOSTypeId) references OSType(OSTypeId);

alter table AmountPhoneByStore add constraint PK_AmountPhoneByStore primary key (StoreId, PhoneId);

alter table SaleOff add constraint FK_SaleOff_PhoneId foreign key (SaleOffPhoneId) references Phone(PhoneId);