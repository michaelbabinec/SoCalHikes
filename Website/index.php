<?php

session_start();

/*
if (!isset($_SESSION['userID']) || !isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header("Location: log_in.php");
    exit();
}
*/


?>

<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css"> 
    <link rel="icon" href="favicon.ico?" type="image/x-icon">
    <title>SoCalHikes</title>

    <header>
        <div class="Title">
        <h1>Welcome to SoCalHikes</h1>
        <h2>Let's see what's out there.</h2>
    </div>
    </header>

</head>
<body>
    <div class="dropdown">
        <button class="dropdown-button">&#8801</button>
        <ul class="dropdown-menu">
            <li><a href="log_in.php">Log In</a></li>
            <li><a href="create_account.php">Create Account</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="hike_list.php">Hikes</a></li>
            <li><a href="sch_leaderboard.php">SCH Leaderboard</a></li>

        </ul>
    </div>

<div style="text-align: center;">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3311.374897751837!2d-117.9350648244901!3d33.9057495732125!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dd2a8444f90149%3A0x8788a2bb64a1c636!2sJuanita%20Cooke%20Greenbelt%20Trail%2C%20Fullerton%2C%20CA%2092835!5e0!3m2!1sen!2sus!4v1701206817456!5m2!1sen!2sus" 
    width="600" 
    height="450" 
    style="border:0;" 
    allowfullscreen="" 
    loading="lazy" 
    referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>
    
    
</body>

</html>
