START TRANSACTION;

CREATE DATABASE `identifur-frontend`;
USE `identifur-frontend`;

CREATE TABLE `users` (
    id INT NOT NULL PRIMARY KEY,
    uname TEXT NOT NULL,
    passwd TEXT NOT NULL,
    mysqlCreds INT NOT NULL,
    permModUser BIT NOT NULL
);

CREATE TABLE `auditLog` (
    id INT NOT NULL,
    dt DATETIME NOT NULL,
    user INT NOT NULL,
    act TEXT NOT NULL
);

CREATE TABLE `sqlCreds` (
    id INT NOT NULL,
    uname TEXT NOT NULL,
    host TEXT NOT NULL,
    passwd TEXT NOT NULL
);

COMMIT;