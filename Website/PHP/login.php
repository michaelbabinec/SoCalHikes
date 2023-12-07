<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

include('connect.php');

// Get user input
$username = $_POST["username"];
$password = $_POST["password"];

//$hashed_pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password, this will be sent to DB

    // Query to check if the username and password match
    $query = "SELECT * FROM users WHERE username='$username' AND passwrd='$password'";
    $result = mysqli_query($link, $query);

    // Check if the query was successful
    if ($result) {
        // Check if a matching user was found
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