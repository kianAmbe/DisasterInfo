<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reports</title>
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

    // Fetch data from the "report" table, including the "remarks" column
    $sql = "SELECT * FROM report";

    $result = $conn->query($sql);

    if ($result === false) {
        die("Error: " . $conn->error);
    }

    // Check if there are rows in the result
    if ($result->num_rows > 0) {
        echo "<h2>Reports</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Emergency Type</th><th>Description</th><th>Status</th><th>Remarks</th><th>Report Date and Time</th><th>Actions</th></tr>"; // Added "Submission Datetime" column header
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["user_name"] . "</td>";
            echo "<td>" . $row["emergency_type"] . "</td>";
            echo "<td>" . $row["description"] . "</td>";
            echo "<td>" . $row["status"] . "</td>";
            echo "<td>" . $row["remarks"] . "</td>"; // Display the "remarks" column
            echo "<td>" . $row["submission_datetime"] . "</td>"; // Display the "submission_datetime" column
            echo "<td><a class='delete-button' href='delete_report.php?id=" . $row["id"] . "'><i class='fa-solid fa-trash'></i></a>";
            echo " <a class='edit-button' href='edit_report.php?id=" . $row["id"] . "'><i class='fa-solid fa-pen-to-square'></i></a></td>";
            echo "</tr>";
        }

        echo "</table>";
        
        // Add the "Go to Home" button
        echo "<a href='index.php' class='btn'>Go to Home</a>";
    } else {
        echo "No reports found in the database.";
    }

    // Close the database connection
    $conn->close();
    ?>
    </div>
</body>
</html>








