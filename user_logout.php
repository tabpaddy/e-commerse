<?php
session_start(); // Resume existing session

// Check if the user is logged in (session variable is set)
if (isset($_SESSION['username'])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to a login page or any other appropriate page after logout
    header("Location: ./index.php");
    exit(); // Ensure that no further code is executed after redirection
} else {
    // If the user is not logged in, redirect to the login page
    header("Location: ./index.php");
    exit(); // Ensure that no further code is executed after redirection
}
?>