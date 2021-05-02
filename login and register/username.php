<?php

include 'config.php';
session_start();
error_reporting(0);

if(isset($_SESSION['project'])){
    header('Location:project.html');
}
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result=mysqli_query($conn,$sql);
    if($result->num_rows>0){
        $row=mysqli_fetch_assoc($result);
        $_SESSION['project']=$row['project'];
        header("Location:project.html");
    }
    else
    {
        echo "<script> alert('Oops!Email or Password is Incorrect.')</script>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width,initial-scale=1.0">
    <title> Log in </title>
    
    <link rel="stylesheet" href="username.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  </head>
<body >
<div class="container">
<div class="social-menu">
     <p class="login-text">Login with social media</p>
        <ul>
             <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google"></i></a></li>
        </ul>
    </div>
   <div class="box">
   <form action="" method="POST" class="login-email">  
        <p class="login-text" style="font-size:2rem;font-weight:800" >Login </p>
     
    <input type="email"  placeholder="Email"  name="email" value="<?php echo $email; ?>" required>
    <input type="password"   placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
    <button name="submit" class="button">Login</button>
    <p class="login-register-text"> Don't have an existing account?<br>
    <a href="register.php"> Register Here </a></p>
   </div>
   </form>
</div>
   </body>
</html>
