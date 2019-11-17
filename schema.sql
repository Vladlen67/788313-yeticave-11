CREATE DATABASE yeticave
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

USE yeticave;

CREATE TABLE category (
    name VARCHAR(120),
    code VARCHAR(100) UNIQUE
);

CREATE INDEX cat_name ON category(name);

CREATE TABLE lot (
    date_create DATETIME,
    title VARCHAR(150),
    description TEXT(500),
    img VARCHAR(250),
    price INT,
    date_end DATE,
    step SMALLINT
);

CREATE INDEX lot_title ON lot(title);

CREATE TABLE rate (
    date DATETIME,
    amount INT
);

CREATE TABLE user (
    register_date DATETIME,
    email VARCHAR(150) NOT NULL UNIQUE,
    name VARCHAR(200),
    password TEXT,
    contact VARCHAR(200)
);

CREATE INDEX us_name ON user(name);
CREATE INDEX us_email ON user(email);
