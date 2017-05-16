
CREATE PROCEDURE funt_login(IN email VARCHAR(20), IN pass VARCHAR(45))
  BEGIN
    DECLARE totalUser INT;
    SELECT count(*) INTO totalUser
          FROM user
    WHERE UPPER(User_email)=email AND
      md5(User_Password) = md5(pass) AND
      User_estado = 1;
      
    IF totalUser = 1 THEN
        SELECT u.User_id id,
               u.User_Nome nome,
               u.User_email email
              from user u;
    END IF;
  END;
