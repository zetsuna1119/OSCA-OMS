<?php
require 'connect.php';
require 'image_connection.php';
// Form click or submit
if( isset($_POST['btnSubmit']) ) {
	// Fetch input $_POST
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
	$stmt = $mysqli->prepare("INSERT INTO `tblonline_registration` (`id`, `SurName`, `FirstName`, `MiddleName`, `NickName`, `DOB`, `Age`, `Gender`, `Religion`, `PoB`, `ContactNumber`, `CitiEmail`, `CivilStatus`, `PuAddress`, `Barangay`,  `EduAt`, `Skills`, `Occupation`, `AnIncome`, `NoB`, `FcName`, `Relationship`, `FcAge`, `FcCiviStatus`, `Fcoccupation`, `FcIncome`, `AltenateNumber`, `Pension`, `Status`) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	// Bind params
	$stmt->bind_param( "issssssssssssssssssssssssssss", $id, $stuname, $fname, $mname, $nname, $dob, $age, $gender, $religion, $pob, $connum, $stuemail, $cstatus, $paddress, $barangay, $eduat, $skills, $occu, $anincome, $nob, $fcname, $fcrelationship, $fcage, $fcstatus, $fcoccu, $fcincome, $altconnum, $pension, $status);
	// Execute query
	if( $stmt->execute() ) {
		echo '<script>alert("Application form submitted. You can now go to OSCA office to approved your application. Thank you!")</script>';
		echo "<script>window.location.href ='../index.php'</script>";
		// $alert_message = "Employee has been saved.";
	} else {
		// $alert_message = "There was an error in saving the employee. Please try again.";
		echo '<script>alert("There was an error in saving your details. Please try again")</script>';
	}
	// Close database connection
	$mysqli->close();
}
?>
<html>
	<head>
		<title>Online Registration Form</title>
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
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style1.css" />
	</head>
	<body>
	<div class="container-scroller">
<style>
H10 {
  position: relative;
  font-size: 30px;
  font-family: Georgia, 'Times New Roman', Times, serif;
}
.tunga {
  position: auto;
  text-align: center;
  top: 10px;
  left: 300px;
}
.pic {
  position: auto;
  top: 0%;
  left: 300%;
}
h11 {
  position: relative;
  font-size: 30px;
  font-family: Georgia, 'Times New Roman', Times, serif;
}
img {
  border-radius: 20%;
  width: 10%;
  height: 10%;
}
h14 {
  position: absolute;
  font-size: 20px;
  text-align: left;
  font-family: Georgia, 'Times New Roman', Times, serif;
  color: #ffffff;
  margin-top: 50px;
  margin-left: 10px;
}
</style>
		<td class="col-12 grid-margin stretch-card">
          <div class="card">
              <div class="card-body">
		<table width="70%" cellpadding="2" cellspacing="2" align="center" style="margin-top:0px;">
		<div class="tunga">
      <div class="pic">
          <img src="images/sierralogo.jpg" alt= "Avatar">
      </div>
          <H10><b>OFFICE OF THE SENIOR CITIZENS AFFAIRS (OSCA)</b></H10><br>
          <H11>Municipality of Sierra Bullones</b></H11> <BR></BR>
          <H10><b>REGISTRATION FORM</b></H10><br> <BR></BR>
			</div>
			<tr>
				<td>
					<?php 
					if( isset( $alert_message ) AND !empty( $alert_message )) {
						echo "<div class='alert alert-success'>".$alert_message."</div>";
					}
					?>
					<form method="post" enctype="multipart/form-data">
						<table width="60%" cellpadding="5" cellspacing="5" align="center">
						<tr>
							<td style="width:30%">Sur Name:</td>
							<td><input style="text-transform: uppercase" required type="text" class="form-control" name="stuname" style="width:100%;" placeholder="Enter your SurName"></td>
						</tr>
						<tr>
							<td style="width:30%">First Name:</td>
							<td><input style="text-transform: uppercase" required type="text" class="form-control" name="fname" style="width:100%;" placeholder="Enter First Name"></td>
						</tr>
						<tr>
							<td style="width:30%">Middle Name:</td>
							<td><input style="text-transform: uppercase" required type="text" class="form-control" name="mname" style="width:100%;" placeholder="Enter Middle Name"></td>
						</tr>
						<tr>
							<td style="width:30%">Nick Name:</td>
							<td><input style="text-transform: uppercase" required type="text" class="form-control" name="nname" style="width:100%;" placeholder="Enter Nick Name"></td>
						</tr>
						<tr>
							<td style="width:30%">Date of Birth:</td>
							<td><input id="txtbirthdate" required class="form-control"  maxlength="10" type="date" name="dob" onkeyup="getAgeVal(0)" onblur="getAgeVal(0);" style="width:100%;" value=""></td>
							<!-- <td><input id="txtbirthdate" type="text" name="txtbirthdate" maxlength="10" onkeyup="getAgeVal(0)" onblur="getAgeVal(0);"></td> -->
						</tr>
						<tr>
							<td style="width:30%">Age:</td>
							<!-- <td><input type="text" name="age" value="" class="form-control" placeholder="ENTER YOUR AGE" required='true' maxlength="10" pattern="[0-9]+"> -->
							<td><input type="text" name="age" id="txtage" class="form-control"  maxlength="10" pattern="[0-9]+" autocomplete="off"></td>
						</tr>
						<tr>
							<td style="width:30%">Gender:</td>
							<td><select style="text-transform: uppercase" name="gender" placeholder="Enter your Gender"  value="" class="form-control" required='true'>
                        			<option value="">Choose your gender</option>
                          			<option value="Male">Male</option>
                          			<option value="Female">Female</option>
                  				</select>
							</td>
						</tr>
						<tr>
							<td style="width:30%">Religion:</td>
							<td><input style="text-transform: uppercase" type="text" name="religion" value="" class="form-control" placeholder="Enter your Religion" required='true'></td>
						</tr>
						<tr>
							<td style="width:30%">Place of Birth:</td>
							<td><input style="text-transform: uppercase" type="text" name="pob" value="" class="form-control" placeholder="Enter your Place of Birth" required='true'></td>
						</tr>
						<tr>
						<td style="width:30%">Contact Number:</td>
							<td><input type="text" name="connum" value="" class="form-control" placeholder="ENTER YOUR CONTACT NUMBER" required='true' maxlength="11" pattern="[0-9]+"></td>
						</tr>
						<tr>
						<td style="width:30%">Email:</td>
							<td><input type="email" name="stuemail" value="" class="form-control" placeholder="ENTER YOUR EMAIL" required='true'></td>
						</tr>
						<tr>
						<td style="width:30%">Civil Status:</td>
							<td><select style="text-transform: uppercase" name="cstatus" value="" class="form-control" required='true'>
                          <option value="">Choose your Status</option>
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                          <option value="Divorced">Divorced</option>
                          <option value="Separated">Separated</option>
                          <option value="Widowed">Widowed</option>
                        </select></td>
						</tr>
						<tr>
						<td style="width:30%">Purok Adress:</td>
							<td> <input style="text-transform: uppercase" type="text" name="paddress" value="" class="form-control" placeholder="Enter your Purok Address" required='true'></td>
						</tr>
						<tr>
							<td style="width:30%">Barangay</td>
					  <td>
						<select style="text-transform: uppercase"  name="barangay" value="" class="form-control" required='true'>
                    	  <option value="">Choose your Barangay</option>
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
                        </select>
					  </td>
						</tr>
						<tr>
						<td style="width:30%">Educational Attainment:</td>
							<td><input style="text-transform: uppercase" type="text" name="eduat" value="" class="form-control" placeholder="Enter your Educational Attainment" required='true'></td>
						</tr>
						<tr>
						<td style="width:30%">Skills:</td>
							<td> <input style="text-transform: uppercase" type="text" name="skills" value="" class="form-control" placeholder="Enter your Skills" required='true'></td>
						</tr>
						<tr>
						<td style="width:30%">Occupation:</td>
							<td><input style="text-transform: uppercase" placeholder="Enter your Occupation" type="text" name="occu" value="" class="form-control" required='true'></td>
						</tr>
						<tr>
						<td style="width:30%">Annual Income:</td>
							<td> <input style="text-transform: uppercase" type="text" name="anincome" value="" class="form-control" placeholder="Enter your Annual Income" required='true' maxlength="20" pattern="[0-9]+"></td>
						</tr>
						<tr>
						<td style="width:30%">With Pension?:</td>
					<td>
						<select style="text-transform: uppercase" name="pension" value="" class="form-control" required='true'>
                          <option value="">Do you have pension?</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
					</td>
						</tr>
						<tr>
						<td style="width:30%">Name of Benefactor, if any:</td>
							<td> <input style="text-transform: uppercase" type="text" name="nob" value="" class="form-control" placeholder="Enter the name of your benefactor" required='true'></td>
						</tr>
						<div>
							<td style="font-weight: bold;"><h5>Family Composition</h5></td>
							</div>
					<tr>
					  <td style="width:30%">Name:</td>
							<td><input style="text-transform: uppercase" type="text" name="fcname" value="" class="form-control" placeholder="Enter Name of Benefactor" required='true'></td>
						</tr>
						<tr>
						<td style="width:30%">Relationship:</td>
							<td><input style="text-transform: uppercase" type="text" name="fcrelationship" value="" class="form-control" placeholder="Enter your Relationship" required='true'></td>
						</tr>
						<tr>
						<td style="width:30%">Age:</td>
							<td><input style="text-transform: uppercase" type="text" name="fcage" value="" class="form-control" placeholder="Enter Age" required='true' maxlength="10" pattern="[0-9]+"></td>
						</tr>
						<tr>
						<td style="width:30%">Civil Status:</td>
						  <td><select style="text-transform: uppercase" name="fcstatus" value="" class="form-control" required='true'>
                          <option value="">Enter Status</option>
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                          <option value="Divorced">Divorced</option>
                          <option value="Separated">Separated</option>
                          <option value="Widowed">Widowed</option>
                        </select></td>
						</tr>
						<tr>
					  <td style="width:30%">Occupation:</td>
							<td><input style="text-transform: uppercase" type="text" name="fcoccu" value="" class="form-control" placeholder="Enter Occupation" required='true'></td>
						</tr>
						<tr>
						<td style="width:30%">Income:</td>
							<td><input style="text-transform: uppercase" type="text" name="fcincome" value="" class="form-control" placeholder="Enter Income" required='true' maxlength="20" pattern="[0-9]+"></td>
						</tr>
						<tr>
						<td style="width:30%">Contact Number:</td>
							<td><input style="text-transform: uppercase" type="text" name="altconnum" value="" class="form-control" placeholder="Enter Contact Number" required='true' maxlength="11" pattern="[0-9]+"></td><br>
						</tr>
						<tr>
							<td><input type="hidden" style="text-transform: uppercase" name="status" value="Pending" class="form-control" required='true'></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
								<a href="../index.php" class="btn btn-info">Back</a>
							</td>
						</tr>
						</table>
					</form>
				</td>
			</tr>
		</table>
		</td>
		</td>
		</td>
	</div>
	</body>
</html>