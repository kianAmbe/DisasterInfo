<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <style>
        /* Add custom CSS for the admin icon */
        .admin-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            cursor: pointer;
        }
    </style>
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

    <!-- Add the admin icon -->
    <a href="adminlogin.php" class="admin-icon" onclick="promptForAdminPassword()">
        <i class="fa-solid fa-user-secret"></i>
    </a>

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

        function promptForAdminPassword() {
            // Prompt the user for the admin password
            var adminPassword = prompt("");

            if (adminPassword === "admin") {
                // If the admin password is correct, proceed to adminlogin.php
                window.location.href = "adminlogin.php";
            } else {
                alert("Access denied.");
                window.location.href = "login.php";
                alert("Incorrect admin password. Access denied.");
              
            }
        }
    </script>
</body>
</html>
