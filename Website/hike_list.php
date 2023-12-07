<?php

if(session_status() !== PHP_SESSION_ACTIVE) session_start();

include("PHP/hikecard.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoCalHikes - Hike Listings</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <style>

              
        h2 {
            color: #fff;
            font-size: 200%;
            font-weight: bold;
            text-shadow: #333;
    
        }

        body {
            font-family: serif;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            flex-flow: row;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .hike-listing {
            background-color: #474038;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 400px;
            text-align: left;
            padding: 20px;
        }

        .hike-card {
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #7a6a5d;
        }

        .hike-card h2 {
            color: #fff;
        }

        .hike-card p {
            margin: 10px 0;
            color: #ddd;
        }
        a{
            text-decoration: none;
        }
        </style>

</head>

<body>

<div class="hike-listing">
    <h1>Hike List</h1>

    <a href="hike_details.php?trailid=<?php echo($trailID1)?>">
    <div class="hike-card">
        <h2><?php echo($trailname1)?></h2>
        <p><strong>Zipcode:</strong><?php echo($zipcode1)?></p>
        <p><strong>City:</strong><?php echo($city1)?></p>
        <p><strong>Completion Time:</strong><?php echo($hiketime1)?> minutes</p>
        <p><strong>Difficulty Rating:</strong> <?php echo($difficulty1)?></p>
    </div>

    <a href="hike_details.php?trailid=<?php echo($trailID2)?>">
    <div class="hike-card">
        <h2><?php echo($trailname2)?></h2>
        <p><strong>Zipcode:</strong><?php echo($zipcode2)?></p>
        <p><strong>City:</strong><?php echo($city2)?></p>
        <p><strong>Completion Time:</strong><?php echo($hiketime2)?> minutes</p>
        <p><strong>Difficulty Rating:</strong> <?php echo($difficulty2)?></p>
    </div>

    <a href="hike_details.php?trailid=<?php echo($trailID3)?>">
    <div class="hike-card">
        <h2><?php echo($trailname3)?></h2>
        <p><strong>Zipcode:</strong><?php echo($zipcode3)?></p>
        <p><strong>City:</strong><?php echo($city3)?></p>
        <p><strong>Completion Time:</strong><?php echo($hiketime3)?> minutes</p>
        <p><strong>Difficulty Rating:</strong> <?php echo($difficulty3)?></p>
    </div>

    <a href="hike_details.php?trailid=<?php echo($trailID4)?>">
    <div class="hike-card">
        <h2><?php echo($trailname4)?></h2>
        <p><strong>Zipcode:</strong><?php echo($zipcode4)?></p>
        <p><strong>City:</strong><?php echo($city4)?></p>
        <p><strong>Completion Time:</strong><?php echo($hiketime4)?> minutes</p>
        <p><strong>Difficulty Rating:</strong> <?php echo($difficulty4)?></p>
    </div>

    <a href="hike_details.php?trailid=<?php echo($trailID5)?>">
    <div class="hike-card">
        <h2><?php echo($trailname5)?></h2>
        <p><strong>Zipcode:</strong><?php echo($zipcode5)?></p>
        <p><strong>City:</strong><?php echo($city5)?></p>
        <p><strong>Completion Time:</strong><?php echo($hiketime5)?> minutes</p>
        <p><strong>Difficulty Rating:</strong> <?php echo($difficulty5)?></p>
    </div>



</div>

</body>
</html>