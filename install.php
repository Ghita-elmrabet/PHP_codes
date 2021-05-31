<?php
$link = mysqli_connect('localhost', 'root', '');
mysqli_query($link,'CREATE DATABASE Clerimax');
$link=mysqli_connect('localhost', 'root', '','Clerimax');
mysqli_query($link,'CREATE TABLE `Amis` (
    `IDUSER1` int(11) NOT NULL,
    `IDUSER2` int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1');
mysqli_query($link, 'CREATE TABLE `Transactions` (
    `IDTRANSACTION` int(11) NOT NULL,
    `Description` text NOT NULL,
    `IDSOURCE` int(11) NOT NULL,
    `IDCIBLE` int(11) NOT NULL,
    `Montant` float NOT NULL,
    `DateOuverture` date NOT NULL,
    `Statut` varchar(65) NOT NULL,
    `DateFermeture` date NOT NULL,
    `MessageFermeture` text NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1');

mysqli_query($link,'CREATE TABLE `Utilisateurs` (
    `ID` int(11) NOT NULL,
    `Email` varchar(500) NOT NULL,
    `MotDePasse` text NOT NULL,
    `Prenom` text NOT NULL,
    `Nom` text NOT NULL,
    `DateDeNaissance` text NOT NULL,
    `Pseudo` varchar(500) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1');
mysqli_query($link,'ALTER TABLE `Transactions` CHANGE `DateFermeture` `DateFermeture` DATE NULL DEFAULT NULL');
mysqli_query($link,'ALTER TABLE `Transactions` CHANGE `MessageFermeture` `MessageFermeture` TEXT NULL DEFAULT NULL');
mysqli_query($link,'ALTER TABLE `Utilisateurs` ADD PRIMARY KEY(`ID`)');
mysqli_query($link,'ALTER TABLE `Utilisateurs` ADD UNIQUE(`Email`)');
mysqli_query($link,'ALTER TABLE `Utilisateurs` ADD UNIQUE(`Pseudo`)');
mysqli_query($link,'ALTER TABLE `Transactions` ADD PRIMARY KEY(`IDTRANSACTION`)');

mysqli_query($link,"INSERT INTO `Utilisateurs` (`ID`, `Email`, `MotDePasse`, `Prenom`, `Nom`, `DateDeNaissance`, `Pseudo`) VALUES
(1, 'tester1@gmail.com', 'mdp1', 'Tester1', 'Alpha', '2018-07-18', 'Test1'),
(2, 'tester2@gmail.com', 'mdp2', 'Tester2', 'Beta', '2001-05-09', 'Test2'),
(3, 'tester@gmail.com', 'mdp', 'Tester', 'Test', '2001-05-07', 'Test3')");

mysqli_query($link,'INSERT INTO `Amis` (`IDUSER1`, `IDUSER2`) VALUES
(1, 2),
(2, 1)');

mysqli_query($link,"INSERT INTO `Transactions` (`IDTRANSACTION`, `Description`, `IDSOURCE`, `IDCIBLE`, `Montant`, `DateOuverture`, `Statut`) VALUES
(1, 'Transaction1', 1, 2, 25, '2020-03-09', 'Ouvert'),
(2, 'Transaction2', 1, 2, 52, '2020-03-18', 'Ouvert'),
(3, 'Transaction3', 2, 1, 65, '2020-04-01', 'Ouvert')");

mysqli_query($link,"INSERT INTO `Transactions` (`IDTRANSACTION`, `Description`, `IDSOURCE`, `IDCIBLE`, `Montant`, `DateOuverture`, `Statut`,`DateFermeture`, `MessageFermeture`) VALUES
(4, 'Transaction4', 2, 1, 21, '2020-03-09', 'Remboursé','2020-04-20','TEST')");
header("Location: accueil.html");
?>
