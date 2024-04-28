-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 15 avr. 2024 à 09:23
-- Version du serveur :  10.6.17-MariaDB
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gretaxao_poissonna`
--
CREATE DATABASE IF NOT EXISTS `gretaxao_poissonna` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gretaxao_poissonna`;

-- --------------------------------------------------------

--
-- Structure de la table `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `dateL` date DEFAULT NULL,
  `content` text DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `album`
--

INSERT INTO `album` (`id_album`, `title`, `dateL`, `content`, `picture`) VALUES
(1, 'La Magicienne trahie-Tome 1', '1977-02-03', 'Dès le début de l&#039;histoire, Thorgal Aegirson est en mauvaise posture : il est enchaîné à un rocher et est condamné à mourir, noyé par la marée montante. Son crime est d&#039;avoir osé aimer Aaricia, la fille du roi des Vikings du Nord, lui, le bâtard né d&#039;on ne sait qui et on ne sait où. ', 'asset/upload/660d213509256.jpg'),
(2, ' L&#039;Île des mers gelées-Tome 2', '1979-08-24', 'A quelques heures de son mariage, enfin accepté par la communauté viking, Aaricia est enlevée par trois aigles pour le compte d&#039;un mystérieux cavalier.', 'asset/upload/660e6ad48009d.jpg'),
(3, 'Les trois vieillards du Pays d’Aran', '1987-08-11', 'Accueillis au pays d’Aran par le nain Jadawin, Thorgal et Aaricia rencontrent un peuple misérable et fanatique. Quels secrets se cachent derrière les murs de la forteresse des maîtres du pays d’Aran ?', 'asset/upload/66192962a4013.jpg'),
(4, 'La Galère noire-Tome 4', '1982-05-12', ' Une naissance est attendue au foyer de Thorgal et Aaricia. Le valeureux viking n&#039;en fascine pas moins d&#039;autres femmes. L&#039;une d&#039;elles a juré sa .', 'asset/upload/660d24c1894cd.jpg'),
(5, 'Au-delà des ombres-Tome 5', '1996-06-03', 'Aaricia en a assez de la vie d&#039;errance que son époux lui fait mener. Jolan et Louve aimeraient aussi vivre comme tous les adolescents de leur âge. Plus rien ne s&#039;oppose à leur retour au pays des Vikings.', 'asset/upload/660d254fd248f.jpg'),
(6, 'La chute de Brek Zarith-tome 6', '1987-06-06', 'Shardar le puissant, maître de Brek Zarith, ne craint ni les traîtres de sa cour, ni l’héritier légitime de son trône, ni les puissants Vikings. Mais un homme seul, au visage balafré, pourrait mettre fin à son règne.', 'asset/upload/6617de70bc919.jpg'),
(7, 'L’enfant des étoiles-tome 7', '1984-09-06', 'Pris au cœur d’une tempête, un drakkar viking tente désespérément de rejoindre la côte. A son bord, les derniers survivants d’une expédition désastreuse s’épuisent en combattant les flots déchaînés. Pourtant, leur salut viendra bien de la mer, et d’une rencontre qui va changer leur destin.', 'asset/upload/6617df5f6a574.jpg'),
(8, 'Alinoë- tome 8', '1989-05-14', 'Les Aegirsson ont trouvé refuge dans une île isolée. En l’absence de Thorgal, Jolan et sa mère rencontrent un étrange enfant muet. Et le refuge devient un piège mortel…', 'asset/upload/661b9dabd6d08.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

CREATE TABLE `author` (
  `id_author` int(11) NOT NULL,
  `fonction` varchar(1500) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `biography` varchar(2550) NOT NULL,
  `picture` varchar(2550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `author`
--

INSERT INTO `author` (`id_author`, `fonction`, `name`, `first_name`, `biography`, `picture`) VALUES
(1, 'Dessinateur', 'Grzegorz', 'Rosiński ', 'Né en 1941, Grzegorz Rosiński étudie à l&#039;Académie des beaux-arts de Varsovie.\r\n\r\nDessinateur, il devient aussi le directeur artistique de Relax, le premier magazine BD polonais1. En 1977, il publie sa première planche de Thorgal dans Le Journal de Tintin, sur un scénario de Jean Van Hamme1. La série connaît un franc succès1,2 et fait l&#039;objet d&#039;une publication en albums chez Le Lombard.\r\n\r\n    « Thorgal, c’est un mélange d’heroic fantasy, de science-fiction, de mythologie scandinave et de soap façon La Petite Maison dans la prairie. Aucun éditeur n’accepterait ça aujourd’hui »\r\n\r\n… fait remarquer, amusé, un autre dessinateur, Robin Recht, qui a imaginé et publié presque un demi-siècle plus tard en 2023, chez le même éditeur, les aventures de ce héros, Thorgal, âgé de soixante-dix ans, dans une série intitulée Thorgal Saga2. ', 'asset/authors/660ef1854c641.jpg'),
(2, 'Romancier', 'Van Hamme', 'Jean ', 'Jean Van Hamme naît le 16 janvier 1939 à Bruxelles. Il est fils unique et il perd sa mère à l&#039;âge de 2 ans. Il décrit une enfance et une adolescence solitaires.\r\n\r\nIl devient scout au Groupe Honneur dans sa jeunesse. Il effectue ses études secondaires à l&#039;Athénée royal d&#039;Uccle 1 puis poursuit des études supérieures à Bruxelles, est diplômé ingénieur commercial de l&#039;École de commerce Solvay, agrégé d&#039;économie politique (des connaissances qu&#039;il utilise notamment pour Largo Winch). Chaque été, il se métamorphose en routard3, un sac sur le dos et le pouce en l&#039;air. « J&#039;ai parcouru quelque 30 000 km en stop3,4, en Europe, aux États-Unis, en Afrique. J&#039;ai été en Norvège, en Suède, en Turquie, en Écosse et en Espagne. Partir de Bruxelles jusqu&#039;en Angola a aussi été un grand voyage ». En 2014, il a parcouru 119 pays3', 'asset/authors/660ef211de639.jpg'),
(12, 'Scénariste', 'Dorison', 'Xavier', 'Xavier Dorison est né en 1972. Après trois années passées dans une école de commerce – durant lesquelles il lance le festival BD des grandes écoles –, il commence en 1997 l’écriture du scénario du premier tome du Troisième testament, série dessinée par Alex Alice chez Glénat.\r\n\r\nPar la suite, il travaille avec Mathieu Lauffray sur le premier tome de la série Prophet (Les Humanoïdes associés, 2000), puis l’année suivante avec Christophe Bec sur la série Sanctuaire, pour le même éditeur. En peu de temps, Xavier Dorison se taille une place de choix dans la bande dessinée. Il confirme cela chez Dargaud avec W.E.S.T., série qu’il coscénarise avec Fabien Nury, pour le dessinateur Christian Rossi.', 'asset/authors/6617dd8be3bd4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `characters`
--

CREATE TABLE `characters` (
  `id_char` int(11) NOT NULL,
  `id_extern` int(11) DEFAULT NULL,
  `name` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `characters`
--

INSERT INTO `characters` (`id_char`, `id_extern`, `name`) VALUES
(1, 99663, 'aaricia'),
(2, 118262, 'jolan'),
(3, 105857, 'Kris-de valnor'),
(4, 52068, 'Thorgal'),
(5, 86529, 'jorund'),
(6, 146362, 'Gandal-the-mad'),
(7, 146372, 'Key-guardian'),
(8, 162156, 'shaniah'),
(9, 117789, 'Louve'),
(10, 25731, 'nidhorgg'),
(11, 7197, 'frigga'),
(12, 118263, 'aniel');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id_com` int(11) NOT NULL,
  `content` varchar(2500) NOT NULL,
  `dateC` date DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL,
  `id_album` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id_com`, `content`, `dateC`, `id_user`, `id_album`) VALUES
(21, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem.', '2024-04-05', 62, 2),
(28, 'Thorgal est une véritable épopée nordique qui mêle action, mystère et mythologie avec brio. Les illustrations sont magnifiques et les personnages sont si bien développés qu&#039;on ne peut s&#039;empêcher de s&#039;attacher à eux', '2024-04-06', 74, 5),
(29, 'Thorgal est une série de bande dessinée d&#039;aventure épique qui m&#039;a captivé dès le premier tome. Les illustrations magnifiques et l&#039;intrigue captivante m&#039;ont transporté dans un univers fantastique où se mêlent mythologie nordique, science-fiction et mystères.', '2024-04-06', 62, 4),
(106, 'Ce site dédié à Thorgal est une véritable mine d&#039;informations pour les fans de la série. De la présentation des différents albums aux analyses approfondies des personnages et des intrigues, en passant par les dernières actualités et les discussions animées sur le forum, il offre un espace d&#039;échange et de découverte pour tous les passionnés', '2024-04-08', 62, NULL),
(109, 'En tant que fan de longue date de Thorgal, je suis reconnaissant envers toute l&#039;équipe qui travaille à maintenir ce site vivant et dynamique. C&#039;est un véritable hommage à une série qui a marqué des générations de lecteurs, et je suis heureux de pouvoir y contribuer à ma manière en partageant mes réflexions et mes découvertes avec la communauté', '2024-04-08', 73, NULL),
(129, 'J&#039;adore! ', '2024-04-08', 73, NULL),
(133, 'Très intéressant ce site!!! ', '2024-04-14', 76, NULL),
(134, 'Wouah!!! super', '2024-04-14', 76, 2);

-- --------------------------------------------------------

--
-- Structure de la table `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `rating_value` int(11) DEFAULT 0,
  `rating_date` date DEFAULT current_timestamp(),
  `id_user` int(11) DEFAULT NULL,
  `id_album` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rating`
--

INSERT INTO `rating` (`id_rating`, `rating_value`, `rating_date`, `id_user`, `id_album`) VALUES
(23, 4, '2024-04-06', 62, 4),
(38, 5, '2024-04-06', 62, 2),
(41, 3, '2024-04-06', 1, 2),
(42, 5, '2024-04-06', 62, 1),
(43, 4, '2024-04-06', 73, 1),
(44, 2, '2024-04-06', 74, 2),
(45, 5, '2024-04-06', 74, 5),
(46, 5, '2024-04-06', 62, 4),
(92, 5, '2024-04-14', 62, 7),
(93, 5, '2024-04-14', 76, 2);

-- --------------------------------------------------------

--
-- Structure de la table `see`
--

CREATE TABLE `see` (
  `id_album` int(11) NOT NULL,
  `id_char` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `see`
--

INSERT INTO `see` (`id_album`, `id_char`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 9),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(3, 1),
(3, 4),
(3, 7),
(4, 1),
(4, 4),
(4, 5),
(4, 7),
(4, 8),
(5, 1),
(5, 4),
(5, 7),
(5, 8),
(6, 1),
(6, 4),
(6, 5),
(7, 4),
(7, 6),
(7, 9),
(7, 10),
(7, 11),
(8, 3),
(8, 4),
(8, 11);

-- --------------------------------------------------------

--
-- Structure de la table `useru`
--

CREATE TABLE `useru` (
  `id_user` int(11) NOT NULL,
  `username` varchar(70) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `role` tinyint(1) DEFAULT 2,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `useru`
--

INSERT INTO `useru` (`id_user`, `username`, `email`, `password`, `name`, `first_name`, `role`, `picture`) VALUES
(1, 'zote', 'nadinepoisson000@gmail.com', '$2y$10$.T9vx2tXfQe72fjakrkg7OQd92RXzLDN6l.m4isoGi4aXn3s5oF9q', 'Poisson', 'nadine', 1, 'asset/avatars/cactus-576482_640.png'),
(62, 'lili', 'lea@gmail.com', '$2y$10$5fkIaDOz1SBXRhbGMEbFC.OJc1f.mAfM6tIEFtZiWJ2s4.SoqGLvy', 'lea', 'lea', 2, 'asset/avatars/jean-michel_avatar-470x557.png'),
(73, 'ymir', 'ymir@gmail.com', '$2y$10$WSTyfcDwM8krO6v6KfG7NueLFIk6YIeyKCnAHVEwefa183qqS8xqq', 'mir', 'judith', 2, 'asset/avatars/kriss.PNG'),
(74, 'kriss', 'kay@gmail.com', '$2y$10$Pvld2rKzMe9YrqFlzoMlcOKM.YfTjUF8KQjlQdK/HA9uveXWKR6Xq', 'kay', 'kay', 2, 'asset/avatars/louve.PNG'),
(75, 'TiBoued', 'thierry.bouedo@free.bzh', '$2y$10$djEYoLDXVodvoKWM0Fg84.d2b47Tu8xN/iDG/2Za19AH0BHndurvK', NULL, NULL, 2, NULL),
(76, 'mcl56', 'mc-lorin@wanadoo.fr', '$2y$10$k9SWgPvB5Dmz5CscnZE8u.kIeDo7I2GY//IjksTUq52BNOA85.1Yy', 'lesage', 'Marie-christine', 2, 'asset/avatars/fraiseicone.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Index pour la table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id_author`);

--
-- Index pour la table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id_char`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_album` (`id_album`);

--
-- Index pour la table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_album` (`id_album`);

--
-- Index pour la table `see`
--
ALTER TABLE `see`
  ADD PRIMARY KEY (`id_album`,`id_char`),
  ADD KEY `see_ibfk_2` (`id_char`);

--
-- Index pour la table `useru`
--
ALTER TABLE `useru`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `author`
--
ALTER TABLE `author`
  MODIFY `id_author` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT pour la table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT pour la table `useru`
--
ALTER TABLE `useru`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `useru` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_album`) REFERENCES `album` (`id_album`) ON DELETE CASCADE;

--
-- Contraintes pour la table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `useru` (`id_user`) ON DELETE SET NULL,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`id_album`) REFERENCES `album` (`id_album`) ON DELETE CASCADE;

--
-- Contraintes pour la table `see`
--
ALTER TABLE `see`
  ADD CONSTRAINT `see_ibfk_1` FOREIGN KEY (`id_album`) REFERENCES `album` (`id_album`) ON DELETE CASCADE,
  ADD CONSTRAINT `see_ibfk_2` FOREIGN KEY (`id_char`) REFERENCES `characters` (`id_char`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
