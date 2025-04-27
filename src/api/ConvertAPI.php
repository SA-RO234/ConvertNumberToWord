<?php
require_once "../functions/currencyConvert.php";
require_once "../functions/enConvert.php";
require_once "../functions/khConvert.php";
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
$data = json_decode(file_get_contents("php://input"), true);
// echo("Value : ".$data);
if (isset($data['number']) && is_numeric($data['number'])) {
    $number = $data['number'];
    $number =  intval($data['number']);
    $respone = [
        'english' => EnConvert::ConvertToEnglishWord($number),
        'khmer' => khConvert::toKhmerWord($number),
        'dollar' => convertNumberToDollar($number)
    ];
    echo json_encode($respone);
} else {
    echo json_encode(['error' => "Error number that provide !"]);
}
