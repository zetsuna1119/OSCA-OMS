<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
require 'connect.php';
require 'config.php';
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "seniorcitizendb";

// Create a new MySQLi instance
$mysqli = new mysqli($servername, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
if (isset($_POST['submit'])) {
  // Retrieve the selected IDs
  if (isset($_POST['selected_ids']) && is_array($_POST['selected_ids'])) {
    $selectedIds = $_POST['selected_ids'];

    // Loop through the selected IDs and insert them into the database
    foreach ($selectedIds as $selectedId) {
      // Perform your database insertion here using prepared statements to prevent SQL injection
      $stuid = $mysqli->real_escape_string($_POST['stuid']);
      $stuname = $mysqli->real_escape_string($_POST['stuname']);
      $fname = $mysqli->real_escape_string($_POST['fname']);
      $mname = $mysqli->real_escape_string($_POST['mname']);
      $nname = $mysqli->real_escape_string($_POST['nname']);
      $dob = $mysqli->real_escape_string($_POST['dob']);
      $age = $mysqli->real_escape_string($_POST['age']);
      $gender = $mysqli->real_escape_string($_POST['gender']);
      $religion = $mysqli->real_escape_string($_POST['religion']);
      $pob = $mysqli->real_escape_string($_POST['pob']);
      $connum = $mysqli->real_escape_string($_POST['connum']);
      $stuemail = $mysqli->real_escape_string($_POST['stuemail']);
      $cstatus = $mysqli->real_escape_string($_POST['cstatus']);
      $paddress = $mysqli->real_escape_string($_POST['paddress']);
      $barangay = $mysqli->real_escape_string($_POST['barangay']);
      $eduat = $mysqli->real_escape_string($_POST['eduat']);
      $skills = $mysqli->real_escape_string($_POST['skills']);
      $occu = $mysqli->real_escape_string($_POST['occu']);
      $anincome = $mysqli->real_escape_string($_POST['anincome']);
      $nob = $mysqli->real_escape_string($_POST['nob']);
      $fcname = $mysqli->real_escape_string($_POST['fcname']);
      $fcrelationship = $mysqli->real_escape_string($_POST['fcrelationship']);
      $fcage = $mysqli->real_escape_string($_POST['fcage']);
      $fcstatus = $mysqli->real_escape_string($_POST['fcstatus']);
      $fcoccu = $mysqli->real_escape_string($_POST['fcoccu']);
      $fcincome = $mysqli->real_escape_string($_POST['fcincome']);
      $altconnum = $mysqli->real_escape_string($_POST['altconnum']);
      $pension = $mysqli->real_escape_string($_POST['pension']);

      // Prepared statement
      $stmt = $mysqli->prepare("INSERT INTO `tbl_checkbox` (`StuID`, `SurName`, `FirstName`, `MiddleName`, `NickName`, `DOB`, `Age`, `Gender`, `Religion`, `PoB`, `ContactNumber`, `CitiEmail`, `CivilStatus`, `PuAddress`, `Barangay`, `EduAt`, `Skills`, `Occupation`, `AnIncome`, `NoB`, `FcName`, `Relationship`, `FcAge`, `FcCiviStatus`, `Fcoccupation`, `FcIncome`, `AltenateNumber`, `Pension`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

      // Bind params
      $stmt->bind_param(
        "sssssssssssssssssssssssss",
        $stuid,
        $stuname,
        $fname,
        $mname,
        $nname,
        $dob,
        $age,
        $gender,
        $religion,
        $pob,
        $connum,
        $stuemail,
        $cstatus,
        $paddress,
        $barangay,
        $eduat,
        $skills,
        $occu,
        $anincome,
        $nob,
        $fcname,
        $fcrelationship,
        $fcage,
        $fcstatus,
        $fcoccu,
        $fcincome,
        $altconnum,
        $pension
      );

      // Execute query
      $stmt->execute();
    }

    // Display a success message or redirect to another page
    echo '<script>alert("Selected items have been added to the database.")</script>';
  } else {
    echo '<script>alert("No items selected.")</script>';
  }
} else {
    echo '<script>alert("Form not submitted.")</script>';
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
      .search-container {
  display: flex;
  justify-content: flex-end;
  margin: 20px 20px;
}

.search-container form {
  display: flex;
  align-items: center;
}

.search-container input[type="text"] {
  width: 200px;
}

@media screen and (max-width: 768px) {
  .search-container {
    justify-content: center;
  }
  
  .search-container form {
    flex-wrap: wrap;
  }
  
  .search-container input[type="text"] {
    width: 100%;
    margin-bottom: 10px;
  }
  
  .search-container button[type="submit"] {
    width: 100%;
  }
}

  input[name="search"] {
  width: 50px;
  margin-right: 5px;
  box-sizing: border-box;
    border: 2px solid #1fd655;
}
.dropdown-item:focus, .dropdown-item:hover {
  background-color: #1fd655;
}
.dropdown-item {
  background-color: skyblue;
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
                    <div class="d-sm-flex align-items-left mb-4">
                      <a href="add-students.php" class="btn btn-sm btn-primary"><i class="icon-plus"></i> Add New Senior</a>
                    </div>
<div class="search-container">
  <form action=""  method="GET">
    <input type="text" name="search" placeholder="Search by SurName..." required='true'>
    <button  class="btn btn-sm btn-primary" type="submit">Search</button>
</div>                
     <!-- Add a search form -->
     <form action="process.php" method="POST">
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
                            <th class="font-weight-bold">Action</th>
                          </tr>
                        </thead>
                      <tbody>
<?php
// Get page number
if(isset($_GET['page_no']) && $_GET['page_no'] !==""){
  $page_no = $_GET['page_no'];
}else{
  $page_no = 1;
}
// Get total records per page
if(isset($_GET['show_entries']) && $_GET['show_entries'] !== ""){
  $total_records_per_page = $_GET['show_entries'];
}else{
  $total_records_per_page = 50; // Default value
}

// Get the page offset for the limit query
$offset = ($page_no - 1) * $total_records_per_page;

// Get previous page
$previous_page = $page_no - 1;

// Get the next page
$next_page = $page_no + 1;

// Get the total count of records
$result_count = mysqli_query($con, "SELECT COUNT(*) as total_records FROM tblsenior");
$records = mysqli_fetch_array($result_count);
$total_records = $records['total_records']; // Store total records to a variable

// Get total pages
$total_no_of_pages = ceil($total_records / $total_records_per_page);

$counter = 1;
$search = isset($_GET['search']) ? $_GET['search'] : ''; // Get the search query

$stmt = $mysqli->prepare("SELECT `id`, `StuID`, `SurName`, `FirstName`, `MiddleName`, `Barangay`, `Gender`, `Age` FROM `tblsenior` WHERE `SurName` LIKE '%$search%' OR `MiddleName` LIKE '%$search%' OR `FirstName` LIKE '%$search%' ORDER BY `SurName`, `FirstName`, `MiddleName` ASC LIMIT $offset, $total_records_per_page");
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
  $stmt->bind_result($id, $stuid, $stuname, $fname, $mname, $barangay, $gender, $age);

  while ($stmt->fetch()) {
    ?>
    <tr>
      <td><?=$counter?></td>
      <td><?=$stuid?></td>
      <td class="strupper"><?=$stuname?>, <?=$fname?> <?=$mname?></td>
      <td class="strupper"><?=$barangay?></td>
      <td class="strupper"><?=$gender?></td>
      <td><?=$age?></td>
      <td align="center">
      <input type="checkbox" name="selected_ids[]" value="<?= $id ?>" class="checkbox" onclick="updateSelected(this)">

          </td>
    </tr>
    <?php
    $counter++;
  }
} else {
?>
  <tr>
    <td colspan="8" align="center">No Senior found.</td>
  </tr>
<?php } ?>
</tbody>
</form>
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
<button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>

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