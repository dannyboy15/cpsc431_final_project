<?php
require_once 'sanitize.php';

// Create short variable names
#$password = sanitize($_POST['password']);

if(empty($password)) {
  echo "<h1>Reset failed</h1>";
}
$code = $_POST['passreset'];
$email = $_POST['email'];


require_once 'mysql_conn.php';
$dbconn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$query = "SELECT * FROM UserAcct WHERE email='$get_email'";

if($_GET['code']){
	$get_email = $_GET['email'];
	$get_code = $_GET['code'];

	$reset = mysqli_query($dbconn, $query);
	$row = mysqli_fetch_assoc($reset);

	while($row){
		$code = $row['passreset'];
		$email = $row['email'];
	}
	#if($get_email == $email && $get_code == $code){
		
	#}

$dbconn->close();
}
