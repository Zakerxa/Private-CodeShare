<?php
include "../config/db-config.php";
include "../assets/randomint.php";

if (isset($_POST['code']) && isset($_COOKIE['name'])) {
 
  $data = htmlspecialchars($_POST['code'], ENT_QUOTES, 'UTF-8');
  $name = htmlspecialchars($_COOKIE['name']);
  $otk = RandomString(6);

  $stmtCheckOtk = $pdo->prepare("SELECT otk FROM cp_projects WHERE otk = :otk");
  $stmtCheckOtk->execute(array(':otk'=>$otk));
  if($stmtCheckOtk->rowCount() === 1){
    $otk = RandomString(7);
  }

  $stmt = $pdo->prepare("INSERT INTO cp_projects (author, data, otk, created_date) VALUES (:name, :data, :otk, :date)");
  $done = $stmt->execute(array(':name' => $name, ':data' => $data, ':otk' => $otk,':date' => $ygntime));
  if ($done) {
      echo "success";
      exit();
  }

}else{
  echo "unauthorised";
  header("location:../");
}
