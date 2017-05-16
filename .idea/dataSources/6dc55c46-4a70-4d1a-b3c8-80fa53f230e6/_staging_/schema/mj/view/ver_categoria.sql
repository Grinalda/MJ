CREATE VIEW ver_categoria AS
  SELECT `categ`.`Cat_nome` AS `Cat_nome`,
         `categ`.`Cat_id` AS `Cat_id`
  FROM `mj`.`categoria_legislacao` `categ`;
