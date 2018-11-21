SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `Usuarios`;
DROP TABLE IF EXISTS `PerfilUsuario`;
DROP TABLE IF EXISTS `Torneos`;

SET FOREIGN_KEY_CHECKS = 1;


CREATE TABLE `Usuarios` (
    `UsuarioId` INTEGER NOT NULL,
    `Apellido` VARCHAR(64) NOT NULL,
    `Nombres` VARCHAR(64) NOT NULL,
    `NombreUsuario` VARCHAR(64) NOT NULL,
    `Password` VARCHAR(64) NOT NULL,
    `Email` VARCHAR(128) NOT NULL,
    `Telefono` VARCHAR(24),
    `PerfilUsuarioId` INTEGER NOT NULL,
    `Borrado` DATETIME,
    PRIMARY KEY (`UsuarioId`)
);

CREATE TABLE `PerfilUsuario` (
    `PerfilUsuarioId` INTEGER NOT NULL,
    `Descripcion` VARCHAR(64) NOT NULL,
    `Borrado` DATETIME,
    PRIMARY KEY (`PerfilUsuarioId`)
);


CREATE TABLE `Torneos` (
    `TorneoId` INTEGER NOT NULL AUTO_INCREMENT,
    `Nombre` VARCHAR(64) NOT NULL,
    `Inicio` DATE NOT NULL,
    `Fin` DATE NOT NULL,
    `FotoURL` VARCHAR(256) NOT NULL,
    `Borrado` DATETIME,
    PRIMARY KEY (`TorneoId`)
);

CREATE TABLE `UsuariosTorneos` (
    `UsuarioId` INTEGER NOT NULL,
    `TorneoId` INTEGER NOT NULL,
    PRIMARY KEY (`UsuarioId`, `TorneoId`)
);

ALTER TABLE `Usuarios` ADD FOREIGN KEY (`PerfilUsuarioId`) REFERENCES `PerfilUsuario`(`PerfilUsuarioId`);




INSERT INTO `perfilusuario` (`PerfilUsuarioId`, `Descripcion`, `Borrado`) 
    VALUES ('1', 'ADMINISTRADOR', NULL), ('2', 'CLIENTE', NULL)

INSERT INTO `usuarios` (`UsuarioId`, `Apellido`, `Nombres`, `NombreUsuario`, `Password`, `Email`, `Telefono`, `PerfilUsuarioId`, `Borrado`) 
    VALUES ('1', 'Cruz', 'jonathan', 'admin', 'admin123', 'admin@mail.com.ar', NULL, '1', NULL);