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
                    <div class="sers">
             <label for="ser">Generate Barangay List:</label>
              <!-- <h3 class="page-title"> Generate Barangay Registered </h3> -->
              <select type="text" name="ser" class="sera" onchange="location = this.value;">
                    <option value="" disabled selected hidden>Choose Barangay:</option>
                    <option value="BarangayList/1barangay-masterlist.php?">All Registered List</option>
                    <option value="BarangayList/abachanan-list.php?">Abachanan</option>
                    <option value="BarangayList/anibongan-list.php?">Anibongan</option>
                    <option value="BarangayList/bugsok-list.php?">Bugsok</option>
                    <option value="BarangayList/cahayag-list.php?">Cahayag</option>
                    <option value="BarangayList/canlangit-list.php?">Canlangit</option>
                    <option value="BarangayList/canta-ub-list.php?">Canta-ub</option>
                    <option value="BarangayList/casilay-list.php?">Casilay</option>
                    <option value="BarangayList/danicop-list.php?">Danicop</option>
                    <option value="BarangayList/dusita-list.php?">Dusita</option>
                    <option value="BarangayList/la-union-list.php?">La Union</option>
                    <option value="BarangayList/lataban-list.php?">Lataban</option>
                    <option value="BarangayList/magsaysay-list.php?">Magsaysay</option>
                    <option value="BarangayList/matin-ao-list.php?">Matin-ao</option>
                    <option value="BarangayList/nan-od-list.php?">Nan-od</option>
                    <option value="BarangayList/poblacion-list.php?">Poblacion</option>
                    <option value="BarangayList/salvador-list.php?">Salvador</option>
                    <option value="BarangayList/san-augustin-list.php?">San Augustin</option>
                    <option value="BarangayList/san-isidro-list.php?">San Isidro</option>
                    <option value="BarangayList/san-jose-list.php?">San Jose</option>
                    <option value="BarangayList/san-juan-list.php?">San Juan</option>
                    <option value="BarangayList/santa-cruz-list.php?">Santa Cruz</option>
                    <option value="BarangayList/villa-garcia-list.php?">Villa Garcia</option>
          </select>
    </div>     
    <div class="sers">
             <label for="ser">Registered Pension List:</label>
              <!-- <h3 class="page-title"> Generate Barangay Registered </h3> -->
              <select type="text" name="ser" class="sera" onchange="location = this.value;">
                    <option value="" disabled selected hidden>Choose Barangay:</option>
                    <!-- <option value="PensionList/1barangay-masterlist.php?">All Registered List</option> -->
                    <option value="PensionList/Abachanan-pension-list.php?">Abachanan</option>
                    <option value="PensionList/Anibongan-pension-list.php?">Anibongan</option>
                    <option value="PensionList/Bugsok-pension-list.php?">Bugsok</option>
                    <option value="PensionList/Cahayag-pension-list.php?">Cahayag</option>
                    <option value="PensionList/Canlangit-pension-list.php?">Canlangit</option>
                    <option value="PensionList/Canta-ub-pension-list.php?">Canta-ub</option>
                    <option value="PensionList/Casilay-pension-list.php?">Casilay</option>
                    <option value="PensionList/Danicop-pension-list.php?">Danicop</option>
                    <option value="PensionList/Dusita-pension-list.php?">Dusita</option>
                    <option value="PensionList/La-Union-pension-list.php?">La Union</option>
                    <option value="PensionList/Lataban-pension-list.php?">Lataban</option>
                    <option value="PensionList/Magsaysay-pension-list.php?">Magsaysay</option>
                    <option value="PensionList/Matin-ao-pension-list.php?">Matin-ao</option>
                    <option value="PensionList/Nan-od-pension-list.php?">Nan-od</option>
                    <option value="PensionList/Poblacion-pension-list.php?">Poblacion</option>
                    <option value="PensionList/Salvador-pension-list.php?">Salvador</option>
                    <option value="PensionList/San Augustin-pension-list.php?">San Augustin</option>
                    <option value="PensionList/San Isidro-pension-list.php?">San Isidro</option>
                    <option value="PensionList/San Jose-pension-list.php?">San Jose</option>
                    <option value="PensionList/San Juan-pension-list.php?">San Juan</option>
                    <option value="PensionList/Santa Cruz-pension-list.php?">Santa Cruz</option>
                    <option value="PensionList/Villa Garcia-pension-list.php?">Villa Garcia</option>
          </select>
    </div><br><br>
    <div class="form-group">
        <strong>Search by Senior ID No. to Generate:</strong><br><br>
      <div class="form-group">
        <input id="searchdata" type="text" name="searchdata" required="true" placeholder="Search by Senior ID No.">
            <button type="submit" class="bttnclick" name="search" id="submit">Search</button>
      </div>
    </div>      
        </form>
          <div class="d-sm-flex align-items-center mb-4">
                       <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                          <th class="font-weight-bold">No</th>
                            <th class="font-weight-bold">Citizens ID</th>
                            <th class="font-weight-bold">Citizens Name</th>
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
$sql="SELECT * from tblsenior where tblsenior.StuID like '$sdata%'  LIMIT $offset, $no_of_records_per_page";
// $sql="SELECT tblsenior.StuID,tblsenior.ID as sid,tblsenior.StudentName,tblsenior.StudentEmail,tblsenior.DateofAdmission,tblclass.ClassName,tblclass.Section from tblsenior join tblclass on tblclass.ID=tblsenior.StudentClass where tblclass.Section like '$sdata%' LIMIT $offset, $no_of_records_per_page";
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
                            <td align="center">
                            <a href="Generate-id.php?id=<?php echo htmlentities($row->ID);?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>Generate ID</a>
									          <a href="delete_employee.php?id=<?php echo htmlentities($row->ID);?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                          </tr><?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
  <?php } }?>
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