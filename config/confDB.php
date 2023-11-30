<?php
/**
 * @author Carlos García Cachón
 * @version 1.2 
 * @since 30/11/2023
 * Archivo de configuración de la BD del Instituto
*/
// Archivo de configuración de la BD del Instituto
if ($_SERVER['SERVER_NAME'] == 'daw214.isauces.local') {
    define('DSN', 'mysql:host=192.168.20.19;dbname=DB214DWESProyectoTema5'); // Host 'IP' y nombre de la base de datos
    define('USERNAME','user214DWESProyectoTema5'); // Nombre de usuario de la base de datos
    define('PASSWORD','paso'); // Contraseña de la base de datos
    // Archivo de configuración de la BD de Explotación
    } elseif ($_SERVER['SERVER_NAME'] == 'daw214.ieslossauces.es') {
        define('DSN', 'mysql:host=db5014806801.hosting-data.io;dbname=dbs12302455'); // Host y nombre de la base de datos
        define('USERNAME','dbu132588'); // Nombre de usuario de la base de datos
        define('PASSWORD','daw2_Sauces'); // Contraseña de la base de datos
    }