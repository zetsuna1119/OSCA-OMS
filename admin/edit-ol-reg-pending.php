<?php 

require 'connect.php';

// Form click or submit
if( isset($_POST['btnSubmit']) ) {

	// Fetch input $_POST
	
	$stuid = $mysqli->real_escape_string( $_POST['stuid'] );
	$stuname = $mysqli->real_escape_string( $_POST['stuname'] );
	$fname = $mysqli->real_escape_string( $_POST['fname'] );
	$mname = $mysqli->real_escape_string( $_POST['mname'] );
	$nname = $mysqli->real_escape_string( $_POST['nname'] );
	$dob = $mysqli->real_escape_string( $_POST['dob'] );
	$age = $mysqli->real_escape_string( $_POST['age'] );
	$gender = $mysqli->real_escape_string( $_POST['gender'] );
	$religion = $mysqli->real_escape_string( $_POST['religion'] );
	$pob = $mysqli->real_escape_string( $_POST['pob'] );
	$connum = $mysqli->real_escape_string( $_POST['connum'] );
	$stuemail = $mysqli->real_escape_string( $_POST['stuemail'] );
	$cstatus = $mysqli->real_escape_string( $_POST['cstatus'] );
	$paddress = $mysqli->real_escape_string( $_POST['paddress'] );
	$barangay = $mysqli->real_escape_string( $_POST['barangay'] );
	$eduat = $mysqli->real_escape_string( $_POST['eduat'] );
	$skills = $mysqli->real_escape_string( $_POST['skills'] );
	$occu = $mysqli->real_escape_string( $_POST['occu'] );
	$anincome = $mysqli->real_escape_string( $_POST['anincome'] );
	$nob = $mysqli->real_escape_string( $_POST['nob'] );
	$fcname = $mysqli->real_escape_string( $_POST['fcname'] );
	$fcrelationship = $mysqli->real_escape_string( $_POST['fcrelationship'] );
	$fcage = $mysqli->real_escape_string( $_POST['fcage'] );
	$fcstatus = $mysqli->real_escape_string( $_POST['fcstatus'] );
	$fcoccu = $mysqli->real_escape_string( $_POST['fcoccu'] );
	$fcincome = $mysqli->real_escape_string( $_POST['fcincome'] );
	$altconnum = $mysqli->real_escape_string( $_POST['altconnum'] );
	$pension = $mysqli->real_escape_string( $_POST['pension'] );
    $status = $mysqli->real_escape_string( $_POST['status'] );

	// Prepared statement
	$stmt = $mysqli->prepare("UPDATE `tblonline_registration` SET `StuID`=?, `SurName`=?, `FirstName`=?, `MiddleName`=?, `NickName`=?, `DOB`=?, `Age`=?, `Gender`=?, `Religion`=?, `PoB`=?, `ContactNumber`=?, `CitiEmail`=?, `CivilStatus`=?, `PuAddress`=?, `Barangay`=?, `EduAt`=?, `Skills`=?, `Occupation`=?, `AnIncome`=?, `NoB`=?, `FcName`=?,  `Relationship`=?, `FcAge`=?, `FcCiviStatus`=?, `Fcoccupation`=?, `FcIncome`=?, `AltenateNumber`=?, `Pension`=?, `Status`=? WHERE `id`=?");

	// Bind params
	$stmt->bind_param( "sssssssssssssssssssssssssssssi", $stuid, $stuname, $fname, $mname, $nname, $dob, $age, $gender, $religion, $pob, $connum, $stuemail, $cstatus, $paddress, $barangay, $eduat, $skills, $occu, $anincome, $nob, $fcname, $fcrelationship, $fcage, $fcstatus, $fcoccu, $fcincome, $altconnum, $pension, $status, $_GET['id'] );

	// Execute query
	if( $stmt->execute() ) {
		echo '<script>alert("Senior details has been check and directly add to waiting list.")</script>';
		echo "<script>window.location.href ='manage-online-registration.php'</script>";
		// $alert_message = "Employee has been updated.";
	} else {
		$alert_message = "There was an error in saving the employee. Please try again.";
	}

	// Close prepare statement
	$stmt->close();

}

?>
<html>
	<head>
		<title>Edit Senior Details</title>
		<script type="text/javascript">
	function formatDate(date){
	var d = new Date(date),
	month = '' + (d.getMonth() + 1),
	day = '' + d.getDate(),
	year = d.getFullYear();

	if (month.length < 2) month = '0' + month;
	if (day.length < 2) day = '0' + day;

	return [year, month, day].join('-');

	}

	function getAge(dateString){
	var birthdate = new Date().getTime();
	if (typeof dateString === 'undefined' || dateString === null || (String(dateString) === 'NaN')){
	// variable is undefined or null value
	birthdate = new Date().getTime();
	}
	birthdate = new Date(dateString).getTime();
	var now = new Date().getTime();
	// now find the difference between now and the birthdate
	var n = (now - birthdate)/1000;
	if (n < 604800){ // less than a week
	var day_n = Math.floor(n/86400);
	if (typeof day_n === 'undefined' || day_n === null || (String(day_n) === 'NaN')){
	// variable is undefined or null
	return '';
	}else{
	return day_n + ' day' + (day_n > 1 ? 's' : '') + ' old';
	}
	} else if (n < 2629743){ // less than a month
	var week_n = Math.floor(n/604800);
	if (typeof week_n === 'undefined' || week_n === null || (String(week_n) === 'NaN')){
	return '';
	}else{
	return week_n + ' week' + (week_n > 1 ? 's' : '') + ' old';
	}
	} else if (n < 31562417){ // less than 24 months
	var month_n = Math.floor(n/2629743);
	if (typeof month_n === 'undefined' || month_n === null || (String(month_n) === 'NaN')){
	return '';
	}else{
	return month_n + ' month' + (month_n > 1 ? 's' : '') + ' old';
	}
	}else{
	var year_n = Math.floor(n/31556926);
	if (typeof year_n === 'undefined' || year_n === null || (String(year_n) === 'NaN')){
	return year_n = '';
	}else{
	return year_n + '' + (year_n > 1 ? '' : '') + '';
	}
	}
	}

	function getAgeVal(pid){
	var birthdate = formatDate(document.getElementById("txtbirthdate").value);
	var count = document.getElementById("txtbirthdate").value.length;
	if (count=='10'){
	var age = getAge(birthdate);
	var str = age;
	var res = str.substring(0, 1);
	if (res =='-' || res =='0'){
	document.getElementById("txtbirthdate").value = "";
	document.getElementById("txtage").value = "";
	$('#txtbirthdate').focus();
	return false;
	}else{
	document.getElementById("txtage").value = age;
	}
	}else{
	document.getElementById("txtage").value = "";
	return false;
	}
	}
</script>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<style>
		.cent{
			position: relative;
			
		}
	</style>
	<body>
		<table width="70%" cellpadding="2" cellspacing="2" align="center" style="margin-top:20px;">
			<tr>
				<td align="center"><h2>Checking Online Application Details</h2></td>
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
					$stmt = $mysqli->prepare("SELECT `StuID`, `SurName`, `FirstName`, `MiddleName`, `NickName`, `DOB`, `Age`, `Gender`, `Religion`, `PoB`, `ContactNumber`, `CitiEmail`, `CivilStatus`, `PuAddress`, `Barangay`, `EduAt`, `Skills`, `Occupation`, `AnIncome`, `NoB`, `FcName`, `Relationship`, `FcAge`, `FcCiviStatus`, `Fcoccupation`, `FcIncome`, `AltenateNumber`, `Pension` FROM `tblonline_registration` WHERE `id` = ?");
					$stmt->bind_param("i", $_GET['id']);
					$stmt->execute();
					$stmt->store_result();
					if( $stmt->num_rows == 1 ) {
						$stmt->bind_result($stuid, $stuname, $fname, $mname, $nname, $dob, $age, $gender, $religion, $pob, $connum, $stuemail, $cstatus, $paddress, $barangay, $eduat, $skills, $occu, $anincome, $nob, $fcname, $fcrelationship, $fcage, $fcstatus, $fcoccu, $fcincome, $altconnum, $pension);
						$stmt->fetch();
					?>
					<form class="forms-sample" method="post" enctype="multipart/form-data">
						<table width="60%" cellpadding="5" cellspacing="5" align="center">
						<tr class="form-group">
							<td style="width:30%">Senior Number:</td>
							<td><input required class="form-control" type="text" name="stuid" style="width:100%;" placeholder="Enter Senior ID Number" value="<?=$stuid?>"></td>
						</tr>
						<tr>
							<td style="width:30%">Sur Name:</td>
							<td><input pattern="[^\d]*" required class="form-control" style="text-transform: uppercase" type="text" name="stuname" style="width:100%;" placeholder="Enter Sur Name" value="<?=$stuname?>"></td>
						</tr>
						<tr>
							<td style="width:30%">First Name:</td>
							<td><input pattern="[^\d]*" required class="form-control" style="text-transform: uppercase" type="text" name="fname" style="width:100%;" placeholder="Enter First Name" value="<?=$fname?>"></td>
						</tr>
						<tr>
							<td style="width:30%">Middle Name:</td>
							<td><input pattern="[^\d]*" required class="form-control" style="text-transform: uppercase" type="text" name="mname" style="width:100%;" placeholder="Enter Middle Name" value="<?=$mname?>"></td>
						</tr>
						<tr>
							<td style="width:30%">Nick Name:</td>
							<td><input pattern="[^\d]*" title="Please enter letters only" style="text-transform: uppercase" required type="text" class="form-control" name="nname" value="<?=$nname?>" style="width:100%;" placeholder="Enter Nick Name"></td>
						</tr>
						<tr>
							<td style="width:30%">Date of Birth:</td>
							<td><input id="txtbirthdate" required class="form-control"  maxlength="10" type="date" name="dob" onkeyup="getAgeVal(0)" onblur="getAgeVal(0);" style="width:100%;" value="<?=$dob?>"></td>
						</tr>
						<tr>
							<td style="width:30%">Age:</td>
							<td><input type="text" name="age" value="<?=$age?>" id="txtage" class="form-control"  maxlength="10" pattern="[0-9]+" autocomplete="off"></td>
						</tr>
						<tr>
							<td style="width:30%">Gender:</td>
							<td><select style="text-transform: uppercase" name="gender" value="" class="form-control" required='true'>
                        <option value="<?=$gender?>"><?=$gender?></option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                  </select>
							</td>
						</tr>
						<tr>
							<td style="width:30%">Religion:</td>
							<td><input pattern="[^\d]*" style="text-transform: uppercase" type="text" name="religion" value="<?=$religion?>" class="form-control" placeholder="Enter your Religion" required='true'></td>
						</tr>
						<tr>
							<td style="width:30%">Place of Birth:</td>
							<td><input pattern="[^\d]*" style="text-transform: uppercase" type="text" name="pob" value="<?=$pob?>" class="form-control" placeholder="Enter your Place of Birth" required='true'></td>
						</tr>
						<tr>
						<td style="width:30%">Contact Number:</td>
							<td><input type="text" name="connum" value="<?=$connum?>" class="form-control" placeholder="Enter your Contact Number" required='true' maxlength="11" pattern="[0-9]+"></td>
						</tr>
						<tr>
						<td style="width:30%">Email:</td>
							<td><input type="text" name="stuemail" value="<?=$stuemail?>" class="form-control" placeholder="Enter your Email" required='true'></td>
						</tr>
						<tr>
						<td style="width:30%">Civil Status:</td>
							<td><select style="text-transform: uppercase" name="cstatus" value="" class="form-control" required='true'>
                          <option value="<?=$cstatus?>"><?=$cstatus?></option>
                          <option value="Male">Single</option>
                          <option value="Married">Married</option>
                          <option value="Divorced">Divorced</option>
                          <option value="Separated">Separated</option>
                          <option value="Widowed">Widowed</option>
                        </select></td>
						</tr>
						<tr>
						<td style="width:30%">Purok Adress:</td>
							<td> <input style="text-transform: uppercase" type="text" name="paddress" value="<?=$paddress?>" class="form-control" placeholder="Enter your Purok Address" required='true'></td>
						</tr>
						<tr>
							<td style="width:30%">Barangay</td>
							<td><select style="text-transform: uppercase"  name="barangay" value="<?=$barangay?>" class="form-control" required='true'>
                        <option value="<?=$barangay?>"><?=$barangay?></option>
                          <option value="Abachanan">Abachanan</option>
                          <option value="Anibongan">Anibongan</option>
                          <option value="Bugsok">Bugsok</option>
                          <option value="Cahayag">Cahayag</option>
                          <option value="Canlangit">Canlangit</option>
                          <option value="Canta-ub">Canta-ub</option>
                          <option value="Casilay">Casilay</option>
                          <option value="Danicop">Danicop</option>
                          <option value="Dusita">Dusita</option>
                          <option value="La Union">La Union</option>
                          <option value="Lataban">Lataban</option>
                          <option value="Magsaysay">Magsaysay</option>
                          <option value="Matin-ao">Matin-ao</option>
                          <option value="Nan-od">Nan-od</option>
                          <option value="Poblacion">Poblacion</option>
                          <option value="Salvador">Salvador</option>
                          <option value="San Augustin">San Augustin</option>
                          <option value="San Isidro">San Isidro</option>
                          <option value="San Jose">San Jose</option>
                          <option value="San Juan">San Juan</option>
                          <option value="Santa Cruz">Santa Cruz</option>
                          <option value="Villa Garcia">Villa Garcia</option>
                        </select></td>
						</tr>
						<tr>
						<td style="width:30%">Educational Attainment:</td>
							<td><input pattern="[^\d]*" style="text-transform: uppercase" type="text" name="eduat" value="<?=$eduat?>" class="form-control" placeholder="Enter your Educational Attainment" required='true'></td>
						</tr>
						<tr>
						<td style="width:30%">Skills:</td>
							<td> <input pattern="[^\d]*" style="text-transform: uppercase" type="text" name="skills" value="<?=$skills?>" class="form-control" placeholder="Enter your Skills" required='true'></td>
						</tr>
						<tr>
						<td style="width:30%">Occupation:</td>
							<td><input pattern="[^\d]*" style="text-transform: uppercase" type="text" name="occu" value="<?=$occu?>" class="form-control" required='true'></td>
						</tr>
						<tr>
						<td style="width:30%">Annual Income:</td>
							<td> <input id="anincome" type="text" name="anincome" value="<?=$anincome?>" class="form-control" placeholder="Enter your Annual Income" required='true' maxlength="20"></td>
						</tr>
											
<script>
  // Get the input element
  var input = document.getElementById("anincome");

  // Add event listener to the input element
  input.addEventListener("input", function() {
    // Get the input value
    var value = this.value;

    // Remove all non-numeric characters
    value = value.replace(/[^0-9]/g, "");

    // Format the value with commas and periods
    var formattedValue = "₱" + value.replace(/\B(?=(\d{3})+(?!\d))/g, ","); 
    formattedValue = formattedValue.replace(/(\d)(?=(\d{2})+\d$)/g, "$1.");

    // Set the formatted value back to the input element
    this.value = formattedValue;
  });
</script>
						<tr>
						<td style="width:30%">With Pension?:</td>
							<td><select style="text-transform: uppercase" name="pension" value="" class="form-control" required='true'>
                          <option value="<?=$pension?>"><?=$pension?></option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select></td>
						</tr>
						<tr>
						<td style="width:30%">Name of Benefactor, if any:</td>
							<td> <input pattern="[^\d]*" style="text-transform: uppercase" type="text" name="nob" value="<?=$nob?>" class="form-control" placeholder="Enter the name of your benefactor" required='true'></td>
						</tr>
						<div>
							<td style="font-weight: bold;"><h5>Family Composition</h5></td>
							</div>
					<tr>
					  <td style="width:30%">Name:</td>
							<td><input pattern="[^\d]*" style="text-transform: uppercase" type="text" name="fcname" value="<?=$fcname?>" class="form-control" placeholder="Enter Name of Benefactor" required='true'></td>
						</tr>
						<tr>
						<td style="width:30%">Relationship:</td>
							<td> <input pattern="[^\d]*" style="text-transform: uppercase" type="text" name="fcrelationship" value="<?=$fcrelationship?>" class="form-control" placeholder="Enter your Relationship" required='true'></td>
						</tr>
						<tr>
						<td style="width:30%">Age:</td>
							<td><input type="text" name="fcage" value="<?=$fcage?>" class="form-control" placeholder="Enter Age" required='true' maxlength="10" pattern="[0-9]+"></td>
						</tr>
						<tr>
						<td style="width:30%">Civil Status:</td>
							<td> <select style="text-transform: uppercase" name="fcstatus" value="" class="form-control" required='true'>
                          <option value="<?=$fcstatus?>"><?=$fcstatus?></option>
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                          <option value="Divorced">Divorced</option>
                          <option value="Separated">Separated</option>
                          <option value="Widowed">Widowed</option>
                        </select></td>
						</tr>
						<tr>
					  <td style="width:30%">Occupation:</td>
							<td><input pattern="[^\d]*" style="text-transform: uppercase" type="text" name="fcoccu" value="<?=$fcoccu?>" class="form-control" placeholder="Enter Occupation" required='true'></td>
						</tr>
						<tr>
						<td style="width:30%">Income:</td>
							<td><input  id="anincome2" type="text" name="fcincome" value="<?=$fcincome?>" class="form-control" placeholder="Enter Income" required='true' maxlength="20"></td>
						</tr>
						<script>
  // Get the input element
  var input = document.getElementById("anincome2");

  // Add event listener to the input element
  input.addEventListener("input", function() {
    // Get the input value
    var value = this.value;

    // Remove all non-numeric characters
    value = value.replace(/[^0-9]/g, "");

    // Format the value with commas and periods
    var formattedValue = "₱" + value.replace(/\B(?=(\d{3})+(?!\d))/g, ","); 
    formattedValue = formattedValue.replace(/(\d)(?=(\d{2})+\d$)/g, "$1.");

    // Set the formatted value back to the input element
    this.value = formattedValue;
  });
</script>
						<tr>
						<td style="width:30%">Contact Number:</td>
							<td> <input type="text" name="altconnum" value="<?=$altconnum?>" class="form-control" placeholder="Enter Contact Number" required='true' maxlength="11" pattern="[0-9]+"></td>
						</tr>
                        <tr>
							<td><input type="hidden" style="text-transform: uppercase" name="status" value="Approved" class="form-control" required='true'></td>
						</tr>
						<tr>
							<td></td>
							<td>
							<a href="pending-list.php" class="btn btn-info">Back to Pending List</a>
								<button type="submit" name="btnSubmit" class="btn btn-primary">Submit to Waiting List</button>
								<!-- <a href="manage_senior.php" class="btn btn-info">Back to manage senior</a> -->
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