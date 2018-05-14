<?php

$isActive = array('Home' => '', 'Practice' => '', 'Carpool' => '', 'Admin' => '', 'Login' => '', 'Stats' => '', 'Snack' => '', 'Admin' => '', 'Account' => '', 'Logout' => '');

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
            <?php
            require_once 'mysql_conn.php';
            $dbconn = new_connection('phpWebEngine');

            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            }

            $query = "SELECT LinkName, LinkURL From Roles WHERE Role = ?";
            $stmt = $dbconn->prepare($query);

            $user = isset($_SESSION['role']) ? $_SESSION['role'] : 'phpWebEngine';

            if ($stmt) {
                $stmt->bind_param('s', $user);
                if (!$stmt->execute()) {
                    echo "SQL execution failed";
                } else {
                  $stmt->bind_result($link, $url);
                  while ($stmt->fetch()) {
                    $fulllink = sprintf("<a class=\"nav-item nav-link %s\" href=\"%s\">%s</a>", $isActive[$link], $url, $link);
                    echo $fulllink;
                  }
                  $stmt->close();

                }
            } else {
              echo "statement failed";
            }

            $dbconn->close();

            if(isset($_SESSION['id'])) {
              printf("<a class=\"nav-item nav-link %s\" href=\"/logout.php\">Logout</a>", $isActive["Logout"]);
            } else {
              printf("<a class=\"nav-item nav-link %s\" href=\"/display_login.php\">Login/Register</a>", $isActive["Login"]);
            }

            ?>
          </div>
        </div>
      </nav>
    </div>
  </body>
</html>
