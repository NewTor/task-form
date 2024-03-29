-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 11 2019 г., 07:42
-- Версия сервера: 5.5.53-log
-- Версия PHP: 7.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `task_form`
--

DELIMITER $$
--
-- Процедуры
--
CREATE DEFINER=`root`@`%` PROCEDURE `sp_SaveData` (IN `email` VARCHAR(255), IN `name` VARCHAR(255), IN `message` TEXT)  BEGIN
INSERT INTO `users_email` (`id`, `email`, `name`, `message`, `create`) VALUES (NULL, email, name, message, UNIX_TIMESTAMP());
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `users_email`
--

CREATE TABLE `users_email` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `create` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users_email`
--
ALTER TABLE `users_email`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users_email`
--
ALTER TABLE `users_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;