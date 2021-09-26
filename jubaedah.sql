/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 5.7.33 : Database - jubaedah
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`jubaedah` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `jubaedah`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `tb_fakultas` */

DROP TABLE IF EXISTS `tb_fakultas`;

CREATE TABLE `tb_fakultas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tb_fakultas` */

insert  into `tb_fakultas`(`id`,`nama`,`created_at`,`updated_at`) values 
(1,'FAKULTAS PENDIDIKAN','2021-09-12 10:18:34','2021-09-12 10:18:34'),
(2,'FAKULTAS TEKNOLOGI INFORMASI','2021-09-12 10:18:48','2021-09-12 10:19:27'),
(3,'FAKULTAS KESEHATAN','2021-09-12 10:19:39','2021-09-12 10:19:39'),
(4,'FAKULTAS ILMU AGAMA','2021-09-12 10:19:56','2021-09-12 10:19:56'),
(5,'FAKULTAS ILMU ADMINISTRASI NEGARA','2021-09-12 10:20:10','2021-09-12 10:20:10'),
(6,'FAKULTAS TEKNIK','2021-09-13 02:30:57','2021-09-13 02:30:57');

/*Table structure for table `tb_guru` */

DROP TABLE IF EXISTS `tb_guru`;

CREATE TABLE `tb_guru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_guru` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tb_guru` */

insert  into `tb_guru`(`id`,`nama_guru`,`nip`,`created_at`,`updated_at`) values 
(1,'DEDE SURYATNAs','130814720918','2021-08-16 04:20:06','2021-09-26 07:57:10'),
(2,'ASEP SAEPPANI','1230231','2021-08-16 04:33:05','2021-08-16 04:33:05'),
(3,'LISTYA TERIPOSA, S.Kom','1234567890','2021-08-16 12:12:01','2021-08-16 12:12:01'),
(4,'NENENG ARISKA','130814720918','2021-08-18 07:18:45','2021-08-19 08:45:08');

/*Table structure for table `tb_kelas` */

DROP TABLE IF EXISTS `tb_kelas`;

CREATE TABLE `tb_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(20) NOT NULL,
  `guru_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kelas` */

insert  into `tb_kelas`(`id`,`nama_kelas`,`guru_id`,`created_at`,`updated_at`) values 
(1,'X A TKJ',3,NULL,'2021-09-26 07:59:28'),
(2,'X B TKJ',1,NULL,NULL),
(3,'XI RPL',4,NULL,'2021-08-18 07:18:57'),
(4,'XI TKJ',3,'2021-08-16 13:25:18','2021-08-16 13:25:18');

/*Table structure for table `tb_mapel` */

DROP TABLE IF EXISTS `tb_mapel`;

CREATE TABLE `tb_mapel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_mapel` varchar(100) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `guru_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tb_mapel` */

insert  into `tb_mapel`(`id`,`kode_mapel`,`nama_mapel`,`guru_id`,`created_at`,`updated_at`) values 
(1,'PBO-001','PEMROGRAMAN BERORIENTASI OBJEK',1,'2021-08-16 04:21:05','2021-08-18 07:18:26'),
(2,'PBW-005','PEMROGRAMAN WEB',4,'2021-08-16 04:30:13','2021-08-18 07:19:13'),
(3,'TKJ-001','JARKOM TUI',2,NULL,'2021-08-16 07:53:30'),
(4,'BSD-001','BASIS DATA',1,'2021-08-16 12:10:51','2021-08-16 12:10:51'),
(5,'KKPI-003','KETERAMPILAN KOMPUTER DAN PENGELOLAAN INFORMASI',3,'2021-08-16 12:12:36','2021-08-16 12:12:36'),
(6,'PBO-002','PEMROGRAMAN BERORIENTASI OBJEK LANJUT',3,'2021-09-26 07:57:34','2021-09-26 07:57:34');

/*Table structure for table `tb_prodi` */

DROP TABLE IF EXISTS `tb_prodi`;

CREATE TABLE `tb_prodi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_prodi` varchar(100) DEFAULT NULL,
  `fakultas_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_prodi` */

insert  into `tb_prodi`(`id`,`nama_prodi`,`fakultas_id`) values 
(1,'TEKNIK INFORMATIKA',2),
(2,'MANAJEMEN INFORMATIKA',2),
(3,'KESEHATAN MASYARAKAT',3);

/*Table structure for table `tb_rombel` */

DROP TABLE IF EXISTS `tb_rombel`;

CREATE TABLE `tb_rombel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siswa_id` int(11) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_rombel` */

insert  into `tb_rombel`(`id`,`siswa_id`,`kelas_id`,`created_at`,`updated_at`) values 
(1,1,1,NULL,'2021-08-17 04:23:33'),
(2,2,2,NULL,NULL),
(3,3,4,'2021-08-16 16:43:00','2021-08-16 16:43:00');

/*Table structure for table `tb_siswa` */

DROP TABLE IF EXISTS `tb_siswa`;

CREATE TABLE `tb_siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_siswa` varchar(50) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nama_ortu` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_siswa` */

insert  into `tb_siswa`(`id`,`nama_siswa`,`ttl`,`asal_sekolah`,`nama_ortu`,`created_at`,`updated_at`) values 
(1,'TATANG APANDI','SUMEDANG 11 JULI 1988','SMK NEGERI 1 bandung','TATA','2021-08-18 03:52:49','2021-08-18 03:54:01'),
(2,'RIMA MELATI','BANDUNG 23 OKTOBER 1998','SMKN 2 BANDUNG','ANIH','2021-08-18 03:52:49','2021-08-19 08:45:51'),
(3,'DEDEN JULIANDI','SUMEDANG 11 JULI 1988','SMK NEGERI 1 bandung','ACUM','2021-08-18 03:52:49','2021-08-18 03:52:49');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'admin','obe_ivan@yahoo.com',NULL,'$2y$10$kwBT2SBaSYP9DxZCnL/Mn.zLIWkEiWjgtzoSThmXDjpOdgq0zj9za',NULL,'2021-08-14 13:00:14','2021-08-14 13:00:14'),
(2,'muhamad irfan setiawan','muhamadirfansetiawan231090@gmail.com',NULL,'$2y$10$9yEhOjUKvBaA3IVKvvHtBO6wsm./WmMAUwO/iBneyjEyzMjhzr7lC','PEfkeHG8VTe5owRYI4rrjxSdLJQKJlqWZwOfHQG5zV1t0RCUjMVrN4EiFp5V','2021-08-17 03:54:53','2021-08-17 03:54:53'),
(3,'PRODI-TI','proditi@gmail.com',NULL,'$2y$10$HfyFZBWYuSxrZkNkCx.FJe5VEYTh7DomyU8IqQaq4bQohKK6oT9iG',NULL,'2021-09-12 06:22:03','2021-09-12 06:22:03');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
