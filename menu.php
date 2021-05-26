<?php include"asset/inc/db.php" 
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
			<?php if( isset($_SESSION['email']) && !empty($_SESSION['email']) )
{
?>
				      <a href="logout.php" style="text-decoration: none">Log Out</a>
				<?php }else{ ?>
				      <a style="text-decoration: none" href="signin.php">Sign In</a>
				<?php } ?>
						      
						     <!--<span>||</span> <a style="text-decoration: none" href="users/userregistration.php">Sign Up</a>-->
			
					</div>
			</div>
				
					<nav class="menu">
						<ul>
							<li class=""><a href="index.php">Home</a></li>
							<li><a href="menu.php">MENU</a>
									<ul>
										<li><a href="admin/adminpanel.php">Admin</a></li>
										<li><a href="users/users.php">Users</a></li>
										<li><a href="news/publishednews.php">Publish News</a></li>
										<li><a href="news/postnews.php">Post News</a></li>
									</ul>
							</li>
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
<section>
	<div><ul>
		<li><a href="admin/adminpanel.php">Admin</a></li>
		<li><a href="users/users.php">Users</a></li>
		<li><a href="news/publishednews.php">Publish News</a></li>
		<li><a href="news/postnews.php">Post News</a></li>
	</ul></div>
	
</section>

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
