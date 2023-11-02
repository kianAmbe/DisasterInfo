<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted username (email)
    $username = $_POST["email"];
    // Since you're using email for authentication, you may want to validate the email format here.

    // Replace these values with your actual database connection
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "db_sad"; // Updated to your database name

    // Establish a database connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Replace with your actual adminuser table and column names
    $adminTable = "adminuser"; // Updated to your table name
    $usernameColumn = "email"; // Updated to your email column
    // Password is not needed for authentication, so it's removed from the query.

    // Query the database to check if the provided email exists
    $query = "SELECT * FROM $adminTable WHERE $usernameColumn = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Admin email is found
        // You may want to send a confirmation email or perform additional steps for authentication.
        // In this example, we'll simply consider the email as valid and proceed to the admin panel.
        $_SESSION["admin_username"] = $username;
        header("Location: admin.php"); // Redirect to the admin panel
    } else {
        // Invalid email, show an error message
        echo "Invalid email. Please try again or contact the administrator.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>

