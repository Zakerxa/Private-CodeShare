<?php 
setcookie("name", '', time() - 1, '/');
setcookie("key", '', time() - 1, '/');
header("location:/");
