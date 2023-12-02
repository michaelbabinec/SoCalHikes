<?php

$conn = new mysqli('localhost', 'root', 'My*SQL*Password', 'SoCalHikes');
if($conn->connect_error){
        die("Connection Failed:  ". mysqli_connect_error());
    }




?>