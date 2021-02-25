-- Export de la structure de la base pour airdi
DROP DATABASE IF EXISTS `airdi`;
CREATE DATABASE IF NOT EXISTS `airdi`;
USE `airdi`;

DROP TABLE IF EXISTS `vol`;
DROP TABLE IF EXISTS `pilote`;
DROP TABLE IF EXISTS `avion`;

CREATE TABLE IF NOT EXISTS `avion` (
    av 	     INT PRIMARY KEY Not Null,
    avMarq 	 VARCHAR(20),
    avType 	 VARCHAR(10), 
    cap 	 INT,
    loc 	 VARCHAR(20)	
);

CREATE TABLE IF NOT EXISTS `pilote` (
    pil 	 INT Not Null PRIMARY KEY,
    pilNom 	 VARCHAR(20),
    adr		 VARCHAR(20)
);

CREATE TABLE IF NOT EXISTS `vol` (
    idVol VARCHAR(20) PRIMARY KEY,
    av 	  INT, 
    pil   INT,
    vd 	  VARCHAR(20),
    va 	  VARCHAR(20),
    hd 	  VARCHAR(10),
    ha 	  VARCHAR(10),
    FOREIGN KEY(av) REFERENCES `avion`(av),
	FOREIGN KEY(pil) REFERENCES `pilote`(pil)
);

INSERT INTO `avion` (av, avMarq, avType, cap, loc) VALUES(100, 'Airbus', 'A320', 300,'Nice');
INSERT INTO `avion` (av, avMarq, avType, cap, loc) VALUES(101, 'Boeing', 'B707', 250,'Paris');
INSERT INTO `avion` (av, avMarq, avType, cap, loc) VALUES(102, 'Airbus', 'A320', 300,'Toulouse');
INSERT INTO `avion` (av, avMarq, avType, cap, loc) VALUES(103, 'Caravelle', 'Crv01', 200,'Toulouse');
INSERT INTO `avion` (av, avMarq, avType, cap, loc) VALUES(104, 'Boeing', 'B747', 400,'Paris');
INSERT INTO `avion` (av, avMarq, avType, cap, loc) VALUES(105, 'Airbus', 'A320', 300,'Grenoble');
INSERT INTO `avion` (av, avMarq, avType, cap, loc) VALUES(106, 'ATR', 'ATR42', 50,'Paris');
INSERT INTO `avion` (av, avMarq, avType, cap, loc) VALUES(107, 'Boeing', 'A320', 300,'Lyon');
INSERT INTO `avion` (av, avMarq, avType, cap, loc) VALUES(108, 'Boeing', 'A320', 300,'Nantes');
INSERT INTO `avion` (av, avMarq, avType, cap, loc) VALUES(109, 'Airbus', 'A340', 350,'Bastia');

INSERT INTO `pilote` (pil, pilNom,adr) VALUES(1, 'Serge', 'Nice');
INSERT INTO `pilote` (pil, pilNom,adr) VALUES(2, 'Jean', 'Paris');
INSERT INTO `pilote` (pil, pilNom,adr) VALUES(3, 'Claude', 'Grenoble');
INSERT INTO `pilote` (pil, pilNom,adr) VALUES(4, 'Robert', 'Nantes');
INSERT INTO `pilote` (pil, pilNom,adr) VALUES(5, 'Michel', 'Paris');
INSERT INTO `pilote` (pil, pilNom,adr) VALUES(6, 'Lucien', 'Toulouse');
INSERT INTO `pilote` (pil, pilNom,adr) VALUES(7, 'Bertrand', 'Lyon');
INSERT INTO `pilote` (pil, pilNom,adr) VALUES(8, 'Herve', 'Bastia');
INSERT INTO `pilote` (pil, pilNom,adr) VALUES(9, 'Luc', 'Paris');

INSERT INTO `vol` (idVol, av, pil, vd, va, hd, ha) VALUES('IT100',100, 1,'Nice', 'Paris', '7h00', '9h00');
INSERT INTO `vol` (idVol, av, pil, vd, va, hd, ha) VALUES('IT101',100, 2,'Paris', 'Toulouse', '11h00', '12h00');
INSERT INTO `vol` (idVol, av, pil, vd, va, hd, ha) VALUES('IT102',101, 1,'Paris', 'Nice', '12h00', '14h00');
INSERT INTO `vol` (idVol, av, pil, vd, va, hd, ha) VALUES('IT103',105, 3,'Grenoble', 'Toulouse', '9h00', '11h00');
INSERT INTO `vol` (idVol, av, pil, vd, va, hd, ha) VALUES('IT104',105, 3,'Toulouse', 'Grenoble', '17h00', '19h00');
INSERT INTO `vol` (idVol, av, pil, vd, va, hd, ha) VALUES('IT105',107, 7,'Lyon', 'Paris', '6h00', '7h00');
INSERT INTO `vol` (idVol, av, pil, vd, va, hd, ha) VALUES('IT106',109, 8,'Bastia', 'Paris', '10h00', '13h00');
INSERT INTO `vol` (idVol, av, pil, vd, va, hd, ha) VALUES('IT107',106, 9,'Paris', 'Brive', '7h00', '8h00');
INSERT INTO `vol` (idVol, av, pil, vd, va, hd, ha) VALUES('IT108',106, 9,'Brive', 'Paris', '19h00', '20h00');
INSERT INTO `vol` (idVol, av, pil, vd, va, hd, ha) VALUES('IT109',107, 7,'Paris', 'Lyon', '18h00', '19h00');
INSERT INTO `vol` (idVol, av, pil, vd, va, hd, ha) VALUES('IT110',102, 2,'Toulouse', 'Paris', '15h00', '16h00');
INSERT INTO `vol` (idVol, av, pil, vd, va, hd, ha) VALUES('IT111',101, 4,'Nice', 'Nantes', '17h00', '19h00');


/*-------------------Les commandes------------------*/
SELECT avMarq From `avion`;


SELECT avMarq AS Constructeur,
	COUNT(av) AS NB_appareils,
	MIN(cap) AS Capacité_mini,
	MAX(cap) AS Capacité_maxi
FROM `avion` 
GROUP BY avMarq;
