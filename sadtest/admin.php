
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <?php
        // Connect to the database
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "db_sad";

        $conn = new mysqli($host, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch data from the "report" table
        $report_sql = "SELECT * FROM report";
        $report_result = $conn->query($report_sql);

        // Fetch data from the "emergency" table
        $emergency_sql = "SELECT name, phone, email FROM emergency";
        $emergency_result = $conn->query($emergency_sql);

        // Display "Reports" table
        echo "<h2>Reports</h2>";
        if ($report_result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>Name</th><th>Emergency Type</th><th>Description</th><th>Status</th><th>Actions</th></tr>";
            while ($row = $report_result->fetch_assoc()) {
                // Display "Report" table rows
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["emergency_type"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "<td><a class='delete-button' href='delete_report.php?id=" . $row["id"] . "'><i class='fa-solid fa-trash'></i></a>";
                echo " <a class='edit-button' href='edit_report.php?id=" . $row["id"] . "'><i class='fa-solid fa-pen-to-square'></i></a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No reports found in the database.";
        }

        // Display "Emergency" table
        echo "<h2>Emergency Contacts</h2>";
        if ($emergency_result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>Contact Name</th><th>Phone Number</th><th>Email</th><th>Actions</th></tr>";
            while ($row = $emergency_result->fetch_assoc()) {
                // Display "Emergency" table rows
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td><a class='delete-button' href='delete_emergency.php?name=" . $row["name"] . "'><i class='fa-solid fa-trash'></i></a>";
                echo " <a class='edit-button' href='edit_emergency.php?name=" . $row["name"] . "'><i class='fa-solid fa-pen-to-square'></i></a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No emergency contacts found in the database.";
        }

        echo "<h2>Add New Emergency Contact</h2>";
        echo "<form method='POST' action='add_emergency.php'>";
        echo "<label for='new_name'>Name:</label>";
        echo "<input type='text' id='new_name' name='new_name' required><br>";
        echo "<label for='new_phone'>Phone:</label>";
        echo "<input type='text' id='new_phone' name='new_phone' required><br>";
        echo "<label for='new_email'>Email:</label>";
        echo "<input type='text' id='new_email' name='new_email' required><br>";
        echo "<input type='submit' value='Add Contact'>";
        echo "</form>";

        // Add the "Go to Home" button
        echo "<a href='index.php' class='btn'>Go to Home</a>";

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>