<!DOCTYPE html>
<!--
	Descripción: CodigoEjercicio00
	Autor: Carlos García Cachón
	Fecha de creación/modificación: 21/11/2023
-->
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="author" content="Carlos García Cachón">
  <meta name="description" content="CodigoEjercicio00">
  <meta name="keywords" content="CodigoEjercicio, 00">
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
        <h1>0. Mostrar el contenido de las variables superglobales y phpinfo():</h1>
    </header>
    <main>
        <div class="container mt-3">
            <div class="row">
                <div class="col d-flex justify-content-start">
                    
                    <?php
                    echo "<div>";
                    // $_SERVER
                    echo('<div class="ejercicio">');
                    echo('<h3>$_SERVER</h3>');
                    foreach ($_SERVER as $key => $valor) {
                        echo('<u>'.$key.'</u> => <b>'.$valor.'</b><br>');
                    }
                    echo('</div>');

                    // $_COOKIE
                    echo('<div class="ejercicio">');
                    echo('<h3>$_COOKIE</h3>');
                    foreach ($_COOKIE as $key => $valor) {
                        echo('<u>'.$key.'</u> => <b>'.$valor.'</b><br>');
                    }
                    echo('</div>');

                    // $GLOBALS
                    echo('<div class="ejercicio">');
                    echo('<h3>$GLOBALS</h3>');
                    foreach ($GLOBALS as $key => $valor) {
                        foreach ($valor as $clave => $valor2) {
                            echo('<u>'.$clave.'</u> => <b>'.$valor2.'</b><br>');
                        }
                    }
                    echo('</div>');

                    // $_GET
                    echo('<div class="ejercicio">');
                    echo('<h3>$_GET</h3>');
                    foreach ($_GET as $key => $valor) {
                        echo('<u>'.$key.'</u> => <b>'.$valor.'</b><br>');
                    }
                    echo('</div>');

                    // $_POST
                    echo('<div class="ejercicio">');
                    echo('<h3>$_POST</h3>');
                    foreach ($_POST as $key => $valor) {
                        echo('<u>'.$key.'</u> => <b>'.$valor.'</b><br>');
                    }
                    echo('</div>');

                    // $_FILES
                    echo('<div class="ejercicio">');
                    echo('<h3>$_FILES</h3>');
                    foreach ($_FILES as $key => $valor) {
                        echo('<u>'.$key.'</u> => <b>'.$valor.'</b><br>');
                    }
                    echo('</div>');

                    // $_REQUEST
                    echo('<div class="ejercicio">');
                    echo('<h3>$_REQUEST</h3>');
                    foreach ($_REQUEST as $key => $valor) {
                        echo('<u>'.$key.'</u> => <b>'.$valor.'</b><br>');
                    }
                    echo('</div>');

                    // $_ENV
                    echo('<div class="ejercicio">');
                    echo('<h3>$_ENV</h3>');
                    foreach ($_ENV as $key => $valor) {
                        echo('<u>'.$key.'</u> => <b>'.$valor.'</b><br>');
                    }
                    echo('</div>');
                    echo "</div>";
                    ?>
                </div> 
                <div class="col text-center">
                    <h2>phpinfo(): </h2>
                    <?php
                        /**
                        * @author Carlos García Cachón
                        * @version 1.0 
                        * @since 21/11/2023
                        */
                        phpinfo();
                    ?>
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
                <a href="../indexProyectoTema5.html" style="color: white; text-decoration: none; background-color: #666">Inicio</a>
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

