<?php
include "config/db-config.php";
include "assets/randomname.php";
include "assets/randomint.php";

if (isset($_POST['username'])) {
    
    if (empty($_POST['username'])) {
        echo "empty";
        exit();
    } else {
        $username = htmlspecialchars("CS" . RandomString(3) . "-" . $_POST['username'], ENT_QUOTES, 'UTF-8');
        $password = RandomName(15);

        $stmt = $pdo->prepare("INSERT INTO randomusers (username,password) VALUES (:username,:password)");
        $done = $stmt->execute(array(':username' => $username, ':password' => $password));

        if ($done) {
            setcookie("name", $username, time() + 60 * 60 * 24 * 10);
            setcookie("key", $password, time() + 60 * 60 * 24 * 10);
            echo "success";
        }
    }
} else {
    echo "invalid";
}
