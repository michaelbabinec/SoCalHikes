<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['userID']) || !isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header("Location: log_in.php");
    exit();
}
