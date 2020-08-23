<?php



	$sql = $conn->prepare("select * from appointment");
	$sql->execute();
	$data = $sql->fetchAll();
		 //echo "<pre>";print_r($value);exit;
		 
	

	
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
          <h2>Appointments</h2>		  
                      
         </div>
     </div>
	  
      <!-- /. ROW  -->
      <hr />
	 <?php if(isset($sms)){echo $sms;} ?>
			 <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
             <div class="panel-heading" style="text-align:center; font-weight: bolder; font-size: 18px;">All Appointments </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sl.</th>
											<th>APP No</th> 
                                            <th>Patient Name</th>                                          
                                            <th>Patient Contact No</th>                                          
                                            <th>Selected Doctor</th>
                                            <th>Date</th>
											<th>Time</th>
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
											<td><h4><?php echo  $value['app_no']; ?></h4></td> 
                                            <td><h4><?php echo  $value['name']; ?></h4></td>                                           
                                            <td><h4><?php echo  $value['contact']; ?></h4></td>                                             
                                             <td><h4><?php echo  $value['select_doctor']; ?></h4></td> 
											 <td><h4><?php echo  $value['date']; ?></h4></td>  
											 <td><h4><?php echo  $value['time']; ?></h4></td>  
                                            
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
