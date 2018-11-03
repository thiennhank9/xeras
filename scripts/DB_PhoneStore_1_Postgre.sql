use master

if exists(select * from sys.databases where name='DB_PhoneStore')
	drop database DB_PhoneStore

create database DB_PhoneStore;
go
use DB_PhoneStore
go

create table Province (
    ProvinceId text primary key,
    ProvinceName text not null,
    ProvinceOtherNames text
);

create table City (
    CityId text primary key,
    CityName text not null,
    CityOtherNames text
);

create table District (
    DistrictId text primary key,
    DistrictName text not null,
    DistrictOtherNames text
);

create table Store (
    StoreId text primary key,
    StoreName text not null,
    StoreProvinceId text not null,
    StoreCityId text not null,
    StoreDistrictId text not null,
    StoreAddress text,
    StoreNote text
);

create table Producer (
    ProducerId text primary key,
    ProducerName text not null,
    ProducerOtherNames text
);

create table OSType (
    OSTypeId text primary key,
    OSTypeName text not null,
    OSTypeOtherNames text
);

create table Phone (
    PhoneId text primary key,
    PhoneName text not null,
    PhoneOtherNames text,
    PhonePrice money,
    PhoneEdition text,
    PhoneColor text,
    PhoneInstallmentId text,    
    PhoneWarrantyId text,
    PhoneProducerId text not null,
    PhoneOSTypeId text not null,
    PhoneScreenWidth float,
    PhoneScreenHeight float,
    PhoneInch float,
    PhonePin int,
    PhoneNumberOfSim int,
    PhoneMemory float,
    PhoneFrontCamera float,
    PhoneBackCamera float,
    PhoneCameraNote text,
    PhoneInternetNote text,
    PhoneTypeNote text,
    PhoneDemandNote text,
    PhoneRating float,
    PhoneTopSeller float,
    PhoneTags text,
    PhoneNote text
);

create table AmountPhoneByStore (
    StoreId text not null,
    PhoneId text not null,
    Amount int
);

create table SaleOff (
    SaleOffId text primary key,
    SaleOffName text,
    SaleOffPhoneId text not null,
    SaleOffDateStart date,
    SaleOffDateEnd date,
    SaleOffPricePercentage float,
    SaleOffPriceReduce money,
    SaleOffNote text
)

create table Installment (
    InstallmentId text primary key,
    InstallmentRate float,
    InstallmentCompanyName text,
    InstallmentNote text
)

create table Warranty (
    WarrantyId text primary key,
    WarrantyType text,
    WarrantyDuration float,
    WarrantyTerms text,
    WarrantyNote text
);

alter table Store add constraint FK_Store_ProvinceId foreign key (StoreProvinceId) references Province(ProvinceId);
alter table Store add constraint FK_Store_CityId foreign key (StoreCityId) references City(CityId);
alter table Store add constraint FK_Store_DistrictId foreign key (StoreDistrictId) references District(DistrictId);

alter table Phone add constraint FK_Phone_PhoneProducerId foreign key (PhoneProducerId) references Producer(ProducerId);
alter table Phone add constraint FK_Phone_PhoneOSTypeId foreign key (PhoneOSTypeId) references OSType(OSTypeId);
alter table Phone add constraint FK_Phone_PhoneInstallmentId foreign key (PhoneInstallmentId) references Installment(InstallmentId);
alter table Phone add constraint FK_Phone_PhoneWarrantyId foreign key (PhoneWarrantyId) references Warranty(WarrantyId);

alter table AmountPhoneByStore add constraint PK_AmountPhoneByStore primary key (StoreId, PhoneId);

alter table SaleOff add constraint FK_SaleOff_PhoneId foreign key (SaleOffPhoneId) references Phone(PhoneId);