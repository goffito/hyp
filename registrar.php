<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #2c3e50;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .registro-container {
            background-color: #34495e;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .registro-form h2 {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
        }
        .registro-form input[type=text],
        .registro-form input[type=email],
        .registro-form input[type=tel],
        .registro-form input[type=password],
        .registro-form input[type=number],
        .registro-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: none;
        }
        .registro-form input[type=submit] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: none;
            background-color: #8e44ad;
            color: white;
            cursor: pointer;
        }
        .registro-form input[type=submit]:hover {
            background-color: #9b59b6;
        }
    </style>
</head>
<body>
    <div class="registro-container">
        <form id="registroForm" action="php/regi.php" method="post" class="registro-form">
            <h2>Registro</h2>
            <input type="text" name="nombre_completo" placeholder="Nombre Completo" required>
            <select name="ocupacion" required>
            <option value="">Seleccione su ocupación</option>
                <option value="estudiante">Estudiante</option>
                <option value="ingeniero">Ingeniero</option>
                <!-- Agrega el resto de las opciones aquí -->
                <option value="médico">médico</option>
                <option value="abogado">abogado</option>
                <option value="profesor">profesor</option>
                <option value="diseñador">diseñador</option>
                <option value="empresario">empresario</option>
                <option value="enfermero">enfermero</option>
                <option value="chef">chef</option>
                <option value="arquitecto">arquitecto</option>
                <option value="psicólogo">psicólogo</option>
                <option value="veterinario">veterinario</option>
                <option value="contador">contador</option>
                <option value="electricista">electricista</option>
                <option value="periodista">periodista</option>
                <option value="policía">policía</option>
                <option value="artista">artista</option>
                <option value="científico">científico</option>
                <option value="actor">actor</option>
                <option value="piloto">piloto</option>
                <option value="banquero">banquero</option>
                <option value="otro">Otro</option>
            </select>
            <input type="number" min='15' max='100' name="edad" placeholder="Edad" required>
            <select name="nacionalidad" type="text" name="nacionalidad" placeholder="Nacionalidad" required>
            <option value="">Seleccione su Nacionalidad</option>
                <option value="Estados Unidos">Estados Unidos</option>
                <option value="Canadá">Canadá</option>
                <option value="México">México</option>
                <option value="España">España</option>
                <option value="Argentina">Argentina</option>
                <option value="Brasil">Brasil</option>
                <option value="Alemania">Alemania</option>
                <option value="Francia">Francia</option>
                <option value="Italia">Italia</option>
                <option value="Japón">Japón</option>
                <option value="otro">Otro</option>
            </select>
            <select name="genero" required>
                <option value="">Seleccione su género</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
                <option value="otro">Otro</option>
            </select>
            <input type="email" name="correo_electronico" placeholder="Correo Electrónico" required>
            
            
            
            <!-- Número de teléfono -->
            <input type="tel" id="numeroTelefono" name="numero_telefono" placeholder="Número de Teléfono" pattern="\d{10}" title="El número de teléfono debe tener 10 dígitos" required>
            
            <select name="trabaja" required>
                <option value="">¿Trabaja actualmente?</option>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <input type="submit" value="Registrarse">
        </form>
    </div>

    <script>
        document.getElementById('registroForm').addEventListener('submit', function(event) {
            var numeroTelefono = document.getElementById('numeroTelefono').value;
            if (numeroTelefono.length !== 10) {
                alert('El número de teléfono debe tener 10 dígitos.');
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
