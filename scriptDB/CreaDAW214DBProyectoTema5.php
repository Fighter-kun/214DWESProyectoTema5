<?php
try {
    define('DSN', 'mysql:host=db5014806801.hosting-data.io;dbname=dbs12302455'); // Host y nombre de la base de datos
    define('USERNAME','dbu132588'); // Nombre de usuario de la base de datos
    define('PASSWORD','daw2_Sauces'); // Contraseña de la base de datos
    // Crear conexión
    $conn = new PDO(DSN, USERNAME, PASSWORD);

    // Creamos una variable con varias consultas a realizar
    $consulta = <<<CONSULTA
            CREATE TABLE IF NOT EXISTS dbs12302455.T01_Usuario (
                T01_CodUsuario CHAR(8) PRIMARY KEY,
                T01_Password VARCHAR(64),
                T01_DescUsuario VARCHAR(255),
                T01_NumConexiones INT DEFAULT 0,
                T01_FechaHoraUltimaConexion DATETIME DEFAULT DEFAULT NULL,
                T01_Perfil ENUM('usuario','administrador') DEFAULT 'usuario',
                T01_ImagenUsuario BLOB
            )ENGINE=INNODB;
            CREATE TABLE IF NOT EXISTS dbs12302455.T02_Departamento (
                T02_CodDepartamento CHAR(3) PRIMARY KEY,
                T02_DescDepartamento VARCHAR(255),
                T02_FechaCreacionDepartamento DATETIME DEFAULT CURRENT_TIMESTAMP,
                T02_VolumenDeNegocio FLOAT,
                T02_FechaBajaDepartamento DATETIME
            )ENGINE=INNODB;
            CREATE TABLE IF NOT EXISTS dbs12302455.T06_Animales (
                T06_CodAnimal CHAR(3) PRIMARY KEY,
                T06_DescAnimal VARCHAR(255),
                T06_FechaNacimiento DATETIME DEFAULT CURRENT_TIMESTAMP,
                T06_Sexo ENUM('macho','hembra'),
                T06_Raza VARCHAR(255),
                T06_Precio DECIMAL(10, 2),
                T06_FechaBaja DATETIME DEFAULT NULL;
            )ENGINE=INNODB;
            CONSULTA;
    $consultaPreparada = $conn->prepare($consulta);
    $consultaPreparada->execute();

    echo "<span style='color:green;'>Tablas creadas correctamente</span>"; // Mostramos el mensaje si la consulta se a ejecutado correctamente
} catch (PDOException $miExcepcionPDO) {
    $errorExcepcion = $miExcepcionPDO->getCode(); // Almacenamos el código del error de la excepción en la variable '$errorExcepcion'
    $mensajeExcepcion = $miExcepcionPDO->getMessage(); // Almacenamos el mensaje de la excepción en la variable '$mensajeExcepcion'

    echo "<span style='color:red;'>Error: </span>" . $mensajeExcepcion . "<br>"; // Mostramos el mensaje de la excepción
    echo "<span style='color:red;'>Código del error: </span>" . $errorExcepcion; // Mostramos el código de la excepción
    die($miExcepcionPDO);
} finally {
    // Cerrar la conexión
    if (isset($conn)) {
        $conn = null;
    }
}



