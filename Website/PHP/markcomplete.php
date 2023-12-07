<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

include('connect.php');

$userID = $_SESSION["userID"];
$trailID = $_GET['trailid'];

$sql = "INSERT INTO COMPLETED_TRAILS (userID, trailID) VALUES ('$userID', '$trailID')";

if ($link->query($sql) === TRUE) {
    echo "Hike Marked"; 
    header("Location: ../hike_list.php");
    
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}

$link->close();

header("Location: ../index.php");

?>