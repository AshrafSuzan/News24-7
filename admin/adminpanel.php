<?php
include "inc/header.php";
 ?>


<section class="content">
      <div class="container-fluid">
        
       <div class="row">

        <!--<?php
        //if ($_SESSION['role'] == 1) {?>
        

        <?php}
       // else
        {

          //echo '<div class="alert alert-waning"> Sorry!! You have no access permision in this page.<?div>';
        }

        ?>-->
        
          <!--admin panel start-->
        

                    <?php 
                          $do= isset($_GET['do'] )? $_GET['do'] : 'Manage';

                          if($do == 'Manage'){?>
                            <div class="col-lg-12">
                                  <div class="card">
                                      <div class="card-header">
                                        <h3 class="card-title">Admin Panel</h3>
                                      </div>

                          <div class="card-body" style="padding:0px; display: block">

                           <table class="table" style="margin:0px; width: 100%;">   
                            <thead style="background:seagreen;">
                              <tr>
                                <th scope="col">SL.</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Role</th>
                                <th scope="col">Status</th>
                                <th scope="col">Join Date</th>
                                <th scope="col">Action</th>
                                
                              </tr>
                            </thead>
                            <tbody>

                              <?php 

                              $sql= "SELECT * FROM adminpanel"; 
                              $allAdmins= mysqli_query($db,$sql);
                              $i = 0;
                              while ($row = mysqli_fetch_assoc($allAdmins)) {
                                    $id           =$row['id'];
                                    $image        =$row['image'];
                                    $name         =$row['name'];
                                    $email        =$row['email'];
                                    $password     =$row['password'];
                                    $address      =$row['address'];
                                    $phone        =$row['phone'];
                                    $role         =$row['role'];
                                    $status       =$row['status'];
                                    $joining	  =$row['joining'];
                                    $i++;

                                  ?>
                            <tr>
                              <th scope="row"><?php echo $i; ?></th>
                                <td>
                                  <img src="images/admin/<?php echo $image; ?>" class="table-img">
                                </td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $address; ?></td>
                                <td><?php echo $phone; ?></td>
                                <td>
                                  <?php
                                if($role==1){?>
                                      <span class="badge badge-primary">Super Admin</span>
                                <?php }
                                else if($role==2){?>
                                       <span class="badge badge-success">Admin</span>
                                <?php }
                                else if($role==3){?>
                                       <span class="badge badge-secondary">Editor</span>
                                <?php }

                                 ?> 
                               </td>
                                <td><?php
                                if($status==0){?>
                                      <span class="badge badge-danger">Inactive</span>
                                <?php }
                                else if($status==1){?>
                                       <span class="badge badge-success">Active</span>
                                <?php }

                                 ?> 
                               </td>
                                <td><?php echo $joining; ?></td>
                               <td class="project-actions" style="padding: 20px 0px;"> 

                                <a style="padding: 5px;" class="btn btn-info btn-sm " href="adminpanel.php?do=Edit&edit=<?php echo $id; ?>">
                                  Edit
                                </a>
                              <a style="padding: 5px;" class="btn btn-danger btn-sm " href=""     data-toggle="modal" data-target="#delete<?php echo $id; ?>">
                                Delete
                                </a>
                              </td>
                              </tr>

                <!-- Modal Start-->
                <div class="modal fade" id="delete<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Do yo confirm to delete?</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> 

                      </div>
                      <div class="modal-body">
                        <div class="delete-option text-center">
                          <ul>
                            <li><a href="adminpanel.php?do=Delete&delete=<?php echo $id; ?>" class="btn btn-danger">Delete</a></li>
                            <li><button type="button" class="btn btn-primary" data-dismis="modal">Cancel</button></li>
                          </ul>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal End-->
    <?php
   }                 
 ?>
           </tbody>
    </table>  

    <!--Table End-->


                </div>
              </div>
            </div>
<!--------------------------------------------------------------------------------------->
          <div class="col-lg-12 text-center" style="margin-top:20px; ">
              <a href="adminpanel.php?do=Add" class="btn btn-primary"> Register New Admin </a>
          </div>
        <?php }
          
              else if ($do == 'Add'){?>
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Add New Admin</h3>
                     
                    </div>
                    <div class="card-body" style="display: block">
                      <div class="row">
                      <div class="col-lg-6">
                            <form action="adminpanel.php?do=Insert" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                              <label>*Full Name</label>
                              <input type="text" name="name" class="form-control" required="required">
                            </div>

                            <div class="form-group">
                              <label>*Email Address</label>
                              <input type="email" name="email" class="form-control" required="required">
                            </div>

                            <div class="form-group">
                              <label>*Password</label>
                              <input type="password" name="password" class="form-control" required="required">
                            </div>

                            <div class="form-group">
                              <label>*Retype Password</label>
                              <input type="password" name="repassword" class="form-control" required="required">
                            </div>

                            <div class="form-group">
                              <label>Address</label>
                              <input type="text" name="address" class="form-control" required="required">
                            </div>


                          </div> 

                        <div class="col-lg-6">
                          
                          
                         <div class="form-group">
                              <label>*Phone Number</label>
                              <input type="text" name="phone" class="form-control" required="required">
                            </div>
                
                        <div class="form-group">
                              <label>*User Role</label>
                              <select name="role" class="form-control">
                                <option >Please Select User Role </option>
                                <option value="1">Super Admin</option>  
                                <option value="2"> Admin</option>
                                <option value="3"> Editor</option>
                              </select>
                            </div>

                            <div class="form-group">
                              <label>*Account Status</label>
                              <select name="status" class="form-control">
                                <option >Please Select User status </option>
                                <option value="0">Inactive</option>  
                                <option value="1">Active</option>
                              </select>
                            </div>

                            <div class="form-group">
                              <label>Upload Image</label>
                              <input type="file" name="image" class="form-control-file">
                            </div>
                          
                            <div class="form-group">
                              <input type="submit" name="addAdmin" class="btn btn-primary btn-lg btn-block " value="Register" required="required" >
                            </div>
                          <!--<div class="col-lg-12 text-center">
                            <a href="adminpanel.php?do=entry" class="btn btn-primary btn-lg btn-block " >
                             Register </a>
                        </div>-->
                        </div>
                      </div>
                  </div>
                    </form>
                </div>
           <?php  

              }

              else if ($do == 'Insert'){
                if($_SERVER['REQUEST_METHOD']=='POST'){
                  $name        = $_POST['name'];
                  $email       = $_POST['email'];
                  $password    = $_POST['password'];
                  $repassword  = $_POST['repassword'];
                  $address     = $_POST['address'];
                  $phone       = $_POST['phone'];
                  $role        = $_POST['role'];
                  $status      = $_POST['status'];

                  //prepare the image
                  
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

                foreach ($formErrors as $error) {
                  echo '<div class="alert alert-waning">' .$error.'</div>';
                }

                if(empty($formErrors) ){
                  //Password Encription
                  $hassedPass = sha1($password);
                  //change image name for server
                  $image = rand(0, 999999).'_'.$imageName;
                  //upload image to its own location

                  move_uploaded_file($imageTmp , "images\admin\\".$image);

                  $sql= "INSERT INTO adminpanel(name,email,password,address,phone,role,status,image,joining) VALUES('$name','$email','$hassedPass','$address','$phone','$role','$status','$image', now() )";

                 $addAdmin= mysqli_query($db,$sql);

                 if ($addAdmin) {
                   header("Location: adminpanel.php?do=Manage");
                 }
                 else{
                  die("MYSQLI Query Failed.". mysqli_error($db));
                 }

                }
                
              }
            }


            
              else if ($do == 'Edit'){

                if (isset($_GET['edit']) ) {
                  $editId= $_GET['edit'];

                  $sql= "SELECT * FROM adminpanel WHERE id = '$editId' ";

                  $readadmins= mysqli_query($db,$sql);

                   while ($row = mysqli_fetch_assoc($readadmins)) {
                                    $id           =$row['id'];
                                    $image        =$row['image'];
                                    $name         =$row['name'];
                                    $email        =$row['email'];
                                    $password     =$row['password'];
                                    $address      =$row['address'];
                                    $phone        =$row['phone'];
                                    $role         =$row['role'];
                                    $status       =$row['status'];
                                    $joining 	  =$row['joining'];
                                ?>
            

          <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Update User Information </h3>
                     
                    </div>
                    <div class="card-body" style="display: block">
                      <div class="row">
                      <div class="col-lg-6">
                            <form action="adminpanel.php?do=Update" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                              <label>Full Name</label>
                              <input type="text" name="name" class="form-control" required="required" value="<?php echo $name; ?>">
                            </div>

                            <div class="form-group">
                              <label>Email Address</label>
                              <input type="email" name="email" class="form-control" required="required" value="<?php echo $email; ?>">
                            </div>

                            <div class="form-group">
                              <label>Password</label>
                              <input type="password" name="password" class="form-control"  placeholder="Change Password">
                            </div>

                            <div class="form-group">
                              <label>Retype Password</label>
                              <input type="password" name="repassword" class="form-control" placeholder="Retype Password">
                            </div>

                            <div class="form-group">
                              <label>Address</label>
                              <input type="text" name="address" class="form-control" required="required" value="<?php echo $address ; ?>">
                            </div>


                          </div> 

                        <div class="col-lg-6">
                          
                          
                         <div class="form-group">
                              <label>Phone Number</label>
                              <input type="text" name="phone" class="form-control" required="required" value="<?php echo $phone; ?>">
                            </div>
                
                        <div class="form-group">
                              <label>User Role</label>
                              <select name="role" class="form-control">
                                <option >Please Select User Role </option>
                                <option value="1" <?php if ($role==1) {echo "selected";} ?> >Super Admin</option>  
                                <option value="2" <?php if ($role==2) {echo "selected";} ?> >Admin</option>
                                <option value="3" <?php if ($role==3) {echo "selected";} ?> >Editor</option>
                              </select>
                            </div>

                            <div class="form-group">
                              <label>Account Status</label>
                              <select name="status" class="form-control">
                                <option >Please Select User status </option>
                                <option value="0" <?php if ($status==0) {echo "selected";} ?> >Inactive</option>  
                                <option value="1" <?php if ($status==1) {echo "selected";} ?> >Active</option>
                              </select>
                            </div>

                            <div class="form-group">
                              <label>Upload Image</label>
                              <?php 
                              if (!empty($image) ) {
                              ?>
                              <img src="images/admin/<?php echo $image; ?> " class="form-img">

                                <?php
                              }
                              else{
                                echo "No Image Uploded";
                              }
                              ?>
                              <input type="file" name="image" class="form-control-file">
                            </div>
                          
                            <div class="form-group">
                              <input type="hidden" name="updateAdminId" value="<?php echo $id; ?>">
                              <input type="submit" name="updateAdmin" class="btn btn-primary btn-lg btn-block " value="Update" required="required" >
                            </div>  
                        </div>
                      </div>
                  </div>
                    </form>
                </div>

          <?php
                }//End while
              }//End isset
            }//end main if
              

              else if ($do == 'Update'){
                //update start

                if($_SERVER['REQUEST_METHOD']=='POST'){
                  $updateAdminId= $_POST['updateAdminId'];
                  $name        = $_POST['name'];
                  $email       = $_POST['email'];
                  $password    = $_POST['password'];
                  $repassword  = $_POST['repassword'];
                  $address     = $_POST['address'];
                  $phone       = $_POST['phone'];
                  $role        = $_POST['role'];
                  $status      = $_POST['status'];
                  $imageName     = $_FILES['image']['name'];

                  if (!empty($imageName) ) {
                   //prepare the image
                  
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
                  }
                //print the errors 
                foreach ($formErrors as $error) {
                  echo '<div class="alert alert-waning">' .$error.'</div>';
                }

                if(empty($formErrors) ){

                  //upload image and password changes
                  if(!empty($password) && !empty($imageName) ){

                    //Password Encription
                  $hassedPass = sha1($password);

                  //Delete Existing Image While Update new image
                  $deleteImageSQL= "SELECT * FROM adminpanel WHERE id='$updateAdminId' ";
                  $data= mysqli_query($db,$deleteImageSQL);
                  while($row = mysqli_fetch_assoc($data) ){
                    $existingImage=   $row['image'];
                  }
                  unlink('img/admin/'.$existingImage);

                  //change image name for server
                  $image = rand(0, 999999).'_'.$imageName;

                  //upload image to its own location
                  move_uploaded_file($imageTmp , "images\admin\\".$image);

                  $sql= "UPDATE adminpanel SET name='$name',email='$email',password='$hassedPass',address='$address',phone='$phone',role='$role',status='$status',image='$image' WHERE id='$updateAdminId'";

                 $addAdmin= mysqli_query($db,$sql);

                 if ($addAdmin) {
                   header("Location: adminpanel.php?do=Manage");
                 }
                   die("MYSQLI Query Failed.". mysqli_error($db));
                 }
                  }

                  //change the image only
                  else if(!empty($imageName) && empty($password) ){

                  //Delete Existing Image While Update new image
                  $deleteImageSQL= "SELECT * FROM adminpanel WHERE id='$updateAdminId' ";
                  $data= mysqli_query($db,$deleteImageSQL);
                  while($row = mysqli_fetch_assoc($data) ){
                    $existingImage=   $row['image'];
                  }
                  unlink('images/admin/'.$existingImage);

                  //change image name for server
                  $image = rand(0, 999999).'_'.$imageName;

                  //upload image to its own location
                  move_uploaded_file($imageTmp , "images\admin\\".$image);

                  $sql= "UPDATE adminpanel SET name='$name',email='$email',address='$address',phone='$phone',role='$role',status='$status',image='$image' WHERE id='$updateAdminId' ";

                 $addAdmin= mysqli_query($db,$sql);

                 if ($addAdmin) {
                   header("Location: adminpanel.php?do=Manage");
                 }
                 else{
                  die("MYSQLI Query Failed.". mysqli_error($db));
                 }

                  }

                  //change the password only
                  else if(!empty($password) && empty($imageName) ){

                  //Password Encription
                  $hassedPass = sha1($password);


                  $sql= "UPDATE adminpanel SET name='$name',email='$email',password='$hassedPass',address='$address',phone='$phone',role='$role',status='$status' WHERE id='$updateAdminId' ";


                 $addAdmin= mysqli_query($db,$sql);

                 if ($addAdmin) {
                   header("Location: adminpanel.php?do=Manage");
                 }
                 else{
                  die("MYSQLI Query Failed.". mysqli_error($db) );
                 }
                }

                //No password and No image Update
                else{
                  $sql= "UPDATE adminpanel SET name='$name',email='$email',address='$address',phone='$phone',role='$role',status='$status' WHERE id='$updateAdminId' ";


                 $addAdmin= mysqli_query($db,$sql);

                 if ($addAdmin) {
                   header("Location: adminpanel.php?do=Manage");
                 }
                 else{
                  die("MYSQLI Query Failed.". mysqli_error($db));
                 }
                }
                
                } 
              } //update end

              
              else if ($do == 'Delete'){
               
                  if(isset($_POST['id']) ){
                    $deleteId= $_POST['id'];

                    //DELETE SQL

                  $sql= "DELETE FROM adminpanel WHERE id ='$deleteId'";
                  $deleteUser= mysqli_query($db,$sql);

                   if($deleteUser){
                        header("Location: adminpanel.php");
                      }
                      else{
                        die("Operation failed.". mysqli_errno($db));
                  }
            
                }
      
              }
            
         ?>

              
            </div> <!-- card body-->
          </div>
          <!--admin panel end-->
        </div>
         
       </div>
      </div><!-- /.container-fluid -->
          
    </section>



 <?php
 include "inc/script.php";
include "inc/footer.php";
 ?>