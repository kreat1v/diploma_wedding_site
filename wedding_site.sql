-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 27 2018 г., 11:08
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

--
-- Дамп данных таблицы `auto_en`
--

INSERT INTO `auto_en` (`id`, `id_auto`, `title`, `text`, `contacts`, `id_language`) VALUES
(1, 1, 'Donec pede justo', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 1),
(2, 2, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(4, 3, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(5, 4, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(6, 5, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(7, 6, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(8, 7, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(9, 8, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(10, 9, 'dsfsdfsdfdsf', 'fdsfsdfsdfsd', 'eqweqweqweq', 1);

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

--
-- Дамп данных таблицы `auto_main`
--

INSERT INTO `auto_main` (`id`, `tel`, `fb`, `inst`, `telegram`, `price`, `stock`, `brand`, `active`) VALUES
(1, '+38 (095) 815 - 00 - 00', 'wwwww', 'wwwww', NULL, 1000, 900, 'Nike', 1),
(2, '0950578456', 'facebook.com/kreatds', 'instagram.com/kreatds', 'telegram.me/kreatds', 650, NULL, 'Lessa', 0),
(3, '0998475641', 'facebook.com/inst', NULL, 'https://telegram.me/fefefe', 975, NULL, 'Lari', 0),
(4, '0998475641', 'facebook.com/inst', 'instagram.com/inst', 'https://telegram.me/fefefe', 975, NULL, 'Lari', 0),
(5, '0998475555', NULL, 'instagram.com/inst', 'https://telegram.me/fefefe', 700, NULL, 'Lari', 0),
(6, '0997775641', 'facebook.com/vert', 'instagram.com/vert', 'https://telegram.me/vert', 1800, NULL, 'Dan', 0),
(7, '0991001178', NULL, NULL, 'https://telegram.me/tara', 980, NULL, 'La La', 0),
(8, '0991001178', NULL, NULL, 'https://telegram.me/tara', 1000, NULL, 'La La', 0),
(9, '+38 (444) 444 - 44 - 44', NULL, NULL, 'wqewqe', 4444, NULL, 'Hondae', 1);

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

--
-- Дамп данных таблицы `auto_reviews`
--

INSERT INTO `auto_reviews` (`id`, `id_product`, `id_users`, `reviews`, `date`, `active`) VALUES
(22, 1, 6, '11111', '2018-06-18 15:10:47', 1),
(23, 1, 6, '111111', '2018-06-18 15:10:52', 1),
(24, 1, 6, '11111', '2018-06-18 15:10:56', 1),
(25, 1, 6, '1111', '2018-06-18 15:11:00', 1),
(26, 1, 6, '111111', '2018-06-18 15:11:04', 1),
(27, 1, 6, '1111', '2018-06-18 15:11:11', 1),
(28, 1, 6, '11111', '2018-06-18 15:11:23', 1),
(29, 1, 6, '111111', '2018-06-18 15:11:30', 1),
(30, 2, 6, '2222', '2018-06-18 15:17:09', 1),
(31, 2, 6, '22222', '2018-06-18 15:17:15', 1),
(32, 2, 6, '222', '2018-06-18 15:17:21', 1),
(33, 2, 6, '22222', '2018-06-18 15:17:28', 1),
(34, 2, 6, '22222', '2018-06-18 15:17:32', 1),
(35, 2, 6, '22222', '2018-06-18 15:17:38', 1),
(36, 2, 6, '22222', '2018-06-18 15:17:42', 1);

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

--
-- Дамп данных таблицы `auto_ru`
--

INSERT INTO `auto_ru` (`id`, `id_auto`, `title`, `text`, `contacts`, `id_language`) VALUES
(1, 1, 'Проснувшись однажды', 'Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами. «Что со мной случилось? » – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах. Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами. «Что со мной случилось? » – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах.', 'Его комната, настоящая, разве что слишком маленькая.', 2),
(2, 2, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых.', 2),
(3, 3, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых и диких знаках.', 2),
(4, 4, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(5, 5, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(6, 6, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(7, 7, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(8, 8, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(9, 9, 'fdsfdsfsdfsd', 'fsdfsdfsd', 'wqewqewq', 2);

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

--
-- Дамп данных таблицы `cake_en`
--

INSERT INTO `cake_en` (`id`, `id_cake`, `title`, `text`, `contacts`, `id_language`) VALUES
(1, 1, 'Cake!!!', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 1),
(2, 2, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(4, 3, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(5, 4, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(6, 5, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(7, 6, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(8, 7, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(9, 8, 'retret', 'tertertertert', '423423432', 1),
(10, 9, 'ваиоывиарвы', 'авыавыавыа', 'куцкцкцк', 1);

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

--
-- Дамп данных таблицы `cake_main`
--

INSERT INTO `cake_main` (`id`, `tel`, `fb`, `inst`, `telegram`, `price`, `stock`, `active`) VALUES
(1, '+38 (066) 778 - 89 - 99', '324324', '324324', '324324', 2000, 1500, 1),
(2, '0950578456', 'facebook.com/kreatds', 'instagram.com/kreatds', 'telegram.me/kreatds', 650, NULL, 1),
(3, '0998475641', 'facebook.com/inst', NULL, 'https://telegram.me/fefefe', 975, NULL, 1),
(4, '0998475641', 'facebook.com/inst', 'instagram.com/inst', 'https://telegram.me/fefefe', 975, NULL, 1),
(5, '0998475555', NULL, 'instagram.com/inst', 'https://telegram.me/fefefe', 700, NULL, 1),
(6, '0997775641', 'facebook.com/vert', 'instagram.com/vert', 'https://telegram.me/vert', 1800, NULL, 1),
(7, '0991001178', NULL, NULL, 'https://telegram.me/tara', 980, NULL, 1),
(8, '+38 (432) 423 - 42 - 34', '432423423', NULL, NULL, 4324, NULL, 0),
(9, '+38 (543) 543 - 53 - 45', NULL, NULL, NULL, 4344, 67, 1);

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

--
-- Дамп данных таблицы `cake_reviews`
--

INSERT INTO `cake_reviews` (`id`, `id_product`, `id_users`, `reviews`, `date`, `active`) VALUES
(22, 1, 6, '11111', '2018-06-18 15:10:47', 1),
(23, 1, 6, '111111', '2018-06-18 15:10:52', 1),
(24, 1, 6, '11111', '2018-06-18 15:10:56', 1),
(25, 1, 6, '1111', '2018-06-18 15:11:00', 1),
(26, 1, 6, '111111', '2018-06-18 15:11:04', 1),
(27, 1, 6, '1111', '2018-06-18 15:11:11', 1),
(28, 1, 6, '11111', '2018-06-18 15:11:23', 1),
(29, 1, 6, '111111', '2018-06-18 15:11:30', 1),
(30, 2, 6, '2222', '2018-06-18 15:17:09', 1),
(31, 2, 6, '22222', '2018-06-18 15:17:15', 1),
(32, 2, 6, '222', '2018-06-18 15:17:21', 1),
(33, 2, 6, '22222', '2018-06-18 15:17:28', 1),
(34, 2, 6, '22222', '2018-06-18 15:17:32', 1),
(35, 2, 6, '22222', '2018-06-18 15:17:38', 1),
(36, 2, 6, '22222', '2018-06-18 15:17:42', 1);

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

--
-- Дамп данных таблицы `cake_ru`
--

INSERT INTO `cake_ru` (`id`, `id_cake`, `title`, `text`, `contacts`, `id_language`) VALUES
(1, 1, 'Большой торт', 'Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами. «Что со мной случилось? » – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах. Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами. «Что со мной случилось? » – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах.', 'Его комната, настоящая, разве что слишком маленькая.', 2),
(2, 2, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых.', 2),
(3, 3, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых и диких знаках.', 2),
(4, 4, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(5, 5, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(6, 6, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(7, 7, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(8, 8, 'Njnjjj', 'tretretertre', '423432', 2),
(9, 9, 'Фотогрф Денис', 'авыавыавыа', 'куцкцук', 2);

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

--
-- Дамп данных таблицы `calls_user`
--

INSERT INTO `calls_user` (`id`, `id_users`, `date`, `active`) VALUES
(1, 4, '2018-06-08 11:20:41', 0),
(4, 4, '2018-06-08 11:20:41', 0),
(6, 6, '2018-06-08 11:11:58', 0),
(7, 6, '2018-06-08 11:16:15', 0),
(8, 6, '2018-06-08 11:21:03', 0),
(9, 7, '2018-06-25 17:08:28', 0),
(10, 4, '2018-06-08 21:16:29', 1),
(11, 8, '2018-06-25 15:28:15', 1),
(12, 9, '2018-06-25 17:08:49', 0),
(13, 5, '2018-06-25 17:06:42', 1),
(14, 6, '2018-06-25 17:07:09', 1);

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

--
-- Дамп данных таблицы `category_en`
--

INSERT INTO `category_en` (`id`, `id_category`, `title`, `full_title`, `first_text`, `second_text`, `id_language`) VALUES
(3, 1, 'Decor', 'Making your ceremony', '<p>Ad possit debitis sea, ea hinc discere dissentiet mel, persius posidonium sadipscing pri no. Vix fugit nusquam fierent in, cu probo congue ius. Cu regione viderer pro, quot veniam appetere et vix. Cum at nisl praesent. No nam nostro audire, no sit populo tibique, id ceteros appetere platonem pri. An graecis salutatus sed. His an dico efficiendi, novum eruditi at nec, vel ei affert mucius consequat.</p><p>Ex prompta constituam vis, an eos deleniti tractatos, nam alii aliquando temporibus eu. Duo ei nulla animal elaboraret. Meis adhuc id vix, ne nam nihil graecis antiopam. Vel ea eligendi perfecto repudiandae, no pri tation deterruisset. Ei unum nihil sea, tantas minimum invidunt vel an, nominavi delicata posidonium cum no. Porro adversarium cum eu, admodum lucilius nec at, eu magna definitionem has. Nam lorem movet tollit in.</p><p>Harum euismod assentior ei has, vidisse principes consetetur ne vel. No iriure eripuit quo, integre persequeris ex vis, ne has autem probatus. Elit copiosae efficiendi te sea, duo ad aeterno graecis, an populo assueverit sit. Vis an fabulas graecis expetenda, natum quaestio at vim. Cu sed nisl utroque vituperatoribus, ne vim stet ocurreret.</p><p>Nihil iracundia usu in, sit ex admodum liberavisse necessitatibus, menandri dissentiunt at his. Pri at saepe tamquam expetenda, cu eros mollis blandit eos, possit quaestio ut nec. Te expetenda evertitur vis, semper dictas eleifend cum at. Mea deserunt maiestatis percipitur ex, te sea habeo percipitur, qui ne harum tritani persequeris. Eos eu quod dolore. Ius erat illum eu, tractatos mediocrem vim ea.</p>', '<p>Ad possit debitis sea, ea hinc discere dissentiet mel, persius posidonium sadipscing pri no. Vix fugit nusquam fierent in, cu probo congue ius. Cu regione viderer pro, quot veniam appetere et vix.</p><p>Cum at nisl praesent. No nam nostro audire, no sit populo tibique, id ceteros appetere platonem pri. An graecis salutatus sed. His an dico efficiendi, novum eruditi at nec, vel ei affert mucius consequat.</p>', 1),
(4, 2, 'Clothes', 'Men\'s suits and women\'s wedding dresses', '<p>Ad possit debitis sea, ea hinc discere dissentiet mel, persius posidonium sadipscing pri no. Vix fugit nusquam fierent in, cu probo congue ius. Cu regione viderer pro, quot veniam appetere et vix. Cum at nisl praesent. No nam nostro audire, no sit populo tibique, id ceteros appetere platonem pri. </p><p>An graecis salutatus sed. His an dico efficiendi, novum eruditi at nec, vel ei affert mucius consequat. Ex prompta constituam vis, an eos deleniti tractatos, nam alii aliquando temporibus eu. Duo ei nulla animal elaboraret. Meis adhuc id vix, ne nam nihil graecis antiopam. Vel ea eligendi perfecto repudiandae, no pri tation deterruisset. Ei unum nihil sea, tantas minimum invidunt vel an, nominavi delicata posidonium cum no. Porro adversarium cum eu, admodum lucilius nec at, eu magna definitionem has. </p><p>Nam lorem movet tollit in. Harum euismod assentior ei has, vidisse principes consetetur ne vel. No iriure eripuit quo, integre persequeris ex vis, ne has autem probatus. Elit copiosae efficiendi te sea, duo ad aeterno graecis, an populo assueverit sit. Vis an fabulas graecis expetenda, natum quaestio at vim. Cu sed nisl utroque vituperatoribus, ne vim stet ocurreret.</p><p>Nihil iracundia usu in, sit ex admodum liberavisse necessitatibus, menandri dissentiunt at his. Pri at saepe tamquam expetenda, cu eros mollis blandit eos, possit quaestio ut nec. Te expetenda evertitur vis, semper dictas eleifend cum at. Mea deserunt maiestatis percipitur ex, te sea habeo percipitur, qui ne harum tritani persequeris. Eos eu quod dolore. Ius erat illum eu, tractatos mediocrem vim ea.</p>', '<p>Ad possit debitis sea, ea hinc discere dissentiet mel, persius posidonium sadipscing pri no. </p><p>Vix fugit nusquam fierent in, cu probo congue ius. Cu regione viderer pro, quot veniam appetere et vix. Cum at nisl praesent. No nam nostro audire, no sit populo tibique, id ceteros appetere platonem pri. An graecis salutatus sed. </p><p>His an dico efficiendi, novum eruditi at nec, vel ei affert mucius consequat.</p>', 1),
(5, 3, 'Auto', 'Car for your wedding', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p><p>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p><p>Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.</p>', '<p>Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus.</p><p>Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.</p>', 1),
(6, 4, 'Filming', 'Photo and video accompaniment', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p><p>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p><p>Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.</p>', '<p>Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus.</p><p>Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.</p>', 1),
(7, 5, 'Leading', 'The leader of your event', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p><p>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p><p>Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.</p>', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. </p><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p><p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>', 1),
(8, 6, 'Cake', 'A wedding cake', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p><p>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p><p>Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.</p>', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p><p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>', 1),
(9, 7, 'Hotel', 'Hotel - a place of rest for you and your guests', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p><p>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p><p>Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.</p>', '<p>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.</p><p>Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p>', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `category_main`
--

CREATE TABLE `category_main` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `category_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category_main`
--

INSERT INTO `category_main` (`id`, `active`, `category_name`) VALUES
(1, 1, 'decor'),
(2, 1, 'clothes'),
(3, 1, 'auto'),
(4, 1, 'filming'),
(5, 1, 'leading'),
(6, 1, 'cake'),
(7, 1, 'hotel');

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

--
-- Дамп данных таблицы `category_ru`
--

INSERT INTO `category_ru` (`id`, `id_category`, `title`, `full_title`, `first_text`, `second_text`, `id_language`) VALUES
(1, 1, 'Оформление', 'Оформление вашей церемонии', '<p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана. Маленький ручеек Даль журчит по всей стране и обеспечивает ее всеми необходимыми правилами. Эта парадигматическая страна, в которой жаренные члены предложения залетают прямо в рот.</p><p>Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.</p><p>Он собрал семь своих заглавных букв, подпоясал инициал за пояс и пустился в дорогу. Взобравшись на первую вершину курсивных гор, бросил он последний взгляд назад, на силуэт своего родного города Буквоград, на заголовок деревни Алфавит и на подзаголовок своего переулка Строчка. Грустный реторический вопрос скатился по его щеке и он продолжил свой путь. По дороге встретил текст рукопись. Она предупредила его: «В моей стране все переписывается по несколько раз. Единственное, что от меня осталось, это приставка «и».</p>', '<p>Любя, съешь щипцы, — вздохнёт мэр, — кайф жгуч. Шеф взъярён тчк щипцы с эхом гудбай Жюль. Эй, жлоб! Где туз? Прячь юных съёмщиц в шкаф. Экс-граф? Плюш изъят. Бьём чуждый цен хвощ! Эх, чужак! Общий съём цен шляп (юфть) — вдрызг! </p><p>Любя, съешь щипцы, — вздохнёт мэр, — кайф жгуч.\r\nШеф взъярён тчк щипцы с эхом гудбай Жюль. Эй, жлоб! Где туз? Прячь юных съёмщиц в шкаф. Экс-граф? Плюш изъят. Бьём чуждый цен хвощ! Эх, чужак! Общий съём цен шляп (юфть) — вдрызг! Любя, съешь щипцы, — вздохнёт мэр, — кайф жгуч. Шеф взъярён тчк щипцы с эхом гудбай Жюль. Эй, жлоб! Где туз?</p>', 2),
(2, 2, 'Одежда', 'Мужские костюмы и женские свадебные платья', '<p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана. Маленький ручеек Даль журчит по всей стране и обеспечивает ее всеми необходимыми правилами. Эта парадигматическая страна, в которой жаренные члены предложения залетают прямо в рот. Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. </p><p>Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку. Он собрал семь своих заглавных букв, подпоясал инициал за пояс и пустился в дорогу. Взобравшись на первую вершину курсивных гор, бросил он последний взгляд назад, на силуэт своего родного города Буквоград, на заголовок деревни Алфавит и на подзаголовок своего переулка Строчка. </p><p>Грустный реторический вопрос скатился по его щеке и он продолжил свой путь. По дороге встретил текст рукопись. Она предупредила его: «В моей стране все переписывается по несколько раз. Единственное, что от меня осталось, это приставка «и».</p>', '<p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. </p><p>Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана. Маленький ручеек Даль журчит по всей стране и обеспечивает ее всеми необходимыми правилами.</p>', 2),
(3, 3, 'Авто', 'Автомобиль для вашего праздника', '<p>Любя, съешь щипцы, — вздохнёт мэр, — кайф жгуч. Шеф взъярён тчк щипцы с эхом гудбай Жюль. Эй, жлоб! Где туз? Прячь юных съёмщиц в шкаф. Экс-граф? Плюш изъят. Бьём чуждый цен хвощ! Эх, чужак! Общий съём цен шляп (юфть) — вдрызг! Любя, съешь щипцы, — вздохнёт мэр, — кайф жгуч.</p><p>Шеф взъярён тчк щипцы с эхом гудбай Жюль. Эй, жлоб! Где туз? Прячь юных съёмщиц в шкаф. Экс-граф? Плюш изъят. Бьём чуждый цен хвощ! Эх, чужак! Общий съём цен шляп (юфть) — вдрызг! Любя, съешь щипцы, — вздохнёт мэр, — кайф жгуч. Шеф взъярён тчк щипцы с эхом гудбай Жюль. Эй, жлоб! Где туз?</p><p>Прячь юных съёмщиц в шкаф. Экс-граф? Плюш изъят. Бьём чуждый цен хвощ! Эх, чужак! Общий съём цен шляп (юфть) — вдрызг! Любя, съешь щипцы, — вздохнёт мэр, — кайф жгуч. Шеф взъярён тчк щипцы с эхом гудбай Жюль. Эй, жлоб! Где туз? Прячь юных съёмщиц в шкаф. Экс-граф? Плюш изъят. Бьём чуждый цен хвощ! Эх, чужак! Общий съём цен шляп (юфть) — вдрызг! Любя, съешь щипцы, — вздохнёт мэр, — кайф жгуч. Шеф взъярён тчк щипцы с эхом гудбай Жюль. Эй, жлоб! Где туз? Прячь юных съёмщиц в шкаф. Экс-граф? Плюш изъят.</p> ', '<p>Прячь юных съёмщиц в шкаф. Экс-граф? Плюш изъят. Бьём чуждый цен хвощ! Эх, чужак! Общий съём цен шляп (юфть) — вдрызг! Любя, съешь щипцы, — вздохнёт мэр, — кайф жгуч. Шеф взъярён тчк щипцы с эхом гудбай Жюль.</p><p>Эй, жлоб! Где туз? Прячь юных съёмщиц в шкаф. Экс-граф? Плюш изъят. Бьём чуждый цен хвощ! Эх, чужак! Общий съём цен шляп (юфть) — вдрызг! Любя, съешь щипцы, — вздохнёт мэр, — кайф жгуч. Шеф взъярён тчк щипцы с эхом гудбай Жюль. Эй, жлоб! Где туз? Прячь юных съёмщиц в шкаф. Экс-граф? Плюш изъят.</p>', 2),
(4, 4, 'Съёмка', 'Фото и видео сопровождение', '<p>Душа моя озарена неземной радостью, как эти чудесные весенние утра, которыми я наслаждаюсь от всего сердца. Я совсем один и блаженствую в здешнем краю, словно созданном для таких, как я. Я так счастлив, мой друг, так упоен ощущением покоя, что искусство мое страдает от этого.</p><p>Ни одного штриха не мог бы я сделать, а никогда не был таким большим художником, как в эти минуты.</p><p>Когда от милой моей долины поднимается пар и полдневное солнце стоит над непроницаемой чащей темного леса и лишь редкий луч проскальзывает в его святая святых, а я лежу в высокой траве у быстрого ручья и, прильнув к земле, вижу тысячи всевозможных былинок и чувствую, как близок моему сердцу крошечный мирок, что снует между стебельками, наблюдаю эти неисчислимые, непостижимые разновидности червяков и мошек и чувствую близость всемогущего, создавшего нас по своему подобию, веяние вселюбящего, судившего нам парить в вечном блаженстве, когда взор мой туманится и все вокруг меня и небо надо мной запечатлены в моей душе, точно образ возлюбленной, - тогда, дорогой друг, меня часто томит мысль: \"Ах! Как бы выразить, как бы вдохнуть в рисунок то, что так полно, так трепетно живет во мне, запечатлеть отражение моей души, как душа моя - отражение предвечного бога! \"</p>', '<p>Душа моя озарена неземной радостью, как эти чудесные весенние утра, которыми я наслаждаюсь от всего сердца.</p> Я совсем один и блаженствую в здешнем краю, словно созданном для таких, как я. Я так счастлив, мой друг, так упоен ощущением покоя, что искусство мое страдает от этого.</p>', 2),
(5, 5, 'Ведущий', 'Ведущий вашего мероприятия', '<p>Душа моя озарена неземной радостью, как эти чудесные весенние утра, которыми я наслаждаюсь от всего сердца. Я совсем один и блаженствую в здешнем краю, словно созданном для таких, как я. Я так счастлив, мой друг, так упоен ощущением покоя, что искусство мое страдает от этого. Ни одного штриха не мог бы я сделать, а никогда не был таким большим художником, как в эти минуты.</p><p>Когда от милой моей долины поднимается пар и полдневное солнце стоит над непроницаемой чащей темного леса и лишь редкий луч проскальзывает в его святая святых, а я лежу в высокой траве у быстрого ручья и, прильнув к земле, вижу тысячи всевозможных былинок и чувствую, как близок моему сердцу крошечный мирок, что снует между стебельками, наблюдаю эти неисчислимые, непостижимые разновидности червяков и мошек и чувствую близость всемогущего, создавшего нас по своему подобию, веяние вселюбящего, судившего нам парить в вечном блаженстве, когда взор мой туманится и все вокруг меня и небо надо мной запечатлены в моей душе, точно образ возлюбленной, - тогда, дорогой друг, меня часто томит мысль: \"Ах! Как бы выразить, как бы вдохнуть в рисунок то, что так полно, так трепетно живет во мне, запечатлеть отражение моей души, как душа моя - отражение предвечного бога!\"</p>', '<p>Душа моя озарена неземной радостью, как эти чудесные весенние утра, которыми я наслаждаюсь от всего сердца. </p><p>Я совсем один и блаженствую в здешнем краю, словно созданном для таких, как я.</p><p>Я так счастлив, мой друг, так упоен ощущением покоя, что искусство мое страдает от этого.</p>', 2),
(6, 6, 'Торт', 'Свадебный торт', '<p>Душа моя озарена неземной радостью, как эти чудесные весенние утра, которыми я наслаждаюсь от всего сердца. Я совсем один и блаженствую в здешнем краю, словно созданном для таких, как я. Я так счастлив, мой друг, так упоен ощущением покоя, что искусство мое страдает от этого.</p><p>Ни одного штриха не мог бы я сделать, а никогда не был таким большим художником, как в эти минуты.</p><p>Когда от милой моей долины поднимается пар и полдневное солнце стоит над непроницаемой чащей темного леса и лишь редкий луч проскальзывает в его святая святых, а я лежу в высокой траве у быстрого ручья и, прильнув к земле, вижу тысячи всевозможных былинок и чувствую, как близок моему сердцу крошечный мирок, что снует между стебельками, наблюдаю эти неисчислимые, непостижимые разновидности червяков и мошек и чувствую близость всемогущего, создавшего нас по своему подобию, веяние вселюбящего, судившего нам парить в вечном блаженстве, когда взор мой туманится и все вокруг меня и небо надо мной запечатлены в моей душе, точно образ возлюбленной, - тогда, дорогой друг, меня часто томит мысль: \"Ах! Как бы выразить, как бы вдохнуть в рисунок то, что так полно, так трепетно живет во мне, запечатлеть отражение моей души, как душа моя - отражение предвечного бога! \"</p>', '<p>Душа моя озарена неземной радостью, как эти чудесные весенние утра, которыми я наслаждаюсь от всего сердца. Я совсем один и блаженствую в здешнем краю, словно созданном для таких, как я.</p><p>Я так счастлив, мой друг, так упоен ощущением покоя, что искусство мое страдает от этого.</p>', 2),
(7, 7, 'Отель', 'Отель - место отдыха для вас и ваших гостей', '<p>Душа моя озарена неземной радостью, как эти чудесные весенние утра, которыми я наслаждаюсь от всего сердца. Я совсем один и блаженствую в здешнем краю, словно созданном для таких, как я. Я так счастлив, мой друг, так упоен ощущением покоя, что искусство мое страдает от этого.</p><p>Ни одного штриха не мог бы я сделать, а никогда не был таким большим художником, как в эти минуты.</p><p>Когда от милой моей долины поднимается пар и полдневное солнце стоит над непроницаемой чащей темного леса и лишь редкий луч проскальзывает в его святая святых, а я лежу в высокой траве у быстрого ручья и, прильнув к земле, вижу тысячи всевозможных былинок и чувствую, как близок моему сердцу крошечный мирок, что снует между стебельками, наблюдаю эти неисчислимые, непостижимые разновидности червяков и мошек и чувствую близость всемогущего, создавшего нас по своему подобию, веяние вселюбящего, судившего нам парить в вечном блаженстве, когда взор мой туманится и все вокруг меня и небо надо мной запечатлены в моей душе, точно образ возлюбленной, - тогда, дорогой друг, меня часто томит мысль: \"Ах! Как бы выразить, как бы вдохнуть в рисунок то, что так полно, так трепетно живет во мне, запечатлеть отражение моей души, как душа моя - отражение предвечного бога! \"</p>', '<p>Душа моя озарена неземной радостью, как эти чудесные весенние утра, которыми я наслаждаюсь от всего сердца. Я совсем один и блаженствую в здешнем краю, словно созданном для таких, как я.</p><p>Я так счастлив, мой друг, так упоен ощущением покоя, что искусство мое страдает от этого.</p>', 2);

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

--
-- Дамп данных таблицы `clothes_en`
--

INSERT INTO `clothes_en` (`id`, `id_clothes`, `title`, `text`, `contacts`, `id_language`) VALUES
(1, 1, 'Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 1),
(2, 2, 'Beige dressSSS', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Vivamus elementum semper nisi. ', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis.', 1),
(4, 3, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(5, 4, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(6, 5, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(7, 6, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(8, 7, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(9, 8, 'Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 1),
(10, 9, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(11, 10, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(12, 11, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(13, 12, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(14, 13, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(15, 14, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(16, 15, 'Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 1),
(17, 16, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(18, 17, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(19, 18, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(20, 19, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(21, 20, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(22, 21, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(23, 22, 'Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 1),
(24, 23, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(25, 24, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(26, 25, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(27, 26, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(28, 27, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(29, 28, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(31, 39, 'авыавыаавыа', 'аываыаыв', 'fdsfsdf', 1),
(32, 40, 'Blue suit', 'Blue suit of high quality.', 'The company selling suits.', 1),
(33, 41, 'Носки', 'уцйуцй', 'dasdsada', 1),
(34, 42, 'tertre', 'treterter', 'eqweqe', 1);

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

--
-- Дамп данных таблицы `clothes_main`
--

INSERT INTO `clothes_main` (`id`, `tel`, `fb`, `inst`, `telegram`, `price`, `stock`, `sex`, `brand`, `active`) VALUES
(1, '+38 (095) 815 - 63 - 96', 'facebook.com/kreat1v', 'instagram.com/kreat1v', NULL, 1000, 800, 'f', 'Nike', 1),
(2, '+38 (095) 055 - 56 - 00', 'rewr344', NULL, 'rewr344', 1100, 999, 'm', 'Cavalli', 1),
(3, '+38 (099) 847 - 56 - 41', 'facebook.com/inst', NULL, 'https://telegram.me/fefefe', 975, NULL, 'f', 'Lari', 0),
(4, '0998475641', 'facebook.com/inst', 'instagram.com/inst', 'https://telegram.me/fefefe', 975, NULL, 'f', 'Lari', 1),
(5, '0998475555', NULL, 'instagram.com/inst', 'https://telegram.me/fefefe', 700, NULL, 'f', 'Lari', 1),
(6, '0997775641', 'facebook.com/vert', 'instagram.com/vert', 'https://telegram.me/vert', 1800, NULL, 'm', 'Dan', 1),
(7, '0991001178', NULL, NULL, 'https://telegram.me/tara', 980, NULL, 'f', 'La La', 1),
(8, '0958156396', 'facebook.com/kreat1v', 'instagram.com/kreat1v', NULL, 1000, NULL, 'f', 'Nike', 1),
(9, '0950578456', 'facebook.com/kreatds', 'instagram.com/kreatds', 'telegram.me/kreatds', 650, NULL, 'f', 'Lessa', 1),
(10, '0998475641', 'facebook.com/inst', NULL, 'https://telegram.me/fefefe', 975, NULL, 'f', 'Lari', 1),
(11, '0998475641', 'facebook.com/inst', 'instagram.com/inst', 'https://telegram.me/fefefe', 975, NULL, 'f', 'Lari', 1),
(12, '0998475555', NULL, 'instagram.com/inst', 'https://telegram.me/fefefe', 700, NULL, 'f', 'Lari', 1),
(13, '0997775641', 'facebook.com/vert', 'instagram.com/vert', 'https://telegram.me/vert', 1800, NULL, 'm', 'Dan', 1),
(14, '0991001178', NULL, NULL, 'https://telegram.me/tara', 980, NULL, 'f', 'La La', 1),
(15, '0958156396', 'facebook.com/kreat1v', 'instagram.com/kreat1v', NULL, 1000, NULL, 'f', 'Nike', 1),
(16, '0950578456', 'facebook.com/kreatds', 'instagram.com/kreatds', 'telegram.me/kreatds', 650, NULL, 'f', 'Lessa', 1),
(17, '0998475641', 'facebook.com/inst', NULL, 'https://telegram.me/fefefe', 975, NULL, 'f', 'Lari', 1),
(18, '0998475641', 'facebook.com/inst', 'instagram.com/inst', 'https://telegram.me/fefefe', 975, NULL, 'f', 'Lari', 1),
(19, '0998475555', NULL, 'instagram.com/inst', 'https://telegram.me/fefefe', 700, NULL, 'f', 'Lari', 1),
(20, '0997775641', 'facebook.com/vert', 'instagram.com/vert', 'https://telegram.me/vert', 1800, NULL, 'm', 'Dan', 1),
(21, '0991001178', NULL, NULL, 'https://telegram.me/tara', 980, NULL, 'f', 'La La', 1),
(22, '0958156396', 'facebook.com/kreat1v', 'instagram.com/kreat1v', NULL, 1000, NULL, 'f', 'Nike', 1),
(23, '0950578456', 'facebook.com/kreatds', 'instagram.com/kreatds', 'telegram.me/kreatds', 650, NULL, 'f', 'Lessa', 1),
(24, '0998475641', 'facebook.com/inst', NULL, 'https://telegram.me/fefefe', 975, NULL, 'f', 'Lari', 1),
(25, '0998475641', 'facebook.com/inst', 'instagram.com/inst', 'https://telegram.me/fefefe', 975, NULL, 'f', 'Lari', 1),
(26, '0998475555', NULL, 'instagram.com/inst', 'https://telegram.me/fefefe', 700, NULL, 'f', 'Lari', 1),
(27, '0997775641', 'facebook.com/vert', 'instagram.com/vert', 'https://telegram.me/vert', 1800, NULL, 'm', 'Dan', 1),
(28, '0991001178', NULL, NULL, 'https://telegram.me/tara', 980, NULL, 'f', 'La La', 1),
(39, '+38 (434) 343 - 43 - 43', '3434', NULL, NULL, 4344, 4343, 'm', 'fdfd', 1),
(40, '+38 (095) 874 - 56 - 32', 'qwerty', 'qwerty', NULL, 2500, NULL, 'm', 'Blues', 1),
(41, '+38 (231) 232 - 32 - 13', NULL, NULL, NULL, 3232, 33, 'm', 'sds', 0),
(42, '+38 (146) 464 - 64 - 44', NULL, NULL, NULL, 234, 444, 'm', 'qweqew', 1);

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

--
-- Дамп данных таблицы `clothes_reviews`
--

INSERT INTO `clothes_reviews` (`id`, `id_product`, `id_users`, `reviews`, `date`, `active`) VALUES
(22, 1, 6, '11111', '2018-06-18 15:10:47', 1),
(23, 1, 6, '111111', '2018-06-18 15:10:52', 1),
(24, 1, 6, '11111', '2018-06-18 15:10:56', 1),
(25, 1, 6, '1111', '2018-06-18 15:11:00', 1),
(26, 1, 6, '111111', '2018-06-18 15:11:04', 1),
(27, 1, 6, '1111', '2018-06-18 15:11:11', 1),
(28, 1, 6, '11111', '2018-06-18 15:11:23', 1),
(29, 1, 6, '111111', '2018-06-18 15:11:30', 1),
(30, 2, 6, '2222', '2018-06-18 15:17:09', 1),
(31, 2, 6, '22222', '2018-06-18 15:17:15', 1),
(32, 2, 6, '222', '2018-06-18 15:17:21', 1),
(33, 2, 6, '22222', '2018-06-18 15:17:28', 1),
(34, 2, 6, '22222', '2018-06-18 15:17:32', 1),
(35, 2, 6, '22222', '2018-06-18 15:17:38', 1),
(36, 2, 6, '22222', '2018-06-18 15:17:42', 1);

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

--
-- Дамп данных таблицы `clothes_ru`
--

INSERT INTO `clothes_ru` (`id`, `id_clothes`, `title`, `text`, `contacts`, `id_language`) VALUES
(1, 1, 'Проснувшись однажды утром после беспокойного сна', 'Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами. «Что со мной случилось? » – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах.', 'Его комната, настоящая, разве что слишком маленькая.', 2),
(2, 2, 'Бежевое платьееее', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку. Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики.', 'Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грам.', 2),
(3, 3, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых и диких знаках.', 2),
(4, 4, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(5, 5, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(6, 6, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(7, 7, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(8, 8, 'Проснувшись однажды утром после беспокойного сна', 'Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами. «Что со мной случилось? » – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах.', 'Его комната, настоящая, разве что слишком маленькая.', 2),
(9, 9, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых.', 2),
(10, 10, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых и диких знаках.', 2),
(11, 11, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(12, 12, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(13, 13, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(14, 14, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(15, 15, 'Проснувшись однажды утром после беспокойного сна', 'Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами. «Что со мной случилось? » – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах.', 'Его комната, настоящая, разве что слишком маленькая.', 2),
(16, 16, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых.', 2),
(17, 17, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых и диких знаках.', 2),
(18, 18, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(19, 19, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(20, 20, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(21, 21, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(22, 22, 'Проснувшись однажды утром после беспокойного сна', 'Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами. «Что со мной случилось? » – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах.', 'Его комната, настоящая, разве что слишком маленькая.', 2),
(23, 23, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых.', 2),
(24, 24, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых и диких знаках.', 2),
(25, 25, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(26, 26, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(27, 27, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(28, 28, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(30, 39, 'выаыв', 'аывавыа', 'fsdfsdfd', 2),
(31, 40, 'Синий костюм', 'Синий костюм высокого качества.', 'Фирма по продаже костюмов.', 2),
(32, 41, 'Носки', 'уйцуйц', 'dsdasd', 2),
(33, 42, 'ret', 'ttreter', 'qewq', 2);

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

--
-- Дамп данных таблицы `clothes_size`
--

INSERT INTO `clothes_size` (`id`, `id_clothes`, `s`, `m`, `l`, `xl`) VALUES
(1, 1, 1, 0, 1, 0),
(2, 2, 0, 0, 0, 1),
(3, 3, 1, 1, 0, 0),
(4, 4, 0, 0, 0, 1),
(5, 5, 1, 0, 1, 0),
(6, 6, 0, 0, 1, 1),
(7, 7, 1, 1, 0, 0),
(8, 8, 1, 0, 1, 0),
(9, 9, 0, 0, 1, 1),
(10, 10, 1, 1, 0, 0),
(11, 11, 0, 0, 0, 1),
(12, 12, 1, 0, 1, 0),
(13, 13, 0, 0, 1, 1),
(14, 14, 1, 1, 0, 0),
(15, 15, 1, 0, 1, 0),
(16, 16, 0, 0, 1, 1),
(17, 17, 1, 1, 0, 0),
(18, 18, 0, 0, 0, 1),
(19, 19, 1, 0, 1, 0),
(20, 20, 0, 0, 1, 1),
(21, 21, 1, 1, 0, 0),
(22, 22, 1, 0, 1, 0),
(23, 23, 0, 0, 1, 1),
(24, 24, 1, 1, 0, 0),
(25, 25, 0, 0, 0, 1),
(26, 26, 1, 0, 1, 0),
(27, 27, 0, 0, 1, 1),
(28, 28, 1, 1, 0, 0),
(29, 39, 1, 0, 0, 1),
(30, 40, 1, 1, 1, 0),
(31, 41, 1, 1, 0, 0),
(32, 42, 1, 0, 0, 0);

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

--
-- Дамп данных таблицы `decor_en`
--

INSERT INTO `decor_en` (`id`, `id_decor`, `title`, `text`, `contacts`, `id_language`) VALUES
(1, 1, 'Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 1),
(2, 2, 'Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 1),
(3, 3, 'Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 1),
(4, 4, 'Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 1),
(5, 8, 'вфывфывфыв', 'выфвфывфвф', 'уйцуйцц', 1),
(6, 9, 'fdsfsffdffdfsdfs', 'fsdfsfsfsd', '342342343243242432', 1);

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

--
-- Дамп данных таблицы `decor_main`
--

INSERT INTO `decor_main` (`id`, `tel`, `fb`, `inst`, `telegram`, `price`, `stock`, `service`, `active`) VALUES
(1, '0958156396', 'facebook.com/kreat1v', 'instagram.com/kreat1v', NULL, 1110, NULL, 'beach', 1),
(2, '0958156396', 'facebook.com/kreat1v', 'instagram.com/kreat1v', NULL, 10000, NULL, 'nature', 1),
(3, '0958156396', 'facebook.com/kreat1v', 'instagram.com/kreat1v', NULL, 9000, NULL, 'restaurant', 1),
(4, '0958156396', 'facebook.com/kreat1v', 'instagram.com/kreat1v', NULL, 11000, NULL, 'restaurant', 1),
(8, '+38 (432)', NULL, NULL, NULL, 3213, 321, 'beach', 1),
(9, '+38 (432) 423 - 42 - 34', '423423423423', NULL, NULL, 343243, 43, 'nature', 1);

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

--
-- Дамп данных таблицы `decor_reviews`
--

INSERT INTO `decor_reviews` (`id`, `id_product`, `id_users`, `reviews`, `date`, `active`) VALUES
(1, 1, 4, 'tet  te', '2018-06-17 11:18:32', 1),
(2, 1, 4, 'dfds', '2018-06-17 11:19:47', 1),
(3, 1, 6, 'Верка в восторге!', '2018-06-18 13:35:43', 1),
(4, 1, 6, 'куш сорван', '2018-06-18 13:43:30', 1),
(5, 1, 6, 'wqewq', '2018-06-18 13:53:51', 1),
(6, 1, 6, 'wewqeqw', '2018-06-18 13:53:57', 1),
(7, 1, 6, 'ewqeqw', '2018-06-18 13:54:02', 1);

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

--
-- Дамп данных таблицы `decor_ru`
--

INSERT INTO `decor_ru` (`id`, `id_decor`, `title`, `text`, `contacts`, `id_language`) VALUES
(1, 1, '1 Проснувшись однажды утром после беспокойного сна', 'Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами. «Что со мной случилось? » – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах.', 'Его комната, настоящая, разве что слишком маленькая.', 2),
(2, 2, '2 Проснувшись однажды утром после беспокойного сна', 'Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами. «Что со мной случилось? » – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах.', 'Его комната, настоящая, разве что слишком маленькая.', 2),
(3, 3, '3 Проснувшись однажды утром после беспокойного сна', 'Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами. «Что со мной случилось? » – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах.', 'Его комната, настоящая, разве что слишком маленькая.', 2),
(4, 4, '3 Проснувшись однажды утром после беспокойного сна', 'Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами. «Что со мной случилось? » – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах.', 'Его комната, настоящая, разве что слишком маленькая.', 2),
(8, 8, 'выфвфыв', 'выфвфыфы', 'йуцйуцй', 2),
(9, 9, 'fdsfdfdfsdfds', 'fsdfdfd', '32423423423423423432', 2);

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

--
-- Дамп данных таблицы `favorites`
--

INSERT INTO `favorites` (`id`, `id_products`, `category`, `id_users`) VALUES
(59, 7, 'clothes', 7),
(61, 2, 'clothes', 4),
(62, 3, 'clothes', 4),
(63, 4, 'clothes', 4),
(64, 5, 'clothes', 4),
(65, 6, 'clothes', 4),
(66, 7, 'clothes', 4),
(67, 1, 'decor', 4),
(69, 1, 'decor', 6),
(70, 1, 'clothes', 6),
(71, 1, 'hotel', 6),
(72, 1, 'auto', 6),
(73, 4, 'auto', 6),
(74, 1, 'filming', 4),
(75, 1, 'leading', 4),
(76, 1, 'leading', 8),
(77, 1, 'cake', 9);

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

--
-- Дамп данных таблицы `filming_en`
--

INSERT INTO `filming_en` (`id`, `id_filming`, `title`, `text`, `contacts`, `id_language`) VALUES
(1, 1, 'Photograph Ivan', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 1),
(2, 2, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(4, 3, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(5, 4, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(6, 5, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(7, 6, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(8, 7, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1);

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

--
-- Дамп данных таблицы `filming_main`
--

INSERT INTO `filming_main` (`id`, `tel`, `fb`, `inst`, `telegram`, `price`, `stock`, `active`) VALUES
(1, '+38 (095) 788 - 51 - 22', '12345', '12345', NULL, 1000, 800, 1),
(2, '0950578456', 'facebook.com/kreatds', 'instagram.com/kreatds', 'telegram.me/kreatds', 650, NULL, 1),
(3, '0998475641', 'facebook.com/inst', NULL, 'https://telegram.me/fefefe', 975, NULL, 1),
(4, '0998475641', 'facebook.com/inst', 'instagram.com/inst', 'https://telegram.me/fefefe', 975, NULL, 1),
(5, '0998475555', NULL, 'instagram.com/inst', 'https://telegram.me/fefefe', 700, NULL, 1),
(6, '0997775641', 'facebook.com/vert', 'instagram.com/vert', 'https://telegram.me/vert', 1800, NULL, 1),
(7, '0991001178', NULL, NULL, 'https://telegram.me/tara', 980, NULL, 1);

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

--
-- Дамп данных таблицы `filming_reviews`
--

INSERT INTO `filming_reviews` (`id`, `id_product`, `id_users`, `reviews`, `date`, `active`) VALUES
(22, 1, 6, '11111', '2018-06-18 15:10:47', 1),
(23, 1, 6, '111111', '2018-06-18 15:10:52', 1),
(24, 1, 6, '11111', '2018-06-18 15:10:56', 1),
(25, 1, 6, '1111', '2018-06-18 15:11:00', 1),
(26, 1, 6, '111111', '2018-06-18 15:11:04', 1),
(27, 1, 6, '1111', '2018-06-18 15:11:11', 1),
(28, 1, 6, '11111', '2018-06-18 15:11:23', 1),
(29, 1, 6, '111111', '2018-06-18 15:11:30', 1),
(30, 2, 6, '2222', '2018-06-18 15:17:09', 1),
(31, 2, 6, '22222', '2018-06-18 15:17:15', 1),
(32, 2, 6, '222', '2018-06-18 15:17:21', 1),
(33, 2, 6, '22222', '2018-06-18 15:17:28', 1),
(34, 2, 6, '22222', '2018-06-18 15:17:32', 1),
(35, 2, 6, '22222', '2018-06-18 15:17:38', 1),
(36, 2, 6, '22222', '2018-06-18 15:17:42', 1);

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

--
-- Дамп данных таблицы `filming_ru`
--

INSERT INTO `filming_ru` (`id`, `id_filming`, `title`, `text`, `contacts`, `id_language`) VALUES
(1, 1, 'Фотограф Иван', 'Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами. «Что со мной случилось? » – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах.', 'Его комната, настоящая, разве что слишком маленькая.', 2),
(2, 2, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых.', 2),
(3, 3, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых и диких знаках.', 2),
(4, 4, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(5, 5, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(6, 6, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(7, 7, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2);

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

--
-- Дамп данных таблицы `hotel_en`
--

INSERT INTO `hotel_en` (`id`, `id_hotel`, `title`, `text`, `contacts`, `id_language`) VALUES
(1, 1, 'Hotel Opera', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 1),
(2, 2, 'Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 1),
(3, 3, 'Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 1),
(4, 4, 'Hotel Opera', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 1);

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

--
-- Дамп данных таблицы `hotel_main`
--

INSERT INTO `hotel_main` (`id`, `tel`, `fb`, `inst`, `telegram`, `stars`, `price`, `stock`, `active`) VALUES
(1, '+38 (095) 815 - 63 - 96', 'facebook.com/kreat1v', 'instagram.com/kreat1v', NULL, 5, 7000, NULL, 1),
(2, '0958156396', 'facebook.com/kreat1v', 'instagram.com/kreat1v', NULL, 4, 10000, NULL, 1),
(3, '0958156396', 'facebook.com/kreat1v', 'instagram.com/kreat1v', NULL, 3, 9000, NULL, 1),
(4, '+38 (312) 312 - 31 - 21', NULL, '312312', NULL, 3, 32213, 32, 0);

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

--
-- Дамп данных таблицы `hotel_reviews`
--

INSERT INTO `hotel_reviews` (`id`, `id_product`, `id_users`, `reviews`, `date`, `active`) VALUES
(1, 1, 4, 'tet  te', '2018-06-17 11:18:32', 1),
(2, 1, 4, 'dfds', '2018-06-17 11:19:47', 1),
(3, 1, 6, 'Верка в восторге!', '2018-06-18 13:35:43', 1),
(4, 1, 6, 'куш сорван', '2018-06-18 13:43:30', 1),
(5, 1, 6, 'wqewq', '2018-06-18 13:53:51', 1),
(6, 1, 6, 'wewqeqw', '2018-06-18 13:53:57', 1),
(8, 1, 6, 'ООООЧЕЕЕЕНЬ', '2018-06-18 19:34:31', 1);

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

--
-- Дамп данных таблицы `hotel_ru`
--

INSERT INTO `hotel_ru` (`id`, `id_hotel`, `title`, `text`, `contacts`, `id_language`) VALUES
(1, 1, 'Отель Опера', 'Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами. «Что со мной случилось? » – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах.', 'Его комната, настоящая, разве что слишком маленькая.', 2),
(2, 2, '2 Проснувшись однажды утром после беспокойного сна', 'Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами. «Что со мной случилось? » – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах.', 'Его комната, настоящая, разве что слишком маленькая.', 2),
(3, 3, '3 Проснувшись однажды утром после беспокойного сна', 'Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами. «Что со мной случилось? » – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах.', 'Его комната, настоящая, разве что слишком маленькая.', 2),
(4, 4, 'Отель Опера', 'Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами. «Что со мной случилось? » – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах.', 'Его комната, настоящая, разве что слишком маленькая.', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `language`
--

CREATE TABLE `language` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `language`
--

INSERT INTO `language` (`id`, `name`) VALUES
(1, 'en'),
(2, 'ru');

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

--
-- Дамп данных таблицы `leading_en`
--

INSERT INTO `leading_en` (`id`, `id_leading`, `title`, `text`, `contacts`, `id_language`) VALUES
(1, 1, 'Vladimir Novikov', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 1),
(2, 2, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(4, 3, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(5, 4, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(6, 5, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(7, 6, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(8, 7, 'Maecenas tempus, tellus eget.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 1),
(9, 8, 'dsadasdasddsadasd', 'dsadasdasas', '312312313123213', 1);

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

--
-- Дамп данных таблицы `leading_main`
--

INSERT INTO `leading_main` (`id`, `tel`, `fb`, `inst`, `telegram`, `price`, `stock`, `active`) VALUES
(1, '+38 (095) 815 - 63 - 96', '4324324', '324324324', NULL, 4000, NULL, 1),
(2, '0950578456', 'facebook.com/kreatds', 'instagram.com/kreatds', 'telegram.me/kreatds', 3500, 0, 1),
(3, '0998475641', 'facebook.com/inst', NULL, 'https://telegram.me/fefefe', 2500, 0, 1),
(4, '0998475641', 'facebook.com/inst', 'instagram.com/inst', 'https://telegram.me/fefefe', 2700, 0, 1),
(5, '0998475555', NULL, 'instagram.com/inst', 'https://telegram.me/fefefe', 4700, 0, 1),
(6, '0997775641', 'facebook.com/vert', 'instagram.com/vert', 'https://telegram.me/vert', 3400, 0, 1),
(7, '0991001178', NULL, NULL, 'https://telegram.me/tara', 5200, 0, 1),
(8, '+38 (312) 312 - 31 - 23', NULL, NULL, '3123123', 2323, 323, 1);

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

--
-- Дамп данных таблицы `leading_reviews`
--

INSERT INTO `leading_reviews` (`id`, `id_product`, `id_users`, `reviews`, `date`, `active`) VALUES
(22, 1, 6, '11111', '2018-06-18 15:10:47', 1),
(23, 1, 6, '111111', '2018-06-18 15:10:52', 1),
(24, 1, 6, '11111', '2018-06-18 15:10:56', 1),
(25, 1, 6, '1111', '2018-06-18 15:11:00', 1),
(26, 1, 6, '111111', '2018-06-18 15:11:04', 1),
(27, 1, 6, '1111', '2018-06-18 15:11:11', 1),
(28, 1, 6, '11111', '2018-06-18 15:11:23', 1),
(29, 1, 6, '111111', '2018-06-18 15:11:30', 1),
(30, 2, 6, '2222', '2018-06-18 15:17:09', 1),
(31, 2, 6, '22222', '2018-06-18 15:17:15', 1),
(32, 2, 6, '222', '2018-06-18 15:17:21', 1),
(33, 2, 6, '22222', '2018-06-18 15:17:28', 1),
(34, 2, 6, '22222', '2018-06-18 15:17:32', 1),
(35, 2, 6, '22222', '2018-06-18 15:17:38', 1),
(36, 2, 6, '22222', '2018-06-18 15:17:42', 1);

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

--
-- Дамп данных таблицы `leading_ru`
--

INSERT INTO `leading_ru` (`id`, `id_leading`, `title`, `text`, `contacts`, `id_language`) VALUES
(1, 1, 'Владимир Новиков', 'Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами. «Что со мной случилось? » – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах.', 'Его комната, настоящая, разве что слишком маленькая.', 2),
(2, 2, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых.', 2),
(3, 3, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых и диких знаках.', 2),
(4, 4, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(5, 5, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(6, 6, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(7, 7, 'Он собрал семь своих заглавных букв.', 'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.', 2),
(8, 8, 'dsadasdsa', 'dasdasdsa', '3123123', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `like_answers`
--

CREATE TABLE `like_answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_answers` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL
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

--
-- Дамп данных таблицы `messages_admin`
--

INSERT INTO `messages_admin` (`id`, `id_users`, `message`, `date`) VALUES
(1, 7, 'ДАААААААААА', '2018-06-04 21:27:04'),
(2, 7, 'Да даДАДАА', '2018-06-04 21:27:33'),
(3, 7, '!!!!', '2018-06-04 23:30:41'),
(4, 7, 'ППППП', '2018-06-04 23:59:01'),
(5, 7, 'Отлично!', '2018-06-04 23:59:27'),
(6, 7, 'qwewqeqw', '2018-06-05 00:01:27'),
(7, 7, 'saS', '2018-06-05 00:02:10'),
(8, 7, 'TT', '2018-06-05 00:07:27'),
(9, 7, 'qweqwewq', '2018-06-05 00:08:44'),
(10, 7, 'l[p,l;mlmlk ', '2018-06-05 00:16:11'),
(11, 7, 'ewqeqweqw', '2018-06-05 00:20:27'),
(12, 6, 'Отстаньте!', '2018-06-05 13:21:41'),
(13, 7, 'rewrewrwe', '2018-06-05 13:56:32'),
(15, 6, '\r\n\r\nTo get started, choose a preferred color using the color picker below, and a 6-color matching palette (a \"blend\") will be automatically calculated.\r\n\r\nYou may swicth to Direct Edit mode to tweak or edit individual colors of your blend.\r\n\r\nSaved blends will be associated with your account if you signed in or stored in your browser cookies if you are not a member yet.\r\n', '2018-06-05 19:40:05'),
(17, 6, 'Нормально!', '2018-06-06 11:37:02'),
(19, 6, 'Желаем вам всего хорошего!)))', '2018-06-06 11:22:25'),
(20, 6, 'Рады вам ответить!', '2018-06-06 11:22:11'),
(21, 6, 'О_о ...', '2018-06-06 19:07:46'),
(24, 6, 'Жди - когда пройдут дожди)))', '2018-06-07 13:00:25'),
(28, 4, 'rer re rrre', '2018-06-11 18:42:50'),
(29, 7, 'павп', '2018-06-12 12:33:27'),
(30, 8, 'ЗАчем?', '2018-06-25 17:35:24'),
(31, 5, 'Я рад', '2018-06-25 17:40:01'),
(32, 6, 'Хватит спама!', '2018-06-25 17:40:15'),
(33, 9, 'еще одна', '2018-06-25 17:40:28');

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

--
-- Дамп данных таблицы `messages_user`
--

INSERT INTO `messages_user` (`id`, `id_users`, `message`, `date`, `active`) VALUES
(10, 7, 'Хэййй', '2018-06-05 10:52:40', 0),
(12, 7, 'ЗЗЗЗ', '2018-06-05 13:58:30', 0),
(27, 4, 'Добрый день! Мне очень нужна ваша помощь!', '2018-06-05 00:22:27', 0),
(28, 4, 'Зина срочно позвони мне!!!', '2018-06-05 00:22:27', 0),
(29, 4, 'О ужас скорее!!!!!1111', '2018-06-05 00:22:27', 0),
(30, 4, 'Ааааа немогу', '2018-06-05 00:22:27', 0),
(31, 6, 'Та остаюсь - отстаньте от меня!', '2018-06-05 19:40:05', 0),
(32, 6, 'Где моё платишко?????', '2018-06-05 19:40:05', 0),
(33, 6, 'ЯСРОЧНО ЕГО ТРЕБУЮ!!!!!', '2018-06-05 19:40:42', 0),
(34, 6, 'АЛЁЁЁЁЁЁЁЁЁЁЁ', '2018-06-05 19:40:05', 0),
(35, 6, 'Так нельзя((', '2018-06-05 19:40:05', 0),
(36, 6, 'аааааа', '2018-06-05 19:40:05', 0),
(37, 7, 'кукусик', '2018-06-05 10:52:40', 0),
(38, 7, 'бурум бурум', '2018-06-05 10:52:40', 0),
(39, 7, 'PFPFPFPFPFP!!!!', '2018-06-05 13:56:32', 0),
(40, 6, 'лафки', '2018-06-06 12:00:22', 0),
(41, 6, 'XTTTTTTT', '2018-06-06 16:47:25', 0),
(42, 6, 'Когда вы мне поможете?', '2018-06-06 19:08:49', 0),
(43, 6, 'Я жду ответа!!!', '2018-06-07 13:00:05', 0),
(44, 6, 'Хам!', '2018-06-07 13:02:05', 0),
(45, 6, 'idnjsadsnakda', '2018-06-07 19:33:54', 0),
(46, 6, 'wqweqw', '2018-06-07 19:39:16', 0),
(47, 6, 'wqweqw', '2018-06-07 19:40:04', 0),
(48, 6, 'kpnknlnonnn', '2018-06-07 19:40:59', 0),
(49, 6, '66666', '2018-06-07 19:51:33', 0),
(50, 4, 'pko', '2018-06-11 18:41:41', 0),
(51, 8, 'Помоги мне!', '2018-06-25 17:25:57', 0),
(52, 8, 'СКОРЕЕ!!!!!', '2018-06-25 17:27:48', 0),
(53, 9, 'Ку ку епта', '2018-06-25 17:36:52', 0),
(54, 5, 'А  вот и я)))))', '2018-06-25 17:39:04', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `id_payment` tinyint(1) UNSIGNED NOT NULL,
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
-- Структура таблицы `payment`
--

CREATE TABLE `payment` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `type` varchar(10) NOT NULL
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

--
-- Дамп данных таблицы `stories_en`
--

INSERT INTO `stories_en` (`id`, `id_stories`, `title`, `content`) VALUES
(1, 1, 'Lorem ipsum dolor sit amet.', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus hendrerit lobortis velit, molestie feugiat nibh aliquet at. In sed sagittis justo, tempus lobortis dolor. Sed sem diam, ornare nec nisi eget, tincidunt condimentum tellus. Sed leo est, mattis nec bibendum nec, commodo ut tellus. Fusce vel venenatis orci. Sed velit nunc, convallis sed lectus eget, porta porta velit. Vivamus nibh quam, molestie ut sem a, lobortis commodo justo. Vestibulum consectetur sem in mi malesuada bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam eget nulla orci. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque dapibus rhoncus enim, vel placerat urna. Mauris vulputate elit et rutrum pellentesque. Duis tempus elit erat, quis pellentesque est blandit a.\r\n\r\nMorbi tincidunt neque at diam tincidunt, id vehicula ex tempor. Nullam lobortis nisi risus, vitae faucibus nibh molestie nec. Nam pharetra vehicula massa, in lacinia velit varius non. Cras at lacus mattis, pulvinar enim sit amet, porta tellus. Donec finibus fermentum iaculis. Praesent sit amet sollicitudin tellus. Nam bibendum imperdiet pharetra. Phasellus dapibus congue cursus. Aliquam sed magna venenatis, elementum odio volutpat, ultrices eros.\r\n\r\nNulla vel tellus vitae risus finibus semper. Phasellus in sem porttitor, pulvinar metus ac, malesuada ipsum. Aliquam a euismod nisl. Nam sed risus at lectus scelerisque blandit id eget felis. Integer dignissim, orci non fringilla finibus, dolor diam venenatis nunc, eget dictum nisi turpis ac orci. Suspendisse in tincidunt felis, ac condimentum massa. Praesent vehicula euismod elit. Suspendisse nisi ante, placerat at enim et, fermentum tempor quam. '),
(2, 2, 'Class aptent taciti sociosqu ad litora.', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus hendrerit lobortis velit, molestie feugiat nibh aliquet at. In sed sagittis justo, tempus lobortis dolor. Sed sem diam, ornare nec nisi eget, tincidunt condimentum tellus. Sed leo est, mattis nec bibendum nec, commodo ut tellus. Fusce vel venenatis orci. Sed velit nunc, convallis sed lectus eget, porta porta velit. Vivamus nibh quam, molestie ut sem a, lobortis commodo justo. Vestibulum consectetur sem in mi malesuada bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam eget nulla orci. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque dapibus rhoncus enim, vel placerat urna. Mauris vulputate elit et rutrum pellentesque. Duis tempus elit erat, quis pellentesque est blandit a.\r\n\r\nMorbi tincidunt neque at diam tincidunt, id vehicula ex tempor. Nullam lobortis nisi risus, vitae faucibus nibh molestie nec. Nam pharetra vehicula massa, in lacinia velit varius non. Cras at lacus mattis, pulvinar enim sit amet, porta tellus. Donec finibus fermentum iaculis. Praesent sit amet sollicitudin tellus. Nam bibendum imperdiet pharetra. Phasellus dapibus congue cursus. Aliquam sed magna venenatis, elementum odio volutpat, ultrices eros.\r\n\r\nNulla vel tellus vitae risus finibus semper. Phasellus in sem porttitor, pulvinar metus ac, malesuada ipsum. Aliquam a euismod nisl. Nam sed risus at lectus scelerisque blandit id eget felis. Integer dignissim, orci non fringilla finibus, dolor diam venenatis nunc, eget dictum nisi turpis ac orci. Suspendisse in tincidunt felis, ac condimentum massa. Praesent vehicula euismod elit. Suspendisse nisi ante, placerat at enim et, fermentum tempor quam. '),
(3, 3, 'Nulla vel tellus vitae risus finibus semper.', ' In in nisi imperdiet, efficitur arcu a, sollicitudin sem. Proin lacus risus, egestas vel faucibus iaculis, fringilla eu magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur mattis dolor at egestas hendrerit. Sed quis turpis lacinia, rutrum ipsum sed, gravida nibh. Sed leo dui, dignissim non euismod quis, auctor ut lectus. Nam vitae ligula vitae sapien interdum commodo. Proin commodo, justo ut eleifend bibendum, metus mauris scelerisque odio, laoreet tempor eros augue quis mauris. Aliquam tristique pellentesque nunc, sed cursus nulla semper vel. Suspendisse efficitur ligula vitae suscipit sollicitudin. Nullam justo justo, bibendum quis massa at, dapibus aliquet massa. Sed nec sodales lacus, vitae pellentesque ante. Aenean vehicula, lacus vitae viverra luctus, arcu neque scelerisque diam, sagittis imperdiet nisi lorem nec lorem.\r\n\r\nMorbi vestibulum leo vitae erat volutpat molestie. Donec nec lacus quis erat lobortis ultricies sit amet ac lacus. Pellentesque posuere varius tempor. Nam neque nibh, faucibus sed tortor eu, scelerisque ultrices ipsum. Donec a lectus in magna lacinia gravida. Donec tincidunt, nulla id porttitor lobortis, risus massa porttitor mauris, ut pulvinar ipsum justo nec nunc. In feugiat efficitur viverra. Sed nec libero magna. Praesent a ante eget mi placerat auctor. Donec eleifend sapien in erat dictum tincidunt. Nullam luctus sem nec porttitor porta. Vivamus eleifend nisi ut imperdiet malesuada. Donec velit urna, gravida ut dictum a, suscipit id est. '),
(4, 4, 'Sed leo dui, dignissim non euismod quis, auctor ut lectus.', ' In in nisi imperdiet, efficitur arcu a, sollicitudin sem. Proin lacus risus, egestas vel faucibus iaculis, fringilla eu magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur mattis dolor at egestas hendrerit. Sed quis turpis lacinia, rutrum ipsum sed, gravida nibh. Sed leo dui, dignissim non euismod quis, auctor ut lectus. Nam vitae ligula vitae sapien interdum commodo. Proin commodo, justo ut eleifend bibendum, metus mauris scelerisque odio, laoreet tempor eros augue quis mauris. Aliquam tristique pellentesque nunc, sed cursus nulla semper vel. Suspendisse efficitur ligula vitae suscipit sollicitudin. Nullam justo justo, bibendum quis massa at, dapibus aliquet massa. Sed nec sodales lacus, vitae pellentesque ante. Aenean vehicula, lacus vitae viverra luctus, arcu neque scelerisque diam, sagittis imperdiet nisi lorem nec lorem.\r\n\r\nMorbi vestibulum leo vitae erat volutpat molestie. Donec nec lacus quis erat lobortis ultricies sit amet ac lacus. Pellentesque posuere varius tempor. Nam neque nibh, faucibus sed tortor eu, scelerisque ultrices ipsum. Donec a lectus in magna lacinia gravida. Donec tincidunt, nulla id porttitor lobortis, risus massa porttitor mauris, ut pulvinar ipsum justo nec nunc. In feugiat efficitur viverra. Sed nec libero magna. Praesent a ante eget mi placerat auctor. Donec eleifend sapien in erat dictum tincidunt. Nullam luctus sem nec porttitor porta. Vivamus eleifend nisi ut imperdiet malesuada. Donec velit urna, gravida ut dictum a, suscipit id est. '),
(5, 5, 'Aliquam eget nulla orci. Interdum et malesuada.', ' In in nisi imperdiet, efficitur arcu a, sollicitudin sem. Proin lacus risus, egestas vel faucibus iaculis, fringilla eu magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur mattis dolor at egestas hendrerit. Sed quis turpis lacinia, rutrum ipsum sed, gravida nibh. Sed leo dui, dignissim non euismod quis, auctor ut lectus. Nam vitae ligula vitae sapien interdum commodo. Proin commodo, justo ut eleifend bibendum, metus mauris scelerisque odio, laoreet tempor eros augue quis mauris. Aliquam tristique pellentesque nunc, sed cursus nulla semper vel. Suspendisse efficitur ligula vitae suscipit sollicitudin. Nullam justo justo, bibendum quis massa at, dapibus aliquet massa. Sed nec sodales lacus, vitae pellentesque ante. Aenean vehicula, lacus vitae viverra luctus, arcu neque scelerisque diam, sagittis imperdiet nisi lorem nec lorem.\r\n\r\nMorbi vestibulum leo vitae erat volutpat molestie. Donec nec lacus quis erat lobortis ultricies sit amet ac lacus. Pellentesque posuere varius tempor. Nam neque nibh, faucibus sed tortor eu, scelerisque ultrices ipsum. Donec a lectus in magna lacinia gravida. Donec tincidunt, nulla id porttitor lobortis, risus massa porttitor mauris, ut pulvinar ipsum justo nec nunc. In feugiat efficitur viverra. Sed nec libero magna. Praesent a ante eget mi placerat auctor. Donec eleifend sapien in erat dictum tincidunt. Nullam luctus sem nec porttitor porta. Vivamus eleifend nisi ut imperdiet malesuada. Donec velit urna, gravida ut dictum a, suscipit id est. '),
(6, 6, 'Suspendisse nisi ante, placerat at enim et.', ' In in nisi imperdiet, efficitur arcu a, sollicitudin sem. Proin lacus risus, egestas vel faucibus iaculis, fringilla eu magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur mattis dolor at egestas hendrerit. Sed quis turpis lacinia, rutrum ipsum sed, gravida nibh. Sed leo dui, dignissim non euismod quis, auctor ut lectus. Nam vitae ligula vitae sapien interdum commodo. Proin commodo, justo ut eleifend bibendum, metus mauris scelerisque odio, laoreet tempor eros augue quis mauris. Aliquam tristique pellentesque nunc, sed cursus nulla semper vel. Suspendisse efficitur ligula vitae suscipit sollicitudin. Nullam justo justo, bibendum quis massa at, dapibus aliquet massa. Sed nec sodales lacus, vitae pellentesque ante. Aenean vehicula, lacus vitae viverra luctus, arcu neque scelerisque diam, sagittis imperdiet nisi lorem nec lorem.\r\n\r\nMorbi vestibulum leo vitae erat volutpat molestie. Donec nec lacus quis erat lobortis ultricies sit amet ac lacus. Pellentesque posuere varius tempor. Nam neque nibh, faucibus sed tortor eu, scelerisque ultrices ipsum. Donec a lectus in magna lacinia gravida. Donec tincidunt, nulla id porttitor lobortis, risus massa porttitor mauris, ut pulvinar ipsum justo nec nunc. In feugiat efficitur viverra. Sed nec libero magna. Praesent a ante eget mi placerat auctor. Donec eleifend sapien in erat dictum tincidunt. Nullam luctus sem nec porttitor porta. Vivamus eleifend nisi ut imperdiet malesuada. Donec velit urna, gravida ut dictum a, suscipit id est. '),
(7, 7, 'Donec nec lacus quis erat lobortis ultricies sit amet ac lacus.', ' In in nisi imperdiet, efficitur arcu a, sollicitudin sem. Proin lacus risus, egestas vel faucibus iaculis, fringilla eu magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur mattis dolor at egestas hendrerit. Sed quis turpis lacinia, rutrum ipsum sed, gravida nibh. Sed leo dui, dignissim non euismod quis, auctor ut lectus. Nam vitae ligula vitae sapien interdum commodo. Proin commodo, justo ut eleifend bibendum, metus mauris scelerisque odio, laoreet tempor eros augue quis mauris. Aliquam tristique pellentesque nunc, sed cursus nulla semper vel. Suspendisse efficitur ligula vitae suscipit sollicitudin. Nullam justo justo, bibendum quis massa at, dapibus aliquet massa. Sed nec sodales lacus, vitae pellentesque ante. Aenean vehicula, lacus vitae viverra luctus, arcu neque scelerisque diam, sagittis imperdiet nisi lorem nec lorem.\r\n\r\nMorbi vestibulum leo vitae erat volutpat molestie. Donec nec lacus quis erat lobortis ultricies sit amet ac lacus. Pellentesque posuere varius tempor. Nam neque nibh, faucibus sed tortor eu, scelerisque ultrices ipsum. Donec a lectus in magna lacinia gravida. Donec tincidunt, nulla id porttitor lobortis, risus massa porttitor mauris, ut pulvinar ipsum justo nec nunc. In feugiat efficitur viverra. Sed nec libero magna. Praesent a ante eget mi placerat auctor. Donec eleifend sapien in erat dictum tincidunt. Nullam luctus sem nec porttitor porta. Vivamus eleifend nisi ut imperdiet malesuada. Donec velit urna, gravida ut dictum a, suscipit id est. '),
(8, 8, 'Quisque tincidunt laoreet semper.', ' Aenean porta est risus, ac sagittis arcu dapibus in. Pellentesque sed auctor sem. Cras ut nunc vel lacus faucibus accumsan. Nulla commodo gravida ex vel blandit. Nulla facilisi. Integer urna neque, gravida in faucibus a, venenatis sit amet lacus. Praesent scelerisque mauris et nunc maximus, sed pellentesque elit accumsan. Nulla purus quam, accumsan ut risus laoreet, sagittis posuere neque. Vivamus at risus viverra, pellentesque diam eget, semper nibh. Aenean auctor posuere tortor, et aliquam ante finibus et. Phasellus id est mauris. Sed mollis malesuada lectus, et maximus neque consectetur et.\r\n\r\nEtiam egestas, turpis in rutrum pellentesque, erat leo tristique elit, ac venenatis erat nunc at metus. Sed quis odio sit amet lorem vehicula semper. Duis lacus magna, facilisis vel quam ut, commodo cursus dolor. Etiam massa sapien, porttitor at varius ut, dapibus sed nisl. Pellentesque vel consequat ligula. Quisque congue lectus non nisl mollis, sed interdum diam egestas. Morbi vitae leo pretium risus vehicula tincidunt. In nec felis at justo malesuada accumsan sit amet ac ex. Donec tempus odio eget ipsum consectetur semper. Curabitur efficitur dolor id nisi consequat, aliquet hendrerit ex finibus. Nulla interdum elit vitae tortor lobortis pellentesque. Nullam rutrum ullamcorper ex et venenatis. Maecenas ut lorem id lorem facilisis venenatis. Morbi non augue ut velit hendrerit feugiat.\r\n\r\nQuisque tincidunt laoreet semper. Sed venenatis imperdiet eros, in consectetur magna tempus sed. Phasellus pretium maximus dictum. Donec pharetra nisi mollis mi malesuada, at fringilla turpis pellentesque. Cras malesuada, est eget eleifend auctor, turpis elit pulvinar erat, sit amet bibendum enim lectus ut nisl. In egestas finibus pellentesque. Nam rutrum odio nibh, id auctor sem vulputate quis. '),
(9, 9, 'Quisque tincidunt laoreet semper.', ' Aenean porta est risus, ac sagittis arcu dapibus in. Pellentesque sed auctor sem. Cras ut nunc vel lacus faucibus accumsan. Nulla commodo gravida ex vel blandit. Nulla facilisi. Integer urna neque, gravida in faucibus a, venenatis sit amet lacus. Praesent scelerisque mauris et nunc maximus, sed pellentesque elit accumsan. Nulla purus quam, accumsan ut risus laoreet, sagittis posuere neque. Vivamus at risus viverra, pellentesque diam eget, semper nibh. Aenean auctor posuere tortor, et aliquam ante finibus et. Phasellus id est mauris. Sed mollis malesuada lectus, et maximus neque consectetur et.\r\n\r\nEtiam egestas, turpis in rutrum pellentesque, erat leo tristique elit, ac venenatis erat nunc at metus. Sed quis odio sit amet lorem vehicula semper. Duis lacus magna, facilisis vel quam ut, commodo cursus dolor. Etiam massa sapien, porttitor at varius ut, dapibus sed nisl. Pellentesque vel consequat ligula. Quisque congue lectus non nisl mollis, sed interdum diam egestas. Morbi vitae leo pretium risus vehicula tincidunt. In nec felis at justo malesuada accumsan sit amet ac ex. Donec tempus odio eget ipsum consectetur semper. Curabitur efficitur dolor id nisi consequat, aliquet hendrerit ex finibus. Nulla interdum elit vitae tortor lobortis pellentesque. Nullam rutrum ullamcorper ex et venenatis. Maecenas ut lorem id lorem facilisis venenatis. Morbi non augue ut velit hendrerit feugiat.\r\n\r\nQuisque tincidunt laoreet semper. Sed venenatis imperdiet eros, in consectetur magna tempus sed. Phasellus pretium maximus dictum. Donec pharetra nisi mollis mi malesuada, at fringilla turpis pellentesque. Cras malesuada, est eget eleifend auctor, turpis elit pulvinar erat, sit amet bibendum enim lectus ut nisl. In egestas finibus pellentesque. Nam rutrum odio nibh, id auctor sem vulputate quis. '),
(10, 10, 'Aenean porta est risus, ac sagittis arcu dapibus in.', ' Aenean porta est risus, ac sagittis arcu dapibus in. Pellentesque sed auctor sem. Cras ut nunc vel lacus faucibus accumsan. Nulla commodo gravida ex vel blandit. Nulla facilisi. Integer urna neque, gravida in faucibus a, venenatis sit amet lacus. Praesent scelerisque mauris et nunc maximus, sed pellentesque elit accumsan. Nulla purus quam, accumsan ut risus laoreet, sagittis posuere neque. Vivamus at risus viverra, pellentesque diam eget, semper nibh. Aenean auctor posuere tortor, et aliquam ante finibus et. Phasellus id est mauris. Sed mollis malesuada lectus, et maximus neque consectetur et.\r\n\r\nEtiam egestas, turpis in rutrum pellentesque, erat leo tristique elit, ac venenatis erat nunc at metus. Sed quis odio sit amet lorem vehicula semper. Duis lacus magna, facilisis vel quam ut, commodo cursus dolor. Etiam massa sapien, porttitor at varius ut, dapibus sed nisl. Pellentesque vel consequat ligula. Quisque congue lectus non nisl mollis, sed interdum diam egestas. Morbi vitae leo pretium risus vehicula tincidunt. In nec felis at justo malesuada accumsan sit amet ac ex. Donec tempus odio eget ipsum consectetur semper. Curabitur efficitur dolor id nisi consequat, aliquet hendrerit ex finibus. Nulla interdum elit vitae tortor lobortis pellentesque. Nullam rutrum ullamcorper ex et venenatis. Maecenas ut lorem id lorem facilisis venenatis. Morbi non augue ut velit hendrerit feugiat.\r\n\r\nQuisque tincidunt laoreet semper. Sed venenatis imperdiet eros, in consectetur magna tempus sed. Phasellus pretium maximus dictum. Donec pharetra nisi mollis mi malesuada, at fringilla turpis pellentesque. Cras malesuada, est eget eleifend auctor, turpis elit pulvinar erat, sit amet bibendum enim lectus ut nisl. In egestas finibus pellentesque. Nam rutrum odio nibh, id auctor sem vulputate quis. '),
(11, 11, 'Tincidunt laoreet semper.', ' Aenean porta est risus, ac sagittis arcu dapibus in. Pellentesque sed auctor sem. Cras ut nunc vel lacus faucibus accumsan. Nulla commodo gravida ex vel blandit. Nulla facilisi. Integer urna neque, gravida in faucibus a, venenatis sit amet lacus. Praesent scelerisque mauris et nunc maximus, sed pellentesque elit accumsan. Nulla purus quam, accumsan ut risus laoreet, sagittis posuere neque. Vivamus at risus viverra, pellentesque diam eget, semper nibh. Aenean auctor posuere tortor, et aliquam ante finibus et. Phasellus id est mauris. Sed mollis malesuada lectus, et maximus neque consectetur et.\r\n\r\nEtiam egestas, turpis in rutrum pellentesque, erat leo tristique elit, ac venenatis erat nunc at metus. Sed quis odio sit amet lorem vehicula semper. Duis lacus magna, facilisis vel quam ut, commodo cursus dolor. Etiam massa sapien, porttitor at varius ut, dapibus sed nisl. Pellentesque vel consequat ligula. Quisque congue lectus non nisl mollis, sed interdum diam egestas. Morbi vitae leo pretium risus vehicula tincidunt. In nec felis at justo malesuada accumsan sit amet ac ex. Donec tempus odio eget ipsum consectetur semper. Curabitur efficitur dolor id nisi consequat, aliquet hendrerit ex finibus. Nulla interdum elit vitae tortor lobortis pellentesque. Nullam rutrum ullamcorper ex et venenatis. Maecenas ut lorem id lorem facilisis venenatis. Morbi non augue ut velit hendrerit feugiat.\r\n\r\nQuisque tincidunt laoreet semper. Sed venenatis imperdiet eros, in consectetur magna tempus sed. Phasellus pretium maximus dictum. Donec pharetra nisi mollis mi malesuada, at fringilla turpis pellentesque. Cras malesuada, est eget eleifend auctor, turpis elit pulvinar erat, sit amet bibendum enim lectus ut nisl. In egestas finibus pellentesque. Nam rutrum odio nibh, id auctor sem vulputate quis. '),
(12, 12, ' Nulla interdum elit vitae.', ' Aenean porta est risus, ac sagittis arcu dapibus in. Pellentesque sed auctor sem. Cras ut nunc vel lacus faucibus accumsan. Nulla commodo gravida ex vel blandit. Nulla facilisi. Integer urna neque, gravida in faucibus a, venenatis sit amet lacus. Praesent scelerisque mauris et nunc maximus, sed pellentesque elit accumsan. Nulla purus quam, accumsan ut risus laoreet, sagittis posuere neque. Vivamus at risus viverra, pellentesque diam eget, semper nibh. Aenean auctor posuere tortor, et aliquam ante finibus et. Phasellus id est mauris. Sed mollis malesuada lectus, et maximus neque consectetur et.\r\n\r\nEtiam egestas, turpis in rutrum pellentesque, erat leo tristique elit, ac venenatis erat nunc at metus. Sed quis odio sit amet lorem vehicula semper. Duis lacus magna, facilisis vel quam ut, commodo cursus dolor. Etiam massa sapien, porttitor at varius ut, dapibus sed nisl. Pellentesque vel consequat ligula. Quisque congue lectus non nisl mollis, sed interdum diam egestas. Morbi vitae leo pretium risus vehicula tincidunt. In nec felis at justo malesuada accumsan sit amet ac ex. Donec tempus odio eget ipsum consectetur semper. Curabitur efficitur dolor id nisi consequat, aliquet hendrerit ex finibus. Nulla interdum elit vitae tortor lobortis pellentesque. Nullam rutrum ullamcorper ex et venenatis. Maecenas ut lorem id lorem facilisis venenatis. Morbi non augue ut velit hendrerit feugiat.\r\n\r\nQuisque tincidunt laoreet semper. Sed venenatis imperdiet eros, in consectetur magna tempus sed. Phasellus pretium maximus dictum. Donec pharetra nisi mollis mi malesuada, at fringilla turpis pellentesque. Cras malesuada, est eget eleifend auctor, turpis elit pulvinar erat, sit amet bibendum enim lectus ut nisl. In egestas finibus pellentesque. Nam rutrum odio nibh, id auctor sem vulputate quis. '),
(13, 13, 'Laoreet semper.', ' Aenean porta est risus, ac sagittis arcu dapibus in. Pellentesque sed auctor sem. Cras ut nunc vel lacus faucibus accumsan. Nulla commodo gravida ex vel blandit. Nulla facilisi. Integer urna neque, gravida in faucibus a, venenatis sit amet lacus. Praesent scelerisque mauris et nunc maximus, sed pellentesque elit accumsan. Nulla purus quam, accumsan ut risus laoreet, sagittis posuere neque. Vivamus at risus viverra, pellentesque diam eget, semper nibh. Aenean auctor posuere tortor, et aliquam ante finibus et. Phasellus id est mauris. Sed mollis malesuada lectus, et maximus neque consectetur et.\r\n\r\nEtiam egestas, turpis in rutrum pellentesque, erat leo tristique elit, ac venenatis erat nunc at metus. Sed quis odio sit amet lorem vehicula semper. Duis lacus magna, facilisis vel quam ut, commodo cursus dolor. Etiam massa sapien, porttitor at varius ut, dapibus sed nisl. Pellentesque vel consequat ligula. Quisque congue lectus non nisl mollis, sed interdum diam egestas. Morbi vitae leo pretium risus vehicula tincidunt. In nec felis at justo malesuada accumsan sit amet ac ex. Donec tempus odio eget ipsum consectetur semper. Curabitur efficitur dolor id nisi consequat, aliquet hendrerit ex finibus. Nulla interdum elit vitae tortor lobortis pellentesque. Nullam rutrum ullamcorper ex et venenatis. Maecenas ut lorem id lorem facilisis venenatis. Morbi non augue ut velit hendrerit feugiat.\r\n\r\nQuisque tincidunt laoreet semper. Sed venenatis imperdiet eros, in consectetur magna tempus sed. Phasellus pretium maximus dictum. Donec pharetra nisi mollis mi malesuada, at fringilla turpis pellentesque. Cras malesuada, est eget eleifend auctor, turpis elit pulvinar erat, sit amet bibendum enim lectus ut nisl. In egestas finibus pellentesque. Nam rutrum odio nibh, id auctor sem vulputate quis. '),
(14, 14, 'Erat leo tristique elit.', ' Aenean porta est risus, ac sagittis arcu dapibus in. Pellentesque sed auctor sem. Cras ut nunc vel lacus faucibus accumsan. Nulla commodo gravida ex vel blandit. Nulla facilisi. Integer urna neque, gravida in faucibus a, venenatis sit amet lacus. Praesent scelerisque mauris et nunc maximus, sed pellentesque elit accumsan. Nulla purus quam, accumsan ut risus laoreet, sagittis posuere neque. Vivamus at risus viverra, pellentesque diam eget, semper nibh. Aenean auctor posuere tortor, et aliquam ante finibus et. Phasellus id est mauris. Sed mollis malesuada lectus, et maximus neque consectetur et.\r\n\r\nEtiam egestas, turpis in rutrum pellentesque, erat leo tristique elit, ac venenatis erat nunc at metus. Sed quis odio sit amet lorem vehicula semper. Duis lacus magna, facilisis vel quam ut, commodo cursus dolor. Etiam massa sapien, porttitor at varius ut, dapibus sed nisl. Pellentesque vel consequat ligula. Quisque congue lectus non nisl mollis, sed interdum diam egestas. Morbi vitae leo pretium risus vehicula tincidunt. In nec felis at justo malesuada accumsan sit amet ac ex. Donec tempus odio eget ipsum consectetur semper. Curabitur efficitur dolor id nisi consequat, aliquet hendrerit ex finibus. Nulla interdum elit vitae tortor lobortis pellentesque. Nullam rutrum ullamcorper ex et venenatis. Maecenas ut lorem id lorem facilisis venenatis. Morbi non augue ut velit hendrerit feugiat.\r\n\r\nQuisque tincidunt laoreet semper. Sed venenatis imperdiet eros, in consectetur magna tempus sed. Phasellus pretium maximus dictum. Donec pharetra nisi mollis mi malesuada, at fringilla turpis pellentesque. Cras malesuada, est eget eleifend auctor, turpis elit pulvinar erat, sit amet bibendum enim lectus ut nisl. In egestas finibus pellentesque. Nam rutrum odio nibh, id auctor sem vulputate quis. '),
(15, 15, 'Quisque tincidunt laoreet semper.', ' Aenean porta est risus, ac sagittis arcu dapibus in. Pellentesque sed auctor sem. Cras ut nunc vel lacus faucibus accumsan. Nulla commodo gravida ex vel blandit. Nulla facilisi. Integer urna neque, gravida in faucibus a, venenatis sit amet lacus. Praesent scelerisque mauris et nunc maximus, sed pellentesque elit accumsan. Nulla purus quam, accumsan ut risus laoreet, sagittis posuere neque. Vivamus at risus viverra, pellentesque diam eget, semper nibh. Aenean auctor posuere tortor, et aliquam ante finibus et. Phasellus id est mauris. Sed mollis malesuada lectus, et maximus neque consectetur et.\r\n\r\nEtiam egestas, turpis in rutrum pellentesque, erat leo tristique elit, ac venenatis erat nunc at metus. Sed quis odio sit amet lorem vehicula semper. Duis lacus magna, facilisis vel quam ut, commodo cursus dolor. Etiam massa sapien, porttitor at varius ut, dapibus sed nisl. Pellentesque vel consequat ligula. Quisque congue lectus non nisl mollis, sed interdum diam egestas. Morbi vitae leo pretium risus vehicula tincidunt. In nec felis at justo malesuada accumsan sit amet ac ex. Donec tempus odio eget ipsum consectetur semper. Curabitur efficitur dolor id nisi consequat, aliquet hendrerit ex finibus. Nulla interdum elit vitae tortor lobortis pellentesque. Nullam rutrum ullamcorper ex et venenatis. Maecenas ut lorem id lorem facilisis venenatis. Morbi non augue ut velit hendrerit feugiat.\r\n\r\nQuisque tincidunt laoreet semper. Sed venenatis imperdiet eros, in consectetur magna tempus sed. Phasellus pretium maximus dictum. Donec pharetra nisi mollis mi malesuada, at fringilla turpis pellentesque. Cras malesuada, est eget eleifend auctor, turpis elit pulvinar erat, sit amet bibendum enim lectus ut nisl. In egestas finibus pellentesque. Nam rutrum odio nibh, id auctor sem vulputate quis. '),
(16, 16, 'Quisque tincidunt laoreet semper.', ' Aenean porta est risus, ac sagittis arcu dapibus in. Pellentesque sed auctor sem. Cras ut nunc vel lacus faucibus accumsan. Nulla commodo gravida ex vel blandit. Nulla facilisi. Integer urna neque, gravida in faucibus a, venenatis sit amet lacus. Praesent scelerisque mauris et nunc maximus, sed pellentesque elit accumsan. Nulla purus quam, accumsan ut risus laoreet, sagittis posuere neque. Vivamus at risus viverra, pellentesque diam eget, semper nibh. Aenean auctor posuere tortor, et aliquam ante finibus et. Phasellus id est mauris. Sed mollis malesuada lectus, et maximus neque consectetur et.\r\n\r\nEtiam egestas, turpis in rutrum pellentesque, erat leo tristique elit, ac venenatis erat nunc at metus. Sed quis odio sit amet lorem vehicula semper. Duis lacus magna, facilisis vel quam ut, commodo cursus dolor. Etiam massa sapien, porttitor at varius ut, dapibus sed nisl. Pellentesque vel consequat ligula. Quisque congue lectus non nisl mollis, sed interdum diam egestas. Morbi vitae leo pretium risus vehicula tincidunt. In nec felis at justo malesuada accumsan sit amet ac ex. Donec tempus odio eget ipsum consectetur semper. Curabitur efficitur dolor id nisi consequat, aliquet hendrerit ex finibus. Nulla interdum elit vitae tortor lobortis pellentesque. Nullam rutrum ullamcorper ex et venenatis. Maecenas ut lorem id lorem facilisis venenatis. Morbi non augue ut velit hendrerit feugiat.\r\n\r\nQuisque tincidunt laoreet semper. Sed venenatis imperdiet eros, in consectetur magna tempus sed. Phasellus pretium maximus dictum. Donec pharetra nisi mollis mi malesuada, at fringilla turpis pellentesque. Cras malesuada, est eget eleifend auctor, turpis elit pulvinar erat, sit amet bibendum enim lectus ut nisl. In egestas finibus pellentesque. Nam rutrum odio nibh, id auctor sem vulputate quis. '),
(17, 17, 'Quisque tincidunt laoreet semper.', ' Aenean porta est risus, ac sagittis arcu dapibus in. Pellentesque sed auctor sem. Cras ut nunc vel lacus faucibus accumsan. Nulla commodo gravida ex vel blandit. Nulla facilisi. Integer urna neque, gravida in faucibus a, venenatis sit amet lacus. Praesent scelerisque mauris et nunc maximus, sed pellentesque elit accumsan. Nulla purus quam, accumsan ut risus laoreet, sagittis posuere neque. Vivamus at risus viverra, pellentesque diam eget, semper nibh. Aenean auctor posuere tortor, et aliquam ante finibus et. Phasellus id est mauris. Sed mollis malesuada lectus, et maximus neque consectetur et.\r\n\r\nEtiam egestas, turpis in rutrum pellentesque, erat leo tristique elit, ac venenatis erat nunc at metus. Sed quis odio sit amet lorem vehicula semper. Duis lacus magna, facilisis vel quam ut, commodo cursus dolor. Etiam massa sapien, porttitor at varius ut, dapibus sed nisl. Pellentesque vel consequat ligula. Quisque congue lectus non nisl mollis, sed interdum diam egestas. Morbi vitae leo pretium risus vehicula tincidunt. In nec felis at justo malesuada accumsan sit amet ac ex. Donec tempus odio eget ipsum consectetur semper. Curabitur efficitur dolor id nisi consequat, aliquet hendrerit ex finibus. Nulla interdum elit vitae tortor lobortis pellentesque. Nullam rutrum ullamcorper ex et venenatis. Maecenas ut lorem id lorem facilisis venenatis. Morbi non augue ut velit hendrerit feugiat.\r\n\r\nQuisque tincidunt laoreet semper. Sed venenatis imperdiet eros, in consectetur magna tempus sed. Phasellus pretium maximus dictum. Donec pharetra nisi mollis mi malesuada, at fringilla turpis pellentesque. Cras malesuada, est eget eleifend auctor, turpis elit pulvinar erat, sit amet bibendum enim lectus ut nisl. In egestas finibus pellentesque. Nam rutrum odio nibh, id auctor sem vulputate quis. '),
(18, 18, 'Gincidunt laoreet semper.', ' Aenean porta est risus, ac sagittis arcu dapibus in. Pellentesque sed auctor sem. Cras ut nunc vel lacus faucibus accumsan. Nulla commodo gravida ex vel blandit. Nulla facilisi. Integer urna neque, gravida in faucibus a, venenatis sit amet lacus. Praesent scelerisque mauris et nunc maximus, sed pellentesque elit accumsan. Nulla purus quam, accumsan ut risus laoreet, sagittis posuere neque. Vivamus at risus viverra, pellentesque diam eget, semper nibh. Aenean auctor posuere tortor, et aliquam ante finibus et. Phasellus id est mauris. Sed mollis malesuada lectus, et maximus neque consectetur et.\r\n\r\nEtiam egestas, turpis in rutrum pellentesque, erat leo tristique elit, ac venenatis erat nunc at metus. Sed quis odio sit amet lorem vehicula semper. Duis lacus magna, facilisis vel quam ut, commodo cursus dolor. Etiam massa sapien, porttitor at varius ut, dapibus sed nisl. Pellentesque vel consequat ligula. Quisque congue lectus non nisl mollis, sed interdum diam egestas. Morbi vitae leo pretium risus vehicula tincidunt. In nec felis at justo malesuada accumsan sit amet ac ex. Donec tempus odio eget ipsum consectetur semper. Curabitur efficitur dolor id nisi consequat, aliquet hendrerit ex finibus. Nulla interdum elit vitae tortor lobortis pellentesque. Nullam rutrum ullamcorper ex et venenatis. Maecenas ut lorem id lorem facilisis venenatis. Morbi non augue ut velit hendrerit feugiat.\r\n\r\nQuisque tincidunt laoreet semper. Sed venenatis imperdiet eros, in consectetur magna tempus sed. Phasellus pretium maximus dictum. Donec pharetra nisi mollis mi malesuada, at fringilla turpis pellentesque. Cras malesuada, est eget eleifend auctor, turpis elit pulvinar erat, sit amet bibendum enim lectus ut nisl. In egestas finibus pellentesque. Nam rutrum odio nibh, id auctor sem vulputate quis. '),
(19, 19, 'Quisque tincidunt laoreet semper.', ' Aenean porta est risus, ac sagittis arcu dapibus in. Pellentesque sed auctor sem. Cras ut nunc vel lacus faucibus accumsan. Nulla commodo gravida ex vel blandit. Nulla facilisi. Integer urna neque, gravida in faucibus a, venenatis sit amet lacus. Praesent scelerisque mauris et nunc maximus, sed pellentesque elit accumsan. Nulla purus quam, accumsan ut risus laoreet, sagittis posuere neque. Vivamus at risus viverra, pellentesque diam eget, semper nibh. Aenean auctor posuere tortor, et aliquam ante finibus et. Phasellus id est mauris. Sed mollis malesuada lectus, et maximus neque consectetur et.\r\n\r\nEtiam egestas, turpis in rutrum pellentesque, erat leo tristique elit, ac venenatis erat nunc at metus. Sed quis odio sit amet lorem vehicula semper. Duis lacus magna, facilisis vel quam ut, commodo cursus dolor. Etiam massa sapien, porttitor at varius ut, dapibus sed nisl. Pellentesque vel consequat ligula. Quisque congue lectus non nisl mollis, sed interdum diam egestas. Morbi vitae leo pretium risus vehicula tincidunt. In nec felis at justo malesuada accumsan sit amet ac ex. Donec tempus odio eget ipsum consectetur semper. Curabitur efficitur dolor id nisi consequat, aliquet hendrerit ex finibus. Nulla interdum elit vitae tortor lobortis pellentesque. Nullam rutrum ullamcorper ex et venenatis. Maecenas ut lorem id lorem facilisis venenatis. Morbi non augue ut velit hendrerit feugiat.\r\n\r\nQuisque tincidunt laoreet semper. Sed venenatis imperdiet eros, in consectetur magna tempus sed. Phasellus pretium maximus dictum. Donec pharetra nisi mollis mi malesuada, at fringilla turpis pellentesque. Cras malesuada, est eget eleifend auctor, turpis elit pulvinar erat, sit amet bibendum enim lectus ut nisl. In egestas finibus pellentesque. Nam rutrum odio nibh, id auctor sem vulputate quis. '),
(20, 20, 'Quisque tincidunt laoreet semper.', '<p>1Aenean porta est risus, ac sagittis arcu dapibus in. Pellentesque sed auctor sem. Cras ut nunc vel lacus faucibus accumsan. Nulla commodo gravida ex vel blandit. Nulla facilisi. Integer urna neque, gravida in faucibus a, venenatis sit amet lacus. Praesent scelerisque mauris et nunc maximus, sed pellentesque elit accumsan. Nulla purus quam, accumsan ut risus laoreet, sagittis posuere neque. Vivamus at risus viverra, pellentesque diam eget, semper nibh. Aenean auctor posuere tortor, et aliquam ante finibus et. Phasellus id est mauris. Sed mollis malesuada lectus, et maximus neque consectetur et.</p><p>Etiam egestas, turpis in rutrum pellentesque, erat leo tristique elit, ac venenatis erat nunc at metus. Sed quis odio sit amet lorem vehicula semper.</p><p>Duis lacus magna, facilisis vel quam ut, commodo cursus dolor. Etiam massa sapien, porttitor at varius ut, dapibus sed nisl. Pellentesque vel consequat ligula. Quisque congue lectus non nisl mollis, sed interdum diam egestas. Morbi vitae leo pretium risus vehicula tincidunt. In nec felis at justo malesuada accumsan sit amet ac ex. Donec tempus odio eget ipsum consectetur semper. Curabitur efficitur dolor id nisi consequat, aliquet hendrerit ex finibus. Nulla interdum elit vitae tortor lobortis pellentesque. Nullam rutrum ullamcorper ex et venenatis. Maecenas ut lorem id lorem facilisis venenatis. Morbi non augue ut velit hendrerit feugiat.</p><p>Quisque tincidunt laoreet semper. Sed venenatis imperdiet eros, in consectetur magna tempus sed. Phasellus pretium maximus dictum. Donec pharetra nisi mollis mi malesuada, at fringilla turpis pellentesque. Cras malesuada, est eget eleifend auctor, turpis elit pulvinar erat, sit amet bibendum enim lectus ut nisl. In egestas finibus pellentesque. Nam rutrum odio nibh, id auctor sem vulputate quis.</p> </p>');

-- --------------------------------------------------------

--
-- Структура таблицы `stories_main`
--

CREATE TABLE `stories_main` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `views` int(100) UNSIGNED DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stories_main`
--

INSERT INTO `stories_main` (`id`, `date`, `views`, `active`) VALUES
(1, '2018-02-16 01:41:05', 78, 1),
(2, '2018-02-16 01:36:35', 19, 1),
(3, '2018-02-03 20:23:25', NULL, 1),
(4, '2018-02-03 20:23:37', NULL, 1),
(5, '2018-02-03 20:23:16', NULL, 1),
(6, '2018-02-13 15:48:11', NULL, 1),
(7, '2018-02-03 20:24:24', NULL, 1),
(8, '2018-02-04 18:27:40', NULL, 1),
(9, '2018-02-04 18:30:32', NULL, 1),
(10, '2018-02-04 18:30:50', NULL, 1),
(11, '2018-02-06 13:34:18', 6, 1),
(12, '2018-02-04 18:30:50', NULL, 1),
(13, '2018-02-04 18:30:50', NULL, 1),
(14, '2018-02-04 18:30:51', NULL, 1),
(15, '2018-02-04 18:30:51', 5, 1),
(16, '2018-02-04 18:30:51', NULL, 1),
(17, '2018-02-04 18:30:51', NULL, 1),
(18, '2018-02-16 16:49:05', NULL, 1),
(19, '2018-02-04 18:30:51', NULL, 1),
(20, '2018-02-04 18:30:51', NULL, 1);

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

--
-- Дамп данных таблицы `stories_ru`
--

INSERT INTO `stories_ru` (`id`, `id_stories`, `title`, `content`) VALUES
(1, 1, 'Проснувшись однажды утром после беспокойного сна.', '<p>Лежа на панцирнотвердой спине, он видел, стоило ему приподнять голову, свой коричневый, выпуклый, разделенный дугообразными чешуйками живот, на верхушке которого еле держалось готовое вот-вот окончательно сползти одеяло. Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами.</p><p>«Что со мной случилось?» – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах. Над столом, где были разложены распакованные образцы сукон – Замза был коммивояжером, – висел портрет, который он недавно вырезал из иллюстрированного журнала и вставил в красивую золоченую рамку. На портрете была изображена дама в меховой шляпе и боа, она сидела очень прямо и протягивала зрителю тяжелую меховую муфту, в которой целиком исчезала ее рука.</p><p>Затем взгляд Грегора устремился в окно, и пасмурная погода – слышно было, как по жести подоконника стучат капли дождя – привела его и вовсе в грустное настроение. «Хорошо бы еще немного поспать и забыть всю эту чепуху», – подумал он, но это было совершенно неосуществимо, он привык спать на правом боку, а в теперешнем своем.</p>'),
(2, 2, 'Проснувшись однажды утром после беспокойного сна.', '<p>Лежа на панцирнотвердой спине, он видел, стоило ему приподнять голову, свой коричневый, выпуклый, разделенный дугообразными чешуйками живот, на верхушке которого еле держалось готовое вот-вот окончательно сползти одеяло. Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами.</p><p>«Что со мной случилось?» – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах. Над столом, где были разложены распакованные образцы сукон – Замза был коммивояжером, – висел портрет, который он недавно вырезал из иллюстрированного журнала и вставил в красивую золоченую рамку. На портрете была изображена дама в меховой шляпе и боа, она сидела очень прямо и протягивала зрителю тяжелую меховую муфту, в которой целиком исчезала ее рука.</p><p>Затем взгляд Грегора устремился в окно, и пасмурная погода – слышно было, как по жести подоконника стучат капли дождя – привела его и вовсе в грустное настроение. «Хорошо бы еще немного поспать и забыть всю эту чепуху», – подумал он, но это было совершенно неосуществимо, он привык спать на правом боку, а в теперешнем своем.</p>'),
(3, 3, 'Проснувшись однажды утром после беспокойного сна.', '<p>Лежа на панцирнотвердой спине, он видел, стоило ему приподнять голову, свой коричневый, выпуклый, разделенный дугообразными чешуйками живот, на верхушке которого еле держалось готовое вот-вот окончательно сползти одеяло. Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами.</p><p>«Что со мной случилось?» – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах. Над столом, где были разложены распакованные образцы сукон – Замза был коммивояжером, – висел портрет, который он недавно вырезал из иллюстрированного журнала и вставил в красивую золоченую рамку. На портрете была изображена дама в меховой шляпе и боа, она сидела очень прямо и протягивала зрителю тяжелую меховую муфту, в которой целиком исчезала ее рука.</p><p>Затем взгляд Грегора устремился в окно, и пасмурная погода – слышно было, как по жести подоконника стучат капли дождя – привела его и вовсе в грустное настроение. «Хорошо бы еще немного поспать и забыть всю эту чепуху», – подумал он, но это было совершенно неосуществимо, он привык спать на правом боку, а в теперешнем своем.</p>'),
(4, 4, 'Проснувшись однажды утром после беспокойного сна.', '<p>Лежа на панцирнотвердой спине, он видел, стоило ему приподнять голову, свой коричневый, выпуклый, разделенный дугообразными чешуйками живот, на верхушке которого еле держалось готовое вот-вот окончательно сползти одеяло. Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами.</p><p>«Что со мной случилось?» – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах. Над столом, где были разложены распакованные образцы сукон – Замза был коммивояжером, – висел портрет, который он недавно вырезал из иллюстрированного журнала и вставил в красивую золоченую рамку. На портрете была изображена дама в меховой шляпе и боа, она сидела очень прямо и протягивала зрителю тяжелую меховую муфту, в которой целиком исчезала ее рука.</p><p>Затем взгляд Грегора устремился в окно, и пасмурная погода – слышно было, как по жести подоконника стучат капли дождя – привела его и вовсе в грустное настроение. «Хорошо бы еще немного поспать и забыть всю эту чепуху», – подумал он, но это было совершенно неосуществимо, он привык спать на правом боку, а в теперешнем своем.</p>'),
(5, 5, 'Проснувшись однажды утром после беспокойного сна.', '<p>Лежа на панцирнотвердой спине, он видел, стоило ему приподнять голову, свой коричневый, выпуклый, разделенный дугообразными чешуйками живот, на верхушке которого еле держалось готовое вот-вот окончательно сползти одеяло. Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами.</p><p>«Что со мной случилось?» – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах. Над столом, где были разложены распакованные образцы сукон – Замза был коммивояжером, – висел портрет, который он недавно вырезал из иллюстрированного журнала и вставил в красивую золоченую рамку. На портрете была изображена дама в меховой шляпе и боа, она сидела очень прямо и протягивала зрителю тяжелую меховую муфту, в которой целиком исчезала ее рука.</p><p>Затем взгляд Грегора устремился в окно, и пасмурная погода – слышно было, как по жести подоконника стучат капли дождя – привела его и вовсе в грустное настроение. «Хорошо бы еще немного поспать и забыть всю эту чепуху», – подумал он, но это было совершенно неосуществимо, он привык спать на правом боку, а в теперешнем своем.</p>'),
(6, 6, 'Проснувшись однажды утром после беспокойного сна.', '<p>Лежа на панцирнотвердой спине, он видел, стоило ему приподнять голову, свой коричневый, выпуклый, разделенный дугообразными чешуйками живот, на верхушке которого еле держалось готовое вот-вот окончательно сползти одеяло. Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами.</p><p>«Что со мной случилось?» – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах. Над столом, где были разложены распакованные образцы сукон – Замза был коммивояжером, – висел портрет, который он недавно вырезал из иллюстрированного журнала и вставил в красивую золоченую рамку. На портрете была изображена дама в меховой шляпе и боа, она сидела очень прямо и протягивала зрителю тяжелую меховую муфту, в которой целиком исчезала ее рука.</p><p>Затем взгляд Грегора устремился в окно, и пасмурная погода – слышно было, как по жести подоконника стучат капли дождя – привела его и вовсе в грустное настроение. «Хорошо бы еще немного поспать и забыть всю эту чепуху», – подумал он, но это было совершенно неосуществимо, он привык спать на правом боку, а в теперешнем своем.</p>'),
(7, 7, 'Проснувшись однажды утром после беспокойного сна.', '<p>Лежа на панцирнотвердой спине, он видел, стоило ему приподнять голову, свой коричневый, выпуклый, разделенный дугообразными чешуйками живот, на верхушке которого еле держалось готовое вот-вот окончательно сползти одеяло. Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами.</p><p>«Что со мной случилось?» – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах. Над столом, где были разложены распакованные образцы сукон – Замза был коммивояжером, – висел портрет, который он недавно вырезал из иллюстрированного журнала и вставил в красивую золоченую рамку. На портрете была изображена дама в меховой шляпе и боа, она сидела очень прямо и протягивала зрителю тяжелую меховую муфту, в которой целиком исчезала ее рука.</p><p>Затем взгляд Грегора устремился в окно, и пасмурная погода – слышно было, как по жести подоконника стучат капли дождя – привела его и вовсе в грустное настроение. «Хорошо бы еще немного поспать и забыть всю эту чепуху», – подумал он, но это было совершенно неосуществимо, он привык спать на правом боку, а в теперешнем своем.</p>'),
(8, 8, 'Проснувшись однажды утром после беспокойного сна.', '<p>Лежа на панцирнотвердой спине, он видел, стоило ему приподнять голову, свой коричневый, выпуклый, разделенный дугообразными чешуйками живот, на верхушке которого еле держалось готовое вот-вот окончательно сползти одеяло. Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами.</p><p>«Что со мной случилось?» – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах. Над столом, где были разложены распакованные образцы сукон – Замза был коммивояжером, – висел портрет, который он недавно вырезал из иллюстрированного журнала и вставил в красивую золоченую рамку. На портрете была изображена дама в меховой шляпе и боа, она сидела очень прямо и протягивала зрителю тяжелую меховую муфту, в которой целиком исчезала ее рука.</p><p>Затем взгляд Грегора устремился в окно, и пасмурная погода – слышно было, как по жести подоконника стучат капли дождя – привела его и вовсе в грустное настроение. «Хорошо бы еще немного поспать и забыть всю эту чепуху», – подумал он, но это было совершенно неосуществимо, он привык спать на правом боку, а в теперешнем своем.</p>'),
(9, 9, 'Проснувшись однажды утром после беспокойного сна.', '<p>Лежа на панцирнотвердой спине, он видел, стоило ему приподнять голову, свой коричневый, выпуклый, разделенный дугообразными чешуйками живот, на верхушке которого еле держалось готовое вот-вот окончательно сползти одеяло. Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами.</p><p>«Что со мной случилось?» – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах. Над столом, где были разложены распакованные образцы сукон – Замза был коммивояжером, – висел портрет, который он недавно вырезал из иллюстрированного журнала и вставил в красивую золоченую рамку. На портрете была изображена дама в меховой шляпе и боа, она сидела очень прямо и протягивала зрителю тяжелую меховую муфту, в которой целиком исчезала ее рука.</p><p>Затем взгляд Грегора устремился в окно, и пасмурная погода – слышно было, как по жести подоконника стучат капли дождя – привела его и вовсе в грустное настроение. «Хорошо бы еще немного поспать и забыть всю эту чепуху», – подумал он, но это было совершенно неосуществимо, он привык спать на правом боку, а в теперешнем своем.</p>'),
(10, 10, 'Проснувшись однажды утром после беспокойного сна.', '<p>Лежа на панцирнотвердой спине, он видел, стоило ему приподнять голову, свой коричневый, выпуклый, разделенный дугообразными чешуйками живот, на верхушке которого еле держалось готовое вот-вот окончательно сползти одеяло. Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами.</p><p>«Что со мной случилось?» – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах. Над столом, где были разложены распакованные образцы сукон – Замза был коммивояжером, – висел портрет, который он недавно вырезал из иллюстрированного журнала и вставил в красивую золоченую рамку. На портрете была изображена дама в меховой шляпе и боа, она сидела очень прямо и протягивала зрителю тяжелую меховую муфту, в которой целиком исчезала ее рука.</p><p>Затем взгляд Грегора устремился в окно, и пасмурная погода – слышно было, как по жести подоконника стучат капли дождя – привела его и вовсе в грустное настроение. «Хорошо бы еще немного поспать и забыть всю эту чепуху», – подумал он, но это было совершенно неосуществимо, он привык спать на правом боку, а в теперешнем своем.</p>'),
(11, 11, 'Проснувшись однажды утром после беспокойного сна.', '<p>Лежа на панцирнотвердой спине, он видел, стоило ему приподнять голову, свой коричневый, выпуклый, разделенный дугообразными чешуйками живот, на верхушке которого еле держалось готовое вот-вот окончательно сползти одеяло. Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами.</p><p>«Что со мной случилось?» – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах. Над столом, где были разложены распакованные образцы сукон – Замза был коммивояжером, – висел портрет, который он недавно вырезал из иллюстрированного журнала и вставил в красивую золоченую рамку. На портрете была изображена дама в меховой шляпе и боа, она сидела очень прямо и протягивала зрителю тяжелую меховую муфту, в которой целиком исчезала ее рука.</p><p>Затем взгляд Грегора устремился в окно, и пасмурная погода – слышно было, как по жести подоконника стучат капли дождя – привела его и вовсе в грустное настроение. «Хорошо бы еще немного поспать и забыть всю эту чепуху», – подумал он, но это было совершенно неосуществимо, он привык спать на правом боку, а в теперешнем своем.</p>'),
(12, 12, 'Проснувшись однажды утром после беспокойного сна.', '<p>Лежа на панцирнотвердой спине, он видел, стоило ему приподнять голову, свой коричневый, выпуклый, разделенный дугообразными чешуйками живот, на верхушке которого еле держалось готовое вот-вот окончательно сползти одеяло. Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами.</p><p>«Что со мной случилось?» – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах. Над столом, где были разложены распакованные образцы сукон – Замза был коммивояжером, – висел портрет, который он недавно вырезал из иллюстрированного журнала и вставил в красивую золоченую рамку. На портрете была изображена дама в меховой шляпе и боа, она сидела очень прямо и протягивала зрителю тяжелую меховую муфту, в которой целиком исчезала ее рука.</p><p>Затем взгляд Грегора устремился в окно, и пасмурная погода – слышно было, как по жести подоконника стучат капли дождя – привела его и вовсе в грустное настроение. «Хорошо бы еще немного поспать и забыть всю эту чепуху», – подумал он, но это было совершенно неосуществимо, он привык спать на правом боку, а в теперешнем своем.</p>'),
(13, 13, 'Проснувшись однажды утром после беспокойного сна.', '<p>Лежа на панцирнотвердой спине, он видел, стоило ему приподнять голову, свой коричневый, выпуклый, разделенный дугообразными чешуйками живот, на верхушке которого еле держалось готовое вот-вот окончательно сползти одеяло. Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами.</p><p>«Что со мной случилось?» – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах. Над столом, где были разложены распакованные образцы сукон – Замза был коммивояжером, – висел портрет, который он недавно вырезал из иллюстрированного журнала и вставил в красивую золоченую рамку. На портрете была изображена дама в меховой шляпе и боа, она сидела очень прямо и протягивала зрителю тяжелую меховую муфту, в которой целиком исчезала ее рука.</p><p>Затем взгляд Грегора устремился в окно, и пасмурная погода – слышно было, как по жести подоконника стучат капли дождя – привела его и вовсе в грустное настроение. «Хорошо бы еще немного поспать и забыть всю эту чепуху», – подумал он, но это было совершенно неосуществимо, он привык спать на правом боку, а в теперешнем своем.</p>'),
(14, 14, 'Проснувшись однажды утром после беспокойного сна.', '<p>Лежа на панцирнотвердой спине, он видел, стоило ему приподнять голову, свой коричневый, выпуклый, разделенный дугообразными чешуйками живот, на верхушке которого еле держалось готовое вот-вот окончательно сползти одеяло. Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами.</p><p>«Что со мной случилось?» – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах. Над столом, где были разложены распакованные образцы сукон – Замза был коммивояжером, – висел портрет, который он недавно вырезал из иллюстрированного журнала и вставил в красивую золоченую рамку. На портрете была изображена дама в меховой шляпе и боа, она сидела очень прямо и протягивала зрителю тяжелую меховую муфту, в которой целиком исчезала ее рука.</p><p>Затем взгляд Грегора устремился в окно, и пасмурная погода – слышно было, как по жести подоконника стучат капли дождя – привела его и вовсе в грустное настроение. «Хорошо бы еще немного поспать и забыть всю эту чепуху», – подумал он, но это было совершенно неосуществимо, он привык спать на правом боку, а в теперешнем своем.</p>'),
(15, 15, 'Проснувшись однажды утром после беспокойного сна.', '<p>Лежа на панцирнотвердой спине, он видел, стоило ему приподнять голову, свой коричневый, выпуклый, разделенный дугообразными чешуйками живот, на верхушке которого еле держалось готовое вот-вот окончательно сползти одеяло. Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами.</p><p>«Что со мной случилось?» – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах. Над столом, где были разложены распакованные образцы сукон – Замза был коммивояжером, – висел портрет, который он недавно вырезал из иллюстрированного журнала и вставил в красивую золоченую рамку. На портрете была изображена дама в меховой шляпе и боа, она сидела очень прямо и протягивала зрителю тяжелую меховую муфту, в которой целиком исчезала ее рука.</p><p>Затем взгляд Грегора устремился в окно, и пасмурная погода – слышно было, как по жести подоконника стучат капли дождя – привела его и вовсе в грустное настроение. «Хорошо бы еще немного поспать и забыть всю эту чепуху», – подумал он, но это было совершенно неосуществимо, он привык спать на правом боку, а в теперешнем своем.</p>'),
(16, 16, 'Проснувшись однажды утром после беспокойного сна.', '<p>Лежа на панцирнотвердой спине, он видел, стоило ему приподнять голову, свой коричневый, выпуклый, разделенный дугообразными чешуйками живот, на верхушке которого еле держалось готовое вот-вот окончательно сползти одеяло. Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами.</p><p>«Что со мной случилось?» – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах. Над столом, где были разложены распакованные образцы сукон – Замза был коммивояжером, – висел портрет, который он недавно вырезал из иллюстрированного журнала и вставил в красивую золоченую рамку. На портрете была изображена дама в меховой шляпе и боа, она сидела очень прямо и протягивала зрителю тяжелую меховую муфту, в которой целиком исчезала ее рука.</p><p>Затем взгляд Грегора устремился в окно, и пасмурная погода – слышно было, как по жести подоконника стучат капли дождя – привела его и вовсе в грустное настроение. «Хорошо бы еще немного поспать и забыть всю эту чепуху», – подумал он, но это было совершенно неосуществимо, он привык спать на правом боку, а в теперешнем своем.</p>'),
(17, 17, 'Проснувшись однажды утром после беспокойного сна.', '<p>Лежа на панцирнотвердой спине, он видел, стоило ему приподнять голову, свой коричневый, выпуклый, разделенный дугообразными чешуйками живот, на верхушке которого еле держалось готовое вот-вот окончательно сползти одеяло. Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами.</p><p>«Что со мной случилось?» – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах. Над столом, где были разложены распакованные образцы сукон – Замза был коммивояжером, – висел портрет, который он недавно вырезал из иллюстрированного журнала и вставил в красивую золоченую рамку. На портрете была изображена дама в меховой шляпе и боа, она сидела очень прямо и протягивала зрителю тяжелую меховую муфту, в которой целиком исчезала ее рука.</p><p>Затем взгляд Грегора устремился в окно, и пасмурная погода – слышно было, как по жести подоконника стучат капли дождя – привела его и вовсе в грустное настроение. «Хорошо бы еще немного поспать и забыть всю эту чепуху», – подумал он, но это было совершенно неосуществимо, он привык спать на правом боку, а в теперешнем своем.</p>'),
(18, 18, 'Проснувшись однажды утром после беспокойного сна.', '<p>Лежа на панцирнотвердой спине, он видел, стоило ему приподнять голову, свой коричневый, выпуклый, разделенный дугообразными чешуйками живот, на верхушке которого еле держалось готовое вот-вот окончательно сползти одеяло. Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами.</p><p>«Что со мной случилось?» – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах. Над столом, где были разложены распакованные образцы сукон – Замза был коммивояжером, – висел портрет, который он недавно вырезал из иллюстрированного журнала и вставил в красивую золоченую рамку. На портрете была изображена дама в меховой шляпе и боа, она сидела очень прямо и протягивала зрителю тяжелую меховую муфту, в которой целиком исчезала ее рука.</p><p>Затем взгляд Грегора устремился в окно, и пасмурная погода – слышно было, как по жести подоконника стучат капли дождя – привела его и вовсе в грустное настроение. «Хорошо бы еще немного поспать и забыть всю эту чепуху», – подумал он, но это было совершенно неосуществимо, он привык спать на правом боку, а в теперешнем своем.</p>'),
(19, 19, 'Проснувшись однажды утром после беспокойного сна.', '<p>Лежа на панцирнотвердой спине, он видел, стоило ему приподнять голову, свой коричневый, выпуклый, разделенный дугообразными чешуйками живот, на верхушке которого еле держалось готовое вот-вот окончательно сползти одеяло. Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами.</p><p>«Что со мной случилось?» – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах. Над столом, где были разложены распакованные образцы сукон – Замза был коммивояжером, – висел портрет, который он недавно вырезал из иллюстрированного журнала и вставил в красивую золоченую рамку. На портрете была изображена дама в меховой шляпе и боа, она сидела очень прямо и протягивала зрителю тяжелую меховую муфту, в которой целиком исчезала ее рука.</p><p>Затем взгляд Грегора устремился в окно, и пасмурная погода – слышно было, как по жести подоконника стучат капли дождя – привела его и вовсе в грустное настроение. «Хорошо бы еще немного поспать и забыть всю эту чепуху», – подумал он, но это было совершенно неосуществимо, он привык спать на правом боку, а в теперешнем своем.</p>'),
(20, 20, 'Проснувшись однажды утром после беспокойного сна.', '<p>Лежа на панцирнотвердой спине, он видел, стоило ему приподнять голову, свой коричневый, выпуклый, разделенный дугообразными чешуйками живот, на верхушке которого еле держалось готовое вот-вот окончательно сползти одеяло. Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами.</p><p>«Что со мной случилось?» – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах. Над столом, где были разложены распакованные образцы сукон – Замза был коммивояжером, – висел портрет, который он недавно вырезал из иллюстрированного журнала и вставил в красивую золоченую рамку. На портрете была изображена дама в меховой шляпе и боа, она сидела очень прямо и протягивала зрителю тяжелую меховую муфту, в которой целиком исчезала ее рука.</p><p>Затем взгляд Грегора устремился в окно, и пасмурная погода – слышно было, как по жести подоконника стучат капли дождя – привела его и вовсе в грустное настроение. «Хорошо бы еще немного поспать и забыть всю эту чепуху», – подумал он, но это было совершенно неосуществимо, он привык спать на правом боку, а в теперешнем своем.</p>');

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

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `firstName`, `secondName`, `sex`, `email`, `tel`, `role`, `password`, `secretkey`, `active`) VALUES
(1, NULL, NULL, NULL, 'admin@mail.ua', NULL, 'admin', '4ccd29639f5ed013021fec781aa9da3e', '5b3121524e708', 1),
(4, 'Костя', 'Комаров', 'm', 'kostya@mail.ua', '+38 (095) 057 - 81 - 50', 'user', '5ac9db2a78a580d0a8ded6a081cefb49', '5b2ce3246ef07', 1),
(5, 'Дима', 'Дмитриев', 'm', 'dima@mail.ua', '+38 (095) 057 - 81 - 50', 'user', 'f294ab2c790bc23289a23454dbe7bd9b', '5b31211c1b3be', 1),
(6, 'Верка', NULL, 'f', 'vera@mail.ua', '+38 (095) 874 - 65 - 71', 'user', '70dbb49e79ddb8bd10333dc8886944cf', '5b312138916c8', 1),
(7, NULL, NULL, NULL, 'denis@mail.ua', '+38 (095) 057 - 87 - 87', 'user', 'aaf075cc6043704925c0bfe8177e0393', '5b1eb0a23d90a', 1),
(8, 'Федя', NULL, 'm', 'fedor@mail.ua', '+38 (095) 874 - 12 - 36', 'user', '0dace4a2a8719a14e5f8392aabb44c89', '5b31095f2800e', 1),
(9, 'Ленка', 'Коленка', 'f', 'lena@mail.ua', '+38 (066) 999 - 88 - 83', 'user', '26933e1c6ad7495c05a09f27b82c75a9', '5b311b9d455f1', 1);

--
-- Индексы сохранённых таблиц
--

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
-- Индексы таблицы `like_answers`
--
ALTER TABLE `like_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_stories` (`id_answers`),
  ADD KEY `id_users` (`id_users`);

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
  ADD KEY `id_payment` (`id_payment`);

--
-- Индексы таблицы `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_orders` (`id_orders`);

--
-- Индексы таблицы `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT для таблицы `filming_ru`
--
ALTER TABLE `filming_ru`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `hotel_en`
--
ALTER TABLE `hotel_en`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `hotel_main`
--
ALTER TABLE `hotel_main`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `hotel_reviews`
--
ALTER TABLE `hotel_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `hotel_ru`
--
ALTER TABLE `hotel_ru`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
-- AUTO_INCREMENT для таблицы `like_answers`
--
ALTER TABLE `like_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `like_comments`
--
ALTER TABLE `like_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `like_stories`
--
ALTER TABLE `like_stories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `messages_admin`
--
ALTER TABLE `messages_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT для таблицы `messages_user`
--
ALTER TABLE `messages_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `payment`
--
ALTER TABLE `payment`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `stories_en`
--
ALTER TABLE `stories_en`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `stories_main`
--
ALTER TABLE `stories_main`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `stories_ru`
--
ALTER TABLE `stories_ru`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
-- Ограничения внешнего ключа таблицы `like_answers`
--
ALTER TABLE `like_answers`
  ADD CONSTRAINT `like_answers_ibfk_1` FOREIGN KEY (`id_answers`) REFERENCES `answers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_answers_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_payment`) REFERENCES `payment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_products_ibfk_1` FOREIGN KEY (`id_orders`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
