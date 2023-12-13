<?php
session_start();
include "include/header.php";
include "connect.php";
require 'vendor/autoload.php'; // Include PHPMailer autoload file

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

?>

<link rel="stylesheet" href="css/style.css">
<div id="regbox">

   <form id="registrationpage" action="registartion.php" method="post">
      <h1>Registration</h1>

      <input type="text" name="fname" class="input" placeholder="First Name" />
      <br>
      <input type="text" name="lname" class="input" placeholder="Last Name" required />
      <br>
      <input type="text" name="email" class="input" placeholder="Email" required />
      <br>
      <input type="password" name="password" class="input" placeholder="Password" required />
      <br>
      <input type="password" name="cpassword" class="input" placeholder="Re-enter Password" required />
      <br>
      <input type="submit" name="signup" class="Registrationbutton" value="Submit" />
   </form>

   <?php
   if (isset($_POST['signup'])) {

      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $cpassword = $_POST['cpassword'];
      $status = "Not Verified";

      if ($password == $cpassword) {
         $query = "SELECT * FROM manager WHERE email = '$email' ";

         $query_run = mysqli_query($con, $query);

         if (mysqli_num_rows($query_run) > 0) {
            echo '<script type="text/javascript"> alert("User Exists !!")</script>';
         } else {
            $query1 = "INSERT INTO manager (First_name,Last_name,email,password)
                     VALUES ('" . $_POST['fname'] . "','" . $_POST['lname'] . "','" . $_POST['email'] . "','" . md5($_POST['password']) . "')";
            $query2 = "INSERT INTO login (email, password, status) VALUES ('" . $_POST['email'] . "','" . md5($_POST['password']) . "', '$status')";
            $query_run = mysqli_query($con, $query1) && mysqli_query($con, $query2);

            if ($query_run) {
               $otp = rand(100000, 999999);

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
                  $mail->addAddress($_POST['email']);

                  $mail->isHTML(true);
                  $mail->Subject = 'OTP Verification';
                  $mail->Body = '<html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                color: #333;
                margin: 0;
                padding: 0;
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
            .otp {
                background-color: #4285f4;
                color: #fff;
                padding: 10px;
                border-radius: 3px;
                font-size: 18px;
                font-weight: bold;
                display: inline-block;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>OTP Verification</h2>
            <p>Thank you for registering with us! To complete your registration, please use the following OTP:</p>
            <span class="otp">' . $otp . '</span>
            <p>This OTP is valid for a limited time. Please do not share it with others for security reasons.</p>
            <p>If you did not request this OTP, please ignore this message.</p>
            <p>Thank you for choosing our service!</p>
        </div>
    </body>
</html>';


                  $mail->send();
                  $_SESSION['user'] = $_POST['email'];
                  $_SESSION['registration_otp'] = $otp;

                  echo '<script type="text/javascript"> 
                     alert("Member Add Successfully, Please Verify your Account");
                     window.location.href = "verification_modal.php";
                  </script>';
               } catch (Exception $e) {
                  echo '<script type="text/javascript"> alert("Error sending OTP. Please try again later.")</script>';
               }
            } else {
               echo '<script type="text/javascript"> alert("!! Error !!")</script>';
            }
         }
      } else {
         echo '<script type="text/javascript"> alert("Please Enter Values !!")</script>';
      }
   }

   mysqli_close($con);

   ?>
   <a href="login.php">Back to Login</a>
   <br><label id="msg">Admin Registration Page</label>
</div>

</body>

</html>