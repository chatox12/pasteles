<?php
include_once('../api.php');

$api = new api();
$data = $api->getusuariosId($_GET["id"]);

header('Content-Type: application/json');
echo json_encode($data,JSON_PRETTY_PRINT|JSON_NUMERIC_CHECK );

?>