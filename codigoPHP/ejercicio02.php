<?php
/**
 * @author Ismael Ferreras García
 * Mejorado por @author Carlos García Cachón
 * @version 1.2
 * @since 27/11/2023
 */
// Configuración de conexión con la base de datos
require_once '../config/confDB.php';

try {
    // Establecemos la conexión por medio de PDO
    $miDB = new PDO(DSN, USERNAME, PASSWORD);
    echo ("<div class='fs-4 text'>CONEXIÓN EXITOSA POR PDO<br><br></div");

    if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
        header('WWW-Authenticate: Basic realm="Acceso restringido"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Se requieren credenciales para acceder a esta página.';
        //Le damos la opcion al usuario de volver al home mediante este enlace
        echo("<button><a href='http://daw214.isauces.local/214DWESProyectoTema5/indexProyectoTema5.html'>Volver al home</a></button>");
        exit();
    }

    $usuario = $_SERVER['PHP_AUTH_USER']; // Guardamos el nombre de usuario recibido por '$_SERVER'
    $contrasena = $_SERVER['PHP_AUTH_PW']; // Guardamos la contraseña del usuario recibido por '$_SERVER'
    $hashContrasena = hash('sha256', $usuario . $contrasena); // Guardamos la contraseña codificada

    $sql = "SELECT * FROM T01_Usuario WHERE T01_CodUsuario = ? AND T01_Password = ?"; // Creamos la consulta a la BD 
    $stmt = $miDB->prepare($sql); // Preparamos la consulta la ejecutamos
    $stmt->execute([$usuario, $hashContrasena]);

    $result = $stmt->fetch(PDO::FETCH_OBJ); // Lo que devuelve la consulta, lo pasamos a un objeto

    if ($result) { // Si no a fallado la consulta mostramos el siguiente mensaje juntos con la decripcion del usuario que se a 'logeado'
        $nombre_usuario = $result->T01_DescUsuario;
        echo ("<div class='fs-4 text'>Credenciales correctas<br><br>Bienvenido, $nombre_usuario!</div>");
    } else {
        header('HTTP/1.1 401 Unauthorized'); // Mensaje de error
        echo 'Credenciales incorrectas. Acceso denegado.';
        //Le damos la opcion al usuario de volver al home mediante este enlace
        echo("<button><a href='http://daw214.isauces.local/214DWESProyectoTema5/indexProyectoTema5.html'>Volver al home</a></button>");
        exit();
    }
} catch (PDOException $miExcepcionPDO) {
    $errorExcepcion = $miExcepcionPDO->getCode(); // Almacenamos el código del error de la excepción en la variable '$errorExcepcion'
    $mensajeExcepcion = $miExcepcionPDO->getMessage(); // Almacenamos el mensaje de la excepción en la variable '$mensajeExcepcion'

    echo "<span class='errorException'>Error: </span>" . $mensajeExcepcion . "<br>"; // Mostramos el mensaje de la excepción
    echo "<span class='errorException'>Código del error: </span>" . $errorExcepcion; // Mostramos el código de la excepción
    die($miExcepcionPDO);
} finally {
    unset($miDB); // Para cerrar la conexión
}
?>
<!DOCTYPE html>
<!--
        Descripción: CodigoEjercicio02
        Autor: Carlos García Cachón
        Fecha de creación/modificación: 22/11/2023
-->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Carlos García Cachón">
        <meta name="description" content="CodigoEjercicio02">
        <meta name="keywords" content="CodigoEjercicio, 02">
        <meta name="generator" content="Apache NetBeans IDE 19">
        <meta name="generator" content="60">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Carlos García Cachón</title>
        <link rel="icon" type="image/jpg" href="../webroot/media/images/favicon.ico"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../webroot/css/style.css">
    </head>

    <body>
        <header class="text-center">
            <h1>2. Desarrollo de un control de acceso con identificación del usuario basado en la función header() y en el uso de una tabla “Usuario” de la base de datos. (PDO):</h1>
        </header>
        <main>
            <div class="container mt-3">
                <div class="row d-flex justify-content-start">
                    <div class="col">
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="position-fixed bottom-0 end-0">
        <div class="row text-center">
            <div class="footer-item">
                <address>© <a href="../../index.html" style="color: white; text-decoration: none; background-color: #666">Carlos García Cachón</a>
                    IES LOS SAUCES 2023-24 </address>
            </div>
            <div class="footer-item">
                <a href="../indexProyectoTema5.html" style="color: white; text-decoration: none; background-color: #666"> Inicio</a>
            </div>
            <div class="footer-item">
                <a href="https://github.com/Fighter-kun?tab=repositories" target="_blank"><img
                        src="../webroot/media/images/github.png" alt="LogoGitHub" class="pe-5"/></a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>