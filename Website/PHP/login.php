<?php

session_start();

include("PHP/connect.php");
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $username = mysqli_real_escape_string($link, $_POST["username"]);
    $password = mysqli_real_escape_string($link, $_POST["password"]);

    // Query to check if the username and password match
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($link, $query);

    // Check if the query was successful
    if ($result) {
        // Check if a matching user was found
        if (mysqli_num_rows($result) == 1) {
            echo "Login successful!";
        }
        else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Error: " . mysqli_error($link);
    }

}
?>