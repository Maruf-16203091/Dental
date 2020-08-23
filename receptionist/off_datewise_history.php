<html lang="en">
<head>

<style>

.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

</style>

<style type="text/css" media="screen">
.myMainContent{
    padding:20px 5px;
}

</style>
</head>
<body>

		
<div class="flex-container">
<div id="header">
</div>


<form method="POST" style="text-align:center">
<br><br>
Search By date:<br>
 <input name="search_id" value="" type="date"><br>
<br>



<br>
<input type="submit" class="button" value="Search"><br><br>
</form>
<article class="article">
<div class="myMainContent"  id="div_print">

<center>
  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinic";
$id="";
if(isset($_POST["search_id"])){
$id=$_POST["search_id"];
}
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT app_no1,name1,contact1,email1,select_doctor1,date1 FROM offline_appointment where date1='$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<table border=2>";
	echo "<tr><th> App Number </th><th> Name</th><th> Phone </th><th> Email </th><th> Selected Doctor </th><th> Date </th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
	echo "<tr>";
        echo "<td>". $row["app_no1"]. "</td><td>" . $row["name1"]."</td><td>" . $row["contact1"]."</td><td>" . $row["email1"]."</td><td>" . $row["select_doctor1"]."</td><td>" . $row["date1"]."</td>"; 
	echo "</tr>";
    }
echo "</table>";
} else {
    echo " <center> No results Found </center>";
}

mysqli_close($conn);
?> <br><br>
</div>
</div>
</center>
<br><br><br><br><br>
</article>




</body>
</html>
                                     
