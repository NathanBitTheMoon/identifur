CREATE DATABASE `identifur`;
USE `identifur`;

CREATE TABLE faLinks (
    id INT NOT NULL PRIMARY KEY,
    link TEXT NOT NULL,
    thumb TEXT NOT NULL,
    title TEXT NOT NULL,
    resourceId INT NOT NULL AUTO_INCREMENT
);

CREATE TABLE resources (
    id INT NOT NULL PRIMARY KEY,
    resourceDir TEXT,
    fursona INT
);

CREATE TABLE suits (
    id INT NOT NULL,
    fursonaName TEXT,
    fursonaSpecies TEXT,
    fursonaGender TEXT,
    ownerSocial TEXT
);