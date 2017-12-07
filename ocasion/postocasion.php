<?php
include_once('../api.php');

$api = new api();
echo $api->postOcasion($_GET["nombre"]);
?>