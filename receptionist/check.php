<html>
<body>
<form action="check.php" method="post">
    <input type="checkbox" name="check_list[]" value="1">
    <input type="checkbox" name="check_list[]" value="2">
    <input type="checkbox" name="check_list[]" value="3">
    <input type="checkbox" name="check_list[]" value="4">
    <input type="checkbox" name="check_list[]" value="5">
    <input type="checkbox" name="check_list[]" value="5">

    <input type="submit" />
</form>

</body>
</html>
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

if(!empty($_POST['check_list'])) {
    foreach($_POST['check_list'] as $check) {
            echo $check; //echoes the value set in the HTML form for each checked checkbox.
                         //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.
    }
}
?>





