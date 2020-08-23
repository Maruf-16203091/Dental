
<?php
session_start();
switch($_GET['type'])
{
case 'admin':
	unset($_SESSION['admin_id']);
	unset($_SESSION['name']  );
	unset($_SESSION['email']  );
	unset($_SESSION['img_url']);
	header('location:index.php');
	break;

case 'doctor':
	unset($_SESSION['doctor_id']);
	unset($_SESSION['doctor_name']  );
	unset($_SESSION['doctor_email']  );
	unset($_SESSION['doctor_img_url']);
	header('location:index.php');
	break;
	
case 'receptionist':
	unset($_SESSION['reciptionist_id']);
	unset($_SESSION['reciptionist_name']  );
	unset($_SESSION['reciptionist_email']  );
	unset($_SESSION['reciptionist_img_url']);
	header('location:index.php');
	break;
}


  
 
 