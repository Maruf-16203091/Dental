<html>  
<body>  


</form>
   <form action="" method="post" enctype="multipart/form-data">  
   <div style="width:200px;border-radius:6px;margin:0px auto">  
   
   <div class="form-group">
      <label for="date">App No:</label>
      <input type="int" class="form-control" id="app"  name="app" required>
    </div>
      <div class="form-group">
      <label for="name">Patient Name:</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
      <label for="age">Age:</label>
      <input type="number" class="form-control" id="age" name="age" min="1" max="120" required>
    </div>
	<div class="form-group">
      <label for="date">Date:</label>
      <input type="date" class="form-control" id="date" name="date" required>
    </div>
	
	<br><br>
<table border="1">  
   <tr>  
      <td colspan="2">Treatment Name/Price</td>  
   </tr>  
   <tr>  
      <td>Root Canal/5000</td>  
      <td><input type="checkbox" name="techno[]" value="5000"></td>  
   </tr>  
   <tr>  
      <td>Teeth Whitening/1200</td>  
      <td><input type="checkbox" name="techno[]" value="1200"></td>  
   </tr>  
   <tr>  
      <td>Crown and Bridges/4500</td>  
      <td><input type="checkbox" name="techno[]" value="4500"></td>  
   </tr>  
   <tr>  
      <td>Dental Implants/6000</td>  
      <td><input type="checkbox" name="techno[]" value="6000"></td>  
   </tr> 
   <tr>  
      <td>Periodontal Surgery/9000</td>  
      <td><input type="checkbox" name="techno[]" value="9000"></td>  
   </tr> 
   <tr>  
      <td>Wisdom Tooth Removal/3500</td>  
      <td><input type="checkbox" name="techno[]" value="3500"></td>  
   </tr> 
   <tr>  
      <td>Cosmetic Dentistry/5500</td>  
      <td><input type="checkbox" name="techno[]" value="5500"></td>  
   </tr> 
   <tr>  
      <td>Complete Detures/6500</td>  
      <td><input type="checkbox" name="techno[]" value="6500"></td>  
   </tr>    
   <tr>  
      <td colspan="2" align="center"><input type="submit" value="submit" name="sub"></td>  
   </tr>  
</table>  
</div>
<h2 style="color:black;">Discount Area</h2><br>
<div class="row">
    <div class="col-25">
      <label for="discount">Discount Type</label>
    </div>
    <div class="col-75">
      <select id="discount" name="discount">
        <option value="No">No Discount</option>
        <option value="Student">Student</option>
        <option value="Physical_Disabled">Physical Disabled</option>        
      </select>
    </div>
  </div>  
</form>
<br>
<br><br><br><br><br><br>
  <h2 style="color:red;">N.B.</h2>
  <p style="font-size:20px;color:red;">1.Student will get 15% Discount(Take all the valid documents including Student ID)...</p>
  <p style="font-size:20px;color:red;">2.Physical Disabled Person will get 20% Discount(Take all the valid documents including NID)...</p>

<?php  
if(isset($_POST['sub']))  
{  
$host="localhost";//host name  
$username="root"; //database username  
$word="";//database word  
$db_name="clinic";//database name  
$tbl_name="try"; //table name  
$con=mysqli_connect("$host", "$username", "$word","$db_name")or die("cannot connect");//connection string  
$checkbox1=implode(',', $_POST['techno']);
$d=$_POST['app'];
$n=$_POST['name'];
$a=$_POST['age'];
$date=$_POST['date'];
$discount=$_POST['discount'];  

	
$in_ch=mysqli_query($con,"insert into try(app,name,age,date,discount,treatments) values ('$d','$n','$a','$date','$discount','$checkbox1')"); 
if($in_ch==1)  
   {  
      echo'<script>alert("Date Successfully Recorded...")</script>';  
   }  
else  
   {  
      echo'<script>alert("Failed To Insert")</script>';  
   }  
}  
?>







</body>  
</html>  