<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto</title>
</head>
<body>

<h2>Formulario de Contacto</h2>

<form action="guardar_contacto.php" method="POST">
    <input type="text" name="nombre" placeholder="Nombre" required><br><br>
    <input type="email" name="correo" placeholder="Correo" required><br><br>
    <input type="text" name="asunto" placeholder="Asunto"><br><br>
    <textarea name="comentario" placeholder="Comentario"></textarea><br><br>
    <button type="submit">Enviar</button>
</form>

</body>
</html>