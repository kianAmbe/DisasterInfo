<?php
// Include your database connection script
include 'db_connection.php';

session_start();

if (isset($_SESSION["user_name"])) {
    $user_name = $_SESSION["user_name"];
} else {
    // Redirect if the user is not logged in
    header("Location: login.php");
    exit();
}


// Query to retrieve messages and DATETIME for the logged-in user (adjust your database table and fields)
$query = "SELECT message, timestamp FROM messages WHERE recipient = ?";

$stmt = $conn->prepare($query);

$stmt->bind_param("s", $user_name);

$stmt->execute();

$stmt->bind_result($message, $datetime);

$messages = array();

while ($stmt->fetch()) {
    $messageData = array(
        "message" => $message,
        "timestamp" => $datetime,
    );
    $messages[] = $messageData;
}

$stmt->close();
$conn->close();

// Return messages as JSON
echo json_encode($messages);
?>
