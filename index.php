<?php 
 include"asset/inc/db.php";

 ob_start();
 session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="asset/images/favicon.png">
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" integrity="sha384-rtJEYb85SiYWgfpCr0jn174XgJTn4rptSOQsMroFBPQSGLdOC5IbubP6lJ35qoM9" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="asset/css/style.css">
	<title>NewsPortal</title>
</head>

<body>

<!----top part start----->

<section id="slider">
			<div class="container">
				<div class="slider-top">
					<div class="header">
					<div id="name">
							<p><a href="index.php">NEWS24/7</a></p>
					</div>
					<!--search box-->
					<div id="search">
						<form action="news/search.php" method="POST">
							<input type="text" name="search" placeholder="Search here..." required="required">
							<input type="submit" name="searchbtn" value="Search">
						</form>	
					</div>
		<div class="login" >
			<?php if( isset($_SESSION['email']))
{
?>
		<a href="logout.php" style="text-decoration: none">Log Out</a>
				<?php }
				else{ ?>
				      <a style="text-decoration: none" href="signin.php">Sign In</a>
				<?php } ?>
						      
						     <!--<span>||</span> <a style="text-decoration: none" href="users/userregistration.php">Sign Up</a>-->
			
					</div>

			</div>
				
					<nav class="menu">
						<ul>
							<li class="active"><a href="index.php">Home</a></li>
							 <?php
            if ( $_SESSION['role'] == 1)
              { ?>
                <li><a href="menu.php">MENU</a>
									<ul>
										<li><a href="admin/adminpanel.php">Admin</a></li>
										<li><a href="users/users.php">Users</a></li>
										<li><a href="news/publishednews.php">Publish News</a></li>
										<li><a href="news/postnews.php">Post News</a></li>
									</ul>
							</li>
            <?php }
          ?>

							
							<li><a href="news/bdnews.php">Bangladesh</a></li>
							<li><a href="news/international.php">International</a></li>
							<li><a href="news/business.php">Bussiness</a></li>
							<li><a href="news/sports.php">Sports</a></li>
							<li><a href="news/entertainment.php">Entertainment</a></li>
							<li><a href="news/jobcircular.php">Job Circular</a></li>
						</ul>
					</nav>


				<!--<div class="pic">
					<img src="asset/images/banner.jpg">
				</div>-->
			</div>
		</div>
	</section>

	<!----top part end----->



<!----Bangladesh News part start----->


<section id="third-part">
	<div class="container-news"><h4>Bangladesh</h4>
		<div class="content-area">
	<?php 

        $sql= "SELECT id,image,title,author,publish_date,news FROM newstable WHERE status = 1 AND category = 1 ORDER BY id DESC";
        $allNews= mysqli_query($db,$sql);
        $i = 0;
        while ($row = mysqli_fetch_assoc($allNews)) {
        	  $id            =$row['id'];
              $image         =$row['image'];
              $title         =$row['title'];
              $author        =$row['author'];
              $news          =$row['news'];
              $publish_date  =$row['publish_date'];
              $i++;
?>

<?php
 if ($i<=6) {?>
 	<div class="content-news">
				<div class="image"><img src="news/images/picfnews/<?php echo $image; ?>"></div>
			<div class="news-info"><p><?php echo $publish_date; ?> <br><?php echo $author; ?></p></div>
				<div class="news-title"><p><?php echo $title; ?></p></div>
			<div class="news"><p><?php  echo substr($news, 0, 300) . "....." ; ?></p>
			</div>
			<div class="more">
            <a href="news/fullviewnews.php?id=<?php echo $id; ?>">Read More</a>
           </div>
		</div>
<?php
 }
}
?>
</div>
	<div class="dotted"><a href="news/bdnews.php">More>></a></div>
	</div>
</section>	

<!----Bangladesh News part End----->

<!-- International News Part Start-->

<section id="third-part">
	<div class="container-news"><h4>International</h4>
		<div class="content-area">
	<?php 

        $sql= "SELECT id,image,title,author,publish_date,news FROM newstable WHERE status = 1 AND category = 2 ORDER BY id DESC";
        $allNews= mysqli_query($db,$sql);
        $i = 0;
        while ($row = mysqli_fetch_assoc($allNews)) {
        	  $id            =$row['id'];
              $image         =$row['image'];
              $title         =$row['title'];
              $author        =$row['author'];
              $news          =$row['news'];
              $publish_date  =$row['publish_date'];
              $i++;
?>

<?php
 if ($i<=6) {?>
 	<div class="content-news">
				<div class="image"><img src="news/images/picfnews/<?php echo $image; ?>"></div>
			<div class="news-info"><p><?php echo $publish_date; ?> <br><?php echo $author; ?></p></div>
				<div class="news-title"><p><?php echo $title; ?></p></div>
			<div class="news"><p><?php  echo substr($news, 0, 300) . "....." ; ?></p>
			</div>
			<div class="more">
            <a href="news/fullviewnews.php?id=<?php echo $id; ?>">Read More</a>
           </div>
		</div>
<?php
 }
}
?>
</div>
	<div class="dotted"><a href="news/international.php">More>></a></div>
	</div>
</section>	

<!--International News part End-->

<!--Business News part start-->
<section id="third-part">
	<div class="container-news"><h4>Business</h4>
		<div class="content-area">
	<?php 

        $sql= "SELECT id,image,title,author,publish_date,news FROM newstable WHERE status = 1 AND category = 3 ORDER BY id DESC";
        $allNews= mysqli_query($db,$sql);
        $i = 0;
        while ($row = mysqli_fetch_assoc($allNews)) {
        	  $id            =$row['id'];
              $image         =$row['image'];
              $title         =$row['title'];
              $author        =$row['author'];
              $news          =$row['news'];
              $publish_date  =$row['publish_date'];
              $i++;
?>

<?php
 if ($i<=6) {?>
 	<div class="content-news">
				<div class="image"><img src="news/images/picfnews/<?php echo $image; ?>"></div>
			<div class="news-info"><p><?php echo $publish_date; ?> <br><?php echo $author; ?></p></div>
				<div class="news-title"><p><?php echo $title; ?></p></div>
			<div class="news"><p><?php  echo substr($news, 0, 300) . "....." ; ?></p>
			</div>
			<div class="more">
            <a href="news/fullviewnews.php?id=<?php echo $id; ?>">Read More</a>
           </div>
		</div>
<?php
 }
}
?>
</div>
	<div class="dotted"><a href="news/business.php">More>></a></div>
	</div>
</section>	

<!--Business News part End-->

<!--Sports News part start-->

<section id="third-part">
	<div class="container-news"><h4>Sports</h4>
		<div class="content-area">
	<?php 

        $sql= "SELECT id,image,title,author,publish_date,news FROM newstable WHERE status = 1 AND category = 4 ORDER BY id DESC";
        $allNews= mysqli_query($db,$sql);
        $i = 0;
        while ($row = mysqli_fetch_assoc($allNews)) {
        	  $id            =$row['id'];
              $image         =$row['image'];
              $title         =$row['title'];
              $author        =$row['author'];
              $news          =$row['news'];
              $publish_date  =$row['publish_date'];
              $i++;
?>

<?php
 if ($i<=6) {?>
 	<div class="content-news">
				<div class="image"><img src="news/images/picfnews/<?php echo $image; ?>"></div>
			<div class="news-info"><p><?php echo $publish_date; ?> <br><?php echo $author; ?></p></div>
				<div class="news-title"><p><?php echo $title; ?></p></div>
			<div class="news"><p><?php  echo substr($news, 0, 300) . "....." ; ?></p>
			</div>
			<div class="more">
            <a href="news/fullviewnews.php?id=<?php echo $id; ?>">Read More</a>
           </div>
		</div>
<?php
 }
}
?>
</div>
	<div class="dotted"><a href="news/sports.php">More>></a></div>
	</div>
</section>	
<!--Sports News part End-->

<!--Entertainment News part start-->

<section id="third-part">
	<div class="container-news"><h4>Entertainment</h4>
		<div class="content-area">
	<?php 

        $sql= "SELECT id,image,title,author,publish_date,news FROM newstable WHERE status = 1 AND category = 5 ORDER BY id DESC";
        $allNews= mysqli_query($db,$sql);
        $i = 0;
        while ($row = mysqli_fetch_assoc($allNews)) {
        	  $id            =$row['id'];
              $image         =$row['image'];
              $title         =$row['title'];
              $author        =$row['author'];
              $news          =$row['news'];
              $publish_date  =$row['publish_date'];
              $i++;
?>

<?php
 if ($i<=6) {?>
 	<div class="content-news">
				<div class="image"><img src="news/images/picfnews/<?php echo $image; ?>"></div>
			<div class="news-info"><p><?php echo $publish_date; ?> <br><?php echo $author; ?></p></div>
				<div class="news-title"><p><?php echo $title; ?></p></div>
			<div class="news"><p><?php  echo substr($news, 0, 300) . "....." ; ?></p>
			</div>
			<div class="more">
            <a href="news/fullviewnews.php?id=<?php echo $id; ?>">Read More</a>
           </div>
		</div>
<?php
 }
}
?>
</div>
	<div class="dotted"><a href="news/entertainment.php">More>></a></div>
	</div>
</section>	
<!--Entertainment News part End-->

<footer>
	<section id="footer">
		<div class="contact-container">
			 <h4>Contact Us</h4>
                    <ul>
                        <li><span>Address :</span> House No , Road No , Area, Dhaka</li>
                        <li><span>Email :</span> <a href="#">ashraf.suzan.cse@gmail.com</a> <a href="#">Damo@gmail.com</a></li>
                        <li><span>Phone :</span> <a href="#">+660 256 24857</a> 
                        <li><span>Fax :</span> <a href="#">+660 256 24857</a></li>
                        <li><span>Mobile :</span> <a href="#">+088 019 458 287 74</a></li>
                    </ul>
			
		</div>
	<div class="end-container">
		<div class="footer-content">
			<div class="footer-line">
				<ul>
					<li><a href="#">Terms & Conditions</a></li>
					<li><a href="#">Privacy</a></li>
				</ul>
			</div>
			<nav class="icons">
				<ul>
					<li><a href="#">Follow</a></li>
					<li><a href="https://www.facebook.com/rocksashraf"><i class="fab fa-facebook-f"></i></a></li>
					<li><a href="https://twitter.com/Ashraf_Suzaan"><i class="fab fa-twitter"></i></a></li>
					<li><a href="https://www.instagram.com/ashraf__suzan/"><i class="fab fa-instagram"></i></a></li>
				</ul>
			</nav>
			<div class="copyright">
			<p>Copyright &copy; 2021 Md Ashraful Islam. All Rights Reserved.</p>
		</div>
		</div>
	</div>
</section>
</footer>

</body>

</html>
