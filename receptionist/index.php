<?php
require("../db_connect/connection.php");
session_start();
if($_SESSION['reciptionist_email']!=null)
{
	
	     $id = $_SESSION['reciptionist_email'];
		 $sql= $conn->prepare("select * from add_reciptionists where reciptionist_email='$id'");
		 $sql->execute();
		 $data = $sql->fetch(PDO::FETCH_ASSOC);
		 
	
	
?>


<!DOCTYPE html>
<html >
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Receptionist Panel</title>
    <link href="../admin/../admin/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../admin/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../admin/assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   
    <script src="../admin/assets/js/jquery-1.10.2.js"></script>
    <script src="../admin/assets/js/bootstrap.min.js"></script>
    <script src="../admin/assets/js/jquery.metisMenu.js"></script>
    <script src="../admin/assets/js/custom.js"></script>
	
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
                <a class="navbar-brand" href="index.php">Receptionist</a> 
            </div>
  <div style="color: white; padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> <i class="fa fa-user"></i>  <?php echo $_SESSION['reciptionist_name'];?>  <a href="../logout.php?type=receptionist" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				
				
					
                    <li>
                        <a  href="index.php?page=dashboard"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                      
			
                    <li>
                        <a href=""><i class="fa fa-file-text fa-3x"></i>Offline Appointment<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level"> 
							<li> 
                                <a href="index.php?page=appointment">Getting Appointment</a>
                            </li> 
                            <li> 
                                <a href="index.php?page=print_appointment">Print Appointment</a>
                            </li>  							
                        </ul>
                     </li> 
					 <li>
                        <a href=""><i class="fa fa-clock-o fa-3x"></i>Appointment History<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level"> 
							<li> 
                                <a href="index.php?page=online_history">Online History</a>
                            </li> 
                            <li> 
                                <a href="index.php?page=offline_history">Offline History</a>
                            </li>  							
                        </ul>
                     </li> 
					 <li>
                        <a href=""><i class="fa fa-file-text fa-3x"></i>Test<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level"> 
							<li> 
                                <a href="index.php?page=try">Individual Test</a>
                            </li> 
                            <li> 
                                <a href="index.php?page=view_test">All Tests</a>
                            </li>  							
                        </ul>
                     </li> 					 
					 <li>
                        <a href=""><i class="fa fa-user fa-3x"></i>My Profile<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a  href="index.php?page=update_profile"><i class="fa fa-edit"></i> Edit Profile </a>
                            </li>                                							
                        </ul>
                     </li> 				
					<li>
                        <a   href="../logout.php?type=receptionist"><i class="fa fa-sign-out fa-3x"></i> Logout</a>
                    </li>	
                      	
					                   
                  
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
		
		       <?php 
				  switch (@$_GET['page']) {
                        case "appointment": {
                                include("appointment.php");
                            }
                            break;
							
							 case "try": {
                                include("try.php");
                            }
                            break;			 
							
							case "view_individual_test": {
                                include("view_individual_test.php");
                            }
                            break;
							
							case "print_individual_app": {
                                include("print_individual_app.php");
                            }
                            break;
							
							case "update_profile": {
                                include("update_profile.php");
                            }
                            break;
							
							 case "online_history": {
                                include("online_history.php");
                            }
                            break;
							
                            case "offline_history": {
                                include("offline_history.php");
                            }
                            break;
							
							case "datewise": {
                                include("datewise.php");
                            }
                            break;
							
							case "off_datewise": {
                                include("off_datewise.php");
                            }
                            break;
							
							case "datewise_history": {
                                include("datewise_history.php");
                            }
                            break;
							
							case "off_datewise_history": {
                                include("off_datewise_history.php");
                            }
                            break;
							
							case "patient_wise": {
                                include("patient_wise.php");
                            }
                            break;
							
							case "off_patient_wise": {
                                include("off_patient_wise.php");
                            }
                            break;
							
							case "patient_wise_history": {
                                include("patient_wise_history.php");
                            }
                            break;
							
							case "off_patient_wise_history": {
                                include("off_patient_wise_history.php");
                            }
                            break;
							
                            case "view_test": {
                                include("view_test.php");
                            }
                            break;
							
							case "print_appointment": {
                                include("print_appointment.php");
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


<?php  
}
else
{
	 header('location:../error.php');
}
?>





