<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!doctype html>
<html>
<head>
<title>Senior Citizen of Sierra Bullones Management System || Home Page</title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--bootstrap-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!--coustom css-->
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<!--script-->
<script src="js/jquery-1.11.0.min.js"></script>
<!-- js -->
<script src="js/bootstrap.js"></script>
<!-- /js -->
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300,300italic,400italic,400,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!--/fonts-->
<!--hover-girds-->
<link rel="stylesheet" type="text/css" href="css/default.css" />
<link rel="stylesheet" type="text/css" href="css/component.css" />
<link rel="stylesheet" href="css/style1.css" />
<script src="js/modernizr.custom.js"></script>
<!--/hover-grids-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<!--script-->
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
<!--/script-->
</head>
	<body>
<?php include_once('includes/header.php');?>
<div class="bannerist">
  <div class="container">
  <script src="js/responsiveslides.min.js"></script>
 <script>
    $(function () {
      $("#slider").responsiveSlides({
        auto: true,
        nav: true,
        speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
                  <div class="tunga">
                      <div>
                      <img src="images/sierralogo.jpg" alt= "Avatar">
                      </div>
                  </div>
<H10 style="text-shadow: 2px 4px 4px #E91E63;"><b>OFFICE OF THE SENIOR CITIZENS AFFAIRS (OSCA)</b></H10><br>
                    <H11 style="text-shadow: 2px 4px 4px #E91E63;">Municipality of Sierra Bullones</b></H11>    
                   
<div class="slider">
       <div class="callbacks_container">
        <ul class="rslides" id="slider">
         <li>     
  <style>
    .bannerist{
	background:url(images/senior.jpeg);
	background-size:cover;
	min-height:650px;
	padding-top:0em !important;
	text-align:center;
}
  h17{
    color: #FFFFFF;
    text-shadow: 2px 4px 4px #E91E63;
    font-family: Georgia, 'Times New Roman', Times, serif;
    font-style: oblique;
    font-size: 40px;
    }
  h16{
    color: #ffffff;
    font-weight: bold;
    position: absolute;
    bottom: 185px;
    }
  .bttn {
  border-radius: 0px;
  background-color: #1fd655;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 19px;
  padding: 20px;
  height: 50px;
  width: 220px;
  transition: all 0.5s;
  cursor: pointer;
  margin-bottom: 40px;
}
.bttn span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.bttn span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.bttn:hover span {
  padding-right: 25px;
}

.bttn:hover span:after {
  opacity: 1;
  right: 0;
}
  </style>
  <H17>Welcome Seniors!</H17><br>
  <H16>Already Registered? Login Here!</H16><br>
                     
         <a href="user/login.php" button class="bttn"><span>Login Here!</span></a>
        
          
           <p style="color: #ffffff; font-weight: bold;">Not registered yet? You can register here!</p>             
          <div class="readmore">
          <a href="user/online-registration-form.php">Fill up here to Register!<i class="glyphicon glyphicon-menu-right"> </i></a>
          </div> 
         </li>

 
        </ul>
      </div>
    </div>
</div>      
  </div>
<div class="welcome">
	<div class="container">
		<?php
$sql="SELECT * from tblpage where PageType='aboutus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
		<h2><?php  echo htmlentities($row->PageTitle);?></h2>
		<p><?php  echo ($row->PageDescription);?></p><?php $cnt=$cnt+1;}} ?>
	</div>
</div>
<!--/welcome-->


<!--testmonials-->
<div class="testimonials">
	<div class="container">
			<div class="testimonial-nfo">
        <h3>Public Notices</h3>
         <marquee  style="height:350px;" direction ="up" onmouseover="this.stop();" onmouseout="this.start();">
				<?php
$sql="SELECT * from tblpublicnotice";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>

 
		<a href="view-public-notice.php?viewid=<?php echo htmlentities ($row->ID);?>" target="_blank" style="color:#fff;">
          <?php  echo htmlentities($row->NoticeTitle);?>(<?php  echo htmlentities($row->CreationDate);?>)</a>
          <hr /><br />
				    
			<?php $cnt=$cnt+1;}} ?>
	</marquee></div>
	</div>
</div>
<!--\testmonials-->
<!--specfication-->

<!--/specfication-->
<?php include_once('includes/footer.php');?>
<!--/copy-rights-->
	</body>
</html>
