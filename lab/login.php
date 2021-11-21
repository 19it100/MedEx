<!DOCTYPE html>
<html lang="en">
<?php
include("include/connection.php");
session_start();

?>
<?php
if(isset($_POST['login'])){

    $username=$_POST['lab_username'];
    $password=$_POST['lab_pass'];
    
    $login=mysqli_query($con,"SELECT * from labs where email='$username' and password='$password'");
    if($login){
        if(mysqli_num_rows($login)>0){
            $_SESSION['lab_id']=$username;
            // echo $_SESSION['lab_id'];
            header('location:index.php');
        }
        else {
            echo "<script>alert('Email or password is incorrect, please try again')</script>";
        }
    
    }
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratory Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="index.php"><img src="assets/images/logo/logo1.png" alt="Logo"></a>
            </div>
            <h1 class="auth-title">Laboratory Log in.</h1>
            <p class="auth-subtitle mb-5">Log in with your data that you are given by the admin.</p>

            <form action="login.php" method="POST">
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" name="lab_username" id="lab_username" class="form-control form-control-xl" placeholder="Username">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" name="lab_pass" id="lab_pass" class="form-control form-control-xl" placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
               
                <input type="submit" name="login" id="login" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
            </form>
            
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>
</body>

</html>
