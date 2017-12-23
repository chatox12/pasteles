<?php
include_once('../api.php');
    $api = new api();
    echo $api->postPastelesVenta($_GET["nombre"],$_GET["precio"],, $GET["descripcion"],$_GET["idocasion"],$_GET["idOferta"]);
?>