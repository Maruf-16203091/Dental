<?php
require("../db_connect/connection.php");
session_start();
if(isset($_POST['btn']))
{
	$login_type = $_POST['login_type'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	
       if($login_type == 'admin')
	{
		 $sql = $conn->prepare("select * from tbl_admin_info where email='$username'");
		 $sql->execute();
		 $value = $sql->fetch(PDO::FETCH_ASSOC);
		 //echo "<pre>";print_r($value);exit;
		if($value['password']==$password)
		{
			$_SESSION['admin_id'] = $value['admin_id'];
			$_SESSION['name']     = $value['name'];
			$_SESSION['email']    = $value['email'];
            $_SESSION['img_url']  = $value['img_url'];
                        
            header('location:../admin/');
		}
		else
		{
			$sms = '<div class="alert alert-danger alert-dismissable error-message"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Sorry! You have entered a wrong password.</strong> </div>';
		}
		
	} 
	
	else if($login_type == 'doctor')
	
	{
		 $sql = $conn->prepare("select * from tbl_add_doctor where doctor_email='$username'");
		 $sql->execute();
		 $value = $sql->fetch(PDO::FETCH_ASSOC);
		 //echo "<pre>";print_r($value);exit;
		if($value['password']==$password  && $value['doctor_active_status']==1)
		{
			$_SESSION['doctor_id']       = $value['doctor_id'];
			$_SESSION['doctor_name']     = $value['doctor_name'];
			$_SESSION['doctor_email']    = $value['doctor_email'];
            $_SESSION['doctor_img_url']       = $value['doctor_img_url'];
                        
            header('location:../doctor/');
		}
		
		else
		{
			$sms = '<div class="alert alert-danger alert-dismissable error-message"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Sorry! You have entered a wrong password.</strong> </div>';
		}
	}	 	
	
	else if($login_type == 'receptionist')
	
	{
		
		 $sql = $conn->prepare("select * from add_reciptionists where reciptionist_email='$username'");
		 $sql->execute();
		 $value = $sql->fetch(PDO::FETCH_ASSOC);
		 //echo "<pre>";print_r($value);exit;
		if($value['password']==$password && $value['reciptionist_active_status']==1)
		{
			$_SESSION['reciptionist_id'] = $value['reciptionist_id'];
			$_SESSION['reciptionist_name']  = $value['reciptionist_name'];
			$_SESSION['reciptionist_email']    = $value['reciptionist_email'];
            $_SESSION['reciptionist_img_url']       = $value['reciptionist_img_url'];
                        
            header('location:../receptionist/');
		}
		else
		{
			$sms = '<div class="alert alert-danger alert-dismissable error-message"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Sorry! You have entered a wrong password.</strong> </div>';
		}
		
	} 
	
	else
	 {
			$sms = '<div class="alert alert-danger alert-dismissable error-message"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Please! Select a Login Type</strong> </div>';
	 }
	 
	
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dental Care</title>

       
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
       
        <link rel="stylesheet" href="assets/css/style.css">
		<style>
body {
    background-image: url("picture/hm2.jpeg");
}
</style>

    </head>

    <body>

        <!-- Top content -->
       
        	<div class="col-md-4 bann-info1" >
                        <div class="col-sm-12 col-sm-offset-1 text">
						
			<h1 style="color: white">Dental Care</h1>	
		          
                        </div>						
                    </div>
                <div class="container">
                    
					<div class="col-sm-6 col-sm-offset-3 "><h3 style="color:blue; text-align: center;" ><?php if(isset($sms)) {echo $sms;} ?> </h3>	</div>
                    <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 form-box">
                     <div class="form-top">
                        		<div class="form-top-left">
                        			<br><br><br>
                            		<p style="color: yellow">Enter your username and password to log on</p>
                        		</div>
                        		<div class="form-top-right">
								<b><h1 style="color: white">Login Panel</h1></b>
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="password"  placeholder="Password..." class="form-password form-control" id="form-password">
			                        </div>
									
									<div style="margin-bottom: 25px">
									<select name="login_type" class="selectpicker form-password form-control">
                                   							
                                     <option>--------Select Login Type------</option>
                                     <option value="admin">Admin</option>
                                     <option value="doctor">Doctor</option>
                                     <option value="receptionist">Receptionist</option>
                                    </select>
             
                                     </div>
			                        <button style="color: black" type="submit" name="btn" class="btn">Log In</button>
									<br><br>
									<?php include('backward.php'); ?>
                                     <?php include('forward.php'); ?>
			                    </form>
		                    </div>
                        </div>
                    </div>
                 
                    </div>
                </div>
            </div>
            
        </div>

    </body>

</html>
