<?php

session_start();

$link = mysqli_connect('127.0.0.1', 'root', 'My*SQL*Password');

if ($link->connect_error) {
    die('Could not connect: '.mysqli_error($link));
}

echo "Connected successfully. \n";

$dbName = "SoCalHikes";

mysqli_select_db($link, $dbName) or die("Unable to select database $dbName");
?>
