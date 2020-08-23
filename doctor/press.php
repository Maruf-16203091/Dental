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

$sql= "INSERT INTO prescription (patient_name,age,date)
 VALUES ('$_POST[patient_name]','$_POST[age]','$_POST[date]')";

if(mysqli_query($conn,$sql))
{
 include('prescription.php'); 
}
else
{
echo "Error";
}
		



?>
