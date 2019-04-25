CREATE DATABASE capstone_database;

USE capstone_database;

CREATE TABLE people (
	BannerId char(9) PRIMARY KEY NOT NULL UNIQUE,
    FirstName varchar(45) NOT NULL,
    LastName varchar(45) NOT NULL,
    HasParkingPass char(1) NOT NULL
);

CREATE TABLE meter (
	MeterId char(4) PRIMARY KEY UNIQUE NOT NULL,
    Building varchar(25), 
    BuildingId char(4) NOT NULL , 
    Latitude decimal(2,2) NOT NULL ,
    Longitude decimal(2,2) NOT NULL,
    CONSTRAINT Buildingpk foreign key(BuildingId) references building(BuildingId)
);

CREATE TABLE _usage (
	TransactionId char(4) PRIMARY KEY UNIQUE NOT NULL,
    BannerId char(9) NOT NULL,
    MeterId char(4) NOT NULL,
    StartTime datetime NOT NULL,
    EndTime datetime,
    TotalTime datetime,
    CONSTRAINT Peoplepk foreign key(BannerId) references people(BannerId),
    CONSTRAINT Meterpk foreign key(MeterId) references meter(MeterId)
);

CREATE TABLE Building (
	BuildingId char(4) PRIMARY KEY UNIQUE NOT NULL,
    Building varchar(25),
    Address varchar(50)
);
