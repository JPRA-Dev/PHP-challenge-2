-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 02 sep. 2021 à 10:32
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cogip`
--

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `vatnumber` varchar(11) NOT NULL,
  `company_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `company`
--

INSERT INTO `company` (`id`, `name`, `country`, `vatnumber`, `company_type_id`) VALUES
(9, 'Raviga', 'United States', 'US456654342', 1),
(10, 'Dunder Mifflin', 'United States', 'US678765765', 1),
(11, 'Jouets Jean-Michel', 'France', 'FR677544000', 1),
(12, 'Bob Vance Refrig.', 'United States', 'US456654687', 1),
(13, 'Belgalol', 'Belgique', 'BE087665466', 2),
(14, 'Pierre Cailloux', 'France', 'FR678908654', 2),
(15, 'Proximdr', 'Belgique', 'BE087698566', 2),
(16, 'ElectricPower', 'Italie', 'IT256852542', 2);

-- --------------------------------------------------------

--
-- Structure de la table `company_type`
--

CREATE TABLE `company_type` (
  `company_type_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `company_type`
--

INSERT INTO `company_type` (`company_type_id`, `type`) VALUES
(1, 'Client'),
(2, 'Supplier');

-- --------------------------------------------------------

--
-- Structure de la table `contact_person`
--

CREATE TABLE `contact_person` (
  `contact_person_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL,
  `telephone` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact_person`
--

INSERT INTO `contact_person` (`contact_person_id`, `firstname`, `lastname`, `email`, `company_id`, `telephone`) VALUES
(4, 'Peter', 'Gregory', 'peter.gregory@raviga.com', 9, '5554567'),
(5, 'Dwight', 'Schrute', 'dwight.schrute@ddmfl.com', 10, '5559859'),
(6, 'Kelly', 'Kapoor', 'kelly.kapoor@ddmfl.com', 10, '5559858'),
(7, 'Creed', 'Bratton', 'creed.bratton@bobvance.com', 12, '5559856'),
(9, 'Cameron', 'Howe', 'cam.howe@proximdr.com', 15, '5557896'),
(10, 'Gavin', 'Belson', 'gavin@elecpow.com', 16, '5554213'),
(12, 'Meredith', 'Palmer', 'meredith.palmer@jouetsjm.fr', 11, '6856974'),
(13, 'Jian', 'Yang', 'jian.yang@pierrecailloux.be', 14, '5554567'),
(14, 'Bertram', 'Gilfoyle', 'gilfoyle@belgalol.be', 13, '5550987');

-- --------------------------------------------------------

--
-- Structure de la table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` int(11) NOT NULL,
  `nbrinvoice` varchar(255) NOT NULL,
  `dateinvoice` datetime NOT NULL,
  `company_id` int(11) NOT NULL,
  `contact_person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `nbrinvoice`, `dateinvoice`, `company_id`, `contact_person_id`) VALUES
(4, 'F20190403-654', '2019-04-03 00:00:00', 9, 4),
(5, 'F20190404004', '2019-04-04 00:00:00', 11, 12),
(6, 'F20190404003', '2019-04-04 00:00:00', 10, 5),
(7, 'F20180414008', '2018-04-14 00:00:00', 10, 6),
(8, 'F20170404002', '2017-04-04 00:00:00', 10, 6),
(9, 'F20180310052', '2018-03-10 00:00:00', 10, 5),
(10, 'F20200404002', '2020-04-04 00:00:00', 14, 13),
(11, 'F20190404001', '2019-04-04 00:00:00', 15, 9),
(12, 'F20190404005', '2019-04-04 00:00:00', 13, 14),
(13, 'F20190404006', '2019-04-04 00:00:00', 16, 10),
(14, 'F20200404007', '2020-04-04 00:00:00', 12, 7);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `username`, `pwd`, `group`) VALUES
(1, 'Jean-Christian', 'Ranu', 'ranu.jeanchristian@cogip.com', 'Jean-Christian', '$2y$10$tUmHrwgxnDfdoNeWBaPAce0Il3tYDEqfOlGy6Sw3VfWzXh2rdhRQq', 1),
(2, 'Muriel', 'Perrache', 'perrache.muriel@cogip.com', 'muriel', '243279243130246A7649594655767849564B7A466D646E6D2F5955684F4857514973413935544C494F4C6854734F35794C473234724A65626A2F672E', 2);

-- --------------------------------------------------------

--
-- Structure de la table `users_group`
--

CREATE TABLE `users_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `permissions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users_group`
--

INSERT INTO `users_group` (`id`, `name`, `permissions`) VALUES
(1, 'Admin', '{\"admin\":true}'),
(2, 'Moderator', '{\"moderator\":true}');

-- --------------------------------------------------------

--
-- Structure de la table `users_session`
--

CREATE TABLE `users_session` (
  `id` int(11) NOT NULL,
  `users_Id` int(11) NOT NULL,
  `hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `company_type`
--
ALTER TABLE `company_type`
  ADD PRIMARY KEY (`company_type_id`);

--
-- Index pour la table `contact_person`
--
ALTER TABLE `contact_person`
  ADD PRIMARY KEY (`contact_person_id`);

--
-- Index pour la table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_group`
--
ALTER TABLE `users_group`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_session`
--
ALTER TABLE `users_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `company_type`
--
ALTER TABLE `company_type`
  MODIFY `company_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `contact_person`
--
ALTER TABLE `contact_person`
  MODIFY `contact_person_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users_group`
--
ALTER TABLE `users_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users_session`
--
ALTER TABLE `users_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
