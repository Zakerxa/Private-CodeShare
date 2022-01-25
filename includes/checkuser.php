<?php
include "../config/db-config.php";


if (isset($_POST['name'])) {
    
    if (empty($_POST['name'])) {
        echo "empty";
    } else {

        $username = $_POST['name'];
        $password = $_POST['pass'];

        $stmt = $pdo->prepare("SELECT * FROM randomusers WHERE username=:username AND password=:password");
        $stmt->execute(array(':username' => $username, ':password' => $password));

        if ($stmt->rowCount() === 1) {
            echo "true";
        }else{
            echo "false";
        }
    }
} else {
    echo "invalid";
}
