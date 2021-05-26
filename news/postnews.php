<?php include"inc/header.php" ?>

      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Post News</h3>
           
          </div>
          <div class="card-body" style="display: block">
            <div class="row">
            <div class="col-lg-6">
                  <form action="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Title*</label>
                    <input type="text" name="title" class="form-control" required="required">
                  </div>

                  <div class="form-group">
                    <label>Author*</label>
                    <input type="text" name="author" class="form-control" required="required">
                  </div>

                  <div class="form-group">
                    <label>Category*</label>
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
                      <option value="13">Current Timeline</option>
                    </select>
                  </div>

                  
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
                    <input type="file" name="image" class="form-control-file">
                  </div>

                </div> 

              <div class="col-lg-6">

              	<div class="form-group">
                    <label>Write News</label>
                    <textarea name="news" class="form-control" rows="15" placeholder="type here..." required="required"></textarea>
                  </div>

                  
                
                  <div class="form-group">
                    <input type="submit" name="postnews" class="btn btn-primary btn-lg btn-block " value="Post News" required="required" >
                  </div>
              </div>
            </div>
        </div>
          </form>
      </div>
      <?php}

      ?>

      <?php 
      if(isset($_POST['postnews'])){
        $title       = $_POST['title'];
        $author      = $_POST['author'];
        $category    = $_POST['category'];
        $tag  		 =$_POST['tag'];
        $news    	 = $_POST['news'];
        $status      = $_POST['status'];

        //prepare the image
        
        $imageName     = $_FILES['image']['name'];
        $imageSize     = $_FILES['image']['size'];
        $imageTmp      = $_FILES['image']['tmp_name'];


      $imgAllowedExtension=  array("jpg","jpeg","png");
      $imgExtension= strtolower(end(explode('.', $imageName)));

      $formErrors=  array();

      if (strlen($title) < 3) {
       $formErrors ="Title is too short!!";
      }

      if(!empty($imageName) ){
        if(!empty($imageName) && !in_array($imgExtension, $imgAllowedExtension) ){
          $formErrors ="Invalid Image Format.Please upload jpg,jpeg or png Format image";
        }
        if(!empty($imageSize) && $imageSize > 6097152){
          $formErrors ="Image size is too large.Allowed image sizw max 5 MB";
        }
      }

      foreach ($formErrors as $error) {
        echo '<div class="alert alert-waning">' .$error.'</div>';
      }

      if(empty($formErrors) ){
        //change image name for server
        $image = rand(0, 999999).'_'.$imageName;
        //upload image to its own location

        move_uploaded_file($imageTmp , "images\picfnews\\".$image);

        $sql= "INSERT INTO newstable(title,author,category,	tag,news,image,status,publish_date) VALUES('$title','$author','$category','$tag','$news','$image','$status',now())";

       $postnews= mysqli_query($db,$sql);

       if ($postnews) {
         header("Location: publishednews.php ");
       }
       else{
        die("MYSQLI Query Failed.". mysqli_error($db));
        }

       }

      }
   ?>


<?php include"inc/footer.php" ?>