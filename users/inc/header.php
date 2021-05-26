
<?php 
include "db.php";
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--fav-icon-->
	<link rel="icon" href="asset/images/favicon.png">
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
	<!-- fontawesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" integrity="sha384-rtJEYb85SiYWgfpCr0jn174XgJTn4rptSOQsMroFBPQSGLdOC5IbubP6lJ35qoM9" crossorigin="anonymous">
    <!--admin Style css-->
    <link rel="stylesheet" type="text/css" href="css/adminstyle.css">
    <!--Header and Footer CSS-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>NewsPortal</title>
</head>

<body>

<!----top part start----->

	<section id="slider">
			<div class="container">
				<div class="slider-top">
					<div class="header">
					<div id="name">
							<a href="../index.php">NEWS24/7</a>
					</div>
					<!-- Search Box-->
					<!--<div id="search">
						<form action="news/search.php" method="POST">
							<input type="text" name="search" placeholder="Search here..." required="required">
							<input type="submit" name="searchbtn" value="Search">
						</form>	
					</div>
					
					<div class="login" >
						<a style="text-decoration: none" href="">Sign In</a> | <a style="text-decoration: none" href="userregistration.php">Sign Up</a>
					</div>-->
			</div>
				
					<nav class="menu">
						<ul>
							<li class="active"><a href="../index.php">Home</a></li>
							<li><a href="../index.php">MENU</a>
									<ul>
										<li><a href="#">Admin</a></li>
										<li><a href="#">Users</a></li>
										<li><a href="#">Publish News</a></li>
									</ul>
							</li>
							<li><a href="#">Bangladesh</a></li>
							<li><a href="#">International</a></li>
							<li><a href="#">Bussiness</a></li>
							<li><a href="#">Sports</a></li>
							<li><a href="#">Entertainment</a></li>
							<li><a href="#">Job Circular</a></li>
						</ul>
					</nav>
			</div>
		</div>
	</section>