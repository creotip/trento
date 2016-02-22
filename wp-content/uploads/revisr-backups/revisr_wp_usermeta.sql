
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
DROP TABLE IF EXISTS `wp_usermeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_usermeta` WRITE;
/*!40000 ALTER TABLE `wp_usermeta` DISABLE KEYS */;
INSERT INTO `wp_usermeta` VALUES (1,1,'nickname','adminus'),(2,1,'first_name',''),(3,1,'last_name',''),(4,1,'description',''),(5,1,'rich_editing','true'),(6,1,'comment_shortcuts','false'),(7,1,'admin_color','fresh'),(8,1,'use_ssl','0'),(9,1,'show_admin_bar_front','true'),(10,1,'wp_capabilities','a:1:{s:13:\"administrator\";b:1;}'),(11,1,'wp_user_level','10'),(12,1,'dismissed_wp_pointers',''),(13,1,'show_welcome_panel','1'),(15,1,'wp_dashboard_quick_press_last_post_id','303'),(16,1,'managenav-menuscolumnshidden','a:5:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";i:4;s:15:\"title-attribute\";}'),(17,1,'metaboxhidden_nav-menus','a:2:{i:0;s:12:\"add-post_tag\";i:1;s:15:\"add-post_format\";}'),(18,1,'nav_menu_recently_edited','2'),(20,1,'wp_user-settings','libraryContent=browse&editor=html&mfold=o&imgsize=large&uploader=1&urlbutton=file'),(21,1,'wp_user-settings-time','1453385735'),(32,1,'manageedit-shop_ordercolumnshidden','a:1:{i:0;s:15:\"billing_address\";}'),(33,1,'_woocommerce_persistent_cart','a:1:{s:4:\"cart\";a:5:{s:32:\"a4a042cf4fd6bfb47701cbc8a1653ada\";a:9:{s:10:\"product_id\";i:171;s:12:\"variation_id\";i:0;s:9:\"variation\";a:0:{}s:8:\"quantity\";i:1;s:10:\"line_total\";d:35;s:8:\"line_tax\";i:0;s:13:\"line_subtotal\";i:35;s:17:\"line_subtotal_tax\";i:0;s:13:\"line_tax_data\";a:2:{s:5:\"total\";a:0:{}s:8:\"subtotal\";a:0:{}}}s:32:\"fa7cdfad1a5aaf8370ebeda47a1ff1c3\";a:9:{s:10:\"product_id\";i:164;s:12:\"variation_id\";i:0;s:9:\"variation\";a:0:{}s:8:\"quantity\";i:1;s:10:\"line_total\";d:20;s:8:\"line_tax\";i:0;s:13:\"line_subtotal\";i:20;s:17:\"line_subtotal_tax\";i:0;s:13:\"line_tax_data\";a:2:{s:5:\"total\";a:0:{}s:8:\"subtotal\";a:0:{}}}s:32:\"82aa4b0af34c2313a562076992e50aa3\";a:9:{s:10:\"product_id\";i:162;s:12:\"variation_id\";i:0;s:9:\"variation\";a:0:{}s:8:\"quantity\";i:1;s:10:\"line_total\";d:20;s:8:\"line_tax\";i:0;s:13:\"line_subtotal\";i:20;s:17:\"line_subtotal_tax\";i:0;s:13:\"line_tax_data\";a:2:{s:5:\"total\";a:0:{}s:8:\"subtotal\";a:0:{}}}s:32:\"149e9677a5989fd342ae44213df68868\";a:9:{s:10:\"product_id\";i:170;s:12:\"variation_id\";i:0;s:9:\"variation\";a:0:{}s:8:\"quantity\";i:2;s:10:\"line_total\";d:70;s:8:\"line_tax\";i:0;s:13:\"line_subtotal\";i:70;s:17:\"line_subtotal_tax\";i:0;s:13:\"line_tax_data\";a:2:{s:5:\"total\";a:0:{}s:8:\"subtotal\";a:0:{}}}s:32:\"1ff8a7b5dc7a7d1f0ed65aaa29c04b1e\";a:9:{s:10:\"product_id\";i:172;s:12:\"variation_id\";i:0;s:9:\"variation\";a:0:{}s:8:\"quantity\";i:1;s:10:\"line_total\";d:35;s:8:\"line_tax\";i:0;s:13:\"line_subtotal\";i:35;s:17:\"line_subtotal_tax\";i:0;s:13:\"line_tax_data\";a:2:{s:5:\"total\";a:0:{}s:8:\"subtotal\";a:0:{}}}}}'),(40,1,'session_tokens','a:1:{s:64:\"209c69f6185e7ca565d190e33ad70f1152601b3d043367133ae6ebdb889d910e\";a:4:{s:10:\"expiration\";i:1456312167;s:2:\"ip\";s:14:\"178.62.159.115\";s:2:\"ua\";s:109:\"Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36\";s:5:\"login\";i:1456139367;}}');
/*!40000 ALTER TABLE `wp_usermeta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

