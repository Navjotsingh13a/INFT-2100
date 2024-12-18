/* Name: Navjot Singh
   File Name: 04_create_marks_table.sql
   Date: 10 October 2024
   Course: INFT2100 */

/* This script creates the marks table, which tracks student's final marks for courses, with foreign key references to the students and courses tables. */
Create Table marks (
    student_id Int References students(student_id),
    course_code Char(8) References courses(course_code),
    final_mark Int Check (final_mark >= 0 And final_mark <= 100),
    achieved_at Timestamp Default Current_Timestamp,
    Primary Key (student_id, course_code)
);
