
<!DOCTYPE html>
<html lang="en">
<?php
include("include/header.php");
include('include/connection.php');

?>

<?php
session_start();
error_reporting(0);



?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Layout - Mazer Admin Dashboard</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>

<?php

if(isset($_POST['update'])){

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $mob=$_POST['mob'];
    $address=$_POST['address'];
    $password=$_POST['password'];


    $update=mysqli_query($con,"UPDATE users SET first_name='$fname',last_name='$lname',
    city='$city',state='$state',mobile='$mob',address='$address',password='$password' where email='{$_SESSION['email']}' ");

    // if($update){
    //     echo "<script> alert('Record has been updated successfully')</script>";
    // }
}

?>
<div id="main">

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Profile</h3>
                <p class="text-subtitle text-muted">Edit Your Profile</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Your Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

<?php
if($_SESSION['email']!=""){
    
$profile=mysqli_query($con,"SELECT * from users where email='{$_SESSION['email']}'");
      
while($row=mysqli_fetch_array($profile)){
?>

<section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Your Profile</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="profile.php" method="POST">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">First Name</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                value="<?php echo $row['first_name']?>" placeholder="First Name" name="fname">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Last Name</label>
                                            <input type="text" id="last-name-column" class="form-control"
                                            value="<?php echo $row['last_name']?>" placeholder="Last Name" name="lname">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">City</label>
                                            <input type="text" id="city-column" class="form-control" placeholder="city"
                                            value="<?php echo $row['city']?>" name="city">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="state-floating">State</label>
                                            <input type="text" id="state-floating" class="form-control"
                                            value="<?php echo $row['state']?>" name="state" placeholder="state">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="blood-grp">Blood Group</label>
                                            <input type="text" id="blood-grp" class="form-control"
                                            value="<?php echo $row['bloodgrp']?>" name="blood_grp" placeholder="Blood Group" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="dob-column">DOB</label>
                                            <input type="date" id="email-id-column" class="form-control"
                                            value="<?php echo $row['dob']?>" name="dob" disabled>
                                        </div>
                                    </div>
                                  
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Email</label>
                                            <input type="email" id="email-id-column" class="form-control"
                                            value="<?php echo $row['email']?>" name="email" placeholder="Email" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="password-column">Password</label>
                                            <input type="password" id="password" class="form-control"
                                            value="<?php echo $row['password']?>" name="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="address" class="form-label">Address</label>
                                            <textarea class="form-control" name="address" id="address" rows="4"><?php echo $row['address']?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="mob-column">Mobile No.</label>
                                            <input type="text" id="mob" class="form-control"
                                            value="<?php echo $row['mobile']?>"  name="mob" placeholder="Mobile No.">
                                        </div>
                                    </div>
                                   
                            
                                  
                                    <div class="col-12 d-flex justify-content-end">
                                        <input type="submit" name="update" id="update" class="btn btn-primary me-1 mb-1" value="Update">
                                        <button type="submit" formaction="http://localhost/MedEx/user/index.php"  class="btn btn-light-secondary me-1 mb-1">Back</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php }?>
</div>
</div>



<?php }
else{
    echo "Please <a href='login.php'>Log In</a> first";
}
?>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="assets/js/mazer.js"></script>
</body>

</html>