START TRANSACTION;

CREATE DATABASE `identifur-frontend`;
USE `identifur-frontend`;

CREATE TABLE `users` (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    uname TEXT NOT NULL,
    passwd TEXT NOT NULL,
    mysqlCreds INT NOT NULL,
    permModUser BIT NOT NULL,
    promptPasswdChange BIT NOT NULL
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

-- It is recommended that you change the root user password!!!!
CREATE USER 'identifur-fr-root'@'localhost' IDENTIFIED BY '_aE#t9T_bS%Fa|Rd*^I+5">v44bBDfyc7q;mFR.+?].Bw[sN^0';
GRANT UPDATE, SELECT, DELETE ON identifur.* TO 'identifur-fr-root'@'localhost';
FLUSH PRIVILEGES;

INSERT INTO `sqlCreds` (id, uname, host, passwd)
    VALUES (0, 'identifur-fr-root', 'localhost', '_aE#t9T_bS%Fa|Rd*^I+5">v44bBDfyc7q;mFR.+?].Bw[sN^0');

INSERT INTO `users` (uname, passwd, mysqlCreds, permModUser, promptPasswdChange)
    VALUES ('root', '4813494d137e1631bba301d5acab6e7bb7aa74ce1185d456565ef51d737677b2', 0, 1, 1);

COMMIT;