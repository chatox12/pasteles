<?php
    include_once('../api.php');

    $api = new api();
    echo $api->postUsuario($_GET["estado"],$_GET["idUsuario"],$_GET["idPedido"]);
?>