<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="vendors/js/vendor.bundle.base.js"></script>
<!-- plugins:css -->
<link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- End layout styles -->
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="./vendors/chart.js/Chart.min.js"></script>
    <script src="./vendors/moment/moment.min.js"></script>
    <script src="./vendors/daterangepicker/daterangepicker.js"></script>
    <script src="./vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./js/dashboard.js"></script>
<?php 

require 'connect.php';

// Prepare statement 
$stmt = $mysqli->prepare("DELETE FROM `tblonline_registration` WHERE `id`=?");

// bind param
$stmt->bind_param("i", $_GET['id']);

if( $stmt->execute() ) {
	echo "<script>alert('Data deleted');</script>"; 
	echo "<script>window.location.href = 'pending-list.php'</script>"; 
	// echo "<div class='alert alert-success'>Employee has been deleted. <a href='index.php'>Back to Employee List</a></div>";
}  else {
	echo "<script>alert('Deletion error. Please try again!');</script>"; 
	// echo "<div class='alert alert-danger'>There was an error in deleting the Citizen. Please try again.</div>";
}

// clsoe prepare statement
$stmt->close();

// close connection
$mysqli->close();