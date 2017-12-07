<?php
    include_once("../api");

    $api = new api();
    echo = $api->postNotificacion($GET["estado"], $GET["idpedido"]);
    
?>