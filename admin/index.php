<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require("../db_connect/connection.php");
require_once "../phpmailer/PHPMailerAutoload.php";

session_start();
if($_SESSION['email']!=null)
{
	
	     $id = $_SESSION['admin_id'];
		 $sql= $conn->prepare("select * from tbl_admin_info where admin_id='$id'");
		 $sql->execute();
		 $data = $sql->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html >
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   
   <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/custom.js"></script>
	
	
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Main admin</a> 
            </div>
  <div style="color: white; padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> <i class="fa fa-user"></i>  <?php echo $_SESSION['name'];?>  <a href="../logout.php?type=admin" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				
					
                    <li>
                        <a  href="index.php?page=dashboard"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                        
					  
                    <li>
                        <a href=""><i class="fa fa-user-md fa-3x"></i>Doctors<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level"> 
							<li> 
                                <a href="index.php?page=add_doctor">Add Doctor</a>
                            </li> 
                            <li> 
                                <a href="index.php?page=manage_doctor">Manage Doctor</a>
                            </li>  							
                        </ul>
                     </li>  
					 <li>
                        <a href=""><i class="fa fa-female fa-3x"></i>Receptionists<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">  
							<li> 
                                <a href="index.php?page=add_reciptionists">Add Receptionist</a>
                            </li> 
                            <li> 
                                <a href="index.php?page=manage_receptionist">Manage Receptionist</a>
                            </li>  							
                        </ul>
                     </li>  
					 <li>
                        <a href=""><i class="fa fa-wheelchair fa-3x"></i>Patients<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">  
							<li> 
                                <a href="index.php?page=patientinfo">Patients Information</a>
                            </li> 
                        </ul>
                     </li> 
					
					<li>
                        <a href=""><i class="fa fa-newspaper-o fa-3x"></i>Appointments<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">   
                            <li> 
                                <a href="index.php?page=approve_appointment">Approve/Cancel Appointments</a>
                            </li>  							
                        </ul>
                     </li>  		
                    <li>
                        <a  href="index.php?page=update_profile"><i class="fa fa-edit fa-3x"></i> Edit Profile </a>
                    </li>				
					<li>
                        <a   href="../logout.php?type=admin"><i class="fa fa-sign-out fa-3x"></i> Logout</a>
                    </li>	
                      	
					                   
                  
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
		
		       <?php 
				  switch (@$_GET['page']) {
                        case "create-admin": {
                                include("create_admin.php");
                            }
                            break;
							
							 case "manage_admin": {
                                include("manage_admin.php");
                            }
                            break;			 
							
							case "add_doctor": {
                                include("add_doctor.php");
                            }
                            break;
							
							case "update_profile": {
                                include("update_profile.php");
                            }
                            break;
							
							 case "update-admin": {
                                include("update-admin.php");
                            }
                            break;		 
							
							case "manage_doctor": {
                                include("manage_doctor.php");
                            }
                            break;		 
							
							case "add_reciptionists": {
                                include("add_reciptionists.php");
                            }
                            break;
							
							case "manage_receptionist": {
                                include("manage_receptionist.php");
                            }
                            break;
							
							case "patientinfo": {
                                include("patientinfo.php");
                            }
                            break;
							
							case "view_appointment_request": {
                                include("view_appointment_request.php");
                            }
                            break;
							case "manage_appointment": {
                                include("manage_appointment.php");
                            }
                            break;
							case "approve_appointment": {
                                include("approve_appointment.php");
                            }
                            break;
							case "dashboard": {
                                include("dashboard.php");
                            }
                            break;
							
                         default: {
                                include("dashboard.php");
                            }
                    }
				
				?>	

       </div>
         <!-- /. PAGE WRAPPER  -->
   
</body>
</html>

</html>

<?php  
}
else
{
	 header('location:../error.php');
}
?>





