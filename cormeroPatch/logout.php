<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Set a session variable to mark the user as logged out
$_SESSION['logged_out'] = true;

// Redirect to login page after logout
header("Location: index.php");
exit();
?>
