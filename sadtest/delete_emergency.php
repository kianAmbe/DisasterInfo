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

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Check if 'name' parameter is set in the URL
    if (isset($_GET['name']) && !empty($_GET['name'])) {
        $name = $_GET['name'];

        // SQL statement to delete the contact by name
        $sql = "DELETE FROM emergency WHERE name = ?";

        // Prepare and execute the delete query
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $name);

        if ($stmt->execute()) {
            echo "Contact with name '$name' has been deleted successfully.";
        } else {
            echo "Error deleting contact: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Invalid request. 'name' parameter is missing.";
    }
}

// Close the database connection
$conn->close();
?>
