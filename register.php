<?php
require_once 'sanitize.php';

// Create short variable names
$email = sanitize($_POST['email']);
$password = sanitize($_POST['password']);

if(empty($email) || empty($password)) {
  echo "<h1>Registration failed</h1>";
}
$password = sha1($password);

require_once 'mysql_conn.php';
$dbconn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "INSERT INTO UserAcct VALUES (NULL, ?, ?, NULL, NULL)";
$stmt = $dbconn->prepare($query);


if ($stmt) {
    printf("%s %s", $email, $password);
    $stmt->bind_param('ss', $email, $password);
    if (!$stmt->execute()) {
        echo "SQL execution failed";
    } else {
      echo "It worked!!!!!";
    }
} else {
  echo "statement failed";
}

// require ""


 ?>
