<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
require 'connect.php';
require 'config.php';
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
    <style>
      .strupper{
        text-transform: uppercase;
      }
      .my-class {
        position: relative;
        float: right;
        margin-right: 11px;
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
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body" style="border: 2px solid #ccc;">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="d-sm-flex align-items-baseline report-summary-header">
                        <li class="nav-item dropdown">
                        <?php 
	function number_suffix($number){
		$ends = array('th','st','nd','rd','th','th','th','th','th','th');
		 if ((($number % 100) >= 11) && (($number%100) <= 13)){
			return $number. 'th';
		 }else{
			return $number.$ends[$number % 10];
		 }
	}
	
	$notifications=[];
	$current_month_day=date("m-d");
	$sql="select * from tblsenior where DATE_FORMAT(DOB, '%m-%d')='{$current_month_day}'";
	$res=$con->query($sql);
	if($res->num_rows>0){
		while($row=$res->fetch_assoc()){
			$age=(date("Y")-date("Y",strtotime($row["DOB"])));
			$notifications[]="<i class='icon-bell'></i>Today is <b>{$row["SurName"]}</b>'s ".number_suffix($age)." Birthday.<br> Wish <b>{$row["SurName"]}, {$row["FirstName"]}</b> a Happy Birthday!<br> Date of birth is <b>".date("d-m-Y",strtotime($row["DOB"]))."</b>";
    $stmt = $mysqli->prepare("UPDATE tblsenior SET Age = DATEDIFF(NOW(), DOB) / 365.25");
    $stmt->execute();
    }
	}
?>
				<?php if(count($notifications)>0): ?>
					<div class="dropdown-menu dropdown-menu-right p-2" aria-labelledby="navbarDropdown">
						<?php foreach($notifications as $row):?>
							<a class="dropdown-item pt-3 pb-3 alert alert-success" href="#"><?php echo $row; ?></a>
              <!-- <button class="bttnlist"><span>View</span></button> -->
						<?php endforeach;?>
					</div>
				<?php endif; ?>
			</li>
                           <h5 class="font-weight-semibold">Report Summary</h5> <span class="ml-auto">Who's Birthday Today?</span>
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					<i class='icon-bell'></i><e style="color: red; ">(<?php echo count($notifications);?>)<e>
				</a>
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
                          <a href="manage-barangay.php"><span class="report-count"> View Total Registered</span></a>
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
                          <a href="manage_senior.php"><span class="report-count"> View Registered Seniors</span></a>
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
            <div class="offcanvas offcanvas-start show text-bg-dark" tabindex="-1" id="offcanvasDark" aria-labelledby="offcanvasDarkLabel">
         <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkLabel">REPORTS</h5>
         </div>
            <div class="my-class">
              <div class="offcanvas-body">
                  <div class="row">
                      <div class="card" style=" width: 520px; height: 333px;">
                        <div class="card-header" style="border: 2px solid #ccc;">Total Number with Pension</div>
                        <div class="card-body" style="border: 2px solid #ccc;">
                        <canvas id="chart" style="margin: auto;"></canvas>
<?php
$sql = "SELECT COUNT(*) as count, Pension FROM tblsenior GROUP BY Pension";
$result = mysqli_query($con, $sql);
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[$row['Pension']] = $row['count'];
}
  ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script>
        var ctx = document.getElementById('chart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['No', 'Yes'],
                datasets: [{
                    label: 'Pension',
                    data: <?php echo json_encode(array_values($data)); ?>,
                    backgroundColor: [
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(153, 102, 255, 0.5)'
                    ],
                    borderColor: [
                      'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        });
        document.getElementById('chart').style.height = '400px';
</script>
                       </div>
                      </div>
                    </div>
                  </div>
              </div>
                <div class="offcanvas-body">
                  <div class="row">
                      <div class="card" style=" width: 520px; height: 333px;">
                        <div class="card-header" style="border: 2px solid #ccc;">Total Registered in Gender</div>
                         <div class="card-body" style="border: 2px solid #ccc;">
                          <canvas id="myChart" width="460" height="300"></canvas>                      
<?php
// Query database for gender counts
$sql = "SELECT Gender, COUNT(*) as count FROM tblsenior GROUP BY Gender";
$result = mysqli_query($con, $sql);
// Close database connection
// mysqli_close($con);
// Prepare data for chart
$labels = array();
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row["Gender"];
    $data[] = $row["count"];
}
// Create chart
?>
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($labels); ?>,
        datasets: [{
            label: 'Total registered',
            data: <?php echo json_encode($data); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
document.getElementById('myChart').style.height = '400px';
</script>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="offcanvas offcanvas-start show text-bg-dark" tabindex="-1" id="offcanvasDark" aria-labelledby="offcanvasDarkLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkLabel"></h5>
              </div>
                <div class="offcanvas-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card" style="border: 2px solid #ccc;">
                        <div class="card-header">Senior Age Range</div>
                        <div class="card-body" style="border: 2px solid #ccc;">
                        <canvas id="ageChart"></canvas>
                        <?php
// Retrieve data from the database
$query = "SELECT Age FROM tblsenior";
$stmt = $dbh->query($query);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Create arrays to store the count of age ranges and labels
$ageRanges = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$ageLabels = array('AGE', '60-65', '66-70', '71-75', '76-80', '81-85', '86-90', '91-95', '96-100', '101-105', '105-110', '110-115', '116-120');
// Count the number of each age range
foreach ($data as $row) {
    $age = $row['Age'];
    if ($age >= 55 && $age < 60) {
        $ageRanges[0]++;
    } elseif ($age >= 60 && $age < 65) {
        $ageRanges[1]++;
    } elseif ($age >= 66 && $age < 70) {
        $ageRanges[2]++;
    } elseif ($age >= 71 && $age < 75) {
        $ageRanges[3]++;
    } elseif ($age >= 76 && $age < 80) {
        $ageRanges[4]++;
    } elseif ($age >= 81 && $age < 85) {
        $ageRanges[5]++;
    } elseif ($age >= 86 && $age < 90) {
        $ageRanges[6]++;
    } elseif ($age >= 91 && $age < 95) {
        $ageRanges[7]++;
    } elseif ($age >= 96 && $age < 100) {
        $ageRanges[8]++;
    } elseif ($age >= 101 && $age < 105) {
        $ageRanges[9]++;
    } elseif ($age >= 106 && $age < 110) {
        $ageRanges[10]++;
    } elseif ($age >= 111 && $age <= 115) {
        $ageRanges[11]++;
    } elseif ($age >= 116 && $age <= 120) {
        $ageRanges[12]++;
    }
}
// Create a bar chart using Chart.js
?>
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
        var ctx = document.getElementById('ageChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($ageLabels); ?>,
                datasets: [{
                    label: 'No. of Citizens',
                    data: <?php echo json_encode($ageRanges); ?>,
                    backgroundColor: 'rgba(0, 128, 0, 0.5)',
                    borderColor: 'rgba(0, 128, 0, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: 'Age Bar Chart'
                }
            }
        });
        document.getElementById('ageChart').style.height = '200px';
    </script>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="offcanvas offcanvas-start show text-bg-dark" tabindex="-1" id="offcanvasDark" aria-labelledby="offcanvasDarkLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkLabel"></h5>
              </div>
                <div class="offcanvas-body">
                  <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                      <div class="card">
                      <div class="card" style="border: 2px solid #ccc;">
                  <div class="card-body" style="border: 2px solid #ccc;">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Online Registration Application</h4>
                      <a href="#" class="text-dark ml-auto mb-3 mb-sm-0"></a>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                        <tr>
                            <th class="font-weight-bold">No</th>
                            <th class="font-weight-bold" style="text-align: center">Citizens Name</th>
                            <th class="font-weight-bold">Barangay</th>
                            <th class="font-weight-bold">Gender</th>
                            <th class="font-weight-bold">Age</th>
                            <th class="font-weight-bold">Application Date</th>
                            <th class="font-weight-bold">Status</th>
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
                         $result_count = mysqli_query($con, "SELECT COUNT(*) as total_records FROM tblonline_registration");
                        //total records
                         $records = mysqli_fetch_array($result_count);
                        //store total records to avariable
                         $total_records = $records['total_records'];
                        //get total pages
                         $total_no_of_pages = ceil($total_records / $total_records_per_page);
              $counter = 1;
							$stmt = $mysqli->prepare("SELECT `id`, `SurName`, `FirstName`, `MiddleName`, `Barangay`, `Gender`, `Age`, `Status`, `DateofAdmission` FROM `tblonline_registration` WHERE `Status` = 'Pending' ORDER BY `DateofAdmission` DESC LIMIT $offset, $total_records_per_page");
							$stmt->execute();
							$stmt->store_result();
							if( $stmt->num_rows > 0 ) {
								$stmt->bind_result($id, $stuname, $fname, $mname, $barangay, $gender, $age, $status, $DateofAdmission );
								while( $stmt->fetch() ) {
                            ?>   
                          <tr>
                          <td><?=$counter?></td>          
								          <td class="strupper"><?=$stuname?>, <?=$fname?> <?=$mname?></td>
								          <td class="strupper"><?=$barangay?></td>
								          <td class="strupper"><?=$gender?></td>
                          <td><?=$age?></td>
								          <td><?=$DateofAdmission?></td>
                          <td style="color: red;" class="strupper1"><?=$status?></td>
								              <td align="center">
									            <a href="edit-ol-reg-pending.php?id=<?=$id?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i>Edit</a>
									            <a href="delete_olreg_senior.php?id=<?=$id?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i> Delete</a>
								              </td>
							      </tr>
                    <?php $counter++;?>
						<?php } } else {?>
						 <tr>
								<td colspan="5" align="center">No Online Application Found.</td>
							</tr>
							<?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <div>
                    <nav aria-label="Page navigation example" style="margin-top: 30px;">
                      <ul class="pagination justify-content-end">
                      <li class="page-item"><a class="page-link <?= ($page_no <= 1) ? 'disabled' : ''; ?> " <?= ($page_no > 1) ? 'href=?page_no=' .$previous_page : ''; ?>>Previous</a></li>
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