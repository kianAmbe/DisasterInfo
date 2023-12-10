<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Emergency Response Workshops</title>
    <style>
        /* CSS styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .header {
            background-color: #e74c3c;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        h1 {
            margin-top: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .form-container {
            margin-top: 20px;
        }
        .form-container input,
        .form-container button {
            padding: 10px;
            margin: 5px;
        }
        .home-button {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
        .home-button a {
            text-decoration: none;
            padding: 8px 16px;
            background-color: #e74c3c;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .home-button a:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
<div class="container">
        <table>
        <thead>
                <tr>
                 
                </tr>
            </thead>
            <tbody>
            <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_sad";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch activities from the activities_table where event_number = 20
$sql = "SELECT id, host, description, datetime, participants FROM activities WHERE event_number = 50";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Host</th>
                    <th>Description</th>
                    <th>Date & Time</th>
                    <th>Participants</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["host"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";
                echo "<td>" . $row["datetime"] . "</td>";
                echo "<td>" . $row["participants"] . "</td>";
                
                // Get the current page URL for referrer
                $referrer = $_SERVER['PHP_SELF'];
        
                // Adding event_number and referrer as hidden input fields in the form
                echo "<td><form method='post' action='join_activity.php'>";
                echo "<input type='hidden' name='activity_id' value='" . $row["id"] . "'>";
                echo "<input type='hidden' name='referrer' value='" . $referrer . "'>"; // Include the referrer
                echo "<button type='submit'>Join</button></form></td>";
                
                echo "</tr>";
            }
            
            echo "</tbody></table>";
            
        } else {
            echo "No activities found with event_number = 50";
        }

// Close database connection
$conn->close();
?>


            </tbody>
        </table>

        <!-- Form for creating a new activity -->
        <div class="form-container">
    <form method="post" action="process_activity.php">
        <input type="hidden" name="event_type" value="ert"> <!-- Ensure this value is set -->
        <input type="text" name="host" placeholder="Host" required>
        <input type="text" name="description" placeholder="Description (with location)" required>
        <input type="datetime-local" name="datetime" required>
        <button type="submit">Create Activity</button>
    </form>
</div>
    </div>

    <div class="home-button">
            <a href="index2.php">Go Home</a>
        </div>
</body>
</html>

