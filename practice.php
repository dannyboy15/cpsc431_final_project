<?php
session_start();
$title = 'Youth Soccer - Practice';
$active = "Practice";
require_once('header.php');


// require_once('mysql_conn.php');
// $dbconn = new_connection('phpWebEngine');
//
// if (mysqli_connect_errno()) {
//     printf("Connect failed: %s\n", mysqli_connect_error());
//     exit();
// }
//
// $query = "SELECT Opponent, Location, Score, TeamRank FROM Matches";
// $result = $dbconn->query($query);

?>
<div class="container">
  <h1>Practice</h1>
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
      // if ($result) {
      //     $row_num = 1;
      //     while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
      //       printf ("<tr>
      //                 <th scope=\"row\">%d</th>
      //                 <td>%s</td>
      //                 <td>%s</td>
      //                 <td>%s</td>
      //                 <td>%s</td>
      //               </tr>",
      //       $row_num++, $row['Opponent'], $row['Location'], $row['Score'], $row['TeamRank']);
      //   }
      // } else {
      //   echo "query failed";
      // }
      //
      // $dbconn->close();


       ?>


    </tbody>
  </table>
</div>
<?php require_once('footer.php'); ?>
