<?php
session_start();

$title = 'Welcome - Logging Out';
$active = "";

unset($_SESSION['id']);
unset($_SESSION['role']);

require_once('header.php');

require_once('index.php');

?>
