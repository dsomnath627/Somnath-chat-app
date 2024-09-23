<?php
include "db.php";
session_start();

if (isset($_POST["name"]) && isset($_POST["phone"])) {
//    print_r($_POST);
$name=$_POST["name"];
$phone=$_POST["phone"];
$sql="SELECT * FROM `users` WHERE name='$name' && phone='$phone'";
if ($rq=mysqli_query($db,$sql)) {
  if (mysqli_num_rows($rq)==1) {
    $_SESSION["userName"]=$name;
    $_SESSION["phone"]=$phone;
    header("location:index.php");
  }else {
    $sql="SELECT * FROM `users` WHERE phone='$phone'";
    if ($rq=mysqli_query($db,$sql)) {
        if (mysqli_num_rows($rq)==1) {
            echo "<script>alert($phone+'is already used')</script>";
        }else {
            $sql="INSERT INTO `users`(`name`, `phone`) VALUES ('$name','$phone')";
            if ($rq=mysqli_query($db,$sql)) {
                $sql="SELECT * FROM `users` WHERE name='$name' && phone='$phone'";
                if ($rq=mysqli_query($db,$sql)) {
                    if (mysqli_num_rows($rq)==1) {
                        echo "login successfully";
                        $_SESSION["userName"]=$name;
                        $_SESSION["phone"]=$phone;
                        header("location:index.php");
                    
                    
                    }
                    
                }
            }
        }
    }
  }
}


}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Somnath's chat App</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <h1>Somnath's chat App</h1>
    <div class="login">
        <h2>Login</h2>
        <p>This ChatApp is the concept of ChatBot</p>
        <form action="" method="post">
            <h3>UserName</h3>
            <input type="text" placeholder="Full Name" name="name">
            <h3>Mobile No:</h3>
            <input type="number" id="number" placeholder="Number" name="phone" required />
            <button>Login</button>
        </form>
    </div>
</html>