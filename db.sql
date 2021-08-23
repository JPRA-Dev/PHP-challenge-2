CREATE TABLE `users`(
    `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `firstname` VARCHAR(255) NOT NULL,
    `lastname` VARCHAR(255) NOT NULL,
    `company_id` INT NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `telephone` VARCHAR(255) NOT NULL,
    `username` VARCHAR(255) NOT NULL,
    `pwd` VARCHAR(255) NOT NULL
);
CREATE TABLE `company`(
    `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `country` VARCHAR(255) NOT NULL,
    `vatnumber` INT NOT NULL,
    `company_type_id` INT NOT NULL
);
CREATE TABLE `invoices`(
    `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `nbrinvoice` VARCHAR(255) NOT NULL,
    `dateinvoice` DATETIME NOT NULL,
    `company_id` INT NOT NULL,
    `telephone` VARCHAR(13) NOT NULL,
    `contact_person_id` INT NOT NULL
);
CREATE TABLE `company_type`(
    `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `type` INT NOT NULL
);
CREATE TABLE `users_group`(
    `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `permissions` VARCHAR(255) NOT NULL
);
CREATE TABLE `users_session`(
    `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `users_Id` INT NOT NULL,
    `hash` VARCHAR(255) NOT NULL
);
CREATE TABLE `contact_person`(
    `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `firstname` VARCHAR(255) NOT NULL,
    `lastname` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `company_id` INT NOT NULL,
    `telephone` VARCHAR(13) NOT NULL
);