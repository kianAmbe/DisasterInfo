<?php
// Include your database connection script
include 'db_connection.php';

// Check if the admin is not logged in (session variable is not set)
session_start();
if (!isset($_SESSION["admin_username"])) {
    // Redirect to the admin login page
    header("Location: adminlogin.php");
    exit(); // Terminate the current script
}

// Check if the message form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["message"])) {
    // Get the message from the form
    $message = $_POST["message"];

    // Fetch user IDs from the database
    $query = "SELECT user_id FROM users"; // Adjust this query based on your schema
    $result = $conn->query($query);

    if ($result) {
        $userIds = array();
        while ($row = $result->fetch_assoc()) {
            $userIds[] = $row['user_id'];
        }

        // Insert the message into the 'messages' table for each user
        foreach ($userIds as $userId) {
            $query = "INSERT INTO messages (user_id, message) VALUES (?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("is", $userId, $message);

            if ($stmt->execute()) {
                // Message sent successfully to this user
            } else {
                // Error handling for message sending failure
            }

            $stmt->close();
        }
    } else {
        // Handle database query error
    }

    // Redirect to the admin page or a success page
    header("Location: admin.php"); // Change this to your desired destination
    exit();
} else {
    // Handle cases where the form was not submitted
    // You can redirect to an error page or perform other actions
}
?>
