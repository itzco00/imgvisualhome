-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-04-2024 a las 22:56:51
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
-- Base de datos: `mobiliario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centrocostos`
--

CREATE TABLE `centrocostos` (
  `id` int(11) NOT NULL,
  `numordencompra` text NOT NULL,
  `tienda` text NOT NULL,
  `totalmuebles` float NOT NULL,
  `porcentajemuebles` float NOT NULL,
  `totalherrajes` float NOT NULL,
  `porcentajeherrajes` float NOT NULL,
  `totalextras` float NOT NULL,
  `porcentajextras` float NOT NULL,
  `totalinstalacionytransporte` float NOT NULL,
  `porcentajeinstalacionytransporte` float NOT NULL,
  `totalpop` float NOT NULL,
  `porcentajepop` float NOT NULL,
  `totalmaniquis` float NOT NULL,
  `porcentajemaniquis` float NOT NULL,
  `totalotros` float NOT NULL,
  `porcentajeotros` float NOT NULL,
  `totalmueblesherrajesextrasinstalacionytransportepopmaniquis` float NOT NULL,
  `totalmueblesherrajesextras` float NOT NULL,
  `totalentrevalorantespreciototalv1` float NOT NULL,
  `totalentrevalorantespreciototal2v2` float NOT NULL,
  `m2` float NOT NULL,
  `fecha` text NOT NULL,
  `fecha_entrega` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `centrocostos`
--

INSERT INTO `centrocostos` (`id`, `numordencompra`, `tienda`, `totalmuebles`, `porcentajemuebles`, `totalherrajes`, `porcentajeherrajes`, `totalextras`, `porcentajextras`, `totalinstalacionytransporte`, `porcentajeinstalacionytransporte`, `totalpop`, `porcentajepop`, `totalmaniquis`, `porcentajemaniquis`, `totalotros`, `porcentajeotros`, `totalmueblesherrajesextrasinstalacionytransportepopmaniquis`, `totalmueblesherrajesextras`, `totalentrevalorantespreciototalv1`, `totalentrevalorantespreciototal2v2`, `m2`, `fecha`, `fecha_entrega`) VALUES
(65, '17/4/2024_14:19', 'ACAPULCO ESCUDERO', 501229, 83, 45999.8, 8, 17212.4, 3, 0, 0, 6000, 1, 14000, 2, 16000, 3, 600441, 564441, 1506.87, 1416.52, 398.47, '17/4/2024', '17/04/2024');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centrocostosfinal`
--

CREATE TABLE `centrocostosfinal` (
  `id` int(11) NOT NULL,
  `numordencompra` text NOT NULL,
  `tienda` text NOT NULL,
  `preciofinal` float NOT NULL,
  `totalmueblesherrajesextrasinstalacionytransportepopmaniquis3` float NOT NULL,
  `anticipo` float NOT NULL,
  `totalconiva` float NOT NULL,
  `anticipoconiva` float NOT NULL,
  `m2` float NOT NULL,
  `totaltiendav2` float NOT NULL,
  `totaltiendaanticipov2` float NOT NULL,
  `m2tiendafinalv2` float NOT NULL,
  `finiquitov2` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `centrocostosfinal`
--

INSERT INTO `centrocostosfinal` (`id`, `numordencompra`, `tienda`, `preciofinal`, `totalmueblesherrajesextrasinstalacionytransportepopmaniquis3`, `anticipo`, `totalconiva`, `anticipoconiva`, `m2`, `totaltiendav2`, `totaltiendaanticipov2`, `m2tiendafinalv2`, `finiquitov2`) VALUES
(65, '17/4/2024_14:19', 'ACAPULCO ESCUDERO', 0, 600441, 180132, 96070.6, 28821.2, 398.47, 696512, 208954, 1506.87, 420309);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centrocostosfinalprov`
--

CREATE TABLE `centrocostosfinalprov` (
  `id` int(11) NOT NULL,
  `numordencompra` text NOT NULL,
  `tienda` text NOT NULL,
  `totalmueblesherrajesextrasinstalacionytransportepopmaniquis3prov` float NOT NULL,
  `anticipoprov` float NOT NULL,
  `totalconivaprov` float NOT NULL,
  `anticipoconivaprov` float NOT NULL,
  `m2prov` float NOT NULL,
  `totaltiendav2prov` float NOT NULL,
  `totaltiendaanticipov2prov` float NOT NULL,
  `m2tiendafinalv2prov` float NOT NULL,
  `finiquitov2prov` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `centrocostosfinalprov`
--

INSERT INTO `centrocostosfinalprov` (`id`, `numordencompra`, `tienda`, `totalmueblesherrajesextrasinstalacionytransportepopmaniquis3prov`, `anticipoprov`, `totalconivaprov`, `anticipoconivaprov`, `m2prov`, `totaltiendav2prov`, `totaltiendaanticipov2prov`, `m2tiendafinalv2prov`, `finiquitov2prov`) VALUES
(65, '17/4/2024_14:19', 'ACAPULCO ESCUDERO', 547229, 164169, 87556.6, 26267, 398.47, 634785, 190436, 1416.52, 383060);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centrocostosprov`
--

CREATE TABLE `centrocostosprov` (
  `id` int(11) NOT NULL,
  `numordencompra` text NOT NULL,
  `tienda` text NOT NULL,
  `totalmueblesprov` float NOT NULL,
  `porcentajemueblesprov` float NOT NULL,
  `totalherrajesprov` float NOT NULL,
  `porcentajeherrajesprov` float NOT NULL,
  `totalextrasprov` float NOT NULL,
  `porcentajextrasprov` float NOT NULL,
  `totalmueblesherrajesextrasinstalacionytransportepopmaniquisprov` float NOT NULL,
  `totalmueblesherrajesextrasprov` float NOT NULL,
  `totalentrevalorantespreciototalv1prov` float NOT NULL,
  `totalentrevalorantespreciototal2v2prov` float NOT NULL,
  `m2prov` float NOT NULL,
  `fechaprov` text NOT NULL,
  `fecha_entregaprov` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `centrocostosprov`
--

INSERT INTO `centrocostosprov` (`id`, `numordencompra`, `tienda`, `totalmueblesprov`, `porcentajemueblesprov`, `totalherrajesprov`, `porcentajeherrajesprov`, `totalextrasprov`, `porcentajextrasprov`, `totalmueblesherrajesextrasinstalacionytransportepopmaniquisprov`, `totalmueblesherrajesextrasprov`, `totalentrevalorantespreciototalv1prov`, `totalentrevalorantespreciototal2v2prov`, `m2prov`, `fechaprov`, `fecha_entregaprov`) VALUES
(64, '17/4/2024_14:19', 'ACAPULCO ESCUDERO', 501229, 0, 45999.8, 0, 0, 0, 547229, 547229, 1373.32, 1373.32, 398.47, '17/4/2024', '17/04/2024');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id_departamento` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_departamento`, `nombre`) VALUES
(1, 'entrada'),
(2, 'dama y caballero'),
(3, 'mujer hombre jr'),
(4, 'interior mujer'),
(5, 'infantil niño y niña'),
(6, 'toddler niño niña y bebes'),
(7, 'herrajes'),
(8, 'probadores'),
(9, 'paneles'),
(10, 'extras'),
(11, 'imagen'),
(12, 'otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompras`
--

CREATE TABLE `detallecompras` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `pieza` float NOT NULL,
  `precio` text NOT NULL,
  `subtotal` float NOT NULL,
  `departamentos` text NOT NULL,
  `subdepartamentos` text NOT NULL,
  `archivo` varchar(255) NOT NULL,
  `status` text NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `deleted2` int(11) NOT NULL DEFAULT 0,
  `carrito` int(11) NOT NULL DEFAULT 0,
  `unidad` text NOT NULL,
  `proveedor` text NOT NULL,
  `observaciones` varchar(400) NOT NULL,
  `incluye` text NOT NULL,
  `numordencompra` text NOT NULL,
  `tienda` text NOT NULL,
  `idprincipalproducto2` text NOT NULL,
  `sku` varchar(40) NOT NULL,
  `idtienda` text NOT NULL,
  `color` int(11) NOT NULL DEFAULT 0,
  `statusreproceso` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `detallecompras`
--

INSERT INTO `detallecompras` (`id`, `nombre`, `pieza`, `precio`, `subtotal`, `departamentos`, `subdepartamentos`, `archivo`, `status`, `deleted`, `deleted2`, `carrito`, `unidad`, `proveedor`, `observaciones`, `incluye`, `numordencompra`, `tienda`, `idprincipalproducto2`, `sku`, `idtienda`, `color`, `statusreproceso`) VALUES
(3701, 'M35 V2- UNIFILA GRIS VELVET', 1.7, '$4,356.78', 7406.53, 'entrada', 'no aplica', '', '', 0, 0, 0, 'PZA', '', 'Obs', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '1', '11111111111', '594', 0, 0),
(3702, 'MODULO CAJA 2.35M', 2.5, '$11,474.96', 28687.4, 'entrada', 'no aplica', '', '', 0, 0, 0, 'PZA', '', 'Ejem Obs', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '2', '22222222222', '594', 0, 0),
(3703, 'MODULO CAJA  1.35 M', 3.4, '$8,463.79', 28776.9, 'entrada', 'no aplica', '', '', 0, 0, 0, 'PZA', '', 'Reproceso', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '3', '33333333333', '594', 0, 0),
(3704, 'ENCIMERA 3000 (PAROTA/HUANACASTLE)', 4.5, '$9,561.02', 43024.6, 'entrada', 'no aplica', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '4', '44444444444', '594', 0, 0),
(3705, 'ENCIMERA 4000 (PAROTA/HUANACASTLE)', 6, '$10,026.40', 60158.4, 'entrada', 'no aplica', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '5', '55555555555', '594', 0, 0),
(3706, 'M14 - GAP ADULTO TRIPLAY  GRIS VELVET', 5, '$16,946.10', 84730.5, 'dama y caballero', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '16', '546', '594', 0, 0),
(3707, 'M23 MESA BASICOS 1 TRIPLAY / CHOCOLATE / GRIS VELVET', 6, '$4,850.00', 29100, 'dama y caballero', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '17', '4534', '594', 0, 0),
(3708, 'M23 BANQUITO SEGUNDO NIVEL TRIPLAY GRIS VELVET', 1, '$7,141.95', 7141.95, 'dama y caballero', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '18', '234', '594', 0, 0),
(3709, 'M14A - MEDIA GAP SIN MALLA TRIPLAY GRIS VELVET', 1, '$5,977.90', 5977.9, 'dama y caballero', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '19', '23543', '594', 0, 0),
(3710, 'M29 - LF3 NOVATO ADULTO GRIS VELVET', 1, '$18,798.50', 18798.5, 'dama y caballero', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', 'Incluye:\r\n-64 Blisters m29 GRIS VELVET\r\n-1 preciador imán 1300mm X150mm GRIS VELVET', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '20', '43643', '594', 0, 0),
(3711, 'M124 MUEBLE  ACCION', 1, '$14,415.70', 14415.7, 'dama y caballero', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '21', '234234', '594', 0, 0),
(3712, 'CREMALLERA NORMAL 2021 ANTIQUE WHITE', 1, '$1,177.51', 1177.51, 'dama y caballero', 'mobiliario perimetral', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '34', '', '594', 0, 0),
(3713, 'CREMALLERA NORMAL 2021  AZUL ALASKA', 1, '$1,177.51', 1177.51, 'dama y caballero', 'mobiliario perimetral', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '35', '234', '594', 0, 0),
(3714, 'CREMALLERA NORMAL 2021  GRIS VELVET', 1, '$1,177.51', 1177.51, 'dama y caballero', 'mobiliario perimetral', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '36', '543534', '594', 0, 0),
(3715, 'MARCO MADERA 60 (2282 MM) CARAMELO', 2, '$2,086.26', 4172.52, 'dama y caballero', 'mobiliario perimetral', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '37', '234', '594', 0, 0),
(3716, 'MARCO MADERA 120 (2282 MM) CARAMELO', 1, '$3,161.10', 3161.1, 'dama y caballero', 'mobiliario perimetral', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '38', '6457', '594', 0, 0),
(3717, 'M11 - MESA 1900 MESA DAMA JUNIOR TRIPLAY GRIS VELVET EL METAL', 1, '$7,431.71', 7431.71, 'mujer hombre jr', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '41', '3242', '594', 0, 0),
(3718, 'M13 - MESA SEGUNDO NIVEL TRIPLAY  Velvet', 1, '$5,402.92', 5402.92, 'mujer hombre jr', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '42', '234234', '594', 0, 0),
(3719, 'M21.1 - RACK 1.6 GRIS  GRIS VELVET  REPROCESO EN ALMACEN', 1, '$950.00', 950, 'mujer hombre jr', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '43', '234211', '594', 0, 0),
(3720, 'CREMALLERA NORMAL  2500 V2 GRIS VELVET', 1, '$1,177.51', 1177.51, 'mujer hombre jr', 'mobiliario perimetral', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '44', '456456', '594', 0, 0),
(3721, 'CREMALLERA NORMAL 2021  GRIS VELVET', 1, '$1,177.51', 1177.51, 'mujer hombre jr', 'mobiliario perimetro jeans', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '45', '43643', '594', 0, 0),
(3722, 'BRAZO PINCHO JEANS GRIS VELVET', 1, '$295.42', 295.42, 'mujer hombre jr', 'mobiliario perimetro jeans', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '46', '56768', '594', 0, 0),
(3723, 'REPISA 120 V2  CON TOPE GRIS VELVET', 1, '$894.68', 894.68, 'mujer hombre jr', 'mobiliario perimetro jeans', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '47', '56568', '594', 0, 0),
(3724, 'REPISA 120 V2  RECTAS  SIN TOPE GRIS VELVET', 1, '$819.81', 819.81, 'mujer hombre jr', 'mobiliario perimetro jeans', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '48', '56734', '594', 0, 0),
(3725, 'CREMALLERA NORMAL 2021  GRIS VELVET', 1, '$1,177.51', 1177.51, 'mujer hombre jr', 'mobiliario perimetro licencias', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '51', '23434', '594', 0, 0),
(3726, 'PRECIADOR TINTORERA 120 GRIS VELVET', 1, '$671.23', 671.23, 'mujer hombre jr', 'mobiliario perimetro licencias', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '52', '2346', '594', 0, 0),
(3727, 'BARRA FRONTAL 120 V2 GRIS VELVET ', 1, '$202.29', 202.29, 'mujer hombre jr', 'mobiliario perimetro licencias', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '53', '4664', '594', 0, 0),
(3728, 'M10 - COLGADOR TOPS FRESNO  REPROCESO TRIPLAY', 1, '$1,200.00', 1200, 'interior mujer', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '55', '8675', '594', 0, 0),
(3729, 'M9.1 COLGADOR BRA Y BRAGAS TRIPLAY METAL BLANCO Y ACABADO FRESNO', 1, '$4,786.72', 4786.72, 'interior mujer', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '56', '766', '594', 0, 0),
(3730, 'M4 EXHIBIDOR TRIPLAY BLANCO CON ACABADO FRESNO EN MADERA', 1, '$3,689.05', 3689.05, 'interior mujer', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '57', '435345', '594', 0, 0),
(3731, 'M CORSETERO', 1, '$4,000.00', 4000, 'interior mujer', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '58', '43534', '594', 0, 0),
(3732, 'ZOCLO FRESNO', 1, '$1,556.46', 1556.46, 'interior mujer', 'mobiliario perimetral', '', '', 0, 0, 0, 'ML', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '61', '234234', '594', 0, 0),
(3733, 'TECHO PANEL TOPS ILUMINACION', 1, '$3,253.37', 3253.37, 'interior mujer', 'mobiliario perimetral', '', '', 0, 0, 0, 'ML', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '62', '234523', '594', 0, 0),
(3734, 'PANEL RIEL V3 SIN AGUJEROS  CNC', 1, '$5,686.03', 5686.03, 'interior mujer', 'mobiliario perimetral', '', '', 0, 0, 0, 'ML', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '63', '23546', '594', 0, 0),
(3735, 'COSTILLA SENCILLA ILUMINACION', 1, '$5,011.64', 5011.64, 'interior mujer', 'mobiliario perimetral', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '64', '436346', '594', 0, 0),
(3736, 'BLISTER CUADRADO', 1, '$287.00', 287, 'interior mujer', 'herraje', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '66', '57658976', '594', 0, 0),
(3737, 'T-FACE V3', 1, '$361.00', 361, 'interior mujer', 'herraje', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '67', '45345', '594', 0, 0),
(3738, 'CONJUNTO TINTORERA Y REPISA 40', 1, '$1,443.00', 1443, 'interior mujer', 'herraje', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '68', '33324', '594', 0, 0),
(3739, 'CONJUNTO TINTORERA Y REPISA 90', 1, '$1,997.43', 1997.43, 'interior mujer', 'herraje', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '69', '234634', '594', 0, 0),
(3740, 'M29 - LF3 NOVATO ADULTO GRIS VELVET', 1, '$18,798.50', 18798.5, 'infantil niño y niña', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', 'Incluye:\r\n-64 Blisters m29 GRIS VELVET\r\n-1 preciador imán 1300mm X150mm GRIS VELVET', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '72', '346345', '594', 0, 0),
(3741, 'M124 MUEBLE  ACCION', 1, '$14,415.70', 14415.7, 'infantil niño y niña', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '73', '435345', '594', 0, 0),
(3742, 'M125 INFANTIL  RACK DE JEANS  130 X 60  con brazos', 1, '$6,800.00', 6800, 'infantil niño y niña', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '74', '65645', '594', 0, 0),
(3743, 'M33 V2- GAP INFANTIL 4 ENCIMERAS SIN MALLA TRIPLAY GRIS VELVETGRIS VELVET SENCILLA', 1, '$7,892.59', 7892.59, 'infantil niño y niña', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '75', '423423', '594', 0, 0),
(3744, 'M33 V3- MUEBLE PIRÁMIDE  TRYPLAY GRIS VELVET', 1, '$12,162.10', 12162.1, 'infantil niño y niña', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '76', '234234', '594', 0, 0),
(3745, 'CREMALLERA NORMAL 2021  AZUL AQUA', 1, '$1,177.51', 1177.51, 'infantil niño y niña', 'mobiliario perimetral', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '90', '', '594', 0, 0),
(3746, 'CREMALLERA NORMAL  2021  VERDE PASTO', 1, '$1,177.51', 1177.51, 'infantil niño y niña', 'mobiliario perimetral', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '91', '364346', '594', 0, 0),
(3747, 'CREMALLERA NORMAL 2021 ROSA BARBIE', 1, '$1,177.51', 1177.51, 'infantil niño y niña', 'mobiliario perimetral', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '92', '453535', '594', 0, 0),
(3748, 'CREMALLERA NORMAL 2021  GRIS VELVET', 1, '$1,177.51', 1177.51, 'infantil niño y niña', 'mobiliario perimetral', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '93', '3453', '594', 0, 0),
(3749, 'MARCO MADERA 60 (2282 MM) CARAMELO', 1, '$2,086.26', 2086.26, 'infantil niño y niña', 'mobiliario perimetral', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '94', '234324', '594', 0, 0),
(3750, 'M11.1 - MESA LANDING BEBES TRIPLAY', 1, '$6,012.68', 6012.68, 'toddler niño niña y bebes', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '98', '234234', '594', 0, 0),
(3751, 'M13.SEGUNDO NIVEL TRIPLAY  METAL  BLANCO, MADERA BLANCO', 1, '$5,402.92', 5402.92, 'toddler niño niña y bebes', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '99', '546456', '594', 0, 0),
(3752, 'RACK CUELGA TETRIX de 1500 MM', 1, '$2,604.61', 2604.61, 'toddler niño niña y bebes', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '100', '346345', '594', 0, 0),
(3753, 'M33.4 V2 - BOTADERO BEBES + 4 COLGADOR DOBLE REVISAR DISEÑO PARA CAMBIO', 1, '$6,189.60', 6189.6, 'toddler niño niña y bebes', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', 'Incluye:\r\n-4 Brazos dobles GRIS VELVET', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '101', '53435', '594', 0, 0),
(3754, 'CREMALLERA NORMAL 2021 GRIS VELVET', 1, '$1,177.51', 1177.51, 'toddler niño niña y bebes', 'mobiliario perimetral', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '103', '2343244', '594', 0, 0),
(3755, 'BARRA FRONTAL 60 V2 GRIS VELVET', 1, '$202.29', 202.29, 'herrajes', 'no aplica', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '104', '23523', '594', 0, 0),
(3756, 'BARRA FRONTAL 120 V2 GRIS VELVET', 1, '$247.58', 247.58, 'herrajes', 'no aplica', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '105', '43535', '594', 0, 0),
(3757, 'TINTORERA 60 V2  GRIS VELVET', 1, '$349.06', 349.06, 'herrajes', 'no aplica', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '106', '436345', '594', 0, 0),
(3758, 'NUEVA TINTORERA `` C ´´  DE 60   GRIS VELVET', 1, '$349.06', 349.06, 'herrajes', 'no aplica', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '107', '436436', '594', 0, 0),
(3759, 'BANCO PROBADORES M41  V2 500 GRIS VELVET', 1, '$2,465.40', 2465.4, 'probadores', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '127', '346436', '594', 0, 0),
(3760, 'ESPEJO 550 X 1800 PROVADORES  GRIS VELVET', 1, '$3,760.10', 3760.1, 'probadores', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '128', '345345', '594', 0, 0),
(3761, 'MARCO ESPEJO 550 X 1800 GRIS VELVET', 1, '$4,269.38', 4269.38, 'probadores', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '129', '346435', '594', 0, 0),
(3762, 'PERCHA COLGADORES PROBADORES', 1, '$200.00', 200, 'probadores', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '130', '345345', '594', 0, 0),
(3763, 'PANEL ACCESORIOS 600', 1, '$18,191.20', 18191.2, 'paneles', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', 'Incluye:\r\n-2 Cremalleras Brake 2\r\n-1 Panel accesorios 2300 Blanco MC\r\n-30 Blisters accesorios Blanco MC\r\n-1 Preciadores tintorera 60 Blanco MC\r\n-1 Tintoreras 60 Blanco MC\r\n-1 Cajones Freno Canela con frente de acrilico', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '134', '3454', '594', 0, 0),
(3764, 'PANEL ACCESORIOS 1200', 1, '$36,385.30', 36385.3, 'paneles', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', 'Incluye:\r\n-3 Cremalleras GRIS VELVET\r\n-2 Panel accesorios 2300 Blanco MC\r\n-65 Blisters accesorios Blanco MC\r\n-2 Preciadores tintorera 60 Blanco MC\r\n-2 Tintoreras 60 Blanco MC\r\n-2 Cajones Freno Canela con frente de acrilico', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '135', '346436', '594', 0, 0),
(3765, 'CESTA ACCESORIOS 850', 1, '$1,223.42', 1223.42, 'extras', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '136', '23234', '594', 0, 0),
(3766, 'PORTABANNER', 1, '$1,700.00', 1700, 'extras', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '137', '23234', '594', 0, 0),
(3767, 'ANUNCIOS PROBADORES NUEVO CON TAPA', 1, '$4,700.00', 4700, 'extras', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '138', '2342', '594', 0, 0),
(3768, 'ANUNCIO JEANS VERTICAL  300MM X198MM', 1, '$9,589.00', 9589, 'extras', 'mobiliario de piso', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '139', '23535', '594', 0, 0),
(3769, 'MATERIAL POP, ALMAS', 1, '$6,000.00', 6000, 'imagen', 'pop', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '165', '456456', '594', 0, 0),
(3770, 'MANIQUIS', 1, '$14,000.00', 14000, 'imagen', 'maniquis', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '166', '54224', '594', 0, 0),
(3771, 'CARTERA 7', 4, '$1,000.00', 4000, 'otros', 'no aplica', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '351', '12345', '594', 0, 0),
(3772, 'CARTERA 5', 6, '$2,000.00', 12000, 'otros', 'no aplica', '', '', 0, 0, 0, 'PZA', '', '', '', '17/4/2024_14:19', 'ACAPULCO ESCUDERO', '359', '33333', '594', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE `encuesta` (
  `id` int(11) NOT NULL,
  `usuario` text NOT NULL,
  `nombre` text NOT NULL,
  `P1` text NOT NULL,
  `P2` text NOT NULL,
  `P3` text NOT NULL,
  `P4` text NOT NULL,
  `P5` text NOT NULL,
  `P6` text NOT NULL,
  `P7` text NOT NULL,
  `fecha_apl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `encuesta`
--

INSERT INTO `encuesta` (`id`, `usuario`, `nombre`, `P1`, `P2`, `P3`, `P4`, `P5`, `P6`, `P7`, `fecha_apl`) VALUES
(1, '', '', 'RESPUESTA 1', 'RESPUESTA 2', 'RESPUESTA 3', 'RESPUESTA 4', '', '', '', ''),
(2, '', '', 'RESPUESTA 1', 'RESPUESTA 2', 'RESPUESTA 3', 'RESPUESTA 4', '', '', '', '4/9/2023_16:56:59'),
(3, '', '', 'RESPUESTA 1', 'RESPUESTA 2', 'RESPUESTA 3', 'RESPUESTA 4', '', '', '', '4/9/2023_17:35:1'),
(4, '', '', 'Un programa que protege tu computadora.', '\"123456\"', 'Un método para mejorar la velocidad de Internet.', 'Virus Protection Network', 'Para ahorrar dinero.', 'Compartirlas con amigos cercanos.', 'Abrirlos y seguir sus instrucciones.', '5/9/2023_8:50:35'),
(5, '', '', 'Un programa que protege tu computadora.', '\"123456\"', 'Un método para mejorar la velocidad de Internet.', 'Virus Protection Network', 'Para ahorrar dinero.', 'Compartirlas con amigos cercanos.', 'Abrirlos y seguir sus instrucciones.', '5/9/2023_9:53:37'),
(6, '', '', 'Un programa que ayuda a acelerar la velocidad de tu computadora.', '\"P@$$w0rd\"', 'Un ataque donde los ciberdelincuentes intentan engañarte para revelar información personal o financiera.', 'Virus Protection Network', 'Para corregir vulnerabilidades de seguridad conocidas.', 'Usar la misma contraseña para todas tus cuentas.', 'Eliminarlos sin abrirlos o marcarlos como spam.', '5/9/2023_10:1:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nombreusuario`
--

CREATE TABLE `nombreusuario` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `nombreusuario`
--

INSERT INTO `nombreusuario` (`id`, `nombre`) VALUES
(1, 'Alberto'),
(2, 'Teresa'),
(3, 'Juan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numerocompra`
--

CREATE TABLE `numerocompra` (
  `id` int(11) NOT NULL,
  `numordencompra` text NOT NULL,
  `Total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numerocompra2`
--

CREATE TABLE `numerocompra2` (
  `id` int(11) NOT NULL,
  `numordencompra` text NOT NULL,
  `numordencompra2` text NOT NULL,
  `tienda` text NOT NULL,
  `numerotienda` text NOT NULL,
  `nombre` text NOT NULL,
  `proveedor` text NOT NULL,
  `eliminado` int(11) NOT NULL DEFAULT 0,
  `cuentacliente` varchar(5) NOT NULL,
  `tipotienda` varchar(100) NOT NULL,
  `ubicacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `numerocompra2`
--

INSERT INTO `numerocompra2` (`id`, `numordencompra`, `numordencompra2`, `tienda`, `numerotienda`, `nombre`, `proveedor`, `eliminado`, `cuentacliente`, `tipotienda`, `ubicacion`) VALUES
(59, '17/4/2024_14:19', 'ACAPULCO ESCUDERO_Alberto_', 'ACAPULCO ESCUDERO', '2084', 'Alberto', 'PROVEEDOR 1', 0, '34', 'APERTURA', 'A PIE DE CARRETERA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `pieza` varchar(20) NOT NULL,
  `precio` text NOT NULL,
  `reproceso` text NOT NULL,
  `subtotal` float NOT NULL,
  `departamentos` text NOT NULL,
  `subdepartamentos` text NOT NULL,
  `archivo` varchar(255) NOT NULL,
  `status` text NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `carrito` int(11) NOT NULL DEFAULT 0,
  `unidad` text NOT NULL,
  `observaciones` varchar(400) NOT NULL,
  `incluye` text NOT NULL,
  `sku` varchar(40) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `pieza`, `precio`, `reproceso`, `subtotal`, `departamentos`, `subdepartamentos`, `archivo`, `status`, `deleted`, `carrito`, `unidad`, `observaciones`, `incluye`, `sku`) VALUES
(1, 'M35 V2- UNIFILA GRIS VELVET', '1.7', '$4,356.78', '$101.02', 0, 'entrada', 'no aplica', '66228b29c88a7_fr11.jpg', 'Activo', 0, 0, 'PZA', 'Obs', '', '000987636728'),
(2, 'MODULO CAJA 2.35M', '2.5', '11474.956', '$102.00', 0, 'entrada', 'no aplica', '66228b3adc9f3_btnaccionaddplus2.png', 'Activo', 0, 0, 'PZA', 'Ejem Obs', '', '000987636734'),
(3, 'MODULO CAJA  1.35 M', '3.4', '8463.71', '$103.01', 0, 'entrada', 'no aplica', '66228d484658d_icons8banderarellena961.png', 'Activo', 0, 0, 'PZA', 'Reproceso', '', '2342fd123124'),
(4, 'ENCIMERA 3000 (PAROTA/HUANACASTLE)', '4.5', '9561.02', '$100.00', 0, 'entrada', 'no aplica', '650cb0ca5b42f_.png', 'Activo', 0, 0, 'PZA', '', '', '10000000001'),
(5, 'ENCIMERA 4000 (PAROTA/HUANACASTLE)', '6', '10026.4', '$100.00', 0, 'entrada', 'no aplica', '650cad33dace2_Imagen14.png', 'Activo', 0, 0, 'PZA', '', '', '10000000002'),
(6, 'MODULO TRASCAJA 2500 LED', '7', '31243.8', '$100.00', 0, 'entrada', 'no aplica', '650c96531ed32_Imagen_2_v.png', 'Inactivo', 0, 0, 'PZA', '', '', '10000000003'),
(7, 'MUEBLE TRASCAJA 3000+ CANASTAS CON CAJONES', '9', '40774.9', '$100.00', 0, 'entrada', 'no aplica', '64ecc8713093c_Imagen14.png', 'Inactivo', 0, 0, 'PZA', '', '', '10000000004'),
(8, 'MUEBLE TRASCAJA 2500+ CANASTAS CON CAJONES', '11', '35757.4', '$100.00', 0, 'entrada', 'no aplica', '64ecc88205650_Imagen15.png', 'Inactivo', 0, 0, 'PZA', '', '', '10000000005'),
(9, '1400 X 1000 X 600MM MODULO LANDING STRIP 600 MM', '0', '7910.46', '$100.00', 0, 'entrada', 'no aplica', '64ecc8bc9912d_Imagen22.png', 'Inactivo', 0, 0, 'PZA', '', '', '10000000006'),
(10, '1300 X 1000 X 600MM MODULO LANDING STRIP 600 MM', '0', '7401.47', '$100.00', 0, 'entrada', 'no aplica', '64ecc8d30b659_Imagen21.png', 'Inactivo', 0, 0, 'PZA', '', '', '10000000007'),
(11, '1200 X 1000 X500MM MODULO LANDING STRIP 500 MM', '0', '6341.14', '$100.00', 0, 'entrada', 'no aplica', '64ecc912c970f_Imagen27.png', 'Inactivo', 0, 0, 'PZA', '', '', '10000000008'),
(12, 'M34 - RACK + COLGADOR TRIPLAY GRIS VELVET (1400mm)', '0', '6347.01', '$100.00', 0, 'entrada', 'no aplica', '64ecc9268c95c_Imagen34.png', 'Inactivo', 0, 0, 'PZA', '', '', '10000000009'),
(13, 'MARCO ENTRADA BACKLITE IZQUIERDA, DERECHA', '0', '5430.83', '$100.00', 0, 'entrada', 'no aplica', '64ecc957ed1ea_Imagen37.png', 'Inactivo', 0, 0, 'PZA', '', '', '10000000010'),
(14, 'JAULA DE ENTRADA 100m aclibre 18 (con iluminacion sin esejo frontal y sin 1 espejo lateral) 1 derecha', '0', '19974.4', '$100.00', 0, 'entrada', 'no aplica', '64ecc99fb5d9f_Imagen35.png', 'Inactivo', 0, 0, 'PZA', '', '', '10000000011'),
(15, 'PARED ALISTONADO COLOR CARAMELO 2021', '0', '1230.08', '$100.00', 0, 'entrada', 'no aplica', '64ecc9afe597d_Imagen39.png', 'Inactivo', 0, 0, 'PZA', '', '', '10000000012'),
(16, 'M14 - GAP ADULTO TRIPLAY  GRIS VELVET', '5', '16946.1', '$201.00', 0, 'dama y caballero', 'mobiliario de piso', '64eccbf038abd_Imagen40.png', 'Activo', 0, 0, 'PZA', '', '', '10000000013'),
(17, 'M23 MESA BASICOS 1 TRIPLAY / CHOCOLATE / GRIS VELVET', '6', '4850', '$202.00', 0, 'dama y caballero', 'mobiliario de piso', '64eccc22dbe6b_Imagen42.png', 'Activo', 0, 0, 'PZA', '', '', '10000000014'),
(18, 'M23 BANQUITO SEGUNDO NIVEL TRIPLAY GRIS VELVET', '1', '7141.95', '$203.00', 0, 'dama y caballero', 'mobiliario de piso', '64eccc38704e1_Imagen43.png', 'Activo', 0, 0, 'PZA', '', '', '10000000015'),
(19, 'M14A - MEDIA GAP SIN MALLA TRIPLAY GRIS VELVET', '1', '5977.9', '$200.00', 0, 'dama y caballero', 'mobiliario de piso', '64eccc4e4db3d_Imagen44.jpg', 'Activo', 0, 0, 'PZA', '', '', '10000000016'),
(20, 'M29 - LF3 NOVATO ADULTO GRIS VELVET', '1', '18798.5', '$205.00', 0, 'dama y caballero', 'mobiliario de piso', '64eccc98e6e4b_Imagen45.png', 'Activo', 0, 0, 'PZA', '', 'Incluye:\r\n-64 Blisters m29 GRIS VELVET\r\n-1 preciador imán 1300mm X150mm GRIS VELVET', '10000000017'),
(21, 'M124 MUEBLE  ACCION', '1', '14415.7', '$200.00', 0, 'dama y caballero', 'mobiliario de piso', '64ecccb2883af_Imagen48.png', 'Activo', 0, 0, 'PZA', '', '', '10000000018'),
(22, 'M125 RACK DE JEANS  150 X 60 ADULTO con brazos', '0', '6800', '$200.00', 0, 'dama y caballero', 'mobiliario de piso', '64eccce2c91bc_Imagen46.png', 'Inactivo', 0, 0, 'PZA', '', '', '10000000019'),
(23, 'RACK  CUELGA DOBLE GRIS VELVET', '0', '2092.5', '$200.00', 0, 'dama y caballero', 'mobiliario de piso', '64eccd2450d5c_Imagen50.jpg', 'Inactivo', 0, 0, 'PZA', '', '', '10000000020'),
(24, 'RACK  CUELGA SENCILLO GRIS VELVET', '0', '2155.91', '$200.00', 0, 'dama y caballero', 'mobiliario de piso', '64eccd72bd768_Imagen49.jpg', 'Inactivo', 0, 0, 'PZA', '', '', '10000000021'),
(25, 'M18- RACK GRIS VELVET', '0', '2500.68', '$200.00', 0, 'dama y caballero', 'mobiliario de piso', '650cadfd559ac_Imagen6.png', 'Inactivo', 0, 0, 'PZA', '', '', '10000000022'),
(26, 'RACK CUELGA T GRIS VELVET', '0', '2739.34', '$200.00', 0, 'dama y caballero', 'mobiliario de piso', '650cae0422212_Imagen5.png', 'Inactivo', 0, 0, 'PZA', '', '', '10000000023'),
(27, 'ESVASTICA Z 	GRIS VELVET', '0', '3821.34', '$200.00', 0, 'dama y caballero', 'mobiliario de piso', '650cae88b60b6_.png', 'Inactivo', 0, 0, 'PZA', '', '', '10000000024'),
(28, 'ESVASTICA GRIS VELVET', '0', '3550.96', '$200.00', 0, 'dama y caballero', 'mobiliario de piso', '650cae90ab90f_Imagen3.png', 'Inactivo', 0, 0, 'PZA', '', '', '10000000025'),
(29, 'M CORSETERO GRIS VELVET', '0', '4000', '$200.00', 0, 'dama y caballero', 'mobiliario de piso', '650cae978e668_Imagen5.png', 'Inactivo', 0, 0, 'PZA', '', '', '10000000026'),
(30, 'M21 - RACK 1.15 GRIS VELVET', '0', '2041.17', '$200.00', 0, 'dama y caballero', 'mobiliario de piso', '64eccfb8509ea_Imagen51.png', 'Inactivo', 0, 0, 'PZA', '', '', '10000000027'),
(31, 'M21.1 - RACK 1.6 GRIS VELVET', '0', '2195.44', '$200.00', 0, 'dama y caballero', 'mobiliario de piso', '64eccfc291936_Imagen52.png', 'Inactivo', 0, 0, 'PZA', '', '', '10000000028'),
(32, 'EXHIBIDOR CIRCULO GRIS VELVET', '0', '6521.49', '$200.00', 0, 'dama y caballero', 'mobiliario de piso', '64eccfd358902_Imagen53.png', 'Inactivo', 0, 0, 'PZA', '', '', '10000000029'),
(33, 'M121.1 - COLGADOR FELPA 1450 GRIS VELVET  con preciador', '0', '14476.6', '$200.00', 0, 'dama y caballero', 'mobiliario de piso', '64eccfe67e617_Imagen54.png', 'Inactivo', 0, 0, 'PZA', '', '', '10000000030'),
(34, 'CREMALLERA NORMAL 2021 ANTIQUE WHITE', '1', '1177.51', '$211.00', 0, 'dama y caballero', 'mobiliario perimetral', '64ecd0163bdeb_Imagen56.png', 'Activo', 0, 0, 'PZA', '', '', '10000000031'),
(35, 'CREMALLERA NORMAL 2021  AZUL ALASKA', '1', '1177.51', '$212.00', 0, 'dama y caballero', 'mobiliario perimetral', '64ecd02e9ef3b_Imagen56.png', 'Activo', 0, 0, 'PZA', '', '', '10000000032'),
(36, 'CREMALLERA NORMAL 2021  GRIS VELVET', '1', '1177.51', '$213.00', 0, 'dama y caballero', 'mobiliario perimetral', '64ecd03a278ca_Imagen56.png', 'Activo', 0, 0, 'PZA', '', '', '10000000033'),
(37, 'MARCO MADERA 60 (2282 MM) CARAMELO', '2', '2086.26', '$200.00', 0, 'dama y caballero', 'mobiliario perimetral', '64ecd04e0515f_Imagen58.png', 'Activo', 0, 0, 'PZA', '', '', '10000000034'),
(38, 'MARCO MADERA 120 (2282 MM) CARAMELO', '1', '3161.1', '$200.00', 0, 'dama y caballero', 'mobiliario perimetral', '64ecd063dcc70_Imagen59.png', 'Activo', 0, 0, 'PZA', '', '', '10000000035'),
(39, 'ESPEJOS ACTION 60 CARAMELO', '0', '983.43', '$200.00', 0, 'dama y caballero', 'mobiliario perimetral', '64ecd07ab2bb9_Imagen60.png', 'Inactivo', 0, 0, 'PZA', '', '', '10000000036'),
(40, 'ESPEJOS ACTION 120 CARAMELO', '0', '1468.96', '$200.00', 0, 'dama y caballero', 'mobiliario perimetral', '64ecd08d885f9_Imagen61.png', 'Inactivo', 0, 0, 'PZA', '', '', '10000000037'),
(41, 'M11 - MESA 1900 MESA DAMA JUNIOR TRIPLAY GRIS VELVET EL METAL', '1', '7431.71', '$301.00', 0, 'mujer hombre jr', 'mobiliario de piso', '64ecd27074ebe_Imagen68.png', 'Activo', 0, 0, 'PZA', '', '', '10000000038'),
(42, 'M13 - MESA SEGUNDO NIVEL TRIPLAY  Velvet', '1', '5402.92', '$302.00', 0, 'mujer hombre jr', 'mobiliario de piso', '64ecd2882adde_Imagen69.png', 'Activo', 0, 0, 'PZA', '', '', '10000000039'),
(43, 'M21.1 - RACK 1.6 GRIS  GRIS VELVET  REPROCESO EN ALMACEN', '1', '950', '$303.00', 0, 'mujer hombre jr', 'mobiliario de piso', '64ecd2a1ee73a_Imagen52.png', 'Activo', 0, 0, 'PZA', '', '', '10000000040'),
(44, 'CREMALLERA NORMAL  2500 V2 GRIS VELVET', '1', '1177.51', '$311.00', 0, 'mujer hombre jr', 'mobiliario perimetral', '', 'Activo', 0, 0, 'PZA', '', '', '10000000041'),
(45, 'CREMALLERA NORMAL 2021  GRIS VELVET', '1', '1177.51', '$321.00', 0, 'mujer hombre jr', 'mobiliario perimetro jeans', '', 'Activo', 0, 0, 'PZA', '', '', '10000000042'),
(46, 'BRAZO PINCHO JEANS GRIS VELVET', '1', '295.42', '$322.00', 0, 'mujer hombre jr', 'mobiliario perimetro jeans', '', 'Activo', 0, 0, 'PZA', '', '', '10000000043'),
(47, 'REPISA 120 V2  CON TOPE GRIS VELVET', '1', '894.68', '$323.00', 0, 'mujer hombre jr', 'mobiliario perimetro jeans', '', 'Activo', 0, 0, 'PZA', '', '', '10000000044'),
(48, 'REPISA 120 V2  RECTAS  SIN TOPE GRIS VELVET', '1', '819.81', '$300.00', 0, 'mujer hombre jr', 'mobiliario perimetro jeans', '', 'Activo', 0, 0, 'PZA', '', '', '10000000045'),
(49, 'PRECIADOR LARGO CON ENGANCHE 120 DERECHO  GRIS VELVET', '0', '735.92', '$300.00', 0, 'mujer hombre jr', 'mobiliario perimetro jeans', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000046'),
(50, 'PRECIADOR LARGO CON ENGANCHE 120 IZQUIERDO  GRIS VELVET', '0', '735.92', '$300.00', 0, 'mujer hombre jr', 'mobiliario perimetro jeans', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000047'),
(51, 'CREMALLERA NORMAL 2021  GRIS VELVET', '1', '1177.51', '$331.00', 0, 'mujer hombre jr', 'mobiliario perimetro licencias', '', 'Activo', 0, 0, 'PZA', '', '', '10000000048'),
(52, 'PRECIADOR TINTORERA 120 GRIS VELVET', '1', '671.23', '$332.00', 0, 'mujer hombre jr', 'mobiliario perimetro licencias', '', 'Activo', 0, 0, 'PZA', '', '', '10000000049'),
(53, 'BARRA FRONTAL 120 V2 GRIS VELVET ', '1', '202.29', '$333.00', 0, 'mujer hombre jr', 'mobiliario perimetro licencias', '', 'Activo', 0, 0, 'PZA', '', '', '10000000050'),
(54, 'REPISA INCLINADA CON TOPE 120 V2 GRIS VELVET', '0', '901.63', '$300.00', 0, 'mujer hombre jr', 'mobiliario perimetro licencias', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000051'),
(55, 'M10 - COLGADOR TOPS FRESNO  REPROCESO TRIPLAY', '1', '1200', '$401.00', 0, 'interior mujer', 'mobiliario de piso', '', 'Activo', 0, 0, 'PZA', '', '', '10000000052'),
(56, 'M9.1 COLGADOR BRA Y BRAGAS TRIPLAY METAL BLANCO Y ACABADO FRESNO', '1', '4786.72', '$402.00', 0, 'interior mujer', 'mobiliario de piso', '', 'Activo', 0, 0, 'PZA', '', '', '10000000053'),
(57, 'M4 EXHIBIDOR TRIPLAY BLANCO CON ACABADO FRESNO EN MADERA', '1', '3689.05', '$403.00', 0, 'interior mujer', 'mobiliario de piso', '', 'Activo', 0, 0, 'PZA', '', '', '10000000054'),
(58, 'M CORSETERO', '1', '4000', '$400.00', 0, 'interior mujer', 'mobiliario de piso', '', 'Activo', 0, 0, 'PZA', '', '', '10000000055'),
(59, 'M4 EXHIBIDOR TRIPLAY CAL. 16', '0', '3689.05', '$400.00', 0, 'interior mujer', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000056'),
(60, 'M122 - BOTADERO T&B', '0', '20827.7', '$400.00', 0, 'interior mujer', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000057'),
(61, 'ZOCLO FRESNO', '1', '1556.46', '$411.00', 0, 'interior mujer', 'mobiliario perimetral', '', 'Activo', 0, 0, 'ML', '', '', '10000000058'),
(62, 'TECHO PANEL TOPS ILUMINACION', '1', '3253.37', '$412.00', 0, 'interior mujer', 'mobiliario perimetral', '', 'Activo', 0, 0, 'ML', '', '', '10000000059'),
(63, 'PANEL RIEL V3 SIN AGUJEROS  CNC', '1', '5686.03', '$413.00', 0, 'interior mujer', 'mobiliario perimetral', '', 'Activo', 0, 0, 'ML', '', '', '10000000060'),
(64, 'COSTILLA SENCILLA ILUMINACION', '1', '5011.64', '$400.00', 0, 'interior mujer', 'mobiliario perimetral', '', 'Activo', 0, 0, 'PZA', '', '', '10000000061'),
(65, 'COSTILLA DOBLE ILUMINACION', '0', '6492.27', '$400.00', 0, 'interior mujer', 'mobiliario perimetral', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000062'),
(66, 'BLISTER CUADRADO', '1', '287', '$400.00', 0, 'interior mujer', 'herraje', '', 'Activo', 0, 0, 'PZA', '', '', '10000000063'),
(67, 'T-FACE V3', '1', '361', '$421.00', 0, 'interior mujer', 'herraje', '', 'Activo', 0, 0, 'PZA', '', '', '10000000064'),
(68, 'CONJUNTO TINTORERA Y REPISA 40', '1', '1443', '$422.00', 0, 'interior mujer', 'herraje', '', 'Activo', 0, 0, 'PZA', '', '', '10000000065'),
(69, 'CONJUNTO TINTORERA Y REPISA 90', '1', '1997.43', '$423.00', 0, 'interior mujer', 'herraje', '', 'Activo', 0, 0, 'PZA', '', '', '10000000066'),
(70, 'PRECIADOR CARTA', '0', '503.74', '$400.00', 0, 'interior mujer', 'herraje', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000067'),
(71, 'PRECIADOR CARTA PERIMETRO', '0', '477.89', '$400.00', 0, 'interior mujer', 'herraje', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000068'),
(72, 'M29 - LF3 NOVATO ADULTO GRIS VELVET', '1', '18798.5', '$501.00', 0, 'infantil niño y niña', 'mobiliario de piso', '', 'Activo', 0, 0, 'PZA', '', 'Incluye:\r\n-64 Blisters m29 GRIS VELVET\r\n-1 preciador imán 1300mm X150mm GRIS VELVET', '10000000069'),
(73, 'M124 MUEBLE  ACCION', '1', '14415.7', '$502.00', 0, 'infantil niño y niña', 'mobiliario de piso', '', 'Activo', 0, 0, 'PZA', '', '', '10000000070'),
(74, 'M125 INFANTIL  RACK DE JEANS  130 X 60  con brazos', '1', '6800', '$503.00', 0, 'infantil niño y niña', 'mobiliario de piso', '', 'Activo', 0, 0, 'PZA', '', '', '10000000071'),
(75, 'M33 V2- GAP INFANTIL 4 ENCIMERAS SIN MALLA TRIPLAY GRIS VELVETGRIS VELVET SENCILLA', '1', '7892.59', '$500.00', 0, 'infantil niño y niña', 'mobiliario de piso', '', 'Activo', 0, 0, 'PZA', '', '', '10000000072'),
(76, 'M33 V3- MUEBLE PIRÁMIDE  TRYPLAY GRIS VELVET', '1', '12162.1', '$500.00', 0, 'infantil niño y niña', 'mobiliario de piso', '', 'Activo', 0, 0, 'PZA', '', '', '10000000073'),
(77, 'M103 JEANS INFANTIL NIÑO DOBLE VISTA 5 NIVELES 18 MMS.GRIS VELVET', '0', '17476', '$500.00', 0, 'infantil niño y niña', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000074'),
(78, 'MESA W 1700 - BASICOS INFANTIL TRYPLAY GRIS Y PATAS EN  BLANCO MATE MC ', '0', '5084.15', '$500.00', 0, 'infantil niño y niña', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000075'),
(79, 'M20 - CUBO ALARGADO SEGUNDO  NIVEL BLANCO ZOCLO CAL. 18', '0', '3962.38', '$500.00', 0, 'infantil niño y niña', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000076'),
(80, 'M22 - RACK PIJAMAS GRIS VELVET', '0', '3191.23', '$500.00', 0, 'infantil niño y niña', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000077'),
(81, 'M33.2 - v3 BOTADERO CON CESTAS FIJAS GRIS VELVET LAMINA', '0', '8645.78', '$500.00', 0, 'infantil niño y niña', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000078'),
(82, 'RACK  CUELGA DOBLE GRIS VELVET', '0', '2092.5', '$500.00', 0, 'infantil niño y niña', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000078'),
(83, 'RACK  CUELGA SENCILLO GRIS VELVET', '0', '2155.91', '$500.00', 0, 'infantil niño y niña', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000079'),
(84, 'ESVASTICA Z 	GRIS VELVET', '0', '3821.34', '$500.00', 0, 'infantil niño y niña', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000080'),
(85, 'ESVASTICA GRIS VELVET', '0', '3550.96', '$500.00', 0, 'infantil niño y niña', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000081'),
(86, 'M CORSETERO GRIS VELVET', '0', '4000', '$500.00', 0, 'infantil niño y niña', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000082'),
(87, 'RACK CUELGA TETRIX de 1500 MM', '0', '2604.61', '$500.00', 0, 'infantil niño y niña', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000083'),
(88, 'EXHIBIDOR CIRCULO GRIS VELVET', '0', '6521.49', '$500.00', 0, 'infantil niño y niña', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000084'),
(89, 'M121 - COLGADOR FELPA 1200  GRIS VELVET con  preciador', '0', '12915.4', '$500.00', 0, 'infantil niño y niña', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000085'),
(90, 'CREMALLERA NORMAL 2021  AZUL AQUA', '1', '1177.51', '$511.00', 0, 'infantil niño y niña', 'mobiliario perimetral', '', 'Activo', 0, 0, 'PZA', '', '', '10000000086'),
(91, 'CREMALLERA NORMAL  2021  VERDE PASTO', '1', '1177.51', '$512.00', 0, 'infantil niño y niña', 'mobiliario perimetral', '', 'Activo', 0, 0, 'PZA', '', '', '10000000087'),
(92, 'CREMALLERA NORMAL 2021 ROSA BARBIE', '1', '1177.51', '$513.00', 0, 'infantil niño y niña', 'mobiliario perimetral', '', 'Activo', 0, 0, 'PZA', '', '', '10000000088'),
(93, 'CREMALLERA NORMAL 2021  GRIS VELVET', '1', '1177.51', '$500.00', 0, 'infantil niño y niña', 'mobiliario perimetral', '', 'Activo', 0, 0, 'PZA', '', '', '10000000089'),
(94, 'MARCO MADERA 60 (2282 MM) CARAMELO', '1', '2086.26', '$500.00', 0, 'infantil niño y niña', 'mobiliario perimetral', '', 'Activo', 0, 0, 'PZA', '', '', '10000000090'),
(95, 'MARCO MADERA 120 (2282 MM) CARAMELO', '0', '3161.1', '$500.00', 0, 'infantil niño y niña', 'mobiliario perimetral', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000091'),
(96, 'ESPEJOS ACTION 60 CARAMELO', '0', '983.43', '$500.00', 0, 'infantil niño y niña', 'mobiliario perimetral', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000092'),
(97, 'ESPEJOS ACTION 120 CARAMELO', '0', '1468.96', '$500.00', 0, 'infantil niño y niña', 'mobiliario perimetral', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000093'),
(98, 'M11.1 - MESA LANDING BEBES TRIPLAY', '1', '6012.68', '$601.00', 0, 'toddler niño niña y bebes', 'mobiliario de piso', '', 'Activo', 0, 0, 'PZA', '', '', '10000000094'),
(99, 'M13.SEGUNDO NIVEL TRIPLAY  METAL  BLANCO, MADERA BLANCO', '1', '5402.92', '$602.00', 0, 'toddler niño niña y bebes', 'mobiliario de piso', '', 'Activo', 0, 0, 'PZA', '', '', '10000000095'),
(100, 'RACK CUELGA TETRIX de 1500 MM', '1', '2604.61', '$603.00', 0, 'toddler niño niña y bebes', 'mobiliario de piso', '', 'Activo', 0, 0, 'PZA', '', '', '10000000096'),
(101, 'M33.4 V2 - BOTADERO BEBES + 4 COLGADOR DOBLE REVISAR DISEÑO PARA CAMBIO', '1', '6189.6', '$600.00', 0, 'toddler niño niña y bebes', 'mobiliario de piso', '', 'Activo', 0, 0, 'PZA', '', 'Incluye:\r\n-4 Brazos dobles GRIS VELVET', '10000000097'),
(102, 'EXHIBIDOR CIRCULO GRIS VELVET', '0', '6521.49', '$600.00', 0, 'toddler niño niña y bebes', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000098'),
(103, 'CREMALLERA NORMAL 2021 GRIS VELVET', '1', '1177.51', '$611.00', 0, 'toddler niño niña y bebes', 'mobiliario perimetral', '', 'Activo', 0, 0, 'PZA', '', '', '10000000099'),
(104, 'BARRA FRONTAL 60 V2 GRIS VELVET', '1', '202.29', '$701.00', 0, 'herrajes', 'no aplica', '', 'Activo', 0, 0, 'PZA', '', '', '10000000100'),
(105, 'BARRA FRONTAL 120 V2 GRIS VELVET', '1', '247.58', '$702.00', 0, 'herrajes', 'no aplica', '', 'Activo', 0, 0, 'PZA', '', '', '10000000101'),
(106, 'TINTORERA 60 V2  GRIS VELVET', '1', '349.06', '$703.00', 0, 'herrajes', 'no aplica', '', 'Activo', 0, 0, 'PZA', '', '', '10000000102'),
(107, 'NUEVA TINTORERA `` C ´´  DE 60   GRIS VELVET', '1', '349.06', '$700.00', 0, 'herrajes', 'no aplica', '', 'Activo', 0, 0, 'PZA', '', '', '10000000103'),
(108, 'TINTORERA 120 V2  GRIS VELVET', '0', '405.76', '$700.00', 0, 'herrajes', 'no aplica', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000104'),
(109, 'REPISA 60 V2  GRIS VELVET', '0', '534.62', '$700.00', 0, 'herrajes', 'no aplica', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000105'),
(110, 'REPISA 120 V2 GRIS VELVET', '0', '819.81', '$700.00', 0, 'herrajes', 'no aplica', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000106'),
(111, 'REPISA INCLINADA 60 V2 GRIS VELVET', '0', '599.66', '$700.00', 0, 'herrajes', 'no aplica', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000107'),
(112, 'REPISA INCLINADA CON TOPE 120 V2 GRIS VELVET', '0', '901.63', '$700.00', 0, 'herrajes', 'no aplica', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000108'),
(113, 'BLISTER UNIFILA BRAKE 2 (60 x MUEBLE) GRIS VELVET', '0', '93.23', '$700.00', 0, 'herrajes', 'no aplica', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000109'),
(114, 'BLISTER TOPS Y CALZADO BRAKE 2 GRIS VELVET', '0', '93.23', '$700.00', 0, 'herrajes', 'no aplica', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000110'),
(115, 'BRAZO PINCHO 30 CM GRIS VELVET', '0', '130.4', '$700.00', 0, 'herrajes', 'no aplica', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000111'),
(116, 'PERTIGA 900 MM GRIS VELVET', '0', '100.24', '$700.00', 0, 'herrajes', 'no aplica', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000112'),
(117, 'PRECIADOR TAMAÑO CARTA CON BASE GRIS VELVET', '0', '261.16', '$700.00', 0, 'herrajes', 'no aplica', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000113'),
(118, 'PRECIADOR LARGO 60CM CON BASE GRIS VELVET', '0', '379.18', '$700.00', 0, 'herrajes', 'no aplica', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000114'),
(119, 'PRECIADOR TAMAÑO CARTA CON BASE 20 CM GRIS VELVET', '0', '307.02', '$700.00', 0, 'herrajes', 'no aplica', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000115'),
(120, 'PRECIADOR MEDIA CARTA CON BASE IMAN GRIS VELVET', '0', '534.09', '$700.00', 0, 'herrajes', 'no aplica', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000116'),
(121, 'PRECIADOR TINTORERA 60 GRIS VELVET', '0', '510.37', '$700.00', 0, 'herrajes', 'no aplica', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000117'),
(122, 'PRECIADOR TINTORERA 120 GRIS VELVET', '0', '671.23', '$700.00', 0, 'herrajes', 'no aplica', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000118'),
(123, 'PRECIADOR POP 60  CON MENSULA GRIS VELVET', '0', '380.56', '$700.00', 0, 'herrajes', 'no aplica', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000119'),
(124, 'PRECIADOR POP 120  CON MENSULA GRIS VELVET', '0', '495.17', '$700.00', 0, 'herrajes', 'no aplica', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000120'),
(125, 'MARCO ACTION 13X13', '0', '443.67', '$700.00', 0, 'herrajes', 'no aplica', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000121'),
(126, 'BASE MANIQUIES PODIUMS', '0', '1680.12', '$700.00', 0, 'herrajes', 'no aplica', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000122'),
(127, 'BANCO PROBADORES M41  V2 500 GRIS VELVET', '1', '2465.4', '$801.00', 0, 'probadores', 'mobiliario de piso', '', 'Activo', 0, 0, 'PZA', '', '', '10000000123'),
(128, 'ESPEJO 550 X 1800 PROVADORES  GRIS VELVET', '1', '3760.1', '$802.00', 0, 'probadores', 'mobiliario de piso', '', 'Activo', 0, 0, 'PZA', '', '', '10000000124'),
(129, 'MARCO ESPEJO 550 X 1800 GRIS VELVET', '1', '4269.38', '$803.00', 0, 'probadores', 'mobiliario de piso', '', 'Activo', 0, 0, 'PZA', '', '', '10000000125'),
(130, 'PERCHA COLGADORES PROBADORES', '1', '200', '$800.00', 0, 'probadores', 'mobiliario de piso', '', 'Activo', 0, 0, 'PZA', '', '', '10000000126'),
(131, 'MARCO ESPEJO 800 X 1800 GRIS VELVET', '0', '4610.45', '$800.00', 0, 'probadores', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000127'),
(132, 'BANCA PROBADORES 90CM MODIFICACION SOLERA', '0', '4981.94', '$800.00', 0, 'probadores', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000128'),
(133, 'BANCA PROBADORES 1M MODIFICACION SOLERA', '0', '5200', '$800.00', 0, 'probadores', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000129'),
(134, 'PANEL ACCESORIOS 600', '1', '18191.2', '$901.00', 0, 'paneles', 'mobiliario de piso', '', 'Activo', 0, 0, 'PZA', '', 'Incluye:\r\n-2 Cremalleras Brake 2\r\n-1 Panel accesorios 2300 Blanco MC\r\n-30 Blisters accesorios Blanco MC\r\n-1 Preciadores tintorera 60 Blanco MC\r\n-1 Tintoreras 60 Blanco MC\r\n-1 Cajones Freno Canela con frente de acrilico', '10000000130'),
(135, 'PANEL ACCESORIOS 1200', '1', '36385.3', '$902.00', 0, 'paneles', 'mobiliario de piso', '', 'Activo', 0, 0, 'PZA', '', 'Incluye:\r\n-3 Cremalleras GRIS VELVET\r\n-2 Panel accesorios 2300 Blanco MC\r\n-65 Blisters accesorios Blanco MC\r\n-2 Preciadores tintorera 60 Blanco MC\r\n-2 Tintoreras 60 Blanco MC\r\n-2 Cajones Freno Canela con frente de acrilico', '10000000131'),
(136, 'CESTA ACCESORIOS 850', '1', '1223.42', '$1001.00', 0, 'extras', 'mobiliario de piso', '', 'Activo', 0, 0, 'PZA', '', '', '10000000132'),
(137, 'PORTABANNER', '1', '1700', '$1002.00', 0, 'extras', 'mobiliario de piso', '', 'Activo', 0, 0, 'PZA', '', '', '10000000133'),
(138, 'ANUNCIOS PROBADORES NUEVO CON TAPA', '1', '4700', '$1003.00', 0, 'extras', 'mobiliario de piso', '', 'Activo', 0, 0, 'PZA', '', '', '10000000134'),
(139, 'ANUNCIO JEANS VERTICAL  300MM X198MM', '1', '9589', '$1000.00', 0, 'extras', 'mobiliario de piso', '', 'Activo', 0, 0, 'PZA', '', '', '10000000135'),
(140, 'ANUNCIO JEANS HORIZONTAL 360 MM X1300MM', '0', '9589', '$1000.00', 0, 'extras', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000136'),
(141, 'TAPETE DE 1.5 M', '0', '2194.8', '$1000.00', 0, 'extras', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000137'),
(142, 'TAPETE DE 2 M', '0', '2896.4', '$1000.00', 0, 'extras', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000138'),
(143, 'TAPETE DE 3 M', '0', '4299.6', '$1000.00', 0, 'extras', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000139'),
(144, 'TAPETE DE 4 M', '0', '5702.8', '$1000.00', 0, 'extras', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000140'),
(145, 'TAPETE DE 5 M', '0', '7106', '$1000.00', 0, 'extras', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000141'),
(146, 'TAPETE DE 6 M', '0', '8509.2', '$1000.00', 0, 'extras', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000142'),
(147, 'TAPETE DE 7 M', '0', '9912.4', '$1000.00', 0, 'extras', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000143'),
(148, 'TAPETE DE 8 M', '0', '11315.6', '$1000.00', 0, 'extras', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000144'),
(149, 'PANTALLAS de 2.5 metros', '0', '90950.9', '$1000.00', 0, 'extras', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000145'),
(150, 'PANTALLAS', '0', '16790', '$1000.00', 0, 'extras', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000146'),
(151, 'PRECIADOR JEANS', '0', '263', '$1000.00', 0, 'extras', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000147'),
(152, 'MESAS DE DOBLADO', '0', '3049', '$1000.00', 0, 'extras', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000148'),
(153, 'ESTANTE 3 NIVELES TRIPLAY GRIS VELVET', '0', '1200', '$1000.00', 0, 'extras', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000149'),
(154, 'P4 V2 MUEBLES BOLSAS GRIS VELVET', '0', '814', '$1000.00', 0, 'extras', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000150'),
(155, 'COLGADOR C ALTO', '0', '788', '$1000.00', 0, 'extras', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000151'),
(156, 'CANASTA RECTANGULAR PERFORADA GRIS VELVET', '0', '695', '$1000.00', 0, 'extras', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000152'),
(157, 'CANASTAS TOPS chica', '0', '333', '$1000.00', 0, 'extras', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000153'),
(158, 'CANASTAS TOPS Grande', '0', '373', '$1000.00', 0, 'extras', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000154'),
(159, 'BOTES DE BASURA', '0', '1588', '$1000.00', 0, 'extras', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000155'),
(160, 'BANCO SOBRE MESA', '0', '1737', '$1000.00', 0, 'extras', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000156'),
(161, 'MUEBLE DE GANCHOS', '0', '950', '$1000.00', 0, 'extras', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000157'),
(162, 'ACRILICOS PARA INTERIOR DAMA(BOTADERO ALTESSE)', '0', '88.89', '$1000.00', 0, 'extras', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000158'),
(163, 'COCINETAS GRANDE', '0', '15607.2', '$1000.00', 0, 'extras', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000159'),
(164, 'ESCRITORIOS', '0', '11077.7', '$1000.00', 0, 'extras', 'mobiliario de piso', '', 'Inactivo', 0, 0, 'PZA', '', '', '10000000160'),
(165, 'MATERIAL POP, ALMAS', '0', '6000', '$1101.00', 0, 'imagen', 'pop', '', 'Activo', 0, 0, 'PZA', '', '', '10000000161'),
(166, 'MANIQUIS', '0', '14000', '$1102.00', 0, 'imagen', 'maniquis', '', 'Activo', 0, 0, 'PZA', '', '', '10000000162'),
(351, 'CARTERA 7', '4', '$1,000.00', '$1,000.00', 0, 'otros', 'no aplica', '', 'Activo', 0, 0, 'PZA', '', '', '7500555889059'),
(359, 'CARTERA 5', '6', '$2,000.00', '$1,000.00', 0, 'otros', 'no aplica', '', 'Activo', 0, 0, 'PZA', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `proveedor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `proveedor`) VALUES
(1, 'PROVEEDOR 1'),
(2, 'PROVEEDOR 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_sku_prod`
--

CREATE TABLE `rel_sku_prod` (
  `id` int(11) NOT NULL,
  `cc31` varchar(30) NOT NULL,
  `cc33` varchar(30) NOT NULL,
  `cc34` varchar(30) NOT NULL,
  `cc31r` varchar(30) NOT NULL,
  `cc33r` varchar(30) NOT NULL,
  `cc34r` varchar(30) NOT NULL,
  `activof` varchar(30) NOT NULL,
  `id_producto` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `rel_sku_prod`
--

INSERT INTO `rel_sku_prod` (`id`, `cc31`, `cc33`, `cc34`, `cc31r`, `cc33r`, `cc34r`, `activof`, `id_producto`) VALUES
(343, '', '', '', '', '', '', '7', '1'),
(344, '11', '5', '8', '33', '44', '55', '', '2'),
(345, '', '', '', '', '', '', '77', '3'),
(346, '654321', '1234', '44444444444', '333', '4444', '5555', '', '4'),
(347, '54321', '12345', '55555555555', '333', '4444', '55555', '', '5'),
(348, '4321', '123456', '66666666666', '333', '4444', '55555', '', '6'),
(349, '321', '1234567', '77777777777', '333', '4444', '55555', '', '7'),
(350, '21', '12345678', '88888888888', '333', '4444', '55555', '', '8'),
(351, '1', '123456789', '99999999999', '333', '4444', '55555', '', '9'),
(352, '12312', '2523', '', '333', '4444', '55555', '', '10'),
(353, '214', '235', '', '333', '4444', '55555', '', '11'),
(354, '', '', '', '', '', '', '777777', '12'),
(355, '', '', '', '', '', '', '777777', '13'),
(356, '', '', '', '', '', '', '777777', '14'),
(357, '', '', '', '', '', '', '777777', '15'),
(358, '', '', '', '', '', '', '777777', '16'),
(359, '432', '3535', '4534', '333', '4444', '55555', '', '17'),
(360, '', '', '', '', '', '', '777777', '18'),
(361, '34523', '343', '23543', '333', '4444', '55555', '', '19'),
(362, '3424', '4646', '43643', '333', '4444', '55555', '', '20'),
(363, '', '', '', '', '', '', '777777', '21'),
(364, '5543', '', '', '333', '4444', '55555', '', '22'),
(365, '6344', '', '', '333', '4444', '55555', '', '23'),
(366, '3234', '', '', '333', '4444', '55555', '', '24'),
(367, '1243', '', '', '333', '4444', '55555', '', '25'),
(368, '2423', '', '', '333', '4444', '55555', '', '26'),
(369, '235', '', '', '333', '4444', '55555', '', '27'),
(370, '231', '', '', '333', '4444', '55555', '', '28'),
(371, '', '', '', '', '', '', '777777', '29'),
(372, '', '', '', '', '', '', '777777', '30'),
(373, '1244', '', '', '333', '4444', '55555', '', '31'),
(374, '1223', '', '', '333', '4444', '55555', '', '32'),
(375, '123', '', '', '333', '4444', '55555', '', '33'),
(376, '', '', '', '', '', '', '777777', '34'),
(377, '234432', '325325', '234', '333', '4444', '55555', '', '35'),
(378, '', '', '', '', '', '', '777777', '36'),
(379, '23424', '346', '234', '333', '4444', '55555', '', '37'),
(380, '234234', '346346', '6457', '333', '4444', '55555', '', '38'),
(381, '', '', '', '', '', '', '777777', '39'),
(382, '', '', '', '', '', '', '777777', '40'),
(383, '', '', '', '', '', '', '777777', '41'),
(384, '', '', '', '', '', '', '777777', '42'),
(385, '213', '5685654', '234211', '333', '4444', '55555', '', '43'),
(386, '12323', '5634', '456456', '333', '4444', '55555', '', '44'),
(387, '', '', '', '', '', '', '777777', '45'),
(388, '123', '2434', '56768', '333', '4444', '55555', '', '46'),
(389, '123', '3489', '56568', '333', '4444', '55555', '', '47'),
(390, '235235', '123', '56734', '333', '4444', '55555', '', '48'),
(391, '', '', '', '333', '4444', '55555', '', '49'),
(392, '', '', '', '333', '4444', '55555', '', '50'),
(393, '235325', '1234', '23434', '333', '4444', '55555', '', '51'),
(394, '', '', '', '', '', '', '777777', '52'),
(395, '32323', '6465', '4664', '333', '4444', '55555', '', '53'),
(396, '', '', '', '333', '4444', '55555', '', '54'),
(397, '2124214', '3465', '8675', '333', '4444', '55555', '', '55'),
(398, '2434', '45876', '766', '333', '4444', '55555', '', '56'),
(399, '234', '678', '435345', '333', '4444', '55555', '', '57'),
(400, '235325', '879978', '43534', '333', '4444', '55555', '', '58'),
(401, '', '', '', '333', '4444', '55555', '', '59'),
(402, '', '', '', '333', '4444', '55555', '', '60'),
(403, '', '', '', '', '', '', '777777', '61'),
(404, '1234', '234', '234523', '333', '4444', '55555', '', '62'),
(405, '12423', '235532', '23546', '333', '4444', '55555', '', '63'),
(406, '4243', '3254', '436346', '333', '4444', '55555', '', '64'),
(407, '', '', '', '333', '4444', '55555', '', '65'),
(408, '', '', '', '', '', '', '777777', '66'),
(409, '34645', '234523', '45345', '333', '4444', '55555', '', '67'),
(410, '34535', '345', '33324', '333', '4444', '55555', '', '68'),
(411, '345435', '46356', '234634', '333', '4444', '55555', '', '69'),
(412, '', '', '', '333', '4444', '55555', '', '70'),
(413, '2334', '', '', '333', '4444', '55555', '', '71'),
(414, '', '', '', '', '', '', '777777', '72'),
(415, '657567', '345345', '435345', '333', '4444', '55555', '', '73'),
(416, '56756', '2342', '65645', '333', '4444', '55555', '', '74'),
(417, '6577567', '43643', '423423', '333', '4444', '55555', '', '75'),
(418, '567765', '56546', '234234', '333', '4444', '55555', '', '76'),
(419, '', '', '', '333', '4444', '55555', '', '77'),
(420, '', '', '', '333', '4444', '55555', '', '78'),
(421, '', '', '', '333', '4444', '55555', '', '79'),
(422, '', '', '', '333', '4444', '55555', '', '80'),
(423, '', '', '', '333', '4444', '55555', '', '81'),
(424, '', '', '', '333', '4444', '55555', '', '82'),
(425, '', '', '', '333', '4444', '55555', '', '83'),
(426, '', '', '', '333', '4444', '55555', '', '84'),
(427, '', '', '', '333', '4444', '55555', '', '85'),
(428, '', '', '', '333', '4444', '55555', '', '86'),
(429, '', '', '', '333', '4444', '55555', '', '87'),
(430, '', '', '', '333', '4444', '55555', '', '88'),
(431, '', '', '', '333', '4444', '55555', '', '89'),
(432, '', '', '', '', '', '', '777777', '90'),
(433, '567567', '234234', '364346', '333', '4444', '55555', '', '91'),
(434, '567765', '235532', '453535', '333', '4444', '55555', '', '92'),
(435, '346345', '45456', '3453', '333', '4444', '55555', '', '93'),
(436, '344', '577567', '234324', '333', '4444', '55555', '', '94'),
(437, '', '', '', '333', '4444', '55555', '', '95'),
(438, '', '', '', '333', '4444', '55555', '', '96'),
(439, '', '', '', '333', '4444', '55555', '', '97'),
(440, '', '', '', '', '', '', '777777', '98'),
(441, '6346346', '4124', '546456', '333', '4444', '55555', '', '99'),
(442, '4664', '34324', '346345', '333', '4444', '55555', '', '100'),
(443, '43443', '52352', '53435', '333', '4444', '55555', '', '101'),
(444, '234234', '', '', '333', '4444', '55555', '', '102'),
(445, '', '', '', '', '', '', '777777', '103'),
(446, '', '', '', '', '', '', '777777', '104'),
(447, '23523', '432423', '43535', '333', '4444', '55555', '', '105'),
(448, '2353', '2345234', '436345', '333', '4444', '55555', '', '106'),
(449, '324234', '7567567', '436436', '333', '4444', '55555', '', '107'),
(450, '2355', '', '', '333', '4444', '55555', '', '108'),
(451, '23354', '', '', '333', '4444', '55555', '', '109'),
(452, '2335', '', '', '333', '4444', '55555', '', '110'),
(453, '6453', '', '', '333', '4444', '55555', '', '111'),
(454, '', '', '', '333', '4444', '55555', '777777', '112'),
(455, '', '', '', '333', '4444', '55555', '777777', '113'),
(456, '', '', '', '333', '4444', '55555', '777777', '114'),
(457, '', '', '', '333', '4444', '55555', '777777', '115'),
(458, '', '', '', '333', '4444', '55555', '777777', '116'),
(459, '', '', '', '333', '4444', '55555', '777777', '117'),
(460, '', '', '', '333', '4444', '55555', '777777', '118'),
(461, '', '', '', '333', '4444', '55555', '777777', '119'),
(462, '', '', '', '333', '4444', '55555', '777777', '120'),
(463, '', '', '', '333', '4444', '55555', '777777', '121'),
(464, '', '', '', '333', '4444', '55555', '777777', '122'),
(465, '', '', '', '333', '4444', '55555', '777777', '123'),
(466, '', '', '', '333', '4444', '55555', '777777', '124'),
(467, '', '', '', '333', '4444', '55555', '777777', '125'),
(468, '', '', '', '333', '4444', '55555', '777777', '126'),
(469, '', '', '', '', '', '', '777777', '127'),
(470, '4525', '43645', '345345', '333', '4444', '55555', '', '128'),
(471, '2345', '34554', '346435', '333', '4444', '55555', '', '129'),
(472, '34545', '234234', '345345', '333', '4444', '55555', '', '130'),
(473, '', '', '', '333', '4444', '55555', '', '131'),
(474, '', '', '', '333', '4444', '55555', '', '132'),
(475, '', '', '', '333', '4444', '55555', '', '133'),
(476, '', '', '', '', '', '', '777777', '134'),
(477, '54664', '435345', '346436', '333', '4444', '55555', '', '135'),
(478, '34345', '436634', '23234', '333', '4444', '55555', '', '136'),
(479, '3456', '43234', '23234', '333', '4444', '55555', '', '137'),
(480, '4646', '234645', '2342', '333', '4444', '55555', '', '138'),
(481, '9864', '234234', '23535', '333', '4444', '55555', '', '139'),
(482, '', '', '', '333', '4444', '55555', '777777', '140'),
(483, '', '', '', '333', '4444', '55555', '777777', '141'),
(484, '', '', '', '333', '4444', '55555', '777777', '142'),
(485, '', '', '', '333', '4444', '55555', '777777', '143'),
(486, '', '', '', '333', '4444', '55555', '777777', '144'),
(487, '', '', '', '333', '4444', '55555', '777777', '145'),
(488, '', '', '', '333', '4444', '55555', '777777', '146'),
(489, '', '', '', '333', '4444', '55555', '777777', '147'),
(490, '', '', '', '333', '4444', '55555', '777777', '148'),
(491, '', '', '', '333', '4444', '55555', '777777', '149'),
(492, '', '', '', '333', '4444', '55555', '777777', '150'),
(493, '', '', '', '333', '4444', '55555', '777777', '151'),
(494, '', '', '', '333', '4444', '55555', '777777', '152'),
(495, '', '', '', '333', '4444', '55555', '777777', '153'),
(496, '', '', '', '333', '4444', '55555', '777777', '154'),
(497, '', '', '', '333', '4444', '55555', '777777', '155'),
(498, '', '', '', '333', '4444', '55555', '777777', '156'),
(499, '', '', '', '333', '4444', '55555', '777777', '157'),
(500, '', '', '', '333', '4444', '55555', '777777', '158'),
(501, '', '', '', '333', '4444', '55555', '777777', '159'),
(502, '', '', '', '333', '4444', '55555', '777777', '160'),
(503, '', '', '', '333', '4444', '55555', '777777', '161'),
(504, '', '', '', '333', '4444', '55555', '777777', '162'),
(505, '', '', '', '333', '4444', '55555', '777777', '163'),
(506, '', '', '', '333', '4444', '55555', '777777', '164'),
(507, '124', '234234', '456456', '333', '4444', '55555', '', '165'),
(508, '', '', '', '', '', '', '777777', '166'),
(517, '', '', '', '', '', '', '777777', '351'),
(518, '111111', '22222', '33333', '333', '4444', '55555', '', '359');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_sku_tnd`
--

CREATE TABLE `rel_sku_tnd` (
  `id` int(11) NOT NULL,
  `tienda` varchar(180) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `cuenta_contable` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subdepartamentos`
--

CREATE TABLE `subdepartamentos` (
  `id_subdepartamento` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `nombre_departamento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `subdepartamentos`
--

INSERT INTO `subdepartamentos` (`id_subdepartamento`, `nombre`, `id_departamento`, `nombre_departamento`) VALUES
(1, 'no aplica', 1, 'entrada'),
(2, 'mobiliario de piso', 2, 'dama y caballero'),
(3, 'mobiliario perimetral', 2, 'dama y caballero'),
(4, 'mobiliario de piso', 3, 'mujer hombre jr'),
(5, 'mobiliario perimetral', 3, 'mujer hombre jr'),
(6, 'mobiliario perimetro jeans', 3, 'mujer hombre jr'),
(7, 'mobiliario perimetro licencias', 3, 'mujer hombre jr'),
(8, 'mobiliario de piso', 4, 'interior mujer'),
(9, 'mobiliario perimetral', 4, 'interior mujer'),
(10, 'herraje', 4, 'interior mujer'),
(11, 'mobiliario de piso', 5, 'infantil niño y niña'),
(12, 'mobiliario perimetral', 5, 'infantil niño y niña'),
(13, 'mobiliario de piso', 6, 'toddler niño niña y bebes'),
(14, 'mobiliario perimetral', 6, 'toddler niño niña y bebes'),
(15, 'no aplica', 7, 'herrajes'),
(16, 'mobiliario de piso', 8, 'probadores'),
(17, 'mobiliario de piso', 9, 'paneles'),
(18, 'mobiliario de piso', 10, 'extras'),
(19, 'pop', 11, 'imagen'),
(20, 'maniquis', 11, 'imagen'),
(21, 'no aplica', 12, 'otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subtotales`
--

CREATE TABLE `subtotales` (
  `id` int(11) NOT NULL,
  `numordencompra` text NOT NULL,
  `tienda` text NOT NULL,
  `finalent` float NOT NULL,
  `finaldcmpi` float NOT NULL,
  `finaldcmpe` float NOT NULL,
  `finalmhjmpi` float NOT NULL,
  `finalmhjmpe` float NOT NULL,
  `finalmhjmpje` float NOT NULL,
  `finalmhjmpli` float NOT NULL,
  `finalimpi` float NOT NULL,
  `finalimpe` float NOT NULL,
  `finalimhe` float NOT NULL,
  `finalinnpi` float NOT NULL,
  `finalinnpe` float NOT NULL,
  `finaltnnbpi` float NOT NULL,
  `finaltnnbpe` float NOT NULL,
  `finalherna` float NOT NULL,
  `finalprobmpi` float NOT NULL,
  `finalpanmpi` float NOT NULL,
  `finalextmpi` float NOT NULL,
  `finalextmpiprov` float NOT NULL,
  `finalimgp` float NOT NULL,
  `finalimgm` float NOT NULL,
  `finalots` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `subtotales`
--

INSERT INTO `subtotales` (`id`, `numordencompra`, `tienda`, `finalent`, `finaldcmpi`, `finaldcmpe`, `finalmhjmpi`, `finalmhjmpe`, `finalmhjmpje`, `finalmhjmpli`, `finalimpi`, `finalimpe`, `finalimhe`, `finalinnpi`, `finalinnpe`, `finaltnnbpi`, `finaltnnbpe`, `finalherna`, `finalprobmpi`, `finalpanmpi`, `finalextmpi`, `finalextmpiprov`, `finalimgp`, `finalimgm`, `finalots`) VALUES
(65, '17/4/2024_14:19', 'ACAPULCO ESCUDERO', 168054, 160165, 10866.2, 13784.6, 1177.51, 3187.42, 2051.03, 13675.8, 15507.5, 4088.43, 60068.9, 6796.3, 20209.8, 1177.51, 1147.99, 10694.9, 54576.5, 17212.4, 17212.4, 6000, 14000, 16000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subtotalesprov`
--

CREATE TABLE `subtotalesprov` (
  `id` int(11) NOT NULL,
  `numordencompra` text NOT NULL,
  `tienda` text NOT NULL,
  `finalent` float NOT NULL,
  `finaldcmpi` float NOT NULL,
  `finaldcmpe` float NOT NULL,
  `finalmhjmpi` float NOT NULL,
  `finalmhjmpe` float NOT NULL,
  `finalmhjmpje` float NOT NULL,
  `finalmhjmpli` float NOT NULL,
  `finalimpi` float NOT NULL,
  `finalimpe` float NOT NULL,
  `finalimhe` float NOT NULL,
  `finalinnpi` float NOT NULL,
  `finalinnpe` float NOT NULL,
  `finaltnnbpi` float NOT NULL,
  `finaltnnbpe` float NOT NULL,
  `finalherna` float NOT NULL,
  `finalprobmpi` float NOT NULL,
  `finalpanmpi` float NOT NULL,
  `finalextmpi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporales`
--

CREATE TABLE `temporales` (
  `id_nuevo` int(11) NOT NULL,
  `ordenpendiente` text NOT NULL,
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `pieza` float NOT NULL,
  `precio` text NOT NULL,
  `subtotal` float NOT NULL,
  `departamentos` text NOT NULL,
  `subdepartamentos` text NOT NULL,
  `archivo` varchar(255) NOT NULL,
  `status` text NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `carrito` int(11) NOT NULL DEFAULT 0,
  `unidad` text NOT NULL,
  `observaciones` varchar(400) NOT NULL,
  `incluye` text NOT NULL,
  `tienda` text NOT NULL,
  `color` int(11) NOT NULL DEFAULT 0,
  `statusreproceso` int(11) NOT NULL DEFAULT 0,
  `sku` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `temporales`
--

INSERT INTO `temporales` (`id_nuevo`, `ordenpendiente`, `id`, `nombre`, `pieza`, `precio`, `subtotal`, `departamentos`, `subdepartamentos`, `archivo`, `status`, `deleted`, `carrito`, `unidad`, `observaciones`, `incluye`, `tienda`, `color`, `statusreproceso`, `sku`) VALUES
(4478, '19_4_2024*12:55', 1, 'M35 V2- UNIFILA GRIS VELVET', 1.7, '$4,356.78', 7406.53, 'entrada', 'no aplica', '', '', 0, 0, 'PZA', 'Obs', '', 'AGUASCALIENTES', 0, 0, '7'),
(4479, '19_4_2024*12:55', 2, 'MODULO CAJA 2.35M', 2.5, '$102.00', 255, 'entrada', 'no aplica', '', '', 0, 0, 'PZA', 'Ejem Obs', '', 'AGUASCALIENTES', 4, 1, '55'),
(4480, '19_4_2024*12:55', 3, 'MODULO CAJA  1.35 M', 3.4, '8463.71', 28776.6, 'entrada', 'no aplica', '', '', 0, 0, 'PZA', 'Reproceso', '', 'AGUASCALIENTES', 0, 0, '77'),
(4481, '19_4_2024*12:55', 4, 'ENCIMERA 3000 (PAROTA/HUANACASTLE)', 4.5, '9561.02', 43024.6, 'entrada', 'no aplica', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '44444444444'),
(4482, '19_4_2024*12:55', 5, 'ENCIMERA 4000 (PAROTA/HUANACASTLE)', 6, '10026.4', 60158.4, 'entrada', 'no aplica', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '55555555555'),
(4483, '19_4_2024*12:55', 16, 'M14 - GAP ADULTO TRIPLAY  GRIS VELVET', 5, '16946.1', 84730.5, 'dama y caballero', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '777777'),
(4484, '19_4_2024*12:55', 17, 'M23 MESA BASICOS 1 TRIPLAY / CHOCOLATE / GRIS VELVET', 6, '$4,850.00', 29100, 'dama y caballero', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '4534'),
(4485, '19_4_2024*12:55', 18, 'M23 BANQUITO SEGUNDO NIVEL TRIPLAY GRIS VELVET', 1, '$7,141.95', 7141.95, 'dama y caballero', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '777777'),
(4486, '19_4_2024*12:55', 19, 'M14A - MEDIA GAP SIN MALLA TRIPLAY GRIS VELVET', 1, '$5,977.90', 5977.9, 'dama y caballero', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '23543'),
(4487, '19_4_2024*12:55', 20, 'M29 - LF3 NOVATO ADULTO GRIS VELVET', 1, '$18,798.50', 18798.5, 'dama y caballero', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', 'Incluye:\n-64 Blisters m29 GRIS VELVET\n-1 preciador imán 1300mm X150mm GRIS VELVET', 'AGUASCALIENTES', 0, 0, '43643'),
(4488, '19_4_2024*12:55', 21, 'M124 MUEBLE  ACCION', 1, '$14,415.70', 14415.7, 'dama y caballero', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '777777'),
(4489, '19_4_2024*12:55', 34, 'CREMALLERA NORMAL 2021 ANTIQUE WHITE', 1, '$1,177.51', 1177.51, 'dama y caballero', 'mobiliario perimetral', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '777777'),
(4490, '19_4_2024*12:55', 35, 'CREMALLERA NORMAL 2021  AZUL ALASKA', 1, '$1,177.51', 1177.51, 'dama y caballero', 'mobiliario perimetral', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '234'),
(4491, '19_4_2024*12:55', 36, 'CREMALLERA NORMAL 2021  GRIS VELVET', 1, '$1,177.51', 1177.51, 'dama y caballero', 'mobiliario perimetral', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '777777'),
(4492, '19_4_2024*12:55', 37, 'MARCO MADERA 60 (2282 MM) CARAMELO', 2, '$2,086.26', 4172.52, 'dama y caballero', 'mobiliario perimetral', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '234'),
(4493, '19_4_2024*12:55', 38, 'MARCO MADERA 120 (2282 MM) CARAMELO', 1, '$3,161.10', 3161.1, 'dama y caballero', 'mobiliario perimetral', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '6457'),
(4494, '19_4_2024*12:55', 41, 'M11 - MESA 1900 MESA DAMA JUNIOR TRIPLAY GRIS VELVET EL METAL', 1, '$7,431.71', 7431.71, 'mujer hombre jr', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '777777'),
(4495, '19_4_2024*12:55', 42, 'M13 - MESA SEGUNDO NIVEL TRIPLAY  Velvet', 1, '$5,402.92', 5402.92, 'mujer hombre jr', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '777777'),
(4496, '19_4_2024*12:55', 43, 'M21.1 - RACK 1.6 GRIS  GRIS VELVET  REPROCESO EN ALMACEN', 1, '$950.00', 950, 'mujer hombre jr', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '234211'),
(4497, '19_4_2024*12:55', 44, 'CREMALLERA NORMAL  2500 V2 GRIS VELVET', 1, '$1,177.51', 1177.51, 'mujer hombre jr', 'mobiliario perimetral', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '456456'),
(4498, '19_4_2024*12:55', 45, 'CREMALLERA NORMAL 2021  GRIS VELVET', 1, '$1,177.51', 1177.51, 'mujer hombre jr', 'mobiliario perimetro jeans', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '777777'),
(4499, '19_4_2024*12:55', 46, 'BRAZO PINCHO JEANS GRIS VELVET', 1, '$295.42', 295.42, 'mujer hombre jr', 'mobiliario perimetro jeans', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '56768'),
(4500, '19_4_2024*12:55', 47, 'REPISA 120 V2  CON TOPE GRIS VELVET', 1, '$894.68', 894.68, 'mujer hombre jr', 'mobiliario perimetro jeans', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '56568'),
(4501, '19_4_2024*12:55', 48, 'REPISA 120 V2  RECTAS  SIN TOPE GRIS VELVET', 1, '$819.81', 819.81, 'mujer hombre jr', 'mobiliario perimetro jeans', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '56734'),
(4502, '19_4_2024*12:55', 51, 'CREMALLERA NORMAL 2021  GRIS VELVET', 1, '$1,177.51', 1177.51, 'mujer hombre jr', 'mobiliario perimetro licencias', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '23434'),
(4503, '19_4_2024*12:55', 52, 'PRECIADOR TINTORERA 120 GRIS VELVET', 1, '$671.23', 671.23, 'mujer hombre jr', 'mobiliario perimetro licencias', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '777777'),
(4504, '19_4_2024*12:55', 53, 'BARRA FRONTAL 120 V2 GRIS VELVET ', 1, '$202.29', 202.29, 'mujer hombre jr', 'mobiliario perimetro licencias', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '4664'),
(4505, '19_4_2024*12:55', 55, 'M10 - COLGADOR TOPS FRESNO  REPROCESO TRIPLAY', 1, '$1,200.00', 1200, 'interior mujer', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '8675'),
(4506, '19_4_2024*12:55', 56, 'M9.1 COLGADOR BRA Y BRAGAS TRIPLAY METAL BLANCO Y ACABADO FRESNO', 1, '$4,786.72', 4786.72, 'interior mujer', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '766'),
(4507, '19_4_2024*12:55', 57, 'M4 EXHIBIDOR TRIPLAY BLANCO CON ACABADO FRESNO EN MADERA', 1, '$3,689.05', 3689.05, 'interior mujer', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '435345'),
(4508, '19_4_2024*12:55', 58, 'M CORSETERO', 1, '$4,000.00', 4000, 'interior mujer', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '43534'),
(4509, '19_4_2024*12:55', 61, 'ZOCLO FRESNO', 1, '$1,556.46', 1556.46, 'interior mujer', 'mobiliario perimetral', '', '', 0, 0, 'ML', '', '', 'AGUASCALIENTES', 0, 0, '777777'),
(4510, '19_4_2024*12:55', 62, 'TECHO PANEL TOPS ILUMINACION', 1, '$3,253.37', 3253.37, 'interior mujer', 'mobiliario perimetral', '', '', 0, 0, 'ML', '', '', 'AGUASCALIENTES', 0, 0, '234523'),
(4511, '19_4_2024*12:55', 63, 'PANEL RIEL V3 SIN AGUJEROS  CNC', 1, '$5,686.03', 5686.03, 'interior mujer', 'mobiliario perimetral', '', '', 0, 0, 'ML', '', '', 'AGUASCALIENTES', 0, 0, '23546'),
(4512, '19_4_2024*12:55', 64, 'COSTILLA SENCILLA ILUMINACION', 1, '$5,011.64', 5011.64, 'interior mujer', 'mobiliario perimetral', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '436346'),
(4513, '19_4_2024*12:55', 66, 'BLISTER CUADRADO', 1, '$287.00', 287, 'interior mujer', 'herraje', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '777777'),
(4514, '19_4_2024*12:55', 67, 'T-FACE V3', 1, '$361.00', 361, 'interior mujer', 'herraje', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '45345'),
(4515, '19_4_2024*12:55', 68, 'CONJUNTO TINTORERA Y REPISA 40', 1, '$1,443.00', 1443, 'interior mujer', 'herraje', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '33324'),
(4516, '19_4_2024*12:55', 69, 'CONJUNTO TINTORERA Y REPISA 90', 1, '$1,997.43', 1997.43, 'interior mujer', 'herraje', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '234634'),
(4517, '19_4_2024*12:55', 72, 'M29 - LF3 NOVATO ADULTO GRIS VELVET', 1, '$18,798.50', 18798.5, 'infantil niño y niña', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', 'Incluye:\n-64 Blisters m29 GRIS VELVET\n-1 preciador imán 1300mm X150mm GRIS VELVET', 'AGUASCALIENTES', 0, 0, '777777'),
(4518, '19_4_2024*12:55', 73, 'M124 MUEBLE  ACCION', 1, '$14,415.70', 14415.7, 'infantil niño y niña', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '435345'),
(4519, '19_4_2024*12:55', 74, 'M125 INFANTIL  RACK DE JEANS  130 X 60  con brazos', 1, '$6,800.00', 6800, 'infantil niño y niña', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '65645'),
(4520, '19_4_2024*12:55', 75, 'M33 V2- GAP INFANTIL 4 ENCIMERAS SIN MALLA TRIPLAY GRIS VELVETGRIS VELVET SENCILLA', 1, '$7,892.59', 7892.59, 'infantil niño y niña', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '423423'),
(4521, '19_4_2024*12:55', 76, 'M33 V3- MUEBLE PIRÁMIDE  TRYPLAY GRIS VELVET', 1, '$12,162.10', 12162.1, 'infantil niño y niña', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '234234'),
(4522, '19_4_2024*12:55', 90, 'CREMALLERA NORMAL 2021  AZUL AQUA', 1, '$1,177.51', 1177.51, 'infantil niño y niña', 'mobiliario perimetral', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '777777'),
(4523, '19_4_2024*12:55', 91, 'CREMALLERA NORMAL  2021  VERDE PASTO', 1, '$1,177.51', 1177.51, 'infantil niño y niña', 'mobiliario perimetral', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '364346'),
(4524, '19_4_2024*12:55', 92, 'CREMALLERA NORMAL 2021 ROSA BARBIE', 1, '$1,177.51', 1177.51, 'infantil niño y niña', 'mobiliario perimetral', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '453535'),
(4525, '19_4_2024*12:55', 93, 'CREMALLERA NORMAL 2021  GRIS VELVET', 1, '$1,177.51', 1177.51, 'infantil niño y niña', 'mobiliario perimetral', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '3453'),
(4526, '19_4_2024*12:55', 94, 'MARCO MADERA 60 (2282 MM) CARAMELO', 1, '$2,086.26', 2086.26, 'infantil niño y niña', 'mobiliario perimetral', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '234324'),
(4527, '19_4_2024*12:55', 98, 'M11.1 - MESA LANDING BEBES TRIPLAY', 1, '$6,012.68', 6012.68, 'toddler niño niña y bebes', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '777777'),
(4528, '19_4_2024*12:55', 99, 'M13.SEGUNDO NIVEL TRIPLAY  METAL  BLANCO, MADERA BLANCO', 1, '5402.92', 5402.92, 'toddler niño niña y bebes', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '546456'),
(4529, '19_4_2024*12:55', 100, 'RACK CUELGA TETRIX de 1500 MM', 1, '2604.61', 2604.61, 'toddler niño niña y bebes', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '346345'),
(4530, '19_4_2024*12:55', 101, 'M33.4 V2 - BOTADERO BEBES + 4 COLGADOR DOBLE REVISAR DISEÑO PARA CAMBIO', 1, '6189.6', 6189.6, 'toddler niño niña y bebes', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', 'Incluye:\n-4 Brazos dobles GRIS VELVET', 'AGUASCALIENTES', 0, 0, '53435'),
(4531, '19_4_2024*12:55', 103, 'CREMALLERA NORMAL 2021 GRIS VELVET', 1, '$1,177.51', 1177.51, 'toddler niño niña y bebes', 'mobiliario perimetral', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '777777'),
(4532, '19_4_2024*12:55', 104, 'BARRA FRONTAL 60 V2 GRIS VELVET', 1, '202.29', 202.29, 'herrajes', 'no aplica', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '777777'),
(4533, '19_4_2024*12:55', 105, 'BARRA FRONTAL 120 V2 GRIS VELVET', 1, '$247.58', 247.58, 'herrajes', 'no aplica', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '43535'),
(4534, '19_4_2024*12:55', 106, 'TINTORERA 60 V2  GRIS VELVET', 1, '$349.06', 349.06, 'herrajes', 'no aplica', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '436345'),
(4535, '19_4_2024*12:55', 107, 'NUEVA TINTORERA `` C ´´  DE 60   GRIS VELVET', 1, '349.06', 349.06, 'herrajes', 'no aplica', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '436436'),
(4536, '19_4_2024*12:55', 127, 'BANCO PROBADORES M41  V2 500 GRIS VELVET', 1, '$2,465.40', 2465.4, 'probadores', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '777777'),
(4537, '19_4_2024*12:55', 128, 'ESPEJO 550 X 1800 PROVADORES  GRIS VELVET', 1, '$3,760.10', 3760.1, 'probadores', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '345345'),
(4538, '19_4_2024*12:55', 129, 'MARCO ESPEJO 550 X 1800 GRIS VELVET', 1, '$4,269.38', 4269.38, 'probadores', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '346435'),
(4539, '19_4_2024*12:55', 130, 'PERCHA COLGADORES PROBADORES', 1, '$200.00', 200, 'probadores', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '345345'),
(4540, '19_4_2024*12:55', 134, 'PANEL ACCESORIOS 600', 1, '$18,191.20', 18191.2, 'paneles', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', 'Incluye:\n-2 Cremalleras Brake 2\n-1 Panel accesorios 2300 Blanco MC\n-30 Blisters accesorios Blanco MC\n-1 Preciadores tintorera 60 Blanco MC\n-1 Tintoreras 60 Blanco MC\n-1 Cajones Freno Canela con frente de acrilico', 'AGUASCALIENTES', 0, 0, '777777'),
(4541, '19_4_2024*12:55', 135, 'PANEL ACCESORIOS 1200', 1, '$36,385.30', 36385.3, 'paneles', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', 'Incluye:\n-3 Cremalleras GRIS VELVET\n-2 Panel accesorios 2300 Blanco MC\n-65 Blisters accesorios Blanco MC\n-2 Preciadores tintorera 60 Blanco MC\n-2 Tintoreras 60 Blanco MC\n-2 Cajones Freno Canela con frente de acrilico', 'AGUASCALIENTES', 0, 0, '346436'),
(4542, '19_4_2024*12:55', 136, 'CESTA ACCESORIOS 850', 1, '$1,223.42', 1223.42, 'extras', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '23234'),
(4543, '19_4_2024*12:55', 137, 'PORTABANNER', 1, '$1,700.00', 1700, 'extras', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '23234'),
(4544, '19_4_2024*12:55', 138, 'ANUNCIOS PROBADORES NUEVO CON TAPA', 1, '$4,700.00', 4700, 'extras', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '2342'),
(4545, '19_4_2024*12:55', 139, 'ANUNCIO JEANS VERTICAL  300MM X198MM', 1, '$9,589.00', 9589, 'extras', 'mobiliario de piso', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '23535'),
(4546, '19_4_2024*12:55', 165, 'MATERIAL POP, ALMAS', 1, '$6,000.00', 6000, 'imagen', 'pop', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '456456'),
(4547, '19_4_2024*12:55', 166, 'MANIQUIS', 1, '$14,000.00', 14000, 'imagen', 'maniquis', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '777777'),
(4548, '19_4_2024*12:55', 351, 'CARTERA 7', 4, '$1,000.00', 4000, 'otros', 'no aplica', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '777777'),
(4549, '19_4_2024*12:55', 359, 'CARTERA 5', 6, '$2,000.00', 12000, 'otros', 'no aplica', '', '', 0, 0, 'PZA', '', '', 'AGUASCALIENTES', 0, 0, '33333');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporalescabeceros`
--

CREATE TABLE `temporalescabeceros` (
  `id` int(11) NOT NULL,
  `ordenpendiente` text NOT NULL,
  `fecha_entrega` text NOT NULL,
  `tienda` text NOT NULL,
  `nombre` text NOT NULL,
  `proveedor` text NOT NULL,
  `cuentacliente` varchar(5) NOT NULL,
  `tipotienda` varchar(100) NOT NULL,
  `ubicacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `temporalescabeceros`
--

INSERT INTO `temporalescabeceros` (`id`, `ordenpendiente`, `fecha_entrega`, `tienda`, `nombre`, `proveedor`, `cuentacliente`, `tipotienda`, `ubicacion`) VALUES
(71, '19_4_2024*12:55', '19/04/2024', 'AGUASCALIENTES', 'Alberto', 'PROVEEDOR 1', '34', 'APERTURA', 'A PIE DE CARRETERA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporalesdetalle`
--

CREATE TABLE `temporalesdetalle` (
  `id` int(11) NOT NULL,
  `ordenpendiente` text NOT NULL,
  `tienda` text NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `temporalesdetalle`
--

INSERT INTO `temporalesdetalle` (`id`, `ordenpendiente`, `tienda`, `deleted`) VALUES
(72, '19_4_2024*12:55', 'AGUASCALIENTES', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE `tienda` (
  `id` int(11) NOT NULL,
  `numerodetienda` text NOT NULL,
  `nombre` text NOT NULL,
  `año` text NOT NULL,
  `construccion` text NOT NULL,
  `local` text NOT NULL,
  `escaparates` float NOT NULL DEFAULT 0,
  `banners` float NOT NULL,
  `deptos` text NOT NULL DEFAULT 0,
  `interiordamas` text NOT NULL,
  `comentariosdeinteriordamas` text NOT NULL,
  `m2interiormujer` float NOT NULL,
  `m2pisoventa` float NOT NULL,
  `m2bodega` float NOT NULL,
  `observaciones` text NOT NULL,
  `color` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `centro_costos` varchar(30) NOT NULL,
  `ubicacion_td` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`id`, `numerodetienda`, `nombre`, `año`, `construccion`, `local`, `escaparates`, `banners`, `deptos`, `interiordamas`, `comentariosdeinteriordamas`, `m2interiormujer`, `m2pisoventa`, `m2bodega`, `observaciones`, `color`, `status`, `centro_costos`, `ubicacion_td`) VALUES
(1, '3000', 'TOLUCA', '2014', 'REMODELACION', 'CENTRO', 0, 0, 'TODO', '', '', 0, 100, 100, '', 0, 0, 'DTA', 'A PIE DE CARRETERA'),
(2, '4000', 'OPTIMA', '2023', 'TIENDA NUEVA', 'CENTRO', 0, 0, 'TODO', '', '', 0, 235.76, 235.76, '', 0, 0, '', 'A PIE DE CARRETERA'),
(3, '1001', 'METEPEC', '2016', 'REMODELACION', 'CC', 0, 0, 'TODO', '', '', 0, 342.4, 342.4, '', 0, 0, 'ALKA', 'CENTRO COMERCIAL'),
(4, '2500', 'CUIDADO CON EL PERRO', '2023', 'TIENDA NUEVA', 'CENTRO', 0, 0, 'TODO', '', '', 0, 289.56, 289.56, '', 0, 0, '', 'CENTRO COMERCIAL'),
(473, '2014', 'CANAL DEL NORTE', '2022', 'AMPLIACION', 'CENTRO', 0, 0, 'NO BEBES MESES NI AÑOS', '', '', 0, 0, 0, '', 0, 0, '', ''),
(474, '2066', 'CD OBREGON', '2017', 'AMPLIACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 0, 0, '', 0, 0, '', ''),
(475, '2322', 'DURANGO 5 DE FEBRERO', '2022', 'AMPLIACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 0, 0, '', 0, 0, '', ''),
(476, '2228', 'CAMPECHE II', '2022', 'AMPLIACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 0, 0, '', 0, 0, '', ''),
(477, '2068', 'TUXTLA GUTIERREZ', '2022', 'REMODELACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 0, 0, '', 0, 0, '', ''),
(478, '2315', 'TULA', '2022', 'TIENDA NUEVA', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 0, 0, '', 0, 0, '', ''),
(479, '2229', 'SALINA CRUZ', '2022', 'REMODELACION', 'CENTRO', 0, 0, 'NO BEBES MESES NI AÑOS', '', '', 0, 0, 0, '', 0, 0, '', ''),
(480, '2300', 'PABELLON SALIAN CRUZ', '2022', 'TIENDA NUEVA', 'CC', 0, 0, 'NO BEBES MESES NI AÑOS NI INFANTILES', '', '', 0, 0, 0, '', 0, 0, '', ''),
(481, '2081', 'TEXCOCO', '2022', 'REMODELACION', 'CC', 0, 0, 'NO BEBES MESES NI AÑOS', '', '', 0, 0, 0, '', 0, 0, '', ''),
(482, '2308', 'ESPACIO AGUAS CALIENTES', '2022', 'TIENDA NUEVA', 'CC', 0, 0, 'NO BEBES MESES NI AÑOS', '', '', 0, 0, 0, '', 0, 0, '', ''),
(483, '2313', 'CD CUAUHTEMOC CUU parisina', '2022', 'REMODELACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 0, 0, '', 0, 0, '', ''),
(484, '2240', 'CIUDAD DEL CARMEN II', '2022', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 0, 0, '', 0, 0, '', ''),
(485, '2237', 'CANCUN HEROES', '2022', 'AMPLIACION', 'CC', 0, 0, 'NO BEBES MESES', '', '', 0, 0, 0, '', 0, 0, '', ''),
(486, '2244', 'LAS AMERICAS CHETUMAL', '2016', 'REMODELACION', 'CC', 0, 0, 'TODOS MENOS LOS INTERIORES SOLO TIENE DE NIÑA', '', '', 0, 284.13, 70, '', 0, 0, '', ''),
(487, '2085', 'LA PAZ', '2021', 'AMPLIACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 508, 97.38, '', 0, 0, '', ''),
(488, '2225', 'IRAPUATO', '2021', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 303, 146.63, '', 0, 0, '', ''),
(489, '2223', 'VILLAHERMOSA III', '2016', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 395.6, 89.7, '', 0, 0, '', ''),
(490, '2148', 'OCOTLAN', '2022', 'AMPLIACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 0, 0, '', 0, 0, '', ''),
(491, '2118', 'TULANCINGO', '2022', 'AMPLIACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 279.73, 84, '', 0, 0, '', ''),
(492, '2101', 'XALAPA', '2016', 'TIENDA NUEVA', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 194.79, 78, '', 0, 0, '', ''),
(493, '2243', 'CETRAM CUATRO CAMINO', '2016', 'TIENDA NUEVA', 'CC', 0, 0, 'NO BEBES MESES NI AÑOS', '', '', 0, 278.48, 60.01, '', 0, 0, '', ''),
(494, '2059', 'MERIDA I', '2022', 'REMODELACION', 'CENTRO', 0, 0, 'NO BEBES MESES NI AÑOS', '', '', 0, 0, 0, '', 0, 0, '', ''),
(495, '2250', 'TUXTLA LAS AMERICAS', '2022', 'AMPLIACION', 'CC', 0, 0, 'TODOS', '', '', 0, 301.62, 78.58, '', 0, 0, '', ''),
(496, '2247', 'TAPACHULA II', '2017', 'TIENDA NUEVA', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 352.77, 102, '', 0, 0, '', ''),
(497, '2041', 'TOLUCA PORTAL', '2022', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 431.7, 95, '', 0, 0, '', ''),
(498, '2073', 'GUADALAJARA MORELOS', '2017', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 542.21, 354.87, '', 0, 0, '', ''),
(499, '2168', 'CHETUMAL', '2017', 'REMODELACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 379.05, 200, '', 0, 0, '', ''),
(500, '2001', 'AVANTE', '2017', 'REMODELACION', 'PLANTA', 0, 0, 'TODOS', '', '', 0, 761.49, 154.56, '', 0, 0, 'ALKA', 'A PIE DE CARRETERA'),
(501, '2252', 'TUXTEPEC II', '2017', 'TIENDA NUEVA', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 339.215, 59.66, '', 0, 0, '', ''),
(502, '2016', 'VERACRUZ INDEPENDENC', '2017', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 251.109, 114, '', 0, 0, '', ''),
(503, '2131', 'PLAYA DEL CARMEN', '2017', 'REMODELACION', 'CENTRO', 0, 0, 'VACIA', '', '', 0, 419.45, 229.15, '', 0, 0, '', ''),
(504, '2036', 'CORDOBA', '2017', 'REMODELACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 337.517, 107, '', 0, 0, '', ''),
(505, '2031', 'PACHUCA II', '2017', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 266.913, 55.1, '', 0, 0, '', ''),
(506, '2044', 'PUEBLA CENTRO', '2017', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 323.217, 133, '', 0, 0, '', ''),
(507, '2026', 'MORELIA', '2017', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 437.788, 104, '', 0, 0, '', ''),
(508, '2094', 'ZIHUATANEJO', '2023', 'REMODELACION', 'CENTRO', 0, 0, 'VACIA', '', '', 0, 291.87, 133, '', 0, 0, '', ''),
(509, '2033', 'MONTERREY 1', '2017', 'AMPLIACION', 'CENTRO', 0, 0, 'NO INTERIOR DAMAS', '', '', 0, 263.033, 89.73, '', 0, 0, '', ''),
(510, '2254', 'SENDERO SALTILLO', '2017', 'TIENDA NUEVA', 'CC', 0, 0, 'TODOS', '', '', 0, 424.86, 102.73, '', 0, 0, '', ''),
(511, '2251', 'XOCHIMILCO', '2017', 'TIENDA NUEVA', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 369.924, 97.46, '', 0, 0, '', ''),
(512, '2258', 'CARDENAS', '2017', 'TIENDA NUEVA', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 470.94, 125.03, '', 0, 0, '', ''),
(513, '2246', 'MONTERREY MORELOS', '2017', 'TIENDA NUEVA', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 340.39, 93.61, '', 0, 0, '', ''),
(514, '2221', 'VALLADOLID', '2018', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 393.098, 264.09, '', 0, 0, '', ''),
(515, '2034', 'URUAPAN', '2018', 'AMPLIACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 421.151, 172.83, '', 0, 0, '', ''),
(516, '2139', 'TLANEPANTLA III', '2018', 'AMPLIACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 588.36, 365.22, '', 0, 0, '', ''),
(517, '2189', 'AV UNIVERSIDAD 2 20', '2018', 'AMPLIACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 1, 135.2, '', 0, 0, '', 'A PIE DE CARRETERA'),
(518, '2147', 'TLAQUEPAQUE', '2018', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 415.19, 99.2, '', 0, 0, '', ''),
(519, '2128', 'CUAJIMALPA', '2018', 'AMPLIACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 387.53, 139.33, '', 0, 0, '', ''),
(520, '2146', 'MINATITLAN II', '2018', 'REMODELACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 465.67, 121.9, '', 0, 0, '', ''),
(521, '2194', 'MARTINEZ DE LA TORRE', '2018', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 391.56, 81.59, '', 0, 0, '', ''),
(522, '2173', 'TAMPICO II', '2018', 'REMODELACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 498.31, 64.9, '', 0, 0, '', ''),
(523, '2267', 'MULTIPLAZA ARAGON', '2018', 'TIENDA NUEVA', 'CC', 0, 0, 'SOLO ADULTOS Y SUS INTERIORES', '', '', 0, 256.52, 83.72, '', 0, 0, '', ''),
(524, '2271', 'ARAGON KIDS', '2018', 'TIENDA NUEVA', 'CC', 0, 0, 'SOLO INFANTILES Y BEBES', '', '', 0, 124.23, 8.63, '', 0, 0, 'ALKA', 'CENTRO COMERCIAL'),
(525, '2144', 'TEPIC II', '2018', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 398.31, 175.35, '', 0, 0, '', ''),
(526, '2268', 'SENDERO MEXICALI', '2018', 'TIENDA NUEVA', 'CC', 0, 0, 'TODOS', '', '', 0, 537.32, 132.9, '', 0, 0, '', ''),
(527, '2087', 'SAN JUAN DEL RIO I', '2023', 'AMPLIACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 370.4, 161.46, '', 0, 0, '', ''),
(528, '2265', 'PLAZA SENDERO JUÁREZ', '2018', 'TIENDA NUEVA', 'CC', 0, 0, 'VACIA', '', '', 0, 251.24, 136.83, '', 0, 0, '', ''),
(529, '2170', 'IGUALA', '2018', 'AMPLIACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 459.12, 126.81, '', 0, 0, '', ''),
(530, '2129', 'TACUBA', '2018', 'AMPLIACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 446.12, 233.88, '', 0, 0, '', ''),
(531, '2099', 'QUERETARO', '2018', 'AMPLIACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 366.53, 199.28, '', 0, 0, '', ''),
(532, '2264', 'CALLE 5 DE FEBRERO', '2018', 'TIENDA NUEVA', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 411.18, 115.32, '', 0, 0, '', ''),
(533, '2065', 'MAZATLAN', '2018', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 311.25, 103.21, '', 0, 0, '', ''),
(534, '2266', 'GUADALAJARA COLON', '2018', 'TIENDA NUEVA', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 419.66, 85.6, '', 0, 0, '', ''),
(535, '2186', 'SAN CRISTOBAL', '2023', 'REMODELACION', 'CENTRO', 0, 0, 'VACIA', '', '', 0, 318.46, 124.41, '', 0, 0, '', ''),
(536, '2270', 'SENDERO TIJUANA', '2018', 'TIENDA NUEVA', 'CC', 0, 0, 'TODOS', '', '', 0, 375.11, 112.83, '', 0, 0, '', ''),
(537, '2262', 'TENANCINGO', '2018', 'TIENDA NUEVA', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 485.36, 90, '', 0, 0, '', ''),
(538, '2106', 'ORIZABA', '2019', 'AMPLIACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 288.4, 126.43, '', 0, 0, '', ''),
(539, '2249', 'ZINACANTEPEC', '2016', 'TIENDA NUEVA', 'CC', 0, 0, 'TODOS', '', '', 0, 420.14, 79.92, '', 0, 0, '', ''),
(540, '2135', 'SAN ANGEL', '2019', 'REMODELACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 192.73, 127.18, '', 0, 0, '', ''),
(541, '2279', 'PATIO CHALCO', '2019', 'TIENDA NUEVA', 'CC', 0, 0, 'NO BEBES MESES NI AÑOS', '', '', 0, 0, 112.58, '', 0, 0, '', ''),
(542, '2209', 'COMALCALCO', '2019', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 350.5, 170.47, '', 0, 0, '', ''),
(543, '2019', 'PINO SUAREZ', '2019', 'REMODELACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 427.66, 119, '', 0, 0, '', ''),
(544, '2096', 'SAN LUIS POTOSI', '2019', 'REMODELACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 418.81, 318.48, '', 0, 0, '', ''),
(545, '2162', 'HUIMANGUILLO', '2019', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 494.31, 111.75, '', 0, 0, '', ''),
(546, '2259', 'PLAZA CHIMALHUACAN', '2019', 'TIENDA NUEVA', 'CC', 0, 0, 'TODOS', '', '', 0, 628.6, 196.4, '', 0, 0, '', ''),
(547, '2281', 'TLALNEPANTLA PLAZA CC', '2019', 'TIENDA NUEVA', 'CC', 0, 0, 'VACIA', '', '', 0, 0, 0, '', 0, 0, '', ''),
(548, '2103', 'GOMEZ PALACIO', '2019', 'REMODELACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 553.37, 166.72, '', 0, 0, '', ''),
(549, '2280', 'IXTAPALUCA SENDERO', '2019', 'TIENDA NUEVA', 'CC', 0, 0, 'TODOS', '', '', 0, 492, 138, '', 0, 0, '', ''),
(550, '2269', 'MERIDA CALLE 65', '2019', 'TIENDA NUEVA', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 371.92, 161.76, '', 0, 0, '', ''),
(551, '2273', 'LIBRAMIENTO', '2019', 'TIENDA NUEVA', 'CC', 0, 0, 'NO BEBES MESES', '', '', 0, 480.52, 220.67, '', 0, 0, '', ''),
(552, '2181', 'QUERETARO II', '2019', 'AMPLIACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 376.12, 138.15, '', 0, 0, '', ''),
(553, '2045', 'COATZACOALCOS', '2019', 'REMODELACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 519.71, 347.4, '', 0, 0, '', ''),
(554, '2241', 'LOS CABO SAN LUCAS', '2019', 'REMODELACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 380.468, 100, '', 0, 0, '', ''),
(555, '2007', 'VENUSTIANO CARRANZA', '2019', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 263.84, 38, '', 0, 0, '', ''),
(556, '2282', 'LAS AMÉRICAS CANCÚN', '2019', 'TIENDA NUEVA', 'CC', 0, 0, 'TODOS', '', '', 0, 437.76, 192.77, '', 0, 0, '', ''),
(557, '2205', 'PATIO LOS CABOS', '2019', 'REMODELACION', 'CC', 0, 0, 'NO BEBES MESES', '', '', 0, 331.29, 133.25, '', 0, 0, '', ''),
(558, '2278', 'SENDERO ESCOBEDO', '2020', 'TIENDA NUEVA', 'CC', 0, 0, 'DAMA DAMA JUNIOR CABLLERO Y JUNIOR', '', '', 0, 0, 0, '', 0, 0, '', ''),
(559, '2226', 'GUADALAJARA GALEANA', '2020', 'REMODELACION', 'CENTRO', 0, 0, 'DAMA DAMA JUNIOR CABLLERO Y JUNIOR', '', '', 0, 129.44, 63.46, '', 0, 0, '', ''),
(560, '2260', 'CANCUN MALL', '2020', 'TIENDA NUEVA', 'CC', 0, 0, 'TODOS', '', '', 0, 609.44, 111, '', 0, 0, '', ''),
(561, '2043', 'LEON', '2020', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 223.39, 105, '', 0, 0, '', ''),
(562, '2038', 'TENANGO', '2020', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 588.77, 137.45, '', 0, 0, '', ''),
(563, '2180', 'SALAMANCA', '2020', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 397.4, 158.54, '', 0, 0, '', ''),
(564, '2285', 'PUEBLA 5 DE MAYO', '2020', 'TIENDA NUEVA', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 564.75, 232, '', 0, 0, '', ''),
(565, '2284', 'MACROPLAZA VALLARTA', '2020', 'TIENDA NUEVA', 'CC', 0, 0, 'TODOS', '', '', 0, 581.27, 120.33, '', 0, 0, '', ''),
(566, '2261', 'PLAYA DEL CARMEN LAS AMERICAS', '2020', 'TIENDA NUEVA', 'CC', 0, 0, 'TODOS', '', '', 0, 316.01, 84.63, '', 0, 0, '', ''),
(567, '2212', 'TUXTLA III', '2020', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 453.77, 183.78, '', 0, 0, '', ''),
(568, '2283', 'JUCHITAN II', '2021', 'TIENDA NUEVA', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 378.05, 173.5, '', 0, 0, '', ''),
(569, '2289', 'TOLUCA PORTAL II', '2020', 'TIENDA NUEVA', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 526.87, 232.53, '', 0, 0, '', ''),
(570, '2159', 'CHILPANCINGO', '2020', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 443.74, 202.07, '', 0, 0, '', ''),
(571, '2276', 'PUERTA ARAGON', '2021', 'TIENDA NUEVA', 'CC', 0, 0, 'TODOS', '', '', 0, 527.582, 131.03, '', 0, 0, '', ''),
(572, '2288', 'EJE CENTRAL LAZARO CARDENAS', '2020', 'TIENDA NUEVA', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 416.49, 205, '', 0, 0, '', ''),
(573, '2287', 'SENDERO LAS TORRES', '2021', 'TIENDA NUEVA', 'CC', 0, 0, 'TODOS', '', '', 0, 416.49, 127, '', 0, 0, '', ''),
(574, '2275', 'GUADALAJARA INDEPENDENCIA PREFE', '2020', 'REMODELACION', 'CENTRO', 0, 0, 'VACIA', '', '', 0, 349.82, 227, '', 0, 0, '', ''),
(575, '2291', 'TORREON II', '2020', 'RELOCALIZACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 502.61, 7, '', 0, 0, '', ''),
(576, '2208', 'TEPEJI DEL RIO', '2021', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 441.62, 135.58, '', 0, 0, '', ''),
(577, '2142', 'IXTLAHUACA', '2023', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 357.971, 99.54, '', 0, 0, '', ''),
(578, '2220', 'SAN ANDRES TUXTLA', '2021', 'REMODELACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 330.011, 80.8, '', 0, 0, '', ''),
(579, '2293', 'CUERNAVACA KIDS', '2021', 'TIENDA NUEVA', 'CENTRO', 0, 0, 'INFANTILES', '', '', 0, 189.62, 93.95, '', 0, 0, '', ''),
(580, '2294', 'TEZIUTLAN', '2021', 'TIENDA NUEVA', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 506.09, 104.58, '', 0, 0, '', ''),
(581, '2302', 'CIUDAD GUZMAN, II', '2021', 'RELOCALIZACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 543.87, 150.83, '', 0, 0, '', ''),
(582, '2035', 'COLIMA, AMPLIACION 2021', '2021', 'AMPLIACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 538.35, 215.62, '', 0, 0, '', ''),
(583, '2242', 'CORDOBA II', '2021', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 336.15, 146.4, '', 0, 0, '', ''),
(584, '2002', 'SAN ANTONIO ABAD', '2021', 'REMODELACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 300.67, 166.8, '', 0, 0, '', ''),
(585, '2030', 'PACHUCA I', '2021', 'REMODELACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 145.47, 105.49, '', 0, 0, '', ''),
(586, '2130', 'CUAUTLA', '2021', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 443.24, 70.54, '', 0, 0, '', ''),
(587, '2022', 'VERACRUZ II', '2021', 'AMPLIACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 235.9, 0, '', 0, 0, '', ''),
(588, '2149', 'CHALCO', '2021', 'REMODELACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 247.31, 66.06, '', 0, 0, '', ''),
(589, '2037', 'TAMPICO I', '2021', 'REMODELACION', 'CENTRO', 0, 0, 'NO BEBES MESES NI AÑOS', '', '', 0, 139.7, 31.38, '', 0, 0, '', ''),
(590, '2199', 'SAHUAYO', '2021', 'AMPLIACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 307.79, 121.78, '', 0, 0, '', ''),
(591, '2089', 'ZAMORA', '2023', 'AMPLIACION', 'VACIA', 0, 0, 'TODOS', '', '', 0, 403.57, 85.18, '', 0, 0, '', ''),
(592, '2134', 'APIZACO', '2021', 'REMODELACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 165.98, 60.59, '', 0, 0, '', 'A PIE DE CARRETERA'),
(593, '2042', 'ZACATECAS', '2021', 'REMODELACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 243.92, 38.1, '', 0, 0, '', ''),
(594, '2084', 'ACAPULCO ESCUDERO', '2014', 'VACIA', 'VACIA', 0, 0, 'TODOS', '', '', 0, 398.47, 41.39, '', 0, 2, 'ALKA', 'CENTRO COMERCIAL'),
(595, '2187', 'COMITAN', '2022', 'AMPLIACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 263.03, 55.34, '', 0, 0, '', ''),
(596, '2104', 'TEPIC I', '2021', 'REMODELACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 185.42, 52.37, '', 0, 0, '', ''),
(597, '2176', 'ATLACOMULCO', '2014', 'VACIA', 'VACIA', 0, 0, 'VACIA', '', '', 0, 263.71, 0, '', 0, 0, '', 'CENTRO COMERCIAL'),
(598, '2051', 'MINATITLAN I', '2021', 'AMPLIACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 403.1, 136.73, '', 0, 0, '', ''),
(599, '2055', 'GDL LOS ANGELES', '2021', 'REMODELACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 172.95, 59.97, '', 0, 0, '', ''),
(600, '2165', 'VERACRUZ IV', '2021', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 521.02, 121.9, '', 0, 0, '', ''),
(601, '2292', 'GRAN SUR 2021', '2020', 'AMPLIACION', 'CC', 0, 0, 'TODOS', '', '', 0, 389.639, 91.8, '', 0, 0, '', ''),
(602, '2185', 'VILLAFLORES', '2021', 'AMPLIACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 416.77, 98.49, '', 0, 0, '', ''),
(603, '2286', 'ENCUENTRO OCEANIA', '2021', 'TIENDA NUEVA', 'CC', 0, 0, 'TODOS', '', '', 0, 412.48, 108.72, '', 0, 0, '', ''),
(604, '2048', 'CUERNAVACA 1', '2021', 'REMODELACION', 'CENTRO', 0, 0, 'NO BEBES MESES NI AÑOS NI INFANTILES', '', '', 0, 199.47, 102.73, '', 0, 0, '', ''),
(605, '2296', 'APODACA', '2021', 'TIENDA NUEVA', 'CC', 0, 0, 'NO BEBES MESES NI AÑOS', '', '', 0, 265.17, 122, '', 0, 0, '', 'CENTRO COMERCIAL'),
(606, '2298', 'SENDERO CULIACAN', '2021', 'TIENDA NUEVA', 'CC', 0, 0, 'TODOS', '', '', 0, 559.51, 139.55, '', 0, 0, '', ''),
(607, '2218', 'MACUSPANA', '2021', 'REMODELACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 233.95, 71.01, '', 0, 0, '', ''),
(608, '2080', 'ZITACUARO', '2021', 'AMPLIACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 372.8, 140, '', 0, 0, '', ''),
(609, '2136', 'CELAYA', '2017', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 447, 129.46, '', 0, 0, '', ''),
(610, '2158', 'CUAUTITLAN ROMERO RUBIO', '2022', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 322.1, 53.5, '', 0, 0, '', ''),
(611, '2193', 'ZACAPU', '2022', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 462.9, 119.59, '', 0, 0, '', ''),
(612, '2075', 'SAN MATEO ATENCO', '2022', 'AMPLIACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 304.82, 83.31, '', 0, 0, '', ''),
(613, '2219', 'TEAPA', '2022', 'REMODELACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 382.74, 167.03, '', 0, 0, '', ''),
(614, '2083', 'CANCUN 2', '2022', 'AMPLIACION', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 374.58, 68.09, '', 0, 0, '', 'A PIE DE CARRETERA'),
(615, '2307', 'VALLEJO II', '2022', 'TIENDA NUEVA', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 452.41, 130, '', 0, 0, '', ''),
(616, '2301', 'CANCUN TULUM', '2022', 'TIENDA NUEVA', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 0, 0, '', 0, 0, '', ''),
(617, '2299', 'TECAMAC I', '2022', 'TIENDA NUEVA', 'CENTRO', 0, 0, 'TODOS', '', '', 0, 0, 0, '', 0, 0, '', ''),
(618, '2295', 'PUEBLA PLAZA DORADA', '2022', 'TIENDA NUEVA', 'CC', 0, 0, 'TODOS', '', '', 0, 0, 0, '', 0, 0, '', ''),
(619, '2311', 'SENDERO TOLUCA', '2022', 'TIENDA NUEVA', 'CC', 0, 0, 'TODOS', '', '', 0, 0, 0, '', 0, 0, '', ''),
(620, '2100', 'AGUASCALIENTES', '2022', 'TIENDA NUEVA', 'CC', 0, 0, 'NO BEBES MESES NI AÑOS', '', '', 0, 0, 0, '', 0, 1, 'ALKA', 'CENTRO COMERCIAL'),
(621, '2304', 'SANTA CATARINA', '2022', 'TIENDA NUEVA', 'CC', 0, 0, 'TODOS', '', '', 0, 0, 0, '', 0, 0, '', ''),
(622, '2303', 'PASEO MONCLOVA', '2022', 'TIENDA NUEVA', 'CC', 0, 0, 'TODOS', '', '', 0, 0, 0, '', 0, 0, '', ''),
(623, '2310', 'FRESNILLO II', '2022', 'RELOCALIZACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 0, 0, '', 0, 0, '', ''),
(624, '2700', 'LOMAS VERDES ECOMERCE', '2022', 'TIENDA NUEVA', 'CC', 0, 0, 'TODOS', '', '', 0, 0, 0, '', 0, 0, '', ''),
(625, '2314', 'CD VICTORIA II', '2022', 'RELOCALIZACION', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 0, 0, '', 0, 0, '', ''),
(626, '2312', 'DELICIAS', '2022', 'TIENDA NUEVA', 'CENTRO', 0, 0, 'NO BEBES MESES', '', '', 0, 0, 0, '', 0, 0, '', ''),
(627, '2236', 'AZCAPOTZALCO KIDS', '2023', 'REMODELACION', 'CENTRO', 0, 0, 'INFANTILES BEBES MESES Y AÑOS', '', '', 0, 0, 1, '', 0, 0, '', ''),
(628, '2309', 'XALAPA II', '2023', 'TIENDA NUEVA', 'CALLE', 0, 0, 'TODOS', '', '', 0, 474.31, 151.61, '', 0, 0, '', ''),
(629, '0000', 'EJEM TND', '2000', 'AAA', 'AAA', 0, 0, 'AAA', '', '', 0, 10, 10, '', 0, 0, '', ''),
(632, '0001', 'PRUEBA', '0000', 'RELOCALIZACION', 'CC', 0, 0, 'TODO', '', '', 0, 100, 235.76, '', 0, 0, 'aaa', 'A PIE DE CARRETERA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `useravante`
--

CREATE TABLE `useravante` (
  `id` int(11) NOT NULL,
  `Nombre` text NOT NULL,
  `Apellido` text NOT NULL,
  `curso` int(11) NOT NULL,
  `password` text NOT NULL,
  `username` text NOT NULL,
  `is_profesor` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `useravante`
--

INSERT INTO `useravante` (`id`, `Nombre`, `Apellido`, `curso`, `password`, `username`, `is_profesor`, `deleted`) VALUES
(1, 'IMAGEN', 'VISUAL', 1, 'IMG_2023*', 'IMAGEN_VISUAL', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `useravante2`
--

CREATE TABLE `useravante2` (
  `id` int(11) NOT NULL,
  `Nombre` text NOT NULL,
  `Apellido` text NOT NULL,
  `curso` int(11) NOT NULL,
  `password` text NOT NULL,
  `username` text NOT NULL,
  `is_alumno` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioscontrol`
--

CREATE TABLE `usuarioscontrol` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `uploadprod` int(11) NOT NULL DEFAULT 0,
  `altapaccess` int(11) NOT NULL DEFAULT 0,
  `gencaccess` int(11) NOT NULL DEFAULT 0,
  `pdntaccess` int(11) NOT NULL DEFAULT 0,
  `nombreusuario` text NOT NULL,
  `consultas` int(11) NOT NULL DEFAULT 0,
  `mobi` int(11) NOT NULL DEFAULT 0,
  `rolusuario` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarioscontrol`
--

INSERT INTO `usuarioscontrol` (`id`, `nombre`, `uploadprod`, `altapaccess`, `gencaccess`, `pdntaccess`, `nombreusuario`, `consultas`, `mobi`, `rolusuario`) VALUES
(1, 'Marco', 1, 1, 1, 1, 'marco.morales', 1, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `centrocostos`
--
ALTER TABLE `centrocostos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `centrocostosfinal`
--
ALTER TABLE `centrocostosfinal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `centrocostosfinalprov`
--
ALTER TABLE `centrocostosfinalprov`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `centrocostosprov`
--
ALTER TABLE `centrocostosprov`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `detallecompras`
--
ALTER TABLE `detallecompras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nombreusuario`
--
ALTER TABLE `nombreusuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `numerocompra`
--
ALTER TABLE `numerocompra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `numerocompra2`
--
ALTER TABLE `numerocompra2`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rel_sku_prod`
--
ALTER TABLE `rel_sku_prod`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rel_sku_tnd`
--
ALTER TABLE `rel_sku_tnd`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subdepartamentos`
--
ALTER TABLE `subdepartamentos`
  ADD PRIMARY KEY (`id_subdepartamento`);

--
-- Indices de la tabla `subtotales`
--
ALTER TABLE `subtotales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subtotalesprov`
--
ALTER TABLE `subtotalesprov`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temporales`
--
ALTER TABLE `temporales`
  ADD PRIMARY KEY (`id_nuevo`);

--
-- Indices de la tabla `temporalescabeceros`
--
ALTER TABLE `temporalescabeceros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temporalesdetalle`
--
ALTER TABLE `temporalesdetalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tienda`
--
ALTER TABLE `tienda`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `useravante`
--
ALTER TABLE `useravante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `useravante2`
--
ALTER TABLE `useravante2`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarioscontrol`
--
ALTER TABLE `usuarioscontrol`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `centrocostos`
--
ALTER TABLE `centrocostos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `centrocostosfinal`
--
ALTER TABLE `centrocostosfinal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `centrocostosfinalprov`
--
ALTER TABLE `centrocostosfinalprov`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `centrocostosprov`
--
ALTER TABLE `centrocostosprov`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `detallecompras`
--
ALTER TABLE `detallecompras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3773;

--
-- AUTO_INCREMENT de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `nombreusuario`
--
ALTER TABLE `nombreusuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `numerocompra`
--
ALTER TABLE `numerocompra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `numerocompra2`
--
ALTER TABLE `numerocompra2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=418;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rel_sku_prod`
--
ALTER TABLE `rel_sku_prod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=576;

--
-- AUTO_INCREMENT de la tabla `rel_sku_tnd`
--
ALTER TABLE `rel_sku_tnd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subdepartamentos`
--
ALTER TABLE `subdepartamentos`
  MODIFY `id_subdepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `subtotales`
--
ALTER TABLE `subtotales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `subtotalesprov`
--
ALTER TABLE `subtotalesprov`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temporales`
--
ALTER TABLE `temporales`
  MODIFY `id_nuevo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4550;

--
-- AUTO_INCREMENT de la tabla `temporalescabeceros`
--
ALTER TABLE `temporalescabeceros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `temporalesdetalle`
--
ALTER TABLE `temporalesdetalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `tienda`
--
ALTER TABLE `tienda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=633;

--
-- AUTO_INCREMENT de la tabla `useravante`
--
ALTER TABLE `useravante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `useravante2`
--
ALTER TABLE `useravante2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarioscontrol`
--
ALTER TABLE `usuarioscontrol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
