<?php

$servername = "localhost";
$username = "haladama";
$password = "Sankasro21*";
$dbname = "haladama";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql code to create table
$sql = "CREATE TABLE `users`(
        `email` INT(2)  PRIMARY KEY, 
        `username` VARCHAR(30) NOT NULL,
        `password` VARCHAR(30) NOT NULL,
        )";

if ($conn->query($sql) === TRUE) {
    echo "Table employees created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>