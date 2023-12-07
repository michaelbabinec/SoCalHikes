<?php

if(session_status() !== PHP_SESSION_ACTIVE) session_start();

include("PHP/hikedetails.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoCalHikes - Hike Details</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <style>

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .hike-details-container {
            display: flex;
            max-width: 1000px;
            margin: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background-color: #7a6a5d;
        }

        .map-container {
            flex: 1;
            overflow: hidden;
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        .hike-details {
            flex: 1;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        p {
            margin: 10px 0;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="hike-details-container">
    <div class="map-container">
        <iframe src="<?php echo($maplink)?>" 
            width="1000" 
            height="750" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
    <div id="hike-details" class="hike-details">
    <h2><?php echo($trailname)?></h2>
        <p><strong>Zipcode:</strong><?php echo($zipcode)?></p>
        <p><strong>City:</strong><?php echo($city)?></p>
        <p><strong>Completion Time:</strong><?php echo($hiketime)?> minutes</p>
        <p><strong>Difficulty Rating:</strong> <?php echo($difficulty)?></p>
    </div>

    <form action="PHP/markcomplete.php" method="get">
        <input type="hidden" name="trailid" value="<?php echo ($trailID) ?>">
        <button type="submit" class="complete-button">Mark As Completed</button>
    </form>
</div>

</body>

<footer>


    <button class= "btlogin-button" onclick=location.href="index.php">Back to Home</button>
</footer>

</html>