<?php
session_start();
include 'db_connection.php'; // Include your database connection file



$messages = array();
$conn = null; 
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Typhoon</title>
    <link rel="stylesheet" href="disaster2.css">
</head>

<body>
    <div class="taskbar-container">
        <div class="taskbar">
            <div class="logo">
            <a href="index.php">
        <img src="images/safety matters.png" alt="Logo">
            </a>
            </div>
            <div class="dropdown">
                <button onclick="toggleDropdown()" class="dropbtn">Disasters And Emergencies</button>
                <div id="myDropdown" class="dropdown-content">
                <a href="earthquake.php" onclick="redirectToPage('earthquake.php')">Earthquake</a>
                <a href="heat.php" onclick="redirectToPage('heat.php')">Extreme Heat</a>
                <a href="flood.php" onclick="redirectToPage('flood.php')">Flood</a>
                <a href="fire.php" onclick="redirectToPage('fire.php')">Fire</a>
                <a href="typhoon.php" onclick="redirectToPage('typhoon.php')">Typhoon</a>
                <a href="pandemic.php" onclick="redirectToPage('pandemic.php')">Pandemic</a>
                <a href="tsunami.php" onclick="redirectToPage('tsunami.php')">Tsunami</a>
                </div>
          
        
            </div>
            <ul>
                <<li><i class=""></i><a href="volunteer.php">Get Involved</a></li>
        <li><i class=""></i><a href="index2.php">Emergency Contacts</a></li>
            </ul>
            <div class="buttons-right">
                <button class="logout-button" onclick="confirmLogout()">Logout</button>
            </div>
        </div>
    </div>

    <header>
        <meta charset="UTF-8">
        <title>Emergency Alerts and Updates</title>
        <link rel="stylesheet" type="text/css" href="earthquake.css">
        <link rel="stylesheet" type="text/css" href="css/contactsstyle.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </header>

        <!--Adi na didi an content-->
        
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

</script>

            <div class="content-container">
                    
                <div class="section section-1">
                    <h1>Typhoon</h1>
                    <p>Typhoon disaster is a natural disaster that refers to the formation of tropical and Subtropical Ocean cyclonic eddies in a wide range of activities with strong wind, rainstorm, storm tide and waves, which may cause damage to human life and properties.</p>
                </div>

                            

                <div class="section section-2">
                    <h2>Before a Typhoon</h2>
                    <img src="img/build-a-kit_landslides.png" style="width: 35%; height: auto;">
                  
                    <div class="checklist">
                        <ul>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p><b>Build an Emergency Kit  </b> Include essential supplies such as non-perishable food, water, first aid kit, flashlight, batteries, important documents, and necessary medications.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p><b>Create a Family Emergency Plan</b> Establish a plan for evacuation, communication, and reunion with family members. Designate a safe meeting place and ensure everyone knows the evacuation routes.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p><b>Stay Informed </b> Sign up for your community’s warning system and pay attention to weather forecasts. Listen to official announcements and follow guidance from local authorities.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p><b>Prepare Your Home</b> Secure doors and windows with storm shutters or plywood. Trim trees and remove dead branches to minimize the risk of falling debris. Anchor outdoor furniture and other objects that could become projectiles.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p><b>Check Insurance Coverage </b> Review your insurance policies, especially for coverage related to typhoon damage.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p> <b>Evacuation Plan </b> Know the location of the nearest evacuation shelters. Follow evacuation orders promptly, especially if you are in a flood-prone or coastal area. </p>
                                </div>
                            </li>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="section section-3">
                    <h2>During a Typhoon</h2>
                    <img src="img/featured_illustration_landslide_couch.png" style="width: 35%; height: auto;">
                  
                    <div class="checklist">
                        <ul>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p><b>Stay Informed</b> Keep a battery-powered radio for updates on the typhoon's progress. Follow local news and emergency alerts for the latest information.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p><b>Stay Indoors </b> Seek shelter in a sturdy building, away from windows and glass doors. Avoid staying in mobile homes or temporary structures.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p><b>Water Safety </b> Avoid walking or driving through flooded areas, as water levels can rise rapidly. Be cautious of storm surges, which can cause rapid and severe flooding along coastlines. </p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p><b> Power Outages </b> Use flashlights instead of candles to reduce fire risks. Unplug electrical appliances to prevent damage from power surges when electricity is restored. </p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p><b> Stay Put </b> Do not go outside during the typhoon unless directed by authorities.Be cautious of strong winds, flying debris, and potential electrical hazards.</p>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
                

                <div class="section section-6">
                    <h3>Associated Content</h3>
                    <ul class="links">
                        <li onclick="window.location.href = 'https://www.moneymax.ph/lifestyle/articles/typhoon-in-the-philippines#:~:text=Evacuate%20immediately%20and%20calmly%E2%80%94if,your%20family%20during%20a%20typhoon.'">Typhoon Safety Tips</li>
                        <li onclick="window.location.href = 'https://www.wunderground.com/prepare/hurricane-typhoon'">Prepare for a Hurricane or Typhoon</li>
                        <li onclick="window.location.href = 'https://newsinfo.inquirer.net/620376/safety-tips-during-and-after-a-typhoon'">Safety tips during and after a typhoon</li>
            
                    </ul>

                </div>

            </div>
        </main>
    </div>
</body>

</html>