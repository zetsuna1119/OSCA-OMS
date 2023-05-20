<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="images/faces/face8.jpg" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <style>
                  .notif_badge {
                    position:absolute;
                    left: 157px;
                    /* right: 1150px; */
                    /* top: 260px; */
                    width: 23px;
                    height: 23px;
                    background: red;
                    color: #ffffff;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    border-radius: 50%;
                  }
                </style>
                <div class="text-wrapper">
                  <?php
         $aid= $_SESSION['sturecmsaid'];
$sql="SELECT * from tbladmin where ID=:aid";
$query = $dbh -> prepare($sql);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                  <p class="profile-name"><?php  echo htmlentities($row->AdminName);?></p>
                  <p class="designation"><?php  echo htmlentities($row->UserName);?></p><?php $cnt=$cnt+1;}} ?>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Dashboard</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
<!--             
            <li class="nav-item">
              <a class="nav-link" href="manage-online-registration.php">
                <span class="menu-title">Online Registration</span>
                <i class="icon-people menu-icon" id="notif"></i>
                <span class="notif_badge">0</span>
              </a>
            </li> -->

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic5" aria-expanded="false" aria-controls="ui-basic">
              <?php 
$sql1 ="SELECT * from tblonline_registration WHERE Status = 'Pending'";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalpending=$query1->rowCount();
?>
              <span class="menu-title">Online Registration</span>
                <i class="icon-people menu-icon"></i>
                <span class="notif_badge"><?php echo htmlentities($totalpending);?></span>
              </a>
              <div class="collapse" id="ui-basic5">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pending-list.php">Pending Application</a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-online-registration.php">Waiting List for Approval</a></li>
                </ul>
              </div>
            </li>


            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Barangay</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
               <!-- <li class="nav-item">
                  <a class="nav-link" href="add-class.php">Add Barangay</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="manage-class.php">Manage Barangay</a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link" href="barangaylist.php">View Registered List</a>
                </li>
              </ul>
            </div>

            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic3">
                <span class="menu-title">Senior Citizens</span>
                <i class="icon-people menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-students.php">Add Senior Citizen</a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage_senior.php">Manage Senior Citizens</a></li>
                  <li class="nav-item"> <a class="nav-link" href="search-senior-list.php">Search Senior</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="generate-report.php">
                <span class="menu-title">Generate Reports</span>
                <i class="icon-notebook menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic1">
                <span class="menu-title">Service</span>
                <i class="icon-people menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic2">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="senior-birthday.php">Who's birthday?</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#">Who's birthday?</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Notice</span>
                <i class="icon-doc menu-icon"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-notice.php"> Add Notice </a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-notice.php"> Manage Notice </a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth1" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Public Notice</span>
                <i class="icon-doc menu-icon"></i>
              </a>
              <div class="collapse" id="auth1">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-public-notice.php"> Add Public Notice </a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-public-notice.php"> Manage Public Notice </a></li>
                </ul>
              </div>
              <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth2" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Pages</span>
                <i class="icon-doc menu-icon"></i>
              </a>
              <div class="collapse" id="auth2">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="about-us.php"> About Us </a></li>
                  <li class="nav-item"> <a class="nav-link" href="contact-us.php"> Contact Us </a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">
                <span class="menu-title">Sign Out</span>
                <i class="icon-power menu-icon"></i>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="search.php">
                <span class="menu-title">Search</span>
                <i class="icon-magnifier menu-icon"></i>
              </a>
            </li> -->
            </li>
          </ul>
        </nav>
