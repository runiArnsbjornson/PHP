UPDATE `db_jdebladi`.`ft_table`
SET date_de_creation=ADDDATE(date_de_creation, INTERVAL 20 year)
WHERE id > 5;
