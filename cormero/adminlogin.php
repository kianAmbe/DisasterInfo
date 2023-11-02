<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/adminlogin.css">
</head>
<body>
    <div class="container">
        <h2>Admin Login</h2>
        <form method="post" action="adminlogin_process.php">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
