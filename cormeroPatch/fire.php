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
    <title>Fire</title>
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
            <li><i class=""></i><a href="volunteer.php">Get Involved</a></li>
        <li><i class=""></i><a href="index.php">Emergency Contacts</a></li>
            </ul>
            <div class="buttons-right">
    <a href="logout.php" class="logout-button" onclick="return confirm('Are you sure you want to log out?')">Logout</a>
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
                    <h1>Fires</h1>
                    <p>In a matter of minutes, the peril posed by a fire intensifies exponentially. Within a mere two minutes, a seemingly innocuous flame can swiftly transform into a life-threatening inferno, escalating the urgency for immediate action. The relentless speed at which a residence can become engulfed in flames underscores the critical importance of preparedness and rapid response. In just five minutes, a home, once a sanctuary, can succumb to the devastating embrace of fire. This stark reality emphasizes the imperative for proactive measures in fire prevention, early detection through systems like smoke alarms, and the swift execution of evacuation plans. Fire safety awareness and a commitment to minimizing risks are paramount, serving as crucial safeguards against the potentially catastrophic consequences of a rapidly spreading fire.</p>
    <h2>Learn About Fires</h2>
    <ul>
        <li><b>Fire is FAST!</b> In less than 30 seconds a small flame can turn into a major fire. It only takes minutes for thick black smoke to fill a house or for it to be engulfed in flames.</li>
        <li><b>Fire is HOT!</b> Heat is more threatening than flames. Room temperatures in a fire can be 100 degrees at floor level and rise to 600 degrees at eye level. Inhaling this super-hot air will scorch your lungs and melt clothes to your skin.</li>
        <li><b>Fire is DARK!</b> Fire starts bright, but quickly produces black smoke and complete darkness.</b></li>
        <li><b>Fire is DEADLY!</b> Smoke and toxic gases kill more people than flames do. Fire produces poisonous gases that make you disoriented and drowsy.</li>
    </ul>  
    <h3>Smoke Alarms</h3>
    <p>A working smoke alarm significantly increases your chances of surviving a deadly home fire.</p>
    <ul>
        <li>Replace batteries twice a year, unless you are using 10-year lithium batteries.</li>
        <li>Install smoke alarms on every level of your home, including the basement.</li>
        <li>Replace the entire smoke alarm unit every 10 years or according to manufacturer’s instructions.</b></li>
        <li>Never disable a smoke alarm while cooking – it can be a deadly mistake.</li>
        <li>Audible alarms are available for visually impaired people and smoke alarms with a vibrating pad or flashing light are available for the hearing impaired.</li>
    </ul>    
    <h2>Before a Fire</h2>
                    <p>If you are insured, contact your insurance company for detailed instructions on protecting your property, conducting inventory and contacting fire damage restoration companies.</p>    
                           
 </div>             
 </div>


                <div class="section section-2">
                <h3> Create and Practice a Fire Escape Plan</h3>
                    <img src="img/illustration_firedrill_stopwatch_3.png" style="width: 35%; height: auto;">
                    <p>Remember that every second counts in the event of a fire. Escape plans help you get out of your home quickly. Practice your home fire escape plan twice each year. Some tips to consider when preparing this plan include:</p>
                    <div class="checklist">
                    <ul>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Find two ways to get out of each room in the event the primary way is blocked by fire or smoke.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Make sure that windows are not stuck, screens can be taken out quickly and that security bars can be properly opened.</b></p>
                                </div>
                                </li>
                                <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Teach children not to hide from firefighters.</p>
                                </div>
                                </li>
                                <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>If you use a walker or wheelchair, check all exits to be sure you can get through the doorways.</p>
                                </div>
                            </li>
                            </ul>

                            <div class="section section-3">
                    <div class="checklist">
                    <h3> Fire Safety Tips</h3 >
                    <ul>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Make digital copies of valuable documents and records like birth certificate</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Sleep with your bedroom door closed.</b></p>
                                </div>
                                </li>
                                <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Keep a fire extinguisher in your kitchen. Contact your local fire department for assistance on proper use and maintenance.</p>
                                </div>
                                </li>
                                <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Consider installing an automatic fire sprinkler system in your residence.</p>
                                </div>
                            </li>
                            </ul>

                    </div>  
                    </div>
                </div>
                    <div class="section section-4">
                    <h2>During a Fire</h2>
                    <img src="img/illustration_firedrill_smoke.png" style="width: 35%; height: auto;">
                  
                    <div class="checklist">
                        <ul>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Drop down to the floor and crawl low, under any smoke to your exit. Heavy smoke and poisonous gases collect first along the ceiling.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Before opening a door, feel the doorknob and door. If either is hot, or if there is smoke coming around the door, leave the door closed and use your second way out.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>LIf you open a door, open it slowly. Be ready to shut it quickly if heavy smoke or fire is present.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>If you can’t get to someone needing assistance, leave the home and call 9-1-1 or the fire department. Tell the emergency operator where the person is located.</b></p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>If pets are trapped inside your home, tell firefighters right away.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p> If you can’t get out, close the door and cover vents and cracks around doors with cloth or tape to keep smoke out. Call 9-1-1 or your fire department. Say where you are and signal for help at the window with a light-colored cloth or a flashlight.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>If your clothes catch fire, stop, drop and roll – stop immediately, drop to the ground and cover your face with your hands. Roll over and over or back and forth until the fire is out. If you or someone else cannot <b>stop, drop and roll</b>, smother the flames with a blanket or towel. Use cool water to treat the burn immediately for three to five minutes. Cover with a clean, dry cloth. Get medical help right away by calling 9-1-1 or the fire department.</p>
                                </div>
                            </li>
                           
                        </ul>
                    </div>
                </div>

                <div>
                    <div class="section section-5">
                    <h2>After a Fire</h2>

                  
                    <div class="checklist">
                        <ul>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Contact your local disaster relief service, such as The Red Cross, if you need temporary housing, food and medicines.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Check with the fire department to make sure your residence is safe to enter.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>DO NOT attempt to reconnect utilities yourself. The fire department should make sure that utilities are either safe to use or are disconnected before they leave the site. </p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Conduct an inventory of damaged property and items. Do not throw away any damaged goods until after you make the inventory of your items.</b></p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p>Begin saving receipts for any money you spend related to fire loss. The receipts may be needed later by the insurance company and for verifying losses claimed on your income tax.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p> Notify your mortgage company of the fire.</p>
                                </div>
                            </li>
                           
                        </ul>
                    </div>
                </div>

                

                <div class="section section-6">
                    <h3>Associated Contents</h3>
                    <h4>Videos</h4>
                    <ul class="links">
                        <li onclick="window.location.href = 'https://www.redcross.org/get-help/how-to-prepare-for-emergencies/types-of-emergencies/fire.html#:~:text=Top%20Tips%20for%20Fire%20Safety&text=Talk%20with%20all%20family%20members,inside%20for%20anything%20or%20anyone.'">Fire Safety Tips</li>
                    </ul>

        

                </div>

            </div>
        </main>
    </div>
</body>

</html>