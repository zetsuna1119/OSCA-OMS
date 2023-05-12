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
$sql="delete from tblclass where ID=:rid";
$query=$dbh->prepare($sql);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
$query->execute();
 echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'manage-class.php'</script>";     
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Student  Management System|||Manage Barangay</title>
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
.bttnlist {
  border-radius: 10px;
  background-color: #181824;
  margin-bottom: 10px;
  position: relative;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 19px;
  padding: 10px;
  height: 40px;
  width: 220px;
  transition: all 0.5s;
  cursor: pointer;
}
.bttnlist span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.bttnlist span:after {
  content: '\00bb';
  position: absolute;
  color: #1fd655;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.bttnlist:hover span {
  color: #1fd655;
  padding-right: 25px;
}

.bttnlist:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
        <div class="main-panel">
          <div class="content-wrapper">
             <div class="page-header">
              <h3 class="page-title">Total Registered Senior By Barangay </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Manage Barangay</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      
<!-- 
                      <a href="barangaylist.php" button class="bttnlist"><span>View Senior List</span></a><BR> -->

                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">Brgy.No</th>
                            <th class="font-weight-bold">Barangay Name</th>
                            <th style="text-align: center;" class="font-weight-bold">Total Registered Seniors</th> 
                          </tr>
                        </thead>
                        <tbody>
<?php 
$sql1 ="SELECT * from tblsenior WHERE Barangay = 'Abachanan'";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalabachanan=$query1->rowCount();
?>
 <?php 
$sql1 ="SELECT * from tblsenior WHERE Barangay = 'Anibongan'";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalanibongan=$query1->rowCount();
?>
 <?php 
$sql1 ="SELECT * from tblsenior WHERE Barangay = 'Bugsok'";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalbugsok=$query1->rowCount();
?>
<?php 
$sql1 ="SELECT * from tblsenior WHERE Barangay = 'Cahayag'";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalcahayag=$query1->rowCount();
?>
<?php 
$sql1 ="SELECT * from tblsenior WHERE Barangay = 'Canlangit'";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalcanlangit=$query1->rowCount();
?>
<?php 
$sql1 ="SELECT * from tblsenior WHERE Barangay = 'Canta-ub'";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalcantaub=$query1->rowCount();
?>
<?php 
$sql1 ="SELECT * from tblsenior WHERE Barangay = 'Casilay'";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalcasilay=$query1->rowCount();
?>
<?php 
$sql1 ="SELECT * from tblsenior WHERE Barangay = 'Danicop'";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totaldanicop=$query1->rowCount();
?>
<?php 
$sql1 ="SELECT * from tblsenior WHERE Barangay = 'Dusita'";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totaldusita=$query1->rowCount();
?>
<?php 
$sql1 ="SELECT * from tblsenior WHERE Barangay = 'La Union'";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totallaunion=$query1->rowCount();
?>
<?php 
$sql1 ="SELECT * from tblsenior WHERE Barangay = 'Lataban'";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totallataban=$query1->rowCount();
?>
<?php 
$sql1 ="SELECT * from tblsenior WHERE Barangay = 'Magsaysay'";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalmagsaysay=$query1->rowCount();
?>
<?php 
$sql1 ="SELECT * from tblsenior WHERE Barangay = 'Matin-ao'";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalmatinao=$query1->rowCount();
?>
<?php 
$sql1 ="SELECT * from tblsenior WHERE Barangay = 'Nan-od'";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalnanod=$query1->rowCount();
?>
<?php 
$sql1 ="SELECT * from tblsenior WHERE Barangay = 'Poblacion'";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalpoblacion=$query1->rowCount();
?>
<?php 
$sql1 ="SELECT * from tblsenior WHERE Barangay = 'Salvador'";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalsalvador=$query1->rowCount();
?>
<?php 
$sql1 ="SELECT * from tblsenior WHERE Barangay = 'San Augustin'";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalsanaugustin=$query1->rowCount();
?>
<?php 
$sql1 ="SELECT * from tblsenior WHERE Barangay = 'San Isidro'";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalsanisidro=$query1->rowCount();
?>
<?php 
$sql1 ="SELECT * from tblsenior WHERE Barangay = 'San Jose'";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalsanjose=$query1->rowCount();
?>
<?php 
$sql1 ="SELECT * from tblsenior WHERE Barangay = 'San Juan'";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalsanjuan=$query1->rowCount();
?>
<?php 
$sql1 ="SELECT * from tblsenior WHERE Barangay = 'Santa Cruz'";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalsantacruz=$query1->rowCount();
?>
<?php 
$sql1 ="SELECT * from tblsenior WHERE Barangay = 'Villa Garcia'";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalvillagarcia=$query1->rowCount();
?>
<?php 
$sql2 ="SELECT * from  tblsenior";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$totstu=$query2->rowCount();
?>
<!-- NAA DI A RIG TOTAL DATA SA TABLE BY BARANGAY -->
                          <tr>
                            <td>1</td>
                            <td>ABACHANAN</td>
                            <td style="text-align: center;"><?php echo htmlentities($totalabachanan);?></td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>ANIBONGAN</td>
                            <td style="text-align: center;"><?php echo htmlentities($totalanibongan);?></td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>BUGSOK</td>
                            <td style="text-align: center;"><?php echo htmlentities($totalbugsok);?></td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>CAHAYAG</td>
                            <td style="text-align: center;"><?php echo htmlentities($totalcahayag);?></td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td>CANLANGIT</td>
                            <td style="text-align: center;"><?php echo htmlentities($totalcanlangit);?></td>
                          </tr>
                          <tr>
                            <td>6</td>
                            <td>CANTA-UB</td>
                            <td style="text-align: center;"><?php echo htmlentities($totalcantaub);?></td>
                          </tr>
                          <tr>
                            <td>7</td>
                            <td>CASILAY</td>
                            <td style="text-align: center;"><?php echo htmlentities($totalcasilay);?></td>
                          </tr>
                          <tr>
                            <td>8</td>
                            <td>DANICOP</td>
                            <td style="text-align: center;"><?php echo htmlentities($totaldanicop);?></td>
                          </tr>
                          <tr>
                            <td>9</td>
                            <td>DUSITA</td>
                            <td style="text-align: center;"><?php echo htmlentities($totaldusita);?></td>
                          </tr>
                          <tr>
                            <td>10</td>
                            <td>LA UNION</td>
                            <td style="text-align: center;"><?php echo htmlentities($totallaunion);?></td>
                          </tr>
                          <tr>
                            <td>11</td>
                            <td>LATABAN</td>
                            <td style="text-align: center;"><?php echo htmlentities($totallataban);?></td>
                          </tr>
                          <tr>
                            <td>12</td>
                            <td>MAGSAYSAY</td>
                            <td style="text-align: center;"><?php echo htmlentities($totalmagsaysay);?></td>
                          </tr>
                          <tr>
                            <td>13</td>
                            <td>MATIN-AO</td>
                            <td style="text-align: center;"><?php echo htmlentities($totalmatinao);?></td>
                          </tr>
                          <tr>
                            <td>14</td>
                            <td>NAN-OD</td>
                            <td style="text-align: center;"><?php echo htmlentities($totalnanod);?></td>
                          </tr>
                          <tr>
                            <td>15</td>
                            <td>POBLACION</td>
                            <td style="text-align: center;"><?php echo htmlentities($totalpoblacion);?></td>
                          </tr>
                          <tr>
                            <td>16</td>
                            <td>SALVADOR</td>
                            <td style="text-align: center;"><?php echo htmlentities($totalsalvador);?></td>
                          </tr>
                          <tr>
                            <td>17</td>
                            <td>SAN AUGUSTIN</td>
                            <td style="text-align: center;"><?php echo htmlentities($totalsanaugustin);?></td>
                          </tr>
                          <tr>
                            <td>18</td>
                            <td>SAN ISIDRO</td>
                            <td style="text-align: center;"><?php echo htmlentities($totalsanisidro);?></td>
                          </tr>
                          <tr>
                            <td>19</td>
                            <td>SAN JOSE</td>
                            <td style="text-align: center;"><?php echo htmlentities($totalsanjose);?></td>
                          </tr>
                          <tr>
                            <td>20</td>
                            <td>SAN JUAN</td>
                            <td style="text-align: center;"><?php echo htmlentities($totalsanjuan);?></td>
                          </tr>
                          <tr>
                            <td>21</td>
                            <td>SANTA CRUZ</td>
                            <td style="text-align: center;"><?php echo htmlentities($totalsantacruz);?></td>
                          </tr>
                          <tr>
                            <td>22</td>
                            <td>VILLA GARCIA</td>
                            <td style="text-align: center;"><?php echo htmlentities($totalvillagarcia);?></td>
                          </tr>
                          <tr style="font-weight: bold;">
                            <td></td>
                            <td>TOTAL REGISTERED:</td>
                            <td style="text-align: center;"><?php echo htmlentities($totstu);?></td>
                          </tr>
                        </tbody>
                      </table>
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