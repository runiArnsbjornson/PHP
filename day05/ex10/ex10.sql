SELECT titre AS 'Titre', resum AS 'Resume', annee_prod
FROM `db_jdebladi`.`film`
WHERE id_genre = 'erotic'
ORDER BY annee_prod DESC;
