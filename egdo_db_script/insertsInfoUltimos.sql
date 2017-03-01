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
  CONSTRAINT `info_viaje_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `info_viaje_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_viaje`
--

LOCK TABLES `info_viaje` WRITE;
/*!40000 ALTER TABLE `info_viaje` DISABLE KEYS */;
INSERT INTO `info_viaje` VALUES (10,'Cancun','Se encuentra en Mexico',5,1,'img_destinos/6Cancun.jpg','img_destinos/11playadelcarmen_cancun.jpg','img_destinos/9jungletour_cancun.jpg','img_destinos/4islamujeres_mexico.jpg','Las playas de Playa del Carmen se caracterizan por ser accesibles prÃ¡cticamente desde cualquier punto de la Quinta Avenida, asÃ­ como por su suave oleaje y arena blanca. Mientras de dÃ­a son el espacio predilecto para tomar el sol y descansar, de no','Una inolvidable experiencia que no debes perderte en CancÃºn es la de conducir tu propia embarcaciÃ³n en el Jungle Tour Sunrise Marina. Â¿Imagina llegar hasta el segundo arrecife de coral mÃ¡s grande del mundo? SerÃ¡ una extraodinaria aventura, donde','La zona costera de Isla Mujeres se distingue por contar con aguas cristalinas, calmadas y de poca profundidad. Otra parte popular de la Ã­nsula es el Parque Nacional El GarrafÃ³n, que cuenta con cÃ³modas instalaciones y atractivos como el templo de I'),(13,'Mar del plata','Se encuentra en la provincia de Bs As',5,1,'img_destinos/10mardelplata.jpg','img_destinos/15balnearios_mardelplata.jpg','img_destinos/18Aquarium.jpg','img_destinos/16Aquasol.jpg','Entre otras playas marplatenses, se encuentran las siguientes:las populares que estÃ¡n en el centro (Bristol, Popular, Punta Iglesia, Las Toscas); las tradicionales de La Perla; las frecuentadas por surfistas (Playa Grande) y las mÃ¡s amplias (Punta ','Es uno de los parques marinos mÃ¡s importantes de Argentina, situado junto al Faro de Punta Mogotes. Posee una esplÃ©ndida colecciÃ³n de pingÃ¼inos, peces, mamÃ­feros marinos y aves exÃ³ticas y autÃ³ctonas, los visitantes disfrutan de los magnÃ­ficos','Aquasol Parque AcuÃ¡tico, ubicado en la Costa AtlÃ¡ntica. Con increÃ­bles y siempre renovadas atracciones. LÃ­der en recreaciÃ³n participativa, elegido por el pÃºblico de todas las edades desde hace 25 aÃ±os. VivÃ­ una jornada Ãºnica, sorprendente e '),(14,'San Rafael','Se encuentra en Mendoza',5,1,'img_destinos/7San Rafael.jpg','img_destinos/8Canon del Atuel.jpg','img_destinos/17Bodega la abeja.jpg','img_destinos/18Embalse valle grande.jpg','El caÃ±Ã³n del Atuel es un estrecho caÃ±Ã³n a travÃ©s del cual fluye el rÃ­o Atuel. Se encuentra en el Valle Grande, perteneciente al departamento San Rafael, en la provincia de Mendoza.','Finca y bodega La Abeja, se trata de la primera bodega de San Rafael, construida en 1883 por Rodolfo Iselin.','El Embalse Valle Grande es un cuerpo de agua en el centro de la provincia de Mendoza, en Argentina. Situado a unos 30 km al sur de San Rafael, constituye uno de los destinos turÃ­sticos mÃ¡s importantes del departamento homÃ³nimo y de la provincia.'),(15,'Camboriu','Se encuentra en Brasil',5,1,'img_destinos/2brasil_RioDeJaneiro.jpg','img_destinos/3cristo_luz_camboriu.jpg','img_destinos/5balneario_camboriu.jpg','img_destinos/20waterplay_camboriu.jpg','Cristo Luz: dos de sus mayores privilegios son las increÃ­bles vistas que permite obtener de toda la ciudad y el espectÃ¡culo de luces de 86 tonos que se inicia todos los dÃ­as a las 20hs. Este show, que puede divisarse desde hasta 15 kilÃ³metros de ','El Balneario de CamboriÃº posee exuberantes y hermosas playas, las cuÃ¡les se destacan por ser un agradable atractivo para el turismo tanto nacional como internacional. Si bien vale la pena visitarlas a todas, la Playa Central logra imponerse por sob','Water Play: el complejo dispone de 7 piscinas, 5 cinco toboganes de agua todo incluido y la parte de actividades de barro, trecking hasta un mirador sobre el morro, circuito de supervivencia, tirolesa, metegol humano, football mixto, mareados, ring h'),(16,'Dique San Roque','Se encuentra en la provincia de Cordoba',5,1,'img_destinos/10dique_sanroque2.jpg','img_destinos/0dique_sanroque.jpg','img_destinos/9pekos_cordoba.jpg','img_destinos/19reloj-cucu_.JPG','El Dique San Roque es considerado uno de los mÃ¡s grandes del mundo, debido a la capacidad de su Embalse que puede contener 250 millones de metros cÃºbicos de agua, se puede acceder a Ã©l con una travesÃ­a fluvial o transitando el camino â€œDe las ci','Pekoâ€™s ofrece a sus visitantes una experiencia Ãºnica, que combina el disfrute y aprendizaje de la naturaleza con la emociÃ³n de las mÃ¡s divertidas atracciones y juegos Un lugar especialmente diseÃ±ado para brindar esparcimiento, recreaciÃ³n y seg','El principal atractivo del reloj cucÃº es el pÃ¡jaro de madera articulado que cada media hora sale de su cÃ¡lida guarida para anunciar el paso de otra media hora. Para contemplar esta apariciÃ³n es necesario seguir la Av. Uruguay y atravesar el puent'),(17,'Bariloche','Se encuentra en la provincia de Rio negro',5,1,'img_destinos/20Bariloche.jpg','img_destinos/18cerro_catedral.jpg','img_destinos/19rafting_bariloche.jpg','img_destinos/6cerebro_bariloche.jpg','Cerros: el cerro catedral es el centro de esquÃ­ mÃ¡s grande del hemisferio sur y ofrece una amplia infraestructura de servicios para la prÃ¡ctica de deportes invernales. EstÃ¡ abierto todo el aÃ±o y cuenta con 40 medios de elevaciÃ³n (entre aerosill','Rafting RÃ­o Limay: una propuesta ideal para compartir en familia o con amigos, navegando un rÃ­o tranquilo y de aguas cristalinas, con remansos y corrientes suaves, a pocos kilÃ³metros de la ciudad de Bariloche.','Discos: Cerebro fue inaugurada en el aÃ±o 1980 siendo la mÃ¡s tradicional e innovadora de las discotecas de Bariloche, con su decoraciÃ³n de vanguardia y sus 1500 m2 alberga a 1600 personas, cuenta con salÃ³n vip, equipamiento tecnolÃ³gico de vanguar');
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

-- Dump completed on 2017-03-01 11:25:30
