<?php
session_start();
include "db.php";
$msg = $_GET["msg"];
$phone = $_SESSION["phone"];
// $time =$_GET["time"];
// $sql="INSERT INTO `msg`(`phone`, `msg`, `time`) VALUES ('$phone','$msg','[value-3]','[value-4]')";

$sql="SELECT * FROM `users` WHERE phone='$phone'";
    if ($rq=mysqli_query($db,$sql)) {
        if (mysqli_num_rows($rq)==1) {
            $sql="INSERT INTO `msg`(`phone`, `msg`) VALUES ('$phone','$msg')";
            $rq=mysqli_query($db,$sql);
    
            

            
        }
    }


?>