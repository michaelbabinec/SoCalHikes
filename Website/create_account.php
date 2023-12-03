<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoCalHikes - Create Account</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
</head>

<body id = "inputbox">
    
    <form action = 'PHP/createacct.php' method="post" class="registration-form">
        <h2>Create Account</h2>
        <label for= "username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password" color: #ffffff>Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>
       
        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="birthday" required>

        <input type="submit" value="Create Account">
    </form>


</body>

<footer>
    <button class= "btlogin-button" onclick=location.href="login.html">Go to Log In</button>
</footer>
</html>
