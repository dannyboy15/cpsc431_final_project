<?php
session_start();

if(!isset($_SESSION['id'])) {
  require('index.php');
  return;
}

$title = 'Youth Soccer - Account';
$active = "Account";
require_once('header.php');
require_once('mysql_conn.php');
require_once('./sanitize.php');

$dbconn = new_connection($_SESSION['role']);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT Name_First, Name_Last, Email Phone, Street, City, State, ZipCode FROM Adult  WHERE ID = (SELECT AdultID FROM UserAcct WHERE ID = ?)";
$stmt = $dbconn->prepare($query);

if ($stmt) {
    $stmt->bind_param('s', $_SESSION['id']);
    if (!$stmt->execute()) {
        echo "SQL execution failed";
    } else {
      // echo "It worked!!!!!";
    }
} else {
  echo "statement failed";
}

if(($result = $stmt->get_result())->num_rows > 0) {
  $row = $result->fetch_array(MYSQLI_ASSOC);

  $firstName = $row['Name_First'];

?>
<div class="container">
  <h1>Account</h1>
  <form action="account.php" method="POST">
    <div class="form-group">
      <label for="firstName">First Name</label>
      <input type="firstName" class="form-control" id="firstName" name='firstName' value=<?= $firstName ?>>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name='password' placeholder="********">
    </div>
    <div>
      <a href="display_forgot.php">Forgot Password</a> | <a href="display_registration.php">Register</a>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<?php
} else {
  ?>
  <div class="container">
    <h1>Account</h1>
    <p>Your account is not connected to and Adult profile. Ask the admin to connect your account.
  </div>
<?php
}
$dbconn->close();
require_once('footer.php');
?>
