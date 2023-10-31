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
    $reportId = $_POST["id"];
    $name = $_POST["name"];
    $emergencyType = $_POST["emergency_type"];
    $description = $_POST["description"];
    $status = $_POST["status"]; // Include status in form fields

    // Construct the SQL query to update the report
    $sql = "UPDATE report SET name = ?, emergency_type = ?, description = ?, status = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssi", $name, $emergencyType, $description, $status, $reportId);

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
