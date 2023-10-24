<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Add Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form method="post" action="login.php">
            <label for="username">Username:</label>
            <input type="text" name="name" required>
            <label for="password">Password:</label>
            <div class="password-container">
                <input type="password" name="password" id="password" required>
                <i class="fas fa-eye-slash toggle-password" id="togglePassword"></i>
            </div>
            <input type="submit" value="Login">
        </form>
    </div>

    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Your database credentials
    $db_host = 'localhost'; // Replace with your database host
    $db_user = 'root';      // Replace with your database username
    $db_pass = '';          // Replace with your database password
    $db_name = 'db_sad';    // Replace with your database name
    $table_name = 'admindb'; // Replace with your table name

    // Establish a database connection
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $conn->real_escape_string($_POST['name']);
    $password = $conn->real_escape_string($_POST['password']);

    // Query to retrieve the password for the given username
    $query = "SELECT password FROM $table_name WHERE name = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];

        // Verify the password
        if (password_verify($password, $storedPassword)) {
            // Redirect to the admin panel or dashboard
            header('Location: admin.php');
            exit();
        } else {
            echo '<p class="error">Invalid credentials. Please try again.</p>';
        }
    } else {
        echo '<p class="error">Invalid credentials. Please try again.</p>';
    }

    // Close the database connection
    $conn->close();
}
?>

<script>
        const passwordField = document.getElementById('password');
        const toggleButton = document.getElementById('togglePassword');
        const toggleIcon = document.querySelector('.toggle-password');

        toggleButton.addEventListener('click', function () {
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            }
        });
    </script>
</body>
</html>


