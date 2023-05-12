<?php include('header.php'); ?>
<body>
<tbody>
<?php
								require_once('config.php');
								$result = $con->prepare("SELECT * FROM tblonline_registration ORDER BY stuid ASC");
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++){
								$id=$row['filename'];
							?>
								<tr>
								<td style="text-align:center; margin-top:10px; word-break:break-all; width:450px; line-height:100px;">
									<?php if($row['filename'] != ""): ?>
									<img src="uploads/<?php echo $row['filename']; ?>" width="100px" height="100px" style="border:1px solid #333333;">
									<?php else: ?>
									<img src="images/default.png" width="100px" height="100px" style="border:1px solid #333333;">
									<?php endif; ?>
								</td>
                                <?php } ?>
                           <tbody>

</body>   
