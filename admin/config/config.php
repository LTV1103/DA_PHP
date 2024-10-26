<?php
$mysqli = new mysqli("localhost","root","","db_webmohinh");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Connect fail!" . $mysqli -> connect_error;
  exit();
}
?>