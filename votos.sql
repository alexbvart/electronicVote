drop database if exists votos;
CREATE DATABASE votos;
USE votos;


/* -------------- tabla de las regiones ------------- */
drop TABLE if exists regiones;
CREATE TABLE regiones
(
    regionesId INT NOT NULL PRIMARY KEY, 
    nombreRegion NVARCHAR(50) NOT NULL
);

INSERT INTO regiones (regionesId, nombreRegion)
VALUES
            (1,"Arequipa"),
            (2,"Lima"),
            (3,"Piura");


/* -------------- tabla de los partidos ------------- */
drop TABLE if exists partidos;
CREATE TABLE partidos
(
    partidosId INT NOT NULL PRIMARY KEY, 
    nombrepartidos NVARCHAR(50) NOT NULL
);

INSERT INTO partidos (partidosId, nombrepartidos)
VALUES
            (1,"Republicano"),
            (2,"Democratico");




/* -------------- tabla partidos/regiones ------------- */
drop TABLE if exists parReg;
CREATE TABLE parReg
(
    parRegId INTEGER PRIMARY KEY AUTO_INCREMENT, 
    partidosId INT NOT NULL,
    regionesId INT NOT NULL,
    votosCount INT not NULL

);

INSERT INTO parReg (partidosId,regionesId,votosCount )
VALUES
            (1,1,100),
            (1,2,500),
            (2,3,400),
            (1,1,200),
            (1,3,700),
            (2,2,100),
            (1,2,400),
            (1,2,900),
            (2,3,100);

