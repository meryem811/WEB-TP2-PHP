use platforme_db;
create table utilisateur(
id int primary key auto_increment,
username varchar(40) not null,
email varchar(60) not null ,
role varchar (30) not null 
);
create table section (
id int primary key auto_increment,
designation varchar(40) not null,
description varchar(60)
);
create table étudiant(
id int primary key auto_increment,
Name varchar(40) not null,
birthday date,
image varchar(255) ,
section int, 
foreign key(section) references section(id)
);
insert into utilisateur (username,email,role)
values ('admin','admin@gmail.com','administrateur'),
	   ('etudiant1','etudiant1@yahoo.com','user'), 
       ('etudiant2','etudiant2@gmail.com','user'),
       ('admin1','admin1@gmail.com','administrateur'),
       ('etudiant3','etudiant3@gmail.com','user');
insert into étudiant (Name,birthday,image,section)
values ('Aya Gaha','2004-03-21','aya.jpg',6),
	   ('Eya Barghouth','2004-07-10','eya.jpg',7), 
       ('Meryem Karoui', '2004-11-08','meryem.jpg',7),
       ('Alla Gasmi','2004-01-21','alla.jpg',6),
       ('fatma Harrabi','2004-06-25','fatma.jpg',9),
       ('Chouaib Chimli','2004-03-31','chouaib.jpg',8);
insert into section (designation,description)
values('Génie Logiciel','La filière du Software' ),
	  ('Réseaux Et Télécom',"La filière des réseaux, de cybersecurity geeks"),
      ('IIA', 'Automatiser,robotique; IIA tout court ! '),
      ('IMI', "handy people are here, but curious hardware geeks !"),
      ('Devops','Sous-filière de software, domaine en croissance remarquable');
select * from section ;
alter table utilisateur add password varchar(60) ;
insert into utilisateur (username,email,role)
values ('root','root@gmail.com','administrateur');
SET SQL_SAFE_UPDATES = 0;
UPDATE utilisateur SET password = 'newpassword' WHERE username = 'root';
UPDATE utilisateur SET password = '' WHERE username = 'admin';
UPDATE utilisateur SET password = 'etudiant' WHERE username = 'etudiant1';
UPDATE utilisateur SET password = 'etudiant' WHERE username = 'etudiant2';
UPDATE utilisateur SET password = 'etudiant' WHERE username = 'etudiant3';

show tables;
SELECT * FROM platforme_db.étudiant;
SHOW TABLES LIKE 'étudiant';
RENAME TABLE platforme_db.etudiant TO platforme_db.étudiant;






