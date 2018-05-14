<?php

@session_start();
// var_dump($_SESSION);

$title = 'Welcome - Youth Soccer';
$active = "";
require_once('header.php');
?>


<div class="container">
  <h1 class="text-center">Welcome to Youth Soccer League</h1>
  <?php
  if(isset($_SESSION['id'])) {
    echo "<p>You're logged in</p>";
  } else {
    echo "<p>Please sign up or log in to get started</p>";
  }
  ?>

</div>

<?php require_once('footer.php'); ?>
