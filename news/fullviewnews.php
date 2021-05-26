<?php include"inc/header.php" ?>

<?php 

if (isset($_GET['id'])) {
	 $newsID = $_GET['id'];

$sql= "SELECT * FROM newstable WHERE id = '$newsID'";
$allNews= mysqli_query($db,$sql);
 while ($row = mysqli_fetch_array($allNews)) {
        	  $image         =$row['image'];
              $title         =$row['title'];
              $author        =$row['author'];
              $news          =$row['news'];
              $publish_date  =$row['publish_date'];
 ?>
<section id="news-section">
	<div class="container-news">
		<div class="content-area">
			<div class="news-title"><p><?php echo $row['title']; ?></p></div>
			<div class="news-info"><p><?php echo $row['publish_date']; ?> <br><?php echo $row['author']; ?></p></div>
		<div class="news">
				<div class="image"><img src="images/picfnews/<?php echo $row['image']; ?>"></div>
				<p><?php echo $row['news']; ?></p>
			
		</div>

<?php
}
}


?>
</section>	

<section>
	
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
           <h3 class="card-title">Write your comments</h3>
          </div>
          <div class="card-body" style="display: block">
          <form action="" method="POST" enctype="multipart/form-data">
            <div style="margin: 20px;padding: 0px 20px;">
              <div style="display: inline; float: left; margin-left: 100px;">
                    <textarea style="height: 200px; width: 600px; border: 2px solid darkslateblue; border-radius: 6px;" name="news" class="form-control" rows="15" placeholder="type here..." required="required"></textarea>
                  </div>
                  <div style="display: inline;float: right; margin-right: 350px;" >
                    <input type="submit" name="postnews" class="btn btn-primary btn-lg btn-block " value="Comment" required="required" >
                  </div></div>
                
    
          </form>
<!--<?php
        if(isset($_POST['postnews'])){
          $newsID  = $_POST['news_id'];
          $userID  = $_POST['userid'];
          $username =$_POST['username'];
          $cmt      = $_POST['cmt'];
}

    $sql= "INSERT INTO comment(post_id,user_id,username, cmt) VALUES('$newsID','$userID','$username','$cmt')";

       $comment= mysqli_query($db,$sql);

       if ($comment) {
         header("Location: ");
       }
       else{
        die("MYSQLI Query Failed.". mysqli_error($db));
        }


?>-->

      </div>
</section>

<section>
  
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Comments</h3>
           
          </div>
          <div class="card-body" style="display: block">
            <div class="row">
              <div><strong>Show All Comments Here</strong></div>
        </div>
          </form>
      </div>
</section>

<?php include"inc/footer.php" ?>