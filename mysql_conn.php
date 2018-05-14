<?php

// create db connection
$port = "3306";
$hostname = "localhost";

$dbhost = $hostname.":".$port;
// $dbuser = "phpWebEngine";
// $dbpass = "withheld";
$dbname = "YSoccerDB";

$users = array('observer', 'user', 'manager', 'admin', 'phpWebEngine');
$pwds = array('observer' => 'withheld', 'user' => 'withheld', 'manager' => 'withheld', 'admin' => 'withheld', 'phpWebEngine' => 'withheld');

// var_dump($users);
function new_connection($role)
{
  if(!in_array($role, $GLOBALS['users'])) {
    return false;
  }

  $dbuser = $role;
  $dbpass = $GLOBALS['pwds'][$role];
  return new mysqli($GLOBALS['dbhost'], $dbuser, $dbpass, $GLOBALS['dbname']);
}

 ?>
