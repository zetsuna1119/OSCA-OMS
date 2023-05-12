<?php
require 'connect.php';

// Form click or submit
if( isset($_POST['btnSubmit']) ) {

	// Fetch input $_POST
	$stuid = $mysqli->real_escape_string( $_POST['stuid'] );
	$stuname = $mysqli->real_escape_string( $_POST['stuname'] );
	$fname = $mysqli->real_escape_string( $_POST['fname'] );
	$mname = $mysqli->real_escape_string( $_POST['mname'] );
	$barangay = $mysqli->real_escape_string( $_POST['barangay'] );

	// Prepared statement
	$stmt = $mysqli->prepare("INSERT INTO `tblonline_registration` (`StuID`, `SurName`, `FirstName`, `MiddleName`, `Barangay`) VALUES(?, ?, ?, ?, ?)");

	// Bind params
	$stmt->bind_param( "sssss", $stuid, $stuname, $fname, $mname, $barangay );

	// Execute query
	if( $stmt->execute() ) {
		$alert_message = "Employee has been saved.";
	} else {
		$alert_message = "There was an error in saving the employee. Please try again.";
	}

	// Close prepare statement
	$stmt->close();

	// Close database connection
	$mysqli->close();

}


?>
<html>
	<head>
		<title>Online Registration Form</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<table width="70%" cellpadding="2" cellspacing="2" align="center" style="margin-top:20px;">
			<tr>
				<td align="center"><h2>Add New Employee</h2></td>
			</tr>
			<tr>
				<td>
					<?php 
					if( isset( $alert_message ) AND !empty( $alert_message )) {
						echo "<div class='alert alert-success'>".$alert_message."</div>";
					}
					?>
					<form method="post">
						<table width="60%" cellpadding="5" cellspacing="5" align="center">
						<tr>
							<td style="width:30%">Senior Number:</td>
							<td><input required type="text" class="form-control" name="stuid" style="width:100%;" placeholder="Enter Employee Number"></td>
						</tr>
						<tr>
							<td style="width:30%">Sur Name:</td>
							<td><input required type="text" class="form-control" name="stuname" style="width:100%;" placeholder="Enter First Name"></td>
						</tr>
						<tr>
							<td style="width:30%">First Name:</td>
							<td><input required type="text" class="form-control" name="fname" style="width:100%;" placeholder="Enter Last Name"></td>
						</tr>
						<tr>
							<td style="width:30%">Middle Name:</td>
							<td><input required type="text" class="form-control" name="mname" style="width:100%;" placeholder="Enter Last Name"></td>
						</tr>
						<tr>
							<td style="width:30%">Barangay</td>
							<td><input required type="text" class="form-control" name="barangay" style="width:100%;" placeholder="Enter Position"></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
								<a href="index.php" class="btn btn-info">Back to employee list</a>
							</td>
						</tr>
						</table>
					</form>
				</td>
			</tr>
		</table>
	</body>
</html>