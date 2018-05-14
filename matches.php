<?php
session_start();

if(!isset($_SESSION['id'])) {
  require('index.php');
  return;
}

$title = 'Youth Soccer - Matches';
$active = "Home";
require_once('header.php');


require_once('mysql_conn.php');
$dbconn = new_connection('phpWebEngine');

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT Opponent, Location, Street, City, State, Country, ZipCode, Score, TeamRank FROM Matches";
$result = $dbconn->query($query);

?>
<div class="container">
  <h1>Matches</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Opponent</th>
        <th scope="col">Location</th>
        <th scope="col">Street</th>
        <th scope="col">City</th>
        <th scope="col">State</th>
        <th scope="col">Country</th>
        <th scope="col">Zipcode</th>
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
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>",
            $row_num++, $row['Opponent'], $row['Location'], $row['Street'], $row['City'], $row['State'], $row['Country'], $row['ZipCode'], $row['Score'], $row['TeamRank']);
        }
      } else {
        echo "query failed";
      }

      $dbconn->close();


       ?>


    </tbody>
  </table>
</div>
<?php require_once('footer.php'); ?>
