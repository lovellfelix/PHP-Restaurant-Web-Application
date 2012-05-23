# ---------
# Script use to create and populate Employees table
# ---------

# ----------
#script file to create database
# ----------
CREATE DATABASE website_db;

# ----------
#script file use to create table
# ----------

USE website_db;

CREATE TABLE EMPLOYEES (
employee_id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
first_name VARCHAR(20) NOT NULL,
last_name VARCHAR(40) NOT NULL,
email VARCHAR(80) NOT NULL,
pass CHAR(40) NOT NULL,
role VARCHAR(40) NOT NULL,
date_created DATETIME NOT NULL,
PRIMARY KEY (employee_id)
);

CREATE TABLE CONTACTUS (
contact_id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
first_name VARCHAR(20) NOT NULL,
last_name VARCHAR(40) NOT NULL,
email VARCHAR(80) NOT NULL,
message VARCHAR(360) NOT NULL,
date_created DATETIME NOT NULL,
PRIMARY KEY (contact_id)
);

CREATE TABLE EMPLOYEE INFO (
employeeinfo_id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
social_security_no VARCHAR(9) NOT NULL,
birth_date VARCHAR(20) NOT NULL,
gender VARCHAR(80) NOT NULL,
address VARCHAR(20) NOT NULL,
phone VARCHAR(20) NOT NULL,
memo VARCHAR(360) NOT NULL,
PRIMARY KEY (employeeinfo_id));


CREATE TABLE food (
food_id INT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
food_name VARCHAR(20) DEFAULT NULL,
food_type VARCHAR(20) DEFAULT NULL,
PRIMARY KEY (food_id),
INDEX full_name (food_name, food_type)
) ENGINE=MyISAM;

CREATE TABLE menu (
menu_id INT(4) UNSIGNED NOT NULL AUTO_INCREMENT,
food_id INT(3) UNSIGNED NOT NULL,
menu_name VARCHAR(60) NOT NULL,
price DECIMAL(6,2) UNSIGNED NOT NULL,
size VARCHAR(60) DEFAULT NULL,
description VARCHAR(255) DEFAULT NULL,
image_name VARCHAR(60) NOT NULL,
PRIMARY KEY (menu_id),
INDEX (food_id),
INDEX (menu_name),
INDEX (price)
) ENGINE=MyISAM;

CREATE TABLE orders (
order_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
employee_id INT(5) UNSIGNED NOT NULL,
total DECIMAL(10,2) UNSIGNED NOT NULL,
order_date TIMESTAMP,
PRIMARY KEY (order_id),
INDEX (employee_id),
INDEX (order_date)
) ENGINE=InnoDB;

CREATE TABLE order_contents (
oc_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
order_id INT(10) UNSIGNED NOT NULL,
menu_id INT(4) UNSIGNED NOT NULL,
quantity TINYINT UNSIGNED NOT NULL DEFAULT 1,
price DECIMAL(6,2) UNSIGNED NOT NULL,
ship_date DATETIME default NULL,
PRIMARY KEY (oc_id),
INDEX (order_id),
INDEX (menu_id)
) ENGINE=InnoDB;


#-------
#Script use to populating tables
#--------

#insert users into employee table

INSERT INTO EMPLOYEES (first_name, last_name, email, pass, role, date_created) VALUES
('Lovell', 'Felix', 'lovell.felix@gmail.com', SHA1('password'), 'admin', NOW()),
('John', 'Lennon', 'john@beatles.com', SHA1('Happin3ss'), 'admin', NOW()),
('Paul', 'McCartney', 'paul@beatles.com', SHA1('letITbe'), 'waiter', NOW()),
('George', 'Harrison', 'george@beatles.com', SHA1('something'), 'supervisor', NOW()),
('Ringo', 'Starr', 'ringo@beatles.com', SHA1('thisboy'), 'waiter', NOW()),
('David', 'Jones', 'davey@monkees.com', SHA1('fasfd'), 'manager', NOW()),
('Peter', 'Tork', 'peter@monkees.com', SHA1('warw'), 'manager', NOW()),
('Micky', 'Dolenz', 'micky@monkees.com', SHA1('afsa'), 'waiter', NOW()),
('Mike', 'Nesmith', 'mike@monkees.com', SHA1('abdfadf'), 'waiter', NOW()),
('David', 'Sedaris', 'david@authors.com', SHA1('adfwrq'), 'waiter', NOW());

#insert into contact us table

INSERT INTO CONTACTUS (first_name, last_name, email, message, date_created) VALUES
('John', 'Lennon', 'john@beatles.com', 'I want to use your resturant for a birthday party', NOW()),
('Paul', 'McCartney', 'paul@beatles.com', 'lovely resturant good job', NOW()),
('George', 'Harrison', 'george@beatles.com', 'I hate your resturant the food stink', NOW()),
('Ringo', 'Starr', 'ringo@beatles.com', 'I want more variety of foods', NOW());
('grace', 'zhange', 'grace.zhange@mwu.edu', 'good job', NOW());
('John', 'Doe', 'john.doe@email.com', 'I will burn your resturant to the ground if you cotinue with this old food', NOW());
