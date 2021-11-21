<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("include/header.php");
include('include/connection.php');

$lab=$_GET['lab'];
$test=$_GET['test'];

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
<link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>


<body>
    <div>
<div id="main">

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Book Test</h3>
                <p class="text-subtitle text-muted">Book Test</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Test Booking</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <?php

$details=mysqli_query($con,"SELECT * from labs LEFT JOIN tests on labs.email= tests.lab_id where
                        tests.test_id='$test' and labs.email='$lab'");
// echo mysqli_num_rows($details);
// $b1=mysqli_query($con,"SELECT bloodgrp from users where email='{$_SESSION['email']}'");
// $bgrp=mysqli_fetch_array($b1);
$r1=mysqli_fetch_array($details);
$userDetails=mysqli_query($con,"SELECT * from users where email='{$_SESSION['email']}'");
while($row=mysqli_fetch_array($userDetails)){

?>
<?php

if(isset($_POST['book'])){
    
    $mob=$_POST['mob'];
    $date=$_POST['date'];
    $tname=$r1['test_name'];
    $user=$_SESSION['email'];
    $booknow=mysqli_query($con,"INSERT into orders(lab_id,testID,testName,userID,Date,mobile,status)values('$lab','$test','$tname','$user','$date','$mob','Requested')");
}


?>
<section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Description:</h4><?php echo $r1['descr'];?><br><br>
                        <h4 class="card-title">Addres:</h4><?php echo $r1['address'];?><br><br>
                        <h4 class="card-title">Contact:</h4><?php echo $r1['cont'];?><br><br>
                        
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                        <h6>Enter Your Details:</h6><br>
                        
                            <form class="form" action="" method="POST">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">First Name</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                value="<?php echo $row['first_name'];?>" placeholder="First Name" name="fname">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Last Name</label>
                                            <input type="text" id="last-name-column" class="form-control"
                                            value="<?php echo $row['last_name'];?>" placeholder="Last Name" name="lname">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="blood-grp">Blood Group</label>
                                            <input type="text" id="blood-grp" class="form-control"
                                            value="<?php echo $row['bloodgrp'];?>" name="blood_grp" placeholder="Blood Group" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="dob-column">Date</label>
                                            <input type="date" class="form-control"
                                            value="" name="date">
                                        </div>
                                    </div>
                                  
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Email</label>
                                            <input type="email" id="email-id-column" class="form-control"
                                            value="<?php echo $row['email'];?>" name="email" placeholder="Email" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="mob-column">Mobile No.</label>
                                            <input type="text" id="mob" class="form-control"
                                            value="<?php echo $row['mobile'];?>"  name="mob" placeholder="Mobile No.">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">City</label>
                                            <input type="text" id="city-column" class="form-control" placeholder="city"
                                            value="<?php echo $row['city'];?>" name="city" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="state-floating">State</label>
                                            <input type="text" id="state-floating" class="form-control"
                                            value="<?php echo $row['state'];?>" name="state" placeholder="state" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="address" class="form-label">Address</label>
                                            <textarea class="form-control" name="address" id="address" rows="4" disabled><?php echo $row['address'];?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <input type="submit" name="book" id="book" class="btn btn-primary me-1 mb-1" value="Book Now">
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
</div>
</div>
</div>


<?php
}?>

<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    
<script src="assets/vendors/apexcharts/apexcharts.js"></script>
<script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/mazer.js"></script>
</body>

</html>