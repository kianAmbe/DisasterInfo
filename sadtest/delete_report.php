<?php
// Connect to the database
$host = "localhost";
$username = "root";
$password = "";
$database = "db_sad";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the report ID is provided in the URL
if (isset($_GET['id'])) {
    $reportId = $_GET['id'];

    // Perform the delete operation
    $sql = "DELETE FROM report WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $reportId);

        if ($stmt->execute()) {
            echo "Report deleted successfully.";
        } else {
            echo "Error deleting report: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
