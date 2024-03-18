<?php
define('DB_USER', 'root');
define('DB_PASSWORD', 'WheelyStrongPwd');
define('DB_HOST', 'localhost');
define('DB_NAME', '');

$conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    or die ('Could not connect to MySQL: ' . mysqli_connect_error());
mysqli_set_charset($conn, 'utf8');

// Creating BOOKSHELF Database 
$sql = "CREATE DATABASE IF NOT EXISTS BOOKSHELF";
if ($conn->query($sql) === TRUE) {
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->select_db('login_details');

// Creating login_details Table 
$table_sql = "CREATE TABLE IF NOT EXISTS login_details (
    EmailId VARCHAR(255) PRIMARY KEY,
    Password VARCHAR(255) NOT NULL)";
if ($conn->query($table_sql) === TRUE) {
} else {
    echo "Error creating table: " . $conn->error;
}
