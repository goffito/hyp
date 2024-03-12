<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciberseguridad Educativa</title>
    <style>
        :root {
            --background-color: #F9F8F8;
            --headline-color: #222222;
        }

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

        /* Restablecer algunos estilos predeterminados del navegador */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Estilos globales */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #240b36, #c31432);
            /* Fondo con gradiente */
            color: #ffffff;
            overflow-x: hidden;
        }

        header {
            background-color: rgba(0, 0, 0, 0.5);
            /* Semi-transparente */
            color: white;
            text-align: center;
            padding: 1em 0;
        }

        nav {
            background: none;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1em 0;
        }

        nav a {
            padding: 0.5em 1em;
            text-decoration: none;
            color: white;
            background-color: rgba(255, 255, 255, 0.2);
            /* Botones semi-transparentes */
            margin: 0 10px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        nav a:hover {
            background-color: rgba(255, 255, 255, 0.4);
        }

        /* Estilos adicionales para el carrusel */
        .carousel-container {
            margin: 20px auto;
            position: relative;
            width: 100%;
            max-width: 600px;
            /* Ajusta esto al tamaño deseado */
            overflow: hidden;
        }

        .carousel-item {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transition: opacity 0.5s ease, visibility 0.5s ease;
            display: flex;
            justify-content: center;
            align-items: center;
            visibility: hidden;
            opacity: 0;
        }

        .carousel-item img {
            width: 100%;
            height: auto;
        }

        .carousel-item.active {
            visibility: visible;
            opacity: 1;
        }

        .carousel-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: #ff512f;
            /* Botones con color de acento */
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            z-index: 100;
            border-radius: 5px;
            font-size: 18px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            /* Sombra para los botones */
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .carousel-button:hover {
            background-color: #fc2f70;
            /* Cambio de color al pasar el ratón */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.5);
            /* Sombra más grande al pasar el ratón */
        }

        #scrollLeft {
            left: 10px;
        }

        #scrollRight {
            right: 10px;
        }

        /* ... otros estilos ... */

        /* Estilos para las secciones de noticias, misión y visión */
        .news-section,
        .mission-vision {
            background-color: #640D14;
            /* Fondo oscuro para la sección */
            color: #FFFFFF;
            /* Texto en color blanco */
            margin: 40px auto;
            /* Más margen para separar las secciones */
            padding: 20px;
            border-left: 5px solid #FFC107;
            /* Barra lateral para destacar */
            position: relative;
            /* Necesario para el pseudo-elemento */
            overflow: hidden;
            /* Asegúrate de que los hijos no desborden */
        }

        /* Estilos para los títulos de las secciones */
        .news-section h2,
        .mission-vision h2 {
            font-size: 2em;
            /* Tamaño más grande para los títulos */
            color: #FFC107;
            /* Color de acento para los títulos */
            position: relative;
            /* Necesario para el pseudo-elemento */
            margin-bottom: 15px;
            /* Espacio debajo del título */
        }

        /* Pseudo-elementos para efectos adicionales en los títulos */
        .news-section h2::after,
        .mission-vision h2::after {
            content: '';
            display: block;
            width: 50px;
            /* Ancho de la línea debajo del título */
            height: 2px;
            /* Altura de la línea */
            background-color: #FFC107;
            /* Color de la línea */
            position: absolute;
            bottom: -5px;
            /* Posición debajo del título */
            left: 0;
        }

        /* Estilos para el texto para mejorar la legibilidad */
        .mission-vision p {
            font-size: 1em;
            /* Tamaño del texto */
            line-height: 1.6;
            /* Espaciado de línea para mejor legibilidad */
            text-align: justify;
            /* Alineación del texto */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
            /* Sombra de texto para resaltar sobre el fondo */
        }

        /* ... otros estilos ... */


        /* circulo de cargaaaaaaaa    */
        #hackerLoader {
            font-family: 'Courier New', Courier, monospace;
            /* Fuente estilo terminal */
            color: #33ff33;
            /* Color verde brillante típico de las terminales */
            font-size: 20px;
            /* Ajusta el tamaño de la fuente según necesites */
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
            background-color: #000;
            /* Fondo negro */
            padding: 20px;
            border: 1px solid #33ff33;
            /* Borde verde para simular una vieja pantalla de terminal */
            text-align: center;
        }

        @keyframes blink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        #hackerLoader {
            animation: blink 1.5s linear infinite;
            /* Efecto parpadeante */
        }

        /* GLITCH */

        * {
            box-sizing: border-box;
        }

        /* body {
            font-family: 'Raleway', sans-serif;
            background: var(--background-color);
        } */

        header.header {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            transform: translateY(-50%);

            h1 {
                font-size: 8rem;
                color: var(--headline-color);
                text-align: center;
                margin-top: 0;
                text-transform: uppercase;
                font-weight: 900;
            }
        }

        .glitch-window {
            position: absolute;
            top: 0;
            left: -2px;
            width: 100%;
            color:var(--headline-color);
            text-shadow: 2px 0 var(--background-color), -1px 0 yellow, -2px 0 green;
            overflow: hidden;
            animation: crt-me 2500ms infinite linear alternate-reverse;
            background: red;
        }

        /* //Animation Keyframe */
        @keyframes crt-me {
            0% {
                clip: rect(31px, 9999px, 94px, 0)
            }

            10% {
                clip: rect(112px, 9999px, 76px, 0)
            }

            20% {
                clip: rect(85px, 9999px, 77px, 0)
            }

            30% {
                clip: rect(27px, 9999px, 97px, 0)
            }

            40% {
                clip: rect(64px, 9999px, 98px, 0)
            }

            50% {
                clip: rect(61px, 9999px, 85px, 0)
            }

            60% {
                clip: rect(99px, 9999px, 114px, 0)
            }

            70% {
                clip: rect(34px, 9999px, 115px, 0)
            }

            80% {
                clip: rect(98px, 9999px, 129px, 0)
            }

            90% {
                clip: rect(43px, 9999px, 96px, 0)
            }

            100% {
                clip: rect(82px, 9999px, 64px, 0)
            }

        }



        /* //Inspiration Button */
        .inspiration-button {
            font-family: Helvetica, sans-serif;
            position: fixed;
            display: inline-block;
            z-index: 100;
            bottom: 1rem;
            left: 50%;
            transform: translate(-50%, 0%);
            color: white;
            text-decoration: none;
            padding: 0.75rem 1rem;
            border-radius: 80px;
            background: linear-gradient(270deg, #1e80dc, #c61590);
            /* //From Instagram...thanks */
            transition: transform 250ms ease;

            &:hover,
            &:focus,
            &:active {
                transform: translate(-50%, -10%);

            }
        }

        /* circulo de cargaaaaaaaa    */

        -------
    </style>
</head>

<body>

    <div id="hackerLoader">
        Cargando...
    </div>


    <header>
        <h1 class="glitched">HYPER PROTECT MAX</h1>
    </header>
    <a class="inspiration-button" href="#" target="_blank">Inspiration</a>
    <nav>
        <a href="#">Inicio</a>
        <a href="/hyprmx/content/carrito/pru.php">Cursos</a>
        <a href="#">Blog</a>
        <a href="#">Recursos</a>
        <a href="#">Contacto</a>
        <a href="inicio.php">Iniciar Sesion</a>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                document.getElementById('hackerLoader').style.display = 'none';
            }, 1000); // Ajusta este tiempo si necesitas más o menos duración

            
        });


        /* cargaaaaaaaaaa */


        document.addEventListener('DOMContentLoaded', function() {
            let currentIndex = 0;
            const items = document.querySelectorAll('.carousel-item');
            const itemCount = items.length;

            // Función para actualizar el carrusel
            function updateCarousel() {
                items.forEach((item) => {
                    item.classList.remove('active');
                });
                items[currentIndex].classList.add('active');
            }

            // Inicializar el carrusel con la clase 'active'
            updateCarousel();

            // Función para avanzar al siguiente ítem del carrusel
            function nextItem() {
                currentIndex = (currentIndex + 1) % itemCount;
                updateCarousel();
            }

            // Establecer un intervalo para cambiar automáticamente las imágenes cada 1 segundo
            setInterval(nextItem, 2500); // 1000 milisegundos = 1 segundo

            // Eventos para los botones, si deseas que el usuario también pueda controlar manualmente el carrusel
            document.getElementById('scrollRight').addEventListener('click', function() {
                nextItem();
            });

            document.getElementById('scrollLeft').addEventListener('click', function() {
                currentIndex = (currentIndex - 1 + itemCount) % itemCount;
                updateCarousel();
            });
        });
    </script>


</body>

</html>