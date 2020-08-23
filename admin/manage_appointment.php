<?php
	$sql = $conn->prepare("SELECT * FROM appointment WHERE serial_no=$id");
	$sql->execute();
	$data = $sql->fetchAll();
	
	
	if(isset($_POST['delete']))
		 { 
			   $sqlautoDel = $conn->prepare("DELETE FROM appointment WHERE appointment_status='pending';");
	           $execute = $sql->execute();
			   if($execute)
			   {					 
					 $sms = '<div class="alert alert-success alert-dismissable" style="text-align:center; font-size:25px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong> Appointment Request Deleted!</strong> </div>';
			   }  else {
					  $sms = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Appointment information delete unsuccessfull ! </div>';
			   }
		 }
		
	 
   
?>



<script type="text/javascript">
		  function confirmation() {
		  return confirm('Are you sure you want to do this?');
			}
</script>
		
    <section class="content-header">
      <h1>Manage Appointment Requests</h1>
	  
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
		
		<?php if(isset($sms)){echo $sms;} ?>
		
        <div class="box-body">
		
          <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border"style="text-align:center;">
              <h3 class="box-title" style="font-weight: bolder;" >All Appointment Requests</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>Sl.</th>
                  <th>APP No</th>                                          
                  <th>Patient Name</th>                                             
                  <th>Contact No</th>
                  <th>Selected doctor</th>
                  <th>Consultency Fee</th>
				  <th>Date</th>
				  <th>Time</th>
                  <th>Request Status</th>                                                      
                  <th>Action</th>

                </tr>
		   <?php
		  
		    $i=1;
		    foreach($data as $value)
		    { 
			 //foreach($seatdata as $v){ foreach($v as $c){} }
		    ?>
                		 
			<form  method="post" action="">
			    <tr>
                  <td><h5><?php echo $i; ?></h5></td>                                           
                  <td><h5><?php echo $value['app_no']; ?></h5></td>                                           
                  <td><h5><?php echo  $value['name']; ?></h5></td>                                                                                    
                  <td><h5><?php echo  $value['contact']; ?></h5></td>                                           
                  <td><h5><?php echo  $value['select_doctor']; ?></h5></td>                                           
                  <td><h5><?php echo  $value['consultency_Fee']; ?> </h5></td>
                  <td><h5><?php echo  $value['date']; ?> </h5></td>
                  <td><h5><?php echo  $value['time']; ?> </h5></td>				
                  <td><?php if ( $value['appointment_status'] == 'approved'){ ?><a class="btn btn-xs btn-success"><span class="glyphicon glyphicon-check"></span> approved</a><?php }elseif( $value['appointment_status'] == 'pending'){?><a class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-off"></span> pending</a><?php }elseif( $value['appointment_status'] == 'cancelled'){?><a class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> cancelled</a><?php }?></td>                                           
				  <td><a href="index.php?page=view_appointment&id=<?php echo $value['app_no']; ?>" class="btn btn-xs btn-info"><i class="fa fa-clock-o"></i> View details</a></td>	

                </tr>
								
				<?php
			    $i++;
				}
				?>

              </table> <br />
			  
			  </form>
				
            </div>
            
        </div>
        </div>
       
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
