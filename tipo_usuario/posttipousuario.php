<?php
include_once('../api.php');

$api = new api();
echo $api->postTipoUsuario($_GET["nombre"]);

?>