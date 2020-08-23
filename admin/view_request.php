<?php	
    $id = $_GET['id']; 
	$sql = $conn->prepare("SELECT * FROM tbl_booking_info, tbl_trip_info, tbl_booked_seats,tbl_counter_info,tbl_bus_info WHERE tbl_booking_info.trip_id=tbl_trip_info.trip_id AND tbl_booking_info.pnr_no=tbl_booked_seats.pnr_no AND tbl_booking_info.counter_id=tbl_counter_info.counter_id AND tbl_booked_seats.bus_id=tbl_bus_info.bus_id AND tbl_booking_info.pnr_no='$id'");
	$sql->execute();
	$data = $sql->fetch(PDO::FETCH_ASSOC);
	
	$sqlcompany = $conn->prepare("SELECT company FROM tbl_agent_info, tbl_trip_info,tbl_booking_info WHERE tbl_booking_info.trip_id=tbl_trip_info.trip_id AND tbl_agent_info.agent_id=tbl_trip_info.agent_id AND tbl_booking_info.pnr_no='$id'");
	$sqlcompany->execute();
	$datacompany = $sqlcompany->fetch(PDO::FETCH_ASSOC);
	
	$sqll = $conn->prepare("SELECT tbl_booked_seats.seat_no FROM tbl_booking_info,tbl_booked_seats WHERE tbl_booking_info.pnr_no=tbl_booked_seats.pnr_no AND tbl_booked_seats.pnr_no='$id'");
	$sqll->execute();
	$dataa= $sqll->fetchAll();
	//$dataa= $sqll->fetch(PDO::FETCH_ASSOC);
	//echo "<pre>";print_r($dataa);
	//echo $dataa[0];
	$booked_seats = array();
	for ($i=0; $i<count($dataa); $i++) {
			array_push($booked_seats, $dataa[$i]['seat_no']);
		
	}				
	//print_r($booked_seats); exit;
	$booked_seat= implode(',', $booked_seats);
      
	
		
  //echo "<pre>";print_r($dataseat);exit;
  		if(isset($_POST['approve']))
		{
		    $trip_id = $_POST['trip_id'];  
		    $pnr_no = $_POST['pnr_no'];
			$bus_name= $datacompany['company'];
			$bus_type= $data['bus_type'];
			$booked_seat= implode(',', $booked_seats);
			$from_city= $data['from_city'];
			$to_city= $data['to_city'];
			$journey_date= $data['date'];
			$departure_time= date('h:i A', strtotime($data['departure_time']));
			$boarding= $data['counter_name'];
            $passenger_email= $data['passenger_email'];		
            $passenger_name= $data['passenger_name'];		
			$query ="UPDATE tbl_booked_seats,tbl_booking_info SET tbl_booked_seats.seat_status='1',tbl_booking_info.booking_status='approved' WHERE tbl_booked_seats.pnr_no=tbl_booking_info.pnr_no && tbl_booking_info.pnr_no='$pnr_no'";
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
		
		if(isset($_POST['cancel']))
		{ 
		    $pnr_no = $_POST['pnr_no']; 
			$query ="UPDATE tbl_booked_seats,tbl_booking_info SET tbl_booked_seats.seat_status='0',tbl_booking_info.booking_status='cancelled' WHERE tbl_booked_seats.pnr_no=tbl_booking_info.pnr_no && tbl_booking_info.pnr_no='$pnr_no'";
			$stmt = $conn->prepare($query);
			$end = $stmt->execute();
			if($end)
			   {	                       
					 $sms = '<div class="alert alert-success alert-dismissable" style="text-align:center; font-size:25px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong> Booking Request cancelled!</strong> </div>';
			   }  else {
					  $sms = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Counter information delete unsuccessfull ! </div>';
			   }
		}
		
		 
		  elseif(isset($_POST['delete']))
		 { 
		       $pnr_no = $_POST['pnr_no'];
			   $sql = $conn->prepare("DELETE tbl_booking_info , tbl_booked_seats  FROM tbl_booking_info  INNER JOIN tbl_booked_seats WHERE tbl_booking_info.pnr_no= tbl_booked_seats.pnr_no and tbl_booked_seats.pnr_no = '$pnr_no'");
			   $execute = $sql->execute();
			   if($execute)
			   {					 
					 $sms = '<div class="alert alert-success alert-dismissable" style="text-align:center; font-size:25px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong> Booking Request Deleted!</strong> </div>';
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
      <h1> Booking Information</h1>
	  
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

            
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
			<div class="panel-heading" style="background-color:#995127; height: 60px;"><p style="font-size:30px;color:white;">Passenger Details</p></div>

			
			<form  method="post" action="">
			
                        <tr>
                            <th>Passenger Name:</th>
                            <td><?php echo  $data['passenger_name']; ?></td>
							 <th>Gender:</th>
                            <td><?php echo  $data['passenger_gender']; ?></td> 
                      
                        </tr>
						
                        <tr>
                            <th>Contact No:</th>
                            <td><?php echo  $data['passenger_contact']; ?></td>
						   <th>Email:</th>
						   <td><?php echo  $data['passenger_email']; ?></td> 							
                        </tr> 					
						
                    </table> <br />
					
				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<div class="panel-heading" style="background-color:green; height: 60px;"><p style="font-size:30px;color:white;">Booking Details</p></div>
                         <tr>
                            <th>PNR No:</th>
                            <td><?php echo  $data['pnr_no']; ?></td>
							<th>Booking Date:</th>
                            <td><?php echo  $data['booking_date']; ?></td>
                      
                        </tr>                        
						
						<tr>
                            <th>Reference No:</th>
                            <td><?php echo  $data['reference_no']; ?></td>
							<th>Journey Date:</th>
                            <td><?php echo  $data['date']; ?></td>
                      
                        </tr>	

						<tr>
							<th>Bus No:</th>
                            <td><?php echo  $data['bus_no']; ?></td>
							<th>Bus Type:</th>
                            <td><?php echo  $data['bus_type']; ?></td>
                      
                        </tr>						
						
						<tr>
                            <th>From City:</th>
                            <td><?php echo  $data['from_city']; ?></td>
							<th>To City:</th>
                            <td><?php echo  $data['to_city']; ?></td>
                      
                        </tr>

						<tr>

							<th>Boarding Point:</th>
                            <td><?php echo  $data['counter_name']; ?></td>
							<th>Seat No(s):</th>
                            <td><?php echo $booked_seat;  ?></td>
                      
                        </tr>						
						
						<tr>

							<th>ticket price:</th>
                            <td>৳. <?php echo $data['fare'];?></td>
							<th>Starting Time:</th>
                            <td><?php echo date('h:i A', strtotime($data['departure_time'])); ?> </td>
                      
                        </tr>	

						<tr>

							<th>Total Amount Payable:</th>
                            <td>৳. <?php echo $data['fare']*count($booked_seats);?></td>
							<th>Current Booking Status:</th>
                            <td><?php if ( $data['booking_status'] == 'pending'){echo "pending";} elseif( $data['booking_status'] == 'approved'){echo "approved";} elseif( $data['booking_status'] == 'cancelled'){echo "cancelled";}?></td>
							
                        </tr>							
						
				
						
                </table>
				
			
				<div class=" col-md-offset-2">
				
				<input type="hidden" name="trip_id" value="<?php echo $data['trip_id']; ?>">
				<input type="hidden" name="pnr_no" value="<?php echo $data['pnr_no']; ?>">	
				<button type="submit" name="approve" class="btn btn-lg btn-success"><i class="fa fa-check-square"></i> Approve Request</button>
				<button type="submit" name="cancel" class="btn btn-lg btn-warning"><i class="fa fa-window-close"></i> Cancel Request</button>
				<button type="submit" name="delete" class="btn btn-lg btn-danger" onclick="return confirmation()"><i class="fa fa-trash-o"></i> Delete Request</button>
				<a href="index.php?page=manage_request" class="btn btn-lg btn-success col-md-offset-2"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
				
               </div>
			   
			   </form>

        </div>
       
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
