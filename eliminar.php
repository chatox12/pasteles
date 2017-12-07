<?php
include_once('api.php');

$api = new api();
$api->eliminarTabla($_GET["id"],$_GET["tabla"]);
?>
