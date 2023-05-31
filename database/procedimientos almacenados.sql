USE matricula;

-- Procedimientos almacenados

DELIMITER $$
CREATE PROCEDURE spu_usuarios_login (IN _nombreusuario VARCHAR(30))
BEGIN
	SELECT idusuario,
			nombreusuario,
			claveacceso,
			nivelacceso
	FROM usuarios
	WHERE nombreusuario = _nombreusuario AND estado = '1';
END $$

CALL spu_usuarios_login('Kiara');


DELIMITER $$
CREATE PROCEDURE spu_estudiantes_listar()
BEGIN
	SELECT * FROM estudiantes ORDER BY idestudiante DESC;
END $$

CALL spu_estudiantes_listar();

DELIMITER $$
CREATE PROCEDURE spu_estudiantes_registrar
(
	IN _idestudiante	INT,
	IN _apellidos		VARCHAR(50),
	IN _nombres			VARCHAR(40),
	IN _dni				CHAR(8),
	IN _genero			CHAR(1),
	IN _celular			CHAR(9),
	IN _especialidad	VARCHAR(70)
)
BEGIN
	INSERT INTO estudiantes (idestudiante, apellidos, nombres, dni, genero, celular, especialidad) VALUES
	(_idestudiante, _apellidos, _nombres, _dni, _genero, _celular, _especialidad);
END $$
CALL spu_estudiantes_registrar(6, 'Muñoz', 'Omar', '75837291', 'M', '', 'Contabilidad');

CALL spu_estudiantes_listar();

SELECT * FROM estudiantes

-- Buscador de estudiantes
DELIMITER $$
CREATE PROCEDURE spu_estudiantes_buscar_dni(IN _dni CHAR(8))
BEGIN
	SELECT	estudiantes.idestudiante,
				estudiantes.apellidos,
				estudiantes.nombres,
				estudiantes.dni,
				estudiantes.genero,
				estudiantes.celular,
				estudiantes.especialidad
		FROM estudiantes
		WHERE estudiantes.dni=_dni;
		
END $$

CALL spu_estudiantes_buscar_dni(73589765);


DELIMITER $$
CREATE PROCEDURE spu_carreras_listar()
BEGIN
	SELECT * FROM carreras ORDER BY idcarrera DESC;
END $$

CALL spu_carreras_listar();


DELIMITER $$
CREATE PROCEDURE spu_tipopago_listar()
BEGIN
	SELECT * FROM tipopago ORDER BY idtipopago DESC;
END $$

CALL spu_tipopago_listar();


DELIMITER $$
CREATE PROCEDURE spu_docentes_listar()
BEGIN
	SELECT * FROM docentes ORDER BY iddocente DESC;
END $$

CALL spu_docentes_listar();

DELIMITER $$
CREATE PROCEDURE spu_docentes_registrar
(
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
END $$


DELIMITER $$
CREATE PROCEDURE spu_matriculas_listar()
BEGIN
	SELECT	matriculas.idmatricula,
				estudiantes.apellidos,
				estudiantes.nombres,
				carreras.nombrecarrera, 
				docentes.apellidos, docentes.nombres,
				tipopago.mediopago,
				matriculas.ciclo, matriculas.precio
		FROM matriculas
		ORDER BY matriculas.idmatricula DESC;
END $$

CALL spu_matriculas_listar();
