<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted username (email) and password
    $username = $_POST["email"];
    $password = $_POST["password"]; // Assuming you added a password field in your HTML form

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
    $passwordColumn = "password"; // Updated to your password column

    // Query the database to check if the provided email exists
    $query = "SELECT * FROM $adminTable WHERE $usernameColumn = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $storedPassword = $row[$passwordColumn];

        // Verify the plain text password
        if ($password === $storedPassword) {
            // Admin email and password are valid
            $_SESSION["admin_username"] = $username;
            echo '<script>alert("Login successful. Redirecting..."); window.location = "admin.php";</script>';
        } else {
            // Password is incorrect, show an alert and redirect to adminlogin.php
            echo '<script>alert("Incorrect password. Please try again."); window.location = "adminlogin.php";</script>';
        }
    } else {
        // Admin email is not found, show an alert and redirect to adminlogin.php
        echo '<script>alert("Invalid email. Please try again or contact the administrator."); window.location = "adminlogin.php";</script>';
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>



