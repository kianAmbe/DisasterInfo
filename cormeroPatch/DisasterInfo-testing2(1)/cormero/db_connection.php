<?php
// Database configuration
$db_server = "localhost";
$db_username = "root"; // Your MySQL username
$db_password = ""; // Your MySQL password
$db_name = "db_sad";

// Create a database connection
$conn = new mysqli($db_server, $db_username, $db_password, $db_name);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
