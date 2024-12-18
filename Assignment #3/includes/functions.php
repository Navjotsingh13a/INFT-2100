<?php
function db_connect() {
     // Database credentials
    $host = 'localhost';
    $port = '5432';
    $dbname = 'singhn_db';
    $user = 'singhn';
    $password = '100931376';

    // make a connection to the PostgreSQL database
    $connection = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
    // Check if the connection was successful
    if (!$connection) {
        die("Database not found.");
    }
    return $connection;
}
?>
