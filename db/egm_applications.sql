CREATE DATABASE egm_application;

USE egm_application;

CREATE TABLE tbl_admin(
	admin_id INT(11) NOT NULL AUTO_INCREMENT,
	admin_name VARCHAR(50) NOT NULL,
	admin_password VARCHAR(150) NOT NULL,
	PRIMARY KEY(admin_id)
	);

CREATE TABLE tbl_candidate(
	candidate_id INT(11) NOT NULL AUTO_INCREMENT,
	candidate_firstname VARCHAR(50) NOT NULL,
	candidate_lastname VARCHAR(50) NOT NULL,
	candidate_email VARCHAR(50) NOT NULL,
	candidate_phone VARCHAR(10) NOT NULL,
	candidate_address VARCHAR(100) NOT NULL,
    candidate_resume VARCHAR(50) NOT NULL,
	created_date DATETIME NOT NULL,
	PRIMARY KEY(candidate_id)
);

CREATE TABLE tbl_position(
	position_id INT(11) NOT NULL AUTO_INCREMENT,
	position_name VARCHAR(50) NOT NULL,
	position_description VARCHAR(1000) NOT NULL,
	position_requirement VARCHAR(1000) NOT NULL,	
    created_date DATETIME NOT NULL,
	PRIMARY KEY(position_id)
);
