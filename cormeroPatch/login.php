<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>

        <?php
        session_start();
        // Check for and display error messages
        if (isset($_SESSION["error_message"]) && !empty($_SESSION["error_message"])) {
            echo '<p class="error-message">' . $_SESSION["error_message"] . '</p>';
            unset($_SESSION["error_message"]); // Clear the error message
        }
        ?>

        <form method="post" action="process_login.php">
            <label for="email">Email:</label>
            <input class="login-input" type="text" name="email" id="email" required><br>

            <label for="password">Password:</label>
            <input class="login-input" type="password" name="password" id="password" required>
            <!-- Add a button to toggle password visibility -->
            <button type="button" id="toggle-password" onclick="togglePassword()">
                <i class="fa-regular fa-eye-slash"></i>
            </button><br>

            <input class="login-button" type="submit" value="Login">
        </form>

        <p>Not registered? <a href="register.php">Register here</a></p>
    </div>

    <!-- Add the admin icon as an anchor element with an icon inside it -->
    <a href="javascript:void(0);" class="admin-icon" onclick="showAdminRegistrationForm()">
        <i class="fa-solid fa-user-shield" style="font-size: 24px; color: white;"></i>
    </a>

    <div id="admin-registration" style="display: none;">
        <h2>Admin Registration</h2>
        <form method="post" action="process_admin_registration.php">
            <label for="admin-name">Name:</label>
            <input class="login-input" type="text" name="admin-name" id="admin-name" required><br>

            <label for="admin-email">Email:</label>
            <input class="login-input" type="email" name="admin-email" id="admin-email" required><br>

            <label for="admin-password">Password:</label>
            <input class="login-input" type="password" name="admin-password" id="admin-password" required>
            <!-- Add a button to toggle password visibility -->
            <button type="button" id="toggle-admin-password" onclick="toggleAdminPassword()">
                <i class="fa-regular fa-eye-slash"></i>
            </button><br>

            <input class="login-button" type="submit" value="Register">
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.querySelector('#toggle-password i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            }
        }

        function toggleAdminPassword() {
            const adminPasswordInput = document.getElementById('admin-password');
            const eyeIcon = document.querySelector('#toggle-admin-password i');

            if (adminPasswordInput.type === 'password') {
                adminPasswordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            } else {
                adminPasswordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            }
        }
    </script>
</body>
</html>

