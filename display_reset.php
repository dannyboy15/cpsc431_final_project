<?php

$title = 'Youth Soccer - Register';
$active = "Login";
require_once('header.php');

$email = $_POST['email'];

?>

<div class="container">
  <div class="col-6">
    <h1>Register</h1>
    <form action="reset.php?code=$code" method="POST">
      <div class="form-group">
        <label for="newpassword">Enter New Password</label>
        <input type="password" class="form-control" id="newpassword1" name='newpassword1' aria-describedby="passHelp" placeholder="********">
      </div>
      <div class="form-group">
        <label for="newpassword2">Re-enter Password</label>
        <input type="password" class="form-control" id="newpassword2" name='newpassword2' placeholder="">
      </div>
      <div class="form-group">
	<input type='hidden' email='email' value='$email'>
      </div>
      <br>
      <button type="submit" class="btn btn-primary">Reset</button>
    </form>
  </div>
</div>

<?php require_once('footer.php'); ?>
