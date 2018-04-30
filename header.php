<?php

$isActive = array('Home' => '', 'Practice' => '', 'Carpool' => '', 'Admin' => '', 'Login' => '');


function setActive(&$arr, $page)
{
  foreach (array_keys($arr) as $key) {
    $arr[$key] = '';
  }
  $arr[$page] = 'active';
}

setActive($isActive, $active);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <title><?= $title ?></title>
  </head>
  <body>
    <div class="container mt-4">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Youth Soccer</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class=<?= printf("\"nav-item nav-link %s\"", $isActive["Home"]); ?> href="/matches.php">Home</a>
            <a class=<?= printf("\"nav-item nav-link %s\"", $isActive["Practice"]); ?> href="#">Practice</a>
            <a class=<?= printf("\"nav-item nav-link %s\"", $isActive["Carpool"]); ?> href="#">Carpool</a>
            <a class=<?= printf("\"nav-item nav-link %s\"", $isActive["Admin"]); ?> href="#">Admin</a>
            <div class="justify-content-end">
              <a class=<?= printf("\"nav-item nav-link %s\"", $isActive["Login"]); ?> href="/display_login.php">Login/Register</a>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </body>
</html>
