<?php
/**
 * @author Alvaro Cordero Miñambres
 * Mejorado por @author Carlos García Cachón
 * @version 1.1
 * @since 21/11/2023
 * @copyright Todos los derechos reservados Alvaro Cordero y Carlos García
 * 
 * @Annotation Desarrollo de un control de acceso con identificación del usuario basado en la función header().
 * ProyectoTema5
 * 
 */
// Configuración de conexión al archivo PHP
require_once '../config/confApp.php';
/**
 * @link https://www.php.net/manual/en/reserved.variables.server
 * 
 * $_SERVER['PHP_AUTH_USER'] -> se utiliza para obtener el nombre de usuario proporcionado por el cliente durante el proceso de autenticación HTTP básica.
 * $_SERVER['PHP_AUTH_PW'] -> se utiliza en el contexto de la autenticación básica HTTP. Esta variable contiene la contraseña proporcionada por el usuario  *durante el proceso de autenticación.
 */
//Si el usuario no es PEPE y la contrasena no es paso y  ninguna de las variables esta vacio o es null entramos en el if
if (!isset($_SERVER['PHP_AUTH_USER']) && !isset($_SERVER['PHP_AUTH_PW']) || $_SERVER['PHP_AUTH_USER'] != 'admin' || $_SERVER['PHP_AUTH_PW'] != 'paso') {
    /**
     * @link https://www.php.net/manual/es/function.header.php
     * 
     * Cuando el navegador recibe este encabezado, mostrará un cuadro de diálogo de inicio de sesión al usuario, solicitándole un nombre de usuario y una  *contraseña. El usuario debe proporcionar las credenciales correctas para acceder al recurso protegido.
     */
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');

    /**
     * @link https://developer.mozilla.org/es/docs/Web/HTTP/Status/401
     * 
     * Cuando un cliente realiza una solicitud a un recurso protegido y no proporciona credenciales válidas o no proporciona credenciales en absoluto, el  * *servidor puede responder con el código de estado 401 y el encabezado WWW-Authenticate para indicar al cliente que se requiere autenticación.
     */
    header('HTTP/1.0 401 Unauthorized');

    //Mostramos un error de autenticacion
    echo("Error de auntenticacion!!<br>");

    // En función de si estamos en el servidor de Desarrollo o Explotación nos mostrará un link u otro para volver al 'home'
    echo("<button><a href=".LINK.">Volver al home</a></button>");
    

    /**
     * @link https://www.php.net/manual/es/function.exit.php
     * 
     * La función exit en PHP se utiliza para finalizar la ejecución del script inmediatamente en el punto donde se llama
     */
    exit();

    //Si las credenciales de autenticacion son correctas 
} else {

    //Mostramos por pantalla los datos el usuario
}
?>
<!DOCTYPE html>
<!--
        Descripción: CodigoEjercicio01
        Autor: Carlos García Cachón
        Fecha de creación/modificación: 02/11/2023
-->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Carlos García Cachón">
        <meta name="description" content="CodigoEjercicio01">
        <meta name="keywords" content="CodigoEjercicio, 01">
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
            <h1>1. Desarrollo de un control de acceso con identificación del usuario basado en la función header():</h1>
        </header>
        <main>
            <div class="container mt-3">
                <div class="row d-flex justify-content-start">
                    <div class="col">
                    <?php
                    //Muestro un mensaje si todo ha ido bien.
                    echo "<p style='color: black;'>Usuario y password correctos!</p>";

                    //Muestro el usuario
                    echo "<p style='color: black;'>Nombre de usuario: " . $_SERVER['PHP_AUTH_USER'] . "</p>";

                    //Muestro la password
                    echo "<p style='color: black;'>Password: " . $_SERVER['PHP_AUTH_PW'] . "</p>";
                    ?>
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