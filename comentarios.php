<?php
// Conectarse a la base de datos
require './php/conectdb.php';

$comentariosPorPagina = 20;
$paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$cursoSeleccionado = isset($_GET['curso']) ? $_GET['curso'] : '';

// Consultar la lista de cursos para el filtro
$cursos = $conn->query("SELECT CursoID, TituloCurso FROM cursos")->fetch_all(MYSQLI_ASSOC);

// Determinar el total de comentarios
$condicionCurso = $cursoSeleccionado ? " WHERE co.CursoID = $cursoSeleccionado" : '';
$totalComentarios = $conn->query("SELECT COUNT(*) as conteo FROM comentarios co" . $condicionCurso)->fetch_assoc()['conteo'];
$totalPaginas = ceil($totalComentarios / $comentariosPorPagina);

// Asegurarse de que la página actual no es mayor que el número total de páginas
$paginaActual = max(1, min($paginaActual, $totalPaginas));
$inicio = ($paginaActual - 1) * $comentariosPorPagina;

// Consultar comentarios con paginación
$condicionCursoComentarios = $cursoSeleccionado ? " AND co.CursoID = $cursoSeleccionado" : '';
$comentarios = $conn->query("
    SELECT c.TituloCurso, co.TextoComentario, co.FechaPublicacion, u.NombreCompleto 
    FROM comentarios co
    JOIN cursos c ON co.CursoID = c.CursoID
    JOIN alumnos a ON co.AlumnoID = a.AlumnoID
    JOIN usuarios u ON a.UsuarioID = u.UsuarioID
    WHERE 1=1 $condicionCursoComentarios
    ORDER BY co.FechaPublicacion DESC
    LIMIT $inicio, $comentariosPorPagina
")->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comentarios de Cursos</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212;
            color: #ffffff;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        .curso-comentario {
            background-color: #333;
            padding: 20px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .curso-comentario h2 {
            color: #00b894;
        }
        .curso-comentario p {
            color: #ccc;
        }
        .paginacion {
            text-align: center;
            margin: 20px 0;
        }
        .paginacion a, .paginacion input[type=submit] {
            padding: 5px 10px;
            margin-right: 5px;
            background: none;
            border: 1px solid #00b894;
            color: #00b894;
            text-decoration: none;
            transition: all 0.3s;
        }
        .paginacion a:hover, .paginacion input[type=submit]:hover {
            background: #00b894;
            color: #fff;
        }
        .paginacion form {
            display: inline;
        }
    </style>
</head>
<body>

<div class="container">
    <form action="comentarios.php" method="get">
        <label for="curso">Filtrar por curso:</label>
        <select name="curso" id="curso">
            <option value="">Todos los cursos</option>
            <?php foreach ($cursos as $curso): ?>
                <option value="<?php echo $curso['CursoID']; ?>" <?php if ($cursoSeleccionado == $curso['CursoID']) echo 'selected'; ?>>
                    <?php echo $curso['TituloCurso']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Filtrar">
    </form>

    <?php if (count($comentarios) > 0): ?>
        <?php foreach ($comentarios as $comentario): ?>
            <div class="curso-comentario">
                <h2><?php echo htmlspecialchars($comentario['TituloCurso']); ?></h2>
                <p><?php echo htmlspecialchars($comentario['TextoComentario']); ?></p>
                <p>Publicado por: <?php echo htmlspecialchars($comentario['NombreCompleto']); ?> el <?php echo htmlspecialchars($comentario['FechaPublicacion']); ?></p>
            </div>
        <?php endforeach; ?>

        <div class="paginacion">
            <?php if ($paginaActual > 1): ?>
                <a href="?pagina=1&curso=<?php echo $cursoSeleccionado; ?>">Primera</a>
                <a href="?pagina=<?php echo $paginaActual - 1; ?>&curso=<?php echo $cursoSeleccionado; ?>">Anterior</a>
            <?php endif; ?>
            <form action="comentarios.php" method="get">
                <input type="number" name="pagina" min="1" max="<?php echo $totalPaginas; ?>" value="<?php echo $paginaActual; ?>" required>
                <input type="hidden" name="curso" value="<?php echo $cursoSeleccionado; ?>">
                <input type="submit" value="Ir a página">
            </form>
        <?php if ($paginaActual < $totalPaginas): ?>
            <a href="?pagina=<?php echo $paginaActual + 1; ?>&curso=<?php echo $cursoSeleccionado; ?>">Siguiente</a>
            <a href="?pagina=<?php echo $totalPaginas; ?>&curso=<?php echo $cursoSeleccionado; ?>">Última</a>
        <?php endif; ?>
    </div>
    <p>Página <?php echo $paginaActual; ?> de <?php echo $totalPaginas; ?></p>
<?php else: ?>
    <p>No hay comentarios para mostrar.</p>
<?php endif; ?>
</div>
</body>
</html>