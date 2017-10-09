CREATE TABLE `db_jdebladi`.`ft_table` (
 `id` int NOT NULL AUTO_INCREMENT,
 `login` varchar(8) NOT NULL DEFAULT 'toto',
 `groupe` enum('staff', 'student', 'other') NOT NULL,
 `date_de_creation` DATE NOT NULL,
PRIMARY KEY (`id`));
