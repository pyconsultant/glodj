-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 08 sep. 2026 à 20:23
-- Version du serveur : 8.0.46-0ubuntu0.24.04.4
-- Version de PHP : 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `glodj`
--

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('espace-gestion-cache-livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1788788700),
('espace-gestion-cache-livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1788788700;', 1788788700);

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `candidats`
--

CREATE TABLE `candidats` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` json DEFAULT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `date_entree_souhaitee` date DEFAULT NULL,
  `duree_envisagee` smallint DEFAULT NULL,
  `piece_identite_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_sejour_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attestation_garant_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en_attente',
  `complement_libre` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `candidats`
--

INSERT INTO `candidats` (`id`, `user_id`, `prenom`, `nom`, `adresse_mail`, `telephone`, `location`, `sexe`, `date_naissance`, `date_entree_souhaitee`, `duree_envisagee`, `piece_identite_path`, `titre_sejour_path`, `attestation_garant_path`, `statut`, `complement_libre`, `created_at`, `updated_at`) VALUES
(3, 6, 'Kim', NULL, 'kimlee@free.fr', NULL, '[]', NULL, NULL, '1971-05-01', NULL, 'dossiers/candidat-3/01M17AA77BWPJ90GYJ37BYYP4R.png', 'dossiers/candidat-3/01M17AA77CN9BDRSGF0MNWR4CG.pdf', NULL, 'en_attente', NULL, '2026-08-23 14:24:48', '2026-08-29 15:50:38'),
(4, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'en_attente', NULL, '2026-08-25 06:03:55', '2026-08-25 06:03:55'),
(5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'en_attente', NULL, '2026-08-28 15:48:52', '2026-08-28 15:48:52');

-- --------------------------------------------------------

--
-- Structure de la table `egls`
--

CREATE TABLE `egls` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `complement` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codepostal` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `commune` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `codepays` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaire` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `egls`
--

INSERT INTO `egls` (`id`, `code`, `nom`, `adresse`, `complement`, `codepostal`, `commune`, `codepays`, `pays`, `commentaire`, `created_at`, `updated_at`) VALUES
(1, 'LES', 'Les Essarts III', '22 rue Édouard Branly', NULL, '69500', 'BRON', '64', 'FRANCE', NULL, '2026-07-20 10:48:00', '2026-07-21 07:11:20'),
(2, 'LVA', 'La Vanoise', '75 rue Philippe Fabia', NULL, '69008', 'LYON', '64', 'FRANCE', NULL, '2026-07-20 15:07:34', '2026-07-20 15:07:34'),
(3, 'LER', 'Les Érables', '251 rue des Érables', NULL, '69009', 'LYON', '64', 'FRANCE', NULL, '2026-07-20 15:19:45', '2026-07-20 15:19:45'),
(4, 'LHE', 'Hestia', '425 cours Èmile Zola', NULL, '69100', 'VILLEURBANNE', '64', 'FRANCE', NULL, '2026-07-20 15:27:48', '2026-07-20 15:27:48');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_07_12_200400_create_egls_table', 1),
(5, '2026_07_24_080333_create_uals_table', 1),
(6, '2026_08_15_130352_add_roles_mask_to_users_table', 2),
(7, '2026_08_15_195533_create_candidats_table', 2),
(8, '2026_08_19_150548_change_location_to_json_in_candidats_table', 3);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Dcq3kAnq2lD062QvIqQqqauGpIPrAhu0AZNaR308', 3, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:155.0) Gecko/20100101 Firefox/155.0', 'eyJfdG9rZW4iOiJmTWppdml6NWFINkFLUURtaXZFWTF2S0RDUTV1V2RFbHpiVlN5RnoyIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvbG9jYWxob3N0OjgwMDBcL2FkbWluXC9lZ2xzXC80XC9lZGl0Iiwicm91dGUiOiJmaWxhbWVudC5hZG1pbi5yZXNvdXJjZXMuZWdscy5lZGl0In0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjozLCJwYXNzd29yZF9oYXNoX3dlYiI6IjliMDIyNzEyZjQxN2MyMzUxN2YwOWYxY2RhYzdlMWY1ZjYwYjg3NTY0ZTlkM2MzNmMzNGVjZDM2YjZiYWRiNjQifQ==', 1788898948);

-- --------------------------------------------------------

--
-- Structure de la table `uals`
--

CREATE TABLE `uals` (
  `id` bigint UNSIGNED NOT NULL,
  `egl_id` bigint UNSIGNED NOT NULL,
  `num` smallint NOT NULL,
  `UALid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('chambre','garage','parking','cave') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surface` decimal(4,1) NOT NULL,
  `loyer` decimal(8,2) NOT NULL,
  `charges` decimal(8,2) NOT NULL,
  `dge` decimal(8,2) NOT NULL,
  `dgc` decimal(8,2) NOT NULL,
  `louable` tinyint(1) NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `uals`
--

INSERT INTO `uals` (`id`, `egl_id`, `num`, `UALid`, `type`, `surface`, `loyer`, `charges`, `dge`, `dgc`, `louable`, `description`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'Chambre 01', 'chambre', 11.0, 410.00, 85.00, 410.00, 410.00, 1, 'à fleurs', '2026-07-24 17:30:02', '2026-07-24 17:30:02'),
(2, 4, 2, 'Chambre 02', 'chambre', 11.0, 410.00, 85.00, 410.00, 410.00, 1, 'Mauve', '2026-07-24 17:30:02', '2026-07-24 17:30:02'),
(3, 4, 3, 'Chambre 03', 'chambre', 11.0, 410.00, 85.00, 410.00, 410.00, 1, 'Jaune', '2026-07-24 17:30:02', '2026-07-24 17:30:02'),
(4, 4, 1, 'Chambre 04', 'chambre', 11.0, 410.00, 85.00, 410.00, 410.00, 1, 'Bleue', '2026-07-24 17:30:02', '2026-07-24 17:30:02'),
(5, 3, 1, 'Chambre 01', 'chambre', 11.0, 410.00, 85.00, 410.00, 410.00, 1, 'avec grand lit', '2026-07-24 17:30:02', '2026-07-24 17:30:02'),
(6, 3, 2, 'Chambre 02', 'chambre', 11.0, 410.00, 85.00, 410.00, 410.00, 1, 'plafond latté', '2026-07-24 17:30:02', '2026-07-24 17:30:02'),
(7, 1, 2, 'Chambre 01', 'chambre', 11.0, 410.00, 85.00, 410.00, 410.00, 1, 'verte', '2026-07-24 17:30:02', '2026-07-24 17:30:02'),
(8, 1, 2, 'Chambre 02', 'chambre', 11.0, 410.00, 85.00, 410.00, 410.00, 1, 'bleue', '2026-07-24 17:30:02', '2026-07-24 17:30:02'),
(9, 1, 3, 'Chambre 03', 'chambre', 11.0, 410.00, 85.00, 410.00, 410.00, 1, 'jaune', '2026-07-24 17:30:02', '2026-07-24 17:30:02'),
(10, 1, 4, 'Chambre 04', 'chambre', 11.0, 410.00, 85.00, 410.00, 410.00, 1, 'avec douche privative', '2026-07-24 17:30:02', '2026-07-24 17:30:02'),
(11, 2, 1, 'Chambre 01', 'chambre', 11.0, 430.00, 85.00, 430.00, 410.00, 1, 'Grande chambre', '2026-07-24 17:30:02', '2026-07-24 17:30:02'),
(12, 2, 1, 'Chambre 01', 'chambre', 15.0, 430.00, 85.00, 430.00, 410.00, 1, 'Mauve Grande chambre ', '2026-07-24 17:30:02', '2026-07-24 17:30:02'),
(13, 2, 2, 'Chambre 01', 'chambre', 11.0, 430.00, 85.00, 430.00, 410.00, 1, 'Chambre verte', '2026-07-24 17:30:02', '2026-07-24 17:30:02'),
(14, 2, 3, 'Chambre 01', 'chambre', 11.0, 430.00, 85.00, 430.00, 410.00, 1, 'Chambre jaune', '2026-07-24 17:30:02', '2026-07-24 17:30:02'),
(15, 2, 4, 'Chambre 01', 'chambre', 11.0, 430.00, 85.00, 430.00, 410.00, 1, 'Chambre bleue', '2026-07-24 17:30:02', '2026-07-24 17:30:02'),
(16, 2, 5, 'Chambre 01', 'chambre', 11.0, 430.00, 85.00, 430.00, 410.00, 1, 'Chambre blanche', '2026-07-24 17:30:02', '2026-07-24 17:30:02');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` int NOT NULL DEFAULT '32',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `code`, `email_verified_at`, `password`, `roles`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Peter', 'pyr.consultant@gmail.com', 'PYROY01', '2026-08-09 06:22:36', '$2y$12$DJCAG.LO9EVT4zDAApjzR.gAddEDuWq.8Hm80U0E9r144klCKOHO2', 1, 'rYtk8IO3uwsfdZoYorNdFlGfAZA58SOsmVg52KrGaHylJJUeh9Zlc53vnGYP', '2026-08-09 06:21:45', '2026-08-09 06:22:36'),
(5, 'Jeff', 'jf.leduc@free.fr', 'JFLED01', '2026-08-22 11:54:27', '$2y$12$wOTyGIgD9prlwTanqDlz1u/bpCVz7yCAw4hOMcNiVuYV5pelSzhJG', 32, NULL, '2026-08-22 11:53:45', '2026-08-22 11:54:27'),
(6, 'kimlee', 'kimlee@free.fr', 'KILEE01', '2026-08-23 14:24:32', '$2y$12$an50BLft0QNCoIFUsVcNJeDDtC7ne8gApv2QqrE2RXs6UMH8lEl.m', 255, 'lACUuWHxT8iAw2fY5SroR1ar6CGE1xKAtV9gt7Pu6XLWcm4dDLLpEaKPlfZZ', '2026-08-23 14:23:52', '2026-09-04 07:43:56');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Index pour la table `candidats`
--
ALTER TABLE `candidats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidats_user_id_foreign` (`user_id`);

--
-- Index pour la table `egls`
--
ALTER TABLE `egls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `egls_code_unique` (`code`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `uals`
--
ALTER TABLE `uals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uals_egl_id_foreign` (`egl_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `code` (`code`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `candidats`
--
ALTER TABLE `candidats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `egls`
--
ALTER TABLE `egls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `uals`
--
ALTER TABLE `uals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidats`
--
ALTER TABLE `candidats`
  ADD CONSTRAINT `candidats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `uals`
--
ALTER TABLE `uals`
  ADD CONSTRAINT `uals_egl_id_foreign` FOREIGN KEY (`egl_id`) REFERENCES `egls` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
