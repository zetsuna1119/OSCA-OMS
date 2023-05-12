<?php
session_start();
error_reporting(0);
require 'connect.php';
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } else{
if( isset($_POST['submit']) ) {
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
  // $image = $mysqli->real_escape_string($_FILES["image"]["name"] );
  $nob = $mysqli->real_escape_string( $_POST['nob'] );
  $fcname = $mysqli->real_escape_string( $_POST['fcname'] );
  $fcrelationship = $mysqli->real_escape_string( $_POST['fcrelationship'] );
  $fcage = $mysqli->real_escape_string( $_POST['fcage'] );
  $fcstatus = $mysqli->real_escape_string( $_POST['fcstatus'] );
  $fcoccu = $mysqli->real_escape_string( $_POST['fcoccu'] );
  $fcincome = $mysqli->real_escape_string( $_POST['fcincome'] );
  $altconnum = $mysqli->real_escape_string( $_POST['altconnum'] );

// Prepared statement
$stmt = $mysqli->prepare("UPDATE `tblsenior` SET `StuID`=?, `SurName`=?, `FirstName`=?, `MiddleName`=?, `DOB`=?, `Age`=?, `Gender`=?, `Religion`=?, `PoB`=?, `ContactNumber`=?, `CitiEmail`=?, `CivilStatus`=?, `PuAddress`=?, `Barangay`=?, `EduAt`=?, `Skills`=?, `Occupation`=?, `AnIncome`=?, `Image`=?, `NoB`=?,`FcName`=?, `Relationship`=?, `FcAge`=?, `FcCiviStatus`=?, `Fcoccupation`=?, `FcIncome`=?,`AltenateNumber`=? WHERE `id`=?");

$stmt->bind_param( "issssssssssssssssssssssssss", $stuid, $stuname, $fname, $mname, $age, $gender, $religion, $pob, $connum, $stuemail, $cstatus, $paddress, $barangay, $eduat, $skills, $occu, $anincome, $image, $nob, $fcname, $fcrelationship, $fcage, $fcstatus, $fcoccu, $fcincome, $altconnum, $_GET['id'] );

if( $stmt->execute() ) {
  echo '<script>alert("Senior details has been updated")</script>';
  echo "<script>window.location.href ='manage_senior.php'</script>";
  // $alert_message = "Employee has been updated.";
} else {
  echo '<script>alert("There was an error in saving the employee. Please try again.")</script>';
  // $alert_message = "There was an error in saving the employee. Please try again.";
}

// Close prepare statement
$stmt->close();
}

  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Student  Management System|| Update Students</title>
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
        <style>
body {font-family: Arial, Helvetica, sans-serif;}

  .bttnimport {
    position: relative;
    border-radius: 10px;
    margin-left: auto;
    margin-right: auto;
    background-color: #1fd655;
    border: none;
    display: inline-block;
    font-size: 18px;
    color: #FFFFFF;
    padding: 10px;
    width: 150px;
    text-align: center;
    transition-duration: 0.4s;
    text-decoration: none;
    overflow: hidden;
    cursor: pointer;
  }
  .bttnimport {
   background-color:#3A9BDC;
   color: #FFFFFF;
  }
  .bttnimport:hover {
    background-color: #1fd655;
    color: #FFFFFF;
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
  height: 40px;
  width: 150px;
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
/* The Modal (background) */
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
  width: 500px;
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

.modal-body {padding: 2px 16px;}

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
  margin-top: 5px;
}
</style>

        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">             
<!-- Trigger/Open The Modal -->
<div>
<button class="bttnlist" id="myBtn"><span>View Profile</span></button>
<button type="submit" class="bttnimport" name="search" id="submit">Generate ID</button>
</div>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Update Senior Details</li>
                </ol>
              </nav>
            </div>
            <div class="row" style="text-transform: uppercase;">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Update Senior Details</h4>
                   
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <?php 
					if( isset( $alert_message ) AND !empty( $alert_message )) {
						echo "<div class='alert alert-success'>".$alert_message."</div>";
					}
					?>

					<?php 
					// Get employee details
					$stmt = $mysqli->prepare("SELECT `StuID`, `SurName`, `FirstName`, `MiddleName`, `DOB`, `Age`, `Gender`, `Religion`, `PoB`, `ContactNumber`, `CitiEmail`, `CivilStatus`, `PuAddress`, `Barangay`, `EduAt`, `Skills`, `Occupation`, `AnIncome`, `Image`, `NoB`, `FcName`, `Relationship`, `FcAge`, `FcCiviStatus`, `Fcoccupation`, `FcIncome`, `AltenateNumber` FROM `tblsenior` WHERE `id` = ?");
					$stmt->bind_param("i", $_GET['id']);
					$stmt->execute();
					$stmt->store_result();
					if( $stmt->num_rows == 1 ) {
						$stmt->bind_result($stuid, $stuname, $fname, $mname, $dob, $age, $gender, $religion, $pob, $connum, $stuemail, $cstatus, $paddress, $barangay, $eduat, $skills, $occu, $anincome, $image, $nob, $fcname, $fcrelationship, $fcage, $fcstatus, $fcoccu, $fcincome, $altconnum);
						$stmt->fetch();
// <!-- // $sql="SELECT tblsenior.StudentName,tblsenior.StudentEmail,tblsenior.StudentClass,tblsenior.Gender,tblsenior.DOB,tblsenior.StuID,tblsenior.FatherName,tblsenior.MotherName,tblsenior.ContactNumber,tblsenior.AltenateNumber,tblsenior.Address,tblsenior.UserName,tblsenior.Password,tblsenior.Image,tblsenior.DateofAdmission,tblclass.ClassName,tblclass.Section from tblsenior join tblclass on tblclass.ID=tblsenior.StudentClass where tblsenior.ID=:eid";
// $query = $dbh -> prepare($sql);
// $query->bindParam(':eid',$eid,PDO::PARAM_STR);
// $query->execute();
// $results=$query->fetchAll(PDO::FETCH_OBJ);
// $cnt=1; -->
             ?>
               <!-- <div class="form-group">
                        <label for="exampleInputName1">Citizens Photo</label><br>
                        <img src="images/<?=$image?>" width="100" height="100" value="<?=$image?>"><a href="changeimage.php?editid=<?$id;?>"> &nbsp; Edit Image</a>
                      </div> -->
                      
                      <div class="form-group">
                        <label for="exampleInputName1">Senior Citizen ID</label>
                        <input type="text" name="stuid" value="<?=$stuid?>" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">SurName</label>
                        <input type="text" style="text-transform: uppercase;" name="stuname" value="<?=$stuname?>" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Middle Name</label>
                        <input type="text" style="text-transform: uppercase" name="mname" value="<?=$mname?>" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">First Name</label>
                        <input type="text" style="text-transform: uppercase" name="fname" value="<?=$fname?>" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Date of Birth</label>
                        <input type="date" name="dob" value="<?=$dob?>" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Age</label>
                        <input type="text" name="age" value="<?=$age?>" class="form-control" required='true' maxlength="10" pattern="[0-9]+">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Gender</label>
                        <select style="text-transform: uppercase" name="gender" value="" class="form-control" required='true'>
                        <option value="<?=$gender?>"><?=$gender?></option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Religion</label>
                        <input style="text-transform: uppercase" type="text" name="religion" value="<?=$religion?>" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Place of Birth</label>
                        <input style="text-transform: uppercase" type="text" name="pob" value="<?=$pob?>" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Contact Number</label>
                        <input type="text" name="connum" value="<?=$connum?>" class="form-control" required='true' maxlength="11" pattern="[0-9]+">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Citizen Email</label>
                        <input type="text" name="stuemail" value="<?=$stuemail?>" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Civil Status</label>
                        <select style="text-transform: uppercase" name="cstatus" value="" class="form-control" required='true'>
                          <option value="<?=$cstatus?>"><?=$cstatus?></option>
                          <option value="Male">Single</option>
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
                        <input style="text-transform: uppercase" type="text" name="eduat" value="<?=$eduat?>" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Skills</label>
                        <input style="text-transform: uppercase" type="text" name="skills" value="<?=$skills?>" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Occupation</label>
                        <input style="text-transform: uppercase" type="text" name="occu" value="<?=$occu?>" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Annual Income</label>
                        <input type="text" name="anincome" value="<?=$anincome?>" class="form-control" required='true' maxlength="20" pattern="[0-9]+">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputName1">Name of Benefactor, if any:</label>
                        <input style="text-transform: uppercase" type="text" name="nob" value="<?=$nob?>" class="form-control" required='true'>
                      </div>

                       <h3>Family Composition</h3>

                       <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input style="text-transform: uppercase" type="text" name="fcname" value="<?=$fcname?>" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Relationship</label>
                        <input style="text-transform: uppercase" type="text" name="fcrelationship" value="<?=$fcrelationship?>" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Age</label>
                        <input type="text" name="fcage" value="<?=$fcage?>" class="form-control" required='true' maxlength="10" pattern="[0-9]+">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Civil Status</label>
                        <select style="text-transform: uppercase" name="fcstatus" value="" class="form-control" required='true'>
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
                        <input style="text-transform: uppercase" type="text" name="fcoccu" value="<?=$fcoccu?>" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Income</label>
                        <input type="text" name="fcincome" value="<?=$fcincome?>" class="form-control" required='true' maxlength="20" pattern="[0-9]+">
                      </div>

                      
                      <div class="form-group">
                        <label for="exampleInputName1">Contact Number</label>
                        <input type="text" name="altconnum" value="<?=$altconnum?>" class="form-control" required='true' maxlength="11" pattern="[0-9]+">
                      </div> 
<div class="form-group">
                        
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Update</button>
                     </div>                  
</form>
<?php } else {
						echo "Invalid employee";
					} ?>
<body>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
    <h21>Senior Profile</h21>
      <span class="close">&times;</span>
     
    </div>
    <div class="modal-body">
    <div>
     
    <img src="images/<?=$image?>" class="img1" width="100" height="100" value="<?php  echo $row->Image;?>">
  
      <p>Name: <?=$stuname?>, <?=$fname?> <?=$mname?></p>
      <p>Date of Birth: <?=$dob?> Age: <?=$age?> </p>
      <p>Sex: <?php  echo htmlentities($row->Gender);?> Civil Status: Religion:</p>
      <p>Place of Birth:</p>
      <p>Address: <?php echo htmlentities($row1->Barangay);?>, Sierra Bullones, Bohol</p>
      <p>Educational Attainment:</p>
      <p>Skills:</p>
      <p>Occupation:</p>
      <p>Annual Income:</p>
      <p>Name of Benefactor, if any: </p>
      <h21>Family Composition</h21>
      <p>Name: </p>
      <p>Relationship:</p>
      <p>Age:</p>
      <p>Civil Status:</p>
      <p>Occupation:</p>
      <p>Income:</p>
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
</html>

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
</html><?php } ?>