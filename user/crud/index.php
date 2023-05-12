<?php 
require 'connect.php';
?>
<html>
	<head>
		<title>Employee List</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body style="background-color:#93a3e8;">
		<div class="container" style="background-color:#FFF; margin-top:40px;">
			<div class="row">
				<div class="col-md-12">
					<h2 style="margin-top:20px;">Registered Senior List</h2>
					<a href="add_employee.php" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New Senior</a>
					<table width="100%" class="table table-hover table-striped table-condensed table-bordered" style="margin-top:20px;">
						<thead>
							<tr>	
								<th>Senior Number</th>
								<th>Sur Name</th>
								<th>First Name</th>
								<th>Middle Name</th>
								<th>Barangay</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$stmt = $mysqli->prepare("SELECT `id`, `StuID`, `SurName`, `FirstName`, `MiddleName`, `Barangay` FROM `tblsenior` ORDER BY `StuID` ASC");
							$stmt->execute();
							$stmt->store_result();
							if( $stmt->num_rows > 0 ) {
								$stmt->bind_result($id, $stuid, $stuname, $fname, $mname, $barangay );
								while( $stmt->fetch() ) {
							?>
							<tr>
								<td><?=$stuid?></td>
								<td><?=$stuname?></td>
								<td><?=$fname?></td>
								<td><?=$mname?></td>
								<td><?=$barangay?></td>
								<td align="center">
									<a href="edit_employee.php?id=<?=$id?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</a>
									<a href="delete_employee.php?id=<?=$id?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i> Delete</a> 
								</td>
							</tr>
							<?php } } else {?>
							<tr>
								<td colspan="5" align="center">No student found.</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
		
	</body>
</html>