<?php
$dsn = 'mysql:host=localhost;dbname=invoice_manager';
$username = 'root';
$password = '';

try {
  $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
  $error = $e->getMessage();
  echo $error;
  exit();
}

$sql = "SELECT * FROM statuses";
$result = $db->query($sql);
$statuses = $result->fetchAll(PDO::FETCH_COLUMN, 1);