<?php
    include_once('api.php');
    
    $api = new api();
    $data = $api->getRegistrosTablaValor($_GET["tabla"], $_GET["columna"], $_GET["valor"]);
    array_pop($data);
   
    if(count($data) == 0){
        print_json(404, "Not Found", $data);

    }
    else{
        print_json(200, "OK", $data);
    }
        

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