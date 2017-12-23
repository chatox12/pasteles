<?php
include_once('../api.php');



$api = new api();
echo $api->postCliente($_GET["finicio"],$_GET["ffin"],$_GET["descuento"],$_GET["cantidad"], $_GET["estado"]);

?>