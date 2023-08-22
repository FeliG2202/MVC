-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-08-2023 a las 17:54:34
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_mysql_crud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `idMenu` int(11) NOT NULL,
  `menuNombre` varchar(50) NOT NULL,
  `menuEstado` enum('online','offline','online/offline') NOT NULL DEFAULT 'online',
  `idRol` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`idMenu`, `menuNombre`, `menuEstado`, `idRol`) VALUES
(1, 'Personas', 'online', '3'),
(2, 'Usuarios', 'online', '3'),
(3, 'Perfiles', 'online', '3'),
(4, 'Menu', 'online', '3'),
(10, 'Perfiles Usuario', 'online', '3'),
(11, 'Formulario', 'online/offline', '1,2,3'),
(12, 'Ingresar Menú Almuerzo', 'online', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_seleccionado_dia_persona`
--

CREATE TABLE `menu_seleccionado_dia_persona` (
  `idMenuSeleccionadoDiaPersona` int(11) NOT NULL,
  `idPersona` int(11) NOT NULL,
  `idNutriMenu` int(11) NOT NULL,
  `menuSeleccionadoDiaPersona` blob NOT NULL,
  `fecha_actual` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `menu_seleccionado_dia_persona`
--

INSERT INTO `menu_seleccionado_dia_persona` (`idMenuSeleccionadoDiaPersona`, `idPersona`, `idNutriMenu`, `menuSeleccionadoDiaPersona`, `fecha_actual`) VALUES
(1, 1, 17, 0x536f7061206465206d7574652c4172726f7a20636f6e20706f6c6c6f202c506f6c6c6f20616c20686f726e6f2c4d61636172726f6e65732c4a75676f206465204665696a6f61, '2023-08-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutriacomp`
--

CREATE TABLE `nutriacomp` (
  `idNutriAcomp` int(11) NOT NULL,
  `nutriAcompNombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nutriacomp`
--

INSERT INTO `nutriacomp` (`idNutriAcomp`, `nutriAcompNombre`) VALUES
(1, 'Ensalada rusa'),
(2, 'Patacones'),
(3, 'Lentejas guisadas'),
(4, 'Maduro cocinado'),
(5, 'Papa Francesa'),
(6, 'Espagettis'),
(7, 'Yuca al vapor'),
(8, 'Yuca frita'),
(9, 'Monedas de Platano'),
(10, 'Papa Chorreada'),
(11, 'Puré de papa'),
(12, 'Croquetas de yuca'),
(13, 'Papa, yuca en salsa criolla'),
(14, 'Croquetas de arracacha'),
(15, 'papas a la plancha'),
(16, 'Maduro al horno'),
(17, 'Papas Doradas'),
(18, 'Aborrajado'),
(19, 'Criolla frita'),
(20, 'hhhffff4512'),
(21, 'Menú #1'),
(22, 'Prueba Acomp'),
(23, 'Papa Francesa'),
(24, 'Monedas de Platano'),
(25, 'petaconas con carne'),
(26, 'Monedas de Platano4587'),
(27, 'Monedas de Platano'),
(28, '47455');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutriarroz`
--

CREATE TABLE `nutriarroz` (
  `idNutriArroz` int(11) NOT NULL,
  `nutriArrozNombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nutriarroz`
--

INSERT INTO `nutriarroz` (`idNutriArroz`, `nutriArrozNombre`) VALUES
(1, 'Arroz blanco'),
(2, 'Arroz con pollo '),
(3, '14523333'),
(4, 'Arroz Prueba'),
(5, 'Arroz con pavo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutribebida`
--

CREATE TABLE `nutribebida` (
  `idNutriBebida` int(11) NOT NULL,
  `nutriBebidaNombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nutribebida`
--

INSERT INTO `nutribebida` (`idNutriBebida`, `nutriBebidaNombre`) VALUES
(1, 'Jugo de Fresa'),
(2, 'Jugo de Feijo'),
(3, 'Jugo de Feijoa'),
(4, 'JUGO DE MORA'),
(5, 'Bebida Pruebad'),
(6, 'jugo de mora'),
(7, 'Bebida Prueba 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutridias`
--

CREATE TABLE `nutridias` (
  `idNutriDias` int(11) NOT NULL,
  `nutriDiasNombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nutridias`
--

INSERT INTO `nutridias` (`idNutriDias`, `nutriDiasNombre`) VALUES
(1, 'Lunes'),
(2, 'Martes'),
(3, 'Miercoles'),
(4, 'Jueves'),
(5, 'Viernes'),
(6, 'Sabado'),
(7, 'Domingo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutrienerge`
--

CREATE TABLE `nutrienerge` (
  `idNutriEnerge` int(11) NOT NULL,
  `nutriEnergeNombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nutrienerge`
--

INSERT INTO `nutrienerge` (`idNutriEnerge`, `nutriEnergeNombre`) VALUES
(1, 'Macarrones'),
(2, 'Prueba Energ'),
(3, '*/h/*');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutriensal`
--

CREATE TABLE `nutriensal` (
  `idNutriEnsal` int(11) NOT NULL,
  `nutriEnsalNombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nutriensal`
--

INSERT INTO `nutriensal` (`idNutriEnsal`, `nutriEnsalNombre`) VALUES
(1, 'Lechuga/zanahoria/cebollo'),
(2, 'Ensalada Prue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutrimenu`
--

CREATE TABLE `nutrimenu` (
  `idNutriMenu` int(11) NOT NULL,
  `idNutriTipo` int(11) NOT NULL,
  `idNutriDias` int(11) NOT NULL,
  `idNutriSopa` int(11) NOT NULL,
  `idNutriArroz` int(11) NOT NULL,
  `idNutriProte` int(11) NOT NULL,
  `idNutriEnerge` int(11) NOT NULL,
  `idNutriAcomp` int(11) NOT NULL,
  `idNutriEnsal` int(11) NOT NULL,
  `idNutriBebida` int(11) NOT NULL,
  `nutriMenuSemana` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nutrimenu`
--

INSERT INTO `nutrimenu` (`idNutriMenu`, `idNutriTipo`, `idNutriDias`, `idNutriSopa`, `idNutriArroz`, `idNutriProte`, `idNutriEnerge`, `idNutriAcomp`, `idNutriEnsal`, `idNutriBebida`, `nutriMenuSemana`) VALUES
(1, 1, 1, 1, 1, 1, 1, 17, 1, 3, 1),
(2, 2, 1, 1, 1, 1, 1, 17, 1, 3, 1),
(3, 1, 2, 2, 1, 1, 1, 18, 1, 4, 0),
(4, 2, 2, 2, 1, 1, 1, 18, 1, 4, 0),
(5, 1, 3, 1, 1, 1, 1, 17, 1, 2, 1),
(6, 2, 3, 1, 1, 1, 1, 17, 1, 2, 1),
(7, 1, 4, 1, 1, 1, 1, 17, 1, 2, 0),
(8, 2, 4, 1, 1, 1, 1, 17, 1, 2, 0),
(9, 1, 5, 8, 4, 3, 2, 22, 2, 5, 1),
(10, 2, 5, 8, 4, 3, 2, 22, 2, 5, 1),
(11, 1, 6, 4, 2, 2, 1, 17, 2, 4, 0),
(12, 2, 6, 4, 2, 2, 1, 17, 2, 4, 0),
(15, 1, 7, 2, 3, 1, 3, 16, 1, 4, 1),
(16, 2, 7, 2, 3, 1, 3, 16, 1, 4, 1),
(17, 1, 1, 2, 2, 1, 1, 15, 2, 3, 0),
(18, 2, 1, 2, 2, 1, 1, 15, 2, 3, 0),
(19, 1, 2, 1, 2, 1, 1, 16, 1, 5, 1),
(20, 2, 2, 1, 2, 1, 1, 16, 1, 5, 1),
(21, 1, 3, 2, 2, 1, 2, 18, 1, 2, 0),
(22, 2, 3, 2, 2, 1, 2, 18, 1, 2, 0),
(23, 1, 4, 1, 2, 1, 1, 14, 1, 2, 1),
(24, 2, 4, 1, 2, 1, 1, 14, 1, 2, 1),
(25, 1, 5, 1, 1, 2, 1, 11, 1, 4, 0),
(26, 2, 5, 1, 1, 2, 1, 11, 1, 4, 0),
(27, 1, 6, 2, 2, 1, 1, 16, 1, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutriprote`
--

CREATE TABLE `nutriprote` (
  `idNutriProte` int(11) NOT NULL,
  `nutriProteNombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nutriprote`
--

INSERT INTO `nutriprote` (`idNutriProte`, `nutriProteNombre`) VALUES
(1, 'Pollo al horno'),
(2, 'carne asada'),
(3, 'Prueba Proteina'),
(4, 'carne a la parrilla'),
(5, 'Pollo al horno'),
(6, 'carne asada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutrisopa`
--

CREATE TABLE `nutrisopa` (
  `idNutriSopa` int(11) NOT NULL,
  `nutriSopaNombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nutrisopa`
--

INSERT INTO `nutrisopa` (`idNutriSopa`, `nutriSopaNombre`) VALUES
(1, 'Sopa de pastas'),
(2, 'Sopa de mute'),
(3, 'Sopa de verduras'),
(4, 'Sopa de avena'),
(5, 'Sopa de cuchuco'),
(6, 'Sopa de cebada'),
(7, 'Crema de espinaca'),
(8, 'Sopa Prueba'),
(9, 'Sopa de verduras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutritipo`
--

CREATE TABLE `nutritipo` (
  `idNutriTipo` int(11) NOT NULL,
  `nutriTipoNombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nutritipo`
--

INSERT INTO `nutritipo` (`idNutriTipo`, `nutriTipoNombre`) VALUES
(1, 'Menú #1'),
(2, 'Menú #2'),
(3, 'Menu Prueba'),
(4, 'Menú #4'),
(5, 'Menú #5'),
(6, 'Menú infantil '),
(7, 'Menu prueba 50mil'),
(8, 'menú infantil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opcionesmenu`
--

CREATE TABLE `opcionesmenu` (
  `idOpcionMenu` int(11) NOT NULL,
  `idMenu` int(11) NOT NULL,
  `opcionMenuNombre` varchar(45) NOT NULL,
  `opcionMenuEnlace` varchar(50) NOT NULL,
  `opcionesmenu_folder` varchar(45) NOT NULL,
  `opcionMenuEstado` enum('online','offline','online/offline') NOT NULL DEFAULT 'online',
  `idRol` varchar(45) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `opcionesmenu`
--

INSERT INTO `opcionesmenu` (`idOpcionMenu`, `idMenu`, `opcionMenuNombre`, `opcionMenuEnlace`, `opcionesmenu_folder`, `opcionMenuEstado`, `idRol`) VALUES
(6, 4, 'registrar Opciones Menu', 'frmRegOpcionesMenu', 'frmMenu', 'online', '3'),
(7, 4, 'registrar Menu', 'frmRegMenu', 'frmMenu', 'online', '3'),
(8, 4, 'Consultar Menu', 'frmConMenu', 'frmMenu', 'online', '3'),
(12, 1, 'Registrar personas', 'frmRegPersona', 'frmPersona', 'online', '3'),
(13, 2, 'registrar Usuarios', 'frmRegUsuario', 'frmUsuarios', 'online', '3'),
(14, 1, 'consultar personas', 'FrmConPersona', 'frmPersona', 'online', '3'),
(15, 2, 'Consultar Usuarios', 'frmConUsuarios', 'frmUsuarios', 'online', '3'),
(16, 3, 'registrar perfiles', 'frmRegRol', 'frmRol', 'online', '3'),
(17, 10, 'Registrar Rol Usuario', 'frmRegRolUsuario', 'frmRol', 'online', '3'),
(18, 4, 'Asignar Menu Principal a Perfiles', 'frmRegRolMenu', 'frmMenu', 'online', '3'),
(19, 11, 'Almuerzo', 'frmPedPersId', 'frmPed', 'online/offline', '1,2,3'),
(20, 12, 'Tipo Menu', 'frmAlmRegTipo', 'frmAlmTipo', 'online', '1'),
(21, 12, 'Sopa', 'frmAlmRegSopa', 'frmAlmSopa', 'online', '1'),
(22, 12, 'Acompañamiento', 'frmAlmRegAcomp', 'frmAlmAcomp', 'online', '1'),
(23, 12, 'Bebida', 'frmAlmRegBebida', 'frmAlmBebida', 'online', '1'),
(24, 12, 'Energetico', 'frmAlmRegEnerge', 'frmAlmEnerge', 'online', '1'),
(25, 12, 'Ensalada', 'frmAlmRegEnsal', 'frmAlmEnsal', 'online', '1'),
(26, 12, 'Proteina', 'frmAlmRegProte', 'frmAlmProte', 'online', '1'),
(27, 11, 'Menu', 'frmAlmRegMenu', 'frmAlmMenu', 'online', '1,3'),
(28, 12, 'Arroz', 'frmAlmRegArroz', 'frmAlmArroz', 'online', '1'),
(29, 11, 'Con Menu', 'frmAlmConMenu', 'frmAlmMenu', 'online', '1,3'),
(32, 10, 'Registrar Perfil', 'frmRegRol', 'frmRol', 'online', '1'),
(33, 11, 'Con Almuerzos', 'frmConPedMenu', 'frmPed', 'online', '1,3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `idPersona` int(11) NOT NULL,
  `personaNombreCompleto` varchar(50) NOT NULL,
  `personaNumberCell` varchar(10) NOT NULL,
  `personaCorreo` varchar(50) NOT NULL,
  `personaDocumento` varchar(11) NOT NULL,
  `personasCodigo` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`idPersona`, `personaNombreCompleto`, `personaNumberCell`, `personaCorreo`, `personaDocumento`, `personasCodigo`) VALUES
(1, 'Felipe Gavilán Castaño', '3156078059', 'gstjunicalmedicalsas@gmail.com', '1005958885', '894-799'),
(2, 'Ubaldo Matildo', '3124568574', 'masdygvduy', '12345', NULL),
(4, 'Maxilimiliano', '145235698', 'Masculino', '51351511', NULL),
(6, 'maria', '0', 'Masculino', '23456', NULL),
(7, 'felipee', '0', 'Masculino', '123456', NULL),
(11, 'Adrian Chacon Melo', '3145416492', 'chaconadrian2029@gmail.com', '1003748672', NULL),
(12, 'Paola', '123', 'jpradaf', '28719410', NULL),
(21, 'Luz Rocha', '1111', 'xx2@gmail.com', '1013623037', NULL),
(22, 'JOSE ANTONIO CASANOVA MORENO', '3118813872', 'jcasanom@junical.com.co', '11225461', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `rolNombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `rolNombre`) VALUES
(1, 'Administrador'),
(3, 'Root'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolesmenu`
--

CREATE TABLE `rolesmenu` (
  `idRolMenu` int(11) NOT NULL,
  `rolMenuEstado` enum('activo','Inactivo') NOT NULL,
  `idMenu` int(11) NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `rolesmenu`
--

INSERT INTO `rolesmenu` (`idRolMenu`, `rolMenuEstado`, `idMenu`, `idRol`) VALUES
(1, 'activo', 11, 5),
(2, 'activo', 11, 5),
(3, 'activo', 12, 8),
(4, 'activo', 4, 8),
(5, 'activo', 3, 8),
(6, 'activo', 10, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `usuarioLogin` char(15) NOT NULL,
  `usuarioPassword` varchar(60) NOT NULL,
  `usuarioEstado` enum('Activo','Inactivo') NOT NULL,
  `idPersonas` int(11) NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usuarioLogin`, `usuarioPassword`, `usuarioEstado`, `idPersonas`, `idRol`) VALUES
(1, 'Maria sdssds', 'Maria123', 'Inactivo', 1, 2),
(2, 'Ubaldo', 'Ubaldo123', 'Inactivo', 2, 2),
(3, 'maxi', 'Maxi123', 'Inactivo', 4, 2),
(6, 'Maria', '11323232', 'Inactivo', 1, 2),
(12, 'Fgavilac', '1234', 'Activo', 4, 3),
(36, 'Sleon', '1212', 'Activo', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosroles`
--

CREATE TABLE `usuariosroles` (
  `idUsuarioRol` int(11) NOT NULL,
  `usuarioRolEstado` enum('true','false') NOT NULL DEFAULT 'true',
  `idUsuario` int(11) NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuariosroles`
--

INSERT INTO `usuariosroles` (`idUsuarioRol`, `usuarioRolEstado`, `idUsuario`, `idRol`) VALUES
(13, 'true', 2, 5),
(14, 'true', 2, 7),
(15, 'true', 3, 5),
(16, 'true', 3, 7),
(17, 'true', 12, 5),
(18, 'true', 12, 7),
(27, 'true', 6, 8),
(29, 'true', 6, 5),
(30, 'true', 2, 8),
(32, 'true', 1, 5),
(33, 'true', 1, 8),
(34, 'true', 1, 7),
(35, 'true', 12, 8);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_nutrimenu`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_nutrimenu` (
`idNutriMenu` int(11)
,`nutriTipoNombre` varchar(45)
,`nutriDiasNombre` varchar(45)
,`nutriSopaNombre` varchar(45)
,`nutriArrozNombre` varchar(45)
,`nutriProteNombre` varchar(45)
,`nutriEnergeNombre` varchar(45)
,`nutriAcompNombre` varchar(45)
,`nutriEnsalNombre` varchar(45)
,`nutriBebidaNombre` varchar(45)
,`nutriMenuSemana` int(1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_rolesusuarios`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_rolesusuarios` (
`idUsuarioRol` int(11)
,`idUsuario` int(11)
,`idRol` int(11)
,`usuarioRolEstado` enum('true','false')
,`usuarioLogin` char(15)
,`rolNombre` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_usuariosroles`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_usuariosroles` (
`idUsuarioRol` int(11)
,`usuarioRolEstado` enum('true','false')
,`idUsuario` int(11)
,`idRol` int(11)
,`usuarioLogin` char(15)
,`usuarioEstado` enum('Activo','Inactivo')
,`rolNombre` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `view_nutrimenu`
--
DROP TABLE IF EXISTS `view_nutrimenu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_nutrimenu`  AS SELECT `nutrimenu`.`idNutriMenu` AS `idNutriMenu`, `nutritipo`.`nutriTipoNombre` AS `nutriTipoNombre`, `nutridias`.`nutriDiasNombre` AS `nutriDiasNombre`, `nutrisopa`.`nutriSopaNombre` AS `nutriSopaNombre`, `nutriarroz`.`nutriArrozNombre` AS `nutriArrozNombre`, `nutriprote`.`nutriProteNombre` AS `nutriProteNombre`, `nutrienerge`.`nutriEnergeNombre` AS `nutriEnergeNombre`, `nutriacomp`.`nutriAcompNombre` AS `nutriAcompNombre`, `nutriensal`.`nutriEnsalNombre` AS `nutriEnsalNombre`, `nutribebida`.`nutriBebidaNombre` AS `nutriBebidaNombre`, `nutrimenu`.`nutriMenuSemana` AS `nutriMenuSemana` FROM (((((((((`nutrimenu` join `nutritipo` on(`nutrimenu`.`idNutriTipo` = `nutritipo`.`idNutriTipo`)) join `nutridias` on(`nutrimenu`.`idNutriDias` = `nutridias`.`idNutriDias`)) join `nutrisopa` on(`nutrimenu`.`idNutriSopa` = `nutrisopa`.`idNutriSopa`)) join `nutriarroz` on(`nutrimenu`.`idNutriArroz` = `nutriarroz`.`idNutriArroz`)) join `nutriprote` on(`nutrimenu`.`idNutriProte` = `nutriprote`.`idNutriProte`)) join `nutrienerge` on(`nutrimenu`.`idNutriEnerge` = `nutrienerge`.`idNutriEnerge`)) join `nutriacomp` on(`nutrimenu`.`idNutriAcomp` = `nutriacomp`.`idNutriAcomp`)) join `nutriensal` on(`nutrimenu`.`idNutriEnsal` = `nutriensal`.`idNutriEnsal`)) join `nutribebida` on(`nutrimenu`.`idNutriBebida` = `nutribebida`.`idNutriBebida`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_rolesusuarios`
--
DROP TABLE IF EXISTS `view_rolesusuarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_rolesusuarios`  AS SELECT `a`.`idUsuarioRol` AS `idUsuarioRol`, `a`.`idUsuario` AS `idUsuario`, `a`.`idRol` AS `idRol`, `a`.`usuarioRolEstado` AS `usuarioRolEstado`, `b`.`usuarioLogin` AS `usuarioLogin`, `c`.`rolNombre` AS `rolNombre` FROM ((`usuariosroles` `a` join `usuarios` `b`) join `roles` `c`) WHERE `a`.`idUsuario` = `b`.`idUsuario` AND `a`.`idRol` = `c`.`idRol` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_usuariosroles`
--
DROP TABLE IF EXISTS `view_usuariosroles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_usuariosroles`  AS SELECT `ur`.`idUsuarioRol` AS `idUsuarioRol`, `ur`.`usuarioRolEstado` AS `usuarioRolEstado`, `ur`.`idUsuario` AS `idUsuario`, `ur`.`idRol` AS `idRol`, `us`.`usuarioLogin` AS `usuarioLogin`, `us`.`usuarioEstado` AS `usuarioEstado`, `ro`.`rolNombre` AS `rolNombre` FROM ((`usuariosroles` `ur` join `usuarios` `us`) join `roles` `ro`) WHERE `ur`.`idUsuario` = `us`.`idUsuario` AND `ur`.`idRol` = `ro`.`idRol` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`idMenu`);

--
-- Indices de la tabla `menu_seleccionado_dia_persona`
--
ALTER TABLE `menu_seleccionado_dia_persona`
  ADD PRIMARY KEY (`idMenuSeleccionadoDiaPersona`),
  ADD KEY `idPersona` (`idPersona`),
  ADD KEY `idNutriMenu` (`idNutriMenu`);

--
-- Indices de la tabla `nutriacomp`
--
ALTER TABLE `nutriacomp`
  ADD PRIMARY KEY (`idNutriAcomp`);

--
-- Indices de la tabla `nutriarroz`
--
ALTER TABLE `nutriarroz`
  ADD PRIMARY KEY (`idNutriArroz`);

--
-- Indices de la tabla `nutribebida`
--
ALTER TABLE `nutribebida`
  ADD PRIMARY KEY (`idNutriBebida`);

--
-- Indices de la tabla `nutridias`
--
ALTER TABLE `nutridias`
  ADD PRIMARY KEY (`idNutriDias`);

--
-- Indices de la tabla `nutrienerge`
--
ALTER TABLE `nutrienerge`
  ADD PRIMARY KEY (`idNutriEnerge`);

--
-- Indices de la tabla `nutriensal`
--
ALTER TABLE `nutriensal`
  ADD PRIMARY KEY (`idNutriEnsal`);

--
-- Indices de la tabla `nutrimenu`
--
ALTER TABLE `nutrimenu`
  ADD PRIMARY KEY (`idNutriMenu`),
  ADD KEY `idNutriTipo` (`idNutriTipo`),
  ADD KEY `idNutriDias` (`idNutriDias`),
  ADD KEY `idNutriSopa` (`idNutriSopa`),
  ADD KEY `idNutriArroz` (`idNutriArroz`),
  ADD KEY `idNutriProte` (`idNutriProte`),
  ADD KEY `idNutriEnerge` (`idNutriEnerge`),
  ADD KEY `idNutriAcomp` (`idNutriAcomp`),
  ADD KEY `idNutriEnsal` (`idNutriEnsal`),
  ADD KEY `idNutriBebida` (`idNutriBebida`);

--
-- Indices de la tabla `nutriprote`
--
ALTER TABLE `nutriprote`
  ADD PRIMARY KEY (`idNutriProte`);

--
-- Indices de la tabla `nutrisopa`
--
ALTER TABLE `nutrisopa`
  ADD PRIMARY KEY (`idNutriSopa`);

--
-- Indices de la tabla `nutritipo`
--
ALTER TABLE `nutritipo`
  ADD PRIMARY KEY (`idNutriTipo`);

--
-- Indices de la tabla `opcionesmenu`
--
ALTER TABLE `opcionesmenu`
  ADD PRIMARY KEY (`idOpcionMenu`),
  ADD KEY `FK-idMenu-opcionesmenu_idx` (`idMenu`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`idPersona`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`),
  ADD UNIQUE KEY `rolNombre` (`rolNombre`);

--
-- Indices de la tabla `rolesmenu`
--
ALTER TABLE `rolesmenu`
  ADD PRIMARY KEY (`idRolMenu`),
  ADD KEY `fk-idMenu-RolesMenu_idx` (`idMenu`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `login` (`usuarioLogin`),
  ADD UNIQUE KEY `usuarioLogin_2` (`usuarioLogin`),
  ADD KEY `idPersonas` (`idPersonas`),
  ADD KEY `usuarioLogin` (`usuarioLogin`);

--
-- Indices de la tabla `usuariosroles`
--
ALTER TABLE `usuariosroles`
  ADD PRIMARY KEY (`idUsuarioRol`),
  ADD UNIQUE KEY `indx-unico-idrol-idusuario-usuarioroles` (`idUsuario`,`idRol`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `idMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `menu_seleccionado_dia_persona`
--
ALTER TABLE `menu_seleccionado_dia_persona`
  MODIFY `idMenuSeleccionadoDiaPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `nutriacomp`
--
ALTER TABLE `nutriacomp`
  MODIFY `idNutriAcomp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `nutriarroz`
--
ALTER TABLE `nutriarroz`
  MODIFY `idNutriArroz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `nutribebida`
--
ALTER TABLE `nutribebida`
  MODIFY `idNutriBebida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `nutridias`
--
ALTER TABLE `nutridias`
  MODIFY `idNutriDias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `nutrienerge`
--
ALTER TABLE `nutrienerge`
  MODIFY `idNutriEnerge` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `nutriensal`
--
ALTER TABLE `nutriensal`
  MODIFY `idNutriEnsal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `nutrimenu`
--
ALTER TABLE `nutrimenu`
  MODIFY `idNutriMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `nutriprote`
--
ALTER TABLE `nutriprote`
  MODIFY `idNutriProte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `nutrisopa`
--
ALTER TABLE `nutrisopa`
  MODIFY `idNutriSopa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `nutritipo`
--
ALTER TABLE `nutritipo`
  MODIFY `idNutriTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `opcionesmenu`
--
ALTER TABLE `opcionesmenu`
  MODIFY `idOpcionMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rolesmenu`
--
ALTER TABLE `rolesmenu`
  MODIFY `idRolMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `usuariosroles`
--
ALTER TABLE `usuariosroles`
  MODIFY `idUsuarioRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `menu_seleccionado_dia_persona`
--
ALTER TABLE `menu_seleccionado_dia_persona`
  ADD CONSTRAINT `menu_seleccionado_dia_persona_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `personas` (`idPersona`),
  ADD CONSTRAINT `menu_seleccionado_dia_persona_ibfk_2` FOREIGN KEY (`idNutriMenu`) REFERENCES `nutrimenu` (`idNutriMenu`);

--
-- Filtros para la tabla `nutrimenu`
--
ALTER TABLE `nutrimenu`
  ADD CONSTRAINT `nutrimenu_ibfk_1` FOREIGN KEY (`idNutriTipo`) REFERENCES `nutritipo` (`idNutriTipo`),
  ADD CONSTRAINT `nutrimenu_ibfk_2` FOREIGN KEY (`idNutriDias`) REFERENCES `nutridias` (`idNutriDias`),
  ADD CONSTRAINT `nutrimenu_ibfk_3` FOREIGN KEY (`idNutriSopa`) REFERENCES `nutrisopa` (`idNutriSopa`),
  ADD CONSTRAINT `nutrimenu_ibfk_4` FOREIGN KEY (`idNutriArroz`) REFERENCES `nutriarroz` (`idNutriArroz`),
  ADD CONSTRAINT `nutrimenu_ibfk_5` FOREIGN KEY (`idNutriProte`) REFERENCES `nutriprote` (`idNutriProte`),
  ADD CONSTRAINT `nutrimenu_ibfk_6` FOREIGN KEY (`idNutriEnerge`) REFERENCES `nutrienerge` (`idNutriEnerge`),
  ADD CONSTRAINT `nutrimenu_ibfk_7` FOREIGN KEY (`idNutriAcomp`) REFERENCES `nutriacomp` (`idNutriAcomp`),
  ADD CONSTRAINT `nutrimenu_ibfk_8` FOREIGN KEY (`idNutriEnsal`) REFERENCES `nutriensal` (`idNutriEnsal`),
  ADD CONSTRAINT `nutrimenu_ibfk_9` FOREIGN KEY (`idNutriBebida`) REFERENCES `nutribebida` (`idNutriBebida`);

--
-- Filtros para la tabla `opcionesmenu`
--
ALTER TABLE `opcionesmenu`
  ADD CONSTRAINT `FK-idMenu-opcionesmenu` FOREIGN KEY (`idMenu`) REFERENCES `menus` (`idMenu`);

--
-- Filtros para la tabla `rolesmenu`
--
ALTER TABLE `rolesmenu`
  ADD CONSTRAINT `fk-idMenu-RolesMenu` FOREIGN KEY (`idMenu`) REFERENCES `menus` (`idMenu`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk-idPersona-usuarios` FOREIGN KEY (`idPersonas`) REFERENCES `personas` (`idPersona`);

--
-- Filtros para la tabla `usuariosroles`
--
ALTER TABLE `usuariosroles`
  ADD CONSTRAINT `usuariosroles_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
