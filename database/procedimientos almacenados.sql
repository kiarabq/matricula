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
	IN _celular			CHAR(9)
)
BEGIN
	INSERT INTO estudiantes (idestudiante, apellidos, nombres, dni, genero, celular) VALUES
	(_idestudiante, _apellidos, _nombres, _dni, _genero, _celular);
END $$
CALL spu_estudiantes_registrar(6, 'Muñoz', 'Omar', '75837291', 'M', '');

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
				estudiantes.celular
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
CREATE PROCEDURE spu_ciclo_listar()
BEGIN
	SELECT * FROM ciclo ORDER BY idciclo DESC;
END $$

CALL spu_ciclo_listar();


DELIMITER $$
CREATE PROCEDURE spu_matriculas_listar()
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
    JOIN ciclo ci ON m.idciclo = ci.idciclo
    ORDER BY m.idmatricula DESC;
END $$

CALL spu_matriculas_listar();

DELIMITER $$
CREATE PROCEDURE spu_matriculas_registrar(
    IN _nombres	  VARCHAR(40),
    IN _apellidos VARCHAR(50),
    IN _dni 	CHAR(8),
    IN _celular CHAR(9),
    IN _genero 	CHAR(1),
    IN usuario_id INT,
    IN carrera_id INT,
    IN docente_id INT,
    IN tipopago_id INT,
    IN ciclo_id  INT,
    IN precio 	DECIMAL(7,2)
)
BEGIN
    INSERT INTO estudiantes (nombres, apellidos, dni, celular, genero) VALUES (_nombres, _apellidos, _dni, _celular, _genero);
    SET @idestudiante = LAST_INSERT_ID();
    
    INSERT INTO matriculas (idestudiante, idusuario, idcarrera, iddocente, idtipopago, idciclo, precio, fecharegistro)
    VALUES (@idestudiante, usuario_id, carrera_id, docente_id, tipopago_id, ciclo_id, precio, NOW());
END $$

CALL spu_matriculas_registrar('Valentino', 'Ramirez ', '75688231', '978927171', 'M', 1, 5, 4, 1, 1, 300.00);
CALL spu_matriculas_listar();

DELIMITER $$
CREATE PROCEDURE spu_matriculas_eliminar(
    IN _idmatricula INT
)
BEGIN
    DELETE FROM matriculas WHERE idmatricula = _idmatricula;
END $$

CALL spu_matriculas_eliminar(6);

DELIMITER $$
CREATE PROCEDURE spu_matriculas_actualizar
(
    IN matricula_id INT,
    IN carrera_id INT,
    IN docente_id INT,
    IN tipopago_id INT,
    IN ciclo_id INT,
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
END $$

CALL spu_matriculas_actualizar(1, 1, 3, 1, 1, 300.00);


DELIMITER $$
CREATE PROCEDURE spu_matriculas_getdata(IN _idmatricula INT)
BEGIN
	SELECT	matriculas.idmatricula, matriculas.idestudiante, matriculas.idcarrera, 
		matriculas.idusuario, matriculas.iddocente, matriculas.idtipopago, 
		matriculas.idciclo, matriculas.precio, estudiantes.apellidos, estudiantes.nombres,
		estudiantes.dni, estudiantes.genero, estudiantes.celular
		FROM matriculas
		INNER JOIN estudiantes ON estudiantes.idestudiante=matriculas.idestudiante
		WHERE idmatricula = _idmatricula;
END $$