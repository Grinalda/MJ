CREATE VIEW ver_noticia AS
  SELECT
    `notic`.`Noticia_id`     AS `Noticia_id`,
    `notic`.`Noticia_data`   AS `Noticia_data`,
    `notic`.`Noticia_titulo` AS `Noticia_titulo`,
    `notic`.`Noticia_resumo` AS `Noticia_resumo`,
    `notic`.`Noticia_foto`   AS `Noticia_foto`
  FROM `mj`.`noticia` `notic`
  WHERE (`notic`.`Noticia_estado` = 1)
  ORDER BY `notic`.`Noticia_dataReg` DESC;

