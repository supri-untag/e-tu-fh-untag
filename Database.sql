CREATE DATABASE php_etu_prod;
CREATE DATABASE php_etu_prod_test;

/*Add Table Users*/
CREATE TABLE users(
    id VARCHAR(250) NOT NULL PRIMARY KEY COLLATE utf8_general_ci,
    name VARCHAR (300) NOT NULL COLLATE utf8_general_ci,
    username VARCHAR(50) COLLATE utf8_general_ci,
    password VARCHAR (300) NOT NULL COLLATE utf8_general_ci,
    email VARCHAR (250) NOT NULL  COLLATE utf8_general_ci,
    image VARCHAR (250) COLLATE utf8_general_ci,
    date_add DATE NOT NULL COLLATE utf8_general_ci,
    verify VARCHAR (5) NOT NULL COLLATE utf8_general_ci,
    role VARCHAR (50) NOT NULL COLLATE utf8_general_ci,
    INDEX (username, email)
)ENGINE InnoDB DEFAULT CHARSET =utf8 COLLATE=utf8_general_ci;

ALTER TABLE `users` ADD `bagian` VARCHAR(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `name`;

/*add Session*/
CREATE TABLE sessions(
                      id VARCHAR(250) NOT NULL PRIMARY KEY COLLATE utf8_general_ci,
                      user_id VARCHAR (250) NOT NULL COLLATE utf8_general_ci,
                      tipe VARCHAR(50) NOT NULL COLLATE utf8_general_ci,
                      time_login DATE NOT NULL COLLATE utf8_general_ci,
                      INDEX (user_id),
                      CONSTRAINT `fk_session_users` FOREIGN KEY (user_id) references users(id)
)ENGINE InnoDB DEFAULT CHARSET =utf8 COLLATE=utf8_general_ci