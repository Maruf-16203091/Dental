<?php

if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];	
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
	$image_url='There is no image';	
    $status = 1;
	
	if ($password == $repassword && !empty($repassword)){
	// Image Upload Start...........................
    if (isset($_FILES['image'])) {
        //echo "<pre>";
        //print_r($_FILES); exit;
        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp =  $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
		$file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
		
		//$img = explode('.',$file_name);
		//echo "<pre>";
        //print_r($img); 
		//exit;
        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG, JPG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            $loacation = 'adminImg/';
            $img_name = rand();
            $image_url = $loacation.$img_name.'.'.$file_ext;

            move_uploaded_file($file_tmp, $image_url);

        } else {
            print_r($errors);
        }
    }

    // Image Upload end .......................
    

    if (!empty($name) && !empty($email) && !empty($phone) && !empty($password)) {
				$data = array($name,$email,$phone,$password,$status);
				$sql = "insert into tbl_add_doctor(doctor_name,doctor_email,doctor_phone,password,doctor_active_status)values(?,?,?,?,?)";
				$stmt = $conn->prepare($sql);
				$end = $stmt->execute($data);
				if ($end) {
				   $sms = '<div class="alert alert-success alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Data has been successfully saved!</strong> </div>';
				} else {
					$sms = '<div class="alert alert-danger alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Data submission unsuccessful</strong> Indicates a unsuccessful or negative action.</div>';
				}
    } else {
		$sms = '<div class="alert alert-warning alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unsuccess!</strong> Sorry you must fillup all the field .....</div>';
    }
	} else{
 	$sms = '<div class="alert alert-warning alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unsuccess!</strong> Passwords do not match. Try again </div>';
	}
}
?>	

<!---  Contents Starts ------>

   <div id="page-inner">
       <div class="row">
           <div class="col-md-12">
            <h2>Add Doctors Information</h2>   
               
              
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
                            Add New Doctor 
                        </div>						
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                     
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Doctor Name:</label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter Name"/>                                             
                                        </div> 
										
										<div class="form-group">
                                            <label>Doctor Email:</label>
                                            <input type="text" class="form-control" name="email" placeholder="Enter Email"/>                                             
                                        </div>	
										
										<div class="form-group">
                                            <label>Doctor Phone:</label>
                                            <input type="text" class="form-control" name="phone" placeholder="Phone Number"/>                                             
                                        </div>		
										
										<div class="form-group">
                                            <label>Password:</label>
                                            <input type="password" class="form-control" name="password" placeholder="Phone Password"/>                                             
                                        </div>
										
										<div class="form-group">
                                            <label>Confirm Password:</label>
                                            <input type="password" class="form-control" name="repassword" placeholder="Retype Password"/>                                             
                                        </div>										
										<div><p>Please Submit Your Informaion</p></div>
										
										 <button type="submit" name="btn" class="btn btn-primary">Submit</button>
										 
										 </form>
										 
								</div>
						    </div>
					   </div>
				     </div>
				</div>
               
               </div>
             <!-- /. PAGE INNER  -->
  </div>


