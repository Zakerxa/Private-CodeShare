<?php
include "../config/db-config.php";
include "../assets/randomint.php";
include "../assets/php/tnc.php";

$container = array();

if (isset($_COOKIE['name'])) {
  
  $name = $_COOKIE['name'];
  $stmt = $pdo->prepare("SELECT * FROM cp_projects WHERE author = :author ORDER BY id DESC");
  $stmt->execute(array(':author' => $name));
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if ($stmt->rowCount() >= 1) {
    foreach ($data as $value) {
      $row['name'] = $value['author'];
      $row['data'] = htmlspecialchars_decode(trim($value['data']), ENT_QUOTES);
      $row['date'] = timeZone($value['created_date']);
      $row['otk'] = $value['otk'];
      array_push($container, $row);
    }
  }
  echo json_encode($container, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
} else {
  echo json_encode($container, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
  header("location:../");
}
