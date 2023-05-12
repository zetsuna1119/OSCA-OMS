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
	$stmt = $mysqli->prepare("UPDATE `tblsenior` SET `StuID`=?, `SurName`=?, `FirstName`=?, `MiddleName`=?, `Barangay`=? WHERE `id`=?");

	// Bind params
	$stmt->bind_param( "sssssi", $stuid, $stuname, $fname, $mname, $barangay, $_GET['id'] );

	// Execute query
	if( $stmt->execute() ) {
		$alert_message = "Employee has been updated.";
	} else {
		$alert_message = "There was an error in saving the employee. Please try again.";
	}

	// Close prepare statement
	$stmt->close();

}

?>
<html>
	<head>
		<title>Edit Employee</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<table width="70%" cellpadding="2" cellspacing="2" align="center" style="margin-top:20px;">
			<tr>
				<td align="center"><h2>Edit Employee</h2></td>
			</tr>
			<tr>
				<td>
					<?php 
					if( isset( $alert_message ) AND !empty( $alert_message )) {
						echo "<div class='alert alert-success'>".$alert_message."</div>";
					}
					?>

					<?php 
					// Get employee details
					$stmt = $mysqli->prepare("SELECT `StuID`, `SurName`, `FirstName`, `MiddleName`, `Barangay` FROM `tblsenior` WHERE `id` = ?");
					$stmt->bind_param("i", $_GET['id']);
					$stmt->execute();
					$stmt->store_result();
					if( $stmt->num_rows == 1 ) {
						$stmt->bind_result($stuid, $stuname, $fname, $mname, $barangay);
						$stmt->fetch();
					?>
					<form method="post">
						<table width="60%" cellpadding="5" cellspacing="5" align="center">
						<tr>
							<td style="width:30%">Senior Number:</td>
							<td><input required class="form-control" type="text" name="stuid" style="width:100%;" placeholder="Enter Employee Number" value="<?=$stuid?>"></td>
						</tr>
						<tr>
							<td style="width:30%">Sur Name:</td>
							<td><input required class="form-control" type="text" name="stuname" style="width:100%;" placeholder="Enter First Name" value="<?=$stuname?>"></td>
						</tr>
						<tr>
							<td style="width:30%">First Name:</td>
							<td><input required class="form-control" type="text" name="fname" style="width:100%;" placeholder="Enter First Name" value="<?=$fname?>"></td>
						</tr>
						<tr>
							<td style="width:30%">Middle Name:</td>
							<td><input required class="form-control" type="text" name="mname" style="width:100%;" placeholder="Enter Last Name" value="<?=$mname?>"></td>
						</tr>
						<tr>
							<td style="width:30%">Barangay</td>
							<td><input required class="form-control" type="text" name="barangay" style="width:100%;" placeholder="Enter Position" value="<?=$barangay?>"></td>
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
					<?php } else {
						echo "Invalid employee";
					} ?>
				</td>
			</tr>
		</table>
	</body>
</html>