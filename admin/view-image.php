<?php include('header.php'); ?>
<body>


    <div class="row-fluid">
        <div class="span12">

         

            <div class="container">
			
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                            <div class="alert alert-info">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong><i class="icon-user icon-large"></i>&nbsp;Data Table</strong>
                            </div>
                            <thead>
                                <tr>
                                    <th style="text-align:center;">User Image</th>
                                    <th style="text-align:center;">FirstName</th>
                                    <th style="text-align:center;">LastName</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                            </thead>
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
								<td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $row ['SurName']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['MiddleName']; ?></td>
								<td style="text-align:center; width:350px;">
									 <a href="#delete<?php echo $id;?>"  data-toggle="modal"  class="btn btn-warning" >Update Image</a>
								</td>
								</tr>
										<!-- Modal -->
							<div id="delete<?php  echo $id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-header">
							<h3 id="myModalLabel">Update</h3>
							</div>
							<div class="modal-body">
							<div class="alert alert-danger">
							<?php if($row['filename'] != ""): ?>
							<img src="uploads/<?php echo $row['filename']; ?>" width="100px" height="100px" style="border:1px solid #333333; margin-left: 30px;">
							<?php else: ?>
							<img src="images/default.png" width="100px" height="100px" style="border:1px solid #333333; margin-left: 30px;">
							<?php endif; ?>
							<form action="edit_PDO.php<?php echo '?stuid='.$id; ?>" method="post" enctype="multipart/form-data">
							<div style="color:blue; margin-left:150px; font-size:30px;">
								<input type="file" name="image" style="margin-top:-115px;">
							</div>
							
							</div>
							<hr>
							<div class="modal-footer">
							<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">No</button>
							<button type="submit" name="submit" class="btn btn-danger">Yes</button>
							</form>
							</div>
							</div>
							</div>
								<?php } ?>
                            </tbody>
                        </table>


          
        </div>
        </div>
        </div>
    </div>


</body>
</html>


