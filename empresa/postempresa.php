<?php
    include_once("../api");

    $api = new api();
    echo = $api->postFotografia($GET["nombre"], $GET["nit"], $GET["direccion"], $GET["ciudad"], $GET["telefono"], $GET["logo"]);
    
?>