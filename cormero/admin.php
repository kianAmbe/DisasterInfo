<?php
// Start a session to work with session variables
session_start();

// Check if the admin is not logged in (session variable is not set)
if (!isset($_SESSION["admin_username"])) {
    // Redirect to the admin login page
    header("Location: adminlogin.php");
    exit(); // Terminate the current script
}

// Rest of your code remains the same
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reports</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <button id ="logout-link" class="btn">Logout</button> 
    <button id="add-contact-btn" class="btn">Add Emergency Contact</button>
    <button id= "go-home" class="btn">Go Home</button>
    <button id= "go-site" class="btn">Go Main Site</button>

    <script>
document.getElementById('go-site').addEventListener('click', function(event) {
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
document.getElementById('go-home').addEventListener('click', function(event) {
    if (confirm("Are you sure you want to go to home?")) {
        // If the admin confirms, redirect to the logout page
        window.location.href = "admindex.php";
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
        window.location.href = "adminlogout.php";
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

        

        // Display user data
        echo "<h2>User Table</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Number</th><th>Address</th></tr>";

        while ($row = $userResult->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["number"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "</tr>";
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
            echo "<td>" . $row["user_name"] . "</td>";
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
