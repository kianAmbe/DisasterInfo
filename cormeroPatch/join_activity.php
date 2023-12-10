<?php
// join_activity.php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['activity_id'])) {
    $activity_id = $_POST['activity_id'];
    $referrer = $_POST['referrer']; // Get the referrer page
    
    // Perform database operations to update participants for the specific activity
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

    // Update participants for the selected activity (you'll need to define the update logic)
    // For example, if 'participants' is a numeric column indicating the count of participants:
    $sql = "UPDATE activities SET participants = participants + 1 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $activity_id);

    if ($stmt->execute()) {
        // Redirect back to the respective page based on the referrer
        header("Location: $referrer");
        exit();
    } else {
        echo "Error updating participants: " . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
