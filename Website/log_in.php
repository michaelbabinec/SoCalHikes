<?php
include('PHP/login.php');
session_start();

/*
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['UserID']))
{
 
}

*/
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