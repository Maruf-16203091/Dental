<?php

		if(isset($_POST['approve']))
		 {
			   $id = $_POST['app_no'];			
			   $query = "UPDATE `appointment` SET `appointment_status`='1' where app_no='$id'";
			   $stmt = $conn->prepare($query);
			   $end = $stmt->execute();			   
				if($end)
					{
						
					$sql = $conn->prepare("SELECT * FROM appointment WHERE app_no='$id' ");
					$sql->execute();
					$data = $sql->fetch(PDO::FETCH_ASSOC);
                    $name= $data['name'];					
                    $contact= $data['contact'];					
                    $select_doctor= $data['select_doctor'];					
					$consultency_Fee= $data['consultency_Fee'];	
                    $date= $data['date'];	
                    $time= $data['time'];
                    $email= $data['email'];						
					$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
					try {
						//Server settings
						//$mail->SMTPDebug = 2;                                 // Enable verbose debug output
						$mail->isSMTP();                                      // Set mailer to use SMTP
						$mail->Host = 'smtp.mailtrap.io';                       // Specify main and backup SMTP servers
						$mail->SMTPAuth = true;                               // Enable SMTP authentication
						$mail->Username = '2aef7bf053a985';                 // SMTP username
						$mail->Password = '3e0321074b116f';                           // SMTP password
						$mail->SMTPSecure = 'tls';                        // Enable TLS encryption, `ssl` also accepted
						$mail->Port = 465;                                    // TCP port to connect to
						

						//Recipients
						$mail->setFrom('anup2681994@gmail.com', 'anup2681994');
						$mail->addAddress($email, $name);     // Add a recipient					
						$mail->addReplyTo('info@example.com', 'Information');
						$mail->addCC('cc@example.com');
						$mail->addBCC('bcc@example.com');

						//Attachments
						//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
						//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

						//Content
						$mail->isHTML(true);                                  // Set email format to HTML
						$mail->Subject = 'Appointment';
						$mail->Body    = 'Congratulations! '.$name.', your appointment is approved. Your appointment number is '.$id;
						$mail->AltBody = 'Appointment';

						$mail->send();
						//echo 'Message has been sent';
						} catch (Exception $e) {
							echo 'Message could not be sent.';
							echo 'Mailer Error: ' . $mail->ErrorInfo;
						} 
					
					 $sms = '<div class="alert alert-success alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <h2 style="text-align: center; font-weight: bolder;">Request successfully approved!</h2></strong> </div>';
				    }else{
					 $sms = '<div class="alert alert-success alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <h2 style="text-align: center; font-weight: bolder;">Request not approved!</h2></strong> </div>';
					}
		 } 
		 
  	   
		 
		 
		 elseif(isset($_POST['delete']))
		 {
					
			   $id = $_POST['app_no'];                
			   $sql = $conn->prepare("SELECT * FROM appointment WHERE app_no='$id' ");
			   $sql->execute();
			   $data = $sql->fetch(PDO::FETCH_ASSOC);
               $name= $data['name'];					
                    $contact= $data['contact'];					
                    $select_doctor= $data['select_doctor'];					
					$consultency_Fee= $data['consultency_Fee'];	
                    $date= $data['date'];	
                    $time= $data['time'];						
					$email= $data['email'];
					$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
					try {
						//Server settings
						//$mail->SMTPDebug = 2;                                 // Enable verbose debug output
						$mail->isSMTP();                                      // Set mailer to use SMTP
						$mail->Host = 'smtp.mailtrap.io';                       // Specify main and backup SMTP servers
						$mail->SMTPAuth = true;                               // Enable SMTP authentication
						$mail->Username = '2aef7bf053a985';                 // SMTP username
						$mail->Password = '3e0321074b116f';                           // SMTP password
						$mail->SMTPSecure = 'tls';                        // Enable TLS encryption, `ssl` also accepted
						$mail->Port = 465;                                    // TCP port to connect to
						

						//Recipients
						$mail->setFrom('anup2681994@gmail.com', 'anup2681994');
						$mail->addAddress($email, $name);     // Add a recipient					
						$mail->addReplyTo('info@example.com', 'Information');
						$mail->addCC('cc@example.com');
						$mail->addBCC('bcc@example.com');

						//Attachments
						//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
						//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

						//Content
						$mail->isHTML(true);                                  // Set email format to HTML
						$mail->Subject = 'Appointment';
						$mail->Body    = 'Sorry! '.$name.', your appointment is Cancelled. ';
						$mail->AltBody = 'Appointment';

						$mail->send();
						//echo 'Message has been sent';
						} catch (Exception $e) {
							echo 'Message could not be sent.';
							echo 'Mailer Error: ' . $mail->ErrorInfo;
						} 
	           
			   $query = "DELETE FROM `appointment` where app_no='$id'";
			   $stmt = $conn->prepare($query);
			   $end = $stmt->execute();
				if($end && $data)
					{
		
					
					 $sms = '<div class="alert alert-success alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <h2 style="text-align: center; font-weight: bolder;">The Appointment is deleted!</h2></strong> </div>';
				    }else{
					 $sms = '<div class="alert alert-success alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <h2 style="text-align: center; font-weight: bolder;">The Appointment is not deleted!</h2></strong> </div>';
					}
		 }   
		 
		 
		 $sqlAgent = $conn->prepare("SELECT * FROM appointment ORDER BY `app_no` DESC");
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
          <h2>Approve/Cancel Appointment</h2>		  
                      
         </div>
     </div>
	  
      <!-- /. ROW  -->
      <hr />
	 <?php if(isset($sms)){echo $sms;} ?>
			 <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
             <div class="panel panel-default">
             <div class="panel-heading" style="text-align:center; font-weight: bolder; font-size: 18px;">All Appointments  </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
										  <th>Sl.</th>
                                          <th>Patient Name</th>                                             
                                          <th>Contact No</th>
                                          <th>Selected doctor</th>
				                          <th>Date</th>
				                          <th>Time</th>
                                          <th>Request Status</th>                                                      
                                          <th>Action</th>
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
                                              <td><h5><?php echo  $value['name']; ?></h5></td>                                                                                    
                                              <td><h5><?php echo  $value['contact']; ?></h5></td>
                                              <td><h5><?php echo  $value['select_doctor']; ?></h5></td>                                           
                                              <td><h5><?php echo  $value['date']; ?> </h5></td>
                                              <td><h5><?php echo  $value['time']; ?> </h5></td>	                                                                                  
                                              <td><h5><?php if($value['appointment_status'] == 1){ ?><a class="btn btn-xs btn-success"><span class="glyphicon glyphicon-ok-sign"></span> approved</a><?php }elseif($value['appointment_status'] == 0){?><a class="btn btn-xs btn-info"><span class="glyphicon glyphicon-time"></span> pending</a><?php } elseif($value['appointment_status'] == 2){?><a class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-off"></span> blocked</a><?php }?></h5></td>


											  <td class="center">
											  <?php 
											  
											  if($value['appointment_status'] == 1) { ?>
											  
												<button class="btn btn-danger" type="submit" name="delete"  onclick="return confirmation()">
													<span>DELETE</span>
												</button>         
												
												<input type="hidden" name="app_no" value="<?php echo $value['app_no']; ?>">
												
													
												
											  <?php 
											  
											    } elseif($value['appointment_status'] == 0) { ?> 
											  
                                                <button class="btn btn-danger" type="submit" name="delete"  onclick="return confirmation()">
												<span>Cancel</span>											
												</button>         
												
												<button class="btn btn-success" type="submit" name="approve"  onclick="return confirmation()">
													<span>Approve</span>
												</button>	

                                                <input type="hidden" name="app_no" value="<?php echo $value['app_no']; ?>">
												
											  
											  <?php 
											  
											  } elseif($value['appointment_status'] == 2) { ?> 
											  
											    <button class="btn btn-danger" type="submit" name="delete"  onclick="return confirmation()">
													<span class="glyphicon glyphicon-trash"></span>
												</button>    
												
												<input type="hidden" name="app_no" value="<?php echo $value['app_no']; ?>">
												

												
												
												
											  <?php }?>
											  
											 </td>
									    	  <td><a href="index.php?page=view_appointment_request&id=<?php echo $value['app_no']; ?>" class="btn btn-xs btn-info"><i class="fa fa-clock-o"></i> View details</a></td>	

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
