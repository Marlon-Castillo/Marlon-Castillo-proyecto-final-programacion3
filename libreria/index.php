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
    <title>Librería Online</title>

    <style>
    body {
        font-family: Arial;
        background: linear-gradient(to right, #667eea, #764ba2);
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        background: white;
        padding: 40px;
        border-radius: 15px;
        text-align: center;
        width: 350px;
        box-shadow: 0px 0px 20px rgba(0,0,0,0.2);
    }

    h1 {
        margin-bottom: 20px;
        color: #333;
    }

    ul {
        list-style: none;
        padding: 0;
    }

    li {
        margin: 15px 0;
    }

    a {
        display: block;
        padding: 12px;
        background-color: #007BFF;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-weight: bold;
    }

    a:hover {
        background-color: #0056b3;
    }

    .logout {
        margin-top: 20px;
        background-color: #dc3545;
    }

    .logout:hover {
        background-color: #a71d2a;
    }
    </style>
</head>

<body>

<div class="container">

<h1> Librería Online</h1>

<ul>
    <li><a href="libros.php">Ver Libros</a></li>
    <li><a href="autores.php">Ver Autores</a></li>
    <li><a href="contacto.php">Contacto</a></li>
</ul>

<a href="logout.php" class="logout">Cerrar sesión</a>

</div>

</body>
</html>