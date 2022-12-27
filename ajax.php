<?php
include("connection.php");
$id = $_GET['class'];
$a = mysqli_query($con,"select price from product where pid = '$id'");
$data = mysqli_fetch_array($q);



?>