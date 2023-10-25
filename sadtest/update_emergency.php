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
    $currentName = $_POST["current_name"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    // Construct the SQL query to update the emergency contact
    $sql = "UPDATE emergency SET name = ?, phone = ?, email = ? WHERE name = ?";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssss", $name, $phone, $email, $currentName);

        if ($stmt->execute()) {
            // Contact information updated successfully
            echo "Contact information for '$currentName' has been updated successfully.";
        } else {
            echo "Error updating contact information: " . $stmt->error;
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

