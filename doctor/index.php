<?php
require("../db_connect/connection.php");
session_start();
if($_SESSION['doctor_email']!=null)
{
	
	     $id = $_SESSION['doctor_id'];
		 $sql= $conn->prepare("select * from tbl_add_doctor where doctor_id='$id'");
		 $sql->execute();
		 $data = $sql->fetch(PDO::FETCH_ASSOC);
		 
	
	
?>


<!DOCTYPE html>
<html >
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Doctor Panel</title>
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
                <a class="navbar-brand" href="index.php">Doctor</a> 
            </div>
  <div style="color: white; padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> <i class="fa fa-user"></i>  <?php echo $_SESSION['doctor_name'];?>  <a href="../logout.php?type=doctor" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				
				
					
                    <li>
                        <a  href="index.php?page=dashboard"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                      
			
                    <li>
                        <a href=""><i class="fa fa-file-text fa-3x"></i>My Appointment<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="index.php?page=view_appointment">Appointment History</a>
                            </li>    							
                        </ul>
                     </li>  
					 <li>
                                <a href="index.php?page=prescription"><i class="fa fa-file-text fa-3x"></i>Prescription<span class="fa arrow"></span></a>
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
                        <a   href="../logout.php?type=doctor"><i class="fa fa-sign-out fa-3x"></i> Logout</a>
                    </li>	
                      	
					                   
                  
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
		
		       <?php 
				  switch (@$_GET['page']) {
                        case "view_appointment": {
                                include("view_appointment.php");
                            }
                            break;
							
							 case "prescription": {
                                include("prescription.php");
                            }
                            break;			 
							
			
							case "update_profile": {
                                include("update_profile.php");
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





