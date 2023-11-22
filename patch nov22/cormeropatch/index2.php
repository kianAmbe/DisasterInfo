<?php
session_start();
include 'db_connection.php'; // Include your database connection file

// Check if the user is logged in
$user_name = null; // Initializing $user_name to null
if (isset($_SESSION["user_name"])) {
    $user_name = $_SESSION["user_name"];
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}

$messages = array();
$conn = null; // Initializing $conn to null

// Connect to the database
if ($conn === null) {
    $conn = new mysqli("localhost", "root", "", "db_sad");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}

// Fetch the user's name from the database based on their username
if ($conn instanceof mysqli && $conn->ping())  {
    $stmt = $conn->prepare("SELECT name FROM user WHERE name = ?");
    $stmt->bind_param("s", $user_name);
    $stmt->execute();
    $stmt->bind_result($user_name);
    $stmt->fetch();
    $stmt->close();
}

// Fetch messages from the database
if ($conn !== null) {
    $query = "SELECT message, timestamp FROM messages ORDER BY timestamp DESC LIMIT 10"; // Change this query as per your needs
    if ($result = $conn->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $messages[] = array(
                'message' => $row['message'],
                'timestamp' => $row['timestamp']
            );
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Emergency Alerts and Updates</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <link rel="stylesheet" type="text/css" href="css/contactsstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
<div class="taskbar-container">
    <div class="taskbar">
        <div class="logo">
            <img src="images/safety matters.png" alt="Logo">
        </div>
        <div class="dropdown">
            <button onclick="toggleDropdown()" class="dropbtn">Disasters And Emergencies</button>
            <div id="myDropdown" class="dropdown-content">
                <a href="#disastersemergencies">Earthquake</a>
                <a href="#makeaplan">Extreme Heat</a>
                <a href="#get-involved">Flood</a>
                <a href="#emergency-contacts">Fire</a>
                <a href="#emergency-contacts">Typhoon</a>
                <a href="#emergency-contacts">Pandemic</a>
                <a href="#emergency-contacts">Tsunami</a>
            </div>
        </div>
        <div class="dropdown">
            <button onclick="toggleDropdown()" class="dropbtn">Make A Plan</button>
            <div id="myDropdown" class="dropdown-content">
                <a href="#disastersemergencies">Plan Ahead</a>
                <a href="#makeaplan">Evacuation</a>
                <a href="#get-involved">Safety Skills</a>
            </div>
        </div>
        <ul>
        <li><i class=""></i><a href="#get-involved">Get Involved</a></li>
        <li><i class=""></i><a href="#emergency-contacts">Emergency Contacts</a></li>
        </ul>
   
        <div class="buttons-right">
            <button class="reports-button" onclick="redirectToMyReports()">My Reports</button>
            <button class="logout-button" onclick="confirmLogout()">Logout</button>
        </div>
    </div>
</div>

<script>
    function toggleDropdown() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>


<script>
    function confirmLogout() {
        // Display a confirmation prompt
        if (confirm("Are you sure you want to logout?")) {
            // If the user confirms, redirect to login.php
            window.location.href = "login.php";
        }
    }

    function redirectToMyReports() {
        // Redirect the user to myreports.php
        window.location.href = "my_reports2.php";
    }
</script>

<div class="header" id="home">
    <h1>Welcome, <span class="styled-username"><?php echo $user_name; ?></span></h1>
    <h1>Emergency Alerts and Updates: Disaster Information</h1>
    <button class="send-report-button" onclick="redirectToReport()">Submit Report</button>
</div>

<script>
    function redirectToReport() {
        // Redirect the user to report.php when the button is clicked
        window.location.href = 'report2.php';
    }
</script>


<div class="big-bar">
<div class="content" id="volunteered-activities">
    <h2>Volunteered Activities</h2>
    <p>Explore interactive hazard maps to stay informed about potential risks in your area. Stay safe and be prepared.</p>
    <div class="container">
    <div class="box">
        <div class="compartment">
            <!-- Content for the first compartment -->
            <img src="images/placeholder.png" alt="placeholder">
            
        </div>
        <div class="compartment-2">
        <button class="activities-button" onclick="openModal1()">View Activity Details</button>

            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal1()">&times;</span>
                    <h2>Activity Details</h2>
                    <div id="activity-description">
                        <!-- The activity description will be inserted here -->
                    </div>
                    <button class="activities-button1" onclick="showJoinForm()">Join</button>
                    <div id="join-form" style="display: none;">
                        <h3>Join the Activity</h3>
                        <form>
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" required><br><br>
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required><br><br>
                            <button type="button" onclick="joinActivity()">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="compartment">
            <!-- Content for the first compartment -->
            <img src="images/placeholder.png" alt="placeholder">
            
        </div>
        <div class="compartment-2">
        <button class="activities-button" onclick="openModal1()">View Activity Details</button>

            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal1()">&times;</span>
                    <h2>Activity Details</h2>
                    <div id="activity-description">
                        <!-- The activity description will be inserted here -->
                    </div>
                    <button class="activities-button1" onclick="showJoinForm()">Join</button>
                    <div id="join-form" style="display: none;">
                        <h3>Join the Activity</h3>
                        <form>
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" required><br><br>
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required><br><br>
                            <button type="button" onclick="joinActivity()">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="compartment">
            <!-- Content for the first compartment -->
            <img src="images/placeholder.png" alt="placeholder">
            
        </div>
        <div class="compartment-2">
        <button class="activities-button" onclick="openModal1()">View Activity Details</button>

            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal1()">&times;</span>
                    <h2>Activity Details</h2>
                    <div id="activity-description">
                        <!-- The activity description will be inserted here -->
                    </div>
                    <button class="activities-button1" onclick="showJoinForm()">Join</button>
                    <div id="join-form" style="display: none;">
                        <h3>Join the Activity</h3>
                        <form>
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" required><br><br>
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required><br><br>
                            <button type="button" onclick="joinActivity()">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="about-activity-container">
        <button class="view-activities">View All Activities</button>
        <button class="create-activities">Create Activity</button>
    </div>

<div class="content" id="weather-side">
    <!-- Include the weather container from weather.php -->
    <?php require('weather.php'); ?>
</div>

<div class="content" id="messages">
    <h2>Messages</h2>
    <div id="messages-container">
        <?php
        if (!empty($messages)) {
            foreach ($messages as $message) {
                echo '<div class="message">';
                echo '<p class="message-text">' . $message['message'] . '</p>';
                echo '<p class="message-timestamp">' . $message['timestamp'] . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No messages available.</p>';
        }
        ?>
    </div>
</div>

<script>
    document.getElementById('messages-tab').addEventListener('click', function () {
        // Show the Messages section
        document.getElementById('messages-container').style.display = 'block';

        // Fetch and display messages
        fetch('get_messages.php')
            .then(response => response.json())
            .then(data => {
                const messagesContainer = document.getElementById('messages-container');
                messagesContainer.innerHTML = '';

                if (data.length > 0) {
                    data.forEach(message => {
                        const messageDiv = document.createElement('div');
                        messageDiv.textContent = message;
                        messagesContainer.appendChild(messageDiv);
                    });
                } else {
                    messagesContainer.innerHTML = 'No messages available.';
                }
            })
            .catch(error => console.error('Error fetching messages: ' + error));
    });
</script>

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

<script>
    function openModal2(reportModal) {
        document.getElementById("reportModal").style.display = "block";
    }

    function closeModal2(reportModal) {
        document.getElementById("reportModal").style.display = "none";
    }
</script>

</body>
</html>