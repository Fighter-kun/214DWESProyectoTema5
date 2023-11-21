<!DOCTYPE html>
<!--
        Descripción: CodigoEjercicio02
        Autor: Carlos García Cachón
        Fecha de creación/modificación: 02/11/2023
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
                        <?php
                        /**
                         * @author Carlos García Cachón
                         * @version 1.0
                         * @since 21/11/2023
                         * @copyright Todos los derechos reservados Carlos García Cachón
                         */
                        // Incluimos el fichero de acceso a configuración de la BD
                        require_once '../config/confDB.php';
                        /**
                         * @link https://www.php.net/manual/en/reserved.variables.server
                         * 
                         * $_SERVER['PHP_AUTH_USER'] -> se utiliza para obtener el nombre de usuario proporcionado por el cliente durante el proceso de autenticación HTTP básica.
                         * $_SERVER['PHP_AUTH_PW'] -> se utiliza en el contexto de la autenticación básica HTTP. Esta variable contiene la contraseña proporcionada por el usuario durante el proceso de autenticación.
                         */
                        //Si el usuario no es PEPE y la contrasena no es paso entramos en el if
                        if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
                            /**
                             * @link https://www.php.net/manual/es/function.header.php
                             * 
                             * Cuando el navegador recibe este encabezado, mostrará un cuadro de diálogo de inicio de sesión al usuario, solicitándole un nombre de usuario y una contraseña. El usuario debe proporcionar las credenciales correctas para acceder al recurso protegido.
                             */
                            header('WWW-Authenticate: Basic Realm="Contenido restringido"');

                            /**
                             * @link https://developer.mozilla.org/es/docs/Web/HTTP/Status/401
                             * 
                             * Cuando un cliente realiza una solicitud a un recurso protegido y no proporciona credenciales válidas o no proporciona credenciales en absoluto, el servidor puede responder con el código de estado 401 y el encabezado WWW-Authenticate para indicar al cliente que se requiere autenticación.
                             */
                            header('HTTP/1.0 401 Unauthorized');

                            /**
                             * @link https://www.php.net/manual/es/function.exit.php
                             * 
                             * La función exit en PHP se utiliza para finalizar la ejecución del script inmediatamente en el punto donde se llama
                             */
                            exit("<p style='color: black'>Error de autenticacion<p>");

                            //Si las credenciales de autenticacion son correctas 
                        } else {
                            try {
                                // Establecemos la conexión por medio de PDO
                                $miDB = new PDO(DSN, USERNAME, PASSWORD);
                                echo ("<span style='color:green;'>CONEXIÓN EXITOSA POR PDO</span><br><br>"); // Mensaje si la conexión es exitosa
                                // Guardo los datos recuperados por '$_SERVER' y los almaceno en variables con nombres significativos
                                $user = $_SERVER['PHP_AUTH_USER'];
                                $password = $_SERVER['PHP_AUTH_PW'];

                                $consulta = "SELECT T01_CodUsuario, T01_Password FROM T01_Usuario WHERE T01_CodUsuario='{$user}'"; //Creo la consulta y le paso el usuario a la consulta
                                $resultadoConsulta = $miDB->prepare($consulta); // Preparo la consulta antes de ejecutarla
                                $resultadoConsulta->execute(); //Ejecuto la consulta con el array de parametros 

                                if ($resultadoConsulta->rowCount() > 0) {
                                    $oUsuario = $resultadoConsulta->fetchObject(); //Obtengo el resultado de la consulta en un objeto
                                    $passwordEncriptada = hash('sha256', ($user . $password)); //Encripto la password con el nombre de usuario mas su password pasada por teclado.
                                    if (($oUsuario->T01_CodUsuario != $user) && ($oUsuario->T01_Password != $passwordEncriptada)) { //Compruebo si los datos coinciden con los de la base de datos
                                        header('WWW-Authenticate: Basic realm="Contenido restringido"'); //Muestra de nuevo la cabecera de autentificacion
                                        header("HTTP/1.0 401 Unauthorized"); //Redirige con el estado Unauthorized
                                        exit;
                                    } else { // Si no existe, se vuelven a pedir las credenciales hasta que se introduzcan correctamente
                                        echo "Usuario y password correctos!" . "<br/>"; //Muestro un mensaje si todo ha ido bien.
                                        echo "Nombre de usuario: " . $user . "<br/>"; //Muestro el usuario
                                        echo "Password: " . $password; //Muestro la password
                                    }
                                }
                            } catch (PDOException $ex) {
                                $errorExcepcion = $miExcepcionPDO->getCode(); // Almacenamos el código del error de la excepción en la variable '$errorExcepcion'
                                $mensajeExcepcion = $miExcepcionPDO->getMessage(); // Almacenamos el mensaje de la excepción en la variable '$mensajeExcepcion'

                                echo "<span style='color:red;'>Error: </span>" . $mensajeExcepcion . "<br>"; // Mostramos el mensaje de la excepción
                                echo "<span style='color:red;'>Código del error: </span>" . $errorExcepcion; // Mostramos el código de la excepción
                            } finally {
                                //Cierro la conexion
                                unset($miDB);
                            }
                        }
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