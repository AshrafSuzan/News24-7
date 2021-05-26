<?php
  session_start();
  ob_start();
  
  include"asset/inc/db.php";
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="asset/css/signinstyle.css">
</head>
<body>
 <section>
 	<div class="container">
 			<h1>Sign In</h1>
 			<form action="" method="POST">
 				<input type="text" name="email" required="required" class="form-control" placeholder="xyz@gmail.com"><br>
 			<input type="password" name="password" placeholder="Password" required="required" class="form-control"><br>
 			<input type="checkbox" id="remember">
              <label style="color: white;" for="remember">Remember Me</label>
 			<input type="submit" name="login" value="Sign In" required="required">
 			</form>

      <a href="" style="color:White; text-decoration: none;">Forget password</a> <br>
      <span style="color:White">Don't have an account?<a style="color:White; text-decoration: none;" href="users/userregistration.php">Register Here</a></span>
 	</div>
 	
 	<?php

      if (isset($_POST['login']) ) {
        $email     = mysqli_real_escape_string($db, $_POST['email']);
        $password  = mysqli_real_escape_string($db, $_POST['password']);

        $pass=  sha1($password);

        $sql= "SELECT * FROM adminpanel WHERE email= '$email'";
        $authUser= mysqli_query($db, $sql);

        while ($row = mysqli_fetch_assoc($authUser)) {
          $_SESSION['id']             =$row['id'];
          $_SESSION['image']          =$row['image'];
          $_SESSION['name']           =$row['name'];
          $_SESSION['email']          =$row['email'];
          $_SESSION['password']       =$row['password'];
          $_SESSION['address']        =$row['address'];
          $_SESSION['phone']          =$row['phone'];
          $_SESSION['role']           =$row['role'];
          $_SESSION['status']         =$row['status'];
          $_SESSION['joining_year']   =$row['joining_year'];
         
         if ($email == $_SESSION['email'] && $pass == $_SESSION['password'] && $_SESSION['status'] == 1 ) {
           header("Location: index.php");
      }
      else if($email != $_SESSION['email'] && $pass != $_SESSION['password'] && $_SESSION['status'] != 1){
         header("Location: signin.php");
      }
      else{
        header("Location: signin.php");
      }
    }
}
      ?>
</body>
</html>

 </section>