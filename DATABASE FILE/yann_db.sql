-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 19 jan. 2024 à 08:43
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `yann_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_creation` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `image`, `content`, `date_creation`, `user_id`) VALUES
(1, '65a98fcfd1ef5653b8b989d64377.jpg', 'contenu de test a la con', '2024-01-18 21:53:35', 1),
(2, '65aa08c907588yannik.pdf', '<p>structure du site web</p>', '2024-01-19 06:29:45', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_departements`
--

CREATE TABLE `tbl_departements` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_departements`
--

INSERT INTO `tbl_departements` (`id`, `name`) VALUES
(1, 'Genie informatiques'),
(2, 'geologie');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_facultes`
--

CREATE TABLE `tbl_facultes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_facultes`
--

INSERT INTO `tbl_facultes` (`id`, `name`) VALUES
(1, 'Droit'),
(2, 'Sciences economiques');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_fonctions`
--

CREATE TABLE `tbl_fonctions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_fonctions`
--

INSERT INTO `tbl_fonctions` (`id`, `name`) VALUES
(1, 'Enseignant '),
(2, 'Etudiant');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_promotions`
--

CREATE TABLE `tbl_promotions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_promotions`
--

INSERT INTO `tbl_promotions` (`id`, `name`) VALUES
(1, 'L2/LMD'),
(2, 'L1/LMD');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `id_fonction` int(11) NOT NULL,
  `id_faculte` int(11) NOT NULL,
  `id_departement` int(11) NOT NULL,
  `id_promotion` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `id_fonction`, `id_faculte`, `id_departement`, `id_promotion`, `password`, `date_creation`) VALUES
(1, 'gaspard ', 'Kirira', 1, 1, 1, 1, '$2y$10$E.9yMoKVS3W0sCnOhNe2NeN1mb9zunSJRihMjrM1QQijKlhbqx08G', '2024-01-18 20:28:19'),
(2, 'gaspard ', 'Kirira', 1, 1, 1, 1, '$2y$10$T.hn4iLDFpTnKBhVKYyrF.GzWvjPniN0h1S4NxbUYWIhg1Ahp/DJe', '2024-01-18 20:28:57'),
(3, 'gaspard ', 'Kirira', 1, 1, 1, 1, '$2y$10$KddWLdxrcZWcJv4yfn92RuUV862oetku6VuBJtg0RFBvUDKB3gbZC', '2024-01-18 20:30:10');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_departements`
--
ALTER TABLE `tbl_departements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_facultes`
--
ALTER TABLE `tbl_facultes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_fonctions`
--
ALTER TABLE `tbl_fonctions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_promotions`
--
ALTER TABLE `tbl_promotions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tbl_departements`
--
ALTER TABLE `tbl_departements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tbl_facultes`
--
ALTER TABLE `tbl_facultes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tbl_fonctions`
--
ALTER TABLE `tbl_fonctions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tbl_promotions`
--
ALTER TABLE `tbl_promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
