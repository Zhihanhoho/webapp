<?php

$mysql_host = 'us-cdbr-iron-east-05.cleardb.net';
$mysql_user = 'bec617f30f8fbc';
$mysql_pass = '99fde09e';
$mysql_db = 'heroku_947dd34b739ebe6';
$connect_error = "fail to login";
$current_file = $_SERVER['SCRIPT_NAME'];

$con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
if (!$con) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
} else {
	global $con;
	$username = $_POST['username'];
	$password = $_POST['password'];


	// echo $username;
	// echo "\n";
	// echo $password;
	// echo "\n";
	$query1 = mysqli_query($con, "SELECT * FROM user WHERE username='".$username."' AND password='".$password."'");
	if(mysqli_num_rows($query1) > 0){
	    $query = mysqli_prepare($con, "DELETE FROM user WHERE username=? AND password=?");
		$query->bind_param("ss", $username,$password);
		if ($query->execute()) {
			echo 'deleted';
		} else {
			echo 'failed';
		}
	}else{
		echo "wrong combination";
	}
}
?>

<div class="tut"> <a href="https://aqueous-reaches-68067.herokuapp.com">Go back to the home page </a> </div>