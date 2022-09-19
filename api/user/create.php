<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once('../config/database.php');
require_once('../objects/user.php');

$database = new Database;
$db = $database->getConnection();

$user = new User($db);

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$telephone = filter_input(INPUT_POST, 'telephone');

if ($name && $email && $telephone) {
    $user->name = $name;
    $user->email = $email;
    $user->telephone = $telephone;

    if ($user->create()) {
        http_response_code(201);
        echo json_encode(
            array("message" => "Usuário criado.")
        );
    } else {
        http_response_code(500);
        echo json_encode(
            array("message" => "Não foi possível criar usuário.")
        );
    }
} else {
    http_response_code(400);
    echo json_encode(
        array("message" => "Não foi possível criar usuário. Os dados estão incompletos.")
    );
}
