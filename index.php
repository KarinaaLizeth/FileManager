<?php
require_once "login_helper.php";
require "config.php";
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['usuario'];
$esAdmin = $usuario['esAdmin'];

function listarArchivos($esAdmin, $usuario) {
    $archivos = scandir(DIR_UPLOAD);
    $archivos = array_diff($archivos, array('.', '..'));
    ob_start();
    include 'index.html';
    $output = ob_get_clean();
    return $output;
}

echo listarArchivos($esAdmin, $usuario);
?>
