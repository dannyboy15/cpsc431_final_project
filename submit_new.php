<?php
require_once 'sanitize.php';
require_once 'mysql_conn.php';

$newpassword1 = $_POST['newpassword1'];
$newpassword2 =$_POST['newpassword2'];
$email = $_POST['email'];
$code = $_GET['code'];

$dbconn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
    	exit();
}
if($newpassword1 = $newpassword2){
	$pass_hash = sha1($newpassword1);
	mysql_query("UPDATE UserAcct SET password='$newpassword' WHERE email='$email'");
	mysql_query("UPDATE UserAcct SET passreset='0' WHERE email='$email'");
	echo "Your password has been reset<p><a href='display_login.php'>Login Here</a>";
}
else{
	echo "Password does not match";
}

$dbconn->close();
?>
