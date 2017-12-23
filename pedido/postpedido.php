<?php
include_once('../api.php');

$api = new api();
$data = $api->postPedido($_GET["fengtrega"],$_GET["correo"],$_GET["boleta"],$_GET["idcliente"], $GET["idpasteles"]);

header('Content-Type: application/json');
echo json_encode($data,JSON_PRETTY_PRINT|JSON_NUMERIC_CHECK );

?>