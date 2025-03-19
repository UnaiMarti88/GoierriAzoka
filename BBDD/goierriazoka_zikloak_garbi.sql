-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 21-02-2024 a las 08:52:34
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
-- Base de datos: `goierriazoka`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `balorazioa`
--

DROP TABLE IF EXISTS `balorazioa`;
CREATE TABLE `balorazioa` (
  `id` int(11) NOT NULL,
  `ziklo_id` int(11) NOT NULL,
  `erabiltzaile_id` int(11) NOT NULL,
  `balorazioa` smallint(6) NOT NULL,
  `zuzen_erantzun` tinyint(4) NOT NULL,
  `valid` tinyint(1) DEFAULT 0,
  `teacher` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Balorazioen media atera behar bada, ez kontatu 0 daukatenak.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `erabiltzaileak`
--

DROP TABLE IF EXISTS `erabiltzaileak`;
CREATE TABLE `erabiltzaileak` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zikloak`
--

DROP TABLE IF EXISTS `zikloak`;
CREATE TABLE `zikloak` (
  `id` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `izena` varchar(255) NOT NULL,
  `laburbildura` varchar(250) NOT NULL,
  `multimedia_type` int(10) UNSIGNED DEFAULT 0 COMMENT '1 => yt 2 => deskargautako bideoa 3 => argazkia',
  `bideo_esteka` longtext DEFAULT NULL,
  `argazki_esteka` varchar(255) DEFAULT NULL,
  `web_esteka` varchar(250) DEFAULT NULL,
  `deskripzioa` varchar(250) DEFAULT NULL,
  `galdera` longtext NOT NULL,
  `erantzun_zuzena` int(11) NOT NULL,
  `option1` longtext DEFAULT NULL,
  `option2` longtext DEFAULT NULL,
  `option3` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zikloak`
--

INSERT INTO `zikloak` (`id`, `active`, `izena`, `laburbildura`, `multimedia_type`, `bideo_esteka`, `argazki_esteka`, `web_esteka`, `deskripzioa`, `galdera`, `erantzun_zuzena`, `option1`, `option2`, `option3`) VALUES
(1, 1, 'BATXILERGOA-D2 GUNEA', '2104', 1, 'https://www.youtube.com/embed/O51Qv4e8nmU?si=llG0NAngBx4OZgdD', NULL, 'https://www.goierrieskola.eus/oferta_educativa/batxilergoa/', '', 'Zein da lantzen dugun teknologia?', 3, 'LEGO MINDSTORM EV3', 'ARDUINO', 'LEGO SPIKE PRIME'),
(2, 1, '1SG2-A5 GUNEA', '1108', 1, 'https://www.youtube.com/embed/EhWr7PXHNMM?si=a4Fh7oJkLaqgjtnA', NULL, 'https://www.goierrieskola.eus/oferta_educativa/soldadura-eta-galdaragintzako-teknikaria/', NULL, 'Zein udalerritako bandarako egin dute 1SG2 ko ikasleek atril garraiagailua?', 1, 'Lazkao', 'Ordizia', 'Beasain'),
(3, 1, '2SG2-B3 GUNEA', '1107', 1, 'https://www.youtube.com/embed/EhWr7PXHNMM?si=a4Fh7oJkLaqgjtnA', NULL, 'https://www.goierrieskola.eus/oferta_educativa/soldadura-eta-galdaragintzako-teknikaria/', NULL, 'Altzairuaren aleazioaren %-ak ba al du eraginik bere soldagarritasunean?', 1, 'Bai', 'Ez', 'Auskalo'),
(4, 1, '1MT3-D3 GUNEA', '1104', 1, 'https://www.youtube.com/embed/EhWr7PXHNMM?si=a4Fh7oJkLaqgjtnA', NULL, 'https://www.goierrieskola.eus/oferta_educativa/eraikuntza-metalikoetako-goi-mailako-teknikaria/', NULL, 'Nola kalkulatu dute 1MT3 ko ikasleek erronkako estrukturak eskatutako pisuak jasan ditzaken ala ez?', 3, 'Ondo kalibratutako ojimetroa erabiliz', 'Balantza baten laguntzaz', 'Elementu finitu bidezko kalkuluak eginez'),
(5, 1, '1FA4-C1 GUNEA', '2102', 0, '', NULL, 'https://www.goierrieskola.eus/oferta_educativa/fabrikazio-aditiboko-espezializazioa/', NULL, 'Ze aplikazio dira interesgarriak fabrikazio gehigarri bidez egindako produktu batek arrakasta izan dezan?', 2, 'Serie luzea, pieza konplexuak eta pertsonalizatuak', 'Serie laburra, pieza konplexuak eta pertsonalizatuak', 'Serie laburra, pieza xinpleak eta pertsonalizatu gabeak'),
(6, 1, '2MT3-C5 GUNEA', '1112 MAG', 1, 'https://www.youtube.com/embed/EhWr7PXHNMM?si=a4Fh7oJkLaqgjtnA', NULL, 'https://www.goierrieskola.eus/oferta_educativa/eraikuntza-metalikoetako-goi-mailako-teknikaria/', NULL, 'Zein entsegu motaz baliatzen dira eraikuntza metalikotako ikasleak beraien egituretan izan ditzaketen akatsak identifikatu eta zuzentzeko?', 1, 'Saiakuntza Ez Suntsikorrak S.E.S.', 'Saiakuntza Guztiz Suntsikorrak S.G.S', 'Erdizka Neurtutako Dimentsioak E.N.D.'),
(7, 1, 'OMLH (Sukaldeko postua) -B2 GUNEA', '1004 1005', 3, '', 'OMLH_sukaldea.png', 'https://www.goierrieskola.eus/oferta_educativa/sukaldaritzako-eta-jatetxe-arloko-oinarrizko-lanbide-titulua/', NULL, 'Nola izena du 2.mailakoekin egin den erronkak?', 2, 'To the party - Festara goaz', 'Cocinando culturas - Kulturak sukaldatzen', 'Slow food km0'),
(8, 1, 'OMLH (karrozeria, elektromekanika eta mekanizado postua)-A3 GUNEA', '1010', 3, '', 'OMLH_gainontzekoak.png', 'https://www.goierrieskola.eus/oferta_educativa/ibilgailuen-mantenimenduko-oinarrizko-lanbide-titulua-elektromekanika-aukera/', NULL, 'Ze taldetan garatu da patinete elektrikoaren erronka?', 3, 'Karrozeria', 'Mekanizado', 'Elektromekanika'),
(9, 1, 'ING-C2 GUNEA', '2106', 1, 'https://www.youtube.com/embed/S7lSlY-RNok?si=654vfXT6VgKODkZx', NULL, 'https://www.goierrieskola.eus/oferta_educativa/ingeniaritza/', NULL, 'Ingeniaritzako ikasleek garatutako sorgailu eolikoa zein aplikaziotarako da?', 1, ' Errepideetako mezu aldakorreko panelak elikatzeko', 'Errepideetako semaforoak elikatzeko', 'Errepideetako \"radar\"-ak elikatzeko'),
(10, 1, '2MK2-A2 GUNEA', '1211', 0, '', NULL, 'https://www.goierrieskola.eus/oferta_educativa/mantentze-lan-elektromekanikoetako-teknikaria/', '', 'Zer da automata programagarri bat?', 1, 'Kontrol industrialeko sistema bat da, sarrera-gailuen egoera etengabe gainbegiratzen duena eta irteera-gailuen egoera kontrolatzeko programa pertsonalizatuan oinarritutako erabakiak hartzen dituena.', ' Automata programagarriaren inguruan ez da ezer aipatu.', 'Haize konprimatua guztiz beharrezkoa da zilindro hidraulikoak mugitzeko.'),
(11, 1, '1MK2-B5 GUNEA', '1203', 0, '', NULL, 'https://www.goierrieskola.eus/oferta_educativa/mantentze-lan-elektromekanikoetako-teknikaria/', '', 'Zer urrats egin behar dituzte instalatzaile elektrikoek etxeko instalazio bat egiteko?', 1, '<ul>\r\n<li>Instalazioaren eskema edo krokisa egitea, argi-puntuak eta zirkuitu independenteak seinaleztatuta.</li>\r\n<li>Kableatua trazatzea, gainazala edo horma-bularra jartzea nahi den hautatuta.</li>\r\n<li>Giltzak, entxufeak eta kableak jartzea.</li>\r\n<li>Instalazioa berrikustea eta egiaztatzea.</li>\r\n</ul>', 'Hornitzaile elektrikoari, energia kontsumoaren igoera eskatu.', 'Efizienteak ez diren elektro gailuak instalatu noski, errendimendua oso ona dutelako'),
(12, 1, 'AR3-C6 GUNEA', '1204', 1, 'https://www.youtube.com/embed/BwGXgvWYVbs?si=sQmvqGalRepcePsX', NULL, 'https://www.goierrieskola.eus/oferta_educativa/automatizazio-eta-errobotika-industrialeko-goi-mailako-teknikaria/', '', 'Zeintzuk dira automatizazio bat egiteko jarraitu beharreko pausuak?', 2, 'Konpetentziari kopiatu eta ahal den hoberena martxan jarri.', 'Diseinatu, muntatu, programatu eta martxan jarri.', 'Instalatu, erraztu, fregatu eta txukun utzi.'),
(13, 1, 'MK3-D6 GUNEA', '1109', 1, 'https://www.youtube.com/embed/tYoLg0j-Qpc?si=B4EVxqHlvRMUUCVT', NULL, 'https://www.goierrieskola.eus/oferta_educativa/mekatronika-industrialean-goi-mailako-teknikaria/', '', 'Nolako robota ikusi duzu mekatronikako gelan?', 1, 'Pertsonekin batera lan egiteko balio duen robot kolaboratiboa.', ' Robot industriala, bere eremua ondo babesturik egon behar dena.', 'Eskara robota.'),
(14, 1, 'WG eta MG3-C3 GUNEA', '2105', 3, '', '1MG3_1WG3.png', 'https://www.goierrieskola.eus/oferta_educativa/web-aplikazioen-garapeneko-goi-mailako-zikloa/', '', 'Web garapeneko eta Multiplataforma garapeneko eremuen inguruko esaldi hauetatik, zein da egia?', 3, 'Informatikarekin erlazioa duten 3 ziklo daude.', 'Ziklo bakoitza egiteko 3 urte behar dira.', ' Bi ziklo 3 urtetan egin daitezke.'),
(15, 1, 'DF3-C4 GUNEA', '1113', 0, '', NULL, 'https://www.goierrieskola.eus/oferta_educativa/fabrikazio-mekanikoko-diseinuko-teknikaria/', NULL, 'Diseinatzeko, garrantzitsua da fabrikazio prozesuak kontutan izatea?', 1, 'Bai', 'Ez', 'Berdin du'),
(16, 1, 'ME2-A1 GUNEA', '1110', 0, '', NULL, 'https://www.goierrieskola.eus/oferta_educativa/mekanizazioko-teknikaria/', NULL, 'Fresagailuan zerk biratzen du?', 2, 'Piezak', 'Erremintak', 'Langileak'),
(17, 1, 'FM3-D5 GUNEA', '1111 BEREZI', 0, '', NULL, 'https://www.goierrieskola.eus/oferta_educativa/fabrikazio-mekanikozren-produkzioaren-programazioan-goi-mailoako-teknikaria/', NULL, 'Hiru makina hauetatik zein da mekanizatuan erabiltzen ez duguna?', 3, 'Fresagailua', 'Tornoa', 'Puntzonagailua'),
(18, 1, '2ME2-B4 GUNEA', '1201', 0, '', NULL, 'https://www.goierrieskola.eus/oferta_educativa/mekanizazioko-teknikaria/', NULL, '2ME2 mailako ikasleek erabiltzen ikasi dituzten CNC Fresagailu eta tornoetan zein agindurekin jartzen dute biraka?', 3, 'M3', 'M4', 'a) eta b) egokiak dira. Norantza bat edo bestean jartzeko aginduak baitira.'),
(19, 1, 'LUDUS PRL VIRTUAL-A4 GUNEA', '2S14', 1, 'https://www.youtube.com/embed/XJBdP6SJZZE?si=Gir_b4xqpFEmMFkq', NULL, 'https://www.goierrieskola.eus/oferta_educativa/mendekotasun-egoeran-dauden-pertsonei-arretako-teknikaria/', NULL, 'Zein da LUDUS plataformaren helburua?', 3, 'Lan-eremuko arriskuak modu birtualean esperimentatzea, kontzientziazioa areagotu eta istripu-arriskua murrizteko', 'Ikasleak larrialdi-egoeretan jarduteko prestatzea', 'Guztiak zuzenak dira'),
(20, 1, 'PA2-B1 GUNEA', '2S09', 1, 'https://www.youtube.com/embed/ISxSqAZ7bjY?si=5wb3tG5eI3GvKERW', NULL, 'https://www.goierrieskola.eus/oferta_educativa/mendekotasun-egoeran-dauden-pertsonei-arretako-teknikaria/', NULL, 'Zure ustez TAPSD batek ze funtzio betetzen ditu?', 3, 'Osasun higienikoa eskaintzen du', 'Arreta psikologikoa eskaintzen du', 'Biak zuzenak dira'),
(21, 1, 'AF3-D1 GUNEA', '2109-2110-2111', 1, 'https://www.youtube.com/embed/7RGey3e9h4I?si=m2nuvdJ2ZIdM0wci', NULL, 'https://www.goierrieskola.eus/oferta_educativa/administrazio-eta-finantzetako-goi-mailako-teknikaria/', NULL, 'Zein dira administrari baten funtzio nagusiak?', 1, 'Antolaketa, komunikazioa, plangintza eta kontrola', 'Antolaketa, komunikazioa, plangintza eta ikerketa', 'Antolaketa, komunikazioa, plangintza eta ekoizpen prozesuaren eskuartze zuzena.'),
(22, 1, 'IKASLAN-D4 GUNEA', '1112', 1, 'https://www.youtube.com/embed/zDkxaofci9U?si=G7Kbxb6ns3Ky0ibI', NULL, 'https://www.goierrieskola.eus/', '', 'Ikaslan Fundazioak Fabrikazio kontrolatzeko ezartzen ari den sistema berriak zein aukera eskainiko dio erakundeari?', 2, 'Piezak sailkatzeko erraztasunak eskainiko dizkigu\r\n', 'Produktuen kokapena eta biltegiratzea trazatzea ahalbidetuko digu', 'Produktuen Kalitatea bermatzeko balioko du');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `balorazioa`
--
ALTER TABLE `balorazioa`
  ADD PRIMARY KEY (`id`,`ziklo_id`,`erabiltzaile_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indices de la tabla `erabiltzaileak`
--
ALTER TABLE `erabiltzaileak`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `zikloak`
--
ALTER TABLE `zikloak`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `balorazioa`
--
ALTER TABLE `balorazioa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `erabiltzaileak`
--
ALTER TABLE `erabiltzaileak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `zikloak`
--
ALTER TABLE `zikloak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
