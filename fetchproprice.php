<?php 
    include("connection.php");
    $pro_id = $_POST["pro_id"];
    $query = mysqli_query($con,"SELECT * FROM product WHERE pid='$pro_id'");
    $record = "";    
    $f = mysqli_fetch_array($query);
    $record .= "<p>$f[2]</p>";
         
    
    echo $record;
?>