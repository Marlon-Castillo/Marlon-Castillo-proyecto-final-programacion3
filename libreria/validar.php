<?php
session_start();

// Usuario y contraseña 
$usuario_correcto = "admin";
$clave_correcta = "1234";

// Datos del formulario
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

// Validación
if ($usuario == $usuario_correcto && $clave == $clave_correcta) {
    
    $_SESSION['usuario'] = $usuario;
    
    // Redirige al inicio
    header("Location: index.php");
    
} else {
    
    // Si falla, vuelve al login con error
    header("Location: login.php?error=1");
}

?>