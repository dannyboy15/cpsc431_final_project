<?php

require_once('sanitize.php');

// Create short variable names
$email = sanitize($_POST['email']);
$password = sanitize($_POST['password']);

if(empty($email) || empty($password)) {
  echo "<h1>Login failed</h1>";
}
$password = sha1($password);

require_once 'mysql_conn.php';
$dbconn = new_connection('phpWebEngine');

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT ID, Role FROM UserAcct WHERE Email = ? and Password = ?";
$stmt = $dbconn->prepare($query);

session_start();
if ($stmt) {
    $stmt->bind_param('ss', $email, $password);
    if (!$stmt->execute()) {
        echo "SQL execution failed";
    }
    if(($result = $stmt->get_result())->num_rows > 0) {
      $row = $result->fetch_array(MYSQLI_ASSOC);

      $_SESSION['id'] = $row['ID'];
      $_SESSION['role'] = $row['Role'];

    } else {
      echo 'You failed to log in';
    }

} else {
  echo "statement failed";
}

$dbconn->close();

require('index.php');


 ?>
