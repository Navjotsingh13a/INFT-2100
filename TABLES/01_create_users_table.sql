/* Name: Navjot Singh 
   File Name: 01_create_users_table.sql
   Date: October 10, 2024 
   Course: INFT2100 */

/* This script creates the 'users' table with fields for user information like user_id, first_name, last_name,
 email, birth_date, created_at, last_access, and password (hashed). */
Create Table users (
    user_id Serial Primary Key,  -- Auto-increment starting from 100900000
    first_name Varchar(100),
    last_name Varchar(100),
    email Varchar(100) Unique Not Null,
    birth_date Date,
    created_at Timestamp Default current_timestamp,  
    last_access Timestamp,
    password Varchar(255)  
);
