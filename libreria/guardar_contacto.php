<?php
include("config/conexion.php");

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$asunto = $_POST['asunto'];
$comentario = $_POST['comentario'];

$sql = "INSERT INTO contacto (correo, nombre, asunto, comentario)
        VALUES (:correo, :nombre, :asunto, :comentario)";

$stmt = $conexion->prepare($sql);

$stmt->bindParam(':correo', $correo);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':asunto', $asunto);
$stmt->bindParam(':comentario', $comentario);

$stmt->execute();

echo "Mensaje guardado correctamente";
?>