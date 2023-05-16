<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
require 'connect.php';
require 'config.php';
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Student  Management System|||Manage Students</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                      <a href="add-senior.php" class="btn btn-sm btn-primary"><i class="icon-plus"></i> Add New Senior</a>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">No</th>
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
                        //get page number
                        if(isset($_GET['page_no']) && $_GET['page_no'] !==""){
                          $page_no = $_GET['page_no'];
                        }else{
                          $page_no = 1;
                        }
                        //total rows or records to display
                        $total_records_per_page = 20;
                        //get the page offset for the limit query
                        $offset = ($page_no - 1) * $total_records_per_page;
                        //get previous page
                        $previous_page = $page_no - 1;
                        //get the next page
                        $next_page = $page_no +1;
                        //get the total count of records
                         $result_count = mysqli_query($con, "SELECT COUNT(*) as total_records FROM tblsenior");
                        //total records
                         $records = mysqli_fetch_array($result_count);
                        //store total records to avariable
                         $total_records = $records['total_records'];
                        //get total pages
                         $total_no_of_pages = ceil($total_records / $total_records_per_page);

              $counter = 1;
							$stmt = $mysqli->prepare("SELECT `id`, `StuID`, `SurName`, `FirstName`, `MiddleName`, `Barangay`, `Gender`, `Age`, `DateofAdmission` FROM `tblsenior` ORDER BY `SurName`, `FirstName`, `MiddleName` ASC LIMIT $offset, $total_records_per_page");
							$stmt->execute();
							$stmt->store_result();
							if( $stmt->num_rows > 0 ) {
								$stmt->bind_result($id, $stuid, $stuname, $fname, $mname, $barangay, $gender, $age, $DateofAdmission );
								while( $stmt->fetch() ) {

                            ?>   
                          <tr>
                          <td><?=$counter?></td>          
                          <td><?=$stuid?></td>
								          <td class="strupper"><?=$stuname?>, <?=$fname?> <?=$mname?></td>
								          <td class="strupper"><?=$barangay?></td>
								          <td class="strupper"><?=$gender?></td>
                          <td><?=$age?></td>
								          <td><?=$DateofAdmission?></td>
								              <td align="center">
									            <a href="edit-senior.php?id=<?=$id?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</a>
									            <a href="delete_employee.php?id=<?=$id?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i> Delete</a>
								              <a href="Generate-id.php?id=<?=$id?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>Generate ID</a>
                            </td>
							      </tr>
                    <?php $counter++;?>
						<?php } } else {?>
						 <tr>
								<td colspan="5" align="center">No Senior found.</td>
							</tr>
							<?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <div>
                      <nav aria-label="Page navigation example" style="margin-top: 30px;">
  <ul class="pagination justify-content-end">
    <li class="page-item"><a class="page-link <?= ($page_no <= 1) ? 'disabled' : ''; ?> " <?= ($page_no > 1) ? 'href=?page_no=' .$previous_page : ''; ?>>Previous</a>
  </li>
                
    <?php for ($counters = 1; $counters <= $total_no_of_pages; $counters++) { ?>

      <?php if($page_no !== $counters){ ?>

    <li class="page-item"><a class="page-link" href="?page_no=<?= $counters; ?>"><?= $counters; ?></a></li>

    <?php } else { ?>

      <li class="page-item"><a class="page-link active"><?= $counters; ?></a></li>
      <?php }?>
    <?php }?>

    <li class="page-item"><a class="page-link <?= ($page_no >= $total_no_of_pages) ? 'disabled' : ''; ?>" <?= ($page_no < $total_no_of_pages) ? 'href=?page_no=' . $next_page : ''; ?>>Next</a>
    </li>
  </ul>
</nav>
<div class="p-10" style="margin-top: -45px;">
  <strong>Page <?= $page_no;?> of <?= $total_no_of_pages; ?></strong>
</div>
</div>
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
</html><?php  ?>