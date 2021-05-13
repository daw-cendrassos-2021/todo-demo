-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Temps de generació: 13-05-2021 a les 10:23:32
-- Versió del servidor: 10.5.9-MariaDB-1:10.5.9+maria~focal
-- Versió de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de dades: `dades`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `tasques`
--

CREATE TABLE `tasques` (
  `id` int(11) NOT NULL,
  `tasca` text NOT NULL,
  `borrat` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `tasques`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tasques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;
