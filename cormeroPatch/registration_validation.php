<?php
    require 'db_connection.php'; // Include the database configuration file
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/SMTP.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
        $number = $_POST["number"];
        $address = $_POST["address"];

        $validationCode = generateValidationCode();
    if (isDuplicateEmail($conn, $email)) {
        ?>
            <script>
                alert("Email already exists. Please use a different email address.");
                window.location.href = "register.php";
            </script>
        <?php
    } else {
        // Check if the email and validation email are sent successfully
        if (sendValidationEmail($email, $validationCode)) {
            // Send the validation email
            // SQL query to insert user data and validation code into the database
            $sql = "INSERT INTO user (name, email, password, number, address, validation_code) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssss", $username, $email, $password, $number, $address, $validationCode);

            if ($stmt->execute()) {
                // Registration validation
                header("Location: email_validation.php"); // Redirect to the validation page
                exit();
            } else {
                echo "Registration failed. Please try again.";
                // Display any database error message for debugging
                echo "Error: " . $stmt->error;
            }
        }
    }
    }

    // Function to check for duplicate email
    function isDuplicateEmail($conn, $email) {
        $sql = "SELECT email FROM user WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }

    // Function to generate a random 6-digit validation code
    function generateValidationCode() {
        return strval(random_int(100000, 999999));
    }

    // Function to send a validation email
    function sendValidationEmail($email, $validationCode) {
        require 'vendor/autoload.php'; // Include PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'vcormero48@gmail.com'; // Your SMTP username
            $mail->Password = 'raqj smpk limc owbs'; // Your SMTP password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption
            $mail->Port = 587; // Your SMTP server port (e.g., 587 for TLS)

            // Recipients
            $mail->setFrom('vcormero48@gmail.com', 'Vincent Cormero');
            $mail->addAddress($email);

            $validationLink = "http://example.com/email_validation.php?code=$validationCode";
            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Email Validation Code';
            $mail->Body = "DO NOT REPLY. Your validation code is: $validationCode";

            // Send the email
            $mail->send();
            echo 'Registration successful. An email has been sent to ' . $email;
            return true;
        } catch (Exception $e) {
            echo 'Error sending email: ' . $mail->ErrorInfo;
        }
    }
?>
