CREATE TABLE log_estudiante
(
	ID_log_estudiante int PRIMARY KEY AUTO_INCREMENT,
	ID_estudiante int NOT NULL,
	Fecha_login datetime NOT NULL,
	Fecha_logout datetime,
	Acciones VARCHAR(500) NOT NULL
); 