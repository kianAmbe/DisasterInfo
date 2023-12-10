<?php
// process_activity.php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $host = $_POST['host'];
    $description = $_POST['description'];
    $datetime = $_POST['datetime'];
    $event_type = $_POST['event_type'];

    // Validate and sanitize the input data (you can add more validation as needed)

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

    // Manually set the event_number value for different event types
    $event_number = ($event_type === 'treeplanting') ? 20 : (($event_type === 'cleanup') ? 30 : (($event_type === 'aid') ? 40 : (($event_type === 'ert') ? 50 : (($event_type === 'nature') ? 60 : 10))));




    // Prepare the SQL statement using a prepared statement to prevent SQL injection
    $sql = "INSERT INTO activities (host, description, datetime, event_number) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Check if the statement was prepared successfully
    if ($stmt) {
        // Bind parameters to the prepared statement
        $stmt->bind_param("sssi", $host, $description, $datetime, $event_number);

        // Execute the prepared statement
        if ($stmt->execute()) {
            // Close the statement
            $stmt->close();
            
            // Close the database connection
            $conn->close();

            // Redirect to the respective page based on event_type
            if ($event_type === 'treeplanting') {
                header("Location: treeplanting.php");
                exit();
            } else if ($event_type === 'blood') {
                header("Location: blood.php");
                exit();
            } else if ($event_type === 'cleanup') {
                header("Location: cleanup.php");
                exit();
            } else if ($event_type === 'aid') {
                header("Location: aid.php");
                exit();
            } else if ($event_type === 'ert') {
                header("Location: ert.php");
                exit();
            } else if ($event_type === 'nature') {
                header("Location: nature.php");
                exit();
            }
        } else {
            echo "Error: Unable to execute the statement." . $stmt->error;
        }
    } else {
        echo "Error: Unable to prepare the statement." . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
