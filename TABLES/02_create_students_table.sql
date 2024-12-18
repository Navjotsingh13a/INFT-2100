/* Name: Navjot Singh
   File Name: 03_create_students_table.sql
   Date: 10 October 2024
   Course: INFT2100 */

/* This script creates the student table */
CREATE TABLE students (
    student_id SERIAL PRIMARY KEY,
    user_id INT NOT NULL,
    program_code VARCHAR(50),

    -- Define the foreign key relationship to the users table
    FOREIGN KEY (user_id) 
        REFERENCES users(user_id)
);
