-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 04 fév. 2026 à 16:35
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tom_troc`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `available` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `user_id`, `title`, `author`, `description`, `image`, `available`, `created_at`) VALUES
(1, 1, 'Esther', 'Alabaster', 'Un livre inspirant.', 'Esther.jpg', 1, '2026-01-16 11:03:26'),
(2, 2, 'The Kinfolk Table', 'Nathan Williams', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. \r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\r\n\'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 'The KinFolk Table.jpg', 1, '2026-01-16 11:03:26'),
(3, 2, 'Wabi Sabi', 'Beth Kempton', 'La sagesse japonaise.', 'Wabi Sabi.jpg', 1, '2026-01-16 11:03:26'),
(4, 3, 'Milk & honey', 'Rupi Kaur', 'Poésie contemporaine.', 'Milk & Honey.jpg', 1, '2026-01-16 11:03:26'),
(5, 4, 'Delight!', 'Justin Rossow', 'Aventures et joie.', 'Delight!.jpg', 0, '2026-01-16 11:03:26'),
(6, 5, 'Milwaukee Mission', 'Elder Cooper Low', 'Un récit captivant.', 'Milwaukee Mission.jpg', 1, '2026-01-16 11:03:26'),
(7, 6, 'Minimalist Graphics', 'Julia Schonlau', 'Dans son ouvrage novateur Minimalist Graphics, Maia Francisco propose une approche minimaliste et avant-gardiste du design graphique. Après son Sourcebook of Contemporary Graphic Design, salué par la critique, elle offre un regard éclairant sur les tendances et concepts les plus récents et les plus recherchés du secteur – une ressource efficace et indispensable pour le graphiste moderne.', 'Minimalist Graphics.jpg', 1, '2026-01-16 11:03:26'),
(8, 3, 'Hygge', 'Meik Wiking', 'Le bonheur à la danoise.', 'Hygge.jpg', 1, '2026-01-16 11:03:26'),
(9, 7, 'Innovation', 'Matt Ridley', 'L\'innovation expliquée.', 'Innovation.jpg', 1, '2026-01-16 11:03:26'),
(10, 8, 'Psalms', 'Alabaster', 'Textes sacrés et design.', 'Psalms.jpg', 1, '2026-01-16 11:03:26'),
(11, 9, 'Thinking, Fast & Slow', 'Daniel Kahneman', 'Système 1 et Système 2.', 'Thinking, fast and low.jpg', 0, '2026-01-16 11:03:26'),
(12, 10, 'A Book Full Of Hope', 'Rupi Kaur', 'Un livre plein d\'espoir.', 'A Book Full Of Hope.jpg', 1, '2026-01-16 11:03:26'),
(13, 11, 'The Subtle Art Of...', 'Mark Manson', 'L\'art de s\'en foutre.', 'The Subtle Art Of Not Giving Fuck.jpg', 1, '2026-01-16 11:03:26'),
(14, 12, 'Narnia', 'C.S Lewis', 'Les chroniques de Narnia.', 'Narnia.jpg', 0, '2026-01-16 11:03:26'),
(15, 13, 'Company Of One', 'Paul Jarvis', 'Rester petit.', 'Company Of One.jpg', 1, '2026-01-16 11:03:26'),
(16, 14, 'The Two Towers', 'J.R.R Tolkien', 'Le seigneur des anneaux 2.', 'The Two Towers.jpg', 1, '2026-01-16 11:03:26');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `is_read` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `content`, `created_at`, `is_read`) VALUES
(1, 2, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi.', '2026-01-30 13:18:23', 1),
(2, 14, 2, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-02-01 18:58:20', 1),
(3, 14, 8, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-02-01 23:17:04', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `image`, `created_at`) VALUES
(1, 'camille@test.com', '$2y$10$u5kC98ZSJmm1vCesiAYM4.PfDnEc/R8C6imgtBubEhF7Hm1ZatRZW', 'CamilleClubLit', NULL, '2026-01-16 11:03:26'),
(2, 'alex@test.com', '$2y$10$u5kC98ZSJmm1vCesiAYM4.PfDnEc/R8C6imgtBubEhF7Hm1ZatRZW', 'Alexlecture', 'Alexlecture.png', '2026-01-16 11:03:26'),
(3, 'hugo@test.com', '$2y$10$u5kC98ZSJmm1vCesiAYM4.PfDnEc/R8C6imgtBubEhF7Hm1ZatRZW', 'Hugo1990_12', NULL, '2026-01-16 11:03:26'),
(4, 'juju@test.com', '$2y$10$u5kC98ZSJmm1vCesiAYM4.PfDnEc/R8C6imgtBubEhF7Hm1ZatRZW', 'Juju1432', NULL, '2026-01-16 11:03:26'),
(5, 'christiane@test.com', '$2y$10$u5kC98ZSJmm1vCesiAYM4.PfDnEc/R8C6imgtBubEhF7Hm1ZatRZW', 'Christiane75014', NULL, '2026-01-16 11:03:26'),
(6, 'hamza@test.com', '$2y$10$u5kC98ZSJmm1vCesiAYM4.PfDnEc/R8C6imgtBubEhF7Hm1ZatRZW', 'Hamzalecture', NULL, '2026-01-16 11:03:26'),
(7, 'louben@test.com', '$2y$10$u5kC98ZSJmm1vCesiAYM4.PfDnEc/R8C6imgtBubEhF7Hm1ZatRZW', 'Lou&Ben50', NULL, '2026-01-16 11:03:26'),
(8, 'lolo@test.com', '$2y$10$u5kC98ZSJmm1vCesiAYM4.PfDnEc/R8C6imgtBubEhF7Hm1ZatRZW', 'Lolobzh', 'Lolobzh.png', '2026-01-16 11:03:26'),
(9, 'sas@test.com', '$2y$10$u5kC98ZSJmm1vCesiAYM4.PfDnEc/R8C6imgtBubEhF7Hm1ZatRZW', 'Sasi634', NULL, '2026-01-16 11:03:26'),
(10, 'ml95@test.com', '$2y$10$u5kC98ZSJmm1vCesiAYM4.PfDnEc/R8C6imgtBubEhF7Hm1ZatRZW', 'ML95', NULL, '2026-01-16 11:03:26'),
(11, 'vero@test.com', '$2y$10$u5kC98ZSJmm1vCesiAYM4.PfDnEc/R8C6imgtBubEhF7Hm1ZatRZW', 'Verogo33', NULL, '2026-01-16 11:03:26'),
(12, 'annika@test.com', '$2y$10$u5kC98ZSJmm1vCesiAYM4.PfDnEc/R8C6imgtBubEhF7Hm1ZatRZW', 'AnnikaBrahms', NULL, '2026-01-16 11:03:26'),
(13, 'victoire@test.com', '$2y$10$u5kC98ZSJmm1vCesiAYM4.PfDnEc/R8C6imgtBubEhF7Hm1ZatRZW', 'Victoirefabr912', NULL, '2026-01-16 11:03:26'),
(14, 'nath@test.com', '$2y$10$u5kC98ZSJmm1vCesiAYM4.PfDnEc/R8C6imgtBubEhF7Hm1ZatRZW', 'Nathalire', 'Nathalire.png', '2026-01-16 11:03:26'),
(17, 'toto@test.com', '$2y$10$u5kC98ZSJmm1vCesiAYM4.PfDnEc/R8C6imgtBubEhF7Hm1ZatRZW', 'toto', NULL, '2026-01-27 21:49:49'),
(18, 'admin@tomtroc.com', '$2y$10$QejSa8ULB60f3.7xQb0F6.xIm8/EvnlKx1SRp/n5AzVkkwhZSO1jq', 'admin', NULL, '2026-02-04 16:15:17');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
