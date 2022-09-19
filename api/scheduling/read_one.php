<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

require_once('../config/database.php');
require_once('../objects/scheduling.php');

$database = new Database();
$db = $database->getConnection();

$scheduling = new Scheduling($db);

$id = filter_input(INPUT_GET, 'id');
$scheduling->id = $id ?? die;

$scheduling->readOne();

if (isset($scheduling->hour)) {
    http_response_code(200);
    echo json_encode($scheduling);
} else {
    http_response_code(404);
    echo json_encode(array("mensagem" => "Agendamento não existe."));
}
