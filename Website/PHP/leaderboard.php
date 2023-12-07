<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

include('connect.php');

$query = "SELECT * FROM users ORDER BY sch_score DESC";
$result = mysqli_query($link, $query);


$row = $result->fetch_assoc();
$row2 = $result->fetch_assoc();
$row3 = $result->fetch_assoc();
$row4 = $result->fetch_assoc();
$row5 = $result->fetch_assoc();

$username1 = $row["username"];
$score1 = $row["sch_score"];

$username2 = $row2["username"];
$score2 = $row2["sch_score"];

$username3 = $row3["username"];
$score3 = $row3["sch_score"];

$username4 = $row4["username"];
$score4 = $row4["sch_score"];

$username5 = $row5["username"];
$score5 = $row5["sch_score"];





$link->close();
?>