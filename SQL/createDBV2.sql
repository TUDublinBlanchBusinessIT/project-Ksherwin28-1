CREATE DATABASE IF NOT EXISTS petshop;

USE petshop;

CREATE TABLE IF NOT EXISTS users (
    id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS petadoption (
    PetID INT(11) NOT NULL AUTO_INCREMENT,
    PetName VARCHAR(255) NOT NULL,
    PetType VARCHAR(50) NOT NULL,
    Gender VARCHAR(10) NOT NULL,
    NeuteredStatus VARCHAR(20) NOT NULL,
    DateOfBirth DATE NOT NULL,
    Description TEXT NOT NULL,
    PRIMARY KEY (PetID)
);
