# Creates Database for Assignment Trapper
#
# Use this command to run this script:
#
# mysql -u root -p < create_db.sql

CREATE DATABASE trapper2;
USE trapper2;

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
	txt varchar(65536),				# comment about this assignment
	timeposted timestamp NOT NULL,			# time comment was posted
	PRIMARY KEY (comment_id)
);

CREATE TABLE sched_details (
	detail_id int NOT NULL AUTO_INCREMENT,
	sched_id int NOT NULL,
	user_id int NOT NULL,
	user_viewed int,				# comments have been viewed by user
	fac_viewed int,					# comments have been viewed by faculty
	help_me int,					# students can ask for help on thier assignments
	late int,					# students who turn in work late have assignment permanently marked
	timeposted timestamp NOT NULL,			# time comment was posted
	PRIMARY KEY (detail_id)
);

# alter table sched_details add column late int;

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
	graded int NOT NULL,				# 0 for no and 1 for yes
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

insert into class values ("", "Test Class", "101", "RM 205", "Schronk,Steven");

CREATE TABLE enrollment (
	enrollment_id int NOT NULL AUTO_INCREMENT,
	class_id int NOT NULL,
	user_id int NOT NULL,
	PRIMARY KEY (enrollment_id)
);

insert into enrollment values ("", "0", "1");

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

CREATE TABLE chat (
	chat_id int NOT NULL AUTO_INCREMENT,
	user_id int NOT NULL,
	content varchar(256) NOT NULL,
	chat_time timestamp NOT NULL,
	PRIMARY KEY(chat_id)
);

CREATE TABLE discussion_topic (
	topic_id int NOT NULL AUTO_INCREMENT,
	topic_name varchar(128),
	topic_description varchar(256),
	discussion_sticky int NOT NULL,				# 1 if sticky 0 if not
	topic_time timestamp NOT NULL,
	PRIMARY KEY(topic_id)
);

insert into discussion_topic values("", "Class Suggestions", "Make suggestions for new classes or complain about what is wrong with the current classes.", "1", NOW());
insert into discussion_topic values("", "Site Suggestions", "Conversation about how to make this website better.", "1", NOW());
insert into discussion_topic values("", "Technical Support", "Obtaining general technical support about using the site.", "1", NOW());
insert into discussion_topic values("", "Talk About Anything", "Talk about whatever you like here.", "0", NOW());

CREATE TABLE discussion_post (
	post_id int NOT NULL AUTO_INCREMENT,
	user_id int NOT NULL,					# no anonymous users
	topic_id int,							# if no topic set, goes with assignment
	sched_id int,
	post_content text,
	post_time timestamp NOT NULL,
	PRIMARY KEY(post_id)
);

insert into discussion_post values ("", "1", "1", "", "Please help.", now());
insert into discussion_post values ("", "1", "1", "", "Need help with email.", now());
insert into discussion_post values ("", "1", "3", "", "Could we have more discussions?", now());
insert into discussion_post values ("", "1", "2", "", "Lets tlk about anything here", now());




CREATE TABLE news (
	news_id int NOT NULL AUTO_INCREMENT,
	user_id int NOT NULL,					# no anonymous news
	news text,
	news_open DATETIME NOT NULL,			# news appears for users
	news_close DATETIME NOT NULL,			# news no longer on front page for users
	news_update_time timestamp NOT NULL,	# timestamp for updates
	PRIMARY KEY(news_id)
);

CREATE TABLE users (
	user_id int NOT NULL AUTO_INCREMENT,		#
	email varchar(128) NOT NULL,			# 
	password varchar(128) NOT NULL,			#
	name varchar(128) NOT NULL,			# name of user
	attempts int NOT NULL,				# number of bad attempts to login
	role int NOT NULL,				# 0 is prof, 1 is student
	first_login int NOT NULL,			# 0 is false, 1 is true
	last_click timestamp,				# for instant message user list
	reset_hash varchar(40),				# used to reset a user password via email
	PRIMARY KEY (user_id)
);

# initial root account with default password
insert into users values ("", "steven.schronk@my.tccd.edu", sha1("password"), "Schronk, Steven", 0, 0, 1,NOW(),"");
