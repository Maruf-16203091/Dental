<!DOCTYPE html>
<?php include('headerD.php'); ?>


<html lang="en">
<head>
  <title>Dental Care</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<style>
body {
  background-color: #B3F2FF;
}
	.avatar {
  vertical-align: middle;
  width: 100px;
  height: 100px;
  border-radius: 50%;
  
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
}
p.groove {border-style: groove;}
</style>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container">
    <ul class="nav navbar-nav">
	<br>
      <li class="#"><a href="index.php">Home |</a></li>
<li><a href="appointment.php" onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;">Appointment |</a></li>
      <li><a href="about.php">About Us |</a></li>
      <li><a href="contact.php">Contact Us |</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right"><br>
      <li><a href="login/index.php" class="btn btn-info" role="button">Log In</a></li>
	 
	  
    </ul>
  </div>
<br>
</nav>
  <div class="clearfix"></div>
<br>
<!--- /slide show ---->
<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
	  <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
	  <center>
        <img src="pictures/d1.png" alt="Los Angeles" style="width:75%;">
        <div class="carousel-caption">
          <h3>Brush Everyday</h3>
          <p>Don't Rush When You Brush!</p>
        </div>
		</center>
      </div>

      <div class="item">
	  <center>
        <img src="pictures/s3.png" alt="Chicago" style="width:74.8%;">
        <div class="carousel-caption">
          <h3>Smile</h3>
          <p>Protect your teeth from injury. ...</p>
        </div>
		</center>
      </div>
	  <div class="item">
	  <center>
        <img src="pictures/s4.png" alt="Chicago" style="width:75%;">
        <div class="carousel-caption">
          <h3>Teeth</h3>
          <p>Try to save a knocked out tooth.!</p>
        </div>
		</center>
      </div>
	
      <div class="item">
	  <center>
        <img src="pictures/s5.png" alt="New York" style="width:75%;">
        <div class="carousel-caption">
          <h3>Dental Care</h3>
          <p>Brush at least twice a day. ...</p>
        </div>
		</center>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<div class="clearfix"></div><br><br>
<div class="container">
	
	<div class="col-md-5 bann-info">
	<b><h2 style="color: tomato">Consultation Hours</h2></b><br>
	<img src="pictures/doctor.png" alt="Avatar" class="avatar">


		
		<br><br>
				<table  style="width:100%">
  <tr>
    <th>Sunday</th> </tr>
     <tr><td>11:00 AM - 01:00 PM </td> </tr> <tr><td> 02:00 PM - 04:00 PM</td> </tr> <tr><td> 05:00 PM - 08:00 PM</td>
  </tr>
    <tr>
    <th>Monday</th> </tr>
     <tr><td>11:00 AM - 01:00 PM </td> </tr> <tr><td> 02:00 PM - 04:00 PM</td> </tr> <tr><td> 05:00 PM - 08:00 PM</td>
  </tr>
    <tr>
    <th>Tuesday</th> </tr>
     <tr><td>11:00 AM - 01:00 PM </td> </tr> <tr><td> 02:00 PM - 04:00 PM</td> </tr> <tr><td> 05:00 PM - 08:00 PM</td>
  </tr>
     <tr>
    <th>Wednesday</th> </tr>
     <tr><td>11:00 AM - 01:00 PM </td> </tr> <tr><td> 02:00 PM - 04:00 PM</td> </tr> <tr><td> 05:00 PM - 08:00 PM</td>
  </tr>
     <tr>
    <th>Thursday</th> </tr>
     <tr><td>11:00 AM - 01:00 PM </td> </tr> <tr><td> 02:00 PM - 04:00 PM</td> </tr> <tr><td> 05:00 PM - 08:00 PM</td>
  </tr>
     <tr>
    <th>Friday</th> </tr>
     <tr><td>11:00 AM - 01:00 PM </td> </tr> <tr><td> 02:00 PM - 04:00 PM</td> </tr> <tr><td> 05:00 PM - 08:00 PM</td>
  </tr>
     <tr>
    <th>Saturday</th> </tr>
     <tr><td>11:00 AM - 01:00 PM </td> </tr> <tr><td> 02:00 PM - 04:00 PM</td> </tr> <tr><td> 05:00 PM - 08:00 PM</td>
  </tr>
</table>
	</div>
	<div class="clearfix"></div>
</div>
	
<!-- Left logo -->
<div class="footer-top">
	<div class="container">
		<div class="col-md-20 footer-left wow fadeInLeft animated" data-wow-delay=".5s">
			<center>
			<h2 style="color: green">Treatments</h2><br>
			</center>
				<ul>
					<li><a href="inlays.php">Inlays and Onlays </a></li>
					<li><a href="root.php">Root Canal Treatments</a></li>
					<li><a href="teeth.php">Teeth Whitening</a></li>
					<li><a href="complete.php">Complete Detures</a></li>
					<li><a href="cosmetic.php">Cosmetic Dentistry</a></li>
					<li><a href="crown.php">Crown and Bridges</a></li>
					<li><a href="dental.php">Dental Implants</a></li>
					<li><a href="oral.php">Oral and Maxillofacial</a></li>
					<li><a href="ortho.php">Orthodonic Treatment</a></li>
					<li><a href="other.php">Other General Treatments With X-ray</a></li>
					<li><a href="peri.php">Periodontal Surgery</a></li>
					<li><a href="porcelain.php">Porcelain Veneers</a></li>
					<li><a href="wisedom.php">Wisdom Tooth Removal</a></li>
					<div class="clearfix"></div>
					
				</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<!--- /footer-top ---->
<div class="copy-right">
	<div class="container">
	
			
			<p>Home|About Us|Contact Us </p>
		</div>
		<p>Copyright ©momo</p>
		<p>2019</p>
	</div>
	
</div>
<!--- /copy-right ---->
</body>
</html>
