<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $adminid=$_SESSION['sturecmsaid'];
    $AName=$_POST['adminname'];
    $username=($_POST['username']);
    $password=md5($_POST['password']);
  $mobno=$_POST['mobilenumber'];
  $email=$_POST['email'];
  $sql="insert into tbladmin(AdminName,UserName,Password,MobileNumber,Email)values(:adminname,:username,:password,:mobilenumber,:email)";
     $query = $dbh->prepare($sql);
     $query->bindParam(':adminname',$AName,PDO::PARAM_STR);
     $query->bindParam(':username',$username,PDO::PARAM_STR);
     $query->bindParam(':password',$password,PDO::PARAM_STR);
     $query->bindParam(':mobilenumber',$mobno,PDO::PARAM_STR);
     $query->bindParam(':email',$email,PDO::PARAM_STR);
$query->execute();

    echo '<script>alert("New admin created successfully.")</script>';
    echo "<script>window.location.href ='profile.php'</script>";

  }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Student  Management System|| Profile</title>
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
              <h3 class="page-title"> Admin Profile </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Admin Profile</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Admin Profile</h4>
                   
                    <form class="forms-sample" method="post">
                      <div class="form-group">
                        <label for="exampleInputName1">Admin Name</label>
                        <input type="text" name="adminname" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">User Name</label>
                        <input type="text" name="username" value="" class="form-control" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Password</label>
                        <input type="text" name="password" value="" class="form-control" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Contact Number</label>
                        <input type="text" name="mobilenumber" value=""  class="form-control" maxlength='11' required='true' pattern="[0-9]+">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Email</label>
                         <input type="email" name="email" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <!-- <label for="exampleInputCity1">Admin Registration Date</label> -->
                         <input type="hidden" name="" value="" readonly="" class="form-control">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Create</button>
                     
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