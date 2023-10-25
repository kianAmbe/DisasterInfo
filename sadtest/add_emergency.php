<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the input from the form
    $newName = $_POST["new_name"];
    $newPhone = $_POST["new_phone"];
    $newEmail = $_POST["new_email"];

    // Connect to the database
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "db_sad";

    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL query to insert the new emergency contact
    $sql = "INSERT INTO emergency (name, phone, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sss", $newName, $newPhone, $newEmail);

        if ($stmt->execute()) {
            // Contact added successfully
            header("Location: admin.php"); // Redirect back to the Admin page
            exit();
        } else {
            echo "Error adding new contact: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
