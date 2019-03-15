drop database location;
create database location;

  use location;

# -----------------------------------------------------------------------------
#       TABLE : TYPE TECHNICIEN
# -----------------------------------------------------------------------------

create table type_technicien
 (
   codeT_T int(5) not null auto_increment,
   libelle enum("Mainteneur","Installateur","Réparateur","Engin de chantier"),
   primary key(codeT_T)
 )default charset='utf8';

 insert into type_technicien values
	(null,"Mainteneur"),
	(null,"Réparateur"),
	(null,"Installateur");

# -----------------------------------------------------------------------------
#       TABLE : TECHNICIEN
# -----------------------------------------------------------------------------

create table technicien
 (
   codeT int(5) not null auto_increment,
   codeT_T int(5) not null,
   mdp varchar(50),
   nom varchar(25),
   prenom varchar(25),
   mailt varchar(50),
   primary key(codeT),
   foreign key(codeT_T) references type_technicien(codeT_T)
 )default charset='utf8';

 insert into technicien values
	(null, 1, "motdepasse4", "George", "MICHAEL", "gm@gmail.com"),
	(null, 2, "motdepasse3", "Charles", "DUPONT", "cd@gmail.com"),
	(null, 3, "motde passe2", "Henri", "DUROI", "hdr@gmail.com"),
	(null, 2, "motdepasse1", "Ahmed", "BENALI", "aba@gmial.com"),
	(null, 1, "mdp", "Jeremy", "DAUVOIS", "dawnstriked@gmail.com");

# -----------------------------------------------------------------------------
#       TABLE : TYPE INTERVENTION
# -----------------------------------------------------------------------------

create table type_intervention
  (
    codeT_I int(5) not null auto_increment,
    libelle enum("Maintenance","Installation","Réparation"),
    primary key(codeT_I)
  )default charset='utf8';

  insert into type_intervention values
	(null,"Maintenance"),
	(null,"Réparation"),
	(null,"Installation");

# -----------------------------------------------------------------------------
#       TABLE : INTERVENTION
# -----------------------------------------------------------------------------

create table intervention
 (
   codeI int(5) not null auto_increment,
   codeT_I int(5) not null,
   codeT int(5) not null,
   duree time,
   commentaire varchar(100),
   etat varchar(50),
   primary key(codeI),
   foreign key(codeT_I) references type_intervention(codeT_I),
   foreign key(codeT) references technicien(codeT)
 )default charset='utf8';

 insert into intervention values
	(null, 1, 1,'10:10:00', "RAS", "Fini"),
	(null, 2, 1,'00:30:00', "Manque outil adéquat", "Fini"),
	(null, 3, 2,'1:00:00', "Moins de temps que prévu", "Fini"),
	(null, 2, 3,'00:10:00', "Remplacement du matériel du client par un neuf", "Fini"),
	(null, 1, 4,'5:15:00', "Changement de pièce sur l'engin", "Fini"),
	(null, 3, 2,'1:00:00', "RAS", "Fini"),
	(null, 1, 4,'00:00:00', "En Cours", "En Cours");

# -----------------------------------------------------------------------------
#       TABLE : TYPE CLIENT
# -----------------------------------------------------------------------------

create table type_client
    (
     codeT_C int(5) not null auto_increment,
     libelle enum("Professionnelle","Particulier","Entreprise"),
     primary key(codeT_C)
    )default charset='utf8';

insert into type_client values
	(null,"Professionnelle"),
	(null,"Particulier"),
	(null,"Entreprise");

# -----------------------------------------------------------------------------
#       TABLE : CLIENT
# -----------------------------------------------------------------------------

create table  client
 (
   codeC int(5) not null auto_increment,
   codeT_C int(5),
   mdpc varchar(100),
   mail varchar(50),
   nom varchar(50),
   prenom VARCHAR(50),
   adresse varchar(100),
   tel int(10),
   datenaiss date,
   nbCom int(5),
   codeReduc varchar(10),
   numSiret int(14),
   numSiren int(9),
   grade varchar(10),
   primary key(codeC),
   foreign key(codeT_C) references type_client(codeT_C)
 )default charset='utf8';

  insert into client values (
    null, 1, "40bd001563085fc35165329ea1ff5c5ecbdbbeef", "p@gmail.com", null, null , null, null , null, null , null, null , null, "admin" 
  );
  insert into client values (
    null, 1, "40bd001563085fc35165329ea1ff5c5ecbdbbeef", "momo@gmail.com", null, null , null, null , null, null , null, null , null, "admin" 
  );

# -----------------------------------------------------------------------------
#       TABLE : TYPE MATERIEL
# -----------------------------------------------------------------------------

create table type_materiel
 (
   codeT_M int(5) not null auto_increment,
   designation enum("Bricolage","Construction","Jardinage","Engin de chantier"),
   primary key(codeT_M)
 )default charset='utf8';

 insert into type_materiel values
	(null,"Bricolage"),
	(null,"Engin de chantier"),
	(null,"Jardinage"),
  (null,"Construction");

# -----------------------------------------------------------------------------
#       TABLE : MATERIEL
# -----------------------------------------------------------------------------

create table materiel
 (
   codeM int(5) not null auto_increment,
   codeT_M int(5) not null,
   nom varchar(25),
   notice varchar(255),
   prix float(6.2),
   poids float(5.2),
   stock int(2),
   image varchar(255),
   primary key(codeM),
   foreign key(codeT_M) references type_materiel(codeT_M)
 )default charset='utf8';

insert into materiel values
	(null, 1, "Marteau-piqueur", "1700W 60 joules - Livré en coffret métallique avec 2 burins - Grantie de 3 ans", 149.99, 16, 3, "img/image/marteau_piqueur.jpg"),
	(null, 3, "Tuyau d'arrosage", "Resistant aux UV - PVC - 50m - Diametre intérieur 18.5mm - Diametre extérieur 23mm",74.99,11.062, 5, "img/image/tuyau.jpg"),
	(null, 2, "Pelleteuse", "Profondeur d'excavation max 6.20m - Diesel - Hauteur 3.01m - Longeur 9.42m - Largeur 2.98m", 1220,22000, 1, "img/image/pelleteuse.jpg"),
	(null, 2, "Betonnière", "Energie : Electrique - Capacite : 160l Matière principale : Acier - Usage : petit chantier", 229.00, 46, 4, "img/image/betonniere.jpg"),
	(null, 2, "Brouette de chantier", "Acier - Diametre roue 400mm - Contenance 100l/200kg", 55, 10, 5, "img/image/brouette.jpg"),
	(null, 3, "Brouette Jardinage", "Resine - Dimension 111x68 5x68 60cm", 39.95, 12, 2, "img/image/brouette_jard.jpg"),
  (null, 4, "Perçeuse à Percussion", "700W - vitesse à vide : 50-3000 tr/min - fréquence de frappe : 45 000 cps/min", 89.99, 1.8, 5, "img/image/perceuse.jpg");

# -----------------------------------------------------------------------------
#       TABLE : RESERVATION
# -----------------------------------------------------------------------------

create table reservation
 (
   codeR int(5) not null auto_increment,
   codeC int(5) not null,
   etat varchar(50),
   dateD date,
   dateF date,
   date_retrait date,
   date_depot date,
   primary key(codeR),
   foreign key(codeC) references client(codeC)
 )default charset='utf8';

# -----------------------------------------------------------------------------
#       TABLE : CONTRAT
# -----------------------------------------------------------------------------

create table contrat
 (
   code_contrat int(5) not null auto_increment,
   codeR int(5) not null,
   signature varchar(50),
   etat varchar(50),
   primary key(code_contrat),
   foreign key(codeR) references reservation(codeR)
 )default charset='utf8';

 insert into contrat values
	(null, 1,"SOPRANO", "Contrat fini");

/*  INSERT */

# -----------------------------------------------------------------------------
#       TABLE : (motiver) Type_Intervention <=> Intervention
# -----------------------------------------------------------------------------

create table motiver
 (
   codeI int(5) not null,
   codeT_I int(5) not null,
   primary key(codeI,codeT_I),
   foreign key(codeI) references intervention(codeI),
   foreign key(codeT_I) references type_intervention(codeT_I)
 )default charset='utf8';

# -----------------------------------------------------------------------------
#       TABLE : (INTERVENIR) INTERVENTION <=> MATERIEL
# -----------------------------------------------------------------------------

create table intervenir
 (
   codeI int(5) not null,
   codeM int(5) not null,
   primary key(codeI,codeM),
   foreign key(codeI) references intervention(codeI),
   foreign key(codeM) references materiel(codeM)
 )default charset='utf8';

# -----------------------------------------------------------------------------
#       TABLE : (concerner) Reservation <=> Materiel
# -----------------------------------------------------------------------------

create table concerner
  (
    codeR int(5) not null,
    codeM int(5) not null,
    qte int(5),
    primary key(codeR,codeM),
    foreign key(codeR) references reservation(codeR),
    foreign key(codeM) references materiel(codeM)
)default charset='utf8';

/*  ETC ... */

insert into concerner VALUES
(1,3,2),
(2,2,1);

/*  PANIER  */

create table panier
  (
    codeC int(5),
    codeM int(5),
    primary key (codeC,codeM),
    foreign key (codeC) references client(codeC),
    foreign key (codeM) references materiel(codeM)
    )default charset='utf8';

/*    Triggers    */

Drop trigger if exists verifAge ;
Delimiter //
Create trigger verifAge
before insert on client
for each row
Begin
if year(curdate())-year(new.datenaiss)<18
  then
  signal sqlstate '45000'
  set message_text = 'La personne n est pas majeur';
end if;
END //
Delimiter ;

/*
drop trigger if exists verifUpdate;
Delimiter //
create trigger verifUpdate
after update on materiel
for each row
Begin
insert into archivmateriel values (old.codeM,old.codeT_M,old.nom,old.notice,old.prix,old.poids,sysdate(),user(),"update");
End //
Delimiter ;
drop trigger if exists verifDelete;
delimiter //
create trigger verifDelete
after delete on materiel
for each row
begin
insert into archiv values (old.codeM,old.codeT_M,old.nom,old.notice,old.prix,old.poids,sysdate(),user(),"delete");
end //
delimiter ;
*/

/*Trigger qui rend la commande impossible si la quantité est égale à 0*/

drop trigger if exists verifStock;
delimiter //
create trigger verifStock
before insert on reservation
for each row
begin

declare verif varchar(3);

select materiel.stock - concerner.qte into verif
from materiel, concerner, reservation
where concerner.codeM = materiel.codeM
and concerner.codeR = reservation.codeR
and reservation.codeR = new.codeR
;

if ( verif ) < 0
then
        signal sqlstate '45000'
        set message_text = 'quantite_indisponible';
else
      update materiel
      set  stock = verif
      where codeM in ( select codeM from concerner );
end if;
end //

delimiter ;

/*Trigger qui ajoute un au num de commande client*/
Drop trigger if exists fidCli ;
Delimiter //
Create trigger fidCli
after insert on reservation
for each row
Begin
update client
set nbcom = nbCom+1
where codeC in
(select codeC from reservation where codeR=new.codeR);
END //
Delimiter ;

/*Trigger code reduc*/
Drop trigger if exists Reduction ;
Delimiter //
Create trigger Reduction
after update on client
for each row
Begin
if (select nbCom from Client where codeC = new.codeC) = 3
then
update client
set codeReduc = "oui"
where codeC = new.codeC;
end if;
END //
Delimiter ;

/*

Trigger numero Siret_Siren (expression regulière )

Drop trigger if exists verifSir
Delimiter //
create trigger verifSiret
after update on client
for each row
BEGIN
if new.numSiret REGEXP_LIKE (numSiret {14}-[0-9])

*/

create view view_comCli(Nom,CodeClient,nbCommande) as select nom, client.codeC, count(distinct codeR) from client, reservation where client.codeC=reservation.codeC group by codeC;

create view view_comMois(nbCommande,Mois) as select count(distinct codeR), month(dateD) from reservation group by month(dateD);

create view view_comAn(nbCommande,Annees) as select count(distinct codeR), year(dateD) from reservation group by year(dateD);
