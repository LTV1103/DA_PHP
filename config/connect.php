<?php
$mysqli = new mysqli("localhost","root","","mohinhnv");

// Check connection
if ($mysqli->connect_errno) {
  echo "Loi Ket NoiMySQL: " . $mysqli->connect_error;
  exit();
}
?>