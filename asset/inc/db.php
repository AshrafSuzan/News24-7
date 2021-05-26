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

function dateformat($publish_date){
	return date('m-y-d',strptime($publish_date));
}
function timeformat($localtime){
	return date('g:i a', strtotime($localtime));
}

function dayformat($day){
	return date('l',strtotime($day));
}


?>