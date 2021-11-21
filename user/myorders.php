<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("include/header.php");
include('include/connection.php');

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
<link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>

<div class="container"> 
                 
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>DataTable</h3>
                <p class="text-subtitle text-muted">For user to check they list</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Your Orders</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Below are your orders
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Test Name</th>
                            <th>Appointment Date</th>
                            <th>Order ID</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $requests=mysqli_query($con,"SELECT * from orders where userID='{$_SESSION['email']}'");

                        while($row=mysqli_fetch_array($requests)){
                        ?>
                        <tr>
                            <td><?php echo $row['testName']; ?></td>
                            <td><?php echo $row['Date']; ?></td>
                            <td><?php echo $row['order_id']; ?></td>
                            <td><?php echo $row['status']; ?></td>

                            <td>
                                
                            <a  class="btn btn-sm btn-primary" <?php if(!empty($row['file'])){echo ('href="http://localhost/MedEx/lab/files/').$row['file'];} else {echo "disabled";}?>">View</a>
                            
                            </td>
                        </tr>
                        <?php }?>

                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

        </div>
    </div>
</div>

<script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
<script>
    // Simple Datatable
    
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>

<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    
<script src="assets/vendors/apexcharts/apexcharts.js"></script>
<script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/mazer.js"></script>
</body>

</html>