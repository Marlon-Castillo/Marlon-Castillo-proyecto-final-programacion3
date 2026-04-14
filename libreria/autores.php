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
<title>Autores</title>

<style>
body {
    font-family: Arial;
    background: linear-gradient(to right, #ff7e5f, #feb47b);
    text-align: center;
    margin: 0;
    padding: 0;
}

h2 {
    color: white;
    margin-top: 20px;
}

.contenedor {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 20px;
}

.card {
    background: white;
    padding: 20px;
    margin: 10px;
    width: 220px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    transition: 0.3s;
}

.card h3 {
    margin: 0;
}

.card a {
    text-decoration: none;
    color: #007BFF;
    font-weight: bold;
}

.card a:hover {
    color: #0056b3;
}

.card:hover {
    transform: scale(1.05);
}

.card p {
    margin-top: 10px;
    color: #555;
}

/*  BUSCADOR */
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
    padding: 10px 20px;
    background: white;
    color: #333;
    border-radius: 8px;
    text-decoration: none;
}

.boton-volver:hover {
    background: #ddd;
}
</style>

</head>
<body>

<h2>Listado de Autores</h2>

<!-- BUSCADOR -->
<form method="GET">
    <input type="text" name="buscar" placeholder="Buscar autor...">
    <button type="submit">Buscar</button>
</form>

<div class="contenedor">

<?php
$buscar = isset($_GET['buscar']) ? $_GET['buscar'] : '';

if ($buscar != '') {
    $query = $conexion->query("
        SELECT * FROM autores 
        WHERE nombre LIKE '%$buscar%' 
        OR apellido LIKE '%$buscar%' 
        OR ciudad LIKE '%$buscar%'
    ");
} else {
    $query = $conexion->query("SELECT * FROM autores");
}

foreach ($query as $autor) {
    echo "
    <div class='card'>
        <h3>
            <a href='libros_autor.php?id={$autor['id_autor']}'>
                {$autor['nombre']} {$autor['apellido']}
            </a>
        </h3>
        <p><strong>Ciudad:</strong> {$autor['ciudad']}</p>
    </div>
    ";
}
?>

</div>

<br>
<a href="index.php" class="boton-volver">← Volver al inicio</a>

</body>
</html>