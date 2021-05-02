<?php

include 'config.php';

error_reporting(0);

session_start();
if(isset($_SESSION['project'])){
    header('Location:username.php');
}

if(isset($_POST['submit'])){
   $username=$_POST['usename'];
   $email=$_POST['email'];
   $password=md5($_POST['password']);
   $cpassword=md5($_POST['cpassword']);
if($password==$cpassword){
    $sql="SELECT * FROM users WHERE email='$email' ";
    $result=mysqli_query($conn,$sql);
if(!$result->num_rows>0){
    $sql="INSERT INTO users(username,email,password)VALUES ('$username','$email','$password')";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('User register is successfully!')</script>";
    $username="";
    $email="";
    $_POST['password']="";
    $_POST['cpassword']="";
    
    } else{
    echo "<script> alert('Oops! Something wrong went.')</script>";
}
}else{
    echo "<script> alert('Oops!Email already exists')</script>";
}
}else{
    echo "<script>alert ('Password does not matches.')</script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width,initial-scale=1.0">
    <title>  Sign up </title>
    
    <link rel="stylesheet" href="register.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  </head>
<body >
<div class="container">
 
   
    <div class="box">
        <p class="login-text" style="font-size:2rem;font-weight:800"> Register </p>
    <form action="" method="POST" class="login-email">
    <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" required>
    <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
    <input type="password"  name="password" placeholder="Password" value="<?php echo $_POST['password']; ?>" required>
    <input type="password"  name="cpassword" placeholder="Confirm Password" value="<?php echo $_POST['cpassword']; ?>" required>
    <button name="submit" class="button"> Register </button>
    <p class="login-register-text"> Have an account? <a href="username.php">Login Here</a>
</div>
</form>

</div>
</body>
</html>