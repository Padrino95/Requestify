-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2024 a las 13:31:36
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `requestify`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `nick` varchar(100) NOT NULL,
  `contraseña` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `telefono`, `nick`, `contraseña`) VALUES
(1, 'Alberto', '958441120', 'Padrino', '2f9d91c41ac685028816849b8fd6eed1'),
(2, 'Julio López', '636451236', 'Rom3ox', 'eea98ab94d9fa56903b2e38a0004c6db'),
(7, 'Thalia', '958441120', 'TH', '49bc5920674b572d971d3c068715b514');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `num` bigint(20) NOT NULL,
  `estado` char(1) NOT NULL,
  `fecha` date NOT NULL,
  `id_cliente` bigint(20) NOT NULL,
  `cod_servicio` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contratos`
--

INSERT INTO `contratos` (`num`, `estado`, `fecha`, `id_cliente`, `cod_servicio`) VALUES
(35, 'D', '2024-05-15', 1, 2),
(36, 'D', '2024-05-15', 1, 2),
(37, 'D', '2024-05-15', 1, 2),
(38, 'D', '2024-05-15', 1, 3),
(39, 'D', '2024-05-15', 1, 1),
(40, 'D', '2024-05-15', 1, 2),
(41, 'D', '2024-05-15', 1, 2),
(42, 'D', '2024-05-15', 1, 2),
(43, 'D', '2024-05-15', 1, 3),
(44, 'D', '2024-05-15', 1, 2),
(45, 'D', '2024-05-15', 1, 2),
(46, 'D', '2024-05-15', 1, 2),
(47, 'D', '2024-05-15', 1, 2),
(48, 'D', '2024-05-15', 1, 2),
(49, 'D', '2024-05-15', 1, 2),
(50, 'D', '2024-05-15', 1, 2),
(51, 'D', '2024-05-18', 1, 2),
(52, 'D', '2024-05-19', 1, 2),
(53, 'D', '2024-05-20', 1, 2),
(54, 'A', '2024-05-20', 1, 2),
(55, 'A', '2024-05-27', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editores`
--

CREATE TABLE `editores` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `nick` varchar(50) NOT NULL,
  `presentacion` text NOT NULL,
  `foto` varchar(55) NOT NULL,
  `tipo` varchar(1) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `cod_estilo` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `editores`
--

INSERT INTO `editores` (`id`, `nombre`, `nick`, `presentacion`, `foto`, `tipo`, `pass`, `cod_estilo`) VALUES
(0, 'admin', 'admin', 'admin', '0.jpg', 'A', '67f43efc5701784db1504e4993d7e393', 0),
(21, 'Rubén Roldán', 'Niterebo', '¡Hola y bienvenidos a mi perfil! Soy Rubén Roldán, un apasionado editor audiovisual con una misión clara: contar historias que cautiven, emocionen y dejen una impresión duradera en la audiencia. Con una sólida formación en producción audiovisual y una amplia experiencia en la industria, estoy aquí para ofrecerte servicios de edición de primera calidad y para ayudarte a llevar tus proyectos audiovisuales al siguiente nivel.\n\nDesde la creación de impactantes vídeos corporativos hasta la producción de cautivadores cortometrajes y documentales, mi objetivo es trabajar estrechamente contigo para dar vida a tu visión creativa. Me enorgullece mi enfoque meticuloso y mi atención al detalle, asegurándome de que cada proyecto sea ejecutado con la más alta calidad y profesionalismo.\n\nLo que me distingue es mi pasión por la innovación y la experimentación. Siempre estoy buscando nuevas formas de expresión visual, desde técnicas de edición innovadoras hasta efectos especiales y motion graphics. Mi objetivo es sorprender y deleitar a la audiencia, creando contenido que no solo sea visualmente impresionante, sino también memorable y significativo.\n\nMi compromiso contigo va más allá de la edición. Estoy aquí para colaborar estrechamente contigo, escuchar tus ideas y convertirlas en realidad. Creo firmemente en la importancia de una comunicación abierta y transparente, asegurándome de que estés completamente satisfecho con el resultado final.\n\n', '21.png', 'E', '816d26ba8239a7690241b5ab06906b05', 1),
(22, 'Eloy Jerez', 'Eloyster', 'Me llamo Eloy Jerez y me dirijo a usted con gran entusiasmo para presentarme como su potencial colaborador en el campo de la edición fotográfica. Con una sólida experiencia en la edición de imágenes y un profundo amor por la fotografía, estoy seguro de que mi habilidad para transformar imágenes en verdaderas obras de arte puede aportar un valor significativo a sus proyectos.A lo largo de mi carrera, he tenido el privilegio de trabajar con una variedad de fotógrafos y artistas visuales, ayudándoles a dar vida a sus visiones mediante técnicas avanzadas de edición. Mi enfoque se centra en realzar la esencia de cada fotografía, asegurándome de que cada detalle cuente una parte de la historia que se quiere transmitir.Soy experto en el uso de herramientas de edición como Adobe Photoshop y Lightroom, y estoy constantemente aprendiendo nuevas técnicas y tendencias para mantenerme actualizado en un campo que evoluciona rápidamente. Mi experiencia abarca desde la corrección de color y la mejora de la nitidez, hasta la creación de efectos visuales complejos y la integración de elementos digitales. Además, tengo un agudo sentido estético que me permite trabajar en una amplia gama de estilos, desde el realismo hasta el surrealismo, adaptándome a las necesidades específicas de cada proyecto.Una de mis mayores satisfacciones es ver cómo una imagen puede cobrar vida a través de la edición, destacando elementos que podrían haber pasado desapercibidos y creando una composición equilibrada y visualmente impactante. Me enorgullece mi capacidad para trabajar de manera eficiente y detallada, siempre entregando resultados de alta calidad en plazos ajustados.', '22.png', 'E', '49f4402396fd18bac8e690b4f9ab1878', 11),
(23, 'Andrea Falcon', 'Andy', '¡Hola a todos! Soy Andrea Falcón, una apasionada editora audiovisual con una creatividad sin límites y un amor profundo por el arte de contar historias a través del cine y la edición. Con una formación sólida en producción audiovisual y una amplia experiencia en la industria, estoy aquí para ofrecerte servicios de edición que transformarán tus ideas en obras maestras audiovisuales.\r\n\r\nDesde la creación de cautivadores vídeos corporativos hasta la producción de conmovedores cortometrajes y documentales, mi objetivo es trabajar en estrecha colaboración contigo para dar vida a tu visión creativa. Me enorgullece mi atención al detalle y mi habilidad para capturar la esencia de cada narrativa de manera auténtica y emocionante.\r\n\r\nLo que me diferencia es mi enfoque innovador y mi pasión por la experimentación. Siempre estoy buscando nuevas formas de expresión visual, desde técnicas de edición vanguardistas hasta efectos especiales y motion graphics. Mi objetivo es crear contenido que no solo sea visualmente impresionante, sino también conmovedor y memorable.\r\n\r\nMi compromiso contigo va más allá de la edición. Estoy aquí para escuchar tus ideas, entender tus necesidades y trabajar incansablemente para superar tus expectativas. Creo en la importancia de una comunicación abierta y transparente, para que estés completamente satisfecho con el resultado final.\r\n\r\nFuera del trabajo, encuentro inspiración en todas partes, desde la música hasta el arte callejero y la naturaleza. Creo que la creatividad es un viaje infinito, y estoy emocionada de embarcarme en este viaje contigo.', '23.png', 'E', '49bc5920674b572d971d3c068715b514', 3),
(24, 'Gorka Nadal', 'Gorkster', '¡Saludos a todos los amantes del arte visual! Me presento como Gorka \"El Maestro de las Imágenes\" Nadal, un mago de la edición audiovisual con una pasión desenfrenada por transformar ideas en experiencias visuales inolvidables. Con mi varita mágica (también conocida como mi computadora de edición), estoy aquí para llevarte en un viaje lleno de emociones, creatividad y momentos memorables.\r\n\r\nDesde las laderas de la edición de vídeos corporativos hasta los paisajes de la producción de cortometrajes y documentales, mi objetivo es crear obras de arte que cautiven, inspiren y dejen una marca indeleble en la mente de la audiencia. Con cada proyecto, me sumerjo en un universo de posibilidades, explorando cada rincón de la narrativa para extraer su esencia más pura y transformarla en una obra maestra visual.\r\n\r\nLo que me diferencia es mi enfoque único y mi pasión por la innovación. Me encanta desafiar los límites de la edición audiovisual, experimentando con técnicas y efectos para crear algo verdaderamente fuera de lo común. Desde el surrealismo hasta la extravagancia, estoy aquí para llevar tus ideas más salvajes y audaces a la pantalla grande (o pequeña).\r\n\r\nMi compromiso contigo va más allá de la edición. Soy tu compañero de viaje en este emocionante viaje creativo, siempre dispuesto a escuchar tus ideas, compartir mi experiencia y trabajar juntos para hacer realidad tus sueños audiovisuales. Creo en la magia de la colaboración y en el poder de la comunicación abierta y honesta para lograr resultados extraordinarios.\r\n\r\nFuera del mundo de la edición, me encontrarás explorando nuevas formas de inspiración, desde el arte callejero hasta la naturaleza salvaje.', '24.png', 'E', '8655d4779f65b83f128c3e7e8b0b4f03', 4),
(25, 'Camila Pinilla', 'CamiVisionaria', 'Soy Camila Pinilla y estoy emocionada por presentarme como tu futura editora fotográfica. Con una gran pasión por la fotografía y años de experiencia en la edición de imágenes, estoy segura de que puedo llevar tus proyectos al siguiente nivel.\n\nHe tenido la suerte de trabajar con fotógrafos y artistas visuales increíbles, ayudándoles a dar vida a sus visiones a través de técnicas de edición avanzadas. Me encanta resaltar la esencia de cada fotografía, asegurándome de que cada detalle cuente una historia.\n\nSoy una maestra en Adobe Photoshop y Lightroom, y siempre estoy al tanto de las últimas tendencias y técnicas de edición. Mi experiencia va desde la corrección de color y la mejora de la nitidez, hasta la creación de efectos visuales complejos. Además, tengo un ojo estético agudo que me permite adaptarme a cualquier estilo, desde el realismo hasta el surrealismo.\n\nLo que más me satisface es ver cómo una imagen cobra vida a través de la edición, destacando detalles que podrían pasar desapercibidos y creando una composición visualmente impactante. Me enorgullezco de mi eficiencia y atención al detalle, siempre entregando resultados de alta calidad a tiempo.\n\nEstoy realmente interesada en colaborar contigo y tu equipo. Estoy convencida de que mi dedicación y habilidades pueden contribuir significativamente al éxito de tus proyectos fotográficos. Me encantaría hablar más sobre cómo puedo apoyar tus necesidades de edición fotográfica y aportar mi experiencia a tu servicio.', '25.png', 'E', '3a124403da4a2665b0ab2f3c4b677723', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estilos`
--

CREATE TABLE `estilos` (
  `cod` bigint(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estilos`
--

INSERT INTO `estilos` (`cod`, `nombre`, `descripcion`) VALUES
(0, 'admin', 'admin'),
(1, 'Vintage', 'El estilo vintage busca evocar una sensación de nostalgia y antigüedad. Se caracteriza por tonos cálidos o sepia, así como por agregar efectos de grano y desaturación selectiva para imitar el aspecto de fotografías antiguas. Además, se pueden agregar bordes desgastados o efectos de luz que sugieran la época analógica.'),
(2, 'Minimalista', 'La edición minimalista es un enfoque que busca simplificar la composición visual de una fotografía para destacar la belleza en la simplicidad. Este estilo se basa en la eliminación de elementos superfluos y en la reducción de la paleta de colores para crear una imagen que transmita calma, armonía y serenidad. Se utilizan tonos suaves y neutros, así como ajustes cuidadosos de contraste y exposición para resaltar las formas y estructuras básicas en la imagen. La edición minimalista no solo se trat'),
(3, 'HDR', 'El estilo HDR, o High Dynamic Range, es una técnica de edición que busca maximizar el rango dinámico de una imagen, es decir, la diferencia entre las áreas más claras y las más oscuras. Esto se logra mediante la combinación de múltiples exposiciones de la misma escena, desde las más subexpuestas que capturan detalles en las sombras hasta las sobreexpuestas que retienen información en las luces más brillantes. Luego, mediante software especializado, se fusionan estas exposiciones para obtener una'),
(4, 'Grunge', 'El estilo grunge en la edición fotográfica busca recrear una estética descuidada y desgastada, inspirada en el movimiento musical y cultural del grunge de los años 90. Se caracteriza por colores desaturados, tonos oscuros y una apariencia áspera o sucia. Se agregan texturas y efectos de envejecimiento, como manchas, rayones o rasgaduras, para simular el desgaste físico de la imagen. Además, se pueden aplicar filtros de alto contraste y desenfoque selectivo para resaltar ciertos elementos y crear'),
(11, 'Fantasía', 'El estilo de edición fotográfica \"Fantasía\" busca transformar las imágenes en paisajes o escenas de ensueño y fantasía. Se caracteriza por la manipulación creativa de colores, luces y elementos visuales para crear mundos imaginarios y atmosferas mágicas. Puede incluir la incorporación de elementos fantásticos como criaturas míticas, paisajes surrealistas o efectos de magia. Los colores suelen ser intensos y vibrantes, con una sensación de irrealidad que transporta al espectador a un mundo de mar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `cod` bigint(20) NOT NULL,
  `texto` varchar(500) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `cod_proyecto` bigint(20) NOT NULL,
  `id_editor` bigint(20) NOT NULL,
  `id_cliente` bigint(20) NOT NULL,
  `remitente` varchar(50) NOT NULL,
  `id_Remitente` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`cod`, `texto`, `fecha`, `hora`, `cod_proyecto`, `id_editor`, `id_cliente`, `remitente`, `id_Remitente`) VALUES
(29, 'Que te ha parecido la edición?', '2024-06-01', '13:09:10', 31, 21, 1, 'Niterebo', 21),
(30, 'Me ha encantado la edición gracias¡¡¡¡¡', '2024-06-06', '13:29:54', 32, 22, 1, 'Padrino', 1),
(31, 'Me alegra mucho escuchar eso¡¡', '2024-06-06', '13:30:38', 32, 22, 1, 'Eloyster', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimedias`
--

CREATE TABLE `multimedias` (
  `id` bigint(20) NOT NULL,
  `ruta` varchar(55) NOT NULL,
  `f_subida` date NOT NULL,
  `cod_proyecto` bigint(20) NOT NULL,
  `destacada` int(1) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `multimedias`
--

INSERT INTO `multimedias` (`id`, `ruta`, `f_subida`, `cod_proyecto`, `destacada`, `estado`) VALUES
(25, '26.0.jpg', '2024-05-17', 26, 0, 'R'),
(26, '26.1.jpg', '2024-05-17', 26, 1, 'R'),
(27, '26.2.jpg', '2024-05-17', 26, 0, 'R'),
(28, '26.3.jpg', '2024-05-17', 26, 0, 'R'),
(29, '26.4.jpg', '2024-05-17', 26, 0, 'R'),
(30, '26.5.jpg', '2024-05-17', 26, 0, 'R'),
(31, '26.6.jpg', '2024-05-17', 26, 0, 'R'),
(32, '26.7.jpg', '2024-05-17', 26, 0, 'R'),
(33, '27.0.jpg', '2024-05-18', 27, 0, 'R'),
(34, '27.1.jpg', '2024-05-18', 27, 0, 'R'),
(35, '27.2.jpg', '2024-05-18', 27, 0, 'R'),
(36, '27.3.jpg', '2024-05-18', 27, 0, 'R'),
(37, '27.4.jpg', '2024-05-18', 27, 0, 'R'),
(38, '27.5.jpg', '2024-05-18', 27, 0, 'R'),
(39, '27.6.jpg', '2024-05-18', 27, 1, 'R'),
(40, '27.7.jpg', '2024-05-18', 27, 0, 'R'),
(41, '27.8.jpg', '2024-05-18', 27, 0, 'R'),
(42, '28.0.jpg', '2024-05-18', 28, 0, 'R'),
(43, '28.1.jpg', '2024-05-18', 28, 0, 'R'),
(44, '28.2.jpg', '2024-05-18', 28, 0, 'R'),
(45, '28.3.jpg', '2024-05-18', 28, 0, 'R'),
(46, '28.4.jpg', '2024-05-18', 28, 0, 'R'),
(47, '28.5.jpg', '2024-05-18', 28, 0, 'R'),
(48, '28.6.jpg', '2024-05-18', 28, 0, 'R'),
(49, '28.7.jpg', '2024-05-18', 28, 0, 'R'),
(50, '28.8.jpg', '2024-05-18', 28, 0, 'R'),
(51, '28.9.jpg', '2024-05-18', 28, 0, 'R'),
(52, '28.10.jpg', '2024-05-18', 28, 0, 'R'),
(53, '28.11.jpg', '2024-05-18', 28, 1, 'R'),
(66, '30.0.jpg', '2024-05-18', 30, 0, 'R'),
(67, '30.1.jpg', '2024-05-18', 30, 0, 'R'),
(68, '30.2.jpg', '2024-05-18', 30, 0, 'R'),
(69, '30.3.jpg', '2024-05-18', 30, 0, 'R'),
(70, '30.4.jpg', '2024-05-18', 30, 0, 'R'),
(71, '30.5.jpg', '2024-05-18', 30, 0, 'R'),
(72, '30.6.jpg', '2024-05-18', 30, 0, 'R'),
(73, '30.7.jpg', '2024-05-18', 30, 0, 'R'),
(74, '30.8.jpg', '2024-05-18', 30, 1, 'R'),
(75, '30.9.jpg', '2024-05-18', 30, 0, 'R'),
(76, '30.10.jpg', '2024-05-18', 30, 0, 'R'),
(77, '30.11.jpg', '2024-05-18', 30, 0, 'R'),
(78, '31.0.jpg', '2024-05-24', 31, 0, 'R'),
(79, '31.1.jpg', '2024-05-24', 31, 0, 'R'),
(80, '31.2.jpg', '2024-05-24', 31, 0, 'R'),
(81, '31.3.jpg', '2024-05-24', 31, 0, 'R'),
(82, '31.4.jpg', '2024-05-24', 31, 1, 'R'),
(83, '31.5.jpg', '2024-05-24', 31, 0, 'R'),
(84, '31.6.jpg', '2024-05-24', 31, 0, 'R'),
(85, '31.7.jpg', '2024-05-24', 31, 0, 'R'),
(86, '31.8.jpg', '2024-05-24', 31, 0, 'R'),
(87, '31.9.jpg', '2024-05-24', 31, 0, 'R'),
(88, '31.10.jpg', '2024-05-24', 31, 0, 'R'),
(89, '31.11.jpg', '2024-05-24', 31, 0, 'R'),
(90, '32.0.jpg', '2024-06-06', 32, 0, 'R'),
(91, '32.1.jpg', '2024-06-06', 32, 0, 'R'),
(92, '32.2.jpg', '2024-06-06', 32, 0, 'R'),
(93, '32.3.jpg', '2024-06-06', 32, 0, 'R'),
(94, '32.4.jpg', '2024-06-06', 32, 0, 'R'),
(95, '32.5.jpg', '2024-06-06', 32, 1, 'R'),
(96, '32.6.jpg', '2024-06-06', 32, 0, 'R'),
(97, '32.7.jpg', '2024-06-06', 32, 0, 'R'),
(98, '32.8.jpg', '2024-06-06', 32, 0, 'R'),
(99, '32.9.jpg', '2024-06-06', 32, 0, 'R'),
(100, '32.10.jpg', '2024-06-06', 32, 0, 'R'),
(101, '32.11.jpg', '2024-06-06', 32, 0, 'R'),
(103, '32.13.jpg', '2024-06-06', 32, 0, 'E'),
(104, '32.14.jpg', '2024-06-06', 32, 0, 'E'),
(105, '32.15.jpg', '2024-06-06', 32, 0, 'E'),
(106, '32.16.jpg', '2024-06-06', 32, 0, 'E'),
(107, '32.17.jpg', '2024-06-06', 32, 0, 'E'),
(108, '32.18.jpg', '2024-06-06', 32, 0, 'E'),
(109, '32.19.jpg', '2024-06-06', 32, 0, 'E'),
(110, '32.20.jpg', '2024-06-06', 32, 0, 'E'),
(111, '32.21.jpg', '2024-06-06', 32, 0, 'E'),
(112, '32.22.jpg', '2024-06-06', 32, 0, 'E'),
(113, '32.23.jpg', '2024-06-06', 32, 0, 'E'),
(114, '32.24.jpg', '2024-06-06', 32, 0, 'E');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `cod` bigint(20) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `f_inicio` date NOT NULL,
  `f_fin` date DEFAULT NULL,
  `estado` char(1) NOT NULL,
  `descripcion` text NOT NULL,
  `num_contrato` bigint(20) NOT NULL,
  `id_cliente` bigint(20) NOT NULL,
  `comentario` varchar(300) DEFAULT NULL,
  `puntos` int(2) DEFAULT NULL,
  `cod_editor` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`cod`, `titulo`, `f_inicio`, `f_fin`, `estado`, `descripcion`, `num_contrato`, `id_cliente`, `comentario`, `puntos`, `cod_editor`) VALUES
(26, 'Neón y Cromo: Crónicas de un Futuro Distópico', '2024-05-17', NULL, 'A', 'Neón y Cromo: Crónicas de un Futuro Distópico\" es una serie de fotografía que explora la estética y narrativa del género cyberpunk. En un mundo donde la tecnología avanzada y la decadencia urbana coexisten, este proyecto busca capturar la esencia de una sociedad distópica a través de imágenes visualmente impactantes y cargadas de simbolismo.\n\nCada fotografía contará una historia ambientada en un futuro cercano, donde los paisajes urbanos están iluminados por luces de neón y dominados por rascacielos de cristal y metal. Los escenarios incluyen callejones oscuros llenos de grafitis futuristas, mercados callejeros con una mezcla de culturas y tecnologías, y miradores que ofrecen vistas de ciudades caóticas y sobrepobladas.\n\nLos personajes en estas imágenes serán habitantes de este mundo cyberpunk: individuos con implantes cibernéticos, hackers en busca de datos prohibidos, mercenarios de aspecto rudo, y ciudadanos comunes que navegan un entorno hostil y tecnológicamente avanzado. Cada uno de ellos llevará accesorios y vestimenta que reflejan la fusión entre lo humano y lo tecnológico, como gafas de realidad aumentada, prótesis robóticas, y ropa con luces integradas.\n\nLa edición de las fotografías será crucial para lograr el efecto deseado. Se emplearán técnicas avanzadas para ajustar los colores y crear los característicos tonos vibrantes del cyberpunk, con un énfasis en los contrastes intensos entre luces de neón y sombras profundas. La integración de elementos digitales, como hologramas y interfaces de usuario flotantes, añadirá autenticidad al entorno futurista y tecnológico.\n\nEl objetivo de \"Neón y Cromo\" es no solo ofrecer una visión estética del mundo cyberpunk, sino también provocar una reflexión sobre los desafíos y dilemas éticos que podría traer un futuro dominado por la tecnología. A través de estas imágenes, quiero invitar a los espectadores a sumergirse en un universo donde la línea entre lo humano y lo artificial se desdibuja, y considerar las implicaciones de una sociedad altamente tecnificada.\n\nEste proyecto es una celebración del cyberpunk y un tributo a su rica tradición en la ciencia ficción. Espero que cada fotografía no solo capte la vista, sino que también inspire la imaginación y la curiosidad sobre el futuro de nuestra propia sociedad.', 50, 1, NULL, NULL, 25),
(27, 'Reflejos de Japón: Tradición y Modernidad del Edo', '2024-05-18', NULL, 'A', '\"Reflejos de Japón: Tradición y Modernidad\" es una serie fotográfica que busca capturar la esencia de Japón a través de un lente que celebra tanto su rica herencia cultural como su vibrante presente tecnológico. Este proyecto explora la coexistencia armoniosa entre lo antiguo y lo nuevo en una nación donde los templos milenarios se encuentran a la sombra de los rascacielos futuristas.\r\n\r\nLas fotografías abarcarán una variedad de escenarios que representan diferentes aspectos de la vida en Japón. Desde los tranquilos jardines zen y los majestuosos templos sintoístas y budistas, hasta las bulliciosas calles de Tokio y Osaka, iluminadas por neones y repletas de carteles electrónicos. Cada imagen será una ventana a la dualidad única de Japón, donde la tradición y la modernidad no solo coexisten, sino que se enriquecen mutuamente.\r\n\r\nLos retratos de personas serán un componente clave de esta serie, destacando a individuos que encarnan esta dualidad. Veremos desde monjes en meditación y maestros de artes tradicionales como el ikebana y la ceremonia del té, hasta jóvenes con moda vanguardista en los distritos más modernos de la ciudad. También se capturará la vida cotidiana de los japoneses, mostrando cómo la tecnología avanzada y las costumbres ancestrales influyen en su día a día.\r\n\r\nLa edición de las fotografías buscará resaltar la belleza y la diversidad de Japón. Se emplearán técnicas para realzar los colores vibrantes de los kimonos, las flores de cerezo en primavera, y las luces de la ciudad de noche. Al mismo tiempo, se mantendrá una estética limpia y elegante, reflejando el minimalismo y la atención al detalle característicos de la cultura japonesa.\r\n\r\nEl objetivo de \"Reflejos de Japón\" es ofrecer una mirada profunda y auténtica a un país que equilibra con gracia su pasado y su futuro. A través de estas imágenes, se pretende no solo capturar la belleza visual de Japón, sino también narrar historias que revelen su alma y espíritu. Los espectadores serán invitados a descubrir y apreciar las múltiples facetas de Japón, desde su reverencia por las tradiciones hasta su pasión por la innovación.\r\n\r\nEste proyecto es un homenaje a Japón y su capacidad de integrar lo antiguo con lo contemporáneo, creando un tejido cultural rico y dinámico. Espero que cada fotografía inspire admiración y respeto por una nación que continúa fascinando al mundo con su singular combinación de historia y progreso.', 50, 1, NULL, NULL, 21),
(28, 'Colores de Holi: Celebración y Alegría en la India', '2024-05-18', '2024-05-27', 'F', '\"Colores de Holi: Celebración y Alegría en la India\" es una serie fotográfica que busca capturar la vibrante energía y el espíritu festivo de Holi, una de las celebraciones más emblemáticas y coloridas de la India. Este proyecto pretende documentar la explosión de colores, emociones y tradiciones que hacen de Holi una experiencia única e inolvidable.\r\n\r\nLa serie se enfocará en los momentos más dinámicos y visualmente impactantes de la festividad. Las fotografías mostrarán a personas de todas las edades cubiertas de polvos de colores brillantes, lanzando y recibiendo pigmentos con alegría desenfrenada. Capturaremos las sonrisas y risas, las danzas y abrazos, y la camaradería que une a amigos, familiares y desconocidos en una celebración de unidad y renovación.\r\n\r\nLas imágenes incluirán escenas de las preparaciones antes del festival, como la mezcla y distribución de los polvos de colores, las decoraciones tradicionales, y los rituales religiosos que marcan el inicio de Holi. También se documentarán los aspectos culturales y simbólicos de la festividad, como los fuegos ceremoniales y las ofrendas a los dioses, que representan la victoria del bien sobre el mal.\r\n\r\nEl proyecto no se limitará a los eventos principales; también explorará la vida cotidiana en las calles y los mercados durante Holi, mostrando cómo la festividad transforma el entorno urbano y rural. Los retratos individuales y grupales destacarán la diversidad de personas que participan en la celebración, desde niños pequeños hasta ancianos, cada uno contribuyendo con su propia energía y entusiasmo.\r\n\r\nLa edición de las fotografías buscará realzar la intensidad de los colores y la vitalidad de las escenas. Se emplearán técnicas que resalten los contrastes y la luminosidad, creando imágenes que transmitan la euforia y el dinamismo de Holi. Cada fotografía será una explosión de tonos vibrantes que capten la esencia de la festividad y la alegría pura de los participantes.\r\n\r\nEl objetivo de \"Colores de Holi\" es ofrecer una inmersión visual en esta festividad tan especial, permitiendo a los espectadores experimentar la emoción y el jubilo de Holi como si estuvieran allí. A través de estas imágenes, se espera no solo capturar la belleza y el caos organizado de la celebración, sino también transmitir el mensaje de amor, inclusión y renovación que Holi representa.\r\n\r\nEste proyecto es un homenaje a la riqueza cultural de la India y a la capacidad humana de celebrar la vida a través de los colores. Espero que cada fotografía inspire alegría y admiración por una tradición que continúa encantando y uniendo a personas de todo el mundo.', 50, 1, 'La edición es buena, ha respetado los colores originales del proyecto pero le doy sólo dos estrellas porque ha bajado la calidad de las fotografías.', 4, 23),
(30, 'Explorando el Cosmos: Viajes Espaciales y la Maravilla del Universo', '2024-05-18', NULL, 'A', '\"Explorando el Cosmos: Viajes Espaciales y la Maravilla del Universo\" es una serie fotográfica que busca capturar la emoción y el asombro de la exploración espacial, desde el lanzamiento de cohetes y trasbordadores hasta la vida a bordo de estaciones espaciales y las caminatas espaciales de los astronautas.\r\n\r\nLas fotografías se centrarán en los momentos más emocionantes y visualmente impactantes de los viajes espaciales. Se documentarán los lanzamientos de cohetes, con el rugido ensordecedor y el espectáculo de fuego y humo que marca el comienzo de un viaje a las estrellas. También se capturarán los momentos de ingravidez a bordo de las naves espaciales, con astronautas flotando en la cabina y realizando experimentos científicos en microgravedad.\r\n\r\nLos trasbordadores espaciales serán una parte destacada de la serie, mostrando la majestuosidad y la complejidad de estas naves que han llevado a los seres humanos más allá de la atmósfera terrestre. Se documentará cada fase de un vuelo espacial, desde el despegue y la separación de los propulsores hasta el acoplamiento con estaciones espaciales y el regreso a la Tierra.\r\n\r\nLas imágenes también explorarán la vida cotidiana en el espacio, mostrando cómo los astronautas trabajan, comen, duermen y se ejercitan en un entorno completamente diferente al de la Tierra. Se documentarán los momentos de camaradería y colaboración entre tripulantes de diferentes países y culturas, así como las vistas impresionantes de la Tierra desde la ventana de la nave.\r\n\r\nLas caminatas espaciales serán otro punto focal de la serie, capturando la emoción y el desafío de salir al vacío del espacio exterior. Se documentará cada paso de los astronautas mientras flotan sobre la superficie de la estación espacial, realizando reparaciones, instalando equipos y realizando experimentos científicos en el vacío del espacio.\r\n\r\nLa edición de las fotografías buscará resaltar la belleza y la grandeza del cosmos. Se emplearán técnicas para realzar los colores y contrastes, creando imágenes que transmitan la inmensidad y la majestuosidad del universo. Cada fotografía será un recordatorio de la valentía y la curiosidad humana que nos impulsa a explorar lo desconocido.\r\n\r\nEl objetivo de \"Explorando el Cosmos\" es ofrecer una mirada íntima y visceral a la experiencia de viajar al espacio, permitiendo a los espectadores sentir la emoción y el asombro de la exploración espacial como si estuvieran allí. A través de estas imágenes, se espera inspirar a una nueva generación de exploradores y soñadores a mirar hacia las estrellas y preguntarse qué hay más allá de nuestro pequeño rincón del universo.\r\n\r\nEste proyecto es un homenaje a la audacia y la determinación de los astronautas que han desafiado los límites de la humanidad y a la maravilla del universo que continúa cautivando nuestras mentes y corazones. Espero que cada fotografía inspire admiración y respeto por la exploración espacial y la infinita belleza del cosmos.', 50, 1, NULL, NULL, 23),
(31, 'Ecos del Pasado: Explorando un Palacio Europeo Abandonado', '2024-06-01', '2024-05-31', 'F', 'Ecos del Pasado: Explorando un Palacio Europeo Abandonado\" es una serie fotográfica que busca capturar la belleza y el misterio de un palacio europeo olvidado por el tiempo. Este proyecto pretende documentar la majestuosidad desvanecida y la atmósfera nostálgica de un lugar que alguna vez fue testigo de la grandeza y el esplendor.\r\n\r\nLas fotografías se centrarán en los detalles arquitectónicos y decorativos que aún perduran en el palacio. Se documentarán los salones de baile polvorientos, con sus candelabros caídos y suelos de mármol agrietados, así como las grandes escaleras adornadas con barandillas de hierro forjado cubiertas de óxido. Las paredes, una vez decoradas con frescos y tapices, ahora muestran signos de deterioro, revelando capas de historia a través de sus grietas y desconchados.\r\n\r\nLos pasillos oscuros y vacíos serán capturados en toda su melancólica belleza, mostrando cómo la luz natural se filtra a través de las ventanas rotas, creando patrones de sombras que dan vida a estos espacios olvidados. Los retratos de puertas y ventanas selladas, algunas medio abiertas, sugieren historias de vidas pasadas y secretos aún guardados.\r\n\r\nLas habitaciones personales, como dormitorios y estudios, serán exploradas para mostrar los vestigios de la vida cotidiana que alguna vez llenó el palacio. Se fotografiarán muebles antiguos cubiertos de polvo, espejos empañados que reflejan imágenes fantasmales y libros abandonados en estanterías que narran historias de un tiempo lejano. Los jardines exteriores, ahora invadidos por la naturaleza, revelarán estatuas y fuentes en ruinas, evocando un aire romántico y decadente.\r\n\r\nLa edición de las fotografías buscará resaltar la atmósfera etérea y misteriosa del palacio. Se emplearán técnicas que acentúen los contrastes entre luz y sombra, así como la textura y los detalles de los elementos deteriorados. Los tonos sepia y monocromáticos se utilizarán para intensificar la sensación de nostalgia y antigüedad, transportando a los espectadores a un tiempo perdido.\r\n\r\nEl objetivo de \"Ecos del Pasado\" es ofrecer una ventana a la historia y la belleza oculta de un palacio europeo abandonado, permitiendo a los espectadores imaginar las vidas y eventos que alguna vez tuvieron lugar entre sus muros. A través de estas imágenes, se espera transmitir un sentido de asombro y respeto por el pasado, así como una reflexión sobre la impermanencia de la gloria y la belleza humanas.\r\n\r\nEste proyecto es un homenaje a la arquitectura y el arte de épocas pasadas, así como a la poesía visual que se encuentra en los lugares olvidados por el tiempo. Espero que cada fotografía inspire una profunda apreciación por la historia y la capacidad de los edificios para contar historias mucho después de que sus ocupantes hayan desaparecido.', 54, 1, 'Excelente trabajo, editor recomendable 100%. Trabajo impecable, ha plasmado a la perfección lo que se buscaba con la sesión fotográfica, sin duda un auteéntico descubrimiento¡¡¡', 5, 21),
(32, 'Vida y Muerte: Celebrando el Día de los Muertos en México', '2024-06-06', '2024-06-06', 'F', '\"Vida y Muerte: Celebrando el Día de los Muertos en México\" es una serie fotográfica que busca capturar la esencia única y conmovedora de esta festividad mexicana tan emblemática. A través de imágenes que exploran la intersección entre la vida y la muerte, este proyecto pretende honrar a los seres queridos que han fallecido y celebrar la continuidad de la existencia en la cultura mexicana.\r\n\r\nLas fotografías se centrarán en las diversas tradiciones y rituales que caracterizan el Día de los Muertos, desde la elaboración de altares y ofrendas hasta las coloridas procesiones y representaciones teatrales. Se documentará la creatividad y la devoción de las comunidades mexicanas mientras preparan y participan en esta festividad tan significativa.\r\n\r\nLos altares de muertos serán uno de los elementos principales de la serie, mostrando la cuidadosa disposición de objetos simbólicos como las fotografías de los difuntos, las velas, las flores de cempasúchil y la comida favorita de los fallecidos. Cada altar será único y reflejará la personalidad y los recuerdos del ser recordado, creando un espacio sagrado de conexión entre el mundo de los vivos y el de los muertos.\r\n\r\nLas calles y plazas durante el Día de los Muertos estarán llenas de vida y actividad, con desfiles de disfraces, danzas folclóricas y música tradicional que llenarán el aire de energía festiva. Las calaveras de azúcar, los papel picado y las máscaras pintadas serán elementos visuales destacados, junto con las representaciones teatrales que narran historias sobre la vida y la muerte.\r\n\r\nLos retratos de personas participando en la festividad serán una parte integral de la serie, mostrando la diversidad de emociones que el Día de los Muertos evoca: desde la alegría y la celebración hasta la nostalgia y la contemplación. Se capturarán expresiones de amor y respeto hacia los difuntos, así como momentos de conexión y comunidad entre los vivos.\r\n\r\nLa edición de las fotografías buscará resaltar la riqueza visual y emocional del Día de los Muertos. Se emplearán técnicas que realcen los colores vibrantes de las decoraciones y los trajes, así como la belleza de los gestos y expresiones de los participantes. Cada imagen será una ventana a la profundidad y la intensidad de esta festividad tan arraigada en la cultura mexicana.\r\n\r\nEl objetivo de \"Vida y Muerte\" es ofrecer una representación auténtica y respetuosa del Día de los Muertos, permitiendo a los espectadores sentir la magia y la importancia de esta celebración única. A través de estas imágenes, se espera no solo honrar a los seres queridos que han fallecido, sino también celebrar la vida y la conexión entre las generaciones pasadas y presentes.\r\n\r\nEste proyecto es un homenaje a la rica tradición y espiritualidad de México, así como a la capacidad humana de encontrar belleza y significado en la celebración de la muerte. Espero que cada fotografía inspire admiración y respeto por una festividad que trasciende fronteras y nos recuerda la importancia de mantener viva la memoria de aquellos que ya no están con nosotros.', 54, 1, 'Excelente trabajo me ha encantado¡¡¡', 5, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `codigo` bigint(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` int(3) NOT NULL,
  `peticiones` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`codigo`, `nombre`, `foto`, `descripcion`, `precio`, `peticiones`) VALUES
(1, 'Básico', 'basico.png', 'Peticiones de edición de fotos e ilustraciones para tus proyectos. Deja volar tu creatividad.', 15, 5),
(2, 'Premium', 'premium.png', 'Suscripción premium de peticiones, incluidas ilustraciones y renderizados 3D.', 30, 15),
(3, 'Deluxe', 'deluxe.png', 'Peticiones de fotos ilustraciones y vídeo. El plan mas completo. No te lo pierdas.', 50, 30);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nick` (`nick`);

--
-- Indices de la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`num`),
  ADD KEY `fk_cli_con` (`id_cliente`),
  ADD KEY `fk_ser_con` (`cod_servicio`);

--
-- Indices de la tabla `editores`
--
ALTER TABLE `editores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_estilos_editores` (`cod_estilo`);

--
-- Indices de la tabla `estilos`
--
ALTER TABLE `estilos`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `fk_ms_cli` (`id_cliente`),
  ADD KEY `fk_ms_pro` (`cod_proyecto`),
  ADD KEY `fk_ms_ed` (`id_editor`);

--
-- Indices de la tabla `multimedias`
--
ALTER TABLE `multimedias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pr_mult` (`cod_proyecto`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `fk_pr_cli` (`id_cliente`),
  ADD KEY `fk_pr_ed` (`cod_editor`),
  ADD KEY `fk_pro_contr` (`num_contrato`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `contratos`
--
ALTER TABLE `contratos`
  MODIFY `num` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `editores`
--
ALTER TABLE `editores`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `estilos`
--
ALTER TABLE `estilos`
  MODIFY `cod` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `cod` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `multimedias`
--
ALTER TABLE `multimedias`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `cod` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `codigo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD CONSTRAINT `fk_cli_con` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_ser_con` FOREIGN KEY (`cod_servicio`) REFERENCES `servicios` (`codigo`);

--
-- Filtros para la tabla `editores`
--
ALTER TABLE `editores`
  ADD CONSTRAINT `fk_estilos_editores` FOREIGN KEY (`cod_estilo`) REFERENCES `estilos` (`cod`);

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `fk_ms_cli` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_ms_ed` FOREIGN KEY (`id_editor`) REFERENCES `editores` (`id`),
  ADD CONSTRAINT `fk_ms_pro` FOREIGN KEY (`cod_proyecto`) REFERENCES `proyectos` (`cod`);

--
-- Filtros para la tabla `multimedias`
--
ALTER TABLE `multimedias`
  ADD CONSTRAINT `fk_pr_mult` FOREIGN KEY (`cod_proyecto`) REFERENCES `proyectos` (`cod`);

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `fk_pr_cli` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_pr_ed` FOREIGN KEY (`cod_editor`) REFERENCES `editores` (`id`),
  ADD CONSTRAINT `fk_pro_contr` FOREIGN KEY (`num_contrato`) REFERENCES `contratos` (`num`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
