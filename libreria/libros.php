<?php include("config/conexion.php"); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libros</title>
</head>
<body>

<h2>Listado de Libros</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Tipo</th>
        <th>Precio</th>
    </tr>

<?php
$query = $conexion->query("SELECT * FROM titulos");

foreach ($query as $libro) {
    echo "<tr>
        <td>{$libro['id_titulo']}</td>
        <td>{$libro['titulo']}</td>
        <td>{$libro['tipo']}</td>
        <td>{$libro['precio']}</td>
    </tr>";
}
?>

</table>

</body>
</html>