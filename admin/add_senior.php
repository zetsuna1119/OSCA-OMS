<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {
 $stuname=$_POST['stuname'];
 $mname=$_POST['mname'];
 $fname=$_POST['fname'];
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
$sql="insert into tblsenior(StuID,SurName,MiddleName,FirstName,DOB,Age,Gender,PoB,Religion,ContactNumber,CitiEmail,CivilStatus,PuAddress,Barangay,EduAt,Skills,Occupation,AnIncome,NoB,FcName,Relationship,FcAge,FcCiviStatus,FcIncome,Fcoccupation,AltenateNumber,UserName,Password,Image)values(:stuid,:stuname,:mname,:fname,:dob,:age,:gender,:pob,:religion,:connum,:stuemail,:cstatus,:paddress,:barangay,:eduat,:skills,:occu,:anincome,:nob,:fcname,:fcrelationship,:fcage,:fcstatus,:fcincome,:fcoccu,:altconnum,:uname,:password,:image)";
// ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
$query=$dbh->prepare($sql);
$query->bindParam(':stuid',$stuid,PDO::PARAM_STR);
$query->bindParam(':stuname',$stuname,PDO::PARAM_STR);
$query->bindParam(':mname',$mname,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
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
echo "<script>window.location.href ='manage_senior.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}}

else
{

echo "<script>alert('Username or Student Id  already exist. Please try again');</script>";
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
              <h3 class="page-title"> Add Senior Citizen </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Add Senior Citizen</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Add Citizen</h4>
                   
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                      
                    <div class="form-group">
                        <label for="exampleInputName1">Senior Citizen ID</label>
                        <input type="text" name="stuid" value="" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">SurName</label>
                        <input style="text-transform: uppercase" type="text" name="stuname" value="" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">First Name</label>
                        <input style="text-transform: uppercase" type="text" name="fname" value="" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Middle Name</label>
                        <input style="text-transform: uppercase"  type="text" name="mname" value="" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Date of Birth</label>
                        <input type="date" name="dob" value="" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Age</label>
                        <input type="text" name="age" value="" class="form-control" required='true' maxlength="10" pattern="[0-9]+">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Gender</label>
                        <select style="text-transform: uppercase" name="gender" value="" class="form-control" required='true'>
                          <option value="">Choose Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Religion</label>
                        <input style="text-transform: uppercase" type="text" name="religion" value="" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Place of Birth</label>
                        <input style="text-transform: uppercase" type="text" name="pob" value="" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Contact Number</label>
                        <input type="text" name="connum" value="" class="form-control" required='true' maxlength="10" pattern="[0-9]+">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Citizen Email</label>
                        <input type="text" name="stuemail" value="" class="form-control" required='true'>
                      </div> 

                      <div class="form-group">
                        <label for="exampleInputName1">Civil Status</label>
                        <select style="text-transform: uppercase" name="cstatus" value="" class="form-control" required='true'>
                          <option value=""><--Choose Status--></option>
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                          <option value="Divorced">Divorced</option>
                          <option value="Separated">Separated</option>
                          <option value="Widowed">Widowed</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Purok Address</label>
                        <input style="text-transform: uppercase" type="text" name="paddress" class="form-control" placeholder="" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail3">Barangay</label>
                        <select style="text-transform: uppercase"  name="barangay" class="form-control" required='true'>
                          <option value=""><--Select Barangay--></option>
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
                        <input style="text-transform: uppercase" type="text" name="eduat" value="" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Skills</label>
                        <input style="text-transform: uppercase" type="text" name="skills" value="" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Occupation</label>
                        <input style="text-transform: uppercase" type="text" name="occu" value="" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Annual Income</label>
                        <input type="text" name="anincome" value="" class="form-control" required='true' maxlength="20" pattern="[0-9]+">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Citizen Photo</label>
                        <input type="file" name="image" value="" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Name of Benefactor, if any:</label>
                        <input style="text-transform: uppercase" type="text" name="nob" value="" class="form-control" required='true'>
                      </div>

                      <h3>Family Composition</h3>

                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input style="text-transform: uppercase" type="text" name="fcname" value="" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Relationship</label>
                        <input style="text-transform: uppercase" type="text" name="fcrelationship" value="" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Age</label>
                        <input type="text" name="fcage" value="" class="form-control" required='true' maxlength="10" pattern="[0-9]+">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Civil Status</label>
                        <select style="text-transform: uppercase" name="fcstatus" value="" class="form-control" required='true'>
                          <option value=""><--Choose Status--></option>
                          <option value="Male">Single</option>
                          <option value="Married">Married</option>
                          <option value="Divorced">Divorced</option>
                          <option value="Separated">Separated</option>
                          <option value="Widowed">Widowed</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Occupation</label>
                        <input style="text-transform: uppercase" type="text" name="fcoccu" value="" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Income</label>
                        <input type="text" name="fcincome" value="" class="form-control" required='true' maxlength="20" pattern="[0-9]+">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputName1">Contact Number</label>
                        <input type="text" name="altconnum" value="" class="form-control" required='true' maxlength="10" pattern="[0-9]+">
                      </div> 
                  
<h3>Login details</h3>
<div class="form-group">
                        <label for="exampleInputName1">User Name</label>
                        <input type="text" name="uname" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Password</label>
                        <input type="Password" name="password" value="" class="form-control" required='true'>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Add</button>
                     
                    </form>
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
</html><?php }  ?>