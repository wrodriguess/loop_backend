-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Set-2022 às 13:58
-- Versão do servidor: 8.0.30
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loop_brasil`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `car_yard`
--

CREATE TABLE `car_yard` (
  `id` int NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `address_number` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `address_complement` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `zip_code` varchar(9) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `car_yard`
--

INSERT INTO `car_yard` (`id`, `address`, `address_number`, `address_complement`, `city`, `state`, `zip_code`) VALUES
(1, 'Rua Henrique Sertório', '564', '', 'São Paulo', 'SP', '03066-065'),
(2, 'Rua Fradique Coutinho', '477', '', 'São Paulo', 'SP', '05416-010'),
(3, 'Rua Joaquim Floriano', '466', '', 'São Paulo', 'SP', '04534-011'),
(4, 'Rua Borges Lagoa', '1209', '', 'São Paulo', 'SP', '04038-033'),
(5, 'Avenida Brasil', '800', '', 'Campinas', 'SP', '13073-012'),
(6, 'Av. Almerinda Villela Ferreira', '1', '', 'Mogi das Cruzes', 'SP', '08775-385');

-- --------------------------------------------------------

--
-- Estrutura da tabela `scheduling`
--

CREATE TABLE `scheduling` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `id_vehicle` int NOT NULL,
  `date` date NOT NULL,
  `hour` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `scheduling`
--

INSERT INTO `scheduling` (`id`, `id_user`, `id_vehicle`, `date`, `hour`) VALUES
(28, 2, 2, '2022-09-19', '8:00'),
(29, 2, 2, '2022-09-19', '9:00'),
(30, 2, 2, '2022-09-19', '10:00'),
(31, 2, 2, '2022-09-19', '13:00'),
(32, 2, 2, '2022-09-19', '14:00'),
(33, 2, 2, '2022-09-24', '14:00'),
(34, 2, 2, '2022-09-20', '16:00'),
(35, 2, 2, '2022-09-19', '12:00'),
(36, 2, 2, '2022-09-22', '17:00'),
(37, 2, 2, '2022-09-21', '16:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `telephone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `telephone`) VALUES
(1, 'William', 'will@gmail.com', '9 83748974'),
(2, 'meu nome', 'email@gmail.com', '11 9 74123678');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int NOT NULL,
  `brand` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `model` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `value` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `id_car_yard` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `vehicle`
--

INSERT INTO `vehicle` (`id`, `brand`, `model`, `description`, `value`, `photo`, `id_car_yard`) VALUES
(1, 'Fiat', 'Palio', '1.6 MPI SPORTING 16V FLEX 4P MANUAL', '46.000', 'https://github.com/wrodriguess/loop_frontend/blob/main/src/images/fiat-palio-1.6-mpi-sporting-16v-flex-4p-manual-wmimagem09541630690.jpg?raw=true', 4),
(2, 'Volkswagen', 'Voyage', '1.0 12V MPI TOTALFLEX TRENDLINE 4P MANUAL', '49.900', 'https://github.com/wrodriguess/loop_frontend/blob/main/src/images/volkswagen-voyage-1.0-12v-mpi-totalflex-trendline-4p-manual-wmimagem18575054511.jpg?raw=true', 6),
(3, 'Fiat', '500', '1.4 CULT 8V FLEX 2P MANUAL', '43.900', 'https://github.com/wrodriguess/loop_frontend/blob/main/src/images/fiat-500-1.4-cult-8v-flex-2p-manual-wmimagem16135132319.jpg', 2),
(4, 'Ford', 'Ka', '1.0 TI-VCT FLEX SE MANUAL', '42.900', 'https://github.com/wrodriguess/loop_frontend/blob/main/src/images/ford-ka-1.0-tivct-flex-se-manual-wmimagem09124074632.jpg?raw=true', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `car_yard`
--
ALTER TABLE `car_yard`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `scheduling`
--
ALTER TABLE `scheduling`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_scheduling_user` (`id_user`),
  ADD KEY `fk_scheduling_vehicle` (`id_vehicle`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vehicle_car_yard` (`id_car_yard`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `car_yard`
--
ALTER TABLE `car_yard`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `scheduling`
--
ALTER TABLE `scheduling`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `scheduling`
--
ALTER TABLE `scheduling`
  ADD CONSTRAINT `fk_scheduling_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_scheduling_vehicle` FOREIGN KEY (`id_vehicle`) REFERENCES `vehicle` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `fk_vehicle_car_yard` FOREIGN KEY (`id_car_yard`) REFERENCES `car_yard` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
