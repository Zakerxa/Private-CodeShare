<?php 

define('MYSQL_USER','root');
define('MYSQL_PASSWORD','yourpassword');
define('MYSQL_HOST','localhost');
define('MYSQL_DATABASE','codeshare');

$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
);

$pdo = new PDO(
    'mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DATABASE,MYSQL_USER,MYSQL_PASSWORD,$options
);


date_default_timezone_set("Asia/Yangon");
$diffWithGMT = 6 * 60 * 60 + 30 * 60; //converting time difference to seconds.
$ygntime = gmdate("Y-m-d H:i:s", time() + $diffWithGMT);
$ygndate = gmdate("Y-F-d", time() + $diffWithGMT);


function escape($html){
    return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}

function unescape($html){
    return html_entity_decode($html);
}

if (empty($_SESSION['CSRF'])) {
    if (function_exists('random_bytes')) {
        $_SESSION['CSRF'] = bin2hex(random_bytes(32));
    } else {
        $_SESSION['CSRF'] = bin2hex(openssl_random_pseudo_bytes(32));
    }
}


?>
