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
<meta charset="UTF-8">
<title>Libros</title>

<style>
body {
    font-family: Arial;
    background: linear-gradient(to right, #36d1dc, #5b86e5);
    text-align: center;
}

h2 {
    color: white;
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
    width: 250px;
    border-radius: 10px;
    transition: 0.3s;
}

.card:hover {
    transform: scale(1.05);
}

input {
    padding: 10px;
    width: 250px;
    border-radius: 5px;
    border: none;
}

button {
    padding: 10px;
    border: none;
    background: #007BFF;
    color: white;
    border-radius: 5px;
}

button:hover {
    background: #0056b3;
}

.boton-volver {
    display: inline-block;
    margin: 20px;
    padding: 10px;
    background: white;
    color: #333;
    border-radius: 8px;
    text-decoration: none;
}
</style>

</head>
<body>

<h2>Listado de Libros</h2>

<!-- BUSCADOR -->
<form method="GET">
    <input type="text" name="buscar" placeholder="Buscar libro...">
    <button type="submit">Buscar</button>
</form>

<br>

<div class="contenedor">

<?php
$buscar = isset($_GET['buscar']) ? $_GET['buscar'] : '';

if ($buscar != '') {
    $query = $conexion->query("
        SELECT * FROM titulos 
        WHERE titulo LIKE '%$buscar%' 
        OR tipo LIKE '%$buscar%'
    ");
} else {
    $query = $conexion->query("SELECT * FROM titulos");
}

foreach ($query as $libro) {
    echo "
    <div class='card'>
        <h3>{$libro['titulo']}</h3>
        <p><strong>ID:</strong> {$libro['id_titulo']}</p>
        <p><strong>Tipo:</strong> {$libro['tipo']}</p>
        <p><strong>Precio:</strong> {$libro['precio']}</p>
    </div>
    ";
}
?>

</div>

<br>
<a href="index.php" class="boton-volver">← Volver al inicio</a>

</body>
</html>