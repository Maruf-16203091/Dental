

<!DOCTYPE html>
	<html>
		<head>
			<title>OEMS</title>
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/style.css">
		</head>
		<body>
		<?php include_once "inc/header.php" ?>
		<?php
		 $login=session::get('login');
		 	if( $login == true){
		 	header("Location:order.php");
		 }
		?>

		<div class="login_wrapper">
			 <div class="loginpart">
				 	<h3>Existing Customers</h3>
	        		<p>Sign in with the form below.</p>
	        		<form action="" method="POST">
	        			<input class="form-control" type="text" name="email" placeholder="Enter your email">
	        			<input class="form-control" type="password" name="password" placeholder="Enter your password">
	        			<input class="btn btn-info" type="submit" name="login" value="Log in">
	        		</form>
	        		<a href="forgetPassword.php">Forgot Password?</a>
	        		<?php
	        		session::checkLogin();
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
	$customerLogin= $customer->customerLogin($_POST);
	if(isset($customerLogin)){
		echo $customerLogin;
		?>
		<h3 class="text-warning text-center"><?php echo $customerLogin;}}?></h3>
			 </div>


			 <div class="registerpart">
				 	<h3>Register New Customer</h3>
	        		<form action="", method="POST">
	        		<table>
	        			<tbody>
	        				<tr>
	        					<td>
				        			<input class="form-control" type="text" name="name" placeholder="Name">
				        		
				        			<input class="form-control" type="text" name="address" placeholder="Address">
	        					
				        			<input class="form-control" type="text" name="city" placeholder="City">
				        			<input class="form-control" type="text" name="zip" placeholder="ZIP-Code">
	        					</td>
	        				
	        					<td>
				        			
				       
				        			<input class="form-control" type="text" name="phone" placeholder="Mobile Number">
	        					
	        				
				        			<input class="form-control" type="text" name="email" placeholder="Email">
				        		
	        						<input class="form-control" type="password" name="password" placeholder="Password">
	        						<input class="form-control" type="password" name="cnfrmPassword" placeholder="Re-entre Password">
	        					</td>
	        							
	        				</tr>
	        				<tr><td><input class="btn btn-info rsubmit" type="submit" name="register" value="Register">
	        					</td></tr>
	        			</tbody>
	        		</table>		
	        	</form>

	       <?php 
			 	if(isset($_POST['register'])){
			 		$customerPassword = $_POST['password'];
					 $customerEmail = $_POST['email'];
		  $vKey = md5(time().$customerPassword);
		  $subject = "Registration";
		  $message = "This code is mandatory for bkash payment and any security issue.The code is ".$vKey;
		  $customerreg = $customer->customerRegistration($_POST);
					include "PHPMailer-master/PHPMailerAutoload.php";
						$mail = new PHPMailer();
						   $mail ->IsSmtp();
						   $mail ->SMTPDebug = 0;
						   $mail ->SMTPAuth = true;
						   $mail ->SMTPSecure = 'ssl';
						   $mail ->Host = "smtp.gmail.com";
						   $mail ->Port = 465; // or 587
						   $mail ->IsHTML(true);
						   $mail ->Username = "anup2681994@gmail.com";
						   $mail ->Password = "asaj2uua";
						   $mail ->SetFrom("anup2681994@gmail.com");
						   $mail ->Subject = $subject;
						   $mail ->Body = $customerreg ;
						   $mail ->AddAddress($customerEmail);


						  if($mail->Send())
						   {
						   	
						        if(isset($customerreg)){
						
						
						   echo $customerreg;
										}

							
  								 }
						       
									else{
											echo $customerreg;
										}

					
							
  								 
  								 
					
								}
			 ?>
			 </div>
		</div>
</body>
</html>