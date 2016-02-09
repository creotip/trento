
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
DROP TABLE IF EXISTS `wp_revisr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_revisr` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `message` text,
  `event` varchar(42) NOT NULL,
  `user` varchar(60) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_revisr` WRITE;
/*!40000 ALTER TABLE `wp_revisr` DISABLE KEYS */;
INSERT INTO `wp_revisr` VALUES (1,'2016-01-31 23:50:36','Successfully created a new repository.','init','adminus'),(2,'2016-01-31 23:56:05','Successfully backed up the database.','backup','adminus'),(3,'2016-01-31 23:59:51','Error pushing changes to the remote repository.','error','adminus'),(4,'2016-02-01 00:02:06','Committed <a href=\"http://trento.creotip.io/wp-admin/admin.php?page=revisr_view_commit&commit=0df975d&success=true\">#0df975d</a> to the local repository.','commit','adminus'),(5,'2016-02-01 00:02:06','Error pushing changes to the remote repository.','error','adminus'),(6,'2016-02-01 00:06:48','There was an error committing the changes to the local repository.','error','adminus'),(7,'2016-02-01 00:07:10','Error pushing changes to the remote repository.','error','adminus'),(8,'2016-02-01 00:09:16','Successfully pushed 2 commits to origin/master.','push','adminus'),(9,'2016-02-01 00:18:28','Successfully backed up the database.','backup','adminus'),(10,'2016-02-01 00:18:28','Committed <a href=\"http://trento.creotip.io/wp-admin/admin.php?page=revisr_view_commit&commit=b2e783d&success=true\">#b2e783d</a> to the local repository.','commit','adminus'),(11,'2016-02-01 00:18:30','Successfully pushed 1 commit to origin/master.','push','adminus'),(12,'2016-02-01 00:21:31','Successfully backed up the database.','backup','adminus'),(13,'2016-02-01 00:21:42','Successfully pushed 1 commit to origin/master.','push','adminus'),(14,'2016-02-02 11:48:23','Successfully backed up the database.','backup','Revisr Bot'),(15,'2016-02-02 11:48:23','The daily backup was successful.','backup','Revisr Bot'),(16,'2016-02-03 14:58:34','Successfully backed up the database.','backup','Revisr Bot'),(17,'2016-02-03 14:58:35','The daily backup was successful.','backup','Revisr Bot'),(18,'2016-02-04 12:09:48','Successfully backed up the database.','backup','Revisr Bot'),(19,'2016-02-04 12:09:48','The daily backup was successful.','backup','Revisr Bot'),(20,'2016-02-04 20:37:35','Successfully backed up the database.','backup','adminus'),(21,'2016-02-04 20:38:04','Successfully backed up the database.','backup','adminus'),(22,'2016-02-04 20:38:04','Committed <a href=\"http://trento.creotip.io/wp-admin/admin.php?page=revisr_view_commit&commit=6776c50&success=true\">#6776c50</a> to the local repository.','commit','adminus'),(23,'2016-02-04 20:38:10','Successfully pushed 9 commits to origin/master.','push','adminus'),(24,'2016-02-05 23:04:08','Successfully backed up the database.','backup','Revisr Bot'),(25,'2016-02-05 23:04:08','The daily backup was successful.','backup','Revisr Bot'),(26,'2016-02-06 19:51:55','Successfully backed up the database.','backup','Revisr Bot'),(27,'2016-02-06 19:51:55','The daily backup was successful.','backup','Revisr Bot'),(28,'2016-02-07 12:49:26','Successfully backed up the database.','backup','Revisr Bot'),(29,'2016-02-07 12:49:26','The daily backup was successful.','backup','Revisr Bot'),(30,'2016-02-08 12:35:33','Successfully backed up the database.','backup','Revisr Bot'),(31,'2016-02-08 12:35:33','The daily backup was successful.','backup','Revisr Bot'),(32,'2016-02-08 21:41:38','Successfully backed up the database.','backup','adminus'),(33,'2016-02-08 21:41:38','Committed <a href=\"http://trento.creotip.io/wp-admin/admin.php?page=revisr_view_commit&commit=a167405&success=true\">#a167405</a> to the local repository.','commit','adminus'),(34,'2016-02-08 21:44:26','Successfully pushed 5 commits to origin/master.','push','adminus'),(35,'2016-02-09 11:55:49','Successfully backed up the database.','backup','Revisr Bot'),(36,'2016-02-09 11:55:49','The daily backup was successful.','backup','Revisr Bot');
/*!40000 ALTER TABLE `wp_revisr` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

