/* Name: Navjot Singh 
   File Name: 05_insert_courses_data.sql
   Date: October 10, 2024 
   Course: INFT2100 */

/* This script populates the 'courses' table with course codes and descriptions. */
-- Semester 1
INSERT INTO public.courses (
    course_code, course_name, course_description, semester) 
VALUES 
('COMM 1100', 'Communication Foundations', 'Basic communication.', 1),
('COMP 1116', 'Computer Systems - Hardware', 'Computer hardware.', 1),
('COSC 1100', 'Introduction to Programming', 'Basic programming.', 1),
('INFT 1104', 'Data Communications and Networking 1', 'Intro to networks.', 1),
('INFT 1105', 'Introduction to Databases', 'Database basics.', 1),
('MATH 1114', 'Mathematics for IT', 'Math for IT.', 1);

-- Semester 2
INSERT INTO public.courses (course_code, course_name, course_description, semester) 
VALUES 
('COSC 1200', 'Object-Oriented Programming 1', 'OOP basics.', 2),
('INFT 1206', 'Web Development - Fundamentals', 'Simple websites.', 2),
('INFT 1207', 'Software Testing and Automation', 'Software testing.', 2),
('MGMT 1223', 'Systems Development 1', 'System basics.', 2),
('MGMT 1224', 'Business for IT Professionals', 'IT business.', 2);

-- Semester 3
INSERT INTO public.courses (course_code, course_name, course_description, semester) 
VALUES 
('COMM 2109', 'IT Career Essentials', 'Career prep.', 3),
('COSC 2100', 'Object-Oriented Programming 2', 'OOP advanced.', 3),
('INFT 2100', 'Web Development Intermediate', 'Intermediate web.', 3),
('INFT 2101', 'Database Development 1', 'SQL basics.', 3),
('MGMT 2107', 'Systems Development 2', 'Advanced systems.', 3);

-- Semester 4
INSERT INTO public.courses (course_code, course_name, course_description, semester) 
VALUES 
('COSC 2200', 'Object-Oriented Programming 3', 'OOP mastery.', 4),
('GNED 0000', 'General Education Elective', 'Open elective.', 4),
('INFT 2200', 'Mainframe Development 1', 'Mainframe basics.', 4),
('INFT 2201', 'Web Development - Enterprise', 'Large-scale web.', 4),
('INFT 2202', 'Web Development - Client Side Script', 'Client-side scripts.', 4),
('INFT 2203', 'Cloud Technology Fundamentals', 'Cloud basics.', 4);

-- Semester 5
INSERT INTO public.courses (course_code, course_name, course_description, semester) 
VALUES 
('INFT 3100', 'Mainframe Development 2', 'Mainframe advanced.', 5),
('INFT 3101', 'Mobile Development', 'Mobile apps.', 5),
('INFT 3102', 'Web Development - Frameworks', 'Web frameworks.', 5),
('INFT 3103', 'Emerging Technologies', 'Trending tech.', 5),
('INFT 3104', 'Cloud Technology for Developers', 'Cloud dev.', 5);

-- Semester 6
INSERT INTO public.courses (course_code, course_name, course_description, semester) 
VALUES 
('CPGA 3200', 'Capstone Project', 'Final project.', 6),
('CPGA 3201', 'Field Placement - CPA', 'Work placement.', 6),
('INFT 3200', 'Cloud Technology Operations', 'Cloud management.', 6),
('INFT 3201', 'Database Development 2', 'Advanced SQL.', 6),
('MGMT 3211', 'Cross-Functional Collaboration', 'Teamwork skills.', 6);
