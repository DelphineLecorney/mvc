-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 29 juin 2023 à 08:51
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `publish_date`, `image_url`, `author`) VALUES
(1, 'Excuses', 'Parents must sometimes write notes to excuse their child out of specific school activities.\r\n\r\n> * In an \"excuse.php\" file, create an \"apology generator\" to make life easier for parents of children in primary school.', '2023-06-28 10:00:00', 'https://raw.githubusercontent.com/DelphineLecorney/Excuses-PHP/main/assets/pictures/ScreenExcuses.JPG', 'Lecorney Delphine'),
(2, 'Whack-A-Mole', 'The goal of this traditional game is to prevent \"moles\" from coming out the ground with a hammer. Every second a new \"mole\" appears and you\'ll have to click on it to gently tell her to go back into the soil where it belongs.', '2023-06-29 14:30:00', 'https://raw.githubusercontent.com/DelphineLecorney/Whack-A-Mole/main/assets/pictures/CaptureWahck-A-Mole.jpg', 'Lecorney Delphine'),
(3, 'Article 3', 'Description of Article 3', '2023-06-30 09:15:00', 'https://media.istockphoto.com/id/511366776/fr/photo/manchot-papou-se-dandinant-le-long-dune-plage-de-sable-blanc.jpg?s=1024x1024&w=is&k=20&c=e7PMld252lZOidGoy3qC9yXytAKMbgebLhVm-AVrUng=', 'Dupuis dupuis');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
