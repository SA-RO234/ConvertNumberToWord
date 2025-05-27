<?php
require_once "../functions/currencyConvert.php";
require_once "../functions/enConvert.php";
require_once "../functions/khConvert.php";
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
$data = json_decode(file_get_contents("php://input"), true);


function saveHistory($input, $output, $file)
{
    $line = date('Y-m-d H:i:s') . " | " . $input . " | " .  json_encode($output, JSON_UNESCAPED_UNICODE)  . "\n";
    file_put_contents($file, $line, FILE_APPEND);
}

function getHistory($file, $limit = 10){
    if (!file_exists($file)) return [];
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return array_reverse(array_slice($lines, -$limit));
}

$historyFile = __DIR__ . '/../../storage/history.txt';

if (isset($data['number']) && is_numeric($data['number'])) {
    $number = intval($data['number']);
    $result = [
        'english' => EnConvert::ConvertToEnglishWord($number),
        'khmer' => khConvert::toKhmerWord($number),
        'dollar' => convertNumberToDollar($number)
    ];
    saveHistory($number, $result, $historyFile);
    echo json_encode([
        'success' => true,
        'result' => $result,
        'history' => getHistory($historyFile)
    ],JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode(['error' => "Error number that provide !"]);
}
