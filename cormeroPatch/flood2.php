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
    <title>Floods</title>
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
                <li><i class=""></i><a href="#get-involved">Get Involved</a></li>
                <li><i class=""></i><a href="#emergency-contacts">Emergency Contacts</a></li>
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
                    <h1>Floods</h1>
                    <p>Flooding is a temporary overflow of water onto land that is normally dry. Floods are the most common disaster in the United States. Failing to evacuate flooded areas or entering flood waters can lead to injury or death.</p>
    <p>Floods may:</p>
    <ul>
        <li>Result from rain, snow, coastal storms, storm surges, and overflows of dams and other water systems.</li>
        <li>Develop slowly or quickly. Flash floods can come with no warning.</li>
        <li>Cause outages, disrupt transportation, damage buildings, and create landslides.</li>
    </ul>                </div>

               <div class="section section-2">
                    <h2> If you are under a flood warning:</h2>
                    <img src="img/featured_illustration_floods_warning.png" style="width: 35%; height: auto;">
                    <div class="checklist">
                    <ul>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Find safe shelter right away.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Do not walk, swim or drive through flood waters.<b> Turn Around, Don’t Drown!</b></p>
                                </div>
                                </li>
                                <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Stay off bridges over fast-moving water.</p>
                                </div>
                                </li>
                                <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Remember, just six inches of moving water can knock you down, and one foot of moving water can sweep your vehicle away.</p>
                                </div>
                                </li>
                                <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Stay off bridges over fast-moving water.</p>
                                </div>
                                </li>

                                <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Depending on the type of flooding:</b></p>
                                </div>
                                <ul class="inner-list">
                                    <li>
                                        <img src="img/check-icon-white.png">
                                        <p>Being prepared allows you to avoid unnecessary excursions and to address minor medical issues at home, alleviating the burden on urgent care centers and hospitals.</p>
                                    </li>
                                    <li>
                                        <img src="img/check-icon-white.png" alt="">
                                        <p>Remember that not everyone can afford to respond by stocking up on necessities. For those who can afford it, make essential purchases and slowly build up supplies.</p>
                                    </li>
                                </ul>
                            </li>

                            </ul>

                    </div>
                </div>

                <div class="section section-3">
                
                    <h3>Preparing for a Flood</h3>
                    <div class="explaination">
                        <div class="block">
                            <h3>Getting Prepared for a Flood</h3>
                            <p>Make a plan for your household, including your pets, so that you and your family know what to do, where to go, and what you will need to protect yourselves from flooding. Learn and practice evacuation routes, shelter plans, and flash flood response. Gather supplies, including non-perishable foods, cleaning supplies, and water for several days, in case you must leave immediately or if services are cut off in your area.</p>
                        </div>
                        <div class="block">
                            <h3>In Case of Emergency</h3>
                            <p>Keep important documents in a waterproof container. Create password-protected digital copies. Protect your property. Move valuables to higher levels. Declutter drains and gutters. Install check valves. Consider a sump pump with a battery.</p>
                        </div>
                    </div>
               
                    <div class="section section-4">
                    <h2>Staying Safe During a Flood</h2>
                    <img src="img/featured_illustration_flood_turnaound.png" style="width: 35%; height: auto;">
                  
                    <div class="checklist">
                        <ul>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Evacuate immediately, if told to evacuate. Never drive around barricades. Local responders use them to safely direct traffic out of flooded areas.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Contact your healthcare provider If you are sick and need medical attention. Wait for further care instructions and shelter in place, if possible. If you are experiencing a medical emergency, call 9-1-1.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Listen to Radio or local alerting systems for current emergency information and instructions regarding flooding.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Do not walk, swim or drive through flood waters. <b>Turn Around. Don’t Drown!</b></p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Stay inside your car if it is trapped in rapidly moving water. Get on the roof if water is rising inside the car.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p> Get to the highest level if trapped in a building. Only get on the roof if necessary and once there signal for help. Do not climb into a closed attic to avoid getting trapped by rising floodwater. </p>
                                </div>
                            </li>
                           
                        </ul>
                    </div>
                </div>


                <div class="Staying Safe After a Flood">
                    <h2>Staying Safe During a Flood</h2>
                    <img src="img/featured_illustration_flood_cleanup (1).png" style="width: 35%; height: auto;">
                  
                    <div class="checklist">
                        <ul>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Pay attention to authorities for information and instructions. Return home only when authorities say it is safe.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Avoid driving except in emergencies.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Wear heavy work gloves, protective clothing and boots during clean up and use appropriate face coverings or masks if cleaning mold or other debris. </p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>People with asthma and other lung conditions and/or immune suppression should not enter buildings with indoor water leaks or mold growth that can be seen or smelled. Children should not take part in disaster cleanup work.</b></p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Be aware that snakes and other animals may be in your house.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p> Be aware of the risk of electrocution. Do not touch electrical equipment if it is wet or if you are standing in water. Turn off the electricity to prevent electric shock if it is safe to do so.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p> Avoid wading in floodwater, which can be contaminated and contain dangerous debris. Underground or downed power lines can also electrically charge the water.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p> Use a generator or other gasoline-powered machinery ONLY outdoors and away from windows.</p>
                                </div>
                            </li>
                           
                        </ul>
                    </div>
                </div>

                <div class="section section-6">
                    <h3>Associated Contents</h3>
                    <h4>Videos</h4>
                    <ul class="links">
                        <li onclick="window.location.href = 'https://community.fema.gov/ProtectiveActions/s/article/Flood'">Protective Actions Research for Flood</li>
                        <li onclick="window.location.href = 'https://www.weather.gov/wrn/spring2017-flood-sm'">National Weather Service Weather Ready Nation Spring Safety Outreach Materials</li>
                        <li onclick="window.location.href = 'https://www.youtube.com/watch?v=0zCl5MuiOu4'">Six Things to Know Before a Disaster (Video)</li>
                        <li onclick="window.location.href = 'https://www.youtube.com/watch?v=LmCnXWN0Dwc'">When the Cloud Forms (Video)</li>
                        <li onclick="window.location.href = 'https://www.pagasa.dost.gov.ph/learning-tools/floods'">WHEN WARNED OF FLOOD</li>
                    </ul>

        

                </div>

            </div>
        </main>
    </div>
</body>

</html>