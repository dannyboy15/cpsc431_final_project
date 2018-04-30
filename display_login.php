<?php

$title = 'Youth Soccer - Login';
$active = "Login";
require_once('header.php');

?>

<div class="container">
  <div class="col-6">
    <h1>Login</h1>
    <form action="login.php" method="POST">
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name='email' placeholder="example@email.com">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name='password' placeholder="********">
      </div>
      <div>
        <a href="forgot.php">Forgot Password</a> | <a href="display_registration.php">Register</a>
      </div>
      <br>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

<?php require_once('footer.php'); ?>
