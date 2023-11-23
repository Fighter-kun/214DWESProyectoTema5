/**
 * Author:  Carlos García Cachón
 * Created: 21 nov 2023
 */

-- Me posiciono en la base de datos
USE DB214DWESProyectoTema5;

-- Inserto los datos iniciales en la tabla T02_Departamento
INSERT INTO T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio, T02_FechaBajaDepartamento) VALUES
    ('AAA', 'Departamento de Ventas', NOW(), 100000.50, NULL),
    ('AAB', 'Departamento de Marketing', NOW(), 50089.50, NULL),
    ('AAC', 'Departamento de Finanzas', NOW(), 600.50, '2023-11-13 13:06:00');

-- Inserto los datos iniciales en la tabla T01_Usuario con contraseñas cifradas en SHA-256
INSERT INTO T01_Usuario (T01_CodUsuario, T01_Password, T01_DescUsuario, T01_Perfil) VALUES
    ('admin', SHA2(CONCAT('adminpaso'), 256), 'administrador', 'administrador'),
    ('alvaro', SHA2(CONCAT('alvaropaso'), 256), 'Álvaro Cordero Miñambres', 'usuario'),
    ('carlos', SHA2(CONCAT('carlospaso'), 256), 'Carlos García Cachón', 'usuario'),
    ('oscar', SHA2(CONCAT('oscarpaso'), 256), 'Oscar Pascual Ferrero', 'usuario'),
    ('borja', SHA2(CONCAT('borjapaso'), 256), 'Borja Nuñez Refoyo', 'usuario'),
    ('rebeca', SHA2(CONCAT('rebecapaso'), 256), 'Rebeca Sánchez Pérez', 'usuario'),
    ('erika', SHA2(CONCAT('erikapaso'), 256), 'Erika Martínez Pérez', 'usuario'),
    ('ismael', SHA2(CONCAT('ismaelpaso'), 256), 'Ismael Ferreras García', 'usuario'),
    ('heraclio', SHA2(CONCAT('heracliopaso'), 256), 'Heraclio Borbujo Moran', 'administrador'),
    ('amor', SHA2(CONCAT('amorpaso'), 256), 'Amor Rodriguez Navarro', 'administrador');