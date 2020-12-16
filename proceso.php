<?php
include_once "base64.php";
if (!isset($_POST['texto'])) {
    header("Location: ./");
}
$encry = SHA1::_encryptacion($_POST['texto']);
$desencry = SHA1::_desencryptacion($encry);
$arrayName = array(
    'encry' => $encry,
    'desencry' => $desencry,
);
echo json_encode($arrayName);
