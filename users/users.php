<?php include"inc/header.php" ?>

<!-- User Information Scetion started-->
<section class="content">
      <div class="container-fluid">
        
       <div class="row">

          
        

<?php 
      $do= isset($_GET['do'] )? $_GET['do'] : 'Manage';

      if($do == 'Manage'){?>
        <div class="col-lg-12">
              <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">User Information</h3>
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

          $sql= "SELECT * FROM usertable"; 
          $alluser= mysqli_query($db,$sql);
          $i = 0;
          while ($row = mysqli_fetch_assoc($alluser)) {
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
              <img src="images/userimg/<?php echo $image; ?>" class="table-img">
            </td>
            <td><?php echo $name; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $address; ?></td>
            <td><?php echo $phone; ?></td>
            <td>
              <?php
            if($role==4){?>
                  <span class="badge badge-secondary">User</span>
            <?php }
             ?> 
           </td>
            <td><?php
            if($status==0){?>
            	<a style="padding: 5px;" class="btn btn-danger btn-sm " href="usertable.php?do=Inactive&inactive=<?php echo $id; ?>">Inactive</a>
                  <!--<span class="badge badge-danger">Inactive</span>-->
            <?php }
            else if($status==1){?>
            	<a style="padding: 5px;" class="btn btn-success btn-sm " href="usertable.php?do=Active&active=<?php echo $id; ?>">Active</a>
                   <!--<span class="badge badge-success">Active</span>-->
            <?php }

             ?> 
           </td>
            <td><?php echo $joining; ?></td>
           <td class="project-actions" style="padding: 20px 0px;"> 

            <a style="padding: 5px;" class="btn btn-info btn-sm " href="usertable.php?do=Edit&edit=<?php echo $id; ?>">Edit </a>

             <a style="padding: 5px;" class="btn btn-danger btn-sm " href="usertable.php?do=Delete&delete=<?php echo $id; ?>">Delete</a>
          
          <!--<a style="padding: 5px;" class="btn btn-danger btn-sm " href=""data-toggle="modal" data-target="#delete<?php echo $id; ?>">Delete</a>-->
          </td>
        </tr>

        <!-- Modal Start-->
        <div class="modal fade.show" id="delete<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
 
<?php }

	if ($do == 'Active'){
          if(isset($_POST['id']) ){
            $userId= $_POST['id'];

            //update query
          $sql= "UPDATE usertable SET status = '0' WHERE id = '$userId';";
          $updateStatus= mysqli_query($db,$sql);

           if($updateStatus){
                header("Location: ");
              }
              else{
                die("Operation failed.". mysqli_errno($db));
          }
    
        }

      }

      else if ($do == 'Inactive'){
          if(isset($_POST['id']) ){
            $userId= $_POST['id'];

           //update query
          $sql= "UPDATE usertable SET status = '1' WHERE id = '$userId';";
          $updateStatus= mysqli_query($db,$sql);

           if($updateStatus){
                header("Location: ");
              }
              else{
                die("Operation failed.". mysqli_errno($db));
          }
    
        }

      }


     else if ($do == 'Delete'){
       
          if(isset($_POST['id']) ){
            $deleteId= $_POST['id'];

            //DELETE SQL

          $sql= "DELETE FROM usertable WHERE id ='$deleteId'";
          $deleteUser= mysqli_query($db,$sql);

           if($deleteUser){
                header("Location: users.php?do=Manage");
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
 

                          

<?php include"inc/footer.php" ?>