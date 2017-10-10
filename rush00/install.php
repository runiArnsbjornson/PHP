#!/usr/bin/php
<?php

if (count($argv) != 3)
{
	echo "Invalid argument\n";
	echo "\033[31musage:\033[32m ./install.php login password\033[00m\n";
	exit ;
}
$user = $argv[1];
$pwd = $argv[2];
$db = 'shop';

$link = mysqli_connect('127.0.0.1', $user, $pwd);

if (!$link) 
	die('Erreur de connexion (' .mysqli_connect_errno() . ') ' .mysqli_connect_error() ."\n");

// creating db 'shop'
if (mysqli_query($link, "CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci")) 
	echo mysqli_error($link);

// using 'shop'
if (mysqli_query($link, "USE `shop`;")) 
	echo mysqli_error($link);

// discarding 'items' table if exists
if (mysqli_query($link, "DROP TABLE IF EXISTS `items`;")) 
	echo mysqli_error($link);

// creating 'items' table
if (mysqli_query($link, "CREATE TABLE IF NOT EXISTS `items` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`category` int(10) unsigned NOT NULL,
	`image_url` varchar(255) NOT NULL,
	`price` float NOT NULL,
	`creation_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`),
	KEY `name` (`name`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;"))
	echo mysqli_error($link);

// filling 'items' table
if (mysqli_query($link, "INSERT INTO `items` (`id`, `name`, `category`, `image_url`, `price`, `creation_date`) VALUES
(1, 'The devil fork' , 2, 'http://www.cursor.cc/cursor3d/41815.png', 15, NULL),
(2, 'Sexy clown costume', 4, 'https://img.joke.co.uk/images/products/jmw-v3/xlarge/75262.png', 30, NULL),
(3, 'Human meat', 3,  'http://www.aroundaboutcars.com/blog/wp-content/uploads/2015/12/dining-featured-image.jpg', 150, NULL),
(4, 'Devil plush', 3,  'https://www.ootb.de/files/product_images/61-6917.png', 10, NULL),
(5, 'Age cheater', 3,  'https://www.powersante.com/media/catalog/product/cache/1/image/670x/9df78eab33525d08d6e5fb8d27136e95/p/o/powersante-payot-elixir-jeunesse-30ml.png', 15, NULL),
(6, 'Engagement tools', 4,  'https://gkpro.fr/w2017/wp-content/uploads/2016/06/543.4.png', 15, NULL),
(7, 'Necronomicon', 2,  'http://cdn0.sbnation.com/assets/3476349/cthulhu_necronomicon.png', 30, NULL),
(8, 'Toothless', 4,  'https://ae01.alicdn.com/kf/HTB1cKymIFXXXXc2aXXXq6xXFXXXa/7-18cm-Q-Version-HOW-TO-TRAIN-YOUR-DRAGON-MINI-font-b-PLUSH-b-font-font.jpg', 60, NULL),
(9, 'Cthulhu pet', 3,  'https://vignette2.wikia.nocookie.net/the-adventures-of-the-gladiators-of-cybertron/images/3/30/Master_Cthulhu.png/revision/latest?cb=20140816123153', 400, NULL);"))
	echo mysqli_error($link);

// discarding 'category' table if exists
if (mysqli_query($link, "DROP TABLE IF EXISTS `category`;"));
echo mysqli_error($link);

// creating 'category' table
if (mysqli_query($link, "CREATE TABLE IF NOT EXISTS `category` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;"));
echo mysqli_error($link);

// filling 'category' table
if (mysqli_query($link, "INSERT INTO `category` (`id`, `name`) VALUES
	(2, 'Satan choices'),
	(3, 'Lucifer wishlist'),
	(4, 'Belzebut bests');"))
	echo mysqli_error($link);

// discarding 'users' table if exists 
if (mysqli_query($link, "DROP TABLE IF EXISTS `users`;"))
	echo mysqli_error($link);

// creating 'users' table
if (mysqli_query($link, "CREATE TABLE IF NOT EXISTS `users` (
		`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
		`login` varchar(255) NOT NULL,
		`passwd` varchar(255) NOT NULL,
		`root` int(10) unsigned NOT NULL,
		`cart` varchar(255) NOT NULL,
		PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;"));
	echo mysqli_error($link);

// creating pseudo-password for admins
$runi = hash("Whirlpool","runi");
$jordan = hash("Whirlpool","jordan");

// adding admins to 'users' table
if (mysqli_query($link, "INSERT INTO `users` (`id`, `login`, `passwd`, `root`, `cart`) VALUES
		(1, 'runi', '$runi', 1, ''),
		(2, 'jordan', '$jordan', 1, '');"))
	echo mysqli_error($link);

// discarding 'orders' table if exists
if (mysqli_query($link, "DROP TABLE IF EXISTS `orders`;"));
	echo mysqli_error($link);

// creating 'orders' table
if (mysqli_query($link, "CREATE TABLE IF NOT EXISTS `orders` (
			`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
			`user` varchar(255) NOT NULL,
			`panier` varchar(255) NOT NULL,
			`total` int(10) unsigned NOT NULL,
			`status` varchar(255) NOT NULL,
			PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;"));
	echo mysqli_error($link);
?>
