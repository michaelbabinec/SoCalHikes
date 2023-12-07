<?php

if(session_status() !== PHP_SESSION_ACTIVE) session_start();

include("PHP/leaderboard.php")

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <style>
        h1{
            text-align:center;
            color: #fff;
            text-shadow: #333;
        }

        body {
            color: #fff;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .leaderboard {
            background-color: #7a6a5d;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 300px;
            text-align: left;
            padding: 20px;
        }

        .leaderboard-entry {
            margin-bottom: 10px;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .username {
            font-weight: bold;
        }

        .usernameh {
            font-weight: bold;
            color: #bbb;
        }

        .score {
            float: right;
            font-weight: bold;
        }

        .scoreh {
            float: right;
            font-weight: bold;
            color: #bbb;
        }
    </style>
</head>
<body>

<div class="leaderboard">
    <h1>SoCalHikes Leaderboard</h1>

    <div class="leaderboard-entry">
        <span class="usernameh"><strong>User</strong></span>
        <span class="scoreh"><strong>Score</strong></span>
    </div>

    <div class="leaderboard-entry">
        <span class="username"><?php echo($username1)?></span>
        <span class="score"><?php echo($score1)?></span>
    </div>

    <div class="leaderboard-entry">
        <span class="username"><?php echo($username2)?></span>
        <span class="score"><?php echo($score2)?></span>
    </div>
    
    <div class="leaderboard-entry">
        <span class="username"><?php echo($username3)?></span>
        <span class="score"><?php echo($score3)?></span>
    </div>

    <div class="leaderboard-entry">
        <span class="username"><?php echo($username4)?></span>
        <span class="score"><?php echo($score4)?></span>
    </div>

    <div class="leaderboard-entry">
        <span class="username"><?php echo($username5)?></span>
        <span class="score"><?php echo($score5)?></span>
    </div>

</div>

</body>

<footer>
    <button class= "btlogin-button" onclick=location.href="index.php">Back to Home</button>
</footer>

</html>