<?php
include_once('../api.php');

    $api = new api();
    echo $api->postPedidoPastel($_GET["cantidad"],$_GET["rebanadas"],$_GET["idpasteles"],$_GET["idpedido"]);

?>