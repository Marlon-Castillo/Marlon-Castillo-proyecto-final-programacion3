<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
}
?>
<?php include("config/conexion.php"); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <style>
body {
    font-family: Arial;
    background: linear-gradient(to right, #36d1dc, #5b86e5);
    text-align: center;
}

table {
    margin: auto;
    border-collapse: collapse;
    width: 70%;
    background: white;
}

th {
    background-color: #007BFF;
    color: white;
}

th, td {
    padding: 10px;
    border: 1px solid #ccc;
}
</style>
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