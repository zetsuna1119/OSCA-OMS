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
             <label for="ser"> Upcoming Birthday's</label>
              </div>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Birthday's</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">No</th>
                            <th class="font-weight-bold" style="text-align: center">Citizens Name</th>
                            <th class="font-weight-bold">Barangay</th>
                            <th class="font-weight-bold">Gender</th>
                            <th class="font-weight-bold">Age</th>
                            <th class="font-weight-bold">Date of Birth</th>
                            <th class="font-weight-bold" style="text-align: center">Status</th>
                            <th class="font-weight-bold">Action</th>
                          </tr>
                        </thead>
                        <tbody>
    <?php
    // Get current date
    $currentDate = date('Y-m-d');

    // Get page number
    if (isset($_GET['page_no']) && $_GET['page_no'] !== "") {
        $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
    }

    // Total rows or records to display
    $total_records_per_page = 30;

    // Get the page offset for the limit query
    $offset = ($page_no - 1) * $total_records_per_page;

    // Get the total count of records
    $result_count = mysqli_query($con, "SELECT COUNT(*) as total_records FROM tblsenior");

    // Total records
    $records = mysqli_fetch_array($result_count);

    // Store total records to a variable
    $total_records = $records['total_records'];

    // Get total pages
    $total_no_of_pages = ceil($total_records / $total_records_per_page);

    $counter = 1;
    $stmt = $mysqli->prepare("SELECT `id`, `SurName`, `FirstName`, `MiddleName`, `Barangay`, `Gender`, `Age`, `DOB`,
            DATEDIFF(DATE_FORMAT(CONCAT(YEAR(CURDATE()), '-', MONTH(DOB), '-', DAY(DOB)), '%Y-%m-%d'), CURDATE()) AS days_before_birthday
            FROM `tblsenior`
            WHERE DATE_FORMAT(CONCAT(YEAR(CURDATE()), '-', MONTH(DOB), '-', DAY(DOB)), '%Y-%m-%d') >= CURDATE()
            ORDER BY DATE_FORMAT(CONCAT(YEAR(CURDATE()), '-', MONTH(DOB), '-', DAY(DOB)), '%m-%d') ASC
            LIMIT $offset, $total_records_per_page");
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $stuname, $fname, $mname, $barangay, $gender, $age, $dob, $days_before_birthday);

        while ($stmt->fetch()) {
            ?>
            <tr>
                <td><?= $counter ?></td>
                <td class="strupper"><?= $stuname ?>, <?= $fname ?> <?= $mname ?></td>
                <td class="strupper"><?= $barangay ?></td>
                <td class="strupper"><?= $gender ?></td>
                <td><?= $age ?></td>
                <td><?= $dob ?></td>
                <?php if ($days_before_birthday >= 0): ?>
    <?php if ($days_before_birthday == 0): ?>
        <td><?= $days_before_birthday ?> Today's Birthday!</td>
    <?php else: ?>
        <td><?= $days_before_birthday ?> day(s) before birthday</td>
    <?php endif; ?>
<?php else: ?>
    <td>Birthday passed</td>
<?php endif; ?>

                <td align="center">
                    <a href="edit-ol-reg-pending.php?id=<?= $id ?>" class="btn btn-sm btn-success"><i
                                class="fa fa-edit"></i>Edit</a>
                    <a href="delete_olreg_senior.php?id=<?= $id ?>" class="btn btn-sm btn-danger"
                       onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>
                        Delete</a>
                </td>
            </tr>
            <?php
            $counter++;
        }
    } else {
        ?>
        <tr>
            <td colspan="5" align="center">No Online Application Found.</td>
        </tr>
        <?php
    }
    ?>
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