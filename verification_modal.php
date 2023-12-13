<?php
session_start();
include "include/header.php";
include "connect.php"; // Include your database connection file here
require 'vendor/autoload.php'; // Include PHPMailer autoload file

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

?>

<link rel="stylesheet" href="css/style.css">
<div id="regbox">
    <form id="verificationForm" action="verification_modal.php" method="post">
        <h1>Verification</h1>

        <input type="text" name="otp" class="input" placeholder="Enter OTP" required />
        <br>
        <input type="submit" name="verify" class="Verificationbutton" value="Verify" />
    </form>
    <?php
    if (isset($_POST['verify'])) {
        $enteredOTP = $_POST['otp'];

        if ($enteredOTP == $_SESSION['registration_otp']) {
            // Retrieve user email based on session
            $email = $_SESSION['user'];

            // Update status for the user
            $updateStatusQuery = "UPDATE login SET status = 'Verified' WHERE email = ?";
            $stmt = mysqli_prepare($con, $updateStatusQuery);
            mysqli_stmt_bind_param($stmt, "s", $email);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                // Send email notification
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username = 'ojt.rms.group.4@gmail.com';
                    $mail->Password = 'hbpezpowjedwoctl';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587;

                    $mail->setFrom('ojt.rms.group.4@gmail.com', 'Resort Management System');
                    $mail->addAddress($email);

                    $mail->isHTML(true);
                    $mail->Subject = 'Account Verified';
                    $mail->Body = '<html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                color: #333;
            }
            .container {
                max-width: 600px;
                margin: 20px auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            h2 {
                color: #4285f4;
            }
            p {
                margin-bottom: 15px;
            }
            .button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #4285f4;
                color: #fff;
                text-decoration: none;
                border-radius: 3px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Your Account Has Been Verified</h2>
            <p>Congratulations! Your account has been successfully verified. You can now log in and enjoy our services.</p>
            <p>If you have any questions or need further assistance, feel free to contact our support team.</p>
            <p>Thank you for choosing our service!</p>
          
        </div>
    </body>
</html>';


                    $mail->send();

                    // Alert for successful verification
                    echo '<script type="text/javascript"> alert("Verification Successful! You can now login."); window.location.href = "login.php";</script>';
                } catch (Exception $e) {
                    echo '<script type="text/javascript"> alert("Error sending email. Please try again later.")</script>';
                }
            } else {
                echo '<script type="text/javascript"> alert("Error updating status. Please try again.")</script>';
            }
        } else {
            echo '<script type="text/javascript"> alert("Invalid OTP. Please try again."); window.location.href = "verification_modal.php";</script>';
        }
    }
    ?>

</div>

</body>

</html>