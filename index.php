<?php
include "include/header.php";
include "connect.php";
 ?>
 <link rel="stylesheet" type="text/css" href="style.css">

<center><h1>DURIAN GARDEN RESORT</h1>
   <h2>Along National Highway, Barangay Sulit, Polomolok, South Cotabato, 9504 - PHILIPPINES</h2>
   <img src="img/123.jpg" id="himg">
<br><br><br>


<div class="home">

  <?php

   if (isset($_POST['review'])) {
     //echo '<script type="text/javascript"> alert("review button click")</script>';

     $query = "INSERT INTO rating (star,comnt) VALUES ('".$_POST['star']."','".$_POST['Comment']."')";


     $query_run = mysqli_query ($con,$query);

     if ($query_run) {
         echo '<script type="text/javascript"> alert("Review Submitted")</script>';
     }
     else {
        echo '<script type="text/javascript"> alert("!! ERROR !!")</script>';
     }
   }

mysqli_close($con);

    ?>

      <div id="hdiscrp">
         <article >
            <h2><center>Description</center></h2>
            A short ride from Polomolok Public Market along National Highway bound to Koronadal City, discover a paradise hideaway where luxurious seclusion meets exotic natural beauty.
            The Durian Garden will greet and welcome you by the intense aroma of durian. Durian garden is more than a opportunity to sample the fruit, there is a mini zoo, butterfly house and garden of native flowers.

            Nice place to visit, but be prepared to be greeted by the smell of durian.

         </article>
      </div>

</div>


<div id="hbooknow">
   <center>
      <a href="room.php">Rooms</a>
      <a href="booking.php">Book Now</a>
   </center>
</div>


<?php
include "include/footer.php";
 ?>
