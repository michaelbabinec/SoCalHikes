<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

include('connect.php');

$username = $_POST["username"];
$password = $_POST["password"];

//$hashed_pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password, this will be sent to DB


    $query = "SELECT * FROM users WHERE username='$username' AND passwrd='$password'";
    $result = mysqli_query($link, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = $result->fetch_assoc();
        
            $_SESSION["userID"] = $row['userID'];
            $_SESSION["username"] = $username;
           


            header("Location: ../index.php");

        }
        else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Error: " . mysqli_error($link);
    }


$link->close();
?>