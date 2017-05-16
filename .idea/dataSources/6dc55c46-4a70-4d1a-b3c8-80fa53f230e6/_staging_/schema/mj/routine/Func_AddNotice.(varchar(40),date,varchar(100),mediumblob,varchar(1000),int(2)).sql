CREATE FUNCTION Func_AddNotice(titulo   VARCHAR(300), date_Noticia DATE, resumo VARCHAR(500), foto MEDIUMBLOB,
                               conteudo TEXT, user INT(2))
  RETURNS VARCHAR(100)
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
  END;
