<?php
session_start();
include "db_connection.php"; // Include the database configuration file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Query to fetch the user's information by email
    $sql = "SELECT id, name, password FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($id, $name, $hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        // Password is correct
        $_SESSION["user_id"] = $id; // Store the user's ID in the session
        $_SESSION["user_name"] = $name; // Store the user's name in the session

        // Redirect to the user's dashboard or home page
        header("Location: index.php");
    } else {
        // Password is incorrect, redirect back to the login page with an error message
        $_SESSION["login_error"] = "Invalid email or password";
        header("Location: login.php");
    }

    $stmt->close();
} else {
    // Redirect to the login page
    header("Location: login.php");
}
?>