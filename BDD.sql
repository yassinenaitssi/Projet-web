-- phpMyAdmin SQL Dump
-- version 4.0.10.12
-- http://www.phpmyadmin.net
--
-- Client: 127.6.37.2:3306
-- Généré le: Lun 16 Mai 2016 à 15:40
-- Version du serveur: 5.5.45
-- Version de PHP: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `citecolombiere`
--

-- --------------------------------------------------------

--
-- Structure de la table `batiment`
--

CREATE TABLE IF NOT EXISTS `batiment` (
  `NumeroBat` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_etage` int(11) NOT NULL,
  `nombre_chambre` int(11) DEFAULT NULL,
  `nombre_studio` int(11) DEFAULT NULL,
  `nombre_studette` int(11) DEFAULT NULL,
  `nombreDeSalle` int(11) DEFAULT NULL,
  `IdType` int(11) DEFAULT NULL,
  PRIMARY KEY (`NumeroBat`),
  KEY `FK_batiment_IdType` (`IdType`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `batiment`
--

INSERT INTO `batiment` (`NumeroBat`, `nombre_etage`, `nombre_chambre`, `nombre_studio`, `nombre_studette`, `nombreDeSalle`, `IdType`) VALUES
(1, 3, 45, 4, 0, 2, 1),
(2, 4, 32, 0, 4, 2, 1),
(3, 4, 50, 4, 4, 4, 1),
(4, 4, 50, 12, 0, 4, 1),
(5, 3, 0, 10, 24, 3, 1),
(6, 4, 68, 0, 4, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `erreur`
--

CREATE TABLE IF NOT EXISTS `erreur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `erreur` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `erreur` (`erreur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `erreur`
--

INSERT INTO `erreur` (`id`, `erreur`) VALUES
(13, 'Erreur :  date debut inferieure a date fin'),
(6, 'Erreur : Batiment reserve'),
(9, 'Erreur : heure debut inferieure a heure fin'),
(8, 'Erreur : nombre de place insuffisant'),
(1, 'Erreur : Salle Occupée'),
(7, 'Erreur : T as deja pris une salle de travail');

-- --------------------------------------------------------

--
-- Structure de la table `formulaire`
--

CREATE TABLE IF NOT EXISTS `formulaire` (
  `formulaireId` int(11) NOT NULL AUTO_INCREMENT,
  `residentId` int(11) NOT NULL,
  `NumSalle` int(11) NOT NULL,
  `NumeroBat` int(11) NOT NULL,
  `Date_debut` date NOT NULL,
  `Date_fin` date NOT NULL,
  `Heure_Debut` time DEFAULT NULL,
  `Heure_fin` time DEFAULT NULL,
  `Heure_fin_reel` time DEFAULT NULL,
  `nombre_participant` int(11) NOT NULL,
  `Date_fin_reel` date DEFAULT NULL,
  PRIMARY KEY (`formulaireId`),
  KEY `FK_formulaire_residentId` (`residentId`),
  KEY `FK_formulaire_NumSalle` (`NumSalle`),
  KEY `FK_formualire_NumeroBat` (`NumeroBat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Contenu de la table `formulaire`
--

INSERT INTO `formulaire` (`formulaireId`, `residentId`, `NumSalle`, `NumeroBat`, `Date_debut`, `Date_fin`, `Heure_Debut`, `Heure_fin`, `Heure_fin_reel`, `nombre_participant`, `Date_fin_reel`) VALUES
(33, 27, 1, 1, '2016-01-31', '2016-01-31', '20:00:00', '23:00:00', '23:00:00', 2, '2016-01-31');

--
-- Déclencheurs `formulaire`
--
DROP TRIGGER IF EXISTS `after_delete_formulaire`;
DELIMITER //
CREATE TRIGGER `after_delete_formulaire` AFTER DELETE ON `formulaire`
 FOR EACH ROW BEGIN

   
        UPDATE salle_de_travail
        set Disponible = 0
        where salle_de_travail.NumSalle = OLD.NumSalle
        and salle_de_travail.NumeroBat = OLD.NumeroBat;
    
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `after_update_formulaire`;
DELIMITER //
CREATE TRIGGER `after_update_formulaire` AFTER UPDATE ON `formulaire`
 FOR EACH ROW BEGIN

   IF  (New.Heure_fin_reel is NOT null and New.Date_fin_reel) 
 
      THEN
        UPDATE salle_de_travail
        set Disponible = 0
        where salle_de_travail.NumSalle = New.NumSalle
        and salle_de_travail.NumeroBat = New.NumeroBat;
    END IF;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `before_insert_formulaire`;
DELIMITER //
CREATE TRIGGER `before_insert_formulaire` BEFORE INSERT ON `formulaire`
 FOR EACH ROW BEGIN
    IF  ((SELECT  count(*) 
               FROM formulaire 
               where NEW.Numerobat = formulaire.Numerobat
               and NEW.NumSalle = formulaire.NumSalle
               and formulaire.Heure_fin_reel is NULL) >0)
 
      THEN
        INSERT INTO erreur  VALUES (Null,'Erreur : Salle occupee');
      ELSE BEGIN UPDATE  salle_de_travail
          SET Disponible= 1 
          where Numerobat = NEW.Numerobat
               and NumSalle = NEW.NumSalle ;
               END ;

    END IF;
    IF ( New.Numerobat = 2
    	  And (SELECT count(*)
    	  	   From  resident
    	  	   where New.residentId = resident.residentId
    	  	   AND resident.Numerobat !=2) >0)
    THEN
        INSERT INTO erreur  VALUES (Null,'Erreur : Batiment reserve');
    END IF;
    IF ( NEW.residentId IN (SELECT residentId
    	  	   From  formulaire
    	  	   where Heure_fin_reel is NULL
    	  	   ))
    	THEN
        INSERT INTO erreur  VALUES (Null,'Erreur : T as deja pris une salle de travail');
    END IF;
    IF ( (SELECT nombredeplace
    	  	   From  salle_de_travail
    	  	   where salle_de_travail.NumSalle = NEW.NumSalle
    	  	   And salle_de_travail.Numerobat = New.Numerobat
    	  	   ) < New.nombre_participant)
    	THEN
        INSERT INTO erreur  VALUES (Null,'Erreur : nombre de place insuffisant');
    END IF;
     IF ( NEW.Heure_Debut > NEW.Heure_fin)
        THEN
        INSERT INTO erreur  VALUES (Null,'Erreur :  heure debut inferieure a heure fin');
    END IF;
    IF ( NEW.Date_debut > NEW.Date_fin)
        THEN
        INSERT INTO erreur  VALUES (Null,'Erreur :  date debut inferieure a date fin');
    END IF;
 
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `resident`
--

CREATE TABLE IF NOT EXISTS `resident` (
  `residentId` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(25) NOT NULL,
  `Prenom` varchar(25) NOT NULL,
  `DatedeNaissance` date DEFAULT NULL,
  `NumeroBat` int(11) NOT NULL,
  `numeroChambre` int(3) DEFAULT NULL,
  `nationalite` varchar(25) DEFAULT NULL,
  `numeroDeTelephone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`residentId`),
  KEY `FK_Resident_NumeroBat` (`NumeroBat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Contenu de la table `resident`
--

INSERT INTO `resident` (`residentId`, `Nom`, `Prenom`, `DatedeNaissance`, `NumeroBat`, `numeroChambre`, `nationalite`, `numeroDeTelephone`) VALUES
(27, 'Naitssi', 'Yassine', '1995-12-11', 2, 43, 'Marocaine', '069696444'),
(34, 'Lukaku', 'PiÃ©rre', '1996-10-09', 2, 3, 'FranÃ§aise', '0678542135');

-- --------------------------------------------------------

--
-- Structure de la table `salle_de_travail`
--

CREATE TABLE IF NOT EXISTS `salle_de_travail` (
  `NumSalle` int(11) NOT NULL,
  `nombreDePlace` int(11) NOT NULL,
  `NumeroBat` int(11) NOT NULL,
  `Disponible` tinyint(1) NOT NULL,
  PRIMARY KEY (`NumSalle`,`NumeroBat`),
  KEY `FK_Salle_de_Travail_NumeroBat` (`NumeroBat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `salle_de_travail`
--

INSERT INTO `salle_de_travail` (`NumSalle`, `nombreDePlace`, `NumeroBat`, `Disponible`) VALUES
(1, 5, 1, 0),
(1, 5, 2, 0),
(1, 7, 3, 0),
(1, 6, 4, 0),
(1, 4, 5, 0),
(1, 4, 6, 0),
(3, 4, 1, 0),
(3, 3, 2, 0),
(3, 3, 3, 0),
(3, 2, 4, 0),
(3, 5, 5, 0),
(3, 7, 6, 0);

-- --------------------------------------------------------

--
-- Structure de la table `type_bat`
--

CREATE TABLE IF NOT EXISTS `type_bat` (
  `IdType` int(4) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(25) NOT NULL,
  PRIMARY KEY (`IdType`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `type_bat`
--

INSERT INTO `type_bat` (`IdType`, `libelle`) VALUES
(1, 'Renove');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `userid` int(20) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(20) NOT NULL,
  `motdepasse` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`userid`, `identifiant`, `motdepasse`) VALUES
(1, 'colombiere', '8b4c5d6f6294a7ddf276100528d1da44');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `batiment`
--
ALTER TABLE `batiment`
  ADD CONSTRAINT `FK_batiment_IdType` FOREIGN KEY (`IdType`) REFERENCES `type_bat` (`IdType`) ON DELETE CASCADE;

--
-- Contraintes pour la table `formulaire`
--
ALTER TABLE `formulaire`
  ADD CONSTRAINT `FK_formualire_NumeroBat` FOREIGN KEY (`NumeroBat`) REFERENCES `batiment` (`NumeroBat`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_formulaire_NumSalle` FOREIGN KEY (`NumSalle`) REFERENCES `salle_de_travail` (`NumSalle`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_formulaire_residentId` FOREIGN KEY (`residentId`) REFERENCES `resident` (`residentId`) ON DELETE CASCADE;

--
-- Contraintes pour la table `resident`
--
ALTER TABLE `resident`
  ADD CONSTRAINT `FK_Resident_NumeroBat` FOREIGN KEY (`NumeroBat`) REFERENCES `batiment` (`NumeroBat`) ON DELETE CASCADE;

--
-- Contraintes pour la table `salle_de_travail`
--
ALTER TABLE `salle_de_travail`
  ADD CONSTRAINT `FK_Salle_de_Travail_NumeroBat` FOREIGN KEY (`NumeroBat`) REFERENCES `batiment` (`NumeroBat`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
