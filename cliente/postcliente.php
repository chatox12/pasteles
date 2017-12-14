<?php
include_once('../api.php');

    $api = new api();
    echo $api->postCliente($_GET["nombre"],$_GET["apellido"],$_GET["direccion"],$_GET["telefono"],$_GET["nickname"],$_GET["password"],$_GET["correo"],$_GET["nit"]);

?>