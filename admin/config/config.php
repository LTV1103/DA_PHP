<?php
session_start();
try {
  // $pdo = new PDO("mysql:host=sql103.byethost9.com;dbname=b9_37475489_mohinh", "b9_37475489", "Benasi4n1907..");
  $pdo = new PDO("mysql:host=localhost;dbname=db_webmohinh", "root", "");

  // Cài đặt chế độ lỗi cho PDO
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection failed!";
  exit();
}


define("ROOT", dirname(dirname(__DIR__))); ///DA_PHP
