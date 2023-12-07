<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

include('connect.php');

$trailID = $_GET['trailid'];
$query = "SELECT * FROM TRAILS where trailID = '$trailID'";
$result = mysqli_query($link, $query);


$row = $result->fetch_assoc();

$trailname = $row["trail_name"];
$zipcode = $row["zipcode"];
$city = $row["city"];
$difficulty = $row["difficulty"];
$hiketime = $row["completion_time"];
$maplink = $row["maplink"];