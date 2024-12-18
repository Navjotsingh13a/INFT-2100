/* Name: Navjot Singh */
/* File Name: 08_insert_marks_data.sql */
/* Date: October 10, 2024 */
/* Course: INFT2100 */

/* This script inserts data into the marks table */

/* No marks for Semester 1 students */  
INSERT INTO public.marks (student_id, course_code, final_mark, achieved_at) VALUES 

(2, 'COSC 1100', 85, CURRENT_TIMESTAMP),  -- Semester 2 student
(2, 'INFT 1105', 78, CURRENT_TIMESTAMP),
(3, 'COSC 1100', 90, CURRENT_TIMESTAMP),  -- Graduate student
(3, 'INFT 1105', 88, CURRENT_TIMESTAMP),
(3, 'COSC 2100', 82, CURRENT_TIMESTAMP),
(3, 'INFT 2100', 76, CURRENT_TIMESTAMP),
(4, 'COSC 1100', 83, CURRENT_TIMESTAMP),  -- Semester 3 student
(4, 'INFT 1105', 75, CURRENT_TIMESTAMP),
(5, 'COSC 1100', 89, CURRENT_TIMESTAMP),  -- Graduate student
(5, 'INFT 1105', 92, CURRENT_TIMESTAMP),
(5, 'COSC 2100', 85, CURRENT_TIMESTAMP),
(5, 'INFT 2100', 87, CURRENT_TIMESTAMP),

-- CPGA students
(26, 'COSC 1100', 78, CURRENT_TIMESTAMP),  -- Semester 1 student, no marks for now
(27, 'COSC 1100', 82, CURRENT_TIMESTAMP),  -- Semester 3 student
(27, 'INFT 1105', 79, CURRENT_TIMESTAMP),
(28, 'COSC 1100', 91, CURRENT_TIMESTAMP),  -- Graduate student
(28, 'INFT 1105', 87, CURRENT_TIMESTAMP),
(28, 'COSC 2100', 90, CURRENT_TIMESTAMP),
(28, 'INFT 3201', 95, CURRENT_TIMESTAMP),
(29, 'COSC 1100', 84, CURRENT_TIMESTAMP),  -- Semester 2 student
(29, 'INFT 1105', 76, CURRENT_TIMESTAMP),

-- More students
(6, 'COSC 1100', 88, CURRENT_TIMESTAMP),
(7, 'INFT 1105', 81, CURRENT_TIMESTAMP),
(8, 'COSC 2100', 93, CURRENT_TIMESTAMP),
(9, 'INFT 2100', 80, CURRENT_TIMESTAMP),
(10, 'COSC 1100', 77, CURRENT_TIMESTAMP),
(11, 'INFT 3201', 94, CURRENT_TIMESTAMP),
(12, 'COSC 2200', 85, CURRENT_TIMESTAMP),
(13, 'INFT 1105', 87, CURRENT_TIMESTAMP),
(14, 'COSC 2100', 89, CURRENT_TIMESTAMP),
(15, 'INFT 2100', 86, CURRENT_TIMESTAMP),

-- Remaining CPGA students
(30, 'COSC 1100', 79, CURRENT_TIMESTAMP),
(31, 'INFT 1105', 90, CURRENT_TIMESTAMP),
(32, 'COSC 2100', 88, CURRENT_TIMESTAMP),
(33, 'INFT 3201', 91, CURRENT_TIMESTAMP),
(34, 'COSC 1100', 85, CURRENT_TIMESTAMP),
(35, 'INFT 2100', 83, CURRENT_TIMESTAMP),
(36, 'COSC 2200', 80, CURRENT_TIMESTAMP),
(37, 'INFT 3201', 95, CURRENT_TIMESTAMP),
(38, 'COSC 1100', 87, CURRENT_TIMESTAMP),
(39, 'INFT 1105', 92, CURRENT_TIMESTAMP),

-- Final marks for the last set of students
(40, 'COSC 2100', 84, CURRENT_TIMESTAMP),
(41, 'INFT 2100', 86, CURRENT_TIMESTAMP),
(42, 'COSC 2200', 89, CURRENT_TIMESTAMP),
(43, 'INFT 1105', 78, CURRENT_TIMESTAMP),
(44, 'COSC 3201', 90, CURRENT_TIMESTAMP),
(45, 'INFT 2100', 82, CURRENT_TIMESTAMP),
(46, 'COSC 1100', 85, CURRENT_TIMESTAMP),
(47, 'INFT 1105', 87, CURRENT_TIMESTAMP),
(48, 'COSC 3201', 91, CURRENT_TIMESTAMP),
(49, 'INFT 1105', 92, CURRENT_TIMESTAMP),
(50, 'COSC 2200', 89, CURRENT_TIMESTAMP);