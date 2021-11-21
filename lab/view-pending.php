<!DOCTYPE html>
<html lang="en">
<?php
session_start();

include("include/sidebar.php");
include("include/connection.php");

?>

<head>

<?php

$order_id=$_GET['pending'];
// echo $order_id;
$view_requests=mysqli_query($con,"SELECT * from orders LEFT JOIN users on orders.userID = users.email 
where orders.order_id=$order_id");

while($row=mysqli_fetch_array($view_requests)){
    $name=$row['first_name']." ".$row['last_name'];
    $mobile=$row['mobile'];
    $testname=$row['testName'];
    $emailID=$row['userID'];
    $date=$row['Date'];
    $address=$row['address'];

}

?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendind Report</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Pending Orders</h3>
                <!-- <p class="text-subtitle text-muted">Displaying the Pateint's Order details below.</p> -->
                <p class="text-subtitle text-muted">Upload Pateint's Report</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pendings</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pateint Details</h4>
            </div>

<form action="pending.php" method="POST" enctype="multipart/form-data">
<div class="card-body">
            <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Pateint Name"
                               value="<?php echo $name ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile No.</label>
                            <input type="text" class="form-control" id="mobile" placeholder="Mobile No."
                            value="<?php echo $mobile ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email">Email ID</label>
                            <input type="text" class="form-control" id="email" placeholder="Email ID"
                            value="<?php echo $emailID ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" rows="4" disabled><?php echo $address;?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                            <label for="orderID">Order ID</label>
                            <input type="text" class="form-control" id="orderID" placeholder="Order ID"
                            value="<?php echo $order_id ?>"  disabled>
                        </div>
                    <div class="form-group">
                            <label for="testName">Test Name</label>
                            <input type="text" class="form-control" id="testName" placeholder="Test Name"
                            value="<?php echo $testname ?>"   disabled>
                        </div>
                    
                    <div class="form-group">
                            <label for="date">Appointment Date</label>
                            <input type="date" class="form-control" id="date" placeholder=""
                            value="<?php echo $date ?>"  disabled>
                        </div>

                    <div class="form-group">
                                <label for="formFile" class="form-label">Default file input example</label>
                                <input class="form-control" type="file" name="file" id="file">
                        </div>
                    </div>
                </div>
                <div>
                    <br>
                    <input type="submit" name="toresults" id="toresults" class="btn btn-warning" value="Upload Result" >
                    </div>
            </div>
</form>
        </div>
    </section>

</div>


        </div>
    </div>

<?php

if(isset($_POST['toresults'])){

$file=$_FILES['file']['name'];
$temp_name=$_FILES['file']['tmp_name'];

move_uploaded_file($_FILES["file"]["tmp_name"],'files/'.$file);

$upload=mysqli_query($con,"UPDATE orders SET status='Result',file='$file' where order_id='$order_id'");
if($upload){
    echo "<script> alert('Done')</script>";
}else{
    echo "<script> alert('Please try again ')</script>";
}
}
?>

    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="assets/js/mazer.js"></script>
</body>

</html>
