<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>

        <form method="post" action="registration_validation.php">
            <label for="username">Name:</label>
            <input class="register-input" type="text" name="username" id="username" required><br>

    

            <label for="email">Email:</label>
            <input class="register-input" type="email" name="email" id="email" required><br>

            <label for="number">Contact Number:</label>
            <input class="register-input" type="text" name="number" id="number" required><br>

            <label for="address">Address:</label>
            <input class="register-input" type="text" name="address" id="address" required><br>

            <label for="password">Password:</label>
            <input class="register-input" type="password" name="password" id="password" required><br>

            <input class="register-button" type="submit" value="Register">
        </form>

        <p>Already registered? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
