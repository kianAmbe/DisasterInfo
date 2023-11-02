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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
// Retrieve form data including the Remarks field
$reportId = $_POST["id"];
$name = $_POST["name"];
$emergencyType = $_POST["emergency_type"];
$description = $_POST["description"];
$status = $_POST["status"];
$remarks = $_POST["remarks"]; // Include remarks in form fields

// Construct the SQL query to update the report
$sql = "UPDATE report SET user_name = ?, emergency_type = ?, description = ?, status = ?, remarks = ? WHERE id = ?";

$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sssssi", $name, $emergencyType, $description, $status, $remarks, $reportId);

    if ($stmt->execute()) {
        // Report updated successfully
        header("Location: admin.php"); // Redirect to the list of reports
        exit();
    } else {
        echo "Error updating report: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Error: " . $conn->error;
}

}

// Close the database connection
$conn->close();
?>

