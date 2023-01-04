<?php
$servername = "localhost:3306";
$username = "root";
$password = "123";

try {
  $conn = new PDO("mysql:host=$servername;dbname=quocviet", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "kết nối thành công";
} catch(PDOException $e) {
  echo "kết nối thất bại" . $e->getMessage();
}
?>