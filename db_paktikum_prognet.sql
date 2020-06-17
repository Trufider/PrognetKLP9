/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.36-MariaDB : Database - db_praktikum_prognet
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_paktikum_prognet` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_paktikum_prognet`;

/*Table structure for table `admin_notifications` */

DROP TABLE IF EXISTS `admin_notifications`;

CREATE TABLE `admin_notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `seller_notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`),
  KEY `notifiable_id` (`notifiable_id`),
  CONSTRAINT `admin_notifications_ibfk_1` FOREIGN KEY (`notifiable_id`) REFERENCES `admins` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admin_notifications` */

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sellers_email_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`id`,`username`,`password`,`name`,`profile_image`,`phone`,`remember_token`,`created_at`,`updated_at`) values 
(11,'testadmin','$2y$10$5mZC/2hs8.3hCsM6fqyzNunZphZbVyWe5vrangBsCgob/f4spRf.m','testadmin','P_20200319_082611_1.jpg','08522334455',NULL,'2020-03-25 11:07:25','2020-03-25 11:07:25');

/*Table structure for table `carts` */

DROP TABLE IF EXISTS `carts`;

CREATE TABLE `carts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('checkedout','notyet','cancelled') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `carts_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `carts` */

insert  into `carts`(`id`,`user_id`,`product_id`,`qty`,`created_at`,`updated_at`,`status`) values 
(2,21,41,2,NULL,NULL,NULL),
(5,21,24,1,'2020-06-14 06:42:55','2020-06-14 07:06:05','checkedout'),
(6,21,41,1,'2020-06-14 06:48:48','2020-06-14 07:06:05','checkedout'),
(7,21,25,1,'2020-06-14 07:04:12','2020-06-14 07:06:06','checkedout'),
(8,21,27,1,'2020-06-14 07:04:31','2020-06-14 07:06:06','checkedout'),
(9,21,24,1,'2020-06-14 07:16:07','2020-06-14 16:32:49','checkedout'),
(10,21,25,6,'2020-06-14 07:17:32','2020-06-14 16:32:49','checkedout'),
(11,21,25,3,'2020-06-14 16:33:27','2020-06-14 16:33:44','checkedout'),
(12,21,25,3,'2020-06-14 16:35:16','2020-06-14 16:42:58','checkedout'),
(13,21,25,1,'2020-06-14 16:46:03','2020-06-14 16:46:31','checkedout'),
(14,21,25,1,'2020-06-14 17:07:17','2020-06-14 17:07:37','checkedout'),
(15,21,27,3,'2020-06-14 17:07:47','2020-06-14 17:08:10','checkedout'),
(16,21,27,4,'2020-06-14 17:08:51','2020-06-14 17:09:11','checkedout'),
(20,21,27,1,'2020-06-15 11:15:09','2020-06-15 11:33:09','checkedout'),
(21,21,24,1,'2020-06-15 11:34:27','2020-06-15 11:37:02','checkedout'),
(22,21,27,1,'2020-06-15 13:21:20','2020-06-15 13:22:55','checkedout'),
(23,21,24,1,'2020-06-15 13:21:52','2020-06-15 13:22:55','checkedout'),
(24,21,24,1,'2020-06-15 13:46:09','2020-06-15 13:46:27','checkedout'),
(25,21,27,2,'2020-06-15 13:47:14','2020-06-15 13:48:15','checkedout'),
(26,21,25,4,'2020-06-15 13:47:26','2020-06-15 13:48:15','checkedout'),
(27,24,24,4,'2020-06-15 16:40:52','2020-06-15 16:41:52','checkedout'),
(28,25,25,8,'2020-06-15 17:06:47','2020-06-15 17:07:46','checkedout');

/*Table structure for table `couriers` */

DROP TABLE IF EXISTS `couriers`;

CREATE TABLE `couriers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `courier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `couriers` */

insert  into `couriers`(`id`,`courier`,`created_at`,`updated_at`,`deleted_at`) values 
(3,'JNE','2020-05-16 04:03:19','2020-05-20 09:43:29',NULL),
(12,'Pos Indonesia','2020-05-25 09:36:52','2020-05-26 12:34:00',NULL),
(13,'J&T','2020-05-26 12:35:06','2020-05-26 12:35:06',NULL),
(14,'SiCepat','2020-05-26 12:35:17','2020-05-26 12:35:17',NULL),
(15,'Ninja Express','2020-05-26 12:35:31','2020-05-26 12:35:31',NULL),
(17,'Indah Logistik','2020-05-26 12:36:00','2020-05-26 12:36:00',NULL),
(18,'First Logistics','2020-05-26 12:36:18','2020-05-26 12:36:18',NULL),
(19,'TiKi','2020-05-26 13:37:22','2020-06-15 17:04:24',NULL),
(22,'TiKi','2020-06-15 17:04:29','2020-06-15 17:04:32','2020-06-15 17:04:32');

/*Table structure for table `discounts` */

DROP TABLE IF EXISTS `discounts`;

CREATE TABLE `discounts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned DEFAULT NULL,
  `percentage` int(3) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_product` (`product_id`),
  CONSTRAINT `discounts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Data for the table `discounts` */

insert  into `discounts`(`id`,`product_id`,`percentage`,`start`,`end`,`created_at`,`updated_at`) values 
(24,24,5,'2020-05-25','2020-06-06','2020-05-24 09:14:34','2020-05-24 09:14:34'),
(26,25,10,'2020-05-26','2020-06-05','2020-05-24 10:14:59','2020-05-26 12:39:29'),
(28,27,20,'2020-05-18','2020-05-29','2020-05-24 10:34:11','2020-05-24 10:34:11');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `product_categories` */

DROP TABLE IF EXISTS `product_categories`;

CREATE TABLE `product_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_categories` */

insert  into `product_categories`(`id`,`category_name`,`created_at`,`updated_at`) values 
(7,'Obat','2020-05-16 07:44:13','2020-05-16 07:44:13'),
(10,'Vitamin','2020-05-20 13:27:47','2020-05-20 13:58:05'),
(11,'Perlengkapan Medis','2020-05-24 10:30:45','2020-05-24 10:30:45'),
(12,'Obat Luar','2020-05-24 10:31:44','2020-05-24 10:31:44'),
(13,'APD','2020-05-26 12:21:10','2020-05-26 13:38:10');

/*Table structure for table `product_category_details` */

DROP TABLE IF EXISTS `product_category_details`;

CREATE TABLE `product_category_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `product__category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `category_id` (`product__category_id`),
  CONSTRAINT `product_category_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `product_category_details_ibfk_2` FOREIGN KEY (`product__category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

/*Data for the table `product_category_details` */

insert  into `product_category_details`(`id`,`product_id`,`product__category_id`,`created_at`,`updated_at`) values 
(22,27,7,'2020-06-16 00:59:57','2020-06-15 16:59:57'),
(24,24,13,'2020-06-16 01:00:09','2020-06-15 17:00:09'),
(48,25,13,'2020-06-15 17:01:09','2020-06-15 17:01:09');

/*Table structure for table `product_images` */

DROP TABLE IF EXISTS `product_images`;

CREATE TABLE `product_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_images` */

insert  into `product_images`(`id`,`product_id`,`image_name`,`created_at`,`updated_at`) values 
(105,24,'20200614065446.jpg','2020-06-14 06:54:46','2020-06-14 06:54:46'),
(107,25,'20200614070136.jpg','2020-06-14 07:01:36','2020-06-14 07:01:36'),
(109,27,'20200614070203.jpg','2020-06-14 07:02:03','2020-06-14 07:02:03');

/*Table structure for table `product_reviews` */

DROP TABLE IF EXISTS `product_reviews`;

CREATE TABLE `product_reviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `rate` int(1) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `rate_id` (`rate`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_reviews_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `product_reviews_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_reviews` */

insert  into `product_reviews`(`id`,`product_id`,`user_id`,`rate`,`content`,`created_at`,`updated_at`) values 
(3,25,25,5,'barangnya sangat bagus','2020-06-15 17:08:59','2020-06-15 17:08:59');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_rate` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stock` int(10) DEFAULT NULL,
  `weight` int(3) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`product_name`,`price`,`description`,`product_rate`,`created_at`,`updated_at`,`stock`,`weight`,`deleted_at`) values 
(24,'Purell: Hand San',27000,'Purell Advanced Hand Sanitizer Refreshing Gel with Aloe [236 mL] merupakan hand sanitizer yang dapat membunuh 99.99% kuman. Diformulasi dengan lidah buaya yang ramah di kulit. ',NULL,'2020-05-24 09:14:34','2020-06-13 15:27:21',50,1,NULL),
(25,'Masker',68000,'Onemed Masker Karet - Hijau [50 pcs], masker 3 ply (terdiri dari 3 lapisan, lapisan luar, dalam dan bagian tengah yang berfungsi sebagai filter, bactery filter efficiency 99.9%) dengan tali karet lentur yang dipasang di telinga. Menutup hidup dan mulut dengan sempurna, dan tahan percikan air. Warna hijau, aman karena tidak mengandung banyak cat pewarna seperti masker lain. Cara pakai mudah dengan menggantungkan tali karet di kedua telinga, mengencangkan kawat sesuai bentuk hidung, dan menarik bagian bawah masker hingga menutup sampai dagu. Satuan : Box/ 50 lembar.',NULL,'2020-05-24 10:14:58','2020-06-13 15:27:36',100,10,NULL),
(27,'Vitacimin C',18500,'Vitacimin Tablet Hisap [500 mg/ 10 pcs/ 2 Tablet] adalah tablet hisap yang mengandung vitamin C sebanyak 500 mg. Vitacimin dapat membantu kebutuhan tubuh Anda akan vitamin C. Ideal untuk pencegahan dan mengatasi defisiensi vitamin C. Dosis : 1-2 tablet hisap sehari.',NULL,'2020-05-24 10:34:10','2020-06-13 15:28:15',20,10,NULL);

/*Table structure for table `response` */

DROP TABLE IF EXISTS `response`;

CREATE TABLE `response` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `review_id` int(10) unsigned NOT NULL,
  `admin_id` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `review_id` (`review_id`),
  KEY `admin_id` (`admin_id`),
  CONSTRAINT `response_ibfk_1` FOREIGN KEY (`review_id`) REFERENCES `product_reviews` (`id`),
  CONSTRAINT `response_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `response` */

/*Table structure for table `transaction_details` */

DROP TABLE IF EXISTS `transaction_details`;

CREATE TABLE `transaction_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transaction_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `discount` int(3) DEFAULT NULL,
  `selling_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_transaction` (`transaction_id`),
  KEY `id_product` (`product_id`),
  CONSTRAINT `transaction_details_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`),
  CONSTRAINT `transaction_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transaction_details` */

insert  into `transaction_details`(`id`,`transaction_id`,`product_id`,`qty`,`discount`,`selling_price`,`created_at`,`updated_at`) values 
(6,6,24,1,0,27000,'2020-06-15 11:37:02','2020-06-15 11:37:02'),
(7,7,27,1,0,18500,'2020-06-15 13:22:55','2020-06-15 13:22:55'),
(8,7,24,1,0,27000,'2020-06-15 13:22:55','2020-06-15 13:22:55'),
(9,8,24,1,0,27000,'2020-06-15 13:46:27','2020-06-15 13:46:27'),
(10,9,27,2,0,37000,'2020-06-15 13:48:15','2020-06-15 13:48:15'),
(11,9,25,4,0,272000,'2020-06-15 13:48:15','2020-06-15 13:48:15'),
(12,10,24,4,0,108000,'2020-06-15 16:41:52','2020-06-15 16:41:52'),
(13,11,25,8,0,544000,'2020-06-15 17:07:45','2020-06-15 17:07:45');

/*Table structure for table `transactions` */

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `timeout` datetime NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regency` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double(12,2) NOT NULL,
  `shipping_cost` double(12,2) NOT NULL,
  `sub_total` double(12,2) NOT NULL,
  `user_id` int(20) unsigned NOT NULL,
  `courier_id` int(10) unsigned NOT NULL,
  `proof_of_payment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('unverified','verified','delivered','success','expired','canceled') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courier_id` (`courier_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`courier_id`) REFERENCES `couriers` (`id`),
  CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transactions` */

insert  into `transactions`(`id`,`timeout`,`address`,`regency`,`province`,`total`,`shipping_cost`,`sub_total`,`user_id`,`courier_id`,`proof_of_payment`,`created_at`,`updated_at`,`status`,`deleted_at`) values 
(6,'2020-06-16 19:37:02','Jalan Raden Ajeng','Serang','Banten',50000.00,23000.00,27000.00,21,19,'transaction\\6.jpg','2020-06-15 11:37:02','2020-06-15 13:40:25','success',NULL),
(7,'2020-06-16 21:22:55','Jalan Raden Ajeng','Sleman','DI Yogyakarta',69500.00,24000.00,45500.00,21,19,'transaction\\7.jpg','2020-06-15 13:22:55','2020-06-15 13:46:56','success',NULL),
(8,'2020-06-16 21:46:27','Jalan Udayana','Merangin','Jambi',74000.00,47000.00,27000.00,21,3,NULL,'2020-06-15 13:46:27','2020-06-15 13:46:27','unverified',NULL),
(9,'2020-06-16 21:48:15','Jalan Gunung Batur','Padang','Sumatera Barat',354000.00,45000.00,309000.00,21,3,'transaction\\9.jpg','2020-06-15 13:48:15','2020-06-15 13:48:24','success',NULL),
(10,'2020-06-17 00:41:52','bukit jimbaran','Klungkung','Bali',119000.00,11000.00,108000.00,24,3,NULL,'2020-06-15 16:41:52','2020-06-15 16:41:52','unverified',NULL),
(11,'2020-06-17 01:07:45','bukit jimbaran','Klungkung','Bali',555000.00,11000.00,544000.00,25,3,'transaction\\11.jpg','2020-06-15 17:07:45','2020-06-15 17:08:36','success',NULL);

/*Table structure for table `user_notifications` */

DROP TABLE IF EXISTS `user_notifications`;

CREATE TABLE `user_notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(11) unsigned DEFAULT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`),
  KEY `notifiable_id` (`notifiable_id`),
  CONSTRAINT `user_notifications_ibfk_1` FOREIGN KEY (`notifiable_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_notifications` */

insert  into `user_notifications`(`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) values 
('0695fa60-028b-4070-ac35-5c99079015c1','App\\Notifications\\UserNotification','App\\User',25,'halo testuser, Bukti transaksi dengan ID11 telah berhasil dimasukkan kedalam sistem',NULL,'2020-06-15 17:08:38','2020-06-15 17:08:38'),
('0a857752-0dfa-4abe-818f-5960b8467f7d','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, anda melihat produkPurell: Hand San silahkan dibeli','2020-06-15 13:45:58','2020-06-15 13:21:50','2020-06-15 13:45:58'),
('0f564a92-b670-4ff1-832a-e68c0d893ec8','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, anda melihat produkSalep silahkan dibeli','2020-06-15 13:45:58','2020-06-14 17:07:44','2020-06-15 13:45:58'),
('103a8e67-724c-45a5-8daa-9261d00d394f','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, anda melihat produkPanadol silahkan dibeli','2020-06-15 13:45:58','2020-06-14 16:34:01','2020-06-15 13:45:58'),
('11e25f8c-7c6f-4bdd-9e1e-2fd51fe35b60','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, anda melihat produkPerban Luka silahkan dibeli','2020-06-15 13:45:58','2020-06-15 10:57:43','2020-06-15 13:45:58'),
('19b20075-6d0d-47df-be09-41cafa8c0745','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, chechkout Transaksi anda dengan ID 2 telah berhasil dilakukan. Silahkan mengupload bukti pembayaran','2020-06-15 13:45:58','2020-06-14 17:07:37','2020-06-15 13:45:58'),
('22e8fca4-be35-4ee2-90c7-d50baeb9a065','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, anda melihat produkPanadol silahkan dibeli','2020-06-15 13:45:58','2020-06-14 16:33:25','2020-06-15 13:45:58'),
('25552582-f439-4cb9-9cf6-178f727c746a','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, chechkout Transaksi anda dengan ID 4 telah berhasil dilakukan. Silahkan mengupload bukti pembayaran','2020-06-15 13:45:58','2020-06-14 17:09:11','2020-06-15 13:45:58'),
('29788ee5-13f9-46e1-9c62-7da2b1507bdb','App\\Notifications\\UserNotification','App\\User',25,'halo testuser, anda melihat produkMasker silahkan dibeli',NULL,'2020-06-15 17:06:43','2020-06-15 17:06:43'),
('2f9acd91-e60f-423e-acd2-9fdfbe17cdbc','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, chechkout Transaksi anda dengan ID 1 telah berhasil dilakukan. Silahkan mengupload bukti pembayaran','2020-06-15 13:45:58','2020-06-14 16:46:31','2020-06-15 13:45:58'),
('32a05ce5-5c7f-4028-99d5-5d36deb4dab0','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, anda melihat produkPurell: Hand San silahkan dibeli','2020-06-15 13:45:58','2020-06-15 13:20:43','2020-06-15 13:45:58'),
('408201d0-14e2-4374-b255-0fabff440bf8','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, anda melihat produkPanadol silahkan dibeli','2020-06-15 13:45:58','2020-06-14 16:32:27','2020-06-15 13:45:58'),
('4d28ff1d-0df5-4f26-9ecc-1fa2a5e21493','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, chechkout Transaksi anda dengan ID 8 telah berhasil dilakukan. Silahkan mengupload bukti pembayaran',NULL,'2020-06-15 13:46:27','2020-06-15 13:46:27'),
('530a2316-3bd7-43c8-9a49-fc46835bfef4','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, anda melihat produkPurell: Hand San silahkan dibeli','2020-06-15 13:45:58','2020-06-15 11:34:25','2020-06-15 13:45:58'),
('562c6727-fee0-4360-b2a3-791e2cb58c51','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, chechkout Transaksi anda dengan ID 5 telah berhasil dilakukan. Silahkan mengupload bukti pembayaran','2020-06-15 13:45:58','2020-06-15 11:33:09','2020-06-15 13:45:58'),
('5c7dc94d-a28e-4c51-9889-1a6a4271daf2','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, Bukti transaksi dengan ID1telah berhasil dimasukkan kedalam sistem','2020-06-15 13:45:58','2020-06-14 17:11:36','2020-06-15 13:45:58'),
('6ee1248a-58ee-48b8-8b4e-2e5d0cb17a82','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, anda melihat produkVitacimin C silahkan dibeli','2020-06-15 13:45:58','2020-06-15 11:32:45','2020-06-15 13:45:58'),
('7075f564-092e-45f7-b398-f064517e11db','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, anda melihat produkSalep silahkan dibeli','2020-06-15 13:45:58','2020-06-14 17:08:45','2020-06-15 13:45:58'),
('772d41b7-48dd-42f8-a918-535e36ed0fb5','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, anda melihat produkPanadol silahkan dibeli','2020-06-15 13:45:58','2020-06-14 16:21:35','2020-06-15 13:45:58'),
('7c792971-ea9c-4498-9337-29c33870bcc8','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, anda melihat produkSalep silahkan dibeli','2020-06-15 13:45:58','2020-06-15 11:15:07','2020-06-15 13:45:58'),
('7d0a15d6-5fb7-4886-a520-5288b0e85847','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, Bukti transaksi dengan ID9 telah berhasil dimasukkan kedalam sistem',NULL,'2020-06-15 13:48:24','2020-06-15 13:48:24'),
('8305fba9-a0eb-4ad9-a920-3fa8630fbb3f','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, anda melihat produkPanadol silahkan dibeli','2020-06-15 13:45:58','2020-06-14 17:07:15','2020-06-15 13:45:58'),
('8867422b-07dc-4867-a37e-a0c2dc43c2c5','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, anda melihat produkPanadol silahkan dibeli','2020-06-15 13:45:58','2020-06-14 16:46:01','2020-06-15 13:45:58'),
('88c30ce9-25d0-4271-b34f-2427d13ca50c','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, chechkout Transaksi anda dengan ID 9 telah berhasil dilakukan. Silahkan mengupload bukti pembayaran',NULL,'2020-06-15 13:48:15','2020-06-15 13:48:15'),
('8bc7a6fe-3c3e-4884-9c8c-fca784ebed80','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, chechkout Transaksi anda dengan ID 3 telah berhasil dilakukan. Silahkan mengupload bukti pembayaran','2020-06-15 13:45:58','2020-06-14 17:08:10','2020-06-15 13:45:58'),
('9b214b06-d52b-4766-9a02-a29a5fb23f9f','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, anda melihat produkPanadol silahkan dibeli','2020-06-15 13:45:58','2020-06-15 10:57:52','2020-06-15 13:45:58'),
('9cd34f5c-1b8b-4af2-8c11-eab19c1b9c0c','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, Bukti transaksi dengan ID7 telah berhasil dimasukkan kedalam sistem',NULL,'2020-06-15 13:46:56','2020-06-15 13:46:56'),
('9f7d7af4-30c1-46f8-8d55-7e6afdeaa5cf','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, chechkout Transaksi anda dengan ID 6 telah berhasil dilakukan. Silahkan mengupload bukti pembayaran','2020-06-15 13:45:58','2020-06-15 11:37:02','2020-06-15 13:45:58'),
('a2c9fa6d-7052-4610-a5f5-feb7fa557912','App\\Notifications\\UserNotification','App\\User',24,'halo Arya, chechkout Transaksi anda dengan ID 10 telah berhasil dilakukan. Silahkan mengupload bukti pembayaran','2020-06-15 16:44:34','2020-06-15 16:41:52','2020-06-15 16:44:34'),
('a738f992-f489-4afd-a18b-9f9eb3bf8584','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, Bukti transaksi dengan ID6 telah berhasil dimasukkan kedalam sistem','2020-06-15 13:45:58','2020-06-15 13:40:25','2020-06-15 13:45:58'),
('a7f103f9-0002-4cc1-9c26-91c0c9a9c7c3','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, anda melihat produkVitacimin C silahkan dibeli',NULL,'2020-06-15 13:47:11','2020-06-15 13:47:11'),
('acc0d515-22de-4251-b4cd-90ee9dd7c394','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, chechkout Transaksi anda dengan ID 3 telah berhasil dilakukan. Silahkan mengupload bukti pembayaran','2020-06-15 13:45:58','2020-06-14 16:33:44','2020-06-15 13:45:58'),
('b27f531b-3101-49e2-bb1b-6f1794875da8','App\\Notifications\\UserNotification','App\\User',24,'halo pelanggan, anda melihat produkVitacimin C silahkan dibeli',NULL,'2020-06-15 17:13:46','2020-06-15 17:13:46'),
('b3d57a43-8373-43d0-a141-bf57e94713ae','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, chechkout Transaksi anda dengan ID 4 telah berhasil dilakukan. Silahkan mengupload bukti pembayaran','2020-06-15 13:45:58','2020-06-14 16:42:59','2020-06-15 13:45:58'),
('b9c52899-5f34-479a-abdc-a880f61d3a93','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, chechkout Transaksi anda dengan ID 2 telah berhasil dilakukan. Silahkan mengupload bukti pembayaran','2020-06-15 13:45:58','2020-06-14 16:32:49','2020-06-15 13:45:58'),
('baff4f3f-8558-411a-852d-798fa1c0800b','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, anda melihat produkSalep silahkan dibeli','2020-06-15 13:45:58','2020-06-14 17:08:45','2020-06-15 13:45:58'),
('bec3ea48-ea9b-40e2-97d2-c24d5d25adab','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, chechkout Transaksi anda dengan ID 7 telah berhasil dilakukan. Silahkan mengupload bukti pembayaran','2020-06-15 13:45:58','2020-06-15 13:22:55','2020-06-15 13:45:58'),
('c570d8d5-026f-4efc-a2de-09f3daa8d05e','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, anda melihat produkPerban Luka silahkan dibeli','2020-06-15 13:45:58','2020-06-14 16:21:23','2020-06-15 13:45:58'),
('c57506de-f870-413d-85c9-f4cb71def7cb','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, anda melihat produkPerban Luka silahkan dibeli','2020-06-15 13:45:58','2020-06-14 16:25:53','2020-06-15 13:45:58'),
('c7def1b3-0ebc-448d-b642-8d3ad760510a','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, anda melihat produkPanadol silahkan dibeli','2020-06-15 13:45:58','2020-06-14 16:35:13','2020-06-15 13:45:58'),
('c9442ec4-b387-4ea2-a5a6-fc79d2c45f5c','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, anda melihat produkPanadol silahkan dibeli','2020-06-15 13:45:58','2020-06-15 10:57:24','2020-06-15 13:45:58'),
('d009f9db-5120-4405-8426-14a94f7af49b','App\\Notifications\\UserNotification','App\\User',24,'halo Arya, anda melihat produkPurell: Hand San silahkan dibeli','2020-06-15 16:44:34','2020-06-15 16:40:48','2020-06-15 16:44:34'),
('d9b24c7d-e2e7-4bab-b87e-7ec30a923b34','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, anda melihat produkVitacimin C silahkan dibeli','2020-06-15 13:45:58','2020-06-15 13:20:46','2020-06-15 13:45:58'),
('ddf99431-99ae-4108-9900-47906aee6f18','App\\Notifications\\UserNotification','App\\User',25,'halo testuser, chechkout Transaksi anda dengan ID 11 telah berhasil dilakukan. Silahkan mengupload bukti pembayaran',NULL,'2020-06-15 17:07:46','2020-06-15 17:07:46'),
('e1174e8c-78ae-4c87-9ff5-3a6bb3610d45','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, anda melihat produkSalep silahkan dibeli','2020-06-15 13:45:58','2020-06-14 17:07:45','2020-06-15 13:45:58'),
('f4f52981-dd52-442d-ba9e-a1245661ce08','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, anda melihat produkPurell: Hand San silahkan dibeli',NULL,'2020-06-15 13:46:06','2020-06-15 13:46:06'),
('fdb2b9d3-5a70-43dc-bdb3-58fabdb9c636','App\\Notifications\\UserNotification','App\\User',21,'halo testuser, anda melihat produkMasker silahkan dibeli',NULL,'2020-06-15 13:47:23','2020-06-15 13:47:23');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`profile_image`,`status`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(21,'testuser','testuser@gmail.com','kosong','Active','2020-06-15 00:06:27','$2y$10$bzyT2BLwO/L49gm5EVtDEO0YO/Wz.TePIBTtIajpXVWvPPXcMNqpy',NULL,'2020-05-17 10:53:49','2020-05-17 10:53:49'),
(22,'cobacoba','coba@gmail.co.id','kosong','Active','2020-05-24 22:05:13','$2y$10$bIufjMZuGsQeFI8y2tCoee1OV5P/om7v2hDVjvNCvf/bk52XtkpZu',NULL,'2020-05-24 14:05:13','2020-05-24 14:05:13'),
(24,'pelanggan','user100@gmail.com','kosong','Active','2020-06-16 01:12:01','$2y$10$JKatiAzR3Xzk.WE3stYho./9pAA0iidS2LnYEBS5gTjyuzgV4FZAW',NULL,'2020-06-15 16:40:13','2020-06-15 16:40:13'),
(25,'testuser','testuser1@gmail.com','kosong','Active','2020-06-16 01:02:33','$2y$10$cL13MF5OG4XI5JRQlek4Me2W.XCPy8NtEKdbtNXbGtxvBVBANxAHi',NULL,'2020-06-15 17:02:33','2020-06-15 17:02:33');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
