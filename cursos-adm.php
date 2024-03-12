<?php

// Crear conexión
require './php/conectdb.php';
session_start();

$conn = new mysqli($servername, $username, $password, $dbname);

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

// Consulta para obtener los cursos a los que el usuario no está inscrito
$stmt = $conn->prepare("SELECT c.CursoID, c.TituloCurso, c.Descripcion, c.Cost, c.Imagen
                        FROM cursos c
                        WHERE NOT EXISTS (
                            SELECT 1
                            FROM matriculas m
                            WHERE m.CursoID = c.CursoID AND m.AlumnoID = (
                                SELECT a.AlumnoID FROM alumnos a WHERE a.UsuarioID = ?
                            )
                        )");
$stmt->bind_param("i", $UsuarioID);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador</title>
    <style>

@keyframes gradientBG {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
} 

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            background-color: #f4f4f4;
            background: linear-gradient(270deg, #0f0c29, #302b63, #24243e);
  background-size: 600% 600%;
  animation: gradientBG 10s ease infinite;
  color: #fff;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #111; 
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
            display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); /* Cambio a un diseño de grilla */
  gap: 20px; /* Espacio entre tarjetas */
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
            background: #1c1c1e; /* Fondo oscuro para las tarjetas */
  border: 1px solid #444; /* Borde sutil */
  transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            transform: scale(1.05); /* Efecto de escala al pasar el ratón */
  box-shadow: 0 4px 20px rgba(0, 255, 255, 0.5);
        }

        .card-header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            font-size: 1.2em;
            background-color: #222; /* Fondo más oscuro para el encabezado de la tarjeta */
  color: #0abdc6; /* Color de acento cibernético */
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
            color: #0abdc6; 
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
            background-color: #0a192f; /* Color de fondo más oscuro para el icono del menú */
  color: #0abdc6; /* Color de acento para el icono */
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
            background-color: #0a192f; 
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
            color: #0abdc6; 
        }

        @media (max-width: 768px) {
            .card {
                flex-basis: 100%;
            }
        }

        .welcome-message {
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
            text-align: center;
            font-size: 1.5em;
            background-color: #0a192f; /* Fondo oscuro para el mensaje de bienvenida */
  color: #0abdc6; /* Color de acento para el texto */
            /* Ajusta el tamaño de la fuente como prefieras */


            /* cursooooooooooooooooooooooooos */
            
        }
    </style>
</head>

<body>
    <header>
        <div class="dashboard-icon" onclick="toggleDashboard()">&#9776;</div>
        <h1>Panel Administrador</h1>
    </header>


    <!-- <main>             ver los cursoooooooooooooooooooooos
        <section id="productos">
            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="producto" id="producto<?php echo $row['CursoID']; ?>">

                    <h2><?php echo $row['TituloCurso']; ?></h2>
                    <p><?php echo $row['Descripcion']; ?></p>
                    <p>$ <?php echo $row['Cost']; ?></p>
                   
                </div>
            <?php endwhile; ?>
        </section>
    </main> -->

    <div class="dashboard" id="dashboard">
        <ul>
            <?php if (isset($NombreCompleto)): ?>
            <?php if (isset($_SESSION['UsuarioID'])): ?>
            <div class="welcome-message">
                Bienvenido,
                <?php echo htmlspecialchars($_SESSION['NombreCompleto']); ?>
            </div>
            <?php endif; ?>

            <?php endif; ?>
            <li><a href="123.html">Inicio</a></li>
            <li><a href="#">Perfil</a></li>
            <li><a href="/hyprmx/content/carrito/pru.php">Cursos</a></li>
            <li><a href="#">Mis Cursos</a></li>
            <li><a href="crud/crud_usuarios.php">CRUD Usuarios</a></li>
            <li><a href="crud/crud_cursos.php">CRUD Cursos</a></li>
            <li><a href="reports/topalum50.php">Reportes generales</a></li>
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
    <?php if (isset($_GET['pago']) && $_GET['pago'] == 'exitoso'): ?>
    <script>
        
        window.onload = function() {
        // Muestra un alerta preguntando si el usuario quiere imprimir la factura
        var imprimirFactura = confirm("¿Deseas imprimir la factura ahora?");
        if (imprimirFactura) {
            // Si el usuario hace clic en "Aceptar", redirige a fact.php
            window.location.href = '../content/carrito/fact.php';
        }
    };
    </script>
    <?php endif; ?>
</body>

</html>