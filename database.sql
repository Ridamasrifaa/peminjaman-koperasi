/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-12.1.2-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: peminjamankoprasi
-- ------------------------------------------------------
-- Server version	12.1.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `anggota`
--

DROP TABLE IF EXISTS `anggota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `anggota` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_users` bigint(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_users` (`id_users`),
  CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anggota`
--

LOCK TABLES `anggota` WRITE;
/*!40000 ALTER TABLE `anggota` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `anggota` VALUES
(19,20,'Dini Dartini','dartini.dini30@gmail.com','085315220232','2026-03-30 01:20:58','2026-03-30 01:20:58'),
(20,21,'Hj.Lilis Suryani','henlis1968@gmail.com','081220514157','2026-03-30 01:50:17','2026-03-30 01:50:17'),
(21,22,'Evy Susanty','evyhariri@yahoo.com','0895338390893','2026-03-30 01:56:54','2026-03-30 01:56:54'),
(22,23,'Laela Badriah','laelabadriahsandria@gmail.com','081322034370','2026-03-30 02:01:42','2026-03-30 02:01:42'),
(23,24,'Aceng Saripudin','acengho.saripudin@gmail.com','085323421982','2026-03-30 02:08:12','2026-03-30 02:08:12'),
(24,25,'Yuna Yuliana','yulianayuna32@gmail.com','085218811810','2026-03-30 02:12:08','2026-03-30 02:12:08'),
(25,26,'Nisa Nuraeni','nuraeninisa51@gmail.com','082316742889','2026-03-30 02:14:52','2026-03-30 02:14:52'),
(26,27,'Taufik Hidayat','taufik@smkn4-tsm.sch.id','085223061620','2026-03-30 02:18:03','2026-03-30 03:32:16'),
(27,28,'Githa Farida','githafarida27@gmail.com','082320603033','2026-03-30 02:21:04','2026-03-30 02:21:04'),
(28,29,'Muhammad Hilmi Ahadiat','hilmi@smkn4-tsm.sch.id','082216204560','2026-03-30 02:23:51','2026-03-30 03:32:42'),
(29,30,'Saepudin','asadun@gmail.com','081322632566','2026-03-30 03:04:40','2026-03-30 21:13:38'),
(30,31,'Rahmat Mulyadi','nasaramadhani440@gmail.com','081321015200','2026-03-30 03:09:54','2026-03-30 03:09:54'),
(31,32,'Sri Agustina','agustina.sri1975@gmail.com','081394487655','2026-03-30 03:14:24','2026-03-30 20:42:26'),
(32,33,'Isep Wartiman','isepwartiman03@gmail.com','082116348219','2026-03-30 03:17:24','2026-03-30 03:17:24'),
(33,34,'Gandi Angriawan','angriawangandi@gmail.com','082240281790','2026-03-30 03:24:47','2026-03-30 03:24:47'),
(34,35,'Hj.Ai Nurhayati','ainurhayati.yn@gmail.com','085322687200','2026-03-30 03:28:04','2026-03-30 03:28:04'),
(35,36,'Ana Maulana','maulana@smkn4-tsm.sch.id','085222562224','2026-03-30 03:31:58','2026-03-30 03:31:58'),
(36,37,'Eki Rizki Ramdani','ekiramdani333@gmail.com','085283979710','2026-03-30 03:36:33','2026-03-30 03:36:33'),
(37,38,'Ryndi Mardoh','ryndimardoh92@gmail.com','085223385685','2026-03-30 03:41:26','2026-03-30 03:41:26'),
(38,39,'M.Arif Saripudin','dabojo1457@gmail.com','082315879775','2026-03-30 03:46:17','2026-03-30 03:46:17'),
(39,40,'Salman Parisi','salmanparisi085@gmail.com','085225502006','2026-03-30 03:50:00','2026-03-30 03:50:00'),
(40,41,'Wawan Setiawan','wawan.namisetiawan@gmail.com','085320125922','2026-03-30 03:53:07','2026-03-30 03:53:07'),
(41,42,'M.Dendy Julianto','mohdendy30@gmail.com','082216595151','2026-03-30 03:56:15','2026-03-30 03:56:15'),
(42,43,'Haryanti Rahmawati','haryantirahma79@gmail.com','082310371635','2026-03-30 04:01:40','2026-03-30 04:01:40'),
(43,44,'Ratih Dwijayanti','ratihdwijayanti362@gmail.com','085222675794','2026-03-30 04:04:27','2026-03-30 04:04:27'),
(44,45,'Novi Abdul Rahman','noviabdul@yahoo.com','085722589002','2026-03-30 04:08:05','2026-03-30 04:08:05'),
(45,46,'Asep Solehudin','asepspdi25@gmail.com','089637041869','2026-03-30 04:11:52','2026-03-30 04:11:52'),
(46,47,'Zul Hilmi','zulx@smkn4-tsm.sch.id','083827378500','2026-03-30 04:17:30','2026-03-30 04:17:30'),
(47,48,'Fajri Ashshiddiqi','fajriashshiddiqi@gmail.com','082217436494','2026-03-30 04:20:21','2026-03-30 04:20:21'),
(48,49,'Tri Wahyuni','triw4869@gmail.com','081223658650','2026-03-30 04:23:28','2026-03-30 04:23:28'),
(49,50,'Sandi Somantri','sandikusomantri@gmail.com','085845300676','2026-03-30 04:26:29','2026-03-30 04:40:33'),
(50,51,'Nia Kurniawati','kurniawatinia056@gmail.com','081323477434','2026-03-30 04:40:12','2026-03-30 04:40:12'),
(51,52,'Epi Puspitasari','spuspita966@gmail.com','085310079788','2026-03-30 04:43:05','2026-03-30 04:48:52'),
(52,53,'Ayi Kurnia','akur08nop@gmail.com','08122234847','2026-03-30 04:47:23','2026-03-30 20:11:10'),
(53,54,'Lisna Windi Nurhuda','Lwindinurhuda@gmail.com','085320517019','2026-03-30 04:54:26','2026-03-30 04:54:26'),
(54,55,'Ema Janika','emajatnika@gmail.com','081323874023','2026-03-30 04:58:07','2026-03-30 20:43:05'),
(55,56,'Sifa Utami','biyana2aid@gmail.com','085221828803','2026-03-30 05:00:31','2026-03-30 05:00:31'),
(56,57,'Ai Warung','andah0191@gmail.com','08523316300','2026-03-30 05:02:56','2026-03-30 05:02:56'),
(57,58,'Runi Puspa Amaliah','runipus22@gmail.com','081807490980','2026-03-30 05:06:24','2026-03-30 05:06:24'),
(58,59,'Ade Rohmat','rohmatulloh313@gmail.com','0852144555564','2026-03-30 05:09:24','2026-03-30 05:09:24'),
(59,60,'Kadarsah','kadarsahkhanna@gmail.com','085860588882','2026-03-30 05:12:03','2026-03-30 05:12:03'),
(60,61,'Wulan Dwi Marliana','wulandwimarliana@gmail.com','089614639523','2026-03-30 05:17:00','2026-03-30 05:17:00'),
(61,62,'Budi Setiadi','b.setiadi1804@gmail.com','08151070865','2026-03-30 05:19:03','2026-03-30 05:19:03'),
(62,63,'Deri Heryanto','derriheryanto@gmail.com','081799554459','2026-03-30 05:21:17','2026-03-30 05:21:17'),
(63,64,'Kaka Ruhimat','kakaruhimat289@gmail.com','085808634123','2026-03-30 05:23:35','2026-03-30 05:23:35'),
(64,65,'Euis Nursidah','euisnursidah85@gmail.com','085321540459','2026-03-30 05:25:31','2026-03-30 05:25:31'),
(65,66,'Airista Jayanti','airista.jayanti123@gmail.com','085320271615','2026-03-30 05:27:40','2026-03-30 05:27:40'),
(66,67,'Soni Ramdani','ashonson726@gmail.com','082219099037','2026-03-30 05:30:36','2026-03-30 05:30:36'),
(67,68,'Elis Hernaelis','hernaelis@gmail.com','085871184165','2026-03-30 05:35:32','2026-03-30 05:35:32'),
(68,69,'Ali Saeful Milah','aly.sha@gmail.com','082316504650','2026-03-30 05:37:29','2026-03-30 20:43:39'),
(69,70,'Arip','arip@smkn4-tsm.sch.id','083814789833','2026-03-30 05:39:31','2026-03-30 05:39:31'),
(70,71,'Fikri Adipura Yudistira','fayka2eps-tittfr@yahoo.co.id','082115204504','2026-03-30 05:43:18','2026-03-30 05:43:18'),
(71,72,'Dede Irawan','emailkudedeirawan@gmail.com','085353987736','2026-03-30 05:44:58','2026-03-30 05:44:58'),
(72,73,'Suminar','suminar.s2020@gmail.com','081323025049','2026-03-30 05:47:23','2026-03-30 05:47:23'),
(73,74,'Lisye Diana Inggriani','inggrianilisye@gmail.com','085222854011','2026-03-30 05:51:19','2026-03-30 05:51:19'),
(74,75,'Imas Masruroh','joya.calm@gmail.com','081323227911','2026-03-30 05:53:56','2026-03-30 05:53:56'),
(75,76,'Ami Miftahul Lukman','amimiftahul166@gmail.com','082118764472','2026-03-30 05:56:36','2026-03-30 05:56:36'),
(76,77,'Siti Nurmalah','sitinurmalah88@gmail.com','082116860146','2026-03-30 05:59:19','2026-03-30 05:59:19'),
(77,78,'Resti Tandiani Utami','restitandiani@gmail.com','082314793355','2026-03-30 06:01:15','2026-03-30 06:01:15'),
(78,79,'Jajang Deta Mulyadi','jajangdeta25@gmail.com','085223111268','2026-03-30 06:04:52','2026-03-30 06:04:52'),
(79,80,'Helmi Permana','helmipermana4@gmail.com','081297639001','2026-03-30 06:07:21','2026-03-30 06:07:21'),
(80,81,'Yusep Saepul','yusepsaepul1979@gmail.com','081316383564','2026-03-30 06:10:23','2026-03-30 06:10:23'),
(81,82,'Imat Ruhimat','imatruhimat9750@gmail.com','081219184670','2026-03-30 06:12:35','2026-03-30 06:12:35'),
(82,83,'Amanata Salma','amanasalma74@gmail.com','085771671260','2026-03-30 06:14:25','2026-03-30 06:14:25'),
(83,84,'Janwar','badwanjanwar@gmail.com','085718903842','2026-03-30 06:16:12','2026-03-30 06:16:12'),
(84,85,'Tia Maryani','tiamaryaniyw@gmail.com','082295003044','2026-03-30 06:18:41','2026-03-30 06:18:41'),
(85,86,'Fahmi Fauzie','fahmifauzi160@gmail.com','082214716298','2026-03-30 06:22:54','2026-03-30 06:22:54'),
(86,87,'Dede Rodi','dederodi95@gmail.com','081291571823','2026-03-30 06:24:33','2026-03-30 06:24:33'),
(87,88,'Yen Yen Suryani','yenyensuryani555@gmail.com','081222889985','2026-03-30 06:26:24','2026-03-30 06:26:24'),
(88,89,'Siti Mustika Dewi','sitimustikadewi26@gmail.com','089530070712','2026-03-30 06:37:33','2026-03-30 06:37:33'),
(89,90,'Vina Fitriani Tursina','vinafitrianitursina23@gmail.com','085283977362','2026-03-30 06:39:36','2026-03-30 06:39:36'),
(90,91,'Asep Nurul Huda','asepnurul@gmail.com','0811228193','2026-03-30 06:41:09','2026-03-30 06:41:09'),
(91,92,'Nana Purnama','napurnama84@gmail.com','082318114748','2026-03-30 06:42:45','2026-03-30 20:44:29'),
(92,93,'Hery Wahyu Widodo','herywahyuwidodo7@gmail.com','081328376122','2026-03-30 06:45:01','2026-03-30 06:45:01'),
(93,94,'Santi Suci Romdon','santisuci332@gmail.com','081563880451','2026-03-30 06:47:03','2026-03-30 06:47:03'),
(94,95,'Herlina Pratama','pratamaherlina@gmail.com','085198701448','2026-03-30 06:48:47','2026-03-30 06:48:47'),
(95,96,'Syam Rahadian Ardhy','bl4ckenbine@gmail.com','085314123976','2026-03-30 06:50:43','2026-03-30 06:50:43'),
(96,97,'Eris Herianto','erishans1489@gmail.com','081546556185','2026-03-30 06:53:34','2026-03-30 20:45:16'),
(97,98,'Fauzia Afifah','fauziaaffah27@gmail.com','085722482579','2026-03-30 06:55:59','2026-03-30 06:55:59'),
(98,99,'Dewi Nurhayati','dewinurhayati0403@gmail.com','082321004080','2026-03-30 06:58:02','2026-03-30 06:58:02'),
(99,100,'Jajang Rohimat','jajangrohimat@gmail.com','082214370009','2026-03-30 06:59:25','2026-03-30 06:59:25'),
(100,101,'Ari Yanuar','ariyanwar8703@gmail.com','082280088001','2026-03-30 07:01:25','2026-03-30 07:01:25'),
(101,102,'Septa Harry Perana','sevta2evon@gmail.com','082217555572','2026-03-30 07:03:29','2026-03-30 07:03:29'),
(102,103,'Deni Maulana','deni.analuam@gmail.com','085223999196','2026-03-30 07:05:13','2026-03-30 07:05:13'),
(103,104,'Andi Moh Permandi','ampermadi@gmail.com','085811889328','2026-03-30 07:06:55','2026-03-30 07:06:55'),
(104,105,'Adi Iasan','adilasan02@gmail.com','085179671119','2026-03-30 07:08:55','2026-04-02 00:53:54'),
(105,106,'Yanto Sugianto','yantosugianto@gmail.com','082115749560','2026-03-30 07:10:34','2026-03-30 07:10:34'),
(106,107,'Gina Mutia','ginamutia1509@gmail.com','082215530716','2026-03-30 07:44:58','2026-03-30 07:44:58'),
(107,108,'Yuyus Arie Windhu','yawidhu@gmail.com','08122170545','2026-03-30 07:47:10','2026-03-30 07:47:10'),
(108,109,'Erma Yunita Rachmiatunnisa','ermayunita40@gmail.com','081214736932','2026-03-30 07:49:22','2026-03-30 07:49:22'),
(109,110,'Arif Rahmanudin','arifrahmanudin@gmail.com','085221319142','2026-03-30 07:51:48','2026-03-30 07:51:48'),
(110,111,'Nita Khoerunnisa','dita.khoerunnisa@gmail.com','081322350791','2026-03-30 07:54:13','2026-03-31 23:10:41'),
(111,112,'Siti Sarah Patmawati','sitsar92@gmail.com','085317573732','2026-03-30 07:56:30','2026-03-30 07:56:30'),
(112,113,'Bintang Anugrahing','bintanganugrahingwidhi@gmail.com','082127654312','2026-03-30 07:58:50','2026-03-30 22:48:44'),
(113,114,'Didah Hamidah','didahh62@gmail.com','082119909602','2026-03-30 08:01:42','2026-03-30 08:01:42'),
(114,115,'Endang Nurjanah','endangnurjanah92@gmail.com','085223038048','2026-03-30 08:03:53','2026-03-30 08:03:53'),
(115,116,'Kalih Fahman Nabiyin','xlucifer7769@gmail.com','089694900033','2026-03-30 21:45:05','2026-03-30 21:45:05'),
(116,117,'R.Tini Gartini','tinigantini21@gmail.com','085222172711','2026-03-30 21:50:10','2026-03-30 21:50:10'),
(117,118,'Nuryani(Mang Herman)','hermanhermanto12@gmail.com','085643024116','2026-03-30 21:52:48','2026-03-30 21:52:48'),
(118,119,'Engguh Gusman','engguhgusman021@gmail.com','085720760949','2026-03-30 21:58:56','2026-03-30 21:58:56'),
(119,120,'Muliadi','adi.8338@gmail.com','081324418338','2026-03-30 22:29:32','2026-03-30 22:29:32'),
(120,121,'Dian Suryanti','diansuryatin18@gmail.com','085223507421','2026-03-30 22:31:22','2026-03-30 22:31:22'),
(121,122,'Anna Rachmiati','anarachmiati@gmail.com','081323787000','2026-03-30 22:33:09','2026-03-30 22:33:09'),
(123,124,'Zahir','zahir11@gmail.com','08756561432','2026-03-31 17:47:52','2026-03-31 23:38:42'),
(124,125,'Nita Marlina','nithamarlina.nm@gmail.com','085323397973','2026-03-31 18:23:20','2026-03-31 18:23:20'),
(125,126,'Kusnaedi','edicevigi@gmail.com','085223639008','2026-03-31 18:26:07','2026-03-31 18:26:07'),
(126,127,'Didah S Sukanda','didahsaadah597@gmail.com','082295522462','2026-03-31 18:29:13','2026-03-31 18:29:13'),
(127,128,'Rachmat rochimat','tiarasurya69@gmail.com','085221767799','2026-03-31 18:31:58','2026-03-31 18:31:58'),
(128,129,'Drs. H desnueri','udesnueri@gmail.com','082126753911','2026-03-31 18:33:51','2026-03-31 18:33:51'),
(129,130,'A Yusuf Hanafi','yusuf_arsya45@Yahoo.co.id','082265042358','2026-03-31 18:49:38','2026-03-31 18:49:38'),
(130,131,'Dudi Setiadi','dudi@smkn4-tsm.sch.id','082114893755','2026-03-31 18:51:45','2026-03-31 18:51:45'),
(131,132,'Anwarullah','akunpolosk1@gmail.com','085795924298','2026-04-01 00:33:31','2026-04-01 19:09:38');
/*!40000 ALTER TABLE `anggota` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `angsuran`
--

DROP TABLE IF EXISTS `angsuran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `angsuran` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pinjaman_id` bigint(20) DEFAULT NULL,
  `cicilan_ke` int(11) DEFAULT NULL,
  `pokok` decimal(15,2) DEFAULT NULL,
  `bunga` decimal(15,2) DEFAULT NULL,
  `total_bayar` decimal(15,2) DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pinjaman_id` (`pinjaman_id`),
  CONSTRAINT `angsuran_ibfk_1` FOREIGN KEY (`pinjaman_id`) REFERENCES `pinjaman` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=221 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `angsuran`
--

LOCK TABLES `angsuran` WRITE;
/*!40000 ALTER TABLE `angsuran` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `angsuran` VALUES
(204,36,1,500000.00,20000.00,520000.00,4,2026,'2026-04-01','lunas','2026-03-31 17:48:15','2026-03-31 18:57:54'),
(205,36,2,500000.00,10000.00,510000.00,5,2026,NULL,'belum','2026-03-31 17:48:15','2026-03-31 17:48:15'),
(206,37,1,50000.00,2000.00,52000.00,4,2026,NULL,'belum','2026-03-31 17:48:29','2026-03-31 17:48:29'),
(207,37,2,50000.00,1000.00,51000.00,5,2026,NULL,'belum','2026-03-31 17:48:29','2026-03-31 17:48:29'),
(208,38,1,200000.00,40000.00,240000.00,4,2026,'2026-04-01','lunas','2026-04-01 00:17:39','2026-04-01 00:19:48'),
(209,38,2,200000.00,36000.00,236000.00,4,2026,'2026-04-01','lunas','2026-04-01 00:17:39','2026-04-01 00:20:18'),
(210,38,3,200000.00,32000.00,232000.00,4,2026,'2026-04-02','lunas','2026-04-01 00:17:39','2026-04-01 18:26:06'),
(211,38,4,200000.00,28000.00,228000.00,7,2026,NULL,'belum','2026-04-01 00:17:39','2026-04-01 00:17:39'),
(212,38,5,200000.00,24000.00,224000.00,8,2026,NULL,'belum','2026-04-01 00:17:39','2026-04-01 00:17:39'),
(213,38,6,200000.00,20000.00,220000.00,9,2026,NULL,'belum','2026-04-01 00:17:39','2026-04-01 00:17:39'),
(214,38,7,200000.00,16000.00,216000.00,10,2026,NULL,'belum','2026-04-01 00:17:39','2026-04-01 00:17:39'),
(215,38,8,200000.00,12000.00,212000.00,11,2026,NULL,'belum','2026-04-01 00:17:39','2026-04-01 00:17:39'),
(216,38,9,200000.00,8000.00,208000.00,12,2026,NULL,'belum','2026-04-01 00:17:39','2026-04-01 00:17:39'),
(217,38,10,200000.00,4000.00,204000.00,1,2027,NULL,'belum','2026-04-01 00:17:39','2026-04-01 00:17:39');
/*!40000 ALTER TABLE `angsuran` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `barangs`
--

DROP TABLE IF EXISTS `barangs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `barangs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barangs`
--

LOCK TABLES `barangs` WRITE;
/*!40000 ALTER TABLE `barangs` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `barangs` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `cicilans`
--

DROP TABLE IF EXISTS `cicilans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cicilans` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kredit_id` bigint(20) DEFAULT NULL,
  `bulan_ke` int(11) DEFAULT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `status` enum('lunas','tidak lunas') NOT NULL DEFAULT 'tidak lunas',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cicilans`
--

LOCK TABLES `cicilans` WRITE;
/*!40000 ALTER TABLE `cicilans` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `cicilans` VALUES
(1,NULL,NULL,NULL,'lunas','2026-02-11 20:41:25','2026-02-11 20:41:25'),
(2,5,1,85000,'lunas','2026-02-13 04:23:44','2026-02-13 04:23:44'),
(3,5,2,85000,'lunas','2026-02-13 04:23:44','2026-02-13 04:23:44'),
(4,5,3,85000,'lunas','2026-02-13 04:23:44','2026-02-13 04:23:44'),
(5,5,4,85000,'tidak lunas','2026-02-13 04:23:44','2026-02-13 04:23:44'),
(6,5,5,85000,'tidak lunas','2026-02-13 04:23:44','2026-02-13 04:23:44');
/*!40000 ALTER TABLE `cicilans` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `kredits`
--

DROP TABLE IF EXISTS `kredits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `kredits` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `jumlah_kredit` int(11) DEFAULT NULL,
  `bunga` decimal(5,2) DEFAULT NULL,
  `tenor` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kredits`
--

LOCK TABLES `kredits` WRITE;
/*!40000 ALTER TABLE `kredits` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `kredits` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `password_reset_tokens` VALUES
('akunpolosk1@gmail.com','$2y$12$x3gLjqIWfO5VeW4ie097G.vEOegqqPpf0b/QVZ.1RZS6EBAf8kfiW','2026-04-01 19:26:25'),
('nzl240608@gmail.com','$2y$12$8uwGEGC6ZzRXZ7DuHZjNDeBCH6LewrLEMzKRClGUvfGGttbaYsBpK','2026-03-08 18:06:10'),
('sukavanilaa25@gmail.com','$2y$12$KYGh477CDW87/A3RbOG3/ei484O09PhOXFiZlsQvqIA61Ybn8sD16','2026-04-01 23:37:26');
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `pinjaman`
--

DROP TABLE IF EXISTS `pinjaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `pinjaman` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `anggota_id` bigint(20) DEFAULT NULL,
  `approved_by` bigint(20) DEFAULT NULL,
  `jumlah_pinjaman` decimal(15,2) DEFAULT NULL,
  `bunga_persen` decimal(5,2) DEFAULT NULL,
  `tenor` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `tanggal_pinjaman` date DEFAULT NULL,
  `total_pinjaman` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `anggota_id` (`anggota_id`),
  KEY `approved_by` (`approved_by`),
  CONSTRAINT `pinjaman_ibfk_1` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`),
  CONSTRAINT `pinjaman_ibfk_2` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pinjaman`
--

LOCK TABLES `pinjaman` WRITE;
/*!40000 ALTER TABLE `pinjaman` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `pinjaman` VALUES
(36,123,NULL,1000000.00,2.00,2,'approved','2026-04-01',1030000.00,'2026-03-31 17:48:15','2026-03-31 17:48:15'),
(37,123,NULL,100000.00,2.00,2,'approved','2026-04-01',103000.00,'2026-03-31 17:48:29','2026-03-31 17:48:29'),
(38,19,NULL,2000000.00,2.00,10,'approved','2026-04-01',2220000.00,'2026-04-01 00:17:39','2026-04-01 00:17:39');
/*!40000 ALTER TABLE `pinjaman` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `simpanan`
--

DROP TABLE IF EXISTS `simpanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `simpanan` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `anggota_id` bigint(20) NOT NULL,
  `jenis_simpanan` enum('pokok','wajib') NOT NULL,
  `jumlah` decimal(15,2) NOT NULL,
  `tanggal_simpanan` date NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_simpanan_anggota` (`anggota_id`),
  CONSTRAINT `fk_simpanan_anggota` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `simpanan`
--

LOCK TABLES `simpanan` WRITE;
/*!40000 ALTER TABLE `simpanan` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `simpanan` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `users` VALUES
(1,NULL,'zahir22@gmail.com','$2y$12$ZIb6JFu3FRgDKM4Gy0a4P.9Ub4GFL55UzcQFSbhW9m9gqtQZTbiDG',NULL,'2026-02-04 20:48:27','2026-02-04 21:03:14',NULL,NULL),
(2,'Fatwa kanaeru','anggota@gmail.com','$2y$12$YurLHuovb2rvLQn3NFRw5OeZJ0dmTPl2BjKbX0m8wvHpGkl5dklpK','anggota','2026-02-06 02:29:23','2026-03-09 21:49:01','profile/ZY4d11tE2rWbEkC9y8s5zaOV62a6wxqpsBQ0WhaC.jpg',NULL),
(3,'Admin','admin@gmail.com','$2y$12$LUplObtEok.zbmgh7cb6M.JKXV2avQiw6UEDDrlymS7kEDJlyKWC.','admin','2026-02-25 19:19:43','2026-03-31 18:53:55','profile/Av6zs2qe3Cwtq37FHK4otTdl4cmMV0qAqHJ8kkYd.png',NULL),
(4,'riddaa','ridamasrifa123@gmail.com','$2y$12$psj8x75IbLXwDP82ucA0vuYeQvwI9jmVgUlJAHgZKQQckiug0M6hW','anggota','2026-03-01 02:24:33','2026-03-03 20:59:15','profile/jUZhdd7CItf8TBste833lEX1wygSVb5lYRwhBQ6D.jpg',NULL),
(5,'fatwa','fatwa@gmail.com','$2y$12$IO2FapaflmAyk.GKAbyCruz0n.W/i5q7dzauKldEoCrAJjMIuyYOO','anggota','2026-03-01 18:31:53','2026-03-01 18:36:27','profile/J3Z8ZfSsTjYPq0BH0muwCjsg8QscfafIPYzz82t4.jpg',NULL),
(6,NULL,'manca@gmail.com','$2y$12$OckT/zaV11xekHBm97mlDeFytvgSWse8.oSK93uKSKRMHwmpSqmS2','anggota','2026-03-01 18:40:05','2026-03-01 18:40:05',NULL,NULL),
(7,NULL,'airinladies321@gmail.com','$2y$12$myslx/qWZkkEUNdL5nQcpeFPaMViNPktYYwlh0vqEDIUyZbffSFfi','anggota','2026-03-01 21:52:24','2026-03-01 21:52:24',NULL,NULL),
(8,NULL,'zihad2@gmail.com','$2y$12$3FOcvgdtD5Gi0STWasrYpercm4x5CZ7uIE7BiakRX1cOl6S3HBUOK','anggota','2026-03-02 21:16:01','2026-03-02 21:16:01',NULL,NULL),
(9,'Yamadaa','akitoyamada11@gmail.com','$2y$12$/DiXwvk3KRCCHxRq/ozkYuTe/BuLzis02AgwhKbqFkhZmFWmz4mTS','anggota','2026-03-03 19:42:32','2026-03-03 21:00:43','profile/iPyonPcWeQTyxad65gkwNl9dFuXWRu8u1UBokFCj.jpg',NULL),
(10,'ridaa','sukavanilaa25@gmail.com','$2y$12$CDe52man3DadVr3RG1c1fedq3uz6xosiTwjxXEN1zXULd.8YnkuDO','anggota','2026-03-03 21:37:47','2026-03-08 06:08:32','profile/xgerqLaRPwSOgMSmBVuJ0cYHVXoT0heO4POteYGS.jpg',NULL),
(11,NULL,'atta123@gmail.com','$2y$12$f68S1SziItpX4mgcZ8pUYeDYdLo4rEJLIAbE7/AcQt7Jr1OBzx5Ai','anggota','2026-03-04 20:46:50','2026-03-04 20:46:50',NULL,NULL),
(12,NULL,'zahir25@gmail.com','$2y$12$MsHWiEOtjpe6jUPhXHfb5eIVF6FPxYy7jwS6tzEYelRUOZt8TIMKS','anggota','2026-03-04 21:46:01','2026-03-04 21:46:01',NULL,NULL),
(13,'zl','nzl240608@gmail.com','$2y$12$DMqEOud0ntUhZ/5zrWSpFunqnqLSzIGb2C95amlGwEacddkFhP13m','anggota','2026-03-08 18:02:20','2026-03-08 18:02:20',NULL,NULL),
(14,'fufufafaf','fufufafa@gmail.com','$2y$12$440xsGbCw4teu5xHR0p/5OHKdx8swmoOadLUI6UtSDKoUIkFmFJL6','anggota','2026-03-09 22:27:27','2026-03-09 22:27:27',NULL,NULL),
(15,'hahay','hahay23@gmail.com','$2y$12$N60YoUeHnvZJRNLFdQZHZuJOpnbn3jXw1F7sC832EhvtNxoPbWdU6','anggota','2026-03-10 00:02:52','2026-03-10 00:02:52',NULL,NULL),
(16,'millata','milla123@gmail.com','$2y$12$5aoN6/Aiofs85V4u2J6B..jaJD9j4ORaqqSM4cHKDU1EKE28YIk2O','anggota','2026-03-10 00:03:39','2026-03-10 00:03:39',NULL,NULL),
(17,'anwar','anwar20@gmail.com','$2y$12$IZ.eIMhwMX1W5Yg4Uf1enegiwi/5dl28GideNNBf8xM7UVLBCJQya','anggota','2026-03-10 00:09:40','2026-03-10 00:09:40',NULL,NULL),
(18,'vanca','vanca18@gmail.com','$2y$12$oEts3xQVXlNJbdvuXBbOauphBS7WELfrXcbCeO2t2biQglkCGL0qO','anggota','2026-03-10 00:15:08','2026-03-10 00:15:08',NULL,NULL),
(19,'Rida Masrifa','ridakocak123@gmail.com','$2y$12$rFPpnAqrChclkTwaqDBeJuuUV6AT29VTDVgtHnS7zC6AkJSeOt.cO','anggota','2026-03-10 00:33:40','2026-03-10 00:33:40',NULL,NULL),
(20,'Dini Dartini','dartini.dini30@gmail.com','$2y$12$f/AFwew0dGRUWemJLXwHdeUlW1CltLjrjKVzQNEK0rIOxMDzb70he','anggota','2026-03-30 01:20:58','2026-03-30 01:20:58',NULL,NULL),
(21,'Hj.Lilis Suryani','henlis1968@gmail.com','$2y$12$XAI8Z3oCJtiVrsv7c2v7gO1dZffKyCVb.056cUVeX3Z3Hssp4w18m','anggota','2026-03-30 01:50:17','2026-03-30 01:50:17',NULL,NULL),
(22,'Evy Susanty','evyhariri@yahoo.com','$2y$12$04nX/sBVqxNUowzH9YFh0O27kKVOdOBYYhwJ/YEgna2Nf9fMqSNVa','anggota','2026-03-30 01:56:54','2026-03-30 01:56:54',NULL,NULL),
(23,'Laela Badriah','laelabadriahsandria@gmail.com','$2y$12$2p3zHeoph/hXlIF4nPzdTeDcpNeLNdlnvmHadizDOvPM9NvxeAuM6','anggota','2026-03-30 02:01:42','2026-03-30 02:01:42',NULL,NULL),
(24,'Aceng Saripudin','acengho.saripudin@gmail.com','$2y$12$90zIfttl2uKm6GZATExYJOzMMzPQcZ/Kxh4CJTZMLMG6kIaPgl9gS','anggota','2026-03-30 02:08:12','2026-03-30 02:08:12',NULL,NULL),
(25,'Yuna Yuliana','yulianayuna32@gmail.com','$2y$12$BrDHsLhgju0DK03St660he.fNWNrNNpEvKkVX7p2Vty8EtfiYHy5G','anggota','2026-03-30 02:12:08','2026-03-30 02:12:08',NULL,NULL),
(26,'Nisa Nuraeni','nuraeninisa51@gmail.com','$2y$12$5n/qyh9hqm5RjugCz9piDOAX6X9jruWdX0AwIAd4OMWbqLNLo.FIq','anggota','2026-03-30 02:14:52','2026-03-30 02:14:52',NULL,NULL),
(27,'Taufik Hidayat','taufik@smkn4.tsm.sch.id','$2y$12$lX6imSv1y4EV3hcQThp24OEYlUvtYFnmljgbT7sFb787rxa2r32Qm','anggota','2026-03-30 02:18:03','2026-03-30 02:18:03',NULL,NULL),
(28,'Githa Farida','githafarida27@gmail.com','$2y$12$8e5m6/jrthBhwqOpwBLNLeuDo05db7aZ53T1WsgEaohW7306Y6HBe','anggota','2026-03-30 02:21:04','2026-03-30 02:21:04',NULL,NULL),
(29,'Muhammad Hilmi Ahadiat','hilmi@smkn4.tsm.sch.id','$2y$12$vu3My2hReWT3MSnJSX.8YubtPPnS822mVq97ER5xe//w9YSAfX0.i','anggota','2026-03-30 02:23:51','2026-03-30 02:23:51',NULL,NULL),
(30,'Saepudin','asadun@gmail.com','$2y$12$cZrdIdDhTS0VnYn/GW.Vn.pjfqlvjyCHqt0ou4qAKonxhTHzF9GhO','anggota','2026-03-30 03:04:40','2026-03-30 03:04:40',NULL,NULL),
(31,'Rahmat Mulyadi','nasaramadhani440@gmail.com','$2y$12$XA1AIH4ORHH75LHZ07IR1.jWVf9WYjY2tSV9rC6N8Cn54gyRTHwSa','anggota','2026-03-30 03:09:54','2026-03-30 03:09:54',NULL,NULL),
(32,'Sri Agustina','agustina.sri1975@gmail.com','$2y$12$BTLEOIyW8NUvjbyeXsTn6ehmV/tNh9Vfsw01BuEbFbLKP7LxDaz.2','anggota','2026-03-30 03:14:24','2026-03-30 03:14:24',NULL,NULL),
(33,'Isep Wartiman','isepwartiman03@gmail.com','$2y$12$/3HMHqWg0u5HCNzZq3YjKuJGX6NfVz9Ku5lmewyWMy6D5H/TN9a5a','anggota','2026-03-30 03:17:24','2026-03-30 03:17:24',NULL,NULL),
(34,'Gandi Angriawan','angriawangandi@gmail.com','$2y$12$plokTIhX.Gb/ewMr1jErEeDs9EGZwAftCx1fIWhKp0l3e5IMMmLym','anggota','2026-03-30 03:24:47','2026-03-30 03:24:47',NULL,NULL),
(35,'Hj.Ai Nurhayati','ainurhayati.yn@gmail.com','$2y$12$zZT5WX3Z/IGaKQakbzZCM.Ip56XgG0alO9gQltF309ojZsI4toXXi','anggota','2026-03-30 03:28:04','2026-03-30 03:28:04',NULL,NULL),
(36,'Ana Maulana','maulana@smkn4-tsm.sch.id','$2y$12$T.e1MVFguqrIp0jVZzE6IeNsKY88d9/Kz1V7yC7dC5IYTo1X5CU1i','anggota','2026-03-30 03:31:58','2026-03-30 03:31:58',NULL,NULL),
(37,'Eki Rizki Ramdani','ekiramdani333@gmail.com','$2y$12$KnXR9/FZysMBjrJhxN0tsOmsemuLuE9YqIZTm4balX7C1cFDAeLsC','anggota','2026-03-30 03:36:33','2026-03-30 03:36:33',NULL,NULL),
(38,'Ryndi Mardoh','ryndimardoh92@gmail.com','$2y$12$5U1mAOyBM3DrIWnKJDa/PueO9AUPmHHXboumzObU7RM/1zB1jyDSO','anggota','2026-03-30 03:41:26','2026-03-30 03:41:26',NULL,NULL),
(39,'M.Arif Saripudin','dabojo1457@gmail.com','$2y$12$EEJfY6LzL16dzRu6XDfiVugNe0Fs7nH2IhkeY/iJpFR0y.yAQ1LqW','anggota','2026-03-30 03:46:17','2026-03-30 03:46:17',NULL,NULL),
(40,'Salman Parisi','salmanparisi085@gmail.com','$2y$12$sAomI4.OR.H7P9xJhd3ifuMG/NnBhwvRi4yr8IEQr8XlHhmd2tY/u','anggota','2026-03-30 03:50:00','2026-03-30 03:50:00',NULL,NULL),
(41,'Wawan Setiawan','wawan.namisetiawan@gmail.com','$2y$12$NS8xfDPyalLML7kwhwjt3.wfJHTz6lCH68Dj9x1LF.dLqNS50AmLm','anggota','2026-03-30 03:53:07','2026-03-30 03:53:07',NULL,NULL),
(42,'M.Dendy Julianto','mohdendy30@gmail.com','$2y$12$Pqzn47liqf8cDf/T0IgNdeEga1BGnluVeA6f4OcsaYQ4aH80ZQu8C','anggota','2026-03-30 03:56:15','2026-03-30 03:56:15',NULL,NULL),
(43,'Haryanti Rahmawati','haryantirahma79@gmail.com','$2y$12$iahcZzrmqkTy8R9CVtYaduwybsFgb2nWcmZlXCQlNoq9k6Ix8zsNm','anggota','2026-03-30 04:01:40','2026-03-30 04:01:40',NULL,NULL),
(44,'Ratih Dwijayanti','ratihdwijayanti362@gmail.com','$2y$12$nASPVR0QM0JcXS04i95kFOgzfqMGliuGwOQKtSxYrc2veoaZNa6Wy','anggota','2026-03-30 04:04:27','2026-03-30 04:04:27',NULL,NULL),
(45,'Novi Abdul Rahman','noviabdul@yahoo.com','$2y$12$H925IGxWvFKxJNEzVLt96uC2L6lj3xexz.sapbdFWvy1uF8Dexlju','anggota','2026-03-30 04:08:05','2026-03-30 04:08:05',NULL,NULL),
(46,'Asep Solehudin','asepspdi25@gmail.com','$2y$12$ais/qXHY7jsBbMuSTGmTn.DHvdbzdvw.xN2onLiRr3IFYdq6dZw3y','anggota','2026-03-30 04:11:52','2026-03-30 04:11:52',NULL,NULL),
(47,'Zul Hilmi','zulx@smkn4-tsm.sch.id','$2y$12$za94ekWM6DWGJ5qrxaLeiu8X2odvwpV4zdkmDV8mAZah1vAXqsm0i','anggota','2026-03-30 04:17:30','2026-03-30 04:17:30',NULL,NULL),
(48,'Fajri Ashshiddiqi','fajriashshiddiqi@gmail.com','$2y$12$1qD5LYHlBhrI3PAT75y33uUkUAz74hmc0gQgwnU0u/ntaSesNwSPO','anggota','2026-03-30 04:20:21','2026-03-30 04:20:21',NULL,NULL),
(49,'Tri Wahyuni','triw4869@gmail.com','$2y$12$dE8gHGMVaLqEuPx3vT0uB.aboesdRtqa0mCpFsNWTvyhns0h6vMeS','anggota','2026-03-30 04:23:28','2026-03-30 04:23:28',NULL,NULL),
(50,'sandi Somantri','sandikusomantri@gmail.com','$2y$12$97zV7WLnv0E.hag7mtVEFO/xKWqscMAw5rYrTfdPYOWQECgAsatou','anggota','2026-03-30 04:26:29','2026-03-30 04:26:29',NULL,NULL),
(51,'Nia Kurniawati','kurniawatinia056@gmail.com','$2y$12$DQVffbnxHMANyPHbbAc6rOSSfII5pZ5LnZ9u3/nzKnA/7//Ir0/nu','anggota','2026-03-30 04:40:12','2026-03-30 04:40:12',NULL,NULL),
(52,'Epi Puspitasari','spuspita966@gmail.com','$2y$12$wQZGIvDzak2ri4rFNnpE9ucR/M2oErBcSFhRj/0y7j1EnV.J8uEMC','anggota','2026-03-30 04:43:05','2026-03-30 04:43:05',NULL,NULL),
(53,'Ayi Kurnia','akin08nop@gmail.com','$2y$12$3NwONGmxy9FgarONvSIiYe4NuZRn6nlodGdnx8i9/HGpIEEZg9rte','anggota','2026-03-30 04:47:23','2026-03-30 04:47:23',NULL,NULL),
(54,'Lisna Windi Nurhuda','Lwindinurhuda@gmail.com','$2y$12$IIycqM1x6yJF.oPKXoID3OEmNaEmTUPctxV.xf.raiEP0PYaed/3K','anggota','2026-03-30 04:54:26','2026-03-30 04:54:26',NULL,NULL),
(55,'Ema Janika','emajanika@gmail.com','$2y$12$03PHP1qsZ6dnYzn2uC0Go.Qx1f8s4mP84vOMCumQW/pkW0JI/M0eu','anggota','2026-03-30 04:58:07','2026-03-30 04:58:07',NULL,NULL),
(56,'Sifa Utami','biyana2aid@gmail.com','$2y$12$EN7JwVSAVijuqcP0M8PI/.pEFPYLcGfo7.SFWH4SwBq5.Cs9Cx29K','anggota','2026-03-30 05:00:31','2026-03-30 05:00:31',NULL,NULL),
(57,'Ai Warung','andah0191@gmail.com','$2y$12$l3HWGMyG0hiQVfPCUYsCg.ODa97pYNDtHBSAz1RFSLYKbVuI0QrxO','anggota','2026-03-30 05:02:56','2026-03-30 05:02:56',NULL,NULL),
(58,'Runi Puspa Amaliah','runipus22@gmail.com','$2y$12$5Ev80BeH7wgKXfVBySX5NuV45kOkSGoMBJo0hI2vOSxVsXPwsM1Ea','anggota','2026-03-30 05:06:24','2026-03-30 05:06:24',NULL,NULL),
(59,'Ade Rohmat','rohmatulloh313@gmail.com','$2y$12$RMPpeyeSY3pbeoyPIbZP8eNcPMPymNxi/.M8pyiV00/l.W0ixf1/.','anggota','2026-03-30 05:09:24','2026-03-30 05:09:24',NULL,NULL),
(60,'Kadarsah','kadarsahkhanna@gmail.com','$2y$12$lAQ3r5vGps8oMd7wJTeEieL4GnY8gXScv82UFLMCnihtJJwJqj3/6','anggota','2026-03-30 05:12:03','2026-03-30 05:12:03',NULL,NULL),
(61,'Wulan Dwi Marliana','wulandwimarliana@gmail.com','$2y$12$kvdYEnuOiGLrAoCrJ8HTfeQcYOMV871xu7s7gPO0yFVizmQNZvo7i','anggota','2026-03-30 05:17:00','2026-03-30 05:17:00',NULL,NULL),
(62,'Budi Setiadi','b.setiadi1804@gmail.com','$2y$12$EaGqs904IJgsTuSU1v5SwueyzVNyugiKMmNr2E318gFk3VZpP5XP.','anggota','2026-03-30 05:19:03','2026-03-30 05:19:03',NULL,NULL),
(63,'Deri Heryanto','derriheryanto@gmail.com','$2y$12$OgXbEmclbUePsgY3cEZ0s.gasIe7oaWspljv.WBKaxVwdDPrF5h72','anggota','2026-03-30 05:21:17','2026-03-30 05:21:17',NULL,NULL),
(64,'Kaka Ruhimat','kakaruhimat289@gmail.com','$2y$12$QcULJUmH05h99.6feyPuGOt.9wPngtjizMJLaD24DzVPTvAANXqa.','anggota','2026-03-30 05:23:35','2026-03-30 05:23:35',NULL,NULL),
(65,'Euis Nursidah','euisnursidah85@gmail.com','$2y$12$8TdiWwDSBl3mc4S.KBIlE.cm8rsfsyoKi.uV2tYTgCrokWcDScGrC','anggota','2026-03-30 05:25:31','2026-03-30 05:25:31',NULL,NULL),
(66,'Airista Jayanti','airista.jayanti123@gmail.com','$2y$12$fwmOQ6dR.tHvW3uztQ1LKOWr7hLUZpr1bxuXtax62hY9wQoNjSpai','anggota','2026-03-30 05:27:40','2026-03-30 05:27:40',NULL,NULL),
(67,'Soni Ramdani','ashonson726@gmail.com','$2y$12$bG/XlK4hAg9T/ZehjKvrSut33185AfMrgSYhn8HRyj1qpM3MBBO22','anggota','2026-03-30 05:30:36','2026-03-30 05:30:36',NULL,NULL),
(68,'Elis Hernaelis','hernaelis@gmail.com','$2y$12$qQ8abUaa3ZAMJ/ANOBEouuiRaJN/Ie3qeg2q6tDpRXOmNzPYRTGjK','anggota','2026-03-30 05:35:32','2026-03-30 05:35:32',NULL,NULL),
(69,'Ali Saeful Milah','aly.sh@gmail.com','$2y$12$t72zLm02jnzskC2DjqRgEOUj8fRw04wz7iypPswEP5dNpDPg5fFGK','anggota','2026-03-30 05:37:29','2026-03-30 05:37:29',NULL,NULL),
(70,'Arip','arip@smkn4-tsm.sch.id','$2y$12$jeUHCntxupPXK190m268TudP0q1S3EHlmPl6D2zbIbklbVkinfyEy','anggota','2026-03-30 05:39:31','2026-03-30 05:39:31',NULL,NULL),
(71,'Fikri Adipura Yudistira','fayka2eps-tittfr@yahoo.co.id','$2y$12$NgBEu4XOoQbaJ.b7LD728ePxi7kFaO.QZnJ/2EZqi/6YXypzxgeZW','anggota','2026-03-30 05:43:18','2026-03-30 05:43:18',NULL,NULL),
(72,'Dede Irawan','emailkudedeirawan@gmail.com','$2y$12$JOIaHOeI9VkHjFsT3cQBje9hrpqi3SHmnsy2ZdI.EE6HpETuHqj1e','anggota','2026-03-30 05:44:58','2026-03-30 05:44:58',NULL,NULL),
(73,'Suminar','suminar.s2020@gmail.com','$2y$12$fdRXDuwRPqa6EcfOjryn2.zICV/XYeM6Zbvf7gemjZWNeYj3vjaTO','anggota','2026-03-30 05:47:23','2026-03-30 05:47:23',NULL,NULL),
(74,'Lisye Diana Inggriani','inggrianilisye@gmail.com','$2y$12$PTBALoGmgLlkyzvAO6SL.e6yW0dYaMTbHEbCHQDT8n7n/kZG2eHi.','anggota','2026-03-30 05:51:19','2026-03-30 05:51:19',NULL,NULL),
(75,'Imas Masruroh','joya.calm@gmail.com','$2y$12$EFGaj6VEPV4ro.zOBZJVGuqx/ATPrwYSM5QRVLI6FuxQx6/klSGe.','anggota','2026-03-30 05:53:56','2026-03-30 05:53:56',NULL,NULL),
(76,'Ami Miftahul Lukman','amimiftahul166@gmail.com','$2y$12$IkRMhv1BoYZq3ypKq.67Yu.Q5OyvjMzdgRWK2erT5R2.9muptagru','anggota','2026-03-30 05:56:36','2026-03-30 05:56:36',NULL,NULL),
(77,'Siti Nurmalah','sitinurmalah88@gmail.com','$2y$12$VxDWXaqZEuaTz/n5LB/sL.ccitk.IN1lfcQ8pJeRxJX22lylih6nO','anggota','2026-03-30 05:59:19','2026-03-30 05:59:19',NULL,NULL),
(78,'Resti Tandiani Utami','restitandiani@gmail.com','$2y$12$IHRF4MqHyhcsL1Z5lq0za.jtsfhZz0nMSrm9GZlNMI9AE1ZtFqXu2','anggota','2026-03-30 06:01:15','2026-03-30 06:01:15',NULL,NULL),
(79,'Jajang Deta Mulyadi','jajangdeta25@gmail.com','$2y$12$8BvcDy21BgCkmCblau/8/eHyDOnBBeshLRsWL84TpAq2UsC3rEHT.','anggota','2026-03-30 06:04:52','2026-03-30 06:04:52',NULL,NULL),
(80,'Helmi Permana','helmipermana4@gmail.com','$2y$12$pWaJGKLzJnffrWs9XWu.euplx1LKk2Cc3QNepeNu0QohDRp1kP7ay','anggota','2026-03-30 06:07:21','2026-03-30 06:07:21',NULL,NULL),
(81,'Yusep Saepul','yusepsaepul1979@gmail.com','$2y$12$UpIdAbaj1zTt00o/5Xa3WuD/YmDSxlgZuQOSQ1JnqvBQLNQrLO/fe','anggota','2026-03-30 06:10:23','2026-03-30 06:10:23',NULL,NULL),
(82,'Imat Ruhimat','imatruhimat9750@gmail.com','$2y$12$Ct5BUo4nUISRsqiMp2dF7e18YRsDq/dR/51mIYHQy9zbQZLt/kcUe','anggota','2026-03-30 06:12:35','2026-03-30 06:12:35',NULL,NULL),
(83,'Amanata Salma','amanasalma74@gmail.com','$2y$12$XTPtmwubjEfYiWcrG3pVuenlc3.HMSJtTL5Aon9zby5bsExOTFKF2','anggota','2026-03-30 06:14:25','2026-03-30 06:14:25',NULL,NULL),
(84,'Janwar','badwanjanwar@gmail.com','$2y$12$xIw4a3N.Tf6W0VoioklcIercBJISebCSqTac/AmlIXz/c8mTtCZ52','anggota','2026-03-30 06:16:12','2026-03-30 06:16:12',NULL,NULL),
(85,'Tia Maryani','tiamaryaniyw@gmail.com','$2y$12$VWiDbyfEihmpc/zuRtciaus6CkxCxvuOS.uicHsnGwK36PtcIuxVi','anggota','2026-03-30 06:18:41','2026-03-30 06:18:41',NULL,NULL),
(86,'Fahmi Fauzie','fahmifauzi160@gmail.com','$2y$12$fAHkcBb3nFiD0./ez2GR0ufn54eVv3oO0K6qjSLjtGLx2gOSSWBKa','anggota','2026-03-30 06:22:54','2026-03-30 06:22:54',NULL,NULL),
(87,'Dede Rodi','dederodi95@gmail.com','$2y$12$dpi2BEwS/Bvamq./IjmgQOshoxUjQKBgwN2.fS//lYjykG372Q2h6','anggota','2026-03-30 06:24:33','2026-03-30 06:24:33',NULL,NULL),
(88,'Yen Yen Suryani','yenyensuryani555@gmail.com','$2y$12$FmNo9U6TK4xDSD8VqV8h/O12IxYux3B1VBZFg/nWkxXb/Cw9b1npO','anggota','2026-03-30 06:26:24','2026-03-30 06:26:24',NULL,NULL),
(89,'Siti Mustika Dewi','sitimustikadewi26@gmail.com','$2y$12$SEGvCcNeK8/JCr2EJi7H6.shA9X2lDPlv7k8WJoSGi6g8v5wFepmW','anggota','2026-03-30 06:37:33','2026-03-30 06:37:33',NULL,NULL),
(90,'Vina Fitriani Tursina','vinafitrianitursina23@gmail.com','$2y$12$9HqwDUkmUM6Svso0mEhvdeoVYgdGk7DQaBK2V8T4TVpUO3x74DEEC','anggota','2026-03-30 06:39:36','2026-03-30 06:39:36',NULL,NULL),
(91,'Asep Nurul Huda','asepnurul@gmail.com','$2y$12$QYPqd/AyX5JwpHm7MImwp.LgUlcbfNgYBTXOpLV1FNy6vci9zO5j.','anggota','2026-03-30 06:41:09','2026-03-30 06:41:09',NULL,NULL),
(92,'Nana Purnama','nanapurnama84@gmail.com','$2y$12$ERy4amxni3AVEglQwDyQFunr3DfYezv87f3nwIh/PCdobmxzK1YmW','anggota','2026-03-30 06:42:45','2026-03-30 06:42:45',NULL,NULL),
(93,'Hery Wahyu Widodo','herywahyuwidodo7@gmail.com','$2y$12$oOGi0W2ob27wgnoSGxvlvehiMvv9tMaEuSCgpYhWzInXekMZHx58y','anggota','2026-03-30 06:45:01','2026-03-30 06:45:01',NULL,NULL),
(94,'Santi Suci Romdon','santisuci332@gmail.com','$2y$12$dDjiR.z5WqHC6U0i9OesrOLKMlHAXVV2I0bSxy7wAgPitiAztRJUG','anggota','2026-03-30 06:47:03','2026-03-30 06:47:03',NULL,NULL),
(95,'Herlina Pratama','pratamaherlina@gmail.com','$2y$12$JnbnjY7M.Vz.dfjVKM9vy.dbrFP/xQMI9ni9cNLcEJLnmaBNCgxU6','anggota','2026-03-30 06:48:47','2026-03-30 06:48:47',NULL,NULL),
(96,'Syam Rahadian Ardhy','bl4ckenbine@gmail.com','$2y$12$grN5i8pE4i5S1zA/Nn7FVOFgJUH28lD2pexkF7MLzxr4V/YsraxZi','anggota','2026-03-30 06:50:43','2026-03-30 06:50:43',NULL,NULL),
(97,'Eris Herianto','erishar51489@gmail.com','$2y$12$ntWBVryA/kAzK/Wf5sPAZ.jPAR/x5.JStAKtrvGCajoNnOsZd391i','anggota','2026-03-30 06:53:34','2026-03-30 06:53:34',NULL,NULL),
(98,'Fauzia Afifah','fauziaaffah27@gmail.com','$2y$12$LtDUks75nfQ1sNPYUANzoOkjn0jQRdbyXbtqOJJmv14TUGuGdYf6m','anggota','2026-03-30 06:55:59','2026-03-30 06:55:59',NULL,NULL),
(99,'Dewi Nurhayati','dewinurhayati0403@gmail.com','$2y$12$fuLS.BIt76hpB.1w/cgD.uUwE8Cbm8nVAIwRqrFYJoOoyzxeIrtLu','anggota','2026-03-30 06:58:02','2026-03-30 06:58:02',NULL,NULL),
(100,'Jajang Rohimat','jajangrohimat@gmail.com','$2y$12$v.TghVhbloACUejPBncZTeacCuM7IdT0ObhygyebW2jmPnQXQzz9m','anggota','2026-03-30 06:59:25','2026-03-30 06:59:25',NULL,NULL),
(101,'Ari Yanuar','ariyanwar8703@gmail.com','$2y$12$DLMJNlGyPAS1O.ZOouNyc..uC1l0rnii4vgapDLMT/5N2SyYoYF.u','anggota','2026-03-30 07:01:25','2026-03-30 07:01:25',NULL,NULL),
(102,'Septa Harry Perana','sevta2evon@gmail.com','$2y$12$caM4hQWYVHC5cSXPZ1nYmOnzuQI.m7ce60AAuZ90fClFc0URLptxm','anggota','2026-03-30 07:03:29','2026-03-30 07:03:29',NULL,NULL),
(103,'Deni Maulana','deni.analuam@gmail.com','$2y$12$vQ2P0kXraLKlZb59ctBBBeFn.gekJsjkzVyrAiw72qTv2ucEyhAwa','anggota','2026-03-30 07:05:13','2026-03-30 07:05:13',NULL,NULL),
(104,'Andi Moh Permandi','ampermadi@gmail.com','$2y$12$pQhoeLHdEMX0zluQX6FRZeqVRFIL9mwJluSg.gWCiBICrHSq9x4IG','anggota','2026-03-30 07:06:55','2026-03-30 07:06:55',NULL,NULL),
(105,'Adi Iasan','adilasan02@gmail.com','$2y$12$R.8yJQzkQeAbhvHduZ1s6OkUzIESOkzyHybd3K.ubbhUuaO/FIywm','anggota','2026-03-30 07:08:55','2026-04-02 00:53:54',NULL,NULL),
(106,'Yanto Sugianto','yantosugianto@gmail.com','$2y$12$PmGoD0DyY1FLQhZ1RzVL1.HUQgmRi4jEL4JY89lT6a3YU8lrOf8aS','anggota','2026-03-30 07:10:34','2026-03-30 07:10:34',NULL,NULL),
(107,'Gina Mutia','ginamutia1509@gmail.com','$2y$12$ylOKC3qCjItZpm7slTjKXOLjXv2zvzl9qRhJTr6gB9Cjh7ZwWUlYm','anggota','2026-03-30 07:44:58','2026-03-30 07:44:58',NULL,NULL),
(108,'Yuyus Arie Windhu','yawidhu@gmail.com','$2y$12$k1c6pJ4yH5wQBMNNV9b0auZDVrDNrvpJGrboXWZswJjDg9w6228Sm','anggota','2026-03-30 07:47:10','2026-03-30 07:47:10',NULL,NULL),
(109,'Erma Yunita Rachmiatunnisa','ermayunita40@gmail.com','$2y$12$9PIm5BiI7E81.Db5nZtJb.DHxsr3S64k1H/sxxjKG//dXPjO2ARo6','anggota','2026-03-30 07:49:22','2026-03-30 07:49:22',NULL,NULL),
(110,'Arif Rahmanudin','arifrahmanudin@gmail.com','$2y$12$XcTB1g8ZsFFvNZGXYV5MvOhW0F7oQI.iZf8FvMNH1Xr5vomO9Rmwe','anggota','2026-03-30 07:51:48','2026-03-30 07:51:48',NULL,NULL),
(111,'Nita Khoerunnisa','nita.khoerunnisa@gmail.com','$2y$12$CKZa5RLF25Ri.NDhivTPse7.5R0I2Y/B7iFXIMY2QORQF4YmpUsyO','anggota','2026-03-30 07:54:13','2026-03-30 07:54:13',NULL,NULL),
(112,'Siti Sarah Patmawati','sitsar92@gmail.com','$2y$12$FeBgIAu2PIZws0h254jtROpyusgU9ve6k0eSlllFF190IUdvlbWCi','anggota','2026-03-30 07:56:30','2026-03-30 07:56:30',NULL,NULL),
(113,'Bintang Anugrahing','bintanganugrahingwidh@gmail.com','$2y$12$VknrkPzkUH/FL0/APY91QOuQ5KaId.fgkgBoJ6ve2VepReZkMSemS','anggota','2026-03-30 07:58:50','2026-03-30 07:58:50',NULL,NULL),
(114,'Didah Hamidah','didahh62@gmail.com','$2y$12$R0IDpMzm/I5Zk2KLx41M4uZoDqDwSA/q02j9f0grqtFW0IYpOM21a','anggota','2026-03-30 08:01:42','2026-03-30 08:01:42',NULL,NULL),
(115,'Endang Nurjanah','endangnurjanah92@gmail.com','$2y$12$u03IfszfP6WMAMzXA9x5D.iXN.FC0YmcX.SuIt8qhEPxJCvItjMpW','anggota','2026-03-30 08:03:53','2026-03-30 08:03:53',NULL,NULL),
(116,'Kalih Fahman Nabiyin','xlucifer7769@gmail.com','$2y$12$HvKXo5/VWNByiQjh7bOG2.7C3c/s.86tU/EhITVxd9/12qPwfGe/.','anggota','2026-03-30 21:45:05','2026-03-30 21:45:05',NULL,NULL),
(117,'R.Tini Gartini','tinigantini21@gmail.com','$2y$12$.SWiYX1zrfIU8IS3gxiyt.Wh75B0Tfhztlk3eUISGOhVoBM.Ng9/W','anggota','2026-03-30 21:50:10','2026-03-30 21:50:10',NULL,NULL),
(118,'Nuryani(Mang Herman)','hermanhermanto12@gmail.com','$2y$12$oJ0rEuENXg4SoSwV7dgn9.G18oAAngGSSlXbFkyU8LYCwACJkNWQC','anggota','2026-03-30 21:52:48','2026-03-30 21:52:48',NULL,NULL),
(119,'Engguh Gusman','engguhgusman021@gmail.com','$2y$12$cjGsD7QoEwIcNx2kPwpdzuVCsr1pcmLkuYOA4PrxohwjhVq56xjaC','anggota','2026-03-30 21:58:56','2026-03-30 21:58:56',NULL,NULL),
(120,'Muliadi','adi.8338@gmail.com','$2y$12$A7qGYHjXRbmne.MzLbWZYu5dVjtcPTI0CI374Bk1N8Ydp.I0s2lJC','anggota','2026-03-30 22:29:32','2026-03-30 22:29:32',NULL,NULL),
(121,'Dian Suryanti','diansuryatin18@gmail.com','$2y$12$T3Zgq11Jf5cOvpXIq81L6.wR7srKD2ExhZBovH7YW7WQYFlsMyJsa','anggota','2026-03-30 22:31:22','2026-03-30 22:31:22',NULL,NULL),
(122,'Anna Rachmiati','anarachmiati@gmail.com','$2y$12$gGm74iZYmpoZF19aVvxpL.3yO.4./gNze7elqXxtgewI.X/ksHmZy','anggota','2026-03-30 22:33:09','2026-03-30 22:33:09',NULL,NULL),
(123,'Hayato Handsome','hayatooosanto@gmail.com','$2y$12$Sl3xKCoI.VdapcpGt6kG0OlhAEwrANfmP7QhnDcyy.ivwfQRMdcgu','anggota','2026-03-31 00:37:05','2026-03-31 00:37:05',NULL,NULL),
(124,'Zahir','zahir00@gmail.com','$2y$12$x9yH8MFGTD/hx2Wuqk42iOAkzfTijEw6m5aam1aMPipxSd1svaxxq','anggota','2026-03-31 17:47:52','2026-03-31 20:57:50','profile/8LmQInqp071TIKxiIhtCLDtq7xak8aIRwQMGgnEU.jpg',NULL),
(125,'Nita Marlina','nithamarlina.nm@gmail.com','$2y$12$RiwcoqpKC4baeJUFoQgc7.zvCGw4KH.4lsRqY4/3iAIos4KV4MYf6','anggota','2026-03-31 18:23:20','2026-03-31 18:23:20',NULL,NULL),
(126,'Kusnaedi','edicevigi@gmail.com','$2y$12$AADw6npFm0nX6CVJa8.Di.eEJex8jFWNmml4dN.XqN4Ik8RoJ9xEO','anggota','2026-03-31 18:26:07','2026-03-31 18:26:07',NULL,NULL),
(127,'Didah S Sukanda','didahsaadah597@gmail.com','$2y$12$EqcTH6GJioFPDRXdYy.xMOqTD3EuKdTyvdLyoT6wD2omSw85QK02m','anggota','2026-03-31 18:29:13','2026-03-31 18:29:13',NULL,NULL),
(128,'Rachmat rochimat','tiarasurya69@gmail.com','$2y$12$OVIENyeQLRtHbTGxrhKOSOoa8QXg16N7QQihA6Hfsh../0RQd/X72','anggota','2026-03-31 18:31:58','2026-03-31 18:31:58',NULL,NULL),
(129,'Drs. H desnueri','udesnueri@gmail.com','$2y$12$2zxV/T1B/oH6Yr1XCKNaFOdNjvgwquWx9wSbZapCbL6zl5dsXOB5S','anggota','2026-03-31 18:33:50','2026-03-31 18:33:50',NULL,NULL),
(130,'A Yusuf Hanafi','yusuf_arsya45@Yahoo.co.id','$2y$12$3ae2LBxIastQjD0PXQnu..vaIgtB8/SbkCxBBV50c5lOe9qK96sW6','anggota','2026-03-31 18:49:38','2026-03-31 18:49:38',NULL,NULL),
(131,'Dudi Setiadi','dudi@smkn4-tsm.sch.id','$2y$12$eUe8CxhHUNgTnplbi1SkIOLYYg32GjuJ9pUfEgTDJD8aO6cVUdtfS','anggota','2026-03-31 18:51:45','2026-03-31 18:51:45',NULL,NULL),
(132,'Anwarullah','akunpolosk1@gmail.com','$2y$12$hdPQVGaYVwrswOf5QQSBy.ul7byyywRE6XTEooBKV9SYsnqXmjIdC','anggota','2026-04-01 00:33:31','2026-04-01 19:12:13',NULL,NULL),
(133,'Airin Rizqia M.S','airinrizqiams@gmail.com','$2y$12$DkPgMOnAD9tMXTDELFHgCOKrcSGxrn61wlA2Mn6GW.Fdh7rCCZVJS','anggota','2026-04-01 18:26:10','2026-04-01 18:26:10',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
commit;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2026-04-03 15:05:46
