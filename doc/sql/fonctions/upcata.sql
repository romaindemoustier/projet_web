CREATE OR REPLACE FUNCTION upcata(integer, integer)
  RETURNS integer AS
'
  declare f_id alias for $1;
  declare f_prix alias for $2;
  declare retour integer;
begin
 	update produit set prix=$2 where idprod=$1;
        if not found	then
		retour=0;
	else 
		retour=1;
	end if;
        return retour;
 end;
 '
  LANGUAGE plpgsql
