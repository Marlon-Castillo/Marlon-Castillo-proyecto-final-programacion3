<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include("config/conexion.php");

$id_autor = $_GET['id'];

// Obtener datos del autor
$autor = $conexion->query("
    SELECT * FROM autores WHERE id_autor = '$id_autor'
")->fetch();

// Obtener libros del autor
$query = $conexion->query("
    SELECT t.*
    FROM titulos t
    INNER JOIN titulo_autor ta ON t.id_titulo = ta.id_titulo
    WHERE ta.id_autor = '$id_autor'
");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Libros del Autor</title>

<style>
body {
    font-family: Arial;
    background: linear-gradient(to right, #36d1dc, #5b86e5);
    text-align: center;
}

.card {
    background: white;
    padding: 20px;
    margin: 10px auto;
    width: 300px;
    border-radius: 10px;
}

h2 {
    color: white;
}
</style>

</head>
<body>

<h2>
Libros de <?php echo $autor['nombre'] . " " . $autor['apellido']; ?>
</h2>

<?php
foreach ($query as $libro) {
    echo "
    <div class='card'>
        <h3>{$libro['titulo']}</h3>
        <p>Tipo: {$libro['tipo']}</p>
        <p>Precio: {$libro['precio']}</p>
    </div>
    ";
}
?>

<br><br>
<a href="autores.php" style="color:white;">← Volver</a>

</body>
</html>