CREATE DATABASE IF NOT EXISTS photographe;

USE photographe;

CREATE TABLE IF NOT EXISTS messages (
  id integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
  author varchar(64) NOT NULL,
  subject varchar(150) NOT NULL,
  message text NOT NULL,
  email varchar(64) NOT NULL,
  phone varchar(20) NOT NULL,
  creation_date varchar(64) NOT NULL,
  status integer NOT NULL
);

CREATE TABLE IF NOT EXISTS portfolio (
  id integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
  image varchar(64) NOT NULL,
  nametag varchar(64) integer NOT NULL,
  type int NOT NULL,
  author varchar(64) NOT NULL,
  upload_date varchar(64) NOT NULL
);

CREATE TABLE IF NOT EXISTS settings (
  id integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
  social_media text NOT NULL,
  update_author varchar(64) NOT NULL,
  update_date varchar(64) NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
  id integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name varchar(64) NOT NULL,
  email varchar(64) NOT NULL,
  password varchar(64) NOT NULL,
  creation_date varchar(64) NOT NULL
);
