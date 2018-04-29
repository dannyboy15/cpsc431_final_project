<!DOCTYPE html>
<?php

$port = "3306";
$hostname = "localhost";

$dbhost = $hostname.":".$port;
$dbuser = "phpWebEngine";
$dbpass = "withheld";
$dbname = "YSoccerDB";

$dbconn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if ($dbconn->connect_errno) {
  printf("Connect failed: %s<br>", $dbconn->connect_error);
  exit();
} else {
    echo "connected succesfully<br>";
    $query = "
  SELECT
      *
  FROM
      Roles";
}

if ($result = $dbconn->query($query)) {
  while ($row = $result->fetch_array(MYSQLI_NUM)) {
      var_dump($row);
      echo "<br>";
  }
}

require 'header.php';

echo "<h1>Welcome Message</h1>";

require 'footer.php';
?>