<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <style>
    body {
        font-family: Arial;
        background: linear-gradient(to right, #4facfe, #00f2fe);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-box {
        background: white;
        padding: 30px;
        border-radius: 10px;
        width: 300px;
        box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
        text-align: center;
    }

    input {
        width: 90%;
        padding: 10px;
        margin: 10px 0;
    }

    button {
        padding: 10px;
        width: 100%;
        background-color: #007BFF;
        color: white;
        border: none;
    }

    button:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body>

<div class="login-box">

<h2>Iniciar Sesión</h2>

<form action="validar.php" method="POST">
    <input type="text" name="usuario" placeholder="Usuario"><br><br>
    <input type="password" name="clave" placeholder="Contraseña"><br><br>
    <button type="submit"> Ingresar</button>
</form>

<?php
if (isset($_GET['error'])) {
    echo "<p style='color:red;'>Usuario o contraseña incorrectos</p>";
}
?>

</div>

</body>
</html>