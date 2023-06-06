/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 10.4.28-MariaDB : Database - matricula
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`matricula` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `matricula`;

/*Table structure for table `carreras` */

DROP TABLE IF EXISTS `carreras`;

CREATE TABLE `carreras` (
  `idcarrera` int(11) NOT NULL AUTO_INCREMENT,
  `nombrecarrera` varchar(50) NOT NULL,
  `precio` decimal(7,2) DEFAULT NULL,
  PRIMARY KEY (`idcarrera`),
  UNIQUE KEY `uk_nombrecarrera_carreras` (`nombrecarrera`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `carreras` */

insert  into `carreras`(`idcarrera`,`nombrecarrera`,`precio`) values 
(1,'Administración',550.00),
(2,'Arquitectura',550.00),
(3,'Contabilidad',520.00),
(4,'Medicina',700.00),
(5,'Psicología',350.00);

/*Table structure for table `ciclo` */

DROP TABLE IF EXISTS `ciclo`;

CREATE TABLE `ciclo` (
  `idciclo` int(11) NOT NULL AUTO_INCREMENT,
  `ciclo` varchar(3) NOT NULL,
  PRIMARY KEY (`idciclo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `ciclo` */

insert  into `ciclo`(`idciclo`,`ciclo`) values 
(1,'I'),
(2,'II'),
(3,'III'),
(4,'IV'),
(5,'V'),
(6,'VI');

/*Table structure for table `docentes` */

DROP TABLE IF EXISTS `docentes`;

CREATE TABLE `docentes` (
  `iddocente` int(11) NOT NULL AUTO_INCREMENT,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `dni` char(8) NOT NULL,
  `especialidad` varchar(70) NOT NULL,
  `direccion` varchar(70) NOT NULL,
  PRIMARY KEY (`iddocente`),
  UNIQUE KEY `uk_dni_docentes` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `docentes` */

insert  into `docentes`(`iddocente`,`apellidos`,`nombres`,`dni`,`especialidad`,`direccion`) values 
(1,'Sanchez Torres','Paola','48278917','Administración','Chincha Alta'),
(2,'Casas Ortega','Diego','43980162','Contabilidad','Chincha Baja'),
(3,'Gutierrez Fernández','Mariela','49297401','Arquitectura','Grocio Prado'),
(4,'Cruz Ruíz','Tomás','42928491','Psicológia','Sunampe'),
(5,'Salazar Rivera','Verónica','49287183','Medicina','Pueblo Nuevo');

/*Table structure for table `estudiantes` */

DROP TABLE IF EXISTS `estudiantes`;

CREATE TABLE `estudiantes` (
  `idestudiante` int(11) NOT NULL AUTO_INCREMENT,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `dni` char(8) NOT NULL,
  `genero` char(1) NOT NULL,
  `celular` char(9) DEFAULT NULL,
  `fechaingreso` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idestudiante`),
  UNIQUE KEY `uk_dni_estudiantes` (`dni`),
  CONSTRAINT `ck_genero_estudiantes` CHECK (`genero` in ('M','F'))
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `estudiantes` */

insert  into `estudiantes`(`idestudiante`,`apellidos`,`nombres`,`dni`,`genero`,`celular`,`fechaingreso`) values 
(1,'Martinez Prado','Mariano','73589765','M','956389251','2023-06-05 19:20:21'),
(2,'Mendoza Torres','Carla','74502560','F','947382015','2023-06-05 19:20:21'),
(3,'Palacios Guerra','Freddy','75589463','M','948240100','2023-06-05 19:20:21'),
(4,'García Tasayco','Valeria','73682071','F','956723971','2023-06-05 19:20:21'),
(5,'Gomez Salas','Pedro','72895710','M','967298156','2023-06-05 19:20:21'),
(6,'Muñoz','Omar','75837291','M','','2023-06-05 19:21:21'),
(7,'Ramirez ','Valentino','75688231','M','978927171','2023-06-05 19:22:06'),
(8,'Torres','Dayana','72784829','F','912891821','2023-06-05 19:26:46');

/*Table structure for table `matriculas` */

DROP TABLE IF EXISTS `matriculas`;

CREATE TABLE `matriculas` (
  `idmatricula` int(11) NOT NULL AUTO_INCREMENT,
  `idestudiante` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idcarrera` int(11) NOT NULL,
  `iddocente` int(11) NOT NULL,
  `idtipopago` int(11) NOT NULL,
  `idciclo` int(11) NOT NULL,
  `precio` decimal(7,2) DEFAULT NULL,
  `fecharegistro` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idmatricula`),
  KEY `fk_idestudiante_matricula` (`idestudiante`),
  KEY `fk_idusuario_matricula` (`idusuario`),
  KEY `fk_idcarrera_matricula` (`idcarrera`),
  KEY `fk_iddocente_matricula` (`iddocente`),
  KEY `fk_idtipopago_matricula` (`idtipopago`),
  KEY `fk_idciclo_matricula` (`idciclo`),
  CONSTRAINT `fk_idcarrera_matricula` FOREIGN KEY (`idcarrera`) REFERENCES `carreras` (`idcarrera`),
  CONSTRAINT `fk_idciclo_matricula` FOREIGN KEY (`idciclo`) REFERENCES `ciclo` (`idciclo`),
  CONSTRAINT `fk_iddocente_matricula` FOREIGN KEY (`iddocente`) REFERENCES `docentes` (`iddocente`),
  CONSTRAINT `fk_idestudiante_matricula` FOREIGN KEY (`idestudiante`) REFERENCES `estudiantes` (`idestudiante`),
  CONSTRAINT `fk_idtipopago_matricula` FOREIGN KEY (`idtipopago`) REFERENCES `tipopago` (`idtipopago`),
  CONSTRAINT `fk_idusuario_matricula` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `matriculas` */

insert  into `matriculas`(`idmatricula`,`idestudiante`,`idusuario`,`idcarrera`,`iddocente`,`idtipopago`,`idciclo`,`precio`,`fecharegistro`) values 
(1,1,1,1,3,1,1,300.00,'2023-06-05 19:21:00'),
(2,2,1,2,2,2,2,300.00,'2023-06-05 19:21:00'),
(3,3,1,3,3,3,3,300.00,'2023-06-05 19:21:00'),
(4,4,1,4,4,1,4,300.00,'2023-06-05 19:21:00'),
(5,5,1,5,5,3,5,300.00,'2023-06-05 19:21:00');

/*Table structure for table `tipopago` */

DROP TABLE IF EXISTS `tipopago`;

CREATE TABLE `tipopago` (
  `idtipopago` int(11) NOT NULL AUTO_INCREMENT,
  `mediopago` varchar(10) NOT NULL,
  PRIMARY KEY (`idtipopago`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tipopago` */

insert  into `tipopago`(`idtipopago`,`mediopago`) values 
(1,'Tarjeta'),
(2,'Efectivo'),
(3,'Depósito');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombreusuario` varchar(30) NOT NULL,
  `claveacceso` varchar(90) NOT NULL,
  `nivelacceso` char(1) NOT NULL DEFAULT 'A',
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `uk_nombreusuario_usuarios` (`nombreusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `usuarios` */

insert  into `usuarios`(`idusuario`,`nombreusuario`,`claveacceso`,`nivelacceso`,`estado`) values 
(1,'Kiara','$2y$10$70QA8bGZwi9hp/SeZApskOfDxfHLJ4tV8aIYNmQ0HRsqqIBraXe4y','A','1');

/* Procedure structure for procedure `spu_carreras_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_carreras_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_carreras_listar`()
BEGIN
	SELECT * FROM carreras ORDER BY idcarrera DESC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_ciclo_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_ciclo_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_ciclo_listar`()
begin
	select * from ciclo order by idciclo desc;
end */$$
DELIMITER ;

/* Procedure structure for procedure `spu_docentes_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_docentes_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_docentes_listar`()
BEGIN
	SELECT * FROM docentes ORDER BY iddocente DESC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_docentes_registrar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_docentes_registrar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_docentes_registrar`(
	IN _iddocente		INT,
	IN _apellidos		VARCHAR(50),
	IN _nombres			VARCHAR(30),
	IN _dni				CHAR(8),
	IN _especialidad	VARCHAR(70),
	IN _direccion		VARCHAR(70)
)
BEGIN
	INSERT INTO docentes (iddocente, apellidos, nombres, dni, especialidad, direccion) VALUES
	(_iddocente, _apellidos, _nombres, _dni, _especialidad, _direccion);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_estudiantes_buscar_dni` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_estudiantes_buscar_dni` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_estudiantes_buscar_dni`(IN _dni CHAR(8))
BEGIN
	SELECT	estudiantes.idestudiante,
				estudiantes.apellidos,
				estudiantes.nombres,
				estudiantes.dni,
				estudiantes.genero,
				estudiantes.celular
		FROM estudiantes
		WHERE estudiantes.dni=_dni;
		
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_estudiantes_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_estudiantes_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_estudiantes_listar`()
BEGIN
	SELECT * FROM estudiantes ORDER BY idestudiante DESC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_estudiantes_registrar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_estudiantes_registrar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_estudiantes_registrar`(
	IN _idestudiante	INT,
	IN _apellidos		VARCHAR(50),
	IN _nombres			VARCHAR(40),
	IN _dni				CHAR(8),
	IN _genero			CHAR(1),
	IN _celular			CHAR(9)
)
BEGIN
	INSERT INTO estudiantes (idestudiante, apellidos, nombres, dni, genero, celular) VALUES
	(_idestudiante, _apellidos, _nombres, _dni, _genero, _celular);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_matriculas_actualizar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_matriculas_actualizar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_matriculas_actualizar`(
    IN matricula_id INT,
    IN carrera_id INT,
    IN docente_id INT,
    IN tipopago_id INT,
    IN ciclo_id int,
    IN precio DECIMAL(7,2)
)
BEGIN
    UPDATE matriculas
    SET 
        idcarrera = carrera_id,
        iddocente = docente_id,
        idtipopago = tipopago_id,
        idciclo = ciclo_id,
        precio = precio
    WHERE idmatricula = matricula_id;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_matriculas_eliminar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_matriculas_eliminar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_matriculas_eliminar`(
    IN _idmatricula INT
)
BEGIN
    DELETE FROM matriculas WHERE idmatricula = _idmatricula;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_matriculas_getdata` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_matriculas_getdata` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_matriculas_getdata`(IN _idmatricula INT)
BEGIN
	SELECT	matriculas.idmatricula, matriculas.idestudiante, matriculas.idcarrera, 
		matriculas.idusuario, matriculas.iddocente, matriculas.idtipopago, 
		matriculas.idciclo, matriculas.precio, estudiantes.apellidos, estudiantes.nombres,
		estudiantes.dni, estudiantes.genero, estudiantes.celular
		FROM matriculas
		INNER JOIN estudiantes ON estudiantes.idestudiante=matriculas.idestudiante
		WHERE idmatricula = _idmatricula;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_matriculas_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_matriculas_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_matriculas_listar`()
BEGIN
    SELECT m.idmatricula, e.apellidos, e.nombres, 
    c.nombrecarrera, d.apellidos AS apellidos_docente, 
    d.nombres AS nombres_docente, tp.mediopago, ci.ciclo,
    m.precio, m.fecharegistro
    FROM matriculas m
    JOIN estudiantes e ON m.idestudiante = e.idestudiante
    JOIN usuarios u ON m.idusuario = u.idusuario
    JOIN carreras c ON m.idcarrera = c.idcarrera
    JOIN docentes d ON m.iddocente = d.iddocente
    JOIN tipopago tp ON m.idtipopago = tp.idtipopago
    join ciclo ci on m.idciclo = ci.idciclo
    ORDER BY m.idmatricula DESC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_matriculas_registrar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_matriculas_registrar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_matriculas_registrar`(
    IN _nombres	  VARCHAR(40),
    IN _apellidos VARCHAR(50),
    IN _dni 	CHAR(8),
    IN _celular CHAR(9),
    IN _genero 	CHAR(1),
    IN usuario_id INT,
    IN carrera_id INT,
    IN docente_id INT,
    IN tipopago_id INT,
    IN ciclo_id  int,
    IN precio 	DECIMAL(7,2)
)
BEGIN
    INSERT INTO estudiantes (nombres, apellidos, dni, celular, genero) VALUES (_nombres, _apellidos, _dni, _celular, _genero);
    SET @idestudiante = LAST_INSERT_ID();
    
    INSERT INTO matriculas (idestudiante, idusuario, idcarrera, iddocente, idtipopago, idciclo, precio, fecharegistro)
    VALUES (@idestudiante, usuario_id, carrera_id, docente_id, tipopago_id, ciclo_id, precio, NOW());
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_tipopago_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_tipopago_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_tipopago_listar`()
BEGIN
	SELECT * FROM tipopago ORDER BY idtipopago DESC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuarios_login` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuarios_login` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_login`(IN _nombreusuario VARCHAR(30))
BEGIN
	SELECT idusuario,
			nombreusuario,
			claveacceso,
			nivelacceso
	FROM usuarios
	WHERE nombreusuario = _nombreusuario AND estado = '1';
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
