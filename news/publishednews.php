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
                  <h3 class="card-title">Published News</h3>
                </div>

    <div class="card-body" style="padding:0px; display: block">

     <table class="table" style="margin:0px; width: 100%;">   
      <thead style="background:seagreen;">
        <tr>
          <th scope="col">SL.</th>
          <th scope="col">Image</th>
          <th scope="col">Title</th>
          <th scope="col">Author</th>
          <th scope="col">Category</th>
          <th scope="col">Tag</th>
          <th scope="col">News</th>
          <th scope="col">Status</th>
          <th scope="col">Publish Date</th>
          <th scope="col">Action</th>
          
        </tr>
      </thead>
      <tbody>

        <?php 

        $sql= "SELECT * FROM newstable"; 
        $allNews= mysqli_query($db,$sql);
        $i = 0;
        while ($row = mysqli_fetch_assoc($allNews)) {
              $id            =$row['id'];
              $image         =$row['image'];
              $title         =$row['title'];
              $author        =$row['author'];
              $category      =$row['category'];
              $tag           =$row['tag'];
              $news          =$row['news'];
              $status        =$row['status'];
              $publish_date  =$row['publish_date'];
              $i++;

            ?>
      <tr>
        <th scope="row"><?php echo $i; ?></th>
          <td>
            <img src="images/picfnews/<?php echo $image; ?>" class="table-img">
          </td>
          <td><?php echo $title; ?></td>
          <td><?php echo $author; ?></td>
          <td>
            <?php
          if($category==1){?>
                <span class="badge badge-primary">Bangladesh</span>
          <?php }
          else if($category==2){?>
                 <span class="badge badge-success">International</span>
          <?php }
          else if($category==3){?>
                 <span class="badge badge-secondary">Business</span>
          <?php }
          else if($category==4){?>
                 <span class="badge badge-secondary">Sports</span>
          <?php }
          else if($category==5){?>
                 <span class="badge badge-secondary">Entertainment</span>
          <?php }
          else if($category==6){?>
                 <span class="badge badge-secondary">Job Circular</span>
          <?php }

           ?> 
         </td>
          <td>
            <?php
          if($tag==1){?>
                <span class="badge badge-primary">Politics</span>
          <?php }
          else if($tag==2){?>
                 <span class="badge badge-success">Accident</span>
          <?php }
          else if($tag==3){?>
                 <span class="badge badge-success">Crime</span>
          <?php }
          else if($tag==4){?>
                 <span class="badge badge-secondary">Festival</span>
          <?php }
          else if($tag==5){?>
                 <span class="badge badge-secondary">Cricket</span>
          <?php }
          else if($tag==6){?>
                 <span class="badge badge-secondary">Football</span>
          <?php }
          else if($tag==7){?>
                 <span class="badge badge-secondary">Film & Drama</span>
          <?php }

          else if($tag==8){?>
                 <span class="badge badge-secondary">Helth</span>
          <?php }
          else if($tag==9){?>
                 <span class="badge badge-secondary">Education</span>
          <?php }
          else if($tag==10){?>
                 <span class="badge badge-secondary">Science</span>
          <?php }
          else if($tag==11){?>
                 <span class="badge badge-secondary">Nature</span>
          <?php }
            else if($tag==11){?>
                 <span class="badge badge-secondary">Religion</span>
          <?php }
           ?> 
         </td>

         <td><p><?php  echo substr($news, 0, 200) . "....." ; ?></p></td>

          <td><?php
          if($status==0){?>
                <span class="badge badge-danger">Hide</span>
          <?php }
          else if($status==1){?>
                 <span class="badge badge-success">Visible</span>
          <?php }

           ?> 
         </td>

          <td><?php echo $publish_date; ?></td>

         <td class="project-actions" style="padding: 20px 0px;"> 
          <a style="padding: 5px;" class="btn btn-info btn-sm " href="publishednews.php?do=Edit&edit=<?php echo $id; ?>">
            Edit
          </a>
        <a style="padding: 5px;" class="btn btn-danger btn-sm " href=""data-toggle="modal" data-target="#delete<?php echo $id; ?>">
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
<?php 
}

      
      

if ($do == 'Edit'){

      if (isset($_GET['edit']) ) {
        $editId= $_GET['edit'];

        $sql= "SELECT * FROM newstable WHERE id = '$editId' ";

        $readnews= mysqli_query($db,$sql);

         while ($row = mysqli_fetch_assoc($readnews)) {
              $id            =$row['id'];
              $image         =$row['image'];
              $title         =$row['title'];
              $author        =$row['author'];
              $category      =$row['category'];
              $tag           =$row['tag'];
              $news          =$row['news'];
              $status        =$row['status'];
              $publish_date  =$row['publish_date'];
              
             ?>


        <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Update News</h3>
           
          </div>
          <div class="card-body" style="display: block">
            <div class="row">
            <div class="col-lg-6">
                  <form action="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="<?php echo $title; ?>" required="required">
                  </div>

                  <div class="form-group">
                    <label>Author</label>
                    <input type="text" name="author" class="form-control" value="<?php echo $author; ?>" required="required">
                  </div>

                  <div class="form-group">
                    <label>Category</label>
                    <select name="category" class="form-control">
                      <option >Please Select Category </option>
                      <option value="1">Bangladesh</option>  
                      <option value="2">International</option>
                      <option value="3">Business</option>  
                      <option value="4">Sports</option>
                      <option value="5">Entertainment</option>  
                      <option value="6">Job Circular</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Tags</label>
                    <select name="tag" class="form-control">
                      <option >Please Select tag </option>
                      <option value="1">Politics</option>  
                      <option value="2">Accident</option>
                      <option value="3">Crime</option>  
                      <option value="4">Festival</option>
                      <option value="5">Cricket</option>  
                      <option value="6">Football</option>
                      <option value="7">Film & Drama</option>  
                      <option value="8">Health</option>
                      <option value="9">Education</option>  
                      <option value="10">Science</option>
                      <option value="11">Nature</option>  
                      <option value="12">Religion</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Write News</label>
                    <input type="text-Aria" name="news" class="form-control" value="<?php echo $news; ?>" placeholder="type here..." required="required">
                  </div>


                </div> 

              <div class="col-lg-6">

                  <div class="form-group">
                    <label>News Status</label>
                    <select name="status" class="form-control">
                      <option >Please Select News status </option>
                      <option value="0">Hide</option>  
                      <option value="1">Visible</option>
                    </select>
                  </div>

                  <div class="form-group">
                              <label>Upload Image</label>
                              <?php 
                              if (!empty($image) ) {
                              ?>
                              <img src="images/picfnews/<?php echo $image; ?> " class="form-img">

                                <?php
                              }
                              else{
                                echo "No Image Uploded";
                              }
                              ?>
                              <input type="file" name="image" class="form-control-file">
                            </div>
                          
                            <div class="form-group">
                              <input type="hidden" name="updatenewsid" value="<?php echo $id; ?>">
                
                  <div class="form-group">
                    <input type="submit" name="updatenews" class="btn btn-primary btn-lg btn-block " value="Update" required="required" >
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

//////////////////////////////////////Update Start/////////////////////////////////////////////
      else if ($do == 'updatenews'){
      if($_SERVER['REQUEST_METHOD']=='POST'){
        $updatenewsid = $_POST['updatenewsid'];
        $title        = $_POST['title'];
        $author       = $_POST['author'];
        $category     = $_POST['category'];
        $tag          = $_POST['tag'];
        $news         = $_POST['news'];
        $status       = $_POST['status'];
        $imageName    = $_FILES['image']['name'];

        if (!empty($imageName) ) {
         //prepare the image
        
        //$imageName     = $_FILES['image']['name'];
        $imageSize     = $_FILES['image']['size'];
        $imageTmp      = $_FILES['image']['tmp_name'];


      $imgAllowedExtension=  array("jpg","jpeg","png");
      $imgExtension= strtolower(end(explode('.', $imageName)));

      $formErrors=  array();

      if (strlen($title) < 3) {
       $formErrors ="title is too short!!";
      }

      if(!empty($imageName) ){
        if(!empty($imageName) && !in_array($imgExtension, $imgAllowedExtension) ){
          $formErrors ="Invalid Image Format.Please upload jpg,jpeg or png Format image";
        }
        if(!empty($imageSize) && $imageSize > 6097152){
          $formErrors ="Image size is too large.Allowed image sizw max 6 MB";
        }
      }
        }
      //print the errors 
      foreach ($formErrors as $error) {
        echo '<div class="alert alert-waning">' .$error.'</div>';
      }

      if(empty($formErrors) ){

        //Delete Existing Image While Update new image
        $deleteImageSQL= "SELECT * FROM newstable WHERE id='$updatenewsid' ";
        $data= mysqli_query($db,$deleteImageSQL);
        while($row = mysqli_fetch_assoc($data) ){
          $existingImage=   $row['image'];
        }
        unlink('images/picfnews/'.$existingImage);

        //change image name for server
        $image = rand(0, 999999).'_'.$imageName;

        //upload image to its own location
        move_uploaded_file($imageTmp , "images\picfnews\\".$image);

        $sql= "UPDATE newstable SET title='$title',author='$author',category='$category',tag='$tag',status='$status',image='$image' WHERE id='$updatenewsid'";

       $udate= mysqli_query($db,$sql);

       if ($udate) {
         header("Location: publishednews.php?do=Manage");
       }
         die("MYSQLI Query Failed.". mysqli_error($db));
       }
        }

        //change the image only
        else if(!empty($imageName)){

        //Delete Existing Image While Update new image
        $deleteImageSQL= "SELECT * FROM newstable WHERE id='$updatenewsid' ";
        $data= mysqli_query($db,$deleteImageSQL);
        while($row = mysqli_fetch_assoc($data) ){
          $existingImage=   $row['image'];
        }
        unlink('images/picfnews/'.$existingImage);

        //change image name for server
        $image = rand(0, 999999).'_'.$imageName;

        //upload image to its own location
        move_uploaded_file($imageTmp , "images\picfnews\\".$image);

        $sql= "UPDATE newstable SET title='$title',author='$author',category='$category',tag='$tag',status='$status',image='$image' WHERE id='$updatenewsid'";
       $update= mysqli_query($db,$sql);

       if ($update) {
         header("Location: publishednews.php?do=Manage");
       }
       else{
        die("MYSQLI Query Failed.". mysqli_error($db));
       }

        }
      //other changes
      else{
        $sql= "UPDATE newstable SET title='$title',author='$author',category='$category',tag='$tag',status='$status',image='$image' WHERE id='$updatenewsid'";

       $update= mysqli_query($db,$sql);

       if ($update) {
         header("Location: publishednews.php?do=Manage");
       }
       else{
        die("MYSQLI Query Failed.". mysqli_error($db));
       }
      }

      }  

/////////////////////////////////////update end///////////////////////////////////////////////
      
/////////////////////////////////Delte Start/////////////////////////////////////////////////
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
      include "inc/footer.php";
      ?>