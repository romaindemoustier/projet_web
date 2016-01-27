CREATE SEQUENCE client_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 99999
  START 1
  CACHE 1;

CREATE TABLE client
(
  idcli integer NOT NULL DEFAULT nextval('client_seq'::regclass),
  nom text NOT NULL,
  prenom text NOT NULL,
  adresse text,
  ville text,
  cp integer,
  pays text,
  numdetel text,
  CONSTRAINT client_pk PRIMARY KEY (idcli)
);

CREATE SEQUENCE prod_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 99999
  START 1
  CACHE 1;

CREATE TABLE produit
(
  idprod integer NOT NULL DEFAULT nextval('prod_seq'::regclass),
  nom text NOT NULL,
  description text,
  prix integer,
  CONSTRAINT produit_pk PRIMARY KEY (idprod)
);


CREATE SEQUENCE achat_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 99999
  START 1
  CACHE 1;


CREATE TABLE achat
(
  idachat integer NOT NULL DEFAULT nextval('achat_seq'::regclass),
  idclient integer NOT NULL,
  idproduit integer NOT NULL,
  dateachat date,
  CONSTRAINT achat_pk PRIMARY KEY (idachat),
  CONSTRAINT achat_idclient_fkey FOREIGN KEY (idclient)
      REFERENCES client (idcli) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT jeu_fk FOREIGN KEY (idjeux)
      REFERENCES produit (idprod) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE SEQUENCE admin_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9999
  START 1
  CACHE 1;

  CREATE TABLE admin
(
  idadmin integer NOT NULL DEFAULT nextval('admin_seq'::regclass),
  nomadmin text NOT NULL,
  mpadmin text NOT NULL,
  CONSTRAINT admin_pkey PRIMARY KEY (idadmin)
)


CREATE SEQUENCE cat_seq
INCREMENT 1
MINVALUE 1
MAXVALUE 9999999
START 1
CACHE 1;

CREATE TABLE contact
(
  idcontact serial NOT NULL,
  sexe text NOT NULL,
  nom text NOT NULL,
  prenom text NOT NULL,
  comm text NOT NULL,
  email text NOT NULL,
  CONSTRAINT contact_pkey PRIMARY KEY (idcontact)
);



CREATE OR REPLACE FUNCTION addclient(text,text,text,text,integer,text,text)
  RETURNS integer AS
'
    declare f_nom alias for $1;
    declare f_pr alias for $2;
    declare f_a alias for $3;
    declare f_v alias for $4;
    declare f_c alias for $5;
    declare f_pa alias for $6;
    declare f_tel alias for $7;
    declare id integer;
    begin
        insert into client(nom, prenom, adresse, ville, cp, pays, numdetel) values (f_nom, f_pr, f_a, f_v, f_c, f_pa, f_tel);
        select into id idclient from client where nom=f_nom and prenom=f_pr and adresse=f_a and ville=f_v and cp=f_c and pays=f_pa and numdetel=f_tel;
	if not found then
	    id=0;
	end if;
	return id;
end;
'
LANGUAGE plpgsql 


CREATE OR REPLACE FUNCTION add_contact(
    text,
    text,
    text,
    text,
    text)
  RETURNS integer AS
  '
  declare f_sexe alias for $1;
  declare f_nom alias for $2;
  declare f_prenom alias for $3;
  declare f_comm alias for $4;
  declare f_email alias for $5;
  declare retour integer;
  declare id integer;
begin
 	insert into contact(sexe,nom,prenom,comm,email) 
	values (f_sexe,f_nom,f_prenom,f_comm,f_email);
        select into id idcontact from contact where sexe=f_sexe and nom=f_nom 
        and prenom=f_prenom and comm=f_comm and email=f_email;
        if not found	then
		retour=0;
	else 
		retour=1;
	end if;
        return retour;
 end;
 '
LANGUAGE plpgsql;


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


CREATE OR REPLACE FUNCTION verifier_connexion(text, text) RETURNS integer AS
'	
declare f_login alias for $1;
	declare f_password alias for $2;
	declare id integer;
	declare retour integer;
begin
	select into id id_users from users where nom_user=f_login and password=f_password;
	if not found
	then
	  retour=0;
	else
	  retour=1;
	end if;
	return retour;
end;
'
LANGUAGE plpgsql;






