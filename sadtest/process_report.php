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

// Get data from the form
$name = $_POST['name'];
$emergency_type = $_POST['emergency_type'];
$description = $_POST['description'];

// Set the status to "Pending"
$status = "Pending";

// Insert data into the database
$sql = "INSERT INTO report (name, emergency_type, description, status) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ssss", $name, $emergency_type, $description, $status);

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


