<?php
    $conn = new mysqli('localhost', 'root', '', 'SoCalHikes');
    if($conn->connect_error){
        die("Connection Failed:  ". mysqli_connect_error());
    }

mysqli_close($conn);
?>