-- MySQL dump 10.13  Distrib 5.6.24, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: library
-- ------------------------------------------------------
-- Server version	5.6.24-0ubuntu2

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
-- Table structure for table `emprunts`
--

DROP TABLE IF EXISTS `emprunts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emprunts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personne` varchar(255) NOT NULL,
  `exemplaire` int(11) NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `exemplaire` (`exemplaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emprunts`
--

LOCK TABLES `emprunts` WRITE;
/*!40000 ALTER TABLE `emprunts` DISABLE KEYS */;
/*!40000 ALTER TABLE `emprunts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exemplaires`
--

DROP TABLE IF EXISTS `exemplaires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exemplaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT '10',
  `emprunt_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `book_id` (`book_id`),
  KEY `emprunt_id` (`emprunt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exemplaires`
--

LOCK TABLES `exemplaires` WRITE;
/*!40000 ALTER TABLE `exemplaires` DISABLE KEYS */;
/*!40000 ALTER TABLE `exemplaires` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livres`
--

DROP TABLE IF EXISTS `livres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `livres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `synopsis` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livres`
--

LOCK TABLES `livres` WRITE;
/*!40000 ALTER TABLE `livres` DISABLE KEYS */;
INSERT INTO `livres` VALUES (5,'Ne le dis à personne...','Harlan Coben','Pédiatre, David Beck exerce dans une clinique pour le compte de Medicaid, structure sociale qui prend en charge les pauvres sans couverture sociale. Il aime son métier et l\'exerce avec passion. Mais sa vie a été brisée lorsque son épouse, Elizabeth, qu\'il connaissait depuis l\'enfance, fut assassinée par un tueur sadique qui marquait ses victimes au fer rouge. Huit ans après ce drame, il reçoit un étrange e-mail codé dont la clé n\'était connue que de lui-même et d\'Elizabeth. Abasourdi, David essaie de se souvenir des détails qui entourèrent l\'assassinat de sa femme, dont le propre père, officier de police, identifia formellement le corps. Impatient, il guette le prochain message qui lui donne rendez-vous le lendemain. En cliquant sur un lien hypertexte, il découvre alors le site d\'une caméra de surveillance de rue et dans la foule, il voit, stupéfait, passer Elizabeth qui le regarde en articulant \"Pardon, je t\'aime\"…\r\n\r\nHarlan Coben, traduit pour la première fois en France, offre au lecteur, tenu en haleine jusqu\'à la dernière page, un incroyable thriller parfaitement ciselé. Il a reçu trois des plus grands prix de la littérature à suspense aux États-Unis. --Claude Mesplède --Ce texte fait référence à une édition épuisée ou non disponible de ce titre. ','88062054dde5d5a78bdc6c47cba6cb6137c640e0'),(7,'Le maître des illusions','Donna Tartt','Introduit dans le cercle privilégié d\'une université du Vermont, un jeune boursier californien intègre peu à peu un petit groupe d\'étudiants de la grande bourgeoisie. Il découvre un monde insoupçonné de luxe, d\'arrogance intellectuelle et de sophistication, en même temps que l\'alcool, la drogue et d\'étranges pratiques sataniques. Très vite, il pressent qu\'on lui cache quelque chose de terrible et d\'inavouable, un meurtre sauvage et gratuit qui l\'entraîne, lui et ses camarades, dans un abîme de chantage, de trahison et de cruauté.','3f9f985ac01bff33e62d36c532c93afbfb803e99'),(8,'Da Vinci Code','Dan Brown','De passage à Paris, Robert Langdon, professeur à Havard et spécialiste de symbologie, est appelé d\'urgence au Louvre, en pleine nuit. Jacques Saunière, le conservateur en chef a été retrouvé assassiné au milieu de la Grande Galerie. Au côté du cadavre, la police a trouvé un message codé. Langdon et Sophie Neveu, une brillante cryptographe membre de la police, tentent de le résoudre. Ils sont stupéfaits lorsque les premiers indices le conduisent à l\'oeuvre de Léonard de Vinci. Ils découvrent également que Saunière était membre du Prieuré de Sion, une société secrète dont avaient fait partie Nexton, Boticelli, Léonardo da Vinci, Victor Hugo, et qu\'il protégeait un secret millénaire. L\'enquête de nos deux héros les entraînera à travers la France et le Royaume-Uni, non seulement pour chercher une vérité longtemps cachée concernant la Chrétienté, mais également pour échapper à ceux qui voudraient s\'emparer du secret. Pour réussir, il leur faut résoudre de nombreuses énigmes, et vite, sinon le secret risque d\'être perdu à tout jamais.','7ef2132d9238ae40d21c3e048640a95edb8e3a77'),(9,'1984','George Orwell','L\'origine de 1984 est connue : militant de gauche violemment opposé à la dictature soviétique, George Orwell s\'est inspiré de Staline pour en faire son \"Big Brother\", figure du dictateur absolu et du fonctionnement de l\'URSS des années trente pour dépeindre la société totalitaire ultime. Mais Orwell n\'oublie pas de souligner que les super-puissances adverses sont elles aussi des dictatures...\r\n\r\nCe qui fait la force du roman, outre son thème, c\'est la richesse des personnages, qu\'il s\'agisse du couple qui se forme, malgré la morale étroite du Parti, ou même du policier en chef qui traque les déviants, ex-opposant lui-même, passé dans les rangs du pouvoir... C\'est aussi cette \"novlangue\", affadie et trompeuse, destinée aux \"proles\", et ces formules de propagande (\"L\'ignorance, c\'est la force\") scandées par des foules fanatisées et manipulées.\r\n\r\n1984 est un livre-phare, apologie de la liberté d\'expression contre toutes les dérives, y compris celles des sociétés démocratiques. --Stéphane Nicot ','12bf81b00a86ea9ae3f54ccd54dadd4f44409c39');
/*!40000 ALTER TABLE `livres` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-23 23:18:31
