<?php


if(session_status() !== PHP_SESSION_ACTIVE) session_start();
/*
echo "<h3> PHP List All Session Variables</h3>";
foreach ($_SESSION as $key=>$val)
echo $key." ".$val."<br/>";
*/


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
    <title>SoCalHikes</title>

    <header>
    </div>
    </header>

</head>
<body>
    <div class="dropdown">
        <ul class="dropdown-menu">
            <li><a href="log_in.php">Log In</a></li>
            <li><a href="create_account.php">Create Account</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="hike_list.php">Hikes</a></li>
            <li><a href="sch_leaderboard.php">SCH Leaderboard</a></li>
            <li><a href=""></a></li>
            <li><a href=""></a></li>
            <li><a href="log_out.php">Log Out</a></li>

        </ul>
</div>

<div class="Title">
        <h1>Welcome to SoCalHikes</h1>
        <h2>Let's see what's out there.</h2>
    </div>
    
    
</body>

</html>
