<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

if (!isset($_SESSION['userID'])) {
    // Redirect to the login page if not logged in
    exit("You're not logged in.");
}
else{

    session_destroy();
    header("Location: index.php");

}


?>