<?php

require_once 'mysql_conn.php';
$dbconn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT Opponent, Location, Score, TeamRank FROM Matches";
$result = $dbconn->query($query);

?>
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
      <h1>Matches</h1>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Opponent</th>
            <th scope="col">Location</th>
            <th scope="col">Score</th>
            <th scope="col">Team Rank</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($result) {
              $row_num = 1;
              while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                printf ("<tr>
                          <th scope=\"row\">%d</th>
                          <td>%s</td>
                          <td>%s</td>
                          <td>%s</td>
                          <td>%s</td>
                        </tr>",
                $row_num++, $row['Opponent'], $row['Location'], $row['Score'], $row['TeamRank']);
            }
          } else {
            echo "query failed";
          }

          $dbconn->close();


           ?>


        </tbody>
      </table>
    </div>
  </body>
</html>
