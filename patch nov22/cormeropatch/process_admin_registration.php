<?php
// Include your database connection code here (e.g., using PDO or MySQLi).
include "db_connection.php"; // Include the database configuration file

// Check if the form is submitted.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user input from the registration form.
    $adminName = $_POST['admin-name'];
    $adminEmail = $_POST['admin-email'];
    $adminPassword = $_POST['admin-password'];

    // Hash the password securely using password_hash.
    $hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT);

    // Insert the admin user into the database.
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=db_sad', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "INSERT INTO adminuser (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':name', $adminName);
        $stmt->bindParam(':email', $adminEmail);
        $stmt->bindParam(':password', $hashedPassword);

        if ($stmt->execute()) {
            // Registration successful.
            echo "Admin user registered successfully.";
        } else {
            // Registration failed.
            echo "Failed to register admin user.";
        }
    } catch (PDOException $e) {
        // Handle any database connection or query errors.
        echo "Error: " . $e->getMessage();
    }
} else {
    // Handle the case when the form is not submitted.
    echo "Form not submitted.";
}
?>
