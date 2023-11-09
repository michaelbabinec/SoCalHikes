<?php
    $userID = 3;
    $trailID = 4;
    $favorited = 1;
    $rating = 5;

    $conn = new mysqli('localhost', 'root', 'My*SQL*Password', 'SoCalHikes');
    if(conn->connect_error){
        die('Connection Failed:  '.$conn->connect_error)
    }else{
        $stmt = $conn->prepare("INSERT INTO COMPLETED_TRAILS (userID, trailID, favorited, rating) VALUES (?, ?, ?, ?)");
        $stmt-bind_param("iiii", $userid, $trailID, $favorited, $rating);
        echo "Hike Successfuly Saved";
        $stmt->close();
        $conn->close();
    }

?>