<?php	

$id= $_GET['id'];

$sqlAgent = $conn->prepare("SELECT * FROM appointment where $id = app_no ORDER BY `app_no` DESC");
	$sqlAgent->execute();
	$dataAgent = $sqlAgent->fetch(PDO::FETCH_ASSOC);
			
  //echo "<pre>";print_r($dataseat);exit;
  		if(isset($_POST['approve']))
		{
			 $app_no = $_POST['app_no'];
		    $name= $data['name'];					
                    $contact= $data['contact'];					
                    $select_doctor= $data['select_doctor'];					
					$consultency_Fee= $data['consultency_Fee'];	
                    $date= $data['date'];	
                    $time= $data['time'];
                   	
			   $query = "UPDATE `appointment` SET `appointment_status`='1' where app_no='$id'";
			$stmt = $conn->prepare($query);
			$end = $stmt->execute();
			if($end)
			   {	$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
					try {
						//Server settings
						//$mail->SMTPDebug = 2;                                 // Enable verbose debug output
						$mail->isSMTP();                                      // Set mailer to use SMTP
						$mail->Host = 'ssl://smtp.gmail.com';                       // Specify main and backup SMTP servers
						$mail->SMTPAuth = true;                               // Enable SMTP authentication
						$mail->Username = 'onlineticketbd83@gmail.com';                 // SMTP username
						$mail->Password = 'aslam14103148';                           // SMTP password
						$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
						$mail->Port = 465;                                    // TCP port to connect to
						$mail->SMTPOptions = array(
							'ssl' => array(
								'verify_peer' => false,
								'verify_peer_name' => false,
								'allow_self_signed' => true
							)
						);

						//Recipients
						$mail->setFrom('onlineticketbd83@gmail.com', 'Onlineticketbd');
						$mail->addAddress($passenger_email, $passenger_name);     // Add a recipient					
						$mail->addReplyTo('info@example.com', 'Information');
						$mail->addCC('cc@example.com');
						$mail->addBCC('bcc@example.com');

						//Attachments
						//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
						//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

						//Content
						$mail->isHTML(true);                                  // Set email format to HTML
						$mail->Subject = 'Booking Confirmation';
						$mail->Body    = 'Hello! '.$passenger_name.', your booking has been confirmed.You can now print your ticket with your PNR No. <br />Your PNR No: '.$pnr_no.'<br>Journey: '.$from_city.' to '.$to_city.'<br>Bus Name: '.$bus_name.'<br>Bus Type: '.$bus_type.'<br>Seats: '.$booked_seat.'<br>Journey Date: '.$journey_date.'<br>Departure Time: '.$departure_time.'<br>Boarding Point: '.$boarding;
						$mail->AltBody = 'Congratulations! Your booking has been confirmed.';

						$mail->send();
						//echo 'Message has been sent';
						} catch (Exception $e) {
							echo 'Message could not be sent.';
							echo 'Mailer Error: ' . $mail->ErrorInfo;
						} 
		   
					$sms = '<div class="alert alert-success alert-dismissable" style="text-align:center; font-size:25px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong> Booking Request Approved!</strong> </div>';
					
			   }  else {
					  $sms = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> unsuccessfull ! </div>';
			   }
		}	
		
		if(isset($_POST['pending']))
		{ 
		    $app_no = $_POST['app_no']; 
			   $query = "UPDATE `appointment` SET `appointment_status`='0' where app_no='$id'";
			$stmt = $conn->prepare($query);
			$end = $stmt->execute();
			if($end)
			   {	                       
					 $sms = '<div class="alert alert-success alert-dismissable" style="text-align:center; font-size:25px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong> Appointment Request cancelled!</strong> </div>';
			   }  else {
					  $sms = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Counter information delete unsuccessfull ! </div>';
			   }
		}
		
		 
		  elseif(isset($_POST['delete']))
		 { 
		       $app_no = $_POST['app_no'];
			   $sql = $conn->prepare("DELETE FROM `appointment` where app_no='$id'");
			   $execute = $sql->execute();
			   if($execute)
			   {					 
					 $sms = '<div class="alert alert-success alert-dismissable" style="text-align:center; font-size:25px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong> Appointment Request Deleted!</strong> </div>';
			   }  else {
					  $sms = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Counter information delete unsuccessfull ! </div>';
			   }
		 }
?>



<script type="text/javascript">
		  function confirmation() {
		  return confirm('Are you sure you want to delete this request?');
			}
</script>
		
    <section class="content-header">
     <center> <h1> Appointment Information</h1><br></center>
	  
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
                            <th>Patient Name:</th>
                            <td><?php echo  $dataAgent['name']; ?></td>
							<th>Patient Address:</th>
                            <td><?php echo  $dataAgent['address']; ?></td>
							 <th>Contact No:</th>
                            <td><?php echo  $dataAgent['contact']; ?></td>
							</tr>
							<tr>
                            <th>Email:</th>
                            <td><?php echo  $dataAgent['email'];?></td>
							<th>Blood Group:</th>
                            <td><?php echo  $dataAgent['blood']; ?></td> 
							</tr>
							<tr>
							<th>Age:</th>
                            <td><?php echo  $dataAgent['age']; ?></td> 
							 
                        </tr>
						
                   					
						
                    </table> <br />
					
				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<div class="panel-heading" style="background-color:green; height: 60px;"><p style="font-size:30px;color:white;">Appointment Details</p></div>
                         <tr>
                            <th>Appontment No:</th>
                            <td><?php echo  $dataAgent['app_no']; ?></td>
							<th>Selected Docotor:</th>
                            <td><?php echo  $dataAgent['select_doctor']; ?></td>
							<th>Appointment Date:</th>
							
							
                            <td><?php echo  $dataAgent['date']; ?></td>
							</tr> 			
							<tr>				
							<th>Appointment Time:</th>
                            <td><?php echo  $dataAgent['time']; ?></td>
							<th>Consultency Fee:</th>
                            <td> <?php echo $dataAgent['consultency_Fee'];?></td>						
                      
                        </tr>	

						<tr>

						
							<th>Current Appointment Status:</th>
                            <td><?php if ( $dataAgent['appointment_status'] == '0'){echo "pending";} elseif( $dataAgent['appointment_status'] == '1'){echo "approved";} elseif( $dataAgent['appointment_status'] == '2'){echo "blocked";}?></td>
							
                        </tr>							
						
				
						
                </table>
				
			

					<br>						
				<center><a href="index.php?page=approve_appointment" class="btn btn-lg btn-success col-md-offset-2"><i class="glyphicon glyphicon-chevron-left"></i> Back</a></center>
				
               </div>
			   
			   </form>

        </div>
       
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
