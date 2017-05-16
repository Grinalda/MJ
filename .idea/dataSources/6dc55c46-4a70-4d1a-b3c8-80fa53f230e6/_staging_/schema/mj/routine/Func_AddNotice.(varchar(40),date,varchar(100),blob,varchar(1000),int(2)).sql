DROP FUNCTION Func_AddNotice;
CREATE DEFINER=`root`@`localhost` FUNCTION `Func_AddNotice`(
  `titulo` VARCHAR(40),
  `date_Noticia` DATE,
  `resumo` VARCHAR(100),
  `foto` MEDIUMBLOB,
  `conteudo` VARCHAR(1000),
  `user` INT(2)

)
  RETURNS varchar(100) CHARSET utf8
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
  SQL SECURITY DEFINER
  COMMENT ''
  BEGIN
    INSERT INTO noticia
    (
      Noticia_titulo,
      Noticia_resumo,
      Noticia_foto,
      Noticia_data,
      Noticia_texto,
      User_User_id
    )
    VALUES
      (
        titulo,
        resumo,
        foto,
        date_Noticia,
        conteudo,
        user
      );

    return 'Sucesso';
  END