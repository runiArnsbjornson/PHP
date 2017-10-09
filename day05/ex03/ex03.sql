INSERT INTO `db_jdebladi`.`ft_table` (`login`, `date_de_creation`, `groupe`) 
SELECT nom, date_naissance, 3
FROM `db_jdebladi`.`fiche_personne`
WHERE nom LIKE '%a%' AND LENGTH(nom) < 9 ORDER BY nom ASC LIMIT 10;
