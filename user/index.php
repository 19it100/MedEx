<!DOCTYPE html>
<html lang="en">
<?php
include("include/header.php");
include('include/connection.php');

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

<div class="container">
<section>
    
<div class="col-md-14">
                <div class="card">
                    <div class="card-content">
                        <img class="card-img-top img-fluid" src="images/bg_01.jpg" alt="Card image cap"
                            style="height: 35rem;" />
                        <div class="card-body">
                            <h4 class="card-title">Search Your Desired Test Here</h4>
                            <form action="" method="POST">
                            <div class="row">
                                <div class="col-md-6 mb-1">
                                    <div class="input-group mb-3">
                                      &emsp;

                                        <input type="text" class="form-control"
                                            aria-label="Text input with dropdown button" placeholder="Enter Test and select location"
                                            name="descr">
                                            <fieldset>
                                        <select class="form-select" name="location" id="location">
                                            <option value="Anand">Anand</option>
                                            <option value="Vidhyanagar">Vidhyanagar</option>
                                            <option value="ANAND">ANAND</option>
                                        </select>
                                    </fieldset>
                                    <input type="submit" name="search" id="search" class="btn btn-primary block" value="Search">

                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<div id="Search" name="Search">
<section>
<div ><div class="card-title"><h4>Available Tests</h4>
</div>
<?php
if(isset($_POST['search'])){
    $descr=$_POST['descr'];
    $city=$_POST['location'];

$search=mysqli_query($con,"SELECT * from labs LEFT JOIN tests on labs.email= tests.lab_id where tests.descr like '%$descr%' and city='$city' ORDER BY price");
}
while($res=mysqli_fetch_array($search)){
?>
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <h4 class="card-title">Test Name <?php echo $res['test_name'];?></h4>
                    <p class="card-text">
                        Description: 
                        <?php echo $res['descr'];?>
                    </p>
                    <p>Price: ₹ <?php echo $res['price'];?></p>
                    <div class="col-md-4">
                    <a href="booktest.php?test=<?php echo $res['test_id']?>&lab=<?php echo $res['lab_id']?>" class="btn btn-primary py-2 mr-1">View</a>
                    </div>
                </div>
            </div>
            
        </div>
</div>

</section>
</div>
<?php
}?>
</section>
</div>



    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    
<script src="assets/vendors/apexcharts/apexcharts.js"></script>
<script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/mazer.js"></script>
</body>
<script>

// document.getElementById("Search").style.display = "none"; 

</script>
</html>