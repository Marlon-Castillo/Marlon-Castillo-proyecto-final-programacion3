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
    background: linear-gradient(to right, #ff7e5f, #feb47b);
    text-align: center;
}

.contenedor {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.card {
    background: white;
    padding: 20px;
    margin: 10px;
    width: 220px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}

.card h3 {
    color: #007BFF;
}

.card:hover {
    transform: scale(1.05);
    transition: 0.3s;
}
</style>

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

echo "<div class='contenedor'>";

foreach ($query as $autor) {
    echo "
    <div class='card'>
        <h3>{$autor['nombre']} {$autor['apellido']}</h3>
        <p><strong>Ciudad:</strong> {$autor['ciudad']}</p>
    </div>
    ";
}

echo "</div>";

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