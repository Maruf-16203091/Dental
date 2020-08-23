<!DOCTYPE html>
<html lang="en">
<head>
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea, .text {
  width: 75%;
  padding: 12px;
  border: 3px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}



label {
  padding: 12px 12px 12px 12px;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: red;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 70px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}
.col-85 {
  float: left;
  width: 85%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 75%;
    margin-top: 0;
  }
}
</style>
<title>Dental care</title>
</head>
<body>

<div class="success"> 
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
	</div>

<div class="container">
	
<i class="fa fa-newspaper-o fa-3x">
<h2>Appointment Form</h2>
<center>
<p>Please fill up the form with valid information!!</p></center>
  <form action="appointment.php" method="POST" ">
  <div class="row">
    <div class="col-25">
      <label for="name">Name</label>
    </div>
    <div class="col-75">
      <input class="text" type="text" name="name" placeholder="Your name.." value="" required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="address">Address</label>
    </div>
    <div class="col-75">
      <input class="text" type="text" name="address" placeholder="Your address.." value="" required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="contact">Phone No</label>
    </div>
    <div class="col-75">
      <input class="text" type='tel' pattern='\+?(88)?0?1[56789][0-9]{8}\b'  name="contact" placeholder="Your contact number.." value="" required>
    </div>
  </div>
    <div class="row">
    <div class="col-25">
      <label for="email">Email</label>
    </div>
    <div class="col-75">
      <input class="text" type="email"  name="email" placeholder="Your email .." value="" required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="blood">Blood Group</label>
    </div>
    <div class="col-75">
      <input class="text" type="text" name="blood" placeholder="Your blood group.." value="" required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="age">Age</label>
    </div>
    <div class="col-75">
      <input class="text" type="number" name="age" placeholder="Your current age.." value="" min="1" max="120" required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="select_doctor">Select doctor</label>
	  
    </div>
	
	
    <div class="col-75">
      <select id="select_doctor" name="select_doctor">
	  

      <?php 
		
			$dsn = 'mysql:hosy=localhost;dbname=clinic';
			$username = 'root';
			$password = '';
			try{
				// connect to mysql
				$con = new PDO($dsn,$username,$password);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (Exception $ex) {
				echo 'Not Connected '.$ex->getMessage();
			}
			
			// mysql select query
			$stmt = $con->prepare('SELECT * FROM tbl_add_doctor');
			$stmt->execute();
			$users = $stmt->fetchAll();

			foreach ($users as $user)
			{
				echo '<option value="'.$user['doctor_name'].'">'.$user['doctor_name'].'</option>' ;
			}
		 
	 ?>
        
      </select>
    </div>
  </div>
   <div class="row">
    <div class="col-25">
      <label for="consultency_Fee">Consultency Fee</label>
    </div>
    <div class="col-75">
      <select id="consultency_Fee" name="consultency_Fee">
        <option value="500_Taka">500 Taka</option>
      </select>
    </div>
  </div>
  
  <div class="row">
    <div class="col-25">
      <label for="date">Date</label>
    </div>
    <div class="col-75">
      <input type="date" name="date" value="" required>
	  
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="time">Time</label>
    </div>
    <div class="col-75">
      <select id="time" name="time">
        <option value="11.00 AM-01.00 PM">11.00 AM-01.00 PM</option>
        <option value="02.00 PM-04.00 PM">02.00 PM-04.00 PM</option>
        <option value="05.00 PM-08.00 PM">05.00 PM-08.00 PM</option>        
      </select>
    </div>
  </div><br>
  <div class="row">
  <div class="col-85">
    <input name="btn" type="submit" value="Submit">
  </div>
  </div>
  
  </form>
</div>

</body>
</html>




