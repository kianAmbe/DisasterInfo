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
    <title>Pandemic</title>
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
                    <h1>Pandemics</h1>
                    <p>A pandemic is a disease outbreak that spans several countries and affects a large number of people. Pandemics are most often caused by viruses, like Coronavirus Disease 2019 (COVID-19), which can easily spread from person to person. A new virus, like COVID-19, can emerge from anywhere and quickly spread around the world. It is hard to predict when or where the next new pandemic will emerge.</p><br>
                    <b>If a Pandemic is declared:</b>
                    <ul>
                        <li> Wash your hands often with soap and water for at least 20 seconds and try not to touch your eyes, nose or mouth. </li>
                        <li> Keep a distance of at least six feet between yourself and people who are not part of your household. </li>
                        <li>Cover your mouth and nose with a mask when in public. </li>
                        <li> Clean and disinfect high-touch objects and surfaces. </li>
                        <li> Stay at home as much as possible to prevent the spread of disease. </li>
                    </ul>
                </div>

                            

                <div class="section section-2">
                    <h2>ow to Prepare Yourself for a Pandemic</h2>
                    <img src="img/featured_illustration_pandemic_virtualschool.png" style="width: 35%; height: auto;">
                  
                    <div class="checklist">
                        <ul>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p><b>Learn how diseases spread to help protect yourself and others. </b>  Viruses can be spread from person to person, from a non-living object to a person and by people who are infected but don’t have any symptoms.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p><b>Prepare for the possibility of schools, workplaces and community centers being closed. </b>  Investigate and prepare for virtual coordination for school, work (telework) and social activities.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p><b> Gather supplies in case you need to stay home for several days or weeks.</b> Supplies may include cleaning supplies, non-perishable foods, prescriptions and bottled water. Buy supplies slowly to ensure that everyone has the opportunity to buy what they need.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p><b>Create an emergency plan</b>  so that you and your family know what to do and what you will need in case an outbreak happens. Consider how a pandemic may affect your plans for other emergencies.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p><b>Review your health insurance policies</b> to understand what they cover, including telemedicine options.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p> <b>Create password-protected digital copies of important documents </b> Create password-protected digital copies of important documents and store in a safe place. Watch out for scams and fraud. </p>
                                </div>
                            </li>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="section section-3">
                    <h2>Stay Safe During a Pandemic</h2>
                    <p><b>Get vaccinated.</b> Vaccines stimulate your immune system to produce antibodies, so vaccines actually prevent diseases.</p>
                    <img src="img/featured_illustration_pandemic_vaccine_2.png" style="width: 35%; height: auto;">
                  
                    <div class="checklist">
                        <ul>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p><b>Take actions to prevent the spread of disease.</b>  Cover coughs and sneezes. Wear a mask in public. Stay home when sick (except to get medical care). Disinfect surfaces. Wash hands with soap and water for at least 20 seconds. If soap and water are not available, use a hand sanitizer that contains at least 60 percent alcohol. Stay six feet away from people who are not part of your household.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p><b>If you believe you’ve been exposed to the disease </b> , contact your doctor, follow the quarantine instructions from medical providers and monitor your symptoms. If you’re experiencing a medical emergency, call 9-1-1 and shelter in place with a mask, if possible, until help arrives.</p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p><b> Share accurate information about the disease  </b>with friends, family and people on social media. Sharing bad information about the disease or treatments for the disease may have serious health outcomes. Remember that stigma hurts everyone and can cause discrimination against people, places or nations. </p>
                                </div>
                            </li>
                            <li>
                                <div class="main-list">
                                    <img src="img/check-icon.png">
                                    <p><b> Know that it’s normal to feel anxious or stressed.</b>  Engage virtually with your community through video and phone calls. Take care of your body and talk to someone if you are feeling upset.</p>
                                </div>
                            </li>


                        </ul>
                    </div>
                </div>
                

                <div class="section section-6">
                    <h3>Associated Content</h3>
                    <ul class="links">
                        <li onclick="window.location.href = 'https://www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public'">Advice for the public: Coronavirus disease (COVID-19)</li>
                        <li onclick="window.location.href = 'https://www.cdc.gov/coronavirus/2019-ncov/prevent-getting-sick/prevention.html'">How to Protect Yourself and Others</li>
                        <li onclick="window.location.href = 'https://healthmatters.nyp.org/how-to-protect-yourself-from-coronavirus-covid-19/'">Prevent COVID-19: How to Protect Yourself from the Coronavirus</li>
                        
                    </ul>

                </div>

            </div>
        </main>
    </div>
</body>

</html>