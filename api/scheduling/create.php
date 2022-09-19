<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once('../config/database.php');
require_once('../objects/scheduling.php');

$database = new Database;
$db = $database->getConnection();

$scheduling = new Scheduling($db);

$id_user = $_REQUEST['id_user'];
$id_vehicle = $_REQUEST['id_vehicle'];
$date = $_REQUEST['date'];
$hour = $_REQUEST['hour'];

if ($id_user && $id_vehicle && $date && $hour) {
    $scheduling->id_user = $id_user;
    $scheduling->id_vehicle = $id_vehicle;
    $scheduling->date = $date;
    $scheduling->hour = $hour;

    if ($scheduling->create()) {
        http_response_code(201);
        echo json_encode(
            array("message" => "Agendamento criado.")
        );
    } else {
        http_response_code(500);
        echo json_encode(
            array("message" => "Não foi possível criar agendamento.")
        );
    }
} else {
    http_response_code(400);
    echo json_encode(
        array("message" => "Não foi possível criar agendamento. Os dados estão incompletos.")
    );
}
