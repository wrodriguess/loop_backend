<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

require_once('../config/database.php');
require_once('../objects/user.php');

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$id = filter_input(INPUT_GET, 'id');
$user->id = $id ?? die;

$user->readOne();

if (isset($user->name)) {
    http_response_code(200);
    echo json_encode($user);
} else {
    http_response_code(404);
    echo json_encode(array("mensagem" => "Usuário não existe."));
}
