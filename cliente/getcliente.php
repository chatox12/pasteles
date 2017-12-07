<?php
include_once('../api.php');

$api = new api();
$data = $api->getCliente();

//header('Access-Control-Allow-Origin: *');
//header('Content-type:application/json');
//echo json_encode($data,JSON_PRETTY_PRINT|JSON_NUMERIC_CHECK );
    print_json(200, "OK", $data);
//echo '{"monto": "'.$monto[0]->valor.'","moneda":"'.$moneda[0]->nombre.'","simbolo":"'.$moneda[0]->simbolo.'"}';

function print_json($status, $mensaje, $data) {
    header("HTTP/1.1 $status $mensaje");
    header("Content-Type: application/json; charset=UTF-8");

    $response['statusCode'] = $status;
    $response['statusMessage'] = $mensaje;
    $response['data'] = $data;

    echo json_encode($response, JSON_PRETTY_PRINT);
}
?>