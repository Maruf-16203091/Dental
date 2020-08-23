<?php

	$sql = $conn->prepare("select * from tbl_add_doctor");
	$sql->execute();
	$data = $sql->fetchAll();
		 //echo "<pre>";print_r($value);exit;
		 
		 if(isset($_POST['delete']))
		 {
			   $id = $_POST['doctor_id'];
			   //echo $_POST['doctor_img_url']; exit;
			   $sql = $conn->prepare("delete from tbl_add_doctor where doctor_id='$id'");
			   $execute = $sql->execute();
			   if($execute)
			   {
					 unlink($_POST['doctor_img_url']);
					 $sms = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong> Doctor information has been successfully deleted!</strong> </div>';
			   }  else {
					  $sms = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Doctor delete unsuccessfull ! </div>';
			   }   
		 }
		 
		  
		     @$doctor_id = $_GET['id'];
		     @$status = $_GET['status']; //exit;

			 if($doctor_id != null && $status !=null)
			 {
				 
				 if($status == 1)
				 {
				$query = "UPDATE `tbl_add_doctor` SET `doctor_active_status`='0' where doctor_id='$doctor_id'";
				$stmt = $conn->prepare($query);
				$end = $stmt->execute();
				if($end)
					{
					
					 $sms = '<div class="alert alert-success alert-dismissable error-message"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <h2 style="text-align: center; font-weight: bolder;">Status Update Successful!</h2></strong> </div>';
				    }else{
					 $sms = '<div class="alert alert-success alert-dismissable error-message"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <h2 style="text-align: center; font-weight: bolder;">Status Update unsuccessful!</h2></strong> </div>';
					}
				 }elseif($status == 0){
					 $query = "UPDATE `tbl_add_doctor` SET `doctor_active_status`='1' where doctor_id='$doctor_id'";
					$stmt = $conn->prepare($query);
					$end = $stmt->execute();
								if($end)
								{
					               $sms = '<div class="alert alert-success alert-dismissable error-message"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <h2 style="text-align: center; font-weight: bolder;">Status Update Successful!</h2></strong> </div>';
								}else{
					              $sms = '<div class="alert alert-success alert-dismissable error-message"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <h2 style="text-align: center; font-weight: bolder;">Status Update unsuccessful!</h2></strong> </div>';
								}
				 }
						
			 }
			 
	$sql = $conn->prepare("select * from tbl_add_doctor");
	$sql->execute();
	$data = $sql->fetchAll();
?>	

<script type="text/javascript">
		  function confirmation() {
		  return confirm('Are you sure you want to do this?');
			}
</script>

		
<!--------- content starts ------>		
		
<div id="page-inner">
     <div class="row">
         <div class="col-md-12">
          <h2>Manage Doctor Information</h2>		  
                      
         </div>
     </div>
	  
      <!-- /. ROW  -->
      <hr />
	 <?php if(isset($sms)){echo $sms;} ?>
			 <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
             <div class="panel-heading" style="text-align:center; font-weight: bolder; font-size: 18px;">All Doctor Information  </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sl.</th>
                                            <th>Doctor Name</th>                                          
                                            <th>Doctor Contact No</th>                                          
                                            <th>Activation status</th>
                                            <th>Change Activation Status</th>                                           
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$i=1;
									foreach($data as $value)
									{
									?>
									
									<form method="post">
                                        <tr>
                                            <td> <h4> <?php echo  $i; ?> </h4></td>
                                            <td><h4><?php echo  $value['doctor_name']; ?></h4></td>                                           
                                            <td><h4><?php echo  $value['doctor_phone']; ?></h4></td>                                           
                                            <td><span><?php if($value['doctor_active_status'] == 1){ ?><a class="btn btn-success">Active</a><?php }else{?><a class="btn btn-danger">Blocked</a><?php } ?></span></td>
                                            <td><span><?php if($value['doctor_active_status'] == 1){ ?><a href="index.php?page=manage_doctor&id=<?php echo $value['doctor_id']; ?>&status=<?php echo $value['doctor_active_status']; ?>" class="btn btn-danger">Block</a><?php }else{?><a href="index.php?page=manage_doctor&id=<?php echo $value['doctor_id']; ?>&status=<?php echo $value['doctor_active_status']; ?>" class="btn btn-primary">Unblock</a><?php } ?></span></td>                                           
                                            <td class="center">
											
												<button class="btn btn-xs btn-danger" type="submit" name="delete" onclick="return confirmation()">
													<span class="glyphicon glyphicon-trash"></span>
												</button>
												<input type="hidden" name="doctor_id" value="<?php echo $value['doctor_id']; ?>">													
											</td>
                                        </tr>
										
									</form>
									<?php
									$i++;
									}
									?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
              </div>
				 
				 
				 
               
    </div>
             <!-- /. PAGE INNER  -->
 </div>
