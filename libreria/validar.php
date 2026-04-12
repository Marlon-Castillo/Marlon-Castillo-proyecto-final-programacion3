<?php
session_start();
include("config/conexion.php");

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND clave = :clave";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':usuario', $usuario);
$stmt->bindParam(':clave', $clave);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $_SESSION['usuario'] = $usuario;
    header("Location: index.php");
} else {
    header("Location: login.php?error=1");
}
?>