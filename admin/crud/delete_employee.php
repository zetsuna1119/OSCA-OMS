<link rel="stylesheet" href="css/bootstrap.min.css">
<?php 

require 'connect.php';

// Prepare statement 
$stmt = $mysqli->prepare("DELETE FROM `tblsenior` WHERE `id`=?");

// bind param
$stmt->bind_param("i", $_GET['id']);

if( $stmt->execute() ) {
	echo "<div class='alert alert-success'>Employee has been deleted. <a href='index.php'>Back to Employee List</a></div>";
}  else {
	echo "<div class='alert alert-danger'>There was an error in deleting the employee. Please try again.</div>";
}

// clsoe prepare statement
$stmt->close();

// close connection
$mysqli->close();