CREATE OR REPLACE FUNCTION delcli(integer)RETURNS integer AS
'

  declare f_id alias for $1;
  declare retour integer;
  
begin
 	delete from client where idcli=$1;
        if not found	then
		retour=0;
	else 
		retour=1;
	end if;
	return retour;
end;
'
LANGUAGE plpgsql;
