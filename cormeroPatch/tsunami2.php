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
    <title>Tsunamis</title>
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
        <li><i class=""></i><a href="volunteer.php">Get Involved</a></li>
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
function redirectToPage(url) {
    // Add the transition class to the taskbar
    document.querySelector('.taskbar').classList.add('transition');

    // Redirect after a short delay (adjust the delay as needed)
    setTimeout(function () {
        window.location.href = url;
    }, 300);
}

function toggleDropdown() {
    // Add the transition class to the taskbar
    document.querySelector('.taskbar').classList.add('transition');

    // Your existing toggleDropdown logic here
}

function confirmLogout() {
    // Add the transition class to the taskbar
    document.querySelector('.taskbar').classList.add('transition');

    // Your existing confirmLogout logic here
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
                    <h1>Tsunamis</h1>
                    <p>A tsunami is a series of enormous ocean waves caused by earthquakes, underwater landslides, volcanic eruptions or asteroids. A tsunami can kill or injure people and damage or destroy buildings and infrastructure as waves come in and go out. Tsunamis can:</p>
                    <ul>
                            <li><p>Travel 20-30 miles per hour with waves 10-100 feet high.</p></li>
                            <li><p>Cause flooding and disrupt transportation, power, communications and the water supply.</p></li>
                            <li><p>Happen anywhere along U.S. coasts. Coasts that border the Pacific Ocean or Caribbean have the greatest risk.</p></li>
                    </ul>
                    <b>IIF YOU ARE UNDER A TSUNAMI WARNING:</b>
                    <ul>
                        <li> If caused by an earthquake, Drop, Cover, then Hold On to protect yourself from the earthquake first. </li>
                        <li> Get to high ground as far inland as possible </li>
                        <li>Be alert to signs of a tsunami, such as a sudden rise or draining of ocean waters. </li>
                        <li> Listen to emergency information and alerts. Always follow the instructions from local emergency managers. </li>
                        <li> Evacuate: DO NOT wait! Leave as soon as you see any natural signs of a tsunami or receive an official tsunami warning. </li>
                        <li> If you are in a boat, go out to sea. </li>
                    </ul>

                </div>


                            

                <div class="section section-2">
                    <h2>Prepare NOW</h2>
                    <img src="img/featured_illustration_tsunami.png" style="width: 35%; height: auto;">
                  
                    <div class="checklist">
                        <ul>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Learn the signs of a potential tsunami, such as an earthquake, a loud roar from the ocean, or unusual ocean behavior, such as a sudden rise or wall of water or sudden draining of water showing the ocean floor.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Know and practice community evacuation plans. Some at-risk communities have maps with evacuation zones and routes. Map out your routes from home, work and play. Pick shelters 100 feet or more above sea level, or at least one mile inland.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Create a family emergency communication plan that has an out-of-state contact. Plan where to meet if you get separated.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Sign up for your community’s warning system. The Emergency Alert System (EAS) and National Oceanic and Atmospheric Administration (NOAA) Weather Radio also provide emergency alerts.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Consider earthquake insurance and a flood insurance policy through the National Flood Insurance Program (NFIP). Standard homeowner’s insurance does not cover flood or earthquake damage.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="section section-3">
                    <h2>Survive DURING</h2>
                    <img src="img/illustration_earthquake_drop-cover-hold-on_0.png" style="width: 35%; height: auto;">
                  
                    <div class="checklist">
                        <ul>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>If there is an earthquake and you are in a tsunami area, protect yourself from the earthquake first. Drop, Cover, and Hold On. Drop to your hands and knees. Cover your head and neck with your arms. Hold on to any sturdy furniture until the shaking stops. Crawl only if you can reach a better cover, but do not go through an area with more debris.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>When the shaking stops, if there are natural signs or official warnings of a tsunami, move immediately to a safe place as high and as far inland as possible. Listen to the authorities, but do not wait for tsunami warnings and evacuation orders.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>If you are outside of the tsunami hazard zone and receive a warning, stay where you are unless officials tell you otherwise.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Leave immediately if you are told to do so. Evacuation routes often are marked by a wave with an arrow in the direction of higher ground.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>If you are in the water, then grab onto something that floats, such as a raft or tree trunk.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>If you are in a boat, face the direction of the waves and head out to sea. If you are in a harbor, go inland.</p>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>


                <div class="section section-4">
                    <h2>Survive DURING</h2>
                    <img src="img/text message.png" style="width: 35%; height: auto;">
                  
                    <div class="checklist">
                        <ul>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Listen to local alerts and authorities for information on areas to avoid and shelter locations.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Save phone calls for emergencies. Phone systems often are down or busy after a disaster. Use text messages or social media to communicate with family and friends.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Avoid wading in floodwater, which can contain dangerous debris. Water may be deeper than it appears.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Leave immediately if you are told to do so. Evacuation routes often are marked by a wave with an arrow in the direction of higher ground.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Be aware of the risk of electrocution. Underground or downed power lines can electrically charge water. Do not touch electrical equipment if it is wet or if you are standing in water.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Stay away from damaged buildings, roads and bridges.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>If you become injured or sick and need medical attention, contact your healthcare provider and shelter in place, if possible. Call 9-1-1 if you are experiencing a medical emergency.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Document property damage with photographs. Conduct an inventory and contact your insurance company for assistance.</p>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
                

                <div class="section section-6">
                    <h3>Associated Content</h3>
                    <ul class="links">
                        <li onclick="window.location.href = 'https://www.weather.gov/safety/tsunami'">Tsunami Safety (weather.gov)</li>
                        <li onclick="window.location.href = 'https://www.redcross.org/get-help/how-to-prepare-for-emergencies/types-of-emergencies/tsunami.html'">Tsunami Preparedness</li>
            
                    </ul>

                </div>

            </div>
        </main>
    </div>
</body>

</html>