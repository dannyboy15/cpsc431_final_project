<?php
session_start();

if(!isset($_SESSION['id'])) {
  require('index.php');
  return;
}

$title = 'Youth Soccer - Pratice';
$active = "Home";
require_once('header.php');


require_once('mysql_conn.php');
$dbconn = new_connection('phpWebEngine');

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT Location, StartTime, PDate FROM Practice";
$result = $dbconn->query($query);

?>
<div class="container">
  <h1>Practice Schedule</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Location</th>
        <th scope="col">Start Time</th>
        <th scope="col">Date</th>
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
                    </tr>",
            $row_num++, $row['Location'], $row['StartTime'], $row['PDate']);
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
