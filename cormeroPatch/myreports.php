<?php
session_start();
include 'db_connection.php'; // Include your database connection file

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>My Reports</title>
    <link rel="stylesheet" type="text/css" href="css/myreports.css">
    <style>
        /* Style the container div for the button */
        .button-container {
            text-align: center; /* Center-align the button */
            margin-top: 20px; /* Adjust the top margin as needed */
        }

        /* Style the button */
        .go-to-index-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
    <h2>Reports for <span style="color: red; font-weight: bold;"><?php echo $_SESSION["user_name"]; ?></span></h2>


        <?php
        // Get the user's ID from the session
     

        // Query to fetch the user's reports
        $sql = "SELECT emergency_type, description, status,remarks, submission_datetime FROM report WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Emergency Type</th><th>Description</th><th>Status</th><th>Remarks</th><th>Submission Date and Time</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["emergency_type"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "<td>" . $row["remarks"] . "</td>";
                echo "<td>" . $row["submission_datetime"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No reports found.";
        }

        $stmt->close();
        ?>
    </div>
        
    <div class="legend">
    <h3>Legend</h3>
    <table>
        <tr>
            <td><span class="status-icon status-pending"></span></td>
            <td>Pending</td>
            <td>Waiting to contact local authorities</td>
        </tr>
        <tr>
            <td><span class="status-icon status-in-progress"></span></td>
            <td>In Progress</td>
            <td>Local Authorities Contacted</td>
        </tr>
        <tr>
            <td><span class="status-icon status-completed"></span></td>
            <td>Completed</td>
            <td>Issue Resolved</td>
        </tr>
    </table>
</div>




    <div class="button-container">
        <button class="go-to-index-button" onclick="redirectToIndexPage()">Go Home</button>
    </div>

    <script>
        function redirectToIndexPage() {
            // Redirect the user to index.php
            window.location.href = "index2.php";
        }
    </script>



</body>
</html>



