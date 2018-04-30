<?php
require_once 'sanitize.php';

// Create short variable names
$email = sanitize($_POST['email']);
$password = sanitize($_POST['password']);

if(empty($email) || empty($password)) {
  echo "<h1>Login failed</h1>";
}
// $password = sha1($password);

require_once 'mysql_conn.php';
$dbconn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT 1 FROM UserAcct WHERE Email = ? and Password = ?";
$stmt = $dbconn->prepare($query);


if ($stmt) {
    $stmt->bind_param('ss', $email, $password);
    if (!$stmt->execute()) {
        echo "SQL execution failed";
    }
    if($stmt->get_result()->num_rows > 0)
    echo "You have succesfully authenticated";

} else {
  echo "statement failed";
}

$dbconn->close();

require "matches.php"


 ?>
