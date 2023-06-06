CREATE DATABASE matricula;
USE matricula;

CREATE TABLE estudiantes
(
	idestudiante		INT AUTO_INCREMENT PRIMARY KEY,
	apellidos		VARCHAR(50)	NOT NULL,
	nombres			VARCHAR(40)	NOT NULL,
	dni			CHAR(8)		NOT NULL,
	genero			CHAR(1)		NOT NULL,
	celular			CHAR(9) 	NULL,
	fechaingreso		DATETIME NOT NULL DEFAULT NOW(),
	CONSTRAINT uk_dni_estudiantes UNIQUE (dni),
	CONSTRAINT ck_genero_estudiantes CHECK(genero IN ('M','F'))
)ENGINE = INNODB;

INSERT INTO estudiantes (apellidos, nombres, dni, genero, celular) VALUES
('Martinez Prado', 'Mariano', '73589765', 'M', '956389251'),
('Mendoza Torres', 'Carla', '74502560', 'F',  '947382015'),
('Palacios Guerra', 'Freddy', '75589463', 'M', '948240100'),
('García Tasayco', 'Valeria', '73682071', 'F', '956723971'),
('Gomez Salas', 'Pedro' ,'72895710', 'M', '967298156');


CREATE TABLE carreras
(
	idcarrera		INT AUTO_INCREMENT PRIMARY KEY,
	nombrecarrera		VARCHAR(50) NOT NULL,
	precio			DECIMAL(7,2),
	CONSTRAINT uk_nombrecarrera_carreras UNIQUE (nombrecarrera)
)ENGINE = INNODB;

INSERT INTO carreras (nombrecarrera, precio) VALUES
('Administración', '550'),
('Arquitectura', '550'),
('Contabilidad', '520'),
('Medicina', '700'),
('Psicología', '350');

CREATE TABLE tipopago
(
	idtipopago		INT AUTO_INCREMENT PRIMARY KEY,
	mediopago		VARCHAR(10)	NOT NULL -- efectivo, depósito, tarjeta
)ENGINE = INNODB;

INSERT INTO tipopago (mediopago) VALUES
('Tarjeta'),
('Efectivo'),
('Depósito');

CREATE TABLE usuarios
(
	idusuario		INT AUTO_INCREMENT PRIMARY KEY,
	nombreusuario		VARCHAR(30) NOT NULL,
	claveacceso		VARCHAR(90) NOT NULL,
	nivelacceso 		CHAR(1) NOT NULL DEFAULT 'A', -- s = stander | A = administrador | I = invitado
	estado			CHAR(1) NOT NULL DEFAULT '1',
	CONSTRAINT uk_nombreusuario_usuarios UNIQUE (nombreusuario)
)ENGINE = INNODB;

INSERT INTO usuarios (nombreusuario, claveacceso) VALUES
('Kiara', '123456');

-- la contraseña es 123456
	UPDATE usuarios
		SET claveacceso = '$2y$10$70QA8bGZwi9hp/SeZApskOfDxfHLJ4tV8aIYNmQ0HRsqqIBraXe4y'
		WHERE idusuario = 1;

CREATE TABLE docentes
(
	iddocente		INT AUTO_INCREMENT PRIMARY KEY,
	apellidos		VARCHAR(50)	NOT NULL,
	nombres			VARCHAR(30) 	NOT NULL,
	dni			CHAR(8)		NOT NULL,
	especialidad		VARCHAR(70)	NOT NULL,
	direccion		VARCHAR(70)	NOT NULL,
	CONSTRAINT uk_dni_docentes UNIQUE (dni)
)ENGINE = INNODB;

INSERT INTO docentes (apellidos, nombres, dni, especialidad, direccion) VALUES
('Sanchez Torres', 'Paola', '48278917', 'Administración', 'Chincha Alta'),
('Casas Ortega', 'Diego', '43980162', 'Contabilidad', 'Chincha Baja'),
('Gutierrez Fernández', 'Mariela', '49297401', 'Arquitectura', 'Grocio Prado'),
('Cruz Ruíz', 'Tomás', '42928491', 'Psicológia', 'Sunampe'),
('Salazar Rivera', 'Verónica', '49287183', 'Medicina', 'Pueblo Nuevo');

CREATE TABLE ciclo
(
	idciclo			INT AUTO_INCREMENT PRIMARY KEY,
	ciclo			VARCHAR(3)	NOT NULL
)ENGINE = INNODB;

INSERT INTO ciclo (ciclo) VALUES
('I'),
('II'),
('III'),
('IV'),
('V'),
('VI');



CREATE TABLE matriculas
(
	idmatricula		INT AUTO_INCREMENT PRIMARY KEY,
	idestudiante		INT NOT NULL,
	idusuario		INT NOT NULL,
	idcarrera		INT NOT NULL,
	iddocente		INT NOT NULL,
	idtipopago		INT NOT NULL,
	idciclo			INT NOT NULL,
	precio			DECIMAL(7,2),
	fecharegistro		DATETIME NOT NULL DEFAULT NOW(),
	CONSTRAINT fk_idestudiante_matricula FOREIGN KEY (idestudiante) REFERENCES estudiantes (idestudiante),
	CONSTRAINT fk_idusuario_matricula FOREIGN KEY (idusuario) REFERENCES usuarios (idusuario),
	CONSTRAINT fk_idcarrera_matricula FOREIGN KEY (idcarrera) REFERENCES carreras(idcarrera),
	CONSTRAINT fk_iddocente_matricula FOREIGN KEY (iddocente) REFERENCES docentes (iddocente),
	CONSTRAINT fk_idtipopago_matricula FOREIGN KEY (idtipopago) REFERENCES tipopago (idtipopago),
	CONSTRAINT fk_idciclo_matricula FOREIGN KEY (idciclo) REFERENCES ciclo (idciclo)
)ENGINE = INNODB;

INSERT INTO matriculas (idestudiante, idusuario, idcarrera, iddocente, idtipopago, idciclo, precio) VALUES
(1, 1, 1, 1, 1, 1, '300'),
(2, 1, 2, 2, 2, 2, '300'),
(3, 1, 3, 3, 3, 3, '300'),
(4, 1, 4, 4, 1, 4, '300'),
(5, 1, 5, 5, 3, 5, '300');




SELECT * FROM estudiantes
SELECT * FROM carreras
SELECT * FROM tipopago
SELECT * FROM usuarios
SELECT * FROM docentes
SELECT * FROM matriculas