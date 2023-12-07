<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

$userid = $_SESSION["userID"];

include('connect.php');

$query = "SELECT * FROM users WHERE userid='$userid'";
$result = mysqli_query($link, $query);


$row = $result->fetch_assoc();

$schscore = $row["sch_score"];
$hikecount = $row["trail_count"];


$link->close();
?>