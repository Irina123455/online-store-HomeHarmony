-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 24 2025 г., 15:42
-- Версия сервера: 10.1.44-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `homeharmony`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci,
  `product_price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `added_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,2) NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `price`, `image_path`) VALUES
(1, 'Прямой бежевый диван в скандинавском стиле', 'Светлый бежевый диван в скандинавском стиле – это воплощение простоты и уюта. Мягкая, приятная на ощупь ткань, чистые линии и минималистичный дизайн создают светлую, воздушную атмосферу, располагающую к отдыху.', '27.00', '../media/sofa1.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fio`, `phone`, `password`, `profile_image`) VALUES
(1, 'Лёвина Ирина Александровна', 2147483647, '$2y$10$9jx9QgWTYauepxh/zdwWOuAFBPdMCm4jyb4vyI51ti24NrECnKema', NULL),
(2, 'Кузьмина Алена Игоревна', 2147483647, '$2y$10$SDekB2H/glJwnM7Bs10T9OJGo0ucYwj4n7NDJ2tpkFrk.1z6EOexq', NULL),
(3, 'Лёвина Ирина Александровна', 2147483647, '$2y$10$esyoLGZote4.W.iolsGmduEWVRA0iRg147gmbJjNYwZrkU46c1wy6', NULL),
(4, 'Лёвина Ирина Александровна', 2147483647, '$2y$10$l7bQGz8oYgOIZfzDA4ggB.IEQr/OaLmp3CI5IxFeucaoHC3bUpmDi', NULL),
(5, 'Белов Максим Владимирович', 2147483647, '$2y$10$lVO1.EYiCb72PNzyXw/4Nu/iju8ZNHGDNlNzZjmc7moaHYBaDsBvG', NULL),
(6, 'Лёвина Ирина Александровна', 2147483647, '$2y$10$7WQvngr8wmVAs4LwPYGXiet2vaK04yDwnrA9.Mygzzq/l9tY3wToS', NULL),
(7, 'Лёвина Ирина Александровна', 2147483647, '$2y$10$VWSFzMY.H65PGJ2Ybn8dmeHNcQ19Jx1OjO29j11mel5u5frTergFy', NULL),
(8, 'Лёвина Ирина Александровна', 654563486, '$2y$10$.wbYVotndZAAGxNe4jTGMeI.GNEqT5YP.WOJ2tDJQBYYPfg9O1jkG', 'uploads/6879439b62ac5.jpg'),
(9, 'Лёвина Ирина Александровна', 7, '$2y$10$rKiqqIEoB/WzCa6OgczEIemEgyy22ZCgR7MYheE4l58GOfXwC4zUq', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
