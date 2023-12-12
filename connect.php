 <?php
   $db['hostname'] = "localhost";
   $db['user'] = "root";
   $db['password'] = "arzelzolina10";
   $db['database'] = "resort";

   $con = mysqli_connect($db['hostname'], $db['user'], $db['password'], $db['database']);

   if (mysqli_connect_errno()) {
      echo "Failed to connect to MYSQL: " . mysqli_connect_error();
   }

   ?>
