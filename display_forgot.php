<?php

$title = 'Youth Soccer - Register';
$active = "Login";
require_once('header.php');

?>

<div class="container">
  <div class="col-6">
    <h1>Forgot Password?</h1>
	<form action="forgot.php" method="POST">
		<div class="form-group">
			<label for="email">Enter your email address</label>
			<input type="email" class="form-control" id="email" name='email' aria-describedby="emailHelp" placeholder="example@email.com">
		</div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>


<?php require_once('footer.php'); ?>
