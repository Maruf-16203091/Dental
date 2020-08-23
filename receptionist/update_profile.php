<?php
    $id = $_SESSION['reciptionist_id'];
	$sql= $conn->prepare("select * from add_reciptionists where reciptionist_id='$id'");
	$sql->execute();
	$data = $sql->fetch(PDO::FETCH_ASSOC);
    $image_url=$data['reciptionist_img_url'];

if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];	
    $password = $_POST['password'];
	
	
	// Image Upload Start...........................
    if (isset($_FILES['image'])) {
        $errors = array();
	//	unlink($data['img_url']);
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp =  $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
		$file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
		
        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            //$errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $image_url);
        } else {
            print_r($errors);
        }
    }

    // Image Upload end .......................
    

    if (!empty($name) && !empty($email) && !empty($phone) && !empty($password)) {
				$sql = "update add_reciptionists set reciptionist_name='$name',reciptionist_email='$email',reciptionist_phone='$phone',password='$password',reciptionist_img_url='$image_url' where reciptionist_id='$id'";
				$stmt = $conn->prepare($sql);
				$end = $stmt->execute();
				if ($end) {
				   $sms = '<div class="alert alert-success alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Data has been successfully updated!</strong> </div>';
				   //header('location:index.php');
				} else {
					$sms = '<div class="alert alert-danger alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Data Update unsuccessful</strong> Indicates a unsuccessful or negative action.</div>';
				}
    } else {
		$sms = '<div class="alert alert-warning alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unsuccess!</strong> Sorry you must fillup all the field .....</div>';
    }	
}

    $id = $_SESSION['reciptionist_id'];
	$sql= $conn->prepare("select * from add_reciptionists where reciptionist_id='$id'");
	$sql->execute();
	$data = $sql->fetch(PDO::FETCH_ASSOC);
    $image_url=$data['reciptionist_img_url'];
?>	
	

<!---  Contents Starts ------>

   <div id="page-inner">
       <div class="row">
           <div class="col-md-12">
            <h2>Update Profile Information</h2>   
               
              
           </div>
       </div>
        <!-- /. ROW  -->
        <hr />
         <?php if(isset($sms)){ echo $sms; } ?> 
		 
			 <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style="text-align:center; font-weight: bolder; font-size: 18px;">
                            Receptionist Information Form 
                        </div>						
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                     
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Name:</label>
                                            <input type="text" class="form-control" name="name" value="<?php echo $data['reciptionist_name']; ?>"/>                                             
                                        </div> 
										
										<div class="form-group">
                                            <label>Email:</label>
                                            <input type="email" class="form-control" name="email" value="<?php echo $data['reciptionist_email']; ?>"/>                                             
                                        </div>	
										
										<div class="form-group">
                                            <label>Phone Number:</label>
                                            <input type="text" class="form-control" name="phone" value="<?php echo $data['reciptionist_phone']; ?>"/>                                             
                                        </div>		
										
										<div class="form-group">
                                            <label>Password:</label>
                                            <input type="text" class="form-control" name="password" value="<?php echo $data['password']; ?>"/>                                             
                                        </div>
										
										<div class="form-group">
                                            <label>Confirm Password:</label>
                                            <input type="password" class="form-control" name="repassword" placeholder="Retype Password"/>                                             
                                        </div>


										
										<div><p>Please Submit Your Informaion</p></div>
										
										 <button type="submit" name="btn" class="btn btn-primary">Update</button>
										 
										 </form>
										 
								</div>
						    </div>
					   </div>
				     </div>
				</div>
               
               </div>
             <!-- /. PAGE INNER  -->
  </div>

