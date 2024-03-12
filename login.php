<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>HyperProtectMax</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> <!-- Fuente de Google Fonts -->
<style>
   body {
    font-family: 'Roboto', sans-serif;
    background: #0f0c29; /* Darker gradient color */
    background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29); /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #24243e, #302b63, #0f0c29); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color: #fff;
    text-align: center;
    overflow: hidden;
}

.main-container {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    height: 100vh;
    padding: 0 10px;
}

.gif-container,
.form-container,
.text-container {
    background-color: #131313d9; /* Semi-transparent background */
    border-radius: 8px;
    margin: 0 15px;
    padding: 40px;
    box-shadow: 0 0 15px 0 rgba(0, 255, 255, 0.6); /* Neon glow effect */
    transition: all 0.3s ease;
}

.form-container {
    width: 25%;
}

.form-container h2 {
    color: #0abdc6; /* Neon text color */
    text-shadow: 0 0 15px #0abdc6; /* Neon text glow */
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 15px;
    margin: 10px 0;
    border: 1px solid #0abdc6; /* Neon border color */
    border-radius: 4px;
    background: transparent;
    color: #fff;
    transition: all 0.3s ease;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus {
    box-shadow: 0 0 15px 0 rgba(0, 255, 255, 0.6); /* Neon glow on focus */
}

.button-container button {
    width: 100%;
    padding: 15px;
    margin-top: 10px;
    border: none;
    border-radius: 4px;
    background-color: #0abdc6; /* Neon button color */
    box-shadow: 0 0 15px 0 rgba(0, 255, 255, 0.6); /* Neon button glow */
    transition: all 0.3s ease;
}

.button-container button:hover {
    background-color: #08a0a6; /* Neon button hover color */
    box-shadow: 0 0 20px 0 rgba(0, 255, 255, 0.9); /* Neon button hover glow */
    cursor: pointer;
}

.logo {
    width: 80px;
    margin-bottom: 20px;
}

.text-container {
    width: 25%;
}

@media screen and (max-width: 768px) {
    .main-container {
        flex-direction: column;
    }
    .gif-container,
    .form-container,
    .text-container {
        width: 80%;
        margin: 15px 0;
    }
}

@keyframes moveBackground{
  0%{
    background-position: 0% 50%;
  }
  50%{
    background-position: 100% 50%;
  }
  100%{
    background-position: 0% 50%;
  }
}

body {
    /*... tus estilos ...*/
    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
    background-size: 400% 400%;
    animation: moveBackground 15s ease infinite;
}

/* Resto de tus estilos... */

/* Para darle un toque cibernético a los elementos de texto y botones, considera agregar efectos como brillo o parpadeo: */
@keyframes neonFlicker {
  0% { text-shadow: 0 0 5px #0abdc6, 0 0 10px #0abdc6, 0 0 15px #0abdc6, 0 0 20px #0abdc6, 0 0 30px #0abdc6, 0 0 40px #0abdc6, 0 0 55px #0abdc6, 0 0 75px #0abdc6; }
  5% { text-shadow: 0 0 2px #0abdc6, 0 0 4px #0abdc6, 0 0 6px #0abdc6, 0 0 8px #0abdc6, 0 0 10px #0abdc6, 0 0 15px #0abdc6, 0 0 20px #0abdc6, 0 0 25px #0abdc6; }
  100% { text-shadow: 0 0 5px #0abdc6, 0 0 10px #0abdc6, 0 0 15px #0abdc6, 0 0 20px #0abdc6, 0 0 30px #0abdc6, 0 0 40px #0abdc6, 0 0 55px #0abdc6, 0 0 75px #0abdc6; }
}

/* Aplica la animación a los títulos o textos importantes */
h1, h2, .important-text {
  animation: neonFlicker 1.5s infinite alternate;
}

/* Puedes aplicar el efecto de parpadeo a los botones también */
button {
  /* ... tus estilos de botón ... */
  animation: neonFlicker 1.5s infinite alternate;
}

</style>
</head>
<body>

<div class="main-container">
    <!-- Contenedor para el GIF -->
    <div class="gif-container">
        <img src="./img/sec3.gif" alt="GIF animado"> <!-- Cambiar por la ruta correcta de tu GIF -->
    </div>
    
    <!-- Contenedor para el formulario -->
    <div class="form-container">
        <img src="img/hpmax.png" alt="Logo" class="logo"> <!-- Asegúrate de reemplazar hpmax.png con la ruta real al archivo de imagen -->
        <h2>Iniciar sesión</h2>
        <form id="loginForm" action="php/session.php" method="post">
            <input type="text" id="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <div class="button-container">
                <button type="submit" name="login">Ingresar</button>
            </div>
        </form>
    </div>

    <!-- Contenedor para el texto -->
    <div class="text-container">
        <p>Texto con una fuente profesional. Puedes modificar este texto para que contenga la información que desees presentar aquí.</p>
    </div>
</div>

<script>
document.getElementById('loginForm').addEventListener('submit', function(event) {
    var emailInput = document.getElementById('email');
    var emailValue = emailInput.value;
    // Expresión regular que incluye caracteres Unicode para nombres de usuario de correo electrónico
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(emailValue)) {
        alert('Por favor, introduce una dirección de correo electrónico válida.');
        event.preventDefault(); // Previene la acción por defecto
    }
});
</script>

</body>
</html>
