<?php
// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Get data from the form
    $name = $_POST['name']; // Assuming name is the user's name
    $emergency_type = $_POST['emergency_type'];
    $description = $_POST['description'];
    $submission_datetime = $_POST['submission_datetime']; // Retrieve the date and time from the form

    // Set the status to "Pending"
    $status = "Pending";

    // Insert data into the database
    $sql = "INSERT INTO report (name, emergency_type, description, status, submission_datetime) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssss", $name, $emergency_type, $description, $status, $submission_datetime);

        if ($stmt->execute()) {
            // Data inserted successfully
            // Display a confirmation dialog using JavaScript
            echo '<script>';
            echo 'if (confirm("Report Submitted! Do you want to go home?")) { window.location.href = "index2.php"; }';
            echo 'else { window.location.href = "report2.php"; }'; // Redirect to report.php if 'Cancel' is clicked
            echo '</script>';
        } else {
            // Error handling if the insertion fails
            echo "Error: " . $stmt->error;
        }
        

        // Close the statement
        $stmt->close();
    } else {
        // Error handling if the statement preparation fails
        echo "Error: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect to the index page if someone tries to access this page directly without submitting the form
    header("Location: index2.php");
    exit();
}
?>
