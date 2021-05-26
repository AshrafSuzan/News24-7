
<?php include"inc/header.php"; ?>


<div class="content">
     <div class="container-fluid">
       <div class="row">
        <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <h6>Join with us!</h6>
                      <h3 class="card-title">Create your account</h3>
                     
                    </div>
                    <div class="card-body" style="display: block">
                      <div class="row">
                      <div class="col-lg-6">

                      	<!--Registration form Started-->

                            <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                              <label>Full Name*</label>
                              <input type="text" name="name" class="form-control" required="required">
                            </div>

                            <div class="form-group">
                              <label>Email Address*</label>
                              <input type="email" name="email" class="form-control" required="required">
                            </div>

                            <div class="form-group">
                              <label>Password*</label>
                              <input type="password" name="password" class="form-control" required="required">
                            </div>

                            <div class="form-group">
                              <label>Retype Password*</label>
                              <input type="password" name="repassword" class="form-control" required="required">
                            </div>
                          </div> 

                        <div class="col-lg-6">
                          <div class="form-group">
                              <label>Address</label>
                              <input type="text" name="address" class="form-control" required="required">
                            </div>
                          
                         <div class="form-group">
                              <label>Phone Number*</label>
                              <input type="text" name="phone" class="form-control" required="required">
                            </div>
              


                            <div class="form-group">
                            	
                              <label>Upload Image</label>
                              <input type="file" name="image" class="form-control-file"><br>
                              <label style="color: red">*picture size should be under 2MB</label>
                            </div>
                          
                            <div class="form-group">
                              <input type="submit" name="adduser" class="btn btn-success btn-lg btn-block " value="Submit" required="required" >
                            </div>
        
                        </div>
                      </div>
                  </div>
                    </form>

                  <?php

                if (isset($_POST['adduser']) ){
                  $name        = $_POST['name'];
                  $email       = $_POST['email'];
                  $password    = $_POST['password'];
                  $repassword  = $_POST['repassword'];
                  $address     = $_POST['address'];
                  $phone       = $_POST['phone'];

                  //prepare the image start
                  
                  $imageName     = $_FILES['image']['name'];
                  $imageSize     = $_FILES['image']['size'];
                  $imageTmp      = $_FILES['image']['tmp_name'];


                $imgAllowedExtension=  array("jpg","jpeg","png");
                $imgExtension= strtolower(end(explode('.', $imageName)));

                $formErrors=  array();

                if (strlen($name) < 3) {
                 $formErrors ="User name is too short!!";
                }
                if ($password != $repassword) {
                 $formErrors ="Password doesn't match";
                }

                if(!empty($imageName) ){
                  if(!empty($imageName) && !in_array($imgExtension, $imgAllowedExtension) ){
                    $formErrors ="Invalid Image Format.Please upload jpg,jpeg or png Format image";
                  }
                  if(!empty($imageSize) && $imageSize > 2097152){
                    $formErrors ="Image size is too large.Allowed image sizw max 2 MB";
                  }
                }
                //prepare the image end

                foreach ($formErrors as $error) {
                  echo '<div class="alert alert-waning">' .$error.'</div>';
                }

                if(empty($formErrors) ){
                  //Password Encription
                  $hassedPass = sha1($password);
                  //change image name for server
                  $image = rand(0, 999999).'_'.$imageName;
                  //upload image to its own location
                  move_uploaded_file($imageTmp , "images\userimg\\".$image);

                  $sql= "INSERT INTO usertable(name,email,password,address,phone,role,status,image,joining) VALUES('$name','$email','$hassedPass','$address','$phone',4,1,'$image', now() )";

                 $adduser= mysqli_query($db,$sql);

                 if ($adduser) {
                   header("Location:");
                 }
                 else{
                  die("MYSQLI Query Failed.". mysqli_error($db));
                 }

                }
                
              }

                    ?>

                </div>
          
        </div>
         
       </div>
      </div><!-- /.container-fluid -->
    </div>

 <?php 
    include "inc/footer.php";
?>