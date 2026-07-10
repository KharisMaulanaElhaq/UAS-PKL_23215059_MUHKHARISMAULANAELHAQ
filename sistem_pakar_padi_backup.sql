-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: sistem_pakar_padi
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('5c785c036466adea360111aa28563bfd556b5fba','i:1;',1783171489),('5c785c036466adea360111aa28563bfd556b5fba:timer','i:1783171489;',1783171489),('admin@sipakar.test|127.0.0.1','i:1;',1783038439),('admin@sipakar.test|127.0.0.1:timer','i:1783038439;',1783038439),('kharismaulana2326@gmail.com|127.0.0.1','i:1;',1783037067),('kharismaulana2326@gmail.com|127.0.0.1:timer','i:1783037067;',1783037067),('landing.komoditas','O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:1:{i:0;O:20:\"App\\Models\\Komoditas\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:9:\"komoditas\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:2;s:4:\"kode\";s:6:\"JAGUNG\";s:4:\"nama\";s:6:\"Jagung\";s:4:\"slug\";s:6:\"jagung\";s:6:\"gambar\";s:34:\"assets/images/komoditas/jagung.jpg\";s:9:\"deskripsi\";s:46:\"Deteksi penyakit dan hama pada tanaman jagung.\";s:10:\"created_at\";s:19:\"2026-07-02 08:54:07\";s:10:\"updated_at\";s:19:\"2026-07-02 09:13:43\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:2;s:4:\"kode\";s:6:\"JAGUNG\";s:4:\"nama\";s:6:\"Jagung\";s:4:\"slug\";s:6:\"jagung\";s:6:\"gambar\";s:34:\"assets/images/komoditas/jagung.jpg\";s:9:\"deskripsi\";s:46:\"Deteksi penyakit dan hama pada tanaman jagung.\";s:10:\"created_at\";s:19:\"2026-07-02 08:54:07\";s:10:\"updated_at\";s:19:\"2026-07-02 09:13:43\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:1:{i:0;s:10:\"gambar_url\";}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:4:\"kode\";i:1;s:4:\"nama\";i:2;s:4:\"slug\";i:3;s:6:\"gambar\";i:4;s:9:\"deskripsi\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}',1783171872),('landing.stats','a:4:{s:8:\"penyakit\";i:5;s:4:\"hama\";i:4;s:6:\"gejala\";i:40;s:7:\"deteksi\";i:2;}',1783171872);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gejala`
--

DROP TABLE IF EXISTS `gejala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gejala` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `komoditas_id` bigint unsigned NOT NULL,
  `kode_gejala` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_gejala` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gejala_komoditas_id_kode_gejala_unique` (`komoditas_id`,`kode_gejala`),
  CONSTRAINT `gejala_komoditas_id_foreign` FOREIGN KEY (`komoditas_id`) REFERENCES `komoditas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gejala`
--

LOCK TABLES `gejala` WRITE;
/*!40000 ALTER TABLE `gejala` DISABLE KEYS */;
INSERT INTO `gejala` VALUES (55,2,'GJ01','Daun muda mengalami perubahan warna menjadi kuning pucat memanjang sejajar tulang daun','2026-07-02 02:13:44','2026-07-02 02:13:44'),(56,2,'GJ02','Permukaan daun terdapat lapisan putih seperti tepung terutama pagi hari','2026-07-02 02:13:44','2026-07-02 02:13:44'),(57,2,'GJ03','Pertumbuhan tanaman terhambat dan tanaman tampak kerdil','2026-07-02 02:13:44','2026-07-02 02:13:44'),(58,2,'GJ04','Daun menggulung dan terpuntir','2026-07-02 02:13:44','2026-07-02 02:13:44'),(59,2,'GJ05','Tongkol jagung tidak terbentuk secara normal','2026-07-02 02:13:44','2026-07-02 02:13:44'),(60,2,'GJ06','Muncul bercak kecil oval seperti basah pada daun','2026-07-02 02:13:44','2026-07-02 02:13:44'),(61,2,'GJ07','Bercak berkembang menjadi memanjang berbentuk elips','2026-07-02 02:13:44','2026-07-02 02:13:44'),(62,2,'GJ08','Daun berubah warna menjadi coklat keabu-abuan seperti terbakar','2026-07-02 02:13:44','2026-07-02 02:13:44'),(63,2,'GJ09','Daun bagian bawah lebih dulu terserang','2026-07-02 02:13:44','2026-07-02 02:13:44'),(64,2,'GJ10','Tanaman cepat mengering pada serangan berat','2026-07-02 02:13:44','2026-07-02 02:13:44'),(65,2,'GJ11','Muncul titik-titik kecil berwarna coklat seperti karat pada daun tua','2026-07-02 02:13:44','2026-07-02 02:13:44'),(66,2,'GJ12','Terdapat serbuk berwarna kuning kecoklatan pada permukaan daun','2026-07-02 02:13:44','2026-07-02 02:13:44'),(67,2,'GJ13','Bercak menyebar hingga seludang daun','2026-07-02 02:13:44','2026-07-02 02:13:44'),(68,2,'GJ14','Daun menjadi kering pada fase lanjut','2026-07-02 02:13:44','2026-07-02 02:13:44'),(69,2,'GJ15','Muncul bercak hijau kekuningan pada daun','2026-07-02 02:13:44','2026-07-02 02:13:44'),(70,2,'GJ16','Bercak berubah menjadi coklat kemerahan memanjang','2026-07-02 02:13:44','2026-07-02 02:13:44'),(71,2,'GJ17','Bercak awal terlihat basah kemudian mengering','2026-07-02 02:13:44','2026-07-02 02:13:44'),(72,2,'GJ18','Daun mengalami kerusakan luas pada serangan berat','2026-07-02 02:13:44','2026-07-02 02:13:44'),(73,2,'GJ19','Daun tampak mosaik hijau kekuningan','2026-07-02 02:13:44','2026-07-02 02:13:44'),(74,2,'GJ20','Tanaman tumbuh kerdil','2026-07-02 02:13:44','2026-07-02 02:13:44'),(75,2,'GJ21','Warna daun tampak belang kuning hijau','2026-07-02 02:13:44','2026-07-02 02:13:44'),(76,2,'GJ22','Tidak ditemukan serbuk putih seperti penyakit bulai','2026-07-02 02:13:44','2026-07-02 02:13:44'),(77,2,'GJ23','Daun berlubang tidak beraturan','2026-07-02 02:13:44','2026-07-02 02:13:44'),(78,2,'GJ24','Terdapat serbuk seperti serbuk gergaji di pucuk daun','2026-07-02 02:13:44','2026-07-02 02:13:44'),(79,2,'GJ25','Larva atau ulat ditemukan pada tanaman','2026-07-02 02:13:44','2026-07-02 02:13:44'),(80,2,'GJ26','Titik tumbuh tanaman rusak','2026-07-02 02:13:44','2026-07-02 02:13:44'),(81,2,'GJ27','Daun muda habis dimakan ulat','2026-07-02 02:13:44','2026-07-02 02:13:44'),(82,2,'GJ28','Terdapat lubang gerekan pada batang jagung','2026-07-02 02:13:44','2026-07-02 02:13:44'),(83,2,'GJ29','Batang mudah patah akibat gerekan larva','2026-07-02 02:13:44','2026-07-02 02:13:44'),(84,2,'GJ30','Bunga jantan rusak atau patah','2026-07-02 02:13:44','2026-07-02 02:13:44'),(85,2,'GJ31','Tongkol mengalami kerusakan','2026-07-02 02:13:44','2026-07-02 02:13:44'),(86,2,'GJ32','Rambut tongkol jagung terpotong','2026-07-02 02:13:44','2026-07-02 02:13:44'),(87,2,'GJ33','Ujung tongkol terdapat bekas gerekan','2026-07-02 02:13:44','2026-07-02 02:13:44'),(88,2,'GJ34','Ditemukan larva di dalam tongkol','2026-07-02 02:13:44','2026-07-02 02:13:44'),(89,2,'GJ35','Tongkol jagung rusak dan membusuk','2026-07-02 02:13:44','2026-07-02 02:13:44'),(90,2,'GJ36','Daun menggulung akibat cairan tanaman dihisap','2026-07-02 02:13:44','2026-07-02 02:13:44'),(91,2,'GJ37','Daun mengalami klorosis atau menguning','2026-07-02 02:13:44','2026-07-02 02:13:44'),(92,2,'GJ38','Permukaan daun tertutup embun jelaga hitam','2026-07-02 02:13:44','2026-07-02 02:13:44'),(93,2,'GJ39','Pertumbuhan tanaman terganggu','2026-07-02 02:13:44','2026-07-02 02:13:44'),(94,2,'GJ40','Koloni kutu terlihat pada daun dan batang','2026-07-02 02:13:44','2026-07-02 02:13:44');
/*!40000 ALTER TABLE `gejala` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hama`
--

DROP TABLE IF EXISTS `hama`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hama` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `komoditas_id` bigint unsigned NOT NULL,
  `kode_hama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_hama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `solusi` text COLLATE utf8mb4_unicode_ci,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hama_komoditas_id_kode_hama_unique` (`komoditas_id`,`kode_hama`),
  CONSTRAINT `hama_komoditas_id_foreign` FOREIGN KEY (`komoditas_id`) REFERENCES `komoditas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hama`
--

LOCK TABLES `hama` WRITE;
/*!40000 ALTER TABLE `hama` DISABLE KEYS */;
INSERT INTO `hama` VALUES (8,2,'JAGUNG-H01','Ulat Grayak','Hama ulat Spodoptera frugiperda pemakan daun muda dan pucuk tanaman jagung.','Cara Kimia: Aplikasikan pestisida pada pagi atau sore hari. Pestisida yang dapat digunakan antara lain pestisida berbahan aktif Emamektin benzoate, klorantraniliprol dan Klorpirifos. Fokuskan penyemprotan ke arah pucuk daun tempat ulat biasa makan.\n\nCara Hayati: Sebelum ambang batas pengendalian dapat menggunakan agens hayati seperti Bacillus thuringiensis dan Beauveria bassiana. Semprotkan secara merata ke seluruh permukaan daun.\n\nAlternatif/Saran Praktis: Taburkan sedikit abu sabut kelapa atau pasir bersih langsung ke dalam corong/pucuk daun jagung. Tekstur kasar ini membuat ulat tidak nyaman bersembunyi di sana.','assets/images/targets/jagung-h01.jpg','2026-07-02 02:13:44','2026-07-02 02:13:44'),(9,2,'JAGUNG-H02','Penggerek Batang','Hama ulat Ostrinia furnacalis yang menggerek batang jagung sehingga batang patah dan tongkol rusak.','Cara Kimia: Taburkan sejumput kecil butiran Karbofuran (Furadan) langsung ke lubang pucuk jagung tempat daun muda tumbuh.\n\nCara Hayati: Sebelum terjadi serangan pengendalian dapat menggunakan agens hayati seperti Bacillus thuringiensis dan Beauveria bassiana.\n\nAlternatif/Saran Praktis: Terapkan penanaman serempak dalam satu kawasan luas (selisih waktu tanam antar petak maksimal 2 minggu) agar siklus hidup ngengat penggerek terputus.','assets/images/targets/jagung-h02.jpg','2026-07-02 02:13:44','2026-07-02 02:13:44'),(10,2,'JAGUNG-H03','Penggerek Tongkol','Hama ulat Helicoverpa armigera yang menyerang tongkol jagung dan merusak biji.','Cara Kimia: Semprotkan Klorantraniliprol dosis 2 ml/liter air tepat ketika jagung mulai mengeluarkan rambut.\n\nCara Hayati: Sebelum terjadi serangan pengendalian dapat menggunakan agens hayati seperti Bacillus thuringiensis dan Beauveria bassiana.\n\nAlternatif/Saran Praktis: Amati secara manual. Saat rambut jagung mulai kecoklatan, raba ujung tongkolnya. Jika terasa lunak berongga atau ada serbuk bekas gerekan, buka sedikit ujungnya dan buang ulatnya secara manual.','assets/images/targets/jagung-h03.jpg','2026-07-02 02:13:44','2026-07-02 02:13:44'),(11,2,'JAGUNG-H04','Kutu Daun','Hama Aphis maydis pengisap cairan daun jagung, menyebabkan klorosis dan embun jelaga.','Cara Kimia: Semprotkan Imidakloprid dosis 1 ml/liter air jika populasi kutu daun dan semut sudah menutupi pelepah atau daun.\n\nAlternatif/Saran Praktis: Hindari pemberian pupuk Nitrogen (seperti Urea) secara berlebihan. Tanaman yang terlalu subur dan hijau pekat sangat disukai kutu daun.','assets/images/targets/jagung-h04.jpg','2026-07-02 02:13:44','2026-07-02 02:13:44');
/*!40000 ALTER TABLE `hama` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `komoditas`
--

DROP TABLE IF EXISTS `komoditas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `komoditas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `komoditas_kode_unique` (`kode`),
  UNIQUE KEY `komoditas_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `komoditas`
--

LOCK TABLES `komoditas` WRITE;
/*!40000 ALTER TABLE `komoditas` DISABLE KEYS */;
INSERT INTO `komoditas` VALUES (2,'JAGUNG','Jagung','jagung','assets/images/komoditas/jagung.jpg','Deteksi penyakit dan hama pada tanaman jagung.','2026-07-02 01:54:07','2026-07-02 02:13:43');
/*!40000 ALTER TABLE `komoditas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_05_26_100513_create_gejala_table',1),(5,'2026_05_26_100514_create_penyakit_table',1),(6,'2026_05_26_100515_create_hama_table',1),(7,'2026_05_26_100516_create_rules_table',1),(8,'2026_05_26_100517_create_rule_details_table',1),(9,'2026_05_26_200000_create_riwayat_deteksi_table',1),(10,'2026_05_26_210000_add_pengguna_role_to_users_table',1),(11,'2026_05_26_220000_add_gambar_to_penyakit_and_hama_table',1),(12,'2026_05_27_100000_create_komoditas_table',1),(13,'2026_05_27_100001_add_komoditas_id_to_knowledge_tables',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penyakit`
--

DROP TABLE IF EXISTS `penyakit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `penyakit` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `komoditas_id` bigint unsigned NOT NULL,
  `kode_penyakit` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penyakit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `solusi` text COLLATE utf8mb4_unicode_ci,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `penyakit_komoditas_id_kode_penyakit_unique` (`komoditas_id`,`kode_penyakit`),
  CONSTRAINT `penyakit_komoditas_id_foreign` FOREIGN KEY (`komoditas_id`) REFERENCES `komoditas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penyakit`
--

LOCK TABLES `penyakit` WRITE;
/*!40000 ALTER TABLE `penyakit` DISABLE KEYS */;
INSERT INTO `penyakit` VALUES (8,2,'JAGUNG-P01','Bulai','Penyakit jamur Peronosclerospora spp yang menyerang daun muda jagung. Ditandai daun kuning pucat memanjang dan lapisan putih seperti tepung.','Cara Kimia: Penyakit ini sangat mematikan dan tidak bisa diobati setelah parah. Pencegahan wajib: campurkan benih jagung dengan fungisida Metalaksil (contoh: Ridomil) dosis 2–5 gram/kg benih sebelum ditanam. Untuk mencegah serangan meluas dapat menggunakan fungisida berbahan aktif Tembaga Oksida seperti Nordox.\n\nCara Hayati: Saat pengolahan lahan, campurkan pupuk kandang/kompos dengan agens pengendali hayati Trichoderma sp., dan aplikasikan di tanah secara langsung.\n\nAlternatif/Saran Praktis: Pilih varietas benih yang tahan bulai. Jika ada bibit jagung berumur 1-3 minggu yang daunnya kuning pucat sejajar, segera cabut paksa, bawa keluar sawah, dan timbun/bakar.','assets/images/targets/jagung-p01.jpg','2026-07-02 02:13:44','2026-07-02 02:13:44'),(9,2,'JAGUNG-P02','Hawar Daun','Penyakit jamur Helminthosporium sp dengan bercak oval memanjang elips hingga daun coklat keabu-abuan.','Cara Kimia: Aplikasikan fungisida Mankozeb atau Propineb 2–3 gram/liter air saat muncul bercak memanjang mirip daun terbakar.\n\nCara Hayati: Sebelum terjadi serangan pengendalian dapat menggunakan agens hayati seperti Trichoderma sp.\n\nAlternatif/Saran Praktis: Perbanyak unsur hara Kalium (KCL) untuk mengeraskan dinding sel daun jagung. Singkirkan daun bagian bawah (daun tua) yang sudah rusak parah agar sirkulasi udara lebih baik.','assets/images/targets/jagung-p02.jpg','2026-07-02 02:13:44','2026-07-02 02:13:44'),(10,2,'JAGUNG-P03','Karat Daun','Penyakit jamur Puccinia polysora dengan bercak coklat karat dan serbuk kuning kecoklatan pada daun.','Cara Kimia: Gunakan fungisida Tebuconazole (contoh: Folicur) dosis 1–2 ml/liter air.\n\nCara Hayati: Sebelum terjadi serangan pengendalian dapat menggunakan agens hayati seperti Trichoderma sp.\n\nAlternatif/Saran Praktis: Jangan menanam dengan jarak yang terlalu rapat (misal jarak ideal 70 x 20 cm). Lahan yang terlalu rimbun sangat disukai jamur karat daun.','assets/images/targets/jagung-p03.jpg','2026-07-02 02:13:44','2026-07-02 02:13:44'),(11,2,'JAGUNG-P04','Bercak Daun','Penyakit jamur Bipolaris maydis dengan bercak hijau kekuningan menjadi coklat kemerahan memanjang.','Cara Kimia: Semprotkan Azoksistrobin dosis 1–2 ml/liter air.\n\nAlternatif/Saran Praktis: Lakukan pergiliran/rotasi tanaman dengan kacang-kacangan (kedelai, kacang hijau) untuk memutus siklus jamur yang tertinggal di tanah paska panen.','assets/images/targets/jagung-p04.jpg','2026-07-02 02:13:44','2026-07-02 02:13:44'),(12,2,'JAGUNG-P05','Virus Mosaik Kerdil','Penyakit virus Maize Dwarf Mosaic Virus (MDMV) dengan gejala mosaik kuning-hijau dan tanaman kerdil.','Cara Kimia (Fokus Vektor): Virus tidak mempan racun kimia. Segera semprotkan Imidakloprid untuk membunuh serangga (kutu) yang merupakan vektor atau pembawa yang dapat menularkan virus dari satu jagung ke jagung lain.\n\nAlternatif/Saran Praktis: Cabut dan musnahkan tanaman jagung yang belang-belang kerdil. Jangan biarkan sisa tanaman ini menjadi sumber penularan. Bakar atau musnahkan sisa serangan tersebut.','assets/images/targets/jagung-p05.jpg','2026-07-02 02:13:44','2026-07-02 02:13:44');
/*!40000 ALTER TABLE `penyakit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riwayat_deteksi`
--

DROP TABLE IF EXISTS `riwayat_deteksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `riwayat_deteksi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `komoditas_id` bigint unsigned DEFAULT NULL,
  `nama_komoditas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `nama_pengguna` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_hasil` enum('penyakit','hama') COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_id` bigint unsigned NOT NULL,
  `nama_target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_target` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_cf` decimal(5,4) NOT NULL DEFAULT '0.0000',
  `gejala_terpilih` json NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `riwayat_deteksi_user_id_foreign` (`user_id`),
  KEY `riwayat_deteksi_jenis_hasil_target_id_index` (`jenis_hasil`,`target_id`),
  KEY `riwayat_deteksi_created_at_index` (`created_at`),
  KEY `riwayat_deteksi_komoditas_id_index` (`komoditas_id`),
  CONSTRAINT `riwayat_deteksi_komoditas_id_foreign` FOREIGN KEY (`komoditas_id`) REFERENCES `komoditas` (`id`) ON DELETE SET NULL,
  CONSTRAINT `riwayat_deteksi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riwayat_deteksi`
--

LOCK TABLES `riwayat_deteksi` WRITE;
/*!40000 ALTER TABLE `riwayat_deteksi` DISABLE KEYS */;
INSERT INTO `riwayat_deteksi` VALUES (1,2,'Jagung',NULL,'kharis','penyakit',8,'Bulai','JAGUNG-P01',0.9332,'[{\"id\": 55, \"kode\": \"GJ01\", \"nama\": \"Daun muda mengalami perubahan warna menjadi kuning pucat memanjang sejajar tulang daun\", \"cf_user\": 0.8, \"cf_label\": \"Yakin\"}, {\"id\": 56, \"kode\": \"GJ02\", \"nama\": \"Permukaan daun terdapat lapisan putih seperti tepung terutama pagi hari\", \"cf_user\": 0.8, \"cf_label\": \"Yakin\"}, {\"id\": 57, \"kode\": \"GJ03\", \"nama\": \"Pertumbuhan tanaman terhambat dan tanaman tampak kerdil\", \"cf_user\": 0.6, \"cf_label\": \"Cukup Yakin\"}, {\"id\": 58, \"kode\": \"GJ04\", \"nama\": \"Daun menggulung dan terpuntir\", \"cf_user\": 0.4, \"cf_label\": \"Kurang Yakin\"}, {\"id\": 59, \"kode\": \"GJ05\", \"nama\": \"Tongkol jagung tidak terbentuk secara normal\", \"cf_user\": 0.2, \"cf_label\": \"Tidak Yakin\"}]','::1','2026-07-02 02:28:29','2026-07-02 02:28:29'),(2,2,'Jagung',NULL,'kharis','hama',8,'Ulat Grayak','JAGUNG-H01',0.9780,'[{\"id\": 77, \"kode\": \"GJ23\", \"nama\": \"Daun berlubang tidak beraturan\", \"cf_user\": 0.8, \"cf_label\": \"Yakin\"}, {\"id\": 78, \"kode\": \"GJ24\", \"nama\": \"Terdapat serbuk seperti serbuk gergaji di pucuk daun\", \"cf_user\": 0.6, \"cf_label\": \"Cukup Yakin\"}, {\"id\": 79, \"kode\": \"GJ25\", \"nama\": \"Larva atau ulat ditemukan pada tanaman\", \"cf_user\": 0.8, \"cf_label\": \"Yakin\"}, {\"id\": 80, \"kode\": \"GJ26\", \"nama\": \"Titik tumbuh tanaman rusak\", \"cf_user\": 0.4, \"cf_label\": \"Kurang Yakin\"}, {\"id\": 81, \"kode\": \"GJ27\", \"nama\": \"Daun muda habis dimakan ulat\", \"cf_user\": 0.8, \"cf_label\": \"Yakin\"}]','::1','2026-07-02 02:33:20','2026-07-02 02:33:20');
/*!40000 ALTER TABLE `riwayat_deteksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rule_details`
--

DROP TABLE IF EXISTS `rule_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rule_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `rule_id` bigint unsigned NOT NULL,
  `gejala_id` bigint unsigned NOT NULL,
  `nilai_cf` decimal(4,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rule_details_rule_id_gejala_id_unique` (`rule_id`,`gejala_id`),
  KEY `rule_details_gejala_id_foreign` (`gejala_id`),
  CONSTRAINT `rule_details_gejala_id_foreign` FOREIGN KEY (`gejala_id`) REFERENCES `gejala` (`id`) ON DELETE CASCADE,
  CONSTRAINT `rule_details_rule_id_foreign` FOREIGN KEY (`rule_id`) REFERENCES `rules` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rule_details`
--

LOCK TABLES `rule_details` WRITE;
/*!40000 ALTER TABLE `rule_details` DISABLE KEYS */;
INSERT INTO `rule_details` VALUES (55,15,55,1.00,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(56,15,56,0.40,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(57,15,57,0.60,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(58,15,58,0.50,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(59,15,59,0.20,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(60,16,60,0.50,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(61,16,61,0.80,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(62,16,62,0.80,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(63,16,63,0.40,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(64,16,64,0.40,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(65,17,65,0.80,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(66,17,66,0.50,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(67,17,67,0.40,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(68,17,68,0.60,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(69,18,69,0.40,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(70,18,70,0.80,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(71,18,71,0.40,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(72,18,72,0.50,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(73,19,73,0.80,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(74,19,74,0.70,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(75,19,75,0.50,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(76,19,76,0.50,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(77,20,77,0.80,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(78,20,78,0.50,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(79,20,79,1.00,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(80,20,80,0.40,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(81,20,81,0.60,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(82,21,82,0.90,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(83,21,83,0.80,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(84,21,84,0.50,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(85,21,85,0.40,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(86,22,86,0.60,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(87,22,87,0.80,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(88,22,88,0.90,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(89,22,89,0.40,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(90,23,90,0.80,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(91,23,91,0.50,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(92,23,92,0.60,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(93,23,93,0.30,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(94,23,94,0.80,'2026-07-02 02:13:44','2026-07-02 02:13:44');
/*!40000 ALTER TABLE `rule_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rules`
--

DROP TABLE IF EXISTS `rules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rules` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `jenis` enum('penyakit','hama') COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rules_jenis_target_id_index` (`jenis`,`target_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rules`
--

LOCK TABLES `rules` WRITE;
/*!40000 ALTER TABLE `rules` DISABLE KEYS */;
INSERT INTO `rules` VALUES (15,'penyakit',8,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(16,'penyakit',9,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(17,'penyakit',10,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(18,'penyakit',11,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(19,'penyakit',12,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(20,'hama',8,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(21,'hama',9,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(22,'hama',10,'2026-07-02 02:13:44','2026-07-02 02:13:44'),(23,'hama',11,'2026-07-02 02:13:44','2026-07-02 02:13:44');
/*!40000 ALTER TABLE `rules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('BDUsgy0YJMBHrGpJyAL2pkhpHL6tCPskaRqhsdrj',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiRGhqeDgwY0VBbkVPb0I4MGUxWFBSTlp4ZVZzd1k2WnhRV3pMeThCWiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=',1783171613);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','petugas','pengguna') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pengguna',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrator','admin@sipatan.test','2026-07-02 02:13:42','$2y$12$ZwzA9.cxfMdswmpmvdR5du/cq3ieBHLtbo57z6a3zuHMh9q21bl8y','admin','zVGW1auouOWbsD9e4MPgon0hcnpDFpSQ0eo7za58uNq0V7TgkAaKLh1dTruD','2026-07-02 02:13:42','2026-07-02 02:13:42'),(2,'Petugas Lapangan','petugas@sipatan.test','2026-07-02 02:13:43','$2y$12$9Iww0.Wn8CIAVjVg9iKiLORDEFFEPrXFLoux3NP5JmjvkoyNuqC5K','petugas',NULL,'2026-07-02 02:13:43','2026-07-02 02:13:43');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-07-04 20:49:59
