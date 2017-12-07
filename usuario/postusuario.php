<?php
    include_once('../api.php');

    $api = new api();
    echo $api->postUsuario($_GET["nombre"],$_GET["apellido"],$_GET["direccion"],$_GET["telefono"],$_GET["nickname"],$_GET["password"],$_GET["idtipousuario"] );
    
?>