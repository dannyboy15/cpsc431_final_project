<?php

$title = 'Youth Soccer - Register';
$active = "Login";
require_once('header.php');

$email = $_GET['email'];
$code = $_GET['code'];
?>

<div class="container">
  <div class="col-6">
    <h1>Reset Password</h1>
    <?php echo "<form action=\"reset.php?code=".$code."\" method=\"POST\">" ?>
      <div class="form-group">
        <label for="newpassword">Enter New Password</label>
        <input type="password" class="form-control" id="newpassword1" name='newpassword1' aria-describedby="passHelp" placeholder="********">
      </div>
      <div class="form-group">
        <label for="newpassword2">Re-enter Password</label>
        <input type="password" class="form-control" id="newpassword2" name='newpassword2' placeholder="">
      </div>
      <div class="form-group">
	      <?php echo "<input type='hidden' name='email' value='$email'>" ?>
      </div>
      <br>
      <button type="submit" class="btn btn-primary">Reset</button>
    </form>
  </div>
</div>

<?php require_once('footer.php'); ?>
