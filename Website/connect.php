<?php
    $userID = 3;
    $trailID = 4;
    $favorited = 1;
    $rating = 5;

    $conn = new mysqli('localhost', 'root', 'My*SQL*Password', 'SoCalHikes');
    if(conn->connect_error){
        die("Connection Failed:  ". mysqli_connect_error())
    }
    
    
    
        $sql = "INSERT INTO COMPLETED_TRAILS (userID, trailID, favorited, rating) VALUES ($userID, $trailID, $favorited, $rating)";
        if (mysqli_query($conn, $sql)) { 
            echo "Hike saved successfully. Great Job!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }


        
mysqli_close($conn);
?>