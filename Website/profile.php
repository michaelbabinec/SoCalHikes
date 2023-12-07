<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

// Check if the user is logged in
if (!isset($_SESSION['userID'])) {
    // Redirect to the login page if not logged in
    header("Location: log_in.php");
    exit();
}

include("PHP/usercard.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <style>
        
        h1 {
            color: #fff;
            font-size: 350%;
            font-weight: bold;
            text-shadow: #333;
    
        }
        
        h2 {
            color: #474038;
            font-size: 150%;
    
        }
        h3{
            color: #fff; 
        }


        body {
            font-family: serif;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            flex-flow: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .profile-card {
            background-color: #7a6a5d;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 300px;
            text-align: center;
            padding: 200px;
        }

        .profile-info {
            margin-bottom: 15px;
        }



        .score {
            font-weight: bold;
             /* font-size: ; */
        }
    </style>
</head>
<body>

<div class="profile-card">
    <div class="profile-info">
        <h1><?php echo($_SESSION['username'])?></h1>
        <h2> SoCalHikes Score:</h2>
        <h3 class="score"><?php echo($schscore)?></h3>
        <h2> Hikes Completed:</h2>
        <h3 class="score"><?php echo($hikecount)?></h3>
    </div>
</div>
</body>

<footer>

    <button class= "btlogin-button" onclick=location.href="index.php">Back to Home</button>
</footer>

</html>

