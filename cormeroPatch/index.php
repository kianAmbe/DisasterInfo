<?php
session_start();
include 'db_connection.php'; // Include your database connection file



$messages = array();
$conn = null; // Initializing $conn to null

// Connect to the database
if ($conn === null) {
    $conn = new mysqli("localhost", "root", "", "db_sad");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
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
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/contactsstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
</head>

<?php
date_default_timezone_set('Asia/Manila'); // Set the timezone to 'Asia/Manila'

// Fetch the current date and time using PHP's date function in a non-military format
$currentDateTime = date('Y-m-d h:i:s A');
?>



<script>
    function updateCurrentTime() {
        fetch('https://worldtimeapi.org/api/ip') // You can use a different API URL here
            .then(response => response.json())
            .then(data => {
                const currentTime = moment(data.datetime).format('YYYY-MM-DD hh:mm:ss A');
                document.getElementById('currentTime').textContent = currentTime;
            })
            .catch(error => console.error('Error fetching time: ' + error));
    }

    // Update the time initially when the page loads
    updateCurrentTime();

    // Update the time every 1 second (adjust as needed for animation effect)
    setInterval(updateCurrentTime, 1000);
</script>

<body>
<div class="taskbar-container">
    <div class="taskbar">
        <div class="logo">
            <img src="images/safety matters.png" alt="Logo">
        </div>
        <div class="dropdown">
                <button onclick="toggleDropdown()" class="dropbtn">Disasters And Emergencies</button>
                <div id="myDropdown" class="dropdown-content">
                <a href="earthquake2.php" onclick="redirectToPage('earthquake.php')">Earthquake</a>
                <a href="heat2.php" onclick="redirectToPage('heat.php')">Extreme Heat</a>
                <a href="flood2.php" onclick="redirectToPage('flood.php')">Flood</a>
                <a href="fire2.php" onclick="redirectToPage('fire.php')">Fire</a>
                <a href="typhoon2.php" onclick="redirectToPage('typhoon.php')">Typhoon</a>
                <a href="pandemic2.php" onclick="redirectToPage('pandemic.php')">Pandemic</a>
                <a href="tsunami2.php" onclick="redirectToPage('tsunami.php')">Tsunami</a>
                </div>
            </div>

        <ul>
        <li><i class=""></i><a href="volunteer.php">Get Involved</a></li>
        <li><i class=""></i><a href="#emergency-contacts">Emergency Contacts</a></li>
        <li><i class=""></i> <a href="map2.php">Map of Tacloban</a></li>
        </ul>

   
        <div class="buttons-right">
        <button class="reports-button" onclick="redirectToNewsletterSignup()">Sign Up for Newsletter</button>

            <button class="logout-button" onclick="confirmLogout()">Log In</button>
        </div>
    </div>
</div>

<script>
    function redirectToNewsletterSignup() {
        // Redirect to the desired page
        window.location.href = "newsletter.php";
    }
</script>


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
     
            window.location.href = "login.php";
        }
    

    function redirectToMyReports() {
        // Redirect the user to myreports.php
        window.location.href = "myreports.php";
    }
</script>
<div class="header" id="home">
    <h1>Maupay Nga Adlaw, Taclobanon!</h1>
    <h1>Emergency Alerts and Updates: Disaster Information</h1>
    <button class="send-report-button" onclick="redirectToReport()">Submit Report</button>
    <div class="datetime">
    <p><span id="currentTime"></span></p>
    <style>
    .datetime #currentTime {
        color: white;
        z-index: 10;
        position: relative;
    }
</style>

</div>
</div>

<script>
    function redirectToReport() {
        // Redirect the user to report.php when the button is clicked
        window.location.href = 'report.php';
    }
</script>

<div class="big-bar">
<div class="content" id="volunteered-activities">
    <h2>Volunteered Activities</h2>
    <p>Join various volunteer activities that can help and provide an impact to the community</p>
    <div class="slick-track" style="display: flex; justify-content: space-between; overflow-x: auto;">
        <div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 209px;">
            <div class="host-type-wrapper host-type-wrapper-farm">
                <a class="block host-type farm" href="volunteer.php" tabindex="0">
                    <div class="content">
                        <a href="volunteer.php">
                            <img src="img/v1.jpg" alt="Blood Donation" class="host-type-image">
                        </a>
                    </div>
                </a>
            </div>
        </div>

        <!-- Update the other image links similarly -->
        <div class="slick-slide slick-active" data-slick-index="1" aria-hidden="false" style="width: 209px;">
            <div class="host-type-wrapper host-type-wrapper-farm">
                <a class="block host-type farm" href="volunteer.php" tabindex="0">
                    <div class="content">
                        <a href="volunteer.php">
                            <img src="img/v2.jpg" alt="Tree Planting Image" class="host-type-image">
                        </a>
                    </div>
                </a>
            </div>
        </div>

        <!-- Update the other image links similarly -->
        <div class="slick-slide slick-active" data-slick-index="2" aria-hidden="false" style="width: 209px;">
            <div class="host-type-wrapper host-type-wrapper-farm">
                <a class="block host-type farm" href="volunteer.php" tabindex="0">
                    <div class="content">
                        <a href="volunteer.php">
                            <img src="img/v3.jpg" alt="Tree Planting Image" class="host-type-image">
                        </a>
                    </div>
                </a>
            </div>
        </div>

        <!-- Update the other image links similarly -->
        <div class="slick-slide slick-active" data-slick-index="3" aria-hidden="false" style="width: 209px;">
            <div class="host-type-wrapper host-type-wrapper-farm">
                <a class="block host-type farm" href="volunteer.php" tabindex="0">
                    <div class="content">
                        <a href="volunteer.php">
                            <img src="img/v4.jpg" alt="First Aid Image" class="host-type-image">
                        </a>
                    </div>
                </a>
            </div>
        </div>

        <!-- Update the other image links similarly -->
        <div class="slick-slide slick-active" data-slick-index="4" aria-hidden="false" style="width: 209px;">
            <div class="host-type-wrapper host-type-wrapper-farm">
                <a class="block host-type farm" href="volunteer.php" tabindex="0">
                    <div class="content">
                        <a href="volunteer.php">
                            <img src="img/v5.jpg" alt="Emergency Team Image" class="host-type-image">
                        </a>
                    </div>
                </a>
            </div>
        </div>

        <!-- Update the other image links similarly -->
        <div class="slick-slide slick-active" data-slick-index="5" aria-hidden="false" style="width: 209px;">
            <div class="host-type-wrapper host-type-wrapper-farm">
                <a class="block host-type farm" href="volunteer.php" tabindex="0">
                    <div class="content">
                        <a href="volunteer.php">
                            <img src="img/v6.jpg" alt="Nature Image" class="host-type-image">
                        </a>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>



<div class="content" id="weather-side">
    <!-- Include the weather container from weather.php -->
    <?php require('weather.php'); ?>
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