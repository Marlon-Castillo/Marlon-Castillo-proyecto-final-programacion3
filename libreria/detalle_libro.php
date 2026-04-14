<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
}

include("config/conexion.php");

$id = $_GET['id'];

$query = $conexion->query("SELECT * FROM titulos WHERE id_titulo = '$id'");
$libro = $query->fetch();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Detalle del Libro</title>

<style>
body {
    font-family: Arial;
    background: linear-gradient(to right, #8360c3, #2ebf91);
    text-align: center;
}

.card {
    background: white;
    padding: 30px;
    margin: 50px auto;
    width: 300px;
    border-radius: 10px;
}
</style>

</head>
<body>

<div class="card">
    <h2><?php echo $libro['titulo']; ?></h2>
    <p><strong>ID:</strong> <?php echo $libro['id_titulo']; ?></p>
    <p><strong>Tipo:</strong> <?php echo $libro['tipo']; ?></p>
    <p><strong>Precio:</strong> <?php echo $libro['precio']; ?></p>
</div>

<br>
<a href="libros.php" style="color:white;">← Volver</a>

</body>
</html>