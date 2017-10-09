SELECT nom , prenom, DATE(date_naissance) AS 'date de naissance'
FROM `db_jdebladi`.`fiche_personne`
WHERE date_naissance >= '1989-01-01 00:00:00' AND date_naissance < '1990-01-01 00:00:00' 
ORDER BY nom ASC;
