<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto</title>
</head>
<style>
body {
    font-family: Arial;
    background: linear-gradient(to right, #43cea2, #185a9d);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.form-box {
    background: white;
    padding: 30px;
    border-radius: 10px;
    width: 320px;
    box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
    text-align: center;
}

input, textarea {
    width: 90%;
    padding: 10px;
    margin: 10px 0;
}

button {
    padding: 10px;
    width: 100%;
    background-color: #28a745;
    color: white;
    border: none;
}

button:hover {
    background-color: #1e7e34;
}
</style>
<script>
function validarFormulario() {
    let nombre = document.forms["form"]["nombre"].value;

    if (nombre === "") {
        alert("El nombre es obligatorio");
        return false;
    }
}
</script>
<body>

<div class="form-box">
<h2>Formulario de Contacto</h2>

<form name="form" action="guardar_contacto.php" method="POST" onsubmit="return validarFormulario()">
    <input type="text" name="nombre" placeholder="Nombre" required><br><br>
    <input type="email" name="correo" placeholder="Correo" required><br><br>
    <input type="text" name="asunto" placeholder="Asunto"><br><br>
    <textarea name="comentario" placeholder="Comentario"></textarea><br><br>
    <button type="submit">Enviar</button>
</form>

<br>
<a href="index.php" class="boton-volver">← Volver al inicio</a>

</body>
</html>
</div>