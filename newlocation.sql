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

# -----------------------------------------------------------------------------
#       TABLE : TYPE INTERVENTION
# -----------------------------------------------------------------------------

create table type_intervention
  (
    codeT_I int(5) not null auto_increment,
    libelle enum("Maintenance","Installation","Réparation"),
    primary key(codeT_I)
  )default charset='utf8';

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

# -----------------------------------------------------------------------------
#       TABLE : TYPE CLIENT
# -----------------------------------------------------------------------------
create table type_client
    (
     codeT_C int(5) not null auto_increment,
     libelle enum("Professionnelle","Particulier","Entreprise"),
     primary key(codeT_C)
    )default charset='utf8';

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
   adresse varchar(100),
   tel int(10),
   datenaiss date,
   nbCom int(5),
   codeReduc varchar(10),
   numSiret int(14),
   numSiren int(9),
   primary key(codeC),
   foreign key(codeT_C) references type_client(codeT_C)
 )default charset='utf8';

# -----------------------------------------------------------------------------
#       TABLE : TYPE MATERIEL
# -----------------------------------------------------------------------------

create table type_materiel
 (
   codeT_M int(5) not null auto_increment,
   designation enum("Bricolage","Construction","Jardinage","Engin de chantier"),
   primary key(codeT_M)
 )default charset='utf8';

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
   primary key(codeM),
   foreign key(codeT_M) references type_materiel(codeT_M)
 )default charset='utf8';


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
/*  INSERT */


/*  TYPE TECHNICIEN */

insert into type_technicien values
(null,"Mainteneur"),
(null,"Réparateur"),
(null,"Installateur");

/*  TYPE INTERVENTION */

insert into type_intervention values
(null,"Maintenance"),
(null,"Réparation"),
(null,"Installation");

/*  TYPE CLIENT */

insert into type_client values
(null,"Professionnelle"),
(null,"Particulier"),
(null,"Entreprise");

/*  TYPE MATERIEL */

insert into type_materiel values
(null,"Bricolage"),
(null,"Engin de chantier"),
(null,"Jardinage");


/* TECHNICIEN */

insert into technicien values
(null, 1, "motdepasse4", "George", "MICHAEL", "gm@gmail.com"),
(null, 2, "motdepasse3", "Charles", "DUPONT", "cd@gmail.com"),
(null, 3, "motde passe2", "Henri", "DUROI", "hdr@gmail.com"),
(null, 2, "motdepasse1", "Ahmed", "BENALI", "aba@gmial.com"),
(null, 1, "mdp", "Jeremy", "DAUVOIS", "dawnstriked@gmail.com");

/* INTERVENTION */

insert into intervention values
(null, 1, 1,'10:10:00', "RAS", "Fini"),
(null, 2, 1,'00:30:00', "Manque outil adéquat", "Fini"),
(null, 3, 2,'1:00:00', "Moins de temps que prévu", "Fini"),
(null, 2, 3,'00:10:00', "Remplacement du matériel du client par un neuf", "Fini"),
(null, 1, 4,'5:15:00', "Changement de pièce sur l'engin", "Fini"),
(null, 3, 2,'1:00:00', "RAS", "Fini"),
(null, 1, 4,'00:00:00', "En Cours", "En Cours");

/* CLIENT */

insert into client values
(null,1,"mdp123","a@gmail.com","JEAN","157 Rue de la Chouette","0652216408","1995-09-08",3,"eooivhe"),
(null,2,"mdp132","b@gmail.com","SKOIZER","158 Rue de la Chouette","0621640865","1991-01-03",3,""),
(null,3,"mdp321","c@gmail.com","HULOT","159 Rue de la Chouette","0652216408","1982-09-08",2,""),
(null,2,"mdp231","d@gmail.com", "MORETI","34 Rue de la Marche","0654287689","1975-03-12",1,"icjros");

/* MATERIEL */

insert into materiel values
(null, 1, "Marteau-piqueur", "1700W 60 joules - Livré en coffret métallique avec 2 burins - Grantie de 3 ans", 149.99, 16, 3),
(null, 3, "Tuyau d'arrosage nu", "Resistant aux UV - PVC - 50m - Diametre intérieur 18.5mm - Diametre extérieur 23mm",74.99,11.062, 5),
(null, 2, "Pelleteuse", "Profondeur d'excavation max 6.20m - Diesel - Hauteur 3.01m - Longeur 9.42m - Largeur 2.98m", 1220,22000, 1),
(null, 2, "Betonnière", "Energie : Electrique - Capacite : 160l Matière principale : Acier - Usage : petit chantier", 229.00, 46, 4),
(null, 2, "Brouette de chantier", "Acier - Diametre roue 400mm - Contenance 100l/200kg", 55, 10, 5),
(null, 3, "Brouette Jardinage", "Resine - Dimension 111x68 5x68 60cm", 39.95, 12, 2);

/*  ETC ... */

insert into reservation values
(null, 1, "OK", '2018-05-24', '2018-08-06', '2018-05-24', null),
(null, 3, "Impossible", '2018-02-01', '2018-02-26', null, null);

insert into contrat values
(null, 1,"SOPRANO", "Contrat fini");

insert into concerner VALUES
(1,3,2),
(2,2,1);
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

select materiel.stock - concerner.qte into verif from materiel, concerner, reservation where concerner.codeM = materiel.codeM and concerner.codeR = reservation.codeR and reservation.codeR = new.codeR
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
where codeC in(select codeC from reservation where codeR=new.codeR);
END //
Delimiter ;

/*Trigger code reduc*/
Drop trigger if exists Reduction ;
Delimiter //
Create trigger Reduction
after update on client
for each row
Begin
if (nbCom = 3)
then
update client
set codeReduc = "oui";
end if;
END //
Delimiter ;

/*Trigger numero Siret
Drop trigger if exists verifSiret
Delimiter //
create trigger verifSiret
after update on client
for each row 
BEGIN*/





create view comCli(Nom,CodeClient,nbCommande) as select nom, client.codeC, count(distinct codeR) from client, reservation where client.codeC=reservation.codeC group by codeC;

create view comMois(nbCommande,Mois) as select count(distinct codeR), month(dateD) from reservation group by month(dateD);

create view comAn(nbCommande,Annees) as select count(distinct codeR), year(dateD) from reservation group by year(dateD);