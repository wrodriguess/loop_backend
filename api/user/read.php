<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/database.php');
require_once('../objects/user.php');

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$res = $user->read();
$res = $res->fetchAll(PDO::FETCH_ASSOC);
http_response_code(200);
echo json_encode($res);
