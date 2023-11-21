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

-- Inserto los datos iniciales en la tabla T01_Usuario
INSERT INTO T01_Usuario (T01_CodUsuario, T01_Password, T01_DescUsuario) 
VALUES ('usuario1', 'contrase', 'Descripción del Usuario 1');

-- Insertar un administrador con imagen
INSERT INTO T01_Usuario (T01_CodUsuario, T01_Password, T01_DescUsuario, T01_Perfil, T01_ImagenUsuario) 
VALUES ('admin1', 'adminpas', 'Administrador 1', 'administrador', NULL);

-- Insertar un usuario con fecha y hora de última conexión personalizada
INSERT INTO T01_Usuario (T01_CodUsuario, T01_Password, T01_DescUsuario, T01_FechaHoraUltimaConexion) 
VALUES ('usuario2', 'contrase', 'Descripción del Usuario 2', '2023-11-21 08:30:00');

-- Insertar un usuario con número de conexiones específico
INSERT INTO T01_Usuario (T01_CodUsuario, T01_Password, T01_DescUsuario, T01_NumConexiones) 
VALUES ('usuario3', 'contrase', 'Descripción del Usuario 3', 5);
    

