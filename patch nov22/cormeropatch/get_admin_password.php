<?php
// Include your database connection code here (e.g., using PDO or MySQLi).
include 'db_connection.php'; // Include the database configuration file
try {
    $pdo = new PDO('mysql:host=localhost;dbname=db_sad', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT password FROM adminuser WHERE id = 1"; // Assuming you have an admin user with ID 1
    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $correctAdminPassword = $row['password'];
        echo $correctAdminPassword;
    } else {
        echo "Admin user not found.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
