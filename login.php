<?php
include "include/header.php";
include "connect.php";
?>

<link rel="stylesheet" href="css/style.css">

<div id="loginbox">
   <form id="loginpage" action="login.php" method="post">
      <h1>Login</h1>

      <input name="email" type="text" class="input" placeholder="Email" required />
      <br>
      <input name="password" type="password" class="input" placeholder="Password" required />
      <br>
      <input name="login" type="submit" class="loginbutton" value="SIGN IN" />

   </form>
   <?php
   if (isset($_POST['login'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];

      // Fetch user data including status
      $query = "SELECT * FROM login WHERE email = '$email' AND password = md5('$password')";
      $query_run = mysqli_query($con, $query);

      if (mysqli_num_rows($query_run) > 0) {
         $user = mysqli_fetch_assoc($query_run);

         if ($user['status'] == 'Verified') {
            // Valid and status is verified
            $_SESSION['email'] = $email;
            header('location: managerview.php');
         } else {
            // Invalid due to unverified status
            echo '<script type="text/javascript"> alert("Your account is not yet verified During Registration Process, Please Register Again")</script>';
         }
      } else {
         // Invalid
         echo '<script type="text/javascript"> alert("Invalid User")</script>';
      }
   }


   mysqli_close($con);
   ?>
   <a href="./registartion.php">Register</a>
   <br><label id="msg">ADMIN LOGIN PAGE</label>
</div>