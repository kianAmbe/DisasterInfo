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
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"]; // If you added a "confirm password" field

    // Check if the username is already in use
    $check_username_sql = "SELECT * FROM user WHERE username = '$username'";
    $existing_user = $conn->query($check_username_sql);

    // Check if the email is already in use
    $check_email_sql = "SELECT * FROM user WHERE email = '$email'";
    $existing_email = $conn->query($check_email_sql);

    if ($existing_user->num_rows > 0) {
        echo "<script>alert('Username is already in use. Please choose a different one.');</script>";
    } elseif ($existing_email->num_rows > 0) {
        echo "<script>alert('Email is already in use. Please use a different one.');</script>";
    } elseif ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match. Please try again.');</script>";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Proceed with inserting the user data into the database
        $insert_sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

        if ($conn->query($insert_sql) === TRUE) {
            echo "Registration successful.";
        } else {
            echo "Error: " . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
}
?>