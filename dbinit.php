<?php
define('DB_USER', 'root');
define('DB_PASSWORD', 'WheelyStrongPwd');
define('DB_HOST', 'localhost');
define('DB_NAME', 'thebookshelf');

$conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    or die('Could not connect to MySQL: ' . mysqli_connect_error());
mysqli_set_charset($conn, 'utf8');

// Creating BOOKSHELF Database 
$sql = "CREATE DATABASE IF NOT EXISTS thebookshelf";
if ($conn->query($sql) === TRUE) {
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->select_db('thebookshelf');

// Creating login_details Table 
$login_details_table_sql = "CREATE TABLE IF NOT EXISTS login_details (
    EmailId VARCHAR(255) PRIMARY KEY,
    Password VARCHAR(255) NOT NULL)";
if ($conn->query($login_details_table_sql) === TRUE) {
} else {
    echo "Error creating table: " . $conn->error;
}

// Creating book_details Table 
$book_details_table_sql = "CREATE TABLE IF NOT EXISTS book_details (
    book_id INT AUTO_INCREMENT PRIMARY KEY,
    book_name VARCHAR(255),
    book_description VARCHAR(2000),
    book_price DECIMAL(10, 2),
    book_author VARCHAR(255),
    uploadImage VARCHAR(255))";
if ($conn->query($book_details_table_sql) === TRUE) {
} else {
    echo "Error creating table: " . $conn->error;
}
