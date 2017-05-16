CREATE FUNCTION Func_AddMultimedia(conteudo TEXT)
  RETURNS VARCHAR(100)
  BEGIN
    INSERT INTO multimedia (Mult_conteudo)
    VALUES (conteudo);
    RETURN 'Sucesso';
  END;