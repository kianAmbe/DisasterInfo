<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Emergency Report Form</title>
    <link rel="stylesheet" type="text/css" href="reportstyle.css">
    <style>
        /* Style the container for the form and buttons */
        .form-container {
            text-align: center;
            margin-top: 20px;
        }

        /* Style the buttons */
        .submit-button, .go-to-index-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
        }

        /* Style the margin between buttons */
        .button-margin {
            margin-left: 10px; /* Adjust the margin as needed */
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Emergency Report Form</h2>
    <form action="process_report.php" method="post" enctype="multipart/form-data">
        <label for="emergency_type">Type of Emergency:</label>
        <input type="text" id="emergency_type" name="emergency_type" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>

        <button class="submit-button" type="submit">Submit Report</button>
        <button class="go-to-index-button button-margin" onclick="redirectToIndexPage()">Go Home</button>
    </form>
</div>

<script>
    function redirectToIndexPage() {
        // Redirect the user to index.php
        window.location.href = "index.php";
    }
</script>
</body>
</html>
