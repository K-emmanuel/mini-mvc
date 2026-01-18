-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 18 jan. 2026 à 14:22
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
-- Base de données : `mini_mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_produit`) VALUES
(9, 3, 3),
(20, 6, 3),
(21, 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `titre`, `prix`, `image`) VALUES
(1, 'Pop Mart × PRONOUNCE Labubu WINGS OF FANTASY Vinyl Plush Doll \'Purple\'', 1298, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/111/614/088/original/1647237_00.png.png?action=crop&width=750'),
(2, 'Pop Mart Labubu THE MONSTERS Big into Energy Series-ROCK THE UNIVERSE Vinyl Plush Doll \'Multicolor\'', 1500, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/112/616/457/original/1670337_00.png.png?action=crop&width=750'),
(3, 'Pop Mart Labubu THE MONSTERS FLIP WITH ME Vinyl Plush Doll \'Cream\'', 1920, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/111/614/000/original/1647198_00.png.png?action=crop&width=750'),
(4, 'Pop Mart Labubu Time to Chill Vinyl Plush Doll \'Tan\'', 1450, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/111/614/067/original/1647227_00.png.png?action=crop&width=750'),
(5, 'Pop Mart Labubu THE MONSTERS FALL IN WILD SERIES Vinyl Plush Doll Pendant \'Grey\'', 1270, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/111/614/026/original/1647213_00.png.png?action=crop&width=750'),
(6, 'Pop Mart Labubu THE MONSTERS Let\'s Checkmate Series Vinyl Plush Doll \'Brown\'', 1370, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/112/563/398/original/1668738_00.png.png?action=crop&width=750');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `email`, `password`) VALUES
(1, 'Hugo', 'hugo@gmail.com', '$2y$10$BmgAd7L0HfL5Ro4ls3zK1ekVxox.Ud8V4nYNhukkLKFibJhvW0c5a'),
(2, 'Bidoof', 'bidoof@gmail.com', '$2y$10$TOO3IFMsCx9I65m7uubdj.rT7loJ31IEB8m6FC3/7pB4NfRRgSs3O'),
(3, 'Adolf', 'Adolf@gmail.com', '$2y$10$ulwgL3GabEpTN5bho4p5zu4VO3opLUq3If6/02TyfCM4boWKfJpM2'),
(4, 'Oxy', 'oxy@gmail.com', '$2y$10$F7VqmVrJB31XrrNv5exFe.UbFd1fYTmVk39EYUw.wYQb35/BpoCf.'),
(5, 'adolf', 'adolf1945@gmail.com', '$2y$10$ay0/sOpI4K6yEJk/yg/gv.ja8jubdEE9s8qH/5UOKxik5mgRkWnO.'),
(6, 'adolf123@gmail.com', 'adolf123@gmail.com', '$2y$10$Wg4wpJ7lzFTDT5q3zpnNSelTZ80lVrNSyFh6mYo65qhxOXYbWz/g6');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_user` (`id_user`),
  ADD KEY `fk_cart_produit` (`id_produit`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_produit` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cart_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
