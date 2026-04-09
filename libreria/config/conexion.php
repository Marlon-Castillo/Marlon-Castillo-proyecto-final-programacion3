<?php
try {
    $host = "sql212.infinityfree.com";
    $db   = "if0_41615119_dblibreria"; // tu BD
    $user = "if0_41615119";
    $pass = "aPnFoA23C6";
    
    $conexion = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conexión exitosa"; // puedes borrar o comentar
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>