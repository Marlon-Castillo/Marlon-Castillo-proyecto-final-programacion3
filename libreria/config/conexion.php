<?php
try {
    $host = "localhost";
$db = "dblibreria";
$user = "root";
$pass = "";
    
    $conexion = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conexión exitosa"; // puedes borrar o comentar
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>