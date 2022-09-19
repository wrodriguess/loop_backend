<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

require_once('../config/database.php');
require_once('../objects/carYard.php');

$database = new Database();
$db = $database->getConnection();

$carYard = new CarYard($db);

$id = filter_input(INPUT_GET, 'id');
$carYard->id = $id ?? die;

$carYard->readOne();

if (isset($carYard->address)) {
    http_response_code(200);
    echo json_encode($carYard);
} else {
    http_response_code(404);
    echo json_encode(array("mensagem" => "Pátio não existe."));
}
