<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } else{
    
    if (isset($_POST['submit'])) {
        $barangayid = $_POST['barangayid'];
    
        $sql = "SELECT ID FROM tblsenior WHERE Barangay = :barangayid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':barangayid', $barangayid, PDO::PARAM_STR);
        $query->execute();
    
        $nottitle = $_POST['nottitle'];
        $notmsg = $_POST['notmsg'];
    
        $sql = "INSERT INTO tblnotice (NoticeTitle, Barangay, NoticeMsg, barangay_id) VALUES (:nottitle, :barangayid, :notmsg, :brgy_id)";
        $insertQuery = $dbh->prepare($sql);
        $insertQuery->bindParam(':nottitle', $nottitle, PDO::PARAM_STR);
        $insertQuery->bindParam(':barangayid', $barangayid, PDO::PARAM_STR);
        $insertQuery->bindParam(':notmsg', $notmsg, PDO::PARAM_STR);
    
        $alertShown = false; // Flag variable to track if alert has been shown
    
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $seniorID = $row['ID'];
            $insertQuery->bindParam(':brgy_id', $seniorID, PDO::PARAM_STR);
            $insertQuery->execute();
    
            $lastInsertId = $dbh->lastInsertId();
            if ($lastInsertId > 0 && !$alertShown) {
                echo '<script>alert("Notice has been added.")</script>';
                $alertShown = true; // Set flag to true after showing the alert
            } else {
                // Handle any error condition here if necessary
            }
        }
    
        echo "<script>window.location.href = 'add-notice.php'</script>";
    }

    

  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Student  Management System|| Add Notice</title>
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
              <h3 class="page-title">Add Notice </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Add Notice</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Add Notice</h4>
                   
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                      
                      <div class="form-group">
                        <label for="exampleInputName1">Notice Title</label>
                        <input type="text" name="nottitle" value="" class="form-control" required='true'>
                      </div>
                     
                      <div class="form-group">
                        <label for="exampleInputEmail3">Notice For</label>
                        <select id="barangaySelect" name="barangayid" class="form-control" required='true'>
                          <option value="">Select Barangay</option>
                          <option value="Abachanan">Abachanan</option>
                          <option value="Anibongan">Anibongan</option>
                          <option value="Bugsok">Bugsok</option>
                          <option value="Cahayag">Cahayag</option>
                          <option value="Canlangit">Canlangit</option>
                          <option value="Canta-ub">Canta-ub</option>
                          <option value="Casilay">Casilay</option>
                          <option value="Danicop">Danicop</option>
                          <option value="Dusita">Dusita</option>
                          <option value="La Union">La Union</option>
                          <option value="Lataban">Lataban</option>
                          <option value="Magsaysay">Magsaysay</option>
                          <option value="Matin-ao">Matin-ao</option>
                          <option value="Nan-od">Nan-od</option>
                          <option value="Poblacion">Poblacion</option>
                          <option value="Salvador">Salvador</option>
                          <option value="San Augustin">San Augustin</option>
                          <option value="San Isidro">San Isidro</option>
                          <option value="San Jose">San Jose</option>
                          <option value="San Juan">San Juan</option>
                          <option value="Santa Cruz">Santa Cruz</option>
                          <option value="Villa Garcia">Villa Garcia</option>
                        </select>
                      </div>
                      <!-- <div>
                        <input id="barangayValue" type="text" name="brgy_id">
                      </div> -->
                      <div class="form-group">
                        <label for="exampleInputName1">Notice Message</label>
                        <textarea name="notmsg" value="" class="form-control" required='true'></textarea>
                      </div>
                   
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Add</button>
                     
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

    <!-- value selector -->
    <!-- <script>
    $(document).ready(function() {
      $('#barangaySelect').change(function() {
        var selectedValue = $('#barangaySelect').val();
        $('#barangayValue').val(selectedValue);
      });
    });
    </script> -->

    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
<?php } ?>