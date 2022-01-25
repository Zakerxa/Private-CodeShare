<?php
include "../config/db-config.php";
include "../assets/randomint.php";

if ($_POST) {
 if(empty($_POST['code'])){
   exit();
 }else{
    $data = htmlspecialchars($_POST['code'], ENT_QUOTES, 'UTF-8');
    $name = htmlspecialchars($_COOKIE['name']);
    $otk = RandomString(6);
    $stmt = $pdo->prepare("INSERT INTO cp_projects (author, data, otk, created_date) VALUES (:name, :data, :otk, :date)");
    $done = $stmt->execute(array(':name' => $name, ':data' => $data, ':otk' => $otk,':date' => $ygntime));

    if ($done) {
        echo "success";
        exit();
    }
 }

}
?>