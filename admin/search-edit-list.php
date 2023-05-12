<?php 
include('includes/dbconnection.php');
require 'connect.php';
require 'config.php';
// Form click or submit
if( isset($_POST['btnSubmit']) ) 
{

	// Fetch input $_POST
	
	$stuid = $mysqli->real_escape_string( $_POST['stuid'] );
	$stuname = $mysqli->real_escape_string( $_POST['stuname'] );
	$fname = $mysqli->real_escape_string( $_POST['fname'] );
	$mname = $mysqli->real_escape_string( $_POST['mname'] );
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

	// Prepared statement
	$stmt = $mysqli->prepare("UPDATE `tblsenior` SET `StuID`=?, `SurName`=?, `FirstName`=?, `MiddleName`=?, `DOB`=?, `Age`=?, `Gender`=?, `Religion`=?, `PoB`=?, `ContactNumber`=?, `CitiEmail`=?, `CivilStatus`=?, `PuAddress`=?, `Barangay`=?, `EduAt`=?, `Skills`=?, `Occupation`=?, `AnIncome`=?, `NoB`=?, `FcName`=?,  `Relationship`=?, `FcAge`=?, `FcCiviStatus`=?, `Fcoccupation`=?, `FcIncome`=?, `AltenateNumber`=?,  `Pension`=? WHERE `id`=?");

	// Bind params
	$stmt->bind_param( "sssssssssssssssssssssssssssi", $stuid, $stuname, $fname, $mname, $dob, $age, $gender, $religion, $pob, $connum, $stuemail, $cstatus, $paddress, $barangay, $eduat, $skills, $occu, $anincome, $nob, $fcname, $fcrelationship, $fcage, $fcstatus, $fcoccu, $fcincome, $altconnum, $pension, $_GET['id'] );

	// Execute query
	if( $stmt->execute() ) {
		echo '<script>alert("Senior details has been updated")</script>';
		echo "<script>window.location.href ='manage_senior.php'</script>";
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
margin-left: 200px;
margin-right: auto;
}
	.strupper{
text-transform: uppercase;
}/* The Modal (background) */
	.strupper1{
text-transform: uppercase;
}/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: absolute; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: auto; /* Location of the box */
  padding-left: auto;
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin-top: 500px;
  margin: auto;
  border: 3px solid #000000;
  width: 600px;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}
/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}
@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}
/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}
.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
.modal-header {
  padding: 2px 16px;
  background-color:#1fd655;
  color: white;
}
.modal-body {
  padding: 2px 16px;
}
.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
  .img1{
  display: block;
  position: auto;
  margin-left: auto;
  margin-right: auto;
}
h21 {
  font-size:25px;
  font-family: 'Times New Roman';
  color: #181824;
}
p {
  font-weight: bold;
  font-size: 13px;
  margin-top: auto;
}
.bttnlist {
  border-radius: 10px;
  background-color: #181824;
  margin-bottom: 10px;
  position: relative;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 15px;
  padding: 10px;
  height: 35px;
  width: 100px;
  transition: all 0.5s;
  cursor: pointer;
}
.bttnlist span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}
.bttnlist span:after {
  content: '\00bb';
  position: absolute;
  color: #1fd655;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}
.bttnlist:hover span {
  color: #1fd655;
  padding-right: 25px;
}
.bttnlist:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
	<body>
		<table width="70%" cellpadding="2" cellspacing="2" align="center" style="margin-top:20px;">
			<tr>
				<td align="center"><h2>Edit Senior Details</h2></td>
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
					$stmt = $mysqli->prepare("SELECT `StuID`, `SurName`, `FirstName`, `MiddleName`, `DOB`, `Age`, `Gender`, `Religion`, `PoB`, `ContactNumber`, `CitiEmail`, `CivilStatus`, `PuAddress`, `Barangay`, `EduAt`, `Skills`, `Occupation`, `AnIncome`, `NoB`, `FcName`, `Relationship`, `FcAge`, `FcCiviStatus`, `Fcoccupation`, `FcIncome`, `AltenateNumber`, `Pension`, `Image` FROM `tblsenior` WHERE `id` = ?");
					$stmt->bind_param("i", $_GET['id']);
					$stmt->execute();
					$stmt->store_result();
					if( $stmt->num_rows == 1 ) {
						$stmt->bind_result($stuid, $stuname, $fname, $mname, $dob, $age, $gender, $religion, $pob, $connum, $stuemail, $cstatus, $paddress, $barangay, $eduat, $skills, $occu, $anincome, $nob, $fcname, $fcrelationship, $fcage, $fcstatus, $fcoccu, $fcincome, $altconnum, $pension, $image);
						$stmt->fetch();
					?>
					<div class="cent">
    <?php
    if(isset($_POST['update_image'])) {
        $new_image = $_FILES['new_image']['name'];
        $extension = substr($new_image, strlen($new_image)-4, strlen($new_image));
        $allowed_extensions = array(".jpg","jpeg",".png",".gif");
        if(!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Logo has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        } else {
            $new_image = md5($new_image) . time() . $extension;
            move_uploaded_file($_FILES['new_image']['tmp_name'], "images/" . $new_image);
            $update_sql = "UPDATE tblsenior SET Image=:new_image WHERE Image=:image";
            $update_query = $dbh->prepare($update_sql);
            $update_query->bindParam(':new_image', $new_image, PDO::PARAM_STR);
            $update_query->bindParam(':image', $image, PDO::PARAM_STR);
            $update_query->execute();
			echo '<script>alert("Image has been updated!")</script>';
			$image = $new_image; // update the $image variable with the new image filename
        }
    }
    ?>
    <img src="images/<?=$image?>" width="120" height="120" value="<?=$image?>"><a href="update_image.php?id=<?$id;?>"> &nbsp;</a>
    <button class="bttnlist" id="myBtn"><span>View</span></button>
</div>

<form class="forms-sample" method="post" enctype="multipart/form-data">
    <table width="60%" cellpadding="5" cellspacing="5" align="center">
        <tr class="form-group">
            <td style="width:30%">Update Image:</td>
            <td><input type="file" name="new_image"><br><br></td>
            <td><input type="submit" name="update_image" value="Update Image"><br><br></td>
        </tr> 

						<tr class="form-group">
							<td style="width:30%">Senior Number:</td>
							<td><input required class="form-control" type="text" name="stuid" style="width:100%;" placeholder="Enter Senior ID Number" value="<?=$stuid?>"></td>
						</tr>
						<tr>
							<td style="width:30%">Sur Name:</td>
							<td><input required class="form-control" style="text-transform: uppercase" type="text" name="stuname" style="width:100%;" placeholder="Enter Sur Name" value="<?=$stuname?>"></td>
						</tr>
						<tr>
							<td style="width:30%">First Name:</td>
							<td><input required class="form-control" style="text-transform: uppercase" type="text" name="fname" style="width:100%;" placeholder="Enter First Name" value="<?=$fname?>"></td>
						</tr>
						<tr>
							<td style="width:30%">Middle Name:</td>
							<td><input required class="form-control" style="text-transform: uppercase" type="text" name="mname" style="width:100%;" placeholder="Enter Middle Name" value="<?=$mname?>"></td>
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
							<td><input style="text-transform: uppercase" type="text" name="religion" value="<?=$religion?>" class="form-control" placeholder="Enter your Religion" required='true'></td>
						</tr>
						<tr>
							<td style="width:30%">Place of Birth:</td>
							<td><input style="text-transform: uppercase" type="text" name="pob" value="<?=$pob?>" class="form-control" placeholder="Enter your Place of Birth" required='true'></td>
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
							<td><input style="text-transform: uppercase" type="text" name="eduat" value="<?=$eduat?>" class="form-control" placeholder="Enter your Educational Attainment" required='true'></td>
						</tr>
						<tr>
						<td style="width:30%">Skills:</td>
							<td> <input style="text-transform: uppercase" type="text" name="skills" value="<?=$skills?>" class="form-control" placeholder="Enter your Skills" required='true'></td>
						</tr>
						<tr>
						<td style="width:30%">Occupation:</td>
							<td><input style="text-transform: uppercase" type="text" name="occu" value="<?=$occu?>" class="form-control" required='true'></td>
						</tr>
						<tr>
						<td style="width:30%">Annual Income:</td>
							<td> <input type="text" name="anincome" value="<?=$anincome?>" class="form-control" placeholder="Enter your Annual Income" required='true' maxlength="20" pattern="[0-9]+"></td>
						</tr>
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
							<td> <input style="text-transform: uppercase" type="text" name="nob" value="<?=$nob?>" class="form-control" placeholder="Enter the name of your benefactor" required='true'></td>
						</tr>
						<div>
							<td style="font-weight: bold;"><h5>Family Composition</h5></td>
							</div>
					<tr>
					  <td style="width:30%">Name:</td>
							<td><input style="text-transform: uppercase" type="text" name="fcname" value="<?=$fcname?>" class="form-control" placeholder="Enter Name of Benefactor" required='true'></td>
						</tr>
						<tr>
						<td style="width:30%">Relationship:</td>
							<td> <input style="text-transform: uppercase" type="text" name="fcrelationship" value="<?=$fcrelationship?>" class="form-control" placeholder="Enter your Relationship" required='true'></td>
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
							<td><input style="text-transform: uppercase" type="text" name="fcoccu" value="<?=$fcoccu?>" class="form-control" placeholder="Enter Occupation" required='true'></td>
						</tr>
						<tr>
						<td style="width:30%">Income:</td>
							<td>  <input type="text" name="fcincome" value="<?=$fcincome?>" class="form-control" placeholder="Enter Income" required='true' maxlength="20" pattern="[0-9]+"></td>
						</tr>
						<tr>
						<td style="width:30%">Contact Number:</td>
							<td> <input type="text" name="altconnum" value="<?=$altconnum?>" class="form-control" placeholder="Enter Contact Number" required='true' maxlength="11" pattern="[0-9]+"></td>
						</tr>
						<tr>
							<td></td>
							<td>
							<a href="search-senior-list.php" class="btn btn-danger">Back</a>
							<button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
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
		<body>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
    <h21>Senior Profile</h21>
      <span class="close">&times;</span>
     <style>
		a{
  display: block;
  position: auto;
  margin-left: 100px;
  margin-right: auto;
}
.pos{
  display: block;
  position: auto;
  margin-left: 300px;
  margin-right: auto;
  margin-top: -35px;
}
	 </style>
    </div>
    <div class="modal-body">
    <div class="strupper">
     
    <img src="images/<?=$image?>" class="img1" width="120" height="120" value="<?=$image?>">
  
	  <p>OSCA ID: <?=$stuid?></p>
      <p>Name: <?=$stuname?>, <?=$fname?> <?=$mname?></p>
      <p>Date of Birth: <?=$dob?></p>
	  <p class="pos"> Age: <?=$age?></p>
      <p>Civil Status: <?=$cstatus?></p>
	  <p class="pos"> Gender: <?=$gender?></p>
      <p>Religion: <?=$religion?></p>
	  <p class="pos"> Occupation: <?=$occu?></p>
	  <p>Annual Income: <?=$anincome?></p>
	   <p class="pos"> Skills: <?=$skills?></p>
      <p>Place of Birth: <?=$pob?></p>
      <p>Address: <?=$paddress?>, <?=$barangay?>, Sierra Bullones, Bohol</p>
      <p>Educational Attainment: <?=$eduat?></p>
      <p>Name of Benefactor, if any: <?=$nob?></p>
      <h21>Family Composition</h21>
      <p>Name: <?=$fcname?></p>
      <p>Relationship: <?=$fcrelationship?></p>
	  <p class="pos">Age: <?=$fcage?></p>
      <p>Civil Status: <?=$fcstatus?></p>
	  <p class="pos">Occupation: <?=$fcoccu?></p>
      <p>Income: <?=$fcincome?></p>
    <!-- kung gustog naay footer ang modal</div>
    <div class="modal-footer">
      <h3>Modal Footer</h3>
    </div>
  </div> -->

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
	</body>
</html>