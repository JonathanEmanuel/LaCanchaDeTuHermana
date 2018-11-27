SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `Torneos`;
DROP TABLE IF EXISTS `Usuarios`;
DROP TABLE IF EXISTS `Roles`;
DROP TABLE IF EXISTS `Equipos`;
DROP TABLE IF EXISTS `Jugadores`;
DROP TABLE IF EXISTS `Partidos`;
DROP TABLE IF EXISTS `Canchas`;
DROP TABLE IF EXISTS `Sanciones`;
DROP TABLE IF EXISTS `Goles`;
DROP TABLE IF EXISTS `Tarjetas`;
DROP TABLE IF EXISTS `TipoTarjeta`;
DROP TABLE IF EXISTS `Fechas`;
DROP TABLE IF EXISTS `Permisos`;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE `Usuarios` (
    `UsuarioId` INTEGER NOT NULL AUTO_INCREMENT,
    `Apellido` VARCHAR(64) NOT NULL,
    `Nombres` VARCHAR(64) NOT NULL,
    `NombreUsuario` VARCHAR(64) NOT NULL,
    `Password` VARCHAR(64) NOT NULL,
    `Email` VARCHAR(128) NOT NULL,
    `Telefono` VARCHAR(24),
    `Borrado` DATETIME,
    PRIMARY KEY (`UsuarioId`)
);

CREATE TABLE `Usuarios_Roles` (
    `UsuarioRolId` INTEGER NOT NULL AUTO_INCREMENT,
    `UsuarioId` INTEGER NOT NULL,
    `RolId` INTEGER NOT NULL,
    PRIMARY KEY (`UsuarioRolId`)
);

CREATE TABLE `Roles` (
    `RolId` INTEGER NOT NULL AUTO_INCREMENT,
    `Descripcion` VARCHAR(64) NOT NULL,
    `Borrado` DATETIME,
    PRIMARY KEY (`RolId`)
);

CREATE TABLE `Roles_Permisos` (
    `RolPermisoId` INTEGER NOT NULL AUTO_INCREMENT,
    `RolId` INTEGER NOT NULL,
    `PermisoId` INTEGER NOT NULL,
    PRIMARY KEY (`RolPermisoId`)
);

CREATE TABLE `Permisos` (
    `PermisoId` INTEGER NOT NULL AUTO_INCREMENT,
    `Descripcion` VARCHAR(128) NOT NULL,
    `Borrado` DATETIME,
    PRIMARY KEY (`PermisoId`)
);

CREATE TABLE `Usuarios_Torneos` (
    `UsuarioTorneoId` INTEGER NOT NULL AUTO_INCREMENT,
    `UsuarioId` INTEGER NOT NULL,
    `TorneoId` INTEGER NOT NULL,
    PRIMARY KEY (`UsuarioTorneoId`)
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

CREATE TABLE `Jugadores` (
    `JugadorId` INTEGER NOT NULL AUTO_INCREMENT,
    `Nombres` VARCHAR(64) NOT NULL,
    `Apellido` VARCHAR(64) NOT NULL,
    `Suspendido` DATETIME,
    `DNI` VARCHAR(32) NOT NULL,
    `Nacimiento` DATE NOT NULL,
    `FotoURL` VARCHAR(256) NOT NULL,
    `Telefono` VARCHAR(24),
    `Creado` DATETIME NOT NULL,
    `EquipoId` INTEGER NOT NULL,
    `Borrado` DATETIME,
    `CreadorUsuarioId` INTEGER NOT NULL,
    PRIMARY KEY (`JugadorId`)
);

CREATE TABLE `Equipos` (
    `EquipoId` INTEGER NOT NULL AUTO_INCREMENT,
    `TorneoId` INTEGER NOT NULL,
    `Nombre` VARCHAR(64) NOT NULL,
    `LogoURL` VARCHAR(128) NOT NULL,
    `Borrado` DATETIME,
    PRIMARY KEY (`EquipoId`)
);

CREATE TABLE `Equipos_Partidos` (
    `EquipoPartidoId` INTEGER NOT NULL AUTO_INCREMENT,
    `EquipoId` INTEGER NOT NULL,
    `PartidoId` INTEGER NOT NULL,
    PRIMARY KEY (`EquipoPartidoId`)
);

CREATE TABLE `Partidos` (
    `PartidoId` INTEGER NOT NULL AUTO_INCREMENT,
    `Fecha` DATE NOT NULL,
    `FechaId` INTEGER NOT NULL,
    `CanchaId` INTEGER NOT NULL,
    PRIMARY KEY (`PartidoId`)
);

CREATE TABLE `Canchas` (
    `CanchaId` INTEGER NOT NULL AUTO_INCREMENT,
    `Direccion` VARCHAR(128) NOT NULL,
    `Borrado` DATETIME NOT NULL,
    PRIMARY KEY (`CanchaId`)
);

CREATE TABLE `Fechas` (
    `FechaId` INTEGER NOT NULL AUTO_INCREMENT,
    `TorneoId` INTEGER NOT NULL,
    `NumeroFecha` INTEGER NOT NULL,
    PRIMARY KEY (`FechaId`)
);

CREATE TABLE `Goles` (
    `GolId` INTEGER NOT NULL AUTO_INCREMENT,
    `Minuto` INTEGER NOT NULL,
    `JugadorId` INTEGER NOT NULL,
    `PartidoId` INTEGER NOT NULL,
    PRIMARY KEY (`GolId`)
);

CREATE TABLE `Tarjetas` (
    `TarjetaId` INTEGER NOT NULL AUTO_INCREMENT,
    `Minuto` INTEGER NOT NULL,
    `TipoTarjetaId` INTEGER NOT NULL,
    `PartidoId` INTEGER NOT NULL,
    PRIMARY KEY (`TarjetaId`)
);

CREATE TABLE `TipoTarjeta` (
    `TipoTarjetaId` INTEGER NOT NULL AUTO_INCREMENT,
    `Descripcion` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`TipoTarjetaId`)
);

CREATE TABLE `Sanciones` (
    `SancionId` INTEGER NOT NULL AUTO_INCREMENT,
    `Inicio` DATE NOT NULL,
    `TarjetaId` INTEGER NOT NULL,
    `CantidadFechas` INTEGER NOT NULL,
    PRIMARY KEY (`SancionId`)
);

ALTER TABLE `Equipos` ADD FOREIGN KEY (`TorneoId`) REFERENCES `Torneos`(`TorneoId`);
ALTER TABLE `Jugadores` ADD FOREIGN KEY (`CreadorUsuarioId`) REFERENCES `Usuarios`(`UsuarioId`);
ALTER TABLE `Jugadores` ADD FOREIGN KEY (`EquipoId`) REFERENCES `Equipos`(`EquipoId`);
ALTER TABLE `Partidos` ADD FOREIGN KEY (`FechaId`) REFERENCES `Fechas`(`FechaId`);
ALTER TABLE `Partidos` ADD FOREIGN KEY (`CanchaId`) REFERENCES `Canchas`(`CanchaId`);
ALTER TABLE `Fechas` ADD FOREIGN KEY (`TorneoId`) REFERENCES `Torneos`(`TorneoId`);
ALTER TABLE `Tarjetas` ADD FOREIGN KEY (`PartidoId`) REFERENCES `Partidos`(`PartidoId`);
ALTER TABLE `Usuarios_Roles` ADD FOREIGN KEY (`UsuarioId`) REFERENCES `Usuarios`(`UsuarioId`);
ALTER TABLE `Usuarios_Roles` ADD FOREIGN KEY (`RolId`) REFERENCES `Roles`(`RolId`);
ALTER TABLE `Roles_Permisos` ADD FOREIGN KEY (`RolId`) REFERENCES `Roles`(`RolId`);
ALTER TABLE `Roles_Permisos` ADD FOREIGN KEY (`PermisoId`) REFERENCES `Permisos`(`PermisoId`);
ALTER TABLE `Usuarios_Torneos` ADD FOREIGN KEY (`UsuarioId`) REFERENCES `Usuarios`(`UsuarioId`);
ALTER TABLE `Usuarios_Torneos` ADD FOREIGN KEY (`TorneoId`) REFERENCES `Torneos`(`TorneoId`);
ALTER TABLE `Equipos_Partidos` ADD FOREIGN KEY (`EquipoId`) REFERENCES `Equipos`(`EquipoId`);
ALTER TABLE `Equipos_Partidos` ADD FOREIGN KEY (`PartidoId`) REFERENCES `Partidos`(`PartidoId`);


INSERT INTO `Roles` (`Descripcion`) 
    VALUES ('ADMINISTRADOR'), ('CLIENTE');

INSERT INTO `Usuarios` (`Apellido`, `Nombres`, `NombreUsuario`, `Password`, `Email`) 
    VALUES ('Cruz', 'jonathan', 'admin', 'admin123', 'admin@mail.com.ar');

INSERT INTO `Usuarios_Roles` (`UsuarioId`, `RolId`) 
    VALUES (1, 1);
