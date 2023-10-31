<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Emergency Report Form</title>
    <link rel="stylesheet" type="text/css" href="reportstyle.css">
</head>
<body>
<div class="container">
    <h2>Emergency Report Form</h2>
    <form action="registration_process.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="emergency_type">Type of Emergency:</label>
        <input type="text" id="emergency_type" name="emergency_type" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>

        <button type="submit">Submit Report</button>
    </form>
</div>
</body>
</html>


