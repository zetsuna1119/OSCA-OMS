<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
require 'connect.php';
require 'config.php';
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
   
    <title>Student  Management System|||Search Students</title>
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
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include_once('includes/sidebar.php');?>
        <!-- partial -->

<style>
  input[type=text] {
    width: 50%;
    padding: 10px 20px;
    margin: 8px 0px;
    box-sizing: border-box;
    border: 2px solid #1fd655;
    border-radius: 10px;
  }
  .bttnclick {
    padding: 10px 15px;
    font-size: 24px;
    text-align: center;
    cursor: pointer;
    outline: none;
    color: #fff;
    margin-left: 20px;
    background-color: #1fd655;
    border: none;
    border-radius: 10px;
    box-shadow: 0 9px #999;
  }
  .bttnclick:hover {
    background-color: #242424;
    color: #1fd655;
  }
  .bttnclick:active {
    background-color: #3e8e41;
    box-shadow: 0 5px #666;
    transform: translate(4px);
  }
  .bttnimport {
    position: relative;
    border-radius: 10px;
    background-color: #1fd655;
    margin-left: auto;
    margin-right: 30px;
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
  .strupper{
        text-transform: uppercase;
      }
    .sers{
      font-size: 18px;
    }
    select[type=text] {
    width: 50%;
    padding: 5px 18px;
    margin: 8px 0px;
    box-sizing: border-box;
    border: 1px solid #1fd655;
    border-radius: 5px;
  }
</style>

        <div class="main-panel">
          <div class="content-wrapper">
             <div class="page-header">
              <div class="sers">
             <label for="ser">Generate Reports</label>
              </div>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Search Barangay</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                      <form method="post">
                    
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