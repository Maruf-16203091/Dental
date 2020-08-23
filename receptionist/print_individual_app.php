

<?php	

$id= $_GET['id'];

$sqlAgent = $conn->prepare("SELECT * FROM offline_appointment where $id = app_no1 ORDER BY `app_no1` DESC");
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
     <center> <h1> Individual Appointment Information</h1><br></center>
	  
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
			<b><div class="panel-heading" style="background-color:green; height: 60px;"><p style="font-size:30px;color:black;">Patient Details</p></div></b>

			
			<form  method="post" action="">
			
                        <tr>
						   
                            <th>Patient Name:</th>
                            <td><?php echo  $dataAgent['name1']; ?></td>
							<th>Patient Address:</th>
                            <td><?php echo  $dataAgent['address1']; ?></td>
							<th>Patient Age:</th>
                            <td><?php echo  $dataAgent['age1']; ?></td>
							</tr>
							<tr>
							<th>Patient Phone:</th>
                            <td><?php echo  $dataAgent['contact1']; ?></td>
							 <th>Email:</th>
                            <td><?php echo  $dataAgent['email1']; ?></td>
							</tr>
							<tr>
							<th>Blood Group:</th>
                            <td><?php echo  $dataAgent['blood1']; ?></td>
							
                            
                      
                        </tr>
						
                   					
						
                    </table> <br />
					
				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<b>  <div class="panel-heading" style="background-color:tomato; height: 60px;"><p style="font-size:30px;color:black;">Appointment Details</p></div> </b>                                                
						
						<tr>
						   <th>Appointment No:</th>
                            <td><?php echo  $dataAgent['app_no1']; ?></td>
                            <th>Selected Doctor:</th>
                            <td><?php echo  $dataAgent['select_doctor1']; ?></td><br>
							 <th>Appointment Date:</th>
                            <td><?php echo  $dataAgent['date1']; ?></td>
							</tr>
							<tr>
							<th>Appointment Time:</th>
                            <td><?php echo  $dataAgent['time1']; ?></td>
                            
                      
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
	<center><a href="index.php?page=print_appointment" class="btn btn-lg btn-success col-md-offset-2"><i class="glyphicon glyphicon-chevron-left"></i> Back</a></center>
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
