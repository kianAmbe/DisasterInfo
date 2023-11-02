<?php
session_start();
include 'db_connection.php'; // Include your database connection file

// Check if the user is logged in
if (isset($_SESSION["user_name"])) {
    $user_name = $_SESSION["user_name"];
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}

// Fetch the user's name from the database based on their username
$query = "SELECT name FROM user WHERE name = ?"; // Change 'username' to 'name'
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $user_name);
$stmt->execute();
$stmt->bind_result($user_name);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Emergency Alerts and Updates</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="contactsstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>



<body>
<div class="taskbar-container">
    <div class="taskbar">
        <div class="logo">
            <img src="images/safety matters.png" alt="Logo">
        </div>
        <ul>
            <li><i class=""></i><a href="#home">Home</a></li>
            <li><i class=""></i><a href="#hazard-maps">Hazard Maps</a></li>
            <li><i class=""></i><a href="#survival-tips">Survival Tips</a></li>
            <li><i class=""></i><a href="#emergency-contacts">Emergency Contacts</a></li>
        </ul>
        <div class="buttons-right">
            <button class="reports-button" onclick="redirectToMyReports()">My Reports</button>
            <button class="logout-button" onclick="confirmLogout()">Admin</button>
        </div>
    </div>
</div>

<script>
    function confirmLogout() {
        // Display a confirmation prompt
        if (confirm("Go to admin side?")) {
            // If the user confirms, redirect to login.php
            window.location.href = "admin.php";
        }
    }

    function redirectToMyReports() {
        // Redirect the user to myreports.php
        window.location.href = "myreports.php";
    }
</script>


<div class="header" id="home">
    
    <h1>Welcome, <span class="styled-username"><?php echo $user_name; ?></span></h1>
    <h1>Emergency Alerts and Updates: Disaster Information</h1>
    <button class="send-report-button" onclick="redirectToReportPage()">Submit Report</button>
    
</div>

<div class="big-bar">
<div class="content" id="volunteered-activities">
    <h2>Volunteered Activities</h2>
    <p>Explore interactive hazard maps to stay informed about potential risks in your area. Stay safe and be prepared.</p>
    <div class="container">
    <div class="box">
        <div class="compartment">
            <!-- Content for the first compartment -->
            <h2>Compartment 1</h2>
            <p>This is the content of compartment 1.</p>
        </div>
        <div class="compartment-2">
            <!-- Content for the second compartment -->
            <h2>Compartment 2</h2>
            <p>This is the content of compartment 2.</p>
        </div>
    </div>
    <div class="box">
        <div class="compartment">
            <!-- Content for the first compartment -->
            <h2>Compartment 1</h2>
            <p>This is the content of compartment 1.</p>
        </div>
        <div class="compartment-2">
            <!-- Content for the second compartment -->
            <h2>Compartment 2</h2>
            <p>This is the content of compartment 2.</p>
        </div>
    </div>
    <div class="box">
        <div class="compartment">
            <!-- Content for the first compartment -->
            <h2>Compartment 1</h2>
            <p>This is the content of compartment 1.</p>
        </div>
        <div class="compartment-2">
            <!-- Content for the second compartment -->
            <h2>Compartment 2</h2>
            <p>This is the content of compartment 2.</p>
        </div>
    </div>
    </div>
    <button class="activities-button" onclick="redirectToReportPage()">View All Activities</button>
    <button class="activities-button" onclick="redirectToReportPage()">Create an Activity</button>
</div>
 
</div>
<div class="content" id="weather-side">
    <!-- Include the weather container from weather.php -->
    <?php require('weather.php'); ?>
</div>


</div>
<div class="content" id="hazard-maps">
    <h2>Hazard Maps</h2>
    <p>Explore interactive hazard maps to stay informed about potential risks in your area. Stay safe and be prepared.</p>
</div>
<div class="content" id="survival-tips">
    <h2>Survival Tips</h2>
    <p>Learn essential survival tips and emergency preparedness strategies. Be ready for any unexpected situation.</p>
</div>
<div class="content" id="emergency-contacts">
    <h1>Emergency Contacts</h1>
    <table>
        <tr>
            <th>Contact Name</th>
            <th>Phone Number</th>
            <th>Email</th>
        </tr>

        <?php
        // Connect to your database (replace with your database credentials)
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "db_sad";
        
        $conn = new mysqli($host, $username, $password, $database);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to retrieve data from the "emergency" table
        $sql = "SELECT name, phone, email FROM emergency";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data from each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No emergency contacts found.</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</div>


<script>
    function redirectToReportPage() {
        // Redirect the user to the report.php page
        window.location.href = "report.php";
    }
</script>
</body>
</html>


