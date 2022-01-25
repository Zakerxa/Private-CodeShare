<?php
function RandomName($digit) {
    $characters = 'QWERTYUIPASDFGHJKLZXCVBNM';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $digit; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}