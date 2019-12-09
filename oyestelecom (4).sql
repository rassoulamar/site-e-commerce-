-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mar. 15 oct. 2019 à 22:26
-- Version du serveur :  10.3.15-MariaDB
-- Version de PHP :  7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `oyestelecom`
--

-- --------------------------------------------------------

--
-- Structure de la table `adress_billing`
--

CREATE TABLE `adress_billing` (
  `id` int(11) NOT NULL,
  `street` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `adress_billing`
--

INSERT INTO `adress_billing` (`id`, `street`, `ville_id`) VALUES
(1, '34 rue des connard', 1),
(2, '17 rue passy', 10),
(3, 'XXXX', 12);

-- --------------------------------------------------------

--
-- Structure de la table `adress_delivery`
--

CREATE TABLE `adress_delivery` (
  `id` int(11) NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `adress_delivery`
--

INSERT INTO `adress_delivery` (`id`, `street`, `ville_id`) VALUES
(1, '19 rue passy', 1),
(2, '12', 2),
(3, '39 Rue des Poissonniers', 3),
(4, '12 rues des entrepots', 4),
(5, '12 rues des entrepots', 5),
(6, '12 rues des entrepots', 6),
(7, '39 Rue des Poissonniers', 7),
(8, 'Avron', 8),
(9, '39 Rue des Poissonniers', 9),
(10, '39 Rue des Poissonniers', 11),
(11, 'XXXX', 12);

-- --------------------------------------------------------

--
-- Structure de la table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Huawei'),
(4, 'Xiaomi'),
(5, 'Sony'),
(6, 'Htc'),
(7, 'OnePlus'),
(8, 'LG'),
(9, 'Google'),
(10, 'Nokia'),
(11, 'Wiko'),
(12, 'Asus'),
(13, 'Acer'),
(14, 'Microsoft'),
(15, 'Hp'),
(16, 'Dell'),
(17, 'Lenovo'),
(18, 'Toshiba'),
(19, 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `name`, `slug`, `image_id`, `description`) VALUES
(1, 'Smartphone', 'smartphone', 93, 'Découvrez tous nos produits: Smartphone au prix imbattable !! Smartphone neufs, occasions ou reconditionné , commandez sur notre site et choisissez le retrait en magasin ou le mode de livraison qui vous convient'),
(2, 'Tablette', 'tablette', 94, 'Découvrez tous nos produits: Tablette ou ipad  au prix imbattable !! tablettes neuves, occasions ou reconditionnées , commandez toute suite sur notre site et choisissez le retrait en magasin  en 1h ou le mode de livraison qui vous convient'),
(3, 'Laptop', 'laptop', 95, 'Découvrez tous nos produits: laptop au prix imbattable !! laptop neufs, occasions ou reconditionnés , commandez toute suite sur notre site et choisissez le retrait en magasin  en 1h ou le mode de livraison qui vous convient'),
(4, 'Accessoires', 'accessoires', 96, 'Vous avez besoin d\'accessoires pour votre téléphone ? consulter notre catalogue avec plus 10000 accessoires disponible sur notre site'),
(5, 'Pièces détachées', 'pieces-detachees', 97, 'Vous avez cassé votre smartphone , tablette ou ordinateur? vous êtes bricoleur et vous voulez tentez de le réparer vous même mais vous avez pas les pièces , vous êtes au bon endroit'),
(6, 'Réparation', 'reparation', 98, 'Vous avez cassé votre smartphone , tablette ou ordinateur?  Pas de panique !! on vous fera un devis gratuit , et on s\'occupera de votre téléphone en heure et vous récupérer votre bijou en heure'),
(9, 'Autres', 'autres', 99, 'vous avez besoin de vous lancer dans réparation , on tout le matériel qui vous faut pour ca');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `delivery_method_id` int(11) DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `command_stat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commande_stat`
--

CREATE TABLE `commande_stat` (
  `id` int(11) NOT NULL,
  `stat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'France'),
(2, 'France'),
(3, 'France'),
(4, 'france'),
(5, 'France'),
(6, 'France'),
(7, 'France'),
(8, 'france'),
(9, 'France'),
(10, 'France'),
(11, 'France'),
(12, 'FR');

-- --------------------------------------------------------

--
-- Structure de la table `delivery_method`
--

CREATE TABLE `delivery_method` (
  `id` int(11) NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `path`, `updated_at`) VALUES
(29, 'iphone6.jpeg', '2019-09-27 11:20:48'),
(31, 'apple_iphone_5s.jpg', '2019-09-28 00:23:56'),
(32, 'iphone 6.png', '2019-09-28 00:25:00'),
(33, 'galaxyS5.png', '2019-09-28 00:26:07'),
(34, 'galaxyS6.png', '2019-09-28 00:27:35'),
(35, 'huawei p20 pro.png', '2019-09-28 00:29:04'),
(36, 'iphone 7.png', '2019-09-28 00:29:47'),
(37, 'iphone xs max.png', '2019-09-28 00:30:50'),
(38, 'galaxy-s10.jpg', '2019-09-28 00:31:57'),
(39, 'huawei-mate-10-pro.jpg', '2019-09-28 00:35:00'),
(40, 'huawei-honor-8-4g-32.jpg', '2019-09-28 00:35:39'),
(41, 'huawei p20 pro.png', '2019-09-28 00:36:37'),
(42, 'xiaomi-mi-mix-2s.jpg', '2019-09-28 00:38:41'),
(43, 'xiaomi note 6 pro.jpg', '2019-09-28 00:40:19'),
(44, 'ipad 3.jpg', '2019-09-28 00:41:26'),
(45, 'ipad 4.png', '2019-09-28 00:42:10'),
(46, 'samsung tab S4.jpeg', '2019-09-28 00:43:08'),
(47, 'samsung_gal_tab_4_10.jpg', '2019-09-28 00:44:40'),
(48, 'ipad 5.png', '2019-09-28 00:46:00'),
(49, 'ipad6.png', '2019-09-28 00:46:42'),
(50, 'ipad pro 1.png', '2019-09-28 00:47:58'),
(51, 'ipad pro 2.png', '2019-09-28 00:48:29'),
(52, 'macbook-pro-2015.jpg', '2019-09-28 02:43:21'),
(53, 'htc-u12-life.jpg', '2019-09-28 02:47:00'),
(54, '612Igpx7m1L._SX466_.jpg', '2019-09-28 02:48:01'),
(55, 'nappe-dock-connecteur-de-charge-iphone-6-plus.jpg', '2019-09-28 02:50:54'),
(56, 'ecran-casse-iphone-7.jpg', '2019-09-28 02:52:41'),
(57, 'kada-station a souder.jpg', '2019-09-28 02:55:43'),
(58, 'reparation-ecran-sony-xperia-z3-compact.jpg', '2019-09-28 15:47:48'),
(59, 'broken-screen-blog_2018-08-13-12-48-54_cache.jpg', '2019-09-28 15:48:50'),
(60, 'reparation-ecran-mbook-retina-13-15-512x257.jpg', '2019-09-28 16:03:10'),
(61, 'digitizer-lcd-lg-g-pad-83--0.jpg', '2019-09-28 16:12:10'),
(62, 'lgnexus 5 cartemere .jpg', '2019-09-28 16:16:18'),
(63, 'dock-de-charge-connecteur-usb-pour-wiko-view-2.jpg', '2019-09-28 16:20:00'),
(64, 'pantalla-nokia_6_dual.jpg', '2019-09-28 16:22:15'),
(65, 'fer-a-souder-50w-p-image-186305-grande.jpg', '2019-09-28 19:34:43'),
(66, 'fil de soudure .jpg', '2019-09-28 19:36:31'),
(67, 'pateadouder.jpg', '2019-09-28 19:37:29'),
(68, 'colle ecran smartphone.jpg', '2019-09-28 19:38:32'),
(69, 'machine desoxydation ultra sonic.jpg', '2019-09-28 19:40:34'),
(70, 'Kit-d-outils-complet-reparation-tournevis-spatules-smartphone-et-tablette.jpg', '2019-09-28 19:43:27'),
(71, 'lcd screen separateur.jpg', '2019-09-28 19:54:10'),
(72, 'chargeur micro usb android.jpg', '2019-09-29 11:15:06'),
(73, 'coque ipad .jpg', '2019-09-29 11:16:38'),
(74, 'vitre protection galaxy s10.jpg', '2019-09-29 11:18:46'),
(75, 'Casque-JBL-E45-Bluetooth-Noir.jpg', '2019-09-29 11:20:41'),
(76, 'mophie-wireless-charging-base_d72a949908caf768__450_400.jpg', '2019-09-29 11:22:39'),
(77, 'iphone-7-et-7-plus-ecouteurs-lightning-d-origine-apple-mmtn2zma.jpg', '2019-09-29 11:26:22'),
(78, 'chargeur-pour-iphone-5-5s-5c-6-6plus-blanc.jpg', '2019-09-29 11:28:44'),
(79, 'dell xps 13 9389 tactile .jpg', '2019-09-29 11:42:54'),
(80, 'toshiba satelite pro R50 14.jpg', '2019-09-29 11:44:00'),
(81, 'lenovo ideapad c240 14 .jpg', '2019-09-29 11:45:25'),
(82, 'acer-swift-1-sf114-32-p8fr_bd2a902ed4b92b92__450_400.jpg', '2019-09-29 11:47:08'),
(83, 'asus-ordinateur-ultrabook-zenbook-ux430ua-gv595t.jpg', '2019-09-29 11:48:54'),
(84, 'hp-pc-ultrabook-spectre-x360-15.jpg', '2019-09-29 11:50:34'),
(85, 'surface 2017.png', '2019-09-29 11:51:51'),
(86, 'haut-parleur-interne-galaxy-s6.jpg', '2019-09-30 12:24:28'),
(87, 'batterie-iphone-xs-max.jpg', '2019-09-30 12:25:44'),
(88, 'haut parleur externe.jpg', '2019-09-30 12:27:07'),
(89, 'LG-Nexus-5X-Vibration.jpg', '2019-09-30 12:33:43'),
(90, 'connecteur micro nokia 6 .jpg', '2019-09-30 12:35:16'),
(91, 'vitre-arriere-huawei-p30-pro-bleu-aurore.jpg', '2019-09-30 12:36:42'),
(92, 'nappe-bouton-power-htc-one-m9.jpg', '2019-09-30 12:38:04'),
(93, 'smartphones-2018.jpg', '2019-09-30 15:21:07'),
(94, 'ipads.jpeg', '2019-09-30 15:21:15'),
(95, '5-most-expensive-gaming-laptops-of-your-dreams-2019.jpg', '2019-09-30 15:21:29'),
(96, 'smartphone accesoiries.jpg', '2019-09-30 15:22:20'),
(97, 'smartphone-parts.jpg', '2019-09-30 15:22:42'),
(98, 'smartphone-repair.jpg', '2019-09-30 15:23:17'),
(99, 'tools.jpg', '2019-09-30 15:23:37');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `commande_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20191010220033', '2019-10-10 22:00:38');

-- --------------------------------------------------------

--
-- Structure de la table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `marque_id` int(11) DEFAULT NULL,
  `slug` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `categorie_id`, `marque_id`, `slug`, `image_id`, `color`, `size`, `stock`) VALUES
(30, 'iphone 5s', 'iphone 5S', 123, 1, 1, 'iphone-5s', 31, 'Noir', '16', 0),
(31, 'iphone 6', 'iphone 6 tres bonne état', 140, 1, 1, 'iphone-6', 32, 'noir', '64', 0),
(32, 'galaxy S5', 'galaxy S5 tout neuf', 100, 1, 2, 'galaxy-s5', 33, 'noir', '32', 0),
(33, 'galaxy S6', 'galaxy s6 reconditionné', 120, 1, 2, 'galaxy-s6', 34, 'blanc', '32', 0),
(34, 'huawei P20 Pro', 'huawei P20 pro tout neuf', 400, 1, 3, 'huawei-p20-pro', 35, 'blue', '64', 0),
(35, 'iphone 7', 'iphone 7 occasion', 200, 1, 1, 'iphone-7', 36, 'Noir', '128', 0),
(36, 'iphone Xs Max', 'iphone xs max tout neuf', 1600, 1, 1, 'iphone-xs-max', 37, 'noir', '512', 0),
(37, 'Galaxy S10', 'galaxy s10 reconditionné', 999, 1, 2, 'galaxy-s10', 38, 'noir', '512', 0),
(38, 'huawei mate 10 pro', 'tout neuf', 299, 1, 3, 'huawei-mate-10-pro', 39, 'noir', '64', 0),
(39, 'huawei honor 8', 'occasion', 200, 1, 3, 'huawei-honor-8', 40, 'blue', '32', 0),
(40, 'huawei p9', 'occasion', 99, 1, 3, 'huawei-p9', 41, 'noir', '32', 0),
(41, 'xiaomi mi mix 2S', 'tout neuf', 399, 1, 4, 'xiaomi-mi-mix-2s', 42, 'noir', '32', 0),
(42, 'xiaomi note 6 pro', 'occasion', 159, 1, 4, 'xiaomi-note-6-pro', 43, 'noir', '32', 0),
(43, 'Apple ipad 3', 'occasion', 99, 2, 1, 'apple-ipad-3', 44, 'noir', '16', 0),
(44, 'apple ipad 4', 'occasion', 149, 2, 1, 'apple-ipad-4', 45, 'blanc', '64', 0),
(45, 'Samsung TAb S4', 'toute neuve', 400, 2, 2, 'samsung-tab-s4', 46, 'noir', '64', 0),
(46, 'Samsung TAb 4', 'occasion', 99, 2, 2, 'samsung-tab-4', 47, 'blanc', '32', 0),
(47, 'Apple ipad 5', 'tout neuf', 399, 2, 1, 'apple-ipad-5', 48, 'blanc', '64', 0),
(48, 'Apple ipad 6', 'occasion', 499, 2, 1, 'apple-ipad-6', 49, 'noir', '128', 0),
(49, 'Apple ipad pro 1', 'tout neuf', 799, 2, 1, 'apple-ipad-pro-1', 50, 'noir', '128', 0),
(50, 'Apple ipad pro 2', 'tout neuf', 1000, 2, 1, 'apple-ipad-pro-2', 51, 'noir', '512', 0),
(51, 'macbook pro 2015', 'occasion', 500, 3, 1, 'macbook-pro-2015', 52, 'gris', '512', 0),
(52, 'Htc U12 life', 'tout neuf', 259, 1, 6, 'htc-u12-life', 53, 'noir', '64', 0),
(53, 'coque htc U12 life', 'coque ultra slim', 9, 4, 6, 'coque-htc-u12-life', 54, 'noir', '0', 0),
(54, 'connecteur de charge iphone 6plus', 'NAPPE DOCK CONNECTEUR DE CHARGE IPHONE 6 PLUS', 9, 5, 1, 'connecteur-de-charge-iphone-6plus', 55, 'noir', '0', 0),
(55, 'Réparation écran iphone 7', 'ecran iphone 7', 50, 6, 1, 'reparation-ecran-iphone-7', 56, 'noir', '0', 0),
(56, 'station a souder et air chaud', '2 en 1', 80, 9, 19, 'station-a-souder-et-air-chaud', 57, 'noir', '0', 0),
(57, 'réparation écran sony Z3', 'changement d\'écran', 39, 6, 5, 'reparation-ecran-sony-z3', 58, 'blue', '0', 0),
(58, 'réparation écran sony OnePlus 4', 'changement d\'écran', 59, 6, 7, 'reparation-ecran-sony-oneplus-4', 59, 'marron', '0', 0),
(59, 'Réparation écran macbook pro 13', 'réparation mac book pro', 450, 6, 1, 'reparation-ecran-macbook-pro-13', 60, 'gris', '0', 0),
(60, 'Réparation écran LG G pad', 'changement d\'écran', 99, 6, 8, 'reparation-ecran-lg-g-pad', 61, 'blanc', '0', 0),
(61, 'Réparation carte mere LG nexus 5g', 'carte mere LG nexus 5g', 99, 6, 8, 'reparation-carte-mere-lg-nexus-5g', 62, 'noir', '0', 0),
(62, 'réparation dock de charge wiko robby', 'changement connecteur de charge', 45, 6, 11, 'reparation-dock-de-charge-wiko-robby', 63, 'noir', '0', 0),
(63, 'Réparation écran nokia 6', 'changement d\'ecran nokia', 59, 6, 10, 'reparation-ecran-nokia-6', 64, 'noir', '0', 0),
(64, 'fer à souder', 'fer à souder', 10, 9, 19, 'fer-a-souder', 65, 'noir', '0', 0),
(65, 'fil de soudure', 'fil de soudure 1 mm', 10, 9, 19, 'fil-de-soudure', 66, 'vert', '0', 0),
(66, 'pâte à souder', 'pate a souder', 10, 9, 19, 'pate-a-souder', 67, 'jaune', '0', 0),
(67, 'Colle B7000', 'Colle B7000 pour écran', 10, 9, 19, 'colle-b7000', 68, 'noir', '0', 0),
(68, 'machine pour désoxyder- ultra sonic', 'machine pour désoxyder les smartphone', 99, 9, 19, 'machine-pour-desoxyder-ultra-sonic', 69, 'gris', '0', 0),
(69, 'kit d\'outils de réparation', 'kit d\'outils de complet de réparation', 10, 9, 19, 'kit-doutils-de-reparation', 70, 'noir', '0', 0),
(70, 'machine pour séparer les écrans', 'lcd screen separator', 139, 9, 19, 'machine-pour-separer-les-ecrans', 71, 'or', '0', 0),
(71, 'chargeur micro usb android', 'chargeur micro usb compatible avec  samsung, Huawei , sony ,htc .. etc.', 10, 4, 19, 'chargeur-micro-usb-android', 72, 'gris', '0', 0),
(72, 'coque smart cover pour Ipad 5', 'coque de protection pour apple ipad 5', 29, 4, 1, 'coque-smart-cover-pour-ipad-5', 73, 'rose', '0', 0),
(73, 'vitre de protection galaxy s10', 'protection écran pour samsung galaxy s10 2,8mm', 10, 4, 2, 'vitre-de-protection-galaxy-s10', 74, 'transparent', '0', 0),
(74, 'Casque bluetooth JBL E 45', 'un casque audio JBL noir avec une prise jack 3,5 mm', 39, 4, 19, 'casque-bluetooth-jbl-e-45', 75, 'noir', '0', 0),
(75, 'Chargeur induction- sans fil', 'chargeur sans fil pour samsung , iphone et hauwei', 19, 4, 19, 'chargeur-induction-sans-fil', 76, 'Noir', '0', 0),
(76, 'Ecouteur lightning apple', 'écouteurs pour iPhone 7 , 8, X ,Xs, Xs mAX , 11 et 11 pro', 39, 4, 1, 'ecouteur-lightning-apple', 77, 'blanc', '0', 0),
(77, 'chargeur lightening pour  iPhone 5 ->-> iPhone 11pro', 'chargeur lightening blanc', 29, 4, 1, 'chargeur-lightening-pour-iphone-5-iphone-11pro', 78, 'blanc', '0', 0),
(78, 'dell xps 13 9389 tactile', 'ordinateur portable dell ultra book 13 pouce tactile', 1000, 3, 16, 'dell-xps-13-9389-tactile', 79, 'noir', '512', 0),
(79, 'Ordinateur portable Toshiba satellite pro R50 14', 'toshiba satelite pro R50 14', 399, 3, 18, 'ordinateur-portable-toshiba-satellite-pro-r50-14', 80, 'noir', '512', 0),
(80, 'Ordinateur Lenovo IdeaPad c240 14', 'Lenovo IdeaPad écran 14 pouce', 999, 3, 17, 'ordinateur-lenovo-ideapad-c240-14', 81, 'Noir', '512', 0),
(81, 'Ordinateur Acer swift 1 UltraBook', 'Ordinateur Acer swift 1 sf114 14 pouce tactile', 799, 3, 13, 'ordinateur-acer-swift-1-ultrabook', 82, 'vert', '256', 0),
(82, 'Ordinateur Asus ordinateur ultrabook ZenBook', 'Ordinateur Asus ordinateur ultrabook ZenBook  13 pouce', 600, 3, 12, 'ordinateur-asus-ordinateur-ultrabook-zenbook', 83, 'Noir', '256', 0),
(83, 'Ordinateur hp ultrabook spectre x360', 'Pc hp ultrabook spectre x360 15 pouces', 1299, 3, 15, 'ordinateur-hp-ultrabook-spectre-x360', 84, 'noir', '1024', 0),
(84, 'Microsoft Surface Pro 4 tactile', 'Microsoft Surface Pro 4 tactile 13 pouces', 799, 3, 14, 'microsoft-surface-pro-4-tactile', 85, 'gris', '512', 0),
(85, 'parleur interne galaxy s6', 'parleur interne \r\ndiagnostique (si vous appeler quelqu\'un vous entendez rien sans activer le haut parleur )', 9, 5, 2, 'parleur-interne-galaxy-s6', 86, 'noir', '0', 0),
(86, 'Batterie iPhone xs Max', 'batterie compatible avec l\'iPhone Xs max', 59, 5, 1, 'batterie-iphone-xs-max', 87, 'noir', '0', 0),
(87, 'Haut parleur (sonnerie) iPhone 6 plus', 'si votre iPhone n\'a pas de sonnerie ou le haut parleur n\'active pas', 10, 5, 1, 'haut-parleur-sonnerie-iphone-6-plus', 88, 'noir', '0', 0),
(88, 'vibreur LG nexus 5x', 'problème vibreur LG', 5, 5, 8, 'vibreur-lg-nexus-5x', 89, 'noir', '0', 0),
(89, 'Dock charge  Nokia 6 plus', 'Connecteur de charge - micro - antenne réseau', 10, 5, 10, 'dock-charge-nokia-6-plus', 90, 'noir', '0', 0),
(90, 'Cache arrière Huawei P30 pro', 'cache arrière blue , et vitre appareil photo complet', 59, 5, 3, 'cache-arriere-huawei-p30-pro', 91, 'blue', '0', 0),
(91, 'Nappe bouton allumage HTC one m9', 'Nappe bouton allumage , lecteur sim', 15, 5, 6, 'nappe-bouton-allumage-htc-one-m9', 92, 'noir', '0', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress_billing_id` int(11) DEFAULT NULL,
  `adress_delivery_id` int(11) DEFAULT NULL,
  `same_adress_db` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `first_name`, `last_name`, `adress_billing_id`, `adress_delivery_id`, `same_adress_db`) VALUES
(8, 'lamiia.ferhat@gmail.com', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$D3r1ct4YULgClzANOyd2CQ$QDz49vSb2CNUcOD1v8509AdukkRa6Rc9m2gTwFRl7s0', 'ferhat', 'lamia', 1, 3, NULL),
(10, 'salamalikoum@gmail.com', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$mgwACVXPKFDHj+hvnGt2FQ$wVO6GmolnlqYyy3PZbY8Ezpx8m28wQsu7T/7AoJclhU', 'teste', 'teste', NULL, NULL, NULL),
(11, 'rassoul.amar@gmail.com', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$PU7Q3uCll9jtzb75fPeV/w$DSK+2GoE/0Ah/OvRIk9tQwZdrV8151Jw/+r8MYDzYaI', 'amar', 'rassoul', NULL, NULL, NULL),
(12, 'testeteste@tes.fr', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$RpraY014VaAb9rHicpbcSA$b6MqdlZyk4RqSUcJh7HZ0PhBO3EhtnOn9ODne91y0FM', 'teste', 'teste', NULL, NULL, NULL),
(13, 'rassoul.damar@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$x2qdjE78lpPmUIUhnf1bxw$AUvKV6BQD81GX9M8rPSnMoEskJqMCNcDLd4bt60mcgE', 'rassoul', 'amar', NULL, NULL, NULL),
(15, 'rassoul.kamar@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$E9ibSsScCVC+i7DHtDzhnw$IOiCDI5kI4+L6/NA3/Ci6pwesLnKpV52FsAp3OR2RhI', 'rassoul', 'amar', NULL, NULL, NULL),
(16, 'rassoul.kamal@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$ourlMOH8QRTXpqkeg8ttBQ$+0181ZSYqOh2C4JNOzjKckwkpZWnVMTsAWHwhL2mRhs', 'rassoul', 'amar', NULL, 2, NULL),
(20, 'arbouzfatma@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$f9v2axclMK2S8ShiuyWBHQ$hRnyRFfBvH/rTmpSml2D7gIj1prITn48WGrqPMYejyM', 'amar', 'rassoul', NULL, NULL, NULL),
(21, 'arbouzahmed@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$XY2tB2ygtfpCGXYKwmlPaw$tQsJd4irDW/iBsHoJ16z3BSOUZRd+geej22ZH/4g16w', 'amar', 'rassoul', NULL, NULL, NULL),
(22, 'lea@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$wVJJFmtGJbVenPcqvR8+UQ$VCsa3VgxPePOH76byrXVepto23nuw8jWqL3oaZ/vmME', 'rass', 'rama', NULL, NULL, NULL),
(23, 'leaff@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$tcwJ8kvGCJAwf6fTl3zGjw$hOEFo3fmff0PCp3gXQT+3DZJNd0JF6ETP4Nuekkm8YM', 'rass', 'rama', NULL, NULL, NULL),
(24, 'leafffff@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$T16a0FkR7zy/iA9ZeS0jmA$goL36YkVPB6SpsNqXAhh3WgW0F312izFcP5Ql5B89Lc', 'rass', 'rama', NULL, NULL, NULL),
(25, 'rassoul.amar', '[]', '$argon2id$v=19$m=65536,t=4,p=1$fgONgusFdUY4meRWRlzbqw$xm1FWc/Ms5tUfSS0+fBvHsV4DPIXpWnUckFQnJrGMCA', 'rass', 'rama', NULL, NULL, NULL),
(26, 'rassoul.hhhhhar@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$Nb1VgLQtAdCvCS66eNOxLA$VCA2UFKOLAlkh5OpVdUTSAcjHztgoX7qxiaXClw8kwY', 'rass', 'rama', NULL, 1, NULL),
(29, 'saidoulamara@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$QTY7cyKV30KSwcL2gotVzg$EBI0isq/7zAQck1VXt4wllu1AKO3cVe8mTJjOaRka/c', 'said', 'oulamarar', NULL, 6, 1),
(30, 'saidoulamara2@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$TlmwpWxgR1YISz/6kFBt/Q$iZwn93FAB0kXQTDHct9x8UtJb7kxqufWo03A+KnUb1Y', 'lea', 'rassoul', NULL, 7, 1),
(31, 'aya@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$HNOJRoHrOgPGWnkhge09ew$/y5VhWQmSyiRdMic9ufDOFHQqK2Uj2z1LOxP7IQpbIs', 'aya', 'rassoul', NULL, 8, 1),
(32, 'saidouladdddmara@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$azeNE/Ic2FmOa2IsQM5IsQ$qcKg37smWrizrWAxlPJuCOaaKULZIMqHKhRtAbZhFRA', 'amar', 'rassoul', NULL, 9, 0),
(33, 'saidoulamafffra@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$QG1gcuoQ8bxg93y2tOhq5g$ddElmp+1tKgOGbJaYi6mwOSGUbxD+ugFsENOc7u8y4Q', 'amar', 'rassoul', 2, 10, 1),
(34, 'rassoul.amar@gmail.commm', '[]', '$argon2id$v=19$m=65536,t=4,p=1$K+2YhzexQqCRnPAnOl/wIA$8uE+UwkJTABOuIoEx8GcJyU/gB5LnKFyXKrZDc/OCJs', 'XXX', 'XXX', 3, 11, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`id`, `name`, `zip_code`, `country_id`) VALUES
(1, 'paris', '75016', 1),
(2, 'azer', '12345', 2),
(3, 'Saint-Ouen', '93400', 3),
(4, 'saint denis', '93000', 4),
(5, 'saint denis', '93000', 5),
(6, 'saint denis', '93000', 6),
(7, 'Saint-Ouen', '93400', 7),
(8, 'Paris', '75020', 8),
(9, 'Saint-Ouen', '93400', 9),
(10, 'paris', '75016', 10),
(11, 'Saint-Ouen', '93400', 11),
(12, 'XXX', '91000', 12);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adress_billing`
--
ALTER TABLE `adress_billing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CEC93174A73F0036` (`ville_id`);

--
-- Index pour la table `adress_delivery`
--
ALTER TABLE `adress_delivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_56C8F8BEA73F0036` (`ville_id`);

--
-- Index pour la table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_497DD634989D9B62` (`slug`),
  ADD UNIQUE KEY `UNIQ_497DD6343DA5256D` (`image_id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6EEAA67DA76ED395` (`user_id`),
  ADD KEY `IDX_6EEAA67D5DED75F5` (`delivery_method_id`),
  ADD KEY `IDX_6EEAA67D5AA1164F` (`payment_method_id`),
  ADD KEY `IDX_6EEAA67DE63A7CE8` (`command_stat_id`);

--
-- Index pour la table `commande_stat`
--
ALTER TABLE `commande_stat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `delivery_method`
--
ALTER TABLE `delivery_method`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3170B74B82EA2E54` (`commande_id`),
  ADD KEY `IDX_3170B74B4584665A` (`product_id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_D34A04AD989D9B62` (`slug`),
  ADD UNIQUE KEY `UNIQ_D34A04AD3DA5256D` (`image_id`),
  ADD KEY `IDX_D34A04ADBCF5E72D` (`categorie_id`),
  ADD KEY `IDX_D34A04AD4827B9B2` (`marque_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_8D93D649115C78D4` (`adress_billing_id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E05B374B` (`adress_delivery_id`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_43C3D9C3F92F3E70` (`country_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adress_billing`
--
ALTER TABLE `adress_billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `adress_delivery`
--
ALTER TABLE `adress_delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commande_stat`
--
ALTER TABLE `commande_stat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `delivery_method`
--
ALTER TABLE `delivery_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adress_billing`
--
ALTER TABLE `adress_billing`
  ADD CONSTRAINT `FK_CEC93174A73F0036` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`id`);

--
-- Contraintes pour la table `adress_delivery`
--
ALTER TABLE `adress_delivery`
  ADD CONSTRAINT `FK_56C8F8BEA73F0036` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`id`);

--
-- Contraintes pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `FK_497DD6343DA5256D` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_6EEAA67D5AA1164F` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_method` (`id`),
  ADD CONSTRAINT `FK_6EEAA67D5DED75F5` FOREIGN KEY (`delivery_method_id`) REFERENCES `delivery_method` (`id`),
  ADD CONSTRAINT `FK_6EEAA67DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_6EEAA67DE63A7CE8` FOREIGN KEY (`command_stat_id`) REFERENCES `commande_stat` (`id`);

--
-- Contraintes pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD CONSTRAINT `FK_3170B74B4584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_3170B74B82EA2E54` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`);

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD3DA5256D` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`),
  ADD CONSTRAINT `FK_D34A04AD4827B9B2` FOREIGN KEY (`marque_id`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `FK_D34A04ADBCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D649115C78D4` FOREIGN KEY (`adress_billing_id`) REFERENCES `adress_billing` (`id`),
  ADD CONSTRAINT `FK_8D93D649E05B374B` FOREIGN KEY (`adress_delivery_id`) REFERENCES `adress_delivery` (`id`);

--
-- Contraintes pour la table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `FK_43C3D9C3F92F3E70` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
