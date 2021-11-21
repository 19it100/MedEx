<!DOCTYPE html>
<html lang="en">
<?php
session_start();

include("include/sidebar.php");
include("include/connection.php");
?>

<?php

$order_id=$_GET['result'];
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
    $file=$row['file'];
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input - Mazer Admin Dashboard</title>
    
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
                <h3>Order Results</h3>
                <!-- <p class="text-subtitle text-muted">Displaying the Pateint's Order details below.</p> -->
                <p class="text-subtitle text-muted">Upload Pateint's Report</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Results</li>
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
                                <label for="formFile" class="form-label">Result Report</label>
                                <td><a href="http://localhost/MedEx/lab/files/<?php echo $file;?>" class="form-control" type="file" id="formFile">View Report</a></td>
                                <!-- <input class="form-control" type="file" id="formFile"> -->
                        </div>
                    </div>
                </div>
                <div>
                    <br>
                    <a href="results.php" class="btn btn-warning">Done</a>
                    </div>
            </div>
        </div>
    </section>

</div>

        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="assets/js/mazer.js"></script>
</body>

</html>
