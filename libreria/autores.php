<?php include("config/conexion.php"); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Autores</title>
</head>
<body>

<h2>Listado de Autores</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Ciudad</th>
    </tr>

<?php
$query = $conexion->query("SELECT * FROM autores");

foreach ($query as $autor) {
    echo "<tr>
        <td>{$autor['id_autor']}</td>
        <td>{$autor['nombre']}</td>
        <td>{$autor['apellido']}</td>
        <td>{$autor['ciudad']}</td>
    </tr>";
}
?>

</table>

</body>
</html>