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
DROP TABLE IF EXISTS ``;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE `Torneos` (
    `TorneoId` INTEGER NOT NULL,
    `Nombre` VARCHAR(64) NOT NULL,
    `Inicio` DATE NOT NULL,
    `Fin` DATE NOT NULL,
    `FotoURL` VARCHAR(256) NOT NULL,
    `Borrado` DATETIME,
    PRIMARY KEY (`TorneoId`)
);

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

CREATE TABLE `Roles` (
    `RolId` INTEGER NOT NULL,
    `Descripcion` VARCHAR(64) NOT NULL,
    `Borrado` DATETIME,
    PRIMARY KEY (`RolId`)
);

CREATE TABLE `Equipos` (
    `EquipoId` INTEGER NOT NULL,
    `TorneoId` INTEGER NOT NULL,
    `Nombre` VARCHAR(64) NOT NULL,
    `LogoURL` VARCHAR(128) NOT NULL,
    `Borrado` DATETIME,
    PRIMARY KEY (`EquipoId`)
);

CREATE TABLE `Jugadores` (
    `JugadorId` INTEGER NOT NULL,
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
    `EquipoId` INTEGER NOT NULL,
    PRIMARY KEY (`JugadorId`)
);

CREATE TABLE `Partidos` (
    `PartidoId` INTEGER NOT NULL,
    `Fecha` DATE NOT NULL,
    `EquipoId` INTEGER NOT NULL,
    `FechaId` INTEGER NOT NULL,
    PRIMARY KEY (`PartidoId`, `EquipoId`)
);

CREATE TABLE `Canchas` (
    `CanchaId` INTEGER NOT NULL,
    `Direccion` VARCHAR(128) NOT NULL,
    `Borrado` DATETIME NOT NULL,
    PRIMARY KEY (`CanchaId`)
);

CREATE TABLE `Sanciones` (
    `SancionId` INTEGER NOT NULL,
    `Inicio` DATE NOT NULL,
    `TarjetaId` INTEGER NOT NULL,
    PRIMARY KEY (`SancionId`)
);

CREATE TABLE `Goles` (
    `GolId` INTEGER NOT NULL,
    `Minuto` INTEGER NOT NULL,
    `JugadorId` INTEGER NOT NULL,
    `PartidoId` INTEGER NOT NULL,
    PRIMARY KEY (`GolId`)
);

CREATE TABLE `Tarjetas` (
    `TarjetaId` INTEGER NOT NULL,
    `Minuto` INTEGER NOT NULL,
    `TipoTarjetaId` INTEGER NOT NULL,
    `PartidoId` INTEGER NOT NULL,
    PRIMARY KEY (`TarjetaId`)
);

CREATE TABLE `TipoTarjeta` (
    `TipoTarjetaId` INTEGER NOT NULL,
    `Descripcion` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`TipoTarjetaId`)
);

CREATE TABLE `Fechas` (
    `FechaId` INTEGER NOT NULL,
    `TorneoId` INTEGER NOT NULL,
    `NumeroFecha` INTEGER NOT NULL,
    PRIMARY KEY (`FechaId`)
);

CREATE TABLE `Permisos` (
    `PermisoId` INTEGER NOT NULL,
    `Permiso` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`PermisoId`)
);

CREATE TABLE `` (
);

ALTER TABLE `Usuarios` ADD FOREIGN KEY (`PerfilUsuarioId`) REFERENCES `Roles`(`RolId`);
ALTER TABLE `Equipos` ADD FOREIGN KEY (`TorneoId`) REFERENCES `Torneos`(`TorneoId`);
ALTER TABLE `Jugadores` ADD FOREIGN KEY (`CreadorUsuarioId`) REFERENCES `Usuarios`(`UsuarioId`);
ALTER TABLE `Jugadores` ADD FOREIGN KEY (`EquipoId`) REFERENCES `Equipos`(`EquipoId`);
ALTER TABLE `Partidos` ADD FOREIGN KEY (`FechaId`) REFERENCES `Fechas`(`FechaId`);
ALTER TABLE `Fechas` ADD FOREIGN KEY (`TorneoId`) REFERENCES `Torneos`(`TorneoId`);