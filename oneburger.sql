-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Maio-2024 às 23:40
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `oneburger`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas`
--

CREATE TABLE `contas` (
  `id` bigint(20) NOT NULL,
  `descricao` text NOT NULL,
  `valor` decimal(11,2) NOT NULL,
  `vencimento` date NOT NULL,
  `tipo` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nome` varchar(225) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `nome`, `senha`, `cargo`) VALUES
(2, 'admin@gmail.com', 'Ana Paula', '12345', 'gerente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` bigint(20) NOT NULL,
  `un` bigint(20) NOT NULL,
  `produto` varchar(45) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `tipo_venda` varchar(255) NOT NULL,
  `tipo` bigint(20) NOT NULL,
  `usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `un`, `produto`, `preco`, `data`, `hora`, `tipo_venda`, `tipo`, `usuario`) VALUES
(323, 1, 'ONE CRISPY', 25.50, '2024-05-12', '21:43:56', 'Dinheiro', 5, 'gerente'),
(324, 1, 'BOLINHO DE MANDIOCA', 14.00, '2024-05-12', '22:31:57', 'Dinheiro', 5, 'gerente'),
(325, 1, 'ASSADO ESFIRRA - FRANGO', 27.50, '2024-05-12', '22:31:57', 'Dinheiro', 5, 'gerente'),
(326, 1, 'ONE HOUSE', 24.50, '2024-05-12', '22:32:02', 'Dinheiro', 5, 'gerente'),
(327, 1, 'ONE LUX', 24.50, '2024-05-12', '22:32:02', 'Dinheiro', 5, 'gerente'),
(328, 1, 'ONE BURGER', 28.50, '2024-05-12', '22:38:17', 'Pix', 2, 'gerente'),
(329, 1, 'ONE LUX', 24.50, '2024-05-12', '22:38:17', 'Pix', 2, 'gerente'),
(330, 1, 'FILÉ DE BOI C/ FRITAS', 69.00, '2024-05-12', '22:38:17', 'Pix', 2, 'gerente'),
(331, 1, 'COCA_COLA - LATA', 5.00, '2024-05-12', '22:38:17', 'Pix', 2, 'gerente');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `contas`
--
ALTER TABLE `contas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contas`
--
ALTER TABLE `contas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
