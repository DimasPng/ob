-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Сен 23 2023 г., 09:29
-- Версия сервера: 5.5.68-MariaDB
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testpay_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ob_2checkout`
--

CREATE TABLE IF NOT EXISTS `ob_2checkout` (
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_ad`
--

CREATE TABLE IF NOT EXISTS `ob_ad` (
  `id` int(11) NOT NULL,
  `good_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `code` text NOT NULL,
  `adcategory_id` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT '0',
  `showcode` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_ad_category`
--

CREATE TABLE IF NOT EXISTS `ob_ad_category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ob_ad_category`
--

INSERT INTO `ob_ad_category` (`id`, `title`, `description`) VALUES
(1, 'Текстовые объявления', 'Текстовые объявления'),
(2, 'Баннеры', 'Баннеры для рекламы на сайтах');

-- --------------------------------------------------------

--
-- Структура таблицы `ob_affstats`
--

CREATE TABLE IF NOT EXISTS `ob_affstats` (
  `id` int(11) NOT NULL,
  `partner_id` varchar(50) NOT NULL DEFAULT '',
  `komis` float NOT NULL DEFAULT '0',
  `prefid` varchar(50) NOT NULL DEFAULT '',
  `pkomis` float NOT NULL DEFAULT '0',
  `date` int(11) NOT NULL DEFAULT '0',
  `good_id` varchar(50) NOT NULL DEFAULT '',
  `kanal` varchar(255) NOT NULL DEFAULT 'default'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_anew`
--

CREATE TABLE IF NOT EXISTS `ob_anew` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `createTime` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_area`
--

CREATE TABLE IF NOT EXISTS `ob_area` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_area_item`
--

CREATE TABLE IF NOT EXISTS `ob_area_item` (
  `id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `area_section_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(255) NOT NULL,
  `uploadDate` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `size` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_area_paylist`
--

CREATE TABLE IF NOT EXISTS `ob_area_paylist` (
  `id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `srok` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_area_section`
--

CREATE TABLE IF NOT EXISTS `ob_area_section` (
  `id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_area_user`
--

CREATE TABLE IF NOT EXISTS `ob_area_user` (
  `id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lastLogin` int(11) NOT NULL,
  `createDate` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payTill` int(11) NOT NULL,
  `totalDays` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_article`
--

CREATE TABLE IF NOT EXISTS `ob_article` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `position` int(11) NOT NULL,
  `createTime` int(11) NOT NULL,
  `updateTime` int(11) NOT NULL,
  `visible` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_article_category`
--

CREATE TABLE IF NOT EXISTS `ob_article_category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_author`
--

CREATE TABLE IF NOT EXISTS `ob_author` (
  `id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `total` float NOT NULL,
  `paid` float NOT NULL,
  `purse` varchar(255) NOT NULL,
  `kind` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_bill`
--

CREATE TABLE IF NOT EXISTS `ob_bill` (
  `id` bigint(20) NOT NULL,
  `createDate` int(11) NOT NULL,
  `sum` float NOT NULL,
  `valuta` varchar(3) NOT NULL,
  `usdkurs` float NOT NULL,
  `eurkurs` float NOT NULL,
  `uahkurs` float NOT NULL,
  `cupon` varchar(255) NOT NULL,
  `payDate` int(11) NOT NULL,
  `status_id` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `amail` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `otchestvo` varchar(255) NOT NULL,
  `strana` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `gorod` varchar(255) NOT NULL,
  `postindex` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `way` varchar(255) NOT NULL,
  `postNumber` varchar(255) NOT NULL,
  `kind` varchar(255) NOT NULL,
  `orderCount` int(11) NOT NULL,
  `notifySent` int(11) NOT NULL,
  `rur` float NOT NULL,
  `lastDate` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `purse` varchar(255) DEFAULT NULL,
  `affpaid` tinyint(4) DEFAULT '0',
  `curier` tinyint(4) DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=389 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ob_bill`
--

INSERT INTO `ob_bill` (`id`, `createDate`, `sum`, `valuta`, `usdkurs`, `eurkurs`, `uahkurs`, `cupon`, `payDate`, `status_id`, `email`, `amail`, `uname`, `surname`, `otchestvo`, `strana`, `region`, `gorod`, `postindex`, `address`, `phone`, `ip`, `way`, `postNumber`, `kind`, `orderCount`, `notifySent`, `rur`, `lastDate`, `comment`, `purse`, `affpaid`, `curier`) VALUES
(283, 1629910748, 2990, 'rur', 75.96, 89.18, 2.85, '', 0, 'waiting', 'ivan.4200@yandex.ru', 'ivan.4200@yandex.ru', 'Иван', '', '', '', '', '', '', '', 'нет', '90.154.72.73', '', '', 'ebook', 1, 2, 2990, 0, '', NULL, NULL, NULL),
(286, 1631249062, 2990, 'rur', 75.32, 89.06, 2.82, '', 0, 'waiting', 'radafs@mail.ru', '13slesaris@mail.ru', 'Наталья', '', '', '', '', '', '', '', 'нет', '45.140.93.172', 'Enot.io', '', 'ebook', 1, 2, 2990, 1631249080, '', NULL, NULL, NULL),
(281, 1629787167, 999, 'rur', 76.29, 89.39, 2.86, '', 1629967815, 'approved', 'kavaler-gard@mail.ru', 'kavaler-gard@mail.ru', 'Игорь', '', '', '', '', '', '', '', 'нет', '2a00:1fa0:62d:7680:6090:8419:7669:fead', 'Admin', '', 'ebook', 1, 0, 999, 1629967816, '', '', 1, NULL),
(285, 1631248723, 4480, 'rur', 75.32, 89.06, 2.82, '', 0, 'waiting', 'radafs@mail.ru', '13slesaris@mail.ru', 'Наталья', '', '', '', '', '', '', '', 'нет', '45.140.93.172', 'Enot.io', '', 'ebook', 2, 2, 4480, 1631248731, '', NULL, NULL, NULL),
(284, 1631248581, 4480, 'rur', 75.32, 89.06, 2.82, '', 0, 'waiting', 'radafs@mail.ru', 'radafs@mail.ru', 'Наталья', '', '', '', '', '', '', '', 'нет', '45.140.93.172', '', '', 'ebook', 2, 2, 4480, 0, '', NULL, NULL, NULL),
(287, 1631807395, 2990, 'rur', 74.61, 87.92, 2.8, '', 0, 'waiting', 'henoy89285@shensufu.com', 'henoy89285@shensufu.com', 'dd', '', '', '', '', '', '', '', 'нет', '188.170.192.188', '', '', 'ebook', 1, 2, 2990, 0, '', NULL, NULL, NULL),
(288, 1631833823, 2990, 'rur', 74.61, 87.92, 2.8, '', 0, 'waiting', 'das@a.ru', 'das@a.ru', 'das', '', '', '', '', '', '', '', 'нет', '188.170.192.188', 'Enot.io', '', 'ebook', 1, 2, 2990, 1631833837, '', NULL, NULL, NULL),
(289, 1632126634, 999, 'rur', 74.74, 88.03, 2.8, '', 0, 'waiting', 'vasily6666@mail.ru', '', 'Василий', '', '', '', '', '', '', '', 'нет', '90.151.90.188', 'Enot.io', '', 'ebook', 1, 3, 999, 1632388807, '', NULL, NULL, NULL),
(290, 1632713509, 2990, 'rur', 75.2, 88.25, 2.83, '', 0, 'waiting', 'Teshka78@mail.ru', '', 'Роман', '', '', '', '', '', '', '', 'нет', '178.71.135.19', '', '', 'ebook', 1, 2, 2990, 0, '', NULL, NULL, NULL),
(291, 1632713844, 2990, 'rur', 75.2, 88.25, 2.83, '', 1632713994, 'approved', 'Teshka78@mail.ru', '', 'Роман', '', '', '', '', '', '', '', 'нет', '178.71.135.19', 'Enot.io', '', 'ebook', 1, 0, 2990, 1632713995, '', '', 1, NULL),
(292, 1632776647, 2990, 'rur', 74.84, 87.59, 2.81, '', 1632823557, 'approved', 'alexeylapshin1992@mail.ru', 'alexeylapshin1992@mail.ru', 'Александр Лапшин', '', '', '', '', '', '', '', 'нет', '85.249.30.180', 'Admin', '', 'ebook', 1, 0, 2990, 1632823558, '', '', 1, NULL),
(293, 1633740102, 999, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'Ferm33@yandex.ru', '', 'Николай ', '', '', '', '', '', '', '', 'нет', '185.210.143.168', '', '', 'ebook', 1, 2, 999, 0, '', NULL, NULL, NULL),
(294, 1634140159, 2489, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'rogirod@mail.ru', '', 'Игорь', '', '', '', '', '', '', '', 'нет', '95.152.63.98', 'Enot.io', '', 'ebook', 2, 2, 2489, 1634140168, '', NULL, NULL, NULL),
(295, 1634907444, 4480, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'anton0805ss@gmail.com', 'anton0805ss@gmail.com', 'Anton', '', '', '', '', '', '', '', 'нет', '145.249.212.62', 'Enot.io', '', 'ebook', 2, 2, 4480, 1634907452, '', NULL, NULL, NULL),
(296, 1634907931, 4480, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'anton0805ss@gmail.com', 'anton0805ss@gmail.com', 'Anton', '', '', '', '', '', '', '', 'нет', '145.249.212.62', 'Enot.io', '', 'ebook', 2, 2, 4480, 1634907935, '', NULL, NULL, NULL),
(297, 1635341740, 2990, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'qwe@qwe.qwe', '', 'qwe', '', '', '', '', '', '', '', 'нет', '83.69.126.95', 'Enot.io', '', 'ebook', 1, 2, 2990, 1635341771, '', NULL, NULL, NULL),
(298, 1635850908, 2990, 'rur', 74.84, 86.83, 2.81, '', 1635851021, 'approved', 'zerzala@yandex.ru', '', 'Алексей', '', '', '', '', '', '', '', 'нет', '94.140.194.118', 'Enot.io', '', 'ebook', 1, 0, 2990, 1635851021, '', '', 1, NULL),
(299, 1637755594, 999, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'kanatkin@mail.ru', '', 'Вячеслав', '', '', '', '', '', '', '', 'нет', '5.139.132.25', '', '', 'ebook', 1, 2, 999, 0, '', NULL, NULL, NULL),
(300, 1638855107, 999, 'rur', 74.84, 86.83, 2.81, '', 1638855187, 'approved', 'anna.sayfullina.91@mail.ru', '', 'Анна ', '', '', '', '', '', '', '', 'нет', '195.91.233.161', 'Enot.io', '', 'ebook', 1, 0, 999, 1638855187, '', '', 1, NULL),
(301, 1638855620, 999, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'sayfullina.91@mail.ru', '', 'Анна ', '', '', '', '', '', '', '', 'нет', '195.91.233.161', 'Enot.io', '', 'ebook', 1, 2, 999, 1638855623, '', NULL, NULL, NULL),
(302, 1638855851, 2489, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'Anna.sayfullina.91@mail.ru', '', 'Анна ', '', '', '', '', '', '', '', 'нет', '195.91.233.161', 'Enot.io', '', 'ebook', 2, 2, 2489, 1638856199, '', NULL, NULL, NULL),
(303, 1638856501, 2990, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'anna.sayfullina.91@mail.ru', 'anna.sayfullina.91@mail.ru', 'Анна ', '', '', '', '', '', '', '', 'нет', '195.91.233.161', 'Enot.io', '', 'ebook', 1, 2, 2990, 1638856507, '', NULL, NULL, NULL),
(304, 1640290629, 999, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', '10.05.83@mail.ru', '10.05.83@mail.ru', 'Андрей', '', '', '', '', '', '', '', 'нет', '94.181.184.90', 'Enot.io', '', 'ebook', 1, 2, 999, 1640290644, '', NULL, NULL, NULL),
(305, 1640344617, 1000, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', '10.05.83@mail.ru', '10.05.83@mail.ru', 'Андрей', '', '', '', '', '', '', '', 'нет', '94.181.184.90', 'Enot.io', '', 'ebook', 1, 2, 1000, 1640344650, '', NULL, NULL, NULL),
(306, 1640355795, 2990, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'hemros89@mail.ru', 'hemros1@mail.ru', 'Fox', '', '', '', '', '', '', '', 'нет', '109.252.130.48', 'Enot.io', '', 'ebook', 1, 2, 2990, 1640363177, '', NULL, NULL, NULL),
(312, 1640432266, 2990, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'mitya.artemov.99@mail.ru', 'mitya.artemov.99@mail.ru', 'Дмитрий', '', '', '', '', '', '', '', 'нет', '195.88.193.5', 'Enot.io', '', 'ebook', 1, 2, 2990, 1640432271, '', NULL, NULL, NULL),
(313, 1640436137, 2990, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'mitya.artemov.99@mail.ru', 'mitya.artemov.99@mail.ru', 'Дмитрий', '', '', '', '', '', '', '', 'нет', '195.88.193.5', 'Enot.io', '', 'ebook', 1, 2, 2990, 1640436147, '', NULL, NULL, NULL),
(311, 1640373908, 1000, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'super.sasha1607@yandex.ru', 'super.sasha1607@yandex.ru', 'Александр ', '', '', '', '', '', '', '', 'нет', '46.39.56.200', 'Enot.io', '', 'ebook', 1, 2, 1000, 1640373917, '', NULL, NULL, NULL),
(314, 1640511871, 999, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'alexfx314@gmail.com', '', 'Алексе', '', '', '', '', '', '', '', 'нет', '162.247.72.199', '', '', 'ebook', 1, 2, 999, 0, '', NULL, NULL, NULL),
(310, 1640360354, 2990, 'rur', 74.84, 86.83, 2.81, '', 1640363142, 'approved', 'vitalij-zarikeev@yandex.ru', 'vitalij323@me.com', 'Виталий Салимович Зарикеев', '', '', '', '', '', '', '', 'нет', '185.253.102.217', 'Admin', '', 'ebook', 1, 0, 2990, 1640363142, '', '', 1, NULL),
(315, 1640884105, 1000, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'stgeolog@mail.ru', 'stgeolog@mail.ru', 'Антон', '', '', '', '', '', '', '', 'нет', '109.252.115.234', 'Enot.io', '', 'ebook', 1, 2, 1000, 1640884599, '', NULL, NULL, NULL),
(316, 1641095960, 2990, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'v_chudesa@mail.ru', 'v_chudesa@mail.ru', 'Василий', '', '', '', '', '', '', '', 'нет', '109.71.177.72', 'Enot.io', '', 'ebook', 1, 2, 2990, 1641096279, '', NULL, NULL, NULL),
(317, 1641162217, 2990, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'np99@mail.ru', '', 'Илья', '', '', '', '', '', '', '', 'нет', '2.92.199.159', 'Enot.io', '', 'ebook', 1, 2, 2990, 1641162227, '', NULL, NULL, NULL),
(318, 1641588427, 1000, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'letnikov3@yahoo.com', '', 'Юрий', '', '', '', '', '', '', '', 'нет', '95.72.104.61', 'Enot.io', '', 'ebook', 1, 2, 1000, 1641588441, '', NULL, NULL, NULL),
(319, 1641589054, 1000, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'letnikov3@yahoo.com', '', 'Юрий', '', '', '', '', '', '', '', 'нет', '95.72.104.61', 'Enot.io', '', 'ebook', 1, 2, 1000, 1641589065, '', NULL, NULL, NULL),
(320, 1642065095, 2990, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'Test@yandex.ru', '', 'Тест', '', '', '', '', '', '', '', 'нет', '45.159.208.9', 'Free Kassa', '', 'ebook', 1, 2, 2990, 1642065110, '', NULL, NULL, NULL),
(321, 1642596829, 2990, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', '1@1.ru', '', '1', '', '', '', '', '', '', '', 'нет', '5.8.16.235', 'Прямой перевод с карты на карту', '', 'ebook', 1, 2, 2990, 1642677261, '', NULL, NULL, NULL),
(322, 1642762729, 999, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'Kristanna666@gmail.com', '', 'Кристина ', '', '', '', '', '', '', '', 'нет', '46.11.71.25', 'Free Kassa', '', 'ebook', 1, 2, 999, 1642762798, '', NULL, NULL, NULL),
(331, 1644041350, 1000, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'Annekken@mail.ru', 'Annekken@mail.ru', 'Анна', '', '', '', '', '', '', '', 'нет', '176.59.40.6', 'Free Kassa', '', 'ebook', 1, 2, 1000, 1644041364, '', NULL, NULL, NULL),
(329, 1644040903, 1000, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'Annekken@mail.ru', 'Annekken@mail.ru', 'Анна', '', '', '', '', '', '', '', 'нет', '176.59.40.6', 'Free Kassa', '', 'ebook', 1, 2, 1000, 1644041046, '', NULL, NULL, NULL),
(330, 1644041134, 1000, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'Annekken@mail.ru', 'Annekken@mail.ru', 'Анна', '', '', '', '', '', '', '', 'нет', '176.59.40.6', 'Free Kassa', '', 'ebook', 1, 2, 1000, 1644041173, '', NULL, NULL, NULL),
(325, 1643104674, 1000, 'rur', 74.84, 86.83, 2.81, '', 1643104918, 'approved', 'nikolaikrov63@gmail.com', 'abramenkonicolai@yandex.ru', 'Николай', '', '', '', '', '', '', '', 'нет', '128.70.224.210', 'Admin', '', 'ebook', 1, 0, 1000, 1643104919, '', '', 1, NULL),
(326, 1643491761, 2990, 'rur', 74.84, 86.83, 2.81, '', 1643493288, 'approved', '89213074737@mail.ru', 'St004504@spbu.ru', 'Надежда', '', '', '', '', '', '', '', 'нет', '188.170.85.8', 'Admin', '', 'ebook', 1, 0, 2990, 1643493288, '', '', 1, NULL),
(327, 1643556387, 999, 'rur', 74.84, 86.83, 2.81, '', 1643575226, 'approved', 'pnp5@bk.ru', '', 'Павел', '', '', '', '', '', '', '', 'нет', '85.249.23.117', 'Admin', '', 'ebook', 1, 0, 999, 1643575226, '', '', 1, NULL),
(328, 1643576387, 2990, 'rur', 74.84, 86.83, 2.81, '', 1643576427, 'approved', 'pnp5@bk.ru', '', 'Клиент', '', '', '', '', '', '', '', 'нет', '45.91.22.21', 'Admin', '', 'ebook', 1, 0, 2990, 1643576427, '', '', 1, NULL),
(332, 1644041832, 999, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'Annekken@mail.ru', 'Annekken@mail.ru', 'Анна', '', '', '', '', '', '', '', 'нет', '176.59.40.6', 'Прямой перевод с карты на карту', '', 'ebook', 1, 2, 999, 1644041843, '', NULL, NULL, NULL),
(333, 1644685185, 999, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'hudik230897@gmail.com', '', 'Рустам', '', '', '', '', '', '', '', 'нет', '178.140.61.134', 'Free Kassa', '', 'ebook', 1, 2, 999, 1644685197, '', NULL, NULL, NULL),
(334, 1644929058, 1000, 'rur', 74.84, 86.83, 2.81, '', 1644929418, 'approved', 'vova.tarasenko.00@gmail.com', 'vova.tarasenko.00@mail.ru', 'Влпдимир', '', '', '', '', '', '', '', 'нет', '82.162.24.192', 'FreeKassa', '', 'ebook', 1, 0, 1000, 1644929419, '', '10', 1, NULL),
(335, 1647351221, 2990, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'Vage061@yandex.ru', '', 'Vage', '', '', '', '', '', '', '', 'нет', '46.147.123.163', 'Free Kassa', '', 'ebook', 1, 2, 2990, 1647351398, '', NULL, NULL, NULL),
(336, 1647351646, 2990, 'rur', 74.84, 86.83, 2.81, '', 1647375729, 'approved', 'Vage061@yandex.ru', '', 'Vage', '', '', '', '', '', '', '', 'нет', '46.147.123.163', 'Admin', '', 'ebook', 1, 0, 2990, 1647375729, '', '', 1, NULL),
(337, 1647585220, 1000, 'rur', 74.84, 86.83, 2.81, '', 1647587292, 'approved', '1085257@gmail.com', 'Andredo1001@mail.ru', 'Андрей ', '', '', '', '', '', '', '', 'нет', '2a00:1fa3:631:c954:0:50:df08:e201', 'Admin', '', 'ebook', 1, 0, 1000, 1647587292, '', '', 1, NULL),
(339, 1647661473, 1000, 'rur', 74.84, 86.83, 2.81, '', 1647717722, 'approved', '1085257@gmail.com', 'Andredo1001@mail.ru', 'Андрей ', '', '', '', '', '', '', '', 'нет', '87.225.8.124', 'Admin', '', 'ebook', 1, 0, 1000, 1647717723, '', '', 1, NULL),
(338, 1647585277, 1000, 'rur', 74.84, 86.83, 2.81, '', 1647587282, 'approved', '1085257@gmail.com', 'Andredo1001@mail.ru', 'Андрей ', '', '', '', '', '', '', '', 'нет', '2a00:1fa3:631:c954:0:50:df08:e201', 'Admin', '', 'ebook', 1, 0, 1000, 1647587282, '', '', 1, NULL),
(340, 1647661548, 1000, 'rur', 74.84, 86.83, 2.81, '', 1647717714, 'approved', '1085257@gmail.com', 'Andredo1001@mail.ru', 'Андрей', '', '', '', '', '', '', '', 'нет', '87.225.8.124', 'Admin', '', 'ebook', 1, 0, 1000, 1647717714, '', '', 1, NULL),
(341, 1649180746, 999, 'rur', 74.84, 86.83, 2.81, '', 1649180932, 'approved', 'ilia969@mail.ru', '', 'Илья', '', '', '', '', '', '', '', 'нет', '109.252.214.138', 'FreeKassa', '', 'ebook', 1, 0, 999, 1649180933, '', '10', 1, NULL),
(342, 1649185383, 1000, 'rur', 74.84, 86.83, 2.81, '', 1649185746, 'approved', 'ilia969@mail.ru', '', 'Илья', '', '', '', '', '', '', '', 'нет', '109.252.214.138', 'FreeKassa', '', 'ebook', 1, 0, 1000, 1649185746, '', '10', 1, NULL),
(343, 1649682086, 999, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'andrey.derevnin.90@mail.ru', '', 'Андрей', '', '', '', '', '', '', '', 'нет', '188.19.26.41', 'Free Kassa', '', 'ebook', 1, 2, 999, 1649682100, '', NULL, NULL, NULL),
(344, 1649682360, 999, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'andrey.derevnin.90@mail.ru', '', 'Andrei', '', '', '', '', '', '', '', 'нет', '188.19.26.41', 'Free Kassa', '', 'ebook', 1, 2, 999, 1649682481, '', NULL, NULL, NULL),
(345, 1650362204, 999, 'rur', 74.84, 86.83, 2.81, '', 1650362301, 'approved', 'bezborodov.v.s@yandex.ru', 'vas.bezbb@yandex.ru', 'Василий', '', '', '', '', '', '', '', 'нет', '80.64.18.245', 'FreeKassa', '', 'ebook', 1, 0, 999, 1650362302, '', '8', 1, NULL),
(346, 1650362488, 999, 'rur', 74.84, 86.83, 2.81, '', 1650362577, 'approved', 'bezborodov.v.s@yandex.ru', 'vas.bezbb@yandex.ru', 'Василий', '', '', '', '', '', '', '', 'нет', '80.64.18.245', 'FreeKassa', '', 'ebook', 1, 0, 999, 1650362578, '', '8', 1, NULL),
(347, 1650790380, 2990, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'danilmaksimcuk15@gmail.com', 'dimabamberg22@gmail.com', 'Данила', '', '', '', '', '', '', '', 'нет', '2a00:1fa3:8000:43bb:0:48:f95c:1d01', 'Free Kassa', '', 'ebook', 1, 2, 2990, 1650790680, '', NULL, NULL, NULL),
(348, 1650790865, 2990, 'rur', 74.84, 86.83, 2.81, '', 1650791582, 'approved', 'dimabamberg22@gmail.com', 'dimabamberg22@gmail.com', 'Данила', '', '', '', '', '', '', '', 'нет', '2a00:1fa3:8000:43bb:0:48:f95c:1d01', 'Admin', '', 'ebook', 1, 0, 2990, 1650791583, '', '', 1, NULL),
(349, 1651173468, 999, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'salekhard96@yandex.ru', 'salekhard96@yandex.ru', 'Андрей', '', '', '', '', '', '', '', 'нет', '88.205.231.2', 'Free Kassa', '', 'ebook', 1, 2, 999, 1651173472, '', NULL, NULL, NULL),
(350, 1651586156, 999, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'zayatshome@yandex.ru', 'zayatshome@yandex.ru', 'Валерия', '', '', '', '', '', '', '', 'нет', '188.162.65.56', 'Free Kassa', '', 'ebook', 1, 2, 999, 1651586427, '', NULL, NULL, NULL),
(351, 1651670945, 2990, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'market38rus@yandex.ru', 'market38rus@yandex.ru', 'Александр', '', '', '', '', '', '', '', 'нет', '80.83.235.119', 'Прямой перевод с карты на карту', '', 'ebook', 1, 2, 2990, 1651671263, '', NULL, NULL, NULL),
(352, 1652303065, 999, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'Pozdnyakoff.ev@yandex.ru', 'Pozdnyakoff.ev@yandex.ru', 'Евгений Поздняков', '', '', '', '', '', '', '', 'нет', '83.149.21.28', 'Free Kassa', '', 'ebook', 1, 3, 999, 1675468651, '', NULL, NULL, NULL),
(353, 1652305343, 999, 'rur', 74.84, 86.83, 2.81, '', 1652305543, 'approved', 'Pozdnyakoff.ev@yandex.ru', 'Pozdnyakoff.ev@yandex.ru', 'Евгений Поздняков', '', '', '', '', '', '', '', 'нет', '83.149.21.28', 'FreeKassa', '', 'ebook', 1, 0, 999, 1652305543, '', '8', 1, NULL),
(354, 1652536077, 999, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'stroukovalexei@googlemail.com', 'stroukovalexei@googlemail.com', 'Stroukov', '', '', '', '', '', '', '', 'нет', '2001:9e8:2ed:6f00:50f5:ca28:16e2:a04', 'Free Kassa', '', 'ebook', 1, 2, 999, 1652536095, '', NULL, NULL, NULL),
(355, 1653905432, 2990, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'tyjn123@mail.ru', 'dimitrikondrin@gmail.com', 'Дмитрий ', '', '', '', '', '', '', '', 'нет', '2.92.173.223', '', '', 'ebook', 1, 2, 2990, 0, '', NULL, NULL, NULL),
(356, 1654447729, 1000, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'asd-qw-zx@mail.ru', '', 'владимир', '', '', '', '', '', '', '', 'нет', '176.215.136.127', 'Прямой перевод с карты на карту', '', 'ebook', 1, 2, 1000, 1654447924, '', NULL, NULL, NULL),
(357, 1654453636, 1000, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'Vbgghgyghh@mail.ru', 'Gbgbhbbhh@mail.ru', 'Владимир', '', '', '', '', '', '', '', 'нет', '2a01:540:5c3:3f00:2d60:a070:58e1:3f30', 'Free Kassa', '', 'ebook', 1, 2, 1000, 1654453643, '', NULL, NULL, NULL),
(358, 1654542125, 1000, 'rur', 74.84, 86.83, 2.81, '', 1654542471, 'approved', 'asd-qw-zx@mail.ru', '', 'владимир', '', '', '', '', '', '', '', 'нет', '176.215.136.127', 'FreeKassa', '', 'ebook', 1, 0, 1000, 1654542471, '', '4', 1, NULL),
(359, 1654709306, 4480, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'd_khomlov@mail.ru', 'd_khomlov@mail.ru', 'Дмитрий', '', '', '', '', '', '', '', 'нет', '176.77.30.224', 'Free Kassa', '', 'ebook', 2, 2, 4480, 1654709317, '', NULL, NULL, NULL),
(360, 1654710846, 4480, 'rur', 74.84, 86.83, 2.81, '', 1654711347, 'approved', 'd_khomlov@mail.ru', 'd_khomlov@mail.ru', 'Дмитрий', '', '', '', '', '', '', '', 'нет', '176.77.30.224', 'FreeKassa', '', 'ebook', 2, 0, 4480, 1654711348, '', '12', 1, NULL),
(361, 1657182931, 999, 'rur', 74.84, 86.83, 2.81, '', 1657183062, 'approved', 'uk.management2017@gmail.com', 'uk.management2017@gmail.com', 'Евгений', '', '', '', '', '', '', '', 'нет', '89.17.51.2', 'FreeKassa', '', 'ebook', 1, 0, 999, 1657183063, '', '4', 1, NULL),
(362, 1657778078, 999, 'rur', 74.84, 86.83, 2.81, '', 1657778499, 'approved', '1280708@mail.ru', '', 'Вячеслав', '', '', '', '', '', '', '', 'нет', '5.128.247.228', 'FreeKassa', '', 'ebook', 1, 0, 999, 1657778500, '', '4', 1, NULL),
(363, 1657778309, 2990, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', '1280708@mail.ru', '', 'Вячеслав', '', '', '', '', '', '', '', 'нет', '5.128.247.228', 'Free Kassa', '', 'ebook', 1, 2, 2990, 1657778328, '', NULL, NULL, NULL),
(364, 1658133709, 1000, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'olga7771305@yandex.ru', 'olga7771305@gmail.com', 'Ольга ', '', '', '', '', '', '', '', 'нет', '83.220.237.9', 'Прямой перевод с карты на карту', '', 'ebook', 1, 2, 1000, 1658133930, '', NULL, NULL, NULL),
(365, 1658133990, 1000, 'rur', 74.84, 86.83, 2.81, '', 1658134188, 'approved', 'olga7771305@yandex.ru', 'olga7771305@gmail.com', 'Ольга ', '', '', '', '', '', '', '', 'нет', '83.220.237.9', 'FreeKassa', '', 'ebook', 1, 0, 1000, 1658134188, '', '12', 1, NULL),
(366, 1658138998, 1000, 'rur', 74.84, 86.83, 2.81, '', 1658139239, 'approved', 'lena0123456789@mail.ru', 'lena0123456789@mail.ru', 'Елена', '', '', '', '', '', '', '', 'нет', '2a00:1fa0:661:fa0d:b73e:c209:cac1:bdff', 'FreeKassa', '', 'ebook', 1, 0, 1000, 1658139239, '', '4', 1, NULL),
(367, 1658396808, 2990, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', '9280365@mail.ru', '9280365@mail.ru', 'Андрей Борисович Черепита', '', '', '', '', '', '', '', 'нет', '79.139.179.63', 'Free Kassa', '', 'ebook', 1, 2, 2990, 1658396830, '', NULL, NULL, NULL),
(368, 1659211751, 2990, 'rur', 74.84, 86.83, 2.81, '', 1659212578, 'approved', 'Karakymba23@gmail.com', '', 'Евгений', '', '', '', '', '', '', '', 'нет', '88.135.80.3', 'FreeKassa', '', 'ebook', 1, 0, 2990, 1659212578, '', '10', 1, NULL),
(369, 1660485977, 1000, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'antipovv693@gmail.com', '', 'Валентин', '', '', '', '', '', '', '', 'нет', '178.67.199.59', 'Free Kassa', '', 'ebook', 1, 2, 1000, 1660486006, '', NULL, NULL, NULL),
(370, 1661218839, 1000, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'roudenko123@rambler.ru', 'iv5757@gmail.com', 'Игорь', '', '', '', '', '', '', '', 'нет', '93.125.107.16', 'Free Kassa', '', 'ebook', 1, 2, 1000, 1661219142, '', NULL, NULL, NULL),
(371, 1661373906, 999, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'rostikkasimov85@gmail.com', 'rostikkasimov85@gmail.com', 'Rostyslav Kasymov', '', '', '', '', '', '', '', 'нет', '84.234.5.125', '', '', 'ebook', 1, 2, 999, 0, '', NULL, NULL, NULL),
(372, 1661373941, 999, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'rostikkasimov85@gmail.com', 'rostikkasimov85@gmail.com', 'Rostyslav Kasymov', '', '', '', '', '', '', '', 'нет', '84.234.5.125', 'Free Kassa', '', 'ebook', 1, 2, 999, 1661373959, '', NULL, NULL, NULL),
(373, 1661375097, 999, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'rostikkasimov85@gmail.com', 'rostikkasimov85@gmail.com', 'Rostyslav kasymov', '', '', '', '', '', '', '', 'нет', '84.234.5.125', 'Free Kassa', '', 'ebook', 1, 2, 999, 1661375105, '', NULL, NULL, NULL),
(374, 1661426597, 999, 'rur', 74.84, 86.83, 2.81, '', 1661430144, 'approved', 'saragro2015@mail.ru', '', 'М', '', '', '', '', '', '', '', 'нет', '85.26.233.113', 'FreeKassa', '', 'ebook', 1, 0, 999, 1661430144, '', '42', 1, NULL),
(375, 1662900808, 2990, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'Rasl_doce@mail.ru', '', 'Руслан ', '', '', '', '', '', '', '', 'нет', '94.25.233.26', 'Прямой перевод с карты на карту', '', 'ebook', 1, 2, 2990, 1662901822, '', NULL, NULL, NULL),
(376, 1662913539, 2990, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'Kosyak@mail.ru', '', 'Russell', '', '', '', '', '', '', '', 'нет', '94.25.233.26', 'Прямой перевод с карты на карту', '', 'ebook', 1, 2, 2990, 1662913553, '', NULL, NULL, NULL),
(377, 1670465494, 2990, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'asdfasd@a.ru', '', 'aaeaa', '', '', '', '', '', '', '', 'нет', '80.72.24.105', '', '', 'ebook', 1, 2, 2990, 0, '', NULL, NULL, NULL),
(378, 1671918253, 999, 'rur', 74.84, 86.83, 2.81, '', 0, 'waiting', 'tpk1910@mail.ru', 'tpk1910@mail.ru', 'Татьяна ', '', '', '', '', '', '', '', 'нет', '165.227.228.174', 'Free Kassa', '', 'ebook', 1, 2, 999, 1671918306, '', NULL, NULL, NULL),
(379, 1679350992, 999, 'rur', 79.56, 84.84, 2.15, '', 0, 'waiting', 'Isidav05@yandex.ru', '', 'Ted', '', '', '', '', '', '', '', 'нет', '85.249.22.21', 'Free Kassa', '', 'ebook', 1, 2, 999, 1679351013, '', NULL, NULL, NULL),
(380, 1679464998, 2990, 'rur', 79.14, 85.02, 2.14, '', 0, 'waiting', 'Privatnick17@yandex.ru', 'cardinall85@yandex.ru', 'Николай', '', '', '', '', '', '', '', 'нет', '88.80.60.40', '', '', 'ebook', 1, 2, 2990, 0, '', NULL, NULL, NULL),
(381, 1680850777, 2990, 'rur', 83.09, 90.77, 2.25, '', 0, 'waiting', 'kamenskiyterapy@gmail.com', '', 'Павел', '', '', '', '', '', '', '', 'нет', '85.249.171.72', 'Прямой перевод с карты на карту', '', 'ebook', 1, 2, 2990, 1680850801, '', NULL, NULL, NULL),
(382, 1680850866, 2990, 'rur', 83.09, 90.77, 2.25, '', 0, 'waiting', 'kamenskiyterapy@gmail.com', '', 'Павел', '', '', '', '', '', '', '', 'нет', '85.249.171.72', 'Free Kassa', '', 'ebook', 1, 2, 2990, 1680850976, '', NULL, NULL, NULL),
(383, 1681033992, 2990, 'rur', 84.87, 93, 2.31, '', 0, 'waiting', 'Irmantas3004@icloud.com', 'Irmantas3004@icloud.com', 'Ирмантас', '', '', '', '', '', '', '', 'нет', '80.233.47.28', 'Free Kassa', '', 'ebook', 1, 2, 2990, 1681033999, '', NULL, NULL, NULL),
(384, 1681034241, 2990, 'rur', 84.87, 93, 2.31, '', 0, 'waiting', 'Irmantas3004@icloud.com', 'Irmantas3004@icloud.com', 'Ирмантас', '', '', '', '', '', '', '', 'нет', '80.233.47.28', 'Free Kassa', '', 'ebook', 1, 2, 2990, 1681034263, '', NULL, NULL, NULL),
(385, 1681366874, 1000, 'rur', 84.56, 92.45, 2.29, '', 0, 'waiting', 'lubkin@bk.ru', 'nlyubkin@gmail.com', 'Николай ', '', '', '', '', '', '', '', 'нет', '91.231.233.182', 'Free Kassa', '', 'ebook', 1, 2, 1000, 1681366908, '', NULL, NULL, NULL),
(386, 1685433410, 999, 'rur', 82.46, 88.48, 2.23, '', 0, 'waiting', '1111@bk.ru', '', 'пывоалы', '', '', '', '', '', '', '', 'нет', '91.200.146.166', 'Free Kassa', '', 'ebook', 1, 2, 999, 1685433414, '', NULL, NULL, NULL),
(387, 1686431231, 999, 'rur', 85.12, 91.68, 2.3, '', 0, 'waiting', 'Irmantas3004@icloud.com', 'Irmantas3004@icloud.com', 'Irmantas Limsa', '', '', '', '', '', '', '', 'нет', '80.233.56.166', 'Free Kassa', '', 'ebook', 1, 2, 999, 1687265383, '', NULL, NULL, NULL),
(388, 1691990125, 2990, 'rur', 101.15, 111.21, 2.74, '', 1691990429, 'approved', 'I.O.Shmelev@yandex.ru', '', 'Игорь ', '', '', '', '', '', '', '', 'нет', '185.211.158.200', 'FreeKassa', '', 'ebook', 1, 0, 2990, 1691990429, '', '12', 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `ob_black`
--

CREATE TABLE IF NOT EXISTS `ob_black` (
  `id` int(11) NOT NULL,
  `createDate` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_category`
--

CREATE TABLE IF NOT EXISTS `ob_category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `visible` tinyint(4) NOT NULL DEFAULT '1',
  `position` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ob_category`
--

INSERT INTO `ob_category` (`id`, `title`, `description`, `visible`, `position`) VALUES
(1, 'Основная категория', '', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `ob_client`
--

CREATE TABLE IF NOT EXISTS `ob_client` (
  `id` int(11) NOT NULL,
  `good_id` varchar(50) NOT NULL DEFAULT '',
  `uname` varchar(250) NOT NULL DEFAULT '',
  `email` varchar(250) NOT NULL DEFAULT '',
  `amail` varchar(250) NOT NULL DEFAULT '',
  `date` int(11) NOT NULL DEFAULT '0',
  `subscribe` tinyint(4) NOT NULL DEFAULT '1',
  `bill_id` bigint(20) NOT NULL,
  `partner_id` varchar(255) NOT NULL,
  `relation_partner` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ob_client`
--

INSERT INTO `ob_client` (`id`, `good_id`, `uname`, `email`, `amail`, `date`, `subscribe`, `bill_id`, `partner_id`, `relation_partner`) VALUES
(116, 'telesniy', 'Игорь', 'kavaler-gard@mail.ru', '', 1629787255, 1, 0, '', 0),
(117, 'alesly', 'Роман', 'teshka78@mail.ru', '', 1632713994, 1, 0, '', 0),
(118, 'alesly', 'Александр Лапшин', 'alexeylapshin1992@mail.ru', '', 1632776874, 1, 0, '', 0),
(119, 'alesly', 'Алексей', 'zerzala@yandex.ru', '', 1635851021, 1, 0, '', 0),
(120, 'masterskiy', 'Анна ', 'anna.sayfullina.91@mail.ru', '', 1638855187, 1, 0, '', 0),
(121, 'alesly', 'Виталий Салимович Зарикеев', 'vitalij-zarikeev@yandex.ru', '', 1640363142, 1, 0, '', 0),
(122, 'books', 'Николай', 'nikolaikrov63@gmail.com', '', 1643104918, 1, 0, '', 0),
(123, 'alesly', 'Надежда', '89213074737@mail.ru', '', 1643493288, 1, 0, '', 0),
(124, 'masterskiy', 'Павел', 'pnp5@bk.ru', '', 1643575226, 1, 0, '', 0),
(125, 'alesly', 'Клиент', 'pnp5@bk.ru', '', 1643576427, 1, 0, '', 0),
(126, 'books', 'Влпдимир', 'vova.tarasenko.00@gmail.com', '', 1644929418, 1, 0, '', 0),
(127, 'alesly', 'Vage', 'vage061@yandex.ru', '', 1647375729, 1, 0, '', 0),
(128, 'books', 'Андрей ', '1085257@gmail.com', '', 1647587282, 1, 0, '', 0),
(129, 'leslyskidka', 'Андрей', '1085257@gmail.com', '', 1647717714, 1, 0, '', 0),
(130, 'masterskiy', 'Илья', 'ilia969@mail.ru', '', 1649180932, 1, 0, '', 0),
(131, 'leslyskidka', 'Илья', 'ilia969@mail.ru', '', 1649185746, 1, 0, '', 0),
(132, 'telesniy', 'Василий', 'bezborodov.v.s@yandex.ru', '', 1650362302, 1, 0, '', 0),
(133, 'masterskiy', 'Василий', 'bezborodov.v.s@yandex.ru', '', 1650362578, 1, 0, '', 0),
(134, 'alesly', 'Данила', 'dimabamberg22@gmail.com', '', 1650791558, 1, 0, '', 0),
(135, 'telesniy', 'Евгений Поздняков', 'pozdnyakoff.ev@yandex.ru', '', 1652305543, 1, 0, '', 0),
(136, 'books', 'владимир', 'asd-qw-zx@mail.ru', '', 1654542471, 1, 0, '', 0),
(137, 'alesly', 'Дмитрий', 'd_khomlov@mail.ru', '', 1654711347, 1, 0, '', 0),
(138, 'update', 'Дмитрий', 'd_khomlov@mail.ru', '', 1654711347, 1, 0, '', 0),
(139, 'telesniy', 'Евгений', 'uk.management2017@gmail.com', '', 1657183062, 1, 0, '', 0),
(140, 'telesniy', 'Вячеслав', '1280708@mail.ru', '', 1657778499, 1, 0, '', 0),
(141, 'books', 'Ольга ', 'olga7771305@yandex.ru', '', 1658134188, 1, 0, '', 0),
(142, 'books', 'Елена', 'lena0123456789@mail.ru', '', 1658139239, 1, 0, '', 0),
(143, 'alesly', 'Евгений', 'karakymba23@gmail.com', '', 1659212578, 1, 0, '', 0),
(144, 'telesniy', 'М', 'saragro2015@mail.ru', '', 1661430144, 1, 0, '', 0),
(145, 'alesly', 'Игорь ', 'i.o.shmelev@yandex.ru', '', 1691990429, 1, 0, '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `ob_cupon`
--

CREATE TABLE IF NOT EXISTS `ob_cupon` (
  `id` bigint(20) NOT NULL,
  `code` varchar(255) NOT NULL,
  `sum` float NOT NULL,
  `kind_id` varchar(5) NOT NULL,
  `startDate` int(11) NOT NULL,
  `stopDate` int(11) NOT NULL,
  `komis` tinyint(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `good_id` text NOT NULL,
  `selfDelete` tinyint(4) NOT NULL,
  `category_id` int(11) NOT NULL,
  `client_good_id` text,
  `partner_id` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_cupon_category`
--

CREATE TABLE IF NOT EXISTS `ob_cupon_category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `createDate` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ob_cupon_category`
--

INSERT INTO `ob_cupon_category` (`id`, `title`, `createDate`) VALUES
(1, 'Скидки', 1299171295);

-- --------------------------------------------------------

--
-- Структура таблицы `ob_good`
--

CREATE TABLE IF NOT EXISTS `ob_good` (
  `id` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `catalog_on` tinyint(4) NOT NULL,
  `position` int(11) DEFAULT NULL,
  `price` float NOT NULL,
  `currency` varchar(3) NOT NULL,
  `kind` varchar(5) NOT NULL,
  `affOn` tinyint(4) NOT NULL,
  `affLink` varchar(255) NOT NULL,
  `affKomis` float DEFAULT NULL,
  `affKomisType` varchar(5) NOT NULL,
  `affPkomis` float DEFAULT NULL,
  `affPkomisType` varchar(5) NOT NULL,
  `affShow` tinyint(4) NOT NULL,
  `used` tinyint(4) NOT NULL,
  `disabledWays` text NOT NULL,
  `securebook` tinyint(4) NOT NULL,
  `getUrl` varchar(255) NOT NULL,
  `dlink` varchar(255) NOT NULL,
  `author_id` varchar(255) NOT NULL,
  `cartOn` tinyint(4) NOT NULL,
  `cartGoods` varchar(255) NOT NULL,
  `cartMinus` float DEFAULT NULL,
  `upsellOn` tinyint(4) NOT NULL,
  `upsellGood` varchar(255) NOT NULL,
  `upsellText` text NOT NULL,
  `tupsellOn` tinyint(4) NOT NULL,
  `tupsellGood` varchar(255) NOT NULL,
  `tupsellText` text NOT NULL,
  `csellOn` tinyint(4) NOT NULL,
  `csellGood` varchar(255) NOT NULL,
  `csellText` text NOT NULL,
  `cartText` text NOT NULL,
  `ads` text NOT NULL,
  `nalozhOn` tinyint(4) NOT NULL DEFAULT '0',
  `authorKomis` float NOT NULL DEFAULT '0',
  `letterSubject` varchar(255) NOT NULL,
  `letterText` text NOT NULL,
  `letterType` varchar(10) NOT NULL,
  `affOrder` tinyint(4) NOT NULL DEFAULT '0',
  `aukind` varchar(10) DEFAULT NULL,
  `kurier` varchar(10) DEFAULT NULL,
  `kurstrany` varchar(255) DEFAULT NULL,
  `kurgorod` varchar(255) DEFAULT NULL,
  `needid` varchar(100) DEFAULT NULL,
  `sendid` varchar(100) DEFAULT NULL,
  `comtitle` varchar(100) DEFAULT NULL,
  `comvalues` varchar(100) DEFAULT NULL,
  `csell2g` varchar(100) DEFAULT NULL,
  `csell3g` varchar(100) DEFAULT NULL,
  `csell2` varchar(255) DEFAULT NULL,
  `csell3` varchar(255) DEFAULT NULL,
  `csellOk` varchar(255) DEFAULT NULL,
  `mli` int(11) NOT NULL,
  `mlgroup` int(11) NOT NULL,
  `sendpulseGroup` int(11) NOT NULL,
  `author_id2` varchar(255) NOT NULL,
  `author_id3` varchar(255) NOT NULL,
  `authorKomis2` float NOT NULL,
  `authorKomis3` float NOT NULL,
  `aukind2` varchar(10) NOT NULL,
  `aukind3` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ob_good`
--

INSERT INTO `ob_good` (`id`, `category_id`, `title`, `description`, `image`, `catalog_on`, `position`, `price`, `currency`, `kind`, `affOn`, `affLink`, `affKomis`, `affKomisType`, `affPkomis`, `affPkomisType`, `affShow`, `used`, `disabledWays`, `securebook`, `getUrl`, `dlink`, `author_id`, `cartOn`, `cartGoods`, `cartMinus`, `upsellOn`, `upsellGood`, `upsellText`, `tupsellOn`, `tupsellGood`, `tupsellText`, `csellOn`, `csellGood`, `csellText`, `cartText`, `ads`, `nalozhOn`, `authorKomis`, `letterSubject`, `letterText`, `letterType`, `affOrder`, `aukind`, `kurier`, `kurstrany`, `kurgorod`, `needid`, `sendid`, `comtitle`, `comvalues`, `csell2g`, `csell3g`, `csell2`, `csell3`, `csellOk`, `mli`, `mlgroup`, `sendpulseGroup`, `author_id2`, `author_id3`, `authorKomis2`, `authorKomis3`, `aukind2`, `aukind3`) VALUES
('leslyskidka', 1, 'Все курсы и книги Алекса Лесли, за 1000 руб!', 'Акционное предложение. Все курсы и книги Алекса Лесли, за 1000 руб!', '', 0, 3, 1000, 'rur', 'ebook', 0, '', NULL, 'fixed', NULL, 'fixed', 0, 1, '', 0, '', 'https://cloud.mail.ru/public/5fVo/y2vyBAyLy', '', 0, '', NULL, 0, '', '', 0, '', '', 0, '', '', '', '', 0, 0, 'Алекс Лесли, доступ ко всем курсам и книгам', 'Здравствуйте.\r\n \r\nСпасибо за оплату распродажи Алекса Лесли!\r\n \r\nВаш доступ к распродаже: %dlink%\r\n \r\nПо этой ссылке будут добавляться новые материалы,\r\nпоэтому, время от времени, заходите, проверяйте.\r\n \r\nВы можете как скачать тренинги, так и смотреть онлайн.\r\nВсе курсы будут доступны бессрочно.\r\n \r\nПо любым вопросам - обращайтесь. Буду рад помочь!\r\n \r\np.s. Мои курсы, идеально дополняет, мой коллега Алекс Мэй.\r\nСпециалист высочайшего класса!\r\n \r\nРебята, специально для вас!, я договорился о 95% скидке на время\r\nмоей распродажи, на полностью ВСЕ тренинги Алекса Мэя.\r\nОчень рекомендую к изучению! Это все платные курсы Алекса,\r\nв которых, вы точно не найдете "воды". Проверил лично и не один раз! :-)\r\n \r\nСмотрите подробности по ссылке: https://aleks-mey.ru/\r\n \r\nС уважением, Алекс Лесли.', 'plain', 0, 'price', '0', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '', '', 0, 0, 'price', 'price'),
('masterskiy', 1, 'Мастерский тренинг, Алекса Лесли', 'Полный доступ к Мастеркский тренинг, Алекса Лесли, в видео формате.', '', 0, 2, 999, 'rur', 'ebook', 0, '', NULL, 'fixed', NULL, 'fixed', 0, 1, '', 0, '', 'https://cloud.mail.ru/public/8u36/F8BBQ1YNq', '', 1, 'update', 90, 0, '', '', 0, '', '', 0, '', '', '', '', 0, 0, 'Ваш доступ к оплаченному курсу, Алекса Лесли', 'Здравствуйте.\r\n\r\nСпасибо за оплату!\r\n\r\nВаш доступ к курсу: %dlink%\r\n\r\nВы можете как смотреть курс онлайн, так и скачать к себе\r\nна компьютер. Доступ к курсу, не ограничен по времени.\r\n\r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dearclient.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n\r\np.s. Специальное предложение для новых клиентов!\r\nВы можете получить доступ ко ВСЕМ курсам и книгам\r\nАлекса Лесли, всего за 1 000 руб. по акционной цене!\r\n\r\nКак и любое хорошее предложение, наше также имеет\r\nсвой срок, 24 часа с момент получения данного письма.\r\n\r\nОплатить и получить доступ, по спец. предложению, Вы\r\nможете по ссылке: http://aleks-lesly.ru/ob/ord/leslyskidka', 'plain', 0, 'price', '0', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '', '', 0, 0, 'price', 'price'),
('alesly', 1, 'Все курсы Алекса Лесли', 'Все курсы Алекса Лесли со скидкой 95%.', '', 0, 1, 2990, 'rur', 'ebook', 0, '', NULL, 'fixed', NULL, 'fixed', 0, 1, '', 0, '', 'https://cloud.mail.ru/public/5fVo/y2vyBAyLy', '', 1, 'update', 90, 0, '', '', 0, '', '', 0, '', '', '', '', 0, 0, 'Распродажа Алекса Лесли, доступ', 'Здравствуйте.\r\n \r\nСпасибо за оплату распродажи Алекса Лесли!\r\n \r\nВаш доступ к распродаже: %dlink%\r\n \r\nПо этой ссылке будут добавляться новые материалы,\r\nпоэтому, время от времени, заходите, проверяйте.\r\n \r\nВы можете как скачать тренинги, так и смотреть онлайн.\r\nВсе курсы будут доступны бессрочно.\r\n \r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dearclient.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n \r\np.s. Мои курсы, идеально дополняет, мой коллега Алекс Мэй.\r\nСпециалист высочайшего класса!\r\n \r\nРебята, специально для вас!, я договорился о 95% скидке на время\r\nмоей распродажи, на полностью ВСЕ тренинги Алекса Мэя.\r\nОчень рекомендую к изучению! Это все платные курсы Алекса,\r\nв которых, вы точно не найдете "воды". Проверил лично и не один раз! :-)\r\n \r\nСмотрите подробности по ссылке: https://aleks-mey.ru\r\n \r\nС уважением, Алекс Лесли.', 'plain', 0, 'price', '0', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '', '', 0, 0, 'price', 'price'),
('telesniy', 1, 'Телесный тренинг, Алекса Лесли', 'Доступ к Телесному тренингу Алекса Лесли, со скидкой 95%.', '', 0, 3, 999, 'rur', 'ebook', 0, '', NULL, 'fixed', NULL, 'fixed', 0, 1, '', 0, '', 'https://disk.yandex.ru/d/zPIa3PvQ2t6-aw', '', 0, 'update', 90, 0, '', '', 0, '', '', 0, '', '', '', '', 0, 0, 'Ваш доступ к оплаченному курсу, Алекса Лесли', 'Здравствуйте.\r\n\r\nСпасибо за оплату!\r\n\r\nВаш доступ к курсу: %dlink%\r\nПлюс Телесный тренинг: https://disk.yandex.ru/d/zPIa3PvQ2t6-aw\r\n\r\nЧтобы начать изучение курса, скачайте архив и\r\nразархивируйте в нужную вам папку.\r\n\r\nЕсли необходимо, инструкция, как разархивировать файл:\r\nhttps://www.youtube.com/watch?v=4_jpDmmc-bY\r\n\r\n Доступ к курсу, не ограничен по времени.\r\n\r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dearclient.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n\r\np.s. Специальное предложение для новых клиентов!\r\nВы можете получить доступ ко ВСЕМ курсам и книгам\r\nАлекса Лесли, всего за 1 000 руб. по акционной цене!\r\n\r\nКак и любое хорошее предложение, наше также имеет\r\nсвой срок, 24 часа с момент получения данного письма.\r\n\r\nОплатить и получить доступ, по спец. предложению, Вы\r\nможете по ссылке: http://aleks-lesly.ru/ob/ord/leslyskidka', 'plain', 0, 'price', '0', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '', '', 0, 0, 'price', 'price'),
('leslykipr', 1, 'Отпуск Алекса Лесли на Кипре', 'Полный доступ к курсу в виде формате.', '', 0, 6, 999, 'rur', 'ebook', 0, '', NULL, 'fixed', NULL, 'fixed', 0, 1, '', 0, '', 'https://cloud.mail.ru/public/9gvB/pX6YDHPqi', '', 0, 'update', 90, 0, '', '', 0, '', '', 0, '', '', '', '', 0, 0, 'Ваш доступ к оплаченному курсу, Алекса Лесли', 'Здравствуйте.\r\n\r\nСпасибо за оплату!\r\n\r\nВаш доступ к курсу: %dlink%\r\n\r\nЧтобы начать изучение курса, скачайте архив и\r\nразархивируйте в нужную вам папку.\r\n\r\nЕсли необходимо, инструкция, как разархивировать файл:\r\nhttps://www.youtube.com/watch?v=4_jpDmmc-bY\r\n\r\n Доступ к курсу, не ограничен по времени.\r\n\r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dearclient.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n\r\np.s. Специальное предложение для новых клиентов!\r\nВы можете получить доступ ко ВСЕМ курсам и книгам\r\nАлекса Лесли, всего за 1 000 руб. по акционной цене!\r\n\r\nКак и любое хорошее предложение, наше также имеет\r\nсвой срок, 24 часа с момент получения данного письма.\r\n\r\nОплатить и получить доступ, по спец. предложению, Вы\r\nможете по ссылке: http://aleks-lesly.ru/ob/ord/leslyskidka', 'plain', 0, 'price', '0', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '', '', 0, 0, 'price', 'price'),
('laslytayland', 1, 'Тренинг Алекса Лесли в Тайланде', 'Полный доступ к тренингу Алекса Лесли в Тайланде.', '', 0, NULL, 999, 'rur', 'ebook', 0, '', NULL, 'fixed', NULL, 'fixed', 0, 1, '', 0, '', 'https://cloud.mail.ru/public/L4zN/BaJfqEjPo', '', 1, 'update', 90, 0, '', '', 0, '', '', 0, '', '', '', '', 0, 0, 'Ваш доступ к оплаченному курсу, Алекса Лесли', 'Здравствуйте.\r\n\r\nСпасибо за оплату!\r\n\r\nВаш доступ к курсу: %dlink%\r\n\r\nВы можете как смотреть курс онлайн, так и скачать к себе\r\nна компьютер. Доступ к курсу, не ограничен по времени.\r\n\r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dearclient.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n\r\np.s. Специальное предложение для новых клиентов!\r\nВы можете получить доступ ко ВСЕМ курсам и книгам\r\nАлекса Лесли, всего за 1 000 руб. по акционной цене!\r\n\r\nКак и любое хорошее предложение, наше также имеет\r\nсвой срок, 24 часа с момент получения данного письма.\r\n\r\nОплатить и получить доступ, по спец. предложению, Вы\r\nможете по ссылке: http://aleks-lesly.ru/ob/ord/leslyskidka', 'plain', 0, 'price', '0', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '', '', 0, 0, 'price', 'price'),
('update', 1, 'Расширенный доступ ко всем обновлениям и новым курсам в течении 2х лет!', '', 'https://aleks-lesly.ru/ob/userfiles/update.png', 0, NULL, 14900, 'rur', 'ebook', 0, '', NULL, 'fixed', NULL, 'fixed', 0, 1, '', 0, '', '', '', 0, '', 90, 0, '', '', 0, '', '', 0, '', '', 'У вас есть возможность, дополнительно заказать обновления и доступ ко всем новым курсам и книгам Алекса Лесли, которые будут выходить в течении следующих 2х лет.\r\n\r\nПри покупке распродажи, вы получаете скидку на данный продукт 90%!', '', 0, 0, '', '', 'plain', 0, 'price', '0', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '', '', 0, 0, 'price', 'price'),
('books', 1, 'Пакет всех книг Алекса Лесли', 'Получите доступ сразу ко всем книгам Алекса Лесли.', '', 0, 7, 1000, 'rur', 'ebook', 0, '', NULL, 'fixed', NULL, 'fixed', 0, 1, '', 0, '', 'https://cloud.mail.ru/public/BiGf/mjDk96UeW', '', 1, 'update', 90, 0, '', '', 0, '', '', 0, '', '', '', '', 0, 0, 'Ваша ссылка для скачивания книг', 'Здравствуйте.\r\n\r\nСпасибо за оплату!\r\n\r\nВаш доступ к книгам: %dlink%\r\n\r\nДоступ бессрочный.\r\n\r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dear-client.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n\r\np.s. Специальное предложение для новых клиентов!\r\nВы можете получить доступ ко ВСЕМ курсам\r\nАлекса Лесли, всего за 1 000 руб. по акционной цене!\r\n\r\nКак и любое хорошее предложение, наше также имеет\r\nсвой срок, 24 часа с момент получения данного письма.\r\n\r\nОплатить и получить доступ, по спец. предложению, Вы\r\nможете по ссылке: http://aleks-lesly.ru/ob/ord/leslyskidka', 'plain', 0, 'price', '0', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '', '', 0, 0, 'price', 'price');

-- --------------------------------------------------------

--
-- Структура таблицы `ob_good_group`
--

CREATE TABLE IF NOT EXISTS `ob_good_group` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `good_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_letter`
--

CREATE TABLE IF NOT EXISTS `ob_letter` (
  `id` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `type` varchar(10) NOT NULL,
  `lon` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ob_letter`
--

INSERT INTO `ob_letter` (`id`, `description`, `subject`, `message`, `type`, `lon`) VALUES
('affreg', 'После регистрации в партнёрской программе', '%name%, Вы зарегистрировались в партнёрской программе', 'Здравствуйте, %name%!\r\n\r\nВы зарегистрированы в партнёрской программе.\r\n\r\nВаши данные для входа в аккаунт:\r\n\r\nЛогин: %partner_id%\r\nПароль: %password%\r\n\r\nВход в аккаунт здесь:\r\n%bu%aff/login\r\n\r\n\r\nP.S. Если Вы получили письмо по ошибке, пожалуйста, просто проигнорируйте его.\r\n--\r\n%site_title%\r\n%site_url%', 'plain', 1),
('forgot_pass', 'Восстановление пароля в партнёрской программе', '%name%, Ваш пароль к партнёрской программе', 'Здравствуйте, %name%!\r\n\r\nВы запросили восстановление пароля к партнёрской программе.\r\n\r\nВаши данные:\r\n\r\nЛогин (RefID): %partner_id%\r\nПароль: %password%\r\n\r\nВход в аккаунт:\r\n%bu%aff/default/login\r\n\r\nP.S. Если Вы получили данное письмо по ошибке, пожалуйста, проигнорируйте его или свяжитесь с администратором.\r\n\r\n--\r\n%site_title%\r\n%site_url%\r\n', 'plain', 1),
('admin_forgot_link', 'Запрос на восстановление пароля администратора', '[OrderBro] - Ваша ссылка для восстановления пароля', 'Здравствуйте, %name%!\r\n\r\nВы запросили восстановление пароля для доступа к панели администратора.\r\n\r\nВаш Логин: %username%\r\nВремя запроса: %time%\r\nЗапрошено с IP: %ip%\r\n\r\nДля получения нового пароля, нажмите на следующую ссылку:\r\n%link%\r\n\r\nВам будет сгенерирован новый пароль и выслан на e-mail.\r\nСменить его сможет только администратор - в разделе "Операторы".', 'plain', 1),
('admin_forgot_pass', 'Новый пароль администратора', '[OrderBro] - Новый пароль', 'Здравствуйте, %name%!\r\n\r\nДля Вашей учётной записи сгенерирован новый пароль.\r\n\r\nДанные для входа:\r\n\r\nЛогин: %username%\r\nПароль: %password%\r\n\r\nВход в аккаунт:\r\n%bu%admin/login', 'plain', 1),
('bill_new', 'Выписан новый счёт (письмо пользователю)', 'Вы выписали новый счёт', 'Здравствуйте.\r\n\r\nВы выписали новый счёт:\r\n\r\nНомер счёта: %bill_id%\r\nСумма: %sum%\r\n\r\nПостоянная ссылка для отслеживания состояния Вашего заказа:\r\n%status_link%\r\n\r\nСсылка на оплату: \r\n%pay_link%\r\n\r\nP.S. Если Вам письмо пришло по ошибке - просто проигнорируйте его.\r\n\r\nЕсли у Вас есть вопросы по заказу, обратитесь в службу поддержки\r\nпо ссылке: https://dearclient.ru. \r\n\r\nВсего Вам наилучшего.', 'plain', 1),
('nalozh_confirm', 'Письмо с ссылкой подтверждения наложенного платежа', 'Подтверждение заказа наложенным платежом', 'Здравствуйте.\r\n\r\nВы оформили заказ наложенным платежом:\r\n\r\nНомер счёта: %bill_id%\r\nСумма: %sum%\r\n\r\nЧтобы подтвердить данный заказ, следует перейти по ссылке:\r\n%nalozh_link%\r\n\r\nВНИМАНИЕ! Подтверждайте только в том случае, если Вы обязуетесь выкупить заказ, когда он прийдёт по почте. В противном случае - не нажимайте на ссылку и просто удалите данное письмо.\r\n\r\nПостоянная ссылка для отслеживания состояния Вашего заказа:\r\n%status_link%\r\n\r\nP.S. Если Вам письмо пришло по ошибке - просто проигнорируйте его, при необходимости - свяжитесь с администрацией сайта самостоятельно.\r\n---\r\n%site_title%\r\n%site_url%', 'plain', 1),
('nalozh_confirmed', 'Заказ наложенным платежом подтверждён', 'Ваш заказ наложенным платежом подтверждён', 'Здравствуйте, %name%.\r\n\r\nВаш заказ наложенным платежом успешно подтверждён.\r\nОтправка произойдёт в ближайшее время - в сроки, установленные продавцом.\r\n\r\nНомер счёта: %bill_id%\r\n\r\nПостоянная ссылка для отслеживания состояния Вашего заказа:\r\n%status_link%\r\n\r\n---\r\n%site_title%\r\n%site_url%', 'plain', 1),
('admin_nalozh_confirmed', 'Администратору уведомление о заказе наложенным платежом', 'Оформлен заказ №%bill_id% наложенным платежом', 'Здравствуйте.\r\n\r\nОформлен заказ №%bill_id% наложенным платежом с такими данными:\r\n\r\nСумма: %sum%\r\nКупон скидки (если есть): %cupon%\r\n\r\nE-mail: %email%\r\nДругой e-mail: %amail%\r\nТелефон: %phone%\r\nIP: %ip%\r\n\r\nКомментарий к заказу: %comment%\r\n\r\n===============================\r\n Содержимое заказа\r\n===============================\r\n\r\n%orders%\r\n===============================\r\n\r\nАдрес доставки:\r\n\r\nФамилия: %surname%\r\nИмя: %uname%\r\nОтчество: %otchestvo%\r\n\r\nСтрана: %strana%\r\nОбласть/регион: %region%\r\nГород: %gorod%\r\nАдрес: %address%\r\nПочтовый индекс: %postindex%\r\n\r\nДанный заказ подтверждён.\r\n\r\nСсылка на отслеживание статуса:\r\n%status_link%\r\n\r\nСсылка для просмотра счёта в Панели Администратора:\r\n%admin_link%\r\n\r\nВсего наилучшего.\r\n---\r\n[Отправлено системой OrderBro]', 'plain', 1),
('rass_default', 'По умолчанию при выполнении рассылки', '%name%, важная новость', 'Здравствуйте, %name%.\r\n\r\n\r\n\r\n\r\n\r\nВсего наилучшего!\r\n--\r\n%site_title%\r\n%site_url%\r\n\r\nОтказаться от получения сообщений на e-mail (безвозвратно):\r\n%unsub%\r\n', 'plain', 1),
('admin_notify_paid', 'Уведомление о совершении платежа вручную', 'Пользователь сообщает о совершении платежа вручную', 'Здравствуйте.\r\n\r\nПользователь сообщате, что счёт №%bill_id% был оплачен вручную.\r\n\r\nСумма: %sum%\r\nСпособ: %way%\r\n\r\n===============================================\r\n Текст сообщения от пользователя\r\n===============================================\r\n\r\n%message%\r\n\r\n===============================================\r\n\r\nСсылка на отслеживание статуса:\r\n%status_link%\r\n\r\nСсылка для просмотра счёта в Панели Администратора:\r\n%admin_link%\r\n\r\nПроверьте действительно поступления оплаты и после этого отметьте счёт как оплаченный.\r\n\r\nВсего наилучшего.\r\n---\r\n[Отправлено системой OrderBro]', 'plain', 1),
('aff_payout', 'Уведомление о выплате комиссионных', '%name%, Вам выплачены комиссионные!', 'Здравствуйте, %name%!\r\n\r\nВы являетесь участником партнёрской программы сайта:\r\n%site_url%\r\n\r\nВаш RefID: %refid%\r\n\r\nВам выплачены комиссионные в размере: %sum% руб.\r\n\r\nСпособ выплаты: %way%\r\nВыплачено на счёт: %purse%\r\n\r\nВсего наилучшего.\r\n\r\n---\r\n%site_title%\r\n%site_url%', 'plain', 1),
('author_payout', 'Уведомление о выплате авторского вознаграждения', '%name%, Вам выплачено авторское вознаграждение', 'Здравствуйте, %name%!\r\n\r\nВаш ID автора: %id%\r\n\r\nВам выплачено авторское вознаграждение в размере: %sum% руб.\r\n\r\nСпособ выплаты: %way%\r\nВыплачено на счёт: %purse%\r\n\r\nВсего наилучшего.\r\n\r\n---\r\n%site_title%\r\n%site_url%', 'plain', 1),
('good_default_letter', 'Письмо по умолчанию - при добавлении нового товара', 'Ваша ссылка для скачивания товара', 'Здравствуйте! \r\n\r\nВаша ссылка для скачивания "%good_title%":\r\n%dlink%\r\n\r\nПостарайтесь скачать все файлы в течение 3-х суток.\r\n\r\nВсего доброго.\r\n\r\n--\r\n%site_title%\r\n%site_url%', 'plain', 1),
('bill_notify_1', 'Первое напоминание о неоплаченном счёте', 'У вас имеется неоплаченный счёт', 'Здравствуйте.\r\n\r\nВы ранее оформляли заказ №%bill_id%, но оплата за него пока что не поступала.\r\n\r\nПожалуйста, просмотрите информацию о выписанном счёте и при необходимости - произведите оплату.\r\n\r\nИнформация:\r\n\r\nСчёт выписан: %date%\r\nСумма: %sum%\r\n\r\nСсылка на оплату: %pay_link%\r\n\r\nПостоянная ссылка для отслеживания состояния Вашего заказа:\r\n%status_link%\r\n\r\nЕсли у вас появились вопросы по заказу или возникла проблема с оплатой, напишите в поддержку по\r\nссылке: https://dearclient.ru.  Мы обязательно поможем и ответим на ваш вопрос.\r\n\r\nВсего Вам наилучшего. \r\nС уважением, команда поддержки, Алекса Лесли.\r\n\r\n---\r\nОтказаться от получения напоминаний:\r\n%unsub%', 'plain', 1),
('bill_notify_2', 'Второе напоминание о неоплаченном счёте', 'У вас имеется неоплаченный счёт, последнее напоминание', 'Здравствуйте.\r\n\r\nВы ранее оформляли заказ №%bill_id%, но оплата за него пока что не поступала.\r\n\r\nОбратите внимание! Это последнее напоминание, завтра ваш заказ будет удален.\r\n\r\nПожалуйста, просмотрите информацию о выписанном счёте и при необходимости - произведите оплату.\r\n\r\nИнформация:\r\n\r\nСчёт выписан: %date%\r\nСумма: %sum%\r\n\r\nСсылка на оплату: %pay_link%\r\n\r\nПостоянная ссылка для отслеживания состояния Вашего заказа:\r\n%status_link%\r\n\r\nЕсли у вас появились вопросы по заказу или возникла проблема с оплатой, напишите в поддержку по\r\nссылке: https://dearclient.ru.  Мы обязательно поможем и ответим на ваш вопрос.\r\n\r\nВсего Вам наилучшего. \r\nС уважением, команда поддержки, Алекса Лесли.\r\n\r\n---\r\nОтказаться от получения напоминаний:\r\n%unsub%', 'plain', 1),
('aff_notify', 'Уведомление партнёру о начислении комиссионных', '%name%, Вам начислены комиссионные за участие в партнёрской программе', 'Здравствуйте, %name%!\r\n\r\nПо Вашей партнёрской ссылке была совершена продажа и Вам зачислены комиссионные.\r\n\r\nНазвание товара: "%good_title%"\r\n\r\nE-mail покупателя: %client_mail%\r\nНомер счёта: %bill_id%\r\n\r\nВаше вознаграждение: %komis% руб.\r\n\r\nВойти в Ваш партнёрский аккаунт для просмотра статистики Вы можете здесь:\r\n\r\n%bu%aff/login\r\n\r\nВаш логин: %refid%\r\n\r\nКомиссионные для следующих продаж этого товара: %newkomis%\r\n\r\nКомиссионные будут выплачены Вам в срок, установленный автором. О выплате комиссионных Вы получите отдельное уведомление.\r\n\r\n--\r\nP.S. Вы получили это письмо, так как являетесь участником партнёрской программы сайта:\r\n\r\n%site_title%\r\n%site_url%', 'plain', 1),
('paff_notify', 'Уведомление партнёру 2-го уровня', '%name%, Вам начислены комиссионные 2-го уровня за участие в партнёрской программе', 'Здравствуйте, %name%!\r\n\r\nЗарегистрированный по Вашей партнёрской ссылке партнёр, привлёк покупателя. Совершена продажа и Вам зачислены комиссионные 2-го уровня.\r\n\r\nНазвание товара: "%good_title%"\r\n\r\nЛогин приведённого Вами партнёра: %prefid%\r\n\r\nВаше вознаграждение: %komis% руб.\r\n\r\nВойти в Ваш партнёрский аккаунт для просмотра статистики Вы можете здесь:\r\n\r\n%bu%aff/login\r\n\r\nВаш логин: %refid%\r\n\r\nКомиссионные будут выплачены Вам в срок, установленный автором. О выплате комиссионных Вы получите отдельное уведомление.\r\n\r\n--\r\nP.S. Вы получили это письмо, так как являетесь участником партнёрской программы сайта:\r\n\r\n%site_title%\r\n%site_url%', 'plain', 1),
('author_sell', 'Для автора - уведомление о совершении продажи', '%name%, совершена продажа Вашего продукта', 'Здравствуйте, %name%!\r\n\r\nСовершена продажа Вашего продукта и Вам начислено авторское вознаграждение.\r\n\r\nНазвание товара: "%good_title%"\r\n\r\nСумма, оплаченная за товар: %sum%.\r\nВаше вознаграждение: %komis% руб.\r\n\r\nНомер счёта: %bill_id%\r\nНомер заказа: %order_id%\r\n\r\n==========================================\r\n Данные покупателя\r\n==========================================\r\n\r\n Email: %cmail%\r\n \r\n Фамилия: %surname%\r\n Имя: %cname%\r\n Отчество: %otchestvo%\r\n\r\n Страна: %strana%\r\n Область/регион: %region%\r\n Город: %gorod%\r\n Почтовый индекс: %postindex%\r\n Адрес: %address%\r\n\r\n Телефон: %phone%\r\n\r\n==========================================\r\n\r\nВойти в Ваш авторский аккаунт для просмотра статистики Вы можете здесь:\r\n\r\n%bu%author/\r\n\r\nВаш логин: %login%\r\n\r\nВознаграждение будет выплачено Вам в срок, установленный администратором. О выплате вознаграждения Вы получите отдельное уведомление.\r\n\r\nВсего наилучшего!\r\n--\r\n%site_title%\r\n%site_url%', 'plain', 1),
('bill_error', 'Ошибка при оплате несуществующего или оплаченного счёта', 'Возможно произошла ошибка при оплате счёта', 'Здравствуйте.\r\n\r\nВозможно произошла ошибка при оплате счёта %bill_id%.\r\n\r\nПричина: %error%\r\n\r\nПроверьте поступления средств по данному счёту и при необходимости сделайте ручное зачисление.\r\n\r\nМожет быть это и не ошибка, а всего лишь повторное оповещение от платёжной системы - но рекомендуется проверить разделы "Счета" и "Клиенты" - всё ли в порядке по данному счёту.\r\n\r\n--\r\nСистема OrderBro\r\n\r\n', 'plain', 1),
('mobile', 'Для Администратора на мобильный', 'PAID', 'Oplachen %bill_id% ID %good_id% Summa %cena% %valuta% refid ''%refid%'' email: %email%', 'plain', 1),
('nalozh_after', 'Клиенту после поступления денег от наложенного платежа', '%name%, Ваша оплата (по наложенному платежу) получена', 'Здравствуйте, %name%!\r\n\r\nВы ранее заказывали товар с оплатой наложенным платежом (при получении на почте):\r\n\r\n"%good_title%"\r\n\r\nЭто письмо просто уведомляет Вас о том, что оплата успешно получена продавцом и зачислена.\r\n\r\nСпасибо.\r\n\r\nP.S. Данное письмо носит информационный характер, отвечать на него не нужно.\r\n\r\n--\r\n%site_title%\r\n%site_url%', 'plain', 1),
('admin_ebook', 'Для Админа уведомление об оплате', 'Счёт оплачен', 'Здравствуйте.\r\n\r\nСчёт №%bill_id% оплачен и товар(ы) отправлен(ы) покупателю.\r\n\r\nСтатус счёта:\r\n%status_link%\r\n\r\nСсылка на счёт в Панели Администратора:\r\n%admin_link%\r\n\r\nДанные об этом счёте:\r\n\r\nID товара(ов):\r\n%good_id%\r\n\r\nСумма (с учётом скидки если есть): %sum%\r\nСумма в рублях: %rur% руб.\r\n\r\nИмя покупателя: %uname%\r\nE-mail покупателя: %email%\r\nАльтернативный E-mail покупателя: %amail%\r\nТелефон: %phone%\r\nКупон скидки: %kupon%\r\n\r\n%orders%\r\n\r\nКомиссионных партнёрам (всего): %komis% руб.\r\nАвторское вознаграждение: %akomis% руб.\r\n\r\nСпособ оплаты: %way%\r\n\r\nP.S. Если партнёрам положены комиссионные, то они зачислены и им отправлены соответствующие уведомления\r\n\r\nP.P.S. Для гарантии проверяйте эти сведения, войдя в Панель Администратора.\r\n\r\n--\r\nСистема OrderBro', 'plain', 1),
('admin_disk', 'Для Админа о заказе физического товара', 'Счёт за физический товар(ы) оплачен', 'Здравствуйте.\r\n\r\nСчёт №%bill_id%, включающий физические товары - оплачен, теперь необходимо отправить товар покупателю.\r\n\r\nСтатус счёта:\r\n%status_link%\r\n\r\nСсылка на счёт в Панели Администратора:\r\n%admin_link%\r\n\r\nID товаров:\r\n%good_id%\r\n\r\nДанные для доставки:\r\n\r\nФамилия: %surname%\r\nИмя: %uname%\r\nОтчество: %otchestvo%\r\n\r\nСтрана: %strana%\r\nОбласть/Край: %region%\r\nПочтовый индекс: %postindex%\r\nГород: %gorod%\r\nАдрес: %address%\r\nТелефон: %phone%\r\nКомментарий к заказу: %comment%\r\n\r\n----------------------------\r\n\r\nДанные об этом счёте:\r\n\r\nСумма (с учётом скидки если есть): %sum%\r\nСумма в рублях: %rur% руб.\r\n\r\nE-mail покупателя: %email%\r\nАльтернативный E-mail покупателя: %amail%\r\nКупон скидки: %kupon%\r\n\r\nКомиссионных партнёрам (всего): %komis% руб.\r\nАвторское вознаграждение: %akomis% руб.\r\n\r\nСпособ оплаты: %way%\r\n\r\nP.S. Если партнёрам положены комиссионные, то они зачислены и им отправлены соответствующие уведомления\r\n\r\nP.P.S. Для гарантии проверяйте эти сведения, войдя в Панель Управления.\r\n\r\n--\r\nСистема OrderBro', 'plain', 1),
('sent_nalozh', 'Пользователю отправлен заказ наложенным платежом', '%name%, Ваш заказ наложенным платежом отправлен', 'Здравствуйте, %name%.\r\n\r\nСделанный Вами заказ №%bill_id% отправлен наложенным платежом.\r\n\r\nНомер почтового отправления: %number%\r\n\r\nС помощью этого номера - на сайте Почты России Вы можете отследить путь данной посылки:\r\nhttps://www.pochta.ru/\r\n\r\nОбычно срок доставки посылок по России составляет 2-3 недели и зависит от расстояния, на которое идёт отправка.\r\n\r\nПосле того, как посылка поступит в Ваш город - Вам следует выкупить её в Вашем почтовом отделении.\r\n\r\nПостоянная ссылка с состоянием Вашего заказа:\r\n%status_link%\r\n\r\nВсего наилучшего.\r\n\r\n---\r\n%site_title%\r\n%site_url%', 'plain', 1),
('sent_prepaid', 'Отправлен предоплаченный физический товар', '%name%, Вам отправлена посылка с Вашим заказом', 'Здравствуйте, %name%.\r\n\r\nВаш заказ №%bill_id% был отправлен по почте.\r\n\r\nНомер почтового отправления: %number%\r\n\r\nС помощью этого номера - на сайте Почты России Вы можете отследить путь данной посылки:\r\nhttps://www.pochta.ru/\r\n\r\nОбычно срок доставки посылок по России составляет 2-3 недели - и зависит от расстояния, на которое идёт отправка.\r\n\r\nПостоянная ссылка с состоянием Вашего заказа:\r\n%status_link%\r\n\r\nВсего наилучшего.\r\n\r\n---\r\n%site_title%\r\n%site_url%', 'plain', 1),
('admin_nalozh_ok', 'Подтверждён наложенный платёж', 'Подтверждён наложенный платёж по счёту %bill_id%', 'Это системное уведомление от OrderBro.\r\n\r\nПо счёту №%bill_id% наложенным платежом отмечено подтверждение оплаты заказа.\r\n\r\nСумма: %sum%\r\n\r\nE-mail: %email%\r\nДругой e-mail: %amail%\r\nТелефон: %phone%\r\nIP: %ip%\r\n\r\nКомментарий к заказу: %comment%\r\n\r\nАдрес доставки:\r\n\r\nФамилия: %surname%\r\nИмя: %uname%\r\nОтчество: %otchestvo%\r\n\r\nСтрана: %strana%\r\nОбласть/регион: %region%\r\nГород: %gorod%\r\nАдрес: %address%\r\nПочтовый индекс: %postindex%\r\n\r\nСсылка на отслеживание статуса:\r\n%status_link%\r\n\r\nСсылка для просмотра счёта в Панели Администратора:\r\n%admin_link%\r\n\r\nВсего наилучшего.\r\n\r\n---\r\n[Отправлено системой OrderBro]', 'plain', 1),
('kurier_confirmed', 'Заказ с курьерской доставкой подтверждён', 'Ваш заказ курьерской доставкой подтверждён', 'Здравствуйте, %name%.\r\n\r\nВаш заказ курьерской доставкой успешно подтверждён.\r\nДоставка произойдёт в ближайшее время - в сроки, установленные продавцом.\r\n\r\nНомер счёта: %bill_id%\r\n\r\nПостоянная ссылка для отслеживания состояния Вашего заказа:\r\n%status_link%\r\n\r\n---\r\n%site_title%\r\n%site_url%', 'plain', 1),
('admin_kurier_confirmed', 'Администратору уведомление о заказе курьером', 'Подтверждён заказ №%bill_id% курьерской доставкой', 'Здравствуйте.\r\n\r\nОформлен и подтверждён заказ №%bill_id% курьерской с такими данными:\r\n\r\nСумма: %sum%\r\nКупон скидки (если есть): %cupon%\r\n\r\nE-mail: %email%\r\nДругой e-mail: %amail%\r\nТелефон: %phone%\r\nIP: %ip%\r\n\r\nКомментарий к заказу: %comment%\r\n\r\n===============================\r\n Содержимое заказа\r\n===============================\r\n\r\n%orders%\r\n===============================\r\n\r\nАдрес доставки:\r\n\r\nФамилия: %surname%\r\nИмя: %uname%\r\nОтчество: %otchestvo%\r\n\r\nСтрана: %strana%\r\nОбласть/регион: %region%\r\nГород: %gorod%\r\nАдрес: %address%\r\nПочтовый индекс: %postindex%\r\n\r\nДанный заказ подтверждён.\r\n\r\nСсылка на отслеживание статуса:\r\n%status_link%\r\n\r\nСсылка для просмотра счёта в Панели Администратора:\r\n%admin_link%\r\n\r\nВсего наилучшего.\r\n---\r\n[Отправлено системой OrderBro]', 'plain', 1),
('kurier_confirm', 'Письмо с ссылкой подтверждения заказа курьером', 'Подтверждение заказа курьерской доставкой', 'Здравствуйте.\r\n\r\nВы оформили заказ курьерской доставкой:\r\n\r\nНомер счёта: %bill_id%\r\nСумма: %sum%\r\n\r\nЧтобы подтвердить данный заказ, следует перейти по ссылке:\r\n%nalozh_link%\r\n\r\nВНИМАНИЕ! Подтверждайте только в том случае, если Вы обязуетесь оплатить заказ, когда он будет доставлен Вам курьером. В противном случае - не нажимайте на ссылку и просто удалите данное письмо.\r\n\r\nПостоянная ссылка для отслеживания состояния Вашего заказа:\r\n%status_link%\r\n\r\nP.S. Если Вам письмо пришло по ошибке - просто проигнорируйте его, при необходимости - свяжитесь с администрацией сайта самостоятельно.\r\n---\r\n%site_title%\r\n%site_url%', 'plain', 1),
('admin_nalozh_notconfirmed', 'Администратору уведомление о НЕПОДТВЕРЖДЁННОМ заказе наложенным платежом', 'Оформлен, но не подтверждён ещё заказ №%bill_id% наложенным платежом', 'Здравствуйте.\r\n\r\nОформлен (но не подтверждён ещё) заказ №%bill_id% наложенным платежом с такими данными:\r\n\r\nСумма: %sum%\r\nКупон скидки (если есть): %cupon%\r\n\r\nE-mail: %email%\r\nДругой e-mail: %amail%\r\nТелефон: %phone%\r\nIP: %ip%\r\n\r\nКомментарий к заказу: %comment%\r\n\r\n===============================\r\n Содержимое заказа\r\n===============================\r\n\r\n%orders%\r\n===============================\r\n\r\nАдрес доставки:\r\n\r\nФамилия: %surname%\r\nИмя: %uname%\r\nОтчество: %otchestvo%\r\n\r\nСтрана: %strana%\r\nОбласть/регион: %region%\r\nГород: %gorod%\r\nАдрес: %address%\r\nПочтовый индекс: %postindex%\r\n\r\nДанный заказ ещё не подтверждён - требует подтверждения оператором или заказчиком по ссылке (если включено письмо).\r\n\r\nСсылка на отслеживание статуса:\r\n%status_link%\r\n\r\nСсылка для просмотра счёта в Панели Администратора:\r\n%admin_link%\r\n\r\nВсего наилучшего.\r\n---\r\n[Отправлено системой OrderBro]', 'plain', 0),
('admin_kurier_notconfirmed', 'Администратору уведомление о НЕПОДТВЕРЖДЁННОМ заказе курьером', 'Оформлен, но не подтверждён ещё заказ №%bill_id% курьером', 'Здравствуйте.\r\n\r\nОформлен (но не подтверждён ещё) заказ №%bill_id% КУРЬЕРОМ с такими данными:\r\n\r\nСумма: %sum%\r\nКупон скидки (если есть): %cupon%\r\n\r\nE-mail: %email%\r\nДругой e-mail: %amail%\r\nТелефон: %phone%\r\nIP: %ip%\r\n\r\nКомментарий к заказу: %comment%\r\n\r\n===============================\r\n Содержимое заказа\r\n===============================\r\n\r\n%orders%\r\n===============================\r\n\r\nАдрес доставки:\r\n\r\nФамилия: %surname%\r\nИмя: %uname%\r\nОтчество: %otchestvo%\r\n\r\nСтрана: %strana%\r\nОбласть/регион: %region%\r\nГород: %gorod%\r\nАдрес: %address%\r\nПочтовый индекс: %postindex%\r\n\r\nДанный заказ ещё не подтверждён - требует подтверждения оператором или заказчиком по ссылке (если включено письмо).\r\n\r\nСсылка на отслеживание статуса:\r\n%status_link%\r\n\r\nСсылка для просмотра счёта в Панели Администратора:\r\n%admin_link%\r\n\r\nВсего наилучшего.\r\n---\r\n[Отправлено системой OrderBro]', 'plain', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `ob_log`
--

CREATE TABLE IF NOT EXISTS `ob_log` (
  `id` bigint(20) NOT NULL,
  `date` int(11) DEFAULT NULL,
  `action` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `comment` text
) ENGINE=InnoDB AUTO_INCREMENT=770 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ob_log`
--

INSERT INTO `ob_log` (`id`, `date`, `action`, `user`, `comment`) VALUES
(1, 1629787255, 'newpay', NULL, 'Получено оповещение о зачислении счёта #281 на сумму 999.00 платёжная система rur кошелёк '),
(2, 1629787255, 'newchange', NULL, 'Изменён счёт №281 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(3, 1629787255, 'newchange', NULL, 'Изменён счёт №281 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(4, 1629787255, 'newclient', NULL, 'Добавлен новый клиент №116 для товара "telesniy" \r\nИмя клиента: "Игорь"\r\nE-mail: kavaler-gard@mail.ru\r\nСчёт: '),
(5, 1629787255, 'sendgood', NULL, 'Отправлен товар покупателю kavaler-gard@mail.ru с именем "Игорь"\r\nТема письма: "Ваш доступ к оплаченному курсу, Алекса Лесли"\r\nТекст письма: Здравствуйте.\r\n\r\nСпасибо за оплату!\r\n\r\nВаш доступ к курсу: https://disk.yandex.ru/d/zPIa3PvQ2t6-aw\r\nПлюс Телесный тренинг: https://disk.yandex.ru/d/zPIa3PvQ2t6-aw\r\n\r\nЧтобы начать изучение курса, скачайте архив и\r\nразархивируйте в нужную вам папку.\r\n\r\nЕсли необходимо, инструкция, как разархивировать файл:\r\nhttps://www.youtube.com/watch?v=4_jpDmmc-bY\r\n\r\n Доступ к курсу, не ограничен по времени.\r\n\r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dear-client.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n\r\np.s. Специальное предложение для новых клиентов!\r\nВы можете получить доступ ко ВСЕМ курсам и книгам\r\nАлекса Лесли, всего за 1 000 руб. по акционной цене!\r\n\r\nКак и любое хорошее предложение, наше также имеет\r\nсвой срок, 24 часа с момент получения данного письма.\r\n\r\nОплатить и получить доступ, по спец. предложению, Вы\r\nможете по ссылке: http://aleks-lesly.ru/ob/ord/leslyskidka\r\n'),
(6, 1629787255, 'newchange', NULL, 'Изменён счёт №281 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(7, 1629787255, 'newchange', NULL, 'Изменён счёт №281 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(8, 1629967787, 'login', '1', 'Выполнен вход в админ-панель с логином admin IP-адрес 194.34.251.204'),
(9, 1629967808, 'newchange', '1', 'Изменён счёт №281 - предыдущий статус "Оплачен и отправлен", текущий статус "Ожидание оплаты"'),
(10, 1629967808, 'newchange', '1', 'Изменён счёт №281 - предыдущий статус "Оплачен и отправлен", текущий статус "Ожидание оплаты"'),
(11, 1629967808, 'newchange', '1', 'Изменён счёт №281 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(12, 1629967808, 'newchange', '1', 'Изменён счёт №281 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(13, 1629967815, 'newchange', '1', 'Изменён счёт №281 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(14, 1629967815, 'newchange', '1', 'Изменён счёт №281 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(15, 1629967815, 'sendgood', '1', 'Отправлен товар покупателю kavaler-gard@mail.ru с именем "Игорь"\r\nТема письма: "Ваш доступ к оплаченному курсу, Алекса Лесли"\r\nТекст письма: Здравствуйте.\r\n\r\nСпасибо за оплату!\r\n\r\nВаш доступ к курсу: https://disk.yandex.ru/d/zPIa3PvQ2t6-aw\r\nПлюс Телесный тренинг: https://disk.yandex.ru/d/zPIa3PvQ2t6-aw\r\n\r\nЧтобы начать изучение курса, скачайте архив и\r\nразархивируйте в нужную вам папку.\r\n\r\nЕсли необходимо, инструкция, как разархивировать файл:\r\nhttps://www.youtube.com/watch?v=4_jpDmmc-bY\r\n\r\n Доступ к курсу, не ограничен по времени.\r\n\r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dear-client.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n\r\np.s. Специальное предложение для новых клиентов!\r\nВы можете получить доступ ко ВСЕМ курсам и книгам\r\nАлекса Лесли, всего за 1 000 руб. по акционной цене!\r\n\r\nКак и любое хорошее предложение, наше также имеет\r\nсвой срок, 24 часа с момент получения данного письма.\r\n\r\nОплатить и получить доступ, по спец. предложению, Вы\r\nможете по ссылке: http://aleks-lesly.ru/ob/ord/leslyskidka\r\n'),
(16, 1629967816, 'newchange', '1', 'Изменён счёт №281 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(17, 1629967816, 'newchange', '1', 'Изменён счёт №281 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(18, 1629967816, 'newchange', '1', 'Изменён счёт №281 - предыдущий статус "Оплачен и отправлен", текущий статус "Оплачен и отправлен"'),
(19, 1629967816, 'newchange', '1', 'Изменён счёт №281 - предыдущий статус "Оплачен и отправлен", текущий статус "Оплачен и отправлен"'),
(20, 1630170604, 'newchange', NULL, 'Изменён счёт №283 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(21, 1630605304, 'newchange', NULL, 'Изменён счёт №283 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(22, 1631248730, 'newchange', NULL, 'Изменён счёт №285 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(23, 1631248731, 'newchange', NULL, 'Изменён счёт №285 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(24, 1631249080, 'newchange', NULL, 'Изменён счёт №286 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(25, 1631249080, 'newchange', NULL, 'Изменён счёт №286 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(26, 1631264165, 'login', '1', 'Выполнен вход в админ-панель с логином admin IP-адрес 91.239.206.147'),
(27, 1631508906, 'newchange', NULL, 'Изменён счёт №284 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(28, 1631508909, 'newchange', NULL, 'Изменён счёт №285 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(29, 1631508910, 'newchange', NULL, 'Изменён счёт №286 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(30, 1631833837, 'newchange', NULL, 'Изменён счёт №288 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(31, 1631833837, 'newchange', NULL, 'Изменён счёт №288 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(32, 1631940904, 'newchange', NULL, 'Изменён счёт №284 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(33, 1631940906, 'newchange', NULL, 'Изменён счёт №285 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(34, 1631940906, 'newchange', NULL, 'Изменён счёт №286 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(35, 1632066904, 'newchange', NULL, 'Изменён счёт №287 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(36, 1632095703, 'newchange', NULL, 'Изменён счёт №288 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(37, 1632126646, 'newchange', NULL, 'Изменён счёт №289 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(38, 1632126646, 'newchange', NULL, 'Изменён счёт №289 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(39, 1632127096, 'newchange', NULL, 'Изменён счёт №289 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(40, 1632127096, 'newchange', NULL, 'Изменён счёт №289 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(41, 1632387304, 'newchange', NULL, 'Изменён счёт №289 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(42, 1632388807, 'newchange', NULL, 'Изменён счёт №289 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(43, 1632388807, 'newchange', NULL, 'Изменён счёт №289 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(44, 1632498903, 'newchange', NULL, 'Изменён счёт №287 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(45, 1632527703, 'newchange', NULL, 'Изменён счёт №288 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(46, 1632713850, 'newchange', NULL, 'Изменён счёт №291 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(47, 1632713850, 'newchange', NULL, 'Изменён счёт №291 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(48, 1632713994, 'newpay', NULL, 'Получено оповещение о зачислении счёта #291 на сумму 2990.00 платёжная система rur кошелёк '),
(49, 1632713994, 'newchange', NULL, 'Изменён счёт №291 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(50, 1632713994, 'newchange', NULL, 'Изменён счёт №291 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(51, 1632713994, 'newclient', NULL, 'Добавлен новый клиент №117 для товара "alesly" \r\nИмя клиента: "Роман"\r\nE-mail: teshka78@mail.ru\r\nСчёт: '),
(52, 1632713995, 'sendgood', NULL, 'Отправлен товар покупателю teshka78@mail.ru с именем "Роман"\r\nТема письма: "Распродажа Алекса Лесли, доступ"\r\nТекст письма: Здравствуйте.\r\n \r\nСпасибо за оплату распродажи Алекса Лесли!\r\n \r\nВаш доступ к распродаже: https://cloud.mail.ru/public/5fVo/y2vyBAyLy\r\n \r\nПо этой ссылке будут добавляться новые материалы,\r\nпоэтому, время от времени, заходите, проверяйте.\r\n \r\nВы можете как скачать тренинги, так и смотреть онлайн.\r\nВсе курсы будут доступны бессрочно.\r\n \r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dear-client.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n \r\np.s. Мои курсы, идеально дополняет, мой коллега Алекс Мэй.\r\nСпециалист высочайшего класса!\r\n \r\nРебята, специально для вас!, я договорился о 95% скидке на время\r\nмоей распродажи, на полностью ВСЕ тренинги Алекса Мэя.\r\nОчень рекомендую к изучению! Это все платные курсы Алекса,\r\nв которых, вы точно не найдете "воды". Проверил лично и не один раз! :-)\r\n \r\nСмотрите подробности по ссылке: http://allex-mey.ru/\r\n \r\nС уважением, Алекс Лесли.\r\n'),
(53, 1632713995, 'newchange', NULL, 'Изменён счёт №291 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(54, 1632713995, 'newchange', NULL, 'Изменён счёт №291 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(55, 1632776657, 'newchange', NULL, 'Изменён счёт №292 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(56, 1632776657, 'newchange', NULL, 'Изменён счёт №292 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(57, 1632776874, 'newpay', NULL, 'Получено оповещение о зачислении счёта #292 на сумму 2990.00 платёжная система rur кошелёк '),
(58, 1632776874, 'newchange', NULL, 'Изменён счёт №292 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(59, 1632776874, 'newchange', NULL, 'Изменён счёт №292 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(60, 1632776874, 'newclient', NULL, 'Добавлен новый клиент №118 для товара "alesly" \r\nИмя клиента: "Александр Лапшин"\r\nE-mail: alexeylapshin1992@mail.ru\r\nСчёт: '),
(61, 1632776874, 'sendgood', NULL, 'Отправлен товар покупателю alexeylapshin1992@mail.ru с именем "Александр Лапшин"\r\nТема письма: "Распродажа Алекса Лесли, доступ"\r\nТекст письма: Здравствуйте.\r\n \r\nСпасибо за оплату распродажи Алекса Лесли!\r\n \r\nВаш доступ к распродаже: https://cloud.mail.ru/public/5fVo/y2vyBAyLy\r\n \r\nПо этой ссылке будут добавляться новые материалы,\r\nпоэтому, время от времени, заходите, проверяйте.\r\n \r\nВы можете как скачать тренинги, так и смотреть онлайн.\r\nВсе курсы будут доступны бессрочно.\r\n \r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dear-client.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n \r\np.s. Мои курсы, идеально дополняет, мой коллега Алекс Мэй.\r\nСпециалист высочайшего класса!\r\n \r\nРебята, специально для вас!, я договорился о 95% скидке на время\r\nмоей распродажи, на полностью ВСЕ тренинги Алекса Мэя.\r\nОчень рекомендую к изучению! Это все платные курсы Алекса,\r\nв которых, вы точно не найдете "воды". Проверил лично и не один раз! :-)\r\n \r\nСмотрите подробности по ссылке: http://allex-mey.ru/\r\n \r\nС уважением, Алекс Лесли.\r\n'),
(62, 1632776874, 'newchange', NULL, 'Изменён счёт №292 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(63, 1632776874, 'newchange', NULL, 'Изменён счёт №292 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(64, 1632823526, 'login', '1', 'Выполнен вход в админ-панель с логином admin IP-адрес 95.214.235.56'),
(65, 1632823541, 'newchange', '1', 'Изменён счёт №292 - предыдущий статус "Оплачен и отправлен", текущий статус "Ожидание оплаты"'),
(66, 1632823541, 'newchange', '1', 'Изменён счёт №292 - предыдущий статус "Оплачен и отправлен", текущий статус "Ожидание оплаты"'),
(67, 1632823542, 'newchange', '1', 'Изменён счёт №292 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(68, 1632823542, 'newchange', '1', 'Изменён счёт №292 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(69, 1632823545, 'newchange', '1', 'Изменён счёт №292 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(70, 1632823545, 'newchange', '1', 'Изменён счёт №292 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(71, 1632823546, 'newchange', '1', 'Изменён счёт №292 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(72, 1632823546, 'newchange', '1', 'Изменён счёт №292 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(73, 1632823557, 'newchange', '1', 'Изменён счёт №292 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(74, 1632823557, 'newchange', '1', 'Изменён счёт №292 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(75, 1632823557, 'sendgood', '1', 'Отправлен товар покупателю alexeylapshin1992@mail.ru с именем "Александр Лапшин"\r\nТема письма: "Распродажа Алекса Лесли, доступ"\r\nТекст письма: Здравствуйте.\r\n \r\nСпасибо за оплату распродажи Алекса Лесли!\r\n \r\nВаш доступ к распродаже: https://cloud.mail.ru/public/5fVo/y2vyBAyLy\r\n \r\nПо этой ссылке будут добавляться новые материалы,\r\nпоэтому, время от времени, заходите, проверяйте.\r\n \r\nВы можете как скачать тренинги, так и смотреть онлайн.\r\nВсе курсы будут доступны бессрочно.\r\n \r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dear-client.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n \r\np.s. Мои курсы, идеально дополняет, мой коллега Алекс Мэй.\r\nСпециалист высочайшего класса!\r\n \r\nРебята, специально для вас!, я договорился о 95% скидке на время\r\nмоей распродажи, на полностью ВСЕ тренинги Алекса Мэя.\r\nОчень рекомендую к изучению! Это все платные курсы Алекса,\r\nв которых, вы точно не найдете "воды". Проверил лично и не один раз! :-)\r\n \r\nСмотрите подробности по ссылке: http://allex-mey.ru/\r\n \r\nС уважением, Алекс Лесли.\r\n'),
(76, 1632823558, 'newchange', '1', 'Изменён счёт №292 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(77, 1632823558, 'newchange', '1', 'Изменён счёт №292 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(78, 1632974105, 'newchange', NULL, 'Изменён счёт №290 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(79, 1634140168, 'newchange', NULL, 'Изменён счёт №294 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(80, 1634140168, 'newchange', NULL, 'Изменён счёт №294 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(81, 1634907452, 'newchange', NULL, 'Изменён счёт №295 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(82, 1634907452, 'newchange', NULL, 'Изменён счёт №295 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(83, 1634907935, 'newchange', NULL, 'Изменён счёт №296 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(84, 1634907935, 'newchange', NULL, 'Изменён счёт №296 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(85, 1635341764, 'newchange', NULL, 'Изменён счёт №297 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(86, 1635341764, 'newchange', NULL, 'Изменён счёт №297 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(87, 1635341768, 'newchange', NULL, 'Изменён счёт №297 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(88, 1635341768, 'newchange', NULL, 'Изменён счёт №297 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(89, 1635341771, 'newchange', NULL, 'Изменён счёт №297 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(90, 1635341771, 'newchange', NULL, 'Изменён счёт №297 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(91, 1635850922, 'newchange', NULL, 'Изменён счёт №298 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(92, 1635850922, 'newchange', NULL, 'Изменён счёт №298 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(93, 1635851021, 'newpay', NULL, 'Получено оповещение о зачислении счёта #298 на сумму 2990.00 платёжная система rur кошелёк '),
(94, 1635851021, 'newchange', NULL, 'Изменён счёт №298 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(95, 1635851021, 'newchange', NULL, 'Изменён счёт №298 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(96, 1635851021, 'newclient', NULL, 'Добавлен новый клиент №119 для товара "alesly" \r\nИмя клиента: "Алексей"\r\nE-mail: zerzala@yandex.ru\r\nСчёт: '),
(97, 1635851021, 'sendgood', NULL, 'Отправлен товар покупателю zerzala@yandex.ru с именем "Алексей"\r\nТема письма: "Распродажа Алекса Лесли, доступ"\r\nТекст письма: Здравствуйте.\r\n \r\nСпасибо за оплату распродажи Алекса Лесли!\r\n \r\nВаш доступ к распродаже: https://cloud.mail.ru/public/5fVo/y2vyBAyLy\r\n \r\nПо этой ссылке будут добавляться новые материалы,\r\nпоэтому, время от времени, заходите, проверяйте.\r\n \r\nВы можете как скачать тренинги, так и смотреть онлайн.\r\nВсе курсы будут доступны бессрочно.\r\n \r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dear-client.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n \r\np.s. Мои курсы, идеально дополняет, мой коллега Алекс Мэй.\r\nСпециалист высочайшего класса!\r\n \r\nРебята, специально для вас!, я договорился о 95% скидке на время\r\nмоей распродажи, на полностью ВСЕ тренинги Алекса Мэя.\r\nОчень рекомендую к изучению! Это все платные курсы Алекса,\r\nв которых, вы точно не найдете "воды". Проверил лично и не один раз! :-)\r\n \r\nСмотрите подробности по ссылке: http://allex-mey.ru/\r\n \r\nС уважением, Алекс Лесли.\r\n'),
(98, 1635851021, 'newchange', NULL, 'Изменён счёт №298 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(99, 1635851021, 'newchange', NULL, 'Изменён счёт №298 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(100, 1638855114, 'newchange', NULL, 'Изменён счёт №300 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(101, 1638855114, 'newchange', NULL, 'Изменён счёт №300 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(102, 1638855128, 'newchange', NULL, 'Изменён счёт №300 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(103, 1638855128, 'newchange', NULL, 'Изменён счёт №300 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(104, 1638855186, 'newpay', NULL, 'Получено оповещение о зачислении счёта #300 на сумму 999.00 платёжная система rur кошелёк '),
(105, 1638855187, 'newchange', NULL, 'Изменён счёт №300 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(106, 1638855187, 'newchange', NULL, 'Изменён счёт №300 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(107, 1638855187, 'newclient', NULL, 'Добавлен новый клиент №120 для товара "masterskiy" \r\nИмя клиента: "Анна "\r\nE-mail: anna.sayfullina.91@mail.ru\r\nСчёт: '),
(108, 1638855187, 'sendgood', NULL, 'Отправлен товар покупателю anna.sayfullina.91@mail.ru с именем "Анна "\r\nТема письма: "Ваш доступ к оплаченному курсу, Алекса Лесли"\r\nТекст письма: Здравствуйте.\r\n\r\nСпасибо за оплату!\r\n\r\nВаш доступ к курсу: https://cloud.mail.ru/public/8u36/F8BBQ1YNq\r\n\r\nВы можете как смотреть курс онлайн, так и скачать к себе\r\nна компьютер. Доступ к курсу, не ограничен по времени.\r\n\r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dear-client.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n\r\np.s. Специальное предложение для новых клиентов!\r\nВы можете получить доступ ко ВСЕМ курсам и книгам\r\nАлекса Лесли, всего за 1 000 руб. по акционной цене!\r\n\r\nКак и любое хорошее предложение, наше также имеет\r\nсвой срок, 24 часа с момент получения данного письма.\r\n\r\nОплатить и получить доступ, по спец. предложению, Вы\r\nможете по ссылке: http://aleks-lesly.ru/ob/ord/leslyskidka\r\n'),
(109, 1638855187, 'newchange', NULL, 'Изменён счёт №300 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(110, 1638855187, 'newchange', NULL, 'Изменён счёт №300 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(111, 1638855623, 'newchange', NULL, 'Изменён счёт №301 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(112, 1638855623, 'newchange', NULL, 'Изменён счёт №301 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(113, 1638855857, 'newchange', NULL, 'Изменён счёт №302 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(114, 1638855857, 'newchange', NULL, 'Изменён счёт №302 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(115, 1638856046, 'newchange', NULL, 'Изменён счёт №302 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(116, 1638856046, 'newchange', NULL, 'Изменён счёт №302 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(117, 1638856178, 'newchange', NULL, 'Изменён счёт №302 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(118, 1638856178, 'newchange', NULL, 'Изменён счёт №302 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(119, 1638856199, 'newchange', NULL, 'Изменён счёт №302 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(120, 1638856199, 'newchange', NULL, 'Изменён счёт №302 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(121, 1638856507, 'newchange', NULL, 'Изменён счёт №303 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(122, 1638856507, 'newchange', NULL, 'Изменён счёт №303 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(123, 1640290644, 'newchange', NULL, 'Изменён счёт №304 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(124, 1640290644, 'newchange', NULL, 'Изменён счёт №304 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(125, 1640290841, 'login', '1', 'Выполнен вход в админ-панель с логином admin IP-адрес 95.214.235.65'),
(126, 1640344650, 'newchange', NULL, 'Изменён счёт №305 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(127, 1640344650, 'newchange', NULL, 'Изменён счёт №305 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(128, 1640344965, 'login', '1', 'Выполнен вход в админ-панель с логином admin IP-адрес 95.214.235.55'),
(129, 1640355808, 'newchange', NULL, 'Изменён счёт №306 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(130, 1640355808, 'newchange', NULL, 'Изменён счёт №306 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(131, 1640359502, 'newchange', NULL, 'Изменён счёт №307 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(132, 1640359503, 'newchange', NULL, 'Изменён счёт №307 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(133, 1640359744, 'newchange', NULL, 'Изменён счёт №307 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(134, 1640359744, 'newchange', NULL, 'Изменён счёт №307 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(135, 1640359834, 'newchange', NULL, 'Изменён счёт №307 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(136, 1640359834, 'newchange', NULL, 'Изменён счёт №307 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(137, 1640360017, 'newchange', NULL, 'Изменён счёт №308 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(138, 1640360017, 'newchange', NULL, 'Изменён счёт №308 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(139, 1640360237, 'newchange', NULL, 'Изменён счёт №309 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(140, 1640360237, 'newchange', NULL, 'Изменён счёт №309 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(141, 1640360360, 'newchange', NULL, 'Изменён счёт №310 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(142, 1640360360, 'newchange', NULL, 'Изменён счёт №310 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(143, 1640360936, 'newchange', NULL, 'Изменён счёт №310 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(144, 1640360936, 'newchange', NULL, 'Изменён счёт №310 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(145, 1640362078, 'newchange', NULL, 'Изменён счёт №310 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(146, 1640362078, 'newchange', NULL, 'Изменён счёт №310 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(147, 1640362106, 'newchange', NULL, 'Изменён счёт №310 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(148, 1640362106, 'newchange', NULL, 'Изменён счёт №310 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(149, 1640363124, 'login', '1', 'Выполнен вход в админ-панель с логином admin IP-адрес 5.8.16.236'),
(150, 1640363142, 'newchange', '1', 'Изменён счёт №310 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(151, 1640363142, 'newchange', '1', 'Изменён счёт №310 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(152, 1640363142, 'newclient', '1', 'Добавлен новый клиент №121 для товара "alesly" \r\nИмя клиента: "Виталий Салимович Зарикеев"\r\nE-mail: vitalij-zarikeev@yandex.ru\r\nСчёт: '),
(153, 1640363142, 'sendgood', '1', 'Отправлен товар покупателю vitalij-zarikeev@yandex.ru с именем "Виталий Салимович Зарикеев"\r\nТема письма: "Распродажа Алекса Лесли, доступ"\r\nТекст письма: Здравствуйте.\r\n \r\nСпасибо за оплату распродажи Алекса Лесли!\r\n \r\nВаш доступ к распродаже: https://cloud.mail.ru/public/5fVo/y2vyBAyLy\r\n \r\nПо этой ссылке будут добавляться новые материалы,\r\nпоэтому, время от времени, заходите, проверяйте.\r\n \r\nВы можете как скачать тренинги, так и смотреть онлайн.\r\nВсе курсы будут доступны бессрочно.\r\n \r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dear-client.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n \r\np.s. Мои курсы, идеально дополняет, мой коллега Алекс Мэй.\r\nСпециалист высочайшего класса!\r\n \r\nРебята, специально для вас!, я договорился о 95% скидке на время\r\nмоей распродажи, на полностью ВСЕ тренинги Алекса Мэя.\r\nОчень рекомендую к изучению! Это все платные курсы Алекса,\r\nв которых, вы точно не найдете "воды". Проверил лично и не один раз! :-)\r\n \r\nСмотрите подробности по ссылке: http://allex-mey.ru/\r\n \r\nС уважением, Алекс Лесли.\r\n'),
(154, 1640363142, 'newchange', '1', 'Изменён счёт №310 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(155, 1640363142, 'newchange', '1', 'Изменён счёт №310 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(156, 1640363177, 'newchange', NULL, 'Изменён счёт №306 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(157, 1640363177, 'newchange', NULL, 'Изменён счёт №306 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(158, 1640373917, 'newchange', NULL, 'Изменён счёт №311 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(159, 1640373917, 'newchange', NULL, 'Изменён счёт №311 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(160, 1640432271, 'newchange', NULL, 'Изменён счёт №312 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(161, 1640432271, 'newchange', NULL, 'Изменён счёт №312 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(162, 1640436147, 'newchange', NULL, 'Изменён счёт №313 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(163, 1640436147, 'newchange', NULL, 'Изменён счёт №313 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(164, 1640884599, 'newchange', NULL, 'Изменён счёт №315 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(165, 1640884599, 'newchange', NULL, 'Изменён счёт №315 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(166, 1641095967, 'newchange', NULL, 'Изменён счёт №316 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(167, 1641095968, 'newchange', NULL, 'Изменён счёт №316 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(168, 1641096234, 'newchange', NULL, 'Изменён счёт №316 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(169, 1641096234, 'newchange', NULL, 'Изменён счёт №316 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(170, 1641096279, 'newchange', NULL, 'Изменён счёт №316 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(171, 1641096279, 'newchange', NULL, 'Изменён счёт №316 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(172, 1641162227, 'newchange', NULL, 'Изменён счёт №317 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(173, 1641162227, 'newchange', NULL, 'Изменён счёт №317 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(174, 1641588441, 'newchange', NULL, 'Изменён счёт №318 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(175, 1641588441, 'newchange', NULL, 'Изменён счёт №318 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(176, 1641589065, 'newchange', NULL, 'Изменён счёт №319 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(177, 1641589065, 'newchange', NULL, 'Изменён счёт №319 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(178, 1641975542, 'login', '1', 'Выполнен вход в админ-панель с логином admin IP-адрес 5.8.16.163'),
(179, 1642065110, 'newchange', NULL, 'Изменён счёт №320 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(180, 1642065110, 'newchange', NULL, 'Изменён счёт №320 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(181, 1642677116, 'login', '1', 'Выполнен вход в админ-панель с логином admin IP-адрес 5.8.16.235'),
(182, 1642677203, 'newchange', NULL, 'Изменён счёт №321 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(183, 1642677203, 'newchange', NULL, 'Изменён счёт №321 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(184, 1642677211, 'newchange', NULL, 'Изменён счёт №321 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(185, 1642677211, 'newchange', NULL, 'Изменён счёт №321 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(186, 1642677261, 'newchange', NULL, 'Изменён счёт №321 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(187, 1642677261, 'newchange', NULL, 'Изменён счёт №321 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(188, 1642762743, 'newchange', NULL, 'Изменён счёт №322 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(189, 1642762743, 'newchange', NULL, 'Изменён счёт №322 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(190, 1642762747, 'newchange', NULL, 'Изменён счёт №322 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(191, 1642762747, 'newchange', NULL, 'Изменён счёт №322 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(192, 1642762760, 'newchange', NULL, 'Изменён счёт №322 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(193, 1642762760, 'newchange', NULL, 'Изменён счёт №322 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(194, 1642762798, 'newchange', NULL, 'Изменён счёт №322 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(195, 1642762798, 'newchange', NULL, 'Изменён счёт №322 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(196, 1643104442, 'newchange', NULL, 'Изменён счёт №323 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(197, 1643104442, 'newchange', NULL, 'Изменён счёт №323 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(198, 1643104475, 'newchange', NULL, 'Изменён счёт №324 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(199, 1643104475, 'newchange', NULL, 'Изменён счёт №324 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(200, 1643104499, 'newchange', NULL, 'Изменён счёт №324 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(201, 1643104499, 'newchange', NULL, 'Изменён счёт №324 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(202, 1643104678, 'newchange', NULL, 'Изменён счёт №325 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(203, 1643104678, 'newchange', NULL, 'Изменён счёт №325 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(204, 1643104889, 'login', '1', 'Выполнен вход в админ-панель с логином admin IP-адрес 85.203.20.79'),
(205, 1643104918, 'newchange', '1', 'Изменён счёт №325 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(206, 1643104918, 'newchange', '1', 'Изменён счёт №325 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(207, 1643104918, 'newclient', '1', 'Добавлен новый клиент №122 для товара "books" \r\nИмя клиента: "Николай"\r\nE-mail: nikolaikrov63@gmail.com\r\nСчёт: '),
(208, 1643104919, 'sendgood', '1', 'Отправлен товар покупателю nikolaikrov63@gmail.com с именем "Николай"\r\nТема письма: "Ваша ссылка для скачивания книг"\r\nТекст письма: Здравствуйте.\r\n\r\nСпасибо за оплату!\r\n\r\nВаш доступ к книгам: https://cloud.mail.ru/public/BiGf/mjDk96UeW\r\n\r\nДоступ бессрочный.\r\n\r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dear-client.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n\r\np.s. Специальное предложение для новых клиентов!\r\nВы можете получить доступ ко ВСЕМ курсам\r\nАлекса Лесли, всего за 1 000 руб. по акционной цене!\r\n\r\nКак и любое хорошее предложение, наше также имеет\r\nсвой срок, 24 часа с момент получения данного письма.\r\n\r\nОплатить и получить доступ, по спец. предложению, Вы\r\nможете по ссылке: http://aleks-lesly.ru/ob/ord/leslyskidka\r\n'),
(209, 1643104919, 'newchange', '1', 'Изменён счёт №325 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(210, 1643104919, 'newchange', '1', 'Изменён счёт №325 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(211, 1643105779, 'login', '1', 'Выполнен вход в админ-панель с логином admin IP-адрес 85.203.20.79'),
(212, 1643491773, 'newchange', NULL, 'Изменён счёт №326 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(213, 1643491773, 'newchange', NULL, 'Изменён счёт №326 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(214, 1643491795, 'newchange', NULL, 'Изменён счёт №326 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(215, 1643491795, 'newchange', NULL, 'Изменён счёт №326 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(216, 1643491806, 'newchange', NULL, 'Изменён счёт №326 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(217, 1643491806, 'newchange', NULL, 'Изменён счёт №326 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(218, 1643491993, 'newchange', NULL, 'Изменён счёт №326 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(219, 1643491993, 'newchange', NULL, 'Изменён счёт №326 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(220, 1643492049, 'newchange', NULL, 'Изменён счёт №326 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(221, 1643492050, 'newchange', NULL, 'Изменён счёт №326 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(222, 1643492098, 'newchange', NULL, 'Изменён счёт №326 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(223, 1643492098, 'newchange', NULL, 'Изменён счёт №326 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(224, 1643492666, 'newchange', NULL, 'Изменён счёт №326 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(225, 1643492666, 'newchange', NULL, 'Изменён счёт №326 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(226, 1643492688, 'newchange', NULL, 'Изменён счёт №326 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(227, 1643492689, 'newchange', NULL, 'Изменён счёт №326 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(228, 1643493261, 'login', '1', 'Выполнен вход в админ-панель с логином admin IP-адрес 45.91.22.143'),
(229, 1643493288, 'newchange', '1', 'Изменён счёт №326 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(230, 1643493288, 'newchange', '1', 'Изменён счёт №326 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(231, 1643493288, 'newclient', '1', 'Добавлен новый клиент №123 для товара "alesly" \r\nИмя клиента: "Надежда"\r\nE-mail: 89213074737@mail.ru\r\nСчёт: '),
(232, 1643493288, 'sendgood', '1', 'Отправлен товар покупателю 89213074737@mail.ru с именем "Надежда"\r\nТема письма: "Распродажа Алекса Лесли, доступ"\r\nТекст письма: Здравствуйте.\r\n \r\nСпасибо за оплату распродажи Алекса Лесли!\r\n \r\nВаш доступ к распродаже: https://cloud.mail.ru/public/5fVo/y2vyBAyLy\r\n \r\nПо этой ссылке будут добавляться новые материалы,\r\nпоэтому, время от времени, заходите, проверяйте.\r\n \r\nВы можете как скачать тренинги, так и смотреть онлайн.\r\nВсе курсы будут доступны бессрочно.\r\n \r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dear-client.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n \r\np.s. Мои курсы, идеально дополняет, мой коллега Алекс Мэй.\r\nСпециалист высочайшего класса!\r\n \r\nРебята, специально для вас!, я договорился о 95% скидке на время\r\nмоей распродажи, на полностью ВСЕ тренинги Алекса Мэя.\r\nОчень рекомендую к изучению! Это все платные курсы Алекса,\r\nв которых, вы точно не найдете "воды". Проверил лично и не один раз! :-)\r\n \r\nСмотрите подробности по ссылке: http://allex-mey.ru/\r\n \r\nС уважением, Алекс Лесли.\r\n'),
(233, 1643493288, 'newchange', '1', 'Изменён счёт №326 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(234, 1643493288, 'newchange', '1', 'Изменён счёт №326 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(235, 1643556400, 'newchange', NULL, 'Изменён счёт №327 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(236, 1643556400, 'newchange', NULL, 'Изменён счёт №327 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(237, 1643556657, 'newchange', NULL, 'Изменён счёт №327 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(238, 1643556657, 'newchange', NULL, 'Изменён счёт №327 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(239, 1643557014, 'newchange', NULL, 'Изменён счёт №327 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(240, 1643557014, 'newchange', NULL, 'Изменён счёт №327 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(241, 1643557057, 'newchange', NULL, 'Изменён счёт №327 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(242, 1643557058, 'newchange', NULL, 'Изменён счёт №327 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(243, 1643572950, 'newchange', NULL, 'Изменён счёт №327 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(244, 1643572950, 'newchange', NULL, 'Изменён счёт №327 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(245, 1643575196, 'login', '1', 'Выполнен вход в админ-панель с логином admin IP-адрес 45.91.22.21'),
(246, 1643575226, 'newchange', '1', 'Изменён счёт №327 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(247, 1643575226, 'newchange', '1', 'Изменён счёт №327 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(248, 1643575226, 'newclient', '1', 'Добавлен новый клиент №124 для товара "masterskiy" \r\nИмя клиента: "Павел"\r\nE-mail: pnp5@bk.ru\r\nСчёт: '),
(249, 1643575226, 'sendgood', '1', 'Отправлен товар покупателю pnp5@bk.ru с именем "Павел"\r\nТема письма: "Ваш доступ к оплаченному курсу, Алекса Лесли"\r\nТекст письма: Здравствуйте.\r\n\r\nСпасибо за оплату!\r\n\r\nВаш доступ к курсу: https://cloud.mail.ru/public/8u36/F8BBQ1YNq\r\n\r\nВы можете как смотреть курс онлайн, так и скачать к себе\r\nна компьютер. Доступ к курсу, не ограничен по времени.\r\n\r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dear-client.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n\r\np.s. Специальное предложение для новых клиентов!\r\nВы можете получить доступ ко ВСЕМ курсам и книгам\r\nАлекса Лесли, всего за 1 000 руб. по акционной цене!\r\n\r\nКак и любое хорошее предложение, наше также имеет\r\nсвой срок, 24 часа с момент получения данного письма.\r\n\r\nОплатить и получить доступ, по спец. предложению, Вы\r\nможете по ссылке: http://aleks-lesly.ru/ob/ord/leslyskidka\r\n'),
(250, 1643575226, 'newchange', '1', 'Изменён счёт №327 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(251, 1643575226, 'newchange', '1', 'Изменён счёт №327 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(252, 1643576408, 'login', '1', 'Выполнен вход в админ-панель с логином admin IP-адрес 45.91.22.21'),
(253, 1643576427, 'newchange', '1', 'Изменён счёт №328 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(254, 1643576427, 'newchange', '1', 'Изменён счёт №328 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(255, 1643576427, 'newclient', '1', 'Добавлен новый клиент №125 для товара "alesly" \r\nИмя клиента: "Клиент"\r\nE-mail: pnp5@bk.ru\r\nСчёт: '),
(256, 1643576427, 'sendgood', '1', 'Отправлен товар покупателю pnp5@bk.ru с именем "Клиент"\r\nТема письма: "Распродажа Алекса Лесли, доступ"\r\nТекст письма: Здравствуйте.\r\n \r\nСпасибо за оплату распродажи Алекса Лесли!\r\n \r\nВаш доступ к распродаже: https://cloud.mail.ru/public/5fVo/y2vyBAyLy\r\n \r\nПо этой ссылке будут добавляться новые материалы,\r\nпоэтому, время от времени, заходите, проверяйте.\r\n \r\nВы можете как скачать тренинги, так и смотреть онлайн.\r\nВсе курсы будут доступны бессрочно.\r\n \r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dear-client.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n \r\np.s. Мои курсы, идеально дополняет, мой коллега Алекс Мэй.\r\nСпециалист высочайшего класса!\r\n \r\nРебята, специально для вас!, я договорился о 95% скидке на время\r\nмоей распродажи, на полностью ВСЕ тренинги Алекса Мэя.\r\nОчень рекомендую к изучению! Это все платные курсы Алекса,\r\nв которых, вы точно не найдете "воды". Проверил лично и не один раз! :-)\r\n \r\nСмотрите подробности по ссылке: http://allex-mey.ru/\r\n \r\nС уважением, Алекс Лесли.\r\n'),
(257, 1643576427, 'newchange', '1', 'Изменён счёт №328 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(258, 1643576427, 'newchange', '1', 'Изменён счёт №328 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(259, 1644040931, 'newchange', NULL, 'Изменён счёт №329 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(260, 1644040931, 'newchange', NULL, 'Изменён счёт №329 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(261, 1644041005, 'newchange', NULL, 'Изменён счёт №329 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(262, 1644041005, 'newchange', NULL, 'Изменён счёт №329 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(263, 1644041046, 'newchange', NULL, 'Изменён счёт №329 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(264, 1644041046, 'newchange', NULL, 'Изменён счёт №329 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(265, 1644041173, 'newchange', NULL, 'Изменён счёт №330 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(266, 1644041173, 'newchange', NULL, 'Изменён счёт №330 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(267, 1644041364, 'newchange', NULL, 'Изменён счёт №331 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(268, 1644041364, 'newchange', NULL, 'Изменён счёт №331 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(269, 1644041843, 'newchange', NULL, 'Изменён счёт №332 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(270, 1644041843, 'newchange', NULL, 'Изменён счёт №332 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(271, 1644144840, 'login', '1', 'Выполнен вход в админ-панель с логином admin IP-адрес 5.8.16.147'),
(272, 1644685197, 'newchange', NULL, 'Изменён счёт №333 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(273, 1644685197, 'newchange', NULL, 'Изменён счёт №333 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(274, 1644929065, 'newchange', NULL, 'Изменён счёт №334 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(275, 1644929065, 'newchange', NULL, 'Изменён счёт №334 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(276, 1644929418, 'newpay', NULL, 'Получено оповещение о зачислении счёта #334 на сумму 1000 платёжная система rur кошелёк 10'),
(277, 1644929418, 'newchange', NULL, 'Изменён счёт №334 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(278, 1644929418, 'newchange', NULL, 'Изменён счёт №334 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(279, 1644929418, 'newclient', NULL, 'Добавлен новый клиент №126 для товара "books" \r\nИмя клиента: "Влпдимир"\r\nE-mail: vova.tarasenko.00@gmail.com\r\nСчёт: ');
INSERT INTO `ob_log` (`id`, `date`, `action`, `user`, `comment`) VALUES
(280, 1644929418, 'sendgood', NULL, 'Отправлен товар покупателю vova.tarasenko.00@gmail.com с именем "Влпдимир"\r\nТема письма: "Ваша ссылка для скачивания книг"\r\nТекст письма: Здравствуйте.\r\n\r\nСпасибо за оплату!\r\n\r\nВаш доступ к книгам: https://cloud.mail.ru/public/BiGf/mjDk96UeW\r\n\r\nДоступ бессрочный.\r\n\r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dear-client.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n\r\np.s. Специальное предложение для новых клиентов!\r\nВы можете получить доступ ко ВСЕМ курсам\r\nАлекса Лесли, всего за 1 000 руб. по акционной цене!\r\n\r\nКак и любое хорошее предложение, наше также имеет\r\nсвой срок, 24 часа с момент получения данного письма.\r\n\r\nОплатить и получить доступ, по спец. предложению, Вы\r\nможете по ссылке: http://aleks-lesly.ru/ob/ord/leslyskidka\r\n'),
(281, 1644929419, 'newchange', NULL, 'Изменён счёт №334 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(282, 1644929419, 'newchange', NULL, 'Изменён счёт №334 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(283, 1646989900, 'login', '1', 'Выполнен вход в админ-панель с логином admin IP-адрес 194.99.105.75'),
(284, 1647351231, 'newchange', NULL, 'Изменён счёт №335 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(285, 1647351231, 'newchange', NULL, 'Изменён счёт №335 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(286, 1647351377, 'newchange', NULL, 'Изменён счёт №335 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(287, 1647351377, 'newchange', NULL, 'Изменён счёт №335 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(288, 1647351395, 'newchange', NULL, 'Изменён счёт №335 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(289, 1647351395, 'newchange', NULL, 'Изменён счёт №335 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(290, 1647351398, 'newchange', NULL, 'Изменён счёт №335 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(291, 1647351398, 'newchange', NULL, 'Изменён счёт №335 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(292, 1647351651, 'newchange', NULL, 'Изменён счёт №336 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(293, 1647351651, 'newchange', NULL, 'Изменён счёт №336 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(294, 1647351694, 'newchange', NULL, 'Изменён счёт №336 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(295, 1647351694, 'newchange', NULL, 'Изменён счёт №336 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(296, 1647351732, 'newchange', NULL, 'Изменён счёт №336 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(297, 1647351732, 'newchange', NULL, 'Изменён счёт №336 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(298, 1647352029, 'newchange', NULL, 'Изменён счёт №336 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(299, 1647352029, 'newchange', NULL, 'Изменён счёт №336 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(300, 1647375717, 'login', '1', 'Выполнен вход в админ-панель с логином admin IP-адрес 91.218.193.233'),
(301, 1647375729, 'newchange', '1', 'Изменён счёт №336 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(302, 1647375729, 'newchange', '1', 'Изменён счёт №336 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(303, 1647375729, 'newclient', '1', 'Добавлен новый клиент №127 для товара "alesly" \r\nИмя клиента: "Vage"\r\nE-mail: vage061@yandex.ru\r\nСчёт: '),
(304, 1647375729, 'sendgood', '1', 'Отправлен товар покупателю vage061@yandex.ru с именем "Vage"\r\nТема письма: "Распродажа Алекса Лесли, доступ"\r\nТекст письма: Здравствуйте.\r\n \r\nСпасибо за оплату распродажи Алекса Лесли!\r\n \r\nВаш доступ к распродаже: https://cloud.mail.ru/public/5fVo/y2vyBAyLy\r\n \r\nПо этой ссылке будут добавляться новые материалы,\r\nпоэтому, время от времени, заходите, проверяйте.\r\n \r\nВы можете как скачать тренинги, так и смотреть онлайн.\r\nВсе курсы будут доступны бессрочно.\r\n \r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dearclient.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n \r\np.s. Мои курсы, идеально дополняет, мой коллега Алекс Мэй.\r\nСпециалист высочайшего класса!\r\n \r\nРебята, специально для вас!, я договорился о 95% скидке на время\r\nмоей распродажи, на полностью ВСЕ тренинги Алекса Мэя.\r\nОчень рекомендую к изучению! Это все платные курсы Алекса,\r\nв которых, вы точно не найдете "воды". Проверил лично и не один раз! :-)\r\n \r\nСмотрите подробности по ссылке: https://aleks-mey.ru\r\n \r\nС уважением, Алекс Лесли.\r\n'),
(305, 1647375729, 'newchange', '1', 'Изменён счёт №336 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(306, 1647375729, 'newchange', '1', 'Изменён счёт №336 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(307, 1647585230, 'newchange', NULL, 'Изменён счёт №337 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(308, 1647585230, 'newchange', NULL, 'Изменён счёт №337 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(309, 1647585252, 'newchange', NULL, 'Изменён счёт №337 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(310, 1647585252, 'newchange', NULL, 'Изменён счёт №337 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(311, 1647585287, 'newchange', NULL, 'Изменён счёт №338 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(312, 1647585287, 'newchange', NULL, 'Изменён счёт №338 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(313, 1647585405, 'newchange', NULL, 'Изменён счёт №338 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(314, 1647585405, 'newchange', NULL, 'Изменён счёт №338 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(315, 1647585427, 'newchange', NULL, 'Изменён счёт №338 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(316, 1647585427, 'newchange', NULL, 'Изменён счёт №338 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(317, 1647587271, 'login', '1', 'Выполнен вход в админ-панель с логином admin IP-адрес 91.218.193.233'),
(318, 1647587282, 'newchange', '1', 'Изменён счёт №338 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(319, 1647587282, 'newchange', '1', 'Изменён счёт №338 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(320, 1647587282, 'newclient', '1', 'Добавлен новый клиент №128 для товара "books" \r\nИмя клиента: "Андрей "\r\nE-mail: 1085257@gmail.com\r\nСчёт: '),
(321, 1647587282, 'sendgood', '1', 'Отправлен товар покупателю 1085257@gmail.com с именем "Андрей "\r\nТема письма: "Ваша ссылка для скачивания книг"\r\nТекст письма: Здравствуйте.\r\n\r\nСпасибо за оплату!\r\n\r\nВаш доступ к книгам: https://cloud.mail.ru/public/BiGf/mjDk96UeW\r\n\r\nДоступ бессрочный.\r\n\r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dear-client.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n\r\np.s. Специальное предложение для новых клиентов!\r\nВы можете получить доступ ко ВСЕМ курсам\r\nАлекса Лесли, всего за 1 000 руб. по акционной цене!\r\n\r\nКак и любое хорошее предложение, наше также имеет\r\nсвой срок, 24 часа с момент получения данного письма.\r\n\r\nОплатить и получить доступ, по спец. предложению, Вы\r\nможете по ссылке: http://aleks-lesly.ru/ob/ord/leslyskidka\r\n'),
(322, 1647587282, 'newchange', '1', 'Изменён счёт №338 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(323, 1647587282, 'newchange', '1', 'Изменён счёт №338 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(324, 1647587292, 'newchange', '1', 'Изменён счёт №337 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(325, 1647587292, 'newchange', '1', 'Изменён счёт №337 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(326, 1647587292, 'sendgood', '1', 'Отправлен товар покупателю 1085257@gmail.com с именем "Андрей "\r\nТема письма: "Ваша ссылка для скачивания книг"\r\nТекст письма: Здравствуйте.\r\n\r\nСпасибо за оплату!\r\n\r\nВаш доступ к книгам: https://cloud.mail.ru/public/BiGf/mjDk96UeW\r\n\r\nДоступ бессрочный.\r\n\r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dear-client.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n\r\np.s. Специальное предложение для новых клиентов!\r\nВы можете получить доступ ко ВСЕМ курсам\r\nАлекса Лесли, всего за 1 000 руб. по акционной цене!\r\n\r\nКак и любое хорошее предложение, наше также имеет\r\nсвой срок, 24 часа с момент получения данного письма.\r\n\r\nОплатить и получить доступ, по спец. предложению, Вы\r\nможете по ссылке: http://aleks-lesly.ru/ob/ord/leslyskidka\r\n'),
(327, 1647587292, 'newchange', '1', 'Изменён счёт №337 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(328, 1647587292, 'newchange', '1', 'Изменён счёт №337 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(329, 1647661479, 'newchange', NULL, 'Изменён счёт №339 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(330, 1647661479, 'newchange', NULL, 'Изменён счёт №339 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(331, 1647661556, 'newchange', NULL, 'Изменён счёт №340 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(332, 1647661556, 'newchange', NULL, 'Изменён счёт №340 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(333, 1647717702, 'login', '1', 'Выполнен вход в админ-панель с логином admin IP-адрес 93.72.126.53'),
(334, 1647717714, 'newchange', '1', 'Изменён счёт №340 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(335, 1647717714, 'newchange', '1', 'Изменён счёт №340 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(336, 1647717714, 'newclient', '1', 'Добавлен новый клиент №129 для товара "leslyskidka" \r\nИмя клиента: "Андрей"\r\nE-mail: 1085257@gmail.com\r\nСчёт: '),
(337, 1647717714, 'sendgood', '1', 'Отправлен товар покупателю 1085257@gmail.com с именем "Андрей"\r\nТема письма: "Алекс Лесли, доступ ко всем курсам и книгам"\r\nТекст письма: Здравствуйте.\r\n \r\nСпасибо за оплату распродажи Алекса Лесли!\r\n \r\nВаш доступ к распродаже: https://cloud.mail.ru/public/5fVo/y2vyBAyLy\r\n \r\nПо этой ссылке будут добавляться новые материалы,\r\nпоэтому, время от времени, заходите, проверяйте.\r\n \r\nВы можете как скачать тренинги, так и смотреть онлайн.\r\nВсе курсы будут доступны бессрочно.\r\n \r\nПо любым вопросам - обращайтесь. Буду рад помочь!\r\n \r\np.s. Мои курсы, идеально дополняет, мой коллега Алекс Мэй.\r\nСпециалист высочайшего класса!\r\n \r\nРебята, специально для вас!, я договорился о 95% скидке на время\r\nмоей распродажи, на полностью ВСЕ тренинги Алекса Мэя.\r\nОчень рекомендую к изучению! Это все платные курсы Алекса,\r\nв которых, вы точно не найдете "воды". Проверил лично и не один раз! :-)\r\n \r\nСмотрите подробности по ссылке: https://aleks-mey.ru/\r\n \r\nС уважением, Алекс Лесли.\r\n'),
(338, 1647717714, 'newchange', '1', 'Изменён счёт №340 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(339, 1647717714, 'newchange', '1', 'Изменён счёт №340 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(340, 1647717722, 'newchange', '1', 'Изменён счёт №339 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(341, 1647717723, 'newchange', '1', 'Изменён счёт №339 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(342, 1647717723, 'sendgood', '1', 'Отправлен товар покупателю 1085257@gmail.com с именем "Андрей "\r\nТема письма: "Алекс Лесли, доступ ко всем курсам и книгам"\r\nТекст письма: Здравствуйте.\r\n \r\nСпасибо за оплату распродажи Алекса Лесли!\r\n \r\nВаш доступ к распродаже: https://cloud.mail.ru/public/5fVo/y2vyBAyLy\r\n \r\nПо этой ссылке будут добавляться новые материалы,\r\nпоэтому, время от времени, заходите, проверяйте.\r\n \r\nВы можете как скачать тренинги, так и смотреть онлайн.\r\nВсе курсы будут доступны бессрочно.\r\n \r\nПо любым вопросам - обращайтесь. Буду рад помочь!\r\n \r\np.s. Мои курсы, идеально дополняет, мой коллега Алекс Мэй.\r\nСпециалист высочайшего класса!\r\n \r\nРебята, специально для вас!, я договорился о 95% скидке на время\r\nмоей распродажи, на полностью ВСЕ тренинги Алекса Мэя.\r\nОчень рекомендую к изучению! Это все платные курсы Алекса,\r\nв которых, вы точно не найдете "воды". Проверил лично и не один раз! :-)\r\n \r\nСмотрите подробности по ссылке: https://aleks-mey.ru/\r\n \r\nС уважением, Алекс Лесли.\r\n'),
(343, 1647717723, 'newchange', '1', 'Изменён счёт №339 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(344, 1647717723, 'newchange', '1', 'Изменён счёт №339 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(345, 1649180750, 'newchange', NULL, 'Изменён счёт №341 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(346, 1649180750, 'newchange', NULL, 'Изменён счёт №341 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(347, 1649180932, 'newpay', NULL, 'Получено оповещение о зачислении счёта #341 на сумму 999 платёжная система rur кошелёк 10'),
(348, 1649180932, 'newchange', NULL, 'Изменён счёт №341 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(349, 1649180932, 'newchange', NULL, 'Изменён счёт №341 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(350, 1649180932, 'newclient', NULL, 'Добавлен новый клиент №130 для товара "masterskiy" \r\nИмя клиента: "Илья"\r\nE-mail: ilia969@mail.ru\r\nСчёт: '),
(351, 1649180933, 'sendgood', NULL, 'Отправлен товар покупателю ilia969@mail.ru с именем "Илья"\r\nТема письма: "Ваш доступ к оплаченному курсу, Алекса Лесли"\r\nТекст письма: Здравствуйте.\r\n\r\nСпасибо за оплату!\r\n\r\nВаш доступ к курсу: https://cloud.mail.ru/public/8u36/F8BBQ1YNq\r\n\r\nВы можете как смотреть курс онлайн, так и скачать к себе\r\nна компьютер. Доступ к курсу, не ограничен по времени.\r\n\r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dearclient.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n\r\np.s. Специальное предложение для новых клиентов!\r\nВы можете получить доступ ко ВСЕМ курсам и книгам\r\nАлекса Лесли, всего за 1 000 руб. по акционной цене!\r\n\r\nКак и любое хорошее предложение, наше также имеет\r\nсвой срок, 24 часа с момент получения данного письма.\r\n\r\nОплатить и получить доступ, по спец. предложению, Вы\r\nможете по ссылке: http://aleks-lesly.ru/ob/ord/leslyskidka\r\n'),
(352, 1649180933, 'newchange', NULL, 'Изменён счёт №341 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(353, 1649180933, 'newchange', NULL, 'Изменён счёт №341 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(354, 1649185387, 'newchange', NULL, 'Изменён счёт №342 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(355, 1649185387, 'newchange', NULL, 'Изменён счёт №342 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(356, 1649185746, 'newpay', NULL, 'Получено оповещение о зачислении счёта #342 на сумму 1000 платёжная система rur кошелёк 10'),
(357, 1649185746, 'newchange', NULL, 'Изменён счёт №342 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(358, 1649185746, 'newchange', NULL, 'Изменён счёт №342 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(359, 1649185746, 'newclient', NULL, 'Добавлен новый клиент №131 для товара "leslyskidka" \r\nИмя клиента: "Илья"\r\nE-mail: ilia969@mail.ru\r\nСчёт: '),
(360, 1649185746, 'sendgood', NULL, 'Отправлен товар покупателю ilia969@mail.ru с именем "Илья"\r\nТема письма: "Алекс Лесли, доступ ко всем курсам и книгам"\r\nТекст письма: Здравствуйте.\r\n \r\nСпасибо за оплату распродажи Алекса Лесли!\r\n \r\nВаш доступ к распродаже: https://cloud.mail.ru/public/5fVo/y2vyBAyLy\r\n \r\nПо этой ссылке будут добавляться новые материалы,\r\nпоэтому, время от времени, заходите, проверяйте.\r\n \r\nВы можете как скачать тренинги, так и смотреть онлайн.\r\nВсе курсы будут доступны бессрочно.\r\n \r\nПо любым вопросам - обращайтесь. Буду рад помочь!\r\n \r\np.s. Мои курсы, идеально дополняет, мой коллега Алекс Мэй.\r\nСпециалист высочайшего класса!\r\n \r\nРебята, специально для вас!, я договорился о 95% скидке на время\r\nмоей распродажи, на полностью ВСЕ тренинги Алекса Мэя.\r\nОчень рекомендую к изучению! Это все платные курсы Алекса,\r\nв которых, вы точно не найдете "воды". Проверил лично и не один раз! :-)\r\n \r\nСмотрите подробности по ссылке: https://aleks-mey.ru/\r\n \r\nС уважением, Алекс Лесли.\r\n'),
(361, 1649185746, 'newchange', NULL, 'Изменён счёт №342 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(362, 1649185746, 'newchange', NULL, 'Изменён счёт №342 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(363, 1649682100, 'newchange', NULL, 'Изменён счёт №343 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(364, 1649682100, 'newchange', NULL, 'Изменён счёт №343 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(365, 1649682373, 'newchange', NULL, 'Изменён счёт №344 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(366, 1649682373, 'newchange', NULL, 'Изменён счёт №344 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(367, 1649682398, 'newchange', NULL, 'Изменён счёт №344 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(368, 1649682399, 'newchange', NULL, 'Изменён счёт №344 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(369, 1649682481, 'newchange', NULL, 'Изменён счёт №344 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(370, 1649682481, 'newchange', NULL, 'Изменён счёт №344 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(371, 1650355745, 'login', '1', 'Выполнен вход в админ-панель с логином admin IP-адрес 5.8.16.164'),
(372, 1650362209, 'newchange', NULL, 'Изменён счёт №345 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(373, 1650362209, 'newchange', NULL, 'Изменён счёт №345 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(374, 1650362301, 'newpay', NULL, 'Получено оповещение о зачислении счёта #345 на сумму 999 платёжная система rur кошелёк 8'),
(375, 1650362301, 'newchange', NULL, 'Изменён счёт №345 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(376, 1650362302, 'newchange', NULL, 'Изменён счёт №345 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(377, 1650362302, 'newclient', NULL, 'Добавлен новый клиент №132 для товара "telesniy" \r\nИмя клиента: "Василий"\r\nE-mail: bezborodov.v.s@yandex.ru\r\nСчёт: '),
(378, 1650362302, 'sendgood', NULL, 'Отправлен товар покупателю bezborodov.v.s@yandex.ru с именем "Василий"\r\nТема письма: "Ваш доступ к оплаченному курсу, Алекса Лесли"\r\nТекст письма: Здравствуйте.\r\n\r\nСпасибо за оплату!\r\n\r\nВаш доступ к курсу: https://disk.yandex.ru/d/zPIa3PvQ2t6-aw\r\nПлюс Телесный тренинг: https://disk.yandex.ru/d/zPIa3PvQ2t6-aw\r\n\r\nЧтобы начать изучение курса, скачайте архив и\r\nразархивируйте в нужную вам папку.\r\n\r\nЕсли необходимо, инструкция, как разархивировать файл:\r\nhttps://www.youtube.com/watch?v=4_jpDmmc-bY\r\n\r\n Доступ к курсу, не ограничен по времени.\r\n\r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dearclient.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n\r\np.s. Специальное предложение для новых клиентов!\r\nВы можете получить доступ ко ВСЕМ курсам и книгам\r\nАлекса Лесли, всего за 1 000 руб. по акционной цене!\r\n\r\nКак и любое хорошее предложение, наше также имеет\r\nсвой срок, 24 часа с момент получения данного письма.\r\n\r\nОплатить и получить доступ, по спец. предложению, Вы\r\nможете по ссылке: http://aleks-lesly.ru/ob/ord/leslyskidka\r\n'),
(379, 1650362302, 'newchange', NULL, 'Изменён счёт №345 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(380, 1650362302, 'newchange', NULL, 'Изменён счёт №345 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(381, 1650362508, 'newchange', NULL, 'Изменён счёт №346 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(382, 1650362508, 'newchange', NULL, 'Изменён счёт №346 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(383, 1650362577, 'newpay', NULL, 'Получено оповещение о зачислении счёта #346 на сумму 999 платёжная система rur кошелёк 8'),
(384, 1650362577, 'newchange', NULL, 'Изменён счёт №346 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(385, 1650362577, 'newchange', NULL, 'Изменён счёт №346 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(386, 1650362578, 'newclient', NULL, 'Добавлен новый клиент №133 для товара "masterskiy" \r\nИмя клиента: "Василий"\r\nE-mail: bezborodov.v.s@yandex.ru\r\nСчёт: '),
(387, 1650362578, 'sendgood', NULL, 'Отправлен товар покупателю bezborodov.v.s@yandex.ru с именем "Василий"\r\nТема письма: "Ваш доступ к оплаченному курсу, Алекса Лесли"\r\nТекст письма: Здравствуйте.\r\n\r\nСпасибо за оплату!\r\n\r\nВаш доступ к курсу: https://cloud.mail.ru/public/8u36/F8BBQ1YNq\r\n\r\nВы можете как смотреть курс онлайн, так и скачать к себе\r\nна компьютер. Доступ к курсу, не ограничен по времени.\r\n\r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dearclient.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n\r\np.s. Специальное предложение для новых клиентов!\r\nВы можете получить доступ ко ВСЕМ курсам и книгам\r\nАлекса Лесли, всего за 1 000 руб. по акционной цене!\r\n\r\nКак и любое хорошее предложение, наше также имеет\r\nсвой срок, 24 часа с момент получения данного письма.\r\n\r\nОплатить и получить доступ, по спец. предложению, Вы\r\nможете по ссылке: http://aleks-lesly.ru/ob/ord/leslyskidka\r\n'),
(388, 1650362578, 'newchange', NULL, 'Изменён счёт №346 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(389, 1650362578, 'newchange', NULL, 'Изменён счёт №346 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(390, 1650790405, 'newchange', NULL, 'Изменён счёт №347 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(391, 1650790405, 'newchange', NULL, 'Изменён счёт №347 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(392, 1650790611, 'newchange', NULL, 'Изменён счёт №347 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(393, 1650790611, 'newchange', NULL, 'Изменён счёт №347 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(394, 1650790680, 'newchange', NULL, 'Изменён счёт №347 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(395, 1650790680, 'newchange', NULL, 'Изменён счёт №347 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(396, 1650790873, 'newchange', NULL, 'Изменён счёт №348 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(397, 1650790873, 'newchange', NULL, 'Изменён счёт №348 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(398, 1650790925, 'newchange', NULL, 'Изменён счёт №348 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(399, 1650790925, 'newchange', NULL, 'Изменён счёт №348 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(400, 1650791281, 'login', '1', 'Выполнен вход в админ-панель с логином admin IP-адрес 195.20.4.202'),
(401, 1650791554, 'newchange', '1', 'Изменён счёт №348 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(402, 1650791554, 'newchange', '1', 'Изменён счёт №348 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(403, 1650791558, 'newchange', '1', 'Изменён счёт №348 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(404, 1650791558, 'newchange', '1', 'Изменён счёт №348 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(405, 1650791558, 'newclient', '1', 'Добавлен новый клиент №134 для товара "alesly" \r\nИмя клиента: "Данила"\r\nE-mail: dimabamberg22@gmail.com\r\nСчёт: '),
(406, 1650791558, 'sendgood', '1', 'Отправлен товар покупателю dimabamberg22@gmail.com с именем "Данила"\r\nТема письма: "Распродажа Алекса Лесли, доступ"\r\nТекст письма: Здравствуйте.\r\n \r\nСпасибо за оплату распродажи Алекса Лесли!\r\n \r\nВаш доступ к распродаже: https://cloud.mail.ru/public/5fVo/y2vyBAyLy\r\n \r\nПо этой ссылке будут добавляться новые материалы,\r\nпоэтому, время от времени, заходите, проверяйте.\r\n \r\nВы можете как скачать тренинги, так и смотреть онлайн.\r\nВсе курсы будут доступны бессрочно.\r\n \r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dearclient.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n \r\np.s. Мои курсы, идеально дополняет, мой коллега Алекс Мэй.\r\nСпециалист высочайшего класса!\r\n \r\nРебята, специально для вас!, я договорился о 95% скидке на время\r\nмоей распродажи, на полностью ВСЕ тренинги Алекса Мэя.\r\nОчень рекомендую к изучению! Это все платные курсы Алекса,\r\nв которых, вы точно не найдете "воды". Проверил лично и не один раз! :-)\r\n \r\nСмотрите подробности по ссылке: https://aleks-mey.ru\r\n \r\nС уважением, Алекс Лесли.\r\n'),
(407, 1650791559, 'newchange', '1', 'Изменён счёт №348 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(408, 1650791559, 'newchange', '1', 'Изменён счёт №348 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(409, 1650791569, 'newchange', '1', 'Изменён счёт №348 - предыдущий статус "Оплачен и отправлен", текущий статус "Ожидание оплаты"'),
(410, 1650791569, 'newchange', '1', 'Изменён счёт №348 - предыдущий статус "Оплачен и отправлен", текущий статус "Ожидание оплаты"'),
(411, 1650791569, 'newchange', '1', 'Изменён счёт №348 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(412, 1650791569, 'newchange', '1', 'Изменён счёт №348 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(413, 1650791582, 'newchange', '1', 'Изменён счёт №348 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(414, 1650791582, 'newchange', '1', 'Изменён счёт №348 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(415, 1650791582, 'sendgood', '1', 'Отправлен товар покупателю dimabamberg22@gmail.com с именем "Данила"\r\nТема письма: "Распродажа Алекса Лесли, доступ"\r\nТекст письма: Здравствуйте.\r\n \r\nСпасибо за оплату распродажи Алекса Лесли!\r\n \r\nВаш доступ к распродаже: https://cloud.mail.ru/public/5fVo/y2vyBAyLy\r\n \r\nПо этой ссылке будут добавляться новые материалы,\r\nпоэтому, время от времени, заходите, проверяйте.\r\n \r\nВы можете как скачать тренинги, так и смотреть онлайн.\r\nВсе курсы будут доступны бессрочно.\r\n \r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dearclient.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n \r\np.s. Мои курсы, идеально дополняет, мой коллега Алекс Мэй.\r\nСпециалист высочайшего класса!\r\n \r\nРебята, специально для вас!, я договорился о 95% скидке на время\r\nмоей распродажи, на полностью ВСЕ тренинги Алекса Мэя.\r\nОчень рекомендую к изучению! Это все платные курсы Алекса,\r\nв которых, вы точно не найдете "воды". Проверил лично и не один раз! :-)\r\n \r\nСмотрите подробности по ссылке: https://aleks-mey.ru\r\n \r\nС уважением, Алекс Лесли.\r\n'),
(416, 1650791582, 'newchange', '1', 'Изменён счёт №348 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(417, 1650791583, 'newchange', '1', 'Изменён счёт №348 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(418, 1650791583, 'newchange', '1', 'Изменён счёт №348 - предыдущий статус "Оплачен и отправлен", текущий статус "Оплачен и отправлен"'),
(419, 1650791583, 'newchange', '1', 'Изменён счёт №348 - предыдущий статус "Оплачен и отправлен", текущий статус "Оплачен и отправлен"'),
(420, 1651173472, 'newchange', NULL, 'Изменён счёт №349 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(421, 1651173472, 'newchange', NULL, 'Изменён счёт №349 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(422, 1651586174, 'newchange', NULL, 'Изменён счёт №350 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(423, 1651586175, 'newchange', NULL, 'Изменён счёт №350 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(424, 1651586201, 'newchange', NULL, 'Изменён счёт №350 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(425, 1651586201, 'newchange', NULL, 'Изменён счёт №350 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(426, 1651586222, 'newchange', NULL, 'Изменён счёт №350 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(427, 1651586223, 'newchange', NULL, 'Изменён счёт №350 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(428, 1651586413, 'newchange', NULL, 'Изменён счёт №350 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(429, 1651586413, 'newchange', NULL, 'Изменён счёт №350 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(430, 1651586416, 'newchange', NULL, 'Изменён счёт №350 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(431, 1651586416, 'newchange', NULL, 'Изменён счёт №350 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(432, 1651586427, 'newchange', NULL, 'Изменён счёт №350 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(433, 1651586427, 'newchange', NULL, 'Изменён счёт №350 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(434, 1651670960, 'newchange', NULL, 'Изменён счёт №351 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(435, 1651670960, 'newchange', NULL, 'Изменён счёт №351 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(436, 1651670998, 'newchange', NULL, 'Изменён счёт №351 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(437, 1651670998, 'newchange', NULL, 'Изменён счёт №351 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(438, 1651671263, 'newchange', NULL, 'Изменён счёт №351 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(439, 1651671263, 'newchange', NULL, 'Изменён счёт №351 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(440, 1652303134, 'newchange', NULL, 'Изменён счёт №352 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(441, 1652303134, 'newchange', NULL, 'Изменён счёт №352 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(442, 1652305349, 'newchange', NULL, 'Изменён счёт №353 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(443, 1652305349, 'newchange', NULL, 'Изменён счёт №353 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(444, 1652305543, 'newpay', NULL, 'Получено оповещение о зачислении счёта #353 на сумму 999 платёжная система rur кошелёк 8'),
(445, 1652305543, 'newchange', NULL, 'Изменён счёт №353 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(446, 1652305543, 'newchange', NULL, 'Изменён счёт №353 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(447, 1652305543, 'newclient', NULL, 'Добавлен новый клиент №135 для товара "telesniy" \r\nИмя клиента: "Евгений Поздняков"\r\nE-mail: pozdnyakoff.ev@yandex.ru\r\nСчёт: '),
(448, 1652305543, 'sendgood', NULL, 'Отправлен товар покупателю pozdnyakoff.ev@yandex.ru с именем "Евгений Поздняков"\r\nТема письма: "Ваш доступ к оплаченному курсу, Алекса Лесли"\r\nТекст письма: Здравствуйте.\r\n\r\nСпасибо за оплату!\r\n\r\nВаш доступ к курсу: https://disk.yandex.ru/d/zPIa3PvQ2t6-aw\r\nПлюс Телесный тренинг: https://disk.yandex.ru/d/zPIa3PvQ2t6-aw\r\n\r\nЧтобы начать изучение курса, скачайте архив и\r\nразархивируйте в нужную вам папку.\r\n\r\nЕсли необходимо, инструкция, как разархивировать файл:\r\nhttps://www.youtube.com/watch?v=4_jpDmmc-bY\r\n\r\n Доступ к курсу, не ограничен по времени.\r\n\r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dearclient.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n\r\np.s. Специальное предложение для новых клиентов!\r\nВы можете получить доступ ко ВСЕМ курсам и книгам\r\nАлекса Лесли, всего за 1 000 руб. по акционной цене!\r\n\r\nКак и любое хорошее предложение, наше также имеет\r\nсвой срок, 24 часа с момент получения данного письма.\r\n\r\nОплатить и получить доступ, по спец. предложению, Вы\r\nможете по ссылке: http://aleks-lesly.ru/ob/ord/leslyskidka\r\n'),
(449, 1652305543, 'newchange', NULL, 'Изменён счёт №353 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(450, 1652305543, 'newchange', NULL, 'Изменён счёт №353 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(451, 1652536095, 'newchange', NULL, 'Изменён счёт №354 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(452, 1652536095, 'newchange', NULL, 'Изменён счёт №354 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(453, 1653998027, 'login', '1', 'Выполнен вход в админ-панель с логином admin IP-адрес 195.20.4.202'),
(454, 1654447743, 'newchange', NULL, 'Изменён счёт №356 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(455, 1654447743, 'newchange', NULL, 'Изменён счёт №356 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(456, 1654447901, 'newchange', NULL, 'Изменён счёт №356 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(457, 1654447901, 'newchange', NULL, 'Изменён счёт №356 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(458, 1654447911, 'newchange', NULL, 'Изменён счёт №356 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(459, 1654447912, 'newchange', NULL, 'Изменён счёт №356 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(460, 1654447924, 'newchange', NULL, 'Изменён счёт №356 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(461, 1654447924, 'newchange', NULL, 'Изменён счёт №356 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(462, 1654453643, 'newchange', NULL, 'Изменён счёт №357 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(463, 1654453643, 'newchange', NULL, 'Изменён счёт №357 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(464, 1654542130, 'newchange', NULL, 'Изменён счёт №358 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(465, 1654542130, 'newchange', NULL, 'Изменён счёт №358 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(466, 1654542140, 'newchange', NULL, 'Изменён счёт №358 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(467, 1654542140, 'newchange', NULL, 'Изменён счёт №358 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(468, 1654542154, 'newchange', NULL, 'Изменён счёт №358 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(469, 1654542154, 'newchange', NULL, 'Изменён счёт №358 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(470, 1654542471, 'newpay', NULL, 'Получено оповещение о зачислении счёта #358 на сумму 1000 платёжная система rur кошелёк 4'),
(471, 1654542471, 'newchange', NULL, 'Изменён счёт №358 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(472, 1654542471, 'newchange', NULL, 'Изменён счёт №358 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(473, 1654542471, 'newclient', NULL, 'Добавлен новый клиент №136 для товара "books" \r\nИмя клиента: "владимир"\r\nE-mail: asd-qw-zx@mail.ru\r\nСчёт: '),
(474, 1654542471, 'sendgood', NULL, 'Отправлен товар покупателю asd-qw-zx@mail.ru с именем "владимир"\r\nТема письма: "Ваша ссылка для скачивания книг"\r\nТекст письма: Здравствуйте.\r\n\r\nСпасибо за оплату!\r\n\r\nВаш доступ к книгам: https://cloud.mail.ru/public/BiGf/mjDk96UeW\r\n\r\nДоступ бессрочный.\r\n\r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dear-client.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n\r\np.s. Специальное предложение для новых клиентов!\r\nВы можете получить доступ ко ВСЕМ курсам\r\nАлекса Лесли, всего за 1 000 руб. по акционной цене!\r\n\r\nКак и любое хорошее предложение, наше также имеет\r\nсвой срок, 24 часа с момент получения данного письма.\r\n\r\nОплатить и получить доступ, по спец. предложению, Вы\r\nможете по ссылке: http://aleks-lesly.ru/ob/ord/leslyskidka\r\n'),
(475, 1654542471, 'newchange', NULL, 'Изменён счёт №358 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(476, 1654542471, 'newchange', NULL, 'Изменён счёт №358 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(477, 1654709317, 'newchange', NULL, 'Изменён счёт №359 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(478, 1654709317, 'newchange', NULL, 'Изменён счёт №359 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(479, 1654710888, 'newchange', NULL, 'Изменён счёт №360 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(480, 1654710888, 'newchange', NULL, 'Изменён счёт №360 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(481, 1654711347, 'newpay', NULL, 'Получено оповещение о зачислении счёта #360 на сумму 4480 платёжная система rur кошелёк 12'),
(482, 1654711347, 'newchange', NULL, 'Изменён счёт №360 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(483, 1654711347, 'newchange', NULL, 'Изменён счёт №360 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(484, 1654711347, 'newclient', NULL, 'Добавлен новый клиент №137 для товара "alesly" \r\nИмя клиента: "Дмитрий"\r\nE-mail: d_khomlov@mail.ru\r\nСчёт: '),
(485, 1654711347, 'sendgood', NULL, 'Отправлен товар покупателю d_khomlov@mail.ru с именем "Дмитрий"\r\nТема письма: "Распродажа Алекса Лесли, доступ"\r\nТекст письма: Здравствуйте.\r\n \r\nСпасибо за оплату распродажи Алекса Лесли!\r\n \r\nВаш доступ к распродаже: https://cloud.mail.ru/public/5fVo/y2vyBAyLy\r\n \r\nПо этой ссылке будут добавляться новые материалы,\r\nпоэтому, время от времени, заходите, проверяйте.\r\n \r\nВы можете как скачать тренинги, так и смотреть онлайн.\r\nВсе курсы будут доступны бессрочно.\r\n \r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dearclient.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n \r\np.s. Мои курсы, идеально дополняет, мой коллега Алекс Мэй.\r\nСпециалист высочайшего класса!\r\n \r\nРебята, специально для вас!, я договорился о 95% скидке на время\r\nмоей распродажи, на полностью ВСЕ тренинги Алекса Мэя.\r\nОчень рекомендую к изучению! Это все платные курсы Алекса,\r\nв которых, вы точно не найдете "воды". Проверил лично и не один раз! :-)\r\n \r\nСмотрите подробности по ссылке: https://aleks-mey.ru\r\n \r\nС уважением, Алекс Лесли.\r\n'),
(486, 1654711347, 'newclient', NULL, 'Добавлен новый клиент №138 для товара "update" \r\nИмя клиента: "Дмитрий"\r\nE-mail: d_khomlov@mail.ru\r\nСчёт: '),
(487, 1654711347, 'sendgood', NULL, 'Отправлен товар покупателю d_khomlov@mail.ru с именем "Дмитрий"\r\nТема письма: ""\r\nТекст письма: \r\n'),
(488, 1654711347, 'newchange', NULL, 'Изменён счёт №360 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(489, 1654711348, 'newchange', NULL, 'Изменён счёт №360 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(490, 1655971264, 'login', '1', 'Выполнен вход в админ-панель с логином admin IP-адрес 5.8.16.235'),
(491, 1657182949, 'newchange', NULL, 'Изменён счёт №361 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(492, 1657182949, 'newchange', NULL, 'Изменён счёт №361 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(493, 1657183062, 'newpay', NULL, 'Получено оповещение о зачислении счёта #361 на сумму 999 платёжная система rur кошелёк 4'),
(494, 1657183062, 'newchange', NULL, 'Изменён счёт №361 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(495, 1657183062, 'newchange', NULL, 'Изменён счёт №361 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(496, 1657183062, 'newclient', NULL, 'Добавлен новый клиент №139 для товара "telesniy" \r\nИмя клиента: "Евгений"\r\nE-mail: uk.management2017@gmail.com\r\nСчёт: '),
(497, 1657183063, 'sendgood', NULL, 'Отправлен товар покупателю uk.management2017@gmail.com с именем "Евгений"\r\nТема письма: "Ваш доступ к оплаченному курсу, Алекса Лесли"\r\nТекст письма: Здравствуйте.\r\n\r\nСпасибо за оплату!\r\n\r\nВаш доступ к курсу: https://disk.yandex.ru/d/zPIa3PvQ2t6-aw\r\nПлюс Телесный тренинг: https://disk.yandex.ru/d/zPIa3PvQ2t6-aw\r\n\r\nЧтобы начать изучение курса, скачайте архив и\r\nразархивируйте в нужную вам папку.\r\n\r\nЕсли необходимо, инструкция, как разархивировать файл:\r\nhttps://www.youtube.com/watch?v=4_jpDmmc-bY\r\n\r\n Доступ к курсу, не ограничен по времени.\r\n\r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dearclient.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n\r\np.s. Специальное предложение для новых клиентов!\r\nВы можете получить доступ ко ВСЕМ курсам и книгам\r\nАлекса Лесли, всего за 1 000 руб. по акционной цене!\r\n\r\nКак и любое хорошее предложение, наше также имеет\r\nсвой срок, 24 часа с момент получения данного письма.\r\n\r\nОплатить и получить доступ, по спец. предложению, Вы\r\nможете по ссылке: http://aleks-lesly.ru/ob/ord/leslyskidka\r\n'),
(498, 1657183063, 'newchange', NULL, 'Изменён счёт №361 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(499, 1657183063, 'newchange', NULL, 'Изменён счёт №361 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(500, 1657778089, 'newchange', NULL, 'Изменён счёт №362 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(501, 1657778089, 'newchange', NULL, 'Изменён счёт №362 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(502, 1657778140, 'newchange', NULL, 'Изменён счёт №362 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(503, 1657778140, 'newchange', NULL, 'Изменён счёт №362 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(504, 1657778156, 'newchange', NULL, 'Изменён счёт №362 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(505, 1657778156, 'newchange', NULL, 'Изменён счёт №362 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(506, 1657778170, 'newchange', NULL, 'Изменён счёт №362 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(507, 1657778170, 'newchange', NULL, 'Изменён счёт №362 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(508, 1657778317, 'newchange', NULL, 'Изменён счёт №363 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(509, 1657778317, 'newchange', NULL, 'Изменён счёт №363 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(510, 1657778328, 'newchange', NULL, 'Изменён счёт №363 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(511, 1657778328, 'newchange', NULL, 'Изменён счёт №363 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(512, 1657778499, 'newpay', NULL, 'Получено оповещение о зачислении счёта #362 на сумму 999 платёжная система rur кошелёк 4'),
(513, 1657778499, 'newchange', NULL, 'Изменён счёт №362 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(514, 1657778499, 'newchange', NULL, 'Изменён счёт №362 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(515, 1657778499, 'newclient', NULL, 'Добавлен новый клиент №140 для товара "telesniy" \r\nИмя клиента: "Вячеслав"\r\nE-mail: 1280708@mail.ru\r\nСчёт: '),
(516, 1657778500, 'sendgood', NULL, 'Отправлен товар покупателю 1280708@mail.ru с именем "Вячеслав"\r\nТема письма: "Ваш доступ к оплаченному курсу, Алекса Лесли"\r\nТекст письма: Здравствуйте.\r\n\r\nСпасибо за оплату!\r\n\r\nВаш доступ к курсу: https://disk.yandex.ru/d/zPIa3PvQ2t6-aw\r\nПлюс Телесный тренинг: https://disk.yandex.ru/d/zPIa3PvQ2t6-aw\r\n\r\nЧтобы начать изучение курса, скачайте архив и\r\nразархивируйте в нужную вам папку.\r\n\r\nЕсли необходимо, инструкция, как разархивировать файл:\r\nhttps://www.youtube.com/watch?v=4_jpDmmc-bY\r\n\r\n Доступ к курсу, не ограничен по времени.\r\n\r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dearclient.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n\r\np.s. Специальное предложение для новых клиентов!\r\nВы можете получить доступ ко ВСЕМ курсам и книгам\r\nАлекса Лесли, всего за 1 000 руб. по акционной цене!\r\n\r\nКак и любое хорошее предложение, наше также имеет\r\nсвой срок, 24 часа с момент получения данного письма.\r\n\r\nОплатить и получить доступ, по спец. предложению, Вы\r\nможете по ссылке: http://aleks-lesly.ru/ob/ord/leslyskidka\r\n'),
(517, 1657778500, 'newchange', NULL, 'Изменён счёт №362 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(518, 1657778500, 'newchange', NULL, 'Изменён счёт №362 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(519, 1658133719, 'newchange', NULL, 'Изменён счёт №364 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(520, 1658133719, 'newchange', NULL, 'Изменён счёт №364 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(521, 1658133879, 'newchange', NULL, 'Изменён счёт №364 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(522, 1658133879, 'newchange', NULL, 'Изменён счёт №364 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(523, 1658133930, 'newchange', NULL, 'Изменён счёт №364 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(524, 1658133930, 'newchange', NULL, 'Изменён счёт №364 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(525, 1658134000, 'newchange', NULL, 'Изменён счёт №365 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(526, 1658134000, 'newchange', NULL, 'Изменён счёт №365 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(527, 1658134187, 'newpay', NULL, 'Получено оповещение о зачислении счёта #365 на сумму 1000 платёжная система rur кошелёк 12'),
(528, 1658134188, 'newchange', NULL, 'Изменён счёт №365 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(529, 1658134188, 'newchange', NULL, 'Изменён счёт №365 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"');
INSERT INTO `ob_log` (`id`, `date`, `action`, `user`, `comment`) VALUES
(530, 1658134188, 'newclient', NULL, 'Добавлен новый клиент №141 для товара "books" \r\nИмя клиента: "Ольга "\r\nE-mail: olga7771305@yandex.ru\r\nСчёт: '),
(531, 1658134188, 'sendgood', NULL, 'Отправлен товар покупателю olga7771305@yandex.ru с именем "Ольга "\r\nТема письма: "Ваша ссылка для скачивания книг"\r\nТекст письма: Здравствуйте.\r\n\r\nСпасибо за оплату!\r\n\r\nВаш доступ к книгам: https://cloud.mail.ru/public/BiGf/mjDk96UeW\r\n\r\nДоступ бессрочный.\r\n\r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dear-client.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n\r\np.s. Специальное предложение для новых клиентов!\r\nВы можете получить доступ ко ВСЕМ курсам\r\nАлекса Лесли, всего за 1 000 руб. по акционной цене!\r\n\r\nКак и любое хорошее предложение, наше также имеет\r\nсвой срок, 24 часа с момент получения данного письма.\r\n\r\nОплатить и получить доступ, по спец. предложению, Вы\r\nможете по ссылке: http://aleks-lesly.ru/ob/ord/leslyskidka\r\n'),
(532, 1658134188, 'newchange', NULL, 'Изменён счёт №365 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(533, 1658134188, 'newchange', NULL, 'Изменён счёт №365 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(534, 1658139029, 'newchange', NULL, 'Изменён счёт №366 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(535, 1658139029, 'newchange', NULL, 'Изменён счёт №366 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(536, 1658139088, 'newchange', NULL, 'Изменён счёт №366 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(537, 1658139088, 'newchange', NULL, 'Изменён счёт №366 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(538, 1658139239, 'newpay', NULL, 'Получено оповещение о зачислении счёта #366 на сумму 1000 платёжная система rur кошелёк 4'),
(539, 1658139239, 'newchange', NULL, 'Изменён счёт №366 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(540, 1658139239, 'newchange', NULL, 'Изменён счёт №366 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(541, 1658139239, 'newclient', NULL, 'Добавлен новый клиент №142 для товара "books" \r\nИмя клиента: "Елена"\r\nE-mail: lena0123456789@mail.ru\r\nСчёт: '),
(542, 1658139239, 'sendgood', NULL, 'Отправлен товар покупателю lena0123456789@mail.ru с именем "Елена"\r\nТема письма: "Ваша ссылка для скачивания книг"\r\nТекст письма: Здравствуйте.\r\n\r\nСпасибо за оплату!\r\n\r\nВаш доступ к книгам: https://cloud.mail.ru/public/BiGf/mjDk96UeW\r\n\r\nДоступ бессрочный.\r\n\r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dear-client.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n\r\np.s. Специальное предложение для новых клиентов!\r\nВы можете получить доступ ко ВСЕМ курсам\r\nАлекса Лесли, всего за 1 000 руб. по акционной цене!\r\n\r\nКак и любое хорошее предложение, наше также имеет\r\nсвой срок, 24 часа с момент получения данного письма.\r\n\r\nОплатить и получить доступ, по спец. предложению, Вы\r\nможете по ссылке: http://aleks-lesly.ru/ob/ord/leslyskidka\r\n'),
(543, 1658139239, 'newchange', NULL, 'Изменён счёт №366 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(544, 1658139239, 'newchange', NULL, 'Изменён счёт №366 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(545, 1658396830, 'newchange', NULL, 'Изменён счёт №367 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(546, 1658396830, 'newchange', NULL, 'Изменён счёт №367 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(547, 1659211763, 'newchange', NULL, 'Изменён счёт №368 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(548, 1659211763, 'newchange', NULL, 'Изменён счёт №368 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(549, 1659212040, 'newchange', NULL, 'Изменён счёт №368 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(550, 1659212040, 'newchange', NULL, 'Изменён счёт №368 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(551, 1659212578, 'newpay', NULL, 'Получено оповещение о зачислении счёта #368 на сумму 2990 платёжная система rur кошелёк 10'),
(552, 1659212578, 'newchange', NULL, 'Изменён счёт №368 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(553, 1659212578, 'newchange', NULL, 'Изменён счёт №368 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(554, 1659212578, 'newclient', NULL, 'Добавлен новый клиент №143 для товара "alesly" \r\nИмя клиента: "Евгений"\r\nE-mail: karakymba23@gmail.com\r\nСчёт: '),
(555, 1659212578, 'sendgood', NULL, 'Отправлен товар покупателю karakymba23@gmail.com с именем "Евгений"\r\nТема письма: "Распродажа Алекса Лесли, доступ"\r\nТекст письма: Здравствуйте.\r\n \r\nСпасибо за оплату распродажи Алекса Лесли!\r\n \r\nВаш доступ к распродаже: https://cloud.mail.ru/public/5fVo/y2vyBAyLy\r\n \r\nПо этой ссылке будут добавляться новые материалы,\r\nпоэтому, время от времени, заходите, проверяйте.\r\n \r\nВы можете как скачать тренинги, так и смотреть онлайн.\r\nВсе курсы будут доступны бессрочно.\r\n \r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dearclient.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n \r\np.s. Мои курсы, идеально дополняет, мой коллега Алекс Мэй.\r\nСпециалист высочайшего класса!\r\n \r\nРебята, специально для вас!, я договорился о 95% скидке на время\r\nмоей распродажи, на полностью ВСЕ тренинги Алекса Мэя.\r\nОчень рекомендую к изучению! Это все платные курсы Алекса,\r\nв которых, вы точно не найдете "воды". Проверил лично и не один раз! :-)\r\n \r\nСмотрите подробности по ссылке: https://aleks-mey.ru\r\n \r\nС уважением, Алекс Лесли.\r\n'),
(556, 1659212578, 'newchange', NULL, 'Изменён счёт №368 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(557, 1659212578, 'newchange', NULL, 'Изменён счёт №368 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(558, 1660486006, 'newchange', NULL, 'Изменён счёт №369 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(559, 1660486006, 'newchange', NULL, 'Изменён счёт №369 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(560, 1661219022, 'newchange', NULL, 'Изменён счёт №370 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(561, 1661219022, 'newchange', NULL, 'Изменён счёт №370 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(562, 1661219142, 'newchange', NULL, 'Изменён счёт №370 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(563, 1661219142, 'newchange', NULL, 'Изменён счёт №370 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(564, 1661373959, 'newchange', NULL, 'Изменён счёт №372 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(565, 1661373959, 'newchange', NULL, 'Изменён счёт №372 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(566, 1661375105, 'newchange', NULL, 'Изменён счёт №373 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(567, 1661375105, 'newchange', NULL, 'Изменён счёт №373 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(568, 1661426633, 'newchange', NULL, 'Изменён счёт №374 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(569, 1661426633, 'newchange', NULL, 'Изменён счёт №374 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(570, 1661430144, 'newpay', NULL, 'Получено оповещение о зачислении счёта #374 на сумму 999 платёжная система rur кошелёк 42'),
(571, 1661430144, 'newchange', NULL, 'Изменён счёт №374 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(572, 1661430144, 'newchange', NULL, 'Изменён счёт №374 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(573, 1661430144, 'newclient', NULL, 'Добавлен новый клиент №144 для товара "telesniy" \r\nИмя клиента: "М"\r\nE-mail: saragro2015@mail.ru\r\nСчёт: '),
(574, 1661430144, 'sendgood', NULL, 'Отправлен товар покупателю saragro2015@mail.ru с именем "М"\r\nТема письма: "Ваш доступ к оплаченному курсу, Алекса Лесли"\r\nТекст письма: Здравствуйте.\r\n\r\nСпасибо за оплату!\r\n\r\nВаш доступ к курсу: https://disk.yandex.ru/d/zPIa3PvQ2t6-aw\r\nПлюс Телесный тренинг: https://disk.yandex.ru/d/zPIa3PvQ2t6-aw\r\n\r\nЧтобы начать изучение курса, скачайте архив и\r\nразархивируйте в нужную вам папку.\r\n\r\nЕсли необходимо, инструкция, как разархивировать файл:\r\nhttps://www.youtube.com/watch?v=4_jpDmmc-bY\r\n\r\n Доступ к курсу, не ограничен по времени.\r\n\r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dearclient.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n\r\np.s. Специальное предложение для новых клиентов!\r\nВы можете получить доступ ко ВСЕМ курсам и книгам\r\nАлекса Лесли, всего за 1 000 руб. по акционной цене!\r\n\r\nКак и любое хорошее предложение, наше также имеет\r\nсвой срок, 24 часа с момент получения данного письма.\r\n\r\nОплатить и получить доступ, по спец. предложению, Вы\r\nможете по ссылке: http://aleks-lesly.ru/ob/ord/leslyskidka\r\n'),
(575, 1661430144, 'newchange', NULL, 'Изменён счёт №374 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(576, 1661430144, 'newchange', NULL, 'Изменён счёт №374 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(577, 1662900821, 'newchange', NULL, 'Изменён счёт №375 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(578, 1662900821, 'newchange', NULL, 'Изменён счёт №375 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(579, 1662901822, 'newchange', NULL, 'Изменён счёт №375 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(580, 1662901822, 'newchange', NULL, 'Изменён счёт №375 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(581, 1662913553, 'newchange', NULL, 'Изменён счёт №376 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(582, 1662913553, 'newchange', NULL, 'Изменён счёт №376 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(583, 1671918269, 'newchange', NULL, 'Изменён счёт №378 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(584, 1671918269, 'newchange', NULL, 'Изменён счёт №378 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(585, 1671918279, 'newchange', NULL, 'Изменён счёт №378 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(586, 1671918279, 'newchange', NULL, 'Изменён счёт №378 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(587, 1671918306, 'newchange', NULL, 'Изменён счёт №378 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(588, 1671918306, 'newchange', NULL, 'Изменён счёт №378 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(589, 1674741603, 'newchange', NULL, 'Изменён счёт №293 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(590, 1674741605, 'newchange', NULL, 'Изменён счёт №294 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(591, 1674741605, 'newchange', NULL, 'Изменён счёт №295 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(592, 1674741605, 'newchange', NULL, 'Изменён счёт №296 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(593, 1674741606, 'newchange', NULL, 'Изменён счёт №290 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(594, 1674741606, 'newchange', NULL, 'Изменён счёт №293 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(595, 1674741606, 'newchange', NULL, 'Изменён счёт №294 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(596, 1674741607, 'newchange', NULL, 'Изменён счёт №295 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(597, 1674744904, 'newchange', NULL, 'Изменён счёт №297 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(598, 1674744905, 'newchange', NULL, 'Изменён счёт №299 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(599, 1674744906, 'newchange', NULL, 'Изменён счёт №301 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(600, 1674744907, 'newchange', NULL, 'Изменён счёт №302 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(601, 1674744907, 'newchange', NULL, 'Изменён счёт №296 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(602, 1674744908, 'newchange', NULL, 'Изменён счёт №297 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(603, 1674744909, 'newchange', NULL, 'Изменён счёт №299 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(604, 1674744909, 'newchange', NULL, 'Изменён счёт №301 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(605, 1674748504, 'newchange', NULL, 'Изменён счёт №303 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(606, 1674748505, 'newchange', NULL, 'Изменён счёт №304 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(607, 1674748505, 'newchange', NULL, 'Изменён счёт №305 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(608, 1674748506, 'newchange', NULL, 'Изменён счёт №306 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(609, 1674748506, 'newchange', NULL, 'Изменён счёт №302 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(610, 1674748507, 'newchange', NULL, 'Изменён счёт №303 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(611, 1674748507, 'newchange', NULL, 'Изменён счёт №304 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(612, 1674748508, 'newchange', NULL, 'Изменён счёт №305 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(613, 1674752103, 'newchange', NULL, 'Изменён счёт №311 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(614, 1674752104, 'newchange', NULL, 'Изменён счёт №312 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(615, 1674752105, 'newchange', NULL, 'Изменён счёт №313 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(616, 1674752105, 'newchange', NULL, 'Изменён счёт №314 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(617, 1674752106, 'newchange', NULL, 'Изменён счёт №306 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(618, 1674752106, 'newchange', NULL, 'Изменён счёт №311 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(619, 1674752107, 'newchange', NULL, 'Изменён счёт №312 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(620, 1674752107, 'newchange', NULL, 'Изменён счёт №313 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(621, 1674755703, 'newchange', NULL, 'Изменён счёт №315 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(622, 1674755704, 'newchange', NULL, 'Изменён счёт №316 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(623, 1674755705, 'newchange', NULL, 'Изменён счёт №317 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(624, 1674755705, 'newchange', NULL, 'Изменён счёт №318 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(625, 1674755706, 'newchange', NULL, 'Изменён счёт №314 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(626, 1674755707, 'newchange', NULL, 'Изменён счёт №315 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(627, 1674755707, 'newchange', NULL, 'Изменён счёт №316 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(628, 1674755708, 'newchange', NULL, 'Изменён счёт №317 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(629, 1674759304, 'newchange', NULL, 'Изменён счёт №319 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(630, 1674759305, 'newchange', NULL, 'Изменён счёт №320 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(631, 1674759305, 'newchange', NULL, 'Изменён счёт №321 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(632, 1674759305, 'newchange', NULL, 'Изменён счёт №322 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(633, 1674759306, 'newchange', NULL, 'Изменён счёт №318 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(634, 1674759306, 'newchange', NULL, 'Изменён счёт №319 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(635, 1674759306, 'newchange', NULL, 'Изменён счёт №320 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(636, 1674759307, 'newchange', NULL, 'Изменён счёт №321 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(637, 1674762903, 'newchange', NULL, 'Изменён счёт №329 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(638, 1674762905, 'newchange', NULL, 'Изменён счёт №330 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(639, 1674762905, 'newchange', NULL, 'Изменён счёт №331 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(640, 1674762906, 'newchange', NULL, 'Изменён счёт №332 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(641, 1674762906, 'newchange', NULL, 'Изменён счёт №322 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(642, 1674762906, 'newchange', NULL, 'Изменён счёт №329 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(643, 1674762907, 'newchange', NULL, 'Изменён счёт №330 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(644, 1674762907, 'newchange', NULL, 'Изменён счёт №331 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(645, 1674766503, 'newchange', NULL, 'Изменён счёт №333 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(646, 1674766504, 'newchange', NULL, 'Изменён счёт №335 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(647, 1674766505, 'newchange', NULL, 'Изменён счёт №343 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(648, 1674766505, 'newchange', NULL, 'Изменён счёт №344 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(649, 1674766505, 'newchange', NULL, 'Изменён счёт №332 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(650, 1674766505, 'newchange', NULL, 'Изменён счёт №333 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(651, 1674766505, 'newchange', NULL, 'Изменён счёт №335 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(652, 1674766506, 'newchange', NULL, 'Изменён счёт №343 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(653, 1674770103, 'newchange', NULL, 'Изменён счёт №347 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(654, 1674770104, 'newchange', NULL, 'Изменён счёт №349 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(655, 1674770105, 'newchange', NULL, 'Изменён счёт №350 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(656, 1674770105, 'newchange', NULL, 'Изменён счёт №351 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(657, 1674770105, 'newchange', NULL, 'Изменён счёт №344 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(658, 1674770106, 'newchange', NULL, 'Изменён счёт №347 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(659, 1674770106, 'newchange', NULL, 'Изменён счёт №349 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(660, 1674770106, 'newchange', NULL, 'Изменён счёт №350 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(661, 1674773704, 'newchange', NULL, 'Изменён счёт №352 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(662, 1674773705, 'newchange', NULL, 'Изменён счёт №354 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(663, 1674773705, 'newchange', NULL, 'Изменён счёт №355 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(664, 1674773706, 'newchange', NULL, 'Изменён счёт №356 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(665, 1674773706, 'newchange', NULL, 'Изменён счёт №351 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(666, 1674773706, 'newchange', NULL, 'Изменён счёт №352 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(667, 1674773707, 'newchange', NULL, 'Изменён счёт №354 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(668, 1674773707, 'newchange', NULL, 'Изменён счёт №355 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(669, 1674777304, 'newchange', NULL, 'Изменён счёт №357 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(670, 1674777305, 'newchange', NULL, 'Изменён счёт №359 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(671, 1674777305, 'newchange', NULL, 'Изменён счёт №363 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(672, 1674777306, 'newchange', NULL, 'Изменён счёт №364 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(673, 1674777306, 'newchange', NULL, 'Изменён счёт №356 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(674, 1674777307, 'newchange', NULL, 'Изменён счёт №357 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(675, 1674777307, 'newchange', NULL, 'Изменён счёт №359 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(676, 1674777307, 'newchange', NULL, 'Изменён счёт №363 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(677, 1674780904, 'newchange', NULL, 'Изменён счёт №367 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(678, 1674780905, 'newchange', NULL, 'Изменён счёт №369 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(679, 1674780905, 'newchange', NULL, 'Изменён счёт №370 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(680, 1674780906, 'newchange', NULL, 'Изменён счёт №371 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(681, 1674780906, 'newchange', NULL, 'Изменён счёт №364 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(682, 1674780907, 'newchange', NULL, 'Изменён счёт №367 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(683, 1674780907, 'newchange', NULL, 'Изменён счёт №369 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(684, 1674780907, 'newchange', NULL, 'Изменён счёт №370 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(685, 1674784503, 'newchange', NULL, 'Изменён счёт №372 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(686, 1674784504, 'newchange', NULL, 'Изменён счёт №373 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(687, 1674784505, 'newchange', NULL, 'Изменён счёт №375 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(688, 1674784505, 'newchange', NULL, 'Изменён счёт №376 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(689, 1674784506, 'newchange', NULL, 'Изменён счёт №371 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(690, 1674784506, 'newchange', NULL, 'Изменён счёт №372 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(691, 1674784506, 'newchange', NULL, 'Изменён счёт №373 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(692, 1674784507, 'newchange', NULL, 'Изменён счёт №375 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(693, 1674788104, 'newchange', NULL, 'Изменён счёт №377 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(694, 1674788105, 'newchange', NULL, 'Изменён счёт №378 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(695, 1674788106, 'newchange', NULL, 'Изменён счёт №376 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(696, 1674788106, 'newchange', NULL, 'Изменён счёт №377 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(697, 1674788106, 'newchange', NULL, 'Изменён счёт №378 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(698, 1675468651, 'newchange', NULL, 'Изменён счёт №352 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(699, 1675468651, 'newchange', NULL, 'Изменён счёт №352 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(700, 1679351003, 'newchange', NULL, 'Изменён счёт №379 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(701, 1679351003, 'newchange', NULL, 'Изменён счёт №379 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(702, 1679351012, 'newchange', NULL, 'Изменён счёт №379 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(703, 1679351012, 'newchange', NULL, 'Изменён счёт №379 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(704, 1679351013, 'newchange', NULL, 'Изменён счёт №379 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(705, 1679351013, 'newchange', NULL, 'Изменён счёт №379 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(706, 1679612103, 'newchange', NULL, 'Изменён счёт №379 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(707, 1679727303, 'newchange', NULL, 'Изменён счёт №380 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(708, 1680044104, 'newchange', NULL, 'Изменён счёт №379 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(709, 1680159304, 'newchange', NULL, 'Изменён счёт №380 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(710, 1680850801, 'newchange', NULL, 'Изменён счёт №381 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(711, 1680850801, 'newchange', NULL, 'Изменён счёт №381 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(712, 1680850976, 'newchange', NULL, 'Изменён счёт №382 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(713, 1680850976, 'newchange', NULL, 'Изменён счёт №382 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(714, 1681033999, 'newchange', NULL, 'Изменён счёт №383 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(715, 1681033999, 'newchange', NULL, 'Изменён счёт №383 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(716, 1681034263, 'newchange', NULL, 'Изменён счёт №384 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(717, 1681034263, 'newchange', NULL, 'Изменён счёт №384 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(718, 1681113303, 'newchange', NULL, 'Изменён счёт №381 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(719, 1681113304, 'newchange', NULL, 'Изменён счёт №382 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(720, 1681293303, 'newchange', NULL, 'Изменён счёт №383 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(721, 1681296904, 'newchange', NULL, 'Изменён счёт №384 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(722, 1681366908, 'newchange', NULL, 'Изменён счёт №385 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(723, 1681366908, 'newchange', NULL, 'Изменён счёт №385 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(724, 1681545303, 'newchange', NULL, 'Изменён счёт №381 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(725, 1681545304, 'newchange', NULL, 'Изменён счёт №382 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(726, 1681628103, 'newchange', NULL, 'Изменён счёт №385 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(727, 1681725304, 'newchange', NULL, 'Изменён счёт №383 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(728, 1681728904, 'newchange', NULL, 'Изменён счёт №384 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(729, 1682060104, 'newchange', NULL, 'Изменён счёт №385 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(730, 1685433414, 'newchange', NULL, 'Изменён счёт №386 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(731, 1685433414, 'newchange', NULL, 'Изменён счёт №386 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(732, 1685696104, 'newchange', NULL, 'Изменён счёт №386 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(733, 1686128103, 'newchange', NULL, 'Изменён счёт №386 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(734, 1686431240, 'newchange', NULL, 'Изменён счёт №387 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(735, 1686431240, 'newchange', NULL, 'Изменён счёт №387 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(736, 1686431260, 'newchange', NULL, 'Изменён счёт №387 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(737, 1686431260, 'newchange', NULL, 'Изменён счёт №387 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(738, 1686431320, 'newchange', NULL, 'Изменён счёт №387 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(739, 1686431320, 'newchange', NULL, 'Изменён счёт №387 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(740, 1686431330, 'newchange', NULL, 'Изменён счёт №387 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(741, 1686431330, 'newchange', NULL, 'Изменён счёт №387 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(742, 1686693303, 'newchange', NULL, 'Изменён счёт №387 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(743, 1687125303, 'newchange', NULL, 'Изменён счёт №387 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(744, 1687178295, 'newchange', NULL, 'Изменён счёт №387 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(745, 1687178295, 'newchange', NULL, 'Изменён счёт №387 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(746, 1687178355, 'newchange', NULL, 'Изменён счёт №387 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(747, 1687178355, 'newchange', NULL, 'Изменён счёт №387 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(748, 1687264264, 'newchange', NULL, 'Изменён счёт №387 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(749, 1687264264, 'newchange', NULL, 'Изменён счёт №387 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(750, 1687264481, 'newchange', NULL, 'Изменён счёт №387 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(751, 1687264481, 'newchange', NULL, 'Изменён счёт №387 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(752, 1687264511, 'newchange', NULL, 'Изменён счёт №387 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(753, 1687264511, 'newchange', NULL, 'Изменён счёт №387 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(754, 1687265383, 'newchange', NULL, 'Изменён счёт №387 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(755, 1687265383, 'newchange', NULL, 'Изменён счёт №387 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(756, 1691990136, 'newchange', NULL, 'Изменён счёт №388 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(757, 1691990136, 'newchange', NULL, 'Изменён счёт №388 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(758, 1691990155, 'newchange', NULL, 'Изменён счёт №388 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(759, 1691990155, 'newchange', NULL, 'Изменён счёт №388 - предыдущий статус "Ожидание оплаты", текущий статус "Ожидание оплаты"'),
(760, 1691990429, 'newpay', NULL, 'Получено оповещение о зачислении счёта #388 на сумму 2990 платёжная система rur кошелёк 12'),
(761, 1691990429, 'newchange', NULL, 'Изменён счёт №388 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(762, 1691990429, 'newchange', NULL, 'Изменён счёт №388 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(763, 1691990429, 'newclient', NULL, 'Добавлен новый клиент №145 для товара "alesly" \r\nИмя клиента: "Игорь "\r\nE-mail: i.o.shmelev@yandex.ru\r\nСчёт: '),
(764, 1691990429, 'sendgood', NULL, 'Отправлен товар покупателю i.o.shmelev@yandex.ru с именем "Игорь "\r\nТема письма: "Распродажа Алекса Лесли, доступ"\r\nТекст письма: Здравствуйте.\r\n \r\nСпасибо за оплату распродажи Алекса Лесли!\r\n \r\nВаш доступ к распродаже: https://cloud.mail.ru/public/5fVo/y2vyBAyLy\r\n \r\nПо этой ссылке будут добавляться новые материалы,\r\nпоэтому, время от времени, заходите, проверяйте.\r\n \r\nВы можете как скачать тренинги, так и смотреть онлайн.\r\nВсе курсы будут доступны бессрочно.\r\n \r\nДорогой клиент, пожалуйста обратите внимание.\r\nПо любым вопросам, Вы можете обращаться в службу\r\nподдержки, по данной ссылке: https://dearclient.ru\r\n\r\nВремя работы специалистов: ежедневно с 10:00 - 24:00 по МСК.\r\nВсегда рады и готовы Вам помочь.\r\n \r\np.s. Мои курсы, идеально дополняет, мой коллега Алекс Мэй.\r\nСпециалист высочайшего класса!\r\n \r\nРебята, специально для вас!, я договорился о 95% скидке на время\r\nмоей распродажи, на полностью ВСЕ тренинги Алекса Мэя.\r\nОчень рекомендую к изучению! Это все платные курсы Алекса,\r\nв которых, вы точно не найдете "воды". Проверил лично и не один раз! :-)\r\n \r\nСмотрите подробности по ссылке: https://aleks-mey.ru\r\n \r\nС уважением, Алекс Лесли.\r\n'),
(765, 1691990429, 'newchange', NULL, 'Изменён счёт №388 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(766, 1691990429, 'newchange', NULL, 'Изменён счёт №388 - предыдущий статус "Ожидание оплаты", текущий статус "Оплачен и отправлен"'),
(767, 1691995832, 'login', '1', 'Выполнен вход в админ-панель с логином admin IP-адрес 195.20.4.86'),
(768, 1694615058, 'login', '1', 'Выполнен вход в админ-панель с логином admin IP-адрес 195.20.4.86'),
(769, 1695025157, 'login', '1', 'Выполнен вход в админ-панель с логином admin IP-адрес 195.20.4.86');

-- --------------------------------------------------------

--
-- Структура таблицы `ob_lookup`
--

CREATE TABLE IF NOT EXISTS `ob_lookup` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `code` varchar(100) NOT NULL,
  `type` varchar(128) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ob_lookup`
--

INSERT INTO `ob_lookup` (`id`, `name`, `code`, `type`, `position`) VALUES
(1, 'Низкая', '1', 'TicketPriority', 1),
(2, 'Обычная', '2', 'TicketPriority', 2),
(3, 'Высокая', '3', 'TicketPriority', 3),
(4, 'Очень высокая', '4', 'TicketPriority', 4),
(5, 'Открыт', '1', 'TicketStatus', 1),
(6, 'Ждём ответ пользователя', '2', 'TicketStatus', 2),
(7, 'Закрыт', '3', 'TicketStatus', 3),
(8, '#000080', '1', 'TicketPColor', 1),
(9, '#000000', '2', 'TicketPColor', 2),
(10, '#FF6600', '3', 'TicketPColor', 3),
(11, '#CC0000', '4', 'TicketPColor', 4),
(12, '#00AA00', '1', 'TicketSColor', 1),
(13, '#6600FF', '2', 'TicketSColor', 2),
(14, '#440000', '3', 'TicketSColor', 3),
(15, 'Нет', '0', 'Visible', 1),
(16, 'Да', '1', 'Visible', 2),
(19, 'Первому партнёру', '0', 'AffType', 1),
(20, 'Последнему партнёру', '1', 'AffType', 2),
(21, 'Физический', 'disk', 'GoodKind', 2),
(22, 'Электронный', 'ebook', 'GoodKind', 1),
(24, 'Webmoney Z', 'wmz', 'Purse', 1),
(25, 'Webmoney P', 'wmr', 'Purse', 2),
(27, 'Яндекс.Деньги', 'yandex', 'Purse', 4),
(29, 'Ожидание оплаты', 'waiting', 'Status', 0),
(30, 'Оплачен и отправлен', 'approved', 'Status', 0),
(31, 'Оплачен, но не отправлен', 'processing', 'Status', 0),
(32, 'Отправлен по предоплате', 'sent', 'Status', 0),
(33, 'Наложенный платёж - не подтверждён', 'nalozh', 'Status', 0),
(34, 'Наложенный платёж - ожидает отправки', 'nalozh_confirmed', 'Status', 0),
(35, 'Заказ наложенным платежом отправлен', 'nalozh_sent', 'Status', 0),
(36, 'Наложенный платёж получен', 'nalozh_ok', 'Status', 0),
(37, 'Возврат заказа', 'nalozh_back', 'Status', 0),
(38, 'Отменён', 'cancelled', 'Status', 0),
(40, 'В валюте товара', 'fixed', 'CuponKind', 1),
(41, 'В % от стоимости товара', 'perc', 'CuponKind', 2),
(42, 'Начислять', '1', 'CuponKomis', 1),
(43, 'Не начислять', '0', 'CuponKomis', 2),
(44, 'в валюте товара', 'fixed', 'KomisType', 1),
(45, 'в % от общей суммы (с учётом скидки)', 'perc', 'KomisType', 2),
(46, 'Рубли', 'rur', 'Valuta', 1),
(47, 'Доллары', 'usd', 'Valuta', 2),
(48, 'Евро', 'eur', 'Valuta', 3),
(49, 'Гривни', 'uah', 'Valuta', 4),
(50, 'Доллары', 'usd', 'Robox', 2),
(51, 'Рубли', 'rur', 'Robox', 1),
(52, 'Обычный текст', 'plain', 'Letter', 1),
(53, 'HTML-формат', 'html', 'Letter', 2),
(54, 'Выслан товар', 'sendgood', 'log', 1),
(55, 'Новый клиент', 'newclient', 'log', 2),
(56, 'Новый партнёр', 'newpartner', 'log', 3),
(57, 'Новый заказ', 'neworder', 'log', 4),
(58, 'Оповещение от платёжной системы', 'newpay', 'log', 5),
(59, 'Использован пин-код', 'pin', 'log', 6),
(60, 'Изменение статуса заказа', 'newchange', 'log', 7),
(61, 'Начисление партнёру', 'partner', 'log', 8),
(62, 'Начисление автору', 'author', 'log', 9),
(63, 'Выплачено партнёру', 'paypartner', 'log', 10),
(64, 'Выплачено автору', 'payauthor', 'log', 11),
(65, 'Новая рассылка в очереди', 'newrass', 'log', 12),
(66, 'Отправлены письма из очереди', 'sendmail', 'log', 13),
(67, 'Авторизация в админ-панели', 'login', 'log', 14),
(68, 'За оплаченный заказ', '0', 'KomisOrder', 0),
(69, 'За подтверждённый наложенный платёж', '1', 'KomisOrder', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `ob_mailclick`
--

CREATE TABLE IF NOT EXISTS `ob_mailclick` (
  `id` int(11) NOT NULL,
  `click` int(11) NOT NULL,
  `ref_id` varchar(255) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date_click` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_odno`
--

CREATE TABLE IF NOT EXISTS `ob_odno` (
  `id` int(11) NOT NULL,
  `good_id` varchar(100) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `dost` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `oldprice` int(11) DEFAULT NULL,
  `otz1` text,
  `otz2` text,
  `otz3` text,
  `otz4` text,
  `otz5` text,
  `otz6` text,
  `vkgroup` varchar(100) DEFAULT NULL,
  `footer` text,
  `video` varchar(255) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `zag1` varchar(255) DEFAULT NULL,
  `content` text,
  `block1` varchar(255) DEFAULT NULL,
  `block1data` text,
  `block2` varchar(255) DEFAULT NULL,
  `block2data` text,
  `block3` varchar(255) DEFAULT NULL,
  `block3data` text,
  `preorder` varchar(255) DEFAULT NULL,
  `currency` varchar(40) DEFAULT NULL,
  `imgcount` int(11) DEFAULT NULL,
  `visible` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_order`
--

CREATE TABLE IF NOT EXISTS `ob_order` (
  `id` bigint(20) NOT NULL,
  `bill_id` bigint(20) NOT NULL,
  `good_id` varchar(255) NOT NULL,
  `createDate` int(11) NOT NULL,
  `cena` float NOT NULL,
  `valuta` varchar(255) NOT NULL,
  `partner_id` varchar(255) NOT NULL,
  `payDate` int(11) NOT NULL,
  `status_id` varchar(50) NOT NULL,
  `country` varchar(255) NOT NULL,
  `kanal` varchar(255) NOT NULL DEFAULT 'default'
) ENGINE=MyISAM AUTO_INCREMENT=422 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ob_order`
--

INSERT INTO `ob_order` (`id`, `bill_id`, `good_id`, `createDate`, `cena`, `valuta`, `partner_id`, `payDate`, `status_id`, `country`, `kanal`) VALUES
(311, 285, 'alesly', 1631248723, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(308, 283, 'alesly', 1629910748, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(306, 281, 'telesniy', 1629787167, 999, 'rur', '', 1629967815, 'approved', '', 'default'),
(310, 284, 'update', 1631248581, 1490, 'rur', '', 0, 'waiting', '', 'default'),
(309, 284, 'alesly', 1631248581, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(312, 285, 'update', 1631248723, 1490, 'rur', '', 0, 'waiting', '', 'default'),
(313, 286, 'alesly', 1631249062, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(314, 287, 'alesly', 1631807395, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(315, 288, 'alesly', 1631833823, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(316, 289, 'books', 1632126634, 999, 'rur', '', 0, 'waiting', '', 'default'),
(317, 290, 'alesly', 1632713509, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(318, 291, 'alesly', 1632713844, 2990, 'rur', '', 1632713994, 'approved', '', 'default'),
(319, 292, 'alesly', 1632776647, 2990, 'rur', '', 1632823557, 'approved', '', 'default'),
(320, 293, 'books', 1633740102, 999, 'rur', '', 0, 'waiting', '', 'default'),
(321, 294, 'masterskiy', 1634140159, 999, 'rur', '', 0, 'waiting', '', 'default'),
(322, 294, 'update', 1634140159, 1490, 'rur', '', 0, 'waiting', '', 'default'),
(323, 295, 'alesly', 1634907444, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(324, 295, 'update', 1634907444, 1490, 'rur', '', 0, 'waiting', '', 'default'),
(325, 296, 'alesly', 1634907931, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(326, 296, 'update', 1634907931, 1490, 'rur', '', 0, 'waiting', '', 'default'),
(327, 297, 'alesly', 1635341740, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(328, 298, 'alesly', 1635850908, 2990, 'rur', '', 1635851021, 'approved', '', 'default'),
(329, 299, 'books', 1637755594, 999, 'rur', '', 0, 'waiting', '', 'default'),
(330, 300, 'masterskiy', 1638855107, 999, 'rur', '', 1638855187, 'approved', '', 'default'),
(331, 301, 'laslytayland', 1638855620, 999, 'rur', '', 0, 'waiting', '', 'default'),
(332, 302, 'laslytayland', 1638855851, 999, 'rur', '', 0, 'waiting', '', 'default'),
(333, 302, 'update', 1638855851, 1490, 'rur', '', 0, 'waiting', '', 'default'),
(334, 303, 'alesly', 1638856501, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(335, 304, 'books', 1640290629, 999, 'rur', '', 0, 'waiting', '', 'default'),
(336, 305, 'books', 1640344617, 1000, 'rur', '', 0, 'waiting', '', 'default'),
(337, 306, 'alesly', 1640355795, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(342, 311, 'books', 1640373908, 1000, 'rur', '', 0, 'waiting', '', 'default'),
(343, 312, 'alesly', 1640432266, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(344, 313, 'alesly', 1640436137, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(341, 310, 'alesly', 1640360354, 2990, 'rur', '', 1640363142, 'approved', '', 'default'),
(345, 314, 'masterskiy', 1640511871, 999, 'rur', '', 0, 'waiting', '', 'default'),
(346, 315, 'books', 1640884105, 1000, 'rur', '', 0, 'waiting', '', 'default'),
(347, 316, 'alesly', 1641095960, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(348, 317, 'alesly', 1641162217, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(349, 318, 'books', 1641588427, 1000, 'rur', '', 0, 'waiting', '', 'default'),
(350, 319, 'books', 1641589054, 1000, 'rur', '', 0, 'waiting', '', 'default'),
(351, 320, 'alesly', 1642065095, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(352, 321, 'alesly', 1642596829, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(353, 322, 'leslykipr', 1642762729, 999, 'rur', '', 0, 'waiting', '', 'default'),
(357, 326, 'alesly', 1643491761, 2990, 'rur', '', 1643493288, 'approved', '', 'default'),
(358, 327, 'masterskiy', 1643556387, 999, 'rur', '', 1643575226, 'approved', '', 'default'),
(356, 325, 'books', 1643104674, 1000, 'rur', '', 1643104918, 'approved', '', 'default'),
(359, 328, 'alesly', 1643576387, 2990, 'rur', '', 1643576427, 'approved', '', 'default'),
(360, 329, 'books', 1644040903, 1000, 'rur', '', 0, 'waiting', '', 'default'),
(361, 330, 'books', 1644041134, 1000, 'rur', '', 0, 'waiting', '', 'default'),
(362, 331, 'books', 1644041350, 1000, 'rur', '', 0, 'waiting', '', 'default'),
(363, 332, 'laslytayland', 1644041832, 999, 'rur', '', 0, 'waiting', '', 'default'),
(364, 333, 'telesniy', 1644685185, 999, 'rur', '', 0, 'waiting', '', 'default'),
(365, 334, 'books', 1644929058, 1000, 'rur', '', 1644929418, 'approved', '', 'default'),
(366, 335, 'alesly', 1647351221, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(367, 336, 'alesly', 1647351646, 2990, 'rur', '', 1647375729, 'approved', '', 'default'),
(368, 337, 'books', 1647585220, 1000, 'rur', '', 1647587292, 'approved', '', 'default'),
(369, 338, 'books', 1647585277, 1000, 'rur', '', 1647587282, 'approved', '', 'default'),
(370, 339, 'leslyskidka', 1647661473, 1000, 'rur', '', 1647717722, 'approved', '', 'default'),
(371, 340, 'leslyskidka', 1647661548, 1000, 'rur', '', 1647717714, 'approved', '', 'default'),
(372, 341, 'masterskiy', 1649180746, 999, 'rur', '', 1649180932, 'approved', '', 'default'),
(373, 342, 'leslyskidka', 1649185383, 1000, 'rur', '', 1649185746, 'approved', '', 'default'),
(374, 343, 'masterskiy', 1649682086, 999, 'rur', '', 0, 'waiting', '', 'default'),
(375, 344, 'masterskiy', 1649682360, 999, 'rur', '', 0, 'waiting', '', 'default'),
(376, 345, 'telesniy', 1650362204, 999, 'rur', '', 1650362301, 'approved', '', 'default'),
(377, 346, 'masterskiy', 1650362488, 999, 'rur', '', 1650362577, 'approved', '', 'default'),
(378, 347, 'alesly', 1650790380, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(379, 348, 'alesly', 1650790865, 2990, 'rur', '', 1650791582, 'approved', '', 'default'),
(380, 349, 'telesniy', 1651173468, 999, 'rur', '', 0, 'waiting', '', 'default'),
(381, 350, 'masterskiy', 1651586156, 999, 'rur', '', 0, 'waiting', '', 'default'),
(382, 351, 'alesly', 1651670945, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(383, 352, 'telesniy', 1652303065, 999, 'rur', '', 0, 'waiting', '', 'default'),
(384, 353, 'telesniy', 1652305343, 999, 'rur', '', 1652305543, 'approved', '', 'default'),
(385, 354, 'telesniy', 1652536077, 999, 'rur', '', 0, 'waiting', '', 'default'),
(386, 355, 'alesly', 1653905432, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(387, 356, 'books', 1654447729, 1000, 'rur', '', 0, 'waiting', '', 'default'),
(388, 357, 'books', 1654453636, 1000, 'rur', '', 0, 'waiting', '', 'default'),
(389, 358, 'books', 1654542125, 1000, 'rur', '', 1654542471, 'approved', '', 'default'),
(390, 359, 'alesly', 1654709306, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(391, 359, 'update', 1654709306, 1490, 'rur', '', 0, 'waiting', '', 'default'),
(392, 360, 'alesly', 1654710846, 2990, 'rur', '', 1654711347, 'approved', '', 'default'),
(393, 360, 'update', 1654710846, 1490, 'rur', '', 1654711347, 'approved', '', 'default'),
(394, 361, 'telesniy', 1657182931, 999, 'rur', '', 1657183062, 'approved', '', 'default'),
(395, 362, 'telesniy', 1657778078, 999, 'rur', '', 1657778499, 'approved', '', 'default'),
(396, 363, 'alesly', 1657778309, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(397, 364, 'books', 1658133709, 1000, 'rur', '', 0, 'waiting', '', 'default'),
(398, 365, 'books', 1658133990, 1000, 'rur', '', 1658134188, 'approved', '', 'default'),
(399, 366, 'books', 1658138998, 1000, 'rur', '', 1658139239, 'approved', '', 'default'),
(400, 367, 'alesly', 1658396808, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(401, 368, 'alesly', 1659211751, 2990, 'rur', '', 1659212578, 'approved', '', 'default'),
(402, 369, 'books', 1660485977, 1000, 'rur', '', 0, 'waiting', '', 'default'),
(403, 370, 'books', 1661218839, 1000, 'rur', '', 0, 'waiting', '', 'default'),
(404, 371, 'masterskiy', 1661373906, 999, 'rur', '', 0, 'waiting', '', 'default'),
(405, 372, 'masterskiy', 1661373941, 999, 'rur', '', 0, 'waiting', '', 'default'),
(406, 373, 'masterskiy', 1661375097, 999, 'rur', '', 0, 'waiting', '', 'default'),
(407, 374, 'telesniy', 1661426597, 999, 'rur', '', 1661430144, 'approved', '', 'default'),
(408, 375, 'alesly', 1662900808, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(409, 376, 'alesly', 1662913539, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(410, 377, 'alesly', 1670465494, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(411, 378, 'masterskiy', 1671918253, 999, 'rur', '', 0, 'waiting', '', 'default'),
(412, 379, 'leslykipr', 1679350992, 999, 'rur', '', 0, 'waiting', '', 'default'),
(413, 380, 'alesly', 1679464998, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(414, 381, 'alesly', 1680850777, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(415, 382, 'alesly', 1680850866, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(416, 383, 'alesly', 1681033992, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(417, 384, 'alesly', 1681034241, 2990, 'rur', '', 0, 'waiting', '', 'default'),
(418, 385, 'books', 1681366874, 1000, 'rur', '', 0, 'waiting', '', 'default'),
(419, 386, 'telesniy', 1685433410, 999, 'rur', '', 0, 'waiting', '', 'default'),
(420, 387, 'telesniy', 1686431231, 999, 'rur', '', 0, 'waiting', '', 'default'),
(421, 388, 'alesly', 1691990125, 2990, 'rur', '', 1691990429, 'approved', '', 'default');

-- --------------------------------------------------------

--
-- Структура таблицы `ob_page`
--

CREATE TABLE IF NOT EXISTS `ob_page` (
  `id` int(11) NOT NULL,
  `psevdo` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `visible` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_partner`
--

CREATE TABLE IF NOT EXISTS `ob_partner` (
  `id` varchar(100) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `wmz` varchar(13) NOT NULL,
  `wmr` varchar(13) NOT NULL,
  `rbkmoney` varchar(100) NOT NULL,
  `yandex` varchar(20) NOT NULL,
  `zpayment` varchar(14) NOT NULL,
  `country` varchar(255) NOT NULL,
  `maillist` varchar(30) NOT NULL,
  `from` varchar(255) NOT NULL,
  `parent_id` varchar(100) NOT NULL,
  `createTime` int(11) NOT NULL,
  `trusted` tinyint(4) NOT NULL,
  `city` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `aboutProject` varchar(255) NOT NULL,
  `total` float NOT NULL,
  `paid` float NOT NULL,
  `updateTime` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `sub` tinyint(4) NOT NULL DEFAULT '1',
  `way` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_partner_auto`
--

CREATE TABLE IF NOT EXISTS `ob_partner_auto` (
  `id` int(11) NOT NULL,
  `good_id` varchar(255) NOT NULL,
  `count` float NOT NULL,
  `komis` int(11) NOT NULL,
  `komis_type` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_partner_personal`
--

CREATE TABLE IF NOT EXISTS `ob_partner_personal` (
  `id` int(11) NOT NULL,
  `partner_id` varchar(255) NOT NULL,
  `good_id` varchar(255) NOT NULL,
  `komis` float NOT NULL,
  `komis_type_id` varchar(5) NOT NULL,
  `auto` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_payout`
--

CREATE TABLE IF NOT EXISTS `ob_payout` (
  `id` int(11) NOT NULL,
  `kind` varchar(10) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `theid` varchar(255) DEFAULT NULL,
  `way` varchar(255) DEFAULT NULL,
  `sum` float DEFAULT NULL,
  `valuta` varchar(10) DEFAULT NULL,
  `rekv` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_pin`
--

CREATE TABLE IF NOT EXISTS `ob_pin` (
  `id` bigint(20) NOT NULL,
  `added` varchar(255) DEFAULT NULL,
  `pincat_id` int(11) NOT NULL,
  `code` text,
  `used` tinyint(4) NOT NULL DEFAULT '0',
  `email` varchar(255) DEFAULT NULL,
  `good_id` varchar(100) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_pincat`
--

CREATE TABLE IF NOT EXISTS `ob_pincat` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_plink`
--

CREATE TABLE IF NOT EXISTS `ob_plink` (
  `id` varchar(255) NOT NULL,
  `plink` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_queue`
--

CREATE TABLE IF NOT EXISTS `ob_queue` (
  `id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `format` varchar(10) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `priority` tinyint(4) DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=677 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_rass`
--

CREATE TABLE IF NOT EXISTS `ob_rass` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `good_id` varchar(100) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_rass_letter`
--

CREATE TABLE IF NOT EXISTS `ob_rass_letter` (
  `id` int(11) NOT NULL,
  `rass_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `hours` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_rass_sub`
--

CREATE TABLE IF NOT EXISTS `ob_rass_sub` (
  `id` bigint(20) NOT NULL,
  `rass_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `letter_id` int(11) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_rass_user`
--

CREATE TABLE IF NOT EXISTS `ob_rass_user` (
  `id` int(11) NOT NULL,
  `rass_id` int(11) NOT NULL,
  `uname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sub` tinyint(4) NOT NULL DEFAULT '1',
  `date` int(11) DEFAULT NULL,
  `unsubdate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_receipt`
--

CREATE TABLE IF NOT EXISTS `ob_receipt` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `time_pay` varchar(255) NOT NULL,
  `external_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `total` float NOT NULL,
  `payments_type` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `receipt_datetime` varchar(255) NOT NULL,
  `text_query` text NOT NULL,
  `error_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_s`
--

CREATE TABLE IF NOT EXISTS `ob_s` (
  `id` bigint(20) NOT NULL,
  `date` int(11) DEFAULT NULL,
  `sb` varchar(100) DEFAULT NULL,
  `clicks` bigint(20) DEFAULT NULL,
  `p_id` varchar(100) DEFAULT NULL,
  `good_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_session`
--

CREATE TABLE IF NOT EXISTS `ob_session` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ob_session`
--

INSERT INTO `ob_session` (`id`, `expire`, `data`) VALUES
('qkduri83u6h03aik5qe54q17o3', 1695359153, '');

-- --------------------------------------------------------

--
-- Структура таблицы `ob_settings`
--

CREATE TABLE IF NOT EXISTS `ob_settings` (
  `id` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ob_settings`
--

INSERT INTO `ob_settings` (`id`, `value`) VALUES
('staffOn', '1'),
('staffBaseOn', '1'),
('affAllTrusted', '0'),
('adminEmail', 'aleks@aleks-lesly.ru'),
('adminName', 'Алекс Лесли'),
('sysEmail', 'hyperx-master@protonmail.com'),
('affCountry', '1'),
('affCity', '1'),
('affUrl', '1'),
('affAbout', '1'),
('affMaillist', '1'),
('affWmz', '1'),
('affWmr', '1'),
('affRbk', '0'),
('affYandex', '1'),
('affZpayment', '1'),
('affFrom', '1'),
('catalogOn', '0'),
('catalogPerPage', '5'),
('affLast', '1'),
('usualCartOn', '1'),
('affLink', ''),
('affShared', '1'),
('staffUploadOn', '1'),
('mailType', 'mail'),
('mailHost', ''),
('mailPort', ''),
('mailUsername', ''),
('mailPassword', ''),
('mailLimit', '50'),
('kursUsd', '98.92'),
('kursEur', '105.32'),
('kursUah', '2.68'),
('kursAuto', '1'),
('kursAutoMul', '1.03'),
('staffUploadExt', 'bmp, gif, jpg, png, zip, rar, csv, doc, docx, txt, pdf'),
('staffUploadMax', '1024'),
('staffPagination', '30'),
('siteName', ''),
('siteUrl', ''),
('staffBasePagination', '30'),
('staffBaseCategoryPage', '20'),
('phoneDisk', '1'),
('phoneEbook', '0'),
('areaPerPage', '20'),
('mobile', ''),
('copyEmail', ''),
('payWebmoneyOn', '0'),
('payWmz', ''),
('payWmr', ''),
('payWebmoneyKey', ''),
('payRbkmoneyId', ''),
('payRbkmoneyOn', '0'),
('payRbkmoneyKey', ''),
('payRoboxOn', '0'),
('payRoboxLogin', ''),
('payRoboxPass1', ''),
('payRoboxPass2', ''),
('payZpaymentOn', '0'),
('payZpaymentId', ''),
('payZpaymentKey', ''),
('pay2checkoutOn', '0'),
('pay2checkoutId', ''),
('pay2checkoutKey', ''),
('paySmsOn', '0'),
('paySmsId', ''),
('paySmsKey', ''),
('paySmsCost', '0'),
('payInterkassaOn', '0'),
('payInterkassaId', '5a2e4a8b3d1eafa01d8b4569'),
('payInterkassaKey', 'HDDQqlCpReDbkgAy'),
('paySprypayOn', '0'),
('paySprypayId', ''),
('paySprypayKey', ''),
('payLiqpayOn', '0'),
('payLiqpayId', ''),
('payLiqpayKey', ''),
('payPosOn', ''),
('payPosId', ''),
('payPosKey', ''),
('payW1On', '0'),
('payW1Id', ''),
('payW1Key', ''),
('paySmsUrl', 'http://bank.smscoin.com/bank/'),
('payRoboxValuta', 'usd'),
('affIp', '0'),
('affMin', '0'),
('anewPerPage', '3'),
('affNewsOn', '0'),
('adminAffPerPage', '25'),
('checkBlack', '0'),
('adminPage', '30'),
('adminPgBill', '30'),
('adminPgOrder', '30'),
('adminPgGood', '30'),
('adminPgAreaFile', '30'),
('adminPgAreaUser', '30'),
('adminPgPayout', '30'),
('adminPgAffnew', '30'),
('adminPgAd', '30'),
('supportLetter', '0'),
('adminPgClient', '30'),
('adminPgCupon', '30'),
('adminPgClick', '50'),
('nalozhCountries', 'Россия,Украина'),
('firstWay', '1'),
('payLiqpayPhone', ''),
('crossLimit', '20'),
('nalozhEmail', '1'),
('securebookUrl', 'http://example.com/sbkey/request.php?email=*email*&alias=*id*&pass=мой_ключ&licenseCount=1'),
('cronWord', ''),
('cronLast', '1695394803'),
('cronKurs', '1695394503'),
('cronKursRate', '1440'),
('cronRass', '1695394503'),
('mailInterval', '20'),
('cronNotify', '1695394503'),
('notifyOn', '1'),
('notifyLimit', '8'),
('notifyInterval', '50'),
('notifyFirst', '3'),
('notifySecond', '8'),
('dv', 'rur'),
('logsendgood', '1'),
('logon', '1'),
('lognewclient', '1'),
('lognewpartner', '1'),
('logneworder', '1'),
('lognewpay', '1'),
('logpin', '1'),
('lognewchange', '1'),
('logpartner', '1'),
('logauthor', '1'),
('logpaypartner', '1'),
('logpayauthor', '1'),
('lognewrass', '1'),
('logsendmail', '1'),
('loglogin', '1'),
('staffReverse', '1'),
('staffFullAccess', '1'),
('staffAutoClose', '1'),
('payWme', ''),
('payWmu', ''),
('nalozhManual', '1'),
('pass_atol', ''),
('login_atol', ''),
('inn', ''),
('payment_address', ''),
('code_group', ''),
('enable_atol', ''),
('sno', ''),
('enable_phone', ''),
('payYandexkassaOn', '0'),
('payYandexkassaShopid', ''),
('payYandexkassaScid', ''),
('payYandexkassaShoppass', ''),
('relation_partner', '0'),
('day_click', '60'),
('count_click', '5'),
('payTestYandexkassaOn', '0'),
('ml', ''),
('mlp', ''),
('payYandexOn', '0'),
('payYandexAccount', ''),
('payYandexKey', ''),
('payPaypalOn', '0'),
('payPaypalEmail', ''),
('payPaypalKey', 'ipcheck'),
('payQiwiOn', '0'),
('payQiwiId', ''),
('payQiwiPass', ''),
('payFreekassaOn', '1'),
('payFreekassaShopid', '9866'),
('payFreekassaShoppass', 'WOC-Xg$w}{>g[yC'),
('payFreekassaShoppass2', 'o,hyMr1X.^M5>F)'),
('payMegakassaOn', '0'),
('payMegakassaShopid', ''),
('payMegakassaShoppass', ''),
('payMasterOn', '0'),
('payMasterShopid', ''),
('payMasterShoppass', ''),
('sendpulseID', ''),
('sendpulseSecret', ''),
('sendpulsePartner', '0'),
('payYandexkassaTax', '1'),
('payYandexkassaTaxsystem', '1'),
('payFondyId', ''),
('payFondyKey', ''),
('payFondyOn', '0'),
('wayForPayOn', '0'),
('wayForPayid', ''),
('wayForPaykey', ''),
('politic', '0'),
('politic_link', ''),
('politic_oferta', ''),
('payEnotOn', '1'),
('payEnotId', '2145'),
('payEnotKey', 'nXCAWgvgO_Tlx6bxtIMVLFrj6izJBUv2'),
('payEnotKey2', 'XRSTf-_pKYoSjNlVaxI67dgM7qhULYTy');

-- --------------------------------------------------------

--
-- Структура таблицы `ob_shorten`
--

CREATE TABLE IF NOT EXISTS `ob_shorten` (
  `id` bigint(20) NOT NULL,
  `partner_id` varchar(100) NOT NULL,
  `description` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_special`
--

CREATE TABLE IF NOT EXISTS `ob_special` (
  `id` int(11) NOT NULL,
  `good_id` varchar(100) DEFAULT NULL,
  `newgood_id` varchar(100) DEFAULT NULL,
  `sum` float DEFAULT NULL,
  `valuta` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_staff`
--

CREATE TABLE IF NOT EXISTS `ob_staff` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lastLogin` int(11) NOT NULL,
  `lastLoginIp` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ob_staff`
--

INSERT INTO `ob_staff` (`id`, `firstName`, `email`, `username`, `password`, `lastLogin`, `lastLoginIp`) VALUES
(1, 'Администратор', 'hyperx-master@protonmail.com', 'admin', '8614bf9aaa2cf7e0801a968e54185147', 1695025157, '195.20.4.86');

-- --------------------------------------------------------

--
-- Структура таблицы `ob_staff_access`
--

CREATE TABLE IF NOT EXISTS `ob_staff_access` (
  `id` int(11) NOT NULL,
  `bill` varchar(255) NOT NULL,
  `order` varchar(255) NOT NULL,
  `partner` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `ad` varchar(255) NOT NULL,
  `black` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `area_files` varchar(255) NOT NULL,
  `payout` varchar(255) NOT NULL,
  `support` varchar(255) NOT NULL,
  `cupon` varchar(255) NOT NULL,
  `affnew` varchar(255) NOT NULL,
  `rass` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `departaments` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL,
  `good` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `main` varchar(255) NOT NULL,
  `knowbase` varchar(255) NOT NULL,
  `form` varchar(255) NOT NULL,
  `log` varchar(255) NOT NULL,
  `odno` varchar(255) NOT NULL,
  `pages` varchar(255) NOT NULL,
  `payhistory` varchar(255) NOT NULL,
  `pincat` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `special` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ob_staff_access`
--

INSERT INTO `ob_staff_access` (`id`, `bill`, `order`, `partner`, `client`, `ad`, `black`, `area`, `area_files`, `payout`, `support`, `cupon`, `affnew`, `rass`, `country`, `departaments`, `stat`, `good`, `category`, `main`, `knowbase`, `form`, `log`, `odno`, `pages`, `payhistory`, `pincat`, `pin`, `special`) VALUES
(0, 'index,view', 'index', '', 'index,view', '', 'index,view,create,delete', '', '', '', 'index,tickets,view,update', '', '', '', 'Россия,Украина', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `ob_ticket`
--

CREATE TABLE IF NOT EXISTS `ob_ticket` (
  `id` varchar(15) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `priority_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `createTime` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `file1` varchar(255) NOT NULL,
  `file2` varchar(255) NOT NULL,
  `file3` varchar(255) NOT NULL,
  `file4` varchar(255) NOT NULL,
  `updateTime` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_ticket_answer`
--

CREATE TABLE IF NOT EXISTS `ob_ticket_answer` (
  `id` bigint(20) NOT NULL,
  `ticket_id` varchar(255) NOT NULL,
  `kind` varchar(5) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `updateTime` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `file1` varchar(255) NOT NULL,
  `file2` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_ticket_section`
--

CREATE TABLE IF NOT EXISTS `ob_ticket_section` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `default_staff_id` int(11) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ob_way`
--

CREATE TABLE IF NOT EXISTS `ob_way` (
  `way_id` varchar(100) NOT NULL DEFAULT '',
  `title` varchar(255) DEFAULT NULL,
  `code` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ob_way`
--

INSERT INTO `ob_way` (`way_id`, `title`, `code`) VALUES
('interkassa', 'Интеркасса', '<h4>Оплата через Интеркассу</h4>\r\n\r\n<div class="payimg">\r\n<img src="{bu}images/front/bill/iks.gif">\r\n</div>\r\n\r\n\r\n<br><br>\r\nОплата выбранным Вами способом будет происходить через посредника - компанию <b>&quot;Интеркасса&quot;</b>. \r\n\r\n<br><br>Заполните форму и затем найдите выбранный Вами способ. Следуйте дальнейшим инструкциям.\r\n\r\n<br><br><br>\r\nЧтобы продолжить оплату, нажмите:\r\n<form name="payment" action="https://sci.interkassa.com/" method="post" target="_blank" accept-charset="UTF-8">\r\n<input type="hidden" name="ik_co_id" value="{interkassa_id}">\r\n<input type="hidden" name="ik_am" value="{rur}">\r\n<input type="hidden" name="ik_pm_no" value="{bill_id}">\r\n<input type="hidden" name="ik_desc" value="Paybill #{bill_id} for {email}">\r\n\r\n<div class="paybtn">\r\n<input id="subm" class="submit" type="submit" value="Перейти к оплате"/>\r\n</div>\r\n\r\n\r\n</form>'),
('robox', 'RoboKassa', '<h4>Оплата через РобоКассу</h4>\r\n\r\n<div class="payimg">\r\n<img src="{bu}images/front/bill/rkassa.gif">\r\n</div>\r\n\r\n<br>\r\nЧтобы перейти к оплате различными электронными платежами через РобоКассу:\r\n<form action="https://auth.robokassa.ru/Merchant/Index.aspx" method="POST" target="_blank">\r\n\r\n<input type="hidden" name="MerchantLogin" value="{robox_login}">\r\n\r\n<input type="hidden" name="OutSum" value="{robox_sum}">\r\n\r\n<input type="hidden" name="InvId" value="{robox_id}">\r\n\r\n<input type="hidden" name="Description" value="Oplata">\r\n\r\n<input type="hidden" name="SignatureValue" value="{robox_crc}">\r\n\r\n<div class="paybtn">\r\n<input id="subm" class="submit" type="submit" value="Перейти к оплате"/>\r\n</div>\r\n\r\n</form>'),
('wmz', 'WebMoney Z', '<h4>Оплата WebMoney</h4><?php echo ''Ok'';?>\r\n\r\n<div class="payimg">\r\n<img src="{bu}images/front/bill/webmoney.jpg">\r\n</div>\r\n\r\n<br>\r\nЧтобы перейти к прямой оплате через Webmoney Merchant, нажмите:\r\n<form accept-charset="cp1251" action="https://merchant.webmoney.ru/lmi/payment.asp" method="POST" target="_blank">\r\n\r\n<input type="hidden" name="LMI_PAYEE_PURSE" value="{wmz}">\r\n<input type="hidden" name="LMI_PAYMENT_AMOUNT" value="{usd}">\r\n<input type="hidden" name="LMI_PAYMENT_NO" value="{bill_id}">\r\n<input type="hidden" name="LMI_PAYMENT_DESC" value="Paybill #{bill_id} для {email}">\r\n\r\n<div class="paybtn">\r\n<input id="subm" class="submit" type="submit" value="Оплатить {usd} WMZ"/>\r\n</div>\r\n\r\n</form>'),
('wmr', 'WebMoney R', '<h4>Оплата WebMoney</h4>\r\n\r\n<div class="payimg">\r\n<img src="{bu}images/front/bill/webmoney.jpg">\r\n</div>\r\n\r\n<br>\r\nЧтобы перейти к прямой оплате через Webmoney Merchant, нажмите:\r\n<form action="https://merchant.webmoney.ru/lmi/payment.asp" method="POST" target="_blank">\r\n\r\n<input type="hidden" name="LMI_PAYEE_PURSE" value="{wmr}">\r\n<input type="hidden" name="LMI_PAYMENT_AMOUNT" value="{rur}">\r\n<input type="hidden" name="LMI_PAYMENT_NO" value="{bill_id}">\r\n<input type="hidden" name="LMI_PAYMENT_DESC" value="Paybill #{bill_id} for {email}">\r\n\r\n<div class="paybtn">\r\n<input id="subm" class="submit" type="submit" value="Оплатить {rur} WMR"/>\r\n</div>\r\n\r\n</form>\r\n'),
('liqpay', 'LiqPay', '<h4>Оплата LiqPay</h4>\r\n\r\n<div class="payimg">\r\n<img src="{bu}images/front/bill/liqpay.jpg">\r\n</div>\r\n\r\n<br>\r\nВы можете выполнить оплату со своего счёта в LiqPay или c кредитной карты.\r\n\r\n<br><br>\r\nЧтобы продолжить нажмите:\r\n<br>\r\n\r\n<form target="_blank" action=''https://www.liqpay.com/?do=clickNbuy'' method=''POST''>\r\n      <input type=''hidden'' name=''operation_xml'' value=''{liqpay_xml}'' />\r\n      <input type=''hidden'' name=''signature'' value=''{liqpay_crc}'' />\r\n<div class="paybtn">\r\n<input id="subm" class="submit" type="submit" value="Оплатить {usd}$"/>\r\n</div>\r\n  </form>'),
('wayforpay', 'WayForPay', '<form method="post" action="https://secure.wayforpay.com/pay" accept-charset="utf-8">\r\n  <input name="merchantAccount" value="{WFP_ID}">\r\n  <input name="merchantDomainName" value="{WFP_SERVER}">\r\n  <input name="merchantSignature" value="{WFP_SIGNA}">\r\n  <input name="orderReference" value="{bill_id}">\r\n  <input name="orderDate" value="{WFP_DATE}">\r\n  <input name="amount" value="{rur}">\r\n  <input name="currency" value="RUB">\r\n  <input name="productName[]" value="Order #{bill_id}">\r\n  <input name="productPrice[]" value="{rur}">\r\n  <input name="productCount[]" value="1">\r\n  <button type="submit">Оплатить</button>\r\n</form>'),
('fondy', 'Fondy', '<h4>Оплата через Fondy</h4>\r\n\r\n<br><br>Заполните форму и затем найдите выбранный Вами способ. Следуйте дальнейшим инструкциям.\r\n\r\n<br><br><br>\r\nЧтобы продолжить оплату, нажмите:<br>\r\n\r\n<form action="{bu}ps/fondy/form" method="post" target="_blank">\r\n<input type="hidden" name="bill_id" value="{bill_id}">\r\n<input type="submit" value="Продолжить оплату" />\r\n</form>'),
('yandex_online', 'Яндекс.Деньги', '<h4>Оплата с помощью Яндекс.Деньги</h4>\r\n\r\n<div class="payimg">\r\n<img src="{bu}images/admin/pay/yandex.png">\r\n</div>\r\n\r\n<br>\r\nЧтобы перейти к прямой оплате на Сайте Яндекс.Деньги, нажмите:\r\n\r\n\r\n<form method="POST" action="https://money.yandex.ru/quickpay/confirm.xml">\r\n<input type="hidden" name="receiver" value="{yandex_account}">\r\n<input type="hidden" name="formcomment" value="Оплата счёта {bill_id}">\r\n<input type="hidden" name="short-dest" value="Оплата счёта {bill_id}">\r\n<input type="hidden" name="label" value="Oplata_scheta_{bill_id}">\r\n<input type="hidden" name="quickpay-form" value="shop">\r\n<input type="hidden" name="targets" value="Oplata_scheta_{bill_id}">\r\n<input type="hidden" name="sum" value="{rur}" data-type="number">\r\n<input type="hidden" name="successURL" value="{success_url_encoded}">\r\n<p align="left" style="margin-left: 30px; margin-top: 15px;"><input type="radio" name="paymentType" value="PC" checked> Яндекс.Деньгами</input></p>\r\n<p align="left" style="margin-left: 30px; margin-top: 15px;"><input type="radio" name="paymentType" value="AC"> Банковской картой VISA/MasterCard</input> </p>\r\n<input style="margin-top: 18px;" type="submit" name="submit-button" value="Продолжить оплату">\r\n</form>'),
('wmr2', 'Webmoney R', '<h4>Оплата с помощью WebMoney Рубли</h4>\r\n\r\n<div class="payimg">\r\n<img src="{bu}images/front/bill/webmoney.jpg">\r\n</div>\r\n\r\n<p align="center">Вы можете оплатить с помощью системы WebMoney - выполнив <b>вручную</b> перевод в размере {rur} WMR - на этот кошелёк:</p>\r\n\r\n<p align="center" style="font-size:16px"><br><b>{wmr}</b></p>\r\n\r\n<p align="center"><br>В назначении платежа укажите: "Счёт {bill_id}".</p>\r\n\r\n<p>&nbsp;</p>\r\n <p align="center">После перевода - сообщите <a style="text-decoration: underline; color: #036" href="{notify_link}">по этой ссылке</a> продавцу - и в течение 12-36 часов Ваш платёж будет зачислен</p>\r\n<p>&nbsp;</p>'),
('wmz2', 'WebMoney Z', '<h4>Оплата с помощью WebMoney</h4>\r\n\r\n <div class="payimg">\r\n <img src="{bu}images/front/bill/webmoney.jpg">\r\n </div>\r\n\r\n <p align="center">Зачисление платежа и получение товара происходит в ручном режиме в течение 12-24 часов с момента оплаты</p>\r\n\r\n<p align="center"><br>Переведите сумму на этот кошелёк:<br><br>\r\n\r\n<b>{wmz}</b> - сумма <b><span style="color:#036">{usd} WMZ</span></b><br>\r\n</p>\r\n\r\n<p align="center"><br>В назначении платежа укажите <b>"Счёт {bill_id} {email}"</b></p>\r\n\r\n<p>&nbsp;</p>\r\n <p align="center">После перевода - сообщите <a style="text-decoration: underline; color: #036" href="{notify_link}">по этой ссылке</a> продавцу - и в течение 12-36 часов Ваш платёж будет зачислен</p>\r\n\r\n\r\n<p>&nbsp;</p>'),
('yandexkassa', 'Яндекс.Касса', '<h4>Оплата через Яндекс Кассу</h4>\r\n\r\n<div class="payimg">\r\n<img src="{bu}images/front/bill/ykassa.gif">\r\n</div>\r\n\r\n<br><br>\r\nОплата выбранным Вами способом будет происходить через посредника - компанию <b>&quot;Яндекс Касса&quot;</b>. \r\n\r\n<br><br>Заполните форму и затем найдите выбранный Вами способ. Следуйте дальнейшим инструкциям.\r\n\r\n<br><br><br>\r\nЧтобы продолжить оплату, нажмите:<br>\r\n\r\n<form action="{bu}ps/yandexkassa/form" method="post" target="_blank">\r\n<input type="hidden" name="bill_id" value="{bill_id}">\r\n<input type="hidden" name="crc" value="{status_link}">\r\n<input type="submit" value="Продолжить оплату" />\r\n</form>'),
('cloud', 'cloud', '<script src="https://widget.cloudpayments.ru/bundles/cloudpayments"></script>\r\n<script>\r\n     this.pay = function () {\r\n        var widget = new cp.CloudPayments();\r\n        widget.charge({ // options\r\n                publicId: ''test_api_00000000000000000000001'',  //id из личного кабинета\r\n               description: ''Oplata scheta #{bill_id}'', //назначение\r\n               amount: {rur}, //сумма\r\n                currency: ''RUB'', //валюта\r\n               invoiceId: ''{bill_id}'', //номер заказа  (необязательно)\r\n               accountId: ''{email}'', //идентификатор плательщика (необязательно)\r\n               skin: ''mini'', //дизайн виджета                \r\n            },\r\n            function (options) { // success\r\n               //действие при успешной оплате\r\n            },\r\n            function (reason, options) { // fail\r\n                //действие при неуспешной оплате\r\n            });\r\n   };    \r\n    \r\n    </script>'),
('paymaster', 'PayMaster', '<h4>Оплата через PayMaster</h4>\r\n<br><br>\r\nОплата выбранным Вами способом будет происходить через посредника - компанию <b>&quot;PayMaster&quot;</b>. \r\n<br><br>Чтобы продолжить оплату, нажмите:<br>\r\n\r\n<form method="post" action="https://paymaster.ru/Payment/Init" accept-charset="UTF-8">\r\n <input type="hidden" name="LMI_MERCHANT_ID" value="{PAYMASTER_ID}" />\r\n <input type="hidden" name="LMI_PAYMENT_AMOUNT" value="{rur}" />\r\n <input type="hidden" name="LMI_PAYMENT_NO" value="{bill_id}" />\r\n         <input type="hidden" name="LMI_PAYMENT_DESC" value="Оплата заказа {bill_id}" />\r\n <input type="hidden" name="LMI_CURRENCY" value="RUB" /> \r\n  <input type="hidden" name="SIGN" value="{PAYMASTER_SIGN}" />\r\n  <input type="submit" value="Купить" />\r\n</form>\r\n'),
('paypal_online', 'PayPal', '﻿<h4>Оплата с помощью PayPal</h4>\r\n\r\n<div class="payimg">\r\n<img src="{bu}images/admin/pay/paypal.jpg">\r\n</div>\r\n\r\n<br>\r\nЧтобы перейти к прямой оплате на сайте PayPal, нажмите:\r\n\r\n<form action="https://www.paypal.com/cgi-bin/webscr" method="post">\r\n <input name="cmd" type="hidden" value="_xclick">\r\n <input name="business" type="hidden" value="{paypal_email}">\r\n <input name="item_name" type="hidden" value="Oplata Scheta #{bill_id}">\r\n <input name="item_number" type="hidden" value="{bill_id}">\r\n <input name="amount" type="hidden" value="{rur}">\r\n <input name="no_shipping" type="hidden" value="1">\r\n <input name="rm" type="hidden" value="1">\r\n <input name="return" type="hidden" value="{bu}f/ok">\r\n <input name="cancel_return" type="hidden" value="{bu}f/fail">\r\n <input name="currency_code" type="hidden" value="RUB">\r\n <input name="notify_url" type="hidden" value="{bu}ps/paypal">\r\n <input type="submit" value="Платить через PayPal">\r\n</form>'),
('qiwi_online', 'Платёжная система Qiwi', '﻿<h4>Оплата с помощью Qiwi</h4>\n\n<div class="payimg">\n<img src="{bu}images/admin/pay/qiwi.jpg">\n</div>\n\n<br>\nЧтобы перейти к оплате с помощью Qiwi, введите Ваш номер Qiwi кошелька в международном формате - <b>+79991111111</b>:<br>&nbsp;<br>\n\n<form action="{qiwi_link}" method="post" target="_blank">\n <input class="text" type="text" name="tel" value="+"><br>\n <input type="submit" value="Оплата через Qiwi">\n</form>'),
('w1_online', 'Единая Касса (W1)', '<h4>Оплата через Единую Кассу (W1)</h4>\n\n<div class="payimg">\n<img src="{bu}images/admin/pay/w1.jpg">\n</div>\n\n<br>\nЧтобы перейти к выбору способа оплаты через Единую Кассу (W1), нажмите:\n\n\n<form method="post" action="https://wl.walletone.com/checkout/checkout/Index">\n  {w1_form}\n  <input type="submit" value="Продолжить оплату"/>\n</form>'),
('sprypay', 'SpryPay', '<h4>Оплата через SpryPay</h4>\r\n\r\n<div class="payimg">\r\n<img src="{bu}images/front/bill/sprypay.gif">\r\n</div>\r\n\r\n\r\n<br><br>\r\nОплата выбранным Вами способом будет происходить через посредника - <b>&quot;SpryPay&quot;</b>. \r\n\r\n<br><br>Заполните форму и затем найдите выбранный Вами способ. Следуйте дальнейшим инструкциям.\r\n\r\n<br><br><br>\r\nЧтобы продолжить оплату, нажмите:\r\n\r\n  <form action=''http://sprypay.ru/sppi/'' method=''post'' target=''_blank''>\r\n    <input type=''hidden'' name=''spShopId'' value=''{spry_id}''>\r\n    <input type=''hidden'' name=''spShopPaymentId'' value=''{bill_id}''>\r\n    <input type=''hidden'' name=''spAmount'' value=''{rur}''>\r\n    <input type=''hidden'' name=''spCurrency'' value=''rur''>\r\n    <input type=''hidden'' name=''spPurpose'' value=''Paybill {bill_id}''>\r\n    <input type=''hidden'' name=''spUserEmail'' value=''{email}''>\r\n\r\n<div class="paybtn">\r\n<input id="subm" class="submit" type="submit" value="Перейти к оплате"/>\r\n</div>\r\n\r\n\r\n</form>'),
('mkassa', 'MegaKassa', '<h4>Оплата через MegaKassa</h4>\r\n\r\n\r\n<br><br>\r\nОплата выбранным Вами способом будет происходить через посредника - компанию <b>&quot;MegaKassa&quot;</b>. \r\n\r\n<br><br>Заполните форму и затем найдите выбранный Вами способ. Следуйте дальнейшим инструкциям.\r\n\r\n<br><br><br>\r\nЧтобы продолжить оплату, нажмите:<br>\r\n\r\n<form method="post" action="https://megakassa.ru/merchant/" accept-charset="UTF-8">\r\n  <input type="hidden" name="shop_id" value="{MKASSA_MID}" />\r\n <input type="hidden" name="amount" value="{rur}" />\r\n <input type="hidden" name="currency" value="RUB" />\r\n <input type="hidden" name="description" value="Оплата заказа {bill_id}" />\r\n  <input type="hidden" name="order_id" value="{bill_id}" />\r\n <input type="hidden" name="method_id" value="" />\r\n <input type="hidden" name="client_email" value="" />\r\n  <input type="hidden" name="debug" value="" />\r\n <input type="hidden" name="signature" value="{MKASSA_CODE}" />\r\n  <input type="hidden" name="language" value="ru" />\r\n  <input type="submit" value="Купить" />\r\n</form>\r\n'),
('freekassa', 'Free Kassa', '<h4>Оплата через Free Kassa</h4>\r\n\r\n\r\n<br><br>\r\nОплата выбранным Вами способом будет происходить через посредника - компанию <b>&quot;FreeКасса&quot;</b>. \r\n\r\n<br><br>Заполните форму и затем найдите выбранный Вами способ. Следуйте дальнейшим инструкциям.\r\n\r\n<br><br><br>\r\nЧтобы продолжить оплату, нажмите:<br>\r\n\r\n\r\n<form method=''get'' action=''https://pay.freekassa.ru/''>\r\n    <input type=''hidden'' name=''m'' value=''{FREE_MID}''>\r\n    <input type=''hidden'' name=''oa'' value=''{rur}''>\r\n    <input type=''hidden'' name=''o'' value=''{bill_id}''>\r\n    <input type=''hidden'' name=''s'' value=''{FREE_CODE}''>\r\n    <input type="hidden" name="currency" value="RUB">\r\n    <input type=''hidden'' name=''lang'' value=''ru''>\r\n    <input type=''submit'' name=''pay'' value=''Оплатить''>\r\n </form>\r\n'),
('enot', 'Enot.io', '<form method=''get'' action=''https://enot.io/pay''>\r\n            <input type=''hidden'' name=''m'' value=''{enot_id}''>\r\n            <input type=''hidden'' name=''oa'' value=''{sum}''>\r\n            <input type=''hidden'' name=''o'' value=''{bill_id}''>\r\n          <input type=''hidden'' name=''s'' value=''{enot_sign}''>\r\n            <input type="submit" value="Перейти к оплате" />\r\n        </form>'),
('direct', 'Прямой перевод с карты на карту', 'Если у вас не проходит оплата или вы хотите оплатить счёт без комиссии платежной системы, вы можете оплатить переводом с карты на карту. \r\n<br><br>\r\n Чтобы оплатить заказ данным способом, переведите сумму указанную в вашем счёте на карту: <b>2200-7302-4102-3791</b><br><br>\r\n\r\nПосле оплаты, напишите в чат онлайн консультанту на сайте (значок внизу справа) о том, что вы оплатили и укажите вашу почту. <br><br>Мы сразу проверим поступление средств и отправим вам доступ.\r\n<br><br>\r\n<b>p.s.</b> время работы онлайн консультанта с 9:00 до 24:00 по МСК. Если вы произвели оплату в нерабочее время, также напишите онлайн консультанту. Мы проверим оплату с 9:00 по МСК и сразу отправим вам доступ.');

-- --------------------------------------------------------

--
-- Структура таблицы `ob_way_list`
--

CREATE TABLE IF NOT EXISTS `ob_way_list` (
  `plist_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `ways` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `advanced` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ob_way_list`
--

INSERT INTO `ob_way_list` (`plist_id`, `title`, `pic`, `url`, `ways`, `category`, `position`, `advanced`) VALUES
(53, 'Связной', 'sv', '', 'robox', 'Оплата наличными', 132, ''),
(51, 'Perfect Money', 'pm', '', 'freekassa', 'Электронные платежи', 8, ''),
(52, 'Евросеть', 'euro', '', 'robox', 'Оплата наличными', 133, ''),
(50, 'Payeer', 'payeer', '', 'freekassa', 'Электронные платежи', 7, ''),
(47, 'Сбербанк Онлайн', 'sber', '', 'fondy,yandexkassa', 'Интернет-банки', 4, ''),
(48, 'Google Pay', 'google', '', 'freekassa', 'Электронные платежи', 4, ''),
(49, 'Apple Pay', 'apple', '', 'freekassa', 'Электронные платежи', 5, ''),
(45, 'Банковский перевод в России', 'bank', '', 'w1_online', 'Банковские и другие переводы', 1, ''),
(46, 'Почтовый перевод в рублях', 'post', '', 'w1_online', 'Банковские и другие переводы', 2, ''),
(42, 'Промсвязьбанк', 'prom', '', 'w1_online', 'Интернет-банки', 11, ''),
(43, 'Тинькофф', 'tinkoff', '', 'w1_online', 'Интернет-банки', 5, ''),
(9, 'WebMoney Z', 'webmoney', 'http://webmoney.ru/', 'wmz', 'Электронные платежи', 101, ''),
(10, 'WebMoney P', 'webmoney', 'http://webmoney.ru/', 'wmr', 'Электронные платежи', 102, ''),
(32, 'Яндекс.Деньги', 'yandex_online', 'http://money.yandex.ru/', 'freekassa', 'Электронные платежи', 2, ''),
(59, 'Beeline', 'beeline', '', 'paymaster', 'Мобильные платежи', 300, ''),
(60, 'Мегафон', 'megafon', '', 'paymaster', 'Мобильные платежи', 310, ''),
(61, 'Tele2', 'tele2', '', 'paymaster', 'Мобильные платежи', 320, ''),
(16, 'Банковскими картами', 'card', '', 'freekassa', 'Электронные платежи', 0, ''),
(17, 'Терминалы приёма оплаты', 'terminal', '', 'w1_online', 'Оплата наличными', 200, ''),
(36, 'Альфабанк', 'alpha', '', 'robox', 'Интернет-банки', 6, ''),
(37, 'Webmoney', 'webmoney', '', 'robox', 'Электронные платежи', 104, ''),
(38, 'Банковской картой', 'mir', '', 'wmz', 'Электронные платежи', 1, ''),
(39, 'Приват 24', 'privat24', '', 'interkassa,liqpay', 'Интернет-банки', 8, ''),
(40, 'Bitcoin', 'bitcoin', '', 'freekassa', 'Электронные платежи', 9, ''),
(41, ' SWIFT Банковский перевод', 'swift', '', 'interkassa', 'Банковские и другие переводы', 3, ''),
(54, 'WeChat Pay', 'we', '', 'paymaster', 'Электронные платежи', 160, ''),
(55, 'Банк русский стандарт', 'rus', '', 'paymaster', 'Интернет-банки', 9, ''),
(34, 'Qiwi', 'qiwi', 'http://qiwi.ru/', 'freekassa', 'Электронные платежи', 3, ''),
(57, 'PayPal', 'paypal', 'http://paypal.com/', 'paypal_online', 'Электронные платежи', 155, ''),
(56, 'ВТБ24', 'vtb', '', 'paymaster', 'Интернет-банки', 10, ''),
(58, 'Карта Халва', 'halva', '', 'paymaster', 'Интернет-банки', 11, ''),
(62, 'МТС', 'mts', '', 'paymaster', 'Мобильные платежи', 330, ''),
(64, 'Банковскими картами, прямой перевод без комиссии', 'card', '', 'direct', 'Электронные платежи', 1, '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ob_2checkout`
--
ALTER TABLE `ob_2checkout`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_ad`
--
ALTER TABLE `ob_ad`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_ad_category`
--
ALTER TABLE `ob_ad_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_affstats`
--
ALTER TABLE `ob_affstats`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_anew`
--
ALTER TABLE `ob_anew`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_area`
--
ALTER TABLE `ob_area`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_area_item`
--
ALTER TABLE `ob_area_item`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_area_paylist`
--
ALTER TABLE `ob_area_paylist`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_area_section`
--
ALTER TABLE `ob_area_section`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_area_user`
--
ALTER TABLE `ob_area_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_article`
--
ALTER TABLE `ob_article`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_article_category`
--
ALTER TABLE `ob_article_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_author`
--
ALTER TABLE `ob_author`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_bill`
--
ALTER TABLE `ob_bill`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_black`
--
ALTER TABLE `ob_black`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_category`
--
ALTER TABLE `ob_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_client`
--
ALTER TABLE `ob_client`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_cupon`
--
ALTER TABLE `ob_cupon`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_cupon_category`
--
ALTER TABLE `ob_cupon_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_good`
--
ALTER TABLE `ob_good`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_good_group`
--
ALTER TABLE `ob_good_group`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_letter`
--
ALTER TABLE `ob_letter`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_log`
--
ALTER TABLE `ob_log`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_lookup`
--
ALTER TABLE `ob_lookup`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_mailclick`
--
ALTER TABLE `ob_mailclick`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_odno`
--
ALTER TABLE `ob_odno`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_order`
--
ALTER TABLE `ob_order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_page`
--
ALTER TABLE `ob_page`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_partner`
--
ALTER TABLE `ob_partner`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_partner_auto`
--
ALTER TABLE `ob_partner_auto`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_partner_personal`
--
ALTER TABLE `ob_partner_personal`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_payout`
--
ALTER TABLE `ob_payout`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_pin`
--
ALTER TABLE `ob_pin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_pincat`
--
ALTER TABLE `ob_pincat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_plink`
--
ALTER TABLE `ob_plink`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_queue`
--
ALTER TABLE `ob_queue`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_rass`
--
ALTER TABLE `ob_rass`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_rass_letter`
--
ALTER TABLE `ob_rass_letter`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_rass_sub`
--
ALTER TABLE `ob_rass_sub`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_rass_user`
--
ALTER TABLE `ob_rass_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_receipt`
--
ALTER TABLE `ob_receipt`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `ob_s`
--
ALTER TABLE `ob_s`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_session`
--
ALTER TABLE `ob_session`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_settings`
--
ALTER TABLE `ob_settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_shorten`
--
ALTER TABLE `ob_shorten`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_special`
--
ALTER TABLE `ob_special`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_staff`
--
ALTER TABLE `ob_staff`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_staff_access`
--
ALTER TABLE `ob_staff_access`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_ticket`
--
ALTER TABLE `ob_ticket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_ticket_answer`
--
ALTER TABLE `ob_ticket_answer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_ticket_section`
--
ALTER TABLE `ob_ticket_section`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ob_way`
--
ALTER TABLE `ob_way`
  ADD PRIMARY KEY (`way_id`);

--
-- Индексы таблицы `ob_way_list`
--
ALTER TABLE `ob_way_list`
  ADD PRIMARY KEY (`plist_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ob_2checkout`
--
ALTER TABLE `ob_2checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_ad`
--
ALTER TABLE `ob_ad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_ad_category`
--
ALTER TABLE `ob_ad_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `ob_affstats`
--
ALTER TABLE `ob_affstats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_anew`
--
ALTER TABLE `ob_anew`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_area`
--
ALTER TABLE `ob_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_area_item`
--
ALTER TABLE `ob_area_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_area_paylist`
--
ALTER TABLE `ob_area_paylist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_area_section`
--
ALTER TABLE `ob_area_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_area_user`
--
ALTER TABLE `ob_area_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_article`
--
ALTER TABLE `ob_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_article_category`
--
ALTER TABLE `ob_article_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_bill`
--
ALTER TABLE `ob_bill`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=389;
--
-- AUTO_INCREMENT для таблицы `ob_black`
--
ALTER TABLE `ob_black`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_category`
--
ALTER TABLE `ob_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `ob_client`
--
ALTER TABLE `ob_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=146;
--
-- AUTO_INCREMENT для таблицы `ob_cupon`
--
ALTER TABLE `ob_cupon`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_cupon_category`
--
ALTER TABLE `ob_cupon_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `ob_good_group`
--
ALTER TABLE `ob_good_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_log`
--
ALTER TABLE `ob_log`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=770;
--
-- AUTO_INCREMENT для таблицы `ob_lookup`
--
ALTER TABLE `ob_lookup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT для таблицы `ob_mailclick`
--
ALTER TABLE `ob_mailclick`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `ob_odno`
--
ALTER TABLE `ob_odno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_order`
--
ALTER TABLE `ob_order`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=422;
--
-- AUTO_INCREMENT для таблицы `ob_page`
--
ALTER TABLE `ob_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_partner_auto`
--
ALTER TABLE `ob_partner_auto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_partner_personal`
--
ALTER TABLE `ob_partner_personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_payout`
--
ALTER TABLE `ob_payout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_pin`
--
ALTER TABLE `ob_pin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_pincat`
--
ALTER TABLE `ob_pincat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_queue`
--
ALTER TABLE `ob_queue`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=677;
--
-- AUTO_INCREMENT для таблицы `ob_rass`
--
ALTER TABLE `ob_rass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_rass_letter`
--
ALTER TABLE `ob_rass_letter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_rass_sub`
--
ALTER TABLE `ob_rass_sub`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_rass_user`
--
ALTER TABLE `ob_rass_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_s`
--
ALTER TABLE `ob_s`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_shorten`
--
ALTER TABLE `ob_shorten`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_special`
--
ALTER TABLE `ob_special`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_staff`
--
ALTER TABLE `ob_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `ob_ticket_answer`
--
ALTER TABLE `ob_ticket_answer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_ticket_section`
--
ALTER TABLE `ob_ticket_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ob_way_list`
--
ALTER TABLE `ob_way_list`
  MODIFY `plist_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
