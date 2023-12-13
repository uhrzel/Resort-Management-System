<?php

// Connect to database
$con = mysqli_connect("localhost", "root", "arzelzolina10", "resort");


if (isset($_GET['id'])) {


	$db = $_GET['id'];


	$sql = "UPDATE request_room SET
			request_room.status = 1 WHERE request_room.id = '$db' ";


	mysqli_query($con, $sql);
}


header('location: managerview.php');
