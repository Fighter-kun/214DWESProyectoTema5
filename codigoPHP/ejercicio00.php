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
                    <h2>Variables Superglobales: </h2>
                </div>
                <div class="col d-flex justify-content-start">
                    
                    <?php
                    $key = "";
                    $value = "";
                    echo "<div class=''>";
                    echo("<p>Contenido de <span style='color:green'>".'$GLOBALS'."</span> es de tipo <span>".gettype($GLOBALS)."</span> y tiene el valor ".print_r($GLOBALS)."</p>");
                    echo("<p>Contenido de <span style='color:green'>".'$_SERVER'."</span> es de tipo <span>".gettype($_SERVER)."</span> y contiene: <br>");
                    foreach ($_SERVER as $key => $value) {
                        echo "{$key} => {$value}<br>";
                    }
                    echo("</p>");
                    if (is_null($_GET)) {
                        echo("<p>Contenido de <span style='color:green'>".'$_GET'."</span> es de tipo <span>".gettype($_GET)."</span> y contiene: <br>");
                        foreach ($_GET as $key => $value) {
                            echo "{$key} => {$value}<br>";
                        }
                    } else {
                        echo("<p>Contenido de <span style='color:red'>".'$_GET'."</span> esta vacia.");
                    }
                    echo("</p>");
                    if (is_null($_POST)) {
                        echo("<p>Contenido de <span style='color:green'>".'$_POST'."</span> es de tipo <span>".gettype($_POST)."</span> y contiene: <br>");
                        foreach ($_POST as $key => $value) {
                            echo "{$key} => {$value}<br>";
                        }
                    } else {
                        echo("<p>Contenido de <span style='color:red'>".'$_POST'."</span> esta vacia.");
                    }
                    echo("</p>");
                    if (is_null($_FILES)) {
                        echo("<p>Contenido de <span style='color:green'>".'$_FILES'."</span> es de tipo <span>".gettype($_FILES)."</span> y contiene: <br>");
                        foreach ($_FILES as $key => $value) {
                            echo "{$key} => {$value}<br>";
                        }
                    } else {
                        echo("<p>Contenido de <span style='color:red'>".'$_FILES'."</span> esta vacia.");
                    }
                    echo("</p>");
                    if (empty($_COOKIE)) {
                        echo("<p>Contenido de <span style='color:green'>".'$_COOKIE'."</span> es de tipo <span>".gettype($_COOKIE)."</span> y contiene: <br>");
                        foreach ($_COOKIE as $key => $value) {
                            echo "{$key} => {$value}<br>";
                        }
                    } else {
                        echo("<p>Contenido de <span style='color:red'>".'$_COOKIE'."</span> esta vacia.");
                    }
                    echo("</p>");
                    if(isset($_SESSION)) {
                        echo("<p>Contenido de <span style='color:green'>".'$_SESSION'."</span> es de tipo <span>".gettype($_SESSION)."</span> y contiene: <br>");
                        foreach ($_SESSION as $key => $value) {
                            echo "{$key} => {$value}<br>";
                        }
                    }else {
                        echo("<p>Contenido de <span style='color:red'>".'$_SESSION'."</span> esta vacia.");
                    }
                    echo("</p>");
                    if (is_null($_REQUEST)) {
                        echo("<p>Contenido de <span style='color:green'>".'$_REQUEST'."</span> es de tipo <span>".gettype($_REQUEST)."</span> y contiene: <br>");
                        foreach ($_REQUEST as $key => $value) {
                            echo "{$key} => {$value}<br>";
                        }
                    } else {
                        echo("<p>Contenido de <span style='color:red'>".'$_REQUEST'."</span> esta vacia.");
                    }
                    echo("</p>");
                    if (is_null($_ENV)) {
                        echo("<p>Contenido de <span style='color:green'>".'$_ENV'."</span> es de tipo <span>".gettype($_ENV)."</span> y contiene: <br>");
                        foreach ($_ENV as $key => $value) {
                            echo "{$key} => {$value}<br>";
                        }
                    } else {
                        echo("<p>Contenido de <span style='color:red'>".'$_ENV'."</span> esta vacia.");
                    }
                    echo("</p>");
                    echo "</div>";
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

