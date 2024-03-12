<?php
require 'php/conectdb.php';
session_start();

// Redirige al usuario si no ha iniciado sesión
if (!isset($_SESSION['user_email'])) {
    echo '<script type="text/javascript">';
    echo 'alert("Inicia sesión para ver el contenido");';
    echo 'window.location.href="login.php";'; // Reemplaza con la URL a la que deseas redirigir
    echo '</script>';
    exit;
}
if (isset($_SESSION['allname'])) {
    $alerta = $_SESSION['allname'];
    echo "<script type='text/javascript'>
            alert('Bienvenido: " . $alerta . "');
          </script>";
    unset($_SESSION['allname']); // Limpia la alerta después de mostrarla para no repetirla en la recarga de la página
}
?>
<!-- El resto del código HTML sigue aquí -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos de Ciberseguridad</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        h1 {
            margin: 0;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .card {
            flex-basis: calc(33.33% - 20px);
            margin-bottom: 20px;
            border-radius: 10px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            cursor: pointer;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            font-size: 1.2em;
        }
        .card-body {
            padding: 20px;
            background-color: #f4f4f4;
        }
        .card-body p {
            margin: 0;
            color: #333;
        }
        .card-footer {
            padding: 20px;
            background-color: #333;
            text-align: right;
        }
        .card-footer a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
        .dashboard-icon {
            cursor: pointer;
            font-size: 24px;
            padding: 10px;
            position: fixed;
            left: 0;
            top: 50%;
            background-color: #333;
            color: #fff;
            z-index: 2;
            transition: transform 0.3s;
        }
        .dashboard {
            position: fixed;
            left: -300px;
            top: 0;
            height: 100%;
            width: 300px;
            background-color: #333;
            padding: 20px;
            box-shadow: 2px 0px 5px rgba(0, 0, 0, 0.2);
            z-index: 1;
            transition: left 0.3s;
        }
        .dashboard.active {
            left: 0;
        }
        .dashboard ul {
            list-style: none;
            padding: 0;
        }
        .dashboard ul li {
            padding: 10px;
        }
        .dashboard ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }
        @media (max-width: 768px) {
            .card {
                flex-basis: 100%;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="dashboard-icon" onclick="toggleDashboard()">&#9776;</div>
        <h1>Cursos de Ciberseguridad Docentes</h1>
    </header>    
    <div class="container">
        <!-- Cursos de Python -->
        <div class="card">
            <div class="card-header">Python para Ciberseguridad</div>
            <div class="card-body">
                <p>Utiliza Python para crear herramientas de seguridad ofensiva y defensiva.</p>
            </div>
            <div class="card-footer">
                <a href="python-sec.php">Ir al curso →</a>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">Automatización con Python</div>
            <div class="card-body">
                <p>Automatiza la recolección de datos y análisis de vulnerabilidades con Python.</p>
            </div>
            <div class="card-footer">
                <a href="#">Ir al curso →</a>
            </div>
        </div>

        <!-- Curso de Wireshark -->
        <div class="card">
            <div class="card-header">Análisis de Red con Wireshark</div>
            <div class="card-body">
                <p>Domina Wireshark y conviértete en un experto en el análisis de protocolos y tráfico de red.</p>
            </div>
            <div class="card-footer">
                <a href="#">Ir al curso →</a>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">Python para Ciberseguridad</div>
            <div class="card-body">
                <p>Utiliza Python para crear herramientas de seguridad ofensiva y defensiva.</p>
            </div>
            <div class="card-footer">
                <a href="#">Ir al curso →</a>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">Automatización con Python</div>
            <div class="card-body">
                <p>Automatiza la recolección de datos y análisis de vulnerabilidades con Python.</p>
            </div>
            <div class="card-footer">
                <a href="#">Ir al curso →</a>
            </div>
        </div>

        <!-- Curso de Wireshark -->
        <div class="card">
            <div class="card-header">Análisis de Red con Wireshark</div>
            <div class="card-body">
                <p>Domina Wireshark y conviértete en un experto en el análisis de protocolos y tráfico de red.</p>
            </div>
            <div class="card-footer">
                <a href="#">Ir al curso →</a>
            </div>
        </div>
        <!-- Otros cursos de ciberseguridad -->
        <!-- Se repiten estructuras similares para cada tarjeta de curso -->
        <!-- Asegúrate de cambiar los títulos, descripciones y enlaces para cada curso específico. -->

        <!-- ... (Agrega aquí el resto de las tarjetas para completar las 10 tarjetas) ... -->
        
    </div>
    
    <div class="dashboard" id="dashboard">
        <ul>
            <li><a href="principal.php">Inicio</a></li>
            <li><a href="#">Perfil</a></li>
            <li><a href="cursos.php">Cursos</a></li>
            <li><a href="\hyprmx\content\reports/cursos_prof.php">Cursos impartidos</a></li>
            <li><a href="#">Mis Cursos</a></li>
            <li><a href="php/logout.php">Cerrar Sesión</a></li>
        </ul>
    </div>
    
    <script>
        // Script para el funcionamiento del dashboard
        function toggleDashboard() {
            const dashboard = document.getElementById("dashboard");
            dashboard.classList.toggle("active");
        }
    </script>
</body>
</html>
