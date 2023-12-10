<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the input data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle invalid email format
        echo "Invalid email format. Please enter a valid email address.";
        exit;
    }

    // Perform database operations to insert data
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_sad";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert data into the newsmails table
    $stmt = $conn->prepare("INSERT INTO newsmails (name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);

    if ($stmt->execute()) {
        // Alert message in JavaScript upon successful signup
        echo '<script>alert("Signed up successfully for the newsletter!");';
        echo 'window.location.href = "newsletter.php";</script>';
        exit; // Terminate script to prevent further execution
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
