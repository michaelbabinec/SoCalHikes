<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

if (isset($_SESSION['userID'])) {
    // Redirect to the Profile if logged in
    header("Location: index.php");
    exit();
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
    
    <form method="post" action="PHP/login.php" class="registration-form">
        <h2>Login</h2>
        <label for="username">Username:</label>
        <input type="text" id="loginusername" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>
</body>


<footer>
    <button class= "btlogin-button" onclick=location.href="create_account.php">Create Account</button>
    <button class= "btlogin-button" onclick=location.href="index.php">Back to Home</button>
</footer>
</html>