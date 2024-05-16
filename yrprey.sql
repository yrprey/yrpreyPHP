-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2024 a las 14:23:13
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `yrprey`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--

CREATE TABLE `comment` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comment`
--

INSERT INTO `comment` (`id`, `name`, `comment`) VALUES
(7, 'user', 'Good hacking');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `product` text NOT NULL,
  `img` text NOT NULL,
  `price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tool`
--

CREATE TABLE `tool` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `category` text NOT NULL,
  `price` text NOT NULL,
  `description` text NOT NULL,
  `img` text NOT NULL,
  `estrelas` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tool`
--

INSERT INTO `tool` (`id`, `name`, `category`, `price`, `description`, `img`, `estrelas`) VALUES
(6, 'Ax', 'Attack', '0.00000050', 'Ax used for attacks.', 'product1.jpg', 3),
(7, 'Helmet', 'Defense', '0.00000010', 'Powerful helmet that increases the protection probability to continue in battle.', 'product2.jpg', 4),
(8, 'Hammer', 'Attack', '0.00000030', 'Powerful hammer for removing objects.', 'product3.jpg', 3),
(9, 'Sword', 'Attack', '0.00000100', 'An extremely sharp sword to attack the enemy army in medieval battle.', 'product4.jpg', 5),
(10, 'Shield', 'Defense', '0.00000080', 'Increases defense power, except for the sword.', 'product5.jpg', 3),
(11, 'Magic Portion', 'Attack', '0.00000098', 'Magic portion for the great wizard.', 'product6.jpg', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` text NOT NULL,
  `nick` text NOT NULL,
  `pass` text NOT NULL,
  `saldo` text NOT NULL,
  `permission` text NOT NULL,
  `qtde` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `nick`, `pass`, `saldo`, `permission`, `qtde`) VALUES
(3, 'root', 'root', '1234567890', '0', 'admin', '0'),
(4, 'user', 'user01', '1234567890', '0', 'user', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `warrior`
--

CREATE TABLE `warrior` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `category` text NOT NULL,
  `price` text NOT NULL,
  `description` text NOT NULL,
  `img` text NOT NULL,
  `estrelas` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `warrior`
--

INSERT INTO `warrior` (`id`, `name`, `category`, `price`, `description`, `img`, `estrelas`) VALUES
(1, 'Mage', 'Attack', '0.00000050', 'They have limiting powers to paralyze time and defeat enemies.', 'warrior10.png', 3),
(2, 'Night Warrior', 'Defense', '0.00000010', 'Powerful helmet that increases the protection probability to continue in battle.', 'warrior2.jpg', 4),
(3, 'Red Laser', 'Attack', '0.00000030', 'Powerful hammer for removing objects.', 'warrior3.jpg', 3),
(4, 'Arrow Girl', 'Attack', '0.00000100', 'Defeat enemies through enchantment..', 'warrior4.jpg', 5),
(5, 'Lecy', 'Defense', '0.00000080', 'Innovative attack techniques and strategies.', 'warrior5.jpg', 3),
(6, 'Mage Girl', 'Attack', '0.00000098', 'Defeat enemies through enchantment.', 'warrior6.jpg', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tool`
--
ALTER TABLE `tool`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `warrior`
--
ALTER TABLE `warrior`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tool`
--
ALTER TABLE `tool`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `warrior`
--
ALTER TABLE `warrior`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
