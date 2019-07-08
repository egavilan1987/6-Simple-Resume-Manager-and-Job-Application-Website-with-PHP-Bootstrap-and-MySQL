CREATE DATABASE egm_applications;

USE egm_applications;

CREATE TABLE tbl_users(
	id_user INT NOT NULL AUTO_INCREMENT,
	user_firstname VARCHAR(50) NOT NULL,
	user_lastname VARCHAR(50) NOT NULL,
	user_email VARCHAR(50) NOT NULL,
	user_name VARCHAR(50) NOT NULL,
	user_password text(50) NOT NULL,
	created_date DATETIME NOT NULL,
	PRIMARY KEY(id_user)
	);
CREATE TABLE tbl_candidates(
	id_candidate INT(11) NOT NULL AUTO_INCREMENT,
	candidate_firstname VARCHAR(50) NOT NULL,
	candidate_lastname VARCHAR(50) NOT NULL,
	candidate_email VARCHAR(50) NOT NULL,
	candidate_phone VARCHAR(10) NOT NULL,
	candidate_address VARCHAR(100) NOT NULL,
             candidate_resume VARCHAR(50) NOT NULL,
	created_date DATETIME NOT NULL,
	PRIMARY KEY(id_contact)
);
CREATE TABLE tbl_positions(
	id_position INT(11) NOT NULL AUTO_INCREMENT,
	id_user INT NOT NULL,
	position_name VARCHAR(50) NOT NULL,
	position_description VARCHAR(1000) NOT NULL,
	position_requirement VARCHAR(1000) NOT NULL,	
             created_date DATETIME NOT NULL,
	PRIMARY KEY(id_position)
);
