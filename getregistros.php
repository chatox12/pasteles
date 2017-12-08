<?php
    include_once('api.php');
    
    $api = new api();
    $data = $api->getRegistrosTabla($_GET["tabla"]);
    array_pop($data);    

    //compara si trae datos el array 
    if(count($data) == 0){
    //si no hay datos se envia el mensaje de no encontrado 
        print_json(404, "Not Found", $data);        
    }
    else{
    //si tiene datos el array envia los datos que ha obtenido
        print_json(200, "OK", $data);
        
    }    
    function print_json($status, $mensaje, $data) {
        header("HTTP/1.1 $status $mensaje");
        header("Content-Type: application/json; charset=UTF-8");
    
        $response['statusCode'] = $status;
        $response['statusMessage'] = $mensaje;
        $response['data'] = $data;
    
        echo json_encode($response, JSON_PRETTY_PRINT);
    }



?>