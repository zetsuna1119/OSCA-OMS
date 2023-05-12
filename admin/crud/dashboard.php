<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } else{
   
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Senior Citizen Profiling Management System|||Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css">
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
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="d-sm-flex align-items-baseline report-summary-header">
                          <h5 class="font-weight-semibold">Report Summary</h5> <span class="ml-auto">Updated Report</span> <button class="btn btn-icons border-0 p-2"><i class="icon-refresh"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="row report-inner-cards-wrapper">
                      <div class=" col-md -6 col-xl report-inner-card">
                        <div class="inner-card-text">
                           <?php 
                        $sql1 ="SELECT * from  tblclass";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totclass=$query1->rowCount();
?>
                          <span class="report-title">Total Barangay</span>
                          <h4><?php echo htmlentities($totclass);?></h4>
                          <a href="manage-class.php"><span class="report-count"> View Barangay</span></a>
                        </div>
                        <div class="inner-card-icon bg-success">
                          <i class="icon-home"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <?php 
                        $sql2 ="SELECT * from  tblsenior";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$totstu=$query2->rowCount();
?>
                          <span class="report-title">Total Registered Seniors</span>
                          <h4><?php echo htmlentities($totstu);?></h4>
                          <a href="manage-students.php"><span class="report-count"> View Registered Seniors</span></a>
                        </div>
                        <div class="inner-card-icon bg-danger">
                          <i class="icon-user"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <?php 
                        $sql3 ="SELECT * from  tblnotice";
$query3 = $dbh -> prepare($sql3);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$totnotice=$query3->rowCount();
?>
                          <span class="report-title">Total Barangay Notice</span>
                          <h4><?php echo htmlentities($totnotice);?></h4>
                          <a href="manage-notice.php"><span class="report-count"> View Notices</span></a>
                        </div>
                        <div class="inner-card-icon bg-warning">
                          <i class="icon-doc"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <?php 
                        $sql4 ="SELECT * from  tblpublicnotice";
$query4 = $dbh -> prepare($sql4);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
$totpublicnotice=$query4->rowCount();
?>
                          <span class="report-title">Total Public Notice</span>
                          <h4><?php echo htmlentities($totpublicnotice);?></h4>
                          <a href="manage-public-notice.php"><span class="report-count"> View PublicNotices</span></a>
                        </div>
                        <div class="inner-card-icon bg-primary">
                          <i class="icon-doc"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
           <!-- Mao nig code sa chart! -->

            <!-- <div class="offcanvas offcanvas-start show text-bg-dark" tabindex="-1" id="offcanvasDark" aria-labelledby="offcanvasDarkLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkLabel">Reports</h5>
              </div>
                <div class="offcanvas-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="card">
                        <div class="card-header">Charts</div>
                        <div class="card-body">
                        <canvas class="chart" width="400" height="200"></canvas>
                       
                        </div>
                      </div>
                    </div>
                  </div>
           
                </div>
            </div> -->
            

            <div class="offcanvas offcanvas-start show text-bg-dark" tabindex="-1" id="offcanvasDark" aria-labelledby="offcanvasDarkLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkLabel"></h5>
              </div>
                <div class="offcanvas-body">
                  <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                      <div class="card">
                      <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Online Registration Application</h4>
                      <a href="#" class="text-dark ml-auto mb-3 mb-sm-0"></a>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">S.No</th>
                            <th class="font-weight-bold">Senior ID</th>
                            <th class="font-weight-bold">Senior Barangay</th>
                            <th class="font-weight-bold">Senior Name</th>
                            <th class="font-weight-bold">Senior Contact</th>
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
        $no_of_records_per_page = 15;
        $offset = ($pageno-1) * $no_of_records_per_page;
       $ret = "SELECT ID FROM tblsenior";
$query1 = $dbh -> prepare($ret);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$total_rows=$query1->rowCount();
$total_pages = ceil($total_rows / $no_of_records_per_page);
$sql="SELECT tblsenior.StuID,tblsenior.ID as sid,tblsenior.SurName,tblsenior.CitiEmail,tblsenior.Barangay,tblsenior.DateofAdmission,tblclass.ClassName,tblclass.Section from tblsenior join tblclass on tblclass.ID=tblsenior.StudentClass LIMIT $offset, $no_of_records_per_page";
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
                            <td><?php  echo htmlentities($row->StuID);?></td>
                            <td><?php  echo htmlentities($row->Section);?></td>
                            <td><?php  echo htmlentities($row->Section);?></td>
                            <td><?php  echo htmlentities($row->Barangay);?></td>
                            <td><?php  echo htmlentities($row->Email);?></td>
                            <td><?php  echo htmlentities($row->DateofAdmission);?></td>
                            <td>
                              <div><a href="edit-student-detail.php?editid=<?php echo htmlentities ($row->sid);?>"><i class="icon-eye"></i></a>
                                                || <a href="manage-students.php?delid=<?php echo ($row->sid);?>" onclick="return confirm('Do you really want to Delete ?');"> <i class="icon-trash"></i></a></div>
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
                  </div>
                </div>
              </div>
            
                       
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
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/moment/moment.min.js"></script>
    <script src="vendors/daterangepicker/daterangepicker.js"></script>
    <script src="vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <script src="js/script.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html><?php }  ?>