/* Name: Navjot Singh */
/* File Name: 09_crud_examples.sql */
/* Date: October 10, 2024 */
/* Course: INFT2100 */


/* Insert at least three new users into the users table */
INSERT INTO users (first_name, last_name, email, birth_date, password) VALUES
('Sartaj', 'Singh', 'sartaj.singh@gmail.com', '2003-05-15', 'Durhamcollege1'),
('Ashok', 'Sapkota', 'ashok.sapkota@gmail.com', '2002-07-22', 'Durhamcollege12'),
('Anjal', 'Kafle', 'anjal.kafle@gmail.com', '2002-09-13', 'Durhamcollege123');

/* SELECT Example without a WHERE clause: Retrieve all users information */
SELECT * FROM users;

/* SELECT Example with a WHERE clause: Retrieve a user's information based on their email */
SELECT * FROM users WHERE email = 'sartajsingh@gmail.com';

/* SELECT Example with a WHERE clause: Retrieve all users' first_name, last_name, email based on their user_id */
SELECT first_name, last_name, email FROM users WHERE user_id = 100900002;

/* SELECT Example with an ORDER BY clause: Retrieve all users' first_name, last_name, user_id, created_at, last_access, ordered by last_access (newest to oldest) */
SELECT first_name, last_name, user_id, created_at, last_access 
FROM users 
ORDER BY last_access DESC;

/* Update the last_access timestamp for a user based on their user_id */
UPDATE users 
SET last_access = CURRENT_TIMESTAMP 
WHERE user_id = 100900001;

/* Update the first_name field for a user based on their email */
UPDATE users 
SET first_name = 'Sartaj' 
WHERE email = 'sartaj.singh@gmail.com';

/* Delete one of your new users based on their user_id */
DELETE FROM users WHERE user_id = 100900052;

/* Delete one of your new users based on their last_name and first_name */
DELETE FROM users WHERE first_name = 'Anjal' AND last_name = 'Kafle';

/* Insert a new course into the courses table */
INSERT INTO courses (course_code, course_name, course_description, semester) 
VALUES ('INFT2123', 'Business', 'About Business', 5);

/* SELECT students with marks greater than 80 */
SELECT students.student_id, users.first_name, users.last_name, marks.course_code, marks.final_mark
FROM students
JOIN marks ON students.student_id = marks.student_id
JOIN users ON students.student_id = users.user_id
WHERE marks.final_mark > 80;

/* Update a course description for the new course based on its course_code */
UPDATE courses 
SET course_description = 'Techniques in web development'
WHERE course_code = 'INFT4100';

/* Delete a student based on the student_id */
DELETE FROM students WHERE student_id = 5;