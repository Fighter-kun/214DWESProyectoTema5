/**
 * Author:  Carlos García Cachón
 * Created: 21 nov 2023
 */

-- Elimino el usuario de la base de datos
DROP USER  user214DWESProyectoTema5;

-- Cambio a una base de datos diferente antes de eliminarla (En este caso la que crea por defecto 'mysql')
USE mysql;

-- Elimino la base de datos DAW214DBDepartamentos
DROP DATABASE DB214DWESProyectoTema5;
