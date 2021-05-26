<!--database connection stablished in this file-->

<?php 
//connect and provide database credential

$db= mysqli_connect("localhost", "root", "", "news_portal_db");

if($db){
	//echo "Database connected successfully.";
}
else{
	die("Connection failed.". mysqli_error($db));  
}

?>