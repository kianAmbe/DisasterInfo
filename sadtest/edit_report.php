<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Report</title>
    <link rel="stylesheet" type="text/css" href="edit.css">
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

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
            // Get the report ID from the URL
            $reportId = $_GET["id"];

            // Fetch the report data based on the ID
            $sql = "SELECT * FROM report WHERE id = $reportId";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                // Retrieve the report data
                $row = $result->fetch_assoc();

                // Display a form to edit the report details
                echo "<h2>Edit Report</h2>";
                echo "<form action='update_report.php' method='post'>";
                echo "<input type='hidden' name='id' value='" . $reportId . "'>";
                echo "Name: <input type='text' name='name' value='" . $row["name"] . "'><br>";
                echo "Emergency Type: <input type='text' name='emergency_type' value='" . $row["emergency_type"] . "'><br>";
                echo "Description: <textarea name='description'>" . $row["description"] . "</textarea><br>";
                
                // Add a dropdown select for status
                echo "Status: ";
                echo "<select name='status'>";
                echo "<option value='Pending' " . ($row["status"] === 'Pending' ? 'selected' : '') . ">Pending</option>";
                echo "<option value='In Progress' " . ($row["status"] === 'In Progress' ? 'selected' : '') . ">In Progress</option>";
                echo "<option value='Completed' " . ($row["status"] === 'Completed' ? 'selected' : '') . ">Completed</option>";
                echo "</select><br>";
                
                echo "<button type='submit'>Save Changes</button>";
                echo "</form>";
            } else {
                echo "Report not found.";
            }
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
