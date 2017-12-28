-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2017 a las 17:52:00
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `iarte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artistas`
--

CREATE TABLE `artistas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_muerte` date DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` text COLLATE utf8mb4_unicode_ci,
  `biografia` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `genero_id` int(10) UNSIGNED NOT NULL,
  `pais_nacimiento_id` int(10) UNSIGNED NOT NULL,
  `pais_muerte_id` int(10) UNSIGNED DEFAULT NULL,
  `tipo` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `portada` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1.jpg',
  `bg_biografia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '42.jpg',
  `bg_habilidades` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '10.jpg',
  `visitas` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `artistas`
--

INSERT INTO `artistas` (`id`, `nombre`, `fecha_nacimiento`, `fecha_muerte`, `telefono`, `direccion`, `biografia`, `status_id`, `genero_id`, `pais_nacimiento_id`, `pais_muerte_id`, `tipo`, `foto`, `portada`, `bg_biografia`, `bg_habilidades`, `visitas`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Auguste Rodin', '1969-12-31', '1917-11-17', NULL, NULL, '<p style="text-align: justify;"><span style="font-size: 12px;">Fue un escultor francés. Considerado el padre de la escultura moderna, su importancia se debe a la ruptura con el canon académico que imperaba en el siglo XIX en Francia. Lo anterior no significa que el artista no conociera o dominara las reglas de la estética de su tiempo, sino que su concepción del arte le permitió inaugurar una nueva etapa en el ámbito de la escultura.&nbsp;</span><span style="font-size: 12px;">Cuando Rodin incursionó en el ambiente artístico parisino de mitad del siglo XIX, la escultura en los textos académicos se definía como «una imitación selectiva y palpable de la naturaleza».​ Cuando Rodin murió, el concepto de escultura había sido redefinido como «algo que imita la vida a través de la amplificación y exageración del todo</span></p>', 3, 2, 70, 70, '0', '1/1511649711.png', '1.jpg', '42.jpg', '10.jpg', 0, 'auguste-rodin', '2017-11-25 22:41:51', '2017-11-25 22:41:51'),
(2, 'Claude Monet', '1969-12-31', '1926-12-05', NULL, NULL, '<p style="text-align: justify;"><span style="font-size: 12px;">Fue un pintor francés, uno de los creadores del impresionismo. El término impresionismo deriva del título de su obra Impresión, sol naciente (1872).&nbsp;</span><span style="font-size: 12px;">Sus primeras obras, hasta la mitad de la década de 1860, son de estilo realista. Monet logró exponer algunas en el Salón de París. A partir del final de la década de 1860 comenzó a pintar obras impresionistas. Esta desviación del gusto de la época, que era marcado por las academias de arte, empeoró su situación económica a la vez que afianzó su decisión de continuar en ese azaroso camino.&nbsp;</span><span style="font-size: 12px;">En la década de 1870 formó parte de las exposiciones impresionistas en las cuales también participaron Pierre-Auguste Renoir y Edgar Degas. Su obra Impresión, sol naciente formó parte del Salon des Refusés de 1874. Su carrera fue impulsada por el marchante Paul Durand-Ruel, pero a pesar de esto su situación financiera permaneció siendo difícil hasta mediados de la década de 1890. En esta época, Monet desarrolló el concepto de las «series», en las que un motivo es pintado repetidas veces con distinta iluminación. Al mismo tiempo comenzó a trabajar en el famoso jardín de su casa en Giverny con estanques de nenúfares que luego utilizó como motivo para sus pinturas.</span></p>', 3, 2, 70, 70, '0', '2/1511649939.jpg', '1.jpg', '42.jpg', '10.jpg', 1, 'claude-monet', '2017-11-25 22:45:39', '2017-11-25 23:46:05'),
(3, 'Armand Guillaumin', '1969-12-31', '1927-06-26', NULL, NULL, '<p>Fue un pintor y grabador francés de estilo impresionista. Mientras otros maestros de su círculo (como Renoir y Cézanne) abandonaron pronto el impresionismo puro y conformaron estilos más personales, Guillaumin se mantuvo fiel a los rasgos más reconocibles de dicha corriente y es considerado «el impresionista más fiel y longevo».<br></p>', 3, 2, 70, 70, '0', '3/1511650107.jpg', '1.jpg', '42.jpg', '10.jpg', 0, 'armand-guillaumin', '2017-11-25 22:48:27', '2017-11-25 22:48:27'),
(4, 'Aristide Maillol', '1969-12-31', '1944-09-27', NULL, NULL, '<p style="text-align: justify;"><span style="font-size: 12px;">Aristide Maillol fue el cuarto de los cinco hijos del comerciante de telas y dueño de la viña Raphaȅl Maillol y su esposa Catherine Rouge. Venía de una familia de viticultores, marineros y contrabandistas.&nbsp;</span><span style="font-size: 12px;">Su lugar de nacimiento fue el pueblo de pescadores de Banyuls-sur-mer, situado en el Mediterráneo, cerca de la frontera española. Su lengua materna era el catalán, que hablaba con un fuerte acento francés.&nbsp;</span><span style="font-size: 12px;">Desde muy joven mostró gran afición por el dibujo; a los trece años pintó su primer cuadro. A los 18 años publicó una revista, La Figue, de la que era el único redactor, impresor, ilustrador y finalmente el único cliente.&nbsp;</span><span style="font-size: 12px;">En 1882 Maillol viaja a París, donde después de varios intentos, en 1885, es admitido en los cursos de dibujo y de pintura de la Escuela de Bellas Artes.</span></p>', 3, 2, 70, 70, '0', '4/1511650303.jpg', '1.jpg', '42.jpg', '10.jpg', 0, 'aristide-maillol', '2017-11-25 22:51:43', '2017-11-25 22:51:43'),
(5, 'Henri Matisse', '1969-12-31', '1954-11-03', NULL, NULL, '<p>Fue un pintor francés conocido por su uso del color y por su uso original y fluido del dibujo. Como dibujante, grabador, escultor, pero principalmente como pintor, Matisse es reconocido ampliamente, junto a Pablo Picasso, como uno de los grandes artistas del siglo XX. Al inicio de su carrera, se le identificó con el fovismo y para los años 20 ya se había destacado por su maestría en el lenguaje expresivo del color y del dibujo, la cual desplegó en una inmensa producción que se extendió por más de medio siglo, y que consagró su reputación como una de las figuras centrales del arte moderno. Durante su trayectoria, supo conjugar en sus obras la influencia de artistas como Van Gogh o Gauguin, con la de las cerámicas persas, el arte africano o las telas moriscas.</p>', 3, 2, 70, 70, '0', '5/1511650431.jpg', '1.jpg', '42.jpg', '10.jpg', 0, 'henri-matisse', '2017-11-25 22:53:50', '2017-11-25 22:53:50'),
(6, 'Vasili Kandinski', '1969-12-31', '1944-12-13', NULL, NULL, '<p style="text-align: justify;">Vasili Kandinski nació el 16 de diciembre (en el antiguo calendario ruso: 4 de diciembre) de 1866, proveniente de una familia de clase media alta. Su padre Vasili Silvéstrovich Kandinski era un comerciante de té procedente de Kiajta, una población siberiana cercana a la frontera con Mongolia.​ La abuela de Vasili era una aristócrata mongola de la dinastía Gantimúrov. Lidia Ivánovna Tijéieva, la madre de Vasili, era de Moscú.​ Pasó su infancia y juventud entre Moscú y Odesa, donde se trasladó la familia en 1871.​ Tras el divorcio de sus padres vivió con su padre. Su tía Elizavet Tijéieva también lo cuidó.​ Su abuela materna era alemana y le hablaba en alemán. En Odesa tomó clases de piano y de violonchelo.​ En 1886 Kandinski comenzó sus estudios de Derecho y Ciencias económicas en la Universidad de Moscú. También estudió etnografía.​ En 1892 se casó con su prima Anna Chemyákina, con quien vivió hasta 1904. En 1893 fue nombrado profesor asociado en la Facultad de Derecho. En 1896 la Universidad de Tartu le ofreció una plaza de profesor que rechazó para dedicarse por completo al arte. Esta decisión estuvo influida por la exposición de los impresionistas en Moscú en 1895, al ver las obras de Monet y la representación de Lohengrin de Richard Wagner en el teatro Bolshói.<br></p>', 3, 2, 150, 70, '0', '6/1511650645.jpeg', '1.jpg', '42.jpg', '10.jpg', 0, 'vasili-kandinski', '2017-11-25 22:57:25', '2017-11-25 22:57:25'),
(7, 'Jesús Rafael Soto', '1923-06-05', '2005-01-14', NULL, NULL, '<p style="text-align: justify;"><span style="font-size: 12px;">Estudió en la Escuela de Arte en Caracas, donde conoce a Carlos Cruz Diez y Alejandro Otero. Desde los años 70 hasta los 90 los trabajos de Soto son expuestos en lugares como el MOMA y Museo Guggenheim de Nueva York, Centro Georges Pompidou en París y la Bienal de Venecia de 1966 y la Bienal de São Paulo en 1996.&nbsp;</span><span style="font-size: 12px;">Soto fue particularmente famoso por sus "penetrables" esculturas dentro de las cuales, las personas pueden caminar e interactuar. Se ha dicho que el arte de Soto es inseparable del observador, sólo puede estar completo con la ilusión percibida por la mente como resultado de la observación.&nbsp;</span><span style="font-size: 12px;">Un trabajo de Soto adorna el techo del salón principal del Teatro Teresa Carreño, en Caracas, y otro, una parte del interior de la estación Chacaito del Metro de Caracas. Este último se extiende hasta el exterior de la estación y se puede ver desde la superficie, en la Plaza Brión de Chacaíto. La Esfera Caracas, se encuentra en la Autopista Francisco Fajardo, la cual fue recientemente reconstruida.&nbsp;</span><span style="font-size: 12px;">En su honor, el gobierno de Venezuela inauguró el Museo Jesús Soto en Ciudad Bolívar en 1973.</span></p>', 3, 2, 190, 70, '0', '7/1511650955.jpg', '7/1511663344.jpg', '7/1511663350.jpg', '7/1511663357.jpg', 0, 'jesus-rafael-soto', '2017-11-25 23:02:35', '2017-11-25 23:02:35'),
(8, 'Carlos Cruz-Diez', '1923-08-17', '1969-12-31', NULL, NULL, '<p style="text-align: justify;"><span style="font-size: 12px;">Es un artista plástico venezolano, uno de los máximos representantes del op art (arte óptico) a nivel mundial, vive y trabaja en París desde 1960.​ Su investigación ha aportado al arte una nueva forma de conocimiento sobre el fenómeno del color, ampliando considerablemente su universo perceptivo. Es presidente de la Fundación del Museo de la Estampa y del Diseño Carlos Cruz-Diez en Caracas y miembro de la Orden de Andrés Bello (OAB). En 2005 su familia crea la Cruz-Diez Foundation3​ dedicada a la conservación, desarrollo, difusión e investigación de su legado artístico y conceptual.&nbsp;</span><span style="font-size: 12px;">Cruz-Diez propone concebir el color como una realidad autónoma que se desarrolla en el tiempo y en el espacio real sin ayuda de la forma o necesidad de soporte. Su trabajo abarca ocho investigaciones: Couleur Additive, Physichromie, Induction Chromatique, Chromointerférence, Transchromie, Chromosaturation, Chromoscope y Couleur dans l’espace</span></p>', 3, 2, 190, NULL, '0', '8/1511651079.jpg', '8/1511662324.jpg', '8/1511662328.jpg', '8/1511662336.jpg', 2, 'carlos-cruz-diez', '2017-11-25 23:04:39', '2017-11-26 02:45:07'),
(9, 'Armando Reverón', '1969-12-31', '1954-09-18', NULL, NULL, '<p style="text-align: justify;"><span style="font-size: 12px;">Fue pionero del Happening, del Ensamblaje artístico, de la Instalación (arte) e Intervención (arte), de la escultura textil y del Móvil. Afectado por la Fiebre tifoidea a los doce años y de una Esquizofrenia tardía, fue víctima de ataques, períodos depresivos y crisis psicóticas. Estudió y desarrollo su obra en Caracas, Barcelona, Madrid y París. En 1918 conoce a Juanita Mota, la cual será su amiga y compañera hasta su muerte. A partir de 1921 se establece en Macuto en el Litoral Central de Venezuela donde construye "El Castillete" su taller y morada.&nbsp;</span><span style="font-size: 12px;">A medida que crece la genialidad de un artista exótico, irracional y primitivo; también crecía la leyenda del "Loco de Macuto" por parte de una sociedad que no lo comprendía. Su obra y figura fue admirada por artistas e intelectuales como Pablo Picasso, Margot Benacerraf, Alí Primera, Jesús Rafael Soto, Antonio Saura o Sofía Ímber. En el 2007 el MoMA le dedica una retrospectiva; siendo esta la primera que le dedica a una artista venezolano y la cuarta a un artista latinoamericano después de Diego Rivera, Cândido Portinari y Roberto Matta. Falleció en el Sanatorio San Jorge en Catia (Caracas) a los 65 años. Desde el año 2016 sus restos mortales reposan en el Panteón Nacional de Venezuela.</span></p>', 3, 2, 190, 190, '0', '9/1511651275.png', '9/1511659814.jpg', '9/1511659798.jpg', '9/1511659840.jpg', 4, 'armando-reveron', '2017-11-25 23:07:55', '2017-11-26 12:43:27'),
(10, 'Rufino Tamayo', '1969-12-31', '1991-06-24', NULL, NULL, '<p style="text-align: justify;"><span style="font-size: 12px;">Es considerado como uno de los pintores mexicanos de mayor importancia del siglo XX, siendo además uno de los primeros artistas latinoamericanos que consiguió un reconocimiento y una difusión de su obra internacional, como ocurrió también con otros artistas como los integrantes del conocido "grupo de los tres" (Rivera, Siqueiros y Orozco).</span><span style="font-size: 12px;">De hecho trabajó con ellos en algunos proyectos, como el movimiento muralista que se extendió en el período que comprende las dos guerras mundiales; pese a las características propias de su pintura le distinguen perfectamente del resto del grupo.&nbsp;</span><span style="font-size: 12px;">El museo que lleva su nombre, Museo Tamayo Arte Contemporáneo, está dedicado exclusivamente al arte contemporáneo y no expone su obra regularmente.&nbsp;</span><span style="font-size: 12px;">Fue Doctor Honoris Causa por la Universidad de Manila en 1974; por la Universidad Nacional Autónoma de México5​ en 1978; por la de Berkeley en 1982; por la Universidad del Sur de California6​ en 1985;y por la Veracruzana en 1991. Fue nombrado miembro de número de la Academia Nacional de Bellas Artes de Argentina.</span></p>', 3, 2, 121, 121, '0', '10/1511651442.jpg', '1.jpg', '42.jpg', '10.jpg', 0, 'rufino-tamayo', '2017-11-25 23:10:42', '2017-11-25 23:10:42'),
(11, 'Pedro León Zapata', '1929-02-27', '2015-02-06', NULL, NULL, '<p style="text-align: justify;"><span style="font-size: 12px;">En 1945 ingresó a la Escuela de Artes Plásticas de Caracas. En 1947 se retiró de este centro para intervenir en la fundación del Taller La Barraca de Maripérez, donde expuso sus primeros trabajos e inició su labor de caricaturista. A finales de 1947 viajó a México para aprender las técnicas de los muralistas y realizó estudios en el Instituto Politécnico Nacional de México, en la Escuela de La Esmeralda y en el taller de Siqueiros. También trabajó como profesor en la escuela de Bellas Artes de Acapulco. Mientras vivió en México, Zapata no hizo caricaturas.</span></p><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">En el año 1958 regresó a Caracas e ingresó como profesor de dibujo a la Facultad de Arquitectura de la Universidad Central de Venezuela y a la Escuela de Artes Plásticas Cristóbal Rojas. En 1958 se incorporó al diarismo gráfico y en 1959 inició sus colaboraciones como caricaturista, al principio para el periódico Dominguito y luego a partir de 1965 ininterrumpidamente para El Nacional, de Caracas, en el cual inició su columna "Zapatazos", cuya continuidad diaria mantuvo hasta el día de su fallecimiento.</span></p><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">Como caricaturista, Zapata fue galardonado con el Premio Nacional de Periodismo en 1967, y con dos Premios Municipales en 1974 y 1978. Su trayectoria artística fue reconocida con el Premio Nacional de Artes Plásticas en el año 1980. Fue el coordinador de la Cátedra Libre de Humorismo Aquiles Nazoa (1979) en la UCV. A finales de los años setenta, dirigió la revista de corte humorístico El Sádico Ilustrado, integrando la obra de artistas y escritores como: Abilio Padrón, Simón Díaz, Salvador Garmendia, Luis Britto García, Elisa Lerner y Rubén Monasterios, entre otros.</span></p><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">Durante su vida, publicó varios libros: Zapatazos, ¿Quién es Zapata?, Zapata vs. Pinochet, Lo menos malo de Pedro León Zapata, Zapatazos por Uruguay, Zapata absolutamente en Serio, Caracas, Monte y Culebra, Breve Crónica de lo Cotidiano, Los Gómez de Zapata, De la A de Arte a la Z de Zapata y los volúmenes Zapata, firme y Firme Zapata</span></p><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">También diseñó y pintó portadas de álbumes para músicos como El Cuarteto, Simón Díaz y varias para Xulio Formoso y Guaco</span></p><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">Zapata fue el autor del gigantesco mural de cerámica titulado Conductores de Venezuela (1999), de más de 1.500 metros cuadrados de superficie, 150 metros de largo por 11,5 de alto, está compuesto por 40.000 lozas de 20x20 centímetros, que ilumina parte del perímetro norte de la Universidad Central de Venezuela, en Caracas, cubriendo el muro de contención del límite norte de la Ciudad Universitaria, que la separa de la autopista Francisco Fajardo.</span></p><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">Zapata continuó su vida artística como conferencista, docente, hombre de radio y televisión. Realizó para el teatro diseños de vestuarios y escenografías y es autor de una pieza titulada Venezuela Herótica.</span></p><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">Falleció a la edad de 85 años mientras dormía, en Caracas, Venezuela el 6 de febrero de 2015.</span></p>', 3, 2, 190, 190, '0', '11/1511651614.jpg', '1.jpg', '42.jpg', '10.jpg', 0, 'pedro-leon-zapata', '2017-11-25 23:13:34', '2017-11-25 23:13:34'),
(12, 'Fernand Léger', '1969-12-31', '1955-08-17', NULL, NULL, '<p style="text-align: justify;"><span style="font-size: 12px;">Nacido en Argentan, Normandía, en el seno de una familia campesina, quedó huérfano de padre antes de cumplir dos años. Recibió instrucción primero en la escuela de su pueblo natal, y después en un instituto religioso de Tinchebray.</span></p><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">Entre 1897 y 1899 fue alumno de un arquitecto en Caen; en 1900 se traslada a París, donde trabaja como dibujante de arquitectura, al tiempo que estudia en la Académie Julian. Tras cumplir su servicio militar (1902-1903), ingresó en la Escuela Nacional Superior de Artes Decorativas al no conseguir plaza en la de Bellas Artes, donde, como alumno libre, recibió lecciones de Jean-Léon Gérôme y de Gabriel Ferrier. Visitó asiduamente el Museo del Louvre y, al igual que otros pintores de su generación, debió al impresionismo, iniciado en las galerías de la calle de Laffitte, la esencia de su formación artística.</span></p><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">Sus primeras obras datan de 1905 y son de clara influencia impresionista.</span></p><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">En 1907, al igual que otros pintores parisinos, queda profundamente impresionado por la retrospectiva de Cézanne. En este mismo año entra en contacto con el primer cubismo de Picasso y Braque.</span></p><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">Desde los primeros momentos, el cubismo de Léger se orienta hacia el desarrollo de la iconografía de la máquina.</span></p><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">Desnudos en el bosque (1909-1910), inspirado posiblemente en el cuadro de Picasso de 1908 del mismo título, convierte el tema en una habitación llena de artefactos y robots, donde parece apartarse de la férrea doctrina de Cézanne de pintar a partir del cilindro y el cono; la sobriedad de los colores, unida a la actividad frenética de los robots, crea una atmósfera simbólica de un mundo nuevo y deshumanizado. En algunos aspectos es una anticipación del futurismo italiano.</span></p><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">En 1910 expone con Braque y Picasso en la galería de Kahnweiler donde, en 1912, hace también su primera individual. Al siguiente año comienza a investigar sobre formas de máquinas representadas con colores primarios, llegando en ocasiones a una estructura abstracta que se hace más explícita con los títulos, como por ejemplo Contraste de formas, de 1913, donde se acerca a las ideas de Delaunay sobre los contrastes de color, aunque manteniendo la marcada tridimensionalidad de sus primeros trabajos. Su fascinación por las formas geométricas y los colores brillantes le lleva a menudo al borde de un arte abstracto, que siempre acaba rechazando.</span></p>', 3, 2, 70, 70, '0', '12/1511651739.jpg', '1.jpg', '42.jpg', '10.jpg', 0, 'fernand-leger', '2017-11-25 23:15:39', '2017-11-25 23:15:39'),
(13, 'Andy Warhol', '1928-08-06', '1987-02-22', NULL, NULL, '<p style="text-align: justify;"><span style="font-size: 12px;">Fue un artista plástico y cineasta estadounidense que desempeñó un papel crucial en el nacimiento y desarrollo del pop art. Tras una exitosa carrera como ilustrador profesional, Warhol adquirió fama mundial por su trabajo en pintura, cine de vanguardia y literatura, notoriedad que vino respaldada por una hábil relación con los medios y por su rol como gurú de la modernidad. Warhol actuó como enlace entre artistas e intelectuales, pero también entre aristócratas, homosexuales, celebridades de Hollywood, drogadictos, modelos, bohemios y pintorescos personajes urbanos.</span></p><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">Warhol utilizó medios diferentes para crear sus obras, como el dibujo a mano, la pintura, el grabado, la fotografía, la serigrafía, la escultura, el cine y la música. El Museo Andy Warhol en su ciudad natal, Pittsburgh, Pensilvania, contiene una amplia colección permanente de arte. Resulta ser el museo más grande de Estados Unidos dedicado a un solo artista.</span></p><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">Uno de los aportes más populares de Warhol fue su declaración: «En el futuro todo el mundo será famoso durante 15 minutos». Esta frase de cierta manera vaticinó el actual poder de los medios de comunicación y el apogeo de la prensa amarilla y de los reality shows.</span></p><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">Fue un personaje polémico durante su vida —algunos críticos calificaban sus obras como pretenciosas o bromas pesadas— y desde su muerte en 1987 es objeto de numerosas exposiciones retrospectivas, análisis, libros y documentales, además de ser recreado en obras de ficción como la película I Shot Andy Warhol (Mary Harron, 1996). Al margen de la fama y de la polémica, está considerado como uno de los artistas más influyentes del siglo xx debido a su revolucionaria obra.</span></p>', 3, 2, 64, 64, '0', '13/1511651944.jpg', '1.jpg', '42.jpg', '10.jpg', 0, 'andy-warhol', '2017-11-25 23:19:04', '2017-11-25 23:19:04'),
(14, 'Alexander Calder', '1969-12-31', '1976-11-11', NULL, NULL, '<p style="text-align: justify;"><span style="font-size: 12px;">Hijo y nieto de escultores. Su madre era, además, pintora. Estudió ingeniería mecánica y en 1923 asistió a la Liga de Estudiantes de Arte de Los Ángeles, donde recibió la influencia de los artistas de la escuela.</span></p><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">En 1925 contribuyó con unas ilustraciones en la National Police Gazette. En 1926 se trasladó a París y comenzó a crear figurillas de madera y alambre, germen del posterior desarrollo de sus famosas miniaturas circenses. En los años 1930, se hizo célebre en París y en los Estados Unidos por sus esculturas de alambre, al igual que por sus retratos, sus bosquejos de línea continua y sus abstractas construcciones motorizadas.</span></p><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">En 1967 creo un móvil en la fábrica Biémont de Tours (Francia), incluido el "HOMBRE", todo de acero inoxidable de 24 metros de altura, encargado por la International Nickel de Canadá (Inco) para la Exposición Universal de Montreal. Todas las fabricaciones se hacen a partir de un modelo producido por Calder, en el departamento de Diseño Industrial (encabezado por el Sr. Porcheron, Alain Roy, François López y Michel Juigner) se realizó el diseño a escala y luego el montaje es asignado a trabajadores caldereros calificados para la fabricación, Calder supervisa todas las operaciones y se modifican si es necesario el trabajo. Todos los stabiles están hechos de acero al carbono y pintados de negro en su mayoría, excepto el hombre que va a ser de acero inoxidable (crudo), el móvil está hecho de aluminio y duraluminio.</span></p><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">Es más conocido como el inventor del móvil o chupin (juguete móvil colgante), un precursor de la escultura cinética. También elaboró obras esculturales inmóviles, conocidas como stabiles. Aunque los primeros chupines y stabiles de Calder fueron relativamente pequeños, poco a poco fue orientándose hacia la monumentalidad en sus trabajos posteriores. Su talento ha sido reconocido en importantes exposiciones de arte contemporáneo en las que obtuvo grandes éxitos económicos y de crítica.</span></p><span style="font-size: 12px;"><br></span><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">Aula Magna de la Universidad Central de Venezuela</span></p><p style="text-align: justify;"><span style="font-size: 12px;">Entre sus obras más importantes destacan las llamadas "Nubes de Calder", que son 31 paneles de madera contrachapada que reflejan el sonido y actúan de soporte acústico. Se encuentran suspendidos en el cielo raso y en las paredes laterales del Aula Magna de la Universidad Central de Venezuela. Estas esculturas flotantes creadas por el ingenio de Calder, por requerimiento del arquitecto Carlos Raúl Villanueva, convierten al recinto teatral en una de las cinco salas con mejor acústica del mundo.</span></p>', 3, 2, 64, 64, '0', '14/1511652076.jpg', '1.jpg', '42.jpg', '10.jpg', 0, 'alexander-calder', '2017-11-25 23:21:16', '2017-11-25 23:21:16'),
(15, 'Serge Poliakoff', '1969-12-31', '1969-10-12', NULL, NULL, '<p style="text-align: justify;">Debido a la posición acomodada de su familia, alternó con la aristocracia rusa en casa de una de sus hermanas en San Petersburgo y frecuentó también los salones literarios que se celebraban en casa de otra de sus hermanas. Desde muy temprana edad conoció la literatura, el canto y la música. La revolución de 1917 obligó a Poliakoff a abandonar Rusia. Acompañó a su tía, una famosa cantante, por toda Europa, tocando la guitarra para ganarse la vida.</p><br><p style="text-align: justify;">En 1923, se quedó en París, y en 1929, comenzó a pintar. Todos los cuadros de esa etapa de su vida están hoy desaparecidos. Desde 1935 hasta 1937, permaneció en Londres donde siguió los cursos de la Slade School of Art, donde conoció los sarcófagos egipcios, que le impresionaron hondamente.</p><br><p style="text-align: justify;">Después de casarse con Marcelle Perreur, volvió a París, donde alternó con artistas que influyeron en su obra posterior. Conoció a Kandinsky, también mantuvo contacto con Robert y Sonia Delaunay y con Otto Freundlich.</p><br><p style="text-align: justify;">En 1945, expuso sus pinturas abstractas realizadas entre 1942-1945. En 1946, tomó parte en el Salón de Mayo y en el Salón de los Independientes. Hacía 1952 abandonó su trabajo como músico en un cabaret gracias a un contrato con la galería Bing.</p><br><p style="text-align: justify;">Sus exposiciones se suceden en museos extranjeros y en exposiciones internacionales a partir de 1958. En 1962, se le dedicó toda una sala en la Bienal de Venecia. En 1970, un año después de su muerte el Museo Nacional de Arte Moderno de París organizó una importante exposición retrospectiva de su obra.</p>', 3, 2, 150, 70, '0', '15/1511652191.jpg', '1.jpg', '42.jpg', '10.jpg', 0, 'serge-poliakoff', '2017-11-25 23:23:11', '2017-11-25 23:23:11'),
(16, 'Piet Mondrian', '1969-12-31', '1944-02-01', NULL, NULL, '<p style="text-align: justify;"><span style="font-size: 12px;">Nació en una familia calvinista. Desde 1892 hasta 1908 estudió en la Academia Estatal de Ámsterdam, en la que su maestro fue August Allebé.</span></p><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">Comenzó su carrera como maestro de educación primaria, pero mientras enseñaba también practicaba la pintura. La mayor parte de su trabajo de este período naturalista o impresionista está constituida por paisajes. Estas imágenes pastorales de su Holanda nativa representan molinos de viento, campos, y ríos, inicialmente de manera impresionista al estilo de "La escuela de La Haya", que hace al autor sucesor de Jongkind, y luego en una variedad de estilos y técnicas que documenta su búsqueda por un estilo personal. Las pinturas en las que predominan los colores malva, gris suave y verde oscuro son las más representativas de su momento inicial e ilustran la influencia de varios movimientos artísticos en Mondrian, incluso el puntillismo y los colores vívidos del fovismo, en los que se vuelca en 1908 por influencia de Jan Toorop.</span></p><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">En la exhibición en el Hague''s Gemeentemuseum varias pinturas son de este período, incluyendo los trabajos postimpresionistas como "El Molino Rojo" y "Árboles a la Luz de la luna". Otra pintura, Avond ("Tarde") (1908), que presenta una escena de parvas (o niaras) en un campo durante el crepúsculo es un cuadro que ya deja intuir los desarrollos futuros de este pintor; en él usa una paleta que consiste casi exclusivamente en rojo, amarillo y azul. Aunque en ningún sentido es abstracto, "Avond" es el más temprano de los trabajos de Mondrian que da énfasis a los colores primarios.</span></p>', 3, 2, 137, 64, '0', '16/1511652307.jpg', '1.jpg', '42.jpg', '10.jpg', 0, 'piet-mondrian', '2017-11-25 23:25:06', '2017-11-25 23:25:06'),
(17, 'Henry Moore', '1969-12-31', '1986-08-31', NULL, NULL, '<p style="text-align: justify;"><span style="font-size: 12px;">fue un escultor inglés conocido por sus esculturas abstractas de bronce y mármol que pueden ser contempladas en numerosos lugares del mundo como obras de arte público.</span></p><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">Aunque durante sus inicios Moore siguió el estilo romántico de la época victoriana,​ posteriormente desarrolló un estilo propio, influido por varios artistas renacentistas y góticos tales como Miguel Ángel, Giotto y Giovanni Pisano, así como por la cultura tolteca-maya.1​ Las primeras obras de Moore fueron realizadas usando la técnica de tallado directo,2 pero, a finales de los años 1940, Moore comenzó a producir esculturas moldeando la figura en arcilla o yeso antes de terminar el trabajo en bronce usando la técnica de moldeo a la cera perdida o la de moldeo en arena.3</span></p><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">Sus obras generalmente representan abstracciones de la figura humana,4​ como una madre con su hijo o figuras reclinadas.​ La mayoría de sus esculturas representan el cuerpo femenino5​ a excepción de las realizadas durante los años 1950, cuando esculpió grupos familiares. Sus esculturas generalmente tienen espacios vacíos y formas onduladas, inspiradas, según algunos críticos, por los paisajes de Yorkshire, su lugar de origen.</span></p><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">Moore fue una de las figuras artísticas más conocidas de su época, siendo considerado "la voz oficial de la escultura británica y la cara aceptable de la Modernidad".6​ La habilidad que adquirió en su madurez para cumplir encargos de obras de gran tamaño, tales como el West Wind en el edificio del Metro de Londres, lo hizo excepcionalmente rico. Sin embargo, vivió modestamente y la mayor parte de su dinero fue usado para crear y mantener la Henry Moore Foundation, una fundación dedicada a promover la educación y fomento de las artes.</span></p><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">Moore murió el 31 de agosto de 1986 en su hogar en Hertfordshire a los 88 años y fue enterrado en la Catedral de San Pablo de Londres. Sus obras y su estilo influyeron a numerosos artistas británicos e internacionales tales como sir Anthony Caro,8​ Phillip King,9​ Eduardo Paolozzi y Kenneth Armitage. Asimismo, Moore también dejó su marca en varias organizaciones artísticas del Reino Unido, siendo miembro de las juntas directivas de la National Gallery de Londres y de la Tate.</span></p>', 3, 2, 147, 147, '0', '17/1511652466.jpg', '1.jpg', '42.jpg', '10.jpg', 0, 'henry-moore', '2017-11-25 23:27:26', '2017-11-25 23:27:26'),
(18, 'Salvador Dalí', '1904-05-11', '1989-01-23', NULL, NULL, '<p style="text-align: justify;"><span style="font-size: 12px;">Salvador Dalí es conocido por sus impactantes y oníricas imágenes surrealistas. Sus habilidades pictóricas se suelen atribuir a la influencia y admiración por el arte renacentista. También fue un experto dibujante.2​3​ Los recursos plásticos dalinianos también abordaron el cine, la escultura y la fotografía, lo cual le condujo a numerosas colaboraciones con otros artistas audiovisuales. Tuvo la capacidad de acrisolar un estilo genuinamente personal y palpable al primer contacto, que en realidad era muy ecléctico y que «succionó» de innovaciones ajenas. Una de sus pinturas más célebres es La persistencia de la memoria, realizada en 1931.</span></p><span style="font-size: 12px;"><br></span><p style="text-align: justify;"><span style="font-size: 12px;">Como artista extremadamente imaginativo, manifestó una notable tendencia al narcisismo y la megalomanía, cuyo objeto era atraer la atención pública. Esta conducta irritaba a quienes apreciaban su arte y justificaba a sus críticos, que rechazaban sus conductas excéntricas como un reclamo publicitario ocasionalmente más llamativo que su producción artística.4​ Dalí atribuía su «amor por todo lo que es dorado y resulta excesivo, su pasión por el lujo y su amor por la moda oriental» a un autoproclamado «linaje arábigo»,5​ que remontaba sus raíces a los tiempos de la dominación árabe de la península ibérica.</span></p>', 3, 2, 63, 63, '0', '18/1511652611.jpg', '1.jpg', '42.jpg', '10.jpg', 0, 'salvador-dali', '2017-11-25 23:30:11', '2017-11-25 23:30:11'),
(19, 'Bernardo Strozzi', '1969-12-31', '1969-12-31', NULL, NULL, '<p style="text-align: justify;">Strozzi nació en Génova hacia 1581; no se sabe la fecha exacta. Seguramente no tenía parentesco con la familia aristocrática de los Strozzi.</p><p style="text-align: justify;">En 1598, a los diecisiete años de edad, ingresó en un monasterio capuchino, una rama reformada de la orden franciscana. Cuando su padre murió hacia 1608, abandonó la orden para cuidar a su madre, ganándose la vida pintando cuadros que a menudo estaban influidos por las enseñanzas franciscanas, por ejemplo su Adoración de los pastores (h. 1615; Museo Walters de Baltimore).</p><p style="text-align: justify;">En 1625, se le acusó de practicar ilegalmente la pintura, lo que era un delito ya que para ser pintor se requería una formación como tal y asociarse al gremio local. Cuando su madre murió (h. 1630) Bernardo fue presionado por la orden de los capuchinos ante los tribunales para que regresara a la orden. Sufrió un breve tiempo de prisión en Génova,​ y al ser liberado huyó a Venecia para evitar que lo confinasen en un monasterio en 1631. Durante toda su vida llevó el mote de il prete Genovese (el sacerdote genovés).</p>', 3, 2, 92, 92, '0', '19/1511655590.jpg', '1.jpg', '42.jpg', '10.jpg', 0, 'bernardo-strozzi', '2017-11-26 00:19:50', '2017-11-26 00:19:50'),
(20, 'Camille Pissarro', '1969-12-31', '1903-11-13', NULL, NULL, '<p style="text-align: justify;"><span style="font-size: 12px;">fue un pintor impresionista, y se le considera como uno de los fundadores de ese movimiento.&nbsp;</span><span style="font-size: 12px;">Se le conoce como uno de los "padres del impresionismo". Pintó la vida rural francesa, sobre todo los paisajes y las escenas en los que aparecían campesinos trabajando, pero también escenas urbanas en Montmartre. En París tuvo como discípulos a Paul Cézanne, Paul Gauguin, Jean Peské y Henri-Martin Lamotte.&nbsp;</span><span style="font-size: 12px;">Pissarro fue asimismo un teórico de la anarquía, y frecuentó con asiduidad a los pintores de la Nueva Atenas que pertenecían a ese movimiento. Compartió esa posición con Gauguin, con quien luego tuvo relaciones tensas.</span></p>', 3, 2, 53, 70, '0', '20/1511655735.jpg', '1.jpg', '42.jpg', '10.jpg', 0, 'camille-pissarro', '2017-11-26 00:22:15', '2017-11-26 00:22:15'),
(21, 'Paul Cézanne', '1969-12-31', '1906-10-22', NULL, NULL, '<p style="text-align: justify;">Fue un pintor francés postimpresionista, considerado el padre de la pintura moderna, cuyas obras establecieron las bases de la transición entre la concepción artística decimonónica hacia el mundo artístico del siglo XX, nuevo y radicalmente diferente. Sin embargo, mientras vivió, Cézanne fue un pintor ignorado que trabajó en medio de un gran aislamiento. Desconfiaba de los críticos, tenía pocos amigos y, hasta 1895, expuso sólo de forma ocasional. Fue un «pintor de pintores»,1​que la crítica y el público ignoraban, siendo apreciado sólo por algunos impresionistas y, al final de su vida, por la nueva generación.<br></p>', 3, 2, 70, 70, '0', '21/1511655849.jpg', '1.jpg', '42.jpg', '10.jpg', 0, 'paul-cezanne', '2017-11-26 00:24:09', '2017-11-26 00:24:09'),
(22, 'Gertrud Goldschmidt', '1912-08-01', '1994-09-17', NULL, NULL, '<p>Fue una artista y escultora moderna venezolana de origen alemán. Sus obras más populares se produjeron en los años 1960 y 1970, durante el apogeo de la popularidad del arte abstracto geométrico y el arte cinético. A pesar de que estos géneros le influyeran tanto, Gego trató de desarrollar su propio estilo y romper con el arte popular de Venezuela. Junto a Lygia Clark y Mira Schendel, Gego es, sin duda, la artista sudamericana más importante de la segunda mitad del siglo XX. Las tres artistas partieron de un constructivismo de raíz europea para llegar a proposiciones estéticas actuales, alejadas del idealismo modernista y, en cambio, más cercanas a la terapia, a la escritura y a una visión existencial del espacio. Muere en 1994 dejando una colección de escritos que describen sus pensamientos sobre el arte que se añade a su legado como artista latinoamericano.</p>', 3, 1, 3, 190, '0', '22/1511655979.jpg', '1.jpg', '42.jpg', '10.jpg', 0, 'gertrud-goldschmidt', '2017-11-26 00:26:19', '2017-11-26 00:26:19'),
(23, 'Ferdinand Bellermann', '1969-12-31', '1969-12-31', NULL, NULL, '<p style="text-align: justify;"><span style="font-size: 12px;">Ferdinand Bellermann inicia sus estudios de pintura en 1828 ingresando en la Escuela de Artes de Weimar, donde se inscribe para estudiar paisajismo según modelos de pintores clásicos.</span></p><p style="text-align: justify;"><span style="font-size: 12px;">En Weimar, Bellermann hizo buenas amistades que mantuvo por décadas, y con toda certeza disfrutó del ambiente artístico de la ciudad. También su amistad con el pintor Friedrich Preller tiene sus raíces en Weimar. Preller fue, a su vez, amigo de Goethe; fue él quien creó el famoso dibujo que muestra al gran poeta en su lecho de muerte, y en sus brazos falleció, en Italia, el hijo de Goethe.</span></p><p style="text-align: justify;"><span style="font-size: 12px;">Con la temprana muerte de su padre, la vida de Bellermann al principio no fue muy buena; su madre quedó sin recursos y con varios niños, de los que Ferdinand era el mayor. Ciertamente contaron con la ayuda de los parientes, en especial de un tío, el comerciante Johann Christian Bellermann, en cuya casa al parecer vivieron los huérfanos, pues esta dirección de la calle Schlösser en Erfurt, aparece después en cartas que le fueron dirigidas a Ferdinand.4​</span></p><p style="text-align: justify;"><span style="font-size: 12px;">Así pues, es comprensible que el futuro pintor tuviera que contribuir primero al mantenimiento de la familia: pastoreando ovejas. Sin embargo, su talento de dibujante fue descubierto, afortunadamente, a tiempo, y a los catorce años es enviado a la Freie Zeichenschule, Escuela Libre de Dibujo, fundada por Goethe en Weimar, para recibir instrucción como pintor de porcelanas. Es posible que la intención haya sido que una vez terminado el curso, el joven entrara a trabajar en una fábrica de porcelanas propiedad de unos parientes en Volkstedt, Turingia. Sin embargo, esta orientación profesional fue sólo una ilusión, pues la vista del artista en ciernes era demasiado débil para la pintura de porcelanas, así que debió interrumpir su aprendizaje y regresar a Erfurt, en donde permaneció hasta el año 1833, cuando inicia sus estudios en Berlín.</span></p><p style="text-align: justify;"><span style="font-size: 12px;">Si bien el tiempo de aprendizaje en Weimar no condujo al resultado anhelado, pero sirvió para estimular el talento artístico de Ferdinand, así lo demuestra claramente un dibujo del pintor quinceañero que se conserva en el Museo de Erfurt. Se trata de una pequeña vista de la catedral de esta ciudad y de la famosa iglesia de San Severino, ambas enmarcadas en un clásico telón de árboles que delata que los maestros de la escuela de dibujo utilizaban los modelos de Claude Lorrain y de sus numerosos seguidores para los estudios de composición. La arquitectura de las iglesias está dibujada con algo de rigidez, pero con exactitud; el joven artista se muestra ya como el observador preciso que más tarde atraería la atención de Alejandro de Humboldt. Walther Scheidig, director del Museo de Weimar durante muchos años y uno de los pocos historiadores de arte alemán de nuestro siglo, lo describe como el "científico" dentro del círculo de sus amigos pintores.</span></p>', 3, 2, 70, 3, '0', '23/1511657580.jpg', '1.jpg', '42.jpg', '10.jpg', 0, 'ferdinand-bellermann', '2017-11-26 00:53:00', '2017-11-26 00:53:00'),
(24, 'Martín Tovar y Tovar', '1969-12-31', '1902-12-17', NULL, NULL, '<p>Fue uno de los más importantes pintores venezolanos del siglo XIX, destacando principalmente en los géneros del retrato y de la pintura histórica.</p>', 3, 2, 190, 190, '0', '24/1511657708.jpg', '1.jpg', '42.jpg', '10.jpg', 0, 'martin-tovar-y-tovar', '2017-11-26 00:55:08', '2017-11-26 00:55:08'),
(25, 'Cristóbal Rojas', '1969-12-31', '1969-12-31', NULL, NULL, '<p>Fue un pintor que se diferencia de otros pintores de la época, estuvo más interesado en los hechos históricos locales o los retratos, por tratar temas como miseria y muerte. Tuvo una significativa trayectoria en los salones de arte de París y también en Caracas, debido a los encargos que recibió por parte del gobierno venezolano. Sus obras se caracterizan por intenso dramatismo íntimamente relacionado con su historia personal. Sus últimas obras hacen denotar a un artista que exploró nociones estéticas adelantadas a la época.</p>', 3, 2, 190, 190, '0', '25/1511657882.JPG', '25/1511662722.jpg', '25/1511662727.JPG', '25/1511662775.JPG', 0, 'cristobal-rojas', '2017-11-26 00:58:02', '2017-11-26 00:58:02'),
(26, 'Antonio Herrera Toro', '1969-12-31', '1914-06-26', NULL, NULL, '<p style="text-align: justify;"><span style="font-size: 12px;">Antonio Herrera Toro nació en Valencia, estado Carabobo, Venezuela, el 16 de enero de 1857 hijo de Juan José Herrera y de Teresa Toro. Realiza sus primeros estudios en Caracas en el colegio La Viñeta del sabio alemán Adolfo Ernst.&nbsp;</span><span style="font-size: 12px;">En Caracas, a partir de 1869, se inicia como aprendiz bajo la tutela de Martín Tovar y Tovar, posteriormente entre 1874 – 1885 estudia en la Academia de Bellas Artes con José Manuel Maucó y del académico español Miguel Navarro Cañizares.</span></p><p style="text-align: justify;"><span style="font-size: 12px;">En 1875 el gobierno de Antonio Guzmán Blanco le otorga una beca para realizar estudios, primero en París y luego en Roma. Para 1881 retorna a Caracas con los bocetos de La Asunción de la Virgen que habrá de ejecutar en la catedral donde contó con la colaboración de Cristóbal Rojas como ayudante. En 1883 pinta Los últimos momentos del Libertador, la obra fue presentada en la Exposición Nacional con motivo del centenario del nacimiento de Simón Bolívar. En el año de 1884 viaja al Perú donde habrá de tomar los apuntes para dos cuadros que el Gobierno encomendó a Tovar y Tovar y que fueron finalmente ejecutados por el mismo Herrera a partir de Tovar: la Batalla de Junín y la Batalla de Ayacucho que actualmente se exponen en el Palacio Federal Legislativo de Caracas. Regresó a Venezuela dedicándose al retrato y a la realización de obras como La caridad y La muerte de Ricaurte en San Mateo.</span></p><p style="text-align: justify;"><span style="font-size: 12px;">Posteriormente, alternará su oficio de pintor con labores periodísticas, utilizando el seudónimo de Santoro para firmar algunos de sus escritos, ejerciendo también funciones públicas. Fue colaborador de El Cojo Ilustrado y fundador del periódico El Granuja.3​4​ Además de director de la imprenta Nacional.&nbsp;</span><span style="font-size: 12px;">En 1892 fue nombrado director de Edificios y Ornato, para 1908 es nombrado director de la Academia Nacional de Bellas Artes tras la muerte de Emilio Mauri. Al comienzo de su gestión tuvo que enfrentar, en 1909, el descontento de un grupo numeroso de alumnos que reclamaban cambios en la orientación de los estudios de artes plásticas.5​ En 1911, junto con Pedro Arismendi Brito, redactó el reglamento del Instituto Nacional de Bellas Artes, que comprendía una sección de pintura y escultura y otra de música y declamación. Ese mismo año presentó su renuncia como director, la cual no le fue aceptada. Herrera Toro, a pesar de ser el blanco de las protestas estudiantiles, permaneció en su puesto, que ocupaba aún al ocurrir su muerte. 26 de junio de 1914.</span></p>', 3, 2, 190, 190, '0', '26/1511658054.JPG', '26/1511661251.jpg', '26/1511661275.jpg', '26/1511661282.jpg', 0, 'antonio-herrera-toro', '2017-11-26 01:00:54', '2017-11-26 01:00:54'),
(27, 'Arturo Michelena', '1969-12-31', '1969-12-31', NULL, NULL, '<p>Fue un reconocido pintor venezolano, que desde niño demostró excepcionales dones para el dibujo y la pintura. A los 14 años de edad se le encomendó realizar todas las ilustraciones de un libro sobre costumbres venezolanas. Junto a Cristóbal Rojas, Antonio Herrera Toro y Martín Tovar y Tovar se le considera uno de los más grandes pintores venezolanos del siglo XIX. El presidente Joaquin Crespo le regaló la beca para irse a estudiar a París al igual que Cristóbal Rojas</p>', 3, 2, 190, 190, '0', '27/1511658171.jpg', '27/1511661622.jpg', '27/1511661627.jpg', '27/1511661634.jpg', 0, 'arturo-michelena', '2017-11-26 01:02:51', '2017-11-26 01:02:51'),
(28, 'Emilio Boggio', '1969-12-31', '1920-06-07', NULL, NULL, '<p>Fue un pintor neoimpresionista venezolano de gran influencia en los pintores de venezolanos del comienzos del siglo XIX. Sus principales influencias fueron Claude Monet y Camille Pissarro, de quienes adoptó el estilo impresionista por el que se le conoce. Sin embargo, entre 1902 y 1904, su producción figurativa refleja la influencia de Van Gogh, pero Boggio es mejor conocido como paisajista.</p>', 3, 2, 190, 70, '0', '28/1511658323.jpg', '28/1511663045.jpg', '28/1511663050.jpg', '28/1511663058.jpg', 0, 'emilio-boggio', '2017-11-26 01:05:23', '2017-11-26 01:05:23'),
(31, 'michael daniel rondon pereira', '1993-02-27', NULL, '(424) 178-1403', 'calle veracruz casa nro 6 el manicomio la pastora', 'Hola, mi nombre es michael daniel rondon pereira', 3, 2, 190, NULL, '0', 'default.jpg', '1.jpg', '42.jpg', '10.jpg', 0, 'michael-daniel-rondon-pereira', '2017-11-30 04:24:02', '2017-11-30 04:24:02'),
(34, 'michael daniel rondon pereira', '1993-02-27', NULL, '(424) 178-1403', 'calle veracruz casa nro 6 el manicomio la pastora', 'Hola, mi nombre es michael daniel rondon pereira', 3, 2, 190, NULL, '1', 'default.jpg', '1.jpg', '42.jpg', '10.jpg', 0, 'michael-daniel-rondon-pereira-1', '2017-11-30 04:28:32', '2017-11-30 04:28:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista_catalogo`
--

CREATE TABLE `artista_catalogo` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitas` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artista_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `artista_catalogo`
--

INSERT INTO `artista_catalogo` (`id`, `titulo`, `descripcion`, `visitas`, `slug`, `artista_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'Pinturas 1 Armando Reveron', 'Varios', 22, 'pinturas-1-armando-reveron', 9, 3, '2017-11-26 01:26:36', '2017-11-26 12:50:58'),
(2, 'Pinturas 2 Armando Reveron', 'Varios', 3, 'pinturas-2-armando-reveron', 9, 3, '2017-11-26 01:34:10', '2017-11-26 02:47:21'),
(3, 'Pinturas 3 Armando Reveron', 'Varios', 1, 'pinturas-3-armando-reveron', 9, 3, '2017-11-26 01:37:45', '2017-11-26 01:58:11'),
(4, 'Pinturas 1 Antonio Herrera Toro', 'Varios', 3, 'pinturas-1-antonio-herrera-toro', 26, 3, '2017-11-26 01:55:03', '2017-11-26 01:58:14'),
(5, 'Pinturas 1 Arturo Michelena', 'Varios', 2, 'pinturas-1-arturo-michelena', 27, 3, '2017-11-26 02:08:14', '2017-11-26 13:55:56'),
(6, 'Arte Cinetico', 'Varios', 0, 'arte-cinetico', 8, 3, '2017-11-26 02:12:45', '2017-11-26 02:12:45'),
(7, 'Arte Cinetico 2', 'Varios', 0, 'arte-cinetico-2', 8, 3, '2017-11-26 02:16:06', '2017-11-26 02:16:06'),
(8, 'Pinturas 1 Cristobal Rojas', 'Varios', 0, 'pinturas-1-cristobal-rojas', 25, 3, '2017-11-26 02:20:07', '2017-11-26 02:20:07'),
(9, 'Pinturas Emilio Boggio', 'Varios', 0, 'pinturas-emilio-boggio', 28, 3, '2017-11-26 02:24:47', '2017-11-26 02:24:47'),
(10, 'Obras Jesus Soto', 'Varios', 0, 'obras-jesus-soto', 7, 3, '2017-11-26 02:31:02', '2017-11-26 02:31:02'),
(11, 'Obras Jesus Soto 2', 'Varios', 0, 'obras-jesus-soto-2', 7, 3, '2017-11-26 02:34:25', '2017-11-26 02:34:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista_catalogo_disciplina`
--

CREATE TABLE `artista_catalogo_disciplina` (
  `id` int(10) UNSIGNED NOT NULL,
  `artista_catalogo_id` int(10) UNSIGNED NOT NULL,
  `disciplina_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `artista_catalogo_disciplina`
--

INSERT INTO `artista_catalogo_disciplina` (`id`, `artista_catalogo_id`, `disciplina_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2017-11-26 01:26:36', '2017-11-26 01:26:36'),
(2, 2, 2, '2017-11-26 01:34:10', '2017-11-26 01:34:10'),
(3, 3, 2, '2017-11-26 01:37:45', '2017-11-26 01:37:45'),
(4, 4, 2, '2017-11-26 01:55:03', '2017-11-26 01:55:03'),
(5, 5, 2, '2017-11-26 02:08:14', '2017-11-26 02:08:14'),
(6, 6, 5, '2017-11-26 02:12:45', '2017-11-26 02:12:45'),
(7, 6, 7, '2017-11-26 02:12:45', '2017-11-26 02:12:45'),
(8, 7, 7, '2017-11-26 02:16:06', '2017-11-26 02:16:06'),
(9, 8, 2, '2017-11-26 02:20:07', '2017-11-26 02:20:07'),
(10, 9, 2, '2017-11-26 02:24:47', '2017-11-26 02:24:47'),
(11, 9, 4, '2017-11-26 02:24:47', '2017-11-26 02:24:47'),
(12, 10, 5, '2017-11-26 02:31:02', '2017-11-26 02:31:02'),
(13, 10, 1, '2017-11-26 02:31:02', '2017-11-26 02:31:02'),
(14, 11, 5, '2017-11-26 02:34:25', '2017-11-26 02:34:25'),
(15, 11, 1, '2017-11-26 02:34:25', '2017-11-26 02:34:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista_catalogo_imagen`
--

CREATE TABLE `artista_catalogo_imagen` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagen` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `artista_catalogo_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `artista_catalogo_imagen`
--

INSERT INTO `artista_catalogo_imagen` (`id`, `imagen`, `nombre`, `descripcion`, `artista_catalogo_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, '9/catalogo/1/1511659626.jpg', 'Macuto recordando su partida', NULL, 1, 3, '2017-11-26 01:27:06', '2017-11-26 01:27:06'),
(2, '9/catalogo/1/1511659932.jpg', 'Vida y obra', NULL, 1, 3, '2017-11-26 01:32:12', '2017-11-26 01:32:12'),
(3, '9/catalogo/1/1511659954.jpg', 'Mujer con mantilla', NULL, 1, 3, '2017-11-26 01:32:34', '2017-11-26 01:32:34'),
(4, '9/catalogo/1/1511659990.jpg', 'La Cueva', NULL, 1, 3, '2017-11-26 01:33:10', '2017-11-26 01:33:10'),
(5, '9/catalogo/1/1511660023.jpg', 'Vida y obra', NULL, 1, 3, '2017-11-26 01:33:43', '2017-11-26 01:33:43'),
(6, '9/catalogo/2/1511660099.jpg', 'pintura-de-reveron', NULL, 2, 3, '2017-11-26 01:34:59', '2017-11-26 01:34:59'),
(7, '9/catalogo/2/1511660119.jpg', 'Armando Reverón', NULL, 2, 3, '2017-11-26 01:35:19', '2017-11-26 01:35:19'),
(8, '9/catalogo/2/1511660136.jpg', 'Armando Reverón', NULL, 2, 3, '2017-11-26 01:35:36', '2017-11-26 01:35:36'),
(9, '9/catalogo/2/1511660164.jpg', 'Juanita desnuda', NULL, 2, 3, '2017-11-26 01:36:04', '2017-11-26 01:36:04'),
(10, '9/catalogo/2/1511660184.jpg', 'Maja', NULL, 2, 3, '2017-11-26 01:36:24', '2017-11-26 01:36:24'),
(11, '9/catalogo/2/1511660220.jpg', 'Armando Reverón', NULL, 2, 3, '2017-11-26 01:37:00', '2017-11-26 01:37:00'),
(12, '9/catalogo/2/1511660240.jpg', 'juanita', NULL, 2, 3, '2017-11-26 01:37:20', '2017-11-26 01:37:20'),
(13, '9/catalogo/3/1511660298.jpeg', 'Armando Reverón, incalculable', NULL, 3, 3, '2017-11-26 01:38:18', '2017-11-26 01:38:18'),
(14, '9/catalogo/3/1511660318.jpg', 'OFICIO DE MIRAR', NULL, 3, 3, '2017-11-26 01:38:38', '2017-11-26 01:38:38'),
(15, '9/catalogo/3/1511660349.jpg', 'Escritos de un salvaje', NULL, 3, 3, '2017-11-26 01:39:09', '2017-11-26 01:39:09'),
(16, '9/catalogo/3/1511660391.jpg', 'A 127 años de Armando Reverón', NULL, 3, 3, '2017-11-26 01:39:51', '2017-11-26 01:39:51'),
(17, '9/catalogo/3/1511660414.jpg', 'Armando Reverón', NULL, 3, 3, '2017-11-26 01:40:14', '2017-11-26 01:40:14'),
(18, '26/catalogo/4/1511661347.jpg', 'Cocina criolla.', NULL, 4, 3, '2017-11-26 01:55:47', '2017-11-26 01:55:47'),
(19, '26/catalogo/4/1511661367.jpg', 'La muerte de Ricaurte', NULL, 4, 3, '2017-11-26 01:56:07', '2017-11-26 01:56:07'),
(20, '26/catalogo/4/1511661385.jpg', 'Batalla de Ayacucho', NULL, 4, 3, '2017-11-26 01:56:25', '2017-11-26 01:56:25'),
(21, '26/catalogo/4/1511661407.jpg', 'Ponencia', NULL, 4, 3, '2017-11-26 01:56:47', '2017-11-26 01:56:47'),
(22, '26/catalogo/4/1511661424.jpg', 'Ricauter en San Mateo', NULL, 4, 3, '2017-11-26 01:57:04', '2017-11-26 01:57:04'),
(23, '26/catalogo/4/1511661444.jpg', 'Batalla de Junin', NULL, 4, 3, '2017-11-26 01:57:24', '2017-11-26 01:57:24'),
(24, '27/catalogo/5/1511662102.jpg', 'Miranda en La Carraca', NULL, 5, 3, '2017-11-26 02:08:22', '2017-11-26 02:08:22'),
(25, '27/catalogo/5/1511662118.JPG', 'La vara rota', NULL, 5, 3, '2017-11-26 02:08:38', '2017-11-26 02:08:38'),
(26, '27/catalogo/5/1511662136.jpg', 'Pinturas celebres de Arturo Michelena', NULL, 5, 3, '2017-11-26 02:08:56', '2017-11-26 02:08:56'),
(27, '27/catalogo/5/1511662176.jpg', 'Vuelvan Caras', NULL, 5, 3, '2017-11-26 02:09:36', '2017-11-26 02:09:36'),
(28, '27/catalogo/5/1511662192.jpg', 'Retrato ecuestre de Bolivar', NULL, 5, 3, '2017-11-26 02:09:52', '2017-11-26 02:09:52'),
(29, '27/catalogo/5/1511662212.jpg', 'ARTURO MICHELENA', NULL, 5, 3, '2017-11-26 02:10:12', '2017-11-26 02:10:12'),
(30, '27/catalogo/5/1511662230.jpg', 'Arturo Michelena', NULL, 5, 3, '2017-11-26 02:10:30', '2017-11-26 02:10:30'),
(31, '8/catalogo/6/1511662448.jpg', 'Carlos Cruz-Diez', NULL, 6, 3, '2017-11-26 02:14:08', '2017-11-26 02:14:08'),
(32, '8/catalogo/6/1511662466.jpg', 'Carlos Cruz-Diez y Liu Bolin se "camuflajean"', NULL, 6, 3, '2017-11-26 02:14:26', '2017-11-26 02:14:26'),
(33, '8/catalogo/6/1511662483.jpg', 'Carlos Cruz Diez', NULL, 6, 3, '2017-11-26 02:14:43', '2017-11-26 02:14:43'),
(34, '8/catalogo/6/1511662497.jpg', 'Eliso Mundo Del Arte', NULL, 6, 3, '2017-11-26 02:14:57', '2017-11-26 02:14:57'),
(35, '8/catalogo/6/1511662519.jpg', 'El Arte de Carlos Cruz Diez. El arte cinético', NULL, 6, 3, '2017-11-26 02:15:19', '2017-11-26 02:15:19'),
(36, '8/catalogo/6/1511662537.jpg', 'FISICROMIA DE CARLOS CRUZ DIEZ', NULL, 6, 3, '2017-11-26 02:15:37', '2017-11-26 02:15:37'),
(37, '8/catalogo/7/1511662586.jpg', 'El Arte de Cruz-Diez y de Hublot', NULL, 7, 3, '2017-11-26 02:16:26', '2017-11-26 02:16:26'),
(38, '8/catalogo/7/1511662603.jpg', 'Esculturas en la ciudad de Caracas', NULL, 7, 3, '2017-11-26 02:16:43', '2017-11-26 02:16:43'),
(39, '8/catalogo/7/1511662625.jpg', 'La maravillora historia del Arco de Inducción Cromática para la Margarita', NULL, 7, 3, '2017-11-26 02:17:05', '2017-11-26 02:17:05'),
(40, '25/catalogo/8/1511662860.jpg', 'Primera y ultima comunión', NULL, 8, 3, '2017-11-26 02:21:00', '2017-11-26 02:21:00'),
(41, '25/catalogo/8/1511662877.jpg', 'Ruinas de Cúa después del Terremoto de 1882', NULL, 8, 3, '2017-11-26 02:21:17', '2017-11-26 02:21:17'),
(42, '25/catalogo/8/1511662892.JPG', 'Cristobal Rojas', NULL, 8, 3, '2017-11-26 02:21:32', '2017-11-26 02:21:32'),
(43, '25/catalogo/8/1511662913.jpg', 'Óleo sobre tela', NULL, 8, 3, '2017-11-26 02:21:53', '2017-11-26 02:21:53'),
(44, '25/catalogo/8/1511662934.jpg', 'Ruinas de Cúa después del Terremoto de 1882', NULL, 8, 3, '2017-11-26 02:22:14', '2017-11-26 02:22:14'),
(45, '28/catalogo/9/1511663152.jpg', 'Amantes de las Artes Plásticas Venezolanas', NULL, 9, 3, '2017-11-26 02:25:52', '2017-11-26 02:25:52'),
(46, '28/catalogo/9/1511663175.jpeg', 'Le Moulin de Perigny', NULL, 9, 3, '2017-11-26 02:26:15', '2017-11-26 02:26:15'),
(47, '28/catalogo/9/1511663189.jpg', 'La Manson de campagne', NULL, 9, 3, '2017-11-26 02:26:29', '2017-11-26 02:26:29'),
(48, '28/catalogo/9/1511663206.jpg', 'Curiosidades de Emilio Boggio', NULL, 9, 3, '2017-11-26 02:26:46', '2017-11-26 02:26:46'),
(49, '28/catalogo/9/1511663225.jpg', 'Retrato de la Sra. Dupuy', NULL, 9, 3, '2017-11-26 02:27:05', '2017-11-26 02:27:05'),
(50, '28/catalogo/9/1511663249.jpg', 'Curiosidades de Emilio Boggio', NULL, 9, 3, '2017-11-26 02:27:29', '2017-11-26 02:27:29'),
(51, '28/catalogo/9/1511663266.jpg', 'Emilio Boggio Oleo sobre tela', NULL, 9, 3, '2017-11-26 02:27:46', '2017-11-26 02:27:46'),
(52, '7/catalogo/10/1511663490.jpg', 'La esfera Japón', NULL, 10, 3, '2017-11-26 02:31:30', '2017-11-26 02:31:30'),
(53, '7/catalogo/10/1511663510.jpg', 'Cubo Policromo', NULL, 10, 3, '2017-11-26 02:31:50', '2017-11-26 02:31:50'),
(54, '7/catalogo/10/1511663535.jpg', 'El movimiento en la obra de Jesús Soto', NULL, 10, 3, '2017-11-26 02:32:15', '2017-11-26 02:32:15'),
(55, '7/catalogo/10/1511663560.jpg', 'Jesus Rafael Soto', NULL, 10, 3, '2017-11-26 02:32:40', '2017-11-26 02:32:40'),
(56, '7/catalogo/10/1511663577.jpg', 'Progresión Amarilla', NULL, 10, 3, '2017-11-26 02:32:57', '2017-11-26 02:32:57'),
(57, '7/catalogo/11/1511663673.jpg', 'Extensión amarilla y blanca', NULL, 11, 3, '2017-11-26 02:34:33', '2017-11-26 02:34:33'),
(58, '7/catalogo/11/1511663690.jpg', 'Soto', NULL, 11, 3, '2017-11-26 02:34:50', '2017-11-26 02:34:50'),
(59, '7/catalogo/11/1511663713.jpg', 'Soto', NULL, 11, 3, '2017-11-26 02:35:13', '2017-11-26 02:35:13'),
(60, '7/catalogo/11/1511663738.jpg', 'Estos gigantes del arte mundial', NULL, 11, 3, '2017-11-26 02:35:38', '2017-11-26 02:35:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista_disciplina`
--

CREATE TABLE `artista_disciplina` (
  `id` int(10) UNSIGNED NOT NULL,
  `artista_id` int(10) UNSIGNED NOT NULL,
  `disciplina_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `artista_disciplina`
--

INSERT INTO `artista_disciplina` (`id`, `artista_id`, `disciplina_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2017-11-25 22:41:51', '2017-11-25 22:41:51'),
(2, 1, 1, '2017-11-25 22:41:51', '2017-11-25 22:41:51'),
(3, 1, 2, '2017-11-25 22:41:51', '2017-11-25 22:41:51'),
(4, 2, 4, '2017-11-25 22:45:40', '2017-11-25 22:45:40'),
(5, 3, 2, '2017-11-25 22:48:27', '2017-11-25 22:48:27'),
(6, 4, 1, '2017-11-25 22:51:43', '2017-11-25 22:51:43'),
(7, 4, 2, '2017-11-25 22:51:43', '2017-11-25 22:51:43'),
(8, 5, 1, '2017-11-25 22:53:51', '2017-11-25 22:53:51'),
(9, 5, 2, '2017-11-25 22:53:51', '2017-11-25 22:53:51'),
(10, 6, 5, '2017-11-25 22:57:25', '2017-11-25 22:57:25'),
(11, 6, 2, '2017-11-25 22:57:25', '2017-11-25 22:57:25'),
(12, 7, 7, '2017-11-25 23:02:35', '2017-11-25 23:02:35'),
(13, 7, 6, '2017-11-25 23:02:35', '2017-11-25 23:02:35'),
(14, 8, 7, '2017-11-25 23:04:39', '2017-11-25 23:04:39'),
(15, 8, 6, '2017-11-25 23:04:39', '2017-11-25 23:04:39'),
(16, 9, 3, '2017-11-25 23:07:56', '2017-11-25 23:07:56'),
(17, 9, 1, '2017-11-25 23:07:56', '2017-11-25 23:07:56'),
(18, 9, 2, '2017-11-25 23:07:56', '2017-11-25 23:07:56'),
(19, 10, 8, '2017-11-25 23:10:42', '2017-11-25 23:10:42'),
(20, 10, 2, '2017-11-25 23:10:42', '2017-11-25 23:10:42'),
(21, 11, 9, '2017-11-25 23:13:34', '2017-11-25 23:13:34'),
(22, 11, 2, '2017-11-25 23:13:35', '2017-11-25 23:13:35'),
(23, 12, 3, '2017-11-25 23:15:39', '2017-11-25 23:15:39'),
(24, 12, 1, '2017-11-25 23:15:39', '2017-11-25 23:15:39'),
(25, 12, 2, '2017-11-25 23:15:39', '2017-11-25 23:15:39'),
(26, 13, 10, '2017-11-25 23:19:04', '2017-11-25 23:19:04'),
(27, 13, 11, '2017-11-25 23:19:04', '2017-11-25 23:19:04'),
(28, 13, 2, '2017-11-25 23:19:05', '2017-11-25 23:19:05'),
(29, 14, 5, '2017-11-25 23:21:16', '2017-11-25 23:21:16'),
(30, 14, 1, '2017-11-25 23:21:16', '2017-11-25 23:21:16'),
(31, 15, 2, '2017-11-25 23:23:11', '2017-11-25 23:23:11'),
(32, 16, 2, '2017-11-25 23:25:07', '2017-11-25 23:25:07'),
(33, 17, 3, '2017-11-25 23:27:26', '2017-11-25 23:27:26'),
(34, 17, 1, '2017-11-25 23:27:26', '2017-11-25 23:27:26'),
(35, 18, 3, '2017-11-25 23:30:12', '2017-11-25 23:30:12'),
(36, 18, 1, '2017-11-25 23:30:12', '2017-11-25 23:30:12'),
(37, 18, 10, '2017-11-25 23:30:12', '2017-11-25 23:30:12'),
(38, 18, 2, '2017-11-25 23:30:12', '2017-11-25 23:30:12'),
(39, 19, 2, '2017-11-26 00:19:51', '2017-11-26 00:19:51'),
(40, 20, 2, '2017-11-26 00:22:15', '2017-11-26 00:22:15'),
(41, 20, 4, '2017-11-26 00:22:15', '2017-11-26 00:22:15'),
(42, 21, 2, '2017-11-26 00:24:10', '2017-11-26 00:24:10'),
(43, 22, 1, '2017-11-26 00:26:19', '2017-11-26 00:26:19'),
(44, 23, 2, '2017-11-26 00:53:00', '2017-11-26 00:53:00'),
(45, 24, 2, '2017-11-26 00:55:08', '2017-11-26 00:55:08'),
(46, 25, 2, '2017-11-26 00:58:02', '2017-11-26 00:58:02'),
(47, 26, 2, '2017-11-26 01:00:54', '2017-11-26 01:00:54'),
(48, 27, 2, '2017-11-26 01:02:51', '2017-11-26 01:02:51'),
(49, 28, 2, '2017-11-26 01:05:23', '2017-11-26 01:05:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista_habilidad`
--

CREATE TABLE `artista_habilidad` (
  `id` int(10) UNSIGNED NOT NULL,
  `habilidad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `artista_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista_museo`
--

CREATE TABLE `artista_museo` (
  `id` int(10) UNSIGNED NOT NULL,
  `museo_id` int(10) UNSIGNED NOT NULL,
  `artista_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `artista_museo`
--

INSERT INTO `artista_museo` (`id`, `museo_id`, `artista_id`, `created_at`, `updated_at`) VALUES
(1, 1, 14, '2017-11-25 23:32:09', '2017-11-25 23:32:09'),
(2, 1, 13, '2017-11-25 23:32:09', '2017-11-25 23:32:09'),
(3, 1, 4, '2017-11-25 23:32:09', '2017-11-25 23:32:09'),
(4, 1, 3, '2017-11-25 23:32:09', '2017-11-25 23:32:09'),
(5, 1, 9, '2017-11-25 23:32:09', '2017-11-25 23:32:09'),
(6, 1, 1, '2017-11-25 23:32:09', '2017-11-25 23:32:09'),
(7, 1, 8, '2017-11-25 23:32:09', '2017-11-25 23:32:09'),
(8, 1, 2, '2017-11-25 23:32:09', '2017-11-25 23:32:09'),
(9, 1, 12, '2017-11-25 23:32:09', '2017-11-25 23:32:09'),
(10, 1, 5, '2017-11-25 23:32:09', '2017-11-25 23:32:09'),
(11, 1, 17, '2017-11-25 23:32:09', '2017-11-25 23:32:09'),
(12, 1, 7, '2017-11-25 23:32:09', '2017-11-25 23:32:09'),
(13, 1, 11, '2017-11-25 23:32:09', '2017-11-25 23:32:09'),
(14, 1, 16, '2017-11-25 23:32:09', '2017-11-25 23:32:09'),
(15, 1, 10, '2017-11-25 23:32:09', '2017-11-25 23:32:09'),
(16, 1, 18, '2017-11-25 23:32:09', '2017-11-25 23:32:09'),
(17, 1, 15, '2017-11-25 23:32:09', '2017-11-25 23:32:09'),
(18, 1, 6, '2017-11-25 23:32:09', '2017-11-25 23:32:09'),
(19, 3, 14, '2017-11-26 00:28:54', '2017-11-26 00:28:54'),
(20, 3, 19, '2017-11-26 00:28:54', '2017-11-26 00:28:54'),
(21, 3, 20, '2017-11-26 00:28:54', '2017-11-26 00:28:54'),
(22, 3, 22, '2017-11-26 00:28:54', '2017-11-26 00:28:54'),
(23, 3, 7, '2017-11-26 00:28:54', '2017-11-26 00:28:54'),
(24, 3, 21, '2017-11-26 00:28:54', '2017-11-26 00:28:54'),
(25, 5, 26, '2017-11-26 01:07:50', '2017-11-26 01:07:50'),
(26, 5, 27, '2017-11-26 01:07:50', '2017-11-26 01:07:50'),
(27, 5, 20, '2017-11-26 01:07:50', '2017-11-26 01:07:50'),
(28, 5, 25, '2017-11-26 01:07:50', '2017-11-26 01:07:50'),
(29, 5, 28, '2017-11-26 01:07:50', '2017-11-26 01:07:50'),
(30, 5, 23, '2017-11-26 01:07:50', '2017-11-26 01:07:50'),
(31, 5, 24, '2017-11-26 01:07:50', '2017-11-26 01:07:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista_profesion`
--

CREATE TABLE `artista_profesion` (
  `id` int(10) UNSIGNED NOT NULL,
  `artista_id` int(10) UNSIGNED NOT NULL,
  `profesion_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `artista_profesion`
--

INSERT INTO `artista_profesion` (`id`, `artista_id`, `profesion_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2017-11-25 22:41:51', '2017-11-25 22:41:51'),
(2, 1, 1, '2017-11-25 22:41:51', '2017-11-25 22:41:51'),
(3, 1, 2, '2017-11-25 22:41:51', '2017-11-25 22:41:51'),
(4, 1, 3, '2017-11-25 22:41:51', '2017-11-25 22:41:51'),
(5, 2, 3, '2017-11-25 22:45:40', '2017-11-25 22:45:40'),
(6, 3, 4, '2017-11-25 22:48:27', '2017-11-25 22:48:27'),
(7, 3, 2, '2017-11-25 22:48:27', '2017-11-25 22:48:27'),
(8, 4, 1, '2017-11-25 22:51:43', '2017-11-25 22:51:43'),
(9, 4, 2, '2017-11-25 22:51:43', '2017-11-25 22:51:43'),
(10, 4, 3, '2017-11-25 22:51:43', '2017-11-25 22:51:43'),
(11, 5, 1, '2017-11-25 22:53:51', '2017-11-25 22:53:51'),
(12, 5, 2, '2017-11-25 22:53:51', '2017-11-25 22:53:51'),
(13, 5, 3, '2017-11-25 22:53:51', '2017-11-25 22:53:51'),
(14, 6, 3, '2017-11-25 22:57:25', '2017-11-25 22:57:25'),
(15, 7, 7, '2017-11-25 23:02:35', '2017-11-25 23:02:35'),
(16, 7, 6, '2017-11-25 23:02:35', '2017-11-25 23:02:35'),
(17, 8, 7, '2017-11-25 23:04:39', '2017-11-25 23:04:39'),
(18, 8, 6, '2017-11-25 23:04:39', '2017-11-25 23:04:39'),
(19, 8, 5, '2017-11-25 23:04:39', '2017-11-25 23:04:39'),
(20, 9, 4, '2017-11-25 23:07:55', '2017-11-25 23:07:55'),
(21, 9, 1, '2017-11-25 23:07:55', '2017-11-25 23:07:55'),
(22, 9, 3, '2017-11-25 23:07:55', '2017-11-25 23:07:55'),
(23, 10, 8, '2017-11-25 23:10:42', '2017-11-25 23:10:42'),
(24, 10, 3, '2017-11-25 23:10:42', '2017-11-25 23:10:42'),
(25, 11, 9, '2017-11-25 23:13:34', '2017-11-25 23:13:34'),
(26, 11, 3, '2017-11-25 23:13:34', '2017-11-25 23:13:34'),
(27, 12, 4, '2017-11-25 23:15:39', '2017-11-25 23:15:39'),
(28, 12, 1, '2017-11-25 23:15:39', '2017-11-25 23:15:39'),
(29, 12, 5, '2017-11-25 23:15:39', '2017-11-25 23:15:39'),
(30, 13, 10, '2017-11-25 23:19:04', '2017-11-25 23:19:04'),
(31, 13, 3, '2017-11-25 23:19:04', '2017-11-25 23:19:04'),
(32, 14, 1, '2017-11-25 23:21:16', '2017-11-25 23:21:16'),
(33, 15, 3, '2017-11-25 23:23:11', '2017-11-25 23:23:11'),
(34, 16, 3, '2017-11-25 23:25:07', '2017-11-25 23:25:07'),
(35, 17, 4, '2017-11-25 23:27:26', '2017-11-25 23:27:26'),
(36, 17, 1, '2017-11-25 23:27:26', '2017-11-25 23:27:26'),
(37, 18, 4, '2017-11-25 23:30:12', '2017-11-25 23:30:12'),
(38, 18, 1, '2017-11-25 23:30:12', '2017-11-25 23:30:12'),
(39, 18, 10, '2017-11-25 23:30:12', '2017-11-25 23:30:12'),
(40, 18, 3, '2017-11-25 23:30:12', '2017-11-25 23:30:12'),
(41, 19, 3, '2017-11-26 00:19:51', '2017-11-26 00:19:51'),
(42, 20, 3, '2017-11-26 00:22:15', '2017-11-26 00:22:15'),
(43, 21, 3, '2017-11-26 00:24:10', '2017-11-26 00:24:10'),
(44, 22, 1, '2017-11-26 00:26:19', '2017-11-26 00:26:19'),
(45, 23, 3, '2017-11-26 00:53:00', '2017-11-26 00:53:00'),
(46, 24, 3, '2017-11-26 00:55:08', '2017-11-26 00:55:08'),
(47, 25, 3, '2017-11-26 00:58:02', '2017-11-26 00:58:02'),
(48, 26, 3, '2017-11-26 01:00:54', '2017-11-26 01:00:54'),
(49, 27, 3, '2017-11-26 01:02:51', '2017-11-26 01:02:51'),
(50, 28, 3, '2017-11-26 01:05:23', '2017-11-26 01:05:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista_red_social`
--

CREATE TABLE `artista_red_social` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `artista_id` int(10) UNSIGNED NOT NULL,
  `red_social_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista_user`
--

CREATE TABLE `artista_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `artista_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `artista_user`
--

INSERT INTO `artista_user` (`id`, `artista_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-11-25 22:41:51', '2017-11-25 22:41:51'),
(2, 2, 1, '2017-11-25 22:45:40', '2017-11-25 22:45:40'),
(3, 3, 1, '2017-11-25 22:48:27', '2017-11-25 22:48:27'),
(4, 4, 1, '2017-11-25 22:51:43', '2017-11-25 22:51:43'),
(5, 5, 1, '2017-11-25 22:53:51', '2017-11-25 22:53:51'),
(6, 6, 1, '2017-11-25 22:57:25', '2017-11-25 22:57:25'),
(7, 7, 1, '2017-11-25 23:02:35', '2017-11-25 23:02:35'),
(8, 8, 1, '2017-11-25 23:04:39', '2017-11-25 23:04:39'),
(9, 9, 1, '2017-11-25 23:07:56', '2017-11-25 23:07:56'),
(10, 10, 1, '2017-11-25 23:10:42', '2017-11-25 23:10:42'),
(11, 11, 1, '2017-11-25 23:13:35', '2017-11-25 23:13:35'),
(12, 12, 1, '2017-11-25 23:15:39', '2017-11-25 23:15:39'),
(13, 13, 1, '2017-11-25 23:19:05', '2017-11-25 23:19:05'),
(14, 14, 1, '2017-11-25 23:21:17', '2017-11-25 23:21:17'),
(15, 15, 1, '2017-11-25 23:23:11', '2017-11-25 23:23:11'),
(16, 16, 1, '2017-11-25 23:25:07', '2017-11-25 23:25:07'),
(17, 17, 1, '2017-11-25 23:27:26', '2017-11-25 23:27:26'),
(18, 18, 1, '2017-11-25 23:30:12', '2017-11-25 23:30:12'),
(19, 19, 1, '2017-11-26 00:19:51', '2017-11-26 00:19:51'),
(20, 20, 1, '2017-11-26 00:22:15', '2017-11-26 00:22:15'),
(21, 21, 1, '2017-11-26 00:24:10', '2017-11-26 00:24:10'),
(22, 22, 1, '2017-11-26 00:26:19', '2017-11-26 00:26:19'),
(23, 23, 1, '2017-11-26 00:53:00', '2017-11-26 00:53:00'),
(24, 24, 1, '2017-11-26 00:55:08', '2017-11-26 00:55:08'),
(25, 25, 1, '2017-11-26 00:58:02', '2017-11-26 00:58:02'),
(26, 26, 1, '2017-11-26 01:00:54', '2017-11-26 01:00:54'),
(27, 27, 1, '2017-11-26 01:02:51', '2017-11-26 01:02:51'),
(28, 28, 1, '2017-11-26 01:05:23', '2017-11-26 01:05:23'),
(33, 34, 2, '2017-11-30 04:28:32', '2017-11-30 04:28:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` int(10) UNSIGNED NOT NULL,
  `cargo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `cargo`, `created_at`, `updated_at`) VALUES
(1, 'Director', '2017-11-25 22:30:54', '2017-11-25 22:30:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id` int(10) UNSIGNED NOT NULL,
  `disciplina` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `disciplinas`
--

INSERT INTO `disciplinas` (`id`, `disciplina`, `created_at`, `updated_at`) VALUES
(1, 'Escultura', '2017-11-25 22:39:59', '2017-11-25 22:39:59'),
(2, 'Pintura', '2017-11-25 22:40:04', '2017-11-25 22:40:04'),
(3, 'Dibujo', '2017-11-25 22:40:10', '2017-11-25 22:40:10'),
(4, 'Pintura del paisaje', '2017-11-25 22:44:02', '2017-11-25 22:44:02'),
(5, 'Abstracción', '2017-11-25 22:55:15', '2017-11-25 22:55:15'),
(6, 'Plastico', '2017-11-25 23:00:31', '2017-11-25 23:00:31'),
(7, 'Cinetica', '2017-11-25 23:00:36', '2017-11-25 23:00:36'),
(8, 'Mural', '2017-11-25 23:08:43', '2017-11-25 23:08:43'),
(9, 'Caricatura', '2017-11-25 23:12:09', '2017-11-25 23:12:09'),
(10, 'Fotografía', '2017-11-25 23:16:31', '2017-11-25 23:16:46'),
(11, 'Impresión', '2017-11-25 23:16:40', '2017-11-25 23:16:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disciplina_solicitud`
--

CREATE TABLE `disciplina_solicitud` (
  `id` int(10) UNSIGNED NOT NULL,
  `solicitud_id` int(10) UNSIGNED NOT NULL,
  `disciplina_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `disciplina_solicitud`
--

INSERT INTO `disciplina_solicitud` (`id`, `solicitud_id`, `disciplina_id`, `created_at`, `updated_at`) VALUES
(11, 5, 5, '2017-11-30 02:10:11', '2017-11-30 02:10:11'),
(12, 5, 9, '2017-11-30 02:10:11', '2017-11-30 02:10:11'),
(13, 6, 10, '2017-11-30 16:35:47', '2017-11-30 16:35:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(10) UNSIGNED NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Amazonas', '2017-11-25 21:54:20', '2017-11-25 21:54:20'),
(2, 'Anzoátegui', '2017-11-25 21:54:39', '2017-11-25 21:54:39'),
(3, 'Apure', '2017-11-25 21:54:49', '2017-11-25 21:54:49'),
(4, 'Aragua', '2017-11-25 21:54:57', '2017-11-25 21:54:57'),
(5, 'Barinas', '2017-11-25 21:55:07', '2017-11-25 21:55:07'),
(6, 'Bolívar', '2017-11-25 21:55:18', '2017-11-25 21:55:18'),
(7, 'Carabobo', '2017-11-25 21:55:28', '2017-11-25 21:55:28'),
(8, 'Cojedes', '2017-11-25 21:55:37', '2017-11-25 21:55:37'),
(9, 'Delta Amacuro', '2017-11-25 21:55:47', '2017-11-25 21:55:47'),
(10, 'Distrito Capital', '2017-11-25 21:55:56', '2017-11-25 21:55:56'),
(11, 'Falcón', '2017-11-25 21:56:06', '2017-11-25 21:56:06'),
(12, 'Guárico', '2017-11-25 21:56:17', '2017-11-25 21:56:17'),
(13, 'Lara', '2017-11-25 21:56:26', '2017-11-25 21:56:26'),
(14, 'Mérida', '2017-11-25 21:56:35', '2017-11-25 21:56:35'),
(15, 'Miranda', '2017-11-25 21:56:42', '2017-11-25 21:56:42'),
(16, 'Monagas', '2017-11-25 21:56:49', '2017-11-25 21:56:49'),
(17, 'Nueva Esparta', '2017-11-25 21:57:07', '2017-11-25 21:57:07'),
(18, 'Portuguesa', '2017-11-25 21:57:17', '2017-11-25 21:57:17'),
(19, 'Sucre', '2017-11-25 21:57:26', '2017-11-25 21:57:26'),
(20, 'Táchira', '2017-11-25 21:57:36', '2017-11-25 21:57:36'),
(21, 'Trujillo', '2017-11-25 21:57:43', '2017-11-25 21:57:43'),
(22, 'Vargas', '2017-11-25 21:57:49', '2017-11-25 21:57:49'),
(23, 'Yaracuy', '2017-11-25 21:57:57', '2017-11-25 21:57:57'),
(24, 'Zulia', '2017-11-25 21:58:04', '2017-11-25 21:58:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_civiles`
--

CREATE TABLE `estados_civiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `estado_civil` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados_civiles`
--

INSERT INTO `estados_civiles` (`id`, `estado_civil`, `created_at`, `updated_at`) VALUES
(1, 'Soltero(a)', '2017-11-29 02:30:39', '2017-11-29 02:31:23'),
(2, 'Casado(a)', '2017-11-29 02:30:45', '2017-11-29 02:31:29'),
(3, 'Divorciado(a)', '2017-11-29 02:30:56', '2017-11-29 02:31:26'),
(4, 'Viudo(a)', '2017-11-29 02:31:18', '2017-11-29 02:31:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `id` int(10) UNSIGNED NOT NULL,
  `etiqueta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`id`, `etiqueta`, `created_at`, `updated_at`) VALUES
(1, 'tecnologia', '2017-11-26 02:37:34', '2017-11-26 02:37:34'),
(2, 'Arte', '2017-11-26 02:37:44', '2017-11-26 02:37:44'),
(3, 'Dibujo', '2017-11-26 02:37:52', '2017-11-26 02:37:52'),
(4, 'Escultura', '2017-11-26 02:37:58', '2017-11-26 02:37:58'),
(5, 'Ciencia', '2017-11-26 02:38:04', '2017-11-26 02:38:04'),
(6, 'Museo', '2017-11-26 02:38:09', '2017-11-26 02:38:09'),
(7, 'Pintura', '2017-11-26 02:38:17', '2017-11-26 02:38:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta_noticia`
--

CREATE TABLE `etiqueta_noticia` (
  `id` int(10) UNSIGNED NOT NULL,
  `noticia_id` int(10) UNSIGNED NOT NULL,
  `etiqueta_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `etiqueta_noticia`
--

INSERT INTO `etiqueta_noticia` (`id`, `noticia_id`, `etiqueta_id`, `created_at`, `updated_at`) VALUES
(1, 1, 5, '2017-11-26 02:38:36', '2017-11-26 02:38:36'),
(2, 2, 4, '2017-11-26 02:38:56', '2017-11-26 02:38:56'),
(3, 3, 6, '2017-11-26 02:39:25', '2017-11-26 02:39:25'),
(4, 4, 5, '2017-11-26 02:39:51', '2017-11-26 02:39:51'),
(5, 4, 4, '2017-11-26 02:39:51', '2017-11-26 02:39:51'),
(6, 4, 7, '2017-11-26 02:39:51', '2017-11-26 02:39:51'),
(7, 5, 2, '2017-11-26 02:40:16', '2017-11-26 02:40:16'),
(8, 5, 3, '2017-11-26 02:40:16', '2017-11-26 02:40:16'),
(9, 5, 1, '2017-11-26 02:40:16', '2017-11-26 02:40:16'),
(10, 6, 5, '2017-11-26 02:40:45', '2017-11-26 02:40:45'),
(11, 6, 4, '2017-11-26 02:40:45', '2017-11-26 02:40:45'),
(12, 6, 7, '2017-11-26 02:40:45', '2017-11-26 02:40:45'),
(13, 7, 5, '2017-11-26 02:41:16', '2017-11-26 02:41:16'),
(14, 7, 3, '2017-11-26 02:41:16', '2017-11-26 02:41:16'),
(15, 7, 4, '2017-11-26 02:41:16', '2017-11-26 02:41:16'),
(16, 8, 2, '2017-11-26 02:41:48', '2017-11-26 02:41:48'),
(17, 8, 6, '2017-11-26 02:41:48', '2017-11-26 02:41:48'),
(18, 8, 7, '2017-11-26 02:41:48', '2017-11-26 02:41:48'),
(19, 9, 5, '2017-11-26 02:42:18', '2017-11-26 02:42:18'),
(20, 9, 4, '2017-11-26 02:42:18', '2017-11-26 02:42:18'),
(21, 9, 1, '2017-11-26 02:42:18', '2017-11-26 02:42:18'),
(22, 10, 5, '2017-11-26 02:42:51', '2017-11-26 02:42:51'),
(23, 10, 7, '2017-11-26 02:42:51', '2017-11-26 02:42:51'),
(24, 10, 1, '2017-11-26 02:42:51', '2017-11-26 02:42:51'),
(25, 11, 2, '2017-11-26 02:43:19', '2017-11-26 02:43:19'),
(26, 11, 3, '2017-11-26 02:43:19', '2017-11-26 02:43:19'),
(27, 11, 7, '2017-11-26 02:43:19', '2017-11-26 02:43:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id` int(10) UNSIGNED NOT NULL,
  `genero` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id`, `genero`, `created_at`, `updated_at`) VALUES
(1, 'Femenino', '2017-11-25 21:50:23', '2017-11-25 21:50:23'),
(2, 'Masculino', '2017-11-25 21:50:23', '2017-11-25 21:50:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados_instrucciones`
--

CREATE TABLE `grados_instrucciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `grado_instruccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `grados_instrucciones`
--

INSERT INTO `grados_instrucciones` (`id`, `grado_instruccion`, `created_at`, `updated_at`) VALUES
(1, 'Primaria', '2017-11-29 02:56:17', '2017-11-29 02:56:17'),
(2, 'Secundaria', '2017-11-29 02:56:29', '2017-11-29 02:56:29'),
(3, 'T.S.U.', '2017-11-29 02:57:12', '2017-11-29 02:57:12'),
(4, 'Universitaria', '2017-11-29 02:57:31', '2017-11-29 02:57:31'),
(5, 'Postgrado', '2017-11-29 02:57:38', '2017-11-29 02:57:38'),
(6, 'Estudios de Arte', '2017-11-29 02:58:05', '2017-11-29 02:58:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `icons`
--

CREATE TABLE `icons` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `icons`
--

INSERT INTO `icons` (`id`, `icon`, `name`, `created_at`, `updated_at`) VALUES
(1, '<i class="fa fa-dropbox" aria-hidden="true"></i>', 'dropbox', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(2, '<i class="fa fa-drupal" aria-hidden="true"></i>', 'drupal', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(3, '<i class="fa fa-facebook" aria-hidden="true"></i>', 'facebook', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(4, '<i class="fa fa-facebook-f" aria-hidden="true"></i>', 'facebook-f', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(5, '<i class="fa fa-facebook-official" aria-hidden="true"></i>', 'facebook-official', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(6, '<i class="fa fa-facebook-square" aria-hidden="true"></i>', 'facebook-square', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(7, '<i class="fa fa-foursquare" aria-hidden="true"></i>', 'foursquare', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(8, '<i class="fa fa-google" aria-hidden="true"></i>', 'google', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(9, '<i class="fa fa-google-plus" aria-hidden="true"></i>', 'google-plus', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(10, '<i class="fa fa-google-plus-official" aria-hidden="true"></i>', 'google-plus-official', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(11, '<i class="fa fa-google-plus-square" aria-hidden="true"></i>', 'google-plus-square', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(12, '<i class="fa fa-instagram" aria-hidden="true"></i>', 'instagram', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(13, '<i class="fa fa-linkedin" aria-hidden="true"></i>', 'linkedin', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(14, '<i class="fa fa-linkedin-square" aria-hidden="true"></i>', 'linkedin-square', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(15, '<i class="fa fa-pinterest" aria-hidden="true"></i>', 'pinterest', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(16, '<i class="fa fa-pinterest-p" aria-hidden="true"></i>', 'pinterest-p', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(17, '<i class="fa fa-reddit" aria-hidden="true"></i>', 'reddit', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(18, '<i class="fa fa-reddit-alien" aria-hidden="true"></i>', 'reddit-alien', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(19, '<i class="fa fa-reddit-square" aria-hidden="true"></i>', 'reddit-square', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(20, '<i class="fa fa-skype" aria-hidden="true"></i>', 'skype', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(21, '<i class="fa fa-snapchat" aria-hidden="true"></i>', 'snapchat', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(22, '<i class="fa fa-snapchat-ghost" aria-hidden="true"></i>', 'snapchat-ghost', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(23, '<i class="fa fa-snapchat-square" aria-hidden="true"></i>', 'snapchat-square', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(24, '<i class="fa fa-telegram" aria-hidden="true"></i>', 'telegram', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(25, '<i class="fa fa-tumblr" aria-hidden="true"></i>', 'tumblr', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(26, '<i class="fa fa-tumblr-square" aria-hidden="true"></i>', 'tumblr-square', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(27, '<i class="fa fa-twitter" aria-hidden="true"></i>', 'twitter', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(28, '<i class="fa fa-twitter-square" aria-hidden="true"></i>', 'twitter-square', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(29, '<i class="fa fa-vimeo" aria-hidden="true"></i>', 'vimeo', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(30, '<i class="fa fa-vimeo-square" aria-hidden="true"></i>', 'vimeo-square', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(31, '<i class="fa fa-vine" aria-hidden="true"></i>', 'vine', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(32, '<i class="fa fa-vk" aria-hidden="true"></i>', 'vk', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(33, '<i class="fa fa-whatsapp" aria-hidden="true"></i>', 'whatsapp', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(34, '<i class="fa fa-youtube" aria-hidden="true"></i>', 'youtube', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(35, '<i class="fa fa-youtube-play" aria-hidden="true"></i>', 'youtube-play', '2017-11-25 21:50:29', '2017-11-25 21:50:29'),
(36, '<i class="fa fa-youtube-square" aria-hidden="true"></i>', 'youtube-square', '2017-11-25 21:50:29', '2017-11-25 21:50:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_05_21_173602_CreateStatusTable', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2017_05_21_173823_CreatePerfilesTable', 1),
(5, '2017_05_21_175216_CreatePaisesTable', 1),
(6, '2017_05_21_175516_CreateGenerosTable', 1),
(7, '2017_05_21_180051_CreateArtistasTable', 1),
(8, '2017_05_21_181730_CreateProfesionesTable', 1),
(9, '2017_05_29_172205_CreateDisciplinaTable', 1),
(10, '2017_05_29_184802_CreateIconsTable', 1),
(11, '2017_05_30_182715_CreateRedesSocialesTable', 1),
(12, '2017_07_06_210344_CreateEtiquetasTable', 1),
(13, '2017_08_28_105300_CreateRegistrosEventosTable', 1),
(14, '2017_09_19_145957_CreateTiposMuseos', 1),
(15, '2017_09_25_171519_CreateEstadosTable', 1),
(16, '2017_10_09_140405_CreateCargosTable', 1),
(17, '2017_10_11_133953_CreateMuseosTable', 1),
(18, '2017_10_24_104220_CreateNoticiasTable', 1),
(24, '2017_11_28_200747_CreateEstadoCivilTable', 2),
(25, '2017_11_28_224002_CreateGradosInstruccionesTable', 3),
(26, '2017_11_28_230454_CreateTiposPremiosTable', 4),
(35, '2017_11_28_230500_CreateSolicitudTable', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `museos`
--

CREATE TABLE `museos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_fundacion` date NOT NULL DEFAULT '2000-01-01',
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `historia` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8mb4_unicode_ci,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contacto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitud` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitud` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visitas` int(11) NOT NULL DEFAULT '0',
  `estado_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `portada` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1.jpg',
  `bg_historia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '42.jpg',
  `bg_servicios` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '10.jpg',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `museos`
--

INSERT INTO `museos` (`id`, `nombre`, `fecha_fundacion`, `foto`, `historia`, `direccion`, `telefono`, `correo`, `contacto`, `latitud`, `longitud`, `visitas`, `estado_id`, `status_id`, `portada`, `bg_historia`, `bg_servicios`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Museo de Arte Contemporáneo de Caracas', '1973-06-08', '1/1511648846.JPG', '<p>El 30 de agosto de 1973, el Centro Simón Bolívar creó la Fundación Museo de Arte Contemporáneo de Caracas para conformarla como el espacio cultural del novedoso Complejo Habitacional Parque Central. Inicia su actividad el 20 de febrero de 1974 con dos esculturas del maestro venezolano Jesús Soto y una colección de los reconocidos artistas Adami, Pavlos, Michelangelo Pistoletto, Richard Smith, Marisol Escobar, Giangiacomo Spadari, Emilio Tadini, Lucio del Pezzo y Hervé Télémaque, entre otros. La colección del MAC es una de las más importantes del arte moderno en Latinoamérica, con representación de todas las modalidades plásticas, entre las que destacan obras maestras como La lección de esquí de Joan Miró, Retrato de Dora Maar de Pablo Picasso y El carnaval nocturno de Marc Chagall; además cuenta con obras emblemáticas de artistas venezolanos y extranjeros. El MAC fue el primer museo venezolano en ofrecer un servicio bibliotecario especializado en arte, un espacio de formación plástica formal para niños y adultos, un departamento de educación especial para invidentes y un centro multimedia para las artes.</p>', 'Zona Cultural de Parque Central. Nivel Lecuna. Caracas', '(212) 573-8289', NULL, NULL, '10.4985422', '-66.9009245', 4, 10, 3, '1/1511648896.jpg', '1/1511649027.jpg', '1/1511656324.png', 'museo-de-arte-contemporaneo-de-caracas', '2017-11-25 22:27:26', '2017-11-26 02:47:58'),
(2, 'Museo de Ciencias', '1969-12-31', '2/1511654115.jpg', '<p>El Museo de Ciencias es la primera institución en su tipo constituida en Venezuela hace 140 años, y tiene su origen en el Museo Nacional. El Decreto de Creación del 11 de julio de 1874 establece que en esta cámara de maravillas se congreguen colecciones que sirvan al conocimiento del hombre, del mundo animal, de las rocas y los minerales del país. De allí la aparente heterogeneidad de las colecciones que atesora. Su oficialización institucional ocurriría el 24 de octubre de 1875, siendo el doctor Gustavo Adolfo Ernst (1832-1899) su Fundador y primer Director. Su función principal es promover el conocimiento científico a través de más de 120 mil piezas de: Arqueología, Antropología Física, Etnografía, Paleontología, Herpetología, Ictiología, Teriología, Invertebrados, Ornitología y Mineralogía. Sus espacios son el recinto para diversas actividades científicas y culturales, que incluyen talleres, seminarios y conferencias dirigidos al público en general y la comunidad científica nacional. La sede actual del Museo de Ciencias, diseñada por el arquitecto Carlos Raúl Villanueva, e inaugurada el 24 de julio de 1940, es una edificación de inspiración neoclásica con componentes art déco. La misma fue declarada Monumento Histórico Nacional el 1° de septiembre de 1993, por el Ministerio de Relaciones Interiores y la Junta Nacional Protectora y Conservadora del Patrimonio Histórico y Artístico de la Nación.&nbsp;&nbsp;</p>', 'Plaza de los Museos. Parque Los Caobos. Bellas Artes, Caracas', '(212) 573-4398', NULL, NULL, '10.5000291', '-66.8996329', 1, 10, 3, '2/1511654881.jpg', '2/1511654874.jpg', '2/1511656305.jpg', 'museo-de-ciencias', '2017-11-25 23:55:14', '2017-11-26 00:11:46'),
(3, 'Museo de Bellas Artes de Caracas', '1917-07-24', '3/1511656134.jpg', '<p>La historia del Museo de Bellas Artes se remonta al año 1917, cuando el Presidente de la República (E), Victorino Márquez Bustillos, decreta su creación con secciones de pintura, escultura y arquitectura. Su ubicación inicial fue un espacio en la Universidad Central de Venezuela, entonces contigua al Museo Nacional. Su apertura formal se realiza el 19 de octubre de 1918, exhibiendo obras pertenecientes a la Academia de Bellas Artes. Para 1938, bajo la presidencia del general Eleazar López Contreras, se consolida en la comunidad con la inauguración de su sede propia, un edificio de estilo neoclásico diseñado por el reconocido arquitecto Carlos Raúl Villanueva, situado en el Parque Los Caobos. Allí funcionó hasta el año 1976, cuando le fue asignada una nueva edificación, vertical y de arquitectura brutalista –obra también de Villanueva-, construida en el sector Este del jardín de la anterior edificación. En ese mismo año el inmueble original fue cedido a la Galería de Arte Nacional hasta el año 2008, fecha en la cual el Museo de Bellas Artes recupera sus espacios. Actualmente dispone de 18 salas expositivas en las que se exhiben obras de su colección de distintas épocas y culturas provenientes de América Latina, Norte América y Europa, además de una valiosa compilación de obras sobre papel, en&nbsp; técnicas como dibujo, estampa y fotografía, así como objetos representativos del Arte Egipcio y la Cerámica China.</p>', 'Plaza de los Museos. Parque Los Caobos. Bellas Artes , Caracas', '(212) 578-0275', NULL, NULL, '10.500761', '-66.8989397', 0, 10, 3, '3/1511656340.jpg', '3/1511656346.jpg', '3/1511656356.jpg', 'museo-de-bellas-artes-de-caracas', '2017-11-26 00:28:54', '2017-11-26 00:32:58'),
(4, 'Museo de los Niños', '1982-08-04', '4/1511656921.JPG', '<p style="text-align: justify;"><span style="font-size: 12px;">A principios de 1974 el gran reto era cómo materializar un museo para niños bajo un enfoque participativo y moderno, con la misión de ayudar a la formación y recreación de la infancia mediante la divulgación de la ciencia, la tecnología, el arte y los valores fundamentales de la sociedad; y constituirse en un centro de divulgación científica para los niños de Venezuela.</span></p><p style="text-align: justify;"><span style="font-size: 12px;">El Museo requería de un símbolo para que el público lo identificara; Jorge Blanco ganó un concurso con una propuesta basada en la combinación de dos aspectos: el mundo de la ciencia y los niños. En sus propias palabras: “generalmente, para representar la ciencia se usa el átomo; es el símbolo más usado. Pensé en el arcoiris porque representa la luz, algo básico en el universo. Además, es algo mágico, que fascina a los niños. Busqué una representación que tuviera tanta fuerza como algunos personajes de tiras cómicas con el cual los niños se identificaran. Un niño simpático, curioso y juguetón: Museito. La combinación de Museito jugando con el arcoiris simboliza la oportunidad que se da a los niños de divertirse mientras aprenden.</span></p><p style="text-align: justify;"><span style="font-size: 12px;">Para determinar las áreas del conocimiento y las edades de los niños a quienes se dedicaría el Museo de los Niños de Caracas, se consideraron: la información recogida en los diferentes centros y museos de ciencia visitados en el extranjero; el análisis de los intereses de los niños; las características del niño y el joven venezolano; la necesidad de reforzar los conocimientos adquiridos en la escuela; la carencia de institutos donde el niño pudiera aprender principios científicos mediante el juego; la convicción de que un museo de ciencia y tecnología tiene un papel destacado en la popularización y difusión de los conocimientos indispensables para mejorar la calidad de vida de las generaciones futuras.</span></p><p style="text-align: justify;"><span style="font-size: 12px;">Como resultado, se estableció que las áreas básicas del Museo serían Biología, Comunicación, Ecología y Física presentadas a través de exhibiciones y experiencias dirigidas principalmente a niños entre 6 y 14 años.</span></p><p style="text-align: justify;"><span style="font-size: 12px;">El 5 de agosto de 1982 el Museo de los Niños de Caracas, abrió sus puertas el primer museo para niños de América Latina, en su actual sede en el Complejo Parque Central en el centro de la ciudad.</span></p><p style="text-align: justify;"><span style="font-size: 12px;">Años más tarde, ante el auge de los conocimientos espaciales se tomaron la decisión de hacer una exposición permanente sobre los temas de la exploración espacial y los avances de la astronomía y astronáutica.</span></p><p style="text-align: justify;"><span style="font-size: 12px;">En 1987 la Fundación inicia conversaciones con la National Aeronautics and Space Administration (NASA) y otras instituciones estadounidenses para hacer una rigurosa investigación y determinar lo que se presentaría al público.</span></p><p style="text-align: justify;"><span style="font-size: 12px;">El resultado condujo a que el 12 de octubre de 1993, se abriera al público un nuevo edificio que aumentaba la capacidad de visitantes, conectado al otro ya existente.</span></p><p style="text-align: justify;"><span style="font-size: 12px;">En el año 2002 se inauguró la exposición en “La emoción de vivir... Sin drogas” con el objetivo de lograr que los visitantes se acerquen al tema de las drogas y puedan comprender la necesidad de rechazarlas para evitar daños irreversibles que limitan su capacidad para desarrollarse como individuos y como miembros de la sociedad.</span></p><p style="text-align: justify;"><span style="font-size: 12px;">En el año 2004 se montó una exposición para preescolares denominada “Una gran caja de colores” que ha venido a llenar el vacío que existía en el Museo para iniciar a los niños menores de seis años en la exploración y el descubrimiento científico.</span></p>', 'Parque Central, Nivel Bolívar frente al Paseo Vargas, La Candelaria, Caracas', '(212) 575-0695', 'reservaciones@maravillosarealidad.com', NULL, '10.4993585', '-66.9048121', 5, 10, 3, '4/1511657013.JPG', '4/1511657185.jpg', '4/1511657191.JPG', 'museo-de-los-ninos', '2017-11-26 00:42:01', '2017-11-26 13:52:47'),
(5, 'Galería de Arte Nacional', '1974-10-01', '5/1511658469.jpg', '<p>Creada en 1974, la Galería de Arte Nacional abrió sus puertas el 6 de abril de 1976. Su sede definitiva fue diseñada por el arquitecto Carlos Gómez de Llarena. La GAN es el museo de mayor dimensión construido en Venezuela y uno de los mayores de Latinoamérica. En los espacios de la GAN se salvaguarda el patrimonio plástico nacional, a través de la investigación, conservación, difusión y promoción de las artes visuales de Venezuela.&nbsp; En una nueva edificación creada hace 5 años, se atesora una colección cercana a siete mil obras de diversos autores, géneros y tendencias que incluyen pintura, dibujo, estampa, fotografía, escultura, instalación, video-instalación, cerámica y textil, hitos representativos de nuestra producción artística de más de cuatro siglos. La labor educativa de la GAN&nbsp; promueve y apoya el contacto del visitante con la obra de arte. Dentro de sus instalaciones funciona Centro Nacional de Conservación y Restauración Patrimonial (CENCREP) y el Centro de Información y Documentación Nacional de las Artes Plásticas (CINAP).</p>', 'Avenida México, entre las estaciones Bellas Artes y Parque Carabobo del Metro de Caracas, frente a Puente Brión, La Candelaria, Caracas.', '(212) 576-8707', NULL, NULL, '10.5013898', '-66.904478', 0, 10, 3, '5/1511658483.jpg', '5/1511658488.jpg', '5/1511658539.jpg', 'galeria-de-arte-nacional', '2017-11-26 01:07:49', '2017-11-26 01:09:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `museo_directivo`
--

CREATE TABLE `museo_directivo` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `museo_id` int(10) UNSIGNED NOT NULL,
  `cargo_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `museo_directivo`
--

INSERT INTO `museo_directivo` (`id`, `nombre`, `foto`, `museo_id`, `cargo_id`, `created_at`, `updated_at`) VALUES
(1, 'Daniel Briceño', 'default.jpg', 1, 1, '2017-11-25 23:32:39', '2017-11-25 23:32:39'),
(2, 'José Ignacio Herrera', 'default.jpg', 2, 1, '2017-11-25 23:59:37', '2017-11-25 23:59:37'),
(3, 'Irene Guillén', 'default.jpg', 3, 1, '2017-11-26 00:33:37', '2017-11-26 00:33:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `museo_imagen`
--

CREATE TABLE `museo_imagen` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagen` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reseña` text COLLATE utf8mb4_unicode_ci,
  `visitas` int(11) NOT NULL DEFAULT '0',
  `museo_id` int(10) UNSIGNED NOT NULL,
  `artista_id` int(10) UNSIGNED DEFAULT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `museo_imagen`
--

INSERT INTO `museo_imagen` (`id`, `imagen`, `titulo`, `reseña`, `visitas`, `museo_id`, `artista_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, '1/1511653017.jpg', 'El Pensador', 'Es una de las esculturas más famosas de Auguste Rodin. El escultor concibió esta pieza entre 1881 y 1882 para decorar el tímpano del conjunto escultórico La Puerta del Infierno, encargado en 1880 por el Ministerio de Instrucción Pública y Bellas Artes de Francia. Esto serviría como entrada para el que sería el Museo de Artes Decorativas de París, aunque el proyecto no se concluyó.', 3, 1, 1, 3, '2017-11-25 23:36:57', '2017-11-26 00:11:31'),
(2, '1/1511653139.jpg', 'La acción encadenada', 'La obra es una escultura en bronce. Representa a una mujer desnuda de pie, con las manos atadas a la espalda.\r\n\r\nA Maillol se le encarga el monumento al político socialista Louis Auguste Blanqui, proyecto detenido durante largos años. Maillol acepta la insignificante cantidad de que disponía Clemenceau, uno de los organizadores, y realiza, casi gratis, la acción encadenada, erigida en la plaza de Puget-Théniers. El cura de la localidad se niega a decir misa mientras no sea retirada la escultura.', 2, 1, 4, 3, '2017-11-25 23:38:59', '2017-11-26 00:11:42'),
(3, '1/1511653278.jpg', 'Kochel', NULL, 2, 1, 6, 3, '2017-11-25 23:41:18', '2017-11-25 23:46:01'),
(4, '1/1511653323.jpg', 'Las Pirámides a Port-Coton', NULL, 3, 1, 2, 3, '2017-11-25 23:42:03', '2017-11-26 00:11:54'),
(5, '1/1511653355.jpg', 'Composición dentro del cuadrado con rojo, amarillo y azul', NULL, 3, 1, 16, 3, '2017-11-25 23:42:35', '2017-11-26 00:12:59'),
(6, '2/1511654779.jpg', 'Animales', NULL, 4, 2, NULL, 3, '2017-11-26 00:06:19', '2017-11-26 00:10:19'),
(7, '2/1511654804.jpg', 'Pasillo 5', NULL, 0, 2, NULL, 3, '2017-11-26 00:06:44', '2017-11-26 00:06:44'),
(8, '2/1511654819.jpg', 'Historia Natural', NULL, 2, 2, NULL, 3, '2017-11-26 00:06:59', '2017-11-26 00:11:45'),
(9, '2/1511654833.jpg', 'Jaguar', NULL, 0, 2, NULL, 3, '2017-11-26 00:07:13', '2017-11-26 00:07:13'),
(10, '2/1511654845.jpg', 'Esqueletos', NULL, 0, 2, NULL, 3, '2017-11-26 00:07:25', '2017-11-26 00:07:25'),
(11, '3/1511656474.jpg', 'Elemosina di san Lorenzo', NULL, 0, 3, 19, 3, '2017-11-26 00:34:34', '2017-11-26 00:34:34'),
(12, '3/1511656497.png', 'El Puente de Doña Romualda', NULL, 0, 3, 20, 3, '2017-11-26 00:34:57', '2017-11-26 00:34:57'),
(13, '3/1511656520.jpg', 'Bañistas desnudos', NULL, 0, 3, 21, 3, '2017-11-26 00:35:20', '2017-11-26 00:35:20'),
(14, '3/1511656539.JPG', 'Mural de Bruselas', NULL, 0, 3, 7, 3, '2017-11-26 00:35:39', '2017-11-26 00:35:39'),
(15, '3/1511656556.jpg', 'Reticulárea', NULL, 0, 3, 22, 3, '2017-11-26 00:35:56', '2017-11-26 00:35:56'),
(16, '3/1511656575.JPG', 'La ciudad', NULL, 0, 3, 14, 3, '2017-11-26 00:36:15', '2017-11-26 00:36:15'),
(17, '4/1511657201.jpg', 'Nave', NULL, 0, 4, NULL, 3, '2017-11-26 00:46:41', '2017-11-26 00:46:41'),
(18, '4/1511657212.jpg', 'Astronautas', NULL, 1, 4, NULL, 3, '2017-11-26 00:46:52', '2017-11-26 13:53:15'),
(19, '4/1511657226.jpg', 'Planetario', NULL, 0, 4, NULL, 3, '2017-11-26 00:47:06', '2017-11-26 00:47:06'),
(20, '4/1511657241.jpg', 'Transbordador', NULL, 0, 4, NULL, 3, '2017-11-26 00:47:21', '2017-11-26 00:47:21'),
(21, '5/1511658635.jpg', 'Paisaje tropical con casas rurales y palmeras', NULL, 0, 5, 20, 3, '2017-11-26 01:10:35', '2017-11-26 01:10:35'),
(22, '5/1511658669.jpg', 'Boceto para la Firma del Acta de Independencia', NULL, 0, 5, 24, 3, '2017-11-26 01:11:09', '2017-11-26 01:11:09'),
(23, '5/1511658701.JPG', 'En el Orinoco', NULL, 0, 5, 23, 3, '2017-11-26 01:11:41', '2017-11-26 01:11:41'),
(24, '5/1511658721.JPG', 'Autorretrato con sombrero rojo', NULL, 0, 5, 25, 3, '2017-11-26 01:12:01', '2017-11-26 01:12:01'),
(25, '5/1511658919.jpg', 'Ricaurte en San Mateo', NULL, 0, 5, 26, 3, '2017-11-26 01:15:19', '2017-11-26 01:15:19'),
(26, '5/1511658945.jpg', 'Charlotte Corday', NULL, 0, 5, 27, 3, '2017-11-26 01:15:45', '2017-11-26 01:15:45'),
(27, '5/1511658968.JPG', 'Paisaje con puente', NULL, 0, 5, 28, 3, '2017-11-26 01:16:08', '2017-11-26 01:16:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `museo_servicio`
--

CREATE TABLE `museo_servicio` (
  `id` int(10) UNSIGNED NOT NULL,
  `servicio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `museo_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `museo_servicio`
--

INSERT INTO `museo_servicio` (`id`, `servicio`, `descripcion`, `museo_id`, `created_at`, `updated_at`) VALUES
(1, 'Horario', 'Martes a viernes: 9:00 am a 5:00 pm Sábados, domingos y feriados: 10:00 am a 5:00 pm', 1, '2017-11-25 23:33:42', '2017-11-25 23:33:42'),
(2, 'Horario', 'Martes a viernes 9:00 am a 5:00 pm Sábados, domingos y feriados 10:00 am a 5:00 pm', 2, '2017-11-26 00:01:44', '2017-11-26 00:01:44'),
(3, 'Horario', 'Martes a viernes 9:00 am a 5:00 pm Sábados, domingos y feriados 10:00 am a 5:00 pm', 3, '2017-11-26 00:33:18', '2017-11-26 00:33:18'),
(4, 'Horario', 'Lunes a Viernes de 09:00 a 17:00 Sábados, Domingos y Feriados de 10:00 a 17:00', 4, '2017-11-26 00:44:11', '2017-11-26 00:44:11'),
(5, 'Horario', 'Martes a viernes 9:00 am a 5:00 pm Sábados, domingos y feriados 10:00 am a 5:00 pm', 5, '2017-11-26 01:08:54', '2017-11-26 01:08:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `museo_tipo_museo`
--

CREATE TABLE `museo_tipo_museo` (
  `id` int(10) UNSIGNED NOT NULL,
  `museo_id` int(10) UNSIGNED NOT NULL,
  `tipo_museo_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `museo_tipo_museo`
--

INSERT INTO `museo_tipo_museo` (`id`, `museo_id`, `tipo_museo_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-11-25 22:27:26', '2017-11-25 22:27:26'),
(2, 1, 2, '2017-11-25 22:27:26', '2017-11-25 22:27:26'),
(3, 2, 3, '2017-11-25 23:55:15', '2017-11-25 23:55:15'),
(4, 2, 5, '2017-11-25 23:55:15', '2017-11-25 23:55:15'),
(5, 2, 4, '2017-11-25 23:55:15', '2017-11-25 23:55:15'),
(6, 3, 7, '2017-11-26 00:28:54', '2017-11-26 00:28:54'),
(7, 3, 6, '2017-11-26 00:28:54', '2017-11-26 00:28:54'),
(8, 4, 8, '2017-11-26 00:42:01', '2017-11-26 00:42:01'),
(9, 4, 3, '2017-11-26 00:42:02', '2017-11-26 00:42:02'),
(10, 4, 4, '2017-11-26 00:42:02', '2017-11-26 00:42:02'),
(11, 5, 6, '2017-11-26 01:07:50', '2017-11-26 01:07:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `museo_user`
--

CREATE TABLE `museo_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `museo_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `museo_user`
--

INSERT INTO `museo_user` (`id`, `museo_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-11-25 22:27:26', '2017-11-25 22:27:26'),
(2, 2, 1, '2017-11-25 23:55:15', '2017-11-25 23:55:15'),
(3, 3, 1, '2017-11-26 00:28:54', '2017-11-26 00:28:54'),
(4, 4, 1, '2017-11-26 00:42:01', '2017-11-26 00:42:01'),
(5, 5, 1, '2017-11-26 01:07:49', '2017-11-26 01:07:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `contenido` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `visitas` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `imagen`, `contenido`, `usuario_id`, `status_id`, `visitas`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '1/1511663916.jpg', '<p><span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: 400; text-align: justify;">Vestibulum vulputate metus tellus, at eleifend arcu faucibus vel. Duis aliquam dolor elit, vulputate euismod dolor malesuada quis. Sed eu odio ut elit bibendum feugiat. Morbi aliquam pretium eros, vitae hendrerit mi sagittis non. Suspendisse ultricies purus non vehicula egestas. Fusce lacus orci, euismod ut tempor vel, tincidunt eget mi. Quisque posuere et mi ac lobortis. Vestibulum sit amet iaculis eros, et tincidunt tortor. Vivamus finibus risus elit, ac ultricies lectus ullamcorper et. Praesent rhoncus ante a orci pellentesque, id maximus eros ultricies. Integer id magna pharetra, sodales quam sit amet, feugiat mauris. Etiam sed leo eros. Etiam eget aliquet arcu, ut ullamcorper dolor. Nullam faucibus vestibulum mi vitae viverra. Proin interdum pretium metus, iaculis commodo ligula ornare ac. Nunc id consequat urna.</span></p>', 1, 8, 0, 'lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit', '2017-11-26 02:38:36', '2017-11-26 02:38:36'),
(2, 'Nullam sem orci, finibus ac purus eu, fringilla laoreet orci.', '2/1511663936.jpg', '<p style="margin-bottom: 15px; padding-bottom: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: 400;">Quisque convallis purus nec elit ultrices consectetur. Sed sit amet sodales ligula. Morbi nec quam id risus ultrices venenatis. Aliquam vitae enim dui. Nulla mollis ex eget sem fermentum interdum. In posuere hendrerit velit vel volutpat. Nulla lectus turpis, interdum sit amet vehicula non, fringilla sit amet metus.</p><p style="margin-bottom: 15px; padding-bottom: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: 400;">Phasellus scelerisque erat quam, eget tempus justo scelerisque nec. Duis ut mattis erat. Praesent at eros at massa faucibus dapibus. Integer maximus interdum tristique. Maecenas eget mattis nibh, sit amet vulputate nibh. Praesent bibendum at nunc at sollicitudin. Praesent eu fermentum velit, ac tempor nisl. Etiam egestas mi id nibh vulputate, ut ultricies tellus congue.</p>', 1, 8, 0, 'nullam-sem-orci-finibus-ac-purus-eu-fringilla-laoreet-orci', '2017-11-26 02:38:56', '2017-11-26 02:38:56'),
(3, 'Praesent posuere magna dapibus nisl luctus,', '3/1511663965.jpg', '<p style="margin-bottom: 15px; padding-bottom: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: 400;">Quisque vel pellentesque dolor. In ut urna orci. Sed ut nisl a ex varius eleifend. Praesent in dapibus arcu. Nulla sodales facilisis ante ut aliquam. Proin ut scelerisque augue. Maecenas scelerisque lectus justo, eu finibus leo porttitor in. Donec varius efficitur felis ac blandit. Vestibulum augue nisl, vestibulum sed placerat in, faucibus imperdiet nibh. Nulla eleifend felis pharetra venenatis euismod.</p><p style="margin-bottom: 15px; padding-bottom: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: 400;">Nullam dictum, enim nec efficitur mollis, nulla purus aliquet massa, nec aliquet justo lacus eu velit. Quisque convallis ornare massa, vitae maximus risus commodo quis. In at ex pharetra, volutpat tellus sit amet, pretium nulla. In at mattis odio. Mauris vitae neque vitae sapien tempor congue. Integer eget viverra tellus. Quisque quis risus tortor. Etiam tincidunt ultricies nisi eu bibendum. Cras sit amet magna volutpat, egestas eros at, tristique quam.</p>', 1, 8, 0, 'praesent-posuere-magna-dapibus-nisl-luctus', '2017-11-26 02:39:25', '2017-11-26 02:39:25'),
(4, 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', '4/1511663991.jpg', '<p style="margin-bottom: 15px; padding-bottom: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: 400;">Duis aliquam elit sed libero finibus feugiat. In vel risus id velit fringilla consectetur a in sem. Quisque interdum in libero et condimentum. Quisque varius hendrerit mi, in fermentum neque sodales eget. Sed velit erat, aliquam ut mi id, ultricies vulputate enim. Pellentesque eu purus lectus. Vivamus dignissim sollicitudin neque quis interdum. Phasellus lobortis molestie dignissim. Duis vestibulum tellus a tellus pulvinar facilisis. Integer finibus molestie magna at vestibulum. Fusce pulvinar lacus id odio euismod consequat. Etiam sed orci feugiat, auctor ipsum vel, consectetur lorem. In mattis elit vitae massa consequat sollicitudin.</p><p style="margin-bottom: 15px; padding-bottom: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: 400;">Praesent nec pulvinar ipsum, sit amet pellentesque neque. Mauris non nulla sed felis iaculis tempor et eget augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur sit amet dapibus neque, in maximus diam. Fusce magna metus, semper et augue at, commodo ultricies nulla. Sed bibendum velit a cursus vehicula. Phasellus id pharetra sapien. Donec eget commodo felis. Donec ullamcorper tempor odio, nec sagittis nisi egestas quis. Ut pretium eleifend mi, dapibus bibendum metus blandit nec. Vivamus ultrices turpis velit, vel aliquam nisi lacinia at. Mauris in magna eget dolor ultrices venenatis. Ut elementum, mi vitae aliquet euismod, tellus erat pharetra arcu, sit amet tempus arcu sem in erat. Integer non lacus eu ipsum mattis porttitor. Duis tristique laoreet ultrices.</p>', 1, 8, 0, 'pellentesque-habitant-morbi-tristique-senectus-et-netus-et-malesuada-fames-ac-turpis-egestas', '2017-11-26 02:39:51', '2017-11-26 02:39:51'),
(5, 'Donec dictum ante ut lorem facilisis tempus.', '5/1511664016.jpg', '<p style="margin-bottom: 15px; padding-bottom: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: 400;">Donec dapibus tempor justo, sed condimentum nunc viverra vitae. Pellentesque dignissim at odio id euismod. Mauris tempor laoreet mollis. Morbi condimentum quam in ligula fringilla, in pellentesque tellus lacinia. Maecenas iaculis ex ut tortor hendrerit sagittis. In in quam orci. Praesent vitae dapibus sem. Ut et dolor id leo laoreet mattis. Proin condimentum dictum congue. Donec placerat vitae neque id consequat. Donec magna purus, tristique ac tortor a, facilisis auctor purus. Pellentesque leo eros, imperdiet et sapien eget, elementum varius enim.</p><p style="margin-bottom: 15px; padding-bottom: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: 400;">Donec eget diam in nunc scelerisque auctor vitae vitae sem. Nulla vitae tristique mi, id aliquet lectus. Etiam blandit mi vitae magna porta laoreet. Cras risus neque, hendrerit mollis risus at, ornare suscipit ante. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis quis lorem eu felis posuere mattis. Quisque sit amet sapien convallis, sagittis enim eget, vulputate sapien. Praesent dignissim ex velit. Proin luctus a orci sed maximus. Quisque euismod molestie nunc, at volutpat&nbsp;</p>', 1, 8, 0, 'donec-dictum-ante-ut-lorem-facilisis-tempus', '2017-11-26 02:40:16', '2017-11-26 02:40:16'),
(6, 'In porttitor leo id laoreet ornare.', '6/1511664045.jpg', '<p style="margin-bottom: 15px; padding-bottom: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: 400;">Proin lectus urna, sollicitudin vel laoreet et, sollicitudin a sem. Sed ut nunc hendrerit tellus pellentesque vehicula quis quis augue. Suspendisse sodales posuere vehicula. Cras aliquam tempor placerat. Donec eget eros et ligula sollicitudin facilisis. Etiam mauris neque, lacinia id aliquam nec, sollicitudin mattis ipsum. Nam consectetur eget eros posuere venenatis. Donec ullamcorper suscipit dictum. Nulla aliquam sagittis lectus id fringilla. Sed risus ipsum, commodo at urna quis, rutrum faucibus nisl. Maecenas facilisis dignissim purus, a pretium elit venenatis a. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla elit neque, euismod vel ante tempor, hendrerit interdum erat.</p><p style="margin-bottom: 15px; padding-bottom: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: 400;">Quisque iaculis nec justo ut egestas. Nullam a quam et quam condimentum dapibus eu et leo. Curabitur euismod luctus elit sed mattis. Vestibulum vel dictum velit. Sed lobortis dui vitae lorem ultrices volutpat. Donec pretium leo odio, in maximus arcu imperdiet quis. Mauris hendrerit risus magna, eu imperdiet turpis rhoncus quis. Quisq</p>', 1, 8, 0, 'in-porttitor-leo-id-laoreet-ornare', '2017-11-26 02:40:45', '2017-11-26 02:40:45'),
(7, 'Nulla sodales, eros lacinia egestas rutrum, turpis felis interdum orci, nec vehicula ligula lorem ac leo.', '7/1511664076.jpg', '<p style="margin-bottom: 15px; padding-bottom: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: 400;">Morbi et metus non lectus bibendum finibus. Maecenas eleifend ipsum sit amet ex sodales, ac elementum nulla dictum. Nam leo libero, facilisis et fringilla et, accumsan vitae est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In in suscipit sapien. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque aliquet eget odio sed rutrum. Aenean justo tortor, hendrerit eu tincidunt ac, commodo a risus. Sed eros enim, ornare et eros sed, cursus aliquet augue. Ut ultricies vestibulum maximus. Suspendisse feugiat leo non sem dapibus, eget sagittis ipsum congue. Cras porttitor nibh odio, sed convallis erat ultricies accumsan. Maecenas maximus dui id ante maximus, ac rutrum nibh sollicitudin. Integer id molestie erat. Aenean ac massa felis.</p><p style="margin-bottom: 15px; padding-bottom: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: 400;">Donec dapibus justo a hendrerit tristique. In hac habitasse platea dictumst. Nunc commodo sem at metus vestibulum, quis ultrices leo euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam cursus ornare ex, quis sagittis lectus elementum eu. Mauris condimentum auctor nunc a egestas. Vivamus ultricies augue et ex faucibus consequat. Cras congue mi sit amet lacinia ultrices. Morbi fringilla augue sit amet rutrum aliquet. Quisque luctus venenatis egestas. Nam vitae tellus ac turpis lacinia accumsan.</p>', 1, 8, 0, 'nulla-sodales-eros-lacinia-egestas-rutrum-turpis-felis-interdum-orci-nec-vehicula-ligula-lorem-ac-leo', '2017-11-26 02:41:16', '2017-11-26 02:41:16'),
(8, 'Donec molestie ligula at nunc cursus condimentum.', '8/1511664108.jpg', '<p style="margin-bottom: 15px; padding-bottom: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: 400;">Pellentesque bibendum ante porttitor, accumsan elit vitae, interdum massa. Cras pharetra malesuada venenatis. Fusce sapien nisl, pretium non massa sit amet, tempus laoreet orci. Cras ac ligula diam. Praesent nunc urna, dictum id diam bibendum, vulputate rhoncus nisi. Suspendisse at nunc turpis. Nulla eget feugiat elit, eu aliquam est. In pulvinar fringilla lorem ac rhoncus. Proin quam lacus, aliquet eget ante quis, convallis scelerisque sapien.</p><p style="margin-bottom: 15px; padding-bottom: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: 400;">Nunc hendrerit tristique tellus ut eleifend. Sed mollis venenatis urna. Etiam accumsan mi rhoncus augue porta, vitae malesuada nisi finibus. Vestibulum iaculis vehicula lacinia. Sed et augue ligula. Mauris id ultrices turpis, eget eleifend quam. Cras vehicula tellus arcu, in posuere urna fermentum eget. Suspendisse posuere felis at justo condimentum, vitae mollis mi aliquet. Aliquam varius est turpis, non luctus purus lacinia in. Curabitur scelerisque tellus in quam tincidunt, laoreet mollis ligula laoreet.</p>', 1, 8, 0, 'donec-molestie-ligula-at-nunc-cursus-condimentum', '2017-11-26 02:41:48', '2017-11-26 02:41:48'),
(9, 'ed blandit, ligula ac ullamcorper imperdiet, justo risus pharetra erat,', '9/1511664138.jpg', '<p style="margin-bottom: 15px; padding-bottom: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: 400;">Nunc eu mauris eget massa rhoncus scelerisque. Vestibulum faucibus, erat vitae tempus tempor, arcu nulla fermentum turpis, sit amet elementum nunc nisi nec nulla. Aliquam imperdiet magna in magna commodo semper quis non dolor. Donec venenatis sed dui eget suscipit. Nullam id augue eu leo mollis venenatis. Suspendisse aliquet nibh nec lacus volutpat, gravida lobortis augue faucibus. Duis et nulla nisl.</p><p style="margin-bottom: 15px; padding-bottom: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: 400;">Nulla nisi risus, posuere vitae aliquet vitae, consectetur eu metus. Mauris tortor eros, auctor ac aliquet quis, pretium non odio. Nullam vel eros volutpat, tincidunt erat eget, viverra ante. Duis vitae elit eu tellus ultricies pharetra sed non tellus. Pellentesque blandit ante et lacinia sagittis. Curabitur rutrum, lectus feugiat dignissim faucibus, felis augue dictum turpis, ac suscipit diam orci quis nibh. Fusce nec diam non nisl rutrum laoreet eget id nulla. Nulla eu maximus ipsum, in auctor ante. Ut fringilla velit a suscipit blandit. Nulla consequat sem at nibh suscipit, at lacinia nunc mattis.</p>', 1, 8, 0, 'ed-blandit-ligula-ac-ullamcorper-imperdiet-justo-risus-pharetra-erat', '2017-11-26 02:42:18', '2017-11-26 02:42:18'),
(10, 'Vestibulum eros urna, tristique quis orci quis, dignissim tristique quam.', '10/1511664171.jpg', '<p style="margin-bottom: 15px; padding-bottom: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: 400;">Nam sem enim, ultricies a venenatis a, dapibus nec leo. Morbi maximus tortor pellentesque, volutpat ipsum quis, iaculis orci. Nullam et massa et metus mattis dapibus nec non eros. Integer laoreet ornare metus, ultrices rhoncus elit lobortis quis. Quisque blandit odio lacus, eget fermentum metus sollicitudin et. Pellentesque scelerisque nunc non odio commodo, nec aliquam nisl gravida. Pellentesque tempor felis enim, sed consequat arcu pretium sed. Sed vel urna lobortis, dignissim erat ut, commodo erat. Aenean sed augue nec quam gravida lacinia a eget arcu.</p><p style="margin-bottom: 15px; padding-bottom: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: 400;">Aenean volutpat posuere enim et semper. Mauris ac urna ornare, accumsan justo sit amet, condimentum dui. Etiam tortor sem, placerat vel ex tincidunt, elementum mollis risus. Nulla facilisi. Cras non arcu nec justo lacinia sagittis id at massa. Etiam tristique nisl faucibus, placerat odio quis, tristique lacus. Vestibulum varius dolor bibendum consequat fringilla. Nullam pellentesque, lorem ac egestas pretium, nibh eros pharetra mauris, nec dignissim nunc libero sed ligula. Phasellus non sapien in purus porta sollicitudin. Quisque feugiat, enim ut consequat faucibus, nulla arcu scelerisque nisl, vitae sollicitudin quam felis a sem. Duis lectus odio, dictum vel felis et, accumsan auctor diam. Suspendisse libero lacus, eleifend vel tincidunt id, aliquam non nulla. Vestibulum ac diam iaculis, luctus urna vel, mole</p>', 1, 8, 1, 'vestibulum-eros-urna-tristique-quis-orci-quis-dignissim-tristique-quam', '2017-11-26 02:42:51', '2017-11-30 16:20:24'),
(11, 'Ut in est vel lectus lacinia vehicula in non metus.', '11/1511664199.jpg', '<p style="margin-bottom: 15px; padding-bottom: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: 400;">Cras lobortis mi eget nisl cursus placerat. Suspendisse potenti. Nam finibus tortor orci, at sagittis erat interdum non. Mauris auctor iaculis lorem, eu pellentesque mauris molestie at. In iaculis massa a leo aliquam gravida. Cras nibh magna, bibendum rutrum pharetra id, dignissim non est. Fusce viverra diam nisi, vel lacinia sapien molestie in. Nullam et mi nec lacus laoreet tincidunt ut aliquam felis. Ut quis vehicula ex. Praesent ut nisi tempor, sagittis dolor ac, feugiat nisl. Donec a massa lorem.</p><p style="margin-bottom: 15px; padding-bottom: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: 400;">Sed consectetur dapibus dui. Sed massa elit, sagittis ut ultricies ut, ullamcorper sed nunc. In hac habitasse platea dictumst. Nullam eget eros vitae arcu pulvinar tristique in non turpis. Phasellus laoreet magna et augue maximus dignissim. Etiam sed tortor facilisis, blandit ex non, tempus sapien. Nullam sit amet velit in libero cursus euismod. Nunc sagittis libero in volutpat congue.</p><p style="margin-bottom: 15px; padding-bottom: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: 400;">Ut sit amet ex felis. Aenean sit amet fermentum nisi. Maecenas et erat eu mauris aliquet sagittis sit amet a nunc. Cras consectetur nisi augue, sed lobortis massa laoreet at. Quisque accumsan molestie nulla. Duis ut tortor posuere, rhoncus purus id, tincidunt nunc. Vivamus vel orci vel augue mollis sodales. Vestib</p>', 1, 8, 0, 'ut-in-est-vel-lectus-lacinia-vehicula-in-non-metus', '2017-11-26 02:43:19', '2017-11-26 02:43:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id` int(10) UNSIGNED NOT NULL,
  `pais` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `pais`, `created_at`, `updated_at`) VALUES
(1, 'Afganistán', '2017-11-25 21:50:23', '2017-11-25 21:50:23'),
(2, 'Albania', '2017-11-25 21:50:23', '2017-11-25 21:50:23'),
(3, 'Alemania', '2017-11-25 21:50:23', '2017-11-25 21:50:23'),
(4, 'Andorra', '2017-11-25 21:50:23', '2017-11-25 21:50:23'),
(5, 'Angola', '2017-11-25 21:50:23', '2017-11-25 21:50:23'),
(6, 'Antigua y Barbuda', '2017-11-25 21:50:23', '2017-11-25 21:50:23'),
(7, 'Arabia Saudita', '2017-11-25 21:50:23', '2017-11-25 21:50:23'),
(8, 'Argelia', '2017-11-25 21:50:23', '2017-11-25 21:50:23'),
(9, 'Argentina', '2017-11-25 21:50:23', '2017-11-25 21:50:23'),
(10, 'Armenia', '2017-11-25 21:50:23', '2017-11-25 21:50:23'),
(11, 'Australia', '2017-11-25 21:50:23', '2017-11-25 21:50:23'),
(12, 'Austria', '2017-11-25 21:50:23', '2017-11-25 21:50:23'),
(13, 'Azerbaiyán', '2017-11-25 21:50:23', '2017-11-25 21:50:23'),
(14, 'Bahamas', '2017-11-25 21:50:23', '2017-11-25 21:50:23'),
(15, 'Bahrein', '2017-11-25 21:50:23', '2017-11-25 21:50:23'),
(16, 'Bangladesh', '2017-11-25 21:50:23', '2017-11-25 21:50:23'),
(17, 'Barbados', '2017-11-25 21:50:23', '2017-11-25 21:50:23'),
(18, 'Bélgica', '2017-11-25 21:50:23', '2017-11-25 21:50:23'),
(19, 'Belice', '2017-11-25 21:50:23', '2017-11-25 21:50:23'),
(20, 'Bielorrusia', '2017-11-25 21:50:23', '2017-11-25 21:50:23'),
(21, 'Benín', '2017-11-25 21:50:23', '2017-11-25 21:50:23'),
(22, 'Birmania', '2017-11-25 21:50:23', '2017-11-25 21:50:23'),
(23, 'Bolivia', '2017-11-25 21:50:23', '2017-11-25 21:50:23'),
(24, 'Bosnia', '2017-11-25 21:50:23', '2017-11-25 21:50:23'),
(25, 'Botsuana', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(26, 'Brasil', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(27, 'Brunéi', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(28, 'Bulgaria', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(29, 'Burkina Faso', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(30, 'Burundi', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(31, 'Bután', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(32, 'Cabo Verde', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(33, 'Camboya', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(34, 'Camerún', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(35, 'Canadá', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(36, 'Catar', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(37, 'República Centroafricana', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(38, 'Chad', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(39, 'República Checa', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(40, 'Chile', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(41, 'China', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(42, 'Chipre', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(43, 'Colombia', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(44, 'Comoras', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(45, 'República del Congo', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(46, 'República Democrática del Congo', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(47, 'Corea del Norte', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(48, 'Corea del Sur', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(49, 'Costa de Marfil', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(50, 'Costa Rica', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(51, 'Croacia', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(52, 'Cuba', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(53, 'Dinamarca', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(54, 'Dominica', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(55, 'República Dominicana', '2017-11-25 21:50:24', '2017-11-25 21:50:24'),
(56, 'Ecuador', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(57, 'Egipto', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(58, 'El Salvador', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(59, 'Emiratos Árabes Unidos', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(60, 'Eritrea', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(61, 'Eslovaquia', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(62, 'Eslovenia', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(63, 'España', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(64, 'Estados Unidos', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(65, 'Estonia', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(66, 'Etiopía', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(67, 'Filipinas', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(68, 'Finlandia', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(69, 'Fiyi', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(70, 'Francia', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(71, 'Gabón', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(72, 'Gambia', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(73, 'Georgia', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(74, 'Ghana', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(75, 'Granada', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(76, 'Grecia', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(77, 'Guatemala', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(78, 'Guinea', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(79, 'Guinea-Bisáu', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(80, 'Guinea Ecuatorial', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(81, 'Guyana', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(82, 'Haití', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(83, 'Honduras', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(84, 'Hungría', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(85, 'India', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(86, 'Indonesia', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(87, 'Irak', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(88, 'Irán', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(89, 'Irlanda', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(90, 'Islandia', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(91, 'Israel', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(92, 'Italia', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(93, 'Jamaica', '2017-11-25 21:50:25', '2017-11-25 21:50:25'),
(94, 'Japón', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(95, 'Jordania', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(96, 'Kazajistán', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(97, 'Kenia', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(98, 'Kirguistán', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(99, 'Kiribati', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(100, 'Kuwait', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(101, 'Laos', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(102, 'Lesoto', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(103, 'Letonia', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(104, 'Líbano', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(105, 'Liberia', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(106, 'Libia', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(107, 'Liechtenstein', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(108, 'Lituania', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(109, 'Luxemburgo', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(110, 'Macedonia ', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(111, 'Madagascar', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(112, 'Malasia', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(113, 'Malaui', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(114, 'Maldivas', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(115, 'Malí', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(116, 'Malta', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(117, 'Marruecos', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(118, 'Islas Marshall', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(119, 'Mauricio', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(120, 'Mauritania', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(121, 'México', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(122, 'Micronesia', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(123, 'Moldavia', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(124, 'Mónaco', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(125, 'Mongolia', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(126, 'Montenegro', '2017-11-25 21:50:26', '2017-11-25 21:50:26'),
(127, 'Mozambique', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(128, 'Namibia', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(129, 'Nauru', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(130, 'Nepal', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(131, 'Nicaragua', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(132, 'Níger', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(133, 'Nigeria', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(134, 'Noruega', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(135, 'Nueva Zelanda', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(136, 'Omán', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(137, 'Países Bajos', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(138, 'Pakistán', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(139, 'Palaos', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(140, 'Palestina', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(141, 'Panamá', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(142, 'Papúa Nueva Guinea', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(143, 'Paraguay', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(144, 'Perú', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(145, 'Polonia', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(146, 'Portugal', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(147, 'Reino Unido', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(148, 'Ruanda', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(149, 'Rumania', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(150, 'Rusia', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(151, 'Islas Salomón', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(152, 'Samoa', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(153, 'San Cristóbal y Nieves', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(154, 'San Marino', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(155, 'San Vicente y las Granadinas', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(156, 'Santa Lucía', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(157, 'Santo Tomé y Príncipe', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(158, 'Senegal', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(159, 'Serbia', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(160, 'Seychelles', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(161, 'Sierra Leona', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(162, 'Singapur', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(163, 'Siria', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(164, 'Somalia', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(165, 'Sri Lanka', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(166, 'Suazilandia', '2017-11-25 21:50:27', '2017-11-25 21:50:27'),
(167, 'Sudáfrica', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(168, 'Sudán', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(169, 'Sudán del sur', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(170, 'Suecia', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(171, 'Suiza', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(172, 'Surinam', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(173, 'Tailandia', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(174, 'Tanzania', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(175, 'Tayikistán', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(176, 'Timor Oriental', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(177, 'Togo', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(178, 'Tonga', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(179, 'Trinidad y Tobago', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(180, 'Túnez', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(181, 'Turkmenistán', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(182, 'Turquía', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(183, 'Tuvalu', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(184, 'Ucrania', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(185, 'Uganda', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(186, 'Uruguay', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(187, 'Uzbekistán', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(188, 'Vanuatu', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(189, 'Vaticano', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(190, 'Venezuela', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(191, 'Vietnam', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(192, 'Yemen', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(193, 'Yibuti', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(194, 'Zambia', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(195, 'Zimbabue', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(196, 'Kosovo', '2017-11-25 21:50:28', '2017-11-25 21:50:28'),
(197, 'Taiwán', '2017-11-25 21:50:28', '2017-11-25 21:50:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `perfil` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `perfil`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', '2017-11-25 21:50:22', '2017-11-25 21:50:22'),
(2, 'Artista', '2017-11-25 21:50:22', '2017-11-25 21:50:22'),
(3, 'Auditor', '2017-11-25 21:50:22', '2017-11-25 21:50:22'),
(4, 'Publicista', '2017-11-25 21:50:22', '2017-11-25 21:50:22'),
(5, 'Solicitante', '2017-11-25 21:50:22', '2017-11-25 21:50:22'),
(6, 'Atención al Ciudadano', '2017-11-29 02:14:00', '2017-11-29 02:14:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_user`
--

CREATE TABLE `perfil_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `perfil_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `perfil_user`
--

INSERT INTO `perfil_user` (`id`, `user_id`, `perfil_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesiones`
--

CREATE TABLE `profesiones` (
  `id` int(10) UNSIGNED NOT NULL,
  `profesion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profesiones`
--

INSERT INTO `profesiones` (`id`, `profesion`, `created_at`, `updated_at`) VALUES
(1, 'Escultor', '2017-11-25 22:39:17', '2017-11-25 22:39:17'),
(2, 'Grabador', '2017-11-25 22:39:25', '2017-11-25 22:39:25'),
(3, 'Pintor', '2017-11-25 22:39:32', '2017-11-25 22:39:32'),
(4, 'Dibujante', '2017-11-25 22:39:47', '2017-11-25 22:39:47'),
(5, 'Op-art', '2017-11-25 22:59:42', '2017-11-25 22:59:42'),
(6, 'Artes plásticas', '2017-11-25 22:59:54', '2017-11-25 22:59:54'),
(7, 'Arte cinético', '2017-11-25 23:00:15', '2017-11-25 23:00:15'),
(8, 'Muralista', '2017-11-25 23:08:34', '2017-11-25 23:08:34'),
(9, 'Caricaturista', '2017-11-25 23:11:59', '2017-11-25 23:11:59'),
(10, 'Fotografo', '2017-11-25 23:16:20', '2017-11-25 23:16:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redes_sociales`
--

CREATE TABLE `redes_sociales` (
  `id` int(10) UNSIGNED NOT NULL,
  `red_social` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros_eventos`
--

CREATE TABLE `registros_eventos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `evento` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operacion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `registros_eventos`
--

INSERT INTO `registros_eventos` (`id`, `evento`, `ip`, `operacion`, `usuario`, `created_at`, `updated_at`) VALUES
(1, 'Creo el estado Amazonas', '::1', 'INSERT', '1', '2017-11-25 21:54:20', '2017-11-25 21:54:20'),
(2, 'Creo el estado Anzoátegui', '::1', 'INSERT', '1', '2017-11-25 21:54:39', '2017-11-25 21:54:39'),
(3, 'Creo el estado Apure', '::1', 'INSERT', '1', '2017-11-25 21:54:49', '2017-11-25 21:54:49'),
(4, 'Creo el estado Aragua', '::1', 'INSERT', '1', '2017-11-25 21:54:57', '2017-11-25 21:54:57'),
(5, 'Creo el estado Barinas', '::1', 'INSERT', '1', '2017-11-25 21:55:07', '2017-11-25 21:55:07'),
(6, 'Creo el estado Bolívar', '::1', 'INSERT', '1', '2017-11-25 21:55:18', '2017-11-25 21:55:18'),
(7, 'Creo el estado Carabobo', '::1', 'INSERT', '1', '2017-11-25 21:55:28', '2017-11-25 21:55:28'),
(8, 'Creo el estado Cojedes', '::1', 'INSERT', '1', '2017-11-25 21:55:37', '2017-11-25 21:55:37'),
(9, 'Creo el estado Delta Amacuro', '::1', 'INSERT', '1', '2017-11-25 21:55:47', '2017-11-25 21:55:47'),
(10, 'Creo el estado Distrito Capital', '::1', 'INSERT', '1', '2017-11-25 21:55:56', '2017-11-25 21:55:56'),
(11, 'Creo el estado Falcón', '::1', 'INSERT', '1', '2017-11-25 21:56:06', '2017-11-25 21:56:06'),
(12, 'Creo el estado Guárico', '::1', 'INSERT', '1', '2017-11-25 21:56:17', '2017-11-25 21:56:17'),
(13, 'Creo el estado Lara', '::1', 'INSERT', '1', '2017-11-25 21:56:26', '2017-11-25 21:56:26'),
(14, 'Creo el estado Mérida', '::1', 'INSERT', '1', '2017-11-25 21:56:35', '2017-11-25 21:56:35'),
(15, 'Creo el estado Miranda', '::1', 'INSERT', '1', '2017-11-25 21:56:42', '2017-11-25 21:56:42'),
(16, 'Creo el estado Monagas', '::1', 'INSERT', '1', '2017-11-25 21:56:49', '2017-11-25 21:56:49'),
(17, 'Creo el estado Nueva Esparta', '::1', 'INSERT', '1', '2017-11-25 21:57:07', '2017-11-25 21:57:07'),
(18, 'Creo el estado Portuguesa', '::1', 'INSERT', '1', '2017-11-25 21:57:17', '2017-11-25 21:57:17'),
(19, 'Creo el estado Sucre', '::1', 'INSERT', '1', '2017-11-25 21:57:26', '2017-11-25 21:57:26'),
(20, 'Creo el estado Táchira', '::1', 'INSERT', '1', '2017-11-25 21:57:36', '2017-11-25 21:57:36'),
(21, 'Creo el estado Trujillo', '::1', 'INSERT', '1', '2017-11-25 21:57:43', '2017-11-25 21:57:43'),
(22, 'Creo el estado Vargas', '::1', 'INSERT', '1', '2017-11-25 21:57:49', '2017-11-25 21:57:49'),
(23, 'Creo el estado Yaracuy', '::1', 'INSERT', '1', '2017-11-25 21:57:57', '2017-11-25 21:57:57'),
(24, 'Creo el estado Zulia', '::1', 'INSERT', '1', '2017-11-25 21:58:04', '2017-11-25 21:58:04'),
(25, 'Creo el tipo de museo Contemporáneo', '::1', 'INSERT', '1', '2017-11-25 22:24:57', '2017-11-25 22:24:57'),
(26, 'Creo el tipo de museo Moderno', '::1', 'INSERT', '1', '2017-11-25 22:25:06', '2017-11-25 22:25:06'),
(27, 'Creo el museo Museo de Arte Contemporáneo de Caracas', '::1', 'INSERT', '1', '2017-11-25 22:27:26', '2017-11-25 22:27:26'),
(28, 'Edito la foto de la portada del museo Museo de Arte Contemporáneo de Caracas', '::1', 'UPDATE', '1', '2017-11-25 22:28:16', '2017-11-25 22:28:16'),
(29, 'Edito la foto de la historia del museo Museo de Arte Contemporáneo de Caracas', '::1', 'UPDATE', '1', '2017-11-25 22:30:27', '2017-11-25 22:30:27'),
(30, 'Creo el cargo Director', '::1', 'INSERT', '1', '2017-11-25 22:30:54', '2017-11-25 22:30:54'),
(31, 'Creo el profesión Escultor', '::1', 'INSERT', '1', '2017-11-25 22:39:17', '2017-11-25 22:39:17'),
(32, 'Creo el profesión Grabador', '::1', 'INSERT', '1', '2017-11-25 22:39:25', '2017-11-25 22:39:25'),
(33, 'Creo el profesión Pintor', '::1', 'INSERT', '1', '2017-11-25 22:39:32', '2017-11-25 22:39:32'),
(34, 'Creo el profesión Dibujante', '::1', 'INSERT', '1', '2017-11-25 22:39:47', '2017-11-25 22:39:47'),
(35, 'Creo la disciplina Escultura', '::1', 'INSERT', '1', '2017-11-25 22:39:59', '2017-11-25 22:39:59'),
(36, 'Creo la disciplina Pintura', '::1', 'INSERT', '1', '2017-11-25 22:40:04', '2017-11-25 22:40:04'),
(37, 'Creo la disciplina Dibujo', '::1', 'INSERT', '1', '2017-11-25 22:40:10', '2017-11-25 22:40:10'),
(38, 'Creo el artista Auguste Rodin', '::1', 'INSERT', '1', '2017-11-25 22:41:51', '2017-11-25 22:41:51'),
(39, 'Creo la disciplina Pintura del paisaje', '::1', 'INSERT', '1', '2017-11-25 22:44:02', '2017-11-25 22:44:02'),
(40, 'Creo el artista Claude Monet', '::1', 'INSERT', '1', '2017-11-25 22:45:40', '2017-11-25 22:45:40'),
(41, 'Creo el artista Armand Guillaumin', '::1', 'INSERT', '1', '2017-11-25 22:48:27', '2017-11-25 22:48:27'),
(42, 'Creo el artista Aristide Maillol', '::1', 'INSERT', '1', '2017-11-25 22:51:43', '2017-11-25 22:51:43'),
(43, 'Creo el artista Henri Matisse', '::1', 'INSERT', '1', '2017-11-25 22:53:51', '2017-11-25 22:53:51'),
(44, 'Desloqueo al público el artista Aristide Maillol', '::1', 'UPDATE', '1', '2017-11-25 22:54:04', '2017-11-25 22:54:04'),
(45, 'Desloqueo al público el artista Armand Guillaumin', '::1', 'UPDATE', '1', '2017-11-25 22:54:06', '2017-11-25 22:54:06'),
(46, 'Desloqueo al público el artista Auguste Rodin', '::1', 'UPDATE', '1', '2017-11-25 22:54:09', '2017-11-25 22:54:09'),
(47, 'Desloqueo al público el artista Claude Monet', '::1', 'UPDATE', '1', '2017-11-25 22:54:10', '2017-11-25 22:54:10'),
(48, 'Desloqueo al público el artista Henri Matisse', '::1', 'UPDATE', '1', '2017-11-25 22:54:12', '2017-11-25 22:54:12'),
(49, 'Creo la disciplina Abstracción', '::1', 'INSERT', '1', '2017-11-25 22:55:15', '2017-11-25 22:55:15'),
(50, 'Creo el artista Vasili Kandinski', '::1', 'INSERT', '1', '2017-11-25 22:57:25', '2017-11-25 22:57:25'),
(51, 'Creo el profesión Op-art', '::1', 'INSERT', '1', '2017-11-25 22:59:42', '2017-11-25 22:59:42'),
(52, 'Creo el profesión Artes plásticas', '::1', 'INSERT', '1', '2017-11-25 22:59:54', '2017-11-25 22:59:54'),
(53, 'Creo el profesión Arte cinético', '::1', 'INSERT', '1', '2017-11-25 23:00:15', '2017-11-25 23:00:15'),
(54, 'Creo la disciplina Plastico', '::1', 'INSERT', '1', '2017-11-25 23:00:31', '2017-11-25 23:00:31'),
(55, 'Creo la disciplina Cinetica', '::1', 'INSERT', '1', '2017-11-25 23:00:36', '2017-11-25 23:00:36'),
(56, 'Desloqueo al público el artista Vasili Kandinski', '::1', 'UPDATE', '1', '2017-11-25 23:00:43', '2017-11-25 23:00:43'),
(57, 'Creo el artista Jesús Rafael Soto', '::1', 'INSERT', '1', '2017-11-25 23:02:35', '2017-11-25 23:02:35'),
(58, 'Desloqueo al público el artista Jesús Rafael Soto', '::1', 'UPDATE', '1', '2017-11-25 23:02:42', '2017-11-25 23:02:42'),
(59, 'Creo el artista Carlos Cruz-Diez', '::1', 'INSERT', '1', '2017-11-25 23:04:39', '2017-11-25 23:04:39'),
(60, 'Desloqueo al público el artista Carlos Cruz-Diez', '::1', 'UPDATE', '1', '2017-11-25 23:05:27', '2017-11-25 23:05:27'),
(61, 'Creo el artista Armando Reverón', '::1', 'INSERT', '1', '2017-11-25 23:07:56', '2017-11-25 23:07:56'),
(62, 'Desloqueo al público el artista Armando Reverón', '::1', 'UPDATE', '1', '2017-11-25 23:07:59', '2017-11-25 23:07:59'),
(63, 'Creo el profesión Muralista', '::1', 'INSERT', '1', '2017-11-25 23:08:34', '2017-11-25 23:08:34'),
(64, 'Creo la disciplina Mural', '::1', 'INSERT', '1', '2017-11-25 23:08:43', '2017-11-25 23:08:43'),
(65, 'Creo el artista Rufino Tamayo', '::1', 'INSERT', '1', '2017-11-25 23:10:42', '2017-11-25 23:10:42'),
(66, 'Desloqueo al público el artista Rufino Tamayo', '::1', 'UPDATE', '1', '2017-11-25 23:10:46', '2017-11-25 23:10:46'),
(67, 'Creo el profesión Caricaturista', '::1', 'INSERT', '1', '2017-11-25 23:12:00', '2017-11-25 23:12:00'),
(68, 'Creo la disciplina Caricatura', '::1', 'INSERT', '1', '2017-11-25 23:12:09', '2017-11-25 23:12:09'),
(69, 'Creo el artista Pedro León Zapata', '::1', 'INSERT', '1', '2017-11-25 23:13:35', '2017-11-25 23:13:35'),
(70, 'Desloqueo al público el artista Pedro León Zapata', '::1', 'UPDATE', '1', '2017-11-25 23:13:38', '2017-11-25 23:13:38'),
(71, 'Creo el artista Fernand Léger', '::1', 'INSERT', '1', '2017-11-25 23:15:39', '2017-11-25 23:15:39'),
(72, 'Desloqueo al público el artista Fernand Léger', '::1', 'UPDATE', '1', '2017-11-25 23:15:43', '2017-11-25 23:15:43'),
(73, 'Creo el profesión Fotografo', '::1', 'INSERT', '1', '2017-11-25 23:16:20', '2017-11-25 23:16:20'),
(74, 'Creo la disciplina Fotografia', '::1', 'INSERT', '1', '2017-11-25 23:16:31', '2017-11-25 23:16:31'),
(75, 'Creo la disciplina Impresión', '::1', 'INSERT', '1', '2017-11-25 23:16:40', '2017-11-25 23:16:40'),
(76, 'Edito la disciplina Fotografía', '::1', 'UPDATE', '1', '2017-11-25 23:16:46', '2017-11-25 23:16:46'),
(77, 'Creo el artista Andy Warhol', '::1', 'INSERT', '1', '2017-11-25 23:19:05', '2017-11-25 23:19:05'),
(78, 'Desloqueo al público el artista Andy Warhol', '::1', 'UPDATE', '1', '2017-11-25 23:19:08', '2017-11-25 23:19:08'),
(79, 'Creo el artista Alexander Calder', '::1', 'INSERT', '1', '2017-11-25 23:21:17', '2017-11-25 23:21:17'),
(80, 'Desloqueo al público el artista Alexander Calder', '::1', 'UPDATE', '1', '2017-11-25 23:21:21', '2017-11-25 23:21:21'),
(81, 'Creo el artista Serge Poliakoff', '::1', 'INSERT', '1', '2017-11-25 23:23:11', '2017-11-25 23:23:11'),
(82, 'Desloqueo al público el artista Serge Poliakoff', '::1', 'UPDATE', '1', '2017-11-25 23:23:17', '2017-11-25 23:23:17'),
(83, 'Creo el artista Piet Mondrian', '::1', 'INSERT', '1', '2017-11-25 23:25:07', '2017-11-25 23:25:07'),
(84, 'Desloqueo al público el artista Piet Mondrian', '::1', 'UPDATE', '1', '2017-11-25 23:25:12', '2017-11-25 23:25:12'),
(85, 'Creo el artista Henry Moore', '::1', 'INSERT', '1', '2017-11-25 23:27:26', '2017-11-25 23:27:26'),
(86, 'Desloqueo al público el artista Henry Moore', '::1', 'UPDATE', '1', '2017-11-25 23:27:31', '2017-11-25 23:27:31'),
(87, 'Edito el artista Henry Moore', '::1', 'UPDATE', '1', '2017-11-25 23:27:46', '2017-11-25 23:27:46'),
(88, 'Creo el artista Salvador Dalí', '::1', 'INSERT', '1', '2017-11-25 23:30:12', '2017-11-25 23:30:12'),
(89, 'Desloqueo al público el artista Salvador Dalí', '::1', 'UPDATE', '1', '2017-11-25 23:30:17', '2017-11-25 23:30:17'),
(90, 'Edito el museo Museo de Arte Contemporáneo de Caracas', '::1', 'UPDATE', '1', '2017-11-25 23:32:09', '2017-11-25 23:32:09'),
(91, 'Registro al directivo Daniel Briceño al museo Museo de Arte Contemporáneo de Caracas', '::1', 'INSERT', '1', '2017-11-25 23:32:39', '2017-11-25 23:32:39'),
(92, 'Registro el servicio Horario al museo Museo de Arte Contemporáneo de Caracas', '::1', 'INSERT', '1', '2017-11-25 23:33:42', '2017-11-25 23:33:42'),
(93, 'Edito las coordenadas del mapa del museo Museo de Arte Contemporáneo de Caracas', '::1', 'UPDATE', '1', '2017-11-25 23:34:02', '2017-11-25 23:34:02'),
(94, 'Edito las coordenadas del mapa del museo Museo de Arte Contemporáneo de Caracas', '::1', 'UPDATE', '1', '2017-11-25 23:35:26', '2017-11-25 23:35:26'),
(95, 'Agrego la iamgen El Pensador al museo ', '::1', 'INSERT', '1', '2017-11-25 23:36:57', '2017-11-25 23:36:57'),
(96, 'Agrego la iamgen La acción encadenada al museo ', '::1', 'INSERT', '1', '2017-11-25 23:38:59', '2017-11-25 23:38:59'),
(97, 'Agrego la iamgen Kochel al museo ', '::1', 'INSERT', '1', '2017-11-25 23:41:18', '2017-11-25 23:41:18'),
(98, 'Agrego la iamgen Las Pirámides a Port-Coton al museo ', '::1', 'INSERT', '1', '2017-11-25 23:42:03', '2017-11-25 23:42:03'),
(99, 'Agrego la iamgen Composición dentro del cuadrado con rojo, amarillo y azul al museo ', '::1', 'INSERT', '1', '2017-11-25 23:42:35', '2017-11-25 23:42:35'),
(100, 'Desloqueo al público el museo Museo de Arte Contemporáneo de Caracas', '::1', 'UPDATE', '1', '2017-11-25 23:44:13', '2017-11-25 23:44:13'),
(101, 'Creo el tipo de museo Ciencia', '::1', 'INSERT', '1', '2017-11-25 23:53:44', '2017-11-25 23:53:44'),
(102, 'Creo el tipo de museo Tecnología', '::1', 'INSERT', '1', '2017-11-25 23:53:58', '2017-11-25 23:53:58'),
(103, 'Creo el tipo de museo Historia Natural', '::1', 'INSERT', '1', '2017-11-25 23:54:12', '2017-11-25 23:54:12'),
(104, 'Creo el museo Museo de Ciencias', '::1', 'INSERT', '1', '2017-11-25 23:55:15', '2017-11-25 23:55:15'),
(105, 'Desloqueo al público el museo Museo de Ciencias', '::1', 'UPDATE', '1', '2017-11-25 23:55:17', '2017-11-25 23:55:17'),
(106, 'Registro al directivo José Ignacio Herrera al museo Museo de Ciencias', '::1', 'INSERT', '1', '2017-11-25 23:59:37', '2017-11-25 23:59:37'),
(107, 'Edito las coordenadas del mapa del museo Museo de Ciencias', '::1', 'UPDATE', '1', '2017-11-26 00:01:21', '2017-11-26 00:01:21'),
(108, 'Registro el servicio Horario al museo Museo de Ciencias', '::1', 'INSERT', '1', '2017-11-26 00:01:44', '2017-11-26 00:01:44'),
(109, 'Agrego la iamgen Animales al museo ', '::1', 'INSERT', '1', '2017-11-26 00:06:19', '2017-11-26 00:06:19'),
(110, 'Agrego la iamgen Pasillo 5 al museo ', '::1', 'INSERT', '1', '2017-11-26 00:06:44', '2017-11-26 00:06:44'),
(111, 'Agrego la iamgen Historia Natural al museo ', '::1', 'INSERT', '1', '2017-11-26 00:06:59', '2017-11-26 00:06:59'),
(112, 'Agrego la iamgen Jaguar al museo ', '::1', 'INSERT', '1', '2017-11-26 00:07:13', '2017-11-26 00:07:13'),
(113, 'Agrego la iamgen Esqueletos al museo ', '::1', 'INSERT', '1', '2017-11-26 00:07:25', '2017-11-26 00:07:25'),
(114, 'Edito la foto de la historia del museo Museo de Ciencias', '::1', 'UPDATE', '1', '2017-11-26 00:07:55', '2017-11-26 00:07:55'),
(115, 'Edito la foto de la portada del museo Museo de Ciencias', '::1', 'UPDATE', '1', '2017-11-26 00:08:01', '2017-11-26 00:08:01'),
(116, 'Creo el tipo de museo Arte Venezolano', '::1', 'INSERT', '1', '2017-11-26 00:16:05', '2017-11-26 00:16:05'),
(117, 'Creo el tipo de museo Arte Internacional', '::1', 'INSERT', '1', '2017-11-26 00:16:15', '2017-11-26 00:16:15'),
(118, 'Creo el artista Bernardo Strozzi', '::1', 'INSERT', '1', '2017-11-26 00:19:51', '2017-11-26 00:19:51'),
(119, 'Desloqueo al público el artista Bernardo Strozzi', '::1', 'UPDATE', '1', '2017-11-26 00:19:56', '2017-11-26 00:19:56'),
(120, 'Creo el artista Camille Pissarro', '::1', 'INSERT', '1', '2017-11-26 00:22:15', '2017-11-26 00:22:15'),
(121, 'Desloqueo al público el artista Camille Pissarro', '::1', 'UPDATE', '1', '2017-11-26 00:22:18', '2017-11-26 00:22:18'),
(122, 'Creo el artista Paul Cézanne', '::1', 'INSERT', '1', '2017-11-26 00:24:10', '2017-11-26 00:24:10'),
(123, 'Desloqueo al público el artista Paul Cézanne', '::1', 'UPDATE', '1', '2017-11-26 00:24:16', '2017-11-26 00:24:16'),
(124, 'Creo el artista Gertrud Goldschmidt', '::1', 'INSERT', '1', '2017-11-26 00:26:19', '2017-11-26 00:26:19'),
(125, 'Desloqueo al público el artista Gertrud Goldschmidt', '::1', 'UPDATE', '1', '2017-11-26 00:26:30', '2017-11-26 00:26:30'),
(126, 'Creo el museo Museo de Bellas Artes de Caracas', '::1', 'INSERT', '1', '2017-11-26 00:28:55', '2017-11-26 00:28:55'),
(127, 'Desloqueo al público el museo Museo de Bellas Artes de Caracas', '::1', 'UPDATE', '1', '2017-11-26 00:28:58', '2017-11-26 00:28:58'),
(128, 'Edito la foto de los historia del museo Museo de Ciencias', '::1', 'UPDATE', '1', '2017-11-26 00:31:45', '2017-11-26 00:31:45'),
(129, 'Edito la foto de los historia del museo Museo de Arte Contemporáneo de Caracas', '::1', 'UPDATE', '1', '2017-11-26 00:32:04', '2017-11-26 00:32:04'),
(130, 'Edito la foto de la portada del museo Museo de Bellas Artes de Caracas', '::1', 'UPDATE', '1', '2017-11-26 00:32:20', '2017-11-26 00:32:20'),
(131, 'Edito la foto de la historia del museo Museo de Bellas Artes de Caracas', '::1', 'UPDATE', '1', '2017-11-26 00:32:26', '2017-11-26 00:32:26'),
(132, 'Edito la foto de los historia del museo Museo de Bellas Artes de Caracas', '::1', 'UPDATE', '1', '2017-11-26 00:32:36', '2017-11-26 00:32:36'),
(133, 'Edito las coordenadas del mapa del museo Museo de Bellas Artes de Caracas', '::1', 'UPDATE', '1', '2017-11-26 00:32:58', '2017-11-26 00:32:58'),
(134, 'Registro el servicio Horario al museo Museo de Bellas Artes de Caracas', '::1', 'INSERT', '1', '2017-11-26 00:33:18', '2017-11-26 00:33:18'),
(135, 'Registro al directivo Irene Guillén al museo Museo de Bellas Artes de Caracas', '::1', 'INSERT', '1', '2017-11-26 00:33:37', '2017-11-26 00:33:37'),
(136, 'Agrego la iamgen Elemosina di san Lorenzo al museo ', '::1', 'INSERT', '1', '2017-11-26 00:34:34', '2017-11-26 00:34:34'),
(137, 'Agrego la iamgen El Puente de Doña Romualda al museo ', '::1', 'INSERT', '1', '2017-11-26 00:34:57', '2017-11-26 00:34:57'),
(138, 'Agrego la iamgen Bañistas desnudos al museo ', '::1', 'INSERT', '1', '2017-11-26 00:35:21', '2017-11-26 00:35:21'),
(139, 'Agrego la iamgen Mural de Bruselas al museo ', '::1', 'INSERT', '1', '2017-11-26 00:35:39', '2017-11-26 00:35:39'),
(140, 'Agrego la iamgen Reticulárea al museo ', '::1', 'INSERT', '1', '2017-11-26 00:35:56', '2017-11-26 00:35:56'),
(141, 'Agrego la iamgen La ciudad al museo ', '::1', 'INSERT', '1', '2017-11-26 00:36:15', '2017-11-26 00:36:15'),
(142, 'Creo el tipo de museo Arte', '::1', 'INSERT', '1', '2017-11-26 00:39:28', '2017-11-26 00:39:28'),
(143, 'Creo el museo Museo de los Niños', '::1', 'INSERT', '1', '2017-11-26 00:42:02', '2017-11-26 00:42:02'),
(144, 'Desloqueo al público el museo Museo de los Niños', '::1', 'UPDATE', '1', '2017-11-26 00:43:24', '2017-11-26 00:43:24'),
(145, 'Edito la foto de la portada del museo Museo de los Niños', '::1', 'UPDATE', '1', '2017-11-26 00:43:33', '2017-11-26 00:43:33'),
(146, 'Edito las coordenadas del mapa del museo Museo de los Niños', '::1', 'UPDATE', '1', '2017-11-26 00:43:48', '2017-11-26 00:43:48'),
(147, 'Registro el servicio Horario al museo Museo de los Niños', '::1', 'INSERT', '1', '2017-11-26 00:44:11', '2017-11-26 00:44:11'),
(148, 'Edito la foto de la historia del museo Museo de los Niños', '::1', 'UPDATE', '1', '2017-11-26 00:46:25', '2017-11-26 00:46:25'),
(149, 'Edito la foto de los historia del museo Museo de los Niños', '::1', 'UPDATE', '1', '2017-11-26 00:46:31', '2017-11-26 00:46:31'),
(150, 'Agrego la iamgen Nave al museo ', '::1', 'INSERT', '1', '2017-11-26 00:46:41', '2017-11-26 00:46:41'),
(151, 'Agrego la iamgen Astronautas al museo ', '::1', 'INSERT', '1', '2017-11-26 00:46:53', '2017-11-26 00:46:53'),
(152, 'Agrego la iamgen Planetario al museo ', '::1', 'INSERT', '1', '2017-11-26 00:47:06', '2017-11-26 00:47:06'),
(153, 'Agrego la iamgen Transbordador al museo ', '::1', 'INSERT', '1', '2017-11-26 00:47:21', '2017-11-26 00:47:21'),
(154, 'Creo el artista Ferdinand Bellermann', '::1', 'INSERT', '1', '2017-11-26 00:53:00', '2017-11-26 00:53:00'),
(155, 'Creo el artista Martín Tovar y Tovar', '::1', 'INSERT', '1', '2017-11-26 00:55:08', '2017-11-26 00:55:08'),
(156, 'Desloqueo al público el artista Ferdinand Bellermann', '::1', 'UPDATE', '1', '2017-11-26 00:55:11', '2017-11-26 00:55:11'),
(157, 'Desloqueo al público el artista Martín Tovar y Tovar', '::1', 'UPDATE', '1', '2017-11-26 00:55:13', '2017-11-26 00:55:13'),
(158, 'Creo el artista Cristóbal Rojas', '::1', 'INSERT', '1', '2017-11-26 00:58:02', '2017-11-26 00:58:02'),
(159, 'Desloqueo al público el artista Cristóbal Rojas', '::1', 'UPDATE', '1', '2017-11-26 00:58:06', '2017-11-26 00:58:06'),
(160, 'Creo el artista Antonio Herrera Toro', '::1', 'INSERT', '1', '2017-11-26 01:00:54', '2017-11-26 01:00:54'),
(161, 'Desloqueo al público el artista Antonio Herrera Toro', '::1', 'UPDATE', '1', '2017-11-26 01:00:57', '2017-11-26 01:00:57'),
(162, 'Creo el artista Arturo Michelena', '::1', 'INSERT', '1', '2017-11-26 01:02:52', '2017-11-26 01:02:52'),
(163, 'Desloqueo al público el artista Arturo Michelena', '::1', 'UPDATE', '1', '2017-11-26 01:02:55', '2017-11-26 01:02:55'),
(164, 'Creo el artista Emilio Boggio', '::1', 'INSERT', '1', '2017-11-26 01:05:23', '2017-11-26 01:05:23'),
(165, 'Desloqueo al público el artista Emilio Boggio', '::1', 'UPDATE', '1', '2017-11-26 01:05:30', '2017-11-26 01:05:30'),
(166, 'Creo el museo Galería de Arte Nacional', '::1', 'INSERT', '1', '2017-11-26 01:07:50', '2017-11-26 01:07:50'),
(167, 'Desloqueo al público el museo Galería de Arte Nacional', '::1', 'UPDATE', '1', '2017-11-26 01:07:54', '2017-11-26 01:07:54'),
(168, 'Edito la foto de la portada del museo Galería de Arte Nacional', '::1', 'UPDATE', '1', '2017-11-26 01:08:03', '2017-11-26 01:08:03'),
(169, 'Edito la foto de la historia del museo Galería de Arte Nacional', '::1', 'UPDATE', '1', '2017-11-26 01:08:09', '2017-11-26 01:08:09'),
(170, 'Registro el servicio Horario al museo Galería de Arte Nacional', '::1', 'INSERT', '1', '2017-11-26 01:08:54', '2017-11-26 01:08:54'),
(171, 'Edito la foto de los historia del museo Galería de Arte Nacional', '::1', 'UPDATE', '1', '2017-11-26 01:08:59', '2017-11-26 01:08:59'),
(172, 'Edito las coordenadas del mapa del museo Galería de Arte Nacional', '::1', 'UPDATE', '1', '2017-11-26 01:09:18', '2017-11-26 01:09:18'),
(173, 'Agrego la iamgen Paisaje tropical con casas rurales y palmeras al museo ', '::1', 'INSERT', '1', '2017-11-26 01:10:35', '2017-11-26 01:10:35'),
(174, 'Agrego la iamgen Boceto para la Firma del Acta de Independencia al museo ', '::1', 'INSERT', '1', '2017-11-26 01:11:09', '2017-11-26 01:11:09'),
(175, 'Agrego la iamgen En el Orinoco al museo ', '::1', 'INSERT', '1', '2017-11-26 01:11:41', '2017-11-26 01:11:41'),
(176, 'Agrego la iamgen Autorretrato con sombrero rojo al museo ', '::1', 'INSERT', '1', '2017-11-26 01:12:01', '2017-11-26 01:12:01'),
(177, 'Agrego la iamgen Ricaurte en San Mateo al museo ', '::1', 'INSERT', '1', '2017-11-26 01:15:19', '2017-11-26 01:15:19'),
(178, 'Agrego la iamgen Charlotte Corday al museo ', '::1', 'INSERT', '1', '2017-11-26 01:15:45', '2017-11-26 01:15:45'),
(179, 'Agrego la iamgen Paisaje con puente al museo ', '::1', 'INSERT', '1', '2017-11-26 01:16:08', '2017-11-26 01:16:08'),
(180, 'Creo el catalogo Pinturas 1 Armando Reveron', '::1', 'INSERT', '1', '2017-11-26 01:26:36', '2017-11-26 01:26:36'),
(181, 'Agrego la imagen Macuto recordando su partida al catalogo Pinturas 1 Armando Reveron', '::1', 'INSERT', '1', '2017-11-26 01:27:06', '2017-11-26 01:27:06'),
(182, 'Edito la foto de la portada del artista Armando Reverón', '::1', 'UPDATE', '1', '2017-11-26 01:29:31', '2017-11-26 01:29:31'),
(183, 'Edito la foto de la biografia del artista Armando Reverón', '::1', 'UPDATE', '1', '2017-11-26 01:29:58', '2017-11-26 01:29:58'),
(184, 'Edito la foto de la portada del artista Armando Reverón', '::1', 'UPDATE', '1', '2017-11-26 01:30:14', '2017-11-26 01:30:14'),
(185, 'Edito la foto de la habilidad del artista Armando Reverón', '::1', 'UPDATE', '1', '2017-11-26 01:30:40', '2017-11-26 01:30:40'),
(186, 'Agrego la imagen Vida y obra al catalogo Pinturas 1 Armando Reveron', '::1', 'INSERT', '1', '2017-11-26 01:32:12', '2017-11-26 01:32:12'),
(187, 'Agrego la imagen Mujer con mantilla al catalogo Pinturas 1 Armando Reveron', '::1', 'INSERT', '1', '2017-11-26 01:32:35', '2017-11-26 01:32:35'),
(188, 'Agrego la imagen La Cueva al catalogo Pinturas 1 Armando Reveron', '::1', 'INSERT', '1', '2017-11-26 01:33:10', '2017-11-26 01:33:10'),
(189, 'Agrego la imagen Vida y obra al catalogo Pinturas 1 Armando Reveron', '::1', 'INSERT', '1', '2017-11-26 01:33:43', '2017-11-26 01:33:43'),
(190, 'Creo el catalogo Pinturas 2 Armando Reveron', '::1', 'INSERT', '1', '2017-11-26 01:34:10', '2017-11-26 01:34:10'),
(191, 'Agrego la imagen pintura-de-reveron al catalogo Pinturas 2 Armando Reveron', '::1', 'INSERT', '1', '2017-11-26 01:34:59', '2017-11-26 01:34:59'),
(192, 'Agrego la imagen Armando Reverón al catalogo Pinturas 2 Armando Reveron', '::1', 'INSERT', '1', '2017-11-26 01:35:20', '2017-11-26 01:35:20'),
(193, 'Agrego la imagen Armando Reverón al catalogo Pinturas 2 Armando Reveron', '::1', 'INSERT', '1', '2017-11-26 01:35:37', '2017-11-26 01:35:37'),
(194, 'Agrego la imagen Juanita desnuda al catalogo Pinturas 2 Armando Reveron', '::1', 'INSERT', '1', '2017-11-26 01:36:04', '2017-11-26 01:36:04'),
(195, 'Agrego la imagen Maja al catalogo Pinturas 2 Armando Reveron', '::1', 'INSERT', '1', '2017-11-26 01:36:24', '2017-11-26 01:36:24'),
(196, 'Agrego la imagen Armando Reverón al catalogo Pinturas 2 Armando Reveron', '::1', 'INSERT', '1', '2017-11-26 01:37:00', '2017-11-26 01:37:00'),
(197, 'Agrego la imagen juanita al catalogo Pinturas 2 Armando Reveron', '::1', 'INSERT', '1', '2017-11-26 01:37:20', '2017-11-26 01:37:20'),
(198, 'Creo el catalogo Pinturas 3 Armando Reveron', '::1', 'INSERT', '1', '2017-11-26 01:37:45', '2017-11-26 01:37:45'),
(199, 'Agrego la imagen Armando Reverón, incalculable al catalogo Pinturas 3 Armando Reveron', '::1', 'INSERT', '1', '2017-11-26 01:38:18', '2017-11-26 01:38:18'),
(200, 'Agrego la imagen OFICIO DE MIRAR al catalogo Pinturas 3 Armando Reveron', '::1', 'INSERT', '1', '2017-11-26 01:38:38', '2017-11-26 01:38:38'),
(201, 'Agrego la imagen Escritos de un salvaje al catalogo Pinturas 3 Armando Reveron', '::1', 'INSERT', '1', '2017-11-26 01:39:09', '2017-11-26 01:39:09'),
(202, 'Agrego la imagen A 127 años de Armando Reverón al catalogo Pinturas 3 Armando Reveron', '::1', 'INSERT', '1', '2017-11-26 01:39:51', '2017-11-26 01:39:51'),
(203, 'Agrego la imagen Armando Reverón al catalogo Pinturas 3 Armando Reveron', '::1', 'INSERT', '1', '2017-11-26 01:40:14', '2017-11-26 01:40:14'),
(204, 'Edito la foto de la portada del artista Antonio Herrera Toro', '::1', 'UPDATE', '1', '2017-11-26 01:54:11', '2017-11-26 01:54:11'),
(205, 'Edito la foto de la biografia del artista Antonio Herrera Toro', '::1', 'UPDATE', '1', '2017-11-26 01:54:35', '2017-11-26 01:54:35'),
(206, 'Edito la foto de la habilidad del artista Antonio Herrera Toro', '::1', 'UPDATE', '1', '2017-11-26 01:54:42', '2017-11-26 01:54:42'),
(207, 'Creo el catalogo Pinturas 1 Antonio Herrera Toro', '::1', 'INSERT', '1', '2017-11-26 01:55:03', '2017-11-26 01:55:03'),
(208, 'Agrego la imagen Cocina criolla. al catalogo Pinturas 1 Antonio Herrera Toro', '::1', 'INSERT', '1', '2017-11-26 01:55:47', '2017-11-26 01:55:47'),
(209, 'Agrego la imagen La muerte de Ricaurte al catalogo Pinturas 1 Antonio Herrera Toro', '::1', 'INSERT', '1', '2017-11-26 01:56:07', '2017-11-26 01:56:07'),
(210, 'Agrego la imagen Batalla de Ayacucho al catalogo Pinturas 1 Antonio Herrera Toro', '::1', 'INSERT', '1', '2017-11-26 01:56:25', '2017-11-26 01:56:25'),
(211, 'Agrego la imagen Ponencia al catalogo Pinturas 1 Antonio Herrera Toro', '::1', 'INSERT', '1', '2017-11-26 01:56:47', '2017-11-26 01:56:47'),
(212, 'Agrego la imagen Ricauter en San Mateo al catalogo Pinturas 1 Antonio Herrera Toro', '::1', 'INSERT', '1', '2017-11-26 01:57:04', '2017-11-26 01:57:04'),
(213, 'Agrego la imagen Batalla de Junin al catalogo Pinturas 1 Antonio Herrera Toro', '::1', 'INSERT', '1', '2017-11-26 01:57:24', '2017-11-26 01:57:24'),
(214, 'Edito la foto de la portada del artista Arturo Michelena', '::1', 'UPDATE', '1', '2017-11-26 02:00:22', '2017-11-26 02:00:22'),
(215, 'Edito la foto de la biografia del artista Arturo Michelena', '::1', 'UPDATE', '1', '2017-11-26 02:00:27', '2017-11-26 02:00:27'),
(216, 'Edito la foto de la habilidad del artista Arturo Michelena', '::1', 'UPDATE', '1', '2017-11-26 02:00:34', '2017-11-26 02:00:34'),
(217, 'Creo el catalogo Pinturas 1 Arturo Michelena', '::1', 'INSERT', '1', '2017-11-26 02:08:14', '2017-11-26 02:08:14'),
(218, 'Agrego la imagen Miranda en La Carraca al catalogo Pinturas 1 Arturo Michelena', '::1', 'INSERT', '1', '2017-11-26 02:08:22', '2017-11-26 02:08:22'),
(219, 'Agrego la imagen La vara rota al catalogo Pinturas 1 Arturo Michelena', '::1', 'INSERT', '1', '2017-11-26 02:08:38', '2017-11-26 02:08:38'),
(220, 'Agrego la imagen Pinturas celebres de Arturo Michelena al catalogo Pinturas 1 Arturo Michelena', '::1', 'INSERT', '1', '2017-11-26 02:08:56', '2017-11-26 02:08:56'),
(221, 'Agrego la imagen Vuelvan Caras al catalogo Pinturas 1 Arturo Michelena', '::1', 'INSERT', '1', '2017-11-26 02:09:36', '2017-11-26 02:09:36'),
(222, 'Agrego la imagen Retrato ecuestre de Bolivar al catalogo Pinturas 1 Arturo Michelena', '::1', 'INSERT', '1', '2017-11-26 02:09:52', '2017-11-26 02:09:52'),
(223, 'Agrego la imagen ARTURO MICHELENA al catalogo Pinturas 1 Arturo Michelena', '::1', 'INSERT', '1', '2017-11-26 02:10:12', '2017-11-26 02:10:12'),
(224, 'Agrego la imagen Arturo Michelena al catalogo Pinturas 1 Arturo Michelena', '::1', 'INSERT', '1', '2017-11-26 02:10:30', '2017-11-26 02:10:30'),
(225, 'Edito la foto de la portada del artista Carlos Cruz-Diez', '::1', 'UPDATE', '1', '2017-11-26 02:12:04', '2017-11-26 02:12:04'),
(226, 'Edito la foto de la biografia del artista Carlos Cruz-Diez', '::1', 'UPDATE', '1', '2017-11-26 02:12:09', '2017-11-26 02:12:09'),
(227, 'Edito la foto de la habilidad del artista Carlos Cruz-Diez', '::1', 'UPDATE', '1', '2017-11-26 02:12:16', '2017-11-26 02:12:16'),
(228, 'Creo el catalogo Arte Cinetico', '::1', 'INSERT', '1', '2017-11-26 02:12:46', '2017-11-26 02:12:46'),
(229, 'Agrego la imagen Carlos Cruz-Diez al catalogo Arte Cinetico', '::1', 'INSERT', '1', '2017-11-26 02:14:08', '2017-11-26 02:14:08'),
(230, 'Agrego la imagen Carlos Cruz-Diez y Liu Bolin se "camuflajean" al catalogo Arte Cinetico', '::1', 'INSERT', '1', '2017-11-26 02:14:26', '2017-11-26 02:14:26'),
(231, 'Agrego la imagen Carlos Cruz Diez al catalogo Arte Cinetico', '::1', 'INSERT', '1', '2017-11-26 02:14:43', '2017-11-26 02:14:43'),
(232, 'Agrego la imagen Eliso Mundo Del Arte al catalogo Arte Cinetico', '::1', 'INSERT', '1', '2017-11-26 02:14:57', '2017-11-26 02:14:57'),
(233, 'Agrego la imagen El Arte de Carlos Cruz Diez. El arte cinético al catalogo Arte Cinetico', '::1', 'INSERT', '1', '2017-11-26 02:15:19', '2017-11-26 02:15:19'),
(234, 'Agrego la imagen FISICROMIA DE CARLOS CRUZ DIEZ al catalogo Arte Cinetico', '::1', 'INSERT', '1', '2017-11-26 02:15:37', '2017-11-26 02:15:37'),
(235, 'Creo el catalogo Arte Cinetico 2', '::1', 'INSERT', '1', '2017-11-26 02:16:06', '2017-11-26 02:16:06'),
(236, 'Agrego la imagen El Arte de Cruz-Diez y de Hublot al catalogo Arte Cinetico 2', '::1', 'INSERT', '1', '2017-11-26 02:16:26', '2017-11-26 02:16:26'),
(237, 'Agrego la imagen Esculturas en la ciudad de Caracas al catalogo Arte Cinetico 2', '::1', 'INSERT', '1', '2017-11-26 02:16:43', '2017-11-26 02:16:43'),
(238, 'Agrego la imagen La maravillora historia del Arco de Inducción Cromática para la Margarita al catalogo Arte Cinetico 2', '::1', 'INSERT', '1', '2017-11-26 02:17:05', '2017-11-26 02:17:05'),
(239, 'Edito la foto de la portada del artista Cristóbal Rojas', '::1', 'UPDATE', '1', '2017-11-26 02:18:42', '2017-11-26 02:18:42'),
(240, 'Edito la foto de la biografia del artista Cristóbal Rojas', '::1', 'UPDATE', '1', '2017-11-26 02:18:47', '2017-11-26 02:18:47'),
(241, 'Edito la foto de la habilidad del artista Cristóbal Rojas', '::1', 'UPDATE', '1', '2017-11-26 02:19:35', '2017-11-26 02:19:35'),
(242, 'Creo el catalogo Pinturas 1 Cristobal Rojas', '::1', 'INSERT', '1', '2017-11-26 02:20:07', '2017-11-26 02:20:07'),
(243, 'Agrego la imagen Primera y ultima comunión al catalogo Pinturas 1 Cristobal Rojas', '::1', 'INSERT', '1', '2017-11-26 02:21:00', '2017-11-26 02:21:00'),
(244, 'Agrego la imagen Ruinas de Cúa después del Terremoto de 1882 al catalogo Pinturas 1 Cristobal Rojas', '::1', 'INSERT', '1', '2017-11-26 02:21:17', '2017-11-26 02:21:17'),
(245, 'Agrego la imagen Cristobal Rojas al catalogo Pinturas 1 Cristobal Rojas', '::1', 'INSERT', '1', '2017-11-26 02:21:32', '2017-11-26 02:21:32'),
(246, 'Agrego la imagen Óleo sobre tela al catalogo Pinturas 1 Cristobal Rojas', '::1', 'INSERT', '1', '2017-11-26 02:21:53', '2017-11-26 02:21:53'),
(247, 'Agrego la imagen Ruinas de Cúa después del Terremoto de 1882 al catalogo Pinturas 1 Cristobal Rojas', '::1', 'INSERT', '1', '2017-11-26 02:22:15', '2017-11-26 02:22:15'),
(248, 'Edito la foto de la portada del artista Emilio Boggio', '::1', 'UPDATE', '1', '2017-11-26 02:24:05', '2017-11-26 02:24:05'),
(249, 'Edito la foto de la biografia del artista Emilio Boggio', '::1', 'UPDATE', '1', '2017-11-26 02:24:10', '2017-11-26 02:24:10'),
(250, 'Edito la foto de la habilidad del artista Emilio Boggio', '::1', 'UPDATE', '1', '2017-11-26 02:24:18', '2017-11-26 02:24:18'),
(251, 'Creo el catalogo Pinturas Emilio Boggio', '::1', 'INSERT', '1', '2017-11-26 02:24:47', '2017-11-26 02:24:47'),
(252, 'Agrego la imagen Amantes de las Artes Plásticas Venezolanas al catalogo Pinturas Emilio Boggio', '::1', 'INSERT', '1', '2017-11-26 02:25:52', '2017-11-26 02:25:52'),
(253, 'Agrego la imagen Le Moulin de Perigny al catalogo Pinturas Emilio Boggio', '::1', 'INSERT', '1', '2017-11-26 02:26:15', '2017-11-26 02:26:15'),
(254, 'Agrego la imagen La Manson de campagne al catalogo Pinturas Emilio Boggio', '::1', 'INSERT', '1', '2017-11-26 02:26:29', '2017-11-26 02:26:29'),
(255, 'Agrego la imagen Curiosidades de Emilio Boggio al catalogo Pinturas Emilio Boggio', '::1', 'INSERT', '1', '2017-11-26 02:26:46', '2017-11-26 02:26:46'),
(256, 'Agrego la imagen Retrato de la Sra. Dupuy al catalogo Pinturas Emilio Boggio', '::1', 'INSERT', '1', '2017-11-26 02:27:05', '2017-11-26 02:27:05'),
(257, 'Agrego la imagen Curiosidades de Emilio Boggio al catalogo Pinturas Emilio Boggio', '::1', 'INSERT', '1', '2017-11-26 02:27:29', '2017-11-26 02:27:29'),
(258, 'Agrego la imagen Emilio Boggio Oleo sobre tela al catalogo Pinturas Emilio Boggio', '::1', 'INSERT', '1', '2017-11-26 02:27:46', '2017-11-26 02:27:46'),
(259, 'Edito la foto de la portada del artista Jesús Rafael Soto', '::1', 'UPDATE', '1', '2017-11-26 02:29:04', '2017-11-26 02:29:04'),
(260, 'Edito la foto de la biografia del artista Jesús Rafael Soto', '::1', 'UPDATE', '1', '2017-11-26 02:29:10', '2017-11-26 02:29:10'),
(261, 'Edito la foto de la habilidad del artista Jesús Rafael Soto', '::1', 'UPDATE', '1', '2017-11-26 02:29:17', '2017-11-26 02:29:17'),
(262, 'Creo el catalogo Obras Jesus Soto', '::1', 'INSERT', '1', '2017-11-26 02:31:02', '2017-11-26 02:31:02'),
(263, 'Agrego la imagen La esfera Japón al catalogo Obras Jesus Soto', '::1', 'INSERT', '1', '2017-11-26 02:31:30', '2017-11-26 02:31:30'),
(264, 'Agrego la imagen Cubo Policromo al catalogo Obras Jesus Soto', '::1', 'INSERT', '1', '2017-11-26 02:31:50', '2017-11-26 02:31:50'),
(265, 'Agrego la imagen El movimiento en la obra de Jesús Soto al catalogo Obras Jesus Soto', '::1', 'INSERT', '1', '2017-11-26 02:32:16', '2017-11-26 02:32:16'),
(266, 'Agrego la imagen Jesus Rafael Soto al catalogo Obras Jesus Soto', '::1', 'INSERT', '1', '2017-11-26 02:32:40', '2017-11-26 02:32:40'),
(267, 'Agrego la imagen Progresión Amarilla al catalogo Obras Jesus Soto', '::1', 'INSERT', '1', '2017-11-26 02:32:57', '2017-11-26 02:32:57'),
(268, 'Creo el catalogo Obras Jesus Soto 2', '::1', 'INSERT', '1', '2017-11-26 02:34:25', '2017-11-26 02:34:25'),
(269, 'Agrego la imagen Extensión amarilla y blanca al catalogo Obras Jesus Soto 2', '::1', 'INSERT', '1', '2017-11-26 02:34:33', '2017-11-26 02:34:33'),
(270, 'Agrego la imagen Soto al catalogo Obras Jesus Soto 2', '::1', 'INSERT', '1', '2017-11-26 02:34:50', '2017-11-26 02:34:50'),
(271, 'Agrego la imagen Soto al catalogo Obras Jesus Soto 2', '::1', 'INSERT', '1', '2017-11-26 02:35:13', '2017-11-26 02:35:13'),
(272, 'Agrego la imagen Estos gigantes del arte mundial al catalogo Obras Jesus Soto 2', '::1', 'INSERT', '1', '2017-11-26 02:35:38', '2017-11-26 02:35:38'),
(273, 'Creo la etiqueta tecnologia', '::1', 'INSERT', '1', '2017-11-26 02:37:34', '2017-11-26 02:37:34'),
(274, 'Creo la etiqueta Arte', '::1', 'INSERT', '1', '2017-11-26 02:37:45', '2017-11-26 02:37:45'),
(275, 'Creo la etiqueta Dibujo', '::1', 'INSERT', '1', '2017-11-26 02:37:52', '2017-11-26 02:37:52'),
(276, 'Creo la etiqueta Escultura', '::1', 'INSERT', '1', '2017-11-26 02:37:58', '2017-11-26 02:37:58'),
(277, 'Creo la etiqueta Ciencia', '::1', 'INSERT', '1', '2017-11-26 02:38:04', '2017-11-26 02:38:04'),
(278, 'Creo la etiqueta Museo', '::1', 'INSERT', '1', '2017-11-26 02:38:09', '2017-11-26 02:38:09'),
(279, 'Creo la etiqueta Pintura', '::1', 'INSERT', '1', '2017-11-26 02:38:17', '2017-11-26 02:38:17'),
(280, 'Registro la noticia Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '::1', 'INSERT', '1', '2017-11-26 02:38:36', '2017-11-26 02:38:36'),
(281, 'Registro la noticia Nullam sem orci, finibus ac purus eu, fringilla laoreet orci.', '::1', 'INSERT', '1', '2017-11-26 02:38:56', '2017-11-26 02:38:56'),
(282, 'Registro la noticia Praesent posuere magna dapibus nisl luctus,', '::1', 'INSERT', '1', '2017-11-26 02:39:25', '2017-11-26 02:39:25'),
(283, 'Registro la noticia Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', '::1', 'INSERT', '1', '2017-11-26 02:39:51', '2017-11-26 02:39:51'),
(284, 'Registro la noticia Donec dictum ante ut lorem facilisis tempus.', '::1', 'INSERT', '1', '2017-11-26 02:40:16', '2017-11-26 02:40:16'),
(285, 'Registro la noticia In porttitor leo id laoreet ornare.', '::1', 'INSERT', '1', '2017-11-26 02:40:45', '2017-11-26 02:40:45'),
(286, 'Registro la noticia Nulla sodales, eros lacinia egestas rutrum, turpis felis interdum orci, nec vehicula ligula lorem ac leo.', '::1', 'INSERT', '1', '2017-11-26 02:41:16', '2017-11-26 02:41:16'),
(287, 'Registro la noticia Donec molestie ligula at nunc cursus condimentum.', '::1', 'INSERT', '1', '2017-11-26 02:41:48', '2017-11-26 02:41:48'),
(288, 'Registro la noticia ed blandit, ligula ac ullamcorper imperdiet, justo risus pharetra erat,', '::1', 'INSERT', '1', '2017-11-26 02:42:18', '2017-11-26 02:42:18'),
(289, 'Registro la noticia Vestibulum eros urna, tristique quis orci quis, dignissim tristique quam.', '::1', 'INSERT', '1', '2017-11-26 02:42:51', '2017-11-26 02:42:51'),
(290, 'Registro la noticia Ut in est vel lectus lacinia vehicula in non metus.', '::1', 'INSERT', '1', '2017-11-26 02:43:19', '2017-11-26 02:43:19'),
(291, 'Creo el estado civil Soltero', '::1', 'INSERT', '1', '2017-11-29 02:30:39', '2017-11-29 02:30:39'),
(292, 'Creo el estado civil Casado', '::1', 'INSERT', '1', '2017-11-29 02:30:45', '2017-11-29 02:30:45'),
(293, 'Creo el estado civil Divorciado', '::1', 'INSERT', '1', '2017-11-29 02:30:56', '2017-11-29 02:30:56'),
(294, 'Creo el estado civil Viudo(a)', '::1', 'INSERT', '1', '2017-11-29 02:31:18', '2017-11-29 02:31:18'),
(295, 'Edito el estado civil Soltero(a)', '::1', 'UPDATE', '1', '2017-11-29 02:31:23', '2017-11-29 02:31:23'),
(296, 'Edito el estado civil Divorciado(a)', '::1', 'UPDATE', '1', '2017-11-29 02:31:26', '2017-11-29 02:31:26'),
(297, 'Edito el estado civil Casado(a)', '::1', 'UPDATE', '1', '2017-11-29 02:31:29', '2017-11-29 02:31:29'),
(298, 'Creo el grado de instrucción Primaria', '::1', 'INSERT', '1', '2017-11-29 02:56:17', '2017-11-29 02:56:17'),
(299, 'Edito el grado de instrucción Primaria', '::1', 'UPDATE', '1', '2017-11-29 02:56:21', '2017-11-29 02:56:21'),
(300, 'Creo el grado de instrucción Secundaria', '::1', 'INSERT', '1', '2017-11-29 02:56:29', '2017-11-29 02:56:29'),
(301, 'Creo el grado de instrucción T.S.U.', '::1', 'INSERT', '1', '2017-11-29 02:57:12', '2017-11-29 02:57:12'),
(302, 'Creo el grado de instrucción Universitaria', '::1', 'INSERT', '1', '2017-11-29 02:57:31', '2017-11-29 02:57:31'),
(303, 'Creo el grado de instrucción Postgrado', '::1', 'INSERT', '1', '2017-11-29 02:57:38', '2017-11-29 02:57:38'),
(304, 'Creo el grado de instrucción Estudios de Arte', '::1', 'INSERT', '1', '2017-11-29 02:58:05', '2017-11-29 02:58:05'),
(305, 'Creo el tipo de premio Internacional', '::1', 'INSERT', '1', '2017-11-29 03:20:06', '2017-11-29 03:20:06'),
(306, 'Creo el tipo de premio Nacional', '::1', 'INSERT', '1', '2017-11-29 03:20:13', '2017-11-29 03:20:13'),
(307, 'Creo el tipo de premio Municipal', '::1', 'INSERT', '1', '2017-11-29 03:20:21', '2017-11-29 03:20:21'),
(308, 'Agrego la imagen 1/1512003861.jpg para la solicitud ', '::1', 'INSERT', '1', '2017-11-30 01:04:21', '2017-11-30 01:04:21'),
(309, 'Agrego la imagen 1/1512004890.jpg para la solicitud ', '::1', 'INSERT', '1', '2017-11-30 01:21:30', '2017-11-30 01:21:30'),
(310, 'Elimino la imagen 1/1512004890.jpg para la solicitud ', '::1', 'DELETE', '1', '2017-11-30 01:29:08', '2017-11-30 01:29:08'),
(311, 'Agrego la imagen 1/1512005424.jpg para la solicitud ', '::1', 'INSERT', '1', '2017-11-30 01:30:24', '2017-11-30 01:30:24'),
(312, 'Elimino la imagen 1/1512005424.jpg para la solicitud ', '::1', 'DELETE', '1', '2017-11-30 01:30:27', '2017-11-30 01:30:27'),
(313, 'Agrego la imagen 1/1512005441.jpg para la solicitud ', '::1', 'INSERT', '1', '2017-11-30 01:30:41', '2017-11-30 01:30:41'),
(314, 'Agrego la imagen 1/1512005643.jpg para la solicitud ', '::1', 'INSERT', '1', '2017-11-30 01:34:03', '2017-11-30 01:34:03'),
(315, 'Actualizo su foto de perfil', '::1', 'UPDATE', '1', '2017-11-30 01:34:15', '2017-11-30 01:34:15'),
(316, 'Agrego la imagen 1/1512005860.jpg para la solicitud ', '::1', 'INSERT', '1', '2017-11-30 01:37:40', '2017-11-30 01:37:40'),
(317, 'Agrego la imagen 1/1512005870.jpg para la solicitud ', '::1', 'INSERT', '1', '2017-11-30 01:37:50', '2017-11-30 01:37:50'),
(318, 'Elimino la imagen 1/1512005870.jpg para la solicitud ', '::1', 'DELETE', '1', '2017-11-30 01:49:21', '2017-11-30 01:49:21'),
(319, 'Agrego la imagen 1/1512006569.jpg para la solicitud ', '::1', 'INSERT', '1', '2017-11-30 01:49:29', '2017-11-30 01:49:29'),
(320, 'Envio la solicitud ', '::1', 'DELETE', '1', '2017-11-30 01:53:49', '2017-11-30 01:53:49'),
(321, 'Envio la solicitud ', '::1', 'DELETE', '1', '2017-11-30 01:56:21', '2017-11-30 01:56:21'),
(322, 'Envio la solicitud ', '::1', 'DELETE', '1', '2017-11-30 02:01:57', '2017-11-30 02:01:57'),
(323, 'Envio la solicitud ', '::1', 'DELETE', '1', '2017-11-30 02:02:42', '2017-11-30 02:02:42'),
(324, 'Elimino la imagen 1/1512006569.jpg para la solicitud ', '::1', 'DELETE', '1', '2017-11-30 02:03:49', '2017-11-30 02:03:49'),
(325, 'Agrego la imagen 1/1512007435.jpg para la solicitud ', '::1', 'INSERT', '1', '2017-11-30 02:03:55', '2017-11-30 02:03:55'),
(326, 'Actualizo su foto de perfil', '::1', 'UPDATE', '2', '2017-11-30 02:08:50', '2017-11-30 02:08:50'),
(327, 'Agrego la imagen 2/1512007821.jpg para la solicitud ', '::1', 'INSERT', '2', '2017-11-30 02:10:21', '2017-11-30 02:10:21'),
(328, 'Agrego la imagen 2/1512007828.jpg para la solicitud ', '::1', 'INSERT', '2', '2017-11-30 02:10:28', '2017-11-30 02:10:28'),
(329, 'Agrego la imagen 2/1512007836.jpg para la solicitud ', '::1', 'INSERT', '2', '2017-11-30 02:10:36', '2017-11-30 02:10:36'),
(330, 'Agrego la imagen 2/1512007842.jpg para la solicitud ', '::1', 'INSERT', '2', '2017-11-30 02:10:42', '2017-11-30 02:10:42'),
(331, 'Agrego la imagen 2/1512007849.jpg para la solicitud ', '::1', 'INSERT', '2', '2017-11-30 02:10:49', '2017-11-30 02:10:49'),
(332, 'Agrego la imagen 2/1512007860.jpg para la solicitud ', '::1', 'INSERT', '2', '2017-11-30 02:11:00', '2017-11-30 02:11:00'),
(333, 'Envio la solicitud ', '::1', 'DELETE', '2', '2017-11-30 02:11:03', '2017-11-30 02:11:03'),
(334, 'Rechazo la solicitud del solicitante michael daniel rondon pereira 20914008', '::1', 'UPDATE', '1', '2017-11-30 04:06:37', '2017-11-30 04:06:37'),
(335, 'Envio la solicitud ', '::1', 'UPDATE', '2', '2017-11-30 04:07:33', '2017-11-30 04:07:33'),
(336, 'Acepto la solicitud del solicitante michael daniel rondon pereira 20914008', '::1', 'UPDATE', '1', '2017-11-30 04:18:21', '2017-11-30 04:18:21'),
(337, 'Acepto la solicitud del solicitante michael daniel rondon pereira 20914008', '::1', 'UPDATE', '1', '2017-11-30 04:22:04', '2017-11-30 04:22:04'),
(338, 'Acepto la solicitud del solicitante michael daniel rondon pereira 20914008', '::1', 'UPDATE', '1', '2017-11-30 04:24:28', '2017-11-30 04:24:28'),
(339, 'Acepto la solicitud del solicitante michael daniel rondon pereira 20914008', '::1', 'UPDATE', '1', '2017-11-30 04:28:02', '2017-11-30 04:28:02'),
(340, 'Acepto la solicitud del solicitante michael daniel rondon pereira 20914008', '::1', 'UPDATE', '1', '2017-11-30 04:28:32', '2017-11-30 04:28:32'),
(341, 'Agrego la imagen 3/1512059777.jpg para la solicitud ', '::1', 'INSERT', '3', '2017-11-30 16:36:17', '2017-11-30 16:36:17'),
(342, 'Agrego la imagen 3/1512059807.jpg para la solicitud ', '::1', 'INSERT', '3', '2017-11-30 16:36:47', '2017-11-30 16:36:47'),
(343, 'Agrego la imagen 3/1512059824.jpg para la solicitud ', '::1', 'INSERT', '3', '2017-11-30 16:37:05', '2017-11-30 16:37:05'),
(344, 'Agrego la imagen 3/1512059840.jpg para la solicitud ', '::1', 'INSERT', '3', '2017-11-30 16:37:21', '2017-11-30 16:37:21'),
(345, 'Agrego la imagen 3/1512059855.jpg para la solicitud ', '::1', 'INSERT', '3', '2017-11-30 16:37:35', '2017-11-30 16:37:35'),
(346, 'Envio la solicitud ', '::1', 'UPDATE', '3', '2017-11-30 16:38:53', '2017-11-30 16:38:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombres` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedula` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pueblo_indigena` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idiomas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cursos` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relacionados_actividad_artistica` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiempo_actividad_artistica` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `premio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grupo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_grupo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activiades_educativas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apoyo_economico` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empleo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sueldo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ingresos_artisticos` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jubilado` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pensionado` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subsidio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genero_id` int(10) UNSIGNED NOT NULL,
  `estado_civil_id` int(10) UNSIGNED NOT NULL,
  `estado_id` int(10) UNSIGNED NOT NULL,
  `grado_instruccion_id` int(10) UNSIGNED NOT NULL,
  `tipo_premio_id` int(10) UNSIGNED DEFAULT NULL,
  `status_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `nombres`, `apellidos`, `cedula`, `fecha_nacimiento`, `telefono`, `correo`, `direccion`, `pueblo_indigena`, `idiomas`, `cursos`, `relacionados_actividad_artistica`, `tiempo_actividad_artistica`, `premio`, `grupo`, `tipo_grupo`, `activiades_educativas`, `apoyo_economico`, `empleo`, `sueldo`, `ingresos_artisticos`, `jubilado`, `pensionado`, `subsidio`, `genero_id`, `estado_civil_id`, `estado_id`, `grado_instruccion_id`, `tipo_premio_id`, `status_id`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 'michael daniel', 'rondon pereira', '20914008', '1993-02-27', '(424) 178-1403', 'mrondon72@gmail.com', 'calle veracruz casa nro 6 el manicomio la pastora', 'No', 'No', 'especialización en php', 'No', '0', 'Sí', 'No', NULL, 'Sí', 'No', 'Sí', 'sueldo minimo', 'No', 'No', 'No', 'No', 2, 1, 10, 3, 3, 12, 2, '2017-11-30 02:10:11', '2017-11-30 04:21:40'),
(6, 'jorbeth Gregorio', 'Cordoba', '19509306', '1989-06-25', '(414) 630-9997', 'jorbethcordoba21@hotmail.com', 'Los Frailes de Catia', 'No', 'No', 'bla bla', 'No', '5', 'Sí', 'No', NULL, NULL, 'No', 'Sí', '187000', 'No', 'No', 'No', 'No', 2, 1, 10, 3, 2, 10, 3, '2017-11-30 16:35:47', '2017-11-30 16:38:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_imagen`
--

CREATE TABLE `solicitud_imagen` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solicitud_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `solicitud_imagen`
--

INSERT INTO `solicitud_imagen` (`id`, `imagen`, `solicitud_id`, `created_at`, `updated_at`) VALUES
(11, '2/1512007821.jpg', 5, '2017-11-30 02:10:21', '2017-11-30 02:10:21'),
(12, '2/1512007828.jpg', 5, '2017-11-30 02:10:28', '2017-11-30 02:10:28'),
(13, '2/1512007836.jpg', 5, '2017-11-30 02:10:36', '2017-11-30 02:10:36'),
(14, '2/1512007842.jpg', 5, '2017-11-30 02:10:42', '2017-11-30 02:10:42'),
(15, '2/1512007849.jpg', 5, '2017-11-30 02:10:49', '2017-11-30 02:10:49'),
(16, '2/1512007860.jpg', 5, '2017-11-30 02:11:00', '2017-11-30 02:11:00'),
(17, '3/1512059777.jpg', 6, '2017-11-30 16:36:17', '2017-11-30 16:36:17'),
(18, '3/1512059807.jpg', 6, '2017-11-30 16:36:47', '2017-11-30 16:36:47'),
(19, '3/1512059824.jpg', 6, '2017-11-30 16:37:04', '2017-11-30 16:37:04'),
(20, '3/1512059840.jpg', 6, '2017-11-30 16:37:20', '2017-11-30 16:37:20'),
(21, '3/1512059855.jpg', 6, '2017-11-30 16:37:35', '2017-11-30 16:37:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Activo', '2017-11-25 21:50:22', '2017-11-25 21:50:22'),
(2, 'Inactivo', '2017-11-25 21:50:22', '2017-11-25 21:50:22'),
(3, 'Disponible', '2017-11-25 21:50:22', '2017-11-25 21:50:22'),
(4, 'Restringido', '2017-11-25 21:50:22', '2017-11-25 21:50:22'),
(5, 'Bloqueado', '2017-11-25 21:50:22', '2017-11-25 21:50:22'),
(6, 'Pendiente', '2017-11-25 21:50:22', '2017-11-25 21:50:22'),
(7, 'En edición', '2017-11-25 21:50:22', '2017-11-25 21:50:22'),
(8, 'Publicado', '2017-11-25 21:50:22', '2017-11-25 21:50:22'),
(9, 'En proceso', '2017-11-29 12:21:11', '2017-11-29 12:21:11'),
(10, 'En evaluación', '2017-11-29 12:21:11', '2017-11-29 12:21:11'),
(11, 'Rechazado', '2017-11-29 12:21:11', '2017-11-29 12:21:11'),
(12, 'Aceptado', '2017-11-29 12:21:11', '2017-11-29 12:21:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_museos`
--

CREATE TABLE `tipos_museos` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_museo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_museos`
--

INSERT INTO `tipos_museos` (`id`, `tipo_museo`, `created_at`, `updated_at`) VALUES
(1, 'Contemporáneo', '2017-11-25 22:24:57', '2017-11-25 22:24:57'),
(2, 'Moderno', '2017-11-25 22:25:06', '2017-11-25 22:25:06'),
(3, 'Ciencia', '2017-11-25 23:53:44', '2017-11-25 23:53:44'),
(4, 'Tecnología', '2017-11-25 23:53:58', '2017-11-25 23:53:58'),
(5, 'Historia Natural', '2017-11-25 23:54:12', '2017-11-25 23:54:12'),
(6, 'Arte Venezolano', '2017-11-26 00:16:05', '2017-11-26 00:16:05'),
(7, 'Arte Internacional', '2017-11-26 00:16:15', '2017-11-26 00:16:15'),
(8, 'Arte', '2017-11-26 00:39:28', '2017-11-26 00:39:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_premios`
--

CREATE TABLE `tipos_premios` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_premio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_premios`
--

INSERT INTO `tipos_premios` (`id`, `tipo_premio`, `created_at`, `updated_at`) VALUES
(1, 'Internacional', '2017-11-29 03:20:06', '2017-11-29 03:20:06'),
(2, 'Nacional', '2017-11-29 03:20:13', '2017-11-29 03:20:13'),
(3, 'Municipal', '2017-11-29 03:20:21', '2017-11-29 03:20:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `foto`, `remember_token`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'Michael Rondon', 'mrondon72@gmail.com', '$2y$10$ls3PlzyOxx1WWHVlMzyeSeVZiAAILk98MLvblZkIbiikYHte5Q7mO', '1/1512005655.jpeg', 'MzSi1k4KHHMLtJ3bmYWdQdQNVhRp1n5rwWCnmYr824CKPOCJ6aUQFwWfgdGe', 1, '2017-11-25 21:50:23', '2017-11-30 01:34:15'),
(2, 'daniel pereira', 'dpereira@gmail.com', '$2y$10$u7WyyBl4ko5XnvAPC8UPcOC4OG6FgVyqlkSddk92UxQYqrmcusRTy', '2/1512007730.jpeg', 'S6p14JmY5hxWuPJEjjMsdRUjLoXBj9RXK26Y2j5C1OhzPBkwpIn1SIEljyfk', 1, '2017-11-30 02:08:30', '2017-11-30 02:08:50'),
(3, 'Jorbeth Gregorio Cordoba', 'Jorbethcordoba21@hotmail.com', '$2y$10$NIa9cVbX05GzmnRE/zLpdOztZdPyLNmSw0tg2PHPN836t0nt0e7EK', 'default.jpg', 'KWHmdrAnIgaxYTPU40eTWQv6A5WaIPdmaGOHuorA3JEY6abERsiJK8BTTUq8', 1, '2017-11-30 16:29:58', '2017-11-30 16:29:58');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artistas`
--
ALTER TABLE `artistas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artistas_status_id_foreign` (`status_id`),
  ADD KEY `artistas_genero_id_foreign` (`genero_id`),
  ADD KEY `artistas_pais_nacimiento_id_foreign` (`pais_nacimiento_id`),
  ADD KEY `artistas_pais_muerte_id_foreign` (`pais_muerte_id`);

--
-- Indices de la tabla `artista_catalogo`
--
ALTER TABLE `artista_catalogo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artista_catalogo_artista_id_foreign` (`artista_id`),
  ADD KEY `artista_catalogo_status_id_foreign` (`status_id`);

--
-- Indices de la tabla `artista_catalogo_disciplina`
--
ALTER TABLE `artista_catalogo_disciplina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artista_catalogo_disciplina_artista_catalogo_id_foreign` (`artista_catalogo_id`),
  ADD KEY `artista_catalogo_disciplina_disciplina_id_foreign` (`disciplina_id`);

--
-- Indices de la tabla `artista_catalogo_imagen`
--
ALTER TABLE `artista_catalogo_imagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artista_catalogo_imagen_artista_catalogo_id_foreign` (`artista_catalogo_id`),
  ADD KEY `artista_catalogo_imagen_status_id_foreign` (`status_id`);

--
-- Indices de la tabla `artista_disciplina`
--
ALTER TABLE `artista_disciplina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artista_disciplina_artista_id_foreign` (`artista_id`),
  ADD KEY `artista_disciplina_disciplina_id_foreign` (`disciplina_id`);

--
-- Indices de la tabla `artista_habilidad`
--
ALTER TABLE `artista_habilidad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artista_habilidad_artista_id_foreign` (`artista_id`);

--
-- Indices de la tabla `artista_museo`
--
ALTER TABLE `artista_museo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artista_museo_museo_id_foreign` (`museo_id`),
  ADD KEY `artista_museo_artista_id_foreign` (`artista_id`);

--
-- Indices de la tabla `artista_profesion`
--
ALTER TABLE `artista_profesion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artista_profesion_artista_id_foreign` (`artista_id`),
  ADD KEY `artista_profesion_profesion_id_foreign` (`profesion_id`);

--
-- Indices de la tabla `artista_red_social`
--
ALTER TABLE `artista_red_social`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artista_red_social_artista_id_foreign` (`artista_id`),
  ADD KEY `artista_red_social_red_social_id_foreign` (`red_social_id`);

--
-- Indices de la tabla `artista_user`
--
ALTER TABLE `artista_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artista_user_artista_id_foreign` (`artista_id`),
  ADD KEY `artista_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `disciplina_solicitud`
--
ALTER TABLE `disciplina_solicitud`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disciplina_solicitud_disciplina_id_foreign` (`disciplina_id`),
  ADD KEY `disciplina_solicitud_solicitud_id_foreign` (`solicitud_id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados_civiles`
--
ALTER TABLE `estados_civiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `etiqueta_noticia`
--
ALTER TABLE `etiqueta_noticia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etiqueta_noticia_noticia_id_foreign` (`noticia_id`),
  ADD KEY `etiqueta_noticia_etiqueta_id_foreign` (`etiqueta_id`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grados_instrucciones`
--
ALTER TABLE `grados_instrucciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `museos`
--
ALTER TABLE `museos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `museos_estado_id_foreign` (`estado_id`),
  ADD KEY `museos_status_id_foreign` (`status_id`);

--
-- Indices de la tabla `museo_directivo`
--
ALTER TABLE `museo_directivo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `museo_directivo_museo_id_foreign` (`museo_id`),
  ADD KEY `museo_directivo_cargo_id_foreign` (`cargo_id`);

--
-- Indices de la tabla `museo_imagen`
--
ALTER TABLE `museo_imagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `museo_imagen_museo_id_foreign` (`museo_id`),
  ADD KEY `museo_imagen_artista_id_foreign` (`artista_id`),
  ADD KEY `museo_imagen_status_id_foreign` (`status_id`);

--
-- Indices de la tabla `museo_servicio`
--
ALTER TABLE `museo_servicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `museo_servicio_museo_id_foreign` (`museo_id`);

--
-- Indices de la tabla `museo_tipo_museo`
--
ALTER TABLE `museo_tipo_museo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `museo_tipo_museo_museo_id_foreign` (`museo_id`),
  ADD KEY `museo_tipo_museo_tipo_museo_id_foreign` (`tipo_museo_id`);

--
-- Indices de la tabla `museo_user`
--
ALTER TABLE `museo_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `museo_user_museo_id_foreign` (`museo_id`),
  ADD KEY `museo_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `noticias_usuario_id_foreign` (`usuario_id`),
  ADD KEY `noticias_status_id_foreign` (`status_id`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfil_user`
--
ALTER TABLE `perfil_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perfil_user_user_id_foreign` (`user_id`),
  ADD KEY `perfil_user_perfil_id_foreign` (`perfil_id`);

--
-- Indices de la tabla `profesiones`
--
ALTER TABLE `profesiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `redes_sociales_icon_id_foreign` (`icon_id`);

--
-- Indices de la tabla `registros_eventos`
--
ALTER TABLE `registros_eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `solicitudes_genero_id_foreign` (`genero_id`),
  ADD KEY `solicitudes_estado_civil_id_foreign` (`estado_civil_id`),
  ADD KEY `solicitudes_estado_id_foreign` (`estado_id`),
  ADD KEY `solicitudes_grado_instruccion_id_foreign` (`grado_instruccion_id`),
  ADD KEY `solicitudes_tipo_premio_id_foreign` (`tipo_premio_id`),
  ADD KEY `solicitudes_status_id_foreign` (`status_id`),
  ADD KEY `solicitudes_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `solicitud_imagen`
--
ALTER TABLE `solicitud_imagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `solicitud_imagen_solicitud_foreign` (`solicitud_id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_museos`
--
ALTER TABLE `tipos_museos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_premios`
--
ALTER TABLE `tipos_premios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_status_id_foreign` (`status_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artistas`
--
ALTER TABLE `artistas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `artista_catalogo`
--
ALTER TABLE `artista_catalogo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `artista_catalogo_disciplina`
--
ALTER TABLE `artista_catalogo_disciplina`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `artista_catalogo_imagen`
--
ALTER TABLE `artista_catalogo_imagen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT de la tabla `artista_disciplina`
--
ALTER TABLE `artista_disciplina`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT de la tabla `artista_habilidad`
--
ALTER TABLE `artista_habilidad`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `artista_museo`
--
ALTER TABLE `artista_museo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `artista_profesion`
--
ALTER TABLE `artista_profesion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT de la tabla `artista_red_social`
--
ALTER TABLE `artista_red_social`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `artista_user`
--
ALTER TABLE `artista_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `disciplina_solicitud`
--
ALTER TABLE `disciplina_solicitud`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `estados_civiles`
--
ALTER TABLE `estados_civiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `etiqueta_noticia`
--
ALTER TABLE `etiqueta_noticia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `grados_instrucciones`
--
ALTER TABLE `grados_instrucciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `icons`
--
ALTER TABLE `icons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT de la tabla `museos`
--
ALTER TABLE `museos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `museo_directivo`
--
ALTER TABLE `museo_directivo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `museo_imagen`
--
ALTER TABLE `museo_imagen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `museo_servicio`
--
ALTER TABLE `museo_servicio`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `museo_tipo_museo`
--
ALTER TABLE `museo_tipo_museo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `museo_user`
--
ALTER TABLE `museo_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;
--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `perfil_user`
--
ALTER TABLE `perfil_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `profesiones`
--
ALTER TABLE `profesiones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `registros_eventos`
--
ALTER TABLE `registros_eventos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;
--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `solicitud_imagen`
--
ALTER TABLE `solicitud_imagen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `tipos_museos`
--
ALTER TABLE `tipos_museos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tipos_premios`
--
ALTER TABLE `tipos_premios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `artistas`
--
ALTER TABLE `artistas`
  ADD CONSTRAINT `artistas_genero_id_foreign` FOREIGN KEY (`genero_id`) REFERENCES `generos` (`id`),
  ADD CONSTRAINT `artistas_pais_muerte_id_foreign` FOREIGN KEY (`pais_muerte_id`) REFERENCES `paises` (`id`),
  ADD CONSTRAINT `artistas_pais_nacimiento_id_foreign` FOREIGN KEY (`pais_nacimiento_id`) REFERENCES `paises` (`id`),
  ADD CONSTRAINT `artistas_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Filtros para la tabla `artista_catalogo`
--
ALTER TABLE `artista_catalogo`
  ADD CONSTRAINT `artista_catalogo_artista_id_foreign` FOREIGN KEY (`artista_id`) REFERENCES `artistas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `artista_catalogo_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Filtros para la tabla `artista_catalogo_disciplina`
--
ALTER TABLE `artista_catalogo_disciplina`
  ADD CONSTRAINT `artista_catalogo_disciplina_artista_catalogo_id_foreign` FOREIGN KEY (`artista_catalogo_id`) REFERENCES `artista_catalogo` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `artista_catalogo_disciplina_disciplina_id_foreign` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplinas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `artista_catalogo_imagen`
--
ALTER TABLE `artista_catalogo_imagen`
  ADD CONSTRAINT `artista_catalogo_imagen_artista_catalogo_id_foreign` FOREIGN KEY (`artista_catalogo_id`) REFERENCES `artista_catalogo` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `artista_catalogo_imagen_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Filtros para la tabla `artista_disciplina`
--
ALTER TABLE `artista_disciplina`
  ADD CONSTRAINT `artista_disciplina_artista_id_foreign` FOREIGN KEY (`artista_id`) REFERENCES `artistas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `artista_disciplina_disciplina_id_foreign` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplinas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `artista_habilidad`
--
ALTER TABLE `artista_habilidad`
  ADD CONSTRAINT `artista_habilidad_artista_id_foreign` FOREIGN KEY (`artista_id`) REFERENCES `artistas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `artista_museo`
--
ALTER TABLE `artista_museo`
  ADD CONSTRAINT `artista_museo_artista_id_foreign` FOREIGN KEY (`artista_id`) REFERENCES `artistas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `artista_museo_museo_id_foreign` FOREIGN KEY (`museo_id`) REFERENCES `museos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `artista_profesion`
--
ALTER TABLE `artista_profesion`
  ADD CONSTRAINT `artista_profesion_artista_id_foreign` FOREIGN KEY (`artista_id`) REFERENCES `artistas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `artista_profesion_profesion_id_foreign` FOREIGN KEY (`profesion_id`) REFERENCES `profesiones` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `artista_red_social`
--
ALTER TABLE `artista_red_social`
  ADD CONSTRAINT `artista_red_social_artista_id_foreign` FOREIGN KEY (`artista_id`) REFERENCES `artistas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `artista_red_social_red_social_id_foreign` FOREIGN KEY (`red_social_id`) REFERENCES `redes_sociales` (`id`);

--
-- Filtros para la tabla `artista_user`
--
ALTER TABLE `artista_user`
  ADD CONSTRAINT `artista_user_artista_id_foreign` FOREIGN KEY (`artista_id`) REFERENCES `artistas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `artista_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `disciplina_solicitud`
--
ALTER TABLE `disciplina_solicitud`
  ADD CONSTRAINT `disciplina_solicitud_disciplina_id_foreign` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplinas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `disciplina_solicitud_solicitud_id_foreign` FOREIGN KEY (`solicitud_id`) REFERENCES `solicitudes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `etiqueta_noticia`
--
ALTER TABLE `etiqueta_noticia`
  ADD CONSTRAINT `etiqueta_noticia_etiqueta_id_foreign` FOREIGN KEY (`etiqueta_id`) REFERENCES `etiquetas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `etiqueta_noticia_noticia_id_foreign` FOREIGN KEY (`noticia_id`) REFERENCES `noticias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `museos`
--
ALTER TABLE `museos`
  ADD CONSTRAINT `museos_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `museos_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Filtros para la tabla `museo_directivo`
--
ALTER TABLE `museo_directivo`
  ADD CONSTRAINT `museo_directivo_cargo_id_foreign` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`),
  ADD CONSTRAINT `museo_directivo_museo_id_foreign` FOREIGN KEY (`museo_id`) REFERENCES `museos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `museo_imagen`
--
ALTER TABLE `museo_imagen`
  ADD CONSTRAINT `museo_imagen_artista_id_foreign` FOREIGN KEY (`artista_id`) REFERENCES `artistas` (`id`),
  ADD CONSTRAINT `museo_imagen_museo_id_foreign` FOREIGN KEY (`museo_id`) REFERENCES `museos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `museo_imagen_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Filtros para la tabla `museo_servicio`
--
ALTER TABLE `museo_servicio`
  ADD CONSTRAINT `museo_servicio_museo_id_foreign` FOREIGN KEY (`museo_id`) REFERENCES `museos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `museo_tipo_museo`
--
ALTER TABLE `museo_tipo_museo`
  ADD CONSTRAINT `museo_tipo_museo_museo_id_foreign` FOREIGN KEY (`museo_id`) REFERENCES `museos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `museo_tipo_museo_tipo_museo_id_foreign` FOREIGN KEY (`tipo_museo_id`) REFERENCES `tipos_museos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `museo_user`
--
ALTER TABLE `museo_user`
  ADD CONSTRAINT `museo_user_museo_id_foreign` FOREIGN KEY (`museo_id`) REFERENCES `museos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `museo_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `noticias_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `perfil_user`
--
ALTER TABLE `perfil_user`
  ADD CONSTRAINT `perfil_user_perfil_id_foreign` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `perfil_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  ADD CONSTRAINT `redes_sociales_icon_id_foreign` FOREIGN KEY (`icon_id`) REFERENCES `icons` (`id`);

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_estado_civil_id_foreign` FOREIGN KEY (`estado_civil_id`) REFERENCES `estados_civiles` (`id`),
  ADD CONSTRAINT `solicitudes_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `solicitudes_genero_id_foreign` FOREIGN KEY (`genero_id`) REFERENCES `generos` (`id`),
  ADD CONSTRAINT `solicitudes_grado_instruccion_id_foreign` FOREIGN KEY (`grado_instruccion_id`) REFERENCES `grados_instrucciones` (`id`),
  ADD CONSTRAINT `solicitudes_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `solicitudes_tipo_premio_id_foreign` FOREIGN KEY (`tipo_premio_id`) REFERENCES `tipos_premios` (`id`),
  ADD CONSTRAINT `solicitudes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `solicitud_imagen`
--
ALTER TABLE `solicitud_imagen`
  ADD CONSTRAINT `solicitud_imagen_solicitud_foreign` FOREIGN KEY (`solicitud_id`) REFERENCES `solicitudes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
