-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 22/06/2024 às 16:33
-- Versão do servidor: 5.7.23-23
-- Versão do PHP: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `rrimag18_msms`
--
CREATE DATABASE IF NOT EXISTS `rrimag18_msms` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `rrimag18_msms`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `appointment_list`
--

CREATE TABLE `appointment_list` (
  `id` int(30) NOT NULL,
  `fullname` text NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `schedule` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `total` float NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL,
  `barber` varchar(50) NOT NULL,
  `barber_id` tinyint(255) NOT NULL,
  `service` text NOT NULL,
  `pagamento` varchar(20) NOT NULL,
  `combo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `appointment_list`
--

INSERT INTO `appointment_list` (`id`, `fullname`, `cpf`, `contact`, `email`, `schedule`, `status`, `total`, `date_created`, `date_updated`, `barber`, `barber_id`, `service`, `pagamento`, `combo`) VALUES
(548, 'Adriel Dias', '50721355862', '13996453169', 'encodeme.pg.br@gmail.com', '2024-03-12 23:30:00', 2, 0, '2024-03-12 22:06:54', NULL, 'Renan Ricardo', 8, '9', 'pix', 'invalido'),
(549, 'Irmão do Misa', '550.942.828-75', '', '', '2024-03-20 19:30:00', 2, 0, '2024-03-15 12:36:49', NULL, 'Rychard Rombaldo', 9, '9', 'dinheiro', 'invalido'),
(550, 'Enzo Quintino Ruiz De Oliveira', '449.938.748-55', '13996141576', 'enzoru290109@gmail.com', '2024-03-20 10:00:00', 2, 0, '2024-03-19 23:24:44', NULL, 'Rychard Rombaldo', 9, '9', 'pix', 'invalido'),
(551, 'Gustavo Miranda ', '374.259.978-00', '13996787215', 'gustavo_adnarim@hotmail.com', '2024-03-21 18:00:00', 2, 0, '2024-03-20 23:27:54', NULL, 'Renan Ricardo', 8, '9', 'pix', 'invalido'),
(552, 'Gabriel ', '324.905.148-90', '13981040794', 'gabriel.headbanger@outlook.com', '2024-03-25 15:00:00', 2, 0, '2024-03-25 12:19:08', NULL, 'Renan Ricardo', 8, '9', 'dinheiro', 'invalido'),
(554, 'Jefferson Martins da Silva ', '35278659858', '13981453546', 'advjeffersonmartins@gmail.com', '2024-04-01 14:00:00', 2, 0, '2024-04-01 08:31:53', NULL, 'Renan Ricardo', 8, '9', 'pix', 'invalido'),
(555, 'Daniel Lelis ', '568.154.858-97', '13 97808-2152', 'daniellelisgomes235@gmail.com', '2024-04-12 17:00:00', 1, 0, '2024-04-05 08:49:33', NULL, 'Renan Ricardo', 8, '9', 'debito', 'invalido'),
(556, 'Gabriel ', '324.905.148-90', '13981040794', 'gabriel.headbanger@outlook.com', '2024-04-13 17:00:00', 0, 0, '2024-04-13 14:23:31', NULL, 'Renan Ricardo', 8, '9', 'debito', 'invalido'),
(557, 'Edilson de Jesus Lima ', '27864226809', '13 997415335', 'edilsonjesus2409@gmail.com', '2024-04-19 22:00:00', 2, 0, '2024-04-14 13:08:21', NULL, 'Renan Ricardo', 8, '9', 'credito', 'invalido'),
(558, 'Ronaldo Sales dos Santos Junior ', '45112982896', '13996386288', 'ronaldos.s.junior283@gmail.com', '2024-04-20 08:00:00', 2, 0, '2024-04-15 18:31:26', NULL, 'Renan Ricardo', 8, '9', 'pix', 'invalido'),
(559, 'Daniel Carmona ', '219.016.228-94', '11937722609', 'carmonaconsultor@yahoo.com.br', '2024-04-18 16:00:00', 2, 0, '2024-04-18 08:35:27', NULL, 'Renan Ricardo', 8, 'invalido', 'pix', '3'),
(560, '', '', '', '', '2024-04-18 16:30:00', 0, 0, '2024-04-18 08:35:27', NULL, '', 8, '', '', ''),
(561, 'Gabriel Bito dos Santos ', '425 088 068 03 ', '13997940828', 'bitogabriel901@gmail.com', '2024-04-26 15:30:00', 2, 0, '2024-04-22 21:32:50', NULL, 'Renan Ricardo', 8, 'invalido', 'pix', '3'),
(562, '', '', '', '', '2024-04-26 16:00:00', 0, 0, '2024-04-22 21:32:50', NULL, '', 8, '', '', ''),
(563, 'Leandro Araújo ', '332.749.018-06', '(13) 9 9753-9443', 'leandroaraujomuniz@gmail.com', '2024-04-27 15:00:00', 0, 0, '2024-04-24 12:32:35', NULL, 'Rychard Rombaldo', 9, 'invalido', 'pix', '3'),
(564, '', '', '', '', '2024-04-27 15:30:00', 0, 0, '2024-04-24 12:32:35', NULL, '', 9, '', '', ''),
(565, 'Diego Henrique da Silva', '00946254176', '13997401605', 'diegoheenrique10@gmail.com', '2024-04-27 15:00:00', 1, 0, '2024-04-24 12:38:10', NULL, 'Renan Ricardo', 8, 'invalido', 'pix', '4'),
(566, '', '', '', '', '2024-04-27 15:30:00', 0, 0, '2024-04-24 12:38:10', NULL, '', 8, '', '', ''),
(567, 'Jose', '22689733870', '11940750790', 'Rodrigofcianni1982@hotmail.com', '2024-04-26 15:00:00', 2, 0, '2024-04-26 13:50:49', NULL, 'Renan Ricardo', 8, '9', 'credito', 'invalido'),
(568, 'Jefferson Martins da Silva ', '35278659858', '13981453546', 'advjeffersonmartins@gmail.com', '2024-04-27 10:00:00', 2, 0, '2024-04-26 21:50:31', NULL, 'Renan Ricardo', 8, '9', 'pix', 'invalido'),
(569, 'Misael ', '318.227.378-77', '13975110527', 'misabim@gmail.com', '2024-05-01 13:00:00', 2, 0, '2024-04-29 22:15:37', NULL, 'Renan Ricardo', 8, '9', 'pix', 'invalido'),
(570, 'Wellinton da cunha Pires', '104.123.978-54', '13974041544', 'wellintonpires287@gmail.com', '2024-05-01 13:30:00', 2, 0, '2024-04-30 11:55:05', NULL, 'Renan Ricardo', 8, 'invalido', 'pix', '1'),
(571, '', '', '', '', '2024-05-01 14:00:00', 0, 0, '2024-04-30 11:55:05', NULL, '', 8, '', '', ''),
(574, 'Guilherme Blazques', '000.000.000-00', '13996510991', 'rrimagemmasculina@gmail.com', '2024-05-10 11:30:00', 2, 0, '2024-05-08 17:45:07', NULL, 'Rychard Rombaldo', 9, '9', 'pix', 'invalido'),
(575, 'Daniel Lelis ', '000.000.000-00', '13 978082151', 'rrimagemmasculina@gmail.com', '2024-05-24 17:30:00', 2, 0, '2024-05-20 19:04:10', NULL, 'Renan Ricardo', 8, '9', 'pix', 'invalido'),
(576, 'Raphael seron ', '000.000.000-00', '13997166899', 'rrimagemmasculina@gmail.com', '2024-05-25 15:30:00', 2, 0, '2024-05-24 21:31:11', NULL, 'Renan Ricardo', 8, '9', 'credito', 'invalido'),
(577, 'Jefferson Martins da Silva ', '000.000.000-00', '13981453546', 'rrimagemmasculina@gmail.com', '2024-05-25 10:30:00', 2, 0, '2024-05-24 23:14:00', NULL, 'Renan Ricardo', 8, '9', 'pix', 'invalido'),
(578, 'Edivaldo ', '000.000.000-00', '13 997564566', 'rrimagemmasculina@gmail.com', '2024-06-11 17:30:00', 2, 0, '2024-06-11 16:02:07', NULL, 'Renan Ricardo', 8, '9', 'dinheiro', 'invalido'),
(579, 'Jefferson Martins da Silva ', '000.000.000-00', '13981453546', 'rrimagemmasculina@gmail.com', '2024-06-15 11:00:00', 2, 0, '2024-06-15 09:52:35', NULL, 'Renan Ricardo', 8, '9', 'pix', 'invalido');

-- --------------------------------------------------------

--
-- Estrutura para tabela `barbeiros`
--

CREATE TABLE `barbeiros` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `disponibilidade` enum('Disponível','Indisponível') NOT NULL DEFAULT 'Disponível',
  `user` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `barbeiros`
--

INSERT INTO `barbeiros` (`id`, `nome`, `disponibilidade`, `user`, `email`, `password`, `telefone`) VALUES
(8, 'Renan Ricardo', 'Disponível', 'renan', 'renanricardoempreendedor@gmail.com', '011524', '13991335522'),
(9, 'Rychard Rombaldo', 'Disponível', 'Rychard', 'rychard.rombaldo@etec.sp.gov.br', '2412RY.BR', '19982143556');

-- --------------------------------------------------------

--
-- Estrutura para tabela `barber_days`
--

CREATE TABLE `barber_days` (
  `id` int(11) NOT NULL,
  `barber_id` int(11) NOT NULL,
  `day` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `barber_days`
--

INSERT INTO `barber_days` (`id`, `barber_id`, `day`) VALUES
(942, 9, 'Segunda'),
(943, 9, 'Terça'),
(944, 9, 'Quarta'),
(945, 9, 'Quinta'),
(946, 9, 'Sexta'),
(947, 9, 'Sábado'),
(948, 9, 'Domingo'),
(1072, 8, 'Segunda'),
(1073, 8, 'Terça'),
(1074, 8, 'Quarta'),
(1075, 8, 'Quinta'),
(1076, 8, 'Sexta'),
(1077, 8, 'Sábado'),
(1078, 8, 'Domingo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `disponibilidade_dias`
--

CREATE TABLE `disponibilidade_dias` (
  `id` int(11) NOT NULL,
  `barbeiro_id` int(11) DEFAULT NULL,
  `dia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `service_list`
--

INSERT INTO `service_list` (`id`, `name`, `description`, `cost`, `status`, `date_created`, `date_updated`) VALUES
(9, 'Corte', 'Corte de cabelo', 35.00, 1, '2023-09-22 18:07:36', '2023-09-22 18:07:48'),
(13, 'Barba', 'Barba feita com maquina.', 30.00, 1, '2024-03-12 22:47:56', NULL),
(14, 'HIDRATAÇÃO ', 'LAVAGEM COM APLICAÇÃO DA MASCARA', 25.00, 1, '2024-03-12 22:58:21', NULL),
(15, 'ALISAMENTO', 'ALISAMENTO', 30.00, 1, '2024-03-12 22:58:21', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `service_list_combos`
--

CREATE TABLE `service_list_combos` (
  `combo_id` int(11) NOT NULL,
  `combo_name` varchar(100) DEFAULT NULL,
  `description` text,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `service_list_combos`
--

INSERT INTO `service_list_combos` (`combo_id`, `combo_name`, `description`, `price`) VALUES
(1, 'Cabelo + Barba', 'Corte de cabelo + Barba Feita com Gilete', 60.00),
(3, 'PAI + 1 FILHO', 'Corte de cabelo família', 60.00),
(4, 'PAI + 2 FILHOs', 'Corte de cabelo família', 85.00),
(5, 'PAI + 3 FILHOs', 'Corte de cabelo família', 110.00),
(6, 'CABELO + BARBA + HIDRATAÇÃO', 'Corte de cabelo com barba feita na maquina, com hidratação.', 85.00),
(7, 'CABELO + BARBA + ALISAMENTO', 'Corte de cabelo mais barba na maquininha, com chapinha', 90.00),
(8, 'CABELO + HIDRATAÇÃO', 'HIDRATAÇÃO ', 60.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `day` varchar(20) NOT NULL,
  `time_slot_segunda` time DEFAULT NULL,
  `time_slot_terca` time DEFAULT NULL,
  `time_slot_quarta` time DEFAULT NULL,
  `time_slot_quinta` time DEFAULT NULL,
  `time_slot_sexta` time DEFAULT NULL,
  `time_slot_sabado` time DEFAULT NULL,
  `time_slot_domingo` time DEFAULT NULL,
  `time_slot` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `time_slots`
--

INSERT INTO `time_slots` (`id`, `barber_id`, `day`, `time_slot_segunda`, `time_slot_terca`, `time_slot_quarta`, `time_slot_quinta`, `time_slot_sexta`, `time_slot_sabado`, `time_slot_domingo`, `time_slot`) VALUES
(3636, 8, '', NULL, NULL, '07:30:00', NULL, NULL, NULL, NULL, NULL),
(3637, 8, '', NULL, NULL, '08:00:00', NULL, NULL, NULL, NULL, NULL),
(3638, 8, '', NULL, NULL, '08:30:00', NULL, NULL, NULL, NULL, NULL),
(3639, 8, '', NULL, NULL, '09:00:00', NULL, NULL, NULL, NULL, NULL),
(3640, 8, '', NULL, NULL, '09:30:00', NULL, NULL, NULL, NULL, NULL),
(3641, 8, '', NULL, NULL, '10:00:00', NULL, NULL, NULL, NULL, NULL),
(3642, 8, '', NULL, NULL, '10:30:00', NULL, NULL, NULL, NULL, NULL),
(3643, 8, '', NULL, NULL, '11:00:00', NULL, NULL, NULL, NULL, NULL),
(3644, 8, '', NULL, NULL, '11:30:00', NULL, NULL, NULL, NULL, NULL),
(3645, 8, '', NULL, NULL, '12:00:00', NULL, NULL, NULL, NULL, NULL),
(3646, 8, '', NULL, NULL, '12:30:00', NULL, NULL, NULL, NULL, NULL),
(3647, 8, '', NULL, NULL, '13:00:00', NULL, NULL, NULL, NULL, NULL),
(3648, 8, '', NULL, NULL, '13:30:00', NULL, NULL, NULL, NULL, NULL),
(3649, 8, '', NULL, NULL, '14:00:00', NULL, NULL, NULL, NULL, NULL),
(3650, 8, '', NULL, NULL, '14:30:00', NULL, NULL, NULL, NULL, NULL),
(3651, 8, '', NULL, NULL, '15:00:00', NULL, NULL, NULL, NULL, NULL),
(3652, 8, '', NULL, NULL, '15:30:00', NULL, NULL, NULL, NULL, NULL),
(3653, 8, '', NULL, NULL, '16:00:00', NULL, NULL, NULL, NULL, NULL),
(3654, 8, '', NULL, NULL, '16:30:00', NULL, NULL, NULL, NULL, NULL),
(3655, 8, '', NULL, NULL, '17:00:00', NULL, NULL, NULL, NULL, NULL),
(4118, 9, '', NULL, NULL, NULL, '08:30:00', NULL, NULL, NULL, NULL),
(4119, 9, '', NULL, NULL, NULL, '09:00:00', NULL, NULL, NULL, NULL),
(4120, 9, '', NULL, NULL, NULL, '09:30:00', NULL, NULL, NULL, NULL),
(4121, 9, '', NULL, NULL, NULL, '10:00:00', NULL, NULL, NULL, NULL),
(4122, 9, '', NULL, NULL, NULL, '10:30:00', NULL, NULL, NULL, NULL),
(4123, 9, '', NULL, NULL, NULL, '11:00:00', NULL, NULL, NULL, NULL),
(4124, 9, '', NULL, NULL, NULL, '11:30:00', NULL, NULL, NULL, NULL),
(4125, 9, '', NULL, NULL, NULL, '19:30:00', NULL, NULL, NULL, NULL),
(4126, 9, '', NULL, NULL, NULL, '20:00:00', NULL, NULL, NULL, NULL),
(4127, 9, '', NULL, NULL, NULL, '20:30:00', NULL, NULL, NULL, NULL),
(4128, 9, '', NULL, NULL, NULL, '21:00:00', NULL, NULL, NULL, NULL),
(4129, 9, '', NULL, NULL, NULL, '21:30:00', NULL, NULL, NULL, NULL),
(4130, 9, '', NULL, NULL, NULL, NULL, '08:30:00', NULL, NULL, NULL),
(4131, 9, '', NULL, NULL, NULL, NULL, '09:00:00', NULL, NULL, NULL),
(4132, 9, '', NULL, NULL, NULL, NULL, '09:30:00', NULL, NULL, NULL),
(4133, 9, '', NULL, NULL, NULL, NULL, '10:00:00', NULL, NULL, NULL),
(4134, 9, '', NULL, NULL, NULL, NULL, '10:30:00', NULL, NULL, NULL),
(4135, 9, '', NULL, NULL, NULL, NULL, '11:00:00', NULL, NULL, NULL),
(4136, 9, '', NULL, NULL, NULL, NULL, '11:30:00', NULL, NULL, NULL),
(4137, 9, '', NULL, NULL, NULL, NULL, '19:30:00', NULL, NULL, NULL),
(4138, 9, '', NULL, NULL, NULL, NULL, '20:00:00', NULL, NULL, NULL),
(4139, 9, '', NULL, NULL, NULL, NULL, '20:30:00', NULL, NULL, NULL),
(4140, 9, '', NULL, NULL, NULL, NULL, '21:00:00', NULL, NULL, NULL),
(4141, 9, '', NULL, NULL, NULL, NULL, '21:30:00', NULL, NULL, NULL),
(4163, 8, '', NULL, NULL, NULL, NULL, '07:30:00', NULL, NULL, NULL),
(4164, 8, '', NULL, NULL, NULL, NULL, '08:00:00', NULL, NULL, NULL),
(4165, 8, '', NULL, NULL, NULL, NULL, '08:30:00', NULL, NULL, NULL),
(4166, 8, '', NULL, NULL, NULL, NULL, '09:00:00', NULL, NULL, NULL),
(4167, 8, '', NULL, NULL, NULL, NULL, '09:30:00', NULL, NULL, NULL),
(4168, 8, '', NULL, NULL, NULL, NULL, '10:00:00', NULL, NULL, NULL),
(4169, 8, '', NULL, NULL, NULL, NULL, '10:30:00', NULL, NULL, NULL),
(4170, 8, '', NULL, NULL, NULL, NULL, '11:00:00', NULL, NULL, NULL),
(4171, 8, '', NULL, NULL, NULL, NULL, '11:30:00', NULL, NULL, NULL),
(4172, 8, '', NULL, NULL, NULL, NULL, '12:00:00', NULL, NULL, NULL),
(4173, 8, '', NULL, NULL, NULL, NULL, '12:30:00', NULL, NULL, NULL),
(4174, 8, '', NULL, NULL, NULL, NULL, '13:00:00', NULL, NULL, NULL),
(4175, 8, '', NULL, NULL, NULL, NULL, '13:30:00', NULL, NULL, NULL),
(4176, 8, '', NULL, NULL, NULL, NULL, '14:00:00', NULL, NULL, NULL),
(4177, 8, '', NULL, NULL, NULL, NULL, '14:30:00', NULL, NULL, NULL),
(4178, 8, '', NULL, NULL, NULL, NULL, '15:00:00', NULL, NULL, NULL),
(4179, 8, '', NULL, NULL, NULL, NULL, '15:30:00', NULL, NULL, NULL),
(4180, 8, '', NULL, NULL, NULL, NULL, '16:00:00', NULL, NULL, NULL),
(4181, 8, '', NULL, NULL, NULL, NULL, '16:30:00', NULL, NULL, NULL),
(4182, 8, '', NULL, NULL, NULL, NULL, '17:00:00', NULL, NULL, NULL),
(4183, 8, '', NULL, NULL, NULL, NULL, '17:30:00', NULL, NULL, NULL),
(4184, 8, '', NULL, NULL, NULL, NULL, '18:00:00', NULL, NULL, NULL),
(4216, 8, '', NULL, NULL, NULL, NULL, NULL, '07:30:00', NULL, NULL),
(4217, 8, '', NULL, NULL, NULL, NULL, NULL, '08:00:00', NULL, NULL),
(4218, 8, '', NULL, NULL, NULL, NULL, NULL, '08:30:00', NULL, NULL),
(4219, 8, '', NULL, NULL, NULL, NULL, NULL, '09:00:00', NULL, NULL),
(4220, 8, '', NULL, NULL, NULL, NULL, NULL, '09:30:00', NULL, NULL),
(4221, 8, '', NULL, NULL, NULL, NULL, NULL, '10:00:00', NULL, NULL),
(4222, 8, '', NULL, NULL, NULL, NULL, NULL, '10:30:00', NULL, NULL),
(4223, 8, '', NULL, NULL, NULL, NULL, NULL, '11:00:00', NULL, NULL),
(4224, 8, '', NULL, NULL, NULL, NULL, NULL, '11:30:00', NULL, NULL),
(4225, 8, '', NULL, NULL, NULL, NULL, NULL, '12:00:00', NULL, NULL),
(4226, 8, '', NULL, NULL, NULL, NULL, NULL, '12:30:00', NULL, NULL),
(4227, 8, '', NULL, NULL, NULL, NULL, NULL, '13:00:00', NULL, NULL),
(4228, 8, '', NULL, NULL, NULL, NULL, NULL, '13:30:00', NULL, NULL),
(4229, 8, '', NULL, NULL, NULL, NULL, NULL, '14:00:00', NULL, NULL),
(4230, 8, '', NULL, NULL, NULL, NULL, NULL, '14:30:00', NULL, NULL),
(4231, 8, '', NULL, NULL, NULL, NULL, NULL, '15:00:00', NULL, NULL),
(4232, 8, '', NULL, NULL, NULL, NULL, NULL, '15:30:00', NULL, NULL),
(4233, 8, '', NULL, NULL, NULL, NULL, NULL, '16:00:00', NULL, NULL),
(4234, 8, '', NULL, NULL, NULL, NULL, NULL, '16:30:00', NULL, NULL),
(4235, 8, '', NULL, NULL, NULL, NULL, NULL, '17:00:00', NULL, NULL),
(4236, 8, '', NULL, NULL, NULL, NULL, NULL, '17:30:00', NULL, NULL),
(4237, 8, '', NULL, NULL, NULL, NULL, NULL, '18:00:00', NULL, NULL),
(4256, 8, '', NULL, '07:30:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4257, 8, '', NULL, '08:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4258, 8, '', NULL, '08:30:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4259, 8, '', NULL, '09:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4260, 8, '', NULL, '09:30:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4261, 8, '', NULL, '10:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4262, 8, '', NULL, '10:30:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4263, 8, '', NULL, '11:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4264, 8, '', NULL, '11:30:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4265, 8, '', NULL, '12:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4266, 8, '', NULL, '12:30:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4267, 8, '', NULL, '13:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4268, 8, '', NULL, '13:30:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4269, 8, '', NULL, '14:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4270, 8, '', NULL, '14:30:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4271, 8, '', NULL, '15:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4272, 8, '', NULL, '15:30:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4273, 8, '', NULL, '16:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4274, 8, '', NULL, '16:30:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4275, 8, '', NULL, '17:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4276, 8, '', NULL, '17:30:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4277, 8, '', NULL, '18:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4278, 8, '', NULL, '18:30:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4279, 8, '', NULL, '19:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4280, 8, '', NULL, '19:30:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4281, 8, '', NULL, '20:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4282, 8, '', NULL, '20:30:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4283, 8, '', NULL, '21:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4284, 8, '', NULL, '21:30:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4285, 8, '', NULL, '22:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4286, 8, '', '07:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4287, 8, '', '08:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4288, 8, '', '08:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4289, 8, '', '09:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4290, 8, '', '09:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4291, 8, '', '10:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4292, 8, '', '10:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4293, 8, '', '11:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4294, 8, '', '11:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4295, 8, '', '12:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4296, 8, '', '12:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4297, 8, '', '13:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4298, 8, '', '13:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4299, 8, '', '14:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4300, 8, '', '14:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4301, 8, '', '15:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4302, 8, '', '15:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4303, 8, '', '16:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4304, 8, '', '16:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4305, 8, '', '17:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4306, 8, '', '17:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4307, 8, '', '18:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4308, 8, '', '18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4309, 8, '', '19:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4310, 8, '', '19:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4311, 8, '', '20:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4312, 8, '', '20:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4313, 8, '', '21:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4314, 8, '', '21:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4315, 8, '', '22:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4316, 8, '', '22:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4317, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4318, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4319, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4320, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4321, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4322, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4323, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4324, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4325, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4326, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4327, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4328, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4329, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4330, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4331, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4332, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4333, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4334, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4335, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4336, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4337, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4338, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4339, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4340, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4341, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4342, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4343, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4344, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4345, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4346, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4347, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4348, 8, '', NULL, NULL, NULL, '07:30:00', NULL, NULL, NULL, NULL),
(4349, 8, '', NULL, NULL, NULL, '08:00:00', NULL, NULL, NULL, NULL),
(4350, 8, '', NULL, NULL, NULL, '08:30:00', NULL, NULL, NULL, NULL),
(4351, 8, '', NULL, NULL, NULL, '09:00:00', NULL, NULL, NULL, NULL),
(4352, 8, '', NULL, NULL, NULL, '09:30:00', NULL, NULL, NULL, NULL),
(4353, 8, '', NULL, NULL, NULL, '10:00:00', NULL, NULL, NULL, NULL),
(4354, 8, '', NULL, NULL, NULL, '10:30:00', NULL, NULL, NULL, NULL),
(4355, 8, '', NULL, NULL, NULL, '11:00:00', NULL, NULL, NULL, NULL),
(4356, 8, '', NULL, NULL, NULL, '11:30:00', NULL, NULL, NULL, NULL),
(4357, 8, '', NULL, NULL, NULL, '12:00:00', NULL, NULL, NULL, NULL),
(4358, 8, '', NULL, NULL, NULL, '12:30:00', NULL, NULL, NULL, NULL),
(4359, 8, '', NULL, NULL, NULL, '13:00:00', NULL, NULL, NULL, NULL),
(4360, 8, '', NULL, NULL, NULL, '13:30:00', NULL, NULL, NULL, NULL),
(4361, 8, '', NULL, NULL, NULL, '14:00:00', NULL, NULL, NULL, NULL),
(4362, 8, '', NULL, NULL, NULL, '14:30:00', NULL, NULL, NULL, NULL),
(4363, 8, '', NULL, NULL, NULL, '15:00:00', NULL, NULL, NULL, NULL),
(4364, 8, '', NULL, NULL, NULL, '15:30:00', NULL, NULL, NULL, NULL),
(4365, 8, '', NULL, NULL, NULL, '16:00:00', NULL, NULL, NULL, NULL),
(4366, 8, '', NULL, NULL, NULL, '16:30:00', NULL, NULL, NULL, NULL),
(4367, 8, '', NULL, NULL, NULL, '17:00:00', NULL, NULL, NULL, NULL),
(4368, 8, '', NULL, NULL, NULL, '17:30:00', NULL, NULL, NULL, NULL),
(4369, 8, '', NULL, NULL, NULL, '18:00:00', NULL, NULL, NULL, NULL),
(4370, 8, '', NULL, NULL, NULL, '18:30:00', NULL, NULL, NULL, NULL),
(4371, 8, '', NULL, NULL, NULL, '19:00:00', NULL, NULL, NULL, NULL),
(4372, 8, '', NULL, NULL, NULL, '19:30:00', NULL, NULL, NULL, NULL),
(4373, 8, '', NULL, NULL, NULL, '20:00:00', NULL, NULL, NULL, NULL),
(4374, 8, '', NULL, NULL, NULL, '20:30:00', NULL, NULL, NULL, NULL),
(4375, 8, '', NULL, NULL, NULL, '21:00:00', NULL, NULL, NULL, NULL),
(4376, 8, '', NULL, NULL, NULL, '21:30:00', NULL, NULL, NULL, NULL),
(4377, 8, '', NULL, NULL, NULL, '22:00:00', NULL, NULL, NULL, NULL),
(4378, 8, '', NULL, NULL, NULL, '22:30:00', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '0=not verified, 1 = verified',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `barber_id` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `status`, `date_added`, `date_updated`, `barber_id`, `email`, `telefone`) VALUES
(10, 'Roger', 'Martinho', 'Martinho', 'roger', 'gatoazul123', NULL, NULL, 1, 1, '2023-10-10 16:49:31', '2024-02-20 14:28:04', 8, 'roger@gmail.com', ''),
(11, 'Luciano', '', 'Almeida', 'luciano', 'almeidaluciano', NULL, NULL, 2, 1, '2023-12-01 11:14:29', '2024-02-20 14:11:04', 9, '', ''),
(12, 'Raul', '', 'Dolglas', 'raul', 'dolglasraul', NULL, NULL, 2, 1, '2023-12-01 12:13:12', '2024-02-20 14:11:35', 11, '', ''),
(13, 'Junior', '', 'Carlos', 'junior', 'carlosjunior', NULL, NULL, 2, 1, '2023-12-01 12:14:46', '2024-02-20 14:11:19', 10, '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `appointment_list`
--
ALTER TABLE `appointment_list`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `barbeiros`
--
ALTER TABLE `barbeiros`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `barber_days`
--
ALTER TABLE `barber_days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barber_id` (`barber_id`);

--
-- Índices de tabela `disponibilidade_dias`
--
ALTER TABLE `disponibilidade_dias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barbeiro_id` (`barbeiro_id`);

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
-- Índices de tabela `service_list_combos`
--
ALTER TABLE `service_list_combos`
  ADD PRIMARY KEY (`combo_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `barber_id` (`barber_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `appointment_list`
--
ALTER TABLE `appointment_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=580;

--
-- AUTO_INCREMENT de tabela `barbeiros`
--
ALTER TABLE `barbeiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `barber_days`
--
ALTER TABLE `barber_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1079;

--
-- AUTO_INCREMENT de tabela `disponibilidade_dias`
--
ALTER TABLE `disponibilidade_dias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `lojas`
--
ALTER TABLE `lojas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `service_list`
--
ALTER TABLE `service_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `service_list_combos`
--
ALTER TABLE `service_list_combos`
  MODIFY `combo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `time_slots`
--
ALTER TABLE `time_slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4379;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `barber_days`
--
ALTER TABLE `barber_days`
  ADD CONSTRAINT `barber_days_ibfk_1` FOREIGN KEY (`barber_id`) REFERENCES `barbeiros` (`id`);

--
-- Restrições para tabelas `disponibilidade_dias`
--
ALTER TABLE `disponibilidade_dias`
  ADD CONSTRAINT `disponibilidade_dias_ibfk_1` FOREIGN KEY (`barbeiro_id`) REFERENCES `barbeiros` (`id`);

--
-- Restrições para tabelas `time_slots`
--
ALTER TABLE `time_slots`
  ADD CONSTRAINT `time_slots_ibfk_1` FOREIGN KEY (`barber_id`) REFERENCES `barbeiros` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
