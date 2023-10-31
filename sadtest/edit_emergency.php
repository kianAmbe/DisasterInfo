<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Emergency Contact</title>
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

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["name"])) {
            // Get the contact name from the URL
            $contactName = $_GET["name"];

            // Fetch the contact data based on the name
            $sql = "SELECT * FROM emergency WHERE name = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $contactName);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                // Retrieve the contact data
                $row = $result->fetch_assoc();

                // Display a form to edit the contact details
                echo "<h2>Edit Emergency Contact</h2>";
                echo "<form action='update_emergency.php' method='post'>";
                echo "<input type='hidden' name='current_name' value='" . $contactName . "'>";
                echo "Name: <input type='text' name='name' value='" . $row["name"] . "'><br>";
                echo "Phone: <input type='text' name='phone' value='" . $row["phone"] . "'><br>";
                echo "Email: <input type='text' name='email' value='" . $row["email"] . "'><br>";
                echo "<button type='submit'>Save Changes</button>";
                echo "</form>";
            } else {
                echo "Contact not found.";
            }
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
