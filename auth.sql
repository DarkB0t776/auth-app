-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2020 at 04:15 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auth`
--

-- --------------------------------------------------------

--
-- Table structure for table `eng`
--

CREATE TABLE `eng` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm_password` varchar(50) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `register` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `logout` varchar(50) NOT NULL,
  `profile` varchar(50) NOT NULL,
  `name_type_error` varchar(70) NOT NULL,
  `name_length_error` varchar(70) NOT NULL,
  `email_empty_error` varchar(70) NOT NULL,
  `email_type_error` varchar(70) NOT NULL,
  `email_exists_error` varchar(70) NOT NULL,
  `password_length_error` varchar(70) NOT NULL,
  `password_match_error` varchar(70) NOT NULL,
  `image_type_error` varchar(70) NOT NULL,
  `user_not_found` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eng`
--

INSERT INTO `eng` (`id`, `name`, `email`, `password`, `confirm_password`, `avatar`, `register`, `login`, `logout`, `profile`, `name_type_error`, `name_length_error`, `email_empty_error`, `email_type_error`, `email_exists_error`, `password_length_error`, `password_match_error`, `image_type_error`, `user_not_found`) VALUES
(1, 'Name', 'Email', 'Password', 'Confirm Password', 'Avatar', 'Register', 'Log In', 'Log Out', 'Profile', 'Name should consist of letters only', 'Name should not be less than 2 characters', 'Email should not be empty', 'Email is invalid', 'Email already exists', 'Password length should be at least 6 characters', 'Passwords do not match', 'Only gif, jpg or png extension is allowed', 'Password or Email is invalid');

-- --------------------------------------------------------

--
-- Table structure for table `ua`
--

CREATE TABLE `ua` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm_password` varchar(50) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `register` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `logout` varchar(50) NOT NULL,
  `Profile` varchar(50) NOT NULL,
  `name_type_error` varchar(70) NOT NULL,
  `name_length_error` varchar(70) NOT NULL,
  `email_empty_error` varchar(70) NOT NULL,
  `email_type_error` varchar(70) NOT NULL,
  `email_exists_error` varchar(70) NOT NULL,
  `password_length_error` varchar(70) NOT NULL,
  `password_match_error` varchar(70) NOT NULL,
  `image_type_error` varchar(70) NOT NULL,
  `user_not_found` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ua`
--

INSERT INTO `ua` (`id`, `name`, `email`, `password`, `confirm_password`, `avatar`, `register`, `login`, `logout`, `Profile`, `name_type_error`, `name_length_error`, `email_empty_error`, `email_type_error`, `email_exists_error`, `password_length_error`, `password_match_error`, `image_type_error`, `user_not_found`) VALUES
(1, 'Ім\'я', 'Електронна адреса', 'Пароль', 'Підтвердити пароль', 'Аватар', 'Зареєструватися', 'Увійти', 'Вихід', 'Профіль', 'Ім\'я повинно містити тільки букви', 'Ім\'я повинно бути не менше 2 символів', 'Електронна адреса не повинна бути пустою', 'Невірний формат електронної адреси', 'Електронна адреса вже існує', 'Пароль повинен містити мінімум 6 символів', 'Паролі не співпадають', 'Картинка повинна мати розширення gif, jpg або png', 'Невірний логін або пароль');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `avatar`, `created_at`) VALUES
(10, 'Dima', 'dima@gmail.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', '618941051.jpg', '2020-03-31 14:12:25'),
(11, 'Bob', 'bob@bob.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', NULL, '2020-03-31 14:13:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eng`
--
ALTER TABLE `eng`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ua`
--
ALTER TABLE `ua`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `email_pass` (`email`,`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eng`
--
ALTER TABLE `eng`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ua`
--
ALTER TABLE `ua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
