<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <title>Registration Page</title>
  </head>
  <body>
    <div class="container">
      <div class="col-6">
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
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>

  </body>
</html>
