/*SUPPRIMER LA BD clubs AUSSI L'ENSEMBLE DES SEQUENCES S'ELLES EXISTE DANS NOTRE SGBD*/
DROP DATABASE IF EXISTS clubs;

/* DROP SEQUENCE IF EXISTS user_id;

DROP SEQUENCE IF EXISTS apprenant_id;

DROP SEQUENCE IF EXISTS club_id; */

/*CREATION D'UNE SEQUENCE POUR L'ID DE user*/

/* CREATE SEQUENCE user_id START WITH 1 INCREMENT BY 1; */

/*CREATION D'UNE SEQUENCE POUR L'ID DE L'APPRENANT*/

/* CREATE SEQUENCE apprenant_id START WITH 1 INCREMENT BY 1; */

/*CREATION D'UNE SEQUENCE POUR L'ID DE CLUB*/

/* CREATE SEQUENCE club_id START WITH 1 INCREMENT 1; */

/*CRÉER LA BD club*/

CREATE DATABASE clubs;

/*ACCEDER A LA BD*/

USE clubs;

/*CREATION DE LA TABLE user*/

CREATE TABLE user(
    id INT PRIMARY KEY AUTO_INCREMENT,
    email varchar(50) NOT NULL,
    nom varchar(30) NOT NULL,
    prenom varchar(30) NOT NULL,
    mdp varchar(100) NOT NULL
);

/*CREATION DE LA TABLE club*/

CREATE TABLE club(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom varchar(30) NOT NULL,
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,
    titre varchar(30) NOT NULL,
    img_club varchar(100) NOT NULL
);

/*CREATION DE LA TABLE apprenant*/

CREATE TABLE apprenant(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom varchar(30) NOT NULL,
    prenom varchar(30) NOT NULL,
    classe varchar(30) NOT NULL,
    annee int NOT NULL,
    img_profile varchar(100) NOT NULL,
    type_apprenant BOOLEAN default(false),
    club_id int DEFAULT(null),
    CONSTRAINT CK_annee CHECK (annee = 1 OR annee = 2),
    CONSTRAINT FK_club FOREIGN KEY (club_id) REFERENCES club(id)
);
