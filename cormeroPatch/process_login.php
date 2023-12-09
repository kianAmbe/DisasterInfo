<?php
session_start();
include "db_connection.php"; // Include the database configuration file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if email or password is empty
    if (empty($email) || empty($password)) {
        $_SESSION["error_message"] = "Email and password are required"; // Store error message in session
        header("Location: login.php"); // Redirect back to login page
        exit(); // Stop further execution
    }

    // Query to fetch the user's information including role by email
    $sql = "SELECT id, name, password, role FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($id, $name, $hashed_password, $role);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        // Password is correct
        $_SESSION["user_id"] = $id; // Store the user's ID in the session
        $_SESSION["user_name"] = $name; // Store the user's name in the session

        if ($role == "admin") {
            // Redirect admin to admin.php
            header("Location: admin.php");
        } else if ($role == "help") {
            // Redirect users with "help" role to helpdesk.php
            header("Location: helpdesk.php");
        } else {
            // Redirect other users to their respective pages (e.g., index2.php)
            header("Location: index2.php");
        }
    } else {
        // Password is incorrect, set error message in session and redirect to login page
        $_SESSION["error_message"] = "Wrong password or email entered.";
        header("Location: login.php");
    }

    $stmt->close();
} else {
    // Redirect to the login page if accessed without submitting the form
    header("Location: login.php");
}
?>
