<?php
// Connect to the database
$host = "localhost";
$username = "root";
$password = "";
$database = "db_sad";

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
} else {
    // Handle the case where the user is not logged in
    // You can redirect them to a login page or display an error message
    exit();
}

// Fetch the user's name from the 'user' table
$user_name = "";
$query = "SELECT name FROM user WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($user_name);
$stmt->fetch();
$stmt->close();

// Get data from the form
$emergency_type = $_POST['emergency_type'];
$description = $_POST['description'];

// Set the status to "Pending"
$status = "Pending";

// Insert data into the database with the associated user ID and name
$sql = "INSERT INTO report (user_id, user_name, emergency_type, description, status) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("issss", $user_id, $user_name, $emergency_type, $description, $status);

    if ($stmt->execute()) {
        // Data inserted successfully
        echo "Report submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>


