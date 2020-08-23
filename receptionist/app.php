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

$sql= "INSERT INTO offline_appointment (name1,address1,contact1,email1,blood1,age1,select_doctor1,consultency_Fee1,date1,time1)
 VALUES ('$_POST[name1]','$_POST[address1]','$_POST[contact1]','$_POST[email1]','$_POST[blood1]','$_POST[age1]','$_POST[select_doctor1]','$_POST[consultency_Fee1]','$_POST[date1]','$_POST[time1]')";

if(mysqli_query($conn,$sql))
{
 echo "Appointment Is Approved"; 
}
else
{
echo "Error";
}
		



?>
