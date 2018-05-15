<?php
session_start();

if(!isset($_SESSION['id'])) {
  require('index.php');
  return;
}

$title = 'Youth Soccer - Admin';
$active = "Admin";
require_once('header.php');
require_once('mysql_conn.php');
require_once('./sanitize.php');

// require_once('mysql_conn.php');
// $dbconn = new_connection('phpWebEngine');
//
// if (mysqli_connect_errno()) {
//     printf("Connect failed: %s\n", mysqli_connect_error());
//     exit();
// }
//
// $query = "SELECT Opponent, Location, Score, TeamRank FROM Matches";
// $result = $dbconn->query($query);

if(isset($_POST['user']) && isset($_POST['role'])) {
  $dbconn = new_connection($_SESSION['role']);
  $user = sanitize($_POST['user']);
  $role = sanitize($_POST['role']);

  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }

  $query = "UPDATE UserAcct SET Role = ? WHERE ID = ?";
  $stmt = $dbconn->prepare($query);

  if ($stmt) {
      $stmt->bind_param('ss', $role, $user);
      if (!$stmt->execute()) {
          echo "SQL execution failed";
      } else {
        echo "It worked!!!!!";
      }
  } else {
    echo "statement failed";
  }

  $dbconn->close();
}
// var_dump($_POST);

?>
<div class="container">
  <h1>Admin</h1>

  <form action="admin.php" method="POST">
    <select name='user' class="form-control">

      <?php

      $dbconn = new_connection($_SESSION['role']);

      if (mysqli_connect_errno()) {
          printf("Connect failed: %s\n", mysqli_connect_error());
          exit();
      }

      $query = "SELECT ID, Email, Role FROM UserAcct";
      $result = $dbconn->query($query);

      if($result) {
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
          printf ('<option value="%s">%s - %s</option>',
          $row['ID'], $row['Email'], $row['Role']);
        }
      }
      ?>
    </select>
    <select name='role' class="form-control">
      <option value='observer'>observer</option>
      <option value='user'>user</option>
      <option value='manager'>manager</option>
    </select>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>


</div>
<?php require_once('footer.php'); ?>
