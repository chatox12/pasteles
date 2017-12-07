<?php
include_once('api.php');

$api = new api();
$api->actualizarUsuario($_GET["tabla"],$_GET["campo"],$_GET["nuevoValor"],$_GET["id"]);
?>
