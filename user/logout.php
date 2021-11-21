<?php
session_start();
session_unset();

// echo $_SESSION['lab_id'];
header('location:login.php');
?>