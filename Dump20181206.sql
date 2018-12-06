CREATE DATABASE  IF NOT EXISTS `concreta` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `concreta`;
-- MySQL dump 10.13  Distrib 8.0.13, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: concreta
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.35-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `calificaciones`
--

DROP TABLE IF EXISTS `calificaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `calificaciones` (
  `id` int(11) NOT NULL,
  `calificacion` int(1) NOT NULL,
  `calificado` int(11) NOT NULL,
  `calificador` int(11) NOT NULL,
  `comentario` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calificaciones`
--

LOCK TABLES `calificaciones` WRITE;
/*!40000 ALTER TABLE `calificaciones` DISABLE KEYS */;
INSERT INTO `calificaciones` VALUES (1,4,1,3,NULL),(2,5,1,5,NULL),(3,4,1,3,'Muy bien, puntual'),(4,5,1,4,'Muy bien todo'),(5,3,1,6,NULL),(6,3,2,4,NULL);
/*!40000 ALTER TABLE `calificaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidades`
--

DROP TABLE IF EXISTS `especialidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidades`
--

LOCK TABLES `especialidades` WRITE;
/*!40000 ALTER TABLE `especialidades` DISABLE KEYS */;
/*!40000 ALTER TABLE `especialidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensajes`
--

DROP TABLE IF EXISTS `mensajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `mensajes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID_1` int(11) NOT NULL,
  `USER_ID_2` int(11) NOT NULL,
  `MENSAJE` text NOT NULL,
  `FECHA_INIT` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `EMISOR_idx` (`USER_ID_1`),
  KEY `RECEPTOR_idx` (`USER_ID_2`),
  CONSTRAINT `EMISOR` FOREIGN KEY (`USER_ID_1`) REFERENCES `users` (`ID`) ON UPDATE NO ACTION,
  CONSTRAINT `RECEPTOR` FOREIGN KEY (`USER_ID_2`) REFERENCES `users` (`ID`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensajes`
--

LOCK TABLES `mensajes` WRITE;
/*!40000 ALTER TABLE `mensajes` DISABLE KEYS */;
INSERT INTO `mensajes` VALUES (1,1,2,'Hola qué hacé','0000-00-00 00:00:00'),(2,1,2,'Necesitaba un presupuesto de','0000-00-00 00:00:00'),(3,3,2,'Lorem Ipsum ','0000-00-00 00:00:00'),(4,1,2,'Lorem Ipsum','0000-00-00 00:00:00'),(5,3,2,'Che','0000-00-00 00:00:00'),(6,11,16,'I know is, something comes at me like that!\' But she did not look at all like the tone of this pool? I am now? That\'ll be a Caucus-race.\'.','1972-04-24 12:58:56'),(7,4,14,'CHAPTER VI. Pig and Pepper For a minute or two. \'They couldn\'t have wanted it much,\' said Alice, who was sitting between them, fast.','1971-09-07 17:12:45'),(8,12,14,'Cat. \'I don\'t even know what it was: at first she would manage it. \'They were obliged to have finished,\' said the Cat; and this was his.','1987-05-15 22:14:54'),(9,9,16,'March Hare said in an offended tone, \'so I can\'t tell you just now what the next thing was to find herself still in sight, hurrying down.','2016-11-13 21:14:05'),(10,11,4,'Said his father; \'don\'t give yourself airs! Do you think you might knock, and I don\'t want to go down the middle, wondering how she would.','1995-04-19 16:12:28'),(11,12,5,'Queen to-day?\' \'I should have liked teaching it tricks very much, if--if I\'d only been the right size again; and the Dormouse said--\' the.','1976-01-16 14:55:57'),(12,7,11,'Queen. \'Their heads are gone, if it please your Majesty,\' he began, \'for bringing these in: but I grow up, I\'ll write one--but I\'m grown.','1993-05-22 13:00:40'),(13,14,12,'I\'m better now--but I\'m a hatter.\' Here the Queen to-day?\' \'I should like to be nothing but the Dormouse fell asleep instantly, and Alice.','2005-09-23 20:38:17'),(14,11,7,'March Hare said in a VERY good opportunity for croqueting one of the lefthand bit. * * * * * * * * * * * * CHAPTER II. The Pool of Tears.','1998-12-23 19:29:36'),(15,10,12,'Duck. \'Found IT,\' the Mouse was bristling all over, and both footmen, Alice noticed, had powdered hair that WOULD always get into her.','1994-07-08 07:14:30'),(16,1,9,'And will talk in contemptuous tones of her own mind (as well as she couldn\'t answer either question, it didn\'t sound at all know whether.','2001-06-12 06:10:22'),(17,12,14,'Alice, feeling very curious to know when the White Rabbit read:-- \'They told me you had been looking over their shoulders, that all the.','1994-08-20 07:21:23'),(18,16,2,'Pig!\' She said it to the dance. Will you, won\'t you, won\'t you, will you, old fellow?\' The Mock Turtle\'s heavy sobs. Lastly, she pictured.','2004-10-18 10:28:39'),(19,13,13,'I was sent for.\' \'You ought to have any pepper in that case I can creep under the sea--\' (\'I haven\'t,\' said Alice)--\'and perhaps you were.','2011-06-23 05:04:07'),(20,15,5,'Alice, who always took a great hurry; \'and their names were Elsie, Lacie, and Tillie; and they all stopped and looked at the end of every.','1984-01-07 23:32:06'),(21,7,4,'YOU are, first.\' \'Why?\' said the Dormouse, who was gently brushing away some dead leaves that lay far below her. \'What CAN all that green.','2003-04-17 19:16:09'),(22,7,16,'CHORUS. (In which the March Hare interrupted in a very poor speaker,\' said the Caterpillar. Alice thought this a very pretty dance,\' said.','1993-04-04 09:15:49'),(23,12,13,'Alice replied, rather shyly, \'I--I hardly know, sir, just at present--at least I mean what I say--that\'s the same size: to be a LITTLE.','1978-06-17 04:56:48'),(24,14,16,'Pigeon in a dreamy sort of a bottle. They all made of solid glass; there was the Duchess\'s cook. She carried the pepper-box in her life.','2009-05-15 17:39:20'),(25,15,12,'Alice in a low curtain she had somehow fallen into the garden, where Alice could speak again. In a little before she found herself in.','2002-04-04 20:31:40'),(26,7,1,'I will prosecute YOU.--Come, I\'ll take no denial; We must have been changed several times since then.\' \'What do you know about it, even if.','2014-07-17 13:45:41'),(27,2,13,'Gryphon, and all of you, and don\'t speak a word till I\'ve finished.\' So they couldn\'t see it?\' So she began thinking over all the same.','1999-01-12 22:22:08'),(28,15,7,'I THINK,\' said Alice. \'Why, there they lay on the trumpet, and then added them up, and began picking them up again as she passed; it was.','2010-05-02 19:10:32'),(29,6,7,'King; and as the Caterpillar called after her. \'I\'ve something important to say!\' This sounded promising, certainly: Alice turned and came.','1988-09-22 09:15:36'),(30,10,6,'When the procession came opposite to Alice, very earnestly. \'I\'ve had nothing yet,\' Alice replied eagerly, for she felt that it was in a.','1975-12-28 05:31:01'),(31,13,13,'There was nothing on it in time,\' said the Lory, who at last it sat for a little of the sort,\' said the March Hare and his friends shared.','2004-11-20 15:20:03'),(32,6,3,'Christmas.\' And she squeezed herself up and throw us, with the bread-and-butter getting so thin--and the twinkling of the Nile On every.','2010-12-20 18:38:55'),(33,1,11,'After a while she ran, as well as she couldn\'t answer either question, it didn\'t sound at all know whether it was growing, and she had.','2005-04-02 10:50:50'),(34,15,11,'Alice alone with the Queen said severely \'Who is it directed to?\' said the Lory positively refused to tell him. \'A nice muddle their.','1987-05-28 12:05:53'),(35,9,1,'Dodo in an offended tone, \'was, that the meeting adjourn, for the first position in which you usually see Shakespeare, in the after-time.','1987-03-09 03:49:54'),(36,4,13,'White Rabbit, who said in a languid, sleepy voice. \'Who are YOU?\' Which brought them back again to the Mock Turtle went on to himself in.','2002-10-29 04:26:13'),(37,3,5,'Caterpillar. \'Not QUITE right, I\'m afraid,\' said Alice, \'and those twelve creatures,\' (she was rather glad there WAS no one else seemed.','1997-08-18 16:14:09'),(38,6,2,'Alice timidly. \'Would you tell me,\' said Alice, \'I\'ve often seen a rabbit with either a waistcoat-pocket, or a serpent?\' \'It matters a.','1992-01-05 10:03:54'),(39,7,11,'Footman, and began smoking again. This time Alice waited patiently until it chose to speak again. In a minute or two, looking for it.','1970-08-22 08:10:44'),(40,7,15,'The Cat only grinned a little timidly: \'but it\'s no use going back to the porpoise, \"Keep back, please: we don\'t want to go! Let me.','2004-05-15 11:29:34'),(41,14,1,'Even the Duchess sang the second time round, she found a little ledge of rock, and, as the question was evidently meant for her. \'Yes!\'.','2016-12-25 14:26:09'),(42,11,15,'Tortoise because he was gone, and, by the Hatter, with an M--\' \'Why with an important air, \'are you all ready? This is the reason so many.','2012-09-28 11:23:12'),(43,9,7,'Gryphon as if he would deny it too: but the Dormouse indignantly. However, he consented to go with Edgar Atheling to meet William and.','1973-07-09 10:16:42'),(44,15,1,'She generally gave herself very good height indeed!\' said the Duck. \'Found IT,\' the Mouse to tell you--all I know all sorts of things, and.','1975-08-01 14:01:25'),(45,1,4,'Alice more boldly: \'you know you\'re growing too.\' \'Yes, but I shall fall right THROUGH the earth! How funny it\'ll seem to see that she.','2011-03-28 12:10:25'),(46,4,2,'Alice began telling them her adventures from the roof. There were doors all round the rosetree; for, you see, Alice had got so much.','2002-04-13 15:18:37'),(47,13,4,'Hatter, \'or you\'ll be asleep again before it\'s done.\' \'Once upon a little nervous about it while the rest of it now in sight, and no more.','1988-08-07 19:34:57'),(48,9,3,'Alice, she went on in a hot tureen! Who for such a noise inside, no one else seemed inclined to say it over) \'--yes, that\'s about the.','1980-07-05 01:08:10'),(49,3,12,'Hatter and the jury wrote it down \'important,\' and some were birds,) \'I suppose they are the jurors.\' She said the young Crab, a little.','1977-11-07 13:17:27'),(50,4,2,'With gently smiling jaws!\' \'I\'m sure I\'m not particular as to bring tears into her eyes--and still as she added, \'and the moral of that.','2012-05-22 06:25:18'),(51,15,12,'Come on!\' \'Everybody says \"come on!\" here,\' thought Alice, \'and if it had come back with the Gryphon. \'The reason is,\' said the Duchess.','2005-10-29 17:11:04'),(52,4,16,'I\'ll be jury,\" Said cunning old Fury: \"I\'ll try the experiment?\' \'HE might bite,\' Alice cautiously replied, not feeling at all a pity. I.','1970-10-07 04:18:13'),(53,4,14,'Alice. \'And be quick about it,\' added the Gryphon, half to Alice. \'Nothing,\' said Alice. \'Then you shouldn\'t talk,\' said the Gryphon as if.','2013-06-05 09:04:50'),(54,3,11,'Queen was in the direction in which case it would like the Mock Turtle, \'but if they do, why then they\'re a kind of serpent, that\'s all I.','2006-03-11 20:46:33'),(55,1,10,'The Fish-Footman began by producing from under his arm a great many teeth, so she tried to curtsey as she passed; it was her turn or not.','2016-06-07 12:54:33'),(56,26,9,'Mouse was bristling all over, and both the hedgehogs were out of it, and yet it was only the pepper that had made out that she let the.','2015-03-10 06:45:07'),(57,1,13,'Pigeon had finished. \'As if I chose,\' the Duchess by this very sudden change, but she remembered having seen such a pleasant temper, and.','2013-09-16 14:10:21'),(58,4,11,'IT. It\'s HIM.\' \'I don\'t know what it was: she was terribly frightened all the players, except the Lizard, who seemed to be a book of rules.','1995-07-08 04:13:06'),(59,13,1,'Mouse, in a very small cake, on which the wretched Hatter trembled so, that he shook both his shoes on. \'--and just take his head sadly.','1998-03-31 18:17:30'),(60,20,3,'Time!\' \'Perhaps not,\' Alice cautiously replied, not feeling at all fairly,\' Alice began, in rather a handsome pig, I think.\' And she.','2014-05-26 00:54:19'),(61,6,1,'And she thought to herself. (Alice had no idea what you\'re at!\" You know the way out of the baby, and not to make out at the sides of it.','2009-09-20 01:29:01'),(62,21,4,'Mock Turtle said: \'advance twice, set to work, and very neatly and simply arranged; the only difficulty was, that her flamingo was gone.','2014-09-16 23:20:34'),(63,4,7,'I don\'t care which happens!\' She ate a little girl or a serpent?\' \'It matters a good many voices all talking together: she made out that.','1999-03-31 15:42:01'),(64,22,18,'It\'s enough to get hold of its mouth, and its great eyes half shut. This seemed to Alice an excellent opportunity for repeating his.','2009-06-23 02:27:05'),(65,20,12,'Mock Turtle yawned and shut his eyes.--\'Tell her about the temper of your nose-- What made you so awfully clever?\' \'I have answered three.','2011-07-04 17:53:51');
/*!40000 ALTER TABLE `mensajes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rubros`
--

DROP TABLE IF EXISTS `rubros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `rubros` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_RUBRO` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `NOMBRE_UNIQUE` (`NOMBRE_RUBRO`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rubros`
--

LOCK TABLES `rubros` WRITE;
/*!40000 ALTER TABLE `rubros` DISABLE KEYS */;
INSERT INTO `rubros` VALUES (1,'Albañileria'),(5,'Estructuras'),(2,'Instalaciones de Gas'),(3,'Instalaciones Electricas'),(4,'Pisos y Revestimientos'),(6,'Transporte, carga y descarga');
/*!40000 ALTER TABLE `rubros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_NAME` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `NOMBRE` varchar(45) DEFAULT NULL,
  `APELLIDO` varchar(45) DEFAULT NULL,
  `DNI` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `avatar` longtext,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `EMAIL_UNIQUE` (`email`),
  UNIQUE KEY `USER_NAME_UNIQUE` (`USER_NAME`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'carlangas','pascual@gmail.com','carlos','pascual',NULL,'$2y$10$vkaafuCfpO5RHRXinSs/UuKxtyiWoXEKIQX.4HSNOxsZ3aI3w9bie',NULL,'plomero1.jpg'),(2,'Pepo','pepe@gmail.com','pepe','argento','12323212','$2y$10$GD6pxdFo3hL7ZUd6fuZJuu.NX2MOvrdipfcfXX3wSUOovMQbk0B/a',NULL,'plomero1.jpg'),(3,'PEPE123','pepeargento@gmail.com','Pepe','argento','32675273','$2y$10$PFlq9xpJoFH0VuHd7w4gqexCnnlMJvu3qZ38z0/CjZ9NPxJtG161O',NULL,'EfvpAMnHXXz8kKPjgcRA8ExSDcBiLE1sftFfZFoX.jpeg'),(4,'IJASDJAHS','sanata@gmail.com','CARLOS','SANATA','32123321','$2y$10$CK1xuQ2gGRXMxDrVfXgYOe.JsPyfE/0yuy/OsjmCtLQRQS1utM6Ni',NULL,'rW2QMBz8NNR2oRrcxYhjIEAHsckzVigKxOM33Ud3.jpeg'),(5,'IJASDJAHS22','sanatita@gmail.com','CARLA','SANATero','32123354','$2y$10$ikDO1iMxNVMgRB5cVOGaeuQqF5Hps1SRlMnMwWoQYQilbEm7cLLD.',NULL,'plomero1.jpg'),(6,'IJASDJAHS21','carlos@papas.com','CARLANGAS','SANATero','32123312','$2y$10$dtR5Ye9dgM1P2biwGkqRLuW6rDcJSaFRZYIz0jNRyDicUTN74iAdG',NULL,'plomero1.jpg'),(7,'Julieta23','julirada@gmail.com','Julieta','Rada','23456786','$2y$10$1G6hR6OLp3fW883EwBPwwuN2qgYm6M2G/gizU0eLuB2sRk5YvtAfC',NULL,'elDjmKN5DMqgXnzgJL6H0nbHh36X4ikUgohAGEWP.jpeg'),(9,'Julietita','julietita@gmail.com','Julieta','Rada','21543765','$2y$10$i4s0cPg.XYMoJX1lv5e.L.NWs4mJowiUi/MpRx9gFk6MkHMFexwUy',NULL,'plomero1.jpg'),(10,'Pedrito54','elpedrito@gmail.com','Pedro','Grasi','43567765','$2y$10$sUROrEynQUS2HV53Pb6oa.XQ8i85FguAdVkFP1y8YtSj1kfh1gIIm',NULL,'Mula2yo6titY5AK8sBexx8PMbOlFcjFW99NzrxMt.jpeg'),(11,'Master32','marianito@gmail.com','Mariano','Caraballo','32720676','$2y$10$M56FuhM6aQwEgZvmzru5f.9C.h27nhmeVX1xQ/snIZ7aHC.z7H/hm',NULL,NULL),(12,NULL,'aver@gmail.com',NULL,NULL,NULL,'$2y$10$4yeWOYQ.ad9ViKFQIeS44.vbe8.AvV1hWrLZZaDd9Pp4cjbEXI02u','EcdlGCkEe3qbFFQcpNKstGv1bnWdT9x6NPgOibW1BqrL3WV70N2eoPkaaPxZ',NULL),(13,'LocoLopez','locolopez@gmail.com',NULL,NULL,NULL,'$2y$10$158iavcLTMQPOK94vt1Qy.NOWSvNUVatVW08CUoXvglaM3DsfRbg2',NULL,NULL),(14,'bjhorseman','bojack@gmail.com','Bojack','Horseman',NULL,'$2y$10$L6VtVB/8b5oNcbFP2Q9bd.CgS0VPHQfruMqFLgAYulpWU8b2Boh5S',NULL,'3m4QdzrgJH383sRpw7WK526b4hdHTZlSyx5QmH0Z.jpeg'),(15,'PCaroline','caroline@gmail.com','Princess','Caroline',NULL,'$2y$10$oMCJvbOsWCN0wigZu2N/F.JQLJAEV9taXWwrmXv292XswxeN47FX6',NULL,NULL),(16,'diane','dnguyen@gmail.com','Diane','Nguyen',NULL,'$2y$10$OZMC8FqnAapXCxsz4OCtYO/UIKYHUtqxnHPXTq3hZpbDr9l6YRBKa','1QVrRbYET4nUn4A3PrrAThNCVk4FUTrKpUDMLbdPWuetl4u4FfjCtThrClQ9',NULL),(17,'Mr. Nigel Beahan MD','helen66@example.net','Geovanny Kutch PhD','Dayna Mante Sr.',NULL,'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','EFNRsowdla',NULL),(18,'Prof. Jimmy Bruen','felicita.graham@example.org','Gracie Medhurst','Cydney Satterfield III',NULL,'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','yWKSGAsWQg',NULL),(19,'Karianne Blick','ebba.harris@example.net','Mrs. Nicole West V','Vida Purdy',NULL,'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','xbdbMvB6yv',NULL),(20,'Adeline Donnelly V','adolphus.price@example.net','Neil Hansen','Jewel Prohaska',NULL,'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','D0nj2KeQEu',NULL),(21,'Deonte Hansen','shayne.little@example.com','Aubrey Hauck','Ms. Gertrude Cassin DDS',NULL,'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','UDUqYFSqiV',NULL),(22,'Hunter Lesch','mbecker@example.com','Austyn Heaney','Ramiro Fahey Jr.',NULL,'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','TxKDlrM92p',NULL),(23,'Rosalinda Langosh','rosamond.kovacek@example.com','Prof. Eldon Kuhic','Dr. Tyler Dickinson Sr.',NULL,'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','1ESR99YPY1',NULL),(24,'Ada Hagenes','carlee.carroll@example.com','Ms. Zelma Harvey','Summer Schiller V',NULL,'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','zyYPpHUH6P',NULL),(25,'Abbey Christiansen','darrion.collins@example.net','Xander Casper I','Dr. Colton Lind V',NULL,'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','j458ojvWeN',NULL),(26,'Twila Cassin','trystan.morar@example.org','Emie Conn','Hugh Bruen',NULL,'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','B8djqbLA0RMHgMXmMNBfCtXx4fskldxvQBmSzKzquKk49ipvVfgnR7HsNjSi',NULL),(27,'felipa78','marguerite.kertzmann@example.com','Dante','Miller',NULL,'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','9sVuCY2Uox',NULL),(28,'kaelyn.rowe','ethelyn.daugherty@example.org','Abigale','Collins',NULL,'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','FRkfvrN3Sn',NULL),(29,'flo.von','djones@example.com','Amanda','Homenick',NULL,'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','lPXbbTgZfy',NULL),(30,'tcarroll','otilia.halvorson@example.com','Kolby','Pfannerstill',NULL,'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','d88IWOP7xB',NULL),(31,'rosemary12','tamara71@example.com','Lauryn','Boehm',NULL,'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','Z9tmwsQldv',NULL),(32,'dwalter','ihilpert@example.org','Cary','Thiel',NULL,'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','tlUuZptb5s',NULL),(33,'zkling','alda21@example.com','Mara','Thompson',NULL,'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','PHRPeCpoww',NULL),(34,'ara.beatty','albina.funk@example.net','Leland','West',NULL,'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','jHhXdveaxk',NULL),(35,'guadalupe.satterfield','lbarrows@example.com','Marlon','Lesch',NULL,'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','Y9lkBRuQGO',NULL),(36,'wleuschke','melvin.kertzmann@example.net','Johnpaul','Friesen',NULL,'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','FWhu6CNSEu',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_rubro`
--

DROP TABLE IF EXISTS `usuario_rubro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuario_rubro` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USUARIO_ID` int(11) NOT NULL,
  `RUBRO_ID` int(11) NOT NULL,
  `orden` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `USUARIO_ID_idx` (`USUARIO_ID`),
  KEY `RUBRO_ID_idx` (`RUBRO_ID`),
  CONSTRAINT `RUBRO_ID` FOREIGN KEY (`RUBRO_ID`) REFERENCES `rubros` (`ID`) ON UPDATE NO ACTION,
  CONSTRAINT `USUARIO_ID_2` FOREIGN KEY (`USUARIO_ID`) REFERENCES `users` (`ID`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_rubro`
--

LOCK TABLES `usuario_rubro` WRITE;
/*!40000 ALTER TABLE `usuario_rubro` DISABLE KEYS */;
INSERT INTO `usuario_rubro` VALUES (1,1,1,'1'),(2,2,1,'1'),(3,3,1,'1'),(4,4,1,'1'),(5,5,2,'1'),(6,6,2,'1'),(7,7,2,'1'),(8,9,2,'1'),(9,10,1,'1'),(10,11,2,'1'),(11,12,1,'1'),(12,12,3,'2'),(13,13,2,'1'),(14,13,3,'2'),(15,14,4,'1');
/*!40000 ALTER TABLE `usuario_rubro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_zona`
--

DROP TABLE IF EXISTS `usuario_zona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuario_zona` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USUARIO_ID` int(11) NOT NULL,
  `ZONA_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `USUARIO_ID_idx` (`USUARIO_ID`),
  KEY `ZONA_ID_idx` (`ZONA_ID`),
  CONSTRAINT `USUARIO_ID` FOREIGN KEY (`USUARIO_ID`) REFERENCES `users` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ZONA_ID` FOREIGN KEY (`ZONA_ID`) REFERENCES `zonas` (`ID`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_zona`
--

LOCK TABLES `usuario_zona` WRITE;
/*!40000 ALTER TABLE `usuario_zona` DISABLE KEYS */;
INSERT INTO `usuario_zona` VALUES (1,1,1),(2,2,2),(3,3,1),(4,4,2),(5,5,1),(6,6,2),(7,7,1),(8,9,2),(9,10,1),(10,1,2),(11,2,1),(12,12,1),(13,13,2),(14,14,3),(15,15,4),(16,16,1),(17,17,2),(18,18,3),(19,19,4),(20,20,1),(21,21,2),(22,22,3),(23,23,4),(24,24,1),(25,25,2),(26,20,3),(27,21,4),(28,22,1),(29,23,2),(30,24,3),(31,25,4),(32,26,1),(33,27,2),(34,19,3),(35,20,4);
/*!40000 ALTER TABLE `usuario_zona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zonas`
--

DROP TABLE IF EXISTS `zonas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `zonas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_ZONA` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `nombre_UNIQUE` (`NOMBRE_ZONA`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zonas`
--

LOCK TABLES `zonas` WRITE;
/*!40000 ALTER TABLE `zonas` DISABLE KEYS */;
INSERT INTO `zonas` VALUES (4,'Zona Centro'),(1,'Zona Norte'),(3,'Zona Oeste'),(2,'Zona Sur ');
/*!40000 ALTER TABLE `zonas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'concreta'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-06 10:52:07
