<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "random_poems";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$create_poems_table = "CREATE TABLE IF NOT EXISTS poems (
id INT(6) PRIMARY KEY AUTO_INCREMENT,
title TEXT NOT NULL,
author TEXT NOT NULL,
poem_lines LONGTEXT NOT NULL,
line_count INT(6) NOT NULL
)";
if(!$conn->query($create_poems_table)){
    print_r($conn->error);
}