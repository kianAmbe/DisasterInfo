<?php
include "db_connection.php"; // Include the database configuration file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT id, name, password FROM user WHERE name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($id, $name, $hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        // Login successful
        // You can set up a user session and redirect to a dashboard
    } else {
        // Login failed
        // Handle the error, such as displaying a message to the user
    }

    $stmt->close();
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>

        <form method="post" action="process_login.php">
            <label for="email">Email:</label>
            <input class="login-input" type="text" name="email" id="email" required><br>

            <label for="password">Password:</label>
            <input class="login-input" type="password" name="password" id="password" required>
            <!-- Add a button to toggle password visibility -->
            <button type="button" id="toggle-password">
                <i class="fa-regular fa-eye-slash"></i>
            </button><br>

            <input class="login-button" type="submit" value="Login">
        </form>

        <p>Not registered? <a href="register.php">Register here</a></p>
    </div>

    <script>
        var passwordInput = document.getElementById('password');
        var togglePasswordButton = document.getElementById('toggle-password');

        togglePasswordButton.addEventListener('click', function () {
            if (passwordInput.type === "password") {
                passwordInput.type = "text"; // Show the password
                togglePasswordButton.innerHTML = '<i class="fa-regular fa-eye"></i>'; // Change icon to "eye"
            } else {
                passwordInput.type = "password"; // Hide the password
                togglePasswordButton.innerHTML = '<i class="fa-regular fa-eye-slash"></i>'; // Change icon to "eye-slash"
            }
        });
    </script>
</body>
</html>
