<?php
include_once('../api.php');



$api = new api();
echo $api->postCliente($_GET["nombre"],$_GET["apellido"],$_GET["direccion"],$_GET["telefono"]);

?>