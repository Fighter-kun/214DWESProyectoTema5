<?php
try {
    define('DSN', 'mysql:host=db5014806801.hosting-data.io;dbname=dbs12302455'); // Host y nombre de la base de datos
    define('USERNAME','dbu132588'); // Nombre de usuario de la base de datos
    define('PASSWORD','daw2_Sauces'); // Contraseña de la base de datos
    // Crear conexión
    $conn = new PDO(DSN, USERNAME, PASSWORD);

    // Creamos una variable con varias consultas a realizar
    $consulta = <<<CONSULTA
            INSERT INTO dbs12302455.T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio, T02_FechaBajaDepartamento) VALUES
                ('AAA', 'Departamento de Ventas', NOW(), 100000.50, NULL),
                ('AAB', 'Departamento de Marketing', NOW(), 50089.50, NULL),
                ('AAC', 'Departamento de Finanzas', NOW(), 600.50, '2023-11-13 13:06:00');
            INSERT INTO dbs12302455.T01_Usuario (T01_CodUsuario, T01_Password, T01_DescUsuario, T01_Perfil) VALUES
                ('admin', SHA2('adminpaso', 256), 'administrador', 'administrador'),
                ('alvaro', SHA2('alvaropaso', 256), 'Álvaro Cordero Miñambres', 'usuario'),
                ('carlos', SHA2('carlospaso', 256), 'Carlos García Cachón', 'usuario'),
                ('oscar', SHA2('oscarpaso', 256), 'Oscar Pascual Ferrero', 'usuario'),
                ('borja', SHA2('borjapaso', 256), 'Borja Nuñez Refoyo', 'usuario'),
                ('rebeca', SHA2('rebecapaso', 256), 'Rebeca Sánchez Pérez', 'usuario'),
                ('erika', SHA2('erikapaso', 256), 'Erika Martínez Pérez', 'usuario'),
                ('ismael', SHA2('ismaelpaso', 256), 'Ismael Ferreras García', 'usuario'),
                ('heraclio', SHA2('heracliopaso', 256), 'Heraclio Borbujo Moran', 'usuario'),
                ('amor', SHA2('amorpaso', 256), 'Amor Rodriguez Navarro', 'usuario');
            INSERT INTO dbs12302455.T06_Animales (T06_CodAnimal, T06_DescAnimal, T06_FechaNacimiento, T06_Sexo, T06_Raza, T06_Precio, T06_FechaBaja) VALUES
                ('001', 'Vaca', '2023-01-15 10:30:00', 'hembra', 'Holstein', 1200.50, NULL),
                ('002', 'Cerdo', '2022-08-05 15:45:00', 'macho', 'Large Black', 800.75, NULL),
                ('003', 'Gallina', '2021-05-20 08:00:00', 'hembra', 'Rhode Island Red', 25.99, NULL),
                ('004', 'Cabra', '2023-03-12 12:15:00', 'hembra', 'Saanen', 500.00, '2023-11-01 14:20:00'),
                ('005', 'Caballo', '2022-11-30 18:30:00', 'macho', 'Thoroughbred', 2500.25, NULL),
                ('006', 'Oveja', '2022-02-28 09:45:00', 'hembra', 'Dorset Horn', 700.99, NULL),
                ('007', 'Pato', '2022-07-10 16:00:00', 'macho', 'Pekin', 35.50, NULL),
                ('008', 'Burro', '2021-12-05 11:20:00', 'macho', 'Miniature', 1200.00, NULL),
                ('009', 'Conejo', '2023-04-18 14:00:00', 'macho', 'Holland Lop', 50.00, NULL),
                ('010', 'Perro', '2022-09-22 20:10:00', 'macho', 'Golden Retriever', 1200.00, NULL);
            CONSULTA;
    $consultaPreparada = $conn->prepare($consulta);
    $consultaPreparada->execute();

    echo "<span style='color:green;'>Valores insertados correctamente</span>"; // Mostramos el mensaje si la consulta se a ejecutado correctamente
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



