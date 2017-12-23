<?php
include_once('../api.php');
    $api = new api();
    echo $api->postPastelesVenta($_GET["nombre"],$_GET["precio"],$_GET["fotografia"],$_GET["idocasion"],$_GET["idOferta"]);
?>