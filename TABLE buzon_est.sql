CREARE TABLE buzon_est
(
	IDmensaje int AUTO_INCREMENT,

)

CREATE TABLE buzon_maestro
(
    IdMensaje int PRIMARY KEY AUTO_INCREMENT,
    IdEstudiante VARCHAR(20) NOT NULL,
    IdMaestro VARCHAR(20) NOT NULL,
    Asunto VARCHAR(150) NOT NULL,
    Cuerpo TEXT(500) NOT NULL,
    Fecha DATE NOT NULL,
    Visto boolean DEFAULT false
)