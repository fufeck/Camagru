<?php
	include 'database.php';
	try {
		$db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		// set the PDO error mode to exception
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "CREATE DATABASE IF NOT EXISTS camagru";
		// use exec() because no results are returned
		$ret = $db->exec($sql);
		if (!$db->exec($sql)) {
		   print_r($db->errorInfo());
		}
		$sql = "USE camagru;
				CREATE TABLE `users` (`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,`username` varchar(255) NOT NULL,`password` varchar(255) NOT NULL, `email` varchar(255) NOT NULL);
				CREATE TABLE `images` (`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,`name` varchar(255) NOT NULL,`user_id` int(11) NOT NULL,`created_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, `like_count` int(11) NOT NULL);
				CREATE TABLE `comments` (`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, `content` longtext NOT NULL,`user_id` int(11) NOT NULL,`image_id` int(11) NOT NULL);";
		if (!$db->exec($sql)) {
		   print_r($db->errorInfo());
		}
	} catch(PDOException $e) {
		echo $e->getMessage();
		die();
	}
?>