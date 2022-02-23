<?php

include "../config/db-config.php";
include "../assets/php/tnc.php";

if (isset($_POST['code'])) {

    $code = escape($_POST['code']);

    $checkOtk = $pdo->prepare("SELECT * FROM cp_projects WHERE otk = :code");
    $checkOtk->execute(array(":code" => $code));
    $result = $checkOtk->fetch(PDO::FETCH_ASSOC);

    if ($checkOtk->rowCount() === 1 && $result) {

        if ($result['otk'] == $code) {
            $data['Owner']       = $result['author'];
            $data['Code']        = htmlspecialchars_decode(trim($result['data']), ENT_QUOTES);
            $data['PrivateKey']  = $result['otk'];
            $data['Time'] = timeZone($result['created_date']);
            $data['Now']   = $ygntime;
            echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        } else {
            echo "expire php";
        }
    }else{
        echo json_encode("invalid", JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        die();
    }
} else {
    echo "Something Wrong!";
}
