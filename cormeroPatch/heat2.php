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
    <title>Extreme Heat</title>
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
                    <h1>Extreme Heat</h1>
                    <p>You can find extremes in heat! A period of excessive heat and humidity, lasting at least two or three days, with temperatures above ninety degrees, is referred to as extreme heat. Your body has to work harder in extremely hot conditions to keep its temperature normal, which can be fatal. Of all the weather-related hazards, extreme heat is the cause of the greatest number of deaths each year.</p>
                </div>

                <div class="section section-2">
                    <div class="sub-heading">
                        <img src="img/illustration_featuredmini_winter_elderly.png">
                        <h3>Older adults, children and sick or overweight individuals are at greater risk from extreme heat.</h3>
                    </div>
                    <div class="sub-heading">
                        <img src="img/heat_wave.png">
                        <h3>Humidity increases the feeling of heat.</h3>
                    </div>
                    <h2>Prepare for Extreme Heat</h2>
                    <img src="img/featured_illustration_extremeheat_prepare.png" style="width: 35%; height: auto;">
                    <div class="checklist">
                        <ul>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Learn to recognize the signs of heat illness.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Do not rely on a fan as your primary cooling device. Fans create air flow and a false sense of comfort, but do not reduce body temperature or prevent heat-related illnesses. </p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Identify places in your community where you can go to get cool such as libraries and shopping malls or contact your local health department to find a cooling center in your area. </p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Cover windows with drapes or shades.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Weather-strip doors and windows.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Use window reflectors specifically designed to reflect heat back outside.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Add insulation to keep the heat out.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Use a powered attic ventilator, or attic fan, to regulate the heat level of a building’s attic by clearing out hot air.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Install window air conditioners and insulate around them.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>If you are unable to afford your cooling costs, weatherization or energy-related home repairs, contact the Low Income Home Energy Assistance Program (LIHEAP) for help.</p>
                                </div>
                            </li>
                            

                <div class="section section-3">
                    <h2>Be Safe DURING</h2>
                    <img src="img/featured_illustration_extremeheat_besafe.png" style="width: 35%; height: auto;">
                  
                    <div class="checklist">
                        <ul>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Never leave people or pets in a closed car on a warm day.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>If air conditioning is not available in your home go to a cooling center.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Take cool showers or baths.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Wear loose, lightweight, light-colored clothing.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Use your oven less to help reduce the temperature in your home.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p> If you’re outside, find shade. Wear a hat wide enough to protect your face. </p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p> Drink plenty of fluids to stay hydrated. </p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p> Avoid high-energy activities or work outdoors, during midday heat, if possible. </p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p> Check on family members, older adults and neighbors.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Watch for heat cramps, heat exhaustion and heat stroke.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p> Consider pet safety. If they are outside, make sure they have plenty of cool water and access to comfortable shade. Asphalt and dark pavement can be very hot to your pet’s feet. </p>
                                </div>
                            </li> </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="section section-4">
                    <h2>Summer Break </h2>
                    <p>While the kids are home for the summer, get the whole family prepared.  </p>
                    <img src="img/illustration_firedrill_stopwatch_3.png" style="width: 35%; height: auto;">
                  
                    <div class="checklist">
                        <ul>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Make a family communication plan and include the whole family.  </p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Practice evacuation plans and other emergency procedures with children on a regular basis. </p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Teach kids when and how to call important phone numbers like 9-1-1. </p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Make sure the kids have an emergency contact person and know how to reach them.  </p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Create a family password or phrase to prevent your child from going with a stranger. </p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p> Keep the kids occupied with online emergency preparedness games.   </p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p> Download the free Prepare with Pedro activity book to help kids learn to prepare.   </p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p> Decide on a family meeting place you can go if separated. </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                

                <div class="section section-6">
                    <h3>Associated Content</h3>
                    <ul class="links">
                        <li onclick="window.location.href = 'https://www.ready.gov/sites/default/files/2021-01/ready_extreme-heat_info-sheet.pdf'">Be prepared for extreme heat</li>
                        <li onclick="window.location.href = 'https://www.nhtsa.gov/child-safety/you-can-help-prevent-hot-car-deaths'">Children, Pets and Vehicles (weather.gov)</li>
                        <li onclick="window.location.href = 'https://www.youtube.com/playlist?list=PLs1gMujRSBY2t7JB4VS-AymFwN-6Lvg20'">You Can Help Prevent Hot Car Deaths (NHTSA)</li>
                        <li onclick="window.location.href = 'https://community.fema.gov/ProtectiveActions/s/article/Extreme-Heat'">Protective Actions Research for Extreme Heat</li>
                        <li onclick="window.location.href = 'https://www.weather.gov/safety/heat'">National Weather Service Heat Safety Tips and Resources</li>
                        <li onclick="window.location.href = 'https://www.weather.gov/safety/heat-illness'">National Weather Service - Heat Illnesses</li>
                    </ul>

                </div>

            </div>
        </main>
    </div>
</body>

</html>