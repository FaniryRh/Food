-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 16 mars 2018 à 00:14
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_cmd3`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualites`
--

CREATE TABLE `actualites` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `designation`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Categorie 1', '2018-03-15 15:37:05', '2018-03-15 15:37:05', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commandes_avec_comptes`
--

CREATE TABLE `commandes_avec_comptes` (
  `id` int(10) UNSIGNED NOT NULL,
  `date_depot_cmd` datetime DEFAULT NULL,
  `date_livre_cmd` datetime DEFAULT NULL,
  `total_addition` int(10) UNSIGNED DEFAULT NULL,
  `date_encaisse` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `compte_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `etat_cmd_id` int(10) UNSIGNED DEFAULT NULL,
  `typepayement_id` int(10) UNSIGNED DEFAULT NULL,
  `etat_livraison_id` int(10) UNSIGNED DEFAULT NULL,
  `adresse_de_livraison` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_latitude` double DEFAULT NULL,
  `map_longitude` double DEFAULT NULL,
  `date_heur_souhaitee` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commandes_simples`
--

CREATE TABLE `commandes_simples` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom_client` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_client` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_client` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_addition` int(10) UNSIGNED DEFAULT NULL,
  `date_encaisse` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `etat_cmd_id` int(10) UNSIGNED DEFAULT NULL,
  `etat_livraison_id` int(10) UNSIGNED DEFAULT NULL,
  `date_heur_souhaitee` datetime DEFAULT NULL,
  `date_heur_arrive_livr` datetime DEFAULT NULL,
  `adresse_de_livraison` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_latitude` double DEFAULT NULL,
  `map_longitude` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

CREATE TABLE `comptes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom_compte` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom_compte` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_compte` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_compte` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_compte` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville_compte` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quartier_compte` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `solde_compte` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `mdp_compte` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etat_commandes`
--

CREATE TABLE `etat_commandes` (
  `id` int(10) UNSIGNED NOT NULL,
  `designation_etatcom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etat_livraisons`
--

CREATE TABLE `etat_livraisons` (
  `id` int(10) UNSIGNED NOT NULL,
  `designation_etatlivraison` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inventaires_avec_comptes`
--

CREATE TABLE `inventaires_avec_comptes` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantite` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `cmd_compt_id` int(10) UNSIGNED DEFAULT NULL,
  `produit_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inventaires_avec_compte_option`
--

CREATE TABLE `inventaires_avec_compte_option` (
  `inventaires_avec_compte_id` int(10) UNSIGNED DEFAULT NULL,
  `option_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inventaires_simples`
--

CREATE TABLE `inventaires_simples` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantite` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `produit_id` int(10) UNSIGNED DEFAULT NULL,
  `cmd_simpl_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inventaires_simple_option`
--

CREATE TABLE `inventaires_simple_option` (
  `inventaires_simple_id` int(10) UNSIGNED DEFAULT NULL,
  `option_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(10) UNSIGNED NOT NULL,
  `sender_id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sent_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messenger_topics`
--

CREATE TABLE `messenger_topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `sent_at` timestamp NULL DEFAULT NULL,
  `sender_read_at` timestamp NULL DEFAULT NULL,
  `receiver_read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2018_03_06_160345_create_1520345025_roles_table', 1),
(3, '2018_03_06_160349_create_1520345028_users_table', 1),
(4, '2018_03_06_160350_add_5a9e9fc86400e_relationships_to_user_table', 1),
(5, '2018_03_06_162049_create_1520346049_comptes_table', 1),
(6, '2018_03_06_162442_update_1520346282_users_table', 1),
(7, '2018_03_06_162444_add_5a9ea4ac86804_relationships_to_user_table', 1),
(8, '2018_03_06_163129_create_1520346689_produits_table', 1),
(9, '2018_03_06_163259_create_1520346779_typepayements_table', 1),
(10, '2018_03_06_163554_create_1520346954_etat_livraisons_table', 1),
(11, '2018_03_06_201757_create_1520360277_options_table', 1),
(12, '2018_03_06_202226_create_1520360546_etat_commandes_table', 1),
(13, '2018_03_06_203613_create_1520361372_commandes_simples_table', 1),
(14, '2018_03_06_203614_add_5a9edfa1e84a4_relationships_to_commandessimple_table', 1),
(15, '2018_03_06_203617_create_5a9edfa1e6e56_commandes_simple_produit_table', 1),
(16, '2018_03_06_204659_create_1520362018_commandes_avec_comptes_table', 1),
(17, '2018_03_06_204700_add_5a9ee22822637_relationships_to_commandesaveccompte_table', 1),
(18, '2018_03_06_204703_create_5a9ee22820f78_commandes_avec_compte_produit_table', 1),
(19, '2018_03_06_204732_add_5a9ee2441250a_relationships_to_commandesaveccompte_table', 1),
(20, '2018_03_06_205500_update_1520362500_commandes_simples_table', 1),
(21, '2018_03_06_205502_add_5a9ee4066de47_relationships_to_commandessimple_table', 1),
(22, '2018_03_06_205831_update_1520362711_commandes_avec_comptes_table', 1),
(23, '2018_03_06_205833_add_5a9ee4d9bb4f9_relationships_to_commandesaveccompte_table', 1),
(24, '2018_03_06_205902_add_5a9ee4f67440a_relationships_to_commandessimple_table', 1),
(25, '2018_03_06_210213_create_5a9ee5b2bf8b1_option_produit_table', 1),
(26, '2018_03_06_210625_drop_5a9ee6b1eac635a9ee6b1e95d3_commandes_simple_produit_table', 1),
(27, '2018_03_06_210627_add_5a9ee6b3d84d6_relationships_to_commandessimple_table', 1),
(28, '2018_03_06_211216_create_1520363535_inventaires_simples_table', 1),
(29, '2018_03_06_211217_add_5a9ee814b74b4_relationships_to_inventairessimple_table', 1),
(30, '2018_03_06_211220_create_5a9ee814b5d6f_inventaires_simple_option_table', 1),
(31, '2018_03_06_211602_create_1520363761_inventaires_avec_comptes_table', 1),
(32, '2018_03_06_211603_add_5a9ee8f707d50_relationships_to_inventairesaveccompte_table', 1),
(33, '2018_03_06_211606_create_5a9ee8f706671_inventaires_avec_compte_option_table', 1),
(34, '2018_03_06_211743_add_5a9ee957440f6_relationships_to_inventairessimple_table', 1),
(35, '2018_03_06_211848_add_5a9ee9985c635_relationships_to_inventairessimple_table', 1),
(36, '2018_03_06_211919_add_5a9ee9b73a6bd_relationships_to_inventairesaveccompte_table', 1),
(37, '2018_03_06_212133_update_1520364093_produits_table', 1),
(38, '2018_03_06_212419_update_1520364259_commandes_avec_comptes_table', 1),
(39, '2018_03_06_212421_drop_5a9eeae59b1aa5a9eeae599c29_commandes_avec_compte_produit_table', 1),
(40, '2018_03_06_212423_add_5a9eeae7c8452_relationships_to_commandesaveccompte_table', 1),
(41, '2018_03_06_212556_update_1520364356_commandes_simples_table', 1),
(42, '2018_03_06_212558_add_5a9eeb4638f64_relationships_to_commandessimple_table', 1),
(43, '2018_03_06_212655_add_5a9eeb7fa48af_relationships_to_commandesaveccompte_table', 1),
(44, '2018_03_06_213942_update_1520365182_commandes_avec_comptes_table', 1),
(45, '2018_03_06_213945_add_5a9eee815777f_relationships_to_commandesaveccompte_table', 1),
(46, '2018_03_06_214404_create_messenger_topics_table', 1),
(47, '2018_03_06_214405_create_messenger_messages_table', 1),
(48, '2018_03_06_214641_create_1520365601_coupon_campaigns_table', 1),
(49, '2018_03_06_214645_create_1520365604_coupons_table', 1),
(50, '2018_03_06_214646_add_5a9ef028042d5_relationships_to_coupon_table', 1),
(51, '2018_03_06_214810_drop_5a9ef07a4700b_coupons_table', 1),
(52, '2018_03_06_214816_add_5a9ef0803b784_relationships_to_commandessimple_table', 1),
(53, '2018_03_06_214820_drop_5a9ef084ce171_coupon_campaigns_table', 1),
(54, '2018_03_06_214826_add_5a9ef08a637c5_relationships_to_commandessimple_table', 1),
(55, '2018_03_06_215525_update_1520366125_comptes_table', 1),
(56, '2018_03_06_233410_add_5a9f0951ece21_relationships_to_commandessimple_table', 1),
(57, '2018_03_06_233552_add_5a9f09b8aa7e0_relationships_to_commandessimple_table', 1),
(58, '2018_03_07_115140_add_5a9fb62ca0672_relationships_to_commandessimple_table', 1),
(59, '2018_03_07_115214_add_5a9fb64e62e1d_relationships_to_inventairessimple_table', 1),
(60, '2018_03_07_115238_add_5a9fb66611a81_relationships_to_commandesaveccompte_table', 1),
(61, '2018_03_07_115335_add_5a9fb69f609d5_relationships_to_inventairesaveccompte_table', 1),
(62, '2018_03_07_120252_create_1520416971_user_actions_table', 1),
(63, '2018_03_07_120253_add_5a9fb8cf84502_relationships_to_useraction_table', 1),
(64, '2018_03_08_163303_create_1520519583_galleries_table', 1),
(65, '2018_03_09_221010_create_1520626210_actualites_table', 1),
(66, '2018_03_15_161345_create_1521123225_categories_table', 1),
(67, '2018_03_15_161535_add_5aaa80072d560_relationships_to_produit_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `designation_option` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `option_produit`
--

CREATE TABLE `option_produit` (
  `option_id` int(10) UNSIGNED DEFAULT NULL,
  `produit_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(10) UNSIGNED NOT NULL,
  `designation_produit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix_unit_produit` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `photo_produit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categorie_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `designation_produit`, `prix_unit_produit`, `created_at`, `updated_at`, `deleted_at`, `photo_produit`, `categorie_id`) VALUES
(1, 'Produit 1', 1200, '2018-03-15 15:38:22', '2018-03-15 15:38:22', NULL, '1521131902-piza.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Administrator (can create other users)', '2018-03-15 15:35:47', '2018-03-15 15:35:47'),
(2, 'Client', '2018-03-15 15:35:47', '2018-03-15 15:35:47'),
(3, 'Livreur', '2018-03-15 15:35:47', '2018-03-15 15:35:47'),
(4, 'Caissier', '2018-03-15 15:35:47', '2018-03-15 15:35:47');

-- --------------------------------------------------------

--
-- Structure de la table `typepayements`
--

CREATE TABLE `typepayements` (
  `id` int(10) UNSIGNED NOT NULL,
  `designation_typepayement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `prenom_user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `prenom_user`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$ocRulm35h8ixlhKwG9bSkew4Xfu2wcpYbNnC59PHhtxFIWwryzIfu', '', '2018-03-15 15:35:47', '2018-03-15 15:35:47', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user_actions`
--

CREATE TABLE `user_actions` (
  `id` int(10) UNSIGNED NOT NULL,
  `action` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_actions`
--

INSERT INTO `user_actions` (`id`, `action`, `action_model`, `action_id`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'created', 'categories', 1, '2018-03-15 15:37:05', '2018-03-15 15:37:05', 1),
(2, 'created', 'produits', 1, '2018-03-15 15:38:23', '2018-03-15 15:38:23', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actualites`
--
ALTER TABLE `actualites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actualites_deleted_at_index` (`deleted_at`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_deleted_at_index` (`deleted_at`);

--
-- Index pour la table `commandes_avec_comptes`
--
ALTER TABLE `commandes_avec_comptes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commandes_avec_comptes_deleted_at_index` (`deleted_at`),
  ADD KEY `126108_5a9ee2261439c` (`compte_id`),
  ADD KEY `126108_5a9ee2261ea8a` (`user_id`),
  ADD KEY `126108_5a9ee22628cb7` (`etat_cmd_id`),
  ADD KEY `126108_5a9ee226329a9` (`typepayement_id`),
  ADD KEY `126108_5a9ee2263bfd8` (`etat_livraison_id`);

--
-- Index pour la table `commandes_simples`
--
ALTER TABLE `commandes_simples`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commandes_simples_deleted_at_index` (`deleted_at`),
  ADD KEY `126102_5a9edfa01668e` (`user_id`),
  ADD KEY `126102_5a9edfa01fab3` (`etat_cmd_id`),
  ADD KEY `126102_5a9edfa02851b` (`etat_livraison_id`);

--
-- Index pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comptes_deleted_at_index` (`deleted_at`);

--
-- Index pour la table `etat_commandes`
--
ALTER TABLE `etat_commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etat_commandes_deleted_at_index` (`deleted_at`);

--
-- Index pour la table `etat_livraisons`
--
ALTER TABLE `etat_livraisons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etat_livraisons_deleted_at_index` (`deleted_at`);

--
-- Index pour la table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_deleted_at_index` (`deleted_at`);

--
-- Index pour la table `inventaires_avec_comptes`
--
ALTER TABLE `inventaires_avec_comptes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventaires_avec_comptes_deleted_at_index` (`deleted_at`),
  ADD KEY `126116_5a9ee8f52e454` (`cmd_compt_id`),
  ADD KEY `126116_5a9ee8f536edf` (`produit_id`);

--
-- Index pour la table `inventaires_avec_compte_option`
--
ALTER TABLE `inventaires_avec_compte_option`
  ADD KEY `fk_p_126116_126098_option_5a9ee8f70676b` (`inventaires_avec_compte_id`),
  ADD KEY `fk_p_126098_126116_invent_5a9ee8f706828` (`option_id`);

--
-- Index pour la table `inventaires_simples`
--
ALTER TABLE `inventaires_simples`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventaires_simples_deleted_at_index` (`deleted_at`),
  ADD KEY `126115_5a9ee812f16ab` (`produit_id`),
  ADD KEY `126115_5a9ee955553c8` (`cmd_simpl_id`);

--
-- Index pour la table `inventaires_simple_option`
--
ALTER TABLE `inventaires_simple_option`
  ADD KEY `fk_p_126115_126098_option_5a9ee814b5e6d` (`inventaires_simple_id`),
  ADD KEY `fk_p_126098_126115_invent_5a9ee814b5eeb` (`option_id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messenger_messages_topic_id_foreign` (`topic_id`);

--
-- Index pour la table `messenger_topics`
--
ALTER TABLE `messenger_topics`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `options_deleted_at_index` (`deleted_at`);

--
-- Index pour la table `option_produit`
--
ALTER TABLE `option_produit`
  ADD KEY `fk_p_126098_125925_produi_5a9ee5b2bf980` (`option_id`),
  ADD KEY `fk_p_125925_126098_option_5a9ee5b2bf9fe` (`produit_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produits_deleted_at_index` (`deleted_at`),
  ADD KEY `125925_5aaa8003ca3b0` (`categorie_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `typepayements`
--
ALTER TABLE `typepayements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `typepayements_deleted_at_index` (`deleted_at`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `125900_5a9e9fc691535` (`role_id`);

--
-- Index pour la table `user_actions`
--
ALTER TABLE `user_actions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `126490_5a9fb8cd9df61` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actualites`
--
ALTER TABLE `actualites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `commandes_avec_comptes`
--
ALTER TABLE `commandes_avec_comptes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commandes_simples`
--
ALTER TABLE `commandes_simples`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `comptes`
--
ALTER TABLE `comptes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etat_commandes`
--
ALTER TABLE `etat_commandes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etat_livraisons`
--
ALTER TABLE `etat_livraisons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `inventaires_avec_comptes`
--
ALTER TABLE `inventaires_avec_comptes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `inventaires_simples`
--
ALTER TABLE `inventaires_simples`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messenger_topics`
--
ALTER TABLE `messenger_topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `typepayements`
--
ALTER TABLE `typepayements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `user_actions`
--
ALTER TABLE `user_actions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes_avec_comptes`
--
ALTER TABLE `commandes_avec_comptes`
  ADD CONSTRAINT `126108_5a9ee2261439c` FOREIGN KEY (`compte_id`) REFERENCES `comptes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `126108_5a9ee2261ea8a` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `126108_5a9ee22628cb7` FOREIGN KEY (`etat_cmd_id`) REFERENCES `etat_commandes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `126108_5a9ee226329a9` FOREIGN KEY (`typepayement_id`) REFERENCES `typepayements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `126108_5a9ee2263bfd8` FOREIGN KEY (`etat_livraison_id`) REFERENCES `etat_livraisons` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `commandes_simples`
--
ALTER TABLE `commandes_simples`
  ADD CONSTRAINT `126102_5a9edfa01668e` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `126102_5a9edfa01fab3` FOREIGN KEY (`etat_cmd_id`) REFERENCES `etat_commandes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `126102_5a9edfa02851b` FOREIGN KEY (`etat_livraison_id`) REFERENCES `etat_livraisons` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `inventaires_avec_comptes`
--
ALTER TABLE `inventaires_avec_comptes`
  ADD CONSTRAINT `126116_5a9ee8f52e454` FOREIGN KEY (`cmd_compt_id`) REFERENCES `commandes_avec_comptes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `126116_5a9ee8f536edf` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `inventaires_avec_compte_option`
--
ALTER TABLE `inventaires_avec_compte_option`
  ADD CONSTRAINT `fk_p_126098_126116_invent_5a9ee8f706828` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_p_126116_126098_option_5a9ee8f70676b` FOREIGN KEY (`inventaires_avec_compte_id`) REFERENCES `inventaires_avec_comptes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `inventaires_simples`
--
ALTER TABLE `inventaires_simples`
  ADD CONSTRAINT `126115_5a9ee812f16ab` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `126115_5a9ee955553c8` FOREIGN KEY (`cmd_simpl_id`) REFERENCES `commandes_simples` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `inventaires_simple_option`
--
ALTER TABLE `inventaires_simple_option`
  ADD CONSTRAINT `fk_p_126098_126115_invent_5a9ee814b5eeb` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_p_126115_126098_option_5a9ee814b5e6d` FOREIGN KEY (`inventaires_simple_id`) REFERENCES `inventaires_simples` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD CONSTRAINT `messenger_messages_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `messenger_topics` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `option_produit`
--
ALTER TABLE `option_produit`
  ADD CONSTRAINT `fk_p_125925_126098_option_5a9ee5b2bf9fe` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_p_126098_125925_produi_5a9ee5b2bf980` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `125925_5aaa8003ca3b0` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `125900_5a9e9fc691535` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user_actions`
--
ALTER TABLE `user_actions`
  ADD CONSTRAINT `126490_5a9fb8cd9df61` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
