<?php
require 'php/conectdb.php';
session_start();
// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);



// Asegúrate de que el usuario está logueado
if (isset($_SESSION['user_email']) && isset($_SESSION['token_sesion'])) {
    $stmt = $conn->prepare("SELECT token_sesion FROM usuarios WHERE CorreoElectronico = ?");
    $stmt->bind_param("s", $_SESSION['user_email']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($_SESSION['token_sesion'] != $user['token_sesion']) {
        // Si no coinciden, cierra la sesión actual y redirige al login
        session_destroy();
        header("Location: login.php");
        exit;
    }
    // Si coinciden, el usuario puede continuar con la sesión actual
} else {
    // El usuario no está logueado, redirigir al login
    header("Location: login.php");
    exit;
}

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



// Asegúrate de que el usuario está logueado
if (!isset($_SESSION['UsuarioID'])) {
    // El usuario no está logueado, redirigir al login
    header("Location: login.php");
    exit;
}

// ID del usuario logueado
$usuarioID = $_SESSION['UsuarioID'];

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Consulta para obtener los cursos inscritos por el usuario
$sql = "SELECT c.CursoID, c.TituloCurso, c.Descripcion
        FROM matriculas m
        JOIN cursos c ON m.CursoID = c.CursoID
        WHERE m.AlumnoID = ?
        ORDER BY c.TituloCurso";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuarioID);
$stmt->execute();
$result = $stmt->get_result();
$cursosInscritos = $result->fetch_all(MYSQLI_ASSOC);

$stmt->close();
$conn->close();
?>


?>
<!-- El resto del código HTML sigue aquí -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos de Ciberseguridad Estudiante</title>
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

        /* Estilo para la animación de carga */
        #loader {
            display: none;
            /* Oculto por defecto */
            position: fixed;
            /* Fijo en la pantalla */
            z-index: 999;
            /* Encima de todo */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            justify-content: center;
            align-items: center;
        }

        /* La animación de carga */
        .spinner {
            border: 4px solid rgba(0, 0, 0, .1);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border-left-color: #09f;
            animation: spin 1s ease infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="dashboard-icon" onclick="toggleDashboard()">&#9776;</div>
        <h1>Cursos de Ciberseguridad</h1>
    </header>
    <!-- Div para la animación de carga -->
    <div id="loader" class="flex-center">
        <div class="spinner"></div>
    </div>
    <div class="container">
        <?php foreach ($cursosInscritos as $curso): ?>
            <div class="card">
                <div class="card-header"><?php echo htmlspecialchars($curso['TituloCurso']); ?></div>
                <div class="card-body">
                    <p><?php echo htmlspecialchars($curso['Descripcion']); ?></p>
                </div>
                <div class="card-footer">
                    <a href="curso.php?id=<?php echo $curso['CursoID']; ?>">Ir al curso →</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="dashboard" id="dashboard">
        <ul>
            <li><a href="principal.php">Inicio</a></li>
            <li><a href="\hyprmx\content\reports/cursos_alm.php">Mi progreso</a></li>
            <li><a href="#">Mis Cursos</a></li>
            <li><a href="\hyprmx\content/carrito/pru.php">Cursos</a></li>
            <li><a href="php/logout.php">Cerrar Sesión</a></li>
        </ul>
    </div>

    <script>
        // Función para mostrar la animación de carga y redirigir
        function loadCourse(url) {
            document.getElementById('loader').style.display = 'flex'; // Muestra la animación de carga
            setTimeout(function () {
                window.location.href = url; // Redirige a la URL del curso
            }, 1000); // Retraso de 1 segundo para que la animación sea visible
        }
        // Script para el funcionamiento del dashboard
        function toggleDashboard() {
            const dashboard = document.getElementById("dashboard");
            dashboard.classList.toggle("active");
        }
    </script>
</body>

</html>