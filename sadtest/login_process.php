<?php
// Include your database connection code here
$host = "localhost";
$username = "root";
$password = "";
$database = "db_sad";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check the database for the username and hashed password
    $check_user_sql = "SELECT * FROM user WHERE username = '$username'";
    $result = $conn->query($check_user_sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row["password"];

        if (password_verify($password, $hashed_password)) {
            // Login successful, redirect to index.php
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Incorrect password. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('Username not found. Please check your username or register.');</script>";
    }
}

// Close the database connection
$conn->close();
?>