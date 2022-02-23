<?php
// This code will be run every 12 hours from the Server. => Like cornjob
try {
    // This path is not default on the server
    include "config/db-config.php";
    $delete = $pdo->prepare("DELETE FROM cp_projects");
    $delete->execute();
    exit();
} catch (\Throwable $th) {
    // If unauthorised users run this page ,That will not be work.
    header("location:/");
}
