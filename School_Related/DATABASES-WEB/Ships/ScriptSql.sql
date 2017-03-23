DROP TABLE  IF EXISTS Consecinte;
DROP TABLE  IF EXISTS Nave;
DROP TABLE  IF EXISTS Clase;
DROP TABLE  IF EXISTS Batalii;

CREATE TABLE Clase 
(
	clasa varchar(30) NOT NULL,
	tip varchar(2) NOT NULL ,
	tara varchar(30) NOT NULL ,
	cate_arme int NOT NULL ,
	diametru_tun int NOT NULL,
	deplasament int NOT NULL,
	um int NOT NULL
);

CREATE TABLE Nave 
(
	nume varchar(30) NOT NULL,
	clasa varchar(30) NOT NULL ,
	anul_lansarii date NOT NULL
);

CREATE TABLE Batalii 
(
	nume varchar(30) NOT NULL,
	data date NOT NULL
);

CREATE TABLE Consecinte 
(
	nava varchar(30) NOT NULL,
	batalie varchar(30) NOT NULL,
	rezultat varchar(30) NOT NULL
);

ALTER TABLE Clase ADD CONSTRAINT d1 PRIMARY KEY (clasa);
ALTER TABLE Nave ADD CONSTRAINT d2 PRIMARY KEY (nume);
ALTER TABLE Batalii ADD CONSTRAINT d3 PRIMARY KEY (nume);
ALTER TABLE Consecinte ADD CONSTRAINT d4 PRIMARY KEY (nava, batalie);

ALTER TABLE Nave ADD CONSTRAINT d5 FOREIGN KEY(clasa) REFERENCES Clase(clasa);
ALTER TABLE Consecinte ADD CONSTRAINT d6 FOREIGN KEY(nava) REFERENCES Nave(nume);
ALTER TABLE Consecinte ADD CONSTRAINT d7 FOREIGN KEY(batalie) REFERENCES Batalii(nume);

ALTER TABLE Clase DROP column um;


INSERT INTO Clase(clasa, tip, tara, cate_arme, diametru_tun, deplasament) VALUES('Queen Elizabeth', 'VL', 'ROMANIA', 14, 12, 2);
INSERT INTO Clase(clasa, tip, tara, cate_arme, diametru_tun, deplasament) VALUES('CLASA2', 'VL', 'POLONIA', 12, 17, 7);
INSERT INTO Clase(clasa, tip, tara, cate_arme, diametru_tun, deplasament) VALUES('CLASA3', 'CR', 'ROMANIA', 16, 13, 7);
INSERT INTO Clase(clasa, tip, tara, cate_arme, diametru_tun, deplasament) VALUES('CLASA4', 'VL', 'POLONIA', 12, 11, 3);
INSERT INTO Clase(clasa, tip, tara, cate_arme, diametru_tun, deplasament) VALUES('CLASA5', 'CR', 'GERMANIA', 12, 19, 7);
INSERT INTO Clase(clasa, tip, tara, cate_arme, diametru_tun, deplasament) VALUES('CLASA8', 'VL', 'CROATIA', 14, 6, 3);
INSERT INTO Clase(clasa, tip, tara, cate_arme, diametru_tun, deplasament) VALUES('CLASA1', 'VL', 'CHINA', 10, 6, 3);
INSERT INTO Clase(clasa, tip, tara, cate_arme, diametru_tun, deplasament) VALUES('Ticonderoga', 'VL', 'CHINA', 4, 10, 3);
INSERT INTO Clase(clasa, tip, tara, cate_arme, diametru_tun, deplasament) VALUES('NELSON', 'VL', 'MAREA BRITANIE', 9, 16, 34000);

INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('CLASA1', 'CLASA1', '1962-6-23');
INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('NAVA1', 'CLASA1', '1995-11-01');
INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('CLASA2', 'CLASA2', '2002-12-13');
INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('NAVA2', 'CLASA3', '2003-1-13');
INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('CLASA4', 'CLASA4', '1950-8-17');
INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('NAVA3', 'CLASA4', '1993-2-17');
INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('Queen Elizabeth', 'Queen Elizabeth', '1993-2-11');
INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('NAVA4', 'Queen Elizabeth', '1993-11-12');
INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('Ticonderoga', 'Ticonderoga', '1993-8-14');
INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('NELSON', 'NELSON', '1927-12-13');
INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('ROODNEY', 'NELSON', '1927-8-2');

INSERT INTO Batalii(nume, data) VALUES('BATALIA1', '1990-8-17');
INSERT INTO Batalii(nume, data) VALUES('BATALIA2', '1993-2-15');
INSERT INTO Batalii(nume, data) VALUES('BATALIA3', '1973-2-15');
INSERT INTO Batalii(nume, data) VALUES('Battle of the Philippine Sea', '1990-1-21');
INSERT INTO Consecinte(nava, batalie, rezultat) VALUES('CLASA1', 'Battle of the Philippine Sea', 'AVARIAT');
INSERT INTO Consecinte(nava, batalie, rezultat) VALUES('NAVA3', 'BATALIA2', 'AVARIAT');
INSERT INTO Consecinte(nava, batalie, rezultat) VALUES('NAVA2', 'Battle of the Philippine Sea', 'NEVATAMAT');
INSERT INTO Consecinte(nava, batalie, rezultat) VALUES('Queen Elizabeth', 'BATALIA3', 'AVARIAT');
INSERT INTO Consecinte(nava, batalie, rezultat) VALUES('NAVA4', 'BATALIA1', 'SCUFUNDAT');
INSERT INTO Consecinte(nava, batalie, rezultat) VALUES('CLASA4', 'BATALIA3', 'AVARIAT');

-- DELIMITER //
-- CREATE PROCEDURE checkBatalie
-- (IN numeBatalie CHAR(20))
-- BEGIN
--   SELECT * FROM batalii
--   WHERE nume = numeBatalie;
-- END //
-- DELIMITER ;

-- DELIMITER //
-- CREATE PROCEDURE getClaseFirstLetter
-- (IN firstLetter CHAR(20))
-- BEGIN
--   SELECT Count(*) 
--   FROM clase
--   WHERE clasa LIKE CONCAT(firstLetter,'%');
-- END //
-- DELIMITER ;

-- DELIMITER //
-- CREATE PROCEDURE getBataliiWithLetter
-- (IN firstLetter CHAR(20))
-- BEGIN
--   SELECT *
--   FROM batalii
--   WHERE nume LIKE CONCAT(firstLetter,'%');
-- END //
-- DELIMITER ;


-- DELIMITER //
-- CREATE PROCEDURE getNaveFromClass
-- (IN clasa CHAR(20))
-- BEGIN
-- 	SELECT DISTINCT nave.nume
-- 	FROM nave
-- 	JOIN clase ON clase.clasa = nave.clasa
-- 	WHERE clasa = nave.clasa;
-- END //
-- DELIMITER ;