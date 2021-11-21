<!DOCTYPE html>
<html lang="en">
<?php
session_start();

include("include/sidebar.php");
include("include/connection.php");
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests</title>
    
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
                        <li class="breadcrumb-item active" aria-current="page">All Requests</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Simple Datatable
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Test</th>
                            <th>Phone</th>
                            <th>Order ID</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        <?php
                        $requests=mysqli_query($con,"SELECT * from orders LEFT JOIN users on orders.userID = users.email 
                        where status='Requested' and orders.lab_id='{$_SESSION['lab_id']}'");

                        while($row=mysqli_fetch_array($requests)){
                        ?>
                        <tr>
                            <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                            <td><?php echo $row['testName']; ?></td>
                            <td><?php echo $row['mobile']; ?></td>
                            <td><?php echo $row['order_id']; ?></td>
                            <td>
                            <a href="view-request.php?request=<?php echo $row['order_id'];?>" class="btn btn-sm btn-primary">View</a>
                            
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
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    
<script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>

    <script src="assets/js/mazer.js"></script>
</body>

</html>
