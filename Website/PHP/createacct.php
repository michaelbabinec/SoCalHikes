<?php

$conn = new mysqli('localhost', 'root', 'My*SQL*Password', 'SoCalHikes');
if($conn->connect_error){
        die("Connection Failed:  ". mysqli_connect_error());
    }
else echo "Working";



$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$birthday = $_POST['birthday'];


// Check if passwords match
if ($_POST['password'] !== $_POST['confirmPassword'])
{
    die("Error: Passwords do not match");
}


$hashed_pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password, this will be sent to DB

// Insert user data into the database
$sql = "INSERT INTO USERS (username, passwrd, birthday) VALUES ('$username', '$hashed_pass', '$birthday')";

if ($conn->query($sql) === TRUE) {
    echo "Account created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();





?>