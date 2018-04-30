<?php

$title = 'Youth Soccer - Register';
$active = "Login";
require_once('header.php');

?>

<div class="container">
  <div class="col-6">
    <h1>Register</h1>
    <form action="register.php" method="POST">
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name='email' aria-describedby="emailHelp" placeholder="example@email.com">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name='password' aria-describedby="passHelp" placeholder="********">
        <small id="passHelp" class="form-text text-muted">At least 8 alpha numeric characters</small>
      </div>
      <div class="form-group">
        <label for="password2">Re-enter Password</label>
        <input type="password" class="form-control" id="password2" name='password2' placeholder="">
      </div>
      <div>
        <a href="display_login.php">Log in</a>
      </div>
      <br>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

<?php require_once('footer.php'); ?>
