<?php

include_once '../lib/helpers.php';
include_once '../view/partials/head.php';

echo "<link rel='stylesheet' href='css/fondolist.css'>";

echo "<body>";
echo "<div class='container'>";
include_once '../view/partials/navbar.php';

if(isset($_GET['modulo'])){
    resolve();
}else{
    echo "<div class='mt-5'>";
    // Verificar el rol del usuario y mostrar un mensaje personalizado
    if (isset($_SESSION['rol'])) {
        if ($_SESSION['rol'] == '1') {
            echo "<h1 class='display-4'>Bienvenida al rol Administrador" . ($_SESSION['nombre'] ?? '') . "</h1>";
        } elseif ($_SESSION['rol'] == '2') {
            echo "<h1 class='display-4'>Bienvenido al rol Optometra " . ($_SESSION['nombre'] ?? '') . "</h1>";
        } else {
            echo "<h1 class='display-4'>Bienvenido</h1>";
        }
    } else {
        echo "<h1 class='display-4'>Bienvenido</h1>";
    }
    echo "</div>";
}



if(!isset($_SESSION['id'])){
    session_destroy();
    redirect("login.php");
}


include_once '../view/partials/fooster.php';
echo "</div>";
echo "</body>";
echo "</html>";
?>
