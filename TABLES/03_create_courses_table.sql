/* Name: Navjot Singh
   File Name: 03_create_courses_table.sql
   Date: 10 October 2024
   Course: INFT2100 */

/* This script creates the courses table, where each course is identified by a unique course_code and includes a course_description */
CREATE TABLE courses (
    course_code CHAR(10) PRIMARY KEY,
    course_name VARCHAR(100) NOT NULL,
    course_description TEXT,
    semester INT NOT NULL
);
