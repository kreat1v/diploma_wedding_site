-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 21 2018 г., 10:04
-- Версия сервера: 10.1.25-MariaDB
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `wedding_site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `about`
--

CREATE TABLE `about` (
  `id` int(10) UNSIGNED NOT NULL,
  `ru_text` text NOT NULL,
  `en_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `answers`
--

CREATE TABLE `answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `id_comments` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `messages` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `auto_en`
--

CREATE TABLE `auto_en` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_auto` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `contacts` text NOT NULL,
  `id_language` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `auto_main`
--

CREATE TABLE `auto_main` (
  `id` int(10) UNSIGNED NOT NULL,
  `tel` char(23) NOT NULL,
  `fb` varchar(100) DEFAULT NULL,
  `inst` varchar(100) DEFAULT NULL,
  `telegram` varchar(100) DEFAULT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `stock` int(10) UNSIGNED DEFAULT NULL,
  `brand` varchar(10) DEFAULT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `auto_reviews`
--

CREATE TABLE `auto_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `reviews` text NOT NULL,
  `date` datetime NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `auto_ru`
--

CREATE TABLE `auto_ru` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_auto` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `contacts` text NOT NULL,
  `id_language` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `cake_en`
--

CREATE TABLE `cake_en` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cake` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `contacts` text NOT NULL,
  `id_language` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `cake_main`
--

CREATE TABLE `cake_main` (
  `id` int(10) UNSIGNED NOT NULL,
  `tel` char(23) NOT NULL,
  `fb` varchar(100) DEFAULT NULL,
  `inst` varchar(100) DEFAULT NULL,
  `telegram` varchar(100) DEFAULT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `stock` int(10) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `cake_reviews`
--

CREATE TABLE `cake_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `reviews` text NOT NULL,
  `date` datetime NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `cake_ru`
--

CREATE TABLE `cake_ru` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cake` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `contacts` text NOT NULL,
  `id_language` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `calls_user`
--

CREATE TABLE `calls_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `category_en`
--

CREATE TABLE `category_en` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `id_category` tinyint(3) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `full_title` varchar(100) NOT NULL,
  `first_text` text,
  `second_text` text,
  `id_language` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `category_main`
--

CREATE TABLE `category_main` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `category_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `category_ru`
--

CREATE TABLE `category_ru` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `id_category` tinyint(3) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `full_title` varchar(100) NOT NULL,
  `first_text` text,
  `second_text` text,
  `id_language` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `clothes_en`
--

CREATE TABLE `clothes_en` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_clothes` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `contacts` text NOT NULL,
  `id_language` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `clothes_main`
--

CREATE TABLE `clothes_main` (
  `id` int(10) UNSIGNED NOT NULL,
  `tel` char(23) NOT NULL,
  `fb` varchar(100) DEFAULT NULL,
  `inst` varchar(100) DEFAULT NULL,
  `telegram` varchar(100) DEFAULT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `stock` int(10) UNSIGNED DEFAULT NULL,
  `sex` tinytext NOT NULL,
  `brand` varchar(10) DEFAULT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `clothes_reviews`
--

CREATE TABLE `clothes_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `reviews` text NOT NULL,
  `date` datetime NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `clothes_ru`
--

CREATE TABLE `clothes_ru` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_clothes` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `contacts` text NOT NULL,
  `id_language` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `clothes_size`
--

CREATE TABLE `clothes_size` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_clothes` int(10) UNSIGNED NOT NULL,
  `s` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `m` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `l` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `xl` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `id_stories` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `messages` text,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `ru_text` text NOT NULL,
  `en_text` text NOT NULL,
  `ru_address` text NOT NULL,
  `en_address` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel1` char(23) DEFAULT NULL,
  `tel2` char(23) DEFAULT NULL,
  `tel3` char(23) DEFAULT NULL,
  `fb` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `telegram` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `decor_en`
--

CREATE TABLE `decor_en` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_decor` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `contacts` text NOT NULL,
  `id_language` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `decor_main`
--

CREATE TABLE `decor_main` (
  `id` int(10) UNSIGNED NOT NULL,
  `tel` char(23) NOT NULL,
  `fb` varchar(100) DEFAULT NULL,
  `inst` varchar(100) DEFAULT NULL,
  `telegram` varchar(100) DEFAULT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `stock` int(10) UNSIGNED DEFAULT NULL,
  `service` varchar(10) NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `decor_reviews`
--

CREATE TABLE `decor_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `reviews` text NOT NULL,
  `date` datetime NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `decor_ru`
--

CREATE TABLE `decor_ru` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_decor` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `contacts` text NOT NULL,
  `id_language` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `favorites`
--

CREATE TABLE `favorites` (
  `id` int(10) NOT NULL,
  `id_products` int(10) NOT NULL,
  `category` varchar(10) NOT NULL,
  `id_users` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `filming_en`
--

CREATE TABLE `filming_en` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_filming` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `contacts` text NOT NULL,
  `id_language` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `filming_main`
--

CREATE TABLE `filming_main` (
  `id` int(10) UNSIGNED NOT NULL,
  `tel` char(23) NOT NULL,
  `fb` varchar(100) DEFAULT NULL,
  `inst` varchar(100) DEFAULT NULL,
  `telegram` varchar(100) DEFAULT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `stock` int(10) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `filming_reviews`
--

CREATE TABLE `filming_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `reviews` text NOT NULL,
  `date` datetime NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `filming_ru`
--

CREATE TABLE `filming_ru` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_filming` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `contacts` text NOT NULL,
  `id_language` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `hotel_en`
--

CREATE TABLE `hotel_en` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_hotel` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `contacts` text NOT NULL,
  `id_language` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `hotel_main`
--

CREATE TABLE `hotel_main` (
  `id` int(10) UNSIGNED NOT NULL,
  `tel` char(23) NOT NULL,
  `fb` varchar(100) DEFAULT NULL,
  `inst` varchar(100) DEFAULT NULL,
  `telegram` varchar(100) DEFAULT NULL,
  `stars` tinyint(1) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `stock` int(10) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `hotel_reviews`
--

CREATE TABLE `hotel_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `reviews` text NOT NULL,
  `date` datetime NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `hotel_ru`
--

CREATE TABLE `hotel_ru` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_hotel` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `contacts` text NOT NULL,
  `id_language` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `language`
--

CREATE TABLE `language` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `leading_en`
--

CREATE TABLE `leading_en` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_leading` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `contacts` text NOT NULL,
  `id_language` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `leading_main`
--

CREATE TABLE `leading_main` (
  `id` int(10) UNSIGNED NOT NULL,
  `tel` char(23) NOT NULL,
  `fb` varchar(100) DEFAULT NULL,
  `inst` varchar(100) DEFAULT NULL,
  `telegram` varchar(100) DEFAULT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `stock` int(10) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `leading_reviews`
--

CREATE TABLE `leading_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `reviews` text NOT NULL,
  `date` datetime NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `leading_ru`
--

CREATE TABLE `leading_ru` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_leading` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `contacts` text NOT NULL,
  `id_language` tinyint(3) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `like_comments`
--

CREATE TABLE `like_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_comments` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `like_stories`
--

CREATE TABLE `like_stories` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_stories` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `messages_admin`
--

CREATE TABLE `messages_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `messages_user`
--

CREATE TABLE `messages_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `message` text,
  `payment` varchar(20) NOT NULL,
  `price` int(15) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_orders` int(10) UNSIGNED NOT NULL,
  `id_products` int(10) UNSIGNED NOT NULL,
  `category` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `stories_en`
--

CREATE TABLE `stories_en` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_stories` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `stories_main`
--

CREATE TABLE `stories_main` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `stories_ru`
--

CREATE TABLE `stories_ru` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_stories` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `secondName` varchar(45) DEFAULT NULL,
  `sex` tinytext,
  `email` varchar(100) NOT NULL,
  `tel` char(23) DEFAULT NULL,
  `role` varchar(45) NOT NULL DEFAULT 'admin',
  `password` char(32) NOT NULL,
  `secretkey` varchar(13) NOT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `views`
--

CREATE TABLE `views` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_stories` int(10) UNSIGNED NOT NULL,
  `ip` int(20) UNSIGNED DEFAULT NULL,
  `id_users` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_comments` (`id_comments`),
  ADD KEY `id_user` (`id_users`);

--
-- Индексы таблицы `auto_en`
--
ALTER TABLE `auto_en`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_clothes` (`id_auto`),
  ADD KEY `id_language` (`id_language`);

--
-- Индексы таблицы `auto_main`
--
ALTER TABLE `auto_main`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `auto_reviews`
--
ALTER TABLE `auto_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `auto_ru`
--
ALTER TABLE `auto_ru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_clothes` (`id_auto`),
  ADD KEY `id_language` (`id_language`);

--
-- Индексы таблицы `cake_en`
--
ALTER TABLE `cake_en`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_clothes` (`id_cake`),
  ADD KEY `id_language` (`id_language`);

--
-- Индексы таблицы `cake_main`
--
ALTER TABLE `cake_main`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cake_reviews`
--
ALTER TABLE `cake_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `cake_ru`
--
ALTER TABLE `cake_ru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_clothes` (`id_cake`),
  ADD KEY `id_language` (`id_language`);

--
-- Индексы таблицы `calls_user`
--
ALTER TABLE `calls_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category_en`
--
ALTER TABLE `category_en`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_language` (`id_language`);

--
-- Индексы таблицы `category_main`
--
ALTER TABLE `category_main`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category_ru`
--
ALTER TABLE `category_ru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_language` (`id_language`);

--
-- Индексы таблицы `clothes_en`
--
ALTER TABLE `clothes_en`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_language` (`id_language`),
  ADD KEY `id_clothes` (`id_clothes`);

--
-- Индексы таблицы `clothes_main`
--
ALTER TABLE `clothes_main`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clothes_reviews`
--
ALTER TABLE `clothes_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `clothes_ru`
--
ALTER TABLE `clothes_ru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_language` (`id_language`),
  ADD KEY `id_clothes` (`id_clothes`);

--
-- Индексы таблицы `clothes_size`
--
ALTER TABLE `clothes_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_clothes` (`id_clothes`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_news` (`id_stories`),
  ADD KEY `id_user` (`id_users`);

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `decor_en`
--
ALTER TABLE `decor_en`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_clothes` (`id_decor`),
  ADD KEY `id_language` (`id_language`);

--
-- Индексы таблицы `decor_main`
--
ALTER TABLE `decor_main`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `decor_reviews`
--
ALTER TABLE `decor_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `decor_ru`
--
ALTER TABLE `decor_ru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_clothes` (`id_decor`),
  ADD KEY `id_language` (`id_language`);

--
-- Индексы таблицы `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `filming_en`
--
ALTER TABLE `filming_en`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_clothes` (`id_filming`),
  ADD KEY `id_language` (`id_language`);

--
-- Индексы таблицы `filming_main`
--
ALTER TABLE `filming_main`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `filming_reviews`
--
ALTER TABLE `filming_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `filming_ru`
--
ALTER TABLE `filming_ru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_clothes` (`id_filming`),
  ADD KEY `id_language` (`id_language`);

--
-- Индексы таблицы `hotel_en`
--
ALTER TABLE `hotel_en`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_clothes` (`id_hotel`),
  ADD KEY `id_language` (`id_language`);

--
-- Индексы таблицы `hotel_main`
--
ALTER TABLE `hotel_main`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hotel_reviews`
--
ALTER TABLE `hotel_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `hotel_ru`
--
ALTER TABLE `hotel_ru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_clothes` (`id_hotel`),
  ADD KEY `id_language` (`id_language`);

--
-- Индексы таблицы `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `leading_en`
--
ALTER TABLE `leading_en`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_clothes` (`id_leading`),
  ADD KEY `id_language` (`id_language`);

--
-- Индексы таблицы `leading_main`
--
ALTER TABLE `leading_main`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `leading_reviews`
--
ALTER TABLE `leading_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `leading_ru`
--
ALTER TABLE `leading_ru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_clothes` (`id_leading`),
  ADD KEY `id_language` (`id_language`);

--
-- Индексы таблицы `like_comments`
--
ALTER TABLE `like_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_stories` (`id_comments`),
  ADD KEY `id_users` (`id_users`);

--
-- Индексы таблицы `like_stories`
--
ALTER TABLE `like_stories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_stories` (`id_stories`),
  ADD KEY `id_users` (`id_users`);

--
-- Индексы таблицы `messages_admin`
--
ALTER TABLE `messages_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- Индексы таблицы `messages_user`
--
ALTER TABLE `messages_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_payment` (`payment`);

--
-- Индексы таблицы `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_orders` (`id_orders`);

--
-- Индексы таблицы `stories_en`
--
ALTER TABLE `stories_en`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stories_main`
--
ALTER TABLE `stories_main`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stories_ru`
--
ALTER TABLE `stories_ru`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_stories` (`id_stories`),
  ADD KEY `id_users` (`ip`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `about`
--
ALTER TABLE `about`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT для таблицы `auto_en`
--
ALTER TABLE `auto_en`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `auto_main`
--
ALTER TABLE `auto_main`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `auto_reviews`
--
ALTER TABLE `auto_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT для таблицы `auto_ru`
--
ALTER TABLE `auto_ru`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `cake_en`
--
ALTER TABLE `cake_en`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `cake_main`
--
ALTER TABLE `cake_main`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `cake_reviews`
--
ALTER TABLE `cake_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT для таблицы `cake_ru`
--
ALTER TABLE `cake_ru`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `calls_user`
--
ALTER TABLE `calls_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `category_en`
--
ALTER TABLE `category_en`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `category_main`
--
ALTER TABLE `category_main`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `category_ru`
--
ALTER TABLE `category_ru`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `clothes_en`
--
ALTER TABLE `clothes_en`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT для таблицы `clothes_main`
--
ALTER TABLE `clothes_main`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT для таблицы `clothes_reviews`
--
ALTER TABLE `clothes_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT для таблицы `clothes_ru`
--
ALTER TABLE `clothes_ru`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT для таблицы `clothes_size`
--
ALTER TABLE `clothes_size`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `decor_en`
--
ALTER TABLE `decor_en`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `decor_main`
--
ALTER TABLE `decor_main`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `decor_reviews`
--
ALTER TABLE `decor_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `decor_ru`
--
ALTER TABLE `decor_ru`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT для таблицы `filming_en`
--
ALTER TABLE `filming_en`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `filming_main`
--
ALTER TABLE `filming_main`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `filming_reviews`
--
ALTER TABLE `filming_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT для таблицы `filming_ru`
--
ALTER TABLE `filming_ru`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `hotel_en`
--
ALTER TABLE `hotel_en`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `hotel_main`
--
ALTER TABLE `hotel_main`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `hotel_reviews`
--
ALTER TABLE `hotel_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `hotel_ru`
--
ALTER TABLE `hotel_ru`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `language`
--
ALTER TABLE `language`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `leading_en`
--
ALTER TABLE `leading_en`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `leading_main`
--
ALTER TABLE `leading_main`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `leading_reviews`
--
ALTER TABLE `leading_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT для таблицы `leading_ru`
--
ALTER TABLE `leading_ru`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `like_comments`
--
ALTER TABLE `like_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT для таблицы `like_stories`
--
ALTER TABLE `like_stories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT для таблицы `messages_admin`
--
ALTER TABLE `messages_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT для таблицы `messages_user`
--
ALTER TABLE `messages_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT для таблицы `stories_en`
--
ALTER TABLE `stories_en`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблицы `stories_main`
--
ALTER TABLE `stories_main`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблицы `stories_ru`
--
ALTER TABLE `stories_ru`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблицы `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `views`
--
ALTER TABLE `views`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`id_comments`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auto_en`
--
ALTER TABLE `auto_en`
  ADD CONSTRAINT `auto_en_ibfk_1` FOREIGN KEY (`id_auto`) REFERENCES `auto_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auto_en_ibfk_2` FOREIGN KEY (`id_language`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auto_reviews`
--
ALTER TABLE `auto_reviews`
  ADD CONSTRAINT `auto_reviews_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auto_reviews_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `auto_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auto_ru`
--
ALTER TABLE `auto_ru`
  ADD CONSTRAINT `auto_ru_ibfk_1` FOREIGN KEY (`id_auto`) REFERENCES `auto_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auto_ru_ibfk_2` FOREIGN KEY (`id_language`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `cake_en`
--
ALTER TABLE `cake_en`
  ADD CONSTRAINT `cake_en_ibfk_1` FOREIGN KEY (`id_cake`) REFERENCES `cake_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cake_en_ibfk_2` FOREIGN KEY (`id_language`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `cake_reviews`
--
ALTER TABLE `cake_reviews`
  ADD CONSTRAINT `cake_reviews_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cake_reviews_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `cake_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `cake_ru`
--
ALTER TABLE `cake_ru`
  ADD CONSTRAINT `cake_ru_ibfk_1` FOREIGN KEY (`id_cake`) REFERENCES `cake_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cake_ru_ibfk_2` FOREIGN KEY (`id_language`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `category_en`
--
ALTER TABLE `category_en`
  ADD CONSTRAINT `category_en_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_en_ibfk_2` FOREIGN KEY (`id_language`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `category_ru`
--
ALTER TABLE `category_ru`
  ADD CONSTRAINT `category_ru_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_ru_ibfk_2` FOREIGN KEY (`id_language`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `clothes_en`
--
ALTER TABLE `clothes_en`
  ADD CONSTRAINT `clothes_en_ibfk_2` FOREIGN KEY (`id_language`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clothes_en_ibfk_3` FOREIGN KEY (`id_clothes`) REFERENCES `clothes_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `clothes_reviews`
--
ALTER TABLE `clothes_reviews`
  ADD CONSTRAINT `clothes_reviews_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clothes_reviews_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `clothes_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `clothes_ru`
--
ALTER TABLE `clothes_ru`
  ADD CONSTRAINT `clothes_ru_ibfk_2` FOREIGN KEY (`id_language`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clothes_ru_ibfk_3` FOREIGN KEY (`id_clothes`) REFERENCES `clothes_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `clothes_size`
--
ALTER TABLE `clothes_size`
  ADD CONSTRAINT `clothes_size_ibfk_1` FOREIGN KEY (`id_clothes`) REFERENCES `clothes_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_stories`) REFERENCES `stories_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `decor_en`
--
ALTER TABLE `decor_en`
  ADD CONSTRAINT `decor_en_ibfk_1` FOREIGN KEY (`id_decor`) REFERENCES `decor_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `decor_en_ibfk_2` FOREIGN KEY (`id_language`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `decor_reviews`
--
ALTER TABLE `decor_reviews`
  ADD CONSTRAINT `decor_reviews_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `decor_reviews_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `decor_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `decor_ru`
--
ALTER TABLE `decor_ru`
  ADD CONSTRAINT `decor_ru_ibfk_1` FOREIGN KEY (`id_decor`) REFERENCES `decor_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `decor_ru_ibfk_2` FOREIGN KEY (`id_language`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `filming_en`
--
ALTER TABLE `filming_en`
  ADD CONSTRAINT `filming_en_ibfk_1` FOREIGN KEY (`id_filming`) REFERENCES `filming_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `filming_en_ibfk_2` FOREIGN KEY (`id_language`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `filming_reviews`
--
ALTER TABLE `filming_reviews`
  ADD CONSTRAINT `filming_reviews_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `filming_reviews_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `filming_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `filming_ru`
--
ALTER TABLE `filming_ru`
  ADD CONSTRAINT `filming_ru_ibfk_1` FOREIGN KEY (`id_filming`) REFERENCES `filming_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `filming_ru_ibfk_2` FOREIGN KEY (`id_language`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `hotel_en`
--
ALTER TABLE `hotel_en`
  ADD CONSTRAINT `hotel_en_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotel_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hotel_en_ibfk_2` FOREIGN KEY (`id_language`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `hotel_reviews`
--
ALTER TABLE `hotel_reviews`
  ADD CONSTRAINT `hotel_reviews_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hotel_reviews_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `hotel_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `hotel_ru`
--
ALTER TABLE `hotel_ru`
  ADD CONSTRAINT `hotel_ru_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotel_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hotel_ru_ibfk_2` FOREIGN KEY (`id_language`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `leading_en`
--
ALTER TABLE `leading_en`
  ADD CONSTRAINT `leading_en_ibfk_1` FOREIGN KEY (`id_leading`) REFERENCES `leading_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `leading_en_ibfk_2` FOREIGN KEY (`id_language`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `leading_reviews`
--
ALTER TABLE `leading_reviews`
  ADD CONSTRAINT `leading_reviews_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `leading_reviews_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `leading_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `leading_ru`
--
ALTER TABLE `leading_ru`
  ADD CONSTRAINT `leading_ru_ibfk_1` FOREIGN KEY (`id_leading`) REFERENCES `leading_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `leading_ru_ibfk_2` FOREIGN KEY (`id_language`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `like_comments`
--
ALTER TABLE `like_comments`
  ADD CONSTRAINT `like_comments_ibfk_1` FOREIGN KEY (`id_comments`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_comments_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `like_stories`
--
ALTER TABLE `like_stories`
  ADD CONSTRAINT `like_stories_ibfk_1` FOREIGN KEY (`id_stories`) REFERENCES `stories_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_stories_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `messages_admin`
--
ALTER TABLE `messages_admin`
  ADD CONSTRAINT `messages_admin_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `messages_user`
--
ALTER TABLE `messages_user`
  ADD CONSTRAINT `messages_user_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_products_ibfk_1` FOREIGN KEY (`id_orders`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `views`
--
ALTER TABLE `views`
  ADD CONSTRAINT `views_ibfk_1` FOREIGN KEY (`id_stories`) REFERENCES `stories_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
