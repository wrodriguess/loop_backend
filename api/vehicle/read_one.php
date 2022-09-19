<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

require_once('../config/database.php');
require_once('../objects/vehicle.php');

$database = new Database();
$db = $database->getConnection();

$vehicle = new Vehicle($db);

$id = filter_input(INPUT_GET, 'id');
$vehicle->id = $id ?? die;

$vehicle->readOne();

if (isset($vehicle->brand)) {
    http_response_code(200);
    echo json_encode($vehicle);
} else {
    http_response_code(404);
    echo json_encode(array("mensagem" => "Veiculo não existe."));
}
