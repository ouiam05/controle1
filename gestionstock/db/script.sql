
create database if not exists dbctrl;
use dbctrl;

create table fournisseur
(
idF varchar(20) primary key not null,
nameF varchar(20),
tele varchar(20),
email varchar(20)
);

create table produit
(
idP varchar(20) primary key not null,
libelle varchar(20),
prix float,
etatP varchar(20),
constraint etatP_pk1 check (etatP in ('Y','N'))
);

create table commande
(
idCmd varchar(20) not null,
idF varchar(20),
idP varchar(20),
dateCmd varchar(20)
);

alter table commande add foreign key (idF) references fournisseur(idF) on delete cascade on update cascade;
alter table commande add foreign key (idP) references produit(idP) on delete cascade on update cascade;
alter table commande add constraint PK_Commande primary key (idCmd,idF,idP);

create table detail_commande
(
idCmd varchar(20) not null,
idF varchar(20),
idP varchar(20),
qte int
);

alter table detail_commande add foreign key (idCmd) references commande(idCmd) on delete cascade on update cascade;
alter table detail_commande add foreign key (idF) references commande(idF) on delete cascade on update cascade;
alter table detail_commande add foreign key (idP) references commande(idP) on delete cascade on update cascade;
alter table detail_commande add constraint PK_Detail_Commande primary key (idCmd,idF,idP);

create table livraison
(
idliv varchar(20) not null,
idCmd varchar(20),
idF varchar(20),
idP varchar(20),
dateLiv varchar(20)
);

alter table livraison add foreign key (idCmd) references detail_commande(idCmd) on delete cascade on update cascade;
alter table livraison add foreign key (idF) references detail_commande(idF) on delete cascade on update cascade;
alter table livraison add foreign key (idP) references detail_commande(idP) on delete cascade on update cascade;
alter table livraison add constraint PK_Livraison primary key (idliv,idCmd,idF,idP);

create table detail_livraison
(
idliv varchar(20) not null,
idCmd varchar(20),
idF varchar(20),
idP varchar(20),
adresseLiv varchar(20),
prixLiv float
);

alter table detail_livraison add foreign key (idliv) references livraison(idliv) on delete cascade on update cascade;
alter table detail_livraison add foreign key (idCmd) references livraison(idCmd) on delete cascade on update cascade;
alter table detail_livraison add foreign key (idF) references livraison(idF) on delete cascade on update cascade;
alter table detail_livraison add foreign key (idP) references livraison(idP) on delete cascade on update cascade;
alter table detail_livraison add constraint PK_detail_livraison primary key (idliv,idCmd,idF,idP);


insert into fournisseur values('f1','ahmed','0650009977','ahmed.f1@outlook.fr');
insert into fournisseur values('f2','rachid','0655441122','rachid.f3@cloud.com');
insert into fournisseur values('f3','achraf','0655889913','achraf.f3@outlook.com');
insert into fournisseur values('f4','anouar','0651957977','anouar.f4@gmail.fr');


insert into produit values('p10','Tager',1.5,'Y');
insert into produit values('p20','raibi',2,'Y');
insert into produit values('p30','pringels',20,'Y');
insert into produit values('p40','sidi ali',6,'Y');
insert into produit values('p50','twins',3,'N');


insert into commande values('c1','f1','p10','10/12/2020');
insert into commande values('c1','f1','p20','10/12/2020');
insert into commande values('c1','f1','p50','10/12/2020');
insert into commande values('c2','f2','p10','11/05/2019');
insert into commande values('c2','f2','p50','11/05/2019');

insert into detail_commande values('c1','f1','p10',5);
insert into detail_commande values('c1','f1','p20',3);
insert into detail_commande values('c1','f1','p30',2);

insert into detail_commande values('c2','f2','p10',10);
insert into detail_commande values('c2','f2','p30',20);
insert into detail_commande values('c1','f1','p20',3);
insert into detail_commande values('c1','f1','p30',2);

insert into detail_commande values('c2','f2','p10',10);
insert into detail_commande values('c2','f2','p30',20);

insert into livraison values('l1','c1','f1','p10','11/12/2020 12:30');
insert into livraison values('l1','c1','f1','p20','11/12/2020 12:30');
insert into livraison values('l1','c1','f1','p30','11/12/2020 12:30');

insert into detail_livraison values('l1','c1','f1','p10','hay nor fes',10);
insert into detail_livraison values('l1','c1','f1','p20','hay salam casa',10);
insert into detail_livraison values('l1','c1','f1','p30','hay el farah rabat',10);


