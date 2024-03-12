<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Página de Información</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            line-height: 1.6;
        }

        h1 {
            color: white;
            background-color: #003366;
            padding: 10px;
            text-align: center;
        }

        p {
            background-color: #fff;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        button {
            background-color: #003366;
            /* Blue */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: block;
            /* Cambiado de inline-block a block para poder aplicar márgenes automáticos */
            font-size: 16px;
            margin: 4px auto;
            /* Auto aplicará un margen automático en los lados izquierdo y derecho, centrando el elemento */
            cursor: pointer;
            border-radius: 5px;
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
    <h1>Automatización en Python</h1>
    <p>Python es una herramienta esencial en el mundo de la ciberseguridad, conocida por su capacidad para automatizar
        la recopilación de datos y el análisis de vulnerabilidades. Este lenguaje de programación, por su simplicidad y
        poder, permite a los profesionales de la seguridad informática ejecutar tareas complejas con scripts rápidos y
        eficientes. La automatización que Python facilita se extiende a una variedad de aplicaciones, desde pruebas de
        penetración hasta la gestión de incidentes de seguridad.</p>
    <p>La naturaleza interpretada de Python hace que sea ideal para entornos de seguridad heterogéneos y su
        compatibilidad con múltiples sistemas y plataformas amplía su utilidad. Los expertos en seguridad pueden
        aprovechar la extensa biblioteca de módulos de Python y la comunidad activa para desarrollar y compartir
        herramientas especializadas, mejorando así la capacidad de respuesta ante amenazas cibernéticas.</p>
    <!-- Agrega más párrafos según necesites -->
    <p>Incorporar Python en la ciberseguridad también significa poder contar con soluciones personalizadas. Los
        profesionales pueden integrar Python con otras herramientas y sistemas existentes para crear un ecosistema de
        seguridad robusto y adaptativo. Con cursos enfocados en la automatización con Python, los interesados pueden
        aprender a maximizar las capacidades de este lenguaje para mejorar la postura de seguridad de sus
        organizaciones..</p>

    <!-- Botón para ir a la página del video -->
    <button onclick="location.href='video/python-auto-vid.php'">Ver Video</button>
</body>

</html>