<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

include('connect.php');

$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$birthday = $_POST['birthday'];

// Check if passwords match
if ($_POST['password'] !== $_POST['confirmPassword'])
{
    die("Error: Passwords do not match");
}

//$hashed_pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password, this will be sent to DB

// Insert user data into the database
$sql = "INSERT INTO USERS (username, passwrd, birthday) VALUES ('$username', '$password', '$birthday')";

if ($link->query($sql) === TRUE) {
    echo "Account created successfully";

    $result2 = mysqli_query($link, "SELECT * FROM users WHERE username = '$username'"); 
    $row = mysqli_fetch_array($result2);
    $_SESSION["userID"] = $row['userID'];
    $_SESSION["username"] = $username;
    header("Location: ../index.php");
    
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}

$link->close();

?>