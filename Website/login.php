<?php

include("PHP/connect.php");
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $username = mysqli_real_escape_string($link, $_POST["username"]);
    $password = mysqli_real_escape_string($link, $_POST["password"]);

    // Query to check if the username and password match
    $query = "SELECT userid FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($link, $query);

    // Check if the query was successful
    if ($result) {
        // Check if a matching user was found
        if (mysqli_num_rows($result) == 1) {
            echo "Login successful!";
            header("index.php");
        }
        else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Error: " . mysqli_error($link);
    }

}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
</head>
<body id = "inputbox">
    
    <form method="post" action="" class="registration-form">
        <h2>Login</h2>
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>
</body>


<footer>
    <button class= "btlogin-button" onclick=location.href="create_account.php">Create Account</button>
</footer>
</html>