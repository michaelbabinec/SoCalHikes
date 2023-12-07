<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $username = mysqli_real_escape_string($link, $_POST["username"]);
    $password = mysqli_real_escape_string($link, $_POST["password"]);

    $hashed_pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password, this will be sent to DB

    // Query to check if the username and password match
    $query = "SELECT * FROM users WHERE username='$username' AND passwrd='$hashed_pass'";
    $result = mysqli_query($link, $query);

    // Check if the query was successful
    if ($result) {
        // Check if a matching user was found
        if (mysqli_num_rows($result) == 1) {
            echo "Login successful!";
            $_SESSION["userID"] = mysqli_query($link, "SELECT userID FROM users where username='$username'");
            $_SESSION["username"] = $username;
            header("Location: index.php");

        }
        else {
            header("Location: blank.php");
            echo "Invalid username or password.";
        }
    } else {
        echo "Error: " . mysqli_error($link);
    }

}
?>