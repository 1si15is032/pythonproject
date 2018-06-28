<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';


$conn  = mysqli_connect($dbhost,$dbuser,'');
$link = mysqli_connect("localhost", "root", "");

if(! $conn){
  die('Could not connect connect: ') ;
}

//echo 'Successfully Connected';

// Create database
$sql = "CREATE DATABASE twww";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}






$conn->close();
?>