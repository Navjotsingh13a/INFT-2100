<?php

/*
  Name:: Navjot Singh
  Date Modified: 2024-12-04
  Description: This script connects to a PostgreSQL database, sets up SQL commands, 
  and has helper functions to get user data, update records, and add new users or students.
 */


// Function to connect to the PostgreSQL database...
function db_connect() {
    $host = 'localhost';
    $port = '5432';
    $dbname = 'singhn_db';
    $user = 'singhn';
    $password = '100931376';

    // Make a connection to the database...
    $connection = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
    if (!$connection) {
        die("Database connection failed.");
    }
    return $connection;
}

// Function to log web activity to a file...
function log_web_activity($message) {
    $log_file = './logs/activity.log';
    $timestamp = date('Y-m-d H:i:s');
    file_put_contents($log_file, "[$timestamp] $message" . PHP_EOL, FILE_APPEND);
}

// Function to get user and student information based on user ID...
function get_user_and_student_info($conn, $user_id) {
    $query = "SELECT user.first_name, user.last_name, user.email_address, user.enrol_date, user.last_access, 
                     students.student_id, students.birthdate 
              FROM user
              JOIN students ON user.user_id = students.user_id
              WHERE user.user_id = $1";
    
    $result = pg_prepare($conn, "get_user_student_info", $query);
    $result = pg_execute($conn, "get_user_student_info", array($user_id));
    
    // Return the result if found, else return null...
    if ($result) {
        return pg_fetch_assoc($result);
    }
    return null;
}

// Function to update the last access timestamp for a user...
function update_last_access($conn, $user_id) {
    $query = "UPDATE user SET last_access = CURRENT_TIMESTAMP WHERE user_id = $1";
    
    // Prepare and execute the query to update last access time...
    $result = pg_prepare($conn, "update_last_access", $query);
    return pg_execute($conn, "update_last_access", array($user_id));
}

// Function to insert a new user into the users table...
function insert_user($conn, $first_name, $last_name, $email, $password) {
    $query = "INSERT INTO user (first_name, last_name, email, password, enrol_date, last_access)
              VALUES ($1, $2, $3, $4, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP) RETURNING user_id";
    
    // Prepare and execute the query to insert a new user...
    $result = pg_prepare($conn, "insert_user", $query);
    $result = pg_execute($conn, "insert_user", array($first_name, $last_name, $email, $password));
    
    // Return the user ID if inserted successfully, otherwise return false...
    if ($result) {
        $row = pg_fetch_assoc($result);
        return $row['user_id'];  
    }
    return false;
}

// Function to insert a new student into the students table...
function insert_student($conn, $user_id, $birthdate) {
    $query = "INSERT INTO students (user_id, birthdate) VALUES ($1, $2)";
    
    // Prepare and execute the query to insert student information...
    $result = pg_prepare($conn, "insert_student", $query);
    return pg_execute($conn, "insert_student", array($user_id, $birthdate));
}

?>
