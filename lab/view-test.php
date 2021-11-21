<!DOCTYPE html>
<html lang="en">
<?php
session_start();

include("include/sidebar.php");
include("include/connection.php");
?>

<?php
    
    $edit=$_GET['edit'];

    $edittest=mysqli_query($con,"SELECT * from tests where test_id='$edit'");
    while($row=mysqli_fetch_array($edittest)){
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Details</title>
    
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
    $name=$_POST['testname'];
    $descr=$_POST['descr'];
    $price=$_POST['price'];

    $updateTest=mysqli_query($con,"UPDATE tests set test_name='$name', descr='$descr', price='$price' where test_id='$edit'");
}

?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Test Details</h3>
                <!-- <p class="text-subtitle text-muted">Displaying the Pateint's Order details below.</p> -->
                <p class="text-subtitle text-muted">Update Test Details</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Test</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    
   <form action="" method="POST">
   <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">View / Update Test Details</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                            <label for="name">Test Name</label>
                            <input type="text" name="testname" class="form-control" id="name" placeholder="Test Name"
                            value="<?php echo $row['test_name'];?>">
                        </div>

                        <div class="form-group">
                            <label for="descr" class="form-label">Description</label>
                            <textarea class="form-control" name="descr" id="description" rows="4" ><?php echo $row['descr'];?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price ( in Rs. ₹ )</label>
                            <input type="number" class="form-control" name="price" id="price" placeholder="Price"
                            value="<?php echo $row['price'];?>">
                        </div>
                        
                    </div>
                    
                <div>
                    <br>
                    <input type="submit" name="update" class="btn btn-warning" value="Update">
                    </div>
            </div>
        </div>
    </section>
   </form>
<?php }
?>
</div>


        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="assets/js/mazer.js"></script>
</body>

</html>
