<?php
include "db_connection.php"; // Include the database configuration file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = $_POST ["role"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $number = $_POST["number"];
    $address = $_POST["address"];

    $sql = "INSERT INTO user ( name, email, password, number, address) VALUES (?, ?, ?, ?, ?, )";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $username, $email, $password, $number, $address);

    if ($stmt->execute()) {
        // Registration successful
        header("Location: registration_success.php"); // Redirect to the success page
        exit();
    } else {
        // Registration failed
        // Handle the error, such as displaying a message to the user
        echo "Registration failed. Please try again.";
    }

    $stmt->close();
}

$conn->close();
?>
