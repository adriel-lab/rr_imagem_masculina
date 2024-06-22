-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/01/2024 às 14:32
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `msms_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `appointment_list`
--

CREATE TABLE `appointment_list` (
  `id` int(30) NOT NULL,
  `fullname` text NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `schedule` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `total` float NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL,
  `barber` varchar(50) NOT NULL,
  `barber_id` tinyint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `appointment_list`
--

INSERT INTO `appointment_list` (`id`, `fullname`, `contact`, `email`, `schedule`, `status`, `total`, `date_created`, `date_updated`, `barber`, `barber_id`) VALUES
(26, 'Thiago ferreira', '13996453169', 'softgamebr4@gmail.com', '2023-10-10 12:30:00', 0, 0, '2023-10-10 09:43:22', NULL, 'Ezequiel Duarte', 8),
(27, 'robson', '13996453169', 'softgamebr4@gmail.com', '2023-10-10 13:00:00', 0, 0, '2023-10-10 09:57:17', NULL, 'Ezequiel Duarte', 8),
(28, 'Thiago ferreira', '13996453169', 'Ezequiel Duarte', '2024-01-09 12:05:00', 0, 25, '2024-01-08 12:05:24', NULL, '', 0),
(29, 'Thiago ferreira', '13996453169', 'Ezequiel Duarte', '2024-01-09 12:05:00', 0, 25, '2024-01-08 12:05:42', NULL, '', 0),
(30, 'Maria Rosane', '13996453169', 'softgamebr4@gmail.com', '2024-01-11 12:30:00', 0, 0, '2024-01-11 09:00:45', NULL, 'Ezequiel Duarte', 8),
(31, 'teste1', '13996453169', 'softgamebr4@gmail.com', '2024-01-11 16:00:00', 0, 0, '2024-01-11 10:45:53', NULL, 'Ezequiel Duarte', 8),
(32, 'teste2', '13996453169', 'softgamebr4@gmail.com', '2024-01-12 00:00:00', 0, 0, '2024-01-11 10:47:32', NULL, 'Adriel Dias44', 0),
(33, 'teste3', '13996453169', 'softgamebr4@gmail.com', '2024-01-11 13:00:00', 0, 0, '2024-01-11 10:59:51', NULL, 'Mateus Morch', 10),
(34, 'teste4', '13996453169', 'softgamebr4@gmail.com', '2024-01-11 14:00:00', 0, 0, '2024-01-11 12:40:37', NULL, 'Ezequiel Duarte', 8),
(35, 'Teste5', '13996453169', 'softgamebr4@gmail.com', '2024-01-11 16:30:00', 0, 0, '2024-01-11 12:47:34', NULL, 'Ezequiel Duarte', 8),
(36, 'teste6', '13996453169', 'softgamebr4@gmail.com', '2024-01-12 12:30:00', 0, 0, '2024-01-11 12:53:43', NULL, 'Ezequiel Duarte', 8),
(37, 'Teste7', '13996453169', 'softgamebr4@gmail.com', '2024-01-12 14:30:00', 0, 0, '2024-01-11 12:55:15', NULL, 'Ezequiel Duarte', 8),
(38, 'teste8', '13996236645555', 'softgamebr4@gmail.com', '2024-01-11 17:30:00', 0, 0, '2024-01-11 12:56:51', NULL, 'Ezequiel Duarte', 8),
(39, 'Thiago ferreira', '13996236645', 'softgamebr4@gmail.com', '2024-01-12 13:00:00', 0, 0, '2024-01-11 13:48:20', NULL, 'Ezequiel Duarte', 8),
(40, 'Thiago ferreira', '13996236645555', 'softgamebr4@gmail.com', '2024-01-12 13:30:00', 0, 0, '2024-01-11 14:05:40', NULL, 'Ezequiel Duarte', 8),
(41, 'Thiago ferreira', '13996236645555', 'softgamebr4@gmail.com', '2024-01-12 14:00:00', 0, 0, '2024-01-11 14:07:40', NULL, 'Ezequiel Duarte', 8),
(42, 'Thiago ferreira', '13996236645555', 'softgamebr4@gmail.com', '2024-01-12 18:00:00', 0, 0, '2024-01-11 14:15:00', NULL, 'Ezequiel Duarte', 8),
(43, 'Thiago ferreira', '13996236645555', 'softgamebr4@gmail.com', '2024-01-12 15:30:00', 0, 0, '2024-01-11 14:28:47', NULL, 'Ezequiel Duarte', 8),
(44, 'Thiago ferreira', '13996236645555', 'softgamebr4@gmail.com', '2024-01-12 16:00:00', 0, 0, '2024-01-11 14:29:53', NULL, 'Ezequiel Duarte', 8),
(45, 'Thiago ferreira', '13996236645555', 'softgamebr4@gmail.com', '2024-01-12 15:00:00', 0, 0, '2024-01-11 15:36:23', NULL, 'Ezequiel Duarte', 8),
(46, 'Thiago ferreira', '13996236645555', 'softgamebr4@gmail.com', '2024-01-13 13:00:00', 0, 0, '2024-01-11 15:40:32', NULL, 'Ezequiel Duarte', 8),
(47, 'teste3', '623673733773', 'softgamebr4@gmail.com', '2024-01-12 16:30:00', 0, 0, '2024-01-11 15:46:58', NULL, 'Ezequiel Duarte', 8),
(48, 'Teste', '727373748484', 'softgamebr4@gmail.com', '2024-01-12 17:00:00', 0, 0, '2024-01-11 15:51:40', NULL, 'Ezequiel Duarte', 8),
(49, 'Thiago ferreira', '13996236645555', 'softgamebr4@gmail.com', '2024-01-12 17:30:00', 0, 0, '2024-01-11 15:52:41', NULL, 'Ezequiel Duarte', 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `appointment_service`
--

CREATE TABLE `appointment_service` (
  `appointment_id` int(30) NOT NULL,
  `service_id` int(30) NOT NULL,
  `cost` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `appointment_service`
--

INSERT INTO `appointment_service` (`appointment_id`, `service_id`, `cost`) VALUES
(28, 10, 25),
(29, 10, 25);

-- --------------------------------------------------------

--
-- Estrutura para tabela `barbeiros`
--

CREATE TABLE `barbeiros` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `disponibilidade` enum('Disponível','Indisponível') NOT NULL DEFAULT 'Disponível'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `barbeiros`
--

INSERT INTO `barbeiros` (`id`, `nome`, `disponibilidade`) VALUES
(1, 'Adriel Dias', 'Indisponível'),
(2, 'Jussara', 'Indisponível'),
(3, 'Mateus Morch', 'Indisponível'),
(4, 'Adriel Ferreira Dias Souza', 'Indisponível'),
(5, 'Adriel Ferreira Dias Souza', 'Indisponível'),
(8, 'Ezequiel Duarte', 'Disponível'),
(9, 'Adriel Dias44', 'Disponível'),
(10, 'Mateus Morch', 'Disponível');

-- --------------------------------------------------------

--
-- Estrutura para tabela `lojas`
--

CREATE TABLE `lojas` (
  `id` int(11) NOT NULL,
  `shopEmail` varchar(255) DEFAULT NULL,
  `shopContact` varchar(255) DEFAULT NULL,
  `shopAddress` varchar(255) DEFAULT NULL,
  `shopOpenTime` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `lojas`
--

INSERT INTO `lojas` (`id`, `shopEmail`, `shopContact`, `shopAddress`, `shopOpenTime`) VALUES
(1, 'adriel@email.com', '13996453169', 'av.arpoador', '9:30');

-- --------------------------------------------------------

--
-- Estrutura para tabela `service_list`
--

CREATE TABLE `service_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `cost` float NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `service_list`
--

INSERT INTO `service_list` (`id`, `name`, `description`, `cost`, `status`, `date_created`, `date_updated`) VALUES
(2, 'Hair Color', 'Hair Color', 150, 1, '2021-12-01 11:04:31', '2023-09-22 18:06:25'),
(3, 'Hair Style with Half Body Massage', 'Hair Style with Half Body Massage', 250, 1, '2021-12-01 11:04:56', NULL),
(5, 'Scalp Massage & Conditioning Treatment', 'Scalp Massage & Conditioning Treatment', 300, 1, '2021-12-01 11:07:25', '2021-12-01 11:07:33'),
(9, 'Corte', 'Corte de cabelo', 35, 1, '2023-09-22 18:07:36', '2023-09-22 18:07:48'),
(10, 'Barba', 'Corte de barba', 25, 1, '2023-09-22 18:08:27', NULL),
(11, 'teste', 'refefewf', 70, 0, '2023-09-28 10:32:46', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Sistema Barbearia'),
(6, 'short_name', 'Barber'),
(11, 'logo', 'uploads/logo-1638326146.png'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover-1638326239.png'),
(15, 'content', 'Array'),
(16, 'email', 'info@barbers.com'),
(17, 'contact', '09123456789 / 456-4568-7899'),
(18, 'from_time', '09:00'),
(19, 'to_time', '19:00'),
(20, 'address', 'Under the Tree, Here Street, There City, Anywhere 2306');

-- --------------------------------------------------------

--
-- Estrutura para tabela `time_slots`
--

CREATE TABLE `time_slots` (
  `id` int(11) NOT NULL,
  `barber_id` int(11) DEFAULT NULL,
  `time_slot` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `time_slots`
--

INSERT INTO `time_slots` (`id`, `barber_id`, `time_slot`) VALUES
(23, 9, '00:00:00'),
(60, 10, '08:00:00'),
(61, 10, '08:30:00'),
(62, 10, '09:00:00'),
(63, 10, '09:30:00'),
(64, 10, '10:00:00'),
(65, 10, '10:30:00'),
(66, 10, '11:00:00'),
(67, 10, '11:30:00'),
(68, 10, '12:00:00'),
(69, 10, '12:30:00'),
(70, 10, '13:00:00'),
(71, 10, '13:30:00'),
(72, 10, '14:00:00'),
(73, 10, '14:30:00'),
(74, 10, '15:00:00'),
(75, 10, '15:30:00'),
(76, 10, '16:00:00'),
(77, 10, '16:30:00'),
(78, 10, '17:00:00'),
(79, 10, '17:30:00'),
(80, 10, '18:00:00'),
(81, 10, '18:30:00'),
(82, 10, '19:00:00'),
(83, 10, '19:30:00'),
(84, 10, '20:00:00'),
(96, 8, '13:00:00'),
(97, 8, '13:30:00'),
(98, 8, '14:00:00'),
(99, 8, '14:30:00'),
(100, 8, '15:00:00'),
(101, 8, '15:30:00'),
(102, 8, '16:00:00'),
(103, 8, '16:30:00'),
(104, 8, '17:00:00'),
(105, 8, '17:30:00'),
(106, 8, '18:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0=not verified, 1 = verified',
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `status`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', '', '', 'adriel', '1234', 'uploads/avatar-1.png?v=1635556826', NULL, 1, 1, '2021-01-20 14:02:37', '2023-09-22 17:58:55'),
(5, 'Adminstrator', NULL, 'Admin', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'uploads/avatar-1.png?v=1635556826', NULL, 1, 1, '2021-01-20 14:02:37', '2023-09-22 07:42:29');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `appointment_list`
--
ALTER TABLE `appointment_list`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `appointment_service`
--
ALTER TABLE `appointment_service`
  ADD KEY `appointment_id` (`appointment_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Índices de tabela `barbeiros`
--
ALTER TABLE `barbeiros`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `lojas`
--
ALTER TABLE `lojas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `service_list`
--
ALTER TABLE `service_list`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `time_slots`
--
ALTER TABLE `time_slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barber_id` (`barber_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `appointment_list`
--
ALTER TABLE `appointment_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `barbeiros`
--
ALTER TABLE `barbeiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `lojas`
--
ALTER TABLE `lojas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `service_list`
--
ALTER TABLE `service_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `time_slots`
--
ALTER TABLE `time_slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `appointment_service`
--
ALTER TABLE `appointment_service`
  ADD CONSTRAINT `appointment_service_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `service_list` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointment_service_ibfk_3` FOREIGN KEY (`appointment_id`) REFERENCES `appointment_list` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `time_slots`
--
ALTER TABLE `time_slots`
  ADD CONSTRAINT `time_slots_ibfk_1` FOREIGN KEY (`barber_id`) REFERENCES `barbeiros` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
