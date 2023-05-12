<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } else{
   // Code for deletion
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql="delete from tblsenior where ID=:rid";
$query=$dbh->prepare($sql);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
$query->execute();
 echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'manage-students.php'</script>";     


}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Student  Management System|||Manage Students</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- End layout styles -->
   
  </head>
  <body>
    <style>
      .strupper{
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
  margin-top: 5px;
}
    </style>
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
              <h3 class="page-title"> Manage Seniors List </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Manage Seniors </li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">All Registered Seniors List</h4>
                      <a href="#" class="text-dark ml-auto mb-3 mb-sm-0"> View all Registered Seniors </a>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">S.No</th>
                            <th class="font-weight-bold">Citizens ID</th>
                            <th class="font-weight-bold" style="text-align: center">Citizens Name</th>
                            <th class="font-weight-bold">Barangay</th>
                            <th class="font-weight-bold">Gender</th>
                            <th class="font-weight-bold">Age</th>
                            <th class="font-weight-bold">Registration Date</th>
                            <th class="font-weight-bold">Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                           <?php
                            if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        // Formula for pagination
        $no_of_records_per_page = 20;
        $offset = ($pageno-1) * $no_of_records_per_page;
       $ret = "SELECT ID FROM tblsenior";
$query1 = $dbh -> prepare($ret);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$total_rows=$query1->rowCount();
$total_pages = ceil($total_rows / $no_of_records_per_page);
$sql="SELECT * from tblsenior ORDER BY `SurName`, `FirstName`, `MiddleName` ASC LIMIT $offset, $no_of_records_per_page";
// $sql="SELECT tblsenior.StuID,tblsenior.ID as sid,tblsenior.SurName,tblsenior.MiddleName,tblsenior.FirstName,tblsenior.CitiEmail,tblsenior.DateofAdmission,tblclass.Section from tblsenior join tblclass on tblclass.ID=tblsenior.StudentClass LIMIT $offset, $no_of_records_per_page";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>   
                          <tr>
                           
                            <td><?php echo htmlentities($cnt);?></td>
                            <td><?php echo htmlentities($row->StuID);?></td>
                            <td class="strupper"><?php echo htmlentities($row->SurName);?>, <?php echo htmlentities($row->FirstName);?> <?php echo htmlentities($row->MiddleName);?></td>
                            <td class="strupper"><?php echo htmlentities($row->Barangay);?></td>
                            <td class="strupper"><?php echo htmlentities($row->Gender);?></td>
                            <td class="strupper"><?php echo htmlentities($row->Age);?></td>
                            <td><?php echo htmlentities($row->DateofAdmission);?></td>
                            <td>
                              <div><a href="edit-student-detail.php?editid=<?php echo htmlentities ($row->sid);?>"><i class="icon-eye"></i></a>
                                                || <a href="manage-students.php?delid=<?php echo ($row->sid);?>" onclick="return confirm('Do you really want to Delete ?');"> <i class="icon-trash"></i></a>
                                                || <button class="bttnlist" id="myBtn"><span>View</span></button></div>
                            </td> 
                          </tr><?php $cnt=$cnt+1;}} ?>
                        </tbody>
                      </table>
                    </div>
                    <div align="left">
    <ul class="pagination" >
        <li><a href="?pageno=1"><strong>First></strong></a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><strong style="padding-left: 10px">Prev></strong></a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><strong style="padding-left: 10px">Next></strong></a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>"><strong style="padding-left: 10px">Last</strong></a></li>
    </ul>
</div>
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
    <div class="strupper">
     
    <img src="images/<?php echo $row->Image;?>" class="img1" width="150" height="150" value="<?php  echo $row->Image;?>">
  
      <p>Name: <?php  echo htmlentities($row->SurName);?>, <?php  echo htmlentities($row->FirstName);?> <?php  echo htmlentities($row->MiddleName);?></p>
      <p>Date of Birth: <?php  echo htmlentities($row->DOB);?> Age: <?php  echo htmlentities($row->Age);?></p>
      <p>Sex: <?php  echo htmlentities($row->Gender);?> Civil Status: <?php  echo htmlentities($row->CivilStatus);?></p>
      <p>Religion: <?php  echo htmlentities($row->Religion);?></p>
      <p>Place of Birth: <?php  echo htmlentities($row->PoB);?></p>
      <p>Address: <?php echo htmlentities($row->Barangay);?>, Sierra Bullones, Bohol</p>
      <p>Educational Attainment: <?php echo htmlentities($row->EduAt);?></p>
      <p>Skills: <?php echo htmlentities($row->Skills);?></p>
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
    <script src="./vendors/chart.js/Chart.min.js"></script>
    <script src="./vendors/moment/moment.min.js"></script>
    <script src="./vendors/daterangepicker/daterangepicker.js"></script>
    <script src="./vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html><?php }  ?>