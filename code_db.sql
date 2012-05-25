# Creates Database for Assignment Trapper
#
# Use this command to run this script:
#
# mysql -u root -p < create_db.sql

CREATE DATABASE trapper;
USE trapper;

CREATE TABLE filecom (
	filecom_id int NOT NULL AUTO_INCREMENT,
	file_id int NOT NULL,				# file ID
	line_no int NOT NULL,				# line number in file
	user_id int NOT NULL,				# user who made the comment
	txt  varchar(128),				# comment made about line
	timeposted timestamp NOT NULL,			# time comment was posted
	PRIMARY KEY (filecom_id)
);

CREATE TABLE comments (
	comment_id int NOT NULL AUTO_INCREMENT,
	user_id int NOT NULL,				# user ID - person who commented
	sub_id int  NOT NULL,				# submission ID
	fac_id int,					# faculty identification id for faculty comments
	role int NOT NULL,				# 0 is prof, 1 is student
	txt  varchar(256),				# comment about this assignment
	timeposted timestamp NOT NULL,			# time comment was posted
	PRIMARY KEY (comment_id)
);

CREATE TABLE schedule (
	sched_id int NOT NULL AUTO_INCREMENT,
	class_id int NOT NULL,				# class section number
	assign_type int NOT NULL,			# type of assignment
	title varchar(256) NOT NULL,			# title of assignment
	chapter varchar(256) NOT NULL,			# chapter number
	section_id varchar(256) NOT NULL,		# section number
	ava_date  DATETIME NOT NULL,			# date for opening of assignment
	due_date DATETIME NOT NULL,			# due date for assignment
	timeposted timestamp NOT NULL,			# time posting
	PRIMARY KEY (sched_id)
);

CREATE TABLE types (
	assign_type int NOT NULL,
	type_name varchar(256),
	PRIMARY KEY (assign_type)
);

INSERT INTO types values (0, "Final Exam");
INSERT INTO types values (1, "In-Class Practice Programs");
INSERT INTO types values (2, "Homework Programs");
INSERT INTO types values (3, "Chapter Test");
INSERT INTO types values (4, "Extra Credit");

CREATE TABLE class (
	class_id int NOT NULL,
	class_name varchar(256) NOT NULL,
	class_section varchar(256) NOT NULL,
	class_location varchar(256),
	class_instructor varchar(256) NOT NULL,
	PRIMARY KEY (class_id)
);

CREATE TABLE enrollment (
	enrollment_id int NOT NULL AUTO_INCREMENT,
	class_id int NOT NULL,
	user_id int NOT NULL,
	PRIMARY KEY (enrollment_id)
);

/*
CREATE TABLE sub (
	sub_id int NOT NULL AUTO_INCREMENT,		# address number - should be KEY to this Table
	user_id int NOT NULL,				# user ID
	sched_id int NOT NULL,				# schedule ID
	time_post DATETIME NOT NULL,			# time posting
	PRIMARY KEY (sub_id)
);
*/

CREATE TABLE files (
	file_id int NOT NULL AUTO_INCREMENT,		# file number - should be KEY to this Table
	sched_id int NOT NULL,				# submission number
	user_id int NOT NULL,				# user ID who submitted file
	file_1 text,					# each file gets one column - not the best way but simple
	file_name varchar(256),				# original name of file
	file_size int,					# size of file in bytes
	time_post DATETIME NOT NULL,			# time file posted
	PRIMARY KEY (file_id)
);

CREATE TABLE users (
	user_id int NOT NULL AUTO_INCREMENT,		#
	email varchar(128) NOT NULL,			# 
	password varchar(128) NOT NULL,			#
	name varchar(128) NOT NULL,			# name of user
	attempts int NOT NULL,				# number of bad attempts to login
	role int NOT NULL,				# 0 is prof, 1 is student
	first_login int NOT NULL,			# 0 is false, 1 is true
	PRIMARY KEY (user_id)
);

# initial root account with default password
insert into users values ("", "steven.schronk@my.tccd.edu", "password", "Schronk, Steven", 0, 0, 1);
