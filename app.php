<?php
$servername="localhost";
$username="root";
$password="";
$db_name="clinic";
$conn=mysqli_connect($servername,$username,$password,$db_name);
if(! $conn)
{
die("Error");
}
else{
echo "&nbsp;";
}


if(isset($_POST['date'])){
	$mydate = $_POST['date'];
	if(date("Y-m-d",strtotime($mydate)) > date('Y-m-d')) {
	  $_POST['date'];
	  $sql= "INSERT INTO appointment (name,address,contact,email,blood,age,select_doctor,consultency_Fee,date,time)
 VALUES ('$_POST[name]','$_POST[address]','$_POST[contact]','$_POST[email]','$_POST[blood]','$_POST[age]','$_POST[select_doctor]','$_POST[consultency_Fee]','$_POST[date]','$_POST[time]')";
		 if(mysqli_query($conn,$sql))
		{
		 include('pop.php'); 
		}
		else
		{
		echo "Error";
		}
	} else {
		echo '<script type="text/javascript">'; 
		echo 'alert("In valid date");'; 
		echo 'window.location.href = "appointment.php";';
		echo '</script>';
	}
}









?>
