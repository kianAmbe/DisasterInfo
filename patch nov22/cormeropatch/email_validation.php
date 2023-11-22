<?php
include "db_connection.php"; // Include the database configuration file
?>

<!DOCTYPE html>
<html>
<head>
    <title>Email Validation</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
    <div class="register-container">
        <h2>Email Validation</h2>

        <form method="post" action="email_validation.php">
            <label for="validation_code">Validation Code:</label>
            <input type="text" id="validation_code" name="validation_code" required>
            <input type="submit" value="Validate">
        </form>

        <?php
        // Initialize variables
        $conn = null;
        $email = null;

        // Check if the validation code is provided in the form
        if (isset($_POST['validation_code'])) {
            $validationCode = $_POST['validation_code'];

            // Validate the code against the database
            $conn = new mysqli("localhost", "root", "", "db_sad"); // Replace with your credentials
           
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT email FROM user WHERE validation_code = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $validationCode);
            $stmt->execute();
            $stmt->bind_result($email);

            if ($stmt->fetch()) {
                // Code matches, email is validated
                echo "Email validated successfully. You can now <a href='login.php'>LOGIN</a>.";
            } else {
                // Code does not match, show an error message
                echo "Incorrect validation code. Please try again.";
            }

            // Close the database connection
            $stmt->close();
            $conn->close();
        }
        ?>

    </div>
</body>
</html>
