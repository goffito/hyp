<?php
session_start();

// Redirige al usuario si no ha iniciado sesión
if (!isset($_SESSION['user_email'])) {
    header("Location: login.php"); // Asegúrate de que este enlace lleve a tu página de inicio de sesión
    exit;
}

if (isset($_SESSION['alerta'])) {
    $alerta = $_SESSION['alerta'];
    echo "<script type='text/javascript'>alert('$alerta');</script>";
    unset($_SESSION['alerta']); // Limpia la alerta después de mostrarla para no repetirla en la recarga de la página
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciberseguridad Educativa</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        header,
        footer {
            background-color: #005A9C;
            color: white;
            text-align: center;
            padding: 1em 0;
        }

        nav {
            display: flex;
            justify-content: center;
            background-color: #007BFF;
        }

        nav a {
            padding: 14px 20px;
            text-decoration: none;
            color: white;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #0056b3;
        }

        .carousel {
            width: auto;
            margin: 20px auto;
            /* Aquí puedes añadir estilos para el carrusel */
        }

        .news-section,
        .mission-vision {
            margin: 20px auto;
            width: 45%;
            text-align: center;
        }

        .founders {
            display: flex;
            justify-content: center;
            gap: 80px;
            margin: 100px auto;
        }

        .founder {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
        }

        .founder img {
            width: 100%;
            height: auto;
        }

        footer {
            display: flex;
            justify-content: space-around;
            padding: 20px 0;
        }

        @media screen and (max-width: 768px) {
            nav {
                flex-direction: column;
            }

            nav a {
                text-align: center;
                padding: 10px;
            }
        }

        @media screen and (max-width: 480px) {

            header h1,
            footer {
                font-size: 18px;
            }
        }


        .carousel-container {
            width: auto;
            position: absolute;
            /* Ajusta al ancho del contenedor principal */
            margin: auto;
            position: relative;
        }

        .carousel-button {
            top: 50%;
            transform: translateY(-50%);
            background-color: #003366;
            /* Azul oscuro */
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        #scrollLeft {
            left: 0;
        }

        #scrollRight {
            right: 0;
        }

        .carousel-container {
            position: relative;
            width: auto;
            margin: auto;
            z-index: 0;
        }

        .carousel-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: #003366;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            z-index: 1;
        }

        .carousel {

            display: flex;
            overflow: hidden;
            justify-content: center;
            align-items: center;
            height: 300px;
            width: 100%;
            margin: auto;
            transition: transform 1s ease;
        }

        .carousel-item {
            flex: 0 0 auto;
            position: absolute;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            /* Añade esta línea para centrar verticalmente */
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .carousel-item img {
            max-width: 250px;
            height: auto;
            margin-bottom: 10px;
            display: block;
            /* Añade esta línea */
            margin: 0 auto;
            /* Añade esta línea para centrar horizontalmente */
        }

        .carousel-item.active {
            opacity: 1;
        }

        /* Resto de tus estilos aquí */


        .misi {
            text-align: justify;
        }
    </style>
</head>

<body>
    <header>
        <h1>CIBERSEGURIDAD EDUCATIVA</h1>
    </header>
    <nav>
        <a href="#">Inicio</a>
        <a href="cursos.php">Cursos</a>
        <a href="#">Blog</a>
        <a href="#">Recursos</a>
        <a href="#">Contacto</a>
        <a href="login.php">Iniciar Sesion</a>
        <a href="registrar.php">Registrar</a>
    </nav>




    <div class="carousel-container">
        <button id="scrollLeft" class="carousel-button">←</button>
        <div class="carousel">
            <div class="carousel-item">
                <img src="img/wireshark.png" alt="Curso de Wireshark">
            </div>
            <div class="carousel-item">
                <img src="img/python.png" alt="Curso de Python">
            </div>
            <div class="carousel-item">
                <img src="img/security.png" alt="Curso de Seguridad">
            </div>
            <!-- Elementos del carrusel aquí -->
        </div>
        <button id="scrollRight" class="carousel-button">→</button>
    </div>




    <div class="news-section">
        <h2>Últimas Noticias</h2>
        <!-- Aquí van las noticias o actualizaciones -->
    </div>

    <div class="mission-vision">
        <h2>Misión</h2>
        <p class="misi">HyperProtectMax se dedica a brindar acceso igualitario a una educación en línea
            segura y de alta calidad, empoderando a los estudiantes para alcanzar sus metas
            académicas y profesionales mediante una plataforma innovadora.</p>
        <h2>Visión</h2>
        <p class="misi">HyperProtectMax busca democratizar la educación de calidad a través
            de una plataforma líder en línea, inspirando a estudiantes y promoviendo la seguridad
            en línea, con un compromiso firme con la innovación y la excelencia educativa para
            empoderar a las generaciones futuras.</p>
    </div>

    <div class="founders">
        <div class="founder"><img src="img/perla.jpg" alt="Socio 1"></div>
        <div class="founder"><img src="img/miguel.jpg" alt="Socio 2"></div>
        <div class="founder"><img src="img/pat.png" alt="Socio 3"></div>
    </div>

    <footer>
        <div>
            Síguenos en las redes sociales:
            <a href="https://www.facebook.com/TuPaginaDeFacebook" target="_blank">Facebook</a>,
            <a href="https://www.instagram.com/TuUsuarioDeInstagram" target="_blank">Instagram</a>,
            <a href="https://twitter.com/TuUsuarioDeTwitter" target="_blank">Twitter</a>
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let currentIndex = 0;
            const items = document.querySelectorAll('.carousel-item');
            const itemCount = items.length;

            // Función para actualizar el carrusel
            function updateCarousel() {
                items.forEach((item, index) => {
                    item.classList.remove('active');
                });
                items[currentIndex].classList.add('active');
            }

            // Agregar la clase 'active' al primer elemento al cargar la página
            items[currentIndex].classList.add('active');

            // Evento para el botón 'scrollRight'
            document.getElementById('scrollRight').addEventListener('click', function () {
                currentIndex = (currentIndex + 1) % itemCount;
                updateCarousel();
            });

            // Evento para el botón 'scrollLeft'
            document.getElementById('scrollLeft').addEventListener('click', function () {
                currentIndex = (currentIndex - 1 + itemCount) % itemCount;
                updateCarousel();
            });
        });

    </script>


</body>

</html>