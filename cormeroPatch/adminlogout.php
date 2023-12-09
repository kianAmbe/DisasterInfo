<?php
// Start a session to work with session variables
session_start();

// Destroy the session to log the admin out
session_destroy();

// Redirect to the admin login page after logout
header("Location: adminlogin.php");
exit(); // Terminate the current script
?>
