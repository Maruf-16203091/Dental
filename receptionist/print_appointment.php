<?php
 
		 $sqlAgent = $conn->prepare("SELECT * FROM offline_appointment ORDER BY `app_no1` DESC");
		 $sqlAgent->execute();
		 $dataAgent = $sqlAgent->fetchAll();
		 
		 
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
          <h2>All Appointments</h2>		  
                      
         </div>
     </div>
	  
      <!-- /. ROW  -->
      <hr />
	 <?php if(isset($sms)){echo $sms;} ?>
			 <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
             <div class="panel panel-default">
             <div class="panel-heading" style="text-align:center; font-weight: bolder; font-size: 18px;">All Patients  </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
										  <th>Sl.</th>
                                          <th>APP No</th>                                          
                                          <th>Patient Name</th>                                             
                                          <th>Age </th>
										  <th>Date </th>
										  <th>View </th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$i=1;
									foreach($dataAgent as $value)
									{
									?>
									
									<form method="post">
                                        <tr>
                                              <td><h5><?php echo $i; ?></h5></td>                                       
											  <td><h5><?php echo $value['app_no1']; ?></h5></td>                                    
                                              <td><h5><?php echo  $value['name1']; ?></h5></td>                                                                                    
                                              <td><h5><?php echo  $value['age1']; ?></h5></td>
											  <td><h5><?php echo  $value['date1']; ?></h5></td>

											  <td><a href="index.php?page=print_individual_app&id=<?php echo $value['app_no1']; ?>" class="btn btn-xs btn-info"><i class="fa fa-clock-o"></i> View details</a></td>	

                                        </tr>
										
									</form>
									<?php
									$i++;
									}
									?>
									                                           
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
              </div>
				 
				 
				 
               
    </div>
             <!-- /. PAGE INNER  -->
 </div>
