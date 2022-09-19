<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/database.php');
require_once('../objects/scheduling.php');

$database = new Database();
$db = $database->getConnection();

$scheduling = new Scheduling($db);

$res = $scheduling->read();
$res = $res->fetchAll(PDO::FETCH_ASSOC);
http_response_code(200);
echo json_encode($res);
