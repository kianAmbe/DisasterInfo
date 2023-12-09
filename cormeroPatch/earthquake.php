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
    <title>Earthquakes</title>
    <link rel="stylesheet" href="disaster.css">
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
        <link rel="stylesheet" type="text/css" href="disaster.css">
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
                    <h1>Earthquakes</h1>
                    <p>An earthquake is a sudden, rapid shaking of the ground caused by the shifting of rocks deep underneath the earth’s surface. Earthquakes can cause fires, tsunamis, landslides or avalanches. While they can happen anywhere without warning, areas at higher risk for earthquakes include Alaska, California, Hawaii, Oregon, Puerto Rico, Washington and the entire Mississippi River Valley.</p>
                </div>

                <div class="section section-2">
                    <h2>Prepare Before an Earthquake</h2>
                    <div class="sub-heading">
                        <img src="img/icon_plan.png">
                        <h3>The best time to prepare for any disaster is before it happens.</h3>
                    </div>
                    <div class="checklist">
                        <ul>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Practice <span>Drop, Cover, and Hold</span> On with family and coworkers.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p><b>Make an Emergency Plan:</b> Create a family emergency communications plan that has an out-of-state contact. Plan where to meet if you get separated. Make a supply kit that includes enough food and water for several days, a flashlight, a fire extinguisher and a whistle..</p>
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

                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p><b>Protect Your Home:</b> Secure heavy items in your home like bookcases, refrigerators, water heaters, televisions and objects that hang on walls. Store heavy and breakable objects on low shelves.</p>
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
                    <h2>Prepare Before an Earthquake</h2>
                    <div class="sub-heading">
                        <img src="img/icon_earthquake.png">
                        <h3>The best time to prepare for any disaster is before it happens.</h3>
                    </div>
                    <div class="checklist">
                        <ul>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>If you are in a car, pull over and stop. Set your parking brake.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>If you are in bed, turn face down and cover your head and neck with a pillow.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>If you are outdoors, stay outdoors away from buildings.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>If you are inside, stay and do not run outside and avoid doorways.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="section-4">
                    <h3>Preparing for a Flood</h3>
                    <div class="illustration">
                        <img src="img/illustration_earthquake_drop-cover-hold-on_0.png" alt="">
                    </div>
                    <div class="explaination">
                        <div class="block">
                            <h3>1. Drop (or Lock)</h3>
                            <p>Wherever you are, drop down to your hands and knees and hold onto something sturdy. If you’re using a wheelchair or walker with a seat, make sure your wheels are locked and remain seated until the shaking stops.</p>
                        </div>
                        <div class="block">
                            <h3>2. Cover</h3>
                            <p>Cover your head and neck with your arms. If a sturdy table or desk is nearby, crawl underneath it for shelter. If no shelter is nearby, crawl next to an interior wall (away from windows). Crawl only if you can reach better cover without going through an area with more debris. Stay on your knees or bent over to protect vital organs.</p>
                        </div>
                        <div class="block">
                            <h3>3. Hold On</h3>
                            <p>If you are under a table or desk, hold on with one hand and be ready to move with it if it moves. If seated and unable to drop to the floor, bend forward, cover your head with your arms and hold on to your neck with both hands.</p>
                        </div>
                    </div>
                    <h3>Using Cane?</h3>
                    <div class="illustration">
                        <img src="img/illustration_earthquake_cane.png" alt="">
                    </div>
                    <h3>Using a Walker?</h3>
                    <div class="illustration">
                        <img src="img/illustration_earthquake_walker.png" alt="">
                    </div>
                    <h3>Using a Wheelchair?</h3>
                    <div class="illustration">
                        <img src="img/illustration_earthquake_wheelchair.png" alt="">
                    </div>
                </div>

                <div class="section section-5">
                    <h2>Stay Safe After</h2>
                    <div class="sub-heading">
                        <img src="img/icon_alert_0.png">
                        <h3>There can be serious hazards after an earthquake, such as damage to the building, leaking gas and water lines, or downed power lines.</h3>
                    </div>
                    <div class="checklist">
                        <ul>

                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Expect aftershocks to follow the main shock of an earthquake. Be ready to Drop, Cover, and Hold On if you feel an aftershock.</p>
                                </div>
                            </li>

                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>If you are in a damaged building, go outside and quickly move away from the building. Do not enter damaged buildings.</p>
                                </div>
                            </li>

                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p><b>If you are trapped, send a text or bang on a pipe or wall.</b> Cover your mouth with your shirt for protection and instead of shouting, use a whistle..</p>
                                </div>
                            </li>

                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>If you are in an area that may experience tsunamis, go inland or to higher ground immediately after the shaking stops. Avoid contact with floodwaters as they can contain chemicals, sewage, and debris.</p>
                                </div>
                            </li>

                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Check yourself to see if you are hurt and help others if you have training.</p>
                                </div>

                                <ul class="inner-list">
                                    <li>
                                        <img src="img/check-icon-white.png">
                                        <p>If you are sick or injured and need medical attention, contact your healthcare provider for instructions. If you are experiencing a medical emergency, call 9-1-1.</p>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="section section-6">
                    <div class="sub-heading">
                        <img src="img/icon_alert_0.png">
                        <h3>Once you are safe, pay attention to local news reports for emergency information and instructions via battery-operated radio, TV, social media or from cell phone text alerts.</h3>
                    </div>
                    <div class="checklist">
                        <ul>

                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Register on the American Red Cross “Safe and Well” website so people will know you are okay.</p>
                                </div>
                            </li>

                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Use text messages to communicate, which may be more reliable than phone calls.</p>
                                </div>
                            </li>

                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Be careful when cleaning up. Wear protective clothing, including a long-sleeved shirt, long pants, work gloves and sturdy thick-soled shoes. Do not try to remove heavy debris by yourself. Use an appropriate mask if cleaning mold or other debris. People with asthma and other lung conditions and/or immune suppression should not enter buildings with indoor water leaks or mold growth that can be seen or smelled. Children should not take part in disaster cleanup work.</p>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="section section-7">
                    <h3>Additional Resoures</h3>
                    <h4>Videos</h4>
                    <ul class="links">
                        <li onclick="window.location.href = 'https://youtu.be/MKILThtPxQs'">When the Earth Shakes</li>
                        <li onclick="window.location.href = 'https://www.youtube.com/watch?v=Z4suAKDcaCU'">Earthquake Preparedness: How to Stay Safe</li>
                        <li onclick="window.location.href = 'https://www.youtube.com/playlist?list=PLs1gMujRSBY2t7JB4VS-AymFwN-6Lvg20'">Earthquake Safety Video Series (Great ShakeOut Earthquake Drills)</li>
                        <li onclick="window.location.href = 'https://www.youtube.com/watch?v=qw15T1z1AJo'">Pablo y Paola Terremoto</li>
                    </ul>

                    <h4>Tip Sheets</h4>
                    <ul class="links">
                        <li onclick="window.location.href = 'https://www.fema.gov/sites/default/files/2020-08/fema_earthquakes_fema-p-530-earthquake-safety-at-home-march-2020.pdf'">Earthquake Safety at Home (PDF)</li>
                        <li onclick="window.location.href = 'https://www.earthquakecountry.org/disability/'">Resources for People With Disabilities (Earthquake Country Alliance)</li>
                    </ul>

                    <h4>More Information</h4>
                    <ul class="links">
                        <li onclick="window.location.href = 'https://www.shakeout.org/'">The Great ShakeOut: Earthquake Drills</li>
                        <li onclick="window.location.href = 'https://earthquake.usgs.gov/'">U.S. Geological Survey Earthquake Hazards Program</li>
                        <li onclick="window.location.href = 'http://www.redcross.org/prepare/disaster/earthquake'">American Red Cross</li>
                        <li onclick="window.location.href = 'http://www.earthquakecountry.info/'">Earthquake Country Alliance</li>
                        <li onclick="window.location.href = 'http://www.nsf.gov/'">National Science Foundation</li>
                        <li onclick="window.location.href = 'http://www.nist.gov/'">National Institute of Standards and Technology</li>
                        <li onclick="window.location.href = 'https://community.fema.gov/ProtectiveActions/s/article/Earthquake'">Protective Actions Research for Earthquake</li>
                    </ul>

                </div>

            </div>
        </main>
    </div>
</body>

</html>