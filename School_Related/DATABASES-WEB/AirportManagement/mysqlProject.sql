DROP TABLE IF EXISTS Certificare;
DROP TABLE IF EXISTS Zboruri;
DROP TABLE IF EXISTS Aeronave;
DROP TABLE IF EXISTS Angajati;

Create table Zboruri(
nrz int,
de_la varchar(15),
la varchar(15),
distanta int,
plecare timestamp,
sosire timestamp
);

Create table Aeronave(
idav int,
numeav varchar(15),
gama_croaziera int
);

Create table Certificare(
idan int,
idav int
);

Create table Angajati(
idan int,
numean varchar(20),
salariu int
);

Alter table Zboruri add primary key(nrz);
Alter table Aeronave add primary key(idav);
Alter table Certificare add primary key(idan,idav);
Alter table Angajati add primary key(idan);
Alter table Certificare add foreign key(idav) references Aeronave(idav); 
Alter table Certificare add foreign key(idan) references Angajati(idan); 
Alter table Angajati add data_nasterii date;

Alter table Aeronave add constraint intervalAeronave check(gama_croaziera>100 and gama_croaziera<10000);
Alter table Zboruri add constraint limita check(((to_number(extract(hour from plecare)))>0 and (to_number(extract(hour from plecare)))<12 and (to_number(extract(hour from sosire)))>12 and (to_number(extract(hour from sosire)))<=24)or((to_number(extract(hour from plecare)))>=12 and (to_number(extract(hour from plecare)))<=24));

Insert into ZBORURI(nrz,de_la,la,distanta,plecare,sosire)values('1','Cluj','Bucuresti','700','2016-10-10 20:00:00','2016-10-10 21:00:00');
Insert into ZBORURI(nrz,de_la,la,distanta,plecare,sosire)values('2','Bucuresti','Viena','1000','2016-11-01 12:30:00','2016-11-01 14:00:00');
Insert into ZBORURI(nrz,de_la,la,distanta,plecare,sosire)values('3','Barcelona','Londra','800','2016-09-25 23:30:00','2016-09-26 01:00:00');
Insert into ZBORURI(nrz,de_la,la,distanta,plecare,sosire)values('4','Moscova','Dublin','2000','2016-09-29 16:15:00','2016-09-29 20:00:00');
Insert into ZBORURI(nrz,de_la,la,distanta,plecare,sosire)values('5','Tokyo','Londra','9500','2016-11-19 09:45:00','2016-11-19 13:35:00');

Insert into AERONAVE(idav,numeav,gama_croaziera)values('112','BOEING 737-300','9600');
Insert into AERONAVE(idav,numeav,gama_croaziera)values('101','AIRBUS 318-111','7000');
Insert into AERONAVE(idav,numeav,gama_croaziera)values('002','ATR 450-500','8000');
Insert into AERONAVE(idav,numeav,gama_croaziera)values('221','ATR 888-500','5000');
Insert into AERONAVE(idav,numeav,gama_croaziera)values('421','BOEING 907-500','7800');
Insert into AERONAVE(idav,numeav,gama_croaziera)values('202','ATR 220-111','3000');

Insert into ANGAJATI(idan,numean,salariu,data_nasterii)values('2','Pop Iulian','5300','1980-10-09 18:50:00');
Insert into ANGAJATI(idan,numean,salariu,data_nasterii)values('5','Man Alin','4000','1976-02-17 23:17:00');
Insert into ANGAJATI(idan,numean,salariu,data_nasterii)values('6','Cadar Mihai','6100','1969-09-20 13:56:00');
Insert into ANGAJATI(idan,numean,salariu,data_nasterii)values('10','Crisan Ana','6000','1985-07-10 09:04:00');
Insert into ANGAJATI(idan,numean,salariu,data_nasterii)values('11','Lupo Adrian','5200','1972-12-21 07:09:00');
Insert into ANGAJATI(idan,numean,salariu,data_nasterii)values('20','Iancu Razvan','7050','1965-11-24 17:20:00');
Insert into ANGAJATI(idan,numean,salariu,data_nasterii)values('22','Mag Alin','1880','1900-06-08 22:00:00');
Insert into ANGAJATI(idan,numean,salariu,data_nasterii)values('25','Sabo Catalin','1500','1992-01-10 23:34:00');

Insert into CERTIFICARE(idan,idav)values('2','112');
Insert into CERTIFICARE(idan,idav)values('5','002');
Insert into CERTIFICARE(idan,idav)values('6','002');
Insert into CERTIFICARE(idan,idav)values('10','101');
Insert into CERTIFICARE(idan,idav)values('11','421');
Insert into CERTIFICARE(idan,idav)values('20','221');
Insert into CERTIFICARE(idan,idav)values('22','101');
Insert into CERTIFICARE(idan,idav)values('25','112');
Insert into CERTIFICARE(idan,idav)values('2','421');

DELIMITER //
CREATE PROCEDURE checkAeronava
(IN numeAeronava CHAR(20))
BEGIN
  SELECT * FROM aeronave
  WHERE numeav = numeAeronava;
END //
DELIMITER ;