<?php
include_once('../api.php');

$api = new api();
$data = $api->getCliente();

header('Access-Control-Allow-Origin: *');
header('Content-type:application/json');
echo json_encode($data,JSON_PRETTY_PRINT|JSON_NUMERIC_CHECK );

//echo '{"monto": "'.$monto[0]->valor.'","moneda":"'.$moneda[0]->nombre.'","simbolo":"'.$moneda[0]->simbolo.'"}';
?>