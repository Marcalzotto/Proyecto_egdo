CREATE DATABASE  IF NOT EXISTS `egdo_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `egdo_db`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: egdo_db
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.13-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `info_viaje`
--

DROP TABLE IF EXISTS `info_viaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `info_viaje` (
  `id_info_viaje` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_lugar` varchar(45) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `imagen` varchar(45) NOT NULL,
  `imagen1` varchar(45) NOT NULL,
  `imagen2` varchar(45) NOT NULL,
  `imagen3` varchar(45) NOT NULL,
  `descripcion1` varchar(250) NOT NULL,
  `descripcion2` varchar(250) NOT NULL,
  `descripcion3` varchar(250) NOT NULL,
  PRIMARY KEY (`id_info_viaje`),
  KEY `id_actividad` (`id_actividad`),
  KEY `info_viaje_ibfk_3` (`id_usuario`),
  CONSTRAINT `info_viaje_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`),
  CONSTRAINT `info_viaje_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`),
  CONSTRAINT `info_viaje_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_viaje`
--

LOCK TABLES `info_viaje` WRITE;
/*!40000 ALTER TABLE `info_viaje` DISABLE KEYS */;
INSERT INTO `info_viaje` (`id_info_viaje`, `nombre_lugar`, `descripcion`, 
`id_actividad`, `id_usuario`, `imagen`, `imagen1`, `imagen2`, `imagen3`, 
`descripcion1`, `descripcion2`, `descripcion3`) VALUES (1,'Bariloche',
'Se encuentra en la provincia de Rio negro',5,1,'Bariloche.jpg','cerro_catedral.jpg',
'rafting_bariloche.jpg','cerebro_bariloche.jpg','Cerros: el cerro catedral es el centro 
de esquÃ­ mÃ¡s grande del hemisferio sur y ofrece una amplia infraestructura de 
servicios para la prÃ¡ctica de deportes invernales. EstÃ¡ abierto todo el aÃ±o 
y cuenta con 40 medios de elevaciÃ³n (entre aerosill','Rafting RÃ­o Limay: 
una propuesta ideal para compartir en familia o con amigos, navegando un rÃ­o 
tranquilo y de aguas cristalinas, con remansos y corrientes suaves, a pocos
 kilÃ³metros de la ciudad de Bariloche.','Discos: Cerebro fue inaugurada en el 
aÃ±o 1980 siendo la mÃ¡s tradicional e innovadora de las discotecas de Bariloche, 
con su decoraciÃ³n de vanguardia y sus 1500 m2 alberga a 1600 personas, cuenta con 
salÃ³n vip, equipamiento tecnolÃ³gico de vanguar'),
(2,'Dique San Roque','Se encuentra en la provincia de Cordoba',5,1,'
dique_sanroque2.jpg','dique_sanroque.jpg','pekos_cordoba.jpg','reloj-cucu_.JPG',
'El Dique San Roque es considerado uno de los mÃ¡s grandes del mundo, debido a la 
capacidad de su Embalse que puede contener 250 millones de metros cÃºbicos de agua, 
se puede acceder a Ã©l con una travesÃ­a fluvial o transitando el camino â€œDe las ci'
,'Pekoâ€™s ofrece a sus visitantes una experiencia Ãºnica, que combina el disfrute y 
aprendizaje de la naturaleza con la emociÃ³n de las mÃ¡s divertidas atracciones y 
juegos Un lugar especialmente diseÃ±ado para brindar esparcimiento, recreaciÃ³n y 
seg','El principal atractivo del reloj cucÃº es el pÃ¡jaro de madera articulado que 
cada media hora sale de su cÃ¡lida guarida para anunciar el paso de otra media hora. 
Para contemplar esta apariciÃ³n es necesario seguir la Av. Uruguay y atravesar el puent')
,(3,'Camboriu','Se encuentra en Brasil',5,1,'brasil_RioDeJaneiro.jpg',
'balneario_camboriu.jpg','cristo_luz_camboriu.jpg','waterplay_camboriu.jpg',
'El Balneario de CamboriÃº posee exuberantes y hermosas playas, las cuÃ¡les se 
destacan por ser un agradable atractivo para el turismo tanto nacional como 
internacional. Si bien vale la pena visitarlas a todas, la Playa Central logra imponerse
 por sob','Cristo Luz: dos de sus mayores privilegios son las increÃ­bles vistas que 
permite obtener de toda la ciudad y el espectÃ¡culo de luces de 86 tonos que se inicia 
todos los dÃ­as a las 20hs. Este show, que puede divisarse desde hasta 15 kilÃ³metros 
de ','Water Play: el complejo dispone de 7 piscinas, 5 cinco toboganes de agua todo 
incluido y la parte de actividades de barro, trecking hasta un mirador sobre el morro, 
circuito de supervivencia, tirolesa, metegol humano, football mixto, mareados, ring h'),
(4,'San Rafael','Se encuentra en la provincia de Mendoza',5,1,'San Rafael.jpg',
'Canon del Atuel.jpg','Embalse valle grande.jpg','Bodega la abeja.jpg','El caÃ±Ã³n 
del Atuel es un estrecho caÃ±Ã³n a travÃ©s del cual fluye el rÃ­o Atuel. 
Se encuentra en el Valle Grande, perteneciente al departamento San Rafael, en la 
provincia de Mendoza.','El Embalse Valle Grande es un cuerpo de agua en el centro 
de la provincia de Mendoza, en Argentina. Situado a unos 30 km al sur de San Rafael, 
constituye uno de los destinos turÃ­sticos mÃ¡s importantes del departamento homÃ³nimo 
y de la provincia.','Finca y bodega La Abeja, se trata de la primera bodega de San 
Rafael, construida en 1883 por Rodolfo Iselin.'),(5,'Mar del plata','Se encuentra en 
la provincia de Bs As',5,1,'mardelplata.jpg','balnearios_mardelplata.jpg','Aquarium.jpg',
'Aquasol.jpg','Entre otras playas marplatenses, se encuentran las siguientes:las 
populares que estÃ¡n en el centro (Bristol, Popular, Punta Iglesia, Las Toscas); 
las tradicionales de La Perla; las frecuentadas por surfistas (Playa Grande) y las 
mÃ¡s amplias (Punta ','Es uno de los parques marinos mÃ¡s importantes de Argentina, 
situado junto al Faro de Punta Mogotes. Posee una esplendida coleccion de pinguinos
, peces, mamiferos marinos y aves exoticas y autoctonas, los visitantes disfrutan 
de los magnificos','Aquasol Parque Acuatico, ubicado en la Costa AtlÃ¡ntica. 
Con increÃ­bles y siempre renovadas atracciones. LÃ­der en recreacion participativa
, elegido por el publico de todas las edades desde hace 25 años. Viva­ una jornada 
unica, sorprendente e '),(6,'Cancun','Se encuentra en Mexico',5,1,'Cancun.jpg',
'islamujeres_mexico.jpg','jungletour_cancun.jpg','playadelcarmen_cancun.jpg',
'La zona costera de Isla Mujeres se distingue por contar con aguas cristalinas,
 calmadas y de poca profundidad. Otra parte popular de la insula es el Parque Nacional
 El Garrafon, que cuenta con comodas instalaciones y atractivos como el templo de I',
'Una inolvidable experiencia que no debes perderte en Cancun es la de conducir tu 
propia embarcacion en el Jungle Tour Sunrise Marina. ¿Imagina llegar hasta el 
segundo arrecife de coral mas grande del mundo? Sera una extraodinaria aventura, 
donde','Las playas de Playa del Carmen se caracterizan por ser accesibles 
practicamente desde cualquier punto de la Quinta Avenida, asi como por 
su suave oleaje y arena blanca. Mientras de dia son el espacio predilecto para 
tomar el sol y descansar, de no');
/*!40000 ALTER TABLE `info_viaje` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-25 21:18:46
