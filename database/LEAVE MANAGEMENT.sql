
DROP DATABASE IF EXISTS `LEAVE_MANAGEMENT`;
CREATE DATABASE `LEAVE_MANAGEMENT`;
use `LEAVE_MANAGEMENT`;
 
        
CREATE TABLE `DEPARTMENT` (
        `department_id` INT(10)AUTO_INCREMENT PRIMARY KEY,
        `department_name` VARCHAR(50) NOT NULL);


CREATE TABLE `WORK` (
        `work_id` INT(10)AUTO_INCREMENT PRIMARY KEY,
        `title` VARCHAR(50) NOT NULL);

CREATE TABLE `USER`(
            `user_id` INT(10) AUTO_INCREMENT PRIMARY KEY,
        `first_name` VARCHAR(50)NOT NULL,
        `last_name` VARCHAR(50) NOT NULL,
        `sex` VARCHAR(10)NOT NULL,
        `phone_number` VARCHAR(50) NOT NULL,
        `email` VARCHAR(50) NOT NULL,
        `passport` VARCHAR(250) NOT NULL,
        `username` VARCHAR(50) NOT NULL,
        `type` VARCHAR(50) NOT NULL,
        `employee_type` VARCHAR(50) NOT NULL,
        `date_of_birth` DATE NOT NULL,
        `is_active` INT(2) NOT NULL,
        `department` INT(10) NOT NULL,
        `work_title` INT(10) NOT NULL,
        `password` VARCHAR(100) NOT NULL,
        FOREIGN KEY (`department`) REFERENCES `DEPARTMENT` (`department_id`),
        FOREIGN KEY (`work_title`) REFERENCES `WORK` (`work_id`));

CREATE TABLE `LEAVE_TYPE` (
    `leave_id` INT(10)AUTO_INCREMENT PRIMARY KEY,
    `leavetype` VARCHAR(50) NOT NULL);


CREATE TABLE `APPLIED_LEAVE` (
    `applied_id` INT(10)AUTO_INCREMENT PRIMARY KEY,
    `username` INT(10) NOT NULL,
    `leave_typ` INT(10) NOT NULL,
    `from_date` DATE NOT NULL,
    `to_date` DATE NOT NULL,
    `leave_description` VARCHAR(200) NOT NULL,
    `department_nm` INT(10) NOT NULL,
    `job_title` INT(10) NOT NULL,
    `application_date` DATE NOT NULL,
FOREIGN KEY (`username`) REFERENCES `USER` (`user_id`),
FOREIGN KEY (`leave_typ`) REFERENCES `LEAVE_TYPE` (`leave_id`),
FOREIGN KEY (`department_nm`) REFERENCES `DEPARTMENT` (`department_id`),
FOREIGN KEY (`job_title`) REFERENCES `WORK` (`work_id`));


CREATE TABLE `FEEDBACK` (
        `feedback_id` INT(10)AUTO_INCREMENT PRIMARY KEY,
        `applied_leave_user` INT(10) NOT NULL,
        `short_description` VARCHAR(100) NOT NULL DEFAULT 'In progress...',
        `status` VARCHAR(50) NOT NULL DEFAULT 'Processing...',
         `user_applied_feedback` INT(10) NOT NULL,
FOREIGN KEY (`applied_leave_user`) REFERENCES `APPLIED_LEAVE` (`applied_id`),
FOREIGN KEY (`user_applied_feedback`) REFERENCES `USER` (`user_id`));