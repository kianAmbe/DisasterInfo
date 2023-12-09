<?php
// Start a session to work with session variables

// Check if the message form is submitted
if (isset($_POST['message'])) {
    // Handle message submission
    $message = $_POST['message'];

    // Perform any necessary validation on the message
    // Insert the message into the database
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "db_sad";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement to insert the message into the database
    $insertMessageSql = "INSERT INTO messages (message) VALUES (?)";

    $stmt = $conn->prepare($insertMessageSql);
    $stmt->bind_param("s", $message);

    if ($stmt->execute()) {
        // Message was successfully inserted into the database
        $successMessage = "Message sent successfully.";
    } else {
        $errorMessage = "Error sending the message: " . $conn->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reports</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <button id="logout-link" class="btn">Logout</button>
    <button id="add-contact-btn" class="btn">Add Emergency Contact</button>
    <button id="go-site" class="btn">Go Main Site</button>
    <button id="notify-all-btn" class="btn">Notify All Users</button>

    <div id="message-modal" class="modal">
    <div class="modal-content">
        <span class="close" id="close-message-modal">&times;</span>
        <h2>Compose Message</h2>
        <form method="post" action="admin.php">
            <label for="message">Message:</label>
            <textarea name="message" id="message" required></textarea>
            
            <label for="datetime">Date and Time:</label>
            <input type="datetime-local" name="datetime" id="datetime" required>
            
            <input type="submit" value="Send Message">
        </form>
    </div>
</div>



    <script>
        document.getElementById('notify-all-btn').addEventListener('click', function () {
            var messageModal = document.getElementById('message-modal');
            messageModal.style.display = 'block';
        });

        document.getElementById('close-message-modal').addEventListener('click', function () {
            var messageModal = document.getElementById('message-modal');
            messageModal.style.display = 'none';
        });
    </script>

    <script>
        document.getElementById('go-site').addEventListener('click', function (event) {
            if (confirm("Go to main site?")) {
                // If the admin confirms, redirect to the logout page
                window.location.href = "login.php";
            } else {
                // If the admin cancels, prevent the default link behavior
                event.preventDefault();
            }
        });
    </script>



<script>
document.getElementById('logout-link').addEventListener('click', function(event) {
    if (confirm("Are you sure you want to logout?")) {
        // If the admin confirms, redirect to the logout page
        window.location.href = "login.php";
    } else {
        // If the admin cancels, prevent the default link behavior
        event.preventDefault();
    }
});
</script>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<div id="add-contact-modal" class="modal">
    <div class="modal-content">
        <span class="close" id="close-modal">&times;</span>
        <h2>Add Emergency Contact</h2>
        <form method="post" action="add_emergency_contact.php">
            <!-- Your form fields here -->
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required><br>

            <label for="email">Email:</label>
            <input type="text" name="email" id="email" required><br>

            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" required><br>

            <input type="submit" value="Add Contact">
        </form>
    </div>
</div>


<!-- JavaScript to show/hide the form -->
<script>
document.getElementById('add-contact-btn').addEventListener('click', function() {
    var form = document.getElementById('add-contact-form');
    form.style.display = form.style.display === 'none' ? 'block' : 'none';
});
</script>

    <div class="container">
        <?php
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

        // Fetch data from the "report" table, including the "remarks" column
        $reportSql = "SELECT * FROM report";

        $reportResult = $conn->query($reportSql);

        // Fetch data from the "user" table
        $userSql = "SELECT * FROM user";

        $userResult = $conn->query($userSql);

        // Fetch data from the "emergency contact" table
        $emergencyContactSql = "SELECT * FROM emergency";

        $emergencyContactResult = $conn->query($emergencyContactSql);

        if ($reportResult === false || $userResult === false || $emergencyContactResult === false) {
            die("Error: " . $conn->error);
        }
        echo "</table>";

        // Display emergency contact data
        echo "<h2>Emergency Contact Table</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Name</th><th>Phone</th><th>Email</th></tr>";
        

        while ($row = $emergencyContactResult->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";

        // Display report data
        echo "<h2>Reports</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Emergency Type</th><th>Description</th><th>Status</th><th>Remarks</th><th>Report Date and Time</th><th>Actions</th></tr>";

        while ($row = $reportResult->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["emergency_type"] . "</td>";
            echo "<td>" . $row["description"] . "</td>";
            echo "<td>" . $row["status"] . "</td>";
            echo "<td>" . $row["remarks"] . "</td>";
            echo "<td>" . $row["submission_datetime"] . "</td>";
            echo "<td><a class='delete-button' href='delete_report.php?id=" . $row["id"] . "'><i class='fa-solid fa-trash'></i></a>";
            echo " <a class 'edit-button' href='edit_report.php?id=" . $row["id"] . "'><i class='fa-solid fa-pen-to-square'></i></a></td>";
            echo "</tr>";
        }

        echo "</table>";

        

        // Add the "Go to Home" button

        

        // Close the database connection
        $conn->close();
        ?>
    </div>

    <script>
document.getElementById('add-contact-btn').addEventListener('click', function() {
    var modal = document.getElementById('add-contact-modal');
    modal.style.display = 'block';
});

document.getElementById('close-modal').addEventListener('click', function() {
    var modal = document.getElementById('add-contact-modal');
    modal.style.display = 'none';
});
</script>
</body>
</html>
