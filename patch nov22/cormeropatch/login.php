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
        
        /* Style for the "Enter Admin Password" icon */
        .admin-password-button {
            position: fixed;
            bottom: 20px;
            left: 10px;
            font-size: 10px;
            color: #007BFF;
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

            <label for "password">Password:</label>
            <input class="login-input" type="password" name="password" id="password" required>
            <!-- Add a button to toggle password visibility -->
            <button type="button" id="toggle-password">
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
            <button type="button" id="toggle-admin-password">
                <i class="fa-regular fa-eye-slash"></i>
            </button><br>

            <input class="login-button" type="submit" value="Register">
        </form>
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

        function showAdminRegistrationForm() {
            var adminRegistrationForm = document.getElementById('admin-registration');
            adminRegistrationForm.style.display = "block";
        }
    </script>

<button class="admin-password-button" onclick="promptForAdminPassword()">O</button>


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

    function showAdminRegistrationForm() {
        var adminRegistrationForm = document.getElementById('admin-registration');
        adminRegistrationForm.style.display = "block";
    }
    function promptForAdminPassword() {
        var adminPassword = prompt("Enter the admin password:");

        // Make an AJAX request to get the correct admin password
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "get_admin_password.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var correctAdminPassword = xhr.responseText;
                
                if (adminPassword === correctAdminPassword) {
                    window.location.href = "adminlogin.php"; // Redirect to admin login page
                } else {
                    alert("Incorrect password. Access denied.");
                }
            }
        };
        xhr.send();
    }
</script>


</body>
</html>
