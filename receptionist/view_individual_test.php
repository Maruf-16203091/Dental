

<?php	

$id= $_GET['id'];

$sqlAgent = $conn->prepare("SELECT * FROM try where $id = app ORDER BY `app` DESC");
	$sqlAgent->execute();
	$dataAgent = $sqlAgent->fetch(PDO::FETCH_ASSOC);
			
  
?>



<script type="text/javascript">
		  function confirmation() {
		  return confirm('Are you sure you want to delete this request?');
			}
</script>

<div class="myMainContent"  id="div_print">
		
    <section class="content-header">
     <center> <h1> Individual Test Information</h1><br></center>
	  
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

		
		<?php if(isset($sms)){echo $sms;} ?>
		
        <div class="box-body">
		
          <div class="col-md-12">

            
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
			<div class="panel-heading" style="background-color:#995127; height: 60px;"><p style="font-size:30px;color:white;">Patient Details</p></div>

			
			<form  method="post" action="">
			
                        <tr>
						   <th>Appointment No:</th>
                            <td><?php echo  $dataAgent['app']; ?></td>
                            <th>Patient Name:</th>
                            <td><?php echo  $dataAgent['name']; ?></td>
							 <th>Age:</th>
                            <td><?php echo  $dataAgent['age']; ?></td>
							  </tr>
							    <tr>
							<th>Date:</th>
                            <td><?php echo  $dataAgent['date']; ?></td>
							<th>Discount Type:</th>
                            <td><?php echo  $dataAgent['discount']; ?></td>	                   
							</tr>
						                   										
                    </table> <br />
					
				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<div class="panel-heading" style="background-color:green; height: 60px;"><p style="font-size:30px;color:white;">Selected Treatments</p></div>                                                 
						
						
						
						
							<?php 
							$sum = 0;
							
								foreach(explode(',',$dataAgent['treatments']) as $treatment){
									
									if($treatment == 5000){
										echo '<tr>';
											echo '<th> Root Canal </th>';
											echo '<td>'. $treatment. '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. 'BDT' .'</td>';
										echo '</tr>';
									}
									
									
									elseif($treatment == 1200){
										echo '<tr>';
											echo '<th> Teeth Whitening </th>';
											echo '<td>'. $treatment. '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. 'BDT' .'</td>';
										echo '</tr>';
									}
									
									elseif($treatment == 4500){
										echo '<tr>';
											echo '<th> Crown and Bridges </th>';
											echo '<td>'. $treatment. '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. 'BDT' .'</td>';
										echo '</tr>';
									}
									
									elseif($treatment == 6000){
										echo '<tr>';
											echo '<th> Dental Implants </th>';
											echo '<td>'. $treatment. '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. 'BDT' .'</td>';
										echo '</tr>';
									}
									
									elseif($treatment == 9000){
										echo '<tr>';
											echo '<th> Periodontal Surgery </th>';
											echo '<td>'. $treatment. '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. 'BDT' .'</td>';
										echo '</tr>';
									}
									
									elseif($treatment == 3500){
										echo '<tr>';
											echo '<th> Wisdom Tooth Removal </th>';
											echo '<td>'. $treatment. '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. 'BDT' .'</td>';
										echo '</tr>';
									}
									
									elseif($treatment == 5500){
										echo '<tr>';
											echo '<th> Cosmetic Dentistry </th>';
											echo '<td>'. $treatment. '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. 'BDT' .'</td>';
										echo '</tr>';
									}
									
									elseif($treatment == 6500){
										echo '<tr>';
											echo '<th> Complete Detures </th>';
											echo '<td>'. $treatment. '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. 'BDT' .'</td>';
										echo '</tr>';
									}
									
									
									
									
									$sum = $sum+$treatment;
									
									
								}
								
								$dis=0;
								if($dataAgent['discount'] == 'Student'){
										$dis = $sum*(15/100);
									}
									elseif($dataAgent['discount'] == 'Physical_Disabled'){
										$dis = $sum*(20/100);
									}
									else{
										
									$dis = 0;

									}
								
							?>
							<tr>
								<th>Total&nbsp;:</th>
								<td> <?php echo $sum.'&nbsp;&nbsp;&nbsp;'. 'BDT'?></td>
							</tr>
							<tr>
								<th>Discount&nbsp;:</th>
								<td> <?php echo $dis.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. 'BDT'?></td>
							</tr>
							
							<tr>
								<th>Total Paid&nbsp;&nbsp;(Excluding Discount)&nbsp;:</th>
								<td> <?php echo ($sum-$dis).'&nbsp;&nbsp;&nbsp;'. 'BDT'?></td>
							</tr>								
                      
                        	

												
						
				
						
                </table>
				
			

					<br>						
				
				
               </div>
			   
			   </form>

        </div>
       
      </div>
      <!-- /.box -->

    </section>
	</div>
	<center><a href="index.php?page=view_test" class="btn btn-lg btn-success col-md-offset-2"><i class="glyphicon glyphicon-chevron-left"></i> Back</a></center>
    <!-- /.content -->
	<input type="button" value="Print " onclick="printdiv('div_print');" />
  </div>
  
  
  
  
  
  
  <script language="javascript">
    function printdiv(printpage)
    {
    var headstr = "<html><head><title>Prescription</title></head><body>";
    var footstr = "</body>";
    var newstr = document.all.item(printpage).innerHTML;
    var oldstr = document.body.innerHTML;
    document.body.innerHTML = newstr+footstr;
    window.print();
    document.body.innerHTML = oldstr;
    return ;
    }
  </script>
