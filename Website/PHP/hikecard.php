<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

include('connect.php');

$query = "SELECT * FROM TRAILS";
$result = mysqli_query($link, $query);


$row = $result->fetch_assoc();
$row2 = $result->fetch_assoc();
$row3 = $result->fetch_assoc();
$row4 = $result->fetch_assoc();
$row5 = $result->fetch_assoc();

$trailname1 = $row["trail_name"];
$zipcode1 = $row["zipcode"];
$city1 = $row["city"];
$predifficulty = $row["difficulty"];
$hiketime1 = $row["completion_time"];
$trailID1 = $row["trailID"];

if ($predifficulty = 0) $difficulty1 = "Unranked";
if ($predifficulty = 1) $difficulty1 = "Easy";
if ($predifficulty = 2) $difficulty1 = "Medium";
if ($predifficulty = 3) $difficulty1 = "Hard"; 


$trailname2 = $row2["trail_name"];
$zipcode2 = $row2["zipcode"];
$city2 = $row2["city"];
$predifficulty2 = $row2["difficulty"];
$hiketime2 = $row2["completion_time"];
$trailID2 = $row2["trailID"];

if ($predifficulty2 == 0) $difficulty2 = "Unranked";
if ($predifficulty2 == 1) $difficulty2 = "Easy";
if ($predifficulty2 == 2) $difficulty2 = "Medium";
if ($predifficulty2 == 3) $difficulty2 = "Hard";


$trailname3 = $row3["trail_name"];
$zipcode3 = $row3["zipcode"];
$city3 = $row3["city"];
$predifficulty3 = $row3["difficulty"];
$hiketime3 = $row3["completion_time"];
$trailID3 = $row3["trailID"];

if ($predifficulty3 == 0) $difficulty3 = "Unranked";
if ($predifficulty3 == 1) $difficulty3 = "Easy";
if ($predifficulty3 == 2) $difficulty3 = "Medium";
if ($predifficulty3 == 3) $difficulty3 = "Hard";



$trailname4 = $row4["trail_name"];
$zipcode4 = $row4["zipcode"];
$city4 = $row4["city"];
$predifficulty4 = $row4["difficulty"];
$hiketime4 = $row4["completion_time"];
$trailID4 = $row4["trailID"];

if ($predifficulty4 == 0) $difficulty4 = "Unranked";
if ($predifficulty4 == 1) $difficulty4 = "Easy";
if ($predifficulty4 == 2) $difficulty4 = "Medium";
if ($predifficulty4 == 3) $difficulty4 = "Hard";


$trailname5 = $row5["trail_name"];
$zipcode5 = $row5["zipcode"];
$city5 = $row5["city"];
$predifficulty5 = $row5["difficulty"];
$hiketime5 = $row5["completion_time"];
$trailID5 = $row5["trailID"];

if ($predifficulty5 == 0) $difficulty5 = "Unranked";
if ($predifficulty5 == 1) $difficulty5 = "Easy";
if ($predifficulty5 == 2) $difficulty5 = "Medium";
if ($predifficulty5 == 3) $difficulty5 = "Hard";


$link->close();
?>