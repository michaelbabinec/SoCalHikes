
<?php

if(session_status() !== PHP_SESSION_ACTIVE) session_start();

$link = mysqli_connect('127.0.0.1', 'root', '');

if ($link->connect_error) {
    die('Could not connect: '. $link->connect_error);
}

$dbName = "SoCalHikes";

mysqli_select_db($link, $dbName) or die("Unable to select database $dbName");
?>
