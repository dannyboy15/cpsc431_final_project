<?php
session_start();

require_once 'sanitize.php';

// Create short variable names
$password = sha1(sanitize($_POST['newpassword1']));

if(empty($password)) {
  echo "<h1>Reset failed</h1>";
}

$code = sanitize($_GET['code']);
$email = sanitize($_POST['email']);
require_once 'mysql_conn.php';
$dbconn = new_connection('phpWebEngine');

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "UPDATE UserAcct SET Password = ? WHERE Email = ?";
$stmt = $dbconn->prepare($query);

if ($stmt) {
    $stmt->bind_param('ss', $password, $email);
    if (!$stmt->execute()) {
        echo "SQL execution failed";
    } else {
      echo "It worked!!!!!";
    }
} else {
  echo "statement failed";
}

$dbconn->close();

require_once('index.php');


// require_once 'mysql_conn.php';
// $dbconn = new_connection('phpWebEngine');
//
// if (mysqli_connect_errno()) {
//     printf("Connect failed: %s\n", mysqli_connect_error());
//     exit();
// }
// $query = "UPDATE Email FROM UserAcct WHERE email='$email'";
//
// if($code){
// 	// $get_email = $_GET['email'];
// 	// $get_code = $_GET['code'];
//
// 	$reset = mysqli_query($dbconn, $query);
// 	$row = mysqli_fetch_assoc($reset);
//
// 	while($row){
// 		$code = $row['passreset'];
// 		$email = $row['email'];
// 	}
// 	#if($get_email == $email && $get_code == $code){
//
// 	#}
//
// $dbconn->close();
// }
