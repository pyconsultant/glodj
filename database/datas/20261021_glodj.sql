-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 21 oct. 2026 à 14:19
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
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` int NOT NULL DEFAULT '32',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `code`, `email_verified_at`, `password`, `roles`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Peter', 'pyr.consultant@gmail.com', 'PYROY01', '2026-08-09 04:22:36', '$2y$12$DJCAG.LO9EVT4zDAApjzR.gAddEDuWq.8Hm80U0E9r144klCKOHO2', 1, 'ENUJQJG53vYUZ72suWhLOgEXhWNQehgKGCl3ABNnD69kvBDAS6UaN3RXfVQi', '2026-08-09 04:21:45', '2026-08-09 04:22:36'),
(5, 'Jeff', 'jf.leduc@free.fr', 'JFLED01', '2026-08-22 09:54:27', '$2y$12$wOTyGIgD9prlwTanqDlz1u/bpCVz7yCAw4hOMcNiVuYV5pelSzhJG', 32, NULL, '2026-08-22 09:53:45', '2026-08-22 09:54:27'),
(6, 'kimlee', 'kimlee@free.fr', 'KILEE01', '2026-08-23 12:24:32', '$2y$12$an50BLft0QNCoIFUsVcNJeDDtC7ne8gApv2QqrE2RXs6UMH8lEl.m', 255, 'aDzmkuRcas4fjxSaaNlWwwLXWxpY3nle1wtUovIhD3IcNCH9hKXu7DB9HEQU', '2026-08-23 12:23:52', '2026-09-04 05:43:56');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_code_unique` (`code`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
