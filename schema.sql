CREATE DATABASE yeticave
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

USE yeticave;

CREATE TABLE category (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    code VARCHAR(100) NOT NULL UNIQUE
);

CREATE INDEX cat_name ON category(name);
CREATE UNIQUE INDEX cat_id ON category(id);

CREATE TABLE user (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    register_date DATETIME NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    name VARCHAR(200) NOT NULL,
    password TEXT,
    contact VARCHAR(200)
);

CREATE INDEX us_name ON user(name);
CREATE UNIQUE INDEX us_email ON user(email);

CREATE TABLE lot (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    date_create DATETIME,
    title VARCHAR(150),
    description TEXT(5000),
    img VARCHAR(250),
    price INT,
    date_end DATE,
    step SMALLINT,
    id_user INT NOT NULL,
    winner INT,
    id_category INT  NOT NULL,
    FOREIGN KEY (id_user) REFERENCES user(id),
    FOREIGN KEY (winner) REFERENCES user(id),
    FOREIGN KEY (id_category) REFERENCES category(id)
);

CREATE INDEX lot_title ON lot(title);

CREATE TABLE rate (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    date DATETIME,
    amount INT NOT NULL,
    id_user INT,
    id_lot INT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES user(id),
    FOREIGN KEY (id_lot) REFERENCES lot(id)
);
