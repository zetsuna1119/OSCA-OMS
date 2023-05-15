<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
require 'connect.php';
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {
 $stuname=$_POST['stuname'];
 $mname=$_POST['mname'];
 $fname=$_POST['fname'];
 $nname=$_POST['nname'];
 $dob=$_POST['dob'];
 $age=$_POST['age'];
 $gender=$_POST['gender'];
 $religion=$_POST['religion'];
 $pob=$_POST['pob'];
 $connum=$_POST['connum'];
 $cstatus=$_POST['cstatus'];
 $paddress=$_POST['paddress'];
 $barangay=$_POST['barangay'];
 $eduat=$_POST['eduat'];
 $skills=$_POST['skills'];
 $occu=$_POST['occu'];
 $anincome=$_POST['anincome'];
 $image=$_FILES["image"]["name"];
 $pension=$_POST['pension'];
 $nob=$_POST['nob'];
 $fcname=$_POST['fcname'];
 $fcrelationship=$_POST['fcrelationship'];
 $fcage=$_POST['fcage'];
 $fcstatus=$_POST['fcstatus'];
 $fcoccu=$_POST['fcoccu'];
 $fcincome=$_POST['fcincome'];
 $altconnum=$_POST['altconnum'];
 $stuemail=$_POST['stuemail'];
 $stuid=$_POST['stuid'];
 $uname=$_POST['uname'];
 $password=md5($_POST['password']);
 $ret="select UserName from tblsenior where UserName=:uname || StuID=:stuid";
 $query= $dbh -> prepare($ret);
$query->bindParam(':uname',$uname,PDO::PARAM_STR);
$query->bindParam(':stuid',$stuid,PDO::PARAM_STR);
$query-> execute();
     $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() == 0)
{
$extension = substr($image,strlen($image)-4,strlen($image));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Logo has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
$image=md5($image).time().$extension;
 move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$image);
$sql="insert into tblsenior(StuID,SurName,MiddleName,FirstName,NickName,DOB,Age,Gender,PoB,Religion,ContactNumber,CitiEmail,CivilStatus,PuAddress,Barangay,EduAt,Skills,Occupation,AnIncome,Pension,NoB,FcName,Relationship,FcAge,FcCiviStatus,FcIncome,Fcoccupation,AltenateNumber,UserName,Password,Image)values(:stuid,:stuname,:mname,:fname,:nname,:dob,:age,:gender,:pob,:religion,:connum,:stuemail,:cstatus,:paddress,:barangay,:eduat,:skills,:occu,:anincome,:pension,:nob,:fcname,:fcrelationship,:fcage,:fcstatus,:fcincome,:fcoccu,:altconnum,:uname,:password,:image)";
$query=$dbh->prepare($sql);
$query->bindParam(':stuid',$stuid,PDO::PARAM_STR);
$query->bindParam(':stuname',$stuname,PDO::PARAM_STR);
$query->bindParam(':mname',$mname,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':nname',$nname,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':age',$age,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':pob',$pob,PDO::PARAM_STR);
$query->bindParam(':religion',$religion,PDO::PARAM_STR);
$query->bindParam(':connum',$connum,PDO::PARAM_STR);
$query->bindParam(':stuemail',$stuemail,PDO::PARAM_STR);
$query->bindParam(':cstatus',$cstatus,PDO::PARAM_STR);
$query->bindParam(':paddress',$paddress,PDO::PARAM_STR);
$query->bindParam(':barangay',$barangay,PDO::PARAM_STR);
$query->bindParam(':eduat',$eduat,PDO::PARAM_STR);
$query->bindParam(':skills',$skills,PDO::PARAM_STR);
$query->bindParam(':occu',$occu,PDO::PARAM_STR);
$query->bindParam(':anincome',$anincome,PDO::PARAM_STR);
$query->bindParam(':pension',$pension,PDO::PARAM_STR);
$query->bindParam(':nob',$nob,PDO::PARAM_STR);
$query->bindParam(':fcname',$fcname,PDO::PARAM_STR);
$query->bindParam(':fcrelationship',$fcrelationship,PDO::PARAM_STR);
$query->bindParam(':fcage',$fcage,PDO::PARAM_STR);
$query->bindParam(':fcstatus',$fcstatus,PDO::PARAM_STR);
$query->bindParam(':fcincome',$fcincome,PDO::PARAM_STR);
$query->bindParam(':fcoccu',$fcoccu,PDO::PARAM_STR);
$query->bindParam(':altconnum',$altconnum,PDO::PARAM_STR);
$query->bindParam(':image',$image,PDO::PARAM_STR);
$query->bindParam(':uname',$uname,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Senior has been added.")</script>';
echo "<script>window.location.href ='manage-online-registration.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}}

else
{

echo "<script>alert('Username or Senior Id or Senior has already exist. Please try again');</script>";
}
}
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Student  Management System|| Add Students</title>
    <!-- plugins:css -->
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
    
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
      <?php include_once('includes/sidebar.php');?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Approved Online Registration </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">View & Add Senior Citizen</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Edit Online Application</h4>
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
                      <div class="form-group">
                        <label for="exampleInputName1">Add Citizen Photo</label>
                        <input type="file" name="image" value="<?=$filename?>" class="form-control" required='true'>
                      </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Senior Citizen ID</label>
                        <input type="text" name="stuid" value="<?=$stuid?>" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">SurName</label>
                        <input pattern="[^\d]*" style="text-transform: uppercase" type="text" name="stuname" value="<?=$stuname?>" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">First Name</label>
                        <input pattern="[^\d]*" style="text-transform: uppercase" type="text" name="fname" value="<?=$fname?>" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Middle Name</label>
                        <input pattern="[^\d]*" style="text-transform: uppercase"  type="text" name="mname" value="<?=$mname?>" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Nick Name</label>
                        <input pattern="[^\d]*" style="text-transform: uppercase"  type="text" name="nname" value="<?=$nname?>" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Date of Birth</label>
                        <input id="txtbirthdate" required class="form-control"  maxlength="10" type="date" name="dob" onkeyup="getAgeVal(0)" onblur="getAgeVal(0);" style="width:100%;" value="<?=$dob?>">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Age</label>
                        <input type="text" name="age" value="<?=$age?>" id="txtage" class="form-control"  maxlength="10" pattern="[0-9]+" autocomplete="off">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Gender</label>
                        <select style="text-transform: uppercase" name="gender" value="<?=$gender?>" class="form-control" required='true'>
                          <option value="<?=$gender?>"><?=$gender?></option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Religion</label>
                        <input pattern="[^\d]*" style="text-transform: uppercase" type="text" name="religion" value="<?=$religion?>" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Place of Birth</label>
                        <input pattern="[^\d]*" style="text-transform: uppercase" type="text" name="pob" value="<?=$pob?>" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Contact Number</label>
                        <input type="text" name="connum" value="<?=$connum?>" class="form-control" required='true' maxlength="11" pattern="[0-9]+">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Citizen Email</label>
                        <input type="email" name="stuemail" value="<?=$stuemail?>" class="form-control" required='true'>
                      </div> 

                      <div class="form-group">
                        <label for="exampleInputName1">Civil Status</label>
                        <select style="text-transform: uppercase" name="cstatus" value="<?=$cstatus?>" class="form-control" required='true'>
                          <option value="<?=$cstatus?>"><?=$cstatus?></option>
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                          <option value="Divorced">Divorced</option>
                          <option value="Separated">Separated</option>
                          <option value="Widowed">Widowed</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Purok Address</label>
                        <input style="text-transform: uppercase" type="text" name="paddress" value="<?=$paddress?>" class="form-control" placeholder="" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail3">Barangay</label>
                        <select style="text-transform: uppercase"  name="barangay" value="<?=$barangay?>" class="form-control" required='true'>
                          <option value="<?=$barangay?>"><?=$barangay?></option>
                         <option value="">>>Choose Barangay<<</option>
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
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Educational Attainment</label>
                        <input pattern="[^\d]*" style="text-transform: uppercase" type="text" name="eduat" value="<?=$eduat?>" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Skills</label>
                        <input pattern="[^\d]*" style="text-transform: uppercase" type="text" name="skills" value="<?=$skills?>" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Occupation</label>
                        <input pattern="[^\d]*" style="text-transform: uppercase" type="text" name="occu" value="<?=$occu?>" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Annual Income</label>
                        <input id="anincome" type="text" name="anincome" value="<?=$anincome?>" class="form-control" required='true' maxlength="20">
                      </div>
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
                      <div class="form-group">
                        <label for="exampleInputName1">Pension</label>
                        <select style="text-transform: uppercase" name="pension" value="" class="form-control" required='true'>
                          <option value="<?=$pension?>"><?=$pension?></option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Name of Benefactor, if any:</label>
                        <input pattern="[^\d]*" style="text-transform: uppercase" type="text" name="nob" value="<?=$nob?>" class="form-control" required='true'>
                      </div>

                      <h3>Family Composition</h3>

                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input pattern="[^\d]*" style="text-transform: uppercase" type="text" name="fcname" value="<?=$fcname?>" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Relationship</label>
                        <input pattern="[^\d]*" style="text-transform: uppercase" type="text" name="fcrelationship" value="<?=$fcrelationship?>" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Age</label>
                        <input type="text" name="fcage" value="<?=$fcage?>" class="form-control" required='true' maxlength="10" pattern="[0-9]+">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Civil Status</label>
                        <select style="text-transform: uppercase" name="fcstatus" value="<?=$fcstatus?>" class="form-control" required='true'>
                          <option value="<?=$fcstatus?>"><?=$fcstatus?></option>
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                          <option value="Divorced">Divorced</option>
                          <option value="Separated">Separated</option>
                          <option value="Widowed">Widowed</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Occupation</label>
                        <input pattern="[^\d]*" style="text-transform: uppercase" type="text" name="fcoccu" value="<?=$fcoccu?>" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Income</label>
                        <input type="text" name="fcincome" id="anincome2" value="<?=$fcincome?>" class="form-control" required='true' maxlength="20">
                      </div>
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
                      <div class="form-group">
                        <label for="exampleInputName1">Contact Number</label>
                        <input type="text" name="altconnum" value="<?=$altconnum?>" class="form-control" required='true' maxlength="11" pattern="[0-9]+">
                      </div> 
                  
<h3>Make a Login Details</h3>
<div class="form-group">
                        <label for="exampleInputName1">User Name</label>
                        <input type="text" name="uname" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Password</label>
                        <input type="Password" name="password" value="" class="form-control" required='true'>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Register</button>
                     
                    </form>
                    <?php } else {
						echo "Invalid employee";
					} ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <?php include_once('includes/footer.php');?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
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
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/select2/select2.min.js"></script>
    <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>
    <!-- End custom js for this page -->
  </body>
</html><?php }  ?>