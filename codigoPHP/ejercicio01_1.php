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
        <style>
            .obligatorio {
                background-color: #ffff7a;
            }
            .bloqueado:disabled {
                background-color: #665 ;
                color: white;
            }
            .error {
                color: red;
                width: 450px;
            }
        </style>
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
                        // Incluyo la librería de validación para comprobar los campos
                        require_once '../core/231018libreriaValidacion.php';

                        // Declaración de constantes por OBLIGATORIEDAD
                        define('OPCIONAL', 0);
                        define('OBLIGATORIO', 1);

                        // Declaración de variables de estructura para validar la ENTRADA de RESPUESTAS o ERRORES
                        // Valores por defecto
                        $entradaOK = true;

                        $aRespuestas = [
                            'user' => "",
                            'password' => ""
                        ];

                        $aErrores = [
                            'user' => "",
                            'password' => ""
                        ];

                        // En el siguiente if pregunto si el '$_REQUEST' recupero el valor 'enviar' que enviamos al pulsar el botón de enviar del formulario.
                        if (isset($_REQUEST['enviar'])) {

                            // Validación sintáctica
                            $aErrores['user'] = validacionFormularios::comprobarAlfabetico($_SERVER['PHP_AUTH_USER'], 8, 4, OBLIGATORIO);
                            $aErrores['password'] = validacionFormularios::validarPassword($_SERVER['PHP_AUTH_PW'], 8, 4, 1, OBLIGATORIO);

                            // Si no hay errores de validación sintáctica, realiza la validación de credenciales
                            if (is_null($aErrores['user']) && is_null($aErrores['password'])) {
                                // Verifica las credenciales ingresadas en el formulario
                                if ($_SERVER['PHP_AUTH_USER'] != 'pepe' || $_SERVER['PHP_AUTH_PW'] != 'paso') {
                                    // Si las credenciales no son correctas, actualiza los errores
                                    $aErrores['user'] = 'Usuario o contraseña incorrectos.';
                                    $aErrores['password'] = 'Usuario o contraseña incorrectos.';
                                } else {
                                    // Si las credenciales son correctas, redirige al formulario en la misma página sin solicitar autenticación básica
                                    header("Location: " . $_SERVER['PHP_SELF']);
                                    exit;
                                }
                            }

                            /*
                             * En este foreach recorremos el array buscando que exista NULL (Los métodos anteriores si son correctos devuelven NULL)
                             * y en caso negativo cambiará el valor de '$entradaOK' a false y borrará el contenido del campo.
                             */
                            foreach ($aErrores as $campo => $error) {
                                if ($error != null) {
                                    $_SERVER['PHP_AUTH_USER'] = ""; // Para 'user', podrías asignar un valor por defecto si prefieres.
                                    $_SERVER['PHP_AUTH_PW'] = ""; // Para 'password', podrías asignar un valor por defecto si prefieres.
                                    $entradaOK = false;
                                }
                            }
                        } else {
                            $entradaOK = false;
                        }
                        // En caso de que '$entradaOK' sea true, cargamos las respuestas en el array '$aRespuestas'
                        if ($entradaOK) {
                            // Cargo el array con las respuestas
                            $aRespuestas['user'] = ($_SERVER['PHP_AUTH_USER']);
                            $aRespuestas['password'] = $_SERVER['PHP_AUTH_PW'];

                            // Mostrar mensaje de autenticación exitosa (opcional)
                            echo "<p>Autenticación exitosa</p>";
                            echo "<p style='color: green;'>Nombre de usuario: " . $aRespuestas['user'] . "</p>";
                            echo "<p style='color: green;'>Contraseña: " . $aRespuestas['password'] . "</p>";
                        } else {
                            ?>
                            <!-- Codigo del formulario -->
                            <form name="controlAcceso" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <fieldset>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="rounded-top" colspan="3"><legend>Control de Acceso</legend></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <!-- CodDepartamento Obligatorio -->
                                                <td class="d-flex justify-content-start">
                                                    <label for="user">Introduce usuario:</label>
                                                </td>
                                                <td>
                                                    <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                         comprobamos que exista la variable y no sea 'null'. En el caso verdadero devolveremos el contenido del campo
                                                         que contiene '$_SERVER' , en caso falso sobrescribirá el campo a '' .-->
                                                    <input class="obligatorio d-flex justify-content-start" type="text" name="user"
                                                           value="<?php echo (isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : ''); ?>">
                                                </td>
                                                <td class="error">
                                                    <?php
                                                    if (!empty($aErrores['user'])) {
                                                        echo $aErrores['user'];
                                                    }
                                                    ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no está vacío, si es así, mostramos el error. -->
                                                </td>
                                            </tr>
                                            <tr>
                                                <!-- CodDepartamento Obligatorio -->
                                                <td class="d-flex justify-content-start">
                                                    <label for="password">Introduce contraseña:</label>
                                                </td>
                                                <td>
                                                    <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                         comprobamos que exista la variable y no sea 'null'. En el caso verdadero devolveremos el contenido del campo
                                                         que contiene '$_SERVER' , en caso falso sobrescribirá el campo a '' .-->
                                                    <input class="obligatorio d-flex justify-content-start" type="password" name="password"
                                                           value="<?php echo (isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : ''); ?>">
                                                </td>
                                                <td class="error">
                                                    <?php
                                                    if (!empty($aErrores['password'])) {
                                                        echo $aErrores['password'];
                                                    }
                                                    ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no está vacío, si es así, mostramos el error. -->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="submit" name="enviar">Entrar</button>
                                </fieldset>
                            </form>
                            <?php
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