<!DOCTYPE html>
<html>
<head>
    <title>Newsletter Sign Up</title>
    <style>
            body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            color: #333;
        }

        form {
            width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="submit"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s ease-in-out;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            outline: none;
            border-color: #57b846;
        }

        input[type="submit"] {
            background-color: #57b846;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        input[type="submit"]:hover {
            background-color: #4ca43d;
        }

        /* Additional styles for the "Go Home" button */
        .go-home-button {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .go-home-button a {
            padding: 8px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease-in-out;
        }

        .go-home-button a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <h1>Sign Up for Newsletter</h1>
    <form method="post" action="process_newsletter_signup.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" value="Sign Up">
    </form>

    <div class="go-home-button">
        <a href="index.php">Go Home</a>
    </div>
</body>
</html>